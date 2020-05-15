<?php
function headerDisplay($title){

?>

<!DOCTYPE html>
<html>
<head>
<title><?= $title?></title>
<link rel="Stylesheet" href="./assets/w3.css"/>
</head>
<body style="height:100vh;">
<header class="w3-top w3-padding-large w3-pink">
<span class="w3-medium w3-serif">Raja.NG's Admin Notification Dashboard</span>

</header>
<?php


}

function footerdisplay()
{
    ?>

<footer class="w3-padding-xxlarge w3-pink w3-center">
 &copy;2020

</footer>
<body>
<html>

<?php

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
?>


















