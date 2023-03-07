<?php 

// Student Array
// $studentArray = ['firstName' => 'Stathis', 'lastName' => 'Matsaridis', 'age' => 30, 'semester' => 1];

// var_dump($studentArray);


// Student object
// $studentObject = new stdClass;
// $studentObject->firstName = 'Stathis';
// $studentObject->lastName = 'Matsaridis';
// $studentObject->age = 30;
// $studentObject->semester = 1;

// var_dump($studentObject);



// Conversions
// $studentObject = (object)$studentArray;
// var_dump($studentObject);


// $studentArray = (array)$studentObject;
// var_dump($studentArray);


// Object Functions

// Use function to set object field value
// function setRandomAdultAge() {
//     return rand(18,100);
// }

// $studentObject            = new stdClass;
// $studentObject->firstName = 'Stathis';
// $studentObject->lastName  = 'Matsaridis';
// $studentObject->age       = setRandomAdultAge();
// $studentObject->semester  = 1;

// foreach($studentObject as $field => $value) {
//     echo "Field: $field - Value:  $value <br>";
// }


// Use function to set object
// function setStudent($firstName, $lastName, $age, $semester) {
// $studentObject            = new stdClass;
// $studentObject->firstName = $firstName;
// $studentObject->lastName  = $lastName;
// $studentObject->age       = $age;
// $studentObject->semester  = $semester;

// return $studentObject;
// }

// $aNewStudentObject = setStudent('Stathis', 'Matsaridis', 30, 1);

// foreach($aNewStudentObject as $field => $value) {
//     echo "Field: $field - Value:  $value <br>";
// }

?>