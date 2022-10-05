<?php

include("dbConfig.php");

$sessionTime = 15 * 24 * 60 * 60;
session_set_cookie_params($sessionTime);
session_name("user_email");
session_start();

if (isset($_COOKIE['user_email'])) {
    setcookie("user_email", $_COOKIE["user_email"], time() + $sessionTime, "/");
}
if(isset($_SESSION['user_email'])){

echo "<script>window.open('index.php?dashboard','_self')</script>";

}


?>
<?php include "header.php";?>
<section class="userSpace">
    <div class="col_1_1">
        <div class="col">
         <h1>Login Here<br>User Collection</h1>
          <p>Login to manage user information.</p>
       </div>
       <div class="col animate fadeInUp">
        <form class="form-login" action="" method="post" >
        <input type="email" name="user_email" placeholder="User Name"  required />
        <input type="password" name="user_pass" placeholder="Password" required />
        <button class="borderButton" type="submit" name="user_login" >LOG IN</button>
        <div><a class="otherLink" href="register_user.php">Signup or Register Here</a></div>
        </form>
    </div>
  </div>
</section>
<?php include "footer.php";?>
<?php

if(isset($_POST['user_login'])){

$user_email = mysqli_real_escape_string($con,$_POST['user_email']);

$user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);

$get_user = "select * from users where user_email='$user_email'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$hash_password = $row_user['user_pass'];

$decrypt_password = password_verify($user_pass, $hash_password);

if($decrypt_password != 0){

$_SESSION['user_email']=$user_email;



echo "<script>window.open('index.php?dashboard','_self')</script>";	
	
}else{
	
echo "<script>alert('Email or Password is Wrong')</script>";	
	
}


}

?>