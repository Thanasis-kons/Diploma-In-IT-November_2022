<?php
require('insert.php');
startSession();
?>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <title>my to do list</title>
   
   

    <form action="insert.php" method="post">
        <div class="container">
            <div class="row justify-content-center m-auto shadow bg-white mt-3 py-3 col-md-6">  
            <h3 id="header">Η λίστα μου </h3>
            <div class="col-8"> 
                <input type="text" name="list" class=form-control >
                </div>
                <div class="col-2"> 
                <button > προσθεστε </button>
            </div>
         </div>
     </div>
     <a href="index.php">Αποσυνδεση</a>
    </form>        

      
        
        
       


   