<?php
include("config.php");
$ID = $_GET['id'];
// data, up -> for remaining products
// data2, up2 -> for container
$up = mysqli_query($conn, "SELECT * FROM store WHERE id != $ID");
$data = mysqli_fetch_array($up);
$up2 = mysqli_query($conn, "SELECT * FROM store WHERE id = $ID");
$data2 = mysqli_fetch_array($up2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            display: block;
            margin: 0 auto; 
        }

        h2 {
            margin-top: 0;
            color: #333;
            font-size: 24px;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .rem-h3{
            margin-bottom:-20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn:focus {
            outline: none;
        }

        .btn-secondary {
            background-color: #3498db;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary:hover {
            background-color: #2980b9;
        }

        .btn-cta {
            background-color: #ff5722;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-cta:hover {
            background-color: #f44336;
        }

        .product-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .product {
            width: calc(50% - 5px); 
            height: 300px; 
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            margin-right: 5px;
        }
        .product a{
            max-width: 100%;
            max-height: 100%;
        }

        .product a img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .price-box {
            background-color: #f2f2f2;
            padding: 5px 10px;
            border-radius: 4px;
            color: #333;
            margin-bottom: 50px;
            margin-top:25px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Main product details -->
        <?php if (isset($data2['image'])) : ?>
            <img src="<?php echo $data2['image']; ?>" alt="Photo">
        <?php endif; ?>

        <?php if (isset($data2['price'])) : ?>
            <h2>Price: <?php echo $data2['price']; ?></h2>
        <?php endif; ?>

        <?php if (isset($data2['description'])) : ?>
            <p><?php echo $data2['description']; ?></p>
        <?php endif; ?>

        <!-- Button container -->
        <div class="btn-container">
            <a href="shop.php" class="btn btn-secondary">Back to Shop</a>
            <a href="val.php?id=<?php echo $data2['id']; ?>" class="btn btn-cta">Add to Cart</a>
        </div>
    </div>
    <div class="remaining-products-container">
        <h3 class = "rem-h3">Another Products</h3>
        <?php
        mysqli_data_seek($up, 0);

        $counter = 0;

        while ($product = mysqli_fetch_array($up)) :
            ?>
            <?php if ($counter % 2 == 0) : ?>
                <div class="product-container">
            <?php endif; ?>
            <div class="product">
                <?php if (isset($product['image'])) : ?>
                    <a href='details.php?id=<?php echo $product['id']; ?>'>
                        <img src="<?php echo $product['image']; ?>" alt="Photo">
                    </a>
                <?php endif; ?>

                <?php if (isset($product['price'])) : ?>
                    <div class="price-box">Price: <?php echo $product['price']; ?></div>
                <?php endif; ?>
            </div>
            <?php if ($counter % 2 != 0 || $counter == mysqli_num_rows($up) - 1) : ?>
                </div>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </div>
</body>
</html>
