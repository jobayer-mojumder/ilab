-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2019 at 07:22 AM
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
(2, '217.229.103.253', '2019-02-25 15:06:05', 'admin', 'Chrome', '72.0.3626.109', 'Mac OS X', 1),
(3, '103.60.175.24', '2019-02-25 15:06:14', 'admin', 'Chrome', '72.0.3626.119', 'Linux', 1),
(4, '45.114.88.218', '2019-02-25 17:55:08', 'admin', 'Chrome', '72.0.3626.109', 'Windows 10', 0),
(5, '45.114.88.218', '2019-02-25 17:55:29', 'admin', 'Chrome', '72.0.3626.109', 'Windows 10', 1),
(6, '45.114.88.218', '2019-02-25 18:10:03', 'admin', 'Chrome', '72.0.3626.109', 'Windows 10', 1),
(7, '182.48.76.186', '2019-02-25 21:07:17', 'admin', 'Firefox', '60.0', 'Windows 10', 1),
(8, '45.114.88.218', '2019-02-25 21:18:06', 'admin', 'Chrome', '72.0.3626.109', 'Windows 10', 1),
(9, '43.250.80.195', '2019-02-26 02:04:43', 'admin', 'Chrome', '72.0.3626.119', 'Linux', 1),
(10, '182.48.76.186', '2019-02-26 02:09:07', 'admin', 'Firefox', '60.0', 'Windows 10', 1),
(11, '182.48.76.186', '2019-02-26 02:21:51', 'admin', 'Firefox', '60.0', 'Windows 10', 1),
(12, '123.108.244.217', '2019-02-26 06:21:11', 'admin', 'Firefox', '60.0', 'Windows 10', 1),
(13, '103.60.175.24', '2019-02-26 06:50:49', 'admin', 'Chrome', '72.0.3626.119', 'Linux', 1);

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
(6, 'Health', 'Ambulance', 'Seating Capacity : 4 Persons\r\nMaximum Loading Capacity : 375 Kg\r\nMaximum Horse power : 10 Hp\r\nEngine	4 Stroke\r\nEngine Number of Cylinder  : 1 Cylinder\r\nTransmission Type	4 Forward 1 Reverse\r\n20 Liter fuel capacity\r\n', 'ambulance.jpg', '', 'https://www.youtube.com/embed/sDKJkQ_cBOw', 'Mizanur-ambulance.jpg', 'Mizanur Rahman', '2,95,000', '3500', 1, './assets/product/', '2019-02-25 21:19:59', '2019-02-26 03:50:25'),
(7, 'Health', 'Central Nebulizing', 'A centrally controlled nebulizing system to serve multiple patients using a single cylinder. Each nebulizer can have up to 32 nebulizing pipes attached with different hospital beds and the doses will be centrally controlled by the device using a switch.\r\nBenefits:\r\n·         Allows multiple users to be served at a time\r\n·         Utilizes fresh air for nebulizing\r\n·         30 minutes backup on electricity failure\r\nFeatures:\r\n·       Auto Compressor\r\n·       Auto Regulating Pressure Bulb\r\n·       Bacterial Filter\r\n·       Advanced Nebulizer Mask', 'Central_Nebulizer-01.jpg', '', 'https://www.youtube.com/embed/xpyXlZkom1Q', '52989669_360880088086894_721255219521912832_n.png', 'Md. Anwar Hossain', '2,00,000', '2380', 1, './assets/product/', '2019-02-25 21:36:29', '2019-02-26 02:25:20'),
(8, 'Education', 'Multimedia Classroom', 'An innovation product specially designed for schools. This multimedia class room device can run multimedia content without electricity in a class room. It is low cost, low maintenance, and low powered device which operated by renewable solar energy. \r\n\r\nSpecification:\r\n•	40 inch LED Display\r\n•	120AH Acid Battery\r\n•	4GB RAM, 160GB HDD or above\r\n•	75W Solar Panel\r\n•	4K Display Resolutions \r\n•	USB ports- 2-3\r\n•	Charging Time by solar- 4 hours in full sunlight\r\n•	Digital Solar Battery Charge Controller\r\n•	Intelligent Inverter\r\n', 'mul-classroom.jpg', '', 'https://www.youtube.com/embed/s6ErUfqaU5s', 'mul-classroom1.jpg', 'Md. Rezaur Rahman', '90,000', '1070', 1, './assets/product/', '2019-02-25 21:43:00', '2019-02-26 02:07:55'),
(9, 'Environment', 'Fuel From Poly ', 'Towhidul\'s project aims to increase the economic development of Bangladesh by producing fuel from polythene and related substances in order to reduce waste from the environment.\r\n\r\nRaw materials: Plastic and polythene.\r\n\r\nOutput: Petrol, Diesel, Kerosene, Natural Gas and Coal  \r\n', 'fuel_from_poly_plastic-01.jpg', '', 'https://www.youtube.com/embed/HZH_Hl8GicM', 'towhidul.jpg', 'Towhidul Islam', '8,00,000', '9532', 1, './assets/product/', '2019-02-25 22:06:59', '2019-02-26 02:34:01'),
(10, 'Hill track', 'Hill Water Pump', 'Use Hydraulic ram pump \r\nA pump can pull water from 100 to 150 feet\r\nA pump can supply water for 10 to 12 households \r\nIt’s a low cost technology.\r\nBasically used in hilly area.\r\n', 'Water_pump.jpg', '', 'ttps://www.youtube.com/embed/fAWHPrKNlF4', 'Sust_Students.jpg', 'SUST Students', '30,000', '360', 1, './assets/product/', '2019-02-25 22:28:01', '2019-02-26 02:34:52'),
(11, 'Health', 'Infant Incubator', 'It is an incubator machine which will be potable, low cost and available to the public.\r\n', 'infant-incubator.jpg', '', '', 'infant-incubator1.jpg', 'Abdul Alim', '40,000', '480', 1, './assets/product/', '2019-02-26 02:55:10', '2019-02-26 02:55:10'),
(12, 'Disability', 'Blind Stick', 'Locally developed\r\nLow cost\r\nDirectional haptic feedback\r\nStair case indication\r\nIndication for holes in ground\r\nPIR integration for indicating presence of human in isolated space\r\nMore features than available blind sticks\r\nEasily maintainable \r\n', 'blindstick.jpg', '', '', 'stick.jpg', 'Ahsan Habib', '5000', '60', 1, './assets/product/', '2019-02-26 03:16:32', '2019-02-26 03:16:32'),
(13, 'Disability', 'Solar TriCycle', 'An innovative tri-cycle developed for underprivileged persons with physical disability. This locally manufactured tri-cycle is very affordable and it can be run by both solar and grid electricity. Its mechanism has been specially designed for muddy paths of rural areas.\r\n\r\nSpecifications:\r\nMotor				:	250 W\r\nMaximum speed		:	20 km/h\r\nLoading Capacity		:	Up to 150 kgs\r\nMileage			:	100 km\r\nSolar Panel			:	100w \r\n', 'solar_wheelchair.jpg', '', '', 'tri-cycle.jpg', 'Yousuf Sarder', '40,000', '480', 1, './assets/product/', '2019-02-26 03:22:19', '2019-02-26 03:22:19'),
(14, 'Agriculture', 'Power Tiller', 'Power tillers of innovation is the main objective of reducing dependence on foreign domestic low-cost sustainable power tillers developed\r\n', 'power_tiller.jpg', '', '', 'tiller.jpg', 'Kh. Rafiqul Haque', '1,00,000', '1200', 1, './assets/product/', '2019-02-26 03:28:13', '2019-02-26 03:28:13'),
(15, 'Industry', 'CNC', 'Introducing CNC router for Bangladesh Furniture Industry with local innovation\r\n\r\nComparatively Low Cost\r\nApprox. 40% indigenous Local Renovation.\r\nBoth 2D and 3D\r\n', 'cnc.png', '', '', 'cnc01.png', 'Md Ashraf Amin', '4,80,000', '5715', 1, './assets/product/', '2019-02-26 03:35:17', '2019-02-26 03:35:17'),
(16, 'Agriculture', 'Green Fertilizer', 'Low-cost fuel saving machine that can turn water hyacinth and domestic waste into green fertilizer. \r\nLocally developed\r\n', 'green_fertilizer-01.jpg', '', '', '', 'Md. Ali ', '60,000', '715', 1, './assets/product/', '2019-02-26 03:38:54', '2019-02-26 03:38:54');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
