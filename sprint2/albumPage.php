<?php
session_start();
require_once("Template.php");

$page = new Template("Album Search Page");
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
	print	"<li class = 'right'><a href = 'login.php' id = 'logInAndOut'>Log In</a></li>";
}
else
{
	
	print	"<li class= 'right'><a href = 'logout.php' id = 'logInAndOut'>Log out</a></li>";
	print "<li class= 'right'><p id = 'welcomeMessege' style = 'color:  #d9d9d9;'>Welcome ".$_SESSION['name']."</p></li>";
}


print		"</ul>";
print	"</nav>";
print  "</header>";

print "<div class='content' id='album'>";
print		"<form action='resultPage.php' method='POST'>";
print 			"<fieldset class'fieldset' id='albumFieldset>";
print				"<label class='loginLabel' for='searchBox'>Enter ablum title or album artist:&nbsp;</label>";
print 				"<input class='loginInput' id='searchBox' type='text' name='lookup'><br>";
print				"<input id='albumSubmit' type='submit' value='Search'>";
print			"</fieldset>";
print		"</form>";
print 	"</div>";
print $page->getBottomSection();
