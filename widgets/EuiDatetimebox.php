<?php

Yii::import('ext.easyui.widgets.EuiDatebox');

class EuiDatetimebox extends EuiDatebox
{

	/**	 
	 * @var boolean	Defines if to display the second information
	 */
	public $showSeconds;
	
	/**	 
	 * @var string	The time separator between hour and minute and second
	 */
	public $timeSeparator;	
	
	public function getCssClass()
	{
		return 'easyui-datetimebox';
	}		
}
?>