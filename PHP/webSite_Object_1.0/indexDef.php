<?php 


//                  Loops

// echo "Show 3 numbers" . "<br>";

// // for loop

// for($i = 0; $i < 0; $i++) {
//     if($i == 0) {
//         echo "For loop" . "<br>";
//     }

//     echo "i: $i" . "<br>";

//     //echo "Age $i: $age" . "<br>";
// }


// while loop

// $i = 0;

// while($i < 0) {
//     if($i == 0) {
//         echo "While loop" . "<br>";
//     }

//     echo "i: $i" . "<br>";

//     $i ++;
// }

//In every different loop type I want a message before it starts echoing the results


//do-while loop

// $i = 0;

// do{
//     if($i == 0) {
//         echo "Do - While loop" . "<br>";
//     }

//     echo "i: $i" . "<br>";

//     //echo "Age $i: $age" . "<br>";

//     $i ++;
// } while($i < 3);

//Only echo numbers < 0


//foreach loop

// $myArray1 = [];
// $myArray1[] = 'Stathis';
// $myArray1[] = 30;
// $myArray1[] = 'married';
// $myArray1[] = 'married';

//  $myArray1      = ['Stathis', 30, 'married', 'married'];
//  $myArray2      = ['4', 10, 15, 25];

// $myArray1 

// echo $myArray1[0] . "<br>";
// echo $myArray1[1] . "<br>";
// echo $myArray1[2] . "<br>";

// foreach($myArray1 as $row) {
//     echo $row  . "<br>";
// }

// $myArray2

// $sum = 0;

// foreach($myArray2 as $row) {
//     $sum += $row;
// }

// echo $sum  . "<br>";



// foreach($myArray2 as $key => $row) {
//     echo "Position: $key"  . "<br>";
//     echo "Value: $row"  . "<br>";
//     echo $myArray2[$key]  . "<br>";
// }    

// foreach($myArray2 as $key => $row) {
//     $sum = $key == 0 
//         ? $row 
//         : $myArray2[$key - 1] + $row;

//     echo "Sum: $sum"  . "<br>";
// }


// $myAssocArray1 
// $myAssocArray1 = ['name' => 'Stathis', 'age' => 30, 'status' => 'married'];

// foreach($myAssocArray1 as $key => $row) {
//     echo $key . ": ";
//     echo $row  . "<br>";
// }


// $myAssocArray2
//  $myAssocArray2 = ['name' => 'Stathis', 'age' => 30, 'status' => 'married', 
//  'kidsNames' => ['Niki', 'Kostas', 'Dimitris'], 
//  'akinita' => ['Thessaloniki', 'Patra', 'Oraiokastro']];

// foreach($myAssocArray2 as $key => $row) {
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

//Remove 'kidsNames' from check, dynamic solution


//                  Functions

// function echoRandomAgeBelow30()
// {
//     echo "age: " . rand(0,29);
// }


// echoRandomAgeBelow30();

// They do not execute without being called

// $age = rand();
// echo "age: $age";
// echoRandomAge();

// function echoRandomAge()
// {
//     $age = 10;
//     echo " Function age: $age";
// }

// echo "age: $age";

// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge($age)
// {
//     echo "age: $age";
// }

// $age = rand(0,30);
// echoRandomAge($age);

// function echoRandomAge($aNumber)
// {
//     echo "age: $aNumber";
// }


//Globals

//way 1
// $age = rand(0,30);
// echoRandomAge();

// function echoRandomAge()
// {
//     echo "age: " . $GLOBALS['age']  . "<br>";
//     var_dump($GLOBALS);
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

// $age = getRandomAgeBelow30();
// echo $age . "<br>";

// echo getRandomAgeBelow30() . "<br>";

// echo getRandomAgeProvideLimits(18, 25);

// echo getRandomAgeOptionalLimits(0, 20);

function getGreeting() {

} //Homework

//Function that gets the time from the user and echoes the appropriate greeting

?>