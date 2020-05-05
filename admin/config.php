<?php

$hostname = "http://localhost/news-template"; //No need to type in this adress over and over again wherever we use header function
try{
//$conn = mysqli_connect('localhost', 'root', '', 'filodb') or die("problem in MySQL connection: ");
$conn = mysqli_connect('localhost', 'u-180023602', 'CPVUCKijCBimBdz', 'u_180023602_db') or die("problem in MySQL connection: ");

    if(mysqli_connect_error()){
        throw new Exception(mysqli_connect_error());
}
}

catch(Exception $exception){
    print_r($exception);
}


?>