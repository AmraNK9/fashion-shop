-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 01:49 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Hello', 'This is Content', 'watch.jpg', '2025-01-31 06:18:33'),
(2, 'Content 2', 'this is another contect', 'sneaker-1.jpg', '2025-01-31 06:28:18'),
(3, 'Content 3', 'tsadfadd', 'watch.jpg', '2025-01-31 06:30:18'),
(4, 'Content 3', 'tsadfad', 'watch.jpg', '2025-01-31 06:30:38'),
(5, 'Content 3', 'tsadfad', 'watch.jpg', '2025-01-31 06:30:44'),
(6, 'Hello', 'sas', 'sneaker-1.jpg', '2025-01-31 06:55:20'),
(8, 'Blog  3', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum magnam itaque ipsam quo aliquid, odio sint, pariatur minus quidem minima maxime molestiae enim repudiandae id? Vitae ipsum tempora natus sed?\r\n', 'sneaker-1.jpg', '2025-01-31 12:38:50');

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
(7, 'Formal Wear', 'Formal clothing for special occasions'),
(10, 'Hat', 'This is hat');

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
(1, 'Men Casual Shirt', 'A comfortable cotton casual shirt', 40.00, 10, 1, 3, 'shirt1.jpg', 40),
(2, 'Women Summer Dress', 'Lightweight summer dress perfect for casual wear', 49.99, 2, 2, 2, 'dress1.jpg', 0),
(3, 'Leather Jacket', 'Stylish leather jacket for winter', 99.99, 1, 1, 4, 'jacket1.jpg', 6),
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
(26, 'adf', 'adf', 600.00, 2, NULL, NULL, 'kid pink.jpg', 200),
(27, 'Car', 'this is watch', 200.00, 1, NULL, NULL, 'watch.jpg', 300);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `address`, `message`, `created_at`) VALUES
(1, 'John Deste', '09420479093', 'naymyo1310mdy@gmail.com', 'Choa Chu Kang Track 5, 48S', 'The last one', '2025-01-21 15:29:57'),
(2, 'John Deste', '09420479093', 'naymyo1310mdy@gmail.com', 'Choa Chu Kang Track 5, 48S', 'Hello', '2025-01-29 04:09:07');

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
(3, 2, '2025-03-12 16:30:00', '456 Oak Road, City B', 150.00, 'Cancelled'),
(4, 3, '2025-04-22 10:15:00', '789 Pine Avenue, City C', 500.00, 'Completed'),
(6, 5, '2025-06-18 08:20:00', '202 Elm Street, City E', 420.00, 'Pending'),
(8, 2, '2025-08-03 14:40:00', '456 Oak Road, City B', 210.00, 'Cancelled'),
(9, 3, '2025-09-15 09:10:00', '789 Pine Avenue, City C', 275.00, 'Completed'),
(11, 5, '2025-11-11 15:50:00', '202 Elm Street, City E', 500.00, 'Pending'),
(13, 1, '2025-01-19 11:32:16', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(14, 1, '2025-01-19 11:31:55', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(15, 1, '2025-01-19 11:30:58', 'Choa Chu Kang Track 5, 48S', 354.93, 'Pending'),
(16, 1, '2025-01-19 11:33:13', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 204.92, 'Pending'),
(17, 1, '2025-01-19 11:32:57', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 364.96, 'complete'),
(29, 1, '2025-01-19 15:23:42', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 214.94, 'Pending'),
(30, 1, '2025-01-19 15:26:12', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 404.95, 'Pending'),
(31, 1, '2025-01-19 15:43:02', 'Choa Chu Kang Track 5, 48S', 1405.00, 'Pending'),
(32, 1, '2025-01-19 15:46:30', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 554.93, 'Pending'),
(33, 1, '2025-01-21 20:32:43', 'Choa Chu Kang Track 5, 48S', 204.96, 'Pending'),
(34, 1, '2025-01-29 09:28:44', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 254.95, 'complete'),
(35, 1, '2025-01-29 09:37:29', 'Choa Chu Kang Track 5, 48S', 54.99, 'Pending'),
(36, 14, '2025-02-02 14:08:31', 'Amarapura, Taung Ta Man\r\nMandalay,Near Yadanabon', 404.96, 'Pending');

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
(14, 3, 49.99, 29, 2),
(15, 3, 19.99, 29, 6),
(16, 2, 49.99, 30, 2),
(17, 3, 99.99, 30, 3),
(18, 4, 350.00, 31, 21),
(19, 3, 49.99, 32, 2),
(20, 4, 99.99, 32, 3),
(21, 4, 49.99, 33, 2),
(22, 5, 49.99, 34, 2),
(23, 1, 49.99, 35, 2),
(24, 4, 99.99, 36, 3);

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
(5, 'Bob Brown', 'bobbrown@example.com', '$2y$10$uvwxyz1234567890abcdefghijklmnopqr', '2222222222', '202 Elm Street, City E', 'customer'),
(13, 'Admin User', 'admin@example.com', '$2y$10$eImiTXuWVxfM37uY4JANjQOe3eW.QeRRfbfXOk7ouFr8IjO/B4m4G', '09888333322', 'Yangon', 'admin'),
(14, 'Admin', 'admin@gmail.com', '$2y$10$Z.ete4TtyOVytXGuQCNuCenYvR40vtmQEI5Zpyf3VWvy4ujmrnhj6', '09444553252', 'Yangon', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fashion_product`
--
ALTER TABLE `fashion_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
