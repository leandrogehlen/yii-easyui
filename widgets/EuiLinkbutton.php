<?php 

Yii::import('ext.yii-easyui.widgets.EuiButton');

class EuiLinkbutton extends EuiButton
{
	public $url = '#';
	
	/**
	 * True to show a plain effect.
	 */
	public $plain = true;
	
	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	public function getCssClass()
	{
		return 'easyui-linkbutton';
	}
	
	public function run()
	{						
		$options = $this->toArray();
		unset($options['text']);
		unset($options['inline']);																				
		unset($options['url']);
		echo CHtml::link(CHtml::encode($this->text), CHtml::normalizeUrl($this->url), $options)."\n";						
	}	
}

?>