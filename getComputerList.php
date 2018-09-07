<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT glpi_computers.id, glpi_computers.name,glpi_computers.computermodels_id as 'model_id',glpi_computermodels.name as 'model_name', glpi_computers.computertypes_id as 'type_id', glpi_computertypes.name as 'type_name'
FROM glpi_computers
LEFT JOIN glpi_computermodels ON
glpi_computers.computermodels_id = glpi_computermodels.id
LEFT JOIN glpi_computertypes ON
glpi_computers.computertypes_id = glpi_computertypes.id");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>