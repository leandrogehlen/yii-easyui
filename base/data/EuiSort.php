<?php

Yii::import('system.web.CSort');

class EuiSort extends CSort
{
	
	/**
	 * The name of the REQUEST parameter that specifies which attributes to be sorted
	 */
	const SORT_VAR = 'sort';
	
	/**
	 * The name of the REQUEST parameter that specifies which direction of sort
	 */
	const ORDER_VAR = 'order';
	
	/**	 
	 * @see CSort::getDirections()
	 */
	public function getDirections()
	{		
		$directions = array();
		
		if (isset($_REQUEST[self::SORT_VAR]))
		{
			$attr = str_replace('_', '.', $_REQUEST[self::SORT_VAR]);
			$directions[$attr] = ($_REQUEST[self::ORDER_VAR] !== 'desc') ? self::SORT_ASC : self::SORT_DESC;												
		}
		
		return $directions;
	}
		
	/**	 
	 * @see CSort::resolveAttribute()
	 */
	public function resolveAttribute($attribute)
	{
		if(strpos($attribute,'.')!==false){
			$definition = explode(".", $attribute);
			$field = array_pop($definition);
			$alias = array_pop($definition); 			
			return  $alias.'.'. $field;			
		}
		else
			return parent::resolveAttribute($attribute);			
	}
	
}