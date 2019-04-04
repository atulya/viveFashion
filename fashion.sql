-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 06:18 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `added_on`, `modified_on`) VALUES
(1, 'Atul', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '2018-12-19 22:40:41', '2018-12-19 22:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` smallint(2) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `image_name`, `added_on`, `modified_on`) VALUES
(1, 'New Collection', 'bg-1.jpg', '2019-01-12 06:19:13', '2019-01-12 06:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` mediumint(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(220) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `product_id` mediumint(5) NOT NULL,
  `product_name` text NOT NULL,
  `is_read` tinyint(1) NOT NULL COMMENT '1 - Yes, 0 - No',
  `is_deleted` tinyint(1) NOT NULL COMMENT '1 - Yes, 0 - No',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `name`, `email`, `mobile`, `product_id`, `product_name`, `is_read`, `is_deleted`, `added_on`, `modified_on`) VALUES
(1, 'Hamja', 'hamja@gmail.com', '9090909090', 1, 'sadgkdasksdjd', 1, 0, '2018-12-25 08:56:44', '2019-01-01 12:08:45'),
(2, 'hamja', 'hamja@gmaail.com', '9090909090', 8, 'Product 8', 1, 0, '2018-12-27 18:50:01', '2019-01-01 12:08:59'),
(3, 'Raj', 'raj@kasurde.com', '7897897891', 1, 'Product 1.1', 1, 0, '2019-01-01 12:13:42', '2019-01-01 12:16:52'),
(4, 'Yuvi', 'yuvi@gmail.com', '8908908900', 8, 'Product 8', 0, 0, '2019-01-03 03:54:08', '2019-01-03 03:54:08'),
(5, 'Mulk', 'mulk@gmail.com', '7897987911', 8, 'Product 8', 0, 0, '2019-01-03 03:54:42', '2019-01-03 03:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `menu_id` smallint(3) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `permalink` varchar(200) NOT NULL,
  `parent_id` smallint(3) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`menu_id`, `name`, `permalink`, `parent_id`, `is_deleted`, `added_on`, `modified_on`) VALUES
(1, 'Liverpool FC', 'liverpool-fc', 0, 0, '2018-12-26 17:19:04', '2019-01-15 16:47:45'),
(2, 'Liverpool Echo HELLO', 'liverpool-echo-hello', 0, 0, '2018-12-26 17:19:15', '2019-01-16 15:42:12'),
(3, 'News', 'news', 2, 0, '2018-12-26 17:20:35', '2019-01-15 16:47:45'),
(4, 'Blogging', 'blogging', 2, 0, '2018-12-26 17:20:47', '2019-01-15 16:47:45'),
(5, 'Echo', 'echo', 2, 0, '2019-01-16 15:42:30', '2019-01-16 15:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` mediumint(5) NOT NULL,
  `permalink` varchar(250) NOT NULL,
  `menu_id` smallint(3) NOT NULL,
  `sub_menu_id` smallint(3) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `description` text NOT NULL,
  `manufactured_by` varchar(200) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL COMMENT '1 - Yes, 0 - No',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `permalink`, `menu_id`, `sub_menu_id`, `name`, `description`, `manufactured_by`, `is_deleted`, `added_on`, `modified_on`) VALUES
(1, 'Product-1.1', 1, 0, 'Product 1.1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>\r\n', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:29:20'),
(2, 'Product-2', 1, 0, 'Product 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(3, 'Product-3', 1, 0, 'Product 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(4, 'Product-4', 2, 3, 'Product 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(5, 'Product-5', 2, 3, 'Product 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(6, 'Product-6', 2, 4, 'Product 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(7, 'Product-7', 2, 4, 'Product 7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(8, 'Product-8', 2, 4, 'Product 8', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>\r\n', 'Pune', 0, '2018-12-27 17:24:38', '2019-01-09 16:33:07'),
(9, 'Product-11', 1, 0, 'Product 11', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>\r\n', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:28:56'),
(10, 'Product-12', 1, 0, 'Product 12', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(11, 'Product-13', 1, 0, 'Product 13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(12, 'Product-14', 1, 0, 'Product 14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(13, 'Product-15', 1, 0, 'Product 15', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(14, 'Product-16', 1, 0, 'Product 16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(15, 'Product-17', 1, 0, 'Product 17', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07'),
(16, 'Product-18', 1, 0, 'Product 18', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Mumbai', 0, '2019-01-01 11:35:24', '2019-01-09 16:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` mediumint(5) NOT NULL,
  `image_name` varchar(120) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image_name`, `added_on`) VALUES
(8, '2018122718255170_51.jpg', '2018-12-27 17:25:51'),
(8, '2018122718275440_boss_(2).jpg', '2018-12-27 17:27:54'),
(1, '2019010917110374_MO.jpg', '2019-01-09 16:11:03'),
(1, '2019010917170138_kloop.jpg', '2019-01-09 16:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `permalink` (`permalink`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `menu_id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
