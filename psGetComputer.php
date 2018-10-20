<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT * FROM glpi_computers");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>