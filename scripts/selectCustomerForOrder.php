<?php
//Database query and load results into arrays for the for loop
	require_once ('mysql_connect.php');
	require_once ('mysql_select_customer.php');
?>

<!-- Begin HTML Page -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
	<form action = 'selectContactForOrder.php' method='POST'>
		Select  existing customer: <br />
<!-- END HTML Page -->
		
<?php
// For loop to generate radio button list of customers
	require_once ('selectCustomer.php')
?>
 <!--Closing tags for HTML Page -->
 <input type='submit' value='Choose contact'>
		
	</form>
	<form action='../address.html' mehtod='POST'><input type='submit' value='Create New Customer'></form>
    </body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.2<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>