<?php
session_start();
require_once("Template.php");

require_once("DB.class.php");

$page = new Template("Result Page");

$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");

$page->finalizeTopSection();

$page->finalizeBottomSection();

if(isset($_POST['lookup']) && $_POST['lookup']!="")

{

	$data = array("lookup" => $_POST['lookup']);
	$dataJson = json_encode($data);

	$postString = "data=" . urlencode($dataJson);

	$contentLength = strlen($postString);

	$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'Content-Length: ' . $contentLength
	);

	$url = "http://cnmtsrv2.uwsp.edu/~ahill985/albumWS.php";


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

	print $page->getTopSection();
	print "<header class='header'>";
	print	"<nav>";
	print		"<ul>";
	print			"<li><a href='homePage.php'>Home</a></li>";
	print			"<h1 style = 'color:white; text-align:center;'>Album Result Page</h1>";

	print	  	"</ul>";
	print	"</nav>";
	print  "</header>";

	
	
	if(!empty($result))

	{

		print '<table id="dataWithoutNav" style = "padding-top:7%;">';

		print'<tr>';

		print'<th>ID</th>';

		print'<th>Insert Time</th> ';

		print'<th>Album Title</th>';

		print'<th>Album Artist</th>';

		print'<th>Album Length</th> ';

		print'<th>Status</th>';
		
		print'<th>URL</th>';

		print'</tr>';

			foreach ($result as $album)

			{

				print'<tr>';

				print'<td>'.$album["id"].'</td>';

				print'<td>'.$album["inserttime"].'</td>';

				print'<td>'.$album["albumtitle"].'</td>';

				print'<td>'.$album["albumartist"].'</td>';

				print'<td>'.$album["albumlength"].'</td> ';

				print'<td>'.$album["status"].'</td>';
				
				print'<td><a href="'.$album["url"].'">Amazon Music Link</a></td>';

				print'</tr>';

			}

		print '</table>';
		
		
		print $page->getBottomSection();

	}

	else

	{

		$sanatizedLookup = filter_var($_POST['lookup'], FILTER_SANITIZE_STRING);

		print '<p class="text" style = "margin-top:7%;">No match was found using "'.$sanatizedLookup. '"</p>';

	}

}

else{

	header("Location: albumPage.php");

}
