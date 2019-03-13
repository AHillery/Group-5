
<?php

require_once("Template.php");

require_once("DB.class.php");

$page = new Template("Action Page");

$page->addHeadElement("<link rel='stylesheet' href='style.css'>");

$page->finalizeTopSection();

$page->finalizeBottomSection();

$db = new DB();

print $page->getTopSection();

if (!$db->getConnStatus()) 

{

  print "An error has occurred with connection\n";

  exit;

}

if((isset($_POST['major']) && isset($_POST['grade']) && isset($_POST['pizzaTopping'])))

{

	$ip=$_SERVER['REMOTE_ADDR'];

	$major = $db->dbEsc($_POST['major']);

	$grade = $db->dbEsc($_POST['grade']);

	$favPizzaTopping = $db->dbEsc($_POST['pizzaTopping']);

	

	if(($_POST['major'] != "" && $_POST['pizzaTopping'] != ""))

	{

	

	$query = 'INSERT INTO survey VALUES (0,now(),"'.$major.'","'.$grade.'","'.$favPizzaTopping.'","'.$ip.'",0)';

	$result = $db->dbCall($query);

	



	print	"<header class='header'>";

	print		"<h1>Survey Submitted</h1>";

	print	"</header>";

		

		print	"<!-- this shows if you submitted the form  -->";


 
  print "<div class='wrap'>";


 
  print	"<div class='content'>";


 
	print	"<p class='text' id='notification'>Thank you for participating in our survey!!!</p>";


 
  print "</div>";


 
  print "</div>";

	}

	else

	{

		if($major == "")

		{

			print"<h1>ERROR: MAJOR FIELD WAS LEFT BLANK WHEN FORM WAS ENETERD</h1>";

		}

		else if($favPizzaTopping == "")

		{

				print"<h1>ERROR: FAVORITE PIZZA TOPPING FIELD WAS LEFT BLANK WHEN FORM WAS ENETERD</h1>";

		}

	}

}

else

{

	print"<h1>ERROR: NO FORM SUBMITTED</h1>";

}

print $page->getBottomSection();

