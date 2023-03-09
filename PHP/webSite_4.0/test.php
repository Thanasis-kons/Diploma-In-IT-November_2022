<?php 

$array1 = [3, 4, 5];

$array1 = array_diff($array1, [4]);

// var_dump($array1);exit();

foreach($array1 as $element) {
    echo $element . "<br>";
}
?>