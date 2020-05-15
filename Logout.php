<?php
require_once "./common/template.php";

session_start();

unset($_SESSION['user']);
setErrorFlash("Successfully Logout");
        header("Location: index.php");
 