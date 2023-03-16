<a href="../../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('../functions/userFunctions.php'); 
require('../functions/genericFunctions.php'); 
require('../functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();

if(isRequestMethodPost()) {
    $customerData = [
        'name'    => $_POST['name'],
        'email'   => $_POST['email'],
        'phone'   => $_POST['phone'],
        'address' => $_POST['address'],
        'afm'     => $_POST['afm']
    ];

    $afm = $customerData['afm'];

    $sql = "SELECT id
            FROM customers
            WHERE afm = '{$afm}'";

    $data = selectFromDbSimple($sql);

    if(empty($data)) {
        exit("No customer found with afm: $afm");
    }

    $assignment = "";

    foreach($customerData as $field => $value) {
        if(!empty($value)) {
            $assignment .= "$field = '$value', ";
        }
    }

    $assignment = rtrim($assignment, ', ');
    // var_dump($assignment);exit();

    $sql = "UPDATE customers
            SET {$assignment}
            WHERE afm = '{$afm}'";
        // var_dump($sql);exit();

    executeQuery($sql);
} else {
    banUserIp(getUserIp()); 
    redirectTo("../errorPage.php");
}
?>