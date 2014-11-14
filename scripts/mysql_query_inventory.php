<?php
//Database query and load results into arrays for the for loop	

	$custResult = mysql_query ("SELECT type, size, sum(qty) AS qty FROM inventory GROUP BY type, size");
	while ($row = mysql_fetch_array($custResult)) {
		$size[] = $row['size'];
		$price[] = $row['price'];
		$qty[] = $row['qty'];
		$type[] = $row['type'];
	}

	$custTypeResult = mysql_query ("SELECT DISTINCT type, size FROM inventory");
	while ($row = mysql_fetch_array($custTypeResult)) {
		$kegCount[] = $row['type'];
	}
	
	$numberOfKegs = count($kegCount);

?>