<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';

build_html_head();
navigation_header();

echo '<main>';

echo <<<END
<form action="validate.php" method="POST">
Name:<br>
<input type="text" name="name" value="">
<br>
Credit Card Numeber:<br>
<input type="text" name="creditcard" value="">
<br>
Address:<br>
<input type="text" name="address" value="">
<br>
Phone Number:<br>
<input type="text" name="phone" value="">
<br>
Email:<br>
<input type="text" name="email" value="">
<br>
<input type="submit" value="Confirm Order">
<button type="button" onclick="cancelFunction()">Cancel</button>
<form>
<script>
function cancelFunction()
{
	window.location.href = "index.php";
}
</script>
END;

echo '</main>';

footer_pizzastore();


?>