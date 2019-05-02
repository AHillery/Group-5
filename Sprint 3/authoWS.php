<?php

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Error Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(isset($_POST['data'])){
	
	$logInInfo = (array) json_decode($_POST["data"]);
	

	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}
			
	
	$username = $logInInfo["username"];
	$password = $logInInfo["password"];

	$search = $db->dbEsc($username);
	$query = 'SELECT userpass,roleid FROM user,user2role WHERE user.id = user2role.userid AND username = "'.$search.'"';
	$result = $db->dbCall($query);
	

	$resultEncoded = json_encode($result);

	print $resultEncoded;
	
}
else{
	header("Location: login.php");
	
}

?>