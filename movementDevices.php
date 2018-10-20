<?php

include 'checkConnection.php';

$deviceType = $_POST['devicetype'];
$name = $_POST['id'];
$users_id = $_POST['user_id'];
$locations_id = $_POST['location_id'];
$entities_id = $_POST['entities_id'];




if($connect->query("UPDATE $deviceType SET users_id = $users_id, entities_id = $entities_id, locations_id = $locations_id WHERE name = '".$name."'")=== TRUE){
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connect->error;
}


?>