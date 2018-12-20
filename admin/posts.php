<?php ob_start();?>
<?php include "../includes/db.php"?> 
<?php include "includes/function.php"?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"?>

<body>

<div id="wrapper">
        <?php include "includes/navigation.php"?>
        <div id="page-wrapper">

        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Welcome to Admin
                    <small>Posts</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> View all Posts
                    </li>
                </ol>
                
        </div>
        <!-- /.row -->
        <!-- switch statement -->
        <?php
         if(isset($_GET['source'])){
            $source = $_GET['source'];
         }else{
            $source ="";
         }

            switch($source){

                    case 'add_post':
                        include "includes/add_posts.php";
                        break;
                    case '45':
                        echo 'nice 45';
                        break;

                    default : 
                        include "includes/view_all_posts.php";
                        break;
            }


        ?>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


</div>
    <!-- /#wrapper -->

    <?php include "includes/footer.php"?>
</body>

</html>