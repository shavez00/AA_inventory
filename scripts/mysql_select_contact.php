<?php
	$custQuery = "SELECT * FROM contacts";
	$custResult = mysql_query ($custQuery);
	while ($row = mysql_fetch_array($custResult)) {
		$first[] = $row['first'];
		$last[] = $row['last'];
		$fullName[] = $row['first'] . " " . $row['last'];
		$contactid[] = $row['contactid'];
		$custid[] = $row['custid'];
	}
?>