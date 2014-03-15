<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		Is this an order for a new customer or an existing customer?
		<br />
		<form action="NewCustomer.html" method="POST"><input type="submit" value="New Customer"></form>
		<form action="scripts/selectCustomerForOrder.php"><input type="submit" value="Existing Customer"></form><br />
		<?php
			require_once('scripts/mysql_connect.php');

			require_once('scripts/mysql_query_inventory.php');
	
			echo "Current inventory:";
			echo "<table border='1'>";
			echo "<td>Type of beer</td><td>Keg size</td><td>Quantitiy in stock</td>";
			for ($i = 0; $i < $numberOfKegs; $i++) {
			echo "<tr>";
				echo "<td>" . $type[$i] . "</td><td>" . $size[$i] . "</td><td>" . $qty[$i] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
     </body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.3<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>
          
