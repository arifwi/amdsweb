<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =1) AS countComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =1) AS countPrinter FROM dual");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>