-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2015 at 03:01 PM
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
(1, 'Admin', 'admin@theilerdruck.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'LoF9l_device.png', '2015-05-30 18:14:18', '127.0.0.1', '2015-04-24 00:00:00', '2015-05-30 18:14:18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

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
(80, 'With', 'mit', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(81, 'Remove this item', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(82, 'Additional Services', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(83, 'Calculate Shipping', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(84, 'Country', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(85, 'Update Totals', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(86, 'Cart Totals', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(87, 'Shipping Cost', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(88, 'Total Net', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(89, 'incl. 8% VAT.', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(90, 'Total Gross', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(91, 'Update Cart', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(92, 'Proceed to Checkout', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(93, 'Billing Address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(94, 'Shipping Address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(95, 'Payment Method', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(96, 'Summary', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(97, 'Company', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(98, 'required fields', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(99, 'Company or Individual', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(100, 'Company Name', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(101, 'Personal Data', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(102, 'Title', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(103, 'Firstname', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(104, 'Lastname', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(105, 'Your Address Details', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(106, 'Street/No', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(107, 'Additional address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(108, 'City', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(109, 'Post Code', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(110, 'Your Contact Information', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(111, 'Mobile', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(112, 'Phone', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(113, 'Continue your order', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(114, 'Registration', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(115, 'I am new here', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(116, 'Welcome on Theiler Druck AG', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(117, 'By logging in at Theiler Druck you are able to order more quick, know your order status at any time and you will always get an updated summary of your current orders.', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(118, 'Create Account', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(119, 'I already have an account', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(120, 'Billing Address Change', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(121, 'Shipping Address Change', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(122, 'Already have an account?', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(123, 'Login here', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(124, 'Date of Birth', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(125, 'Repeat Password', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(126, 'Choose Shipping Address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(127, 'Shipping address and billing address are identical', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(128, 'Create new shipping address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(129, 'Payment method change', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(130, 'Comment to the order', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(131, 'Your shopping cart contains the following products', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(132, 'Edit cart', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(133, 'View Cart', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(134, 'Register now', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(135, 'New here ?', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(136, 'My Account', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(137, 'Change Billing Address', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(138, 'Orders', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(139, 'Static Pages', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(140, 'Cms', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(141, 'Users', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(142, 'Manage Orders', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(143, 'Order ID', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(144, 'User Name', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(145, 'Amount', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(146, 'Status', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(147, 'View Order', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(148, 'Order #', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(149, 'Date of Order', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(150, 'Order Status', '', '2015-05-30 16:58:03', '2015-05-30 16:58:03'),
(151, 'No of Coipes', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(152, 'Paper', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(153, 'Comments', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(154, 'My Orders', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(155, 'Order Date', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(156, 'No records found', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(157, 'Order Details', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(158, 'Total Amount', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(159, 'Order Items', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(160, 'Add Page', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(161, 'Page Title', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(162, 'Page Description', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(163, 'Save Page', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(164, 'Manage Pages', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(165, 'Page Language', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(166, 'Descripition', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(167, 'Slug', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(168, 'Edit', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(169, 'Page', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(170, 'View Page', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(171, 'Page Slug', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(172, 'Page Status', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(173, 'Picture Upload', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(174, 'Add StaticPage', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(175, 'Language', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(176, 'Content', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(177, 'Edit StaticPage', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(178, 'Manage StaticPages', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(179, 'User', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(180, 'Edit User', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(181, 'User Email', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(182, 'User Status', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(183, 'Save User', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(184, 'Manage Users', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(185, 'View User', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(186, 'User Created', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04'),
(187, 'Edit Profile', '', '2015-05-30 16:58:04', '2015-05-30 16:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `td_language_types`
--

CREATE TABLE IF NOT EXISTS `td_language_types` (
  `language_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_type_name` varchar(200) NOT NULL,
  `language_type_code` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`language_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `td_orders`
--

CREATE TABLE IF NOT EXISTS `td_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_unique_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_billing_address` longtext NOT NULL,
  `order_shipping_address` longtext NOT NULL,
  `order_payment_method` longtext NOT NULL,
  `order_summary` longtext NOT NULL,
  `order_good_for_print_on_paper` double NOT NULL,
  `order_express_within_4_days` double NOT NULL,
  `order_total_weight` double NOT NULL,
  `order_shipping_cost` double NOT NULL,
  `order_total_net` double NOT NULL,
  `order_tax` double NOT NULL,
  `order_total_gross` double NOT NULL,
  `order_final_amount` double NOT NULL,
  `order_status` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_orders`
--

INSERT INTO `td_orders` (`order_id`, `order_unique_id`, `user_id`, `order_billing_address`, `order_shipping_address`, `order_payment_method`, `order_summary`, `order_good_for_print_on_paper`, `order_express_within_4_days`, `order_total_weight`, `order_shipping_cost`, `order_total_net`, `order_tax`, `order_total_gross`, `order_final_amount`, `order_status`, `created`, `modified`) VALUES
(1, 'TD-1432800126-ZHB', 1, '{"address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Test Street 2","address_additional":"Test","address_city":"Madu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"","address_phone":"123456"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":1,"name":"Cash on delivery","fee":"5.04CHF","caption":"Small information"}', '{"comment":""}', 6, 450, 326.592, 225, 3551.568, 308.832, 3860.4, 4541.4, '3', '2015-05-28 13:32:06', '2015-05-29 11:29:56'),
(2, 'TD-1432974359-HOH', 1, '{"address_company_type":"Company","address_company_name":"New Company","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Test Street 2","address_additional":"Test","address_city":"Madu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"","address_phone":"123456"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-05-30 13:56:00', '2015-05-30 13:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_order_items`
--

CREATE TABLE IF NOT EXISTS `td_order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_item_product_key` longtext NOT NULL,
  `order_item_product_value` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `FK_td_order_items` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_order_items`
--

INSERT INTO `td_order_items` (`order_item_id`, `order_id`, `order_item_product_key`, `order_item_product_value`, `created`, `modified`) VALUES
(1, 1, '1_4_6000_1', '{"product_id":"1","product_name":"Newspaper broadsheet","product_description":"315mm x 480mm\\r\\n4-color printing\\r\\n2 frets with the exception of\\r\\n4 and 8 pages in length","product_image":"QZMAV_pro5.jpg","product_sku":"product1","product_slug":"newspaper-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"6000","paper_id":"1","item_quantity":"4","item_picture_upload":"lQLGA_filter-icon.png","item_price":965.1,"item_sub_price":3860.4,"item_weight":81.648,"item_sub_weight":326.592,"cart_sessionid":"184d56aegbupnchoklailf3c40"}', '2015-05-28 13:32:06', '2015-05-28 13:32:06'),
(2, 2, '1_4_5000_1', '{"product_id":"1","product_name":"Newspaper broadsheet","product_description":"315mm x 480mm\\r\\n4-color printing\\r\\n2 frets with the exception of\\r\\n4 and 8 pages in length","product_image":"QZMAV_pro5.jpg","product_sku":"product1","product_slug":"newspaper-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_picture_upload":"","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"cart_sessionid":"duh00oak74np9h461b76tgmt32"}', '2015-05-30 13:56:00', '2015-05-30 13:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_pages`
--

CREATE TABLE IF NOT EXISTS `td_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_type_id` int(11) NOT NULL,
  `language_type_id` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_description` text NOT NULL,
  `page_status` smallint(6) NOT NULL,
  `page_slug` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `td_product_answers`
--

CREATE TABLE IF NOT EXISTS `td_product_answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `answer_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `td_product_questions`
--

CREATE TABLE IF NOT EXISTS `td_product_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `question_user_name` varchar(255) NOT NULL,
  `question_email` varchar(255) NOT NULL,
  `question_phone` varchar(255) NOT NULL,
  `question_subject` varchar(255) NOT NULL,
  `question_message` text NOT NULL,
  `question_status` char(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `user_dob` date DEFAULT '0000-00-00',
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_login_ip` varchar(255) NOT NULL,
  `user_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`user_id`, `user_name`, `user_dob`, `user_email`, `user_password`, `user_last_login`, `user_login_ip`, `user_status`, `created`, `modified`) VALUES
(1, 'Nadesh Ss', '1990-02-27', 'test@gmail.com', '95a93ec5b2292aa9e3c37e6ef95099d5faaa6289', '0000-00-00 00:00:00', '', '1', '2015-05-20 16:42:29', '2015-05-29 17:08:55'),
(2, 'Nadesh S', '2015-05-21', 'test1@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-21 18:33:39', '2015-05-21 18:33:39'),
(3, 'Nadesh S', '2015-05-26', 'test2@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-26 17:14:25', '2015-05-26 17:14:25'),
(4, 'Nadesh S', '2015-05-15', 'test3@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '2015-05-29 19:06:29', '2015-05-29 19:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `td_user_addresses`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `td_user_addresses`
--

INSERT INTO `td_user_addresses` (`address_id`, `user_id`, `address_type`, `address_title`, `address_firstname`, `address_lastname`, `address_company_type`, `address_company_name`, `address_street`, `address_additional`, `address_city`, `address_post_code`, `address_country`, `address_phone`, `address_mobile`, `created`, `modified`) VALUES
(1, 1, '0', 'Mr', 'Nadesh', 'S', 'Company', 'New Company', 'Test Street 2', 'Test', 'Madu', '123456', 'Switzerland', '123456', '', '2015-05-20 16:42:29', '2015-05-29 18:34:05'),
(2, 2, '0', 'Mr', 'Nadesh', 'S', 'Individual', '', 'Test Street 2', 'additional address', 'Mdu', '123', 'Switzerland', '1234567890', '', '2015-05-21 18:33:39', '2015-05-21 18:33:39'),
(3, 3, '0', 'Mr', 'Nadesh', 'S', 'Individual', '', 'test', 'Test', 'Mdu', '123', 'Switzerland', '123456', '', '2015-05-26 17:14:26', '2015-05-26 17:14:26'),
(4, 4, '0', 'Mr', 'Nadesh', 'S', 'Individual', '', 'Test Street 2', 'additional address', 'Mdu', '1000', 'Switzerland', '123', '', '2015-05-29 19:06:29', '2015-05-29 19:06:29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `td_order_items`
--
ALTER TABLE `td_order_items`
  ADD CONSTRAINT `FK_td_order_items` FOREIGN KEY (`order_id`) REFERENCES `td_orders` (`order_id`);

--
-- Constraints for table `td_product_prices`
--
ALTER TABLE `td_product_prices`
  ADD CONSTRAINT `FK_td_product_prices` FOREIGN KEY (`product_id`) REFERENCES `td_products` (`product_id`);

--
-- Constraints for table `td_user_addresses`
--
ALTER TABLE `td_user_addresses`
  ADD CONSTRAINT `FK_td_user_addresses` FOREIGN KEY (`user_id`) REFERENCES `td_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
