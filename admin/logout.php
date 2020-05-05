<?php 
    include "config.php";

    session_start();

    session_unset();   //removes all exising values

    session_destroy();   //destroys a session once log out is clicked

    header("Location: {$hostname}/admin/"); // redirects

?>