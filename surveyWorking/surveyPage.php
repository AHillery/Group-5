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
print			"<li><a href='albumPage.php'>Album Search</a></li>";
print		"</ul>";
print	"</nav>";
print	"<!-- this is the form conataining major, grade, pizza topping -->";
print	"<div>";
print		"<form action='actionPage.php' method='POST'>";
print			"<fieldset>";
print				"Enter your major:";
print 				"<input type='text' name='major' required><br>";
print			"</fieldset>";
			
print			"<fieldset>";
print				"<legend>Select Expected Grade</legend>";
print				"<input type='radio' name='grade' value='A' checked> A<br>";
print				"<input type='radio' name='grade' value='B'> B<br>";
print				"<input type='radio' name='grade' value='C'> C<br>";
print				"<input type='radio' name='grade' value='D'> D<br>";
print				"<input type='radio' name='grade' value='F'> F<br>";
print			"</fieldset>";
			
print			"<fieldset>";
print				"Enter your favorite pizza topping:";
print				"<input type='text' name='favPizzaTopping' required><br>";
print			"</fieldset>";


 


print			"<br><input type='submit' value='Submit'>";
print		"</form>" ;
print	"</div>";
print $page->getBottomSection();

