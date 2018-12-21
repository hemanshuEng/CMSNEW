<?php
if(isset($_POST['add'])){
    $comment_post_id =$_POST['comment_post_id'];
    $comment_author =$_POST  ['comment_author'];
    $comment_email =$_POST['comment_email'];
    $comment_date =date('d-m-y');
    $comment_content =$_POST['comment_content'];
    $comment_status =$_POST['comment_status'];
    $query = "INSERT INTO comment (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ('{$comment_post_id}','{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now())";
   
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("queryfailed".mysqli_error());
        }
        header('Location: comments.php');
}

?>
      
      
      
       <form action="" method="post" enctype ="multipart/form-data">
            <div class="form-group">
              <label for="title">Author</label>
              <input type="text" name="comment_author" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="comment_post_id">Post Title</label>
              <select class="form-control" name="comment_post_id" id="exampleFromcontrolSelect1">
              <?php
                                $query = "SELECT * FROM posts";
                                $result = mysqli_query($connection,$query);
                                confirmQuery($result);
                                        while($cat_row = mysqli_fetch_assoc($result)){
                                        $ID =$cat_row['post_id'];
                                        $title =$cat_row['post_title'];
               ?>
                <option value="<?php echo $ID ?>"><?php echo $title ?></option>
               <?php
                                        }
                ?>
                
        
              </select>
            </div>
            <div class="form-group">
              <label for="Author">Email</label>
              <input type="email" name="comment_email" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>  
            <div class="form-group">
              <label for="comment_content">Comment</label>
              <input type="text" name="comment_content" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="comment_status">Status</label>
              <select class="form-control" name="comment_status" id="exampleFromcontrolSelect1">
                <option>approve</option>
                <option selected >unapprove</option>
              </select>
            </div>
            </div>  
           <button name ="add" type="submit" class="btn btn-primary">add Comment</button>
        </form>
        
       