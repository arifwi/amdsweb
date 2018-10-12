<?php

include 'checkConnection.php';

$queryResult =$connect->query("SELECT max(id)+1 as last_id from glpi_computers");

$result=array();
$a;

while($fetchData=$queryResult->fetch_assoc()){
    $a = $fetchData["last_id"];
}

echo $a;
?>