<?php   //Doesnt work 153
include "config.php";

if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old_image'];

}else{
    if(isset($_FILES['new-image'])){
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];        //temporary name
    $file_type = $_FILES['new-image']['type'];
    $file_ext = end(explode('.', $file_name));  //extension 
    $extensions = array("jpeg", "jpg", "png");

    if(in_array($file_ext, $extensions) === false){
        $errors[] = "This extension isnt supprorted, Jpg, PNG or Jpeg only";    //Makes sure only 3 file types are uploaded
    }

    if($file_size > 3145728){
        $errors[] = "File Larger than 3MB or lower";        //Limit to how large image's size can be
    }

    if(empty($errors) == true){
        move_uploaded_file($file_tmp, "upload/".$file_name);        //If error is shown in previous conditions
    }

    else{
        print_r($errors);       //if any errors occur print it
        die();
    }
}   //Updating the database
 //$sql = "UPDATE filodb.post SET title = '{$_POST["post_title"]}', 
 //           desciption = '{$_POST["postdesc"]}', 
 //           category={$_POST["category"]},
 //           post_img = '{$file_name}',
 //           WHERE post_id={$_POST["post_id"]}";

        $sql = "UPDATE u_180023602_db.post SET title = '{$_POST["post_title"]}', 
        desciption = '{$_POST["postdesc"]}', 
        category={$_POST["category"]},
        post_img = '{$file_name}',
        WHERE post_id={$_POST["post_id"]}";

$result = mysqli_query($conn, $sql);
    if($result){
        header("location: {$hostname}/admin/post.php");     //redirection afterwards
    }else{
        echo "something went wrong in save-update-post.php header or the query";
    }

}

?>