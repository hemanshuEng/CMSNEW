<?php include "db.php" ?>
<?php session_start() ?>
<?php ob_start();?>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE user_name = '{$username}' ";
    //echo $query;
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
        die("query failed" . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_user_query);
   
    if(($username === $row['user_name']) && ($password === $row['user_password'])){
      $_SESSION['username']=$row['user_name'];
      $_SESSION['firstname']=$row['user_firstname'];
      $_SESSION['lastname']=$row['user_lastname'];
      $_SESSION['role']=$row['user_role'];

      header("location: ../admin");
    }else {
        header("location: ../index.php");
    }

}


?>