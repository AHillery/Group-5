<?php
require_once("Template.php");
$page = new Template("Result Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print	"<header>";
print		"<h1>Result From Query</h1>";
print	"</header>";
print	"<table style='width:100%'>";
print	"<tr>";
print	"<th>Firstname</th>";
print	"<th>Lastname</th> ";
print	"<th>Age</th>";
print	"</tr>";
print	"<tr>";
print	"<td>Jill</td>";
print	"<td>Smith</td>";
print	"<td>50</td>";
print	"</tr>";
print	"</table>";
print $page->getBottomSection();