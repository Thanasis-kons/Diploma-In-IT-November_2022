<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require("CONSTANTS.php");

startSession(); 
redirectBannedUser();

?>

<form action="loginServer.php" method="POST"> 


    <label>Username
        <input type="text" id="username" name="username" placeholder="UserName">
    </label>

    <br/>

    <label>Password
        <input type="password" id="password" name="password" placeholder="Password">
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>