<?php
session_start();
include "db.php";

if(!isset($_SESSION['email'])){
    echo "Please login first";
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM booking WHERE email='$email'";
$result = mysqli_query($conn, $sql);
?>

<h2>My Bookings</h2>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
    <div>
        <p>Movie: <?php echo $row['movie']; ?></p>
    </div>
<?php
}
?>