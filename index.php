<?php
$sessionTime = 15 * 24 * 60 * 60;
session_set_cookie_params($sessionTime);
session_name("user_email");
session_start();

if (isset($_COOKIE['user_email'])) {
    setcookie("user_email", $_COOKIE["user_email"], time() + $sessionTime, "/");
}


include("dbConfig.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}



else {




?>

<?php

$user_session = $_SESSION['user_email'];

$get_user = "select * from users  where user_email='$user_session'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_id = $row_user['user_id'];

$user_name = $row_user['user_name'];

$user_email = $row_user['user_email'];

$user_image = $row_user['user_image'];

$user_contact = $row_user['user_contact'];


?>

<?php include "header.php";?>
<?php


if($_SERVER['REQUEST_URI'] =="login.php"){echo "<script>window.open('index.php?dashboard','_self')</script>";}




if(isset($_GET['dashboard'])){

include("dashboard.php");

}


if(isset($_GET['user_profile'])){

include("user_profile.php");

}


if(isset($_GET['user_delete'])){

include("user_delete.php");

}

if(isset($_GET['logout'])){

include("logout.php");

}


?>

<?php } ?>


<?php include "footer.php";?>
