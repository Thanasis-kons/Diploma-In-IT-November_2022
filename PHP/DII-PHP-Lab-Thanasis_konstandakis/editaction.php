<?php
       $id=$_POST['id'];
       $title=$_POST['title'];
       
    include 'config.php';
    $sql="UPDATE todos SET title='$title' WHERE todos_id=$id";
    $result=mysqli_query($conn, $sql);

    if($result){
        header("location: ./home.php");

    }

?>