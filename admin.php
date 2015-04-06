<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';
require_once 'admin_functions.php';

if(!verifyAdmin($_POST['username'], $_POST['pwd']))
{
	header('Location: adminlogin.php');
}

build_html_head();
navigation_header();

echo '<main>';

admin_navigation();

echo '</main>';

footer_pizzastore();

function verifyAdmin($username, $pwd)
{
	$sql = "SELECT username FROM admin WHERE username='$username' AND pwd=PASSWORD('$pwd')";
	$result = mysql_query($sql);
	return (mysql_num_rows($result) == 1);
}
?>