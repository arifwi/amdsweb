<?php

include 'checkConnection.php';
$name = $_POST['id'];
$computerTypes_id = $_POST['type_id'];
$computerModels_id =$_POST['model_id'];
$serial = $_POST['sn'];
$otherSerial =$_POST['pn'];
$users_id = $_POST['user_id'];
$locations_id = $_POST['location_id'];


$queryResult =$connect->query("SELECT * FROM glpi_computers where name='$name'");


$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

if(count($result)!=0){
    echo 'DUPLICATE ID DETECTED';
}
else{
  $queryResult =$connect->query("INSERT INTO glpi_computers(name,serial,otherserial,locations_id,computermodels_id,computertypes_id, users_id) VALUES('$name','$serial','$otherSerial','$locations_id','$computerModels_id','$computerTypes_id','$users_id')");
echo 'INPUT SUCCESSFULL';
}



?>