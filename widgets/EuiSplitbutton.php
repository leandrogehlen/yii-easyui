<?php 

Yii::import('ext.yii-easyui.widgets.EuiLinkbutton');

class EuiSplitbutton extends EuiLinkbutton
{	
	/**	 
	 * @var string A selector to create a corresponding menu.
	 */
	public $menu;
	
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	public function getCssClass()
	{
		return 'easyui-splitbutton';
	}
		
}

?>