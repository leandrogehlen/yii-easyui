<?php

Yii::import('ext.yii-easyui.widgets.EuiInput');

class EuiSearchbox extends EuiInput
{
	/**	 
	 * @var string The prompt message to be displayed in input box
	 */
	public $prompt;
		 	
	/**	 
	 * @var string The inputed value
	 */
	public $value;
		
	/**	 
	 * @var string The search type menu
	 */
	public $menu;
	
	/**
	 * @var string The searcher function that will be called when user presses the searching button or press ENTER key.
	 * function(value,name)
	 */
	public $searcher;
	
	public function getCssClass()
	{
		return 'easyui-searchbox';
	}
				
	public function run()
	{
		$options = $this->toArray();
		$options['id'] = $this->id;
		
		if (is_array($this->menu)){
			$id = $this->generateId();
			$options['menu'] = EuiJavaScript::encodeRefId($id);
			
			echo CHtml::openTag('div', array('id'=>$id)). "\n";
						
			foreach ($this->menu as $item)
			{			
				$text = $item['text'];	
				unset($item['text']);				
				echo CHtml::tag('div', $item, $text)."\n";
			}
			echo CHtml::closeTag('div'). "\n";
		}
								
		if (isset ($this->title))
			echo CHtml::Tag('label', array('for' => $this->name), $this->title);
														
		echo CHtml::Tag('input', $options, null);				
	}	
}

?>