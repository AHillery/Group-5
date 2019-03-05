<?php

require_once("Template.php");
require_once("DB.class.php");
$page = new Template("Action Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

$db = new DB();


if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}
$ip=$_SERVER['REMOTE_ADDR'];
$major = $db->dbEsc($_POST['major']);
$grade = $db->dbEsc($_POST['grade']);
$favPizzaTopping = $db->dbEsc($_POST['favPizzaTopping']);
$query = 'INSERT INTO survey VALUES (0,now(),"'.$major.'","'.$grade.'","'.$favPizzaTopping.'","'.$ip.'",0)';

$result = $db->dbCall($query);

print $page->getTopSection();
print	"<header>";
print		"<h1>Survey Submitted</h1>";
print	"</header>";
	
print	"<!-- this shows if you submitted the form  -->";
print	"<p id = 'notification'>Thank you for participating in our survey!!!</p>";
print	$query;

print $page->getBottomSection();

