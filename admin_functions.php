<?php
require_once 'login.php';
function admin_navigation()
{
	$navigation_link = array(
		array(
			"title" => "Manage Menu",
			"link" => "managemenu.php"),
		array(
			"title" => "Sales Reports",
			"link" => "salesreports.php")
		);

	//Print links in unordered list
	echo '<ul class="navigation_bar">';

	foreach($navigation_link as $n)
	{
		//echo '<li>';
		echo '<a href="' . $n['link'] . '"><li>' . $n['title'] . '</li></a>';
		//echo '</li>';
	}

	echo '</ul>';
}

function printPizzas()
{
	$sql = "SELECT * FROM pizza";
	$result = mysql_query($sql);

	echo '<table>';

	for($i=0; $i<mysql_num_rows($result); $i++)
	{
		echo '<tr>';
		$row = mysql_fetch_row($result);
		foreach($row as $c)
			echo "<td>$c</td>";
		echo '</tr>';
	}

	echo '</table>';
}

function insertPizza($pizzaName, $type, $price, $imageName)
{
	$sql="INSERT INTO pizza(pizzaName, type, price, imageName) VALUES('$pizzaName', '$type', '$price', '$imageName')";
	$result = mysql_query($sql);
}

function printOrders($date)
{
	$sql = "SELECT * FROM orders WHERE orderDate='$date'";
	$result = mysql_query($sql);

	echo '<table>';
	echo '<tr><th>OrderID</th><th>PizzaID</th><th>Size</th><th>Quantity</th><th>OrderDate</th><th>Email</th></tr>';

	for($i=0; $i<mysql_num_rows($result); $i++)
	{
		echo '<tr>';
		$row = mysql_fetch_row($result);
		foreach($row as $c)
			echo "<td>$c</td>";
		echo '</tr>';
	}

	echo '</table>';
}
?>