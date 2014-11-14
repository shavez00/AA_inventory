<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = "createContact.php" method="POST">
<?php
	require_once ('mysql_connect.php');
	
	$customerid = $_REQUEST['custid'];
	$first = $_REQUEST['first'];
	$last = $_REQUEST['last'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$hours = $_REQUEST['hours'];

	require_once ('mysql_select_customer.php');

	if ($customerid == "") {
		echo "No existing customer account selected.  You will be redirected to the create customer account form. <br />";
		echo "If you are not redirected, click <a href='../address.html'>here</a>";
		echo '<meta http-equiv="refresh" content="5; url=../address.html" />';
	} 

	if ($first == "" OR $last == "" OR $email == "" OR $hours == "") {
		echo "Please complete the form. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	}

	$search = array("(", ")", "-", ".", " ");
	$phone = str_replace($search, "", $phone);
	if (is_numeric($phone)) {$z = strlen($phone);}
	if ($z != 10) {
		echo "Please enter 10 digit phone number. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	}

	preg_match('/(?P<name>\w+)@(?P<domain>\w+).(?P<tld>\w+)/', $email, $matches);

	$pos = strpos($email, "@");
	$pos2 = strpos($email, ".");
	
	if ($pos === false) {
		echo "Please enter a valid email address. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	} else {
		switch ($matches[tld])  {
			case "com":
			case "net":
			case "org";
				break;
			default:
				echo "Please enter a valid email address. <br />";
				echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
				die;
		}
	}
	
	if ($pos2 === false) {
		echo "Please enter a valid email address. <br />";
		echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
		die;
	} else {
		switch ($matches[tld])  {
			case "com":
			case "net":
			case "org";
				break;
			default:
				echo "Please enter a valid email address. <br />";
				echo '<input type="button" value="Adjust entry" onclick="history.go(-1);return true;">';
				die;
		}
	}
?>
		<p>Here's a record of what you have entered</p>
		<p>
		Contact's Company: <?php for ($i = 0; $i < $numberOfCustomers; $i++) { if ($customerid == $custid[$i]) {echo $name[$i];}} ?><br />
		First Name: <?php echo $first;?><br />
		Last Name: <?php echo $last;?><br />
		Phone Number: <?php echo $phone;?><br />
		Email Address: <?php echo $email;?><br />
		Hours contact is available: <?php echo $hours;?><br />
		</p><br />
			Is this correct?
			<fieldset>
				<input type	="hidden" name="customerid" value="<?php echo $customerid;?>">
				<input type ="hidden" name="first" value="<?php echo $first;?>">
				<input type ="hidden" name="last" value="<?php echo $last;?>">
				<input type ="hidden" name="phone" value="<?php echo $phone;?>">
				<input type ="hidden" name="email" value="<?php echo $email;?>">
				<input type ="hidden" name="hours" value="<?php echo $hours;?>">
				<input type ='submit' value='Yes'><input type='button' value='No' onclick='history.go(-1);return true;'>
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