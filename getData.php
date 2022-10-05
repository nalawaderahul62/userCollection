				
<?php
$sessionTime = 15 * 24 * 60 * 60;
session_set_cookie_params($sessionTime);
session_name("user_email");
session_start();

if (isset($_COOKIE['user_email'])) {
    setcookie("user_email", $_COOKIE["user_email"], time() + $sessionTime, "/");
}


if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}


if(isset($_POST['keywords'])){
   
    include('dbConfig.php');
    $whereSQL = '';
    $keywords = $_POST['keywords'];
    $sortBy = $_POST['sortBy'];
   
	
   
    if(!empty($keywords)){
        $whereSQL .= "where user_name LIKE '%".$keywords."%'
                      OR user_email LIKE '%".$keywords."%'
                      OR user_contact LIKE '%".$keywords."%'
        ";

    } 
    if(!empty($sortBy)){
        $whereSQL .= " ORDER BY user_id ".$sortBy;
    }else{
        $whereSQL .= " ORDER BY user_id DESC ";
    }

    $query = $con->query("SELECT * FROM users $whereSQL");
  
    ?>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    <?php
  
    if($query->num_rows > 0){ ?>
        <div>
        <?php
            while($row_user = $query->fetch_assoc()){ 
            
               $user_id = $row_user['user_id'];

                $user_name = $row_user['user_name'];

                $user_email = $row_user['user_email'];

                $user_contact = $row_user['user_contact'];

                $user_image = $row_user['user_image'];
            ?>
    <tbody>
        <tr>
            <td><?php echo $user_id ; ?></td>
            <td><?php echo $user_name; ?></td> 
            <td><?php echo $user_email; ?></td> 
            <td><?php echo $user_contact; ?></td> 
              <td><?php if(empty($user_image)){ ?>
            <img src="user_images/no-image.jpg" width="50" height="50" >
            <?php }else{ ?>
            <img src="user_images/<?Php echo $user_image; ?>" width="50" height="50" >
            <?php } ?></td>
            <td>
            <a href="index.php?user_profile=<?php echo $user_id; ?>"> <i class="fa fa-edit" ></i> Edit</a>
            </td>
             <td>

            <?php 


            if($_SESSION['user_email'] == $user_email){?>
                
                <i class="fa fa-ban" ></i> 
       
        <?php }else{?>
            <a href="index.php?user_delete=<?php echo $user_id; ?>"  class="userDelete" id="<?php echo $user_id; ?>">
            <i class="fa fa-trash-o" ></i>Delete</a>

        <?php }?>

            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>
</div>
  <?php } ?>
 
     
      
    <?php } ?>
  

