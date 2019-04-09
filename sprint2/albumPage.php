<?php

require_once("Template.php");

$page = new Template("Album Search Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<header class='header'>";
print	  "<h1>Album Search</h1>";
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
//if($_SESSION['admin']){}
print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";

print		"</ul>";
print	"</nav>";
print	"<div class='wrap'>";


 
print "<div class='content' id='album'>";
print		"<form action='resultPage.php' method='POST'>";
print 			"<fieldset class'text'>";
print				"<label for='searchBox'>Enter ablum title or album artist:&nbsp;</label>";
print 			"<input id='searchBox' type='text' name='lookup'><br>";
print			"</fieldset>";
print			"<input id='submit' type='submit' value='Submit'>";
print		"</form>";
print 	"</div>";
print 	"</div>";
print $page->getBottomSection();