<?php 
require('ageGenerator.php'); 


//                  Loops

// echo "Show 3 numbers" . "<br>";

//for loop

 for($i = 0; $i< 3; $i++) {
    echo "i: $i" . "<br>";

  //  echo "Age $i: $age" . "<br>";
}


//while loop

// $i = 0;

// while($i < 3) {
//     echo "i: $i" . "<br>";

//     //echo "Age $i: $age" . "<br>";

//     $i ++;
// }

//In every different loop type I want a message before it starts echoing the results


//do-while loop

// $i = 0;

// do{
//     echo "i: $i" . "<br>";

//     //echo "Age $i: $age" . "<br>";

//     $i ++;
// } while($i < 3);

//Only echo numbers > 1


//foreach loop

// $myArray1      = ['Stathis', 30, 'married'];
// $myAssocArray1 = ['name' => 'Stathis', 'age' => 30, 'status' => 'married'];
//  $myAssocArray2 = ['name' => 'Stathis', 'age' => 30, 'status' => 'married', 'kidsNames' => ['Niki', 'Kostas', 'Dimitris']];


// $myArray1 

// foreach($myArray1 as $row) {
//     echo $row  . "<br>";
// }

// foreach($myArray1 as $key => $row) {
//     echo $key  . "<br>";
//     echo $row  . "<br>";
//     // echo $myArray1[$key]  . "<br>";
// }


// // $myAssocArray1 

// foreach($myAssocArray1 as $key => $row) {
//     echo $key . ": ";
//     echo $row  . "<br>";
// }


// $myAssocArray2

// foreach($myAssocArray1 as $key => $row) {
//     echo $key . ": ";
//     echo $row  . "<br>";
// }

// foreach($myAssocArray2 as $key => $row) {
//     echo $key . ": ";
    

//     if($key === 'kidsNames'){
//         foreach($row as $name) {
//             echo $name . "<br>";
//         }
//     } else {
//         echo $row  . "<br>";
//     }
// }



//                  Functions

// function echoRandomAgeBelow30()
// {
//     echo "age: " rand(0,30);
// }


//echoRandomAgeBelow30();

// They do not execute without being called

// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge()
// {
//     echo "age: $age";
// }

// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge($age)
// {
//     echo "age: $age";
// }


//Globals

//way 1
// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge()
// {
//     echo "age: " . $GLOBALS['age'];
// }

//way 2
// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge()
// {
//     global $age;
//     echo "age: $age";
// }


// Call functions from other file

//echo getRandomAgeBelow30();
//echo getRandomAgeProvideLimits(18, 25);
//echo getRandomAgeOptionalLimits();

?>