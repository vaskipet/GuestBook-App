<?php
session_start();
session_destroy();

setcookie('uid', '', time() - 3600); //Destroying the cookies at the end the session (once user is logged out.)


header("Location: index.php");
?>
