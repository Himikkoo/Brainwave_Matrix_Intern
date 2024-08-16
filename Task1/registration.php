<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phonenumber"];
    $DOB = $_POST["DOB"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Email Has Already Been Taken');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO celebrities (name, username, email, phone, DOB, password) VALUES('$name', '$username', '$email', '$phone', '$DOB', '$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Passwords Do Not Match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            margin: 0;
            background-image: url("plasma-turbulence-web-background-bw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
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
        .form-container input[type="email"],
        .form-container input[type="date"],
        .form-container input[type="password"],
        .form-container input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgb(215, 215, 215);
            font-size: 16px;
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
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.Ln1mA3MXm8_OIp7gL-85RAHaEK%26pid%3DApi&f=1&ipt=1092b2d2564c8ecdb853908c3383dcf0c62fb85fb707d03b81db0d9f86382872&ipo=images" alt="Registration Image">
        <h2>REGISTRATION</h2>
        <form class="form" action="" method="post" autocomplete="off">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="phonenumber">Phone no:</label>
            <input type="number" name="phonenumber" id="phonenumber" required maxlength="12">
            <label for="DOB">DOB:</label>
            <input type="date" name="DOB" id="DOB" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" name="confirmpassword" id="confirmpassword" required>
            <button type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
