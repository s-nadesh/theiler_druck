-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 11:16 PM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `_get_json_token`$$
$$

--
-- Functions
--
DROP FUNCTION IF EXISTS `encode_xml`$$
$$

DROP FUNCTION IF EXISTS `extract_json_value`$$
$$

DROP FUNCTION IF EXISTS `json_to_xml`$$
$$

DROP FUNCTION IF EXISTS `trim_wspace`$$
$$

DROP FUNCTION IF EXISTS `unquote`$$
$$

DELIMITER ;

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
  `admin_bank_info` text,
  `admin_last_login` datetime NOT NULL,
  `admin_login_ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `td_admins`
--

INSERT INTO `td_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_profile_image`, `admin_bank_info`, `admin_last_login`, `admin_login_ip`, `created`, `modified`) VALUES
(1, 'Theiler Druck Admin ', 'admin@theilerdruck.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'VeNRz_logo.jpg', '{"owner_name":"Owner Name","bank_name":"Bank name","bank_account_number":"12323123123123","blz":"72090200","bic":"ANHODE77XXX","iban":"DE73720302270052845301","bank_information":"Bank info"}', '2015-06-16 20:29:48', '88.67.58.164', '2015-04-24 00:00:00', '2015-06-16 20:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `td_contact_addresses`
--

DROP TABLE IF EXISTS `td_contact_addresses`;
CREATE TABLE IF NOT EXISTS `td_contact_addresses` (
  `cont_addr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_addr_type` enum('DF','A1','A2') NOT NULL DEFAULT 'DF',
  `cont_addr_company` varchar(100) NOT NULL,
  `cont_addr_address_1` varchar(255) NOT NULL,
  `cont_addr_address_2` varchar(255) DEFAULT NULL,
  `cont_addr_email` varchar(100) NOT NULL,
  `cont_addr_email_2` varchar(100) DEFAULT NULL,
  `cont_addr_email_3` varchar(100) DEFAULT NULL,
  `cont_addr_fax` varchar(50) DEFAULT NULL,
  `cont_addr_phone` varchar(50) NOT NULL,
  `cont_addr_country` varchar(100) NOT NULL,
  `cont_addr_website` varchar(255) DEFAULT NULL,
  `cont_addr_facebook` varchar(255) DEFAULT NULL,
  `cont_addr_twitter` varchar(255) DEFAULT NULL,
  `cont_addr_linkedin` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`cont_addr_id`),
  UNIQUE KEY `NewIndex1` (`cont_addr_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_contact_addresses`
--

INSERT INTO `td_contact_addresses` (`cont_addr_id`, `cont_addr_type`, `cont_addr_company`, `cont_addr_address_1`, `cont_addr_address_2`, `cont_addr_email`, `cont_addr_email_2`, `cont_addr_email_3`, `cont_addr_fax`, `cont_addr_phone`, `cont_addr_country`, `cont_addr_website`, `cont_addr_facebook`, `cont_addr_twitter`, `cont_addr_linkedin`, `created`, `modified`) VALUES
(1, 'DF', 'Theiler Druck AG', 'Verenastrasse 2', '8832 Wollerau', 'info@theilerdruck.ch', '', '', '044 787 03 01', '044 787 03 00', 'Switzerland', '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-16 13:53:42'),
(2, 'A1', 'Hofner Volksblatt', 'Verenastrasse 2 ', '8832 Wollerau ', 'redaktion@hoefner.ch', 'redaktion@hoefner.ch', '', '044 787 03 10', '044 787 03 03', 'Switzerland', 'http://www.hoefner.ch', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-12 17:59:48'),
(3, 'A2', 'March-Anzeiger', 'Alpenblickstrasse 26', '8853 Lachen', 'redaktion@marchanzeiger.ch', 'inserate@theilermediaservice.ch', '', '055 451 08 89', '055 451 08 88', 'Switzerland', 'http://www.marchenzeiger.ch', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-12 18:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `td_contact_persons`
--

DROP TABLE IF EXISTS `td_contact_persons`;
CREATE TABLE IF NOT EXISTS `td_contact_persons` (
  `cont_pers_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_pers_name` varchar(255) NOT NULL,
  `cont_pers_email` varchar(255) NOT NULL,
  `cont_pers_position` varchar(100) NOT NULL,
  `cont_pers_phone` varchar(50) NOT NULL,
  `cont_pers_image` varchar(500) DEFAULT NULL,
  `cont_pers_level` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`cont_pers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `td_contact_persons`
--

INSERT INTO `td_contact_persons` (`cont_pers_id`, `cont_pers_name`, `cont_pers_email`, `cont_pers_position`, `cont_pers_phone`, `cont_pers_image`, `cont_pers_level`, `created`, `modified`) VALUES
(1, 'Walter Feldman', 'w.feldman@theilerdruck.ch', 'GeschÃ¤ftsfÃ¼her', '044 787 03 65', 'G6Xge_contact-person1.png', 1, '2015-06-11 12:55:35', '2015-06-11 12:55:35'),
(2, 'Michel Schwander', 'm.schwander@theilerdruck.ch', 'Leiter Verkauf Innendienst', '044 787 03 69 ', 'KoGKM_contact-person2.png', 2, '2015-06-11 13:14:05', '2015-06-11 13:14:05'),
(3, 'Roland Bachmann', 'r.bachman@theilerdruck.ch', 'Kundenberater', '044 787 03 06', 'Qp7wa_contact-person3.png', 2, '2015-06-11 13:14:40', '2015-06-11 13:14:40'),
(4, 'Heinz Burgi ', 'h.buergi@theilerdruck.ch', 'Kundenberater VID', '044 787 03 02', 'tQyS3_contact-person4.png', 2, '2015-06-11 13:15:22', '2015-06-15 22:01:41'),
(5, 'Herbert Steiner ', 'h.steiner@theilerdruck.ch', 'Kundenberater VID', '044 787 03 68', 'TaXjT_contact-person5.png', 2, '2015-06-11 13:15:54', '2015-06-15 22:01:18'),
(6, 'Rolf Meister ', 'r.meister@theilerdruck.ch', 'Leiter Druckvostufe', '044 787 03 07', 'o50V2_contact-person6.png', 3, '2015-06-11 13:16:26', '2015-06-11 13:16:26'),
(7, 'Guido Weber ', 'g.weber@theilerdruck.ch', 'Leiter Druck', '044 787 03 67', 'tVb9D_contact-person7.png', 3, '2015-06-11 13:16:59', '2015-06-11 13:16:59'),
(8, 'Tim Kafitzz', 't.kafitz@theilerdruck.ch', 'Abteilungsleiter AusrÃ¼sterei und Spedition', '044 786 09 00', 'hqonb_contact-person8.png', 3, '2015-06-11 13:17:29', '2015-06-11 13:46:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=336 ;

--
-- Dumping data for table `td_languages`
--

INSERT INTO `td_languages` (`language_id`, `english`, `german`, `created`, `modified`) VALUES
(1, 'Register An Account', 'Konto erstellen', '2015-05-12 17:18:27', '2015-05-13 17:48:37'),
(2, 'Change Password', 'Passwort ÃƒÂ¤ndern', '2015-05-12 17:18:58', '2015-05-13 15:31:48'),
(3, 'New Password', 'Neues Passwort', '2015-05-12 17:18:58', '2015-05-13 17:10:15'),
(4, 'Confirm Password', 'Passwort bestÃƒÂ¤tigen', '2015-05-12 17:18:58', '2015-05-13 15:31:56'),
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
(17, 'Product', 'Produktauswahl', '2015-05-12 17:18:59', '2015-06-02 03:53:18'),
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
(29, 'Products', 'Produkte', '2015-05-12 17:18:59', '2015-06-16 21:42:19'),
(30, 'Shipping Costs', 'Versandkosten', '2015-05-12 17:18:59', '2015-05-13 17:46:59'),
(31, 'Home', 'Startseite', '2015-05-12 17:18:59', '2015-05-13 17:05:29'),
(32, 'Details', 'Artikel ansehen', '2015-05-12 17:18:59', '2015-05-13 17:45:37'),
(33, 'Save Paper Variant', 'Papierarten ÃƒÂ¼bernehmen', '2015-05-12 17:18:59', '2015-05-13 18:52:32'),
(34, 'Back', 'zurÃ¼ck', '2015-05-12 17:18:59', '2015-06-16 18:52:16'),
(35, 'Paper Name', 'Papierbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:53'),
(36, 'Range in milligram', 'Gewicht in mg', '2015-05-12 17:18:59', '2015-05-13 17:50:32'),
(37, 'Manage Paper Variants', 'Papierarten verwalten', '2015-05-12 17:18:59', '2015-05-13 17:06:03'),
(38, 'Paper range in mg', 'Papiergewicht in mg', '2015-05-12 17:18:59', '2015-05-13 17:50:40'),
(39, 'Paper range in gram', 'Papiergewicht in g', '2015-05-12 17:18:59', '2015-05-13 17:50:44'),
(40, 'Action', 'Aktion', '2015-05-12 17:18:59', '2015-05-13 15:14:02'),
(41, 'Save', 'bearbeiten', '2015-05-12 17:18:59', '2015-06-16 21:33:49'),
(42, 'Product Add', 'Artikel hinzufÃƒÂ¼gen', '2015-05-12 17:18:59', '2015-05-13 17:15:21'),
(43, 'Add Product', 'Produkt hinzufÃƒÂ¼gen', '2015-05-12 17:18:59', '2015-05-13 15:14:06'),
(44, 'Product Name', 'Artikelname', '2015-05-12 17:18:59', '2015-05-13 17:33:45'),
(45, 'Product Description', 'Artikelbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:24'),
(46, 'Product SKU', 'Artikel SKU', '2015-05-12 17:18:59', '2015-05-13 17:33:58'),
(47, 'Product Factor', 'Faktor', '2015-05-12 17:18:59', '2015-05-13 17:33:40'),
(48, 'Product No.Of Pages', 'Artikelumfang', '2015-05-12 17:18:59', '2015-05-13 17:33:50'),
(49, 'Product No.Of Copies', 'Artikelauflage', '2015-05-12 17:18:59', '2015-05-13 17:33:47'),
(50, 'Product Image', 'Artikelbild', '2015-05-12 17:18:59', '2015-05-13 17:33:42'),
(51, 'Save Product', 'Artikel ÃƒÂ¼bernehmen', '2015-05-12 17:18:59', '2015-05-13 18:38:12'),
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
(67, 'Save Shipping Cost', 'Versandkosten ÃƒÂ¼bernehmen', '2015-05-12 17:19:00', '2015-05-13 18:30:39'),
(68, 'Target Zip From', 'Ziel PLZ von', '2015-05-12 17:19:00', '2015-05-13 17:47:13'),
(69, 'Target Zip To', 'Ziel PLZ nach', '2015-05-12 17:19:00', '2015-05-13 17:47:15'),
(70, 'Basic Weight Price', 'Grundpreis Gewicht', '2015-05-12 17:19:00', '2015-05-13 15:31:41'),
(71, 'Additional Weight Price', 'Zusatzpreis fÃƒÂ¼r Gewicht', '2015-05-12 17:19:00', '2015-05-13 15:29:26'),
(72, 'Manage Shipping Costs', 'Versandkosten verwalten', '2015-05-12 17:19:00', '2015-05-13 17:10:10'),
(73, 'Taget ZIP', 'Ziel PLZ', '2015-05-12 17:19:00', '2015-05-13 17:47:09'),
(74, 'Basic Price', 'Grundpreis', '2015-05-12 17:19:00', '2015-05-13 20:38:05'),
(75, 'Additional Price', 'Mehrpreis', '2015-05-12 17:19:00', '2015-05-13 15:30:39'),
(76, 'Login', 'Anmelden', '2015-05-12 17:19:00', '2015-05-13 17:05:32'),
(77, 'Welcome to Theiler Druck', 'Willkommen bei Theiler Druck', '2015-05-12 17:19:00', '2015-05-13 18:04:03'),
(78, 'Register', 'Registrieren', '2015-05-12 17:19:00', '2015-05-13 17:48:38'),
(79, 'With Out', 'ohne', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(80, 'With', 'mit', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(81, 'Remove this item', 'Diesen Artikel entfernen', '2015-05-30 16:58:03', '2015-06-02 03:53:53'),
(82, 'Additional Services', 'ZusÃƒÂ¤tzlicher Service', '2015-05-30 16:58:03', '2015-06-02 03:38:56'),
(83, 'Calculate Shipping', 'Versand berechnen', '2015-05-30 16:58:03', '2015-06-02 03:41:57'),
(84, 'Country', 'Land', '2015-05-30 16:58:03', '2015-06-02 03:44:37'),
(85, 'Update Totals', 'Summen aktualisieren', '2015-05-30 16:58:03', '2015-06-02 03:57:58'),
(86, 'Cart Totals', 'Warenkorb Gesamt', '2015-05-30 16:58:03', '2015-06-02 03:42:23'),
(87, 'Shipping Cost', 'Versandkosten', '2015-05-30 16:58:03', '2015-06-02 03:55:18'),
(88, 'Total Net', 'Gesamtnetto', '2015-05-30 16:58:03', '2015-06-02 03:57:03'),
(89, 'incl. 8% VAT.', 'inkl. 8% USt.', '2015-05-30 16:58:03', '2015-06-02 03:47:14'),
(90, 'Total Gross', 'Gesamtbrutto', '2015-05-30 16:58:03', '2015-06-02 03:57:01'),
(91, 'Update Cart', 'Warenkorb aktualisieren', '2015-05-30 16:58:03', '2015-06-02 03:57:41'),
(92, 'Proceed to Checkout', 'Zur Kasse gehen', '2015-05-30 16:58:03', '2015-06-02 04:15:07'),
(93, 'Billing Address', 'Rechnungsadresse', '2015-05-30 16:58:03', '2015-06-02 03:40:02'),
(94, 'Shipping Address', 'Versandadresse ', '2015-05-30 16:58:03', '2015-06-02 03:54:48'),
(95, 'Payment Method', 'Zahlungsmethode', '2015-05-30 16:58:03', '2015-06-02 04:14:46'),
(96, 'Summary', 'Zusammenfassung', '2015-05-30 16:58:03', '2015-06-02 03:56:05'),
(97, 'Company', 'Firma', '2015-05-30 16:58:03', '2015-06-02 03:43:32'),
(98, 'required fields', 'Obligatorische Felder', '2015-05-30 16:58:03', '2015-06-02 03:54:25'),
(99, 'Company or Individual', 'Firma oder Privatperson', '2015-05-30 16:58:03', '2015-06-02 03:44:09'),
(100, 'Company Name', 'Firmenname', '2015-05-30 16:58:03', '2015-06-02 03:43:38'),
(101, 'Personal Data', 'PesÃƒÂ¶nliche Daten', '2015-05-30 16:58:03', '2015-06-02 03:52:35'),
(102, 'Title', 'Titel', '2015-05-30 16:58:03', '2015-06-02 03:56:10'),
(103, 'Firstname', 'Vorname', '2015-05-30 16:58:03', '2015-06-02 03:46:33'),
(104, 'Lastname', 'Nachname', '2015-05-30 16:58:03', '2015-06-02 03:47:26'),
(105, 'Your Address Details', 'Ihre Adressedaten', '2015-05-30 16:58:03', '2015-06-02 03:59:42'),
(106, 'Street/No', 'Strasse / Hausnummer', '2015-05-30 16:58:03', '2015-06-02 03:55:59'),
(107, 'Additional address', 'ZusÃƒÂ¤tzliche Adresse', '2015-05-30 16:58:03', '2015-06-02 03:38:38'),
(108, 'City', 'Stadt', '2015-05-30 16:58:03', '2015-06-02 03:42:50'),
(109, 'Post Code', 'PLZ', '2015-05-30 16:58:03', '2015-06-02 03:53:08'),
(110, 'Your Contact Information', 'Ihre Kontaktdaten', '2015-05-30 16:58:03', '2015-06-02 03:59:54'),
(111, 'Mobile', 'Mobil', '2015-05-30 16:58:03', '2015-06-02 03:48:38'),
(112, 'Phone', 'Telefon', '2015-05-30 16:58:03', '2015-06-02 03:52:42'),
(113, 'Continue your order', 'Mit der Bestellung fortfahren', '2015-05-30 16:58:03', '2015-06-02 03:44:31'),
(114, 'Registration', 'Registration', '2015-05-30 16:58:03', '2015-06-02 03:53:35'),
(115, 'I am new here', 'Ich bin neu hier', '2015-05-30 16:58:03', '2015-06-02 03:46:52'),
(116, 'Welcome on Theiler Druck AG', 'Willkommen bei der Theiler Druck AG', '2015-05-30 16:58:03', '2015-06-02 03:59:22'),
(117, 'By logging in at Theiler Druck you are able to order more quick, know your order status at any time and you will always get an updated summary of your current orders.', 'Wenn Sie sich bei uns registrieren, sind Sie in der Lage, schneller und einfacher den Status Ihrer Bestellungen zu prÃƒÂ¼fen und erhalten eine aktuelle ÃƒÅ“bersicht ÃƒÂ¼ber Ihre aktuellen AuftrÃƒÂ¤ge.', '2015-05-30 16:58:03', '2015-06-02 03:41:49'),
(118, 'Create Account', 'Konto anlegen', '2015-05-30 16:58:03', '2015-06-02 03:44:52'),
(119, 'I already have an account', 'Ich bin bereits registriert', '2015-05-30 16:58:03', '2015-06-02 03:46:45'),
(120, 'Billing Address Change', 'Rechnungsadresse ÃƒÂ¤ndern', '2015-05-30 16:58:03', '2015-06-02 03:40:12'),
(121, 'Shipping Address Change', 'Versandadresse ÃƒÂ¤ndern', '2015-05-30 16:58:03', '2015-06-02 03:55:09'),
(122, 'Already have an account?', 'Sie sind schon registriert?', '2015-05-30 16:58:03', '2015-06-02 03:39:12'),
(123, 'Login here', 'Hier anmelden', '2015-05-30 16:58:03', '2015-06-02 03:47:43'),
(124, 'Date of Birth', 'Geburtsdatum', '2015-05-30 16:58:03', '2015-06-02 03:45:10'),
(125, 'Repeat Password', 'Passwort wiederholen', '2015-05-30 16:58:03', '2015-06-02 03:54:02'),
(126, 'Choose Shipping Address', 'Versandadresse auswÃƒÂ¤hlen', '2015-05-30 16:58:03', '2015-06-02 03:42:45'),
(127, 'Shipping address and billing address are identical', 'Versandadresse und Rechnungsadresse sind identisch', '2015-05-30 16:58:03', '2015-06-02 03:55:00'),
(128, 'Create new shipping address', 'Neue Versandadresse anlegen', '2015-05-30 16:58:03', '2015-06-02 03:45:01'),
(129, 'Payment method change', 'Zahlungsmethode ÃƒÂ¤ndern', '2015-05-30 16:58:03', '2015-06-02 03:52:28'),
(130, 'Comment to the order', 'Kommentar zur Bestellung', '2015-05-30 16:58:03', '2015-06-02 03:43:18'),
(131, 'Your shopping cart contains the following products', 'Ihr Warenkorb enthÃƒÂ¤lt folgende Artikel', '2015-05-30 16:58:03', '2015-06-02 04:00:05'),
(132, 'Edit cart', 'Warenkorb bearbeiten', '2015-05-30 16:58:03', '2015-06-02 03:45:52'),
(133, 'View Cart', 'Warenkorb ansehen', '2015-05-30 16:58:03', '2015-06-02 03:58:49'),
(134, 'Register now', 'Jetzt registrieren', '2015-05-30 16:58:03', '2015-06-02 03:53:30'),
(135, 'New here ?', 'Neu hier?', '2015-05-30 16:58:03', '2015-06-02 03:48:55'),
(136, 'My Account', 'Mein Konto', '2015-05-30 16:58:03', '2015-06-02 03:48:43'),
(137, 'Change Billing Address', 'Rechnungsadresse ÃƒÂ¤ndern', '2015-05-30 16:58:03', '2015-06-02 03:42:33'),
(138, 'Orders', 'Bestellungen', '2015-05-30 16:58:03', '2015-05-30 18:07:56'),
(139, 'Static Pages', 'Statische Seite', '2015-05-30 16:58:03', '2015-06-02 03:55:42'),
(140, 'Cms', 'CMS', '2015-05-30 16:58:03', '2015-06-02 03:42:55'),
(141, 'Users', 'Benutzer', '2015-05-30 16:58:03', '2015-06-02 03:58:42'),
(142, 'Manage Orders', 'Bestellungen verwalten', '2015-05-30 16:58:03', '2015-06-02 03:48:12'),
(143, 'Order ID', 'Bestell-Nr.', '2015-05-30 16:58:03', '2015-06-15 23:53:50'),
(144, 'User Name', 'Benutzername', '2015-05-30 16:58:03', '2015-06-02 03:58:32'),
(145, 'Amount', 'Betrag', '2015-05-30 16:58:03', '2015-06-02 03:39:52'),
(146, 'Status', 'Status', '2015-05-30 16:58:03', '2015-06-02 03:55:47'),
(147, 'View Order', 'Bestellung ansehen', '2015-05-30 16:58:03', '2015-06-02 03:58:58'),
(148, 'Order #', 'Bestellnummer', '2015-05-30 16:58:03', '2015-06-02 03:49:38'),
(149, 'Date of Order', 'Datum der Bestellung', '2015-05-30 16:58:03', '2015-06-02 03:45:29'),
(150, 'Order Status', 'Bestellstatus', '2015-05-30 16:58:03', '2015-06-02 03:50:54'),
(151, 'No of Coipes', 'Auflage', '2015-05-30 16:58:04', '2015-06-02 03:49:13'),
(152, 'Paper', 'Papier', '2015-05-30 16:58:04', '2015-06-02 03:51:47'),
(153, 'Comments', 'Kommentar', '2015-05-30 16:58:04', '2015-06-02 03:43:26'),
(154, 'My Orders', 'Meine Bestellungen', '2015-05-30 16:58:04', '2015-06-02 03:48:49'),
(155, 'Order Date', 'Bestelldatum', '2015-05-30 16:58:04', '2015-06-02 03:49:47'),
(156, 'No records found', 'Keinen Eintrag gefunden', '2015-05-30 16:58:04', '2015-06-02 03:49:25'),
(157, 'Order Details', 'Bestellinformationen', '2015-05-30 16:58:04', '2015-06-02 03:49:58'),
(158, 'Total Amount', 'Gesamtbetrag', '2015-05-30 16:58:04', '2015-06-02 03:57:26'),
(159, 'Order Items', 'BestellÃƒÂ¼bersicht', '2015-05-30 16:58:04', '2015-06-15 23:53:52'),
(160, 'Add Page', 'Seite hinzufÃƒÂ¼gen', '2015-05-30 16:58:04', '2015-06-02 03:38:03'),
(161, 'Page Title', 'Seiten Titel', '2015-05-30 16:58:04', '2015-06-02 03:51:40'),
(162, 'Page Description', 'Seitenbeschreibung', '2015-05-30 16:58:04', '2015-06-02 03:51:07'),
(163, 'Save Page', 'Seite speichern', '2015-05-30 16:58:04', '2015-06-02 03:54:31'),
(164, 'Manage Pages', 'Seiten verwalten', '2015-05-30 16:58:04', '2015-06-02 03:48:04'),
(165, 'Page Language', 'Seitensprache', '2015-05-30 16:58:04', '2015-06-02 03:51:14'),
(166, 'Descripition', 'Beschreibung', '2015-05-30 16:58:04', '2015-06-02 03:45:38'),
(167, 'Slug', 'Slug', '2015-05-30 16:58:04', '2015-06-02 03:55:29'),
(168, 'Edit', 'Speichern XXX', '2015-05-30 16:58:04', '2015-06-16 22:04:47'),
(169, 'Page', 'Seite', '2015-05-30 16:58:04', '2015-06-02 03:51:01'),
(170, 'View Page', 'Seite ansehen', '2015-05-30 16:58:04', '2015-06-02 03:59:04'),
(171, 'Page Slug', 'Page Slug', '2015-05-30 16:58:04', '2015-06-02 03:51:24'),
(172, 'Page Status', 'Seiten Status', '2015-05-30 16:58:04', '2015-06-02 03:51:32'),
(173, 'Picture Upload', 'Bild hochladen', '2015-05-30 16:58:04', '2015-06-02 03:52:48'),
(174, 'Add StaticPage', 'Statische Seite hinzufÃƒÂ¼gen', '2015-05-30 16:58:04', '2015-06-02 03:38:19'),
(175, 'Language', 'Sprache', '2015-05-30 16:58:04', '2015-06-02 03:47:20'),
(176, 'Content', 'Inhalt', '2015-05-30 16:58:04', '2015-06-02 03:44:16'),
(177, 'Edit StaticPage', 'Statische Seite bearbeiten', '2015-05-30 16:58:04', '2015-06-02 03:46:17'),
(178, 'Manage StaticPages', 'Statische Seiten verwalten', '2015-05-30 16:58:04', '2015-06-02 03:48:21'),
(179, 'User', 'Benutzer', '2015-05-30 16:58:04', '2015-06-02 03:58:02'),
(180, 'Edit User', 'Benutzer bearbeiten', '2015-05-30 16:58:04', '2015-06-02 03:46:26'),
(181, 'User Email', 'Benutzer E-Mail', '2015-05-30 16:58:04', '2015-06-02 03:58:25'),
(182, 'User Status', 'Status Benutzer', '2015-05-30 16:58:04', '2015-06-02 03:58:37'),
(183, 'Save User', 'Benutzer speichern', '2015-05-30 16:58:04', '2015-06-02 03:54:41'),
(184, 'Manage Users', 'Benutzer verwalten', '2015-05-30 16:58:04', '2015-06-02 03:48:31'),
(185, 'View User', 'Benutzer ansehen', '2015-05-30 16:58:04', '2015-06-02 03:59:13'),
(186, 'User Created', 'Benutzer erstellt', '2015-05-30 16:58:04', '2015-06-02 03:58:16'),
(187, 'Edit Profile', 'Profil bearbeiten', '2015-05-30 16:58:04', '2015-06-02 03:46:00'),
(188, 'Product Q&A', 'Fragen zum Produkt', '2015-06-09 18:23:53', '2015-06-09 20:52:41'),
(189, 'Static Page', 'Statische Seite', '2015-06-09 18:23:53', '2015-06-09 20:53:06'),
(190, 'Edit page content', 'Seiteninhalt bearbeiten', '2015-06-09 18:23:53', '2015-06-09 20:54:59'),
(191, 'Page SubTitle', 'Seiten Untertitel', '2015-06-09 18:23:53', '2015-06-09 20:51:38'),
(192, 'Page Content', 'Seiten Inhalt', '2015-06-09 18:23:53', '2015-06-09 20:55:51'),
(193, 'Parrallax Image', 'Parallax Bild', '2015-06-09 18:23:53', '2015-06-09 20:52:20'),
(194, 'Parrallax Caption', 'Parallax BildÃƒÂ¼berschrift', '2015-06-09 18:23:53', '2015-06-09 20:52:14'),
(195, 'Sort', 'Sortieren', '2015-06-09 18:23:53', '2015-06-09 20:53:01'),
(196, 'Is one page', 'Ist eine Seite', '2015-06-09 18:23:53', '2015-06-16 21:53:42'),
(197, 'Product Questions', 'Fragen zum Produkt', '2015-06-09 18:23:53', '2015-06-09 20:52:48'),
(198, 'Product Question & Answer', 'Fragen zum Produkt', '2015-06-09 18:23:53', '2015-06-09 20:52:44'),
(199, 'Question', 'Frage', '2015-06-09 18:23:53', '2015-06-09 20:52:54'),
(200, 'Answer', 'Antwort', '2015-06-09 18:23:53', '2015-06-09 20:54:20'),
(201, 'Update your answer', 'Antwort abschicken', '2015-06-09 18:23:53', '2015-06-16 22:14:35'),
(202, 'Un answered Questions', 'Unbeantwortete Fragen', '2015-06-09 18:23:53', '2015-06-09 20:53:19'),
(203, 'Add your answer', 'Frage beantworten', '2015-06-09 18:23:53', '2015-06-16 21:35:52'),
(204, 'No record found', 'Keinen Eintrag gefunden', '2015-06-09 18:23:53', '2015-06-09 20:55:39'),
(205, 'Answered Questions', 'Beantwortete Fragen', '2015-06-09 18:23:53', '2015-06-09 20:54:29'),
(206, 'Ask a Question', 'Frage stellen', '2015-06-09 18:23:53', '2015-06-09 20:54:35'),
(207, 'Your name', 'Ihr Name', '2015-06-09 18:23:53', '2015-06-09 20:53:47'),
(208, 'Your email address', 'Ihre E-Mail Adresse', '2015-06-09 18:23:53', '2015-06-09 20:53:41'),
(209, 'Your phone', 'Ihre Telefonnr.', '2015-06-09 18:23:53', '2015-06-09 20:54:03'),
(210, 'Captcha', 'Captcha', '2015-06-09 18:23:53', '2015-06-09 20:54:47'),
(211, 'Pictures', 'Bilder', '2015-06-12 16:57:44', '2015-06-16 01:09:42'),
(212, 'Contact Person', 'Kontaktperson', '2015-06-12 16:57:44', '2015-06-16 00:34:35'),
(213, 'Add', 'HinzufÃƒÂ¼gen', '2015-06-12 16:57:44', '2015-06-15 16:52:46'),
(214, 'Add Contact Person', 'Kontaktperson hinzufÃƒÂ¼gen', '2015-06-12 16:57:44', '2015-06-15 16:52:55'),
(215, 'Position', 'Position', '2015-06-12 16:57:44', '2015-06-16 01:11:34'),
(216, 'Image', 'Bild', '2015-06-12 16:57:44', '2015-06-16 00:46:58'),
(217, 'Level', 'Level???', '2015-06-12 16:57:44', '2015-06-16 00:48:50'),
(218, 'Edit Contact Person', 'Kontaktperson bearbeiten', '2015-06-12 16:57:44', '2015-06-16 00:40:09'),
(219, 'Contact Persons', 'Kontaktpersonen', '2015-06-12 16:57:44', '2015-06-16 00:34:42'),
(220, 'Manage Contact Persons', 'Kontaktpersonen verwalten', '2015-06-12 16:57:44', '2015-06-16 00:49:01'),
(221, 'Contact', 'Kontakt', '2015-06-12 16:57:44', '2015-06-16 00:34:29'),
(222, 'Inquiry', 'Offertenanfrage', '2015-06-12 16:57:44', '2015-06-16 01:19:56'),
(223, 'Publishing house', 'Verlag', '2015-06-12 16:57:44', '2015-06-16 01:12:34'),
(224, 'Zip / City', 'PLZ / Stadt', '2015-06-12 16:57:44', '2015-06-16 01:11:09'),
(225, 'Fax', 'Fax', '2015-06-12 16:57:44', '2015-06-16 00:45:23'),
(226, 'Please contact us by phone', 'Bitte nehmen Sie telefonisch Kontakt mit uns auf!', '2015-06-12 16:57:44', '2015-06-16 01:10:37'),
(227, 'Yes', 'Ja', '2015-06-12 16:57:44', '2015-06-16 01:17:24'),
(228, 'No', 'Nein', '2015-06-12 16:57:44', '2015-06-16 01:08:18'),
(229, 'Title of the product', 'Titel des Produktes', '2015-06-12 16:57:44', '2015-06-16 01:16:58'),
(230, 'No. of Copies', 'Auflage', '2015-06-12 16:57:44', '2015-06-16 00:41:42'),
(231, 'Product Type', 'Produkt Type???', '2015-06-12 16:57:44', '2015-06-16 01:12:13'),
(232, 'Format', 'Format', '2015-06-12 16:57:44', '2015-06-16 00:45:28'),
(233, 'Customised Size', 'Individuelle GrÃƒÂ¶ÃƒÅ¸e', '2015-06-12 16:57:44', '2015-06-16 00:31:24'),
(234, 'Pages', 'Umfang', '2015-06-12 16:57:44', '2015-06-16 01:13:18'),
(235, 'Page Content', 'Seiten Inhalt', '2015-06-12 16:57:44', '2015-06-16 01:15:10'),
(236, 'Cover Page', 'Seiten Umschlag', '2015-06-12 16:57:44', '2015-06-16 00:37:27'),
(237, 'Others', 'andere', '2015-06-12 16:57:44', '2015-06-15 23:54:12'),
(238, 'Special colors', 'Sonderfarben', '2015-06-12 16:57:44', '2015-06-16 01:15:54'),
(239, 'with window', 'mit Fenster', '2015-06-12 16:57:44', '2015-06-16 01:17:10'),
(240, 'Envelope', 'Couverts', '2015-06-12 16:57:44', '2015-06-16 00:42:14'),
(241, 'numbered', 'nummerier', '2015-06-12 16:57:45', '2015-06-16 18:33:53'),
(242, 'from', 'von', '2015-06-12 16:57:45', '2015-06-16 00:45:33'),
(243, 'to', 'zu', '2015-06-12 16:57:45', '2015-06-16 01:17:02'),
(244, 'perforation', 'perforiert', '2015-06-12 16:57:45', '2015-06-16 01:09:38'),
(245, 'Diameter', 'Durchmesser', '2015-06-12 16:57:45', '2015-06-16 00:38:26'),
(246, 'mm', 'mm', '2015-06-12 16:57:45', '2015-06-16 00:49:33'),
(247, 'Merge', 'zusammentragen', '2015-06-12 16:57:45', '2015-06-16 00:45:42'),
(248, 'Divide', 'geschnitten', '2015-06-12 16:57:45', '2015-06-16 01:15:33'),
(249, 'Prepress', 'Prepress', '2015-06-12 16:57:45', '2015-06-16 01:12:02'),
(250, 'ready-for-exposure Data deliver on', 'belichtungsfertige Daten geliefert auf:', '2015-06-12 16:57:45', '2015-06-16 00:45:04'),
(251, 'CD', 'CD', '2015-06-12 16:57:45', '2015-06-16 00:34:21'),
(252, 'Other Remarks to your request', 'Sonstige Anmerkung zu Ihrer Anfrage', '2015-06-12 16:57:45', '2015-06-16 01:21:41'),
(253, 'Languages', 'Sprachen', '2015-06-12 16:57:45', '2015-06-12 17:05:18'),
(254, 'Manage Languages', 'Sprachen verwalten', '2015-06-12 16:57:45', '2015-06-16 00:49:10'),
(255, 'English', 'Englisch', '2015-06-12 16:57:45', '2015-06-16 00:42:02'),
(256, 'German', 'Deutsch', '2015-06-12 16:57:45', '2015-06-16 00:45:54'),
(257, 'Subtitle', 'Slogan', '2015-06-12 16:57:45', '2015-06-16 21:36:53'),
(258, 'Your questions and comments are always welcome', 'Ihre Fragen und Kommentare sind immer willkommen', '2015-06-12 16:57:45', '2015-06-16 01:17:58'),
(259, 'Subject', 'Betreff', '2015-06-12 16:57:45', '2015-06-16 01:13:06'),
(260, 'Message', 'Nachricht', '2015-06-12 16:57:45', '2015-06-16 00:49:29'),
(261, 'Spam protection', 'Captcha', '2015-06-12 16:57:45', '2015-06-16 01:15:48'),
(262, 'Address', 'Adresse ', '2015-06-12 16:57:45', '2015-06-15 16:53:14'),
(263, 'Approach', 'Anfahrt', '2015-06-12 16:57:45', '2015-06-15 16:53:22'),
(264, 'Do not hesitate to ask for a free quote. we will gladly make our offer .', 'ZÃƒÂ¶gern Sie nicht, verlangen Sie eine unverbindliche Offerte. Wir unterbreiten Ihnen gerne unser Angebot. ', '2015-06-12 16:57:45', '2015-06-16 00:39:53'),
(265, 'Hide Inquiry', 'zuklappen', '2015-06-12 16:57:45', '2015-06-16 01:19:29'),
(266, 'Sheet', 'Einzelblatt', '2015-06-12 16:57:45', '2015-06-16 01:14:19'),
(267, 'Leaflet', 'Flugblatt', '2015-06-12 16:57:45', '2015-06-16 00:48:10'),
(268, 'Catalogue', 'Prospekt', '2015-06-12 16:57:45', '2015-06-16 01:12:29'),
(269, 'Business cards', 'Vistenkarten', '2015-06-12 16:57:45', '2015-06-16 00:34:06'),
(270, 'Brochure with envelope', 'BroschÃƒÂ¼re mit Umschlag', '2015-06-12 16:57:45', '2015-06-16 00:33:59'),
(271, 'Brochure without cover', 'BroschÃƒÂ¼re ohne Umschlag', '2015-06-12 16:57:45', '2015-06-16 00:33:47'),
(272, 'Envelopes', 'Couverts', '2015-06-12 16:57:45', '2015-06-16 00:38:12'),
(273, 'Please filling out : adhesive strips with or without windows, ( left / right), with, rubberized', '', '2015-06-12 16:57:45', '2015-06-12 16:57:45'),
(274, 'printed on one side', 'einseitig bedruckt', '2015-06-12 16:57:45', '2015-06-16 00:41:53'),
(275, 'printed on both sides', 'beidseitig bedruckt', '2015-06-12 16:57:45', '2015-06-16 00:30:36'),
(276, 'Neusatz & design by Theiler Druck AG', 'Neusatz & design durch Theiler Druck AG', '2015-06-12 16:57:45', '2015-06-16 01:21:04'),
(277, 'Raw data + Image sources delivered / set breaks by Theiler Druck AG', 'Rohdaten + Bildvorlagen geliefert / Satzumbruch durch Theiler Druck AG', '2015-06-12 16:57:45', '2015-06-16 01:12:49'),
(278, 'Supplied exposure -ready data with program / Ã¢â‚¬â€¹Ã¢â‚¬â€¹system information and color- expressive', 'Belichtungsfertige Daten mit Programm/systemangaben und farbverbindlichen Ausdruck angeliefert', '2015-06-12 16:57:45', '2015-06-16 01:16:21'),
(279, 'Please note that we can only process your request if the address details are correct', 'Bitte beachten Sie, dass wir Ihre Anfrage nur bearbeiten, wenn die Adressangaben korrekt sind.', '2015-06-12 16:57:45', '2015-06-16 01:11:02'),
(280, 'Submit Request', 'Anfrage abschicken', '2015-06-12 16:57:45', '2015-06-16 01:16:03'),
(281, 'Show Inquiry', 'aufklappen', '2015-06-12 16:57:45', '2015-06-16 01:19:17'),
(282, 'Service', 'Leistung ', '2015-06-12 16:57:45', '2015-06-16 01:13:53'),
(283, 'Edit service content', 'Leistungsinhalte bearbeiten ', '2015-06-12 16:57:45', '2015-06-16 21:01:32'),
(284, 'Service Title', 'Titel Leistung ', '2015-06-12 16:57:45', '2015-06-16 21:16:58'),
(285, 'Icon', 'Icon', '2015-06-12 16:57:45', '2015-06-16 00:47:04'),
(286, 'Description', 'Beschreibung', '2015-06-12 16:57:45', '2015-06-16 00:38:20'),
(287, 'Edit service', 'Leistungen bearbeiten', '2015-06-12 16:57:45', '2015-06-16 21:01:25'),
(288, 'Services', 'Leistungen', '2015-06-12 16:57:45', '2015-06-16 01:14:11'),
(289, 'Manage Services', 'Leistungen verwalten', '2015-06-12 16:57:45', '2015-06-16 00:49:23'),
(290, 'Add Service', 'Dienstleistung hinzufÃƒÂ¼gen', '2015-06-12 16:57:45', '2015-06-15 16:53:09'),
(291, 'Calculate shipping costs', 'Versandkosten kalkulieren', '2015-06-13 19:52:00', '2015-06-13 19:52:00'),
(292, 'Orders history', 'Bestellhistorie', '2015-06-16 18:05:28', '2015-06-16 21:16:08'),
(293, 'Purchases statistics', '', '2015-06-16 18:05:28', '2015-06-16 18:05:28'),
(294, 'Activity', 'AktivitÃ¤ten', '2015-06-16 18:05:28', '2015-06-16 20:32:29'),
(295, 'Latest Users', 'Neue Benutzer', '2015-06-16 18:05:28', '2015-06-16 21:08:19'),
(296, 'Latest Orders', 'Neueste Bestellungen', '2015-06-16 18:05:28', '2015-06-16 21:08:10'),
(297, 'Newest questions', 'Neueste Fragen', '2015-06-16 18:05:28', '2015-06-16 21:09:06'),
(298, 'Owner Name', 'Name Besitzer', '2015-06-16 18:05:28', '2015-06-16 21:16:25'),
(299, 'Bank Name', 'Name der Bank', '2015-06-16 18:05:28', '2015-06-16 20:52:49'),
(300, 'Bank Account Number', 'Kontonummer', '2015-06-16 18:05:28', '2015-06-16 20:52:33'),
(301, 'BLZ', 'BLZ', '2015-06-16 18:05:28', '2015-06-16 20:58:04'),
(302, 'BIC', 'BIC', '2015-06-16 18:05:28', '2015-06-16 20:57:56'),
(303, 'IBAN', 'IBAN', '2015-06-16 18:05:28', '2015-06-16 21:03:48'),
(304, 'Bank Information', 'Bankverbindung', '2015-06-16 18:05:28', '2015-06-16 20:52:40'),
(305, 'Edit this item', 'Bearbeiten', '2015-06-16 18:05:28', '2015-06-16 21:30:25'),
(306, 'Contact Address', 'Kontaktadresse', '2015-06-16 18:05:28', '2015-06-16 20:59:00'),
(307, 'Address 1', 'Adresse 1', '2015-06-16 18:05:28', '2015-06-16 20:52:11'),
(308, 'Address 2', 'Adresse 2', '2015-06-16 18:05:29', '2015-06-16 20:52:18'),
(309, 'Website', 'Webseite', '2015-06-16 18:05:29', '2015-06-16 21:18:52'),
(310, 'Facebook', '', '2015-06-16 18:05:29', '2015-06-16 18:05:29'),
(311, 'Twitter', '', '2015-06-16 18:05:29', '2015-06-16 18:05:29'),
(312, 'Linkedin', '', '2015-06-16 18:05:29', '2015-06-16 18:05:29'),
(313, 'Manage Contact Address', 'Kontaktadressen verwalten', '2015-06-16 18:05:29', '2015-06-16 21:08:54'),
(314, 'Your order has been placed successfully', 'Ihre Bestellung wurde erfolgreich abgeschickt!', '2015-06-16 18:05:29', '2015-06-16 21:20:34'),
(315, 'Your invoice pdf attached with this mail', 'Ihre Rechnung im PDF Format ist angehÃ¤ngt an diese E-Mail', '2015-06-16 18:05:29', '2015-06-16 21:19:33'),
(316, 'INVOICE', 'RECHNUNG', '2015-06-16 18:05:29', '2015-06-16 21:03:59'),
(317, 'Offset white', 'Offset weiss', '2015-06-16 18:05:29', '2015-06-16 18:30:11'),
(318, 'Offset color', 'Offset fabrig', '2015-06-16 18:05:29', '2015-06-16 18:30:26'),
(319, 'Laser-Inkjet', 'Laser-Inkjet', '2015-06-16 18:05:29', '2015-06-16 18:30:38'),
(320, 'chem. Paper', 'chem. Papier', '2015-06-16 18:05:29', '2015-06-16 18:30:51'),
(321, 'matt coated', 'matt gerstrichen', '2015-06-16 18:05:29', '2015-06-16 18:31:02'),
(322, 'glossy coated', 'glÃ¤nzend gestrichen', '2015-06-16 18:05:29', '2015-06-16 18:31:16'),
(323, 'Business card', 'Visitenkarten', '2015-06-16 18:05:29', '2015-06-16 18:31:29'),
(324, 'wire stiched', 'Drahtheftung', '2015-06-16 18:05:29', '2015-06-16 18:31:45'),
(325, 'eyelet ring', 'RingÃ¶sen', '2015-06-16 18:05:29', '2015-06-16 18:31:59'),
(326, 'adhesive binding', 'Klebebindung', '2015-06-16 18:05:29', '2015-06-16 18:32:16'),
(327, 'thread stitched', 'Fadenheftung', '2015-06-16 18:05:29', '2015-06-16 18:32:33'),
(328, 'folded', 'gefalzt', '2015-06-16 18:05:29', '2015-06-16 18:32:48'),
(329, 'fluted', 'gerillt', '2015-06-16 18:05:29', '2015-06-16 18:32:58'),
(330, 'punched', 'gestanzt', '2015-06-16 18:05:29', '2015-06-16 18:33:11'),
(331, 'perforated', 'perforiert', '2015-06-16 18:05:29', '2015-06-16 18:33:27'),
(332, 'slitted', 'geschlitzt', '2015-06-16 18:05:29', '2015-06-16 18:33:38'),
(333, 'Forgot Password ?', 'Passwort vergessen?', '2015-06-16 18:05:29', '2015-06-16 21:03:34'),
(334, 'Last Name', 'Nachname', '2015-06-16 18:05:29', '2015-06-16 21:07:41'),
(335, 'Reset Password', 'Passwort zurÃ¼cksetzen', '2015-06-16 18:05:29', '2015-06-16 21:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `td_language_types`
--

DROP TABLE IF EXISTS `td_language_types`;
CREATE TABLE IF NOT EXISTS `td_language_types` (
  `language_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_type_name` varchar(200) NOT NULL,
  `language_type_code` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`language_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_language_types`
--

INSERT INTO `td_language_types` (`language_type_id`, `language_type_name`, `language_type_code`, `created`, `modified`) VALUES
(1, 'English', 'en', '2015-05-05 07:03:44', '2015-05-05 07:03:44'),
(2, 'German', 'de', '2015-05-05 07:03:44', '2015-05-05 07:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `td_orders`
--

DROP TABLE IF EXISTS `td_orders`;
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
  `order_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `td_orders`
--

INSERT INTO `td_orders` (`order_id`, `order_unique_id`, `user_id`, `order_billing_address`, `order_shipping_address`, `order_payment_method`, `order_summary`, `order_good_for_print_on_paper`, `order_express_within_4_days`, `order_total_weight`, `order_shipping_cost`, `order_total_net`, `order_tax`, `order_total_gross`, `order_final_amount`, `order_status`, `created`, `modified`) VALUES
(1, 'TD-1434203896-FDR', 9, '{"address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"Prakash","address_lastname":"arulmani","address_street":"10, Main street","address_additional":"tet","address_city":"city","address_post_code":"1000","address_country":"Switzerland","address_mobile":"","address_phone":"589541112515"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":2,"name":"Bank transfer","fee":"","caption":"You transfer the invoice amount in advance payment"}', '{"comment":""}', 0, 0, 136.08, 195, 1808.72, 157.28, 1966, 2161, '4', '2015-06-13 19:28:16', '2015-06-15 22:06:53'),
(2, 'TD-1434203934-LWW', 9, '{"address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"Prakash","address_lastname":"arulmani","address_street":"10, Main street","address_additional":"tet","address_city":"city","address_post_code":"1000","address_country":"Switzerland","address_mobile":"","address_phone":"589541112515"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":2,"name":"Bank transfer","fee":"","caption":"You transfer the invoice amount in advance payment"}', '{"comment":""}', 0, 0, 136.08, 195, 1808.72, 157.28, 1966, 2161, '1', '2015-06-13 19:28:54', '2015-06-13 19:28:54'),
(3, 'TD-1434204681-DNK', 9, '{"address_id":"9","user_id":"9","address_type":"0","address_title":"Mr","address_firstname":"Prakash","address_lastname":"arulmani","address_company_type":"Individual","address_company_name":"","address_street":"10, Main street","address_additional":"tet","address_city":"city","address_post_code":"1000","address_country":"Switzerland","address_phone":"589541112515","address_mobile":"","created":"2015-06-12 19:33:23","modified":"2015-06-13 18:58:46"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":2,"name":"Bank transfer","fee":"","caption":"You transfer the invoice amount in advance payment"}', '{"comment":""}', 0, 0, 55.98, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-13 19:41:21', '2015-06-13 19:41:21'),
(4, 'TD-1434385435-XKN', 2, '{"address_id":"2","user_id":"2","address_type":"0","address_title":"Mr","address_firstname":"julius","address_lastname":"molnar","address_company_type":"Individual","address_company_name":"","address_street":"Fr\\u00f6lichstr. 10 1\\/3","address_additional":"","address_city":"Augsburg","address_post_code":"5050","address_country":"Switzerland","address_phone":"0821 512662","address_mobile":"","created":"2015-05-19 21:07:53","modified":"2015-06-12 01:38:47"}', '{"identical":"0","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"adsf","address_lastname":"adf","address_street":"adsf 23","address_additional":"","address_city":"adf","address_post_code":"1950","address_country":"Switzerland","address_mobile":"","address_phone":"2424234"}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-15 21:53:55', '2015-06-15 21:53:55'),
(5, 'TD-1434386544-GDY', 2, '{"address_id":"2","user_id":"2","address_type":"0","address_title":"Mr","address_firstname":"julius","address_lastname":"molnar","address_company_type":"Individual","address_company_name":"","address_street":"Fr\\u00f6lichstr. 10 1\\/3","address_additional":"","address_city":"Augsburg","address_post_code":"5050","address_country":"Switzerland","address_phone":"0821 512662","address_mobile":"","created":"2015-05-19 21:07:53","modified":"2015-06-12 01:38:47"}', '{"identical":"0","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"adsfadsf","address_lastname":"adfadsfdsad","address_street":"dsfadsf 4","address_additional":"","address_city":"adsfadf","address_post_code":"6000","address_country":"Switzerland","address_mobile":"","address_phone":"2342342342"}', '{"id":2,"name":"Bank transfer","fee":"","caption":"You transfer the invoice amount in advance payment"}', '{"comment":""}', 0, 0, 204.12, 190, 1267.76, 110.24, 1378, 1568, '1', '2015-06-15 22:12:24', '2015-06-15 22:12:24'),
(6, 'TD-1434461319-RWB', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":2,"name":"Bank transfer","fee":"","caption":"You transfer the invoice amount in advance payment"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 18:58:39', '2015-06-16 18:58:39'),
(7, 'TD-1434461928-OOX', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 19:08:48', '2015-06-16 19:08:48'),
(8, 'TD-1434462303-WIU', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 19:15:03', '2015-06-16 19:15:03'),
(9, 'TD-1434462463-GHP', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 19:17:43', '2015-06-16 19:17:43'),
(10, 'TD-1434462630-OWN', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 19:20:30', '2015-06-16 19:20:30'),
(11, 'TD-1434462801-NAE', 3, '{"address_company_type":"Company","address_company_name":"Company Name","address_title":"Mr","address_firstname":"Nadesh","address_lastname":"S","address_street":"Testing","address_additional":"","address_city":"Mdu","address_post_code":"1000","address_country":"Switzerland","address_mobile":"123","address_phone":"1234567890"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":3,"name":"Invoice","fee":"","caption":"Small information"}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-06-16 19:23:21', '2015-06-16 19:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `td_order_items`
--

DROP TABLE IF EXISTS `td_order_items`;
CREATE TABLE IF NOT EXISTS `td_order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_item_product_key` longtext NOT NULL,
  `order_item_product_value` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `FK_td_order_items` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `td_order_items`
--

INSERT INTO `td_order_items` (`order_item_id`, `order_id`, `order_item_product_key`, `order_item_product_value`, `created`, `modified`) VALUES
(1, 1, '2_8_5000_1', '{"product_id":"2","product_name":"Zeitung Tabloid","product_description":"240mm x 315mm\\t\\t\\r\\nDruck 4-farbig\\t\\t\\r\\nkreuzgeb\\u00fcndelt auf Europalette\\t\\t","product_image":"uWOea_zeitung.jpg","product_sku":"0000000","product_slug":"zeitung-tabloid","product_factor":"0.0756","item_product_no_of_pages":"8","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":1030,"item_sub_price":1030,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"9","item_picture_upload":[]}', '2015-06-13 19:28:16', '2015-06-13 19:28:16'),
(2, 1, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"9","item_picture_upload":[]}', '2015-06-13 19:28:16', '2015-06-13 19:28:16'),
(3, 2, '2_8_5000_1', '{"product_id":"2","product_name":"Zeitung Tabloid","product_description":"240mm x 315mm\\t\\t\\r\\nDruck 4-farbig\\t\\t\\r\\nkreuzgeb\\u00fcndelt auf Europalette\\t\\t","product_image":"uWOea_zeitung.jpg","product_sku":"0000000","product_slug":"zeitung-tabloid","product_factor":"0.0756","item_product_no_of_pages":"8","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":1030,"item_sub_price":1030,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"9","item_picture_upload":[]}', '2015-06-13 19:28:54', '2015-06-13 19:28:54'),
(4, 2, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"9","item_picture_upload":[]}', '2015-06-13 19:28:54', '2015-06-13 19:28:54'),
(5, 3, '4_16_5000_1', '{"product_id":"4","product_name":"Brosch\\u00fcren A5","product_description":"148 x 210\\t\\t\\r\\ngeheftet\\t\\t\\r\\nDruck 4-farbig\\t\\t\\r\\nkreuzgeb\\u00fcndelt auf Europalette\\t\\t","product_image":"dEuNW_broschuereA5.jpg","product_sku":"product4","product_slug":"broschueren-a5","product_factor":"0.0311","item_product_no_of_pages":"16","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":55.98,"item_sub_weight":55.98,"user_id":"9","item_picture_upload":[]}', '2015-06-13 19:41:21', '2015-06-13 19:41:21'),
(6, 4, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"cart_sessionid":"u0g0ahn5lbhc9jha4eee786td6","item_picture_upload":[]}', '2015-06-15 21:53:55', '2015-06-15 21:53:55'),
(7, 5, '1_12_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"12","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":1378,"item_sub_price":1378,"item_weight":204.12,"item_sub_weight":204.12,"user_id":"2","item_picture_upload":["hmN-9ebbaa_5f5752ac6f5b4b35ade032fa43d19bf6.gif"]}', '2015-06-15 22:12:24', '2015-06-15 22:12:24'),
(8, 6, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"cart_sessionid":"eu5ujjrka3ju685e9m51nc1894","item_picture_upload":[]}', '2015-06-16 18:58:39', '2015-06-16 18:58:39'),
(9, 7, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"3","item_picture_upload":[]}', '2015-06-16 19:08:48', '2015-06-16 19:08:48'),
(10, 8, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"3","item_picture_upload":[]}', '2015-06-16 19:15:03', '2015-06-16 19:15:03'),
(11, 9, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"3","item_picture_upload":[]}', '2015-06-16 19:17:43', '2015-06-16 19:17:43'),
(12, 10, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"3","item_picture_upload":[]}', '2015-06-16 19:20:30', '2015-06-16 19:20:30'),
(13, 11, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"3","item_picture_upload":[]}', '2015-06-16 19:23:21', '2015-06-16 19:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `td_pages`
--

DROP TABLE IF EXISTS `td_pages`;
CREATE TABLE IF NOT EXISTS `td_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` varchar(255) DEFAULT NULL,
  `page_content` longtext NOT NULL,
  `page_px_image` varchar(255) DEFAULT NULL,
  `page_px_caption` text,
  `is_one_page` char(1) NOT NULL DEFAULT '0',
  `sort_value` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `td_pages`
--

INSERT INTO `td_pages` (`page_id`, `page_title`, `page_subtitle`, `page_content`, `page_px_image`, `page_px_caption`, `is_one_page`, `sort_value`, `created`, `modified`) VALUES
(1, 'Prepress', 'Prozess- und farbsicher', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Datenmanagement und Design</h2>\r\n\r\n<p>F&uuml;r die schnelle, einfache und qualitativ hochwertige Aufbereitung von Druckdaten bieten wir die komplette Dienstleistung an. Daf&uuml;r setzen wir die neuesten technischen Einrichtungen ein.</p>\r\n\r\n<p>Ausgebildete Fachleute stehen Ihnen mit ihrem Know-how und ihrer Kreativit&auml;t hilfreich zur Seite. Polygrafinnen und Polygrafen r&uuml;cken Ihre Bilder ins richtige Licht, w&auml;hlen die passende Schrift oder machen Vorschl&auml;ge f&uuml;r die Gestaltung Ihrer Drucksache.</p>\r\n\r\n<p>Unser Korrektorat pr&uuml;ft alles nochmals auf inhaltliche, orthografische und grammatische Fehlerfreiheit, steht Ihnen aber auch f&uuml;r stilistische Fragen gerne zur Verf&uuml;gung.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages/section-img.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12">&nbsp;\r\n<p>Wir arbeiten mit modernsten Apple-Macintosh-Computern und Peripherieger&auml;ten auf Basis der g&auml;ngigsten Anwenderprogramme. Nat&uuml;rlich d&uuml;rfen auch Kunden unsere Vorstufenleistungen geniessen, die (noch) nicht bei uns drucken.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-12 col-md-12">\r\n<h2>Unser Service:</h2>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5">\r\n<ul>\r\n	<li>Gestaltung</li>\r\n	<li>Neusatz</li>\r\n	<li>Hauseigenes Korrektorat</li>\r\n	<li>&Uuml;bernahme von Kundendaten ab PC oder MAC</li>\r\n	<li>Datenverwaltung und -archivierung</li>\r\n	<li>Datenerfassung ab Manuskriptvorlage</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<ul>\r\n	<li>Scannen ab Vorlage</li>\r\n	<li>Bearbeitung von Text-, Grafik- und Bilddaten</li>\r\n	<li>Automatisierte Bildbearbeitung &ndash; mit &laquo;IntelliTune&raquo; haben wir die M&ouml;glich- keit, Ihre Bilder rationell und qualitativ auf hohem Niveau zu verarbeiten</li>\r\n	<li>Datenbelichtung direkt auf die Druckplatte</li>\r\n	<li>Plotts und Plakate auch lichtecht und wetterfest</li>\r\n</ul>\r\n</div>\r\n</div>\r\n', 'prallax-img6.jpg', '<h1 class="short text-shadow  white bold"><strong>Prozess- und farbsicher</strong></h1>', '1', 1, '2015-06-03 14:51:10', '2015-06-04 02:14:24'),
(2, 'Offsetdruck', 'Service und professionell', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>&laquo;Die Kunst des Druckens ist die Effizienz der Ausf&uuml;hrung&raquo;</h2>\r\n\r\n<p>Unsere eigentliche Kernkompetenz liegt im Offset-Druckverfahren. Der Bogenoffset erm&ouml;glicht vielf&auml;ltigste Kombinationen in einem einzigen Druckvorgang. Er bietet eine grosse Vielseitigkeit betreffend Druckformat und Farbgebung und zeichnet sich durch eine hohe Flexibilit&auml;t in Bezug auf Sonderfertigungstechniken aus. Bei Zeitungsprodukten steht unsere Rollenoffset-Druckmaschine ganz zu Ihrer Verf&uuml;gung.</p>\r\n\r\n<h2>Zeitungs-Rollenoffset:</h2>\r\n\r\n<p>Zeitungs-Rollenrotation WIFAG OF-07 (2 Werke / 32 Seiten im Zeitungsformat, durchgehend 4-farbig Skala)</p>\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages/section-img2.jpg" /></div>\r\n\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Bogenoffset:</h2>\r\n\r\n<ul>\r\n	<li>Unser Druck-Maschinenpark umfasst:<br />\r\n	5-Farben-Heidelberg CD 74-5+L, 52 x 74 cm<br />\r\n	(+L = mit integriertem Dispersions-Lackwerk)<br />\r\n	4-Farben-Heidelberg Speedmaster, 37 x 52 cm<br />\r\n	2-Farben-Heidelberg Speedmaster, 52 x 74 cm</li>\r\n	<br />\r\n	<br />\r\n	&nbsp;\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5">\r\n<h2>Unsere Produkte:</h2>\r\n\r\n<ul>\r\n	<li>Familien- und Gesch&auml;ftsdrucksachen, Gesch&auml;ftsberichte, Visitenkarten, Briefb&ouml;gen, Kuverts, Imagebrosch&uuml;ren, Flyer, Prospekte, Blocks, Festschriften, Brosch&uuml;ren, Warenkataloge, Bedienungsanleitungen, Plakate, Werbedrucksachen, Preislisten, Selbstklebeetiketten, Zeitschriften, Zeitungen, B&uuml;cher&hellip;</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12">\r\n<p><br />\r\n&hellip; in kleiner oder grosser Auflage, farbig und lackiert oder schwarz auf weiss, seidenmatt oder gl&auml;nzend &hellip; so, wie Sie es w&uuml;nschen!</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 'prallax-img2.jpg', '<h1 class="short text-shadow  white bold"><strong>Service und professionell</strong></h1>', '1', 2, '2015-06-03 14:51:16', '2015-06-04 02:15:08'),
(3, 'Digitaldruck', 'darf es etwas weniger sein?', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Farb-System</h2>\r\n\r\n<p>Unser digitales Farbsystem ist auf die Anforderungen des Produktionsdrucks abgestimmt. F&uuml;r Kleinauflagen ist der Digitaldruck besonders geeignet.</p>\r\n\r\n<p>Unser digitales Farbsystem ist auf die Anforderungen des Produktionsdrucks abgestimmt. F&uuml;r Kleinauflagen ist der Digitaldruck besonders geeignet.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//section-img3.jpg" /></div>\r\n</div>\r\n\r\n<section class="top">\r\n<div class="row" id="oder">\r\n<div class="col-md-12">\r\n<div class="sections-heading">Oder f&uuml;r den A4</div>\r\n\r\n<div class="sections-sub-heading">Volumenausdruck</div>\r\n\r\n<div class="sections-content">\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Schwarz/Weiss-System</h2>\r\n\r\n<p>Unser leistungsstarkes Schwarz/Weiss-Produktionssystem ist speziell f&uuml;r den Volumenausdruck von A4-Office-Dokumenten geeignet und zeichnet sich durch hohe Zuverl&auml;ssigkeit aus.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages/section-img4.jpg" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 'Atr1w_prallax-img3.jpg', '<h1 class="short text-shadow  white bold"><strong>darf es etwas weniger sein?</strong></h1>', '1', 3, '2015-06-04 05:57:10', '2015-06-04 17:27:10'),
(4, 'Oder fÃ¼r den A4', 'Volumenausdruck', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Schwarz/Weiss-System</h2>\r\n\r\n<p>Unser leistungsstarkes Schwarz/Weiss-Produktionssystem ist speziell f&uuml;r den Volumenausdruck von A4-Office-Dokumenten geeignet und zeichnet sich durch hohe Zuverl&auml;ssigkeit aus.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages/section-img4.jpg" /></div>\r\n</div>\r\n', '0upmp_prallax-img3.jpg', '<h1 class="short text-shadow  white bold"><strong>darf es etwas weniger sein?</strong></h1>', '0', 4, '2015-06-03 14:51:55', '2015-06-04 02:12:01'),
(5, 'Postpress', 'Der letzte Schliff', '<h2>Postpress</h2>\r\n\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Damit Ihre Drucksachen auch richtig gut ankommen! Dank einem breiten Maschinenpark und schlagkr&auml;ftigen Partnern sind wir in der Lage, Ihnen eine umfassende Palette von Ausr&uuml;starbeiten zu offerieren. Wenn Sie am Schluss als zufriedener Kunde &uuml;berzeugt sind, vom richtigen Partner betreut worden zu sein freut uns das. Wir sind gern f&uuml;r Sie da!</p>\r\n\r\n<h2>Unser Service:</h2>\r\n\r\n<p>Wir banderolieren, bandieren, bohren, kleben Ihre CD ein, kuvertieren, nummerieren, etikettieren, heften mit Draht, falzen und individualisieren, z&auml;hlen ab, klebebinden, perforieren, rillen und schneiden, stanzen und lochen, runden Ecken ab, sammelheften, stecken ein und teilen aus, tragen zusammen, verpacken, stapeln, palettieren und adressieren, liefern aus und sind bereit f&uuml;r Ihren n&auml;chsten Auftrag&hellip;</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//section-img5.jpg" /></div>\r\n</div>\r\n', 'prallax-img4.jpg', '<h1 class="short text-shadow  white bold"><strong>Der letzte Schliff</strong></h1>', '1', 5, '2015-06-03 14:51:31', '2015-06-04 02:16:47'),
(6, 'Lettershop', 'Der letzte Schliff', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Hier findet die technische Abwicklung einer Aussendung statt: Standard-Mail oder Spezialversand &ndash; wir wissen, worauf es ankommt. Der Produktionsweg eines Mailings ist lang. Auch dann noch, wenn die Idee bereits zu Papier gebracht und das Mailing kreiert wurde. Bevor Mailings beim Adressaten ankommen, durchlaufen sie noch zahlreiche Arbeitsschritte: von der Adressaufbereitung &uuml;ber das Personalisieren und Kuvertieren bis hin zum Versand. Unser Lettershop verpackt auch Komplexes!</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//section-img6.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Unser Service:</h2>\r\n\r\n<p>personalisieren, schneiden, falzen, kuvertieren, Handkonfektionierung von Beilagen, adressieren, sortieren, b&uuml;ndeln, verpacken, Postaus- lieferung</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5">\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Das Kuvertieren gelingt am kosteng&uuml;nstigsten maschinell. Wir kuvertieren in den Formaten C5/6, C5 und B5. Von Hand kuvertieren wir in allen Formaten, Varianten und Schwierigkeitsgraden.</p>\r\n</div>\r\n</div>\r\n', 'prallax-img5.jpg', '<h1 class="short text-shadow  white bold"><strong>Der Lettershop verpackt auch komplexes!</strong></h1>', '1', 6, '2015-06-03 14:51:37', '2015-06-04 02:17:26'),
(7, 'Klimaneutrales', '', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Setzen Sie f&uuml;r Ihr Unternehmen ein deutliches Zeichen f&uuml;r einen aktiven Klimaschutz. Drucken Sie Ihre Werbemittel mit uns klimaneutral und profitieren Sie von den positiven Signalen f&uuml;r ein vorbildliches Engagement. Beim klimaneutralen Druck mit ClimatePartner werden alle CO2-Emissionen, die w&auml;hrend der Entstehung einer Drucksache freigesetzt werden, ermittelt und durch den Ankauf und die verbindliche Stilllegung von anerkannten Emissionsminderungs-Zertifikaten ausgeglichen. Die Theiler Druck AG und ihre Kundschaft unterst&uuml;tzen das erste Schweizer Klimaschutzprojekt, das den Wald als CO2-Senke nutzt.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//section-img7.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12">\r\n<p>&nbsp;</p>\r\n\r\n<p>Oberallmig Klimaschutzprojekt &ndash; optimierte Waldbewirtschaftung bei der Oberallmeindkorporation Schwyz</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-9 col-md-10">\r\n<p class="client-partnertxt"><img src="http://theiler.pandawebsolution.com/files/pages//cp-logo.jpg" /> Das Ziel des Projektes ist, den Wald als CO2-Senke mittels Speicherung von Kohlenstoff in der Biomasse des Waldes zus&auml;tzlich zu den bestehenden Vorratsmengen zu nutzen. Durch eine moderate Erh&ouml;hung des Holzvorrates von 281 m3/ha innert 30 Jahren auf 300 m3/ha werden rund 245&#39;000 t CO2 aus der Luft entnommen und im Holz eingelagert. Auf diesem Vorratsniveau werden k&uuml;nftig &uuml;ber einen gr&ouml;sseren Holzzuwachs die Kompensationsm&ouml;glichkeiten durch den nachwachsenden Rohstoff erh&ouml;ht. Mit einer angepassten Waldbewirtschaftung wird sichergestellt, dass die Funktionen des Waldes (Schutz vor Naturgefahren, Holzproduktion, Biodiversit&auml;t, Erholung etc.) weiterhin nachhaltig erf&uuml;llt werden und der Wald sich stabil und vital entwickelt.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-2"><a href="http://www.theilerdruck.ch/bilder/klimaneutral/waldschutz_oak_schweiz_de.pdf" target="_blank"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//client-doc1.png" /></a></div>\r\n\r\n<div class="col-xs-12 col-sm-9 col-md-10">\r\n<h2>Klimaschutzprojekt Windkraft in Indien</h2>\r\n\r\n<p class="client-partnertxt"><img src="http://theiler.pandawebsolution.com/files/pages//cp-logo.jpg" /> Damit Wind zur Stromproduktion genutzt werden kann, m&uuml;ssen Luftmassen in Bewegung sein. Die Kraft dieser Masse treibt die Bewegung von Rotoren an, die diese mechanische Energie der Luft ernten und in elektrische Energie transformieren. In Palsodi betriebt Ruchi Infrastructure Ltd. (RIL) einen Windpark, der auf die auf diese Weise gewonnene Energie in das nationale Stromnetz einspeist. Dies stellt eine klimafreundliche Alternative zu den in Indien dominierenden Kohlekraftwerken dar, welche hohe Treibhausgasemissionen verursachen. Der Windpark besteht aus 17 Suzlon Windturbinen, die mit Siemens-Komponenten ausgestattet sind und &uuml;ber eine Gesamtkapazit&auml;t von 10,2 MW verf&uuml;gen. Laut dem indischen Energieministerium leidet das Land an einem Stromdefizit von etwa 10%. Das Klimaschutzprojekt tr&auml;gt deshalb nicht nur zu einer emissionsfreien Zukunft bei, sondern verbessert gleichzeitig auch die indische Stromversorgung. W&auml;hrend seiner zehnj&auml;hrigen Laufzeit als Klimaschutzprojekt spart der Windpark insgesamt voraussichtlich ca. 200.000 t an CO2-&Auml;quivalente ein.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-2"><a href="http://www.theilerdruck.ch/bilder/klimaneutral/windenergie palsodi_indien_de.pdf" target="_blank"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//client-doc2.png" /></a></div>\r\n\r\n<div class="col-xs-12 col-sm-4 col-md-4">\r\n<input class="form-control" type="text" onblur="if(this.value=='''') this.value=''IKS-Nummer Abfrage'';" onclick="this.value=''''" value="ID Nummer Abfrage" size="28" id="iks_input" />\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-4 col-md-4">\r\n<input class="btn btn-primary btn-lg" type="button" onclick="window.open(''http://cpol.climatepartner.com/pages/popup/cert_popup.jsf?iks_nr='' + document.getElementById(''iks_input'').value,''_cert'',''width=995,height=725,scrollbars=yes'');" value="Suchen" id="iks_submit" name="button">\r\n</div>\r\n</div>\r\n', 'prallax-img6.jpg', '<h1 class="short text-shadow  white bold"><strong>Klimaneutraler Druck wird bei uns grossgeschrieben</strong></h1>', '1', 7, '2015-06-04 06:42:35', '2015-06-04 18:12:35'),
(8, 'Service', '', '<div class="row">\r\n<div class="col-xs-12 col-sm-6 col-md-6">\r\n<h2>PDFX-ready</h2>\r\n\r\n<p>Durch die Einhaltung gewisser Standards kann eine optimale Verarbeitung Ihrer Daten garantiert werden.</p>\r\n\r\n<h2>PDFX-ready Output</h2>\r\n\r\n<p>Wir sind &laquo;PDFX-ready Output Classic CMYK + SPOT&raquo;-zertifiziert und sind somit in der Lage, DPF/X-Daten nach den Spezifikationen von PDFX-ready zu empfangen und auszugeben</p>\r\n\r\n<h2>PDFX-ready Creator</h2>\r\n\r\n<p>Wir sind PDFX-ready Creator Classic zertifiziert und sind somit in der Lage, einwandfreie PDFX-ready-Daten im Farbraum CMYK herzustellen.</p>\r\n\r\n<h2>PDF Distiller-Settings</h2>\r\n\r\n<p>Falls Sie PDF-Daten mit dem Acrobat Distiller schreiben, verwenden Sie f&uuml;r eine m&ouml;glichst einfache Weiterverarbeitung unsere Distiller-Settings.</p>\r\n\r\n<p><a href="http://www.theilerdruck.ch/downloads/Theilerdruck.joboptions.zip" target="_blank"><img alt="" src="http://theiler.pandawebsolution.com/files/pages//pdf-icon.png" style="width: 26px; height: 32px;" /> PDF Distiller-Settings herunterladen</a></p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-6 col-md-6"><a href="http://www.theilerdruck.ch/downloads/PDFX-ready_CREATOR.pdf" target="_blank"><img alt="" class="img-responsive" src="http://theiler.pandawebsolution.com/files/pages//pdfx.png" /></a></div>\r\n</div>\r\n\r\n<section class="top">\r\n<div class="row">\r\n<div class="col-md-12">\r\n<div class="sections-heading">FTP-Zugang</div>\r\n\r\n<div class="sections-content">\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-9 col-md-6">\r\n<p>Falls Sie noch keinen Benutzernamen und Passwort zu unserem FTP-Server besitzen, k&ouml;nnen Sie diese bei uns anfordern.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-6"><a href ="https://tdw.dyndns.info/" target="_blank" class="btn btn-primary btn-lg">FTP starten</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', NULL, '', '1', 8, '2015-06-04 06:39:13', '2015-06-04 18:09:13');

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
  `product_additional_info` text,
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

INSERT INTO `td_products` (`product_id`, `product_name`, `product_description`, `product_additional_info`, `product_image`, `product_sku`, `product_slug`, `product_factor`, `product_no_of_pages`, `product_no_of_copies`, `created`, `modified`) VALUES
(1, 'Zeitung Broadsheet', '315 mm x 480 mm\r\nDruck 4-farbig\r\n2 BÃ¼nde mit Ausnahme von\r\n4 und 8 Seiten Umfang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', 'wSd6V_zeitung.jpg', '000000', 'zeitung-broadsheet', 0.1512, '["4","8","12","16","20","24","28","32"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:21:54', '2015-06-15 18:59:57'),
(2, 'Zeitung Tabloid', '240mm x 315mm		\r\nDruck 4-farbig		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', 'uWOea_zeitung.jpg', '0000000', 'zeitung-tabloid', 0.0756, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-06 05:44:53', '2015-06-15 18:55:54'),
(3, 'BroschÃ¼ren A4', '210x297\r\ngeheftet\r\nDruck 4-farbig\r\nkreuzgebÃ¼ndelt on Euro pallet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', '6rWz4_broschuere.jpg', '00000000', 'broschueren-a4', 0.0624, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:33:01', '2015-06-15 18:57:34'),
(4, 'BroschÃ¼ren A5', '148 x 210		\r\ngeheftet		\r\nDruck 4-farbig		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eleifend quam eget diam sollicitudin consequat! Mauris pretium velit a ante vestibulum, non ornare sem rhoncus. Ut augue mi, viverra sed semper a, tincidunt id eros. Nunc non efficitur nunc. Suspendisse potenti. Morbi in metus aliquet, semper orci sed, viverra justo! Quisque tincidunt accumsan elementum. Nullam nisl est, ullamcorper sit amet sagittis ac, egestas nec urna. Donec feugiat feugiat tempor. Pellentesque tristique suscipit lobortis. Vivamus viverra lacinia urna et tincidunt! In tellus ipsum, fringilla vitae lacinia ut; tincidunt eget sapien. Donec at magna eu quam facilisis rhoncus. Etiam tristique iaculis mi commodo pretium. Aenean at ligula ornare; malesuada tortor a, aliquam enim. Proin accumsan nisl sem, id feugiat nisl blandit id.\r\n\r\nQuisque suscipit sagittis velit, non luctus leo maximus quis. Nunc sed ante a ante luctus tincidunt. Nunc libero ex, sagittis in vulputate vitae, convallis nec ante. Donec vitae porttitor nulla. Nullam pharetra purus eros, quis hendrerit nisi mattis dapibus. Sed sit amet varius nulla. Suspendisse aliquam lorem enim, a faucibus ipsum maximus sit amet. Sed pellentesque sit amet libero sed auctor. Praesent vitae dolor ac lorem finibus luctus. Cras sagittis fringilla libero, a pharetra eros posuere vitae. Duis porta ligula sem, sed vulputate sem tempor sit amet. Sed ante turpis, fermentum ac tellus ac, elementum blandit lacus.\r\n\r\nDonec elit eros, blandit sit amet sem quis, aliquam sollicitudin mi! Nam fermentum pulvinar orci vitae cursus. Morbi laoreet auctor ipsum sit amet venenatis? Maecenas sit amet lobortis velit. Nunc elementum mattis magna commodo fermentum. Fusce posuere neque ac posuere tincidunt. Nullam venenatis felis ac purus fringilla, ultrices bibendum ligula mattis. Curabitur dignissim, leo finibus convallis viverra; magna eros gravida diam, id varius libero augue eget ante. Nulla malesuada risus vitae lacus efficitur, vel malesuada neque malesuada. Quisque mollis tincidunt tellus, at lobortis metus convallis quis.', 'dEuNW_broschuereA5.jpg', 'product4', 'broschueren-a5', 0.0311, '["16","32","48","64","80","96","112","128"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:41:32', '2015-06-15 18:53:43'),
(5, 'Preislisten A4', '210x297		\r\ngeheftet		\r\nDruck 1-farbig schwarz		\r\nkreuzgebÃ¼ndelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eleifend quam eget diam sollicitudin consequat! Mauris pretium velit a ante vestibulum, non ornare sem rhoncus. Ut augue mi, viverra sed semper a, tincidunt id eros. Nunc non efficitur nunc. Suspendisse potenti. Morbi in metus aliquet, semper orci sed, viverra justo! Quisque tincidunt accumsan elementum. Nullam nisl est, ullamcorper sit amet sagittis ac, egestas nec urna. Donec feugiat feugiat tempor. Pellentesque tristique suscipit lobortis. Vivamus viverra lacinia urna et tincidunt! In tellus ipsum, fringilla vitae lacinia ut; tincidunt eget sapien. Donec at magna eu quam facilisis rhoncus. Etiam tristique iaculis mi commodo pretium. Aenean at ligula ornare; malesuada tortor a, aliquam enim. Proin accumsan nisl sem, id feugiat nisl blandit id.\r\n\r\nQuisque suscipit sagittis velit, non luctus leo maximus quis. Nunc sed ante a ante luctus tincidunt. Nunc libero ex, sagittis in vulputate vitae, convallis nec ante. Donec vitae porttitor nulla. Nullam pharetra purus eros, quis hendrerit nisi mattis dapibus. Sed sit amet varius nulla. Suspendisse aliquam lorem enim, a faucibus ipsum maximus sit amet. Sed pellentesque sit amet libero sed auctor. Praesent vitae dolor ac lorem finibus luctus. Cras sagittis fringilla libero, a pharetra eros posuere vitae. Duis porta ligula sem, sed vulputate sem tempor sit amet. Sed ante turpis, fermentum ac tellus ac, elementum blandit lacus.\r\n\r\nDonec elit eros, blandit sit amet sem quis, aliquam sollicitudin mi! Nam fermentum pulvinar orci vitae cursus. Morbi laoreet auctor ipsum sit amet venenatis? Maecenas sit amet lobortis velit. Nunc elementum mattis magna commodo fermentum. Fusce posuere neque ac posuere tincidunt. Nullam venenatis felis ac purus fringilla, ultrices bibendum ligula mattis. Curabitur dignissim, leo finibus convallis viverra; magna eros gravida diam, id varius libero augue eget ante. Nulla malesuada risus vitae lacus efficitur, vel malesuada neque malesuada. Quisque mollis tincidunt tellus, at lobortis metus convallis quis.', 'yMn6v_preisliste.jpg', '000000', 'preislisten-a4', 0.0624, '["8","16","24","32","40","48","56","64"]', '["5000","6000","7000","8000","9000","10000","15000","20000","25000","30000","40000","50000"]', '2015-05-07 06:43:53', '2015-06-15 18:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_answers`
--

DROP TABLE IF EXISTS `td_product_answers`;
CREATE TABLE IF NOT EXISTS `td_product_answers` (
  `product_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_question_id` int(11) NOT NULL,
  `answer_content` text NOT NULL,
  `answer_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_answer_id`),
  KEY `FK_td_product_answers` (`product_question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_product_answers`
--

INSERT INTO `td_product_answers` (`product_answer_id`, `product_question_id`, `answer_content`, `answer_status`, `created`, `modified`) VALUES
(1, 1, 'Fusce rhoncus erat condimentum nunc feugiat, ut blandit neque mattis. Donec in est vitae tellus sodales ultrices sed vitae neque. Donec volutpat nisl vitae dui commodo, suscipit ullamcorper.', '1', '2015-06-04 15:48:21', '2015-06-04 15:49:20'),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum nunc id lectus suscipit fringilla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum nunc id lectus suscipit fringilla.', '1', '2015-06-04 16:12:38', '2015-06-04 16:12:38'),
(3, 4, 'ein m2 papier ist m2 gross! ', '1', '2015-06-16 22:15:12', '2015-06-16 23:21:57');

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
-- Table structure for table `td_product_questions`
--

DROP TABLE IF EXISTS `td_product_questions`;
CREATE TABLE IF NOT EXISTS `td_product_questions` (
  `product_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `question_name` varchar(100) NOT NULL,
  `question_email` varchar(255) NOT NULL,
  `question_phone` varchar(100) NOT NULL,
  `question_content` text NOT NULL,
  `question_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_question_id`),
  KEY `FK_td_product_questions` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `td_product_questions`
--

INSERT INTO `td_product_questions` (`product_question_id`, `product_id`, `question_name`, `question_email`, `question_phone`, `question_content`, `question_status`, `created`, `modified`) VALUES
(1, 1, 'Nadesh', 'test@test.com', '', 'Test question?', '1', '2015-06-04 15:46:40', '2015-06-04 15:46:40'),
(2, 1, 'Nadesh', 'test1@test.com', '123456', 'This is my second question?', '1', '2015-06-04 16:11:38', '2015-06-04 16:11:38'),
(3, 1, 'Test', 'nadsnaddy@gmail.com', '', 'TEst', '1', '2015-06-10 12:33:02', '2015-06-10 12:33:02'),
(4, 5, 'julius ', 'info@pandavisuals.eu', '01234214234', 'wie gross ist ein m2 blatt papier? \r\n\r\ndanke fÃ¼r die antwort! ', '1', '2015-06-16 21:45:05', '2015-06-16 21:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `td_services`
--

DROP TABLE IF EXISTS `td_services`;
CREATE TABLE IF NOT EXISTS `td_services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_caption` text NOT NULL,
  `sort_value` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_services`
--

INSERT INTO `td_services` (`service_id`, `service_title`, `service_image`, `service_caption`, `sort_value`, `created`, `modified`) VALUES
(1, 'Lorem ipsum ', 'gears', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum commodo, ipsum euismod pellentesque iaculis, sem orci tincidunt velit, a aliquet neque risus sit amet dolor.', 1, '2015-06-11 01:01:11', '2015-06-11 01:01:11'),
(2, 'Lorem ipsum', 'bar-chart-o', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum commodo, ipsum euismod pellentesque iaculis, sem orci tincidunt velit, a aliquet neque risus sit amet dolor.', 2, '2015-06-11 01:08:40', '2015-06-11 01:08:40'),
(3, 'Lorem ipsum', 'truck', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum commodo, ipsum euismod pellentesque iaculis, sem orci tincidunt velit, a aliquet neque risus sit amet dolor.', 3, '2015-06-11 01:11:01', '2015-06-11 01:11:01');

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
  `user_lastname` varchar(100) DEFAULT NULL,
  `user_dob` date DEFAULT '0000-00-00',
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_login_ip` varchar(255) NOT NULL,
  `user_status` char(1) NOT NULL DEFAULT '1',
  `password_reset_token` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`user_id`, `user_name`, `user_lastname`, `user_dob`, `user_email`, `user_password`, `user_last_login`, `user_login_ip`, `user_status`, `password_reset_token`, `created`, `modified`) VALUES
(1, 'Nadesh', 'Test', '0000-00-00', 'test@gmail.com', '95a93ec5b2292aa9e3c37e6ef95099d5faaa6289', '0000-00-00 00:00:00', '', '1', '', '2015-05-19 19:26:37', '2015-06-12 19:59:00'),
(2, 'julius molnar', NULL, '0000-00-00', 'webmaster@flashartists.de', '893906ab038c221d6557843d2c0a40a71bb635d3', '0000-00-00 00:00:00', '', '1', '', '2015-05-19 21:07:53', '2015-05-19 21:07:53'),
(3, 'Nadesh Ss', NULL, '1990-02-27', 'nadesh@arkinfotec.com', '95a93ec5b2292aa9e3c37e6ef95099d5faaa6289', '0000-00-00 00:00:00', '', '1', 'noK5DX57UtApeUif2mKL9vh5o', '2015-05-20 18:02:21', '2015-06-15 13:36:25'),
(4, 'julius molnar', NULL, '1988-04-13', 'julius.molnar@outlook.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '', '2015-05-21 22:05:03', '2015-05-21 22:05:03'),
(5, 'evbbbb evb', NULL, '2015-05-04', 'info@glaswelt24.ch', '89ffe3c670c43f84ddf176b992cbfda8e3ba3d99', '0000-00-00 00:00:00', '', '1', '', '2015-05-26 02:41:47', '2015-05-26 02:41:47'),
(6, 'Lorelie Molnar', NULL, '1998-06-02', 'lorelie23@gmail.com', '8b9ec429bb9279dfb3ac85cc38ffcb8bb5322981', '0000-00-00 00:00:00', '', '1', '', '2015-06-11 23:20:58', '2015-06-11 23:20:58'),
(9, 'Prakash', 'arulmani', '1990-07-31', 'softwaretesterid@gmail.com', '95a93ec5b2292aa9e3c37e6ef95099d5faaa6289', '0000-00-00 00:00:00', '', '1', '', '2015-06-12 19:33:23', '2015-06-12 19:33:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `td_user_addresses`
--

INSERT INTO `td_user_addresses` (`address_id`, `user_id`, `address_type`, `address_title`, `address_firstname`, `address_lastname`, `address_company_type`, `address_company_name`, `address_street`, `address_additional`, `address_city`, `address_post_code`, `address_country`, `address_phone`, `address_mobile`, `created`, `modified`) VALUES
(1, 1, '0', 'Mr', 'Nadesh', 'S', 'Company', 'New Company', 'Test Street 2', '', 'Test City', '123456', 'Switzerland', '1234567890', '', '2015-05-19 19:26:37', '2015-05-19 19:26:37'),
(2, 2, '0', 'Mr', 'julius', 'molnar', 'Individual', '', 'FrÃ¶lichstr. 10 1/3', '', 'Augsburg', '5050', 'Switzerland', '0821 512662', '', '2015-05-19 21:07:53', '2015-06-12 01:38:47'),
(3, 3, '0', 'Mr', 'Nadesh', 'S', 'Company', 'Company Name', 'Testing', '', 'Mdu', '123', 'Switzerland', '1234567890', '123', '2015-05-20 18:02:21', '2015-05-20 18:02:21'),
(4, 4, '0', 'Mr', 'julius', 'molnar', 'Individual', '', 'frÃ¶lichstrasse 10 1/3', '', 'augsburg', '86150', 'Switzerland', '23424234234', '', '2015-05-21 22:05:03', '2015-05-21 22:05:03'),
(5, 5, '0', 'Mr', 'evbbbb', 'evb', 'Company', 'rhbh', 'fcdvxv', '', 'dvsd', '8855', 'Switzerland', '0438446518', '', '2015-05-26 02:41:47', '2015-05-26 02:41:47'),
(6, 6, '0', 'Ms', 'Lorelie', 'Molnar', 'Individual', '', 'gunterstrasse', '', 'zurioch', '8000', 'Switzerland', '0000000', '', '2015-06-11 23:20:58', '2015-06-11 23:20:58'),
(9, 9, '0', 'Mr', 'Prakash', 'arulmani', 'Individual', '', '10, Main street', 'tet', 'city', '1000', 'Switzerland', '589541112515', '', '2015-06-12 19:33:23', '2015-06-13 18:58:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `td_order_items`
--
ALTER TABLE `td_order_items`
  ADD CONSTRAINT `FK_td_order_items` FOREIGN KEY (`order_id`) REFERENCES `td_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `td_product_answers`
--
ALTER TABLE `td_product_answers`
  ADD CONSTRAINT `FK_td_product_answers` FOREIGN KEY (`product_question_id`) REFERENCES `td_product_questions` (`product_question_id`);

--
-- Constraints for table `td_product_prices`
--
ALTER TABLE `td_product_prices`
  ADD CONSTRAINT `FK_td_product_prices` FOREIGN KEY (`product_id`) REFERENCES `td_products` (`product_id`);

--
-- Constraints for table `td_product_questions`
--
ALTER TABLE `td_product_questions`
  ADD CONSTRAINT `FK_td_product_questions` FOREIGN KEY (`product_id`) REFERENCES `td_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `td_user_addresses`
--
ALTER TABLE `td_user_addresses`
  ADD CONSTRAINT `FK_td_user_addresses_user` FOREIGN KEY (`user_id`) REFERENCES `td_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
