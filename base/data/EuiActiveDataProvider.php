<?php

Yii::import('system.web.CActiveDataProvider');
Yii::import('ext.yii-easyui.base.data.EuiPagination');
Yii::import('ext.yii-easyui.base.data.EuiSort');

class EuiActiveDataProvider extends CActiveDataProvider
{
	/**
	 * @see CActiveDataProvider::__construct($modelClass,$config)
	 */
	public function __construct($modelClass,$config=array())
	{
		parent::__construct($modelClass, $config);
		
		$this->setPagination(array(
			'class' => 'EuiPagination'
		));
		
		$this->setSort(array(
			'class' => 'EuiSort',			
		));
	}
}