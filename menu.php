<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main class="menu">';

retrievePizzaData("Classic");

retrievePizzaData("Carnivore");

retrievePizzaData("Veggie");

echo '</main>';

footer_pizzastore();

function retrievePizzaData($t)
{
	$type = $t; 

	$query = "SELECT pizzaName, imageName, pizzaID, price FROM pizza WHERE type='$type'";

	$result = mysql_query($query);

	echo '<h2 id="' . $type . '">' . $type . ' Pizza\'s</h2>';

	echo '<ul class="' . $type . '">';

	$rows = mysql_num_rows($result);
	for($i=0; $i<$rows; $i++)
	{
		$row = mysql_fetch_row($result);
		$name = $row[0];
		$img = $row[1];
		$pizzaID = $row[2];
		$price = $row[3];

		echo '<li>';
		echo '<h3>' . $name . '</h3>';
		echo '<img src="assets/images/' . $img . '">';
		echo "<div class=\"cartbutton\" onclick=\"addToCart('$name', '$img', '$pizzaID', '$price')\"><h5>Add To Cart</h5></div>";
		echo '</li>';
	}
	echo '</ul>';
}

function addToCart()
{/*
	$email = ;
	$pizzaID = ;
	$size = ;
	$quantity = ;
	$orderDate = ;
	$query = "INSERT INTO Orders(Email, pizzaID, size, quantity, orderDate) VALUES ('$email', '$pizzaID', '$size', '$quantity', '$orderDate')";
*/
}

?>