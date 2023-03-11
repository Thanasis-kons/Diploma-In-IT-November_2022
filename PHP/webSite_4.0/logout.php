<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 

startSession(); 
// redirectBannedUser();
?>

<form action="logoutServer.php" method="POST"> 

    <label>Ip
        <input type="text" id="ip" name="ip" placeholder="Ip to whitelist">
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>