<?php
    if(isset($_GET['delete'])){
    $delete_ID =$_GET['delete'];
    $delete_query = "DELETE FROM user WHERE user_id ={$delete_ID}";
    $delete_result = mysqli_query($connection,$delete_query);
    confirmQuery($delete_result);
    header('Location: user.php');
    }


?>


<div class="table-responsive-sm">
    <table class="table table-bordered table-hover ">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>User Image</th>
                <th>User Role</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($connection,$query);
                             if(!$result){
                                die("queryfailed".mysqli_error());
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                $ID =$row['user_id'];
                                $username =$row['user_name'];
                                $user_firstname =$row['user_firstname'];
                                $user_lastname =$row['user_lastname'];
                                $user_email =$row['user_email'];
                                $user_image =$row['user_image'];
                                $user_role =$row['user_role'];
                                $user_date =$row['user_date'];
                                echo "<td scope ='row'>$ID</td>";
                                echo  "<td>$username</td>";
                                echo  "<td>$user_firstname</td>";
                                echo  "<td>$user_lastname</td>";
                                echo  "<td>$user_email</td>";
                                echo  "<td>$user_image</td>";
                                echo  "<td >$user_role</td>";
                                echo  "<td >$user_date</td>";
                                echo  "<td><a href=?source=edit_user&edit={$ID}>Edit</a></td>";
                                echo  "<td><a href=?delete={$ID}>Delete</a></td>";
                                echo "</tr>";
                                 }

                    ?>

        </tbody>
    </table>


</div>