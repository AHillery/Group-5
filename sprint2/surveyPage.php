<?php
session_start();


require_once("Template.php");



$page = new Template("Survey Page");

$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");

$page->finalizeTopSection();

$page->finalizeBottomSection();



print $page->getTopSection();



 
print "<header class='header'>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'admin and user')){
	print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";
}
if(!isset($_SESSION['loggedin']))
{
	print	"<a href = 'login.php' id = 'logInAndOut'>Log In</a>";
}
else
{
	print	"<a href = 'logout.php' id = 'logInAndOut'>Log out</a>";
}
print	  	"</ul>";
print	"</nav>";
print  "</header>";
print	"<!-- this is the form conataining major, grade, pizza topping -->";
print "<div class='content'>";
print		"<form action='actionPage.php' method='POST'>";
print			"<fieldset class='text' id='survey'>";
print				"<h2 class='title'>What is your major?</h2>";
print 				"<input type='checkbox' name='major' id='major-1' value='CIS-AppDev'>";
print         "<label for='major-1'> CIS-AppDev </label><br> ";
print 				"<input type='checkbox' name='major' id='major-2' value='CIS-Networking'>";
print 				"<label for='major-2'> CIS-Networking </label><br> ";
print 				"<input type='checkbox' name='major' id='major-3' value='WDMD'>";
print 				"<label for='major-3'> WDMD</label><br> ";
print 				"<input type='checkbox' name='major' id='major-4' value='WD'>";
print 				"<label for='major-4'> WD </label><br> ";
print 				"<input type='checkbox' name='major' id='major-5' value='HTI'>";
print 				"<label for='major-5'> HTI </label><br>";
print 				"<input type='checkbox' name='major' id='major-6' value='Other'>";
print 				"<label for='major-6'> Other </label><br>";
print			"</fieldset>";
print			"<fieldset class='text' id='survey'>";
print				"<h2 class='title'>What grade do you expect to recieve in CNMT 310?</h2>";
print				"<input type='radio' name='grade' id='grade-1' value='A'>";
print       "<label for='grade-1'> A </label><br> ";
print				"<input type='radio' name='grade' id='grade-2' value='B'>";
print				"<label for='grade-2'> B </label><br>";
print				"<input type='radio' name='grade' id='grade-3' value='C'>";
print				"<label for='grade-3'> C </label><br>";
print				"<input type='radio' name='grade' id='grade-4' value='D'>";
print 		  "<label for='grade-4'> D </label><br>";
print				"<input type='radio' name='grade' id='grade-5' value='F'>";
print 			"<label for='grade-5'> F </label><br>";
print			"</fieldset>";
print			"<fieldset class='text' id='survey'>";
print				"<h2 class='title'>What is your favorite pizza topping?</h2>";
print				"<input type='radio' name='pizzaTopping' id='topping-1' value='Pepperoni'>";
print				"<label for='topping-1'> Pepperoni </label><br>";
print				"<input type='radio' name='pizzaTopping' id='topping-2' value='Sausage'>";
print				"<label for='topping-2'> Sausage </label><br>";
print				"<input type='radio' name='pizzaTopping' id='topping-3' value='Pineapple'>";
print				"<label for='topping-3'> Pineapple </label><br>";
print				"<input type='radio' name='pizzaTopping' id='topping-4' value='Canadian Bacon'>";
print				"<label for='topping-4'> Canadian Bacon </label><br>";
print				"<input type='radio' name='pizzaTopping' id='topping-5' value='Mushrooms'>";
print				"<label for='topping-5'> Mushrooms </label><br>";
print				"<input type='radio' name='pizzaTopping' id='topping-6' value='Extra Cheese'>";
print				"<label for='topping-6'> Extra Cheese </label><br>";
print			"</fieldset>";
print			"<br><input id='submit' type='submit' value='Submit'>";
print		"</form>";
print "</div>";
print $page->getBottomSection();

