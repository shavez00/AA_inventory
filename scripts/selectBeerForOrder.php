<?php
//Database query and load results into arrays for the for loop
	require_once ('mysql_connect.php');

	$custid = $_REQUEST['custid'];
	$contactid = $_REQUEST['contactid'];
	
	$kegQuery = "SELECT distinct type FROM inventory";
	$kegResult = mysql_query ($kegQuery);

	while ($row = mysql_fetch_array($kegResult)) {
		$kegType[] = $row['type'];
	}

	$numberOfKegTypes = count($kegType);

	if(is_null($contactid)) {
		echo "Please choose a contact</br>";
		echo "<button onclick='history.go(-1)'>Choose a contact</button>";
		die;
	}

?>

<!-- Begin HTML Page-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = 'selectKegsForOrder.php' method='POST'>
<!-- END HTML Page -->
		
		<?php
/*echo "Please select the size of the kegs<br / >";
			for ($i = 0; $i < $numberOfKegSizes; $i++) {
				echo "<input type='checkbox' name=" . $kegSize[$i] . " value='Yes'>" . $kegSize[$i] . "<br />";
			}
*/
			echo "Please select the type of beer:<br />";

			for ($i = 0; $i < $numberOfKegTypes; $i++) {
				echo "<input type=\"checkbox\" name=\"" . $kegType[$i] . "\" value=\"Yes\">" . $kegType[$i] . "<br />";
			 }
		?>
		<input type='hidden' name='contactid' value=<?php echo $contactid;?>>
		<input type='hidden' name='custid' value=<?php echo $custid;?>>	
		<input type='submit' value='Choose Keg Sizes'>
		
		</form>
    </body>
	<footer>
		<br /><br /><br /><br /><br />		
		Awesome Ales Inventory App, version 1.4<br />
		Created by: Mark Shavers<br />
		If you experience any problems please email Mark at the contact information below.<br />
   		<p>Contact information: <a href="mailto:mark@awesomeales.com">mark@awesomeales.com</a>.</p>
	</footer>
</html>