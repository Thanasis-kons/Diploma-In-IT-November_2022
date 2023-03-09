<?php
require('functions/genericFunctions.php'); 
require('functions/userFunctions.php'); 
require("CONSTANTS.php");

startSession(); 

$errorMessage = empty($_SESSION['Error_Message']) ? "Unknown Error" : $_SESSION['Error_Message'];

echo "<h1>$errorMessage</h1>"

?>

