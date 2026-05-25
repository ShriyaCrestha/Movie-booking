<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$result = mysqli_query($conn, "SELECT * FROM movies");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Available Movies 🎬</h1>
<a href="logout.php" class="btn">Logout</a>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='movie'>";
    echo "<h3>" . $row['name'] . "</h3>";
    echo "<p>Time: " . $row['time'] . "</p>";
    echo "<a class='btn' href='booking.php?id=" . $row['id'] . "'>Book Now</a>";
    echo "</div>";
}
?>

</body>
</html>