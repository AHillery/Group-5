<?php
session_start();
require_once("Template.php");

$page = new Template("LogIn");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print	"<header  class='header'>";
print  "<nav  class='header'>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print		"</ul>";
print "</nav>";
print	"</header>";
print "<div class='content'>";
print  "<form name='myForm' action='errorPage.php' method='POST'>";
print  "<fieldset class='fieldset' id='loginFieldset'>";
print  "<label class='loginLabel' for='username'>Username: </label>";
print  "<input class='loginInput' type='text' name='username' value=''><br><br>";
print  "<label class='loginLabel' for='Password'>Password: </label>";
print  "<input class='loginInput' type='password' name='password' value=''><br><br>";
print  "<input type='submit' id='loginSubmit' name='submit' value='Log In'>";
print  "</fieldset>";
print  "</form>";
print  "</div>";
if(isset($_SESSION['error']) && $_SESSION['error'])
{
		print "<h3>ERROR LOGGING IN: invalid username or password</h3>";
}
print  "</div>";
print $page->getBottomSection();
?>
