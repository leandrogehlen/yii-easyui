<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiProgressbar extends EuiControl
{
	/**	 
	 * @var number	The percentage value.
	 */
	public $value;
		 	
	/**	 
	 * @var string	The text template to be displayed on component.
	 */
	public $text;		
	
	public function getCssClass()
	{
		return 'easyui-progressbar';
	}			
	
	public function run()
	{
		echo CHtml::openTag('div', $this->toOptions())."\n";
		echo CHtml::closeTag('div')."\n";
	}
		
}

?>