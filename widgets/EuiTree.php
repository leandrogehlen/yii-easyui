<?php 

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiTree extends EuiControl {
	
	/**	 
	 * @var string	a URL to retrieve remote data
	 */
	public $url;

	/**	 
	 * @var string	The http method to retrieve data
	 */
	public $method;

	/**	 
	 * @var boolean	Defines if to show animation effect when node expand or collapse
	 */
	public $animate;

	/**	 
	 * @var boolean	Defines if to show the checkbox before every node
	 */
	public $checkbox;

	/**	 
	 * @var boolean	Defines if to cascade check
	 */
	public $cascadeCheck;

	/**	 
	 * @var boolean	Defines if to show the checkbox only before leaf node
	 */
	public $onlyLeafCheck;

	/**	 
	 * @var boolean	Defines if to enable drag and drop
	 */
	public $dnd;

	/**	 
	 * @var array	The node data to be loaded
	 */
	public $data = array();
	
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-tree';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */			
	public function run()
	{
		echo CHtml::openTag('ul', $this->toOptions());
		echo CHtml::closeTag('ul')."\n";
	}
}

?>