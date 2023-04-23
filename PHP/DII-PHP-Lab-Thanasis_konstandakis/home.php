<?php


include 'config.php';

session_start();

$user_id = $_SESSION ['user_id'];


if(!isset($user_id)){

   header('location:login.php');

};



if(isset($_GET['logout'])){

   unset($user_id);

   session_destroy();

   header('location:login.php');

}


/*if(isset($userid)){
$userid =$_POST [$user_id ['user_id']];
foreach($user_id as $key=> $value)/*{
  
    $sql  ="  CREATE TRIGGER `todosuserId` AFTER INSERT todos`title` INSERT FROM user_form'user_id' TO todos`user_id` VALUES(user_id) WHERE user_id= $userid[$key] ";
    $result=mysqli_query($conn, $sql);
  }
}*/



// notes fanction
$insert = false;
$update = false;
$delete = false;

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `notes_id` = $sno";
  $result = mysqli_query($conn, $sql);
}

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 if (isset( $_POST['snoEdit'])){
 
   // Update the record
     $sno = $_POST["snoEdit"];
     $notesTitle = $_POST["titleEdit"];
     $description = $_POST["descriptionEdit"];
 
   // Sql query
   $sql = "UPDATE `notes` SET `notes_title` = '$notesTitle' , `description` = '$description' WHERE `notes`.`notes_id` = $sno";
   $result = mysqli_query($conn, $sql);
   if($result){
     $update = true;
 }
 else{
     echo "We could not update the record successfully";
 }
 }
 else{
   // insert data in database
 
     $notesTitle = $_POST["title"];
     $description = $_POST["description"];
 
   // Sql query
   $sql = "INSERT INTO `notes` (`notes_title`, `description`) VALUES ('$notesTitle', '$description')";
   $result = mysqli_query($conn, $sql);
 
    
   if($result){ 
       $insert = true;
   }
   else{
       echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
   } 
 }
 }
 

?>


<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>home</title>



    <!-- custom css file link  -->

    <link rel="stylesheet" href="css/style.css">



</head>

<body>

   

<div class="container">

   <div class="profile">

      <?php

         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE user_id = '$user_id'") or die('query failed');

         if(mysqli_num_rows($select) > 0){

            $fetch = mysqli_fetch_assoc($select);

         }

         if($fetch['image'] == ''){

            echo '<img src="images/default-avatar.png">';

         }else{

            echo '<img src="uploaded_img/'.$fetch['image'].'">';

         }

      ?>

      <h3><?php echo $fetch['name']; ?></h3>

      <a href="update_profile.php" class="btn">ενυμέρωση προφίλ</a>

      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">έξοδος</a>

      <p><a href="register.php">εγγραφή νεου χρήστη</a></p>

      <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">





<h1 class="text-center py-4 my-4">Η Λιστα μου</h1>

<div class="w-50 m-auto">
<form action="data.php" method="post" autocomplete="off">
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Type Here To Add On ToDo'S" Required>

    </div><br>
    <button class="btn btn-success">προσθέστε στη λιστα</button>

</form>

</div><br>
<hr class="bg-dark w-50 m-auto">
<div class="lists w-50 m-auto my-4">
    <h1>Σημειώσεις λίστας</h1>
    <div id="lists">
    <table class="table table-dark table-hover">
<thead>
<tr style="margin-left: 30%;">
  <th scope="col" name="id">Αρ.</th>
  <th scope="col">Η λίστα μου</th>
<th>Ενέργεια</th>
<th>Ημερομηνία</th>
<th>Κατασταση</th>
 <th>Eνημ.κατάστασης</th>
 <th>Σημασία</th>
 <th>Ενημ.σημασιας</th> 
</tr>
</thead>
<tbody >
<?php
    include 'config.php';
    $sql="SELECT * FROM todos";
    $result=mysqli_query($conn, $sql);
 //Get Update id and status
    if (isset($_GET['status'])) {  
      $id=$_GET['todos_id'];
      $status=$_GET['status'];  
      mysqli_query($conn, "Update todos set status='$status' where todos_id='$id'");  
      header("location:home.php");  
      die();  
    } 
     //Get Update id and importance
     if (isset($_GET['importance'])) {  
      $id=$_GET['todos_id'];
      $importance=$_GET['importance'];  
      mysqli_query($conn, "Update todos set importance='$importance' where todos_id='$id'");  
      header("location:home.php");  
      die();  
    }
    
    
    if($result) {
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['todos_id'];
            $title=$row['Title'];
            $value=$row['status'];
            $importance=$row['importance'];
            ?>

            
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $title  ?></td>
                <td>
                <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">Επεξεργασία</a>
                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">Διαγράφη</a>
                <td><?php echo $row['todos_date'] ?></td>
                <td ><?php  
                           if ($row['status']==1) {  
                                echo "εκρεμμεί";  
                           }if ($row['status']==2) {  
                                echo "ολοκληρώθηκε";  
                           }if ($row['status']==3) {  
                                echo "ακυρώθηκε";  
                           }  
                           ?> </td>
                <td> <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['todos_id'] ?>')">  
                                <option value="">ενημ.καταστασης</option>  
                                <option value="1">εκρεμμεί</option>  
                                <option value="2">ολοκληρώθηκε</option>  
                                <option value="3">ακυρώθηκε</option>  
                           </select>  </td>
                </td>
                <td ><?php  
                           if ($row['importance']==1) {  
                                echo "κανονικό";  
                           }if ($row['importance']==2) {  
                                echo "σημαντίκο";  
                           }  
                           ?> </td>
                           <td> <select onchange="status_update2(this.options[this.selectedIndex].value,'<?php echo $row['todos_id'] ?>')">  
                                <option value="">ενημ.σημασίας</option>  
                                <option value="1">Κανονικο</option>  
                                <option value="2">σημαντίκο</option>  
                                
                           </select>  </td>
                           
                </td>
                 
            </tr>
            <script type="text/javascript">  
      function status_update(status,todos_id){  
          // alert(status);  
             let url='/DII-PHP-Lab-Thanasis_konstandakis/home.php'
           window.location.href=url+"?todos_id="+todos_id+"&status="+status;
      
      }  
    
      function status_update2(importance,todos_id){  
          // alert(status);  
             let url='/DII-PHP-Lab-Thanasis_konstandakis/home.php'
           window.location.href=url+"?todos_id="+todos_id+"&importance="+importance;
      }
 </script> 


            <?php

     
        }
    }
?>


</tbody>
</table>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="C:\askisis_html_css_datalabs_thanasis_konstantakis\Diploma-In-IT-November_2022\PHP\DII-PHP-Lab-Thanasis_konstandakis\css" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->

   </div>
  
            </div>
        
    </div>

</div>


</div>


    </div>
</div>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href=C:\askisis_html_css_datalabs_thanasis_konstantakis\Diploma-In-IT-November_2022\PHP\DII-PHP-Lab-Thanasis_konstandakis\css
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  

</head>

<body>
 
 <!-- Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Ενυμερώστε την Σημειωσή</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form  method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">τίτλος</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">σημείωση</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">κλείσιμο</button>
            <button type="submit" class="btn btn-primary">αποθηκεύση</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
 

          
      

  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong></strong> Η σημείωσή σας έχει εισαχθεί με επιτυχία
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong></strong> Η σημείωσή σας διαγράφηκε με επιτυχία
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong></strong> Η σημείωσή σας ενημερώθηκε με επιτυχία
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-4">
    <h2 id="notes_label"> Εισάγετε σημείωση </h2>
    <form  method="POST">
      <div class="form-group">
        <label for="title">Τιτλος</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="textHelp">
      </div>

      <div class="form-group">
        <label for="desc">Σημείωση</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">προσθέστε σημείωση</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Α.Σημ</th>
          <th scope="col">Τίτλος</th>
          <th scope="col">Σημείωση</th>
          <th scope="col">Ενέργειες</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `notes`"; 
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['notes_title'] . "</td>
            <td>". $row['description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['notes_id'].">Ενυμέρωση</button> <button class='delete btn btn-sm btn-primary' id=d".$row['notes_id'].">Διαγραφή</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    // update function in js 
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        notesTitle = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        // console.log(title, description);
        titleEdit.value = notesTitle;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
      // delete function in js 
      deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.id.substr(1);

        if (confirm("Ειστέ σιγουροι για την διαγραφή της σημειωσης!")) {
          window.location = `/DII-PHP-Lab-Thanasis_konstandakis/home.php?delete=${sno}`;
          
        }
        
      })
    })
  </script>


</body>



</html>