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

	$db = new DB();

	if (!$db->getConnStatus()) 

	{

	  print "An error has occurred with connection\n";

	  exit;

	}

	$search = $db->dbEsc($_POST['lookup']);

	$query = 'SELECT * FROM album WHERE albumtitle = "'.$search.'" OR albumartist = "'.$search.'"';

	$result = $db->dbCall($query);

	print $page->getTopSection();
print "<header class='header'>";
print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<h1 style = 'color:white; text-align:center;'>Album Result Page</h1>";

print	  	"</ul>";
print	"</nav>";
print  "</header>";

print "<div class='content'>";
	if(!empty($result))

	{

		print '<table id="dataWithoutNav">';

		print'<tr>';

		print'<th>ID</th>';

		print'<th>Insert Time</th> ';

		print'<th>Album Title</th>';

		print'<th>Album Artist</th>';

		print'<th>Album Length</th> ';

		print'<th>Status</th>';

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

				print'</tr>';

			}

		print '</table>';
		print '</div>';
		print $page->getBottomSection();

	}

	else

	{

		$sanatizedLookup = filter_var($_POST['lookup'], FILTER_SANITIZE_STRING);

		print '<p class="text">No match was found using"'.$sanatizedLookup. '"</p>';

	}

}

else{

	print $page->getTopSection();

	print '<h1>ERROR: NOTHING WAS ENTERED</h1>';

	print $page->getBottomSection();

}
