<?php

function build_html_head()
{
	session_start();
	/*if(!isset($_SESSION['cart'])
		$_SESSION['cart'] = array();*/
	echo '<html>';
	echo '<head>';

	//include stylesheet
	echo '<link rel="stylesheet" type="text/css" href="theme_pizzastore.css">';

	//include javascript 
	echo '<script src="pizzastore.js"></script>';
	echo '</head>';
}

?>