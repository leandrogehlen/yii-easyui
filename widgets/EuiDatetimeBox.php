<?php

Yii::import('ext.yii-easyui.widgets.EuiDateBox');

class EuiDatetimeBox extends EuiDateBox
{

	/**
	 * @var boolean	Defines if to display the second information
	 */
	public $showSeconds;

	/**
	 * @var string	The time separator between hour and minute and second
	 */
	public $timeSeparator;

	public function getCssClass()
	{
		return 'easyui-datetimebox';
	}
}
?>