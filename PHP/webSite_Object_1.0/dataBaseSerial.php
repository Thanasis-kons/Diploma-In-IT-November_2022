<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "database2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// echo "<pre>";
// var_dump($conn);
// echo "</pre>";
// exit();

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Queries
$sql = "SELECT id, first_name, last_name
        FROM users";

$result = $conn->query($sql);

// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

// echo "<pre>";
// var_dump($result->fetch_assoc());
// echo "</pre>";
// exit();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id        = $row["id"];
    $firstName = $row["first_name"];
    $lastName  = $row["last_name"];

    echo "id: $id - Name: $firstName $lastName <br>";
  }
} else {
  echo "0 results";
}

$conn->close();

?>