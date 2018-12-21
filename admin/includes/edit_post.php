

<?php 
  if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = "SELECT * FROM posts WHERE post_id ={$edit_id}";
      $edit_result = mysqli_query($connection,$edit_query);
      confirmQuery($edit_result);
      $row = mysqli_fetch_assoc($edit_result);
     
  }


?>
      
<?php
if(isset($_POST['edit'])){
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
    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id ={$edit_id}";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        $row = mysqli_fetch_assoc($result);
        $post_image = $row['post_image']; 
    }
    $query = "UPDATE posts SET post_title='$post_title', post_category_id ='$post_category_id',post_author='$post_author',post_date=now(), post_image='$post_image',post_content ='$post_content', post_tags ='$post_tags', post_comment_count ='$post_commnets',post_status ='$post_status' WHERE post_id = '$edit_id'";
    $create_post_query = mysqli_query($connection,$query);
    
    
    if(!$create_post_query){
        die("queryfailed".mysqli_error());
        }
}
?>
      
       <form action="" method="post" enctype ="multipart/form-data">
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="text" value ="<?php if(isset($row['post_title'])){echo $row['post_title'];}  ?>" name="post_title" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="post_category_id">Post category</label>
              <select class="form-control" name="post_category_id" id="exampleFromcontrolSelect1">
              <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection,$query);
                                confirmQuery($result);
                                        while($cat_row = mysqli_fetch_assoc($result)){
                                        $ID =$cat_row['cat_id'];
                                        $title =$cat_row['cat_title'];
               ?>
                <option value="<?php echo $ID ?>"><?php echo $title ?></option>
               <?php
                                        }
                ?>
                
        
              </select>
            </div>
            <div class="form-group">
              <label for="Author">Post Author</label>
              <input type="text" name="post_author" value ="<?php if(isset($row['post_author'])){echo $row['post_author'];}  ?>"id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>  
            <div class="form-group">
              <label for="post_status">Post Status</label>
              <input type="text" name="post_status" value ="<?php if(isset($row['post_status'])){echo $row['post_status'];}  ?>"id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="image">Post image</label>
               <img  src = "<?php echo '../image/'.$row['post_image']; ?>" width ='100'> 
              <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            </div>   
            <div class="form-group">
              <label for="post_tags">Post Tags</label>
              <input type="text" name="post_tags" value ="<?php if(isset($row['post_tags'])){echo $row['post_tags'];}  ?>"id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="post_content">Post Content</label>
              <textarea type="text" name="post_content" id="" class="form-control" cols='30' rows='10' placeholder="" aria-describedby="helpId">
               <?php if(isset($row['post_content'])){echo $row['post_content'];}  ?>
              </textarea>
            </div>  
           <button name ="edit" type="submit" class="btn btn-primary">Edit Post</button>
        </form>
        
       