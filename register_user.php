<?php

include("dbConfig.php");

if(isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_POST['submit'])){
	

$user_name = $_POST['user_name'];

$user_email = $_POST['user_email'];

$user_pass = $_POST['user_pass'];

$encrypted_password = password_hash($user_pass, PASSWORD_DEFAULT);

$user_contact = $_POST['user_contact'];



$get_user = "select * from users where user_email='$user_email'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

if($user_email==isset($row_user['user_email']))
        {

       echo "<script>alert('Email already exists. use unique email.')</script>";	
      

}
else{
$insert_user = "insert into users (user_name,user_email,user_pass,user_contact) values ('$user_name','$user_email','$encrypted_password','$user_contact')";

$run_user = mysqli_query($con,$insert_user);


if($run_user){
echo "<script>window.open('login.php','_self')</script>";
}


}

}
?>
<?php include "header.php";?>
	<section class="userSpace">
	  <div class="col_1_1">
		    <div class="col animate fadeInUp">
		     <h1>Register Here<br>User Collection</h1>
			 <p>Helps you to collect & store user information.</p>
		   </div>
	   		<div class="col animate fadeInUp">
			<form action="" method="post" >
				<input type="text" name="user_name"  placeholder="Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" required>

				<input type="email" name="user_email" placeholder="Email" required>


				<input type="password" name="user_pass"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

				<input type="text" name="user_contact"  placeholder="Phone" pattern=".{10,10}"  maxlength="10" minlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  title="Please Enter 10 digit Phone Number" required>


				<button class="borderButton" type="submit" name="submit" >Register User</button>
				<a class="otherLink" href="login.php">Login</a>
				
			</form>
			</div>
		</div>
	</section>
<?php include "footer.php";?>


<?php }  ?>
