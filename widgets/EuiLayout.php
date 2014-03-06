<?php

Yii::import('ext.yii-easyui.widgets.EuiWidget');
Yii::import('ext.yii-easyui.widgets.EuiRegion');

class EuiLayout extends EuiWidget {

	/**
	 * (non-PHPdoc)
	 * @see EuiWidget::getCssClass()
	 */
	protected function getCssClass()
	{
		return 'easyui-layout';
	}

	/**
	 * Creates regions objects and initializes them.
	 */
	public function init()
	{
		$this->addInvalidOptions('regions');
		echo CHtml::openTag('div', $this->toOptions())."\n";
	}

	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run()
	{
		echo CHtml::closeTag('div')."\n";
	}

}

?>