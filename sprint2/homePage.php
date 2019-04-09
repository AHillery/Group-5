<?php
session_start();
require_once("Template.php");

$page = new Template("Home Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();


print $page->getTopSection();
print "<header class='header'>";
if(!isset($_SESSION['loggedin']))
{
	print	"<a href = 'login.php' id = 'logInAndOut'>Log In</a>";
	print	  "<h1>Home Page</h1>";
}
else
{
	print	"<a href = 'logout.php' id = 'logInAndOut'>Log out</a>";
	print	  "<h1>Home Page</h1>";
	print "<p id = 'welcomeMessege'>Welcome ".$_SESSION['name']."</p>";
}
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";

if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'admin and user')){
	print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";
}
print		"</ul>";
print	"</nav>";
print "<!-- this paragraph gives info on what the page is for -->";
print	"<div class='wrap'>";
print	"<div class='content'>";

print		"<p class='text'>&nbsp;&nbsp;&nbsp;This is the home page for Sprint 2 assignment.</p>";

print	"</div>";
print	"</div>";
print $page->getBottomSection();

