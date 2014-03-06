<?php

Yii::import('ext.yii-easyui.widgets.EuiDataGrid');
Yii::import('ext.yii-easyui.widgets.EuiDataColumn');


class EuiCombogrid extends EuiDataGrid
{

	/**
	 * @var string Defines attribute name of input
	 */
	public $name;

	/**
	 * @var number The drop down panel width
	 */
	public $panelWidth;

	/**
	 * @var boolean	Defines if the field should be inputed
	 */
	public $required;

	/**
	 * @var string,array Defines the field valid type, such as email, url, etc. Possible values are:
	 */
	public $validType;

	/**
	 * @var number Delay to validate from the last inputting value
	 */
	public $delay;

	/**
	 * @var string	Tooltip text that appears when the text box is empty
	 */
	public $missingMessage;

	/**
	 * @var string	Tooltip text that appears when the content of text box is invalid
	 */
	public $invalidMessage;

	/**
	 * @var string Defines the position of tip message when the content of text box is invalid. Possible values: 'left','right'
	 */
	public $tipPosition;

	/**
	 * @var	string The message displayed when datagrid load remote data
	 */
	public $loadMsg;

	/**
	 * @var string The id field name
	 */
	public $idField;

	/**
	 * @var string The text field to be displayed in textbox
	 */
	public $textField;

	/**
	 * @var string	 Defines how to load datagrid data when text changed. Set to 'remote' if the combogrid loads from server.
	 * When set to 'remote' mode, what the user types will be sent as the http request parameter named 'q' to server to retrieve the new data
	 */
	public $mode = 'remote';

	/**
	 * @var string Defines how to select the local data when 'mode' is set to 'local'. Return true to select the row.
	 */
	public $filter;


	protected function registerColumnsScript()
	{
		$js = array();
		foreach ($this->columns as $col)
		{
			$js[] = $col->toArray();
		}

		$js = EuiJavaScript::encodeId($this->getId()).'.combogrid({columns:['.CJavaScript::jsonEncode($js).']});';
		Yii::app()->getClientScript()->registerScript($this->getId(), $js);
	}

	public function getCssClass()
	{
		return 'easyui-combogrid';
	}

	public function init()
	{
		parent::init();
		$this->addInvalidOptions('name');
	}

	public function run()
	{
		$options = $this->toOptions();
		$options['name'] = $this->name;

		$this->registerColumnsScript();
		echo CHtml::Tag('input', $options);
	}
}