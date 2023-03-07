<?php
require("functions/functions.php");

$sql = "SELECT id, first_name, last_name
        FROM students";

// $sql = "";

selectFromDb($sql);

// selectFromDbSimple('students', ['id', 'first_name', 'last_name']);

?>