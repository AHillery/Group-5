<?php

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Error Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(isset($_POST['data'])){
	
	$searchInfo = (array) json_decode($_POST["data"]);
	

	$db = new DB();
	if (!$db->getConnStatus()) 
	{
	  print "An error has occurred with connection\n";
	  exit;
	}
			
	
	$lookup = $searchInfo["lookup"];


	$search = $db->dbEsc($lookup);
	$query = 'SELECT * FROM albums WHERE albumtitle = "'.$search.'" OR albumartist = "'.$search.'"';
	$result = $db->dbCall($query);
	
	$resultEncoded = json_encode($result);

	print $resultEncoded;
	
}
else{
	header("Location: albumPage.php");
	
}
?>