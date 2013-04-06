<?php

Yii::import('ext.easyui.widgets.EuiValidatebox');

class EuiSpinner extends EuiValidatebox
{

	/**	 
	 * @var number The width of this component
	 */
	public $width;	
	
	/**	 
	 * @var number The height of this component
	 */
	public $height;	
	
	/**	 
	 * @var string The initialize value.
	 */
	public $value;
		
	/**	 
	 * @var string The minimum allowed value
	 */	
	public $min;
	
	/**	 
	 * @var string The maximum allowed value
	 */
	public $max;
	
	/**	 
	 * @var number The increment value when click spinner button
	 */
	public $increment;	
	
	/**	 
	 * @var boolean	Defines if user can type value directly into the field
	 */
	public $editable;	
	
	/**	 
	 * @var boolean	Defines if to disable the field
	 */
	public $disabled;	
	
	/**	 
	 * @var string A function called when user click the spinner button. The 'down' parameter indicate if the user click the down button.
	 */
	public $spin;		
	
	
	public function getCssClass()
	{
		return 'easyui-spinner';
	}		
}
?>