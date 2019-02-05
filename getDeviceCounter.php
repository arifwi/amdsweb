<?php

include 'checkConnection.php';


$queryResult =$connect->query("SELECT
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =1) AS countActiveComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =4) AS countOnServiceComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =3) AS countDamagedComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =2) AS countSpareComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_computers WHERE glpi.glpi_computers.states_id =5) AS countDispossedComputer,
(SELECT COUNT( 1 ) FROM glpi.glpi_computers) AS countAllComputer,

(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =1) AS countActivePrinter,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =2) AS countSparePrinter,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =3) AS countDamagedPrinter,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =4) AS countOnServicePrinter,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers WHERE glpi.glpi_printers.states_id =5) AS countDispossedPrinter,
(SELECT COUNT( 1 ) FROM glpi.glpi_printers) AS countAllPrinter
FROM dual");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>