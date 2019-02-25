-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2019 at 02:03 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.1.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `username`, `password`, `group`, `fullname`, `email`, `status`) VALUES
(1, 'admin', 'MRCE7jngST5G47PovW+5+D8TY9geKLvYFSMrrg6zWbAWoON8/GQ5ttJw0MHjOUQAR+7zkXdNlw7zMuoymz7TZQ==', '1', 'Jobayer Mojumder', 'jobayer.pro@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'super_admin', 1, '2019-01-01 08:24:54'),
(2, 'Admin', 1, '2019-01-02 06:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_history`
--

CREATE TABLE `admin_login_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login_history`
--

INSERT INTO `admin_login_history` (`id`, `ip`, `created_at`, `username`, `browser`, `version`, `platform`, `status`) VALUES
(1, '::1', '2019-02-24 20:31:42', 'admin', 'Chrome', '72.0.3626.109', 'Linux', 1),
(2, '::1', '2019-02-25 13:19:58', 'admin', 'Chrome', '72.0.3626.119', 'Linux', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `form_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `form_user_name` varchar(255) NOT NULL,
  `form_user_email` varchar(255) NOT NULL,
  `form_user_phone` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `form_comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_video` varchar(255) NOT NULL,
  `product_innovator_image` varchar(255) NOT NULL,
  `product_innovator_name` varchar(255) NOT NULL,
  `product_cost_tk` varchar(255) NOT NULL,
  `product_cost_doller` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category`, `product_name`, `product_description`, `product_image1`, `product_image2`, `product_video`, `product_innovator_image`, `product_innovator_name`, `product_cost_tk`, `product_cost_doller`, `status`, `path`, `created_at`, `updated_at`) VALUES
(6, 'Education', 'hello', '(1) The original question was about scaling based on a browser window size. (2) Elements like div get their own height from their own content, or take available space in a flexbox model. Saying that without explicit width/height the container won\'t show at all is incorrect. Obviously, if you want to display an empty div with a background image, you will need to set the height and, possibly, width, but then you will see only a part of an image, unless the aspect ratio is exactly the same as of the image itself.', 'imageedit_1_8667875941.png', '1482762477_700574831.jpg', 'https://www.youtube.com/embed/ZHKIs2CPEk4', 'MMD-103005.jpg', 'Jobayer Mojumder', '13', '54', 1, './assets/product/', '2019-02-25 13:21:12', '2019-02-25 13:24:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_history`
--
ALTER TABLE `admin_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_login_history`
--
ALTER TABLE `admin_login_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
