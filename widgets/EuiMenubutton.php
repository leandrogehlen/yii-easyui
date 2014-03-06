<?php

Yii::import('ext.yii-easyui.widgets.EuiLinkbutton');
//Yii::import('ext.yii-easyui.widgets.EuiLinkbutton');

class EuiMenubutton extends EuiLinkbutton
{

	/**
	 * @var	number	Defines duration time in milliseconds to show menu when hovering the button
	 */
	public $duration;
	/**
	 * @var string A selector to create a corresponding menu
	 */
	public $menu;

	public function getCssClass()
	{
		return 'easyui-menubutton';
	}
}

?>