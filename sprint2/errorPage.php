<?php
session_start();

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Error Page");
//$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(isset($_POST['username']) && isset($_POST['username'])){
	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}

	$search = $db->dbEsc($_POST['username']);
	$query = 'SELECT userpass,roleid FROM user,user2role WHERE user.id = user2role.userid AND username = "'.$search.'"';
	$result = $db->dbCall($query);


	if(!empty($result) &&  password_verify($_POST['password'],$result[0]['userpass']))
	{
		if(count($result) == 2)
		{
		$_SESSION['role'] = "admin and user";
		}
		else if($result[0]['roleid'] == "1")
		{
		$_SESSION['role'] = "admin";
		}
		else
		{
		$_SESSION['role'] = "user";	
		}
		
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
		
		header("Location: homePage.php");
	}
	else{
		print $page->getTopSection();
		print "<header class='header'>";
		print	  "<h1>ERROR LOGGING IN</h1>";
		print  "</header>";
		print "<p>Invalid username or password</p>";
		print $page->getBottomSection();
	}
}
else{
	print $page->getTopSection();
		print "<header class='header'>";
		print	  "<h1>ERROR LOGGING IN</h1>";
		print  "</header>";
		print "<p>Invalid username or password</p>";
		print $page->getBottomSection();
}
?>