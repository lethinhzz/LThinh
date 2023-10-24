<?php
setcookie("cc_username", "", time() - 3600);
// echo $_COOKIE['cc_username'];
header("Location: login.php");
?>