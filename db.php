<?php
$host="localhost";
$user="root";
$pass="";
$dbname="movie";
$conn = mysqli_connect($host, $user, $pass, $dbname); 
if(!$conn){
    die("Connection Failed!");
}
?>