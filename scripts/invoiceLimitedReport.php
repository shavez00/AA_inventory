<?php
//Database query and load results into arrays for the for loop
//require_once ('mysql_connect.php');
	$report = $_REQUEST['limit'];

	switch ($report) {
		case "date":
			header('Location: invoiceDateReport.php');
			
	}

?>