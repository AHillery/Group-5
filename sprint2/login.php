<?php
session_start();
require_once("Template.php");

$page = new Template("LogIn");
$page->addHeadElement("<link rel='stylesheet' href='style.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print  "<form name='myForm' action='errorPage.php' method='POST'>";
print  "<fieldset>";
print  "<label for='username'>Username</label>";
print  "<input type='text' name='username' value=''><br>";
print  "<label for='Password'>Password</label>";
print  "<input type='password' name='password' value=''><br>";
print  "<input type='submit' id='submit' name='submit' value='Log In'>";
print  "</fieldset>";
print  "</form>";

print $page->getBottomSection();
?>
