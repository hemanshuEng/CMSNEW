<?php ob_start();?>
<?php include "../includes/db.php"?> 

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
                    <small>Categories</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
                <?php
                if(isset($_POST['submit'])){
                    $cat_title =$_POST['cat_title'];
                    if($cat_title==""|| empty($cat_title)){
                        echo 'this field should not be empty';
                    }else {
                    $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}')";
                    $create_categories_query = mysqli_query($connection,$query);
                    if(!$create_categories_query){
                        die('query failed'.mysqli_error($connection));
                    }
                    }
                }
                ?>
                <div class = "col-xs-3">
                <form action="" method ="post">
                    <div class="form-group">
                      <label for="cat_title">Add Category</label>
                      <input type="text" name="cat_title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Categories</small>
                    </div>
                    <button type="submit" name='submit' class="btn btn-primary">Add category</button>
                
                </form>
                
                <form action="" method ="post">
                    <div class="form-group">
                      <label for="cat_title">Edit</label>
                        <?php
                        if(isset($_GET['edit'])){
                          $cat_id =$_GET['edit'];
                          $query = "SELECT * FROM categories WHERE cat_id =$cat_id";
                          $result = mysqli_query($connection,$query);
                               if(!$result){
                                  die("queryfailed".mysqli_error());
                                  }
                                  while($row = mysqli_fetch_assoc($result)){
                                  echo "<tr>";
                                  $ID =$row['cat_id'];
                                  $title =$row['cat_title'];
                        ?>       
                                  <input type="text" value ="<?php if(isset($title)){echo $title;}  ?>" name="cat_title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                 
                        <?php
                                  }  
                            }
                        ?>
                       
                     
                      <small id="helpId" class="text-muted">Categories</small>
                    </div>
                    <button type="submit" name='update' class="btn btn-primary">update</button>
                     <?php
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                        
                       if(isset($_POST['update'])){
                        $cat_title =$_POST['cat_title'];
                        if($cat_title==""|| empty($cat_title)){
                            echo 'this field should not be empty';
                        }else {
                        $query = "UPDATE categories SET cat_title ='{$cat_title}' WHERE cat_id='{$cat_id}'";
                        $create_categories_query = mysqli_query($connection,$query);
                        if(!$create_categories_query){
                            die('update query failed'.mysqli_error($connection));
                        }
                        header("Location: categories.php");
                        }
                    } 
                }
                    ?>
                </form>
                </div>
                <div class="col-xs-6">
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Title</th>
                               </tr>
                           </thead>
                           <tbody>
                            <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection,$query);
                                     if(!$result){
                                        die("queryfailed".mysqli_error());
                                        }
                                        while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        $ID =$row['cat_id'];
                                        $title =$row['cat_title'];
                                        echo "<td scope ='row'>$ID</td>";
                                        echo "<td>$title</td>";
                                        echo "<td><a href ='categories.php?delete={$ID}'>Delete</a></td>";
                                        echo "<td><a href ='categories.php?edit={$ID}'>Edit</a></td>";
                                        echo "</tr>";
                                         }
                    
                    
                             ?>


                             <?php 

                             if(isset($_GET['delete'])){
                                 $cat_id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id ={$cat_id}";
                                $delete_query = mysqli_query($connection,$query);
                                header("Location: categories.php");
                             }

                             ?>
                          
                           </tbody>
                       </table>
                
                
                </div>
            </div>
        </div>
        <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


</div>
    <!-- /#wrapper -->

    <?php include "includes/footer.php"?>
</body>

</html>