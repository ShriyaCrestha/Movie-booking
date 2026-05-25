<?php
session_start();
include"db.php";
if (isset($_POST['sign-up'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $sql="INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
    if (mysqli_query($conn,$sql)){
        echo "New record created successfully";
    }else{
        echo "Error: "  . mysqli_error($conn);
    }
    if (mysqli_query($conn, $sql)){
    header("Location: login.php");
    exit();
}
}
?>

<!DOCTYPE html>
<html>
<body>
<form method="POST">
    Username: <input type="text" name="name" required><br>
    Email:    <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    phone:    <input type="number" name="phone" required><br>
    <button name="sign-up" class="btn">Sign Up</button>
</form>
</body>
</html>