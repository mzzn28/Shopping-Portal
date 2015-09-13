-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 01:06 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mzaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `admin_id` varchar(30) DEFAULT NULL,
  `admin_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_password`) VALUES
('zaman', 'zaman'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` varchar(8) NOT NULL,
  `product_id` int(3) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `password`, `adress`, `city`, `zipcode`, `state`, `country`) VALUES
(1, 'guest', 'guest', '734-321-1234', 'guest@gmail.com', '123', '123 eagle dr', 'ypsilanti ', '0', 'MI', 'USA'),
(20, 'mahmood', 'zaman', '7343947286', 'mzzn28@gmail.com', '123', 'emerald pines dr', 'canton', '48188', 'mi', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(6) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `shipping adress` varchar(500) NOT NULL,
  `card_no` int(20) NOT NULL,
  `expiration date` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_name`, `customer_id`, `quantity`, `price`, `order_date`, `status`, `shipping adress`, `card_no`, `expiration date`) VALUES
(4, 'soccer ball', 20, 1, '$100', '2015-04-13', 'shipped', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category_id` int(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(10) NOT NULL,
  `in_stock` int(3) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `keywords` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `description`, `price`, `in_stock`, `image`, `date`, `keywords`) VALUES
(1, 'Racquet Tennis', 6, 'beautiful and strong/confortable grip', '150', 5, 'l1.jpg', '2015-04-01', 'racquet,tennis'),
(3, 'soccer ball', 1, 'Top notch training ball created for MLS. High quality in combination with exceptional durability makes this ball outstanding.', '100', 5, 's4.jpg', '2015-04-01', 'soccer, ball'),
(4, 'cricket ball', 2, 'pure lather fine quality good bounce.', '75', 2, 'c2.jpg', '2015-04-01', 'ball, hard'),
(15, 'cricket bat', 2, 'real wood, good strokes easy and smooth grip and great quality', '200', 5, 'c3.jpg', '2015-04-05', 'bat'),
(17, 'sports shoes', 5, 'pure leather, soft and light weight.', '100', 20, 'f1.jpg', '2015-04-05', 'shoes, '),
(19, 'soccer shoes', 5, 'nice and warm leather shoes, one year warranty', '100', 5, 'f2.jpg', '2015-04-12', 'shoes'),
(20, 'golf ball', 3, 'very nice ball with warranty and lot of other features', '80', 5, 'g1.jpg', '2015-04-13', 'golf, ball'),
(21, 'soccer ball', 1, 'Top notch training ball created for MLS. High quality in combination with exceptional durability makes this ball outstanding.', '40', 5, 's3.jpg', '2015-04-13', 'ball, soccer'),
(22, 'soccer ball', 1, 'Top notch training ball created for MLS. High quality in combination with exceptional durability makes this ball outstanding.', '60', 2, 's2.jpg', '2015-04-13', 'bal, soccer'),
(23, 'sports suit', 4, 'nice made with pure cotton', '45', 3, 'w1.jpg', '2015-04-13', 'suit'),
(24, 'tennis ball', 6, 'Top notch training ball created for MLS. High quality in combination ', '10', 4, 'tennis-ball.jpg', '2015-04-13', 'ball');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(6) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'soccer'),
(2, 'cricket'),
(3, 'golf'),
(4, 'sports wear'),
(5, 'shoes'),
(6, 'lawn tennis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`), ADD UNIQUE KEY `product_id` (`product_name`), ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
