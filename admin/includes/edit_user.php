<?php 
  if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = "SELECT * FROM user WHERE user_id ={$edit_id}";
      $edit_result = mysqli_query($connection,$edit_query);
      confirmQuery($edit_result);
      $row = mysqli_fetch_assoc($edit_result);
     
  }

?>

<?php
 if(isset($_POST['edit'])){
    $user_name =$_POST['user_name'];
    $user_firstname =$_POST  ['user_firstname'];
    $user_lastname =$_POST['user_lastname'];
    $user_date =date('d-m-y');
    $user_email =$_POST['user_email'];
    $user_role =$_POST['user_role'];
    $query = "UPDATE user SET user_name='$user_name', user_firstname ='$user_firstname',user_lastname='$user_lastname',user_date=now(), user_email='$user_email',user_role ='$user_role' WHERE user_id = '$edit_id'";
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
        <input type="text" name="user_name" value ="<?php if(isset($row['user_name'])){echo $row['user_name'];}  ?>"id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname"value ="<?php if(isset($row['user_firstname'])){echo $row['user_firstname'];}  ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" value ="<?php if(isset($row['user_lastname'])){echo $row['user_lastname'];}  ?>"id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" class="form-control" name="user_email" value ="<?php if(isset($row['user_email'])){echo $row['user_email'];}  ?>"id="" aria-describedby="emailHelpId" placeholder=""> 
    </div>
    <div class="form-group">
        <label for="user_role">User role</label>
        <select class="form-control" name="user_role" id="exampleFromcontrolSelect1">
        <?php
                if($row['user_role'] == 'admin'){
                    echo "<option selected >admin</option>";
                    echo "<option >subscriber</option>";
                }else{
                    echo "<option >admin</option>";
                    echo "<option selected >subcriber</option>";
                }
               ?>
        </select>

    </div>
    </div>
    <button name="edit" type="submit" class="btn btn-primary">edit user</button>
</form>