<?php
session_start();

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Error Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(isset($_POST['username']) && isset($_POST['password'])){
	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}

	$search = $db->dbEsc($_POST['username']);
	$query = 'SELECT userpass,roleid FROM user,user2role WHERE user.id = user2role.userid AND username = "'.$search.'"';
	$result = $db->dbCall($query);

	var_dump($result);
	print "<br><br>";
	if(!empty($result) &&  password_verify($_POST['password'],$result[0]['userpass']))
	{
		$_SESSION['roles'] = array();
		foreach($result as $entry)
		{
				$index = $entry["roleid"] - 1;

				$_SESSION['roles'][$index] = $entry["roleid"];

				if($entry["roleid"] == "1")
				{
					$_SESSION['adminPriv'] = true;
				}
			
		}
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
		$_SESSION['error'] = false;
		header("Location: homePage.php");
	}
	else{
		$_SESSION['error'] = true;
		header("Location: login.php");
	}
}
else{
	$_SESSION['error'] = true;
		//header("Location: login.php");
}
?>