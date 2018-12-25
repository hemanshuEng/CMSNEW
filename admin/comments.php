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
                            <small><?php echo $_SESSION['firstname'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> View all Posts
                            </li>
                        </ol>

                    </div>
                    <!-- /.row -->
                    <!-- switch statement -->
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }

                    switch ($source) {

                        case 'add_comment':
                            include "includes/add_comment.php";
                            break;
                        case 'edit_comment':
                            include 'includes/edit_comment.php';
                            break;

                        default:
                            include "includes/view_all_comments.php";
                            break;
                    }


                    ?>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

    <?php include "includes/footer.php"?>
</body>

</html>