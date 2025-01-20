-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 07:22 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Men', 'Men’s clothing and accessories', '2025-01-17 09:59:22'),
(2, 'Women', 'Women’s clothing and accessories', '2025-01-17 09:59:22'),
(3, 'Kids', 'Clothing and accessories for kids', '2025-01-17 09:59:22'),
(4, 'Shoes', 'All types of shoes', '2025-01-17 09:59:22'),
(5, 'Accessories', 'Fashion accessories like bags, belts, and hats', '2025-01-17 09:59:22'),
(6, 'Sportswear', 'Clothing for sports and outdoor activities', '2025-01-17 09:59:22'),
(7, 'Formal Wear', 'Formal clothing for special occasions', '2025-01-17 09:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'Men Clothing', 'Clothing for men'),
(2, 'Women Clothing', 'Clothing for women'),
(3, 'Accessories', 'Fashion accessories'),
(4, 'Kids', 'Clothing and accessories for kids'),
(5, 'Shoes', 'All types of shoes'),
(6, 'Sportswear', 'Clothing for sports and outdoor activities'),
(7, 'Formal Wear', 'Formal clothing for special occasions');

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
(2, 'Women Summer Dress', 'Lightweight summer dress perfect for casual wear', 49.99, 2, 2, 2, 'dress1.jpg', 22),
(3, 'Leather Jacket', 'Stylish leather jacket for winter', 99.99, 1, 1, 4, 'jacket1.jpg', 10),
(4, 'Denim Jeans', 'Classic denim jeans with a relaxed fit', 39.99, 1, 1, 4, 'jeans1.jpg', 100),
(5, 'Women Handbag', 'A stylish leather handbag for women', 59.99, 3, 2, NULL, 'handbag1.jpg', 25),
(6, 'Unisex Sunglasses', 'Polarized sunglasses for both men and women', 19.99, 3, 3, NULL, 'sunglasses1.jpg', 72),
(7, 'Women Casual Top', 'Casual top perfect for daily wear', 24.99, 2, 2, 3, 'top1.jpg', 60),
(8, 'Men Formal Suit', 'A classic formal suit for business meetings', 199.99, 1, 1, 5, 'suit1.jpg', 10),
(14, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, NULL, NULL, 'men_tshirt.jpg', 0),
(15, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, NULL, NULL, 'women_dress.jpg', 0),
(16, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, NULL, NULL, 'kids_hoodie.jpg', 0),
(17, 'Running Shoes', 'High-quality running shoes', 89.99, 4, NULL, NULL, 'running_shoes.jpg', 0),
(18, 'Leather Belt', 'Stylish leather belt', 19.99, 5, NULL, NULL, 'leather_belt.jpg', 0),
(19, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, NULL, NULL, 'sports_jacket.jpg', 0),
(20, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, NULL, NULL, 'formal_suit.jpg', 0),
(21, 'Watch', 'dd', 350.00, 1, NULL, NULL, 'download.jpg', 39),
(22, 'Rolex', 'this is watch', 350.04, 6, NULL, NULL, 'watch-2.jpg', 46),
(23, 'saiko', 'This is watch', 350.04, 3, NULL, NULL, 'watch-2.jpg', 46),
(24, 'x jorden', 'This is Shoe.', 600.00, 3, NULL, NULL, 'sneaker-1.jpg', 403),
(25, 'ddd', 'adf', 600.00, 2, NULL, NULL, 'sneaker-1.jpg', 401),
(26, 'adf', 'adf', 600.00, 2, NULL, NULL, 'kid pink.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `shipping_address` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `shipping_address`, `total_amount`, `status`) VALUES
(1, 1, '2025-01-15 14:23:00', '123 Main Street, City A', 250.00, 'Completed'),
(2, 1, '2025-02-05 09:45:00', '123 Main Street, City A', 300.00, 'complete'),
(3, 2, '2025-03-12 16:30:00', '456 Oak Road, City B', 150.00, 'Cancelled'),
(4, 3, '2025-04-22 10:15:00', '789 Pine Avenue, City C', 500.00, 'Completed'),
(5, 4, '2025-05-08 11:50:00', '101 Maple Street, City D', 320.00, 'Completed'),
(6, 5, '2025-06-18 08:20:00', '202 Elm Street, City E', 420.00, 'Pending'),
(7, 1, '2025-07-25 12:00:00', '123 Main Street, City A', 180.00, 'Completed'),
(8, 2, '2025-08-03 14:40:00', '456 Oak Road, City B', 210.00, 'Cancelled'),
(9, 3, '2025-09-15 09:10:00', '789 Pine Avenue, City C', 275.00, 'Completed'),
(10, 4, '2025-10-07 13:35:00', '101 Maple Street, City D', 360.00, 'Completed'),
(11, 5, '2025-11-11 15:50:00', '202 Elm Street, City E', 500.00, 'Pending'),
(12, 1, '2025-12-20 17:45:00', '123 Main Street, City A', 450.00, 'Completed'),
(13, 1, '2025-01-19 11:32:16', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(14, 1, '2025-01-19 11:31:55', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(15, 1, '2025-01-19 11:30:58', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(16, 1, '2025-01-19 11:33:13', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 204.92, 'Pending'),
(17, 1, '2025-01-19 11:32:57', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 364.96, 'complete'),
(18, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 2105.24, 'Pending'),
(19, 1, '0000-00-00 00:00:00', 'Choa Chu Kang Track 5, 48S', 355.04, 'Pending'),
(20, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 1805.00, 'Pending'),
(21, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(22, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(23, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(24, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(25, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(26, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 605.00, 'Pending'),
(27, 1, '0000-00-00 00:00:00', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 1205.00, 'Pending'),
(28, 1, '2025-01-19 13:34:04', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 304.97, 'complete'),
(29, 1, '2025-01-19 15:23:42', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 214.94, 'Pending'),
(30, 1, '2025-01-19 15:26:12', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 404.95, 'Pending'),
(31, 1, '2025-01-19 15:43:02', 'Choa Chu Kang Track 5, 48S', 1405.00, 'Pending'),
(32, 1, '2025-01-19 15:46:30', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 554.93, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `item_price` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `quantity`, `item_price`, `order_id`, `product_id`) VALUES
(1, 7, 49.99, 15, 2),
(2, 8, 24.99, 16, 7),
(3, 4, 89.99, 17, 17),
(4, 6, 350.04, 18, 22),
(5, 1, 350.04, 19, 23),
(6, 3, 600.00, 20, 24),
(7, 1, 600.00, 21, 24),
(8, 1, 600.00, 22, 24),
(9, 1, 600.00, 23, 24),
(10, 1, 600.00, 24, 24),
(11, 1, 600.00, 25, 24),
(12, 2, 600.00, 27, 24),
(13, 3, 99.99, 28, 3),
(14, 3, 49.99, 29, 2),
(15, 3, 19.99, 29, 6),
(16, 2, 49.99, 30, 2),
(17, 3, 99.99, 30, 3),
(18, 4, 350.00, 31, 21),
(19, 3, 49.99, 32, 2),
(20, 4, 99.99, 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created_at`) VALUES
(1, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, 'men_tshirt.jpg', '2025-01-17 09:59:22'),
(2, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, 'women_dress.jpg', '2025-01-17 09:59:22'),
(3, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, 'kids_hoodie.jpg', '2025-01-17 09:59:22'),
(4, 'Running Shoes', 'High-quality running shoes', 89.99, 4, 'running_shoes.jpg', '2025-01-17 09:59:22'),
(5, 'Leather Belt', 'Stylish leather belt', 19.99, 5, 'leather_belt.jpg', '2025-01-17 09:59:22'),
(6, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, 'sports_jacket.jpg', '2025-01-17 09:59:22'),
(7, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, 'formal_suit.jpg', '2025-01-17 09:59:22'),
(8, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, 'men_tshirt.jpg', '2025-01-17 10:03:31'),
(9, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, 'women_dress.jpg', '2025-01-17 10:03:31'),
(10, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, 'kids_hoodie.jpg', '2025-01-17 10:03:31'),
(11, 'Running Shoes', 'High-quality running shoes', 89.99, 4, 'running_shoes.jpg', '2025-01-17 10:03:31'),
(12, 'Leather Belt', 'Stylish leather belt', 19.99, 5, 'leather_belt.jpg', '2025-01-17 10:03:31'),
(13, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, 'sports_jacket.jpg', '2025-01-17 10:03:31'),
(14, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, 'formal_suit.jpg', '2025-01-17 10:03:31'),
(15, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, 'men_tshirt.jpg', '2025-01-17 10:03:54'),
(16, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, 'women_dress.jpg', '2025-01-17 10:03:54'),
(17, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, 'kids_hoodie.jpg', '2025-01-17 10:03:54'),
(18, 'Running Shoes', 'High-quality running shoes', 89.99, 4, 'running_shoes.jpg', '2025-01-17 10:03:54'),
(19, 'Leather Belt', 'Stylish leather belt', 19.99, 5, 'leather_belt.jpg', '2025-01-17 10:03:54'),
(20, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, 'sports_jacket.jpg', '2025-01-17 10:03:54'),
(21, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, 'formal_suit.jpg', '2025-01-17 10:03:54'),
(22, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, 'men_tshirt.jpg', '2025-01-17 10:04:03'),
(23, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, 'women_dress.jpg', '2025-01-17 10:04:03'),
(24, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, 'kids_hoodie.jpg', '2025-01-17 10:04:03'),
(25, 'Running Shoes', 'High-quality running shoes', 89.99, 4, 'running_shoes.jpg', '2025-01-17 10:04:03'),
(26, 'Leather Belt', 'Stylish leather belt', 19.99, 5, 'leather_belt.jpg', '2025-01-17 10:04:03'),
(27, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, 'sports_jacket.jpg', '2025-01-17 10:04:03'),
(28, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, 'formal_suit.jpg', '2025-01-17 10:04:03'),
(29, 'Men T-Shirt', 'Comfortable cotton t-shirt for men', 15.99, 1, 'men_tshirt.jpg', '2025-01-17 10:04:25'),
(30, 'Women Dress', 'Elegant evening dress for women', 49.99, 2, 'women_dress.jpg', '2025-01-17 10:04:25'),
(31, 'Kids Hoodie', 'Warm hoodie for kids', 25.99, 3, 'kids_hoodie.jpg', '2025-01-17 10:04:25'),
(32, 'Running Shoes', 'High-quality running shoes', 89.99, 4, 'running_shoes.jpg', '2025-01-17 10:04:25'),
(33, 'Leather Belt', 'Stylish leather belt', 19.99, 5, 'leather_belt.jpg', '2025-01-17 10:04:25'),
(34, 'Sports Jacket', 'Lightweight sports jacket', 39.99, 6, 'sports_jacket.jpg', '2025-01-17 10:04:25'),
(35, 'Formal Suit', 'Premium quality formal suit', 149.99, 7, 'formal_suit.jpg', '2025-01-17 10:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone_number`, `address`, `role`) VALUES
(1, 'Nay Myo', 'naymyo1310mdy@gmail.com', '$2y$10$lB3Sxh2.qvNUU8q2NB21TuXFhW.bVPZDRyVR0fdZuTWDnu73ttBse', NULL, NULL, 'customer'),
(2, 'John Doe', 'john@example.com', '482c811da5d5b4bc6d497ffa98491e38', NULL, NULL, 'customer'),
(3, 'Jane Smith', 'jane@example.com', '482c811da5d5b4bc6d497ffa98491e38', NULL, NULL, 'customer'),
(4, 'Admin User', 'admin@example.com', '25e4ee4e9229397b6b17776bfceaf8e7', NULL, NULL, 'admin'),
(5, 'Bob Brown', 'bobbrown@example.com', '$2y$10$uvwxyz1234567890abcdefghijklmnopqr', '2222222222', '202 Elm Street, City E', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `fashion_product`
--
ALTER TABLE `fashion_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fashion_product`
--
ALTER TABLE `fashion_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `fashion_product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
