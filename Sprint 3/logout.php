<?php
session_start();

$_SESSION = array();
session_destroy(); // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: homePage.php");

?>