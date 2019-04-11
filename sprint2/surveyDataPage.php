<?php
session_start();
require_once("Template.php");
require_once("DB.class.php");
$page = new Template("Survey Data Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// if($_SESSION['admin'] && isset($_SESSION['admin']{
	
if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'admin and user'))
{
	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}
	$query = 'SELECT id,submittime,major,expectedgrade,favetopping,userip FROM survey';
	$result = $db->dbCall($query);
	print $page->getTopSection();
	
	print "<header class='header'>";
		print	"<a href = 'logout.php' id = 'logInAndOut'>Log out</a>";
		print	  "<h1>Survey Data</h1>";
		print "<p id = 'welcomeMessege'>Welcome ".$_SESSION['name']."</p>";
	print  "</header>";
	print	"<nav>";
	print		"<ul>";
	print			"<li><a href='homePage.php'>Home</a></li>";
	print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
	print			"<li><a href='surveyPage.php'>Survey</a></li>";
	print			"<li><a href='albumPage.php'>Album Search</a></li>";
	print		"</ul>";
	print	"</nav>";
	
	if(!empty($result))
	{
		print '<table id="dataWithoutNav">';
		print'<tr>';
		print'<th>ID</th>';
		print'<th>Insert Time</th> ';
		print'<th>Major</th>';
		print'<th>Expected Grade</th>';
		print'<th>Favorite Pizza Topping</th> ';
		print'<th>User IP</th>';
		print'</tr>';
			foreach ($result as $entry)
			{
				print'<tr>';
				print'<td>'.$entry["id"].'</td>';
				print'<td>'.$entry["submittime"].'</td>';
				print'<td>'.$entry["major"].'</td>';
				print'<td>'.$entry["expectedgrade"].'</td>';
				print'<td>'.$entry["favetopping"].'</td> ';
				print'<td>'.$entry["userip"].'</td>';
				print'</tr>';
			}
		print '</table>';
		
		print $page->getBottomSection();
	}
	
	else
	{
		print '<p class="text">There is no data in the survey table</p>';
	}
}
else
{
print '<p class="text">ERROR: UNAUTHORIZED ACCESS PAGE WILL NOT BE DISPLAYED </p>';
}