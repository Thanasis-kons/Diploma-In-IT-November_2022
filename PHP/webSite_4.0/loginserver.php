<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 
require("CONSTANTS.php");

// var_dump($_SERVER);exit();
// echo "My ip: <br>" . $_SERVER['SERVER_ADDR']; exit();

startSession();
// var_dump($_SESSION); exit();
redirectBannedUser();

if(isRequestMethodPost()) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(isset($userName) && isset($password)) {
        $sql = "SELECT username, user_password
                FROM users
                WHERE username = '{$userName}' AND user_password = '{$password}'";

        $data = selectFromDbSimple($sql);

        if(!empty($data)) {
            echo "Welcome user: $userName";
        } else {
            echo "User not found!";
        }

        // var_dump($data);exit();
    }
} else {
    banUserIp(getUserIp()); 
    redirectTo("errorPage.php");
}


?>