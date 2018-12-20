<?php

function confirmQuery ($query) {
     if(!$query){
         die("Queryfailed".mysqli_error($connection));
     }
}
?>