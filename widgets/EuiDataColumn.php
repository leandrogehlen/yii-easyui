<?php

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiDataColumn extends EuiControl
{
	/**	 
	 * @var string	The column title text
	 */
	public $title;

	/**	 
	 * @var string	The column field name
	 */
	public $field;

	/**	 
	 * @var in The width of column
	 */
	public $width;

	/**	 
	 * @var int	Indicate how many rows a cell should take up.
	 */
	public $rowspan;

	/**	 
	 * @var int Indicate how many columns a cell should take up
	 */
	public $colspan;

	/**	 
	 * @var string	Indicate how to align the column data. 'left','right','center' can be used
	 */
	public $align;

	/**	 
	 * @var boolean	True to allow the column can be sorted
	 */
	public $sortable;

	/**	 
	 * @var boolean	True to allow the column can be resized
	 */
	public $resizable;

	/**	 
	 * @var boolean	True to hide the column
	 */
	public $hidden;

	/**	 
	 * @var boolean	True to show a checkbox
	 */
	public $checkbox;

	/**	 
	 * The cell formatter function, take three parameter:
	 * value: the field value.
	 * rowData: the row record data.
	 * rowIndex: the row index.
	 * @var string function javascript
	 */
	public $formatter;
	
	/**	 
	 * The cell styler function, return style string to custom the cell style such as 'background:red'. The function take three parameter:
	 * value: the field value.
	 * rowData: the row record data.
	 * rowIndex: the row index.
	 * @var string function javascript
	 */
	public $styler;
	
	/**	 
	 * The custom field sort function, take two parameters:
	 * a: the first field value.
	 * b: the second field value.
	 * @var string function javascript
	 */
	public $sorter;
	
	/**	 
	 * Indicate the edit type. When string indicates the edit type, when object contains two properties:
	 * type: string, the edit type, possible type is: text,textarea,checkbox,numberbox,validatebox,datebox,combobox,combotree.
	 * options: object, the editor options corresponding to the edit type.
	 * @var
	 */
	public $editor;	
			
}

?>