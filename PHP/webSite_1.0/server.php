<?php 
// session_start();
// header("Location: index1.php");

// GET Method

// echo $_GET['username']  . "<br>";
// echo $_GET['password']  . "<br>";

// // echo $_GET['email'];

// if(isset($_GET['email'])) {
//     echo $_GET['email'];
// }



// POST Method

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(isset($userName)) {
        echo $userName;
    }
}



// REQUEST Method

// $userName = $_REQUEST['username'];
// $password = $_REQUEST['password'];

// if(isset($userName)) {
//     echo $userName;
// }



//SESSION

// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $_SESSION['username'] = $_POST['username'];
//     $_SESSION['password'] = $_POST['password'];

//     var_dump($_SESSION);

//     echo "<br>";

//     // unset($_SESSION['password']);
//     // var_dump($_SESSION);

//     // unset($_SESSION);
//     // var_dump($_SESSION);

//     //Check if username/ password have been provided, else show message
// }

?>