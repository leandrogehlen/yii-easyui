<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiSlider extends EuiControl
{

	/**
	 * @var string Indicate what type of slider. Possible values: 'h'(horizontal),'v'(vertical)
	 */
	public $mode;

	/**
	 * @var boolean Set to true the minimum value and maximum value will switch their positions
	 */
	public $reversed;

	/**
	 * @var boolean	Defines if to display value information tip
	 */
	public $showTip;

	/**
	 * @var boolean	Defines if to disable slider
	 */
	public $disabled;

	/**
	 * @var number The default value
	 */
	public $value;

	/**
	 * @var number The minimum allowed value.	0
	 */
	public $min;

	/**
	 * @var number The maximum allowed value
	 */
	public $max;

	/**
	 * @var number The value to increase or descrease
	 */
	public $step;

	/**
	 * @var array Display labels beside slider, '|' — show just line.	[]
	 */
	public $rule;

	/**
	 * @var string A function to format slider value. Return string value that will display as tip.
	 */
	public $tipFormatter;

	public function getCssClass()
	{
		return 'easyui-slider';
	}

	public function run()
	{
		echo CHtml::openTag('div', $this->toOptions())."\n";
		echo CHtml::closeTag('div')."\n";
	}
}
?>