<?php
include 'db.php';

$movie_id = $_POST['movie_id'];
$seat = $_POST['seat'];
$name = $_POST['user_name'];

mysqli_query($conn, "INSERT INTO bookings (movie_id, seat, user_name)
VALUES ('$movie_id', '$seat', '$name')");

echo "<h2>🎉 Booking Successful!</h2>";
?>