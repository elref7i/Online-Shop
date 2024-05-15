<?php
include ("config.php");
$ID = $_GET['id'];
$up = mysqli_query($conn, "SELECT * FROM store WHERE id=$ID");
$data = mysqli_fetch_array($up);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <title>Confirming Page</title>
    <style>
        input {
            display: none;
        }

        .main {
            width: 40%;
            box-shadow: 1px 1px 10px black;
            margin: 200px auto;
            padding: 15px;
            font-family: 'Manrope', sans-serif;
        }

        button {
            transition: 0.5s;
            border: none;
            padding: 12px;
            width: 32%;
            font-weight: bold;
            background-color: black;
            cursor: pointer;
            margin-top: 25px;
            margin-bottom: 25px;
            font-size: 17px;
            color: white;
            font-family: 'Manrope', sans-serif;
        }

        .main button:hover {
            background: rgb(131, 58, 180);
            background: linear-gradient(90deg, rgba(131, 58, 180, 1) 0%, rgba(253, 29, 29, 1) 75%, rgba(252, 176, 69, 1) 100%);
            color: #fff;
            border-radius: 5px;
            transition: 0.5s;
        }

        .bck {
            font-size: 25px;
            font-weight: bold;
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <center>
        <div class="main">
            <form action="insert-card.php" method="POST">
                <h2>Are you sure to buy this product</h2>
                <input type="text" name="name" value="<?php echo $data['name'] ?>">
                <input type="text" name="price" value="<?php echo $data['price'] ?>">
                <button name="add" type="submit"> Add to cart </button>
                <br>
                <a href="shop.php" class="bck">Back to shop</a>
            </form>
        </div>
    </center>
</body>

</html>