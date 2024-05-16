<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <style>
        h3 {
            margin-bottom: 30px;
        }

        main {
            width: 45%;
            margin: 0 auto;
        }

        body {
            margin-top: 70px;
            font-family: 'Manrope', sans-serif;
            font-weight: bold;
        }

        table {
            box-shadow: 1px 1px 10px black;
        }

        .th {
            background-color: #BFB9B7 !important;
            color: black;
            text-align: center;
        }

        tbody {
            text-align: center;
        }

        .bckk {
            text-decoration: none;
            font-size: 25px;
            font-weight: bold;
            margin-top: 30px;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h3>Your Cart</h3>
    </center>
    <main>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col' class='th'>Product Name</th>
                    <th scope='col' class='th'>Product Price</th>
                    <th scope='col' class='th'>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("config.php");
                $result = mysqli_query($conn, "SELECT * FROM addcartt");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>$row[name]</td>
                            <td>$row[price]</td>
                            <td><a href='del-card.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <center>
        <a href="shop.php" class='bckk'>Back To Shop</a>
    </center>
</body>

</html>