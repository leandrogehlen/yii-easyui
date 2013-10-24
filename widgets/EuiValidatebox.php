<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiValidatebox extends EuiControl
{
	/**
	 * @var string Defines attribute name of input
	 */
	public $name;
	
	/**	 
	 * @var boolean	Defines if the field should be inputed
	 */
	public $required;	
	
	/**
	 * @var string,array Defines the field valid type, such as email, url, etc. Possible values are:			
	 */
	public $validType;	

	/**	 
	 * @var number Delay to validate from the last inputting value
	 */
	public $delay;	

	/**
	 * @var string	Tooltip text that appears when the text box is empty
	 */
	public $missingMessage;
	
	/**	 
	 * @var string	Tooltip text that appears when the content of text box is invalid
	 */
	public $invalidMessage;	
	
	/**	 
	 * @var string Defines the position of tip message when the content of text box is invalid. Possible values: 'left','right'
	 */
	public $tipPosition;	
	
	
	public function getCssClass()
	{
		return 'easyui-validatebox';
	}
	
	public function init() 
	{
		$this->addInvalidProperties('name');
	}

	public function run() 
	{				
		$options = $this->toOptions();
		$options['name'] = $this->name;
		echo CHtml::Tag('input', $options)."\n";
	}
}

?>