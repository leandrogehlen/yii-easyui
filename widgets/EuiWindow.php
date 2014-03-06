<?php
Yii::import('ext.yii-easyui.widgets.EuiPanel');

class EuiWindow extends EuiPanel
{

	/**
	 * @var int Window z-index,increase from it
	 */
	public $zIndex;

	/**
	 * @var boolean	Defines if window can be dragged
	 */
	public $draggable;

	/**
	 * @var boolean	Defines if window can be resized
	 */
	public $resizable;

	/**
	 * @var boolean	If set to true,when window show the shadow will show also
	 */
	public $shadow;

	/**
	 * @var boolean	Defines how to stay the window, true to stay inside its parent, false to go on top of all elements.	false
	 */
	public $inline;

	/**
	 * @var boolean	Defines if window is a modal window.
	 */
	public $modal;

	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	public function getCssClass()
	{
		return 'easyui-dialog';
	}
}
?>