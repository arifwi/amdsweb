<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT upper(glpi.glpi_computers.id) as 'id', upper(glpi.glpi_computers.name) as 'name',upper(glpi.glpi_computers.computermodels_id) as 'model_id',upper(glpi.glpi_computermodels.name) as 'model_name', 
upper(glpi.glpi_computers.computertypes_id) as 'type_id',
upper(glpi.glpi_computertypes.name) as 'type_name',
upper(glpi.glpi_computers.users_id) 'userid',
upper(glpi.glpi_computers.serial) as 'sn',
upper(glpi.glpi_computers.otherserial) as 'pn',
upper(glpi.glpi_users.name) as 'username', 
upper(glpi.glpi_users.firstname) as 'firstname', 
upper(glpi.glpi_users.realname) as 'lastname',
upper(glpi.glpi_computers.entities_id) as 'entities_id',
upper(glpi.glpi_entities.name) as 'entities_name',
upper(glpi.glpi_computers.locations_id) as 'locations_id',
upper(glpi.glpi_locations.name) as 'locations_name'
FROM glpi.glpi_computers
LEFT JOIN glpi.glpi_computermodels ON
glpi.glpi_computers.computermodels_id = glpi.glpi_computermodels.id
LEFT JOIN glpi.glpi_computertypes ON
glpi.glpi_computers.computertypes_id = glpi.glpi_computertypes.id
LEFT JOIN glpi.glpi_users ON
glpi.glpi_computers.users_id = glpi.glpi_users.id
LEFT JOIN glpi.glpi_entities ON
glpi.glpi_computers.entities_id = glpi.glpi_entities.id
LEFT JOIN glpi.glpi_locations on
glpi.glpi_computers.locations_id = glpi.glpi_locations.id
ORDER BY name
");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>