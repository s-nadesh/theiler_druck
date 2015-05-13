-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 06:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theiler_druck`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_admins`
--

CREATE TABLE IF NOT EXISTS `td_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_profile_image` text NOT NULL,
  `admin_last_login` datetime NOT NULL,
  `admin_login_ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `td_admins`
--

INSERT INTO `td_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_profile_image`, `admin_last_login`, `admin_login_ip`, `created`, `modified`) VALUES
(1, 'Admin', 'admin@theilerdruck.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'LoF9l_device.png', '2015-05-12 18:31:13', '127.0.0.1', '2015-04-24 00:00:00', '2015-05-12 18:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `td_carts`
--

CREATE TABLE IF NOT EXISTS `td_carts` (
  `cart_id` char(36) NOT NULL,
  `cart_sessionid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_product_no_of_pages` double NOT NULL,
  `cart_product_no_of_copies` double NOT NULL,
  `paper_id` int(11) NOT NULL,
  `sh_cost_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_carts`
--

INSERT INTO `td_carts` (`cart_id`, `cart_sessionid`, `user_id`, `product_id`, `cart_product_no_of_pages`, `cart_product_no_of_copies`, `paper_id`, `sh_cost_id`, `cart_quantity`, `created`, `modified`) VALUES
('5549adbd-d5c8-4abf-8723-0c10ea533ad5', '', 1, 1, 8, 6000, 2, 0, 2, '2015-05-06 05:59:25', '2015-05-06 05:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `td_languages`
--

CREATE TABLE IF NOT EXISTS `td_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `english` varchar(500) NOT NULL,
  `german` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `td_languages`
--

INSERT INTO `td_languages` (`language_id`, `english`, `german`, `created`, `modified`) VALUES
(1, 'Register An Account', '', '2015-05-12 17:18:27', '2015-05-12 17:18:29'),
(2, 'Change Password', '', '2015-05-12 17:18:58', '2015-05-12 17:18:58'),
(3, 'New Password', '', '2015-05-12 17:18:58', '2015-05-12 17:18:58'),
(4, 'Confirm Password', '', '2015-05-12 17:18:58', '2015-05-12 17:18:58'),
(5, 'Forgot Password', '', '2015-05-12 17:18:58', '2015-05-12 17:18:58'),
(6, 'Email', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(7, 'Submit', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(8, 'Dashboard', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(9, 'Admin Login', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(10, 'Password', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(11, 'Sign in', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(12, 'Profile', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(13, 'Admin Profile', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(14, 'Name', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(15, 'Update Profile', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(16, 'Cart', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(17, 'Product', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(18, 'Price', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(19, 'Quantity', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(20, 'Total', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(21, 'No.of Pages', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(22, 'No.of Copies', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(23, 'Paper', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(24, 'Your cart is currently empty', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(25, 'Good For Print On Paper', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(26, 'Express Within 4 Days', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(27, 'Logout', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(28, 'Paper Variants', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(29, 'Products', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(30, 'Shipping Costs', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(31, 'Home', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(32, 'Details', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(33, 'Edit Paper Variant', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(34, 'Back', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(35, 'Paper Name', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(36, 'Range in milligram', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(37, 'Manage Paper Variants', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(38, 'Paper range in mg', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(39, 'Paper range in gram', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(40, 'Action', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(41, 'Edit', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(42, 'Product Add', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(43, 'Add Product', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(44, 'Product Name', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(45, 'Product Description', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(46, 'Product SKU', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(47, 'Product Factor', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(48, 'Product No.Of Pages', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(49, 'Product No.Of Copies', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(50, 'Product Image', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(51, 'Edit Product', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(52, 'Product Price Calculation', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(53, 'Price Calculation', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(54, 'Update Price Calculation', '', '2015-05-12 17:18:59', '2015-05-12 17:18:59'),
(55, 'Pages', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(56, 'Manage Products', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(57, 'Created', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(58, 'View', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(59, 'View Product', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(60, 'No of pages', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(61, 'No of copies', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(62, 'Papers', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(63, 'Zip code', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(64, 'Add to cart', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(65, 'Aditional Information', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(66, 'Reviews', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(67, 'Edit Shipping Cost', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(68, 'Target Zip From', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(69, 'Target Zip To', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(70, 'Basic Weight Price', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(71, 'Additional Weight Price', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(72, 'Manage Shipping Costs', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(73, 'Taget ZIP', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(74, 'Basic Price', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(75, 'Additional Price', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(76, 'Login', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(77, 'Welcome to Theiler Druck', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00'),
(78, 'Register', '', '2015-05-12 17:19:00', '2015-05-12 17:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_paper_variants`
--

CREATE TABLE IF NOT EXISTS `td_paper_variants` (
  `paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_rang_mgrm` double NOT NULL,
  `paper_rang_grm` double NOT NULL,
  `paper_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`paper_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_paper_variants`
--

INSERT INTO `td_paper_variants` (`paper_id`, `paper_rang_mgrm`, `paper_rang_grm`, `paper_name`, `created`, `modified`) VALUES
(1, 45, 0.045, 'weisslich Zeitungsdruck', '2015-04-25 00:00:00', '2015-05-11 14:05:31'),
(2, 52, 0.052, 'edelweiss aufgebessert', '2015-04-25 00:00:00', '2015-04-28 11:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `td_products`
--

CREATE TABLE IF NOT EXISTS `td_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_factor` double NOT NULL,
  `product_no_of_pages` longtext NOT NULL,
  `product_no_of_copies` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_products`
--

INSERT INTO `td_products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_sku`, `product_slug`, `product_factor`, `product_no_of_pages`, `product_no_of_copies`, `created`, `modified`) VALUES
(1, 'Newspaper broadsheet', '315mm x 480mm\r\n4-color printing\r\n2 frets with the exception of\r\n4 and 8 pages in length', 'QZMAV_pro5.jpg', 'product1', 'newspaper-broadsheet', 0.1512, '["4","8","12","16","20","24","28","32"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:21:54', '2015-05-06 05:21:54'),
(2, 'Newspaper Tabloid', '240mm x 315mm\r\n4-color printing\r\nkreuzgebÃ¼ndelt on Euro pallet', 'CdxbD_pro4.jpg', 'product2', 'newspaper-tabloid', 0.0756, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:44:53', '2015-05-06 05:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_prices`
--

CREATE TABLE IF NOT EXISTS `td_product_prices` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `pp_no_of_pages` double NOT NULL,
  `pp_no_of_copies` double NOT NULL,
  `pp_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `FK_td_product_prices` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `td_product_prices`
--

INSERT INTO `td_product_prices` (`pp_id`, `product_id`, `pp_no_of_pages`, `pp_no_of_copies`, `pp_price`, `created`, `modified`) VALUES
(1, 1, 4, 1000, 813, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(2, 1, 4, 5000, 936, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(3, 1, 4, 10000, 1089, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(4, 1, 4, -1, 29.1, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(5, 1, 8, 1000, 926, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(6, 1, 8, 5000, 1158, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(7, 1, 8, 10000, 1331, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(8, 1, 8, -1, 43.5, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(9, 1, 12, 1000, 1152, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(10, 1, 12, 5000, 1378, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(11, 1, 12, 10000, 1603, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(12, 1, 12, -1, 51.3, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(13, 1, 16, 1000, 1383, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(14, 1, 16, 5000, 1715, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(15, 1, 16, 10000, 2129, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(16, 1, 16, -1, 76.3, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(17, 1, 20, 1000, 1729, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(18, 1, 20, 5000, 2113, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(19, 1, 20, 10000, 2505, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(20, 1, 20, -1, 83.6, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(21, 1, 24, 1000, 1977, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(22, 1, 24, 5000, 2334, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(23, 1, 24, 10000, 2762, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(24, 1, 24, -1, 87.8, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(25, 1, 28, 1000, 2179, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(26, 1, 28, 5000, 2671, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(27, 1, 28, 10000, 3153, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(28, 1, 28, -1, 107.2, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(29, 1, 32, 1000, 2380, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(30, 1, 32, 5000, 2922, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(32, 1, 32, -1, 115.2, '2015-05-06 05:34:54', '2015-05-11 18:06:04'),
(33, 1, 32, 10000, 3505, '2015-05-11 18:06:04', '2015-05-11 18:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `td_shipping_costs`
--

CREATE TABLE IF NOT EXISTS `td_shipping_costs` (
  `sh_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_cost_zip_from` varchar(100) NOT NULL,
  `sh_cost_zip_to` varchar(100) NOT NULL,
  `sh_cost_basic_weight_price` double NOT NULL,
  `sh_cost_additional_weight_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`sh_cost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `td_shipping_costs`
--

INSERT INTO `td_shipping_costs` (`sh_cost_id`, `sh_cost_zip_from`, `sh_cost_zip_to`, `sh_cost_basic_weight_price`, `sh_cost_additional_weight_price`, `created`, `modified`) VALUES
(1, '1000', '1999', 180, 15, '2015-04-25 00:00:00', '2015-05-11 15:39:05'),
(2, '2000', '2999', 180, 12, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(3, '3000', '3999', 180, 10, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(4, '4000', '4999', 180, 8, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(5, '5000', '5999', 180, 6, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(6, '6000', '6999', 180, 5, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(7, '7000', '7999', 180, 7, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(8, '8000', '8999', 180, 3, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(9, '9000', '9999', 180, 5, '2015-04-25 00:00:00', '2015-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_users`
--

CREATE TABLE IF NOT EXISTS `td_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_login_ip` varchar(255) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_last_login`, `user_login_ip`, `user_status`, `created`, `modified`) VALUES
(1, 'Nadesh', 'test@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-05 07:03:44', '2015-05-05 07:03:44'),
(2, 'Nadesh', 'test1@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-05 07:07:47', '2015-05-05 07:07:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `td_product_prices`
--
ALTER TABLE `td_product_prices`
  ADD CONSTRAINT `FK_td_product_prices` FOREIGN KEY (`product_id`) REFERENCES `td_products` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
