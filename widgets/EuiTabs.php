<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');
Yii::import('ext.yii-easyui.widgets.EuiTabpanel');

class EuiTabs extends EuiControl {
	
	/**	 
	 * @var boolean When true to set the panel size fit it's parent container.
	 */
	public $fit;
	
	/**
	 * @var array page configuration. Each array element represents the configuration.
	 * the 'class' element specifies the page class name (only {@link EuiTabPanel}).
	 * Is not necessary specify the 'class' element 	  	
	 */
	public $pages = array();
		
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-tabs';
	}		
	
	/**
	 * Creates pages objects and initializes them.
	 */
	public function init()
	{
		parent::init();		
		$this->pages = $this->initCollection($this->pages, 'EuiTabpanel');		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run()
	{
		echo CHtml::openTag('div', $this->toOptions())."\n";	
		foreach ($this->pages as $page)
			$page->run();				
		echo CHtml::closeTag('div')."\n";	
	}
}

?>