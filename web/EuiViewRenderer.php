<?php

/**
 * @author Leandro Guindani Gehlen
 * @author Qiang Xue <leandrogehlen@gmail.com>
 * @since 1.1.8
 */
class MarkupViewRenderer extends CViewRenderer
{
	private static $_counter=0;

	private $_sourceFile;

	/**
	 * Parses the source view file and saves the results as another file.
	 * This method is required by the parent class.
	 * @param string $sourceFile the source view file path
	 * @param string $viewFile the resulting view file path
	 */
	protected function generateViewFile($sourceFile,$viewFile)
	{
		$this->_sourceFile=$sourceFile;
		$input=file_get_contents($sourceFile);

		$pattern = array('/(<|<\/)(com|script|array|view|item|attr):(\w+)/','/<%(.*?)%>/','/class="(.*?)"/');
		$replacement = array('${1}${2}_${3}', '".${1}."', 'cssClass="${1}"');
		$input=preg_replace($pattern, $replacement, $input);
		//file_put_contents($viewFile,$input);

		$xmldoc = new DOMDocument('1.0');
		$xmldoc->loadXML($input);

		$output = $this->processNode($xmldoc->firstChild);
		$output = preg_replace('/\(,/', '(', $output);

		file_put_contents($viewFile,$this->generatePhpCode($output));
	}

	/**
	 * @param DOMNode $node
	 */
	protected function processNode($node)
	{
		$result = "";

		if($node->nodeType == XML_TEXT_NODE)
			$result = $node->nodeValue;
		else {
			if($node->hasAttributes())
				$result .= $this->processAttributes($node->attributes);

			if($node->hasChildNodes())
			{
				foreach ($node->childNodes as $child)
				{
					if($child->nodeName != '#text')
					{
						if (strpos($child->nodeName,'item_')===0)
							$child->setAttribute("class", substr($child->nodeName, 5));

						$aux = "array(". $this->processNode($child) .")\n";

						if (strpos($child->nodeName,'script_')===0)
						{
							$postion = $this->getPositionID(substr($child->nodeName, 7));
							$js = '"'.$child->nodeValue.'"';
							$result.= "Yii::app()->getClientScript()->registerScript('js".$postion."', trim(".$js."), ".$postion.");\n";
						}
						else if (strpos($child->nodeName,'com_')===0)
							$result.="\$this->widget('".substr($child->nodeName, 4)."',\n $aux \n);";

						else if (strpos($child->nodeName,'attr_')===0)
							$result .= ",\n'".substr($child->nodeName, 5)."'=> $aux";

						else if (strpos($child->nodeName,'array_')===0)
							$result .= ",\n'".substr($child->nodeName, 6)."'=> $aux";

						else
							$result .= $aux.",";
					}
				}
			}
		}
		return $result;
	}

	/**
	 * @param string $str str
	 */
	private function processAttributes($attributes)
	{
		$result = array();
		foreach ($attributes as $k => $value)
		{
			$attrValue = $value->nodeValue;
			$last = strlen($attrValue) -1;

			if ($attrValue[0] === '@' && $attrValue[1]==='{' && $attrValue[$last]==='}')
				$attrValue = substr($attrValue, 2, $last-2);
			else
				$attrValue = '"'.$attrValue.'"';

			$result[]="'{$k}'=>{$attrValue}";
		}
		return implode($result, ",");
	}

	/**
	 * @param string $code code
	 * @param string $offset offset
	 */
	private function generatePhpCode($code)
	{
		$code=str_replace('__FILE__',var_export($this->_sourceFile,true),$code);
		return "<?php $code ?>";
	}

	private function getPositionID($position)
	{
		switch ($position)
		{
			case 'begin': return 'CClientScript::POS_BEGIN';
			case 'end': return 'CClientScript::POS_END';
			case 'load': return 'CClientScript::POS_LOAD';
			case 'ready': return 'CClientScript::POS_READY';
			default: return 'CClientScript::POS_HEAD';
		}
	}

}