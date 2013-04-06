<?php

Yii::import('ext.easyui.widgets.EuiValidatebox');

class EuiDatebox extends EuiValidatebox
{

	/**	 
	 * @var number The drop down calendar panel width
	 */
	public $panelWidth;	
	/**	 
	 * @var number The drop down calendar panel height
	 */
	public $panelHeight;	
	
	/**	 
	 * @var string The text to display for the current day button
	 */
	public $currentText;
	
	/**	 
	 * @var string The text to display for the close button
	 */
	public $closeText;	
	
	/**	 
	 * @var string	The text to display for the ok button
	 */
	public $okText;
		
	/**	
	 * @var boolean	When true to disable the field
	 */
	public $disabled = false;

	/**	
	 * @var string A function to format the date, the function take a 'date' parameter and return a string value
	 */
	public $formatter;	
	
	/**	 
	 * @var string A function to parse a date string, the function take a 'date' string and return a date value. 
	 */
	public $parser;		
	
	public function getCssClass()
	{
		return 'easyui-datebox';
	}		
}
?>