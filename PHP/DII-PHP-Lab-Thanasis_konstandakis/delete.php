<?php
    include 'config.php';
    $id=$_GET['id'];

    $sql="DELETE FROM todos WHERE todos_Id=$id";
    $result=mysqli_query($conn, $sql);

    if($result){
        header("location: ./home.php");
    }

?>