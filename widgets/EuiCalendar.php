<?php

Yii::import('ext.easyui.widgets.EuiControl');

class EuiCalendar extends EuiControl
{	
		
	/**	 
	 * @var boolean	When true to set the calendar size fit it's parent container
	 */
	public $fit;	
	
	/**	 
	 * @var boolean	Defines if to show the border
	 */
	public $border;	
	
	/**	 
	 * @var number	Defines the first day of week. Sunday is 0, Monday is 1, ...
	 */
	public $firstDay;	
	
	/**	 
	 * @var array The list of week to be showed. ['S','M','T','W','T','F','S']
	 */
	public $weeks;

	/**	 
	 * @var array The list of month to be showed. ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	 */
	public $months;	
	
	/**	 
	 * @var number The year of calendar
	 */
	public $year;	
	
	/**	 
	 * @var number The month of calendar. current month, start with 1
	 */
	public $month;	
	
	/**	 
	 * @var Date The current date
	 */
	public $current;
	
	public function getCssClass()
	{
		return 'easyui-slider';
	}		
}
?>