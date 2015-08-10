-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 08:25 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pandawe1_theiler_druck`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_admins`
--

DROP TABLE IF EXISTS `td_admins`;
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
(1, 'Theiler Druck Admin ', 'admin@theilerdruck.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'lk75Y_New_MotoX_default_wallpaper.jpg', '2015-05-18 16:14:22', '122.174.100.59', '2015-04-24 00:00:00', '2015-05-18 16:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `td_carts`
--

DROP TABLE IF EXISTS `td_carts`;
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

-- --------------------------------------------------------

--
-- Table structure for table `td_languages`
--

DROP TABLE IF EXISTS `td_languages`;
CREATE TABLE IF NOT EXISTS `td_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `english` varchar(500) NOT NULL,
  `german` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `td_languages`
--

INSERT INTO `td_languages` (`language_id`, `english`, `german`, `created`, `modified`) VALUES
(1, 'Register An Account', 'Konto erstellen', '2015-05-12 17:18:27', '2015-05-13 17:48:37'),
(2, 'Change Password', 'Passwort Ã¤ndern', '2015-05-12 17:18:58', '2015-05-13 15:31:48'),
(3, 'New Password', 'Neues Passwort', '2015-05-12 17:18:58', '2015-05-13 17:10:15'),
(4, 'Confirm Password', 'Passwort bestÃ¤tigen', '2015-05-12 17:18:58', '2015-05-13 15:31:56'),
(5, 'Forgot Password', 'Passwort vergessen', '2015-05-12 17:18:58', '2015-05-13 17:05:22'),
(6, 'Email', 'E-Mail', '2015-05-12 17:18:59', '2015-05-13 17:05:16'),
(7, 'Submit', 'Absenden', '2015-05-12 17:18:59', '2015-05-13 17:47:04'),
(8, 'Dashboard', 'Adminbereich', '2015-05-12 17:18:59', '2015-05-13 15:31:30'),
(9, 'Admin Login', 'Admin Login', '2015-05-12 17:18:59', '2015-05-13 15:24:45'),
(10, 'Password', 'Passwort', '2015-05-12 17:18:59', '2015-05-13 17:15:10'),
(11, 'Sign in', 'Anmelden', '2015-05-12 17:18:59', '2015-05-13 17:47:02'),
(12, 'Profile', 'Profil', '2015-05-12 17:18:59', '2015-05-13 17:34:03'),
(13, 'Admin Profile', 'Admin Profil', '2015-05-12 17:18:59', '2015-05-13 15:29:33'),
(14, 'Name', 'Name', '2015-05-12 17:18:59', '2015-05-13 17:10:12'),
(15, 'Update Profile', 'Profil aktualisieren', '2015-05-12 17:18:59', '2015-05-13 18:22:57'),
(16, 'Cart', 'Warenkorb', '2015-05-12 17:18:59', '2015-05-13 15:27:15'),
(17, 'Product', 'Produktauswahl', '2015-05-12 17:18:59', '2015-05-18 16:15:44'),
(18, 'Price', 'Preis', '2015-05-12 17:18:59', '2015-05-13 17:15:13'),
(19, 'Quantity', 'Menge', '2015-05-12 17:18:59', '2015-05-13 17:34:06'),
(20, 'Total', 'Summe', '2015-05-12 17:18:59', '2015-05-13 17:50:53'),
(21, 'No.of Pages', 'Umfang', '2015-05-12 17:18:59', '2015-05-13 17:10:28'),
(22, 'No.of Copies', 'Auflage', '2015-05-12 17:18:59', '2015-05-13 17:10:25'),
(23, 'Paper Weight', 'Papiergewicht', '2015-05-12 17:18:59', '2015-05-13 17:10:34'),
(24, 'Your cart is currently empty', 'Es befinden sich keine Artikel im Warenkorb', '2015-05-12 17:18:59', '2015-05-13 18:04:01'),
(25, 'Good For Print On Paper', 'Gut zum Druck auf Papier', '2015-05-12 17:18:59', '2015-05-13 17:05:26'),
(26, 'Express Within 4 Days', 'Express innerhalb 4 Tagen', '2015-05-12 17:18:59', '2015-05-13 17:05:18'),
(27, 'Logout', 'Abmelden', '2015-05-12 17:18:59', '2015-05-13 17:05:39'),
(28, 'Paper Variants', 'Papierarten', '2015-05-12 17:18:59', '2015-05-13 17:15:05'),
(29, 'Products', 'Produktauswahl', '2015-05-12 17:18:59', '2015-05-18 16:16:11'),
(30, 'Shipping Costs', 'Versandkosten', '2015-05-12 17:18:59', '2015-05-13 17:46:59'),
(31, 'Home', 'Startseite', '2015-05-12 17:18:59', '2015-05-13 17:05:29'),
(32, 'Details', 'Artikel ansehen', '2015-05-12 17:18:59', '2015-05-13 17:45:37'),
(33, 'Save Paper Variant', 'Papierarten Ã¼bernehmen', '2015-05-12 17:18:59', '2015-05-13 18:52:32'),
(34, 'Back', 'zurÃ¼ck', '2015-05-12 17:18:59', '2015-05-13 15:29:40'),
(35, 'Paper Name', 'Papierbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:53'),
(36, 'Range in milligram', 'Gewicht in mg', '2015-05-12 17:18:59', '2015-05-13 17:50:32'),
(37, 'Manage Paper Variants', 'Papierarten verwalten', '2015-05-12 17:18:59', '2015-05-13 17:06:03'),
(38, 'Paper range in mg', 'Papiergewicht in mg', '2015-05-12 17:18:59', '2015-05-13 17:50:40'),
(39, 'Paper range in gram', 'Papiergewicht in g', '2015-05-12 17:18:59', '2015-05-13 17:50:44'),
(40, 'Action', 'Aktion', '2015-05-12 17:18:59', '2015-05-13 15:14:02'),
(41, 'Save', 'bearbeiten', '2015-05-12 17:18:59', '2015-05-13 20:38:55'),
(42, 'Product Add', 'Artikel hinzufÃ¼gen', '2015-05-12 17:18:59', '2015-05-13 17:15:21'),
(43, 'Add Product', 'Produkt hinzufÃ¼gen', '2015-05-12 17:18:59', '2015-05-13 15:14:06'),
(44, 'Product Name', 'Artikelname', '2015-05-12 17:18:59', '2015-05-13 17:33:45'),
(45, 'Product Description', 'Artikelbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:24'),
(46, 'Product SKU', 'Artikel SKU', '2015-05-12 17:18:59', '2015-05-13 17:33:58'),
(47, 'Product Factor', 'Faktor', '2015-05-12 17:18:59', '2015-05-13 17:33:40'),
(48, 'Product No.Of Pages', 'Artikelumfang', '2015-05-12 17:18:59', '2015-05-13 17:33:50'),
(49, 'Product No.Of Copies', 'Artikelauflage', '2015-05-12 17:18:59', '2015-05-13 17:33:47'),
(50, 'Product Image', 'Artikelbild', '2015-05-12 17:18:59', '2015-05-13 17:33:42'),
(51, 'Save Product', 'Artikel Ã¼bernehmen', '2015-05-12 17:18:59', '2015-05-13 18:38:12'),
(52, 'Product Price Calculation', 'Artikel Preisberechnung', '2015-05-12 17:18:59', '2015-05-13 17:33:55'),
(53, 'Price Calculation', 'Preis Kalkulation', '2015-05-12 17:18:59', '2015-05-13 17:15:16'),
(54, 'Update Price Calculation', 'Preisberechnung aktualisieren', '2015-05-12 17:18:59', '2015-05-13 18:23:25'),
(55, 'Pages', 'Seiten', '2015-05-12 17:19:00', '2015-05-13 17:10:31'),
(56, 'Manage Products', 'Artikel verwalten', '2015-05-12 17:19:00', '2015-05-13 17:06:00'),
(57, 'Created', 'erstellt', '2015-05-12 17:19:00', '2015-05-13 15:32:53'),
(58, 'View', 'ansehen', '2015-05-12 17:19:00', '2015-05-13 18:23:31'),
(59, 'View Product', 'Artikel ansehen', '2015-05-12 17:19:00', '2015-05-13 18:04:06'),
(60, 'No of pages', 'Umfang', '2015-05-12 17:19:00', '2015-05-13 17:10:20'),
(61, 'No of copies', 'Auflage', '2015-05-12 17:19:00', '2015-05-13 17:10:17'),
(62, 'Papers', 'Papiere', '2015-05-12 17:19:00', '2015-05-13 17:15:08'),
(63, 'Zip code', 'PLZ', '2015-05-12 17:19:00', '2015-05-13 18:03:57'),
(64, 'Add to cart', 'In den Warenkorb', '2015-05-12 17:19:00', '2015-05-13 18:19:03'),
(65, 'Aditional Information', 'Zusatzinformationen', '2015-05-12 17:19:00', '2015-05-13 15:24:42'),
(66, 'Reviews', 'Bewertungen', '2015-05-12 17:19:00', '2015-05-13 17:46:55'),
(67, 'Save Shipping Cost', 'Versandkosten Ã¼bernehmen', '2015-05-12 17:19:00', '2015-05-13 18:30:39'),
(68, 'Target Zip From', 'Ziel PLZ von', '2015-05-12 17:19:00', '2015-05-13 17:47:13'),
(69, 'Target Zip To', 'Ziel PLZ nach', '2015-05-12 17:19:00', '2015-05-13 17:47:15'),
(70, 'Basic Weight Price', 'Grundpreis Gewicht', '2015-05-12 17:19:00', '2015-05-13 15:31:41'),
(71, 'Additional Weight Price', 'Zusatzpreis fÃ¼r Gewicht', '2015-05-12 17:19:00', '2015-05-13 15:29:26'),
(72, 'Manage Shipping Costs', 'Versandkosten verwalten', '2015-05-12 17:19:00', '2015-05-13 17:10:10'),
(73, 'Taget ZIP', 'Ziel PLZ', '2015-05-12 17:19:00', '2015-05-13 17:47:09'),
(74, 'Basic Price', 'Grundpreis', '2015-05-12 17:19:00', '2015-05-13 20:38:05'),
(75, 'Additional Price', 'Mehrpreis', '2015-05-12 17:19:00', '2015-05-13 15:30:39'),
(76, 'Login', 'Anmelden', '2015-05-12 17:19:00', '2015-05-13 17:05:32'),
(77, 'Welcome to Theiler Druck', 'Willkommen bei Theiler Druck', '2015-05-12 17:19:00', '2015-05-13 18:04:03'),
(78, 'Register', 'Registrieren', '2015-05-12 17:19:00', '2015-05-13 17:48:38'),
(79, 'With Out', 'ohne', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(80, 'With', 'mit', '2015-05-18 00:00:00', '2015-05-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_paper_variants`
--

DROP TABLE IF EXISTS `td_paper_variants`;
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
(1, 45, 0.045, 'weisslich Zeitungsdruck', '2015-04-25 00:00:00', '2015-05-06 13:49:56'),
(2, 52, 0.052, 'edelweiss aufgebessert', '2015-04-25 00:00:00', '2015-04-28 11:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `td_products`
--

DROP TABLE IF EXISTS `td_products`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `td_products`
--

INSERT INTO `td_products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_sku`, `product_slug`, `product_factor`, `product_no_of_pages`, `product_no_of_copies`, `created`, `modified`) VALUES
(1, 'Zeitung Broadsheet', '315 mm x 480 mm\r\nDruck 4-farbig\r\n2 BÃ¼nde mit Ausnahme von\r\n4 und 8 Seiten Umfang', 'wSd6V_zeitung.jpg', '000000', 'zeitung-broadsheet', 0.1512, '["4","8","12","16","20","24","28","32"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:21:54', '2015-05-13 21:50:20'),
(2, 'Zeitung Tabloid', '240mm x 315mm		\r\nDruck 4-farbig		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'uWOea_zeitung.jpg', '0000000', 'zeitung-tabloid', 0.0756, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:44:53', '2015-05-13 21:50:04'),
(3, 'BroschÃ¼ren A4', '210x297\r\ngeheftet\r\nDruck 4-farbig\r\nkreuzgebÃ¼ndelt on Euro pallet', '6rWz4_broschuere.jpg', '00000000', 'broschueren-a4', 0.0624, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:33:01', '2015-05-13 21:45:46'),
(4, 'BroschÃ¼ren A5', '148 x 210		\r\ngeheftet		\r\nDruck 4-farbig		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'dEuNW_broschuereA5.jpg', 'product4', 'broschueren-a5', 0.0311, '["16","32","48","64","80","96","112","128"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:41:32', '2015-05-13 21:49:21'),
(5, 'Preislisten A4', '210x297		\r\ngeheftet		\r\nDruck 1-farbig schwarz		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'yMn6v_preisliste.jpg', '000000', 'preislisten-a4', 0.0624, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:43:53', '2015-05-13 21:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_prices`
--

DROP TABLE IF EXISTS `td_product_prices`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `td_product_prices`
--

INSERT INTO `td_product_prices` (`pp_id`, `product_id`, `pp_no_of_pages`, `pp_no_of_copies`, `pp_price`, `created`, `modified`) VALUES
(1, 1, 4, 1000, 813, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(2, 1, 4, 5000, 936, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(3, 1, 4, 10000, 1089, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(4, 1, 4, -1, 29.1, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(5, 1, 8, 1000, 926, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(6, 1, 8, 5000, 1158, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(7, 1, 8, 10000, 1331, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(8, 1, 8, -1, 43.5, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(9, 1, 12, 1000, 1152, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(10, 1, 12, 5000, 1378, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(11, 1, 12, 10000, 1603, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(12, 1, 12, -1, 51.3, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(13, 1, 16, 1000, 1383, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(14, 1, 16, 5000, 1715, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(15, 1, 16, 10000, 2129, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(16, 1, 16, -1, 76.3, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(17, 1, 20, 1000, 1729, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(18, 1, 20, 5000, 2113, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(19, 1, 20, 10000, 2505, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(20, 1, 20, -1, 83.6, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(21, 1, 24, 1000, 1977, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(22, 1, 24, 5000, 2334, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(23, 1, 24, 10000, 2762, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(24, 1, 24, -1, 87.8, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(25, 1, 28, 1000, 2179, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(26, 1, 28, 5000, 2671, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(27, 1, 28, 10000, 3153, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(28, 1, 28, -1, 107.2, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(29, 1, 32, 1000, 2380, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(30, 1, 32, 5000, 2922, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(31, 1, 32, 10000, 3505, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(32, 1, 32, -1, 115.2, '2015-05-06 05:34:54', '2015-05-06 05:34:54'),
(33, 2, 8, 1000, 908, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(34, 2, 8, 5000, 1030, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(35, 2, 8, 10000, 1176, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(36, 2, 8, -1, 29.3, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(37, 2, 16, 1000, 1116, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(38, 2, 16, 5000, 1261, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(39, 2, 16, 10000, 1437, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(40, 2, 16, -1, 37.5, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(41, 2, 24, 1000, 1303, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(42, 2, 24, 5000, 1488, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(43, 2, 24, 10000, 1731, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(44, 2, 24, -1, 50.5, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(45, 2, 32, 1000, 1756, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(46, 2, 32, 5000, 1984, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(47, 2, 32, 10000, 2600, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(48, 2, 32, -1, 80.3, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(49, 2, 40, 1000, 2015, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(50, 2, 40, 5000, 2282, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(51, 2, 40, 10000, 2705, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(52, 2, 40, -1, 78.1, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(53, 2, 48, 1000, 2212, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(54, 2, 48, 5000, 2520, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(55, 2, 48, 10000, 2983, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(56, 2, 48, -1, 88.4, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(57, 2, 56, 1000, 2551, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(58, 2, 56, 5000, 2902, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(59, 2, 56, 10000, 3405, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(60, 2, 56, -1, 99.6, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(61, 2, 64, 1000, 2750, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(62, 2, 64, 5000, 3273, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(63, 2, 64, 10000, 3785, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(64, 2, 64, -1, 111.4, '2015-05-08 05:10:39', '2015-05-08 05:10:39'),
(65, 5, 8, 1000, 813, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(66, 5, 8, 5000, 936, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(67, 5, 8, 10000, 1089, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(68, 5, 8, -1, 29, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(69, 5, 16, 1000, 926, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(70, 5, 16, 5000, 1158, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(71, 5, 16, 10000, 1331, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(72, 5, 16, -1, 43, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(73, 5, 24, 1000, 1152, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(74, 5, 24, 5000, 1378, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(75, 5, 24, 10000, 1603, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(76, 5, 24, -1, 51, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(77, 5, 32, 1000, 1383, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(78, 5, 32, 5000, 1715, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(79, 5, 32, 10000, 2129, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(80, 5, 32, -1, 76, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(81, 5, 40, 1000, 1729, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(82, 5, 40, 5000, 2116, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(83, 5, 40, 10000, 2505, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(84, 5, 40, -1, 83, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(85, 5, 48, 1000, 1977, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(86, 5, 48, 5000, 2334, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(87, 5, 48, 10000, 2762, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(88, 5, 48, -1, 87, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(89, 5, 56, 1000, 2179, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(90, 5, 56, 5000, 2671, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(91, 5, 56, 10000, 3153, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(92, 5, 56, -1, 107, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(93, 5, 64, 1000, 2380, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(94, 5, 64, 5000, 2922, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(95, 5, 64, 10000, 3505, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(96, 5, 64, -1, 115, '2015-05-13 20:41:31', '2015-05-13 20:41:31'),
(97, 3, 8, 1000, 813, '2015-05-13 20:42:48', '2015-05-13 20:45:39'),
(98, 3, 8, 5000, 936, '2015-05-13 20:42:48', '2015-05-13 20:45:39'),
(99, 3, 8, 10000, 1089, '2015-05-13 20:42:48', '2015-05-13 20:45:39'),
(100, 3, 8, -1, 29.1, '2015-05-13 20:42:48', '2015-05-13 20:45:39'),
(101, 3, 16, 1000, 926, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(102, 3, 16, 5000, 1158, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(103, 3, 16, 10000, 1331, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(104, 3, 16, -1, 43.5, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(105, 3, 24, 1000, 1152, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(106, 3, 24, 5000, 1378, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(107, 3, 24, 10000, 1603, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(108, 3, 24, -1, 51.3, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(109, 3, 32, 1000, 1383, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(110, 3, 32, 5000, 1715, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(111, 3, 32, 10000, 2129, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(112, 3, 32, -1, 76.3, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(113, 3, 40, 1000, 1729, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(114, 3, 40, 5000, 2113, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(115, 3, 40, 10000, 2505, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(116, 3, 40, -1, 83.6, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(117, 3, 48, 1000, 1977, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(118, 3, 48, 5000, 2334, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(119, 3, 48, 10000, 2762, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(120, 3, 48, -1, 87.8, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(121, 3, 56, 1000, 2179, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(122, 3, 56, 5000, 2671, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(123, 3, 56, 10000, 3153, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(124, 3, 56, -1, 107.2, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(125, 3, 64, 1000, 2380, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(126, 3, 64, 5000, 2922, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(127, 3, 64, 10000, 3505, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(128, 3, 64, -1, 115.2, '2015-05-13 20:45:39', '2015-05-13 20:45:39'),
(129, 4, 16, 1000, 813, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(130, 4, 16, 5000, 936, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(131, 4, 16, 10000, 1089, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(132, 4, 16, -1, 29.1, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(133, 4, 32, 1000, 926, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(134, 4, 32, 5000, 1158, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(135, 4, 32, 10000, 1331, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(136, 4, 32, -1, 43.5, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(137, 4, 48, 1000, 1152, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(138, 4, 48, 5000, 1378, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(139, 4, 48, 10000, 1603, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(140, 4, 48, -1, 51.3, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(141, 4, 64, 1000, 1383, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(142, 4, 64, 5000, 1715, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(143, 4, 64, 10000, 2129, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(144, 4, 64, -1, 76.3, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(145, 4, 80, 1000, 1729, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(146, 4, 80, 5000, 2113, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(147, 4, 80, 10000, 2505, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(148, 4, 80, -1, 83.6, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(149, 4, 96, 1000, 1977, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(150, 4, 96, 5000, 2334, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(151, 4, 96, 10000, 2762, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(152, 4, 96, -1, 87.8, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(153, 4, 112, 1000, 2179, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(154, 4, 112, 5000, 2671, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(155, 4, 112, 10000, 3153, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(156, 4, 112, -1, 107.2, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(157, 4, 128, 1000, 2380, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(158, 4, 128, 5000, 2922, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(159, 4, 128, 10000, 3505, '2015-05-13 20:48:27', '2015-05-13 20:48:27'),
(160, 4, 128, -1, 115.2, '2015-05-13 20:48:27', '2015-05-13 20:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `td_shipping_costs`
--

DROP TABLE IF EXISTS `td_shipping_costs`;
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
(1, '1000', '1999', 180, 15, '2015-04-25 00:00:00', '2015-04-28 12:42:10'),
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

DROP TABLE IF EXISTS `td_users`;
CREATE TABLE IF NOT EXISTS `td_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_dob` date DEFAULT '0000-00-00',
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_login_ip` varchar(255) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`user_id`, `user_name`, `user_dob`, `user_email`, `user_password`, `user_last_login`, `user_login_ip`, `user_status`, `created`, `modified`) VALUES
(1, 'Nadesh S', '2015-05-19', 'test@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-19 19:26:37', '2015-05-19 19:26:37'),
(2, 'julius molnar', '0000-00-00', 'webmaster@flashartists.de', '893906ab038c221d6557843d2c0a40a71bb635d3', '0000-00-00 00:00:00', '', '1', '2015-05-19 21:07:53', '2015-05-19 21:07:53'),
(3, 'Nadesh S', '1990-02-27', 'test1@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-20 18:02:21', '2015-05-20 18:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `td_user_addresses`
--

DROP TABLE IF EXISTS `td_user_addresses`;
CREATE TABLE IF NOT EXISTS `td_user_addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_type` char(1) NOT NULL DEFAULT '1' COMMENT '0 - Billing, 1 - Shipping',
  `address_title` varchar(10) NOT NULL,
  `address_firstname` varchar(100) NOT NULL,
  `address_lastname` varchar(100) NOT NULL,
  `address_company_type` varchar(50) NOT NULL,
  `address_company_name` varchar(100) NOT NULL,
  `address_street` varchar(250) NOT NULL,
  `address_additional` varchar(250) NOT NULL,
  `address_city` varchar(250) NOT NULL,
  `address_post_code` varchar(100) NOT NULL,
  `address_country` varchar(100) NOT NULL,
  `address_phone` varchar(100) NOT NULL,
  `address_mobile` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `FK_td_user_addresses` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_user_addresses`
--

INSERT INTO `td_user_addresses` (`address_id`, `user_id`, `address_type`, `address_title`, `address_firstname`, `address_lastname`, `address_company_type`, `address_company_name`, `address_street`, `address_additional`, `address_city`, `address_post_code`, `address_country`, `address_phone`, `address_mobile`, `created`, `modified`) VALUES
(1, 1, '0', 'Mr', 'Nadesh', 'S', 'Company', 'New Company', 'Test Street 2', '', 'Test City', '123456', 'Switzerland', '1234567890', '', '2015-05-19 19:26:37', '2015-05-19 19:26:37'),
(2, 2, '0', 'Mr', 'julius', 'molnar', 'Individual', '', 'FrÃ¶lichstr. 10 1/3', '', 'Augsburg', '86150', 'Switzerland', '0821 512662', '', '2015-05-19 21:07:53', '2015-05-19 21:07:53'),
(3, 3, '0', 'Mr', 'Nadesh', 'S', 'Company', 'Company Name', 'Testing', '', 'Mdu', '123', 'Switzerland', '1234567890', '123', '2015-05-20 18:02:21', '2015-05-20 18:02:21');

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
