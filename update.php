<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include("config.php");
    $ID = $_GET['id'];
    $up = mysqli_query($conn, "SELECT * FROM store WHERE id=$ID");
    $data = mysqli_fetch_array($up);
    ?>
    <center>
        <div class="main">
            <form action="up.php" method="POST" enctype="multipart/form-data"> <!--connect it to insert.php  -->
                <h2>Update Products</h2>
                <span class="idnameprice">Id</span>
                <input type="text" name='id' value='<?php echo $data['id'] ?>'>
                <br>
                <span class="idnameprice">Name</span>
                <input type="text" name='name' value='<?php echo $data['name'] ?>'>
                <br>
                <span class="idnameprice">Price</span>
                <input type="text" name='price' value='<?php echo $data['price'] ?>'>
                <br>
                <input type="file" id="file" name='image' value='<?php echo $data['image'] ?>' style="display:none">
                <label for="file">Update image for product</label>
                <button name='update' type='submit'>Update Product</button>
                <br><br>
                <a href="products.php">Show all products</a><!--connect it to products.php  -->
            </form>
        </div>
    </center>
</body>

</html>