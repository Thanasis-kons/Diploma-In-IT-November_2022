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

function checkTable($table) {
    if(empty($table)) {
        exit('Empty table provided!');
    }
}


function selectFromDbSimple($table, $fieldsArray = ["*"], $action = "return") {
    checkTable($table);

    $conn   = defaultConnectToDatabase();
    $fields = implode(',', $fieldsArray);

    $sql = "SELECT {$fields}
            FROM {$table}";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    switch($action) {
        case "print":
            printResultsSimple($data, $sql);
            break;
        case "return":
            break;
        default:
            echo "Wrong Database result action provided";
    }

    $conn->close();

    return $data;
}

function printResultsSimple($data, $sql) {
    if (empty($data)) {
        echo "No results <br>" 
        . "Query: $sql <br>";
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
