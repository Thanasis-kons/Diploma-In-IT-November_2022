<?php
// Session status
// Disabled: 0
// None: 1
// Active: 2

function logoutUser()
{
    if(existsActiveUserSession()) {
        session_destroy();
    }
}

function redirectBannedUsers() 
{
    if(isUserIpBanned()) {
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

function isUserIpBanned() 
{
    if(existsActiveUserSession() && existBannedIps()) {
        return in_array(getUserIp(), $_SESSION['bannedIps']);
    }

    return false;
}

function getUserIp()
{
    return $_SERVER['SERVER_ADDR'];
}

?>