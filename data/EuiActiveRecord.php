<?php

Yii::import('ext.yii-easyui.data.EuiActiveDataProvider');


abstract class EuiActiveRecord extends CActiveRecord {

	/**
	 * Returns the name of the associated database table.
	 * By default this method returns the class name as the table name in lowercase format.
	 * @return string the table name
	 */
	public function tableName()
	{
		return strtolower(parent::tableName());
	}

	/**
	 * Returns array of fields name a export.
	 * @return array attribute labels (name=>label)
	 */
	public function attributeExports()
	{
		return array();
	}

	/**
	 * Returns the query criteria associated with this model used by {@link search()}
	 * @return CDbCriteria
	 */
	protected function getSearchCriteria()
	{
		return $this->getDbCriteria();
	}

	/**
	 * Returns the field names that used in search
	 * @return array search field names
	 */
	public function searchAttributes()
	{
		return array();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CDbCriteria return the criteria models based on the search/filter conditions.
	 */
	public function search($value)
	{
		$criteria = $this->getSearchCriteria();
		
		$attributes = $this->searchAttributes();
		foreach ($attributes as $attr)
		{
			$column = self::getColumnByAttributeName($this, $attr);
			if (isset($column))
			{
				$search = $value;
				if (strpos($attr, '.'))
				{
					$tokens = explode('.', $attr);
					array_pop($tokens);
					
					$criteria->with = implode('.', $tokens); 						
				} else 
					$attr = $this->getTableAlias(true).'.'.$attr;												

				if (!empty($search)) {
					if ($column->type == 'integer' || $column->type == 'double')
					{
						if (is_numeric($search))
						{
							switch ($column->type)
							{
								case 'integer': $search = (int)$value;break;
								case 'double': $search = (double)$value;break;
							}											
							$criteria->compare($attr, $search, false, 'OR');
						}
					}
					else if (!empty($search))
						$criteria->compare("LOWER({$attr})", $search, $column->type == 'string', 'OR');
				}
			}
		}
		
		return new EuiActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));				
	}

	/**
	 * Gets the column metadata by attribute name
	 * This is a convenient method for retrieving a named column even if it does not exist.
	 * @param CActiveRecord $model
	 * @param String $attribute
	 */
	public static function getColumnByAttributeName($model, $attribute)
	{
		$pos = strpos($attribute, '.');
		if($pos)
		{
			$relationName = substr($attribute, 0, $pos);
			$relations = $model->relations();

			if (isset($relations[$relationName]))
			{
				$attribute = substr($attribute, $pos+1);
				$relations = array($relationName => $relations[$relationName]);
			}
			foreach ($relations as $relation)
			{
				if ($relation[0] === CActiveRecord::BELONGS_TO)
				{
					$relationModel = new $relation[1];
					$column = self::getColumnByAttributeName($relationModel, $attribute);
					if (isset($column))
						return $column;
				}
			}
		}
		else {
			$column = $model->getTableSchema()->getColumn($attribute);
			if (isset($column))
				return $column;
		}
		return null;
	}
}