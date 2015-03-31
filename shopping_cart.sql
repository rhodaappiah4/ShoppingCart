-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2015 at 04:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Necklaces'),
(2, 'Earrings'),
(3, 'Shoes'),
(4, 'Bracelet');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Green'),
(2, 'Blue'),
(3, 'Pink'),
(4, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `home_address` text,
  `email_address` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `customer_password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `gender`, `date_of_birth`, `home_address`, `email_address`, `phone_number`, `username`, `customer_password`) VALUES
(1, 'Ama', 'Brempong', 'Female', '0000-00-00', 'P.O.BOX DC 567, Dansoman-Accra, Ghana', 'ama.brempong@gmail.com', '0244122678', 'ama', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `details_id` int(11) NOT NULL,
  `fk_order_id` int(11) DEFAULT NULL,
  `fk_product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`details_id`),
  KEY `fk_order_id` (`fk_order_id`),
  KEY `fk_product_id` (`fk_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `fk_order_id`, `fk_product_id`, `quantity`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE IF NOT EXISTS `order_table` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(30) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `fk_customer_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_customer_id_idx` (`fk_customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `order_status`, `order_date`, `fk_customer_id`) VALUES
(1, 'Cancelled', '2015-02-22', 1),
(2, 'Cancelled', '2015-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `description` text,
  `imagelocation` varchar(40) DEFAULT NULL,
  `fk_category_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `fk_color_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `search` (`product_name`,`description`(255)),
  KEY `fk_category_id` (`fk_category_id`),
  KEY `fk_color_id` (`fk_color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `imagelocation`, `fk_category_id`, `quantity`, `fk_color_id`, `price`, `last_updated`) VALUES
(1, 'Fibonacci Sequence', 'Made by Italy''s best designer, Vermicilli Kabal. Extracted from gravel and sparkle.', 'img/accessory1.jpeg', 1, 0, 4, '560.50', '2015-02-02 00:15:34'),
(2, 'La Bleue', 'Crystalline bracelet, designed by Paris'' famous runway model, Kiki Paoul. ', 'img/accessory2.jpeg', 4, 1, 2, '778.90', '2015-02-02 04:58:21'),
(3, 'Dangles', 'Award winning earring in 2014, at the Fashion Show Week in New Jersey, by Accessory Inc.', 'img/accessory3.jpeg', 2, 1, 2, '436.10', '2015-02-02 04:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_has_tags`
--

CREATE TABLE IF NOT EXISTS `product_has_tags` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product_id` int(11) DEFAULT NULL,
  `fk_tags_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ph_id`),
  KEY `fk_tags_idx` (`fk_tags_id`),
  KEY `fk_product_idx` (`fk_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_has_tags`
--

INSERT INTO `product_has_tags` (`ph_id`, `fk_product_id`, `fk_tags_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(60) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'flower'),
(2, 'gold'),
(3, 'double chained'),
(4, 'peter pan'),
(5, 'crystalline'),
(6, 'blue');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
