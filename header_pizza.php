<?php
require_once('html_head.php');

function navigation_bar()
{
	$navigation_link = array(
		array(
			"title" => "Home",
			"link" => "index.php"),
		array(
			"title" => "Menu",
			"link" => "menu.php"),
		array(
			"title" => "Cart",
			"link" => "cart.php"),
		array(
			"title" => "Location",
			"link" => "location.php")
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

function navigation_header()
{
	$logo = 'assets/images/doughboy_logo.jpg';
	echo '<body>';
	echo '<header>';
	
	echo '<img id="logo" src="' . $logo . '">';

	navigation_bar();

	echo '</header>';
}

?>