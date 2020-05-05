<?php //152

//Used to save post to database
include 'config.php';
if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];        //temporary name
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));  //extension in lower case
    $extensions = array("jpeg", "jpg", "png");

    if(in_array($file_ext, $extensions) === false){
        $errors[] = "This extension isnt supprorted, Jpeg or PNG only";
    }

    if($file_size > 3145728){
        $errors[] = "File Larger than 3MB or lower";
    }

    if(empty($errors) == true){
        move_uploaded_file($file_tmp, "upload/".$file_name);
    }

    else{
        print_r($errors);       //if any errors occur
        die();
    }





}

session_start();
$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$description = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION["user_id"];

//$sql = "INSERT INTO filodb.post(title, description, category,post_date, author,post_img)
        //VALUES('{$title}', '{$description}', {$category}, '{$date}', '{$author}', '{$file_name}'); ";

$sql = "INSERT INTO u_180023602_db.post(title, description, category,post_date, author,post_img)
        VALUES('{$title}', '{$description}', {$category}, '{$date}', '{$author}', '{$file_name}'); ";

$sql .= "UPDATE category SET post = post+1 WHERE category_id = {$category}";

if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/post.php");
}else{
    echo "<div class = 'alert alert-danger'>Query Problem with MySQL database</div>";
}
?>