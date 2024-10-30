-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 10:28 AM
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
-- Database: `app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pcreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pupdated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `type`, `quantity`, `price`, `status`, `pcreated_at`, `pupdated_at`) VALUES
(1, 'Mechanical Keyboard', 'RGB Mechanical Keyboard', 'Keyboard', 50, 80, 'available', '2024-10-29 11:37:08', '2024-10-29 11:37:08'),
(2, 'Wireless Mouse', 'Ergonomic Wireless Mouse', 'Mouse', 100, 30, 'unavailable', '2024-10-29 11:37:08', '2024-10-29 11:42:56'),
(3, '27\" Gaming Monitor', 'High Refresh Rate Gaming Monitor', 'Monitor', 30, 300, 'unavailable', '2024-10-29 11:37:08', '2024-10-29 11:42:45'),
(4, 'NVIDIA GeForce RTX 3060', 'High Performance Graphics Card', 'GPU', 20, 500, 'available', '2024-10-29 11:37:08', '2024-10-29 11:37:08'),
(5, 'ASUS ROG Strix B550-F', 'Motherboard for Gaming', 'Motherboard', 25, 200, 'available', '2024-10-29 11:37:08', '2024-10-29 11:37:08'),
(6, 'Intel Core i7-11700K', 'High Performance CPU', 'CPU', 15, 350, 'available', '2024-10-29 11:37:08', '2024-10-29 11:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ucreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `uupdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`, `status`, `token`, `ucreated_at`, `uupdated_at`) VALUES
(1, 'Maria', 'Fe', 'MariaFe@example.com', '', 'admin', 'inactive', '', '2024-10-29 13:20:06', '2024-10-30 11:48:43'),
(2, 'Jane', 'Smith', 'janesmith@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(3, 'Alice', 'Johnson', 'alicejohnson@example.com', 'password123', 'user', 'inactive', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(4, 'Bob', 'Brown', 'bobbrown@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(5, 'Charlie', 'Martin', 'charliedavis@example.com', '', 'admin', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(6, 'Eve', 'Wilson', 'evewilson@example.com', 'password123', 'user', 'inactive', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(7, 'Frank', 'Miller', 'frankmiller@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(8, 'Grace', 'Moore', 'gracemoore@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(9, 'Henry', 'Taylor', 'henrytaylor@example.com', 'password123', 'user', 'inactive', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(10, 'Ivy', 'Anderson', 'ivyanderson@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(11, 'Jack', 'Thomas', 'jackthomas@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(12, 'Kathy', 'Jackson', 'kathyjackson@example.com', 'password123', 'admin', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(13, 'Liam', 'White', 'liamwhite@example.com', 'password123', 'user', 'inactive', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(14, 'Mia', 'Harris', 'miaharris@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(15, 'Noah', 'Martin', 'noahmartin@example.com', 'password123', 'user', 'active', '', '2024-10-29 13:20:06', '2024-10-30 11:37:32'),
(16, 'test5', 'test5', 'test5@gmail.com', '$2y$10$fGyu8jgElXDe1vyKynrBceE0gPffFEKy.9d7Hna5wH8M6ATREkYma', 'Admin', 'Active', '', '2024-10-30 14:49:11', '2024-10-30 14:49:11'),
(17, 'test6', 'test6', 'test5@gmail.com', '$2y$10$mcjca0ZbwNISY3t6nlij5.tKu.Ig9fo1nFOx/UDg7S82iO98cMhUq', 'Admin', 'Active', '', '2024-10-30 14:51:58', '2024-10-30 14:51:58'),
(18, 'test8', 'test8', 'test5@gmail.com', '$2y$10$u0ePHRaDnfHLF8VpHl1b6extf5YQBOab7CYsjiDNKpytSfHsRkhgK', 'User', 'Inactive', 'uXWd25pSK3kN0VMtCDr8FcPvJqyAL6ETxnR4wHBeiIsa1mgbjoGYl9QZzUh7fO', '2024-10-30 15:07:45', '2024-10-30 15:07:45'),
(19, 'test9', 'test9', 'test5@gmail.com', '$2y$10$AeT6b8GgCW.BS1j9i5fCe.1Inb1iUJGLmIR.bMxqUb4XxJWQLNrde', 'Admin', 'Active', 'G3embYR61KcPiwp4VxQFsXTv792UknOoLZMAlqr0zughCH5tNfIBjE8dSJWyDa', '2024-10-30 15:09:29', '2024-10-30 15:09:29'),
(20, 'test10', 'test10', 'test10@gmail.com', '$2y$10$VcCyoym/BxGY895Q.AsmxOciTDjswkCOLpQrzs6g4jiEUypik99Q.', 'User', 'Active', 'QfXlK16vbHr2pwTGhnRLedAcIxZq9oWVPBDsYFEaM58jgmUuC7O3ikzJ4S0Nty', '2024-10-30 15:10:18', '2024-10-30 15:10:18'),
(21, 'test11', 'test11', 'test10@gmail.com', '$2y$10$fNfttbsJzbbWUl5z1cQyXOGahdPfUd7xEXXo0NMtEHo75iFzCQhtS', 'Admin', 'Inactive', '4YN3mpGBcAWIXHrw5Vlshivbyk86tRu2aUSMjL70e1FqZn9PfdxJKTEDzOoCQg', '2024-10-30 15:10:43', '2024-10-30 15:10:43'),
(22, 'test12', 'test12', 'test12@gmail.com', '$2y$10$/L9jJ9tP9VOSubnC0D6GZ.EhuFOuL/Je6ECAozyqKaUxVSybHpQpK', 'User', 'Inactive', 'n4aEB6JL7tsVzAqFIMPNvbSoiWjp01mf9UeTX2huYOkZ85RDCwcgHldrQKxG3y', '2024-10-30 15:18:05', '2024-10-30 15:18:05'),
(23, 'test13', 'test13', 'test13@gmail.com', '$2y$10$5wz9fgwPjRHQtmSvrIMZqOqMSyPksG4envz8pzuXdW9Riw5bZyuCu', 'Admin', 'Active', 'MqGLapxIHzekmyYcF203d541OstVuChB96vNZUojTJSPQrlgbnEwR8XWf7iDAK', '2024-10-30 15:19:28', '2024-10-30 15:19:28'),
(24, 'test14', 'test14', 'test14@gmail.com', '$2y$10$csHmDZx1qC4YrIc6sTSz1OwOC98A921onV0mVDXHhoKF51A.ULqLS', 'Admin', 'Active', 'MH6yhgGSzCFU2KanpokwuY49NlvfZXxrTsjmPRBeODQiWc0b5tq8VAJ7d3EL1I', '2024-10-30 15:20:50', '2024-10-30 15:20:50'),
(25, 'test15', 'test15', 'test15@gmail.com', '$2y$10$QREmZFcgGcgr4yRRYutBYOcKYt9hmyzq9WeMHMYs85RWOQUUXvXJe', 'Admin', 'Inactive', 'eQHva7M1hX0tdVfgO5DculnZ4FbGLSYoBmJiRpEszr8ywAIk2K3TPjW9N6qUxC', '2024-10-30 15:52:45', '2024-10-30 15:52:45'),
(26, 'test16', 'test16', 'test16@gmail.com', '$2y$10$G2V0uYik6HhjB5Md3F.5XeaSzchvQJHpxRTGWoaBiRUpvJC.b5k6e', 'Admin', 'Active', 'QAHyudjmaRsrIWOZDBitUnfNLke3hC7zqXxc60F19wpVY5vMbKG82TJSlPoE4g', '2024-10-30 15:54:50', '2024-10-30 15:54:50'),
(27, 'test17', 'test17', 'test17@gmail.com', '$2y$10$g6HY25kBNQSEpHelUTFveeGS.gi6qMRL7tocsMgHBNOsaq067pqSy', 'user', 'active', 'QR4bfs6BTcpLS7ehHoyZXOJdk28uKw3xYvri0zqmgPF9DWl5taMC1jVNGEAInU', '2024-10-30 15:56:28', '2024-10-30 15:56:28'),
(28, 'test18', 'test18', 'test18@gmail.com', '$2y$10$5Sfu/TKR10hTC70jUj.o.OXlZnprHdpsirSj.UrrLevEIfyobxS9C', 'user', 'inactive', 'QFHMcx4d5Em1kRvOqoCAzfUNSTnY6p9yalVXJjGr7Ztsi08BPuIWwhLeg23KbD', '2024-10-30 15:59:27', '2024-10-30 15:59:27'),
(29, 'test20', 'test20', 'test20@gmail.com', '$2y$10$rICdrMkZ2AcWIR5Lurf.nufd2iNwbLNQYicBQ8Fc2ti858XG6rmcO', 'admin', 'active', 'yNmarPbd1Ecf0IuJlQAFinUWH54g98TkxwhBYMG6L2peZX3DSv7zOKqCosVRjt', '2024-10-30 16:00:35', '2024-10-30 16:00:35'),
(30, 'Jake', 'Napay', 'lol@gmail.com', '$2y$10$BM65/Z.ErJFmk9OZiUjGeexQAz7o6ZoG5wB/Z/Cyg3gKuRaRv53oO', 'admin', 'active', 'zuUoQHdYDaRPiSec5nZb3VtLp2m7jExO4l8fJAWkIMq0TwBXgK9yGC6N1Fsrvh', '2024-10-30 16:19:27', '2024-10-30 17:26:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
