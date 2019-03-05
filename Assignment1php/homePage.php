<?php

require_once("Template.php");

$page = new Template("Home Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<header>";
print	  "<h1>Home Page</h1>";
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print		"</ul>";
print	"</nav>";
print "<!-- this paragraph gives info on what the page is for -->";
print	"<div>";
print		"<p>&nbsp;&nbsp;&nbsp;This is the home page for assignment 1. This page allows you to access the survey page and the 
		   privacy policy page in the navagation bar. </p>";
print	"</div>";
print $page->getBottomSection();

