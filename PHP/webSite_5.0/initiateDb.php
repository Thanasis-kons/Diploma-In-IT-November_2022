<a href="../webSite_5.0">Main Page</a>
<br> <br>

<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession(); 
redirectBannedUser();

$sql = "CREATE TABLE customers (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    address VARCHAR(50),
    afm VARCHAR(100),
    UNIQUE (afm),
    PRIMARY KEY(id)
)";

executeQuery($sql);

$sql = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(254) NOT NULL,
    email VARCHAR(254),
    phone VARCHAR(20),
    role VARCHAR(100) NOT NULL DEFAULT 'user',
    password VARCHAR(100) NOT NULL,
    UNIQUE (user_name),
    PRIMARY KEY(id)
)";

executeQuery($sql);

?>