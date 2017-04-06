-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 05:47 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `item_id` mediumint(8) UNSIGNED NOT NULL,
  `pro_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `attribute` varchar(100) NOT NULL DEFAULT '',
  `quantity` tinyint(3) UNSIGNED DEFAULT NULL,
  `date_shop` datetime DEFAULT NULL,
  `session_id` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `cat_name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'เสื้อพาราฮัท'),
(2, 'หมวกพาราฮัท'),
(3, 'แผ่นเพลงพาราฮัท');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` mediumint(8) UNSIGNED NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `name` text,
  `address` text,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` mediumint(8) UNSIGNED NOT NULL,
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `name` text,
  `bank` varchar(100) DEFAULT NULL,
  `img_bank` text,
  `money` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `confirm` set('no','yes') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` mediumint(8) UNSIGNED NOT NULL,
  `cat_id` smallint(5) UNSIGNED DEFAULT NULL,
  `pro_name` varchar(200) DEFAULT NULL,
  `detail` text,
  `price` mediumint(8) UNSIGNED DEFAULT NULL,
  `quantity` text NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `pro_name`, `detail`, `price`, `quantity`, `img`) VALUES
(1, 1, 'เสื้อคบแล้วจะรัก ( ไซต์ S )', 'มาจากมือ มาจากใจ มาจากความตั้งใจ จากเรา พาราฮัทมิวสิค\r\n"แทนความทรงจำ" จาก เด็กบ้านๆ เด็กเลี้ยงวัว\r\nหมายเหตุ : ราคานี้ยังไม่รวมค่าจัดส่ง Ems นะครับ\r\nค่าส่ง +50บาท', 200, 'ไม่จำกัด', 'pic_product/05.jpg'),
(2, 2, 'หมวกวงพัทลุง', 'มาจากมือ มาจากใจ มาจากความตั้งใจ จากเรา พาราฮัทมิวสิค\r\n"แทนความทรงจำ" จาก เด็กบ้านๆ เด็กเลี้ยงวัว\r\nหมายเหตุ : ราคานี้ยังไม่รวมค่าจัดส่ง Ems นะครับ\r\nค่าส่ง +50บาท', 150, 'ไม่จำกัด', 'pic_product/24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `name`, `address`, `email`, `phone`, `status`, `order_date`) VALUES
(1, 'chotipat srianan', 'วังใหม่', 'chotipat88@hotmail.com', '0623917955', 1, '2017-03-26 00:38:57'),
(2, 'โชติพัทธ์ ศรีอนันต์', '188 ม.1  ต.วังใหม่', 'chotipat88@hotmail.com', '0623917955', 1, '2017-03-26 12:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `d_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`d_id`, `order_id`, `pro_id`, `quantity`, `total`) VALUES
(30, 1, 1, 20, 4000),
(31, 1, 2, 15, 2250),
(32, 2, 1, 23, 4600),
(33, 2, 2, 15, 2250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pro_id`,`attribute`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email_id` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `d_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
