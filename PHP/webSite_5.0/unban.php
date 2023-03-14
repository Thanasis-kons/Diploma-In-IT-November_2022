<a href="../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 

startSession(); 
?>

<form action="unbanServer.php" method="POST"> 

    <label>Ip
        <input type="text" id="ip" name="ip" placeholder="Ip to whitelist">
    </label>

    <br/>

    <button type="submit">Submit</button>
</form>