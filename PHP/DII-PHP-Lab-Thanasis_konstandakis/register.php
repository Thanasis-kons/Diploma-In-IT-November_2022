


<?php



include 'config.php';



if(isset($_POST['submit'])){



   $name = mysqli_real_escape_string($conn, $_POST['name']);

   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $image = $_FILES['image']['name'];

   $image_size = $_FILES['image']['size'];

   $image_tmp_name = $_FILES['image']['tmp_name'];

   $image_folder = 'uploaded_img/'.$image;



   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');



   if(mysqli_num_rows($select) > 0){

      $message[] = 'ο χρήστης ήδη υπάρχει'; 

   }else{

      if($pass != $cpass){

         $message[] = 'λαθος επιβεβαίωση κωδικού!';

      }elseif($image_size > 2000000){

         $message[] = 'η εικόνα είναι πολλή μεγάλη!';

      }else{

         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');



         if($insert){

            move_uploaded_file($image_tmp_name, $image_folder);

            $message[] = 'registered successfully!';

            header('location:login.php');

         }else{

            $message[] = 'η εγγραφή απέτυχε!';

         }

      }

   }



}



?>



<!DOCTYPE html>

<html>

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Εγγραφη</title>



   <!-- custom css file link  -->

   <link rel="stylesheet" href="css/style.css">



</head>

<body>

   

<div class="form-container">



   <form action="" method="post" enctype="multipart/form-data">

      <h3>Εγγραφείτε τώρα</h3>

      <?php

      if(isset($message)){

         foreach($message as $message){

            echo '<div class="message">'.$message.'</div>';

         }

      }

      ?>

      <input type="text" name="name" placeholder="όνομα χρηστη" class="box" required>

      <input type="email" name="email" placeholder="email" class="box" required>

      <input type="password" name="password" placeholder="κωδικός" class="box" required>

      <input type="password" name="cpassword" placeholder="επιβεβαίωση κωδικού" class="box" required>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">

      <input type="submit" name="submit" value="εγγραφή" class="btn">

      <p>εχετε ηδη λογαριασμο; <a href="login.php">συνδεθείτε τώρα</a></p>

   </form>



</div>



</body>

</html>

