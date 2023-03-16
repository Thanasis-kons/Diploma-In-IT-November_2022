<a href="../../webSite_5.0">Main Page</a>
<br> <br>

<?php 
require('../functions/userFunctions.php'); 
require('../functions/genericFunctions.php'); 
require('../functions/databaseFunctions.php'); 

startSession();
redirectBannedUser();

if(isRequestMethodPost()) {
    $afm = $_POST['afm'];

        $sql = "SELECT *
                FROM customers
                WHERE afm = '{$afm}'";

        $data = selectFromDbSimple($sql);

        if(!empty($data)) {
            $sql = "DELETE 
                FROM customers
                WHERE afm = '{$afm}'";

            executeQuery($sql);
            echo "Customer is deleted successfully!";
            }
        else {
                echo "Customer's AFM not found!";
            }
        }       
 else {
    banUserIp(getUserIp()); 
    redirectTo("../errorPage.php");
}
?>