<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');
Yii::import('ext.yii-easyui.widgets.EuiDataColumn');
Yii::import('ext.yii-easyui.widgets.EuiLinkbutton');

class EuiDataGrid extends EuiControl
{

	/**
	 * @var boolean	True to auto expand/contract the size of the columns to fit the grid width and prevent horizontal scrolling
	 */
	public $fitColumns = true;

	/**
	 * @var boolean	True to stripe the rows
	 */
	public $striped = true;

	/**
	 * @var string	The method type to request remote data
	 */
	public $method;

	/**
	 * @var boolean	True to display data in one line
	 */
	public $nowrap;

	/**
	 * @var string	Indicate which field is an identity field
	 */
	public $idField;

	/**
	 * @var string	A URL to request data from remote site
	 */
	public $url;

	/**
	 * @var string	When loading data from remote site, show a prompt message
	 */
	public $loadMsg;

	/**
	 * @var boolean	True to show a pagination toolbar on datagrid bottom
	 */
	public $pagination;

	/**
	 * @var boolean	True to show a row number columns
	 */
	public $rownumbers;

	/**
	 * @var boolean	True to allow selecting only one row
	 */
	public $singleSelect;

	/**
	 * @var int When set pagination property, initialize the page number
	 */
	public $pageNumber;

	/**
	 * @var int	When set pagination property, initialize the page size
	 */
	public $pageSize;

	/**
	 * @var When set pagination property, initialize the page size selecting list
	 */
	public $pageList = array();

	/**
	 * @var object	When request remote data, sending additional parameters also
	 */
	public $queryParams;

	/**
	 * @var string	Defines which column can be sorted
	 */
	public $sortName;

	/**
	 * @var string	Defines the column sort order, can only be 'asc' or 'desc'.	asc
	 */
	public $sortOrder;

	/**
	 * @var boolean	Defines if to sort data from server
	 */
	public $remoteSort = true;

	/**
	 * @var boolean	Defines if to show row footer
	 */
	public $showFooter;

	/**
	 * @var number The scrollbar width(when scrollbar is vertical) or height(when scrollbar is horizontal)
	 */
	public $scrollbarSize;

	/**
	 * @var string function Return style such as 'background:red'. The function take two parameter:
	 */
	public $rowStyler;

	/**
	 * @var the row index, start with 0
	 */
	public $rowIndex;

	/**
	 * @var the record corresponding to this row
	 */
	public $rowData;

	/**
	 * @var string function Return the filtered data to display.
	 * The function take one parameter 'data' that indicate the original data.
	 * You can change original source data to standard data format.
	 * This function must return standard data object that contain 'total' and 'rows' properties.
	 */
	public $loadFilter;

	/**
	 * @var array grid column configuration. Each array element represents the configuration
	 * for one particular grid column
	 */
	public $columns=array();

	/**
	 * @var array grid frozen column configuration
	 */
	public $frozenColumns=array();

	/**
	 * @var mixed The top toolbar of datagrid panel. Possible values:
	 * an array, each tool options are same as linkbutton
	 * a selector that indicate the toolbar
	 */
	public $toolbar = array();


	protected function getCssClass()
	{
		return 'easyui-datagrid';
	}

	/**
	 * Convert frozen columns to string represents javascript configuration
	 * @return string
	 */
	protected function frozenColumnsToArray()
	{
		$cols = array();
		foreach ($this->frozenColumns as $col)
			$cols[] = array($col->toArray(false));

		return $cols;
	}

	/**
	 * Render the columns for this datagrid
	 */
	protected function renderColumns()
	{
		echo CHtml::openTag('thead')."\n";
		echo CHtml::openTag('tr')."\n";

		foreach ($this->columns as $col)
			echo CHtml::Tag('th', $col->toOptions(), $col->title)."\n";

		echo CHtml::closeTag('tr')."\n";
		echo CHtml::closeTag('thead')."\n";
	}

	/**
	 * Create toolbar object and initialize them
	 */
	protected function initToolbar()
	{
		if (!empty($this->toolbar) && is_array($this->toolbar))
		{
			$tbar = array();
			foreach ($this->toolbar as $key => $value)
			{
				$item = $this->prepareConfig($value, 'EuiLinkbutton');
				$item = Yii::createComponent($item, $this);
				$item->init();

				$cfg = $item->toArray();
				$cfg['text'] = $item->text;
				$tbar[$key] = $cfg;
			}
			$this->toolbar = "js:".CJavaScript::encode($tbar);
		}
	}

	/**
	 * Creates columns and frozenColumns objects and initializes them.
	 */
	public function init()
	{
		$this->addInvalidOptions('columns');
		$this->initToolbar();
		$this->columns = $this->initCollection($this->columns, 'EuiDataColumn');
		$this->frozenColumns = $this->initCollection($this->frozenColumns, 'EuiDataColumn');
		//parent::init();
	}

	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run()
	{
		$options = $this->toOptions();
		$config = array();

		if (!empty($this->frozenColumns))
			$config['frozenColumns'] = $this->frozenColumnsToArray();

		if (isset($this->loadFilter))
		{
			$config['loadFilter'] = 'js:'.$this->loadFilter;
			unset($options['loadFilter']);
		}

		if (!empty($config))
		{
			$script = EuiJavaScript::encodeId($this->id).".datagrid(\n";
			$script .= CJavaScript::encode($config)."\n";
			$script .= ");\n";
			Yii::app()->getClientScript()->registerScript($this->getId(), $script);
		}

		echo CHtml::openTag('table', $options)."\n";
		$this->renderColumns();
		echo CHtml::closeTag('table')."\n";
	}
}

?>