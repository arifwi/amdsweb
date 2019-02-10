<?php

include 'checkConnection.php';

$deviceType = $_POST['devicetype'];
$deviceName = $_POST['devicename'];

$tableName;

if($deviceType == "COMPUTERS"){
    $deviceType = "computer";
    $tableName = "glpi_computers";
}
else if($deviceType =="PRINTERS"){
    $deviceType = "printer";

    $tableName = "glpi_printers";
}

$getDeviceId = $connect->query("SELECT id as id FROM glpi.$tableName WHERE name ='".$deviceName."' ");

$items_id;

while($fetchData=$getDeviceId->fetch_assoc()){
    $items_id=$fetchData["id"];
}

$queryResult =$connect->query("SELECT id,  itemtype, items_id, user_name, date_format(date_mod,'%d-%m-%Y %H:%i:%s') as date_mod, old_value, new_value, (SELECT COUNT(1) FROM glpi.glpi_logs  WHERE  itemtype = '$deviceType' and items_id = '$items_id') as historyCounter FROM glpi.glpi_logs where itemtype = '$deviceType' and items_id = '$items_id' ORDER BY date_mod desc");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>