<?php

include 'checkConnection.php';

//$deviceType = $_POST['deviceType'];
//$deviceId = $_POST['deviceId'];
$queryResult =$connect->query("SELECT * FROM glpi.glpi_logs where items_id = '637' ORDER BY date_mod desc");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>