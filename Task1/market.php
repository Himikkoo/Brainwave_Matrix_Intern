<?php
require 'config.php';
session_start();
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM celebrities WHERE ID = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: home1.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: whitesmoke;
            color: #000;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px 40px;
            background: darkgray;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header .logo img {
            height: 50px;
            width: auto;
            cursor: pointer;
        }

        .header input[type="text"] {
            flex-grow: 1;
            margin: 0 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgb(215, 215, 215);
            font-size: 16px;
        }

        .header .navbar a {
            margin: 0 15px;
            font-size: 18px;
            color: black;
            text-decoration: none;
            font-weight: 500;
        }

        .header .navbar a:hover {
            color: gainsboro;
        }

        .header button {
            background-color: white;
            color: black;
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #555555;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .header button:hover {
            background-color: #555555;
            color: white;
        }

        .content {
            padding-top: 120px;
            text-align: center;
        }

        .content h1 {
            font-size: 50px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin-bottom: 40px;
        }

        .content p.section-title {
            font-size: 28px;
            margin: 40px 0 20px;
            font-weight: bold;
        }

        .content table {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .content td {
            text-align: center;
            padding: 20px;
        }

        .content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .content img:hover {
            transform: scale(1.05);
        }

        .btn-explore {
            background-color: rgb(47, 47, 47);
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-explore:hover {
            background-color: #555555;
            transform: scale(1.05);
        }

        .content a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-top: 10px;
            transition: color 0.3s;
        }

        .content a:hover {
            color: #2196F3;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: lightgray;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 1;
            font-size: 14px;
        }

        .dropdown-content a {
            font-size: medium;
            line-height: 35px;
            text-decoration: none;
            display: block;
            color: black;
            padding: 8px 12px;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown span {
            font-family: 'Poppins', sans-serif;
        }

        .filter-container {
            text-align: center;
            margin: 40px 0;
        }

        .filter-container .btn {
            background-color: rgb(47, 47, 47);
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin: 5px;
        }

        .filter-container .btn:hover {
            background-color: #555555;
            transform: scale(1.05);
        }

        .table2 {
            border: groove;
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
        }

        .table2 td, .table2 th {
            padding: 10px;
            text-align: center;
        }

        .table2 th {
            background-color: #f2f2f2;
        }

        button {
            background-color: lightgray;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo" onclick="window.location.href='home.php'">
            <img src="logo.png" alt="Logo">
        </div>
        <input type="text" placeholder="Search items, collections and accounts">
        <nav class="navbar">
            <a href="market.php">EXPLORE</a>
            <a href="sell.php">CREATE</a>
            <div class="dropdown">
                <span>Hello, <?php echo htmlspecialchars($row['name']); ?>!</span>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="logout.php" onclick="alert('Logged out successfully')">Log out</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="content">
        <h1>Explore market place</h1>
        <div class="filter-container">
            <button class="btn" onclick="filterSelection('all')">Show all</button>
            <button class="btn" onclick="filterSelection('arts')">Arts</button>
            <button class="btn" onclick="filterSelection('music')">Music</button>
            <button class="btn" onclick="filterSelection('photography')">Photography</button>
            <button class="btn" onclick="filterSelection('trading cards')">Trading cards</button>
        </div>

        <table>
            <form method="post">
                <tr>
                    <td class="row music"><a href="#"><img src="nft1.webp" alt="NFT 1"><img src="nft11.webp" alt="NFT 11"></a></td>
                    <td class="row arts"><a href="#"><img src="nft2.webp" alt="NFT 2"><img src="nft22.webp" alt="NFT 22"></a></td>
                    <td class="row photography"><a href="#"><img src="nft3.webp" alt="NFT 3"><img src="nft33.webp" alt="NFT 33"></a></td>
                </tr>
                <tr>
                    <td class="row music"><a href="#">Oxymons.xyz<br><br><span style="font-size: 14px; color: darkgray;">starting bids :</span><br><span style="font-size: 14px; color: darkgray;">Ends in :</span></a><br><br><button type="submit" name="submita" value="submita">BUY</button></td>
                    <td class="row arts"><a href="#">Oxymons.xyz<br><br><span style="font-size: 14px; color: darkgray;">starting bids :</span><br><span style="font-size: 14px; color: darkgray;">Ends in :</span></a><br><br><button type="submit" name="submitb" value="submitb">BUY</button></td>
                    <td class="row photography"><a href="#">Oxymons.xyz<br><br><span style="font-size: 14px; color: darkgray;">starting bids :</span><br><span style="font-size: 14px; color: darkgray;">Ends in :</span></a><br><br><button type="submit" name="submitc" value="submitc">BUY</button></td>
                </tr>
            </form>
        </table>

        <p class="section-title">ONGOING AUCTIONS</p>
        <table class="table2">
            <form method="post">
                <tr>
                    <th>Asset id</th>
                    <th>Collection id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>URL</th>
                    <th>Auction Type</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php
                $duplicate = mysqli_query($conn, "SELECT asset_id, collection_id, price, auction_type, time FROM sales");
                if (mysqli_num_rows($duplicate) > 0) {
                    while ($row = mysqli_fetch_assoc($duplicate)) {
                        $cole = $row['collection_id'];
                        $coll = mysqli_query($conn, "SELECT * FROM collection WHERE collection_id ='$cole'");
                        $row1 = mysqli_fetch_assoc($coll);
                        echo "<tr>
                            <td>{$row['asset_id']}</td>
                            <td>{$row['collection_id']}</td>
                            <td>{$row1['name']}</td>
                            <td>{$row1['type']}</td>
                            <td>{$row1['url']}</td>
                            <td>{$row['auction_type']}</td>
                            <td>{$row['time']}</td>
                            <td>{$row['price']}</td>
                            <td><button type='submit' name='BUY' value='BUY'>BUY</button></td>
                        </tr>";
                    }
                }
                ?>
            </form>
        </table>
    </div>

    <script>
        function filterSelection(category) {
            var x, i;
            x = document.getElementsByClassName("row");
            if (category == "all") category = "";
            for (i = 0; i < x.length; i++) {
                RemoveClass(x[i], "show");
                if (x[i].className.indexOf(category) > -1) AddClass(x[i], "show");
            }
        }

        function AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }
    </script>
</body>
</html>
