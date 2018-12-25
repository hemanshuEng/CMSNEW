<?php 
  if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = "SELECT * FROM comment WHERE comment_id ={$edit_id}";
      $edit_result = mysqli_query($connection,$edit_query);
      confirmQuery($edit_result);
      $row = mysqli_fetch_assoc($edit_result);
     
  }


?>
 <?php
if (isset($_POST['edit'])) {
  $comment_post_id = $_POST['comment_post_id'];
  $comment_author = $_POST['comment_author'];
  $comment_email = $_POST['comment_email'];
  $comment_date = date('d-m-y');
  $comment_content = $_POST['comment_content'];
  $comment_status = $_POST['comment_status'];
  $query = "UPDATE comment SET comment_post_id='$comment_post_id', comment_author ='$comment_author',comment_email='$comment_email',comment_date=now(), comment_content='$comment_content',comment_status ='$comment_status' WHERE comment_id = '$edit_id'";
  $create_post_query = mysqli_query($connection, $query);
  if (!$create_post_query) {
    die("queryfailed" . mysqli_error());
  }
  header('Location: comments.php');
}


?>
      

      
      <form action="" method="post" enctype ="multipart/form-data">
            <div class="form-group">
              <label for="title">Author</label>
              <input type="text" value ="<?php if(isset($row['comment_author'])){echo $row['comment_author'];}  ?>"name="comment_author" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="comment_post_id">Post Title</label>
              <select class="form-control" name="comment_post_id" id="exampleFromcontrolSelect1">
              <?php
              $query = "SELECT * FROM posts";
              $result = mysqli_query($connection, $query);
              confirmQuery($result);
              while ($cat_row = mysqli_fetch_assoc($result)) {
                $ID = $cat_row['post_id'];
                $title = $cat_row['post_title'];
                if ($row['comment_post_id'] == $ID) {
                  echo "<option value= $ID selected>$title</option>";
                } else {
                  echo "<option value= $ID >$title</option>";
                }
              }
              ?>
                
        
              </select>
            </div>
            <div class="form-group">
              <label for="Author">Email</label>
              <input type="email" value ="<?php if(isset($row['comment_email'])){echo $row['comment_email'];}?>" name="comment_email" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>  
            <div class="form-group">
              <label for="comment_content">Comment</label>
              <input type="text" value ="<?php if(isset($row['comment_content'])){echo $row['comment_content'];}?>""  name="comment_content" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="comment_status">Status</label>
              <select class="form-control" name="comment_status" id="exampleFromcontrolSelect1">
              <?php
                if($row['comment_status'] == 'approve'){
                    echo "<option selected >approve</option>";
                    echo "<option >unapprove</option>";
                }else{
                    echo "<option >approve</option>";
                    echo "<option selected >unapprove</option>";
                }
               ?>
              </select>
            </div>
            </div>  
           <button name ="edit" type="submit" class="btn btn-primary">add Comment</button>
        </form>
        
       