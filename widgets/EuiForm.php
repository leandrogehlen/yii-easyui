<?php 

Yii::import('ext.yii-easyui.widgets.EuiControl');

class EuiForm extends EuiControl
{			
	/**
	 * @var mixed the form action URL (see {@link CHtml::normalizeUrl} for details about this parameter).
	 * If not set, the current page URL is used.
	 */
	public $action='';
	/**
	 * @var string the form submission method. This should be either 'post' or 'get'.
	 * Defaults to 'post'.
	 */
	public $method='post';	
	/**
	 * @var boolean whether to generate a stateful form (See {@link CHtml::statefulForm}). Defaults to false.
	 */
	public $stateful=false;	
	/**
	 * @var mixed form element to get initial input focus on page load.
	 *
	 * Defaults to null meaning no input field has a focus.
	 * If set as array, first element should be model and second element should be the attribute.
	 * If set as string any jQuery selector can be used
	 *
	 * Example - set input focus on page load to:
	 * <ul>
	 * <li>'focus'=>array($model,'username') - $model->username input filed</li>
	 * <li>'focus'=>'#'.CHtml::activeId($model,'username') - $model->username input field</li>
	 * <li>'focus'=>'#LoginForm_username' - input field with ID LoginForm_username</li>
	 * <li>'focus'=>'input[type="text"]:first' - first input element of type text</li>
	 * <li>'focus'=>'input:visible:enabled:first' - first visible and enabled input element</li>
	 * <li>'focus'=>'input:text[value=""]:first' - first empty input</li>
	 * </ul>
	 */
	public $focus;
	/**
	 * @var array additional HTML attributes that should be rendered for the form tag.
	 */
	public $htmlOptions=array();
	
	/**
	 * Renders an HTML label for a model attribute.
	 * This method is a wrapper of {@link CHtml::activeLabel}.
	 * Please check {@link CHtml::activeLabel} for detailed information
	 * about the parameters for this method.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array $htmlOptions additional HTML attributes.
	 * @return string the generated label tag
	 */
	public function label($model,$attribute,$htmlOptions=array())
	{		
		return CHtml::activeLabel($model,$attribute,$htmlOptions);
	}
	
	/**
	 * Renders an HTML label for a model attribute.
	 * This method is a wrapper of {@link CHtml::activeLabelEx}.
	 * Please check {@link CHtml::activeLabelEx} for detailed information
	 * about the parameters for this method.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array $htmlOptions additional HTML attributes.
	 * @return string the generated label tag
	 */
	public function labelEx($model,$attribute,$htmlOptions=array())
	{
		return CHtml::activeLabelEx($model,$attribute,$htmlOptions);
	}
		
	/**
	 * Renders a text field for a model attribute.
	 * This method is a wrapper of {@link EuiValidatebox}.	 
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array $options widget options.
	 * @return string the generated input field
	 */
	public function validateBox($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);			
		return $this->widget('ext.yii-easyui.widgets.EuiValidatebox', $options, true);			
	}
	
	/**
	 * Renders a date field for a model attribute.
	 * This method is a wrapper of {@link EuiDatebox}.	 
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function dateBox($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiDatebox', $options, true);
	}
	
	/**
	 * Renders a datetime field for a model attribute.
	 * This method is a wrapper of {@link EuiDatetimebox}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function dateTimeBox($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiDatetimebox', $options, true);
	}
	
	/**
	 * Renders a numberspinner field for a model attribute.
	 * This method is a wrapper of {@link EuiNumberspinner}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function numberSpinner($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiNumberspinner', $options, true);
	}
	
	/**
	 * Renders a datespinner field for a model attribute.
	 * This method is a wrapper of {@link EuiTimespinner}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function timeSpinner($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiTimespinner', $options, true);
	}
	
	/**
	 * Renders a combobox field for a model attribute.
	 * This method is a wrapper of {@link EuiNumberspinner}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function comboBox($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiCombobox', $options, true);
	}
	
	/**
	 * Renders a combogrid field for a model attribute.
	 * This method is a wrapper of {@link EuiNumberspinner}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function comboGrid($model,$attribute,$options=array())
	{		
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiCombogrid', $options, true);
	}
	
	/**
	 * Renders a combogrid field for a model attribute.
	 * This method is a wrapper of {@link EuiNumberspinner}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array @param array $options widget options
	 * @return string the generated input field
	 */
	public function comboTree($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiCombotree', $options, true);
	}
	

	public function init()
	{
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->id;
		else
			$this->id=$this->htmlOptions['id'];

		if($this->stateful)
			echo CHtml::statefulForm($this->action, $this->method, $this->htmlOptions);
		else
			echo CHtml::beginForm($this->action, $this->method, $this->htmlOptions);
	}
	
	/**
	 * Runs the widget.
	 * This registers the necessary javascript code and renders the form close tag.
	 */
	public function run()
	{
		echo CHtml::endForm();
		
		if(is_array($this->focus))
			$this->focus="#".CHtml::activeId($this->focus[0],$this->focus[1]);
				
		if($this->focus!==null)
		{
			Yii::app()->clientScript->registerScript('EuiForm#focus',"
				if(!window.location.hash)
					$('".$this->focus."').focus();
			");
		}
			
	}
}

?>