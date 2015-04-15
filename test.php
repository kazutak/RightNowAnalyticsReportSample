<?
	// RightNow Connect
	require_once('ConnectPHP/Connect_init.php');
	Use RightNow\Connect\v1_2 as RNCPHP;
	initConnectAPI();

	$product_id = getURLParm('p');

	if ($product_id)
	{
	    $status_filter = new RNCPHP\AnalyticsReportSearchFilter;
	    $status_filter->Name = 'map_prod_hierarchy';
	    $status_filter->Values = array('1.' . $product_id);

	    $filters = new RNCPHP\AnalyticsReportSearchFilterArray;
	    $filters[] = $status_filter;
	    
	    //$ar = RNCPHP\AnalyticsReport::fetch($this->kk_report_id);
	    $ar = RNCPHP\AnalyticsReport::fetch(127);
	    
	    $arr = $ar->run(0, $filters);

		for ( $i = $arr->count(); $i--; )
		{
			$row = $arr->next();

			print_r($row);
		}
	}

?>

<rn:meta title="#rn:msg:SHP_TITLE_HDG#" template="standard.php" clickstream="standard" login_required="false" />


