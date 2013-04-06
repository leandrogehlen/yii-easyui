<?php 

Yii::import('ext.yii-easyui.widgets.EuiContainer');

class EuiPanel extends EuiContainer
{
	/**	 
	 * @var string The title text to display in panel header
	 */
	public $title;
	
	/**	 
	 * @var string A CSS class to display a 16x16 icon in panel
	 */
	public $iconCls;
	
	/**	 
	 * @var string Add a CSS class to the panel
	 */
	public $cls;
	
	/**
	 * @var string Add a CSS class to the panel header
	 */
	public $headerCls;
	
	/**	 
	 * @var string Add a CSS class to the panel body
	 */
	public $bodyCls;
	
	/**	 
	 * @var bool When true to set the panel size fit it's parent container
	 */
	public $fit;
	
	/**	 
	 * @var boolean Defines if to show panel border
	 */
	public $border;
	
	/**	 
	 * @var boolean If set to true,the panel will be resize and do layout when created
	 */
	public $doSize;	
	
	/**	 
	 * @var boolean	If set to true, the panel header will not be created
	 */
	public $noheader;	
	
	/**	 
	 * @var string	The panel body content
	 */
	public $content;
	
	/**	 
	 * @var boolean	Defines if to show collapsible button
	 */
	public $collapsible = false;	
	
	/**	 
	 * @var boolean	Defines if to show minimizable button
	 */	
	public $minimizable = false;
	
	/**	 
	 * @var boolean	Defines if to show maximizable button
	 */
	public $maximizable = false;
	
	/**	 
	 * @var boolean	Defines if to show closable button
	 */
	public $closable;	
	
	/**	 	
	 * @var array Custom tools, every tool can contain two properties: iconCls and handler
	 */
	public $tools = array();	

	/**	 
	 * @var boolean	Defines if the panel is collapsed at initialization
	 */
	public $collapsed;

	/**	 
	 * @var boolean	Defines if the panel is minimized at initialization
	 */
	public $minimized;	

	/**	 
	 * @var boolean	Defines if the panel is maximized at initialization
	 */
	public $maximized;

	/**	 
	 * @var boolean	Defines if the panel is closed at initialization
	 */
	public $closed;

	/**	 
	 * @var string	A URL to load remote data and then display in the panel
	 */
	public $href;

	/**	 
	 * @var boolean	True to cache the panel content that loaded from href
	 */
	public $cache;

	/**	 
	 * @var string	When loading remote data show a message in the panel
	 */
	public $loadingMessage;
	
	/**	 
	 * @var string Define the id element content buttons
	 */
	public $buttons;
			
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-panel';
	}
	
}

?>