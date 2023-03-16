<?php
// Session status
// Disabled: 0
// None: 1
// Active: 2

function logoutUser($ip)
{
    if(existsActiveUserSession() && existBannedIps()) {
        // return session_destroy();
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

        if(!in_array($ip, $_SESSION['bannedIps'])) {
            array_push($_SESSION['bannedIps'], $ip);
            $_SESSION['Error_Message'] = "Access denied, you are banned!";
        }
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

function isUserIpBanned($ip) 
{    
    if(existsActiveUserSession() && existBannedIps()) {
        return in_array($ip, $_SESSION['bannedIps']);
    }

    return false;
}

function getUserIp()
{
    return $_SERVER['SERVER_ADDR'];
}

?>