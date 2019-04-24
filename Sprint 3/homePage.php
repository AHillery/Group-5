<?php
session_start();
require_once("Template.php");

$page = new Template("Home Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();


print $page->getTopSection();
print "<header class='header'>";

print	"<nav>";
print		"<ul>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";

if(isset($_SESSION['adminPriv']) && ($_SESSION['adminPriv'])){
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
print "<!-- this paragraph gives info on what the page is for -->";
print   "<div class = 'smallTxtBox'>";
print	"<div class='content'>";

print		"<p class='text'>&nbsp;&nbsp;&nbsp;This is the home page for Sprint 3 assignment.</p>";

print	"</div>";
print	"</div>";

print $page->getBottomSection();

