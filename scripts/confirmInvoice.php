<html>
	<head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
	<body>
		<form action = 'generateInvoice.php' target='_blank' method='POST'>
<?php
	require_once ('mysql_connect.php');

	$custid = $_REQUEST['custid'];
	$return = $_REQUEST['return'];
	$contactid = $_REQUEST['contactid'];

	$year = date('y');

	$oddmonth = array(1, 3, 5, 7, 8, 10, 12);
	$month = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>12)));
	if (in_array($month, $oddmonth)) {
		$day = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>31)));
	} elseif ($month == 2 AND ($year % 4 != 0)) {
		$day = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>28)));
	} elseif ($month == 2) {
		$day = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>29)));
	} else {
		$day = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>30)));
	}

	$awesomeAle = $_REQUEST['awesomeAle'];
	$awesomeIPA = $_REQUEST['awesomeIPA'];
	$awesomeStrong = $_REQUEST['awesomeStrong'];
	$awesomeRed = $_REQUEST['awesomeRed'];

	$awesomeAleSixthKegPrice = $_REQUEST['awesomeAleSixthKegPrice'];
	$awesomeAleQuarterKegPrice = $_REQUEST['awesomeAleQuarterKegPrice'];
	$awesomeAleHalfKegPrice = $_REQUEST['awesomeAleHalfKegPrice'];
	$awesomeIPASixthKegPrice = $_REQUEST['awesomeIPASixthKegPrice'];
	$awesomeIPAQuarterKegPrice = $_REQUEST['awesomeIPAQuarterKegPrice'];
	$awesomeIPAHalfKegPrice = $_REQUEST['awesomeIPAHalfKegPrice'];
	$awesomeStrongSixthKegPrice = $_REQUEST['awesomeStrongSixthKegPrice'];
	$awesomeStrongQuarterKegPrice = $_REQUEST['awesomeStrongQuarterKegPrice'];
	$awesomeStrongHalfKegPrice = $_REQUEST['awesomeStrongHalfKegPrice'];
	$awesomeRedSixthKegPrice = $_REQUEST['awesomeRedSixthKegPrice'];
	$awesomeRedQuarterKegPrice = $_REQUEST['awesomeRedQuarterKegPrice'];
	$awesomeRedHalfKegPrice = $_REQUEST['awesomeRedHalfKegPrice'];
	$awesomeAleSixthKegQuantity = $_REQUEST['awesomeAleSixthKegQuantity'];
	$awesomeAleQuarterKegQuantity = $_REQUEST['awesomeAleQuarterKegQuantity'];
	$awesomeAleHalfKegQuantity = $_REQUEST['awesomeAleHalfKegQuantity'];
	$awesomeIPASixthKegQuantity = $_REQUEST['awesomeIPASixthKegQuantity'];
	$awesomeIPAQuarterKegQuantity = $_REQUEST['awesomeIPAQuarterKegQuantity'];
	$awesomeIPAHalfKegQuantity = $_REQUEST['awesomeIPAHalfKegQuantity'];
	$awesomeStrongSixthKegQuantity = $_REQUEST['awesomeStrongSixthKegQuantity'];
	$awesomeStrongQuarterKegQuantity = $_REQUEST['awesomeStrongQuarterKegQuantity'];
	$awesomeStrongHalfKegQuantity = $_REQUEST['awesomeStrongHalfKegQuantity'];
	$awesomeRedSixthKegQuantity = $_REQUEST['awesomeRedSixthKegQuantity'];
	$awesomeRedQuarterKegQuantity = $_REQUEST['awesomeRedQuarterKegQuantity'];
	$awesomeRedHalfKegQuantity = $_REQUEST['awesomeRedHalfKegQuantity'];

	$subTotalAwesomeAleSixthKegPrice = ($awesomeAleSixthKegPrice * $awesomeAleSixthKegQuantity);
	$subTotalAwesomeAleQuarterKegPrice = ($awesomeAleQuarterKegQuantity * $awesomeAleQuarterKegPrice);
	$subTotalAwesomeAleHalfKegPrice = ($awesomeAleHalfKegPrice * $awesomeAleHalfKegQuantity);
	$subTotalAwesomeAleKegPrice = $subTotalAwesomeAleHalfKegPrice + $subTotalAwesomeAleQuarterKegPrice + $subTotalAwesomeAleSixthKegPrice;

	$subTotalAwesomeIPASixthKegPrice = ($awesomeIPASixthKegPrice * $awesomeIPASixthKegQuantity);
	$subTotalAwesomeIPAQuarterKegPrice = ($awesomeIPAQuarterKegPrice * $awesomeIPAQuarterKegQuantity); 
	$subTotalAwesomeIPAHalfKegPrice = ($awesomeIPAHalfKegPrice * $awesomeIPAHalfKegQuantity);
	$subTotalAwesomeIPAKegPrice = $subTotalAwesomeIPAHalfKegPrice + $subTotalAwesomeIPAQuarterKegPrice + $subTotalAwesomeIPASixthKegPrice;

	$subTotalAwesomeStrongSixthKegPrice = ($awesomeStrongSixthKegPrice * $awesomeStrongSixthKegQuantity);
	$subTotalAwesomeStrongQuarterKegPrice = ($awesomeStrongQuarterKegQuantity * $awesomeStrongQuarterKegPrice);
	$subTotalAwesomeStrongHalfKegPrice = ($awesomeStrongHalfKegPrice * $awesomeStrongHalfKegQuantity);
	$subTotalAwesomeStrongKegPrice = $subTotalAwesomeStrongHalfKegPrice + $subTotalAwesomeStrongQuarterKegPrice + $subTotalAwesomeStrongSixthKegPrice;

	$subTotalAwesomeRedSixthKegPrice = ($awesomeRedSixthKegPrice * $awesomeRedSixthKegQuantity);
	$subTotalAwesomeRedQuarterKegPrice = ($awesomeRedQuarterKegQuantity * $awesomeRedQuarterKegPrice);
	$subTotalAwesomeRedHalfKegPrice = ($awesomeRedHalfKegPrice * $awesomeRedHalfKegQuantity);
	$subTotalAwesomeRedKegPrice = $subTotalAwesomeRedHalfKegPrice + $subTotalAwesomeRedQuarterKegPrice + $subTotalAwesomeRedSixthKegPrice;

	$kegQuantityTotal = $awesomeAleSixthKegQuantity + $awesomeAleQuarterKegQuantity + $awesomeAleHalfKegQuantity + $awesomeIPASixthKegQuantity + $awesomeIPAQuarterKegQuantity + $awesomeIPAHalfKegQuantity + $awesomeStrongSixthKegQuantity + $awesomeStrongQuarterKegQuantity + $awesomeStrongHalfKegQuantity + $awesomeRedSixthKegQuantity + $awesomeRedQuarterKegQuantity + $awesomeRedHalfKegQuantity;

	$kegDeposit = $kegQuantityTotal * 30;

	$kegDepositReturn = $return * -30;

	$subTotal = $kegDeposit + $subTotalAwesomeAleKegPrice + $subTotalAwesomeIPAKegPrice + $subTotalAwesomeStrongKegPrice + $subTotalAwesomeRedKegPrice + $kegDepositReturn;

//Error routine for price not being set for kegs

if(isset($_REQUEST['awesomeAle'])) {
	
	if($subTotalAwesomeAleKegPrice == 0) {	
		echo "Please set a quantity for Ale keg.</br>";
		echo "<input type='button' value='Price Ale kegs' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeIPA'])) {
	
	if($subTotalAwesomeIPAKegPrice == 0) {
		echo "Please set a quantity for IPA keg.</br>";
		echo "<input type='button' value='Price IPA kegs' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeStrong'])) {
	
	if($subTotalAwesomeStrongKegPrice == 0) {
		echo "Please set a quantity for the Strong keg.</br>";
		echo "<input type='button' value='Price Strong kegs' onclick='history.go(-1)'>";
		die;
	}
}
	
if(isset($_REQUEST['awesomeRed'])) {
	
	if($subTotalAwesomeRedKegPrice == 0) {
		echo "Please set a quantity for the Red keg.</br>";
		echo "<input type='button' value='Price Red kegs' onclick='history.go(-1)'>";
		die;
	}
}

if(isset($return) AND $return == 0){
	echo "Please choose the number of kegs being returned.  Select 'No' if no kegs are being returned.</br>";
		echo "<input type='button' value='Choose number of returns' onclick='history.go(-2)'>";
		die;
	}
	
//subroutine to validate date entered
if(isset($month)) {
	if ($day) {
		echo "<b>Date of invoice:</b><br />";
		echo "<b>" .$month . "/" . $day . "/" . $year . "</b><br />";
		echo "<input type ='hidden' name='month' value=" . $month . ">";
		echo "<input type ='hidden' name='day' value=" . $day . ">";
		echo "<input type ='hidden' name='year' value=" . $year . ">";
	} else {
		echo "Please use a valid date for the month chosen. <br />";
		echo '<input type="button" value="Back" onclick="history.go(-1);return true;">';
		die;		
	}
} else {
	echo "<b>Date of invoice:</b><br />";
	echo "<b>" . date("m" . "/" . "d" . "/" . "y") . "</b><br />";	
}
	

	$custQuery = "SELECT * FROM customers WHERE custid='$custid'";
	$custResult = mysql_query ($custQuery);
	while ($row = mysql_fetch_array($custResult)) {
		$name = $row['name'];
	}

echo "<br />Customer: " . $name . "<br />";

		if(isset($awesomeAle)) {
			
			echo "<input type ='hidden' name='awesomeAle' value=" . $awesomeAle . ">";
			
			if(isset($awesomeAleSixthKegPrice)) {
				echo "<br />Awesome Ale<br />";
				echo "Sixth Keg<br />";
				echo "<input type ='hidden' name='awesomeAleSixthKegPrice' value=" . $awesomeAleSixthKegPrice . ">Keg price = $" . $awesomeAleSixthKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeAleSixthKegQuantity' value=" . $awesomeAleSixthKegQuantity . ">Number of Kegs = " . $awesomeAleSixthKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeAleSixthKegPrice' value=" . $subTotalAwesomeAleSixthKegPrice . ">Total = $" . $subTotalAwesomeAleSixthKegPrice . "<br />";
			}
				
			if(isset($awesomeAleQuarterKegPrice)) {
				echo "<br />Awesome Ale<br />";
				echo "Quarter Keg<br />";
			 	echo "<input type ='hidden' name='awesomeAleQuarterKegPrice' value=" . $awesomeAleQuarterKegPrice . ">Keg price = $" . $awesomeAleQuarterKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeAleQuarterKegQuantity' value=" . $awesomeAleQuarterKegQuantity . ">Number of Kegs = " . $awesomeAleQuarterKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeAleQuarterKegPrice' value=" . $subTotalAwesomeAleQuarterKegPrice . ">Total = $" . $subTotalAwesomeAleQuarterKegPrice . "<br />";
			}
			
			if(isset($awesomeAleHalfKegPrice)) {
				echo "<br />Awesome Ale<br />";
				echo "Half Keg<br />";
			 	echo "<input type ='hidden' name='awesomeAleHalfKegPrice' value=" . $awesomeAleHalfKegPrice . ">Keg price = $" . $awesomeAleHalfKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeAleHalfKegQuantity' value=" . $awesomeAleHalfKegQuantity . ">Number of Kegs = " . $awesomeAleHalfKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeAleHalfKegPrice' value=" . $subTotalAwesomeAleHalfKegPrice . ">Total = $" . $subTotalAwesomeAleHalfKegPrice . "<br />";
			}
		}

	if(isset($awesomeIPA)) {
		
			echo "<input type ='hidden' name='awesomeIPA' value=" . $awesomeIPA . ">";
			
			if(isset($awesomeIPASixthKegPrice)) {
				echo "<br />Awesome IPA<br />";
				echo "Sixth Keg<br />";
			 	echo "<input type ='hidden' name='awesomeIPASixthKegPrice' value=" . $awesomeIPASixthKegPrice . ">Keg price = $" . $awesomeIPASixthKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeIPASixthKegQuantity' value=" . $awesomeIPASixthKegQuantity . ">Number of Kegs = " . $awesomeIPASixthKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeIPASixthKegPrice' value=" . $subTotalAwesomeIPASixthKegPrice . ">Total = $" . $subTotalAwesomeIPASixthKegPrice . "<br />";				
			}
				
			if(isset($awesomeIPAQuarterKegPrice)) {
				echo "<br />Awesome IPA<br />";
				echo "Quarter Keg<br />";
			 	echo "<input type ='hidden' name='awesomeIPAQuarterKegPrice' value=" . $awesomeIPAQuarterKegPrice . ">Keg price = $" . $awesomeIPAQuarterKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeIPAQuarterKegQuantity' value=" . $awesomeIPAQuarterKegQuantity . ">Number of Kegs = " . $awesomeIPAQuarterKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeIPAQuarterKegPrice' value=" . $subTotalAwesomeIPAQuarterKegPrice . ">Total = $" . $subTotalAwesomeIPAQuarterKegPrice . "<br />";				
			}
			
			if(isset($awesomeIPAHalfKegPrice)) {
				echo "<br />Awesome IPA<br />";
				echo "Half Keg<br />";
				echo "<input type ='hidden' name='awesomeIPAHalfKegPrice' value=" . $awesomeIPAHalfKegPrice . ">Keg price = $" . $awesomeIPAHalfKegPrice . "<br />";
				echo "<input type ='hidden' name='awesomeIPAHalfKegQuantity' value=" . $awesomeIPAHalfKegQuantity . ">Number of Kegs = " . $awesomeIPAHalfKegQuantity . "<br />";
				echo "<input type ='hidden' name='subTotalAwesomeIPAHalfKegPrice' value=" . $subTotalAwesomeIPAHalfKegPrice . ">Total = $" . $subTotalAwesomeIPAHalfKegPrice . "<br />";
			}
		}

	if(isset($awesomeStrong)) {
		
			echo "<input type ='hidden' name='awesomeStrong' value=" . $awesomeStrong . ">";
			
			if(isset($awesomeStrongSixthKegPrice)) {
				echo "<br />Awesome Strong<br />";
				echo "Sixth Keg<br />";
			 	echo "<input type ='hidden' name='awesomeStrongSixthKegPrice' value=" . $awesomeStrongSixthKegPrice . ">Keg price = $" . $awesomeStrongSixthKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeStrongSixthKegQuantity' value=" . $awesomeStrongSixthKegQuantity . ">Number of Kegs = " . $awesomeStrongSixthKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeStrongSixthKegPrice ' value=" . $subTotalAwesomeStrongSixthKegPrice  . ">Total = $" . $subTotalAwesomeStrongSixthKegPrice . "<br />";
			}
				
			if(isset($awesomeStrongQuarterKegPrice)) {
				echo "<br />Awesome Strong<br />";
				echo "Quarter Keg<br />";
			 	echo "<input type ='hidden' name='awesomeStrongQuarterKegPrice' value=" . $awesomeStrongQuarterKegPrice . ">Keg price = $" . $awesomeStrongQuarterKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeStrongQuarterKegQuantity' value=" . $awesomeStrongQuarterKegQuantity . ">Number of Kegs = " . $awesomeStrongQuarterKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeStrongQuarterKegPrice' value=" . $subTotalAwesomeStrongQuarterKegPrice . ">Total = $" . $subTotalAwesomeStrongQuarterKegPrice . "<br />";
			}
			
			if(isset($awesomeStrongHalfKegPrice)) {
				echo "<br />Awesome Strong<br />";
				echo "Half Keg<br />";
			 	echo "<input type ='hidden' name='awesomeStrongHalfKegPrice' value=" . $awesomeStrongHalfKegPrice . ">Keg price = $" . $awesomeStrongHalfKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeStrongHalfKegQuantity' value=" . $awesomeStrongHalfKegQuantity . ">Number of Kegs = " . $awesomeStrongHalfKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeStrongHalfKegPrice' value=" . $subTotalAwesomeStrongHalfKegPrice . ">Total = $" . $subTotalAwesomeStrongHalfKegPrice . "<br />";
			}
		}

/*Awesome Red added to product list 1-5-2014*/
if(isset($awesomeRed)) {
		
			echo "<input type ='hidden' name='awesomeRed' value=" . $awesomeRed . ">";
			
			if(isset($awesomeRedSixthKegPrice)) {
				echo "<br />Awesome Red<br />";
				echo "Sixth Keg<br />";
			 	echo "<input type ='hidden' name='awesomeRedSixthKegPrice' value=" . $awesomeRedSixthKegPrice . ">Keg price = $" . $awesomeRedSixthKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeRedSixthKegQuantity' value=" . $awesomeRedSixthKegQuantity . ">Number of Kegs = " . $awesomeRedSixthKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeRedSixthKegPrice ' value=" . $subTotalAwesomeRedSixthKegPrice  . ">Total = $" . $subTotalAwesomeRedSixthKegPrice . "<br />";
			}
				
			if(isset($awesomeRedQuarterKegPrice)) {
				echo "<br />Awesome Red<br />";
				echo "Quarter Keg<br />";
			 	echo "<input type ='hidden' name='awesomeRedQuarterKegPrice' value=" . $awesomeRedQuarterKegPrice . ">Keg price = $" . $awesomeRedQuarterKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeRedQuarterKegQuantity' value=" . $awesomeRedQuarterKegQuantity . ">Number of Kegs = " . $awesomeRedQuarterKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeRedQuarterKegPrice' value=" . $subTotalAwesomeRedQuarterKegPrice . ">Total = $" . $subTotalAwesomeRedQuarterKegPrice . "<br />";
			}
			
			if(isset($awesomeRedHalfKegPrice)) {
				echo "<br />Awesome Red<br />";
				echo "Half Keg<br />";
			 	echo "<input type ='hidden' name='awesomeRedHalfKegPrice' value=" . $awesomeRedHalfKegPrice . ">Keg price = $" . $awesomeRedHalfKegPrice . "<br />";
		     	echo "<input type ='hidden' name='awesomeRedHalfKegQuantity' value=" . $awesomeRedHalfKegQuantity . ">Number of Kegs = " . $awesomeRedHalfKegQuantity . "<br />";
		     	echo "<input type ='hidden' name='subTotalAwesomeRedHalfKegPrice' value=" . $subTotalAwesomeRedHalfKegPrice . ">Total = $" . $subTotalAwesomeRedHalfKegPrice . "<br />";
			}
		}

echo "<br />Keg Deposit<br />";
echo "Deposit due per keg = $30<br />";
echo "<input type ='hidden' name='kegQuantityTotal' value=" . $kegQuantityTotal . ">Number of kegs = " . $kegQuantityTotal . "<br />";
echo "<input type ='hidden' name='kegDeposit' value=" . $kegDeposit . ">Total deposit due = $" . $kegDeposit . "<br />";

if(isset($return)) {
	echo "<br />Keg Return<br />";
	echo "Price per keg = -$30<br />";
	echo "<input type ='hidden' name='return' value=" . $return . ">Number of Kegs being returned = " . $return . "<br />";
	echo "<input type ='hidden' name='kegDepositReturn' value=" . $kegDepositReturn . ">Total deposit refunded = $" . $kegDepositReturn . "<br />";
	}
?>
		<input type='hidden' name='contactid' value=<?php echo $contactid;?>>
		<input type='hidden' name='custid' value=<?php echo $custid;?>>
			<input type='submit' value='Create Invoice in new Tab'><input type="button" value="Return to main menu" onclick="location.href='/aps/';"><input type="button" value="Create new order" onclick="location.href='/aps/scripts/selectCustomerForOrder.php';">
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