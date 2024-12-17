-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 02:51 PM
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
-- Database: `fashion_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `fashion_product`
--

CREATE TABLE `fashion_product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL CHECK (`stock_quantity` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fashion_product`
--

INSERT INTO `fashion_product` (`product_id`, `name`, `description`, `price`, `category_id`, `gender_id`, `size_id`, `img`, `stock_quantity`) VALUES
(1, 'Men Casual Shirt', 'A comfortable cotton casual shirt', 29.99, 1, 1, 3, 'shirt1.jpg', 50),
(2, 'Women Summer Dress', 'Lightweight summer dress perfect for casual wear', 49.99, 2, 2, 2, 'dress1.jpg', 30),
(3, 'Leather Jacket', 'Stylish leather jacket for winter', 99.99, 1, 1, 4, 'jacket1.jpg', 20),
(4, 'Denim Jeans', 'Classic denim jeans with a relaxed fit', 39.99, 1, 1, 4, 'jeans1.jpg', 100),
(5, 'Women Handbag', 'A stylish leather handbag for women', 59.99, 3, 2, NULL, 'handbag1.jpg', 25),
(6, 'Unisex Sunglasses', 'Polarized sunglasses for both men and women', 19.99, 3, 3, NULL, 'sunglasses1.jpg', 75),
(7, 'Women Casual Top', 'Casual top perfect for daily wear', 24.99, 2, 2, 3, 'top1.jpg', 60),
(8, 'Men Formal Suit', 'A classic formal suit for business meetings', 199.99, 1, 1, 5, 'suit1.jpg', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fashion_product`
--
ALTER TABLE `fashion_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `size_id` (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fashion_product`
--
ALTER TABLE `fashion_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fashion_product`
--
ALTER TABLE `fashion_product`
  ADD CONSTRAINT `fashion_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fashion_product_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fashion_product_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
