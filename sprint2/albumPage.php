<?php
session_start();
require_once("Template.php");

$page = new Template("Album Search Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<header class='header'>";
print	"<nav class='header'>";
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
print		"</ul>";
print	"</nav>";
print  "</header>";
print "<div class='content' id='albumSearch'>";
print		"<form action='resultPage.php' method='POST'>";
print 			"<fieldset class'text'>";
print				"<label for='searchBox'>Enter ablum title or album artist:&nbsp;</label>";
print 			"<input id='searchBox' type='text' name='lookup'><br>";
print			"</fieldset>";
print			"<input id='submit' type='submit' value='Submit'>";
print		"</form>";
print 	"</div>";
print $page->getBottomSection();
