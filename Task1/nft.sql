-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 08:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nft`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `celebrities`
--

CREATE TABLE `celebrities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `celebrities`
--

INSERT INTO `celebrities` (`id`, `name`, `username`, `email`, `phone`, `DOB`, `password`) VALUES
(6, 'allen', 'allen', 'alla@gmail.com', 0, '0000-00-00', '123'),
(11, 'sivanesh', 'himmiko', 'him@gmail.com', 1234567898, '0000-00-00', '1234'),
(12, 'sachin', 'saraas', 'sachin@gmail.com', 1234567894, '2022-12-01', '1234'),
(16, 'Lakshmi', 'lakanna', 'lakanna@gmail.com', 2147483647, '2022-12-01', 'harish'),
(17, 'lokesh', 'thanos', 'sivaneshk@gmail.com', 123456789, '2022-12-02', 'sivanesh'),
(18, 'sarasa', 'sachin', 'macbooknoobsachin@gmail.com', 123568945, '2022-05-12', 'lokesh'),
(19, 'Vinoth Kumar', 'Vinoth123', 'vinoth123@gmail.com', 456123789, '2024-07-30', '123');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) DEFAULT NULL,
  `collection_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `collection_id`, `name`, `url`, `type`) VALUES
(15, 4, 'mucoll', 'dfjdddfd', 'music'),
(NULL, 5, 'BENESDF', 'SDFDFR', 'PHOTO'),
(11, 6, 'php', 'nothinghere.come', 'album'),
(NULL, 12, 'mysql', 'helloworld', 'music'),
(NULL, 1003, 'CoolCats', 'http://localhost/NFT/nft2.webp', 'Photography'),
(NULL, 1004, 'Beanz', 'http://localhost/NFT/nft22.webp', 'Drawings'),
(NULL, 1005, 'CryptoDickbutt S3', 'http://localhost/NFT/nft3.webp', 'Collectibles'),
(NULL, 1006, 'CloneX', 'http://localhost/NFT/nft33.webp', 'Utility'),
(11, 1008, 'nikon', 'landscapethings', 'photo'),
(NULL, 1013, 'Oxymons.Xyz', 'http://localhost/NFT/nft1.webp', 'Drawings'),
(NULL, 1014, 'CloneX', 'http://localhost/NFT/nft1.webp', 'Utility'),
(NULL, 1015, 'CoolCats', 'http://localhost/NFT/nft1.webp', 'Photography'),
(17, 1016, 'CryptoDickbutt S3', 'http://localhost/NFT/nft1.webp', 'Collectibles'),
(11, 1017, 'CryptoDickbutt S3', 'http://localhost/NFT/nft1.webp', 'Collectibles'),
(NULL, 1018, 'Oxymons.Xyz', 'http://localhost/NFT/nft1.webp', 'Drawings'),
(NULL, 1019, 'Beanz', 'http://localhost/NFT/nft1.webp', 'Drawings'),
(11, 1020, 'Cryptokitties', 'http://localhost/NFT/nft1.webp', 'Music'),
(11, 1021, 'CloneX', 'http://localhost/NFT/nft1.webp', 'Utility'),
(NULL, 1022, 'CryptoDickbutt S3', 'http://localhost/NFT/nft1.webp', 'Collectibles');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `auction_type` varchar(50) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `asset_id`, `collection_id`, `price`, `auction_type`, `time`) VALUES
(17, 12, 5, 332132, 'live', '03:28:00'),
(17, 12, 4, 123465, 'live', '22:35:00'),
(11, 78, 5, 778, 'PEP', '01:53:00'),
(17, 513, 1008, 213, 'fjfkldf', '17:42:00'),
(17, 1008, 1008, 5213, 'sifhoe', '14:18:00'),
(17, 4, 1014, 53, 'livee', '14:38:00'),
(17, 8, 1014, 123, 'jg', '17:36:00'),
(17, 789, 1014, 123, 'live', '14:43:00'),
(17, 21, 1015, 89, 'jcscs', '14:44:00'),
(11, 12, 1019, 2546, '21', '14:47:00'),
(11, 12, 1018, 25, 'dvae', '14:48:00'),
(11, 12, 1022, 500, 'live', '15:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `asse` (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD KEY `buy` (`id`);

--
-- Indexes for table `celebrities`
--
ALTER TABLE `celebrities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DOB` (`DOB`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`),
  ADD KEY `coll` (`id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD KEY `org` (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD KEY `buyer` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `celebrities`
--
ALTER TABLE `celebrities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `asse` FOREIGN KEY (`id`) REFERENCES `celebrities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buy` FOREIGN KEY (`id`) REFERENCES `celebrities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizer`
--
ALTER TABLE `organizer`
  ADD CONSTRAINT `org` FOREIGN KEY (`id`) REFERENCES `celebrities` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `buyer` FOREIGN KEY (`id`) REFERENCES `celebrities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
