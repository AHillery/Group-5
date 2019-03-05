<?php

require_once("Template.php");

$page = new Template("Album Search Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<header>";
print	  "<h1>Album Search</h1>";
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print		"</ul>";
print	"</nav>";
print	"<div>";
print		"<form action='resultPage.php' method='POST'>";
print 			"<fieldset>";
print				"Enter ablum title or album artist:";
print 				"<input type='text' name='lookup' required><br>";
print			"</fieldset>";
print			"<br><input type='submit' value='Submit'>";
print		"</form>";
print 	"</div>";
print $page->getBottomSection();