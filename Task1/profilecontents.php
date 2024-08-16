<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM celebrities WHERE ID = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: home1.php");
}

if(isset($_POST["submit"])){
  $password = $_POST["password"];
  $newpassword = $_POST["newpassword"];
  $confirmnewpassword = $_POST["confirmnewpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
  $row = mysqli_fetch_assoc($duplicate);
  if(mysqli_num_rows($duplicate) > 0){
    if($password == $row['password']){
        if($newpassword == $confirmnewpassword){
            $query = "UPDATE celebrities SET password = '$newpassword' WHERE id = '$id';";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Password changed successfully'); </script>";
          }
          else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
          }
    }
    else{
      echo
      "<script>alert('Wrong password')</script>";
    }
  }
  else{
    echo
    "<script> alert('Wrong Password'); </script>";
  }
}

if(isset($_POST["nsubmit"])){
    $name = $_POST["newname"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
    $row = mysqli_fetch_assoc($duplicate);
    if(mysqli_num_rows($duplicate) > 0){
      $query = "UPDATE celebrities SET name = '$name' WHERE id = '$id';";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Name changed successfully'); </script>";}
    /*$username = $_POST["newusername"];
    $email = $_POST["newemail"];
    $phonenumber = $_POST["newphonenumber"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
    $row = mysqli_fetch_assoc($duplicate);
    if(mysqli_num_rows($duplicate) > 0){
        $query = "UPDATE celebrities SET name = '$name', username = '$username', email = '$email', phone = '$phonenumber' WHERE id = '$id'";
        echo
        "<script> alert('Details changed successfully'); </script>";
    }*/
}
if(isset($_POST["nsubmit"])){
  $name = $_POST["newname"];
  $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
  $row = mysqli_fetch_assoc($duplicate);
  if(mysqli_num_rows($duplicate) > 0){
    $query = "UPDATE celebrities SET name = '$name' WHERE id = '$id';";
    mysqli_query($conn, $query);
    echo
    "<script> alert('Name changed successfully'); </script>";}}

if(isset($_POST["usubmit"])){
    $username = $_POST["newusername"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
    $row = mysqli_fetch_assoc($duplicate);
    if(mysqli_num_rows($duplicate) > 0){
      $query = "UPDATE celebrities SET username = '$username' WHERE id = '$id';";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Username changed successfully'); </script>";}}

if(isset($_POST["esubmit"])){
    $email = $_POST["newemail"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
    $row = mysqli_fetch_assoc($duplicate);
    if(mysqli_num_rows($duplicate) > 0){
      $query = "UPDATE celebrities SET email = '$email' WHERE id = '$id';";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Email changed successfully'); </script>";}}

if(isset($_POST["psubmit"])){
    $phonenumber = $_POST["newphonenumber"];
    $duplicate = mysqli_query($conn, "SELECT * FROM celebrities WHERE id = '$id'");
    $row = mysqli_fetch_assoc($duplicate);
    if(mysqli_num_rows($duplicate) > 0){
      $query = "UPDATE celebrities SET phone = '$phonenumber' WHERE id = '$id';";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Phone number changed successfully'); </script>";}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            font-size: 22px;
            color: black;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 30px;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        td {
            padding: 15px;
            vertical-align: top;
        }

        input, button {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px 0;
            width: calc(100% - 22px); /* Adjust width to account for padding */
            box-sizing: border-box;
        }

        button {
            background-color: lightgray;
            cursor: pointer;
        }

        button:hover {
            color: white;
            background-color: gray;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        .btn1 {
            font-size: 15px;
            border-radius: 8px;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            width: 200px;
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<body>


    <div>
        <h1>PERSONAL INFORMATION</h1>
        <br>
        <center>
            <table>
                <tr>
                    <td>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="id">User ID:</label>
                            <input type="text" name="id" id="id" required value="" disabled placeholder="<?php echo htmlspecialchars($row['id']); ?>">
                        </form>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="newname">Name:</label>
                            <input type="text" name="newname" id="newname" required value="" placeholder="<?php echo htmlspecialchars($row['name']); ?>">
                            <button class="btn1" type="submit" name="nsubmit">Save</button>
                        </form>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="newusername">Username:</label>
                            <input type="text" name="newusername" id="newusername" required value="" placeholder="<?php echo htmlspecialchars($row['username']); ?>">
                            <button class="btn1" type="submit" name="usubmit">Save</button>
                        </form>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="newemail">Email:</label>
                            <input type="email" name="newemail" id="newemail" required value="" placeholder="<?php echo htmlspecialchars($row['email']); ?>">
                            <button class="btn1" type="submit" name="esubmit">Save</button>
                        </form>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="newphonenumber">Phone no:</label>
                            <input type="number" name="newphonenumber" id="newphonenumber" required value="" maxlength="12" placeholder="<?php echo htmlspecialchars($row['phone']); ?>">
                            <button class="btn1" type="submit" name="psubmit">Save</button>
                        </form>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="DOB">DOB:</label>
                            <input type="date" name="DOB" id="DOB" required value="" placeholder="<?php echo htmlspecialchars($row['DOB']); ?>">
                        </form>
                        <br>
                        <h3>CHANGE PASSWORD</h3>
                        <br>
                        <form class="form" action="" method="post" autocomplete="off">
                            <label for="password">Old Password:</label>
                            <input type="password" name="password" id="password" required value="">
                            <br>
                            <label for="newpassword">New Password:</label>
                            <input type="password" name="newpassword" id="newpassword" required value="">
                            <br>
                            <label for="confirmnewpassword">Confirm New Password:</label>
                            <input type="password" name="confirmnewpassword" id="confirmnewpassword" required value="">
                            <br>
                            <br>
                            <button type="submit" name="submit" style="width:50%;">Change password</button>
                        </form>
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>
</html>
