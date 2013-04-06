<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');

class EuiComboitem extends EuiWidget 
{	
	/**	 
	 * @var string description of item
	 */
	public $description;
	
	/**
	 * @var mixed value of item 
	 */
	public $value;
	
	
	public function run()
	{
		$options = $this->toArray();
		unset($options['description']);			
		echo CHtml::tag('option', $options, $this->description)."\n";
	}	
}