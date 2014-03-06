<?php

Yii::import('ext.yii-easyui.widgets.EuiSpinner');

class EuiTimespinner extends EuiSpinner
{

	/**
	 * @var string	The separator between hour and minute and second
	 */
	public $separator;

	/**
	 * @var boolean	Defines if to show the second information
	 */
	public $showSeconds;

	/**
	 * @var number The field to highlight initially, 0 = hours, 1 = minutes, …	0
	 */
	public $highlight;

	public function getCssClass()
	{
		return 'easyui-timespinner';
	}
}
?>