<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';
require_once 'admin_functions.php';

build_html_head();
navigation_header();

echo '<main>';
admin_navigation();

if(isset($_POST['pizza']))
	insertPizza($_POST['pizzaName'], $_POST['type'], $_POST['price'], $_POST['imageName']);

echo<<<END
<h1>New Pizza</h1>
<form action="" method="POST">
Pizza Name:<br>
<input type="text" name="pizzaName">
<br>Type:<br>
<select name="type">
  <option name="type" value="Classic">Classic</option>
  <option name="type" value="Carnivore">Carnivore</option>
  <option name="type" value="Veggie">Veggie</option>
</select>
<br>Price:<br>
<input type="text" name="price">
<br>Image Name<br>
<input type="text" name="imageName">
<br>
<input type="submit" name="pizza" value="Add Pizza">
</form>
END;

printPizzas();

echo '</main>';

footer_pizzastore();
?>