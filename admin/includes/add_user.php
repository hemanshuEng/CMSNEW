<?php
if(isset($_POST['add'])){
    $user_name =$_POST['user_name'];
    $user_firstname =$_POST  ['user_firstname'];
    $user_lastname =$_POST['user_lastname'];
    $user_date =date('d-m-y');
    $user_email =$_POST['user_email'];
    $user_password =$_POST['user_password'];
    $user_role =$_POST['user_role'];
    $query = "INSERT INTO user (user_name,user_firstname,user_lastname,user_email,user_role,user_password,user_date) VALUES ('{$user_name}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}','{$user_password}',now())";
   
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("queryfailed".mysqli_error());
        }
        header('Location: user.php');
}

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" name="user_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" class="form-control" name="user_email" id="" aria-describedby="emailHelpId" placeholder="">
      
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" name="user_password" id="" placeholder="">
    </div>
    <div class="form-group">
        <label for="user_role">User role</label>
        <select class="form-control" name="user_role" id="exampleFromcontrolSelect1">
            <option>admin</option>
            <option selected>subsriber</option>
        </select>

    </div>
    </div>
    <button name="add" type="submit" class="btn btn-primary">add user</button>
</form>