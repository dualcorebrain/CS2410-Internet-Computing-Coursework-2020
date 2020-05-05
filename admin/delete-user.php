<?php 

if($_SESSION["user_role"] == '0'){
    header("Location: {$hostname}/admin/post.php");

try{

        include "config.php";
        $userid = $_GET['id'];

        //$sql = "DELETE FROM filodb.user WHERE user_id = {$userid}"; 
        $sql = "DELETE FROM u_180023602_db.user WHERE user_id = {$userid}"; 


        if(mysqli_query($conn, $sql)){             //This redirects to the users page after completion
            header("Location: {$hostname}/admin/users.php");
        }
        else{
            echo myseli_error($conn);
            throw new Exception($e);
        }
    mysqli_close($conn);
    }catch(Exception $e){
        print_r($e);
    }
}
?>