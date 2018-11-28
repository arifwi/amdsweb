<?php

include 'checkConnection.php';


$name = $_POST['name'];
$serial = $_POST['sn'];
$otherserial = $_POST['dap_no'];


$connect->query("UPDATE glpi.glpi_computers SET serial = '$serial', otherserial = '$otherserial' where glpi_computers.name = '$name'");
      

?>