<?php

include 'checkConnection.php';

$deviceType = $_POST['devicetype'];
$name = $_POST['id'];
$users_id = $_POST['user_id'];
$locations_id = $_POST['location_id'];
$entities_id = $_POST['entities_id'];
$states_id = $_POST['states_id'];
$appUsername = $_POST['appUsername'];
$old_value = $_POST['old_value'];
$new_value = $_POST['new_value'];
$logType;

$getDeviceId = $connect->query("SELECT id as id FROM glpi.$deviceType WHERE name ='".$name."' ");

$last_id;

while($fetchData=$getDeviceId->fetch_assoc()){
    $last_id=$fetchData["id"];
}
if($deviceType == "glpi_computers"){
    $logType = "Computer";
}
else if($deviceType =="glpi_printers"){
    $logType = "Printer";
}

if($connect->query("UPDATE glpi.$deviceType SET users_id = $users_id, entities_id = $entities_id, locations_id = $locations_id, states_id = $states_id WHERE name = '".$name."'")=== TRUE){
    if($connect->query("INSERT INTO glpi.glpi_logs(itemtype,items_id,itemtype_link,linked_action,user_name,date_mod,id_search_option,old_value,new_value) VALUES
      ('$logType','$last_id','0','0','$appUsername',now(),'70','".$old_value."','".$new_value."')")==TRUE){
        echo "Record updated successfully";

      }
} else {
    echo "Error when trying to update the record.";
}
?>