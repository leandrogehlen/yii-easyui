<?php 

Yii::import('ext.easyui.widgets.EuiContainer');

class EuiForm extends EuiContainer
{			
	public $action;
	
	public $method = 'post';

	protected  function getDefaultItemClass()
	{
		return 'EuiInput';	
	}
					
	public function run()
	{		
		echo CHtml::openTag('div', array('class'=>'form'))."\n";
		echo CHtml::openTag('form', $this->toArray())."\n";									

		foreach ($this->items as $item) 
		{
			echo CHtml::openTag('div', array('class'=>'row'))."\n";
			echo CHtml::label($item->label, $item->name)."\n";
			$item->run();
			echo CHtml::closeTag('div')."\n";
		}																	
		echo CHtml::closeTag('form')."\n";				
		echo CHtml::closeTag('div')."\n";				
	}	
}

?>