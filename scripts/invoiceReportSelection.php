<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = 'invoiceLimitedReport.php' method='POST'>
		Limit invoice list:
		<select name="limit">
			<option value="date">Date</option>
			<!---<option value="cust">Customer</option>
			<option value="type">Keg Type</option>
			<option value="size">Keg Size</option>---->
		</select><br />
		<input type='submit' value='Customize Report'><br /><br />
		<?php
			require_once ('mysql_connect.php');

			require_once ('mysql_query_invoiceList.php');

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
 	</body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.2<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>