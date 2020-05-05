<?php
//Implementing Secuirity for inputs
    if(isset($_GET['search'])){

    }
    else{
        header("Location: index.php?signup=error");     //If there is a problem in search or search couldnt be passed
    }
include "add-user.php";
//Getting all inputs using POST
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$user = $_POST['user'];
$email =  $_POST['email'];

//Email Validation not working
if(isset($_GET['search'])){


if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: {$hostname}/admin/add-user.php?error=invalid_email");

    }
    else{
        echo "please enter valid email";
    }
}

?>