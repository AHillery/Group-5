<?php

require_once("Template.php");

$page = new Template("Home Page");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}

	$search = $db->dbEsc($_POST['username']);
	
	$query = 'SELECT userpass,roleid FROM user,user2role WHERE user.id = user2role.userid AND username = "'.$search.'"';
	$result = $db->dbCall($query);
	
	if(empty($result)){
		$succesfulLogin = false;
	}
	
	$succesfulLogin = password_verify($result['userpass'],PASSWORD_DEFAULT);


print $page->getTopSection();
print "<header class='header'>";
print	  "<h1>Home Page</h1>";
print  "</header>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='privacyPolicyPage.php'>Privacy Policy</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";
//if($_SESSION['role'] == 'admin'){}
print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";

print		"</ul>";
print	"</nav>";
print "<!-- this paragraph gives info on what the page is for -->";
print	"<div class='wrap'>";
print	"<div class='content'>";

//if(isset($_SESSION['role']))
print		"<p class='text'>&nbsp;&nbsp;&nbsp;This is the home page for Sprint 1 assignment. This page allows you to access the survey page, 
			 privacy policy page, and album search page in the navagation bar. </p>";
print	"</div>";
//else{}

print	"</div>";
print $page->getBottomSection();

