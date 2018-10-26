<?php

include 'checkConnection.php';

$queryResult =$connect->query("SELECT id, UPPER(name) as name FROM glpi.glpi_locations ORDER BY name ASC");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>