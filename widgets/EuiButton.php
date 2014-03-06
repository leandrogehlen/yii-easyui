<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiButton extends EuiControl
{
	/**
	 * @var string The button text.
	 */
	public $text;

	/**
	 * @var string A CSS class to display a 16x16 icon on left.
	 */
	public $iconCls;

	/**
	 * @var string A handler function when button is clicked
	 */
	public $handler;

	/**
	 * Prepare hanlder property to render javascript
	 * @throws CException if type of property is invalid
	 */
	protected function initHandler()
	{

		if (!empty($this->handler))
		{
			if (!is_string($this->handler))
				throw new CException ( Yii::t ('easyui', 'Invalid type of property "handler".') );

			if (strpos($this->handler, 'js:') !== 0)
				$this->handler = 'js:'.$this->handler;
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init() {
		$this->initHandler();
		$this->addInvalidOptions('text');
	}

	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::run()
	 */
	public function run()
	{
		$options = $this->toOptions();
		echo CHtml::Tag('button', $options, CHtml::encode($this->text))."\n";
	}
}
?>