<?php

require_once("Template.php");

$page = new Template("Action Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print	"<header>";
print		"<h1>Survey Submitted</h1>";
print	"</header>";
	
print	"<!-- this shows if you submitted the form  -->";
print	"<p id = 'notification'>Thank you for participating in our survey!!!</p>";
print $page->getBottomSection();

