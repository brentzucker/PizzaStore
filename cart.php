<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main class="cart">';

//Check to see if Clear Cart button has been pressed
if(isset($_POST['Clear_Cart']))
	$_SESSION['cart']=null;

if(!isset($_SESSION['cart']['order']))
	$_SESSION['cart']['order'] = array();


$pizza_price = getPizzaPrice($_POST['PizzaID']);

if($_POST['size'] === 'S')
	$price = ($pizza_price*.6);
elseif($_POST['size'] === 'M')
	$price = ($pizza_price*.8);
else if($_POST['size'] === 'L')
	$price = ($pizza_price);
else 
	$price = ($pizza_price * 1.25);

$price *= $_POST['quantity'];

$price = number_format($price, 2);

array_push($_SESSION['cart']['order'], array("PizzaID"=>$_POST['PizzaID'], "Size"=>$_POST['size'], "Quantity"=>$_POST['quantity'], "Price"=>$price));

echo '<h1>Cart</h1>';

printCart();

//Clear Cart button
echo <<<END
<form method="POST" action="">
<input type="submit" name="Clear_Cart" value="Clear Cart">
</form>
END;

//Checkout button
echo <<<END
<form action="signup.php">
<input type="submit" value="Checkout">
<form>
END;
echo '</main>';

footer_pizzastore();


function printCart()
{
	$cart = $_SESSION['cart']['order'];
	$_SESSION['cart']['order']['PizzaName'] = getPizzaName($_SESSION['cart']['order']['PizzaID'])[0];
	echo '<ul class="orders">';
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
	echo '<td><img src="assets/images/' . getPizzaImage($item['PizzaID']) . '"></td>';
	echo '<td><h3>' . getPizzaName($item['PizzaID']) . ' Pizza</h3></td>';
	echo '<td><strong>Size:</strong><br>' . $item['Size'] . '</td>';
	echo '<td><strong>Quantity:</strong><br>' . $item['Quantity'] .'</td>';
	echo '<td><strong>Price:</strong><br>$' . $item['Price'] . '</td>';
	echo '</tr>';
	echo '</table>';
	echo '</li>';
}

function getPizzaName($pizzaID)
{
	$sql = "SELECT pizzaName FROM pizza WHERE pizzaID='$pizzaID'";
	$result = mysql_query($sql);
	return mysql_fetch_row($result)[0];
}

function getPizzaImage($pizzaID)
{
	$sql = "SELECT imageName FROM pizza WHERE pizzaID='$pizzaID'";
	$result = mysql_query($sql);
	return mysql_fetch_row($result)[0];
}

function getPizzaPrice($pizzaID)
{
	$sql = "SELECT price FROM pizza WHERE pizzaID='$pizzaID'";
	$result = mysql_query($sql);
	return mysql_fetch_row($result)[0];
}

?>