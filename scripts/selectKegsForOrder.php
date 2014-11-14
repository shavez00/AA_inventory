<?php
//Database query and load results into arrays for the for loop
	require_once ('mysql_connect.php');
	$custid = $_REQUEST['custid'];
	$contactid = $_REQUEST['contactid'];
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
		
<?php

//error routine added for if no selection made, added 1-14-2014

	if(is_null($_REQUEST['Awesome_Ale']) && is_null($_REQUEST['Awesome_IPA']) && is_null($_REQUEST['Awesome_Strong']) && is_null($_REQUEST['Awesome_Red'])) {
		echo "Please choose a type of beer</br>";
		echo "<button onclick='history.go(-1)'>Choose a type of beer</button>";
		die;
	}
?>

<form action = 'createLineItems.php' method='POST'>

<?php

//Type of beer selection

	if(isset($_REQUEST['Awesome_Ale']) && $_REQUEST['Awesome_Ale'] == 'Yes') {
		$kegAwesomeAleQuery = "SELECT distinct size FROM inventory WHERE type='Awesome Ale'";
		$kegAwesomeAleResult = mysql_query ($kegAwesomeAleQuery);

		while ($row = mysql_fetch_array($kegAwesomeAleResult)) {
			$kegAwesomeAleSize[] = $row['size'];
		}

		$numberOfAwesomeAleKegSizes = count($kegAwesomeAleSize);
		echo "Awesome Ale Keg Sizes being sold: <br />";
		for ($i = 0; $i < $numberOfAwesomeAleKegSizes; $i++) {
				echo "<input type=\"checkbox\" name=\"AwesomeAle" . $kegAwesomeAleSize[$i] . "\" value=\"Yes\">" . $kegAwesomeAleSize[$i] . "<br />";
			 }		
		echo "<input type =\"hidden\" name=\"awesomeAle\" value=\"Awesome Ale\">";
	}

	if(isset($_REQUEST['Awesome_IPA']) && $_REQUEST['Awesome_IPA'] == 'Yes') {
		$kegAwesomeIPAResult = mysql_query ("SELECT distinct size FROM inventory WHERE type='Awesome IPA'");

		while ($row = mysql_fetch_array($kegAwesomeIPAResult)) {
			$kegAwesomeIPASize[] = $row['size'];
		}

		$numberOfAwesomeIPAKegSizes = count($kegAwesomeIPASize);
		echo "Awesome IPA Keg Sizes being sold: <br />";
		for ($i = 0; $i < $numberOfAwesomeIPAKegSizes; $i++) {
				echo "<input type=\"checkbox\" name=\"AwesomeIPA" . $kegAwesomeIPASize[$i] . "\" value=\"Yes\">" . $kegAwesomeIPASize[$i] . "<br />";
			 }	
		echo "<input type =\"hidden\" name=\"awesomeIPA\" value=\"Awesome IPA\">";
	}

	if(isset($_REQUEST['Awesome_Strong']) && $_REQUEST['Awesome_Strong'] == 'Yes') {
		$kegAwesomeStrongQuery = "SELECT distinct size FROM inventory WHERE type='Awesome IPA'";
		$kegAwesomeStrongResult = mysql_query ($kegAwesomeStrongQuery);

		while ($row = mysql_fetch_array($kegAwesomeStrongResult)) {
			$kegAwesomeStrongSize[] = $row['size'];
		}

		$numberOfAwesomeStrongKegSizes = count($kegAwesomeStrongSize);
		echo "Awesome Strong Keg Sizes being sold: <br />";
		for ($i = 0; $i < $numberOfAwesomeStrongKegSizes; $i++) {
				echo "<input type=\"checkbox\" name=\"AwesomeStrong" . $kegAwesomeStrongSize[$i] . "\" value=\"Yes\">" . $kegAwesomeStrongSize[$i] . "<br />";
			 }
		echo "<input type =\"hidden\" name=\"awesomeStrong\" value=\"Awesome Strong\">";
	}

/*Awesome Red added to the product list on 1-5-2014*/
	if(isset($_REQUEST['Awesome_Red']) && $_REQUEST['Awesome_Red'] == 'Yes') {
		$kegAwesomeStrongQuery = "SELECT distinct size FROM inventory WHERE type='Awesome Red'";
		$kegAwesomeStrongResult = mysql_query ($kegAwesomeStrongQuery);

		while ($row = mysql_fetch_array($kegAwesomeStrongResult)) {
			$kegAwesomeRedSize[] = $row['size'];
		}

		$numberOfAwesomeRedKegSizes = count($kegAwesomeRedSize);
		echo "Awesome Red Keg Sizes being sold: <br />";
		for ($i = 0; $i < $numberOfAwesomeRedKegSizes; $i++) {
				echo "<input type=\"checkbox\" name=\"AwesomeRed" . $kegAwesomeRedSize[$i] . "\" value=\"Yes\">" . $kegAwesomeRedSize[$i] . "<br />";
			 }
		echo "<input type =\"hidden\" name=\"awesomeRed\" value=\"Awesome Red\">";
	}
?>
			Are there kegs that are going to be returned?	
	<select name="return">
		<option value="yes">Yes</option>
		<option value="no">No</option>
			</select><br /><br />
			Are you going to use today's date on the invoice?	
	<select name="date">
		<option value="">Yes</option>
		<option value="No">No</option>
	</select><br />
			
			
	<input type='hidden' name='contactid' value=<?php echo $contactid;?>>
	<input type='hidden' name='custid' value=<?php echo $custid;?>>	
	<input type='submit' value='Create Pricing'>
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