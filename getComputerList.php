<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT glpi_computers.id, glpi_computers.name,glpi_computers.computermodels_id as 'model_id',glpi_computermodels.name as 'model_name', 
glpi_computers.computertypes_id as 'type_id',
glpi_computertypes.name as 'type_name',
glpi_computers.users_id 'userid',
glpi_computers.serial as 'sn',
glpi_computers.otherserial as 'pn',
upper(glpi_users.name) as 'username', 
upper(glpi_users.firstname) as 'firstname', 
upper(glpi_users.realname) as 'lastname',
glpi_computers.entities_id,
glpi_entities.name as 'entities_name',
glpi_computers.locations_id as 'locations_id',
glpi_locations.name as 'locations_name'
FROM glpi_computers
LEFT JOIN glpi_computermodels ON
glpi_computers.computermodels_id = glpi_computermodels.id
LEFT JOIN glpi_computertypes ON
glpi_computers.computertypes_id = glpi_computertypes.id
LEFT JOIN glpi_users ON
glpi_computers.users_id = glpi_users.id
LEFT JOIN glpi_entities ON
glpi_computers.entities_id = glpi_entities.id
LEFT JOIN glpi_locations on
glpi_computers.locations_id = glpi_locations.id
ORDER BY name
");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>