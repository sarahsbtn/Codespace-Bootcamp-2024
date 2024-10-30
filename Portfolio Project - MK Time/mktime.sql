-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 09:19 AM
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
-- Database: `mktime`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(20) UNSIGNED NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `item_img` varchar(60) NOT NULL,
  `item_price` decimal(8,2) NOT NULL,
  `item_desc_product_page` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_desc`, `item_img`, `item_price`, `item_desc_product_page`) VALUES
(1, 'Nebula Essence', 'Ethereal and captivating', 'images/womens-watch-1.png', 3800.00, 'This watch combines an enchanting aesthetic with exceptional comfort, making it perfect for all-day wear while exuding a unique style that stands out.'),
(2, 'Cosmic Voyager', 'Bold yet refined', 'images/womens-watch-2.png', 4600.00, 'A blend of bold design and refined craftsmanship, this piece offers both style and durability, encouraging confidence whether at work or play.'),
(3, 'Comet Trail', 'Dynamic and striking', 'images/womens-watch-3.jpeg', 2900.00, 'With a striking appearance and a comfortable fit, this watch is designed for those who appreciate dynamic style and effortless wear.'),
(4, 'Stellar Harmony', 'Balanced and serene', 'images/womens-watch-4.jpg', 5300.00, 'Offering a perfect balance of elegance and comfort, this piece radiates a soothing quality, making it an ideal choice for everyday sophistication.'),
(5, 'Pulsar Rhythm', 'Modern rhythmic design', 'images/womens-watch-5.jpeg', 6000.00, 'This modern watch showcases lively design elements while providing a comfortable fit, perfect for those who want to add a touch of energy to their style.'),
(6, 'Galactic Enigma', 'Sophisticated and classic', 'images/womens-watch-6.jpeg', 7800.00, 'Sophisticated yet approachable, this piece combines timeless appeal with exceptional quality, inviting curiosity and admiration without sacrificing comfort.'),
(7, 'Celestial Dream', 'Whimsical and romantic', 'images/womens-watch-7.jpeg', 4500.00, 'Whimsical in design, this watch brings a touch of magic to any outfit while ensuring comfort and ease, perfect for those special moments.'),
(8, 'Starlight Fusion', 'Innovative and luxurious', 'images/womens-watch-8.jpeg', 6500.00, 'Innovative and luxurious, this piece not only looks stunning but also offers a comfortable wearing experience, merging style and quality seamlessly.'),
(9, 'Sirius Timekeeper', 'Stylish yet radiant', 'images/mens-watch-1.jpeg', 3500.00, 'Stylish and radiant, this watch captures contemporary flair while providing lasting comfort and a reliable performance for any occasion.'),
(10, 'Andromeda Explorer', 'Adventurous and bold', 'images/mens-watch-2.jpeg', 4200.00, 'Bold and adventurous, this piece encourages self-expression with its striking design while ensuring comfort for those who are always on the move.'),
(11, 'Saturn\'s Rings', 'Timeless layered elegance', 'images/mens-watch-3.jpeg', 7200.00, 'Timeless and elegant, this watch adds a touch of sophistication to any collection, crafted for both style and everyday wear.'),
(12, 'Orion\'s Belt', 'Elegant and robust', 'images/mens-watch-4.jpeg', 3800.00, 'Robust yet refined, this piece features strong lines and a comfortable fit, embodying enduring quality that enhances any outfit.'),
(13, 'Venus Rising', 'Luminous and graceful', 'images/mens-watch-5.jpeg', 5000.00, 'Luminous and graceful, this watch elevates any occasion with its radiant design while providing comfort that makes it easy to wear throughout the day.'),
(14, 'Jupiter\'s Grandeur', 'Bold and vibrant', 'images/mens-watch-6.jpeg', 6500.00, 'Bold and vibrant, this piece celebrates individuality with a striking design that doesn’t compromise on comfort or quality.'),
(15, 'Meteor Trailblazer', 'Graceful and dynamic', 'images/mens-watch-7.jpeg', 4500.00, 'Graceful and dynamic, this watch embodies movement and allure while ensuring a comfortable fit for any activity.'),
(16, 'Starlight Reflection', 'Dazzling and unique', 'images/mens-watch-8.jpeg', 6200.00, 'Dazzling and unique, this piece captivates with its presence while offering a comfortable and enjoyable wearing experience.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`) VALUES
(1, 'Sarah', 'Beaton', 'sarah@email.com', '12345', '2024-10-28 02:00:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

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
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
