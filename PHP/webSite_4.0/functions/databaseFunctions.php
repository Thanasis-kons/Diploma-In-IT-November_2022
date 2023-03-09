<?php

function defaultConnectToDatabase() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "database2";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function checkQuery($sql) {
    if(empty($sql)) {
        exit('Empty query provided!');
    }
}

function checkTable($table) {
    if(empty($table)) {
        exit('Empty table provided!');
    }
}


function selectFromDbSimple($sql) {
    checkQuery($sql);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);
    $data   = [];

    // echo $sql . "<br>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function printResultsSimple($data) {
    if (empty($data)) {
    } else {
        foreach ($data as $user) {            
            foreach ($user as $field => $value) {
                echo "$field: $value ";
            }

            echo "<br>";
        }
    }
}

?>
