<?php
	require_once('mysql_connect.php');

	$start = $_REQUEST['start'];
	$end = $_REQUEST['end'];

//error routine to check that dates are not empty

	if($start == '' || $end == '') {
		echo "Please choose a date</br>";
		echo "<input type='button' value='Correct date' onclick='history.go(-1)'>";
		die;
	}

//validate the date entered is 10 digits

	if((strlen($start)<8)OR(strlen($start)>8)){
		echo "Enter the date in 'yyyymmdd' format<br />";
		echo "<input type='button' value='Correct date' onclick='history.go(-1)'>";
		die;
	}
	if((strlen($end)<8)OR(strlen($end)>8)){
		echo "Enter the date in 'yyyymmdd' format<br />";
		echo "<input type='button' value='Correct date' onclick='history.go(-1)'>";
		die;
	}

	require_once('mysql_query_dateReport.php');

	echo "Invoice List:";
	echo "<table border='1'>";
	echo "<td>Date</td><td>Customer Name</td><td>Type of Keg</td><td>Size of Keg</td><td>Invoice Number</td><td>Quantity of Kegs</td><td>Price</td>";
	for ($i = 0; $i < $numberOfInvoices; $i++) {
		echo "<tr>";
		echo "<td>" . $date[$i] . "</td><td>" . $name[$i] . "</td><td>" . $type[$i] . "</td><td>" . $size[$i] . "</td><td>" . $invoicenum[$i] . "</td><td>" . $qty[$i] . "</td><td>$" . $price[$i] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
?>