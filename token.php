<?php
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
 
   

    $token = $_POST['token'];
    
require_once "Database.php";
$conn = new Database("./data/devices.json");
$devices = $conn->get_all_records();


function check_if_token_exists($devices,$token){
    if(empty($devices)){
        return false;
    }
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
    'error' => $token,
    );
  
 //header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
   echo json_encode($data,true);