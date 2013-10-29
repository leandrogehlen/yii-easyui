<?php 

Yii::import('ext.yii-easyui.widgets.EuiWidget');

class EuiRegion extends EuiWidget	
{	
	const NORTH = 'north';
	const EAST = 'east';
	const WEST = 'west';
	const CENTER = 'center';
	const SOUTH = 'south';
	
	/**	 
	 * @var string the location of region. Possible values are
	 * - {@link EuiRegion::NORTH}
	 * - {@link EuiRegion::EAST}
	 * - {@link EuiRegion::WEST}
	 * - {@link EuiRegion::SOUTH}
	 * - {@link EuiRegion::CENTER}
	 */
	public $region;
	
	/**
	 * @var string The title text to display in the panel header (defaults to ''). 
	 * When a title is specified the header element will automatically be created and displayed unless header 
	 * is explicitly set to false. If you don't want to specify a title at config time, but you may want one later, 
	 * you must either specify a non-empty title (a blank space ' ' will do)	 	 
	 */
	public $title;
	
	/**
	 * @var bool True to display a SplitBar between this region and its neighbor, 
	 * allowing the user to resize the regions dynamically (defaults to true)	 	 
	 */
	public $split;						
}

?>