<?php

Yii::import('system.web.CPagination');

class EuiPagination extends CPagination
{
	
	/**	 
	 * The name of the REQUEST parameter that specifies page size
	 */
	const ROWS_VAR = 'rows';
		
	/**
	 * The name of the REQUEST parameter that specifies currente page
	 */
	const PAGE_VAR = 'page';
	
	/**
	 * @see CPagination::getPageSize()
	 */
	public function getPageSize()
	{
		return (isset($_REQUEST[ self::ROWS_VAR])) ? $_REQUEST[self::ROWS_VAR] : parent::getPageSize();
	}
	
	/**
	 * @see CPagination::getCurrentPage()
	 */
	public function getCurrentPage($recalculate=true)
	{
		$currentPage = (isset($_REQUEST[self::PAGE_VAR])) ? (int)$_REQUEST[self::PAGE_VAR]-1 : 0;
		
		if($this->validateCurrentPage)
		{
			$pageCount=$this->getPageCount();
			if($currentPage>=$pageCount)
				$currentPage=$pageCount-1;
		}
		
		if($currentPage<0)
			$currentPage=0;
		
		return $currentPage;				 		
	}
	
}