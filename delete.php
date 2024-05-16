<?php
include("config.php");
$ID = $_GET['id'];
mysqli_query($conn, "DELETE FROM store WHERE id=$ID");
header("location:/OnlineShop/products.php");
?>