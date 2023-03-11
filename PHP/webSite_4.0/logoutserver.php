<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 

startSession();

if(isRequestMethodPost()) {
    $logoutOutcome = false;

    $ip = $_POST['ip'];

    if(isset($ip)) {
        $logoutOutcome = logoutUser($ip);
    }

    echo $logoutOutcome ? "Logged out ip: '$ip'" : "Failed to logout ip: '$ip'";

    
} else {
    redirectBannedUser();
    banUserIp(getUserIp()); 
    redirectTo("errorPage.php");
}
?>

<br> <br>
<a href="../webSite_4.0">Main Page</a>