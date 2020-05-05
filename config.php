<?php
//MYSQL connection

//$hostname = "http://localhost/news-template"; //No need to type in this adress over and over again wherever we use header function
$hostname = "https://180023602.cs2410-web01pvm.aston.ac.uk/news-template/"; //No need to type in this adress over and over again wherever we use header function

//$conn = mysqli_connect('localhost', 'root', '', 'filodb') or die("problem in MySQL connection: ");
//$conn = mysqli_connect('localhost', 'u-180023602', 'CPVUCKijCBimBdz', 'u_180023602_db') or die("problem in MySQL connection: ");
$conn = mysqli_connect("localhost:3306", "u-180023602", "CPVUCKijCBimBdz", "u_180023602_db") or die("$conn->mysqli_error");

if(!$conn){
    print "<div class='$conn->mysqli_error'></div>";
}

?>