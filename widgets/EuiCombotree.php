<?php 

Yii::import('ext.yii-easyui.widgets.EuiContainer');

class EuiCombotree extends EuiContainer {
	
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
	 * @var boolean	Defines if to show tree lines
	 */
	public $lines;

	/**	 
	 * @var boolean	Defines if to enable drag and drop
	 */
	public $dnd;

	/**	 
	 * @var array	The node data to be loaded
	 */
	public $data = array();
	
	
	protected function getCssClass()
	{
		return 'easyui-combotree';
	}
		
	public function run()
	{
		echo CHtml::openTag('select', $this->toOptions());
		echo CHtml::closeTag('select');
	}
}

?>