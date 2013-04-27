<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');
Yii::import('ext.yii-easyui.widgets.EuiRegion');

class EuiLayout extends EuiWidget {
			
	/**	 
	 * @var array the regions of layout. Possible maximinum 5 regions	
	 */
	public $regions = array();
	
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-layout';
	}
			
	/**
	 * Creates regions objects and initializes them.
	 */
	public function init()
	{
		parent::init();
		$this->regions = $this->initCollection($this->regions, 'EuiRegion');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run()	
	{				
		echo CHtml::openTag('div', $this->toOptions())."\n";
					
		foreach ($this->regions as $region)
			$region->run();		
												
		echo CHtml::closeTag('div')."\n";	
	}
	
}

?>