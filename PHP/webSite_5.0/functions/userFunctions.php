<?php

function unbanUser($ip)
{
    if(existsActiveUserSession() && existBannedIps()) {
        $_SESSION['bannedIps'] = array_diff($_SESSION['bannedIps'], [$ip]);

        return !isUserIpBanned($ip);
    }

    return false;
}

function redirectBannedUser() 
{
    if(isUserIpBanned(getUserIp())) {
        redirectTo("errorPage.php");
    }
}

function banUserIp($ip) 
{
    if(existsActiveUserSession()) { // Check there is an active session
        if(!existBannedIps()) { // Check if the 'bannedIps' table exists, else create it
            $_SESSION['bannedIps'] = [];
        }
        
        array_push($_SESSION['bannedIps'], $ip);
        $_SESSION['Error_Message'] = "Access denied, you are banned!";
    }
}

function existsActiveUserSession() 
{
    return session_status() === 2;
}

function existBannedIps()
{
    return isset($_SESSION['bannedIps']);
}

function getUserIp()
{
    return $_SERVER['SERVER_ADDR'];
}

function isUserIpBanned($ip) 
{    
    if(existsActiveUserSession() && existBannedIps()) {
        return in_array($ip, $_SESSION['bannedIps']);
    }

    return false;
}

function existsLoggedUser()
{
    return isset($_SESSION['loggedUserName']) && isset($_SESSION['loggedUserRole']);
}

function isUserAdmin() 
{    
    if (existsLoggedUser()) {
        return $_SESSION['loggedUserRole'] === 'admin';
    }
    
    return false;
}

function showLoggedUser() 
{    
    if(existsLoggedUser()) {
        echo "Logged in user" . "<br>"
            . "UserName: " . $_SESSION['loggedUserName']
            . " Role: " . $_SESSION['loggedUserRole']  . "<br>" . "<br>";
    } else {
        echo "No logged in user!"  . "<br>" . "<br>";
    }
}

function logUserIn($userName, $userRole)
{
    $_SESSION['loggedUserName'] = $userName;
    $_SESSION['loggedUserRole'] = $userRole;
}

function logUserOut()
{
    if (existsLoggedUser()) {
        unset($_SESSION['loggedUserName']);
        unset($_SESSION['loggedUserRole']);

        echo "Successfully logget user out";
    } else {
        echo "No user to log out!"  . "<br>";
    }
}

?>