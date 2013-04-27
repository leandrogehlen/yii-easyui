<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiContainer extends EuiControl {
	
	/**
	 * Display itens inline
	 * @var boolean
	 */
	public $inline;
	
	/**	  
	 * @var array of components
	 */
	public $items = array();
	
	/**	 
	 * @var string the content HTML
	 */
	public $content;
	
	
	public function __construct($owner=null)
	{
		parent::__construct($owner);		
		$this->addInvalidProperties(array(		
			'inline'
		));
	}
	
	/**
	 * Render the items for this container	 
	 * @param array $items
	 */
	protected function renderItems()
	{					
		foreach ($this->items as $it){
			if (is_object($it))	
			{
				if ($this->inline === true || $this->inline === "true")
					$it->run(); 
				else{
					echo CHtml::openTag('div')."\n";
					$it->run();
					echo CHtml::closeTag('div')."\n";
				}									
			}	
			else if (is_array($it))
			{				
				$content = null;				
				if (isset($it['content']))
				{ 									
					$content = $it['content'];
					unset($it['content']);
				}													
				echo CHtml::openTag('div', $it)."\n";							
				echo $content;					
				echo CHtml::closeTag('div', $it)."\n";
			}				
		}					 	
	}
	
	/**
	 * Return the name of item class.If not definied class in item of elements 
	 * @return string
	 */
	protected  function getDefaultItemClass()
	{
		return null;	
	}
 
	/**
	 * Creates items objects and initializes them.
	 */
	protected function initItems($parent)
	{					
		if (property_exists(get_class($parent), 'items'))
		{					
			foreach($parent->items as $i => $item)
			{																 									
				if (is_array($item))
				{					
					if (!isset($item['class']) && $this->getDefaultItemClass()!== null)
						$item['class'] = $this->getDefaultItemClass();

					if (isset($item['class']))
					{
						$newItem = Yii::createComponent($item, $parent);
						$newItem->init();
						$parent->items[$i]= $newItem;
						$this->initItems($newItem);
					}
				}
			}
		}
	}
	
	
	/**
	 * Initializes the container.
	 * This method will initialize required property values and instantiate {@link items} objects.
	 */
	public function init()
	{		
		parent::init();
		$this->initItems($this);			
	}
		
	
	public function run()
	{	
		$options = $this->toOptions();
		unset($options['content']);
		unset($options['inline']);
		
		echo CHtml::openTag('div', $options)."\n";
		echo $this->content."\n";	
		$this->renderItems();
		echo CHtml::closeTag('div')."\n";				
	}
}

?>