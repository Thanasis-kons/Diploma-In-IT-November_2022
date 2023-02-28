<?php require('ageGenerator.php'); ?>

<!-- HINT! To comment/uncomment out: mark code + ctrl + '/' -->
<!-- C:\xampp\apache\conf\httpd.conf -->


<!-- html code -->
<!-- 
<p>
    test paragraph
</p>

<h1>
    test header
</h1> -->



<!-- declared html -->
<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>

    <body>
        <p>
            Paragraph
        </p>
    </body>
</html> -->



<!-- php -->
<!-- Show message -->
<!-- 
<?php
echo 'First message';

?> -->



<!-- html + php -->
<!-- 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Title"; ?></title>
    </head>

    <body>
        <p>
        <?php echo "Paragraph"; ?>
        </p>
    </body>
</html> -->



<!-- Php Variables -->
<!-- 
<?php
// HINT! To align code: Alt + '='

$textVariable       = 'First message';
$textNumberVariable = '1 message';
$textNumberVariable = '1' . ' message.';
$numberVariable     = 1;
$numberVariable     = 1 . ' message';

echo $textVariable . "<br>";
echo $textNumberVariable . "<br>";
echo $numberVariable;

?> -->



<!-- Php Variables + Html -->
<!-- 
<?php

$title     = 'Title';
$paragraph = 'Paragraph';

?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>

    <body>
        <p>
        <?php echo $paragraph; ?>
        </p>
    </body>
</html>  -->



<!-- Php Functions -->

<?php

$textVariable = 'mixed Message';

//var_dump($textVariable);

// echo strtoupper($textVariable) . "<br>";
// echo strtolower($textVariable) . "<br>";
// echo ucwords($textVariable) . "<br>";
// echo strlen($textVariable) . "<br>";
// echo strstr($textVariable, 'x') . "<br>";
// echo str_replace('e', 'i', $textVariable) . "<br>";

// echo abs(-1*5)  . "<br>";
// echo rand()  . "<br>";
// echo rand(1, 150)  . "<br>";

// ?>



<!-- Php Arrays -->

<!-- <?php

// $myArray = [1, 2, 'Stathis'];
// var_dump($myArray);

//echo $myArray;
//echo $myArray[3];
// echo  "<br>" . $myArray[2];

// Associative Arrays

// $myAssocArray1 = [0=>1, 1=>2, 2=>'Stathis'];
// var_dump($myAssocArray1);
// echo $myArray[0];

// $myAssocArray2 = ['name'=>'Stathis', 'age'=>30, 'status'=>'married'];
// $myAssocArray2 = ['names'=>['Stathis', 'Nikos', 'Maria'], 'age'=>30, 'status'=>'married'];
var_dump($myAssocArray2);

// echo $myAssocArray2[0];
// echo $myAssocArray2['names'];

?> -->



<!-- Php Conditional Statements -->

<!-- <?php

//$age = rand(0,30);

// if($age >= 18) {
//     echo "Age: $age" . "<br>" . "State:Adult";
// } else {
//     echo "Age: $age" . "<br>" . "State: Underaged";
// }

// ternary operator
// echo $age >= 18 
//         ? "Age: $age" . "<br>" . "State:Adult" 
//         : "Age: $age" . "<br>" . "State: Underaged";

// switch - case
// Echo message according to decade (<=10: Blue team, <=20: Red team, <=30: Yellow team)

if($age <= 10) {
    echo "Age: $age" . "<br>" . "Team: Blue";
} elseif($age <= 20) {
    echo "Age: $age" . "<br>" . "Team: Red";
} else {
    echo "Age: $age" . "<br>" . "Team: Yellow";
}

?> -->



<!-- Php Linking files -->

<?php

if($age >= 18) {
    echo "Age: $age" . "<br>" . "State:Adult";
} else {
    echo "Age: $age" . "<br>" . "State: Underaged";
}

?>