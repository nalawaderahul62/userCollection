<?php

$sessionTime = 3600;
session_set_cookie_params($sessionTime);
session_name("user_email");

session_start();

session_destroy();

if (isset($_COOKIE['user_email'])) {
    setcookie("user_email", $_COOKIE["user_email"], time() + $sessionTime, "/");
}


echo "<script>window.open('login.php','_self')</script>";

?>