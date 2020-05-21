<?php
require_once "./common/functions.php";

session_start();


$password = $_POST['password'];
$username = $_POST['username'];


require_once "Database.php";
$conn = new Database("data/admin.json");
$users = $conn->all_records;

//var_dump($users);exit();

function check_if_user_exists($users,$username){
foreach ($users as $user) {
   if ($user['username'] == $username) {
   	
      return $user;

   }
}
return false;
}


if (!check_if_user_exists($users,$username)){
	//user  not exists
setErrorFlash("Wrong Credential");
redirect("index.php");

    
}else{
		$user = check_if_user_exists($users,$username);//returned user
		  if ($user['username'] == $username && $user['password'] == $password) {

      	$_SESSION['user'] = $user;
    
	
          redirect("send.php");

	
      }else{
        setErrorFlash("Incorrect Password");
        redirect("index.php");

	
		}
        
	}