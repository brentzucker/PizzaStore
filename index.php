<?php
require_once 'html_head.php';
require_once 'header_pizza.php';
require_once 'footer_pizza.php';

build_html_head();
navigation_header();

echo '<main>';

$frontpage_pizza = array(
	array("title"=>"Veggie Specialities",
		"img"=>"Veggie_Specialities.jpg",
		"link"=>"menu.php#Veggie"),
	array("title"=>"Carnivore Specialties",
		"img"=>"Carnivore_Specialties.jpg",
		"link"=>"menu.php#Carnivore"),
	array("title"=>"Classics",
		"img"=>"classic.png",
		"link"=>"menu.php#Classic")
	);


foreach($frontpage_pizza as $i)
{
	echo '<div class="frontpage_pizza">';
	echo '<a href="' . $i["link"] . '">';
	echo '<div class="button">';
	echo '<h3>' . $i["title"] . '</h3>';
	echo '</div>';
	echo '</a>';
	echo '<img width="100%" height:"760px" src="assets/images/' . $i["img"] . '" caption="' . $i["title"] . '">';
	echo '</div>';
}

echo '</main>';

footer_pizzastore();
?>