<?php
session_start();
require_once("Template.php");

$page = new Template("Privacy Policy Page");
$page->addHeadElement("<link rel='stylesheet' href='styles.css'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
 
print "<header class='header'>";

print	"<nav>";
print		"<ul>";
print			"<li><a href='homePage.php'>Home</a></li>";
print			"<li><a href='surveyPage.php'>Survey</a></li>";
print			"<li><a href='albumPage.php'>Album Search</a></li>";

if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'admin and user')){
	print			"<li><a href='surveyDataPage.php'>Survey Data</a></li>";
}
if(!isset($_SESSION['loggedin']))
{
	print	"<li class = 'right'><a href = 'login.php' id = 'logInAndOut'>Log In</a></li>";
}
else
{
	
	print	"<li class= 'right'><a href = 'logout.php' id = 'logInAndOut'>Log out</a></li>";
	print "<li class= 'right'><p id = 'welcomeMessege' style = 'color:  #d9d9d9;'>Welcome ".$_SESSION['name']."</p></li>";
}


print		"</ul>";
print	"</nav>";
print  "</header>";
print  "<!-- this is the private policy page from www.wisconsin.edu/privacy-policy/ -->";
print	"<div class='wrap'>"; 
print "<div class='content'>";
print "<div class='text'>";
print		"<p>&nbsp;&nbsp;&nbsp;The University of Wisconsin System Administration (UWSA) recognizes the 
			importance of protecting the privacy of information provided to us.
			</p>";
print "</div>";
print "<div class='text'>";
print	"<h3>Personal information</h3>";
print			"<p>&nbsp;&nbsp;&nbsp;We will use personal information that you provide via e-mail or through other 
			online means only for purposes necessary to serve your needs, such as responding 
			to an inquiry or other request for information. This may involve redirecting your 
			inquiry or comment to another person or department better suited to meeting your needs.
			Some webpages at UWSA may collect personal information about visitors and use that 
			information for purposes other than those stated above. Each webpage that collects 
			information will have a separate privacy statement that will tell you how that 
			information is used.
			</p>";

 
print "</div>";
print "<div class='text'>";
print		"<h3>Collected Information</h3>";
print			"<p>&nbsp;&nbsp;&nbsp;UWSA monitors network traffic for the purposes of site management and security.
			We use this information to help diagnose problems and carry out other administrative 
			tasks.We also use statistic information to determine which information is of most 
			interest to users, to identify system problem areas, or to help determine technical 
			requirements.The server log information does not include personal information.
			</p>";
print "</div>";
print "<div class='text'>";
print		"<h3>External websites</h3>";
print			"<p>&nbsp;&nbsp;&nbsp;This site contains links to other sites outside of UWSA. UWSA is not responsible 
			for the privacy practices or the content of such websites.
			</p>";
print "</div>";
print "<div class='text'>";
print		"<h3>Questions</h3>";
print			"<p>&nbsp;&nbsp;&nbsp;If you have any questions about this privacy statement, the practices of this site,
			or your use of this website, please contact Webmaster.
			</p>";
print "</div>";
print "</div>";
print	"</div>";	
print $page->getBottomSection();

