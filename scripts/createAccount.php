<?php
	require_once ('mysql_connect.php');

	$custName = $_REQUEST['custName'];
	$address1 = $_REQUEST['address1'];
	$address2 = $_REQUEST['address2'];
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$zip = $_REQUEST['zip'];

	$custResult = mysql_query ("INSERT INTO customers (name) VALUES ('$custName')");
	$custAddressResult = mysql_query ("SELECT custid FROM customers WHERE name='$custName'");
	while($row = mysql_fetch_array($custAddressResult)) {
		$custid = $row['custid'];
   }
 
	$addressResult = mysql_query ("INSERT INTO address (address1, address2, city, state, zip, custid) VALUES ('$address1', '$address2', '$city', '$state', '$zip', '$custid')");

	if ($custResult) {
		echo "Customer successfully added <br />";
	} else {
		echo "Error creating customer " . mysql_error();
	}

	if ($addressResult) {
		echo "Customer address successfully added <br />";
	} else {
		echo "Error creating customer's address " . mysql_error();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
     <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		Would you like to <a href="selectCustomerForOrder.php">place an order</a> or <a href="../index.php">return to main menu</a>?
	</body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.2<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>
