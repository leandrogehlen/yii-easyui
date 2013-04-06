<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');

class EuiLabel extends EuiWidget 
{
	public $value;
	
	public $for;

	public function run()
	{
		echo CHtml::label($this->value, $this->for)."\n";
	}
}

?>