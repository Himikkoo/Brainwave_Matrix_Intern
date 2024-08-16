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
  $assetid = $_POST["assetid"];
  $collectionid = $_POST["collectionid"];
  $price = $_POST["price"];
  $auction= $_POST["auction"];
  $time = $_POST["time"];
  $query = "INSERT INTO sales VALUES('$id','$assetid','$collectionid','$price','$auction','$time')";
  mysqli_query($conn, $query);
  echo "<script> alert('successfully selled your collection !'); </script>";
  $que= "UPDATE collection SET id=null WHERE collection_id=$collectionid";
  mysqli_query($conn, $que);
}
?>

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

h2 {
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

</style>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Asset</title>
    <style>
        /* Include the CSS here or in an external stylesheet */
    </style>
</head>
<body>
    <div>
        <h2>SELL</h2>
        <p>Sell your works or assets you own here!</p>
        <center>
            <table>
                <form class="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <label for="name">ID:</label>
                            <input type="number" name="name" id="name" required value="<?php echo htmlspecialchars($row['id']); ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="assetid">Asset ID:</label>
                            <input type="number" name="assetid" id="assetid" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="collectionid">Collection ID:</label>
                            <input type="number" name="collectionid" id="collectionid" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" required maxlength="12">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="auction">Auction type:</label>
                            <input type="text" name="auction" id="auction" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="time">Time:</label>
                            <input type="time" name="time" id="time" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="profile_image">Upload Your Image:</label>
                            <input type="file" name="profile_image" id="profile_image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit" style="width:100%;">Confirm sell</button>
                        </td>
                    </tr>
                </form>
            </table>
        </center>
    </div>
</body>
</html>