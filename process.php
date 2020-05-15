<?php

require_once "./common/template.php";

$password = $_POST['password'];
$email = $_POST['email'];


require_once "Database.php";
$conn = new Database("admin.json");
$users = $conn->get_all_records();



function check_if_user_exists($users,$email){
foreach ($users as $user) {
   if ($user['email'] == $email) {
   	
      return $user;

   }
}
return false;
}


if (!check_if_user_exists($users,$email)){
	//user  not exists
setErrorFlash("Wrong Credential");
header("Location: index.php");

    
}else{
		$user = check_if_user_exists($users,$email);//returned user
		  if ($user['email'] == $email && $user['password'] == $password) {
              session_start();
      	$_SESSION['user'] = $user;
    
	
          header("Location: send.php");
	
	
      }else{
        setErrorFlash("Incorrect Password");
        header("Location: index.php");

	
		}
        
	}