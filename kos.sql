-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adityafuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parkir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamarmandi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasilfuzzy` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id`, `name`, `gambar`, `harga`, `ukuran`, `ac`, `parkir`, `kamarmandi`, `wifi`, `created_at`, `updated_at`, `hasilfuzzy`) VALUES
(17, 'Kos Ketintang 72', 'public/images/zjKllVqDm228-10-22.jpg', 600000, '20', '10', '20', '50', '50', '2022-10-28 04:44:32', '2022-10-28 04:52:51', 1000000),
(18, 'kos wanita gayungsari no 1', 'public/images/ZuGsqEcQsr28-10-22.jpg', 600000, '20', '0', '10', '10', '10', '2022-10-28 04:44:58', '2022-10-28 04:48:33', 350000),
(19, 'kos krembangan no 10', 'public/images/3JW4xdKsuL28-10-22.jpg', 600000, '10', '0', '10', '10', '0', '2022-10-28 04:46:23', '2022-10-28 05:22:03', 638889),
(20, 'kos pria gayungsari no 781', 'public/images/WyUZTcVpA328-10-22.jpg', 500000, '10', '0', '10', '10', '0', '2022-10-28 04:48:30', '2022-10-28 05:22:03', 638889),
(21, 'kos wanita bogangin no 58', 'public/images/qXcTFtvfDF28-10-22.jpg', 500000, '10', '0', '10', '25', '50', '2022-10-28 04:49:28', '2022-10-28 05:22:04', 4123201);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
