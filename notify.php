<?php
session_start();
require_once "./common/template.php";
if(!isset($_SESSION['user'])){

    setErrorFlash("Login first");
        header("Location: index.php");
}


$title = $_POST['title'];
$content =$_POST['content'];

//get those available token from db
//send
//delete the one with device not register
require_once "Database.php";
$conn = new Database("devices.json");
$devices = $conn->get_all_records();

   $payLoad =[];
    foreach ($devices as $device) {
    $each=["to"=>$device['token'],"sound"=>"default","title"=>$title,"content"=>$content];

        if( !empty($device['token'] )){
            array_push($payLoad,$each);

        }
    }
    
  


$payLoad = json_encode($payLoad);


$expo_api_url = 'https://exp.host/--/api/v2/push/send';

$ch = curl_init($expo_api_url);
curl_setopt($ch, CURLOPT_URL,$expo_api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json',
    'content-type: application/json',
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $payLoad);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);
$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);

// do anything you want with your response
$response= json_decode($response,true);
$waiting=0;
$stop =0;
for ($i=0; $i < count($response['data']) ; $i++) { 
    if($response['data'][$i]['status'] == "ok")
    {
      //save ticket here later

 $waiting++;
      
    }else{

        if($response['data'][$i]['details']['error'] == "DeviceNotRegistered")
        {
            $stop++;
            $conn->deleteByIndex($i);
        }
    }
}


require_once "./report.php";
