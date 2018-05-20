-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 03:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbanary`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `type`) VALUES
(1, 'Products', 'cake'),
(2, 'Services', 'Clown'),
(3, 'Package', 'Package A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(8, 'jason', 'litan', 'jason@litan.com', 'jason', 'jason'),
(9, 'jas', 'tukmol', 'tukmol@gmail.com', 'tukmol', 'tukmol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `city_address` varchar(255) NOT NULL,
  `province_address` varchar(150) NOT NULL,
  `contact_num` bigint(20) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `business_username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images` varchar(255) NOT NULL,
  `approve` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `business_name`, `city_address`, `province_address`, `contact_num`, `business_email`, `business_username`, `password`, `images`, `approve`, `created_at`) VALUES
(17, 'Hanz Party Needs and Services', 'Lipa City', 'Batangas', 9158335960, 'hanzpartyneeds@gmail.com', 'hanz', 'hanz', '', 1, '2018-04-05 01:07:31'),
(18, 'boybilis foundation', 'San Pablo City', 'laguna', 911, 'boybilis@gmail.com', 'boybi', 'boybilis', '', 0, '2018-04-05 09:33:04'),
(19, 'uncle', 'lipa', 'batangas', 12343, 'uncle@gmail.com', 'uncle', 'uncle', '', 0, '2018-04-15 13:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `product_image` mediumblob NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `category`, `partner_id`, `type`, `product_name`, `price`, `product_image`, `product_details`, `updated_at`) VALUES
(114, 'services', 17, 'clown', 'Clown', 2000, 0x636c6f776e312e6a7067, 'Proffesional', '2018-04-05 01:23:22'),
(115, 'products', 17, 'cake', 'Cake', 2000, 0x63616b65322e6a7067, 'Chocolate Cake', '2018-04-05 01:23:58'),
(116, 'package', 17, 'package_a', 'Package A', 5000, 0x72312e6a7067, 'clown,balloons,cake,chairs', '2018-04-05 01:25:09'),
(117, 'products', 17, 'cake', 'Cake', 1000, 0x63616b65352e6a7067, 'Minion Cake', '2018-04-05 01:27:29'),
(118, 'services', 17, 'magician', 'Magician', 3500, 0x6d61676963322e6a7067, 'Proffesiional', '2018-04-05 01:28:20'),
(119, 'services', 18, '', 'Massage', 280, 0x636c6f776e322e6a7067, 'specialty in the house', '2018-04-05 09:34:18'),
(120, 'package', 17, 'package_b', 'cake', 4000, 0x72332e6a7067, 'all', '2018-04-12 08:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reserve`
--

CREATE TABLE `tbl_reserve` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reserve_date` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `order_number` bigint(20) NOT NULL,
  `pending_to_cart` tinyint(4) NOT NULL,
  `receipt_image` varchar(255) NOT NULL,
  `pending_to_admin` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reserve`
--

INSERT INTO `tbl_reserve` (`id`, `customer_id`, `product_id`, `partner_id`, `qty`, `phone_num`, `address`, `reserve_date`, `message`, `order_number`, `pending_to_cart`, `receipt_image`, `pending_to_admin`, `created_at`, `updated_at`) VALUES
(83, 8, 114, 17, 2, 123123, 'qweqwe', '2018-04-21', 'qweqeqweqwe', 9856999797, 1, '527154_382698691868527_431282349_n.jpg', 'Pending Order', '2018-04-15 14:45:19', '2018-04-15 14:45:19'),
(84, 8, 118, 17, 3, 123123, 'qweqwe', '2018-04-21', 'qweqeqweqwe', 9856999797, 1, '527154_382698691868527_431282349_n.jpg', 'Pending Order', '2018-04-15 14:58:26', '2018-04-15 14:58:26'),
(86, 8, 115, 17, 1, 123123, 'qweqwe', '2018-04-21', 'qweqeqweqwe', 9856999797, 1, '527154_382698691868527_431282349_n.jpg', 'Pending Order', '2018-04-15 15:10:59', '2018-04-15 15:10:59'),
(87, 8, 115, 17, 1, 123, 'pose', '2018-04-17', 'eqweqweqwe', 4949539856, 1, '', 'Pending Order', '2018-04-16 01:41:37', '2018-04-16 01:41:37'),
(88, 8, 118, 17, 1, 123, 'pose', '2018-04-17', 'eqweqweqwe', 4949539856, 1, '', 'Pending Order', '2018-04-16 01:41:46', '2018-04-16 01:41:46'),
(89, 8, 114, 17, 1, 67868, 'lipa', '2018-04-17', 'asda', 5249545298, 1, '', 'Pending Order', '2018-04-16 01:44:02', '2018-04-16 01:44:02'),
(90, 8, 114, 17, 1, 123, 'l4e', '2018-04-17', 'iug', 4856994897, 1, '', 'Completed', '2018-04-16 01:48:44', '2018-04-16 01:48:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reserve`
--
ALTER TABLE `tbl_reserve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `tbl_reserve`
--
ALTER TABLE `tbl_reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
