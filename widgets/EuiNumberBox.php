<?php

Yii::import('ext.yii-easyui.widgets.EuiValidateBox');

class EuiNumberBox extends EuiValidateBox
{
	/**
	 * @var boolean	Defines if to disable the field
	 */
	public $disabled;

	/**
	 * @var number The default value
	 */
	public $value;

	/**
	 * @var The minimum allowed value
	 */
	public $min;

	/**
	 * @var The maximum allowed value
	 */
	public $max;

	/**
	 * @var number	The maximum precision to display after the decimal separator
	 */
	public $precision;

	/**
	 * @var string	The decimal character separates the integer and decimal parts of a number
	 */
	public $decimalSeparator;

	/**
	 * @var string	The character that separates integer groups to show thousands and millions
	 */
	public $groupSeparator;

	/**
	 * @var string	The prefix string
	 */
	public $prefix;

	/**
	 * @var string	The suffix string
	 */
	public $suffix;

	/**
	 * @var string A function to format the numberbox value. Return string value that will display on box
	 */
	public $formatter;

	/**
	 * @var string A function to parse a string. Return numberbox value
	 */
	public $parser;


	public function getCssClass()
	{
		return 'easyui-numberbox';
	}
}

?>