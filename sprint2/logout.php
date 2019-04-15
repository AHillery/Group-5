<?php
session_start();

unset($_SESSION["role"]); 
unset($_SESSION["loggedin"]);
unset($_SESSION["name"]); 
unset($_SESSION["error"]); // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: homePage.php");

?>