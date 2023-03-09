<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 
require("CONSTANTS.php");

startSession();
redirectBannedUsers();



if(isRequestMethodPost()) {
    $ip = $_POST['ip'];
  if (isset($ip))  {
    logoutUser();
    echo "successful logout";
  } else{
echo " failure";
  }
    

   
}


?>