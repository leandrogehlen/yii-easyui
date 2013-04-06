<?php

class EuiController extends CController {	
	
	public $menu=array();
	
	public $breadcrumbs=array();
	
	/**
	 * Registers jquery and EasyUI JavaScript files and the theme CSS file.
	 * @see CController::init()
	 */
	public function init() 
	{
		EuiJavaScript::registerCoreScripts();
	}	
				
	/**
	 * Default action execute where exception ocurred	 
	 */
	public function actionError()
	{            
        $error = Yii::app()->errorHandler->error;

        if($error) {
	    	if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
	    	else
                $this->render('../templates/erro', $error);
        }
    }

    /**
     * Export success operation to readable JSON object
     * @param boolean $success
     */
    public function exportToJSONSuccess($success)
    {
    	return CJSON::encode(array('success' => $success));
    }
    
   	/**
     * Exports an array to a special readable JSON object.     
     * <p>The $total parameter indicates the total number of records. This is useful is case of pagination where
     * the total number of records is needed by the control to create the correct pagination<br/>     
     * @param array $data the array to generate a JSON object from it
     * @param int $total total number of records in the entire data-source
     * @param array $exports attribute names of export
     * @return string Data representation in JSON format
     */
    public function exportToJSONData($data, $total=null, $exports=array())
    {    	        	
    	if(empty($exports))
    	{    		
    		if (is_object($data)) 
    			$model = $data;
    		else if (is_array($data) && !empty($data))
    			$model = current($data);    		
    			  
    		if ($model instanceof ActiveRecordBase)
    		{
    			foreach ($model->attributeExports() as $attr)
    				$exports = array_merge($exports, explode('.', $attr));	
    		}	
    	}
    	
    	if (is_array($data))
    	{
    		$rows = array();
    		foreach ($data as $item)    		    			    				
    			$rows[] = $this->modelDataToArray($item, false, $exports);    		
    			    		    		
    		return CJSON::encode(array('total'=>(isset($total)) ? $total: sizeof($data),'rows'=>$rows));
    	}
    	else
    		return CJSON::encode($this->modelDataToArray($data));         	
    }
        
    /**
     * Convert model to array for export JSON format
     * @param ActiveRecordBase $model
     * @param boolean $hidePk 
     * @param array $exports attribute names of export
     */
    protected function modelDataToArray($model, $hidePk=false, $exports=array())
    {
    	$data = array();    	
    	foreach ($model as $key => $value)    	  		   
    	{    		
    		if ($hidePk && $key == $model->getTableSchema()->primaryKey)    		    		
    			continue;    			    		

    		if (empty($exports) || in_array($key, $exports))
	    		$data[$key] = $value;
    	}    	
    	
    	foreach ($model->relations() as $k => $relation)
    	{    		
    		if ($relation[0] === CActiveRecord::BELONGS_TO)    		
    		{    			    		    			
    			if ((empty($exports) || in_array($k, $exports)) && $model->{$k} !== null)
    				$data = array_merge($data, $this->modelDataToArray($model->{$k}, true, $exports));
    		}
    	}    		    	
    	return $data;
    }   
}
