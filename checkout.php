<?php
require_once 'login.php';
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';

if(isset($_POST['confirmpassword']) && $_POST['confirmpassword'] != $_POST['password'])
{
	header('Location: signup.php');
}
elseif(isset($_POST['confirmpassword']) && $_POST['confirmpassword'] == $_POST['password']) 
{
	createCustomer($_POST['email'], $_POST['password']);
}
elseif(verifyCustomer($_POST['email'], $_POST['password']) != 1)
{
	header('Location: signup.php');	
}

build_html_head();
navigation_header();

$email = $_POST['email'];
$_SESSION['cart']['email'] = $email;

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
<input type="hidden" name="email" value="$email">
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

function createCustomer($email, $password)
{
	$sql = "INSERT INTO customer(email, passwd) VALUES ('$email', '$password')";
	$result = mysql_query($sql);
}

function verifyCustomer($email, $password)
{
	$sql = "SELECT email, passwd FROM customer WHERE email='$email' AND passwd='$password'";
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}

?>