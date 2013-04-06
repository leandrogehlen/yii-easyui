<?php

Yii::import('ext.yii-easyui.widgets.EuiContainer');
Yii::import('ext.yii-easyui.widgets.EuiMenuitem');

class EuiMenu extends EuiContainer 
{	
	/**	 
	 * @var number	Menu z-index style,increase from it.
	 */
	public $zIndex;	
	
	/**	 
	 * @var number	Menu left position.
	 */
	public $left;	
	
	
	/**
	 * @var number Menu top position
	 */
	public $top;	
	
	/**	 
	 * @var number The minimum width of menu.
	 */
	public $minWidth;	
	
	
	protected function getCssClass()
	{
		return 'easyui-menu';
	}
	
	public function getDefaultItemClass() 
	{
		return 'EuiMenuitem';		
	}
	
	public function __construct($owner=null)
	{
		parent::__construct($owner);
		$this->inline = true;
	}
	
	/*public function run() 
	{
		echo CHtml::openTag('div', $this->toArray())."\n";
		$this->renderItems();		
		echo CHtml::closeTag('div')."\n";
	}*/
}