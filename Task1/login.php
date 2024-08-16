<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM celebrities WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: home.php");
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            background-image: url("plasma-turbulence-web-background-bw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .form-container h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgb(215, 215, 215);
        }
        .form-container button {
            background-color: grey;
            border: none;
            border-radius: 8px;
            width: 100%;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .form-container button:hover {
            background-color: #555555;
            color: black;
        }
        .form-container p {
            margin-top: 20px;
            color: black;
        }
        .form-container a {
            color: #2196F3;
            text-decoration: none;
            font-weight: bold;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.nuhj7Xd4kXE-fezctJ7yTAHaEY%26pid%3DApi&f=1&ipt=40f388fed223097dfceea621b361cc053bfc51c48d56b60985c96b34b27fa0cc&ipo=images" alt="Login Image">
        <h2>LOGIN</h2>
        <form class="form" action="" method="post" autocomplete="off">
            <label for="usernameemail">Username or Email:</label>
            <input type="text" name="usernameemail" id="usernameemail" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="submit">Login</button>
            <p>Don't have an account? <a href="registration.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
