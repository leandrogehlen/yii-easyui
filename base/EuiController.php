<?php

Yii::import('ext.yii-easyui.base.EuiJavaScript');

class EuiController extends CController {

	/**
	 * Registers jquery and EasyUI JavaScript files and the theme CSS file.
	 * @see CController::init()
	 */
	public function init()
	{
		EuiJavaScript::registerCoreScripts();
	}	

	/**
	 * Exports an model to a special readable JSON to work with formulários
	 * @param CModel $model
	 * @return string JSON string representation of model
	 */
	public function exportModel($model)
	{
		$data = $this->encodeData($model);
		foreach ($data as $k => $v)
		{
			$className = get_class($model);
			$data[$className.'['.$k.']'] = $v;
			unset($data[$k]);
		}
		return CJSON::encode($data);
	}

	/**
	 * Exports an array to a special readable JSON object.
	 * <p>The $total parameter indicates the total number of records. This is useful is case of pagination where
	 * the total number of records is needed by the control to create the correct pagination<br/>
	 * @param array|IDataProvider $data the data to generate a JSON object from it
	 * @param int $total total number of records in the entire data-source
	 * @return string Data representation in JSON format
	 */
	public function exportData($data, $total=null)
	{	
		$exports = array();
		$model = null;
		
		if ($data instanceof IDataProvider)
		{
			$total = $data->getTotalItemCount();
			$data = $data->getData();		
		}		

		if (is_object($data))
			$model = $data;
		else if (is_array($data) && !empty($data))
			$model = current($data);

		if ($model !== null && $model instanceof CActiveRecord && method_exists($model, 'attributeExports'))
		{
			$attrs = $model->attributeExports();

			if (!is_array($attrs) || (!empty($attrs) && !is_string(current($attrs))) )
				throw new CException(Yii::t('easyui', 'Invalid return of method "attributeExports" of class "{class}"',
					array('{class}'=>get_class($model))));

			foreach ($attrs as $at)
				$exports = array_merge($exports, explode('.', $at));
		}

		if (is_array($data))
		{
			$rows = array();
			foreach ($data as $item)
				$rows[] = $this->encodeData($item, null, false, $exports);

			return CJSON::encode(array('total'=>(isset($total)) ? $total: sizeof($data),'rows'=>$rows));
		}
		else
			return CJSON::encode($this->encodeData($data));
	}

	/**
	 * Convert model to array for export JSON format
	 * @param $model the model to encode
	 * @param boolean $hidePk whether to export primary key attribute
	 * @param array $exports attribute names of export
	 */
	private function encodeData($model, $alias=null, $hidePk=false, $exports=array())
	{
		$data = array();
		foreach ($model as $key => $value)
		{
			if ($hidePk && $key == $model->getTableSchema()->primaryKey)
				continue;

			if (empty($exports) || in_array($key, $exports))
			{
				$key = ($alias) ? strtolower($alias).'_'.$key : $key;
				$data[$key] = $value;
			}
		}

		if ($model instanceof CActiveRecord)
		{
			foreach ($model->relations() as $k => $relation)
			{
				if ($relation[0] === CActiveRecord::BELONGS_TO)
				{
					$fk = $model->{$k};
					if ((empty($exports) || in_array($k, $exports)) && $fk !== null){
						$cls = get_class($fk);
						$alias = ($alias !== null) ? $alias.'_'.$cls : $cls;
						$data = array_merge($data, $this->encodeData($fk, $alias, true, $exports));
					}
				}
			}
		}
		return $data;
	}
}
