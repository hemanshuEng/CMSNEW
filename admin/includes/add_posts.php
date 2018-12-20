<?php
if(isset($_POST['add'])){
    $post_category_id =$_POST['post_category_id'];
    $post_title =$_POST  ['post_title'];
    $post_author =$_POST['post_author'];
    $post_date =date('d-m-y');
    $post_image =$_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content =$_POST['post_content'];
    $post_tags =$_POST['post_tags'];
    $post_commnets =4;
    $post_status =$_POST['post_status'];
    move_uploaded_file($post_image_temp,"../image/$post_image");
    $query = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES ('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_commnets}','{$post_status}')";
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("queryfailed".mysqli_error());
        }
}

?>
      
      
      
       <form action="" method="post" enctype ="multipart/form-data">
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="text" name="post_title" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="post_category">Post Category Id</label>
              <input type="text" name="post_category_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="Author">Post Author</label>
              <input type="text" name="post_author" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>  
            <div class="form-group">
              <label for="post_status">Post Status</label>
              <input type="text" name="post_status" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="image">Post image</label>
              <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            </div>   
            <div class="form-group">
              <label for="post_tags">Post Tags</label>
              <input type="text" name="post_tags" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="post_content">Post Content</label>
              <textarea type="text" name="post_content" id="" class="form-control" cols='30'$_POSTs ='10' placeholder="" aria-describedby="helpId">
              </textarea>
            </div>  
           <button name ="add" type="submit" class="btn btn-primary">add post</button>
        </form>
        
       