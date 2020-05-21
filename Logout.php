<?php
require_once "./common/functions.php";
session_start();


unset($_SESSION['user']);
setErrorFlash("Successfully Logout");
        redirect("/note");
 