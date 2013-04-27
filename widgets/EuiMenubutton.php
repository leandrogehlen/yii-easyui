<?php 

Yii::import('ext.yii-easyui.widgets.EuiContainer');
Yii::import('ext.yii-easyui.widgets.EuiLinkbutton');

class EuiMenubutton extends EuiContainer
{		
	
	public $inline = true;
	
	public $buttons = array();
			
	public function init()
	{
		parent::init();
		$this->buttons = $this->initCollection($this->buttons, 'EuiLinkbutton');
	}
			
	public function run()
	{		
		$options = $this->toOptions();
		
		unset($options['content']);
		unset($options['inline']);
		
		echo CHtml::openTag('div', $options)."\n";
		echo CHtml::openTag('table', array('cellpadding'=>1, 'cellspacing'=>0, 'style'=>'width:100%'))."\n";
		echo CHtml::openTag('tr')."\n";
		
		echo CHtml::openTag('td', array('valign'=>'middle'))."\n";		
		foreach ($this->buttons as $btn)		
			$btn->run();
		echo CHtml::closeTag('td')."\n";
		
		echo CHtml::openTag('td', array('align'=>'right', 'valign'=>'middle'))."\n";		
		$this->renderItems();		
		echo CHtml::closeTag('td')."\n";
								
		echo CHtml::closeTag('tr')."\n";
		echo CHtml::closeTag('table')."\n";
		echo CHtml::closeTag('div')."\n";		
	}
}

?>