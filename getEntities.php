<?php

include 'checkConnection.php';

$queryResult =$connect->query("SELECT id, name FROM glpi.glpi_entities ORDER BY name ASC");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>