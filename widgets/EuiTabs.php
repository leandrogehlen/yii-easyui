<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');
Yii::import('ext.yii-easyui.widgets.EuiTabpanel');

class EuiTabs extends EuiControl {
	
	/**	 
	 * @var boolean When true to set the panel size fit it's parent container.
	 */
	public $fit;
			
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-tabs';
	}	
}

?>