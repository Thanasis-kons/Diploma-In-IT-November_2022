<?php
require('config.php');
function startSession() {
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
}

function isRequestMethodPost() 
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirectTo($destinationFile)
{
    header("Location:$destinationFile");
}
?>