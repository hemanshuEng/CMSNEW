<div class="col-md-8">
                <?php 
                    $query = "SELECT * FROM posts";
                    $post_data = mysqli_query($connection,$query);
                    if(!$post_data){
                        die("queryfailed".mysqli_error());
                    }
                    while($row = mysqli_fetch_assoc($post_data)){
                        $post_id =$row['post_id'];
                        $post_title =$row['post_title'];
                        $post_author =$row['post_author'];
                        $post_date =$row['post_date'];
                        $post_image =$row['post_image'];
                        $post_content=$row['post_content'];
                    
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?blog_id=<?php echo $post_id ?>"><?php echo $post_title?></a>
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

                <?php }  ?>
                <!-- Second Blog Post 
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                -->
               

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
