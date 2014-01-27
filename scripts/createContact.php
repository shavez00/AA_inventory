<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	require_once ('mysql_connect.php');

	$customerid = $_REQUEST['customerid'];
	$first = $_REQUEST['first'];
	$last = $_REQUEST['last'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$hours = $_REQUEST['hours'];

/* duplicate check */

	$custResult = mysql_query ("SELECT name FROM customers WHERE custid='$customerid'");
	$contactResult = mysql_query ("SELECT first, last FROM contacts WHERE first='$first' AND last='$last'");

	while($row = mysql_fetch_array($custResult)) {
		$name = $row['name'];
	}

	while($row = mysql_fetch_array($contactResult)) {
		$firstName = $row['first'];
		$lastName = $row['last'];	
	}

	if (($firstName OR $lastName) AND $name) {
		echo "A contact with that name already exists at this customer <br />";
		echo "Do you want to edit the contact you are trying to create or use the existing one? <br />";
		echo "<input type='button' value='Edit the contact' onclick='history.go(-2);return true;'><br />";
		echo "<input type='button' value='Use existing contact' onclick='history.go(-4);return true;'><br />";
		die;
	}

/* end duplicate check */

	$contact2Result = mysql_query ("INSERT INTO contacts (first, last, phone, email, hours, custid) VALUES ('$first', '$last', '$phone', '$email', '$hours', '$customerid')");

	if ($contact2Result) {
		echo "Contact successfully added <br />";
	} else {
		echo "Error creating customer " . mysql_error();
	}
?>
<html>
    <head>
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