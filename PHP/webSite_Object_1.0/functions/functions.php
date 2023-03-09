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



function selectFromDb($sql) {
    checkQuery($sql);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);

    $data   = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
        
    printResults($data);

    $conn->close();
}


function selectFromDbSimple($table, $fieldsArray = ["*"]) {
    checkQuery($table);

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
        
    printResultsSimple($data);

    $conn->close();
}



function printResults($data) {
    if (empty($data)) {
        echo "No results";
    } else {
        foreach ($data as $user) {
            $id        = $user["id"];
            $firstName = $user["first_name"];
            $lastName  = $user["last_name"];
        
            echo "id: $id - Name: $firstName $lastName <br>";
        }
    }
}


function printResultsSimple($data) {
    if (empty($data)) {
        echo "No results";
    } else {
        foreach ($data as $user) {
            // var_dump($user); exit();
            
            foreach ($user as $field => $value) {
                echo "$field: $value ";
            }

            echo "<br>";
        }
    }
}

?>
