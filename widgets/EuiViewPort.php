<?php

class EuiViewPort extends EuiLayout
{

	public function run()
	{
		echo CHtml::openTag('body', $this->toOptions())."\n";
		foreach ($this->regions as $region)
			$region->run();
		echo CHtml::closeTag('body')."\n";
	}

}