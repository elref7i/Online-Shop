<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <center>
        <div class="main">
            <form class="container" action="insert.php" method="POST" enctype="multipart/form-data">
                <!--connect it to insert.php  -->
                <h2>Online Shop</h2>
                <img src="./onlinee.jpg" alt=" LOGO" width="400px">
                <br>
                <span class="pname">Product name</span>
                <input type="text" name='name' required>
                <br>
                <span class="pprice">Product price</span>
                <input type="text" name='price' required>
                <br>
                <span class="ddescription">Product description</span>
                <input type="text" name='description' required>
                <br>
                <input type="file" id="file" name='image' style="display:none">
                <label for="file" required>Select image for product</label>
                <button name='upload' id="btn">Upload Product</button>
                <br><br>
                <a href="products.php">Show all products</a><!--connect it to products.php  -->
            </form>
        </div>
    </center>
</body>

</html>