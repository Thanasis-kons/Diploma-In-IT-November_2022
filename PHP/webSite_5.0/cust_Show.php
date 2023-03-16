<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();
?>

<form action="servers/showCustomerServer.php" method="POST"> 


    <label>Customer Name
        <input type="text" id="name" name="name" placeholder="Customer Name">
    </label>

    <br/>

    <label>Afm
        <input type="text" id="afm" name="afm" placeholder="AFM">
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>