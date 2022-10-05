<?php

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

$get_user = "select user_name from users where user_email='$user_email'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_name = $row_user['user_name'];

?>

<div>
    <div>Dashboard<br><br>Welcome <span class="username"><?php  echo $user_name;?></span></div><br>
    <div>
        <?php if(empty($user_image)){ ?>
        <img class="upro" src="user_images/no-image.jpg" width="70" height="70" >
        <?php }else{ ?>
        <img class="upro" src="user_images/<?Php echo $user_image; ?>" width="70" height="70" >
        <?php } ?>
        <a href="index.php?user_profile=<?php echo $user_id; ?>" >Profile</a> | <a href="index.php?logout">Logout</a>
    </div>
</div>

<div>
   <br />
   <div id="result"></div>

<div>
    <input type="text" id="keywords" placeholder="Search By Name or Email or Phone" onkeyup="searchFilter()"/>
    <select id="sortBy" onchange="searchFilter()">
        <option value="">Sort By</option>
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>
     <?php $sql2="SELECT * FROM users";
            $result=mysqli_query($con, $sql2);
            $count=mysqli_num_rows($result);
        ?>       
</div>
<div>
    <div id="users_content">   
        <?php
        include('dbConfig.php');
        $query = $con->query("SELECT * FROM users ORDER BY user_id DESC"); 
        ?>
<div class="table-responsive" >
    <table width="100%" border="1" cellspacing="0" cellpadding="6">
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
            <a href="index.php?user_profile=<?php echo $user_id; ?>"><i class="fa fa-edit" ></i> Edit</a>
            </td>

            <td>

            <?php if($_SESSION['user_email'] == $user_email){?>
                
                <i class="fa fa-ban" ></i>
       
        <?php }else{?>
            <a href="index.php?user_delete=<?php echo $user_id; ?>"  class="userDelete" id="<?php echo $user_id; ?>">
            <i class="fa fa-trash-o" ></i> Delete</a>

        <?php }?>

            </td>
        </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
  
        <?php } ?>
        </div>
        
    <?php } ?>
    </div>

</div>

<script>
function searchFilter(keywords) {
   
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data:{keywords:keywords,sortBy:sortBy},
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#users_content').html(html);
            $('.loading-overlay').fadeOut("slow");
        }
    });
}
</script>