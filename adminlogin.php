<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main>';
echo<<<END
<form action="admin.php" method="POST">
Username<br>
<input type="text" name="username" value="admin">
<br>Password<br>
<input type="password" name="pwd">
<br>
<input type="submit" value="Sign In">
</form>
END;
echo '</main>';

footer_pizzastore();
?>