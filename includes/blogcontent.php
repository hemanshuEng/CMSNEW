<?php
if(isset($_POST['submit'])){
    $comment_post_id =$_GET['blog_id'];
    $comment_author =$_POST  ['comment_author'];
    $comment_email =$_POST['comment_email'];
    $comment_date =date('d-m-y');
    $comment_content =$_POST['comment_content'];
    $comment_status = 'approve';
    $query = "INSERT INTO comment (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ('{$comment_post_id}','{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now())";
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("queryfailed".mysqli_error());
        }
        header("Location: post.php?blog_id='$comment_post_id'");
}

?>





<div class="col-lg-8">
                <?php 
                    if(isset($_GET['blog_id']))
                    {
                    $blog_id = $_GET['blog_id'];
                    $query = "SELECT * FROM posts WHERE post_id = $blog_id ";
                    $post_data = mysqli_query($connection,$query);
                    if(!$post_data){
                        die("queryfailed".mysqli_error());
                    }
                    $row = mysqli_fetch_assoc($post_data);
                        $post_id =$row['post_id'];
                        $post_title =$row['post_title'];
                        $post_author =$row['post_author'];
                        $post_date =$row['post_date'];
                        $post_image =$row['post_image'];
                        $post_content=$row['post_content'];
    
                    }
                ?>   
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo 'image/'.$post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p ><?php echo $post_content ?></p>
                

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form"  action='' method = 'POST'>
                        <div class="form-group">
                          <label for="comment_author">Author</label>
                          <input type="text" class="form-control" name="comment_author" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="comment_email">Email</label>
                          <input type="email" class="form-control" name="comment_email" id="" aria-describedby="emailHelpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                        $query = "SELECT * FROM comment WHERE (comment_post_id = $blog_id) AND (comment_status= 'approve') ORDER BY comment_id DESC" ;
                        $result = mysqli_query($connection,$query);
                             if(!$result){
                                die("queryfailed".mysqli_error());
                                }
                                while($row = mysqli_fetch_assoc($result)){
                  ?>        
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row['comment_author']?>
                            <small><?php echo $row['comment_date']?></small>
                        </h4>
                        <?php echo $row['comment_content']?>
                    </div>
                </div>
            <?php 
               }
            ?>

            </div>