<?php 

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiButton extends EuiControl
{	
	/**	 
	 * @var string
	 */
	public $text;
					
	/**	 
	 * @var string
	 */
	public $iconCls;
					
	/**	 
	 * @var string
	 */
	public $onClick;
						
	public function run()
	{
		$options = $this->toOptions();											
		unset($options['text']);		
		echo CHtml::Tag('button', $options, CHtml::encode($this->text))."\n";		
	}	
}
?>