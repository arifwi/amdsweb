<?php

include 'checkConnection.php';

$queryResult =$connect->query("SELECT id, UPPER(name) as name, UPPER(realname) as lastname, UPPER(firstname) as firstname FROM glpi.glpi_users WHERE user_dn LIKE  '%indonesia%' ORDER BY name ASC");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>