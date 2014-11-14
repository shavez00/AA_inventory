<?php 

define ('DB_USER', 'shavez00');
define ('DB_PASSWORD', 'morgan08');
define ('DB_HOST', 'mysql5.serveronline.net');
define ('DB_NAME', 'aa_inventory');

$dbc = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('"Unable to connect to server:" . mysql_error());');
mysql_select_db (DB_NAME);
?>