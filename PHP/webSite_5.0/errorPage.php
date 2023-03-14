<?php
require('functions/genericFunctions.php'); 
require('functions/userFunctions.php'); 
require("CONSTANTS.php");

startSession(); 

// array_push($_SESSION['bannedIps'], "::15");

// var_dump($_SESSION); exit();

$errorMessage = empty($_SESSION['Error_Message']) ? "Unknown Error" : $_SESSION['Error_Message'];

echo "<h1>$errorMessage</h1>";

?>

