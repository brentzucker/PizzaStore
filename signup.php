<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';
require_once 'login.php';

build_html_head();
navigation_header();

echo '<main class="sign">';

echo '<table><tr><td>';

echo <<<END
<div class="signinform">
<h3>Sign in</h3>
<form action="validate.php" method="POST">
Email: <br>
<input type="text" name="email">
<br>Password: <br>
<input type="password" name="password">
<input type="hidden" name="signin" value="1">
<br>
<input type="submit" value="Submit">
</form>
</div>
END;

echo '</td><td>';

echo <<<END
<div class="signupform">
<h3>Sign Up</h3>
<form action="checkout.php" method="POST">
Email: <br>
<input type="text" name="email">
<br>Password: <br>
<input type="password" name="password">
<br>Confirm Password: <br>
<input type="password" name="confirmpassword">
<br>
<input type="submit" value="Submit">
</form>
</div>
END;

echo '</td></tr></table>';

echo '</main>';

footer_pizzastore();
?>