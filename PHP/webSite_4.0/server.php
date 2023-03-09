<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 
require("CONSTANTS.php");

startSession();
redirectBannedUsers();

// echo "My ip: <br>" . $_SERVER['SERVER_ADDR']; exit();
// var_dump($_SERVER);
// var_dump($_SESSION); exit();


if(isRequestMethodPost()) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    // if(isset($userName)) {
    //     echo $userName . "<br>";
    // }

    
    // if(isset($password)) {
    //     echo $password . "<br>";
    // }

    $data = selectFromDbSimple('users', ['username', 'user_password'], "return");

    // var_dump($data);exit();

    foreach($data as $dbUserData) {
        // var_dump($dbUserData); exit();

        $dbUserName = $dbUserData['username'];
        $dbPassword = $dbUserData['user_password'];
    }

} else {
    banUserIp("::1"); 
    redirectTo("errorPage.php");
}


?>