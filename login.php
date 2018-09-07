<?php

include 'checkConnection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$queryResult =$connect->query("Select * from login WHERE username='".$username."' and password='".$password."'");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;
}

echo json_encode($result);
?>