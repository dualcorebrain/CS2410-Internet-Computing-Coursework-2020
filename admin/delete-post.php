<?php
include "config.php";

$post_id = $_GET['id'];     //Post's ID
$cat_id =$_GET['catid'];    //Category ID


//MYSQLi query and getting results in $result
try{
    $sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql1) or die("SELECT Query Failed in delete-post.php ");
    $row = mysqli_fetch_assoc($result);     //gets individual row using the mysqli_fetch_assoc() function

    unlink("upload/".$row['post_img']);



    $sql = "DELETE FROM post WHERE post_id = {$post_id};";
    $sql .= "UPDATE category SET post=post-1 WHERE category_id = {$cat_id} ";       //Concatinated query

    if(mysqli_multi_query($conn, $sql)){
        header("location: {$hostname}/admin/post.php");
    }else{
        echo "something went wrong in delete-post.php header or the query";
        throw new Exception($e);
    }
}catch(Exception $e){
    print_r($e);
}
?>