<?php
	$invoiceDateList = mysql_query ("SELECT orders.date, orders.invoicenum, customers.name, orders.type, orders.size, orders.quantity, orders.price FROM orders INNER JOIN customers ON customers.custid = orders.custid WHERE orders.date >" . $start . " AND orders.date <" . $end . " ORDER BY orders.invoicenum");
	
	while ($row = mysql_fetch_array($invoiceDateList)) {
		$date[] = $row['date'];
		$invoicenum[] = $row['invoicenum'];
		$name[] = $row['name'];
		$type[] = $row['type'];
		$size[] = $row['size'];
		$qty[] = $row['quantity'];
		$price[] = $row['price'];
	}
	
	$numberOfInvoices = count($date);
?>

	