<?php

require_once("Template.php");

$page = new Template("Survey Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print	"<header>";
print		"<h1>Survey Page</h1>";
print	"</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print		"</ul>";
print	"</nav>";
print	"<!-- this is the form conataining major, grade, pizza topping -->";
print	"<div>";
print		"<form action='actionPage.php' method='POST'>";
print			"<fieldset>";
print				"<legend>What is your major?</legend>";
print				"<input type='checkbox' name='major' value='CIS-AppDev'> CIS-AppDev<br>";
print				"<input type='checkbox' name='major' value='CIS-Networking'> CIS-Networking<br>";
print				"<input type='checkbox' name='major' value='WDMD'> WDMD<br>";
print				"<input type='checkbox' name='major' value='WD'> WD<br>";
print				"<input type='checkbox' name='major' value='HTI'> HTI<br>";
print				"<input type='checkbox' name='major' value='Other'> Other<br>";
print			"</fieldset>";
			
print			"<fieldset>";
print				"<legend>What grade do you expect to recieve in CNMT 310?</legend>";
print				"<input type='radio' name='grade' value='A' checked> A<br>";
print				"<input type='radio' name='grade' value='B'> B<br>";
print				"<input type='radio' name='grade' value='C'> C<br>";
print				"<input type='radio' name='grade' value='D'> D<br>";
print				"<input type='radio' name='grade' value='F'> F<br>";
print			"</fieldset>";
			
print			"<fieldset>";
print				"<legend>What is your favorite pizza topping?</legend>";
print				"<input type='radio' name='pizzaTopping' value='Pepperoni' checked> Pepperoni<br>";
print				"<input type='radio' name='pizzaTopping' value='Sausage'> Sausage<br>";
print				"<input type='radio' name='pizzaTopping' value='Pineapple'> Pineapple<br>";
print				"<input type='radio' name='pizzaTopping' value='Canadian Bacon'> Canadian Bacon<br>";
print				"<input type='radio' name='pizzaTopping' value='Mushrooms'> Mushrooms<br>";
print				"<input type='radio' name='pizzaTopping' value='Extra Cheese '> Extra Cheese <br>";
print			"</fieldset>";
			
print			"<br><input type='submit' value='Submit'>";
print		"</form>" ;
print	"</div>";
print $page->getBottomSection();

