<?php

include 'checkConnection.php';


$name = $_POST['id'];
$computerTypes_id = $_POST['type_id'];
$computerModels_id =$_POST['model_id'];
$serial = $_POST['sn'];
$otherSerial =$_POST['pn'];
$users_id = $_POST['user_id'];
$locations_id = $_POST['location_id'];
$entities_id = $_POST['entities_id'];
$user_name = $_POST['user_name'];



$queryResult =$connect->query("SELECT * FROM glpi_computers where name='$name'");
$getLastId = $connect->query("SELECT max(id)+1 as last_id FROM glpi_computers");

$last_id;
$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}
while($fetchData=$getLastId->fetch_assoc()){
    $last_id=$fetchData["last_id"];
}

if(count($result)!=0){
    echo 'DUPLICATE ID DETECTED';
}
else{
  if($connect->query("INSERT INTO glpi_computers(name,entities_id,serial,locations_id,computermodels_id,computertypes_id, users_id, states_id, date_mod) VALUES('$name','$entities_id','SN: $serial - PN: $otherSerial','$locations_id','$computerModels_id','$computerTypes_id','$users_id','1', now())")=== TRUE){
      if($connect->query("INSERT INTO glpi_logs(itemtype,items_id,itemtype_link,linked_action,user_name,date_mod,id_search_option,old_value,new_value) VALUES
      ('Computer','$last_id','0','20','$user_name',now(),'0','','')")==TRUE){
        echo 'INPUT SUCCESSFULL';

      }
  }
  
}

?>