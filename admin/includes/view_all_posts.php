<?php
    if(isset($_GET['delete'])){
    $delete_ID =$_GET['delete'];
    $delete_query = "DELETE FROM posts WHERE post_id ={$delete_ID}";
    $delete_result = mysqli_query($connection,$delete_query);
    confirmQuery($delete_result);
    }


?>


<div class="table-responsive-sm" >
            <table class="table table-bordered table-hover ">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>image</th>
                        <th>Content</th>
                        <th >Tags</th>
                        <th>Comments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM posts";
                        $result = mysqli_query($connection,$query);
                             if(!$result){
                                die("queryfailed".mysqli_error());
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                $ID =$row['post_id'];
                                $post_cat_ID =$row['post_category_id'];
                                $post_title =$row['post_title'];
                                $post_author =$row['post_author'];
                                $post_date =$row['post_date'];
                                $post_image =$row['post_image'];
                                $post_content =$row['post_content'];
                                $post_tags =$row['post_tags'];
                                $post_commnets =$row['post_comment_count'];
                                $post_status =$row['post_status'];
                                echo "<td scope ='row'>$ID</td>";
                                echo  "<td>$post_title</td>";
                                echo  "<td>$post_author</td>";
                                $cat_query ="SELECT * FROM categories WHERE cat_id =$post_cat_ID";
                                $cat_result=mysqli_query($connection,$cat_query);
                                $cat_row =mysqli_fetch_assoc($cat_result);
                                echo  "<td>{$cat_row['cat_title']}</td>";
                                echo  "<td>$post_date</td>";
                                echo   "<td><img width = '100' src ='../image/$post_image' alt = '$post_image'></td>";
                                echo  "<td>$post_content</td>";
                                echo  "<td width = '%3'>$post_tags</td>";
                                echo  "<td>$post_commnets</td>";
                                echo  "<td><a href=?delete={$ID}>Delete</a></td>";
                                echo  "<td><a href=?source=edit_post&edit={$ID}>Edit</a></td>";
                                echo "</tr>";
                                 }

                    ?>
                        
                    </tbody>
            </table>
        
        
        </div>