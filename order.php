<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main>';

if($_SESSION['cart']['signin'] != 1)
	updateCustomer($_SESSION['cart']['name'], $_SESSION['cart']['address'], $_SESSION['cart']['email'], $_SESSION['cart']['phone'], $_SESSION['cart']['creditcard']);

foreach($_SESSION['cart']['order'] as $order)
	if($order['PizzaID'] > 0)
		insertOrder($order['PizzaID'], $order['Size'], $order['Quantity'], $_SESSION['cart']['email']);

echo 'Your order has been placed. Thank you ' . getName($_SESSION['cart']['email']) . '.';

echo '</main>';

footer_pizzastore();

function insertOrder($pizzaID, $size, $quantity, $email)
{
	$orderDate = date("Y-m-d");
	$sql = "INSERT INTO orders(pizzaID, size, quantity, orderDate, Email) VALUES ('$pizzaID', '$size', '$quantity', '$orderDate', '$email')";
	$result = mysql_query($sql);
	return mysql_fetch_row($result);
}

function updateCustomer($name, $address, $email, $Phone, $CreditCard)
{
	//$sql = "INSERT INTO customer(name, address, email, Phone, CreditCard) VALUES ('$name', '$address', '$email', '$Phone', '$CreditCard')";
	$sql = "UPDATE customer SET name='$name', address='$address', Phone='$Phone', CreditCard='$CreditCard' WHERE email='$email'";
	$result = mysql_query($sql);
	return mysql_fetch_row($result);
}

function getName($email)
{
	$sql = "SELECT name FROM customer WHERE email='$email'";
	$result = mysql_query($sql);
	return mysql_fetch_row($result)[0];
}
?>