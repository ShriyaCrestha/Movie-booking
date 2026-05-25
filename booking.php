<?php
session_start();
include "db.php";

if(!isset($_SESSION['email'])){
    echo "Please login first";
    exit();
}

if(isset($_POST['movie'])){
    $email = $_SESSION['email'];
    $movie = $_POST['movie'];

    $sql = "INSERT INTO booking (email, movie) VALUES ('$email', '$movie')";
    mysqli_query($conn, $sql);

    echo "Booking successful for: " . $movie;
}
?>