<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require("CONSTANTS.php");

startSession(); 
// logoutUser();
redirectBannedUsers();


?>

<form action="server.php" method="POST"> 


    <label>Username
        <input type="text" id="username" name="username" placeholder="Insert UserName">
    </label>

    <br/>

    <label>Password
        <input type="password" id="password" name="password" placeholder="Insert Password">
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>