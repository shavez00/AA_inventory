<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = "createAccount.php" method="POST">
<?php
	require_once ('mysql_connect.php');
	require_once ('mysql_select_customer.php');

	$custName = $_REQUEST['custName'];
	$address1 = $_REQUEST['address1'];
	$address2 = $_REQUEST['address2'];
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$zip = $_REQUEST['zip'];

	if ($custName == "" OR $address1 == "" OR $city == "") {
		echo "Please complete customer name, address and city to continue. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	}

	$state = strtoupper($state);
	$str = strlen($state);
	if ($str != 2) {
		echo "State must be a 2 letter state code. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	}

	if (is_numeric($zip)) {$z = strlen($zip);}
	if ($z != 5) {
		echo "Please enter 5 digit zip code. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	}


	for ($i = 0; $i < $numberOfCustomers; $i++) {
		if ($name[$i] == $custName) {
			$validation = 1;
			break;
		} else {
			$validation = 0;
		}
	}

	if ($validation == 1) {
		echo "This customer exists.  You will be redirected to the main menu. <br />";
		echo "If you are not redirected, click <a href='../index.php'>here</a>";
		echo "<meta http-equiv='refresh' content='5; url=../index.php' />";
	} else {
		echo "<p>Here's a record of what you have entered</p>";
		echo "<p>";
		echo "Name: " . $custName . "<br />";
		echo "Address: " . $address1 . "<br />";
		if ($address2) {echo "Address: " . $address2 . "<br />";}
		echo "City: " . $city . "<br />";
		echo "State: " . $state . "<br />";
		echo "Zip: " . $zip . "<br />";
		echo "</p><br />";
		echo "Is this correct?";
	}
?>
			<fieldset>
				<input type ="hidden" name="custName" value="<?php echo $custName;?>">
				<input type ="hidden" name="address1" value="<?php echo $address1;?>">
				<input type ="hidden" name="address2" value="<?php echo $address2;?>">
				<input type ="hidden" name="city" value="<?php echo $city;?>">
				<input type ="hidden" name="state" value="<?php echo $state;?>">
				<input type ="hidden" name="zip" value="<?php echo $zip;?>">
				<?php if ($validation !== 1) { echo "<input type='submit' value='Yes' ><input type='button' value='No' onclick='history.go(-1);return true;'>";}?>
			</fieldset>
		</form>
	</body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.2<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>