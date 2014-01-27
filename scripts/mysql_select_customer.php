<?php
//Database query and load results into arrays for the for loop	

	$custQuery = "SELECT * FROM customers";
	$custResult = mysql_query ($custQuery);
	while ($row = mysql_fetch_array($custResult)) {
		$name[] = $row['name'];
		$custid[] = $row['custid'];	
	}

	$numberOfCustomers = count($name);
?>