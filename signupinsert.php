<?php
include("config.php");
if (isset($_POST['signup'])) {
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $insert = "INSERT INTO users (username , email , password) VALUES ('$Username','$Email','$Password')";
    mysqli_query($conn, $insert);
    header('location:/OnlineShop/login.php');
}
?>