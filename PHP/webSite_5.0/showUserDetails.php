<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();

$sql = "SELECT *
        FROM users";

$data = selectFromDbSimple($sql);

foreach($data as $user) {
    // var_dump($user); exit();
    foreach($user as $field => $value) {
        
        echo $field . $value;
    }
}
?>