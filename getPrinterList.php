<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT upper(glpi.glpi_printers.id) as 'id', upper(glpi.glpi_printers.name) as 'name',upper(glpi.glpi_printers.printermodels_id) as 'model_id',upper(glpi.glpi_printermodels.name) as 'model_name', 
upper(glpi.glpi_printers.printertypes_id) as 'type_id',
upper(glpi.glpi_printertypes.name) as 'type_name',
upper(glpi.glpi_printers.users_id) 'userid',
upper(glpi.glpi_printers.serial) as 'sn',
upper(glpi.glpi_printers.otherserial) as 'pn',
upper(glpi.glpi_users.name) as 'username', 
upper(glpi.glpi_users.firstname) as 'firstname', 
upper(glpi.glpi_users.realname) as 'lastname',
upper(glpi.glpi_printers.entities_id) as 'entities_id',
upper(glpi.glpi_entities.name) as 'entities_name',
upper(glpi.glpi_printers.locations_id) as 'locations_id',
upper(glpi.glpi_locations.name) as 'locations_name'
FROM glpi.glpi_printers
LEFT JOIN glpi.glpi_printermodels ON
glpi.glpi_printers.printermodels_id = glpi.glpi_printermodels.id
LEFT JOIN glpi.glpi_printertypes ON
glpi.glpi_printers.printertypes_id = glpi.glpi_printertypes.id
LEFT JOIN glpi.glpi_users ON
glpi.glpi_printers.users_id = glpi.glpi_users.id
LEFT JOIN glpi.glpi_entities ON
glpi.glpi_printers.entities_id = glpi.glpi_entities.id
LEFT JOIN glpi.glpi_locations on
glpi.glpi_printers.locations_id = glpi.glpi_locations.id
ORDER BY name
");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>