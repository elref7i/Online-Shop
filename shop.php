<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <style>
        h3 {
            font-family: 'Manrope', sans-serif;
            font-weight: bold;
            margin-top: 35px;
            color: #333; 
        }

        .container {
            margin-right: 40px;
        }

        .card {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            transition: box-shadow 0.3s ease; 
        }

        .card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 
        }

        .card img {
            width: 100%;
            height: 200px;
            border-radius: 8px 8px 0 0; 
            transition: filter 0.3s ease; 
        }

        .card:hover img {
            filter: brightness(70%); 
        }

        .img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); 
            color: #fff; 
            opacity: 0; 
            transition: opacity 0.3s ease; 
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .card:hover .img-overlay {
            opacity: 1; 
        }

        .img-overlay h5 {
            margin-bottom: 10px;
        }

        .img-overlay p {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #28a745; 
            border: none;
            transition: background-color 0.3s ease; 
        }
        .btn:hover {
            background-color: #218838; 
            color: #fff; 
        }

        .navbar-brand {
            margin-left: 20px;
            text-decoration: none;
            color: #fff; 
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="card.php">My Cart🛒</a>
    </nav>
    <center>
        <h3>All Available Products</h3>
    </center>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            include("config.php");
            $result = mysqli_query($conn, "SELECT * FROM store");
            $counter = 0;
            while ($row = mysqli_fetch_array($result)) {
                if ($counter % 3 == 0) {
                    echo "<div class='row'>";
                }
                echo "
                <div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                            <a href='details.php?id=$row[id]'>
                            <div class='img-container position-relative'>
                                <img src='$row[image]' class='card-img-top'>
                                <div class='img-overlay'>
                                    <h5>ShowDetails</h5>
                                </div>
                            </div>
                        </a>
                        <div class='card-body'>
                            <h5 class='card-name'>$row[name]</h5>
                            <p class='card-price'>$row[price]</p>
                            <div class='d-flex justify-content-around'>
                                <a href='val.php?id=$row[id]' class='btn btn-success'> Add to cart </a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                if ($counter % 3 == 2) {
                    echo "</div>";
                }
                $counter++;
            }
            if ($counter % 3 != 0) {
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>