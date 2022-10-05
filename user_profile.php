<?php

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['user_profile'])){

$edit_id = $_GET['user_profile'];

$get_user = "select * from users where user_id='$edit_id'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_id = $row_user['user_id'];

$user_name = $row_user['user_name'];

$user_email = $row_user['user_email'];

$user_pass = $row_user['user_pass'];

$user_image = $row_user['user_image'];

$new_user_image = $row_user['user_image'];

$user_contact = $row_user['user_contact'];

}

?>

<div>
   <a href="index.php?dashboard">Back to Dashboard</a> |
   <a href="index.php?logout">Logout</a>
</div><br>

<h3>Edit Profile</h3>
<div>
	<form  method="post" enctype="multipart/form-data">

	<label>User Name: </label>
	<input type="text" name="user_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" required value="<?php echo $user_name; ?>">

	<label>User Email: Disabled Edit</label>
	<input type="email" name="user_email" required value="<?php echo $user_email; ?>" readonly>
	
	<label>User Phone: </label>
	<input type="text" name="user_contact" pattern=".{10,10}"  maxlength="10" minlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  title="Please Enter 10 digit Phone Number" required value="<?php echo $user_contact; ?>">

	<label">User Image(90 x 90 px):</label>
	<input type="file" name="user_image">

	<?php if(empty($user_image)){ ?>

	<img src="user_images/no-image.jpg" width="70" height="70" >

	<?php }else{ ?>

	<img src="user_images/<?Php echo $user_image; ?>" width="70" height="70" >
	<?php } ?>

	<hr>
	<h3>Change Account Password </h3>



	<label> Change Password: </label>
	<input type="password" name="user_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


	<label> Confirm Change Password: </label>
	<input type="password" name="confirm_user_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

	<input type="submit" name="update" value="Update User" class="updateButton">

	</form>
</div>



<?php

if(isset($_POST['update'])){

$user_name = $_POST['user_name'];

$user_email = $_POST['user_email'];

$user_country = $_POST['user_country'];

$user_job = $_POST['user_job'];

$user_contact = $_POST['user_contact'];

$user_about = $_POST['user_about'];

$user_role = $_POST['user_role'];


$user_image = $_FILES['user_image']['name'];

$temp_user_image = $_FILES['user_image']['tmp_name'];

move_uploaded_file($temp_user_image,"user_images/$user_image");

if(empty($user_image)){

$user_image = $new_user_image;

}

$user_pass = $_POST['user_pass'];

$confirm_user_pass = $_POST['confirm_user_pass'];

if(!empty($user_pass) or !empty($confirm_user_pass)){

if($user_pass !== $confirm_user_pass){

echo "<script> alert('Your Password Does Not Match, Please Try Again.'); </script>";	
	
}else{

$encrypted_password = password_hash($user_pass, PASSWORD_DEFAULT);

$update_user_pass = "update users set user_pass='$encrypted_password' where user_id='$user_id'";

$run_update_user_pass = mysqli_query($con, $update_user_pass);
	
}

	
}

$update_user = "update users set user_name='$user_name',user_email='$user_email',user_image='$user_image',user_contact='$user_contact' where user_id='$user_id'";

$run_user = mysqli_query($con,$update_user);

if($run_user){

echo "<script>alert('User Has Been Updated successfully')</script>";


if($_SESSION['user_email'] == $_POST['user_email']){
session_destroy();
echo "<script>window.open('index.php?login','_self')</script>";

}else{
echo "<script>window.open('index.php?dashboard','_self')</script>";

}


//session_destroy();

}

}


?>



<?php }  ?>
