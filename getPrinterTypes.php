<?php

include 'checkConnection.php';

$queryResult =$connect->query("SELECT * FROM glpi.glpi_printertypes ORDER BY name ASC");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>