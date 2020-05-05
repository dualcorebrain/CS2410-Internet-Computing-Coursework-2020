<?php

$hostname = "https://180023602.cs2410-web01pvm.aston.ac.uk/news-template/"; //No need to type in this adress over and over again wherever we use header function
//try{
//$conn = mysqli_connect('localhost', 'root', '', 'filodb') or die("problem in MySQL connection: ");
$conn = mysqli_connect("localhost:3306", "u-180023602", "CPVUCKijCBimBdz", "u_180023602_db") or die("$conn->mysqli_error");
/* check connection */
if(!$conn){
    trigger_error("<div class='$conn->mysqli_error'></div>");
}

  //  if(mysqli_connect_error()){
 //       throw new Exception(mysqli_connect_error($conn));
//}
//}

//catch(Exception $exception){
 //   print_r($exception);
//}


?>