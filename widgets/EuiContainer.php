<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiContainer extends EuiControl {
			
	/**	  
	 * @var array of components
	 */
	public $items = array();
		
	
	/**
	 * Render the items for this container	 
	 * @param array $items
	 */
	protected function renderItems()
	{				
		foreach ($this->items as $it){
			
			if (is_object($it))				
				$it->run(); 																	
			else if (is_array($it))
			{																				
				echo CHtml::openTag('div', $it)."\n";															
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
		$this->addInvalidOptions(array('inline', 'items'));
		$this->initItems($this);		
	}
		
	
	public function run()
	{							
		$this->renderItems();					
	}
}

?>