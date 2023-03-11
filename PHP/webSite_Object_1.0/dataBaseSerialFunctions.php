<?php
require("functions/functions.php");

// $sql = "SELECT id, first_name, last_name
//         FROM users";

// $sql = "";

// selectFromDb($sql);

selectFromDbSimple('users', ['first_name', 'last_name', 'email']);

?>