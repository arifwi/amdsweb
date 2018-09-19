<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT glpi_computers.id, glpi_computers.name,glpi_computers.computermodels_id as 'model_id',glpi_computermodels.name as 'model_name', 
glpi_computers.computertypes_id as 'type_id',
glpi_computertypes.name as 'type_name',
glpi_computers.users_id 'userid',
upper(glpi_users.name) as 'username', 
upper(glpi_users.firstname) as 'firstname', 
upper(glpi_users.realname) as 'lastname'
FROM glpi_computers
LEFT JOIN glpi_computermodels ON
glpi_computers.computermodels_id = glpi_computermodels.id
LEFT JOIN glpi_computertypes ON
glpi_computers.computertypes_id = glpi_computertypes.id
LEFT JOIN glpi_users ON
glpi_computers.users_id = glpi_users.id
");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>