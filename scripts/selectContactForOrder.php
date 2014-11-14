<?php
//Database query and load results into arrays for the for loop
	require_once ('mysql_connect.php');
	require_once ('mysql_select_contact.php');

	$customerid = $_REQUEST['custid'];

	$numberOfContacts = count($fullName);

	for ($i = 0; $i < $numberOfContacts; $i++) {
		if ($custid[$i] == $customerid) {
			$validation = 1;
			break;
		} else {
			$validation = 0;
		}
	}

	if ($validation == 0) {
		echo "No contacts exist for this customer, please create a new contact.  You will be redirected to the create contact form. <br />";
		echo "If you are not redirected, click <a href='contactForm.php'>here</a>";
		echo "<meta http-equiv='refresh' content='5; url=contactForm.php' />";
	}
?>

<!-- Begin HTML Page --->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
	<form action = 'selectBeerForOrder.php' method='POST'>
<!--- END HTML Page -->
<?php
	if ($validation == 1) { 
		echo "Select  existing contact that this order is for: <br />";

// For loop to generate radio button list of customers
		for ($i = 0; $i < $numberOfContacts; $i++) {
			if ($custid[$i] == $customerid) {
				echo "<input type='radio' name='contactid' value=" . $contactid[$i] . ">" . $fullName[$i] . "<br />";
		  	}
		}
		echo "<input type='hidden' name='custid' value=" . $customerid . ">";
		echo "<input type='submit' value='Choose types of beer'></form><form action='contactForm.php' mehtod='POST'><input type='submit' value='Create New Contact'></form>";
   	}
?>
 <!--Closing tags for HTML Page --->
	</body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.4<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>
