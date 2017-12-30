<?php
<html>
<head>
<title>Agenda</title>

function draw_calendar($month,$year){

	// Draw table for Calendar 
	$calendar = '&lt;table cellpadding="0" cellspacing="0" class="calendar"&gt;';

	// Draw Calendar table headings 
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '&lt;tr class="calendar-row"&gt;&lt;td class="calendar-day-head"&gt;'.implode('&lt;/td&gt;&lt;td class="calendar-day-head"&gt;',$headings).'&lt;/td&gt;&lt;/tr&gt;';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '&lt;tr class="calendar-row"&gt;';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x &lt; $running_day; $x++):
		$calendar.= '&lt;td class="calendar-day-np"&gt; &lt;/td&gt;';
		$days_in_this_week++;
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day &lt;= $days_in_month; $list_day++):
		if($list_day==date('d') &amp;&amp; $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '&lt;td class="calendar-day '.$currentday.'"&gt;';
		
			// Add in the day number
			if($list_day&lt;date('d') &amp;&amp; $month==date('n'))
			{
				$showtoday='&lt;strong class="overday";
	
				</head>
</html>
			?>