<?php
session_start();

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Error Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(isset($_POST['username']) && isset($_POST['password'])){
	$data = array("username" => $_POST['username'], "password" => $_POST['password']);
	
	$dataJson = json_encode($data);

	$postString = "data=" . urlencode($dataJson);

	$contentLength = strlen($postString);

	$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'Content-Length: ' . $contentLength
	);

	$url = "http://cnmtsrv2.uwsp.edu/~ahill985/authoWS.php";


	$ch = curl_init();

	curl_setopt($ch,
		CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch,
		CURLOPT_POSTFIELDS, $postString);
	curl_setopt($ch,
		CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,
		CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,
		CURLOPT_URL, $url);

	$return = curl_exec($ch);
	
	curl_close($ch);
	
	$resultDecoded = json_decode($return);
	
	$result = array();
	$index = 0;
	
	foreach($resultDecoded as $entry){
		$result[$index] = (array)$entry;
		$index += 1;
	}
	

	
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
	header("Location: login.php");
}
?>