<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
     <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = "contact.php" method="POST">
			Select customer that this contact works for:<br />
			<?php
				require_once ('mysql_connect.php');
				require_once ('mysql_select_customer.php');
				require_once ('selectCustomer.php');

				echo "<input type='radio' name='custid' value=''>None of the above<br />"
				
			?>
			<br />
			<fieldset>
				<label for="first">First Name</label>
				<input type="text" name="first" size="20" /><br />
				<label for="last">Last Name</label>
				<input type="text" name="last" size="20" /><br />
				<label for="phone">Phone Number</label>
				<input type="text" name="phone" size="10" /><br	/>
				<label for="email">Email address</label>
				<input type="text" name="email" size="20" /><br />
				<lable for="hours">Hours</lable>
				<input type="text" name="hours" size="2" /><br />
				</fieldset>
			<br />
			<fieldset>				
				<input type="submit" value="Create Contact">
				<input type="reset" value="Reset">
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
          
