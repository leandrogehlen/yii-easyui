<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');

abstract class EuiControl extends EuiWidget
{
	/**
	 * @var mixed The component width
	 */
	public $width;

	/**
	 * @var mixed The component height
	 */
	public $height;

	/**
	 * @var mixed The component left position
	 */
	public $left;

	/**
	 * @var mixed The component top position
	 */
	public $top;

	public $onclick;

}

?>