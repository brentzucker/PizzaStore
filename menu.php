<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';

build_html_head();
navigation_header();

echo '<main class="menu">';

echo '<h2 id="Classics">Classic Pizza\'s</h2>';

$classic = array(
	array("name"=>"Cheese",
		"img"=>"cheese.jpg"),
	array("name"=>"Pepperoni",
		"img"=>"pepperoni.jpg"),
	array("name"=>"Sausage",
		"img"=>"sausage.jpg")
	);

$carnivore = array(
	array("name"=>"Buffalo Chicken",
		"img"=>"buffalochicken.jpg"),
	array("name"=>"Philly Cheesesteak",
		"img"=>"phillycheesesteak.jpg"),
	array("name"=>"Jerk Chicken",
		"img"=>"jerkchicken.jpg")
	);

$veggie = array(
	array("name"=>"Eggplant",
		"img"=>"eggplant.jpg"),
	array("name"=>"Artichoke",
		"img"=>"artichoke.jpg"),
	array("name"=>"Veggie Supreme",
		"img"=>"veggiesupreme.jpg")
	);

printPizzas($classic, "classics");

echo '<h2 id="Carnivore">Carnivore Pizza\'s</h2>';

printPizzas($carnivore, "carnivore");

echo '<h2 id="Veggie">Veggie Pizza\'s</h2>';

printPizzas($veggie, "veggie");

echo '</main>';

footer_pizzastore();

function printPizzas($classic, $name)
{
	echo '<ul class="' . $name . '">';
	foreach($classic as $c)
	{
		echo '<li>';
		echo '<h3>' . $c["name"] . '</h3>';
		echo '<img src="assets/images/' . $c["img"] . '">';
		echo '<div class="cartbutton"><h5>Add To Cart</h5></div>';
		echo '</li>';
	}
	echo '</ul>';
}

?>