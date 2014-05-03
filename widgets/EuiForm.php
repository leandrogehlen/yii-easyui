<?php

class EuiForm extends CActiveForm
{
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
		return $this->widget('ext.yii-easyui.widgets.EuiValidateBox', $options, true);
	}

	/**
	 * Renders a number field for a model attribute.
	 * This method is a wrapper of {@link EuiNumberbox}.
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array $options widget options.
	 * @return string the generated input field
	 */
	public function numberBox($model,$attribute,$options=array())
	{
		CHtml::resolveNameID($model,$attribute,$options);
		return $this->widget('ext.yii-easyui.widgets.EuiNumberBox', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiDateBox', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiDatetimeBox', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiNumberSpinner', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiTimeSpinner', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiComboBox', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiComboGrid', $options, true);
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
		return $this->widget('ext.yii-easyui.widgets.EuiComboTree', $options, true);
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