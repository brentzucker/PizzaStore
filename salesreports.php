<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';
require_once 'admin_functions.php';

build_html_head();
navigation_header();

echo '<main>';

echo <<<END
<h1>Enter Date</h1>
<form action="" method="POST">
<input type="date" name="orderDate">
<input type="submit" name="submit" value="submit">
</form>
END;

if(isset($_POST['submit']))
{
	echo '<h2>' . $_POST['orderDate'] . '</h2>';
	printOrders($_POST['orderDate']);
}

echo '</main>';

footer_pizzastore();
?>