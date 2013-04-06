<?php

Yii::import('ext.yii-easyui.widgets.EuiValidatebox');
Yii::import('ext.yii-easyui.widgets.EuiComboitem');

class EuiCombobox extends EuiValidatebox
{
	/**	 
	 * @var string The URL to load list data from remote.
	 */
	public $url;
	
	/**	 
	 * @var string The underlying data value name to bind to this ComboBox.
	 */
	public $valueField;
	
	/**	 
	 * @var The underlying data field name to bind to this ComboBox.
	 */
	public $textField;
	
	/**	 
	 * @var string Defines how to load list data when text changed. Set to 'remote' if the combobox loads from server
	 */
	public $mode;
		
	/**	 
	 * @var integer The drop down panel width.	null
	 */
	public $panelWidth;
	
	/**
	 * @var integer The drop down panel height
	 */
	public $panelHeight;
	
	/**
	 * @var boolean	Defines if support multiple selection
	 */
	public $multiple;
	
	/**	 
	 * @var string	The separator char for text when multiple selection
	 */
	public $separator;
	
	/**	 
	 * @var boolean	Defines if user can type text directly into the field
	 */
	public $editable;
	
	/**	 
	 * @var boolean	Defines if to display the down arrow button
	 */
	public $hasDownArrow;	
	
	/**	  
	 * @var array of EuiComboitem
	 */
	public $options = array();
	
	public function getCssClass()
	{
		return 'easyui-combobox';
	}	
	
	public function init()
	{
		parent::init();
		$this->options = $this->initCollection($this->options, 'EuiComboitem');	
	}
	
	public function run()
	{
		if (empty($this->options))
			parent::run();
		else {
			$options = $this->toArray();
						
			echo CHtml::openTag('select', $options)."\n";			
			foreach ($this->options as $item)
				$item->run();			
			echo CHtml::closeTag('select')."\n";						
		}
	}
}
?>