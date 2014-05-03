<?php

Yii::import('ext.yii-easyui.widgets.EuiDataGrid');

class EuiTreeGrid extends EuiDataGrid
{

	/**
	 * @var string Defines the tree node field
	 */
	public $idField;

	/**
	 * @var string	Defines the tree node field. required
	 */
	public $treeField;

	/**
	 * @var boolean	Defines if to show animation effect when node expand or collapse
	 */
	public $animate;


	protected function getCssClass()
	{
		return 'easyui-treegrid';
	}
}