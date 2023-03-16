<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();
?>

<form action="servers/createCustomerServer.php" method="POST"> 

    <label>Customer Name
        <input type="text" id="name" name="name" placeholder="Customer Name" required>
    </label>
    <br/>

    <label>Customer Email
        <input type="text" id="email" name="email" placeholder="Customer Email">
    </label>
    <br/>

    <label>Customer Phone
        <input type="text" id="phone" name="phone" placeholder="Customer Phone">
    </label>
    <br/>

    <label>Customer Address
        <input type="text" id="address" name="address" placeholder="Customer Address">
    </label>
    <br/>

    <label>Customer Afm
        <input type="text" id="afm" name="afm" placeholder="Customer AFM" required>
    </label>
    <br/>

    <button type="submit">Create</button>
</form>