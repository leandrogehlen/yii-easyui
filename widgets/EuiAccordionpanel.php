<?php

Yii::import('ext.yii-easyui.widgets.EuiPanel');

class EuiAccordionpanel extends EuiPanel
{
	/**
	 * @var boolean	Set to true to expand the panel
	 */
	public $selected;


	public function getCssClass()
	{
		return null;
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