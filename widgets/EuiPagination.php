<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');

class EuiPagination extends EuiWidget {
	
	/**	 
	 * @var integer The total records, which should be setted when pagination is created.
	 */
	public $total;
	
	/**	 
	 * @var integer The page size
	 */
	public $pageSize;
	
	/**	 
	 * @var integer Show the page number when pagination is created.
	 */
	public $pageNumber;
	
	/**	 
	 * @var integer User can change the page size. The pageList property defines how many size can be changed.
	 */
	public $pageList;
	
	/**	
	 * @var boolean Defines if data is loading.
	 */
	public $loading = false;
		
	/**
	 * @var boolean	Defines if to show page list.
	 */
	public $showPageList;
	
	/**
	 * @var boolean	Defines if to show refresh button.
	 */
	public $showRefresh;
	
	/**
	 * @var string	Show a label before the input component.
	 */
	public $beforePageText;
	
	/**
	 * @var string	Show a label after the input component.
	 */
	public $afterPageText;
	
	/**
	 * @var string	Display a page information.
	 */
	public $displayMsg;
	
	public $buttons=array();
	
	
	function getCssClass()
	{
		return 'easyui-pagination';
	}
	
	function run() {
		$options = $this->toOptions();
		unset($options['buttons']);
		
		if ($this->buttons)		
			$btns = "buttons:".CJavaScript::encode($this->buttons);		
										
		if (isset($options['data-options']))
			$options['data-options'] = $btns .",". $options['data-options'];
		else 						
			$options['data-options'] = $btns;
				
		echo CHtml::Tag('div', $options)."\n";		
	}
	
}

?>