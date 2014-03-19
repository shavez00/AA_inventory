<?php
	require_once ('../scripts/mysql_connect.php');

	$custid = $_REQUEST['custid'];
	$contactid = $_REQUEST['contactid'];
	$return = $_REQUEST['return'];

	$month = $_REQUEST['month'];
	$day = $_REQUEST['day'];
	$year = date("Y");

if(isset($month)) {
	$date = $year . "-" . $month . "-" . $day;
} else {
	$date = date("Y" . "-" . "m" . "-" . "d");
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

 	$createInvoiceQuery = "INSERT INTO invoices (custid) VALUES ($custid)";
	$createInvoiceResult = mysql_query ($createInvoiceQuery);

	$retrieveInvoiceNumQuery = "SELECT invoicenum FROM invoices WHERE invoicenum=LAST_INSERT_ID()";
	$retrieveInvoiceNumResult = mysql_query ($retrieveInvoiceNumQuery);

	while($row = mysql_fetch_array($retrieveInvoiceNumResult)) {
		$invoiceNumber = $row['invoicenum'];
	}

	if(isset($awesomeAle)) {
		
			$type = "Awesome Ale";
			
			if(isset($awesomeAleSixthKegPrice)) {
				$size = "sixth";
				$createOrderAwesomeAleSixthKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeAleSixthKegQuantity', '$awesomeAleSixthKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeAleSixthKegResult = mysql_query ($createOrderAwesomeAleSixthKegQuery);
				$updateInventoryAwesomeAleSixthKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeAleSixthKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}

			if(isset($awesomeAleQuarterKegPrice)) {
				$size = "quarter";
				$createOrderAwesomeAleQuarterKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeAleQuarterKegQuantity', '$awesomeAleQuarterKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeAleQuarterKegResult = mysql_query ($createOrderAwesomeAleQuarterKegQuery);
				$updateInventoryAwesomeAleQuarterKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeAleQuarterKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
		
			if(isset($awesomeAleHalfKegPrice)) {
				$size = "half";
				$createOrderAwesomeAleHalfKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeAleHalfKegQuantity', '$awesomeAleHalfKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeAleHalfKegResult = mysql_query ($createOrderAwesomeAleHalfKegQuery);
				$updateInventoryAwesomeAleHalfKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeAleHalfKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
	}

	if(isset($awesomeIPA)) {
		
			$type = "Awesome IPA";
			
			if(isset($awesomeIPASixthKegPrice)) {
				$size = "sixth";
				$createOrderAwesomeIPASixthKegQuery = mysql_query ("INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeIPASixthKegQuantity', '$awesomeIPASixthKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')");
				$updateInventoryAwesomeIPASixthKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeIPASixthKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
		
			if(isset($awesomeIPAQuarterKegPrice)) {
				$size = "quarter";
				$createOrderAwesomeIPAQuarterKegQuery = mysql_query ("INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeIPAQuarterKegQuantity', '$awesomeIPAQuarterKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')");
				$updateInventoryAwesomeIPAQuarterKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeIPAQuarterKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
		
			if(isset($awesomeIPAHalfKegPrice)) {
				$size = "half";
				$createOrderAwesomeIPAHalfKegQuery = mysql_query ("INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeIPAHalfKegQuantity', '$awesomeIPAHalfKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')");
				$updateInventoryAwesomeIPAHalfKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeIPAHalfKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
	}

	if(isset($awesomeStrong)) {
		
			$type = "Awesome Strong";
			
			if(isset($awesomeStrongSixthKegPrice)) {
				$size = "sixth";
				$createOrderAwesomeStrongSixthKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeStrongSixthKegQuantity', '$awesomeStrongSixthKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeStrongSixthKegResult = mysql_query ($createOrderAwesomeStrongSixthKegQuery);
				$updateInventoryAwesomeStrongSixthKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeStrongSixthKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
		
			if(isset($awesomeStrongQuarterKegPrice)) {
				$size = "quarter";
				$createOrderAwesomeStrongQuarterKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeStrongQuarterKegQuantity', '$awesomeStrongQuarterKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeStrongQuarterKegResult = mysql_query ($createOrderAwesomeStrongQuarterKegQuery);
				$updateInventoryAwesomeStrongQuarterKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeStrongQuarterKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			
			}
		
			if(isset($awesomeStrongHalfKegPrice)) {
				$size = "half";
				$createOrderAwesomeStrongHalfKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeStrongHalfKegQuantity', '$awesomeStrongHalfKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeStongHalfKegResult = mysql_query ($createOrderAwesomeStrongHalfKegQuery);
				$updateInventoryAwesomeStrongHalfKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeStrongHalfKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
	}

	if(isset($awesomeRed)) {
		
			$type = "Awesome Red";
			
			if(isset($awesomeRedSixthKegPrice)) {
				$size = "sixth";
				$createOrderAwesomeRedSixthKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeRedSixthKegQuantity', '$awesomeRedSixthKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeRedSixthKegResult = mysql_query ($createOrderAwesomeRedSixthKegQuery);
				$updateInventoryAwesomeRedSixthKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeRedSixthKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
		
			if(isset($awesomeRedQuarterKegPrice)) {
				$size = "quarter";
				$createOrderAwesomeRedQuarterKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeRedQuarterKegQuantity', '$awesomeRedQuarterKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeRedQuarterKegResult = mysql_query ($createOrderAwesomeRedQuarterKegQuery);
				$updateInventoryAwesomeRedQuarterKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeRedQuarterKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			
			}
		
			if(isset($awesomeRedHalfKegPrice)) {
				$size = "half";
				$createOrderAwesomeRedHalfKegQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', '$size', '$awesomeRedHalfKegQuantity', '$awesomeRedHalfKegPrice', '$custid', '$contactid', '$invoiceNumber', '$date')";
				$createOrderAwesomeRedHalfKegResult = mysql_query ($createOrderAwesomeRedHalfKegQuery);
				$updateInventoryAwesomeRedHalfKegQuery = mysql_query("UPDATE inventory SET qty=qty-$awesomeRedHalfKegQuantity WHERE type = '$type' AND size = '$size' AND qty>=1 ORDER BY qty ASC LIMIT 1");
			}
	}

	if(isset($return)) {
		
			$type = "Keg Return";
			
			$createOrderReturnQuery = "INSERT INTO orders (type, size, quantity, price, custid, contactid, invoicenum, date) VALUES ('$type', 'NA', '$return', '$60', '$custid', '$contactid', '$invoiceNumber', '$date')";
			$createOrderReturnResult = mysql_query ($createOrderReturnQuery);
			}

/* version 1.4*/

header ('Location: ../invoice/index.php');
?>
