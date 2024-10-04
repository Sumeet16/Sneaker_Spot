-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2024 at 09:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakerSpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

CREATE TABLE `sneakers` (
  `SneakerID` int(11) NOT NULL,
  `SneakerName` varchar(255) NOT NULL,
  `SneakerDescription` text NOT NULL,
  `QuantityAvailable` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `ProductAddedBy` varchar(50) DEFAULT 'Sumeet Yadav'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`SneakerID`, `SneakerName`, `SneakerDescription`, `QuantityAvailable`, `Price`, `Size`, `ProductAddedBy`) VALUES
(1, 'Air Max 270', 'The Nike Air Max 270 features a large Air unit for maximum cushioning and a sleek design.', 10, 150.00, '10', 'Sumeet Yadav'),
(2, 'Adidas Ultraboost 21', 'The Adidas Ultraboost 21 offers unbeatable comfort with a responsive Boost midsole.', 15, 180.00, '9.5', 'Sumeet Yadav'),
(3, 'Puma RS-X', 'The Puma RS-X is a retro-inspired sneaker with bold colorways and a chunky silhouette.', 8, 120.00, '11', 'Sumeet Yadav'),
(4, 'New Balance 574', 'The New Balance 574 combines classic styling with modern comfort for a versatile sneaker.', 20, 90.00, '10.5', 'Sumeet Yadav'),
(5, 'Converse Chuck Taylor All Star', 'The classic Converse Chuck Taylor, perfect for casual wear and a timeless look.', 25, 60.00, '9', 'Sumeet Yadav'),
(6, 'Vans Old Skool', 'The Vans Old Skool is a skate classic with durable materials and a stylish design.', 30, 70.00, '8.5', 'Sumeet Yadav'),
(7, 'Nike Air Jordan 1', 'The iconic Air Jordan 1 combines basketball style with streetwear flair.', 5, 200.00, '12', 'Sumeet Yadav'),
(8, 'Reebok Club C 85', 'The Reebok Club C 85 is a retro sneaker that offers a clean, classic look.', 12, 75.00, '9', 'Sumeet Yadav'),
(10, 'Hoka One One Bondi 7', 'The Hoka One One Bondi 7 features maximal cushioning and a comfortable ride for everyday use.', 9, 140.00, '10', 'Sumeet Yadav'),
(11, 'Air Max 2755', 'The Nike Air Max 270 features a large Air unit for maximum cushioning and a sleek design.', 177, 150.00, '10', 'Sumeet Yadav'),
(13, 'dum1', 'sss', 1, 11.00, 'M', 'Sumeet Yadav'),
(14, 'dum1', 'sss', 1, 11.00, 'M', 'Sumeet Yadav');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`SneakerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `SneakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
