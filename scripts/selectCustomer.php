<?php
// For loop to generate radio button list of customers
	for ($i = 0; $i < $numberOfCustomers; $i++) {
		echo "<input type='radio' name='custid' value=" . $custid[$i] . ">" . $name[$i] . "<br />";
		//echo $name[$i] . "<br />";
	}
?>