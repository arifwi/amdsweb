<?php

include 'checkConnection.php';

$deviceType = $_POST['devicetype'];
$name = $_POST['id'];
$Types_id = $_POST['type_id'];
$Models_id =$_POST['model_id'];
$serial = $_POST['sn'];
$otherSerial =$_POST['pn'];
$users_id = $_POST['user_id'];
$locations_id = $_POST['location_id'];
$entities_id = $_POST['entities_id'];
$appUsername = $_POST['appUsername'];

$logType;




$queryResult =$connect->query("SELECT * FROM glpi.$deviceType where name='$name'");
$getLastId = $connect->query("SELECT max(id)+1 as last_id FROM glpi.$deviceType");

$last_id;
$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}
while($fetchData=$getLastId->fetch_assoc()){
    $last_id=$fetchData["last_id"];
}

if($deviceType == "glpi_computers"){
    $logType = "Computer";
    if(count($result)!=0){
        echo 'DUPLICATE ID DETECTED';
    }
    else{
      if($connect->query("INSERT INTO glpi.$deviceType(name,entities_id,serial,locations_id,computermodels_id,computertypes_id, users_id, states_id, date_mod) VALUES('$name','$entities_id','SN: $serial - PN: $otherSerial','$locations_id','$Models_id','$Types_id','$users_id','1', now())")=== TRUE){
          if($connect->query("INSERT INTO glpi.glpi_logs(itemtype,items_id,itemtype_link,linked_action,user_name,date_mod,id_search_option,old_value,new_value) VALUES
          ('$logType','$last_id','0','20','$appUsername',now(),'0','','')")==TRUE){
            echo 'Data has been saved successfully.';
    
          }
      }
      
    }
}
else if ($deviceType == "glpi_printers"){
    $logType = "Printer";
    if(count($result)!=0){
        echo 'DUPLICATE ID DETECTED';
    }
    else{
      if($connect->query("INSERT INTO glpi.$deviceType(name,entities_id,serial,locations_id,printermodels_id,printertypes_id, users_id, states_id, date_mod) VALUES('$name','$entities_id','SN: $serial - PN: $otherSerial','$locations_id','$Models_id','$Types_id','$users_id','1', now())")=== TRUE){
          if($connect->query("INSERT INTO glpi.glpi_logs(itemtype,items_id,itemtype_link,linked_action,user_name,date_mod,id_search_option,old_value,new_value) VALUES
          ('$logType','$last_id','0','20','$appUsername',now(),'0','','')")==TRUE){
            echo 'Data has been saved successfully.';
    
          }
      }
      
    }
}


?>