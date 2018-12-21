<?php
    if(isset($_GET['delete'])){
    $delete_ID =$_GET['delete'];
    $delete_query = "DELETE FROM comment WHERE comment_id ={$delete_ID}";
    $delete_result = mysqli_query($connection,$delete_query);
    confirmQuery($delete_result);
    header('Location: comments.php');
    }


?>
<?php
    if(isset($_GET['approve'])){
    $approve_ID =$_GET['approve'];
    $approve_query = "UPDATE comment SET comment_status = 'approve' WHERE comment_id ={$approve_ID}";
    $approve_result = mysqli_query($connection,$approve_query);
    confirmQuery($approve_result);
    header('Location: comments.php');
    }


?>

<?php
    if(isset($_GET['unapprove'])){
    $unapprove_ID =$_GET['unapprove'];
    $unapprove_query = "UPDATE comment SET comment_status = 'unapprove' WHERE comment_id ={$unapprove_ID}";
    $unapprove_result = mysqli_query($connection,$unapprove_query);
    confirmQuery($unapprove_result);
    header('Location: comments.php');
    }


?>

<div class="table-responsive-sm" >
            <table class="table table-bordered table-hover ">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Post</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM comment";
                        $result = mysqli_query($connection,$query);
                             if(!$result){
                                die("queryfailed".mysqli_error());
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                $ID =$row['comment_id'];
                                $post_ID =$row['comment_post_id'];
                                $comment_author =$row['comment_author'];
                                $comment_email =$row['comment_email'];
                                $comment_content =$row['comment_content'];
                                $comment_date =$row['comment_date'];
                                $comment_status =$row['comment_status'];
                                echo "<td scope ='row'>$ID</td>";
                                $cat_query ="SELECT * FROM posts WHERE post_id =$post_ID";
                                $cat_result=mysqli_query($connection,$cat_query);
                                $cat_row =mysqli_fetch_assoc($cat_result);
                                echo  "<td> <a href='../post.php?blog_id=$post_ID'>{$cat_row['post_title']}</a></td>";
                                echo  "<td>$comment_author</td>";
                                echo  "<td>$comment_email</td>";
                                echo  "<td>$comment_content</td>";
                                echo  "<td>$comment_status</td>";
                                echo  "<td >$comment_date</td>";
                                echo  "<td><a href=?approve={$ID}>Approve</a></td>";
                                echo  "<td><a href=?unapprove={$ID}>Unapprove</a></td>";
                                echo  "<td><a href=?source=edit_comment&edit={$ID}>Edit</a></td>";
                                echo  "<td><a href=?delete={$ID}>Delete</a></td>";
                                
                                echo "</tr>";
                                 }

                    ?>
                        
                    </tbody>
            </table>
        
        
        </div>