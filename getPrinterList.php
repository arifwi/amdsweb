<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT glpi_printers.id, glpi_printers.name,glpi_printers.printermodels_id as 'model_id',glpi_printermodels.name as 'model_name', 
glpi_printers.printertypes_id as 'type_id',
glpi_printertypes.name as 'type_name',
glpi_printers.users_id 'userid',
glpi_printers.serial as 'sn',
glpi_printers.otherserial as 'pn',
upper(glpi_users.name) as 'username', 
upper(glpi_users.firstname) as 'firstname', 
upper(glpi_users.realname) as 'lastname',
glpi_entities.name as 'entities_name',
glpi_locations.name as 'location_name'
FROM glpi_printers
LEFT JOIN glpi_printermodels ON
glpi_printers.printermodels_id = glpi_printermodels.id
LEFT JOIN glpi_printertypes ON
glpi_printers.printertypes_id = glpi_printertypes.id
LEFT JOIN glpi_users ON
glpi_printers.users_id = glpi_users.id
LEFT JOIN glpi_entities ON
glpi_printers.entities_id = glpi_entities.id
LEFT JOIN glpi_locations on
glpi_printers.locations_id = glpi_locations.id
");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>