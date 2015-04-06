<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main class="summary">';

echo '<h1>Today\'s Orders</h1>';

pizzasSold();

echo '</main>';

footer_pizzastore();

function pizzasSold()
{
	$query = "SELECT SUM(quantity), SUM(quantity * price) FROM pizza, orders WHERE orders.pizzaID = pizza.pizzaID AND DATE(orderDate) = CURDATE()";

	$result = mysql_query($query);

	echo '<table class="summary">';

	echo '<th>Pizzas Sold </th>';
	echo '<th>Revenue</th>';

	$rows = mysql_num_rows($result);
	for($i=0; $i<$rows; $i++)
	{
		$row = mysql_fetch_row($result);
		echo '<tr>';

		foreach($row as $r)
		{
			echo '<td>' . $r . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}
?>