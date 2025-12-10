-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2025 at 06:07 AM
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
-- Database: `pawonku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password_hash`, `is_active`, `created_at`) VALUES
(1, 'Jimmy', '$2y$10$Dl0Rk38wdvlQ1WLsne5CAe4dVN2bVGBB/cZ90C/lNjm2rSEw0ianW', 1, '2025-12-10 04:36:09'),
(2, 'admin', '$2y$10$8oD05avBIque4IsM.FQZO.Xf9BTeYHtpDVS34j/vmM1CgDtcaz1vu', 1, '2025-12-10 05:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `category` enum('makanan','minuman') NOT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `is_active`, `created_at`) VALUES
(1, 'Dimsum (5 pcs)', 'makanan', 20000.00, 'img_6938f3f50945e.jpg', 1, '2025-12-08 08:22:40'),
(2, 'Keripik Tempe', 'makanan', 10000.00, 'img_6938f42141198.jpg', 1, '2025-12-08 08:22:40'),
(3, 'Es Teh Manis', 'minuman', 4000.00, 'img_6938f461cc462.jpg', 1, '2025-12-08 08:22:40'),
(4, 'Keripik Singkong', 'makanan', 10000.00, 'img_6938f48d6745d.jpg', 1, '2025-12-08 08:22:40'),
(5, 'Pisang Bolen (4 pcs)', 'makanan', 15000.00, 'img_6938f4b414ddf.jpg', 1, '2025-12-10 04:19:00'),
(6, 'Onde-Onde (10 pcs)', 'makanan', 15000.00, 'img_6938f507a8197.jpg', 1, '2025-12-10 04:20:23'),
(7, 'Tiramisu (5 cups)', 'makanan', 100000.00, 'img_6938f55cbf9c1.jpg', 1, '2025-12-10 04:21:48'),
(8, 'Klepon (7 pcs)', 'makanan', 12000.00, 'img_6938f5ca05f42.jpg', 1, '2025-12-10 04:23:38'),
(9, 'Cheesecake (5 cups)', 'makanan', 75000.00, 'img_6938f602a864d.jpg', 1, '2025-12-10 04:24:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
