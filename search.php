<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<body>

   
   <?php include "includes/navigation.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                
                if(isset($_POST['submit'])){
                    $search =$_POST['search'];
                    $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query =mysqli_query($connection,$query);

                    if(!$search_query){
                        die("query failed".mysqli_error($connection));
                    }
                }
                $count =mysqli_num_rows($search_query);

                if($count == 0){
                    echo "NO result";
                }else{
                    while($search_query_r  = mysqli_fetch_assoc($search_query)){
                        $post_id =$search_query_r['post_id'];
                        $post_title =$search_query_r['post_title'];
                        $post_author =$search_query_r['post_author'];
                        $post_date =$search_query_r['post_date'];
                        $post_image =$search_query_r['post_image'];
                        $post_content=$search_query_r['post_content'];
                    
            ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src=<?php echo "image/".$post_image?> alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php } 
                } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

                </div>   
            <!-- Blog Sidebar Widgets Column -->
            
         <?php include "includes/sidebar.php";?> 
        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php";?>      
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>