<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = 'confirmInvoice.php' method='POST'>
<?php
	require_once ('mysql_connect.php');

	$custid = $_REQUEST['custid'];
	$return = $_REQUEST['return'];
	$contactid = $_REQUEST['contactid']; 

//Error routine for Keg size selection being blank
if(isset($_REQUEST['awesomeAle'])) {
	
	if(is_null($_REQUEST['AwesomeAlehalf']) && is_null($_REQUEST['AwesomeAlequarter']) && is_null($_REQUEST['AwesomeAlesixth'])) {
		echo "Please choose a Ale keg size</br>";
		echo "<input type='button' value='Choose a Ale keg size' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeIPA'])) {
	
	if(is_null($_REQUEST['AwesomeIPAhalf']) && is_null($_REQUEST['AwesomeIPAquarter']) && is_null($_REQUEST['AwesomeIPAsixth'])) {
		echo "Please choose a IPA keg size</br>";
		echo "<input type='button' value='Choose a IPA keg size' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeStrong'])) {
	
	if(is_null($_REQUEST['AwesomeStronghalf']) && is_null($_REQUEST['AwesomeStrongquarter']) && is_null($_REQUEST['AwesomeStrongsixth'])) {
		echo "Please choose a Strong keg size</br>";
		echo "<input type='button' value='Choose a Strong keg size' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeRed'])) {
	
	if(is_null($_REQUEST['AwesomeRedhalf']) && is_null($_REQUEST['AwesomeRedquarter']) && is_null($_REQUEST['AwesomeRedsixth'])) {
		echo "Please choose a Red keg size</br>";
		echo "<input type='button' value='Choose a Red keg size' onclick='history.go(-1)'>";
		die;
	}
}

//keg size selection
if(isset($_REQUEST['awesomeAle'])) {
	
	echo "Awesome Ale: <br />";
	
	echo "<input type ='hidden' name='awesomeAle' value='awesomeAle'>";
	
	if(isset($_REQUEST['AwesomeAlesixth'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Ale' AND size='sixth'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		
		echo "<label for='awesomeAleSixthKegPrice'>Price per sixth keg: </label>";
		echo "<input type='text' name='awesomeAleSixthKegPrice' size='20' value='" . $kegPrice . "' />";
		echo "<label for='awesomeAleSixthKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeAleSixthKegQuantity' size='5' /><br />";
	}

	if(isset($_REQUEST['AwesomeAlequarter'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Ale' AND size='quarter'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		
		echo "<label for='awesomeAleQuarterKegPrice'>Price per quarter keg: </label>";
		echo "<input type='text' name='awesomeAleQuarterKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='awesomeAleQuarterKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeAleQuarterKegQuantity' size='5' /><br />";
	}
	
	if(isset($_REQUEST['AwesomeAlehalf'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Ale' AND size='half'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeAleHalfKegPrice'>Price per half keg: </label>";
		echo "<input type='text' name='awesomeAleHalfKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='awesomeAleHalfKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeAleHalfKegQuantity' size='5' /><br />";
	}
	
}

if(isset($_REQUEST['awesomeIPA'])) {

	echo "<br />Awesome IPA: <br />";
	
	echo "<input type ='hidden' name='awesomeIPA' value='awesomeIPA'>";
	
	if(isset($_REQUEST['AwesomeIPAsixth'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome IPA' AND size='sixth'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeIPASixthKegPrice'>Price per sixth keg: </label>";
		echo "<input type='text' name='awesomeIPASixthKegPrice' size='20' value ='" . $kegPrice . "'/>";
		echo "<label for='sixthKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeIPASixthKegQuantity' size='5' /><br />";
	}
	

	if(isset($_REQUEST['AwesomeIPAquarter'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome IPA' AND size='quarter'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeIPAQuarterKegPrice'>Price per quarter keg: </label>";
		echo "<input type='text' name='awesomeIPAQuarterKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='awesomeIPAQuarterKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeIPAQuarterKegQuantity' size='5' /><br />";
	}
	
	if(isset($_REQUEST['AwesomeIPAhalf'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome IPA' AND size='half'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeIPAHalfKegPrice'>Price per half keg: </label>";
		echo "<input type='text' name='awesomeIPAHalfKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='halfKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeIPAHalfKegQuantity' size='5' /><br />";
	}

}

if(isset($_REQUEST['awesomeStrong'])) {
	
	echo "<br />Awesome Strong: <br />";
	
	echo "<input type ='hidden' name='awesomeStrong' value='awesomeStrong'>";
		
	if(isset($_REQUEST['AwesomeStrongsixth'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Strong' AND size='sixth'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeStrongSixthKegPrice'>Price per sixth keg: </label>";
		echo "<input type='text' name='awesomeStrongSixthKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='sixthKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeStrongSixthKegQuantity' size='5' /><br />";
	}

	if(isset($_REQUEST['AwesomeStrongquarter'])) {
		$kegQuery =mysql_query ("SELECT price FROM inventory WHERE type='Awesome Strong' AND size='quarter'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeStrongQuarterKegPrice'>Price per quarter keg: </label>";
		echo "<input type='text' name='awesomeStrongQuarterKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='awesomeStrongQuarterKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeStrongQuarterKegQuantity' size='5' /><br />";
	}
	
	if(isset($_REQUEST['AwesomeStronghalf'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Strong' AND size='half'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeStrongHalfKegPrice'>Price per half keg: </label>";
		echo "<input type='text' name='awesomeStrongHalfKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='halfKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeStrongHalfKegQuantity' size='5' /><br />";
	}
}

/*Awesome Red added to product list on 1-5-2014*/

if(isset($_REQUEST['awesomeRed'])) {

	echo "<br />Awesome Red: <br />";
	
	echo "<input type ='hidden' name='awesomeRed' value='awesomeRed'>";
	
	if(isset($_REQUEST['AwesomeRedsixth'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Red' AND size='sixth'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeRedSixthKegPrice'>Price per sixth keg: </label>";
		echo "<input type='text' name='awesomeRedSixthKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='sixthKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeRedSixthKegQuantity' size='5' /><br />";
	}

	if(isset($_REQUEST['AwesomeRedquarter'])) {
		$kegQuery =mysql_query ("SELECT price FROM inventory WHERE type='Awesome Red' AND size='quarter'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeRedQuarterKegPrice'>Price per quarter keg: </label>";
		echo "<input type='text' name='awesomeRedQuarterKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='awesomeRedQuarterKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeRedQuarterKegQuantity' size='5' /><br />";
	}
	
	if(isset($_REQUEST['AwesomeRedhalf'])) {
		$kegQuery = mysql_query ("SELECT price FROM inventory WHERE type='Awesome Red' AND size='half'");

		while ($row = mysql_fetch_array($kegQuery)) {
			$kegPrice = $row['price'];
		}
		echo "<label for='awesomeRedHalfKegPrice'>Price per half keg: </label>";
		echo "<input type='text' name='awesomeRedHalfKegPrice' size='20' value='" . $kegPrice . "'/>";
		echo "<label for='halfKegQuantity'>Quantity: </label>";
		echo "<input type='text' name='awesomeRedHalfKegQuantity' size='5' /><br />";
	}
}

if ($return == 'yes') {
	echo "<br /><label for='return'>Number of Kegs being returned: </label>";
		echo "<input type='text' name='return' size='20' /><br />";
	}

if ($_REQUEST['date'] != "") {
	echo "<br /><b>What is the month of the Invoice:  </b>";
	echo '<select name="month">';
	echo '<option value="1">Jan</option>';
	echo '<option value="2">Feb</option>';
	echo '<option value="3">Mar</option>';
	echo '<option value="4">April</option>';
	echo '<option value="5">May</option>';
	echo '	<option value="6">June</option>';
	echo '	<option value="7">July</option>';
	echo '	<option value="8">Aug</option>';
	echo '	<option value="9">Sep</option>';
	echo '	<option value="10">Oct</option>';
	echo '	<option value="11">Nov</option>';
	echo '	<option value="12">Dec</option>';
	echo '</select><br />';
	echo '<br /><label for="day"><b>Day of the month:  </b></label><input type="text" name="day" size="20" /><br />';
}
?>
			
			
<input type='hidden' name='contactid' value=<?php echo $contactid;?>>
<input type='hidden' name='custid' value=<?php echo $custid;?>>
<input type='submit' value='Confirm order'>
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