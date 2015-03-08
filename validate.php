<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';

session_start();

$name = $_POST['name'];
$creditcard = $_POST['creditcard'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

if(!(strlen($name) > 0 && strlen($creditcard) > 0 && strlen($address) > 0 && strlen($phone) > 0 && strlen($email) > 0))
{
	header('Location: checkout.php');
}

$_SESSION['cart']['name'] = $name;
$_SESSION['cart']['creditcard'] = $creditcard;
$_SESSION['cart']['address'] = $address;
$_SESSION['cart']['phone'] = $phone;
$_SESSION['cart']['email'] = $email;

build_html_head();
navigation_header();

echo '<main class="confirmation">';

echo '<table>';
echo '<tr>';
echo '<td><table class="inner-table">';
printCart();
echo '</table></td>';
echo '<td>';
echo "$name <br> $creditcard <br> $address <br> $phone <br> $email";
echo '</td>';
echo '</tr>';
echo '</table>';
echo <<<END
<form action="order.php">
<input type="submit" value="Place Order">
<form>
END;

echo '</main>';

footer_pizzastore();
function printCart()
{
	$cart = $_SESSION['cart']['order'];
	echo '<ul class="confirmation">';
	foreach(array_reverse($cart) as $item)
		if($item['PizzaID'] > 0)
			printItem($item);

	echo '</ul>';
}

function printItem($item)
{
	echo '<li class="entry">';
	echo '<table class="entry-table">';
	echo '<tr>';
	//echo '<td><img src="assets/images/' . getPizzaImage($item['PizzaID'])[0] . '"></td>';
	echo '<td><h3>' . getPizzaName($item['PizzaID']) . ' Pizza</h3></td>';
	echo '<td><strong>Size:</strong><br>' . $item['Size'] . '</td>';
	echo '<td><strong>Quantity:</strong><br>' . $item['Quantity'] .'</td>';
	echo '</tr>';
	echo '</table>';
	echo '</li>';
}

function getPizzaName($pizzaID)
{
	$sql = "SELECT pizzaName FROM pizza WHERE pizzaID='$pizzaID'";
	//echo "$sql";
	$result = mysql_query($sql);
	return mysql_fetch_row($result);
}

function getPizzaImage($pizzaID)
{
	$sql = "SELECT imageName FROM pizza WHERE pizzaID='$pizzaID'";
	$result = $result = mysql_query($sql);
	return mysql_fetch_row($result);
}
?>