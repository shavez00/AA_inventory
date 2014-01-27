<?php
	require_once ('../scripts/mysql_connect.php');

	$retrieveLineitemNumQuery = "SELECT MAX(lineitem) AS lineitem FROM orders";
	$retrieveLineitemNumResult = mysql_query ($retrieveLineitemNumQuery);
	while ($row = mysql_fetch_array($retrieveLineitemNumResult)) {
		$lineitem = $row['lineitem'];
	}

	$retrieveInvoiceNumQuery = "SELECT custid, invoicenum, contactid FROM orders WHERE lineitem=$lineitem";
	$retrieveInvoiceNumResult = mysql_query ($retrieveInvoiceNumQuery);
	while ($row = mysql_fetch_array($retrieveInvoiceNumResult)) {
		$custid = $row['custid'];
		$invoicenum = $row['invoicenum'];
		$contactid = $row['contactid'];
	}

	$retrieveContactQuery = "SELECT first, last FROM contacts WHERE contactid=$contactid";
	$retrieveContactResult = mysql_query ($retrieveContactQuery);
	if (!$retrieveContactResult) {
		echo "MySQL error :" . mysql_error();
		die;
	}
	while ($row = mysql_fetch_array($retrieveContactResult)) {
		$contactName = $row['first'] . " " . $row['last'];
	}

	$retrieveCustQuery = "SELECT name FROM customers WHERE custid=$custid";
	$retrieveCustResult = mysql_query ($retrieveCustQuery);
	while ($row = mysql_fetch_array($retrieveCustResult)) {
		$custName = $row['name'];
	}

	$retrieveCustAddressQuery = "SELECT address1, address2, city, state, zip FROM address WHERE custid=$custid";
	$retrieveCustAddressResult = mysql_query ($retrieveCustAddressQuery);
	if (!$retrieveCustAddressResult) {
		echo "MySQL error :" . mysql_error();
		die;
	}
	while ($row = mysql_fetch_array($retrieveCustAddressResult)) {
		$custAddress1 = $row['address1'];
		$custAddress2 = $row['address2'];
		$custCity = $row['city'];
		$custState = $row['state'];
		$custZip = $row['zip'];
	}

	$retrieveLineitemQuery = "SELECT type, size, quantity, price, lineitem, date FROM orders WHERE invoicenum=$invoicenum";
	$retrieveLineitemResult = mysql_query ($retrieveLineitemQuery);
	if (!$retrieveLineitemResult) {
		echo "MySQL error :" . mysql_error();
		die;
	}
	while ($row = mysql_fetch_array($retrieveLineitemResult)) {
		$kegType[] = $row['type'];
		$kegSize[] = $row['size'];
		$kegQuantity[] = $row['quantity'];
		$kegPrice[] = $row['price'];
		$date[] = $row['date'];
	}

	$results = count($kegType);

	$depositAmount = 30;
	$returnAmount = -30;

	
	for ($i = 0;$i < $results; $i++) {
		if($kegType[$i] == "Keg Return") {$i=$i+1;}
		$kegQuantityTotal = $kegQuantity[$i] + $kegQuantityTotal;
		$subTotal = ($kegQuantity[$i] * $kegPrice[$i]) + $subTotal;
	}

	$kegDeposit = $kegQuantityTotal * $depositAmount;

	$subTotal = $subTotal + $kegDeposit;

	for ($i = 0;$i < $results; $i++) {
		if($kegType[$i] == "Keg Return") {
		$kegReturnQuantityTotal = $kegQuantity[$i] + $kegReturnQuantityTotal;
		}
	}

	$kegDepositReturn = $returnAmount * $kegReturnQuantityTotal; 

	$total = $subTotal + $kegDepositReturn;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Awesome Ales Inventory Tracker</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address">Awesome Ales
PO Box 40505
Portland, OR 97240

Phone: (503) 710-6417</textarea>

            <div id="logo">
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

			<?php echo $custName . "<br />" . $custAddress1 . "<br />"; if($custAddress2 !== "") {echo $custAddress2 . "<br />";} echo $custCity . ", " . $custState . " " . 
		$custZip;?>

            <table id="meta">
				<tr>
                    <td class="meta-head">Account #</td>
                    <td><textarea><?php echo $custid;?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea><?php echo $invoicenum;?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
					<td><textarea><?php $date = date("F j, Y", strtotime($date[0])); echo $date;?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$<?php echo $total?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
			
<?php 
	$a = 0;
	for ($i = 0; $i < $results; $i++) {	
		if($kegType[$i] == "Keg Return") {
			$a = 1;
			$returnKegQuantity = $kegQuantity[$i];
			break;
		} else {
			echo "<tr class='item-row'>";
			echo "<td class='item-name'<textarea>" . $kegType[$i] . "</textarea></td>";
			echo "<td class='description'><textarea>" . $kegSize[$i] . "</textarea></td>";
			echo "<td><textarea class='cost'>$" . $kegPrice[$i] . "</textarea></td>";
			echo "<td><textarea class='qty'>" . $kegQuantity[$i] . "</textarea></td>";
			echo "<td><span class='price'>$" . $kegPrice[$i] * $kegQuantity[$i] . "</span></td>";
			echo "</tr>";
		}
	}

	echo " <tr class='item-row'>";
	echo " <td class='item-name'><textarea></textarea></td>";
	echo " <td class='description'><textarea>Keg Deposit</textarea></td>";
	echo " <td><textarea class='cost'>$" . $depositAmount . "</textarea></td>";
	echo " <td><textarea class='qty'>" . $returnKegQuantity . "</textarea></td>";
	echo " <td><span class='price'>$" . $kegQuantityTotal * $depositAmount . "</span></td>";
	echo "</tr>";

	if($a == 1) {
		echo " <tr class='item-row'>";
		echo " <td class='item-name'><textarea></textarea></td>";
		echo " <td class='description'><textarea>Keg Return</textarea></td>";
		echo " <td><textarea class='cost'>$" . $returnAmount . "</textarea></td>";
		echo " <td><textarea class='qty'>" . $returnKegQuantity . "</textarea></td>";
		echo " <td><span class='price'>$" . $kegDepositReturn . "</span></td>";
		echo "</tr>";
	}
?>		

		 
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank" align="center"><?php echo $contactName?> Signature</td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$<?php echo $subTotal?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Keg Returns</td>
		      <td class="total-value"><div id="subtotal"></div>$<?php echo $kegDepositReturn?></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>

		      <td class="total-value"><textarea id="total">$<?php echo $total;?></textarea></td>
		  </tr>
		  
		</table>
	
	</div>
	
	</body>

</html>