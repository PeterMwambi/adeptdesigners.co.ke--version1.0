-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 10:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adeptdesigners.co.ke`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `national_id` int(11) NOT NULL,
  `amount_paid` int(15) NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `payment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cid`, `date`, `time`, `name`, `phone_number`, `email`, `national_id`, `amount_paid`, `payment_method`, `payment_status`) VALUES
(14, '3337160e21a7aaa736', '04/7/2021', '11 : 30 PM', 'Peter Mwambi', '0700521998', 'calebmwambi@gmail.com', 37999565, 6150, 'Mpesa', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `total_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `date`, `time`, `product_id`, `product_name`, `total_price`, `quantity`, `payment_status`) VALUES
(10, '3337160e21a7aaa736', '04/7/2021', '11 : 30 PM', '497435', '{\"id\":\"497435\",\"name\":\"ladies flat shoes\",\"price\":', 6150, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `product_url` varchar(150) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `product_status` varchar(10) NOT NULL,
  `product_cartegory` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_url`, `product_name`, `product_description`, `price`, `product_status`, `product_cartegory`) VALUES
(20, '978261', 'barbora-polednova-VRK4bIBHo1E-unsplash.jpg', 'ladies sneakers', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 1500, 'Avilable', 'Shoes'),
(21, '473252', 'emily-gouker-Zx76sbAndc0-unsplash.jpg', 'Ladies Heeled Shoes', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat', 2200, 'Avilable', 'Shoes'),
(22, '497435', 'lumensoft-technologies-sKFiQmGh7v4-unsplash.jpg', 'ladies flat shoes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 1000, 'Avilable', 'Shoes'),
(24, '153250', 'brunel-johnson-QosA0iWdEsw-unsplash.jpg', 'ladies boots', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 3500, 'Avilable', 'Shoes'),
(25, '635447', 'hipkicks-A2FlAh8cFW8-unsplash.jpg', 'ladies hipkicks', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 1650, 'Avilable', 'Shoes'),
(26, '261158', 'jaclyn-moy-ugZxwLQuZec-unsplash.jpg', 'ladies palms', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 2300, 'Avilable', 'Shoes'),
(27, '223301', 'ian-bevis-IJjfPInzmdk-unsplash.jpg', 'ladies sport shoes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 800, 'Avilable', 'Shoes'),
(28, '653839', 'mnz-BeClz11lyXY-unsplash.jpg', 'ladies rubber shoes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis', 1500, 'Avilable', 'Shoes'),
(29, '588962', 'mnz-MdsbS4UGZqg-unsplash.jpg', 'Brown Sport', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 3000, 'Avilable', 'Shoes'),
(30, '722528', 'ian-dooley-rBkihK3n_YI-unsplash.jpg', 'Tshirts', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 500, 'Avilable', 'Men Fashion'),
(31, '557494', 'ian-dooley-wtFc4o4Bir8-unsplash.jpg', 'Skully tshirts', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 400, 'Avilable', 'Men Fashion'),
(33, '581469', 'ivana-cajina-_7LbC5J-jw4-unsplash.jpg', 'Black Cowboy Hat', 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.', 2500, 'Avilable', 'Men Fashion'),
(35, '496172', 'nordwood-themes-rXIju7adrps-unsplash.jpg', 'Beige on White', 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 3200, 'Avilable', 'Men Fashion'),
(36, '118928', 'tania-mousinho-gRFwbJw62mo-unsplash.jpg', 'Short Jeans and Yellow Tshirt Casual', 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 2000, 'Avilable', 'Men Fashion'),
(37, '439995', 'waldemar-brandt-UP9DtTjRYpI-unsplash.jpg', 'Men Jeans', 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 1200, 'Avilable', 'Men Fashion'),
(38, '374926', 'yogendra-singh-HrpYHchKb5Y-unsplash.jpg', 'Men Suits', 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 3000, 'Avilable', 'Men Fashion'),
(39, '173068', 'inna-lesyk-oSaJDA9XJmY-unsplash.jpg', 'Suspender and Shirt', 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.', 2300, 'Avilable', 'Men Fashion'),
(40, '406760', 'nordwood-themes-Nv4QHkTVEaI-unsplash.jpg', 'Vintage Fashion', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 2300, 'Avilable', 'Men Fashion'),
(41, '566187', 'antonio-uquiche-xD_XnntwCw0-unsplash.jpg', 'Silver Rings', 'Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat', 2500, 'Avilable', 'Jewelery'),
(42, '671046', 'atul-vinayak-jKvwtbrxzdY-unsplash.jpg', 'Silver Ring and Necklace', 'Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat', 3500, 'Avilable', 'Jewelery'),
(43, '765472', 'barrett-ward-P44RIGl9V54-unsplash.jpg', 'Leather Watch', 'Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 2500, 'Avilable', 'Jewelery'),
(44, '768102', 'bradley-ziffer-eAOl9QREIY0-unsplash.jpg', 'Wrist Leather Watch', 'Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 2800, 'Avilable', 'Jewelery'),
(45, '571062', 'cornelia-ng-2zHQhfEpisc-unsplash.jpg', 'White Pearl Necklace', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 2000, 'Avilable', 'Jewelery'),
(46, '879814', 'jackie-tsang-3_YP8_mh-Kg-unsplash.jpg', 'Golden Ring', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 3000, 'Avilable', 'Jewelery'),
(47, '493993', 'john-torcasio-133Vq4tTpBQ-unsplash.jpg', 'Silver Watch', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 3000, 'Avilable', 'Jewelery'),
(48, '322187', 'kelly-sikkema-3bwcqxhGDZs-unsplash.jpg', 'Earrings', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 200, 'Avilable', 'Jewelery'),
(49, '934651', 'sandy-millar-YeJWDWeIZho-unsplash.jpg', 'Golden Rings Paired', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 7000, 'Avilable', 'Jewelery'),
(50, '903668', 'rune-enstad-qeuJczNo54w-unsplash.jpg', 'Pedicure Services', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 500, 'Avilable', 'Beauty and Salon'),
(51, '568083', 'kris-atomic-Xa8fX8bQCgs-unsplash.jpg', 'Manicure Services', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 500, 'Avilable', 'Beauty and Salon'),
(53, '854285', 'aw-creative-FkAZqQJTbXM-unsplash.jpg', 'Full Saloon Service', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 3000, 'Avilable', 'Beauty and Salon'),
(54, '901253', 'tamara-bellis-toa7kV0WPiM-unsplash.jpg', 'Ladies Off Shoulder Top', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 2000, 'Avilable', 'Women Fashion'),
(55, '781041', 'tamara-bellis-18gPnje3H4Y-unsplash.jpg', 'Ladies Blouse and Dresses', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 1000, 'Avilable', 'Women Fashion'),
(56, '764293', 'tamara-bellis-8_LseWE80rA-unsplash.jpg', 'Blue Checked Offshoulder Top', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 500, 'Avilable', 'Women Fashion'),
(57, '332706', 'chema-photo-QmPmJhreK7o-unsplash.jpg', 'Black Offshoulder and Jeans', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 1500, 'Avilable', 'Women Fashion'),
(58, '944172', 'daniela-davila-58FCfyUti_w-unsplash.jpg', 'Rugged Vintage Jeans', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 1500, 'Avilable', 'Women Fashion'),
(59, '902453', 'engin-akyurt-Hd4nlxLgIbA-unsplash.jpg', 'Ladies Shorts', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 500, 'Avilable', 'Women Fashion'),
(60, '939205', 'ian-dooley-TT-ROxWj9nA-unsplash.jpg', 'Skully Tshirt And Blue Jeans', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 700, 'Avilable', 'Women Fashion'),
(61, '204388', 'brooke-cagle-z1B9f48F5dc-unsplash.jpg', 'Red Sweatshirt', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.', 600, 'Avilable', 'Women Fashion'),
(62, '485524', 'alfonso-ramirez-TQ8RWNM0eBY-unsplash.jpg', 'Ladies Handbags', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.', 1500, 'Avilable', 'Bags'),
(63, '229162', 'anas-alshanti-wCBZZkpXP_I-unsplash.jpg', 'Black Laptop Bag', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.', 2500, 'Avilable', 'Bags'),
(64, '625613', 'artem-beliaikin-TeRtTmxP_SQ-unsplash.jpg', 'Ladies Back Pack', 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.', 1500, 'Avilable', 'Bags'),
(66, '301221', 'fernando-hernandez-XJrBxQClrlM-unsplash.jpg', 'Black Safety Laptop Bag', 'Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 3500, 'Avilable', 'Bags'),
(67, '516518', 'omar-roque-z5ncx9p6AvM-unsplash.jpg', 'Grey Safety Lapto Bag', 'Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 3500, 'Avilable', 'Bags'),
(68, '320545', 'tamara-bellis-TkwBK8nbA8I-unsplash.jpg', 'Green and Brown Laced Handbag', 'Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 1500, 'Avilable', 'Bags'),
(69, '278112', 'creative-headline-APNnyM36puU-unsplash.jpg', 'Pink Handbag', 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 1500, 'Avilable', 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `date_created`, `time`, `email`) VALUES
(1, '2021-01-12', '10:55:48', 'calebmwambi@gmail.com'),
(2, '2021-02-01', '12:01:52', 'petermwasagua@gmail.com'),
(3, '2021-02-02', '14:03:44', 'caleb@gmail.com'),
(4, '2021-02-02', '14:08:44', 'cake@cake.com'),
(5, '2021-02-02', '14:10:01', 'cake@gmail.cake'),
(6, '2021-02-02', '16:35:42', 'petermwambi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_id` int(20) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `telephone_no` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `product_cartegory` varchar(50) NOT NULL,
  `package_size` varchar(20) NOT NULL,
  `package_quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_bio_info`
--

CREATE TABLE `users_bio_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `day_joined_int` int(3) NOT NULL,
  `day_joined` varchar(10) NOT NULL,
  `month_joined` varchar(10) NOT NULL,
  `year_joined` varchar(4) NOT NULL,
  `time_joined` varchar(15) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `login_day` varchar(10) NOT NULL,
  `login_time` varchar(10) NOT NULL,
  `login_status` varchar(15) NOT NULL,
  `profile_picture` varchar(30) DEFAULT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(65) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_bio_info`
--

INSERT INTO `users_bio_info` (`id`, `user_id`, `day_joined_int`, `day_joined`, `month_joined`, `year_joined`, `time_joined`, `login_date`, `login_day`, `login_time`, `login_status`, `profile_picture`, `username`, `nickname`, `email`, `password`, `phone_number`) VALUES
(12, 'ADPT-765-USR-341', 8, 'Saturday', 'May', '2021', '1:14 PM', 'July 4 2021', 'Sunday', '4:35 PM', 'Active', NULL, 'Peter', 'Mwambi', 'calebmwambi@gmail.com', '$2y$10$t8u3T.21MYorY1KvASBrpeJ07gVEpO5O6GZyGCbNkadQ1Kz2WLQf6', '0700521998'),
(13, 'ADPT-666-USR-329', 8, 'Saturday', 'May', '2021', '1:19 PM', 'July 4 2021', 'Sunday', '4:35 PM', 'Active', NULL, 'Mwambi', NULL, 'petermwambi@gmail.com', '$2y$10$t8u3T.21MYorY1KvASBrpeJ07gVEpO5O6GZyGCbNkadQ1Kz2WLQf6', '0717334277'),
(14, 'ADPT-307-USR-293', 8, 'Saturday', 'May', '2021', '1:21 PM', 'July 4 2021', 'Sunday', '4:35 PM', 'Active', NULL, 'Mwasagua', NULL, 'caleb@gmail.com', '$2y$10$t8u3T.21MYorY1KvASBrpeJ07gVEpO5O6GZyGCbNkadQ1Kz2WLQf6', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_personal_info`
--

CREATE TABLE `users_personal_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth_day` varchar(10) DEFAULT NULL,
  `birth_month` varchar(11) DEFAULT NULL,
  `birth_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_personal_info`
--

INSERT INTO `users_personal_info` (`id`, `user_id`, `firstname`, `lastname`, `gender`, `birth_day`, `birth_month`, `birth_year`) VALUES
(1, 'ADPT-765-USR-341', 'Peter', 'Mwambi', 'male', '05', 'Apr', '1998');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `order Id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product Id` (`product_id`),
  ADD UNIQUE KEY `product_url` (`product_url`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_bio_info`
--
ALTER TABLE `users_bio_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`username`),
  ADD UNIQUE KEY `user Identification` (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `User_email` (`email`),
  ADD UNIQUE KEY `Profile Picture` (`profile_picture`);

--
-- Indexes for table `users_personal_info`
--
ALTER TABLE `users_personal_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_bio_info`
--
ALTER TABLE `users_bio_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_personal_info`
--
ALTER TABLE `users_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
