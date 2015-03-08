<?php
$host = 'localhost';
$db = 'pizzaproject';
$username ='brent';
$pwd = 'bz';

//$link = msql_connect($host, $username, $pwd);
$link = mysql_connect('localhost', 'brent', 'bz');

if(!$link)
{ 
	die("unable to connect to database".mysql_error());
}

mysql_select_db($db);
?>