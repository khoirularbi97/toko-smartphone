-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 11:48 AM
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
-- Database: `toko_smartphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(13) NOT NULL,
  `nama_cat` varchar(50) DEFAULT NULL,
  `CompanyCode` varchar(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `nama_cat`, `CompanyCode`, `Status`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `LastUpdateBy`, `LastUpdateDate`) VALUES
(1, 'Aksesoris', 'ADM01', 1, 0, 'wawan', '2025-05-25 15:36:27', NULL, NULL),
(2, 'Pulsa', 'ADM01', 1, 0, 'wawan', '2025-05-25 15:37:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `CompanyCode` varchar(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id_orders_items` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `CompanyCode` varchar(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payments` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `payment_method` enum('credit_card','bank_transfer','e-wallet','cod') NOT NULL,
  `payment_status` enum('pending','confirmed','failed') NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `CompanyCode` varchar(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `brand`, `model`, `price`, `stock`, `description`, `image`, `CompanyCode`, `Status`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `LastUpdateBy`, `LastUpdateDate`) VALUES
(8, 'VIVO', 'Y22', 1500000.00, 3, 'Versi terbaru VIVO', 'http://127.0.0.1:9000/product/250524132947-vivo-y22.jpg', 'ADM001', 1, 0, 'wawan', '2025-05-24 13:29:47', NULL, NULL),
(9, 'VIVO', 'Y100', 3599000.00, 3, 'Versi terbaru VIVO', 'http://127.0.0.1:9000/product/250524133140-vivo-y100.jpg', 'ADM001', 1, 0, 'wawan', '2025-05-24 13:31:40', NULL, NULL),
(10, 'Samsung', 'Galaxy A51', 1500000.00, 3, 'Versi terbaru Samsung', 'http://127.0.0.1:9000/product/250524133235-samsung-galaxy-a51.jpg', 'ADM001', 1, 0, 'wawan', '2025-05-24 13:32:35', NULL, NULL),
(11, 'OPPO', 'Reno 6', 3500000.00, 3, 'Versi terbaru OPPO', 'http://127.0.0.1:9000/product/250524133333-oppo-reno6.jpg', 'ADM001', 1, 0, 'wawan', '2025-05-24 13:33:33', 'wawan', '2025-05-24 16:43:48'),
(12, 'Xiaomi', 'Redmi Note 13', 2500000.00, 3, 'Versi terbaru dari Xiaomi', 'http://127.0.0.1:9000/product/250524133535-redmi-note13.jpg', 'ADM001', 1, 0, 'wawan', '2025-05-24 13:35:35', 'wawan', '2025-05-24 16:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id_shipments` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `courier` varchar(50) DEFAULT NULL,
  `status` enum('processing','shipped','delivered') NOT NULL DEFAULT 'processing',
  `CompanyCode` varchar(20) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdatedBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(13) DEFAULT NULL,
  `oauth_id` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `CompanyCode` varchar(20) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `LastUpdateBy` varchar(32) DEFAULT NULL,
  `LastUpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `role`, `oauth_id`, `Status`, `CompanyCode`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `LastUpdateBy`, `LastUpdateDate`) VALUES
(1, 'wawan', '$2y$10$Aa3UbbaJnId7SModClmzuuDvrJshRCBZlSeb3s7fxD26tq7RcyQ8i', 'admin@gmail.com', 'admin', NULL, 1, '01', NULL, 'wawan', '2025-04-13 15:40:08', NULL, NULL),
(2, 'Wawan Hermawan', '', 'tea.wawan0@gmail.com', NULL, '110554002966600803467', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id_orders_items`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payments`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id_shipments`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id_orders_items` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id_shipments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
