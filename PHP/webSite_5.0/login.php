<a href="../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 

startSession(); 
redirectBannedUser();
showLoggedUser();

?>

<form action="servers/loginServer.php" method="POST"> 


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