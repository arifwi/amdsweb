<?php

include 'checkConnection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$queryResult =$connect->query("SELECT glpi.login.username, glpi.login.password, glpi.login.users_id,
glpi.glpi_users.name as 'username', 
glpi.glpi_users.firstname as 'firstname', 
glpi.glpi_users.realname as 'lastname'

FROM glpi.login 
LEFT JOIN glpi.glpi_users ON
glpi.login.users_id= glpi.glpi_users.id WHERE glpi.login.username='".$username."' and glpi.login.password='".$password. "'");
 

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>