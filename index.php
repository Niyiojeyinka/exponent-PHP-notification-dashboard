<?php
require_once "./common/functions.php";

require_once "./common/template.php";

headerDisplay("Login to Notification Manager");
?>
<section class="w3-padding-large w3-center " style="margin-top:50px;">


<form action="./process.php" method="post">
<span class="w3-text-red"><?= isset($_COOKIE['error'])?$_COOKIE['error']:""?></span><br>
<label class="w3-label" for="username">Username :</label>
<input class="w3-padding w3-margin" name="username" type="text" placeholder="Your Username"/>
<br>
<label class="w3-label" for="password">Password :</label>
<input class="w3-padding w3-margin" name="password" type="password" placeholder="Your password"/>
<br>
<input type="submit" class="w3-btn w3-pink w3-margin" name="submit" value="Sign In"/>
</form>

</section>
<?php
footerdisplay();

?>