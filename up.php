<?php
include("config.php");
if (isset($_POST['update'])) {
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
    $IMAGE_NAME = $_FILES['image']['name'];
    $IMAGE_UP = "images/" . $IMAGE_NAME;
    // Check if an image is uploaded
    if (!empty($IMAGE_NAME)) {
        if (move_uploaded_file($IMAGE_LOCATION, 'images/' . $IMAGE_NAME)) {
            // Update the database only if image upload is successful
            $update = "UPDATE store SET name ='$NAME' , price='$PRICE', image='$IMAGE_UP'WHERE id=$ID ";
            mysqli_query($conn, $update);
            echo "<script>alert('The product Updated successfully')</script>";
        } else {
            echo "<script>alert('There is a problem uploading the image')</script>";
        }
    } else {
        // Update the database without changing the image path
        $update = "UPDATE store SET name ='$NAME' , price='$PRICE' WHERE id=$ID ";
        mysqli_query($conn, $update);
        echo "<script>alert('The product Updated successfully without changing the image')</script>";
    }
    header('location:/OnlineShop/products.php');
}
?> 