<?php



include 'config.php';

session_start();



if(isset($_POST['submit'])){



   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));



   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');



   if(mysqli_num_rows($select) > 0){

      $row = mysqli_fetch_assoc($select);

      $_SESSION['user_id'] = $row['user_id'];

      header('location:home.php');

   }else{

      $message[] = 'λάθος email ή κωδικός!';

   }



}



?>



<!DOCTYPE html>

<html>

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>login</title>



   <!-- custom css file link  -->

   <link rel="stylesheet" href="css/style.css">



</head>

<body>

   

<div class="form-container">



   <form action="" method="post" enctype="multipart/form-data">
<h1 >Η Λίστα μου</h1>
      <h3>Συνδεθείτε τώρα</h3>

      <?php

      if(isset($message)){

         foreach($message as $message){

            echo '<div class="message">'.$message.'</div>';

         }

      }

      ?>

      <input type="email" name="email" placeholder="email" class="box" required>

      <input type="password" name="password" placeholder="κωδικός" class="box" required>

      <input type="submit" name="submit" value="συνδεθείτε" class="btn">

      <p>δεν έχετε λογαριασμό <a href="register.php">εγγραφείτε εδώ</a></p>

   </form>



</div>



</body>

</html>