<?php

function defaultConnectToDatabase() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "database1";
    
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

function selectFromDbSimple($sql):array {
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

function executeQuery($sql) 
{
    checkQuery($sql);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);

    if(empty($result)) {
        echo "Query execution failure!" . "<br>" . $sql . "<br>";
    } else {
        echo "Query execution success!" . "<br>" . $sql . "<br>";
    }

    $conn->close();
}

?>
