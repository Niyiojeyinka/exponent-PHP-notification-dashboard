<?php

function redirect($to){
    
            header("Location: ".$to);

}

function setErrorFlash($message){

    $cookie_name = "error";
    $cookie_value =  $message;
    setcookie($cookie_name, $cookie_value, time() + 5, "/"); // 86400 = 1 day
}




function setSuccessFlash($message){

    $cookie_name = "serror";
    $cookie_value =  $message;
    setcookie($cookie_name, $cookie_value, time() + 5, "/"); // 86400 = 1 day
}