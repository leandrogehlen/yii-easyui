<?php

Yii::import('ext.yii-easyui.widgets.EuiContainer');

class EuiMenuitem extends EuiContainer 
{	
	
	/**	 
	 * @var string	The item text
	 */
	public $text;
	
	/**
	 * @var string A CSS class to display a 16x16 icon on item left.
	 */
	public $iconCls;

	
	/**	 
	 * @var string	Set page location while clicking the menu item.
	 */
	public $href;

	/**
	 * @var boolean	Defines item is separator
	 */
	public $separator;
		
	/**	 
	 * @var boolean	Defines if to disable the menu item
	 */
	public $disabled;
	
	public function __construct($owner=null)
	{
		parent::__construct($owner);
		$this->addInvalidProperties(array('text'));
		$this->inline = true;
	}
	
	public function getDefaultItemClass() 
	{
		return 'EuiMenuItem';		
	}	
	
	function run() 
	{		
		if ($this->separator)
			echo CHtml::Tag('div', array('class'=>'menu-sep'), '')."\n";
		
		else if (empty($this->items))
			echo CHtml::Tag('div', $this->toOptions(), $this->text)."\n";
		
		else {
			echo CHtml::openTag('div')."\n";
			echo CHtml::Tag('span', $this->toOptions(), $this->text)."\n";
			echo CHtml::openTag('div')."\n";
			$this->renderItems();
			echo CHtml::closeTag('div')."\n";
			echo CHtml::closeTag('div')."\n";
		}
	}
		
}