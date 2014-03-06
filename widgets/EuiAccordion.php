<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiAccordion extends EuiControl
{

	protected function getCssClass()
	{
		return 'easyui-accordion';
	}

	public function init()
	{
		echo CHtml::openTag('div', $this->toOptions())."\n";
	}


	public function run()
	{
		echo CHtml::closeTag('div')."\n";
	}
}