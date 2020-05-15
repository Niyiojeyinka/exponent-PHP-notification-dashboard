<?php
header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Method: *");
    header('Content-Type: application/json');
    

    $token = $_POST['token'];
    
require_once "Database.php";
$conn = new Database("devices.json");
$devices = $conn->get_all_records();


function check_if_token_exists($devices,$token){
    foreach ($devices as $device) {
       if ($device['token'] == $token) {
           
          return true;
    
       }
    }
    return false;
    }

if(!check_if_token_exists($devices,$token)){

    $conn->insert(['token'=> $token]);

}

$data = array(
    'error' => 0,
    );

    echo json_encode($data,true);