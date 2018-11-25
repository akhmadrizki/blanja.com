-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 04:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blanja.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `nama_products` varchar(100) NOT NULL,
  `harga_products` int(11) NOT NULL,
  `deskripsi_products` text NOT NULL,
  `foto_products` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `nama_products`, `harga_products`, `deskripsi_products`, `foto_products`) VALUES
(13, 'Little Black Top', 50000, 'Bahan yang digunakan tidak panas, kualitas terjamin', 'product1.jpg'),
(14, 'Little Black Shirt', 100000, 'Bahan lentur tidak mudah mulur, kualitas bagus', 'product3.jpg'),
(15, 'Amari Dress', 250000, 'Bahan kain tebal, tidak mudah robek, kualitas oke', 'product4.jpg'),
(16, 'Manago Shirt', 75000, 'Bahan dingin, jahitan rapi, kualitas terjamin', 'product5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'yoga', '$2y$10$sEay3dTlGSqIF8BPg38stuHHL4U66Oj2017rz98bLdX9n3DNDazsu', 'admin'),
(4, 'admin', '$2y$10$54Og4LV69KytSqpW7Ee1PuoBvqfPJEX.oJkiliXAbJ42Kk/2jV2FW', 'admin'),
(13, 'faisal', '$2y$10$zoHC7zI0UwtpCM3neXadHe0e7cplL/w/vF0nzMrGOHX3WDjHl2DFO', 'pelanggan'),
(14, 'duik', '$2y$10$UKCxhfDxhvV6L/wD1iAEzesy4PmMS8kQfnQDG1NBG/epD6gx477lG', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

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
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
