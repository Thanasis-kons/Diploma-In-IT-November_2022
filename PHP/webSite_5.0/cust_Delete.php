<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();
?>

<form action="servers/deleteCustomerServer.php" method="POST"> 


    <label>Afm
        <input type="text" id="afm" name="afm" placeholder="AFM" required>
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>