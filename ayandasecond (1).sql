-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayandasecond`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `Id` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `ReceiverName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Street Address` varchar(300) NOT NULL,
  `Complex` varchar(50) NOT NULL,
  `Surburb` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `CellPhone` varchar(15) NOT NULL,
  `Province` varchar(10) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `UserID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--



-- --------------------------------------------------------

--
-- Table structure for table `cartt`
--

CREATE TABLE `cartt` (
  `userID` varchar(100) NOT NULL,
  `prodID` int(11) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `prodDescription` varchar(100) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodPicture` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartt`
--



-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `Email` varchar(50) NOT NULL,
  `prodID` int(11) NOT NULL,
  `prodName` varchar(50) NOT NULL,
  `prodDescription` varchar(300) NOT NULL,
  `prodPicture` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `UserID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` varchar(60) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `shipping_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--
----------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(60) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_image`, `product_desc`) VALUES
(1, 'Platter', 300, 'platter.jfif', 'A feast for the senses! This beautifully arranged selection features a medley of savory delights, perfect for sharing.'),
(2, 'Skewer', 150, 'skewer.jpg', 'A perfect balance of smoky, juicy, and char-grilled goodness! Our expertly prepared skewers feature tender, marinated meats, vibrant seasonal vegetables, and just the right touch of spices.'),
(3, 'Braai Meal', 100, 'braai.jpg', 'Fire up the flavor with our expertly grilled feast! This South African classic brings together tender, flame-kissed meats, from juicy steaks to smoky boerewors, served alongside buttery garlic bread, crisp salads, and hearty pap or chakalaka.'),
(4, 'Rice Plate', 60, 'ricemeat.jpg', 'Savory Rice & Meat Combo – A comforting classic with rich, satisfying flavors! Fluffy, perfectly steamed rice serves as the foundation for tender, slow-cooked meat, infused with aromatic spices'),
(5, 'Samoosas', 90, 'samosa.jpg', 'A golden, crunchy delight packed with bold flavors! Our perfectly fried samoosas feature a delicate, flaky pastry stuffed with a delicious blend of spiced meats or savory vegetables.'),
(6, 'Waffles', 90, 'waffles.jpg', 'Light, crispy, and irresistibly fluffy! Our freshly baked waffles are perfectly golden, with a delicate crunch on the outside and a soft, airy inside.'),
(7, 'Pancakes', 70, 'pancakes.jpg', 'Soft, golden, and melt-in-your-mouth delicious! Our perfectly crafted pancakes are light, airy, and just the right amount of buttery.'),
(8, 'Juicy T-Bone', 200, 'tbone.jpeg', 'The ultimate feast for meat lovers! Expertly grilled to perfection, our T-bone steak boasts a rich, smoky flavor with a tender filet on one side and a flavorful sirloin on the other.'),
(9, 'Classic English Breakfast', 90, 'breakfast.jpeg', 'A hearty, satisfying meal to kickstart your day! This traditional feast features crispy bacon, succulent sausages, perfectly fried eggs, golden hash browns, and buttered toast.'),
(10, 'Catering Foods', 800, 'catering.jpeg', 'A feast for every occasion! Our catering selection offers a diverse range of freshly prepared dishes, crafted to satisfy every taste. From elegant platters and sizzling skewers to hearty braai meals, delicate pastries, and indulgent desserts, we bring the perfect balance of flavor and presentation t');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Email` varchar(30) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone number` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `fk_user_address` (`Email`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD UNIQUE KEY `prodID` (`prodID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_user_orders` (`Email`),
  ADD KEY `fk_shipping_address` (`shipping_address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_user_address` FOREIGN KEY (`Email`) REFERENCES `userinfo` (`Email`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_shipping_address` FOREIGN KEY (`shipping_address_id`) REFERENCES `addresses` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_orders` FOREIGN KEY (`Email`) REFERENCES `userinfo` (`Email`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
