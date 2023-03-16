<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();
?>

<form action="servers/updateCustomerServer.php" method="POST"> 


    <label>Customer Name
        <input type="text" id="name" name="name" placeholder="Insert Customer Name">
    </label>

    <br/>

    <label>Phone
        <input type="text" id="phone" name="phone" placeholder="Insert Phone">
    </label>
    <br/>

    <label>Email
        <input type="email" id="email" name="email" placeholder="Insert Email">
    </label>

    <br/>

    <label>Address
        <input type="text" id="address" name="address" placeholder="Insert Address">
    </label>

    <br/>

    <label>Afm
        <input type="text" id="afm" name="afm" placeholder="Insert AFM" required>
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>