<a href="../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();

if(isRequestMethodPost()) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(isset($userName) && isset($password)) {
        $sql = "SELECT user_name, role
                FROM users
                WHERE user_name = '{$userName}' AND password = '{$password}'";

        $data = selectFromDbSimple($sql);

        if(!empty($data)) {
            $loginOutcome = logUserIn($data[0]['user_name'], $data[0]['role']);

            if($loginOutcome) {
                echo "Welcome user: $userName"  . "<br>";
            } else {
                echo "Another user is already logged in!";
            }
        } else {
            echo "User not found!"  . "<br>";
        }
    }
} else {
    banUserIp(getUserIp()); 
    redirectTo("errorPage.php");
}
?>