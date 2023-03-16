<a href="../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();

if(isRequestMethodPost()) {
    $customerName       = $_POST['name'];
    $afm                = $_POST['afm'];
    $credentialProvided = false;

    if(!empty($customerName)) {
        $whereCondition     = "name = '{$customerName}'";
        $credentialProvided = true;
    } elseif(!empty($afm)) {
        $whereCondition     = "afm  = '{$afm}'";
        $credentialProvided = true;
    }

    if($credentialProvided) {
        $sql = "SELECT *
                FROM customers
                WHERE {$whereCondition}";

        $data = selectFromDbSimple($sql);

        if(!empty($data)) {
            foreach($data as $customer) {
                foreach($customer as $field => $value) {
                    echo "$field: $value"  . "<br>";
                }
            }
        } else {
            echo "Customer not found!"  . "<br>";
        }
    }
} else {
    banUserIp(getUserIp()); 
    redirectTo("errorPage.php");
}
?>