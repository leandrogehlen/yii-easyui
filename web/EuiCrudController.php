<?php

abstract class CrudControllerBase extends AccessControllerBase {


	private $_pkColumnName;

	/**
	 * Return the name of column sort concat with table alias
	 * @param mixed $with
	 * @param string $columnName
	 */
	protected function processOrder($with, $columnName)
	{
		if (is_array($with))
			$relations = array_keys($with);
		else {
			$relations = array();
			$relations[] = $with;
		}

		foreach ($relations as $key => $value)
		{
			if (is_string($value))
			{
				$table = $this->getModel()->getDbConnection()->getSchema()->getTable($value);
				if ($table->getColumn($columnName))
					return $value . '.' . $columnName;
			}

			if (is_array($value))
				return $this->processOrder($value['with'], $columnName);
		}
		return $columnName;
	}

	/**
	 * Applies LIMIT, OFFSET and ORDER to the specified query criteria.
	 * @param CDbCriteria $criteria the query criteria that should be applied with the limit
	 */
	protected function applyPagination($criteria)
	{
		if (isset($_REQUEST['rows']))
		{
			$criteria->limit = $_REQUEST['rows'];
			$criteria->offset = ($_REQUEST['page']-1) * $criteria->limit;
		}

		if (isset($_REQUEST['sort']))
		{
			$sort = $_REQUEST['sort'];
			if ($this->getModel()->getTableSchema()->getColumn($sort))
				$criteria->order = $this->getModel()->getTableAlias(true) .'.' . $sort;
			else{
				$arr = $criteria->toArray();
				$criteria->order = $this->processOrder($arr['with'], $sort);
			}
			$criteria->order .= ' '.$_REQUEST['order'];
		}
	}

	 protected function applyFilter($criteria)
	 {
		if (isset($_REQUEST['__params']))
		{
			foreach ($_REQUEST['__params'] as $k => $value)
			{
				if (isset($value))
				{
					$field = $this->getModel()->getTableAlias(true).'.'.$k;
					$criteria->compare($field, $value);
				}
			}
		}
	 }

	/**
	 * Find model by pk. If not search create a new model
	 * @return CActiveRecord
	 */
	protected function loadModel()
	{
		$id = $_REQUEST[$this->getPkColumnName()];
		unset($_REQUEST[$this->getPkColumnName()]);

		if ($id)
			$model = $this->getModel()->findByPk((int)$id);
		else{
			$class = get_class($this->getModel());
			$model = new $class;
		}
		return $model;
	}

	/**
	 * Return the model class for table
	 * @return CActiveRecord
	 */
	public abstract function getModel();

	/**
	 * Return the name of the primary key column in the table
	 * @return string
	 */
	public function getPkColumnName()
	{
		if (!$this->_pkColumnName)
			$this->_pkColumnName = $this->getModel()->getTableSchema()->primaryKey;
		return $this->_pkColumnName;
	}

	/**
	 * Export all data in JSON format
	 */
	public function actionSearch()
	{
		$key = null;
		if (isset($_REQUEST['__filter']))
			$key = '__filter';

		else if (isset($_REQUEST['q']))
			$key = 'q';

		$value = ($key)? strtolower($_REQUEST[$key]) : null;
		$criteria = $this->getModel()->search($value);
		$total = $this->getModel()->count($criteria);

		$this->applyPagination($criteria);
		$this->applyFilter($criteria);

		$rows = $this->getModel()->findAll($criteria);

		if (isset($_REQUEST['__nototal']))
			echo CJSON::encode($rows);
		else
			echo $this->exportToJSONData($rows, $total);
	}

	/**
	 * Finds a single active record with the specified primary key and
	 * export data to JSON format
	 */
	public function actionLoad()
	{
		$record = $this->getModel()->findByPk($_REQUEST[$this->getPkColumnName()]);
		echo $this->exportToJSONData($record);
	}

	public function beforeSave($model)
	{
	}

	/**
	 * The record is inserted as a row into the database table
	 */
	public function actionSave()
	{
		$model = $this->loadModel();
		$model->setAttributes($_POST, false);

		$this->beforeSave($model);
		$model->save(false);

		echo $this->exportToJSONSuccess(true);
	}

	/**
	 * Deletes rows with the specified primary key
	 */
	public function actionDelete()
	{
		foreach ($_POST['__deleteds'] as $id)
			$this->getModel()->deleteByPk($id);

		echo $this->exportToJSONSuccess(true);
	}

}
?>
