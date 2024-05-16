<?php
include ("config.php");
if (isset($_POST["add"])) {
    $NAME = $_POST["name"];
    $PRICE = $_POST["price"];
    $DESCRIPTION = $_POST['description'];
    $insert = "INSERT INTO addcartt (name , price , description) VALUES ('$NAME','$PRICE','$DESCRIPTION')";
    mysqli_query($conn, $insert);
    header('location:/OnlineShop/card.php');
}
?>