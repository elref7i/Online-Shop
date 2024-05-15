<?php
include ("config.php");
if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
    $IMAGE_NAME = $_FILES['image']['name'];
    $IMAGE_UP = "images/" . $IMAGE_NAME;
    $DESCRIPTION = $_POST['description'];
    $insert = "INSERT INTO store (name , price , image, description) VALUES ('$NAME','$PRICE','$IMAGE_UP','$DESCRIPTION')";
    mysqli_query($conn, $insert);
    if (move_uploaded_file($IMAGE_LOCATION, 'images/' . $IMAGE_NAME)) {
        echo "<script>alert('The product uploaded successfully');</script>";
    } else {
        echo "<script>alert('There is a problem');</script>";
    }
    header('location:/OnlineShop/products.php');
}
?>