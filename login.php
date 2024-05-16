<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background-color: #f4f4f4;
        }

        .login-container {
            width: 15%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 90%;
            padding: 8px;
            font-size: 16px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background: rgb(132, 59, 180);
            background: linear-gradient(90deg, rgba(131, 58, 180, 1) 0%, rgba(253, 29, 29, 1) 75%, rgba(252, 176, 69, 1) 100%);
            color: #fff;
            border-radius: 2px;
            transition: 0.3s;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }

        .signup-link a {
            text-decoration: none;
            color: #333;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    include("config.php");
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $role = $row["role"];
            if ($role == "admin") {
                header("Location: /OnlineShop/admin.php");
            } else {
                header("Location: /OnlineShop/shop.php");
            }
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
        $conn->close();
    }
    ?>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>

</html>