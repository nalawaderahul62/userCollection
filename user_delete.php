<?php

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['user_delete'])){

$delete_id = $_GET['user_delete'];

$delete_user = "delete from users where user_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_user);

if($run_delete){

echo "<script>window.open('index.php?dashboard','_self')</script>";

}


}


?>

<?php } ?>