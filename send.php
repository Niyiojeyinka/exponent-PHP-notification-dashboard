<?php
require_once "./common/functions.php";

session_start();


if(!isset($_SESSION['user'])){

    setErrorFlash("Login first");
        header("Location: index.php");
        exit();
}

require_once "./common/template.php";

headerDisplay("Send Notification to App");
?>
<section class="w3-padding-large w3-center " style="margin-top:50px;">


<form action="./notify.php" method="post">
<label class="w3-label" for="username">Title :</label><br>
<input class="w3-padding w3-margin" name="title" type="text" placeholder="Notification Title"/>
<br>
<label class="w3-label" for="password">Content(max:250 characters) :</label><br>
<textarea class="w3-padding w3-magin" name="content" placeholder="Notification Contents" cols="20" rows="10"></textarea>

<br>
<input type="submit" class="w3-btn w3-pink w3-margin" name="submit" value="Send Notification"/>
<br>
<a href="./Logout.php" class="w3-btn w3-red w3-margin">Logout</a>
</form>

</section>
<?php
footerdisplay();

?>