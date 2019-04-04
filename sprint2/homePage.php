<?php

require_once("Template.php");

$page = new Template("Home Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<header class='header'>";
print	  "<h1>Home Page</h1>";
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";

print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";

print		"</ul>";
print	"</nav>";
print "<!-- this paragraph gives info on what the page is for -->";
print	"<div class='wrap'>";
print	"<div class='content'>";
print		"<p class='text'>&nbsp;&nbsp;&nbsp;This is the home page for Sprint 1 assignment. This page allows you to access the survey page, 
			 privacy policy page, and album search page in the navagation bar. </p>";
print	"</div>";
print	"</div>";
print $page->getBottomSection();

