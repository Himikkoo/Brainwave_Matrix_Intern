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
    <title>NFT Home</title>
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

        .blink {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
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
            <a href="profile.php">CREATE</a>
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
        <h1>Explore, collect and sell NFTs</h1>
        <p class="section-title">Top NFT collections</p>
        <table>
            <tr>
                <td><a href="market.php"><img src="https://admin.nft-stats.com/assets/9318776f-aaad-4eb1-8a69-ebefacfb4f69?width=600&height=600&fit=inside" alt="NFT Collection 1"></a></td>
                <td><a href="market.php"><img src="https://openseauserdata.com/files/2ddf0b3e6e7a06cacddd1c2a3439b251.svg" alt="NFT Collection 2"></a></td>
                <td><a href="market.php"><img src="https://i.seadn.io/gcs/files/8df17a4820164e17cf825ce876eaba8e.png?w=500&auto=format" alt="NFT Collection 3"></a></td>
            </tr>
        </table>

        <p class="section-title blink">Live and upcoming AUCTIONS</p>
        <a href="market.php"><button class="btn-explore">Explore market place</button></a>

        <p class="section-title">Browse by Category</p>
        <table>
            <tr>
                <td><a href="market.php"><img src="art.webp" alt="Art"></a><a href="market.php">ART</a></td>
                <td><a href="market.php"><img src="music.webp" alt="Music"></a><a href="market.php">MUSIC</a></td>
                <td><a href="market.php"><img src="photography-category.webp" alt="Photography"></a><a href="market.php">PHOTOGRAPHY</a></td>
            </tr>
            <tr>
                <td><a href="market.php"><img src="collectibles.webp" alt="Collectibles"></a><a href="market.php">COLLECTIBLES</a></td>
                <td><a href="market.php"><img src="trading-cards.webp" alt="Trading Cards"></a><a href="market.php">TRADING CARDS</a></td>
                <td><a href="market.php"><img src="utility.webp" alt="Utility"></a><a href="market.php">UTILITY</a></td>
            </tr>
            <tr>
                <td><a href="market.php"><img src="domain-names.webp" alt="Domain Names"></a><a href="market.php">DOMAIN NAMES</a></td>
                <td><a href="market.php"><img src="sports.webp" alt="Sports"></a><a href="market.php">SPORTS</a></td>
                <td><a href="market.php"><img src="virtual-worlds.webp" alt="Virtual Worlds"></a><a href="market.php">VIRTUAL WORLDS</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
