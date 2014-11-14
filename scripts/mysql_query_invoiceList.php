<?php
//Database query and load results into arrays for the for loop	

	$invoiceList = mysql_query ("SELECT orders.date, orders.invoicenum, customers.name, orders.type, orders.size, orders.quantity, orders.price FROM orders INNER JOIN customers ON customers.custid = orders.custid ORDER BY `orders`.`invoicenum` DESC");
	while ($row = mysql_fetch_array($invoiceList)) {
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