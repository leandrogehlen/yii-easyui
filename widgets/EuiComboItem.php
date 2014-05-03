<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');

class EuiComboItem extends EuiWidget
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
		echo CHtml::tag('option', array('value'=> $this->value), $this->description)."\n";
	}
}