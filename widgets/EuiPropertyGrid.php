<?php

Yii::import('ext.yii-easyui.widgets.EuiDataGrid');

class EuiPropertyGrid extends EuiDataGrid
{

	/**
	 * @var boolean	Defines if to show property group.
	 */
	public $showGroup;

	/**
	 * @var string	Defines the group field name.
	 */
	public $groupField;

	/**
	 * @var string Defines how to format the group value. This function takes following parameters:
	 * group: the group field value.
     * rows: the rows belong to its group.
	 */
	public $groupFormatter;


	protected function getCssClass()
	{
		return 'easyui-propertygrid';
	}
}