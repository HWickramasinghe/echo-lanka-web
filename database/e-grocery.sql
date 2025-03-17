-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 02:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`) VALUES
(1, 'Hashi', 'hashi', 'hashi1234'),
(1, 'Hashi', 'hashi', 'hashi1234');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `unit` char(10) DEFAULT NULL,
  `remain` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `unit`, `remain`) VALUES
('apple', 'apple.jpg', 'Apple', 'Imported from New Zeland', 200, '*kg', 20),
('bCumin', 'bCumin.jpg', 'Black Cumin', 'New Stock', 120, '100gm', 10),
('beef', 'Beef.jpg', 'Beef', 'Fresh organic beef Available!!', 2500, 'kg', 5),
('bgourd', 'bgourd.jpg', 'Bitter gourd', 'fresh farm vegetable from walimada', 200, '*kg', 20),
('Cabbage', 'Badhacopi.jpeg', 'cabbage', 'fresh farm vegetable from Walimada ', 45, 'Kg', 60),
('capsicum', 'capsicum.jpg', 'Capsicum (Green)', 'fresh farm vegetable from walimada.', 600, '*kg', 20),
('Cardamom', 'elach.jpg', 'Cardamom', 'Cardamom', 150, '50gm', 10),
('carrot', 'carrot.jpg', 'Carrot', 'fresh farm vegetable from walimada.', 240, '*kg', 20),
('chicken-b', 'Chicken.jpg', 'Chicken', 'Organic broiler chicken', 800, 'pieces', 50),
('chilli', 'chilli.jpg', 'Chilli', 'Red chilli', 1400, 'kg', 50),
('Cinnamon', 'daruchini.jpg', 'Cinnamon', 'fresh cinnamon from down south.', 80, '100gm', 10),
('cucumber', 'Shosha.jpeg', 'Local cucumber', 'fresh farm vegetable from walimada', 110, 'Kg', 50),
('Dal', 'mungdal.jpg', 'Dal', 'Imported from India', 360, '*kg', 30),
('dragon', 'dragon.jpg', 'dragon fruit', 'Imported Dragon fruit', 1200, '*kg', 20),
('egg', 'Egg.jpg', 'Egg', 'Broiler egg', 55, '1', 200),
('Garlic', 'Garlic.jpg', 'Garlic', 'Imported from India', 450, 'Kg', 60),
('ginger', 'ginger.jpg', 'Ginger', 'ginger', 600, 'kg', 50),
('Lemon', 'Lemon.jpg', 'Lemon', 'Lemon', 5, 'Piece', 50),
('mutton', 'mutton.jpg', 'Mutton', 'Fresh Organic Mutton', 2800, '*kg', 30),
('Oil', 'Oil.jpg', 'Sunflower oil', 'Better Quality Sunflower oil', 1200, 'L', 20),
('onion', 'onion.jpg', 'Onion', 'Imported from India', 450, 'kg', 150),
('potato', 'potato.jpg', 'Potato', 'Imported from Pakistan.', 240, 'kg', 200),
('pumpkin', 'pumpkin.jpeg', 'Pumpkin', 'fresh farm vegetable from walimada', 150, '*kg', 20),
('rice', 'Rice.jpeg', 'Rice', 'Araliya Rice', 205, 'kg', 100),
('Salaya', 'Rui .jpeg', 'Salaya', 'Fresh Today Salaya.', 240, 'Kg', 20),
('salt', 'salt.jpeg', 'Salt', 'This is salt', 30, 'kg', 100),
('Telapiya', 'Telapiya .jpeg', 'Podi Malu', 'fresh today arrival!!', 150, 'Kg', 30),
('tomato', 'Tomato.jpg', 'Tomato', 'fresh farm vegetable from walimada', 200, 'kg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `image` varchar(50) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`image`, `name`, `username`, `password`) VALUES
('nuwan abesuriya.jpg', 'nuwan abesuriya', '123@gmail.com', '123123'),
('nuwan.jpg', 'nuwan', 'nuwan@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
