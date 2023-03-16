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

    // var_dump($customerData); exit();

    $afm = $customerData['afm'];

    $sql = "SELECT id
            FROM customers
            WHERE afm = '{$afm}'";

    $data = selectFromDbSimple($sql);

    if(!empty($data)) {
        exit("There is already a customer with afm: $afm");
    }

    $fields = "";
    $values = "";

    foreach($customerData as $field => $value) {
        if(!empty($value)) {
            $fields .= "$field, ";
            $values .= "'$value', ";
        }
    }

    $fields = rtrim($fields, ', ');
    $values = rtrim($values, ', ');

    $sql = "INSERT INTO customers ({$fields}) 
            VALUES ({$values})";

    executeQuery($sql);
} else {
    banUserIp(getUserIp()); 
    redirectTo("../errorPage.php");
}
?>