<?php

session_start(); 

unset($_SESSION['current_user']);

header("Location:login.php");
exit;
?>
