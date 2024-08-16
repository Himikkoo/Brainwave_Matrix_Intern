<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: whitesmoke;
            color: #000;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            padding: 60px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }

        .form h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="number"],
        .form input[type="date"],
        .form input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form button {
            background-color: rgb(47, 47, 47);
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        .form button:hover {
            background-color: #555555;
            transform: scale(1.05);
        }

        .form p {
            font-size: 16px;
            margin-top: 20px;
        }

        .form a {
            color: #2196F3;
            text-decoration: none;
            font-weight: bold;
        }

        .form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form class="form" action="" method="post" autocomplete="off">
            <h2>REGISTRATION</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="phonenumber">Phone No:</label>
            <input type="number" name="phonenumber" id="phonenumber" required maxlength="12">

            <label for="DOB">Date of Birth:</label>
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
