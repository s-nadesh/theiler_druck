-- phpMyAdmin SQL Dump
-- version 2.11.11.1
-- http://www.phpmyadmin.net
--
-- Host: 46.252.22.3:3304
-- Generation Time: Aug 10, 2015 at 07:59 AM
-- Server version: 5.6.19
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db321651_309`
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
  `admin_profile_image` mediumtext NOT NULL,
  `admin_bank_info` mediumtext,
  `admin_last_login` datetime NOT NULL,
  `admin_login_ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `td_admins`
--

INSERT INTO `td_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_profile_image`, `admin_bank_info`, `admin_last_login`, `admin_login_ip`, `created`, `modified`) VALUES
(1, 'Theiler Druck Admin', 'info@theilerdruck.ch', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'VeNRz_logo.jpg', '{"owner_name":"Theiler Druck AG","bank_name":"Bank name","bank_account_number":"12323123123123","blz":"72090200","bic":"ANHODE77XXX","iban":"DE73720302270052845301","bank_information":"Bank info"}', '2015-08-10 11:04:48', '122.164.152.244', '2015-04-24 00:00:00', '2015-08-10 11:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `td_contact_addresses`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_contact_addresses`
--

INSERT INTO `td_contact_addresses` (`cont_addr_id`, `cont_addr_type`, `cont_addr_company`, `cont_addr_address_1`, `cont_addr_address_2`, `cont_addr_email`, `cont_addr_email_2`, `cont_addr_email_3`, `cont_addr_fax`, `cont_addr_phone`, `cont_addr_country`, `cont_addr_website`, `cont_addr_facebook`, `cont_addr_twitter`, `cont_addr_linkedin`, `created`, `modified`) VALUES
(1, 'DF', 'Theiler Druck AG', 'Verenastrasse 2', '8832 Wollerau', 'info@theilerdruck.ch', '', '', '044 787 03 01', '044 787 03 00', 'Switzerland', '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-16 13:53:42'),
(2, 'A1', 'Höfner Volksblatt', 'Verenastrasse 2 ', '8832 Wollerau ', 'redaktion@hoefner.ch', 'inserate@theilermediaservice.ch', '', '044 787 03 10', '044 787 03 03', 'Switzerland', 'http://www.hoefner.ch', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-17 18:04:56'),
(3, 'A2', 'March-Anzeiger', 'Alpenblickstrasse 26', '8853 Lachen', 'redaktion@marchanzeiger.ch', 'inserate@theilermediaservice.ch', '', '055 451 08 89', '055 451 08 88', 'Switzerland', 'http://www.marchanzeiger.ch', 'https://www.facebook.com/', 'https://twitter.com/', 'https://de.linkedin.com/nhome/', '2015-06-12 16:47:28', '2015-06-17 18:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `td_contact_persons`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `td_contact_persons`
--

INSERT INTO `td_contact_persons` (`cont_pers_id`, `cont_pers_name`, `cont_pers_email`, `cont_pers_position`, `cont_pers_phone`, `cont_pers_image`, `cont_pers_level`, `created`, `modified`) VALUES
(1, 'Walter Feldman', 'w.feldmann@theilerdruck.ch', 'Geschäftsführer', '044 787 03 65', 'G6Xge_contact-person1.png', 1, '2015-06-11 12:55:35', '2015-07-16 09:57:37'),
(2, 'Michel Schwander', 'm.schwander@theilerdruck.ch', 'Leiter Verkauf Innendienst', '044 787 03 69 ', 'KoGKM_contact-person2.png', 2, '2015-06-11 13:14:05', '2015-06-11 13:14:05'),
(3, 'Roland Bachmann', 'r.bachman@theilerdruck.ch', 'Kundenberater VID', '044 787 03 06', 'Qp7wa_contact-person3.png', 2, '2015-06-11 13:14:40', '2015-06-17 17:58:47'),
(4, 'Heinz Bürgi ', 'h.buergi@theilerdruck.ch', 'Kundenberater VID', '044 787 03 02', 'tQyS3_contact-person4.png', 2, '2015-06-11 13:15:22', '2015-06-17 17:59:20'),
(5, 'Herbert Steiner ', 'h.steiner@theilerdruck.ch', 'Kundenberater VID', '044 787 03 68', 'TaXjT_contact-person5.png', 2, '2015-06-11 13:15:54', '2015-06-15 22:01:18'),
(6, 'Rolf Meister ', 'r.meister@theilerdruck.ch', 'Leiter Druckvorstufe', '044 787 03 07', 'o50V2_contact-person6.png', 3, '2015-06-11 13:16:26', '2015-06-17 17:58:02'),
(7, 'Guido Weber ', 'g.weber@theilerdruck.ch', 'Leiter Druck', '044 787 03 67', 'tVb9D_contact-person7.png', 3, '2015-06-11 13:16:59', '2015-06-11 13:16:59'),
(8, 'Tim Kafitz', 't.kafitz@theilerdruck.ch', 'Abteilungsleiter Ausrüsterei und Spedition', '044 786 09 00', 'hqonb_contact-person8.png', 3, '2015-06-11 13:17:29', '2015-07-06 22:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `td_email_templates`
--

CREATE TABLE IF NOT EXISTS `td_email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(50) NOT NULL,
  `template_from` varchar(255) NOT NULL,
  `template_reply_to` varchar(255) NOT NULL,
  `template_subject` varchar(255) NOT NULL,
  `template_content` mediumtext NOT NULL,
  `template_variables` varchar(255) DEFAULT NULL,
  `template_success_message` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `td_email_templates`
--

INSERT INTO `td_email_templates` (`template_id`, `template_name`, `template_from`, `template_reply_to`, `template_subject`, `template_content`, `template_variables`, `template_success_message`, `created`, `modified`) VALUES
(1, 'User hat das Passwort vergessen', 'info@theilerdruck.ch', 'info@theilerdruck.ch', 'Ihr Passwort bei Zeitungsdrucker.ch wurde zurükgesetzt', '<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="padding:20px 20px 0 20px">\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;"><font color="#333333"><span style="line-height: 20.7999992370605px;">Sehr geehrte/r &nbsp;##NAME##,</span></font></p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;"><font color="#333333"><span style="line-height: 20.7999992370605px;">wir haben eine Anfrage erhalten das&nbsp;Passwort f&uuml;r Ihr Konto zur&uuml;ckzusetzen. Bitte klicken Sie&nbsp;auf den Link&nbsp;unten (oder kopieren den Link&nbsp;in Ihren&nbsp;Browser).</span></font></p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;"><font color="#333333"><span style="line-height: 20.7999992370605px;"><a href="##RESET_LINK##">Hier klicken um Ihr Passwort zur&uuml;ckzusetzen</a>.</span></font></p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Nach dem Klicken ist dieser Linknur f&uuml;r 5 Minuten g&uuml;ltig&nbsp;##TIME_VALID##</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'NAME,RESET_LINK,TIME_VALID', NULL, '2015-06-20 19:00:00', '2015-06-26 18:25:37'),
(2, 'Rechnung', 'info@theilerdruck.ch', 'info@theilerdruck.ch', 'Rechnung mit der Rechnungsnr.:  ##INVOICENO##', '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2" style="padding:20px 20px 0 20px">\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Sehr geehrte/r ##NAME##</p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Ihre Bestellung ist erfolgreich bei uns eingegangen!&nbsp;</p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Ihre Rechnung finden Sie in dieser E-Mail.&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'NAME,INVOICENO', NULL, '2015-06-26 00:00:00', '2015-06-26 18:27:21'),
(3, 'Adminpasswort vergessen', 'info@theilerdruck.ch', 'info@theilerdruck.ch', 'Passwort vergessen für die Domain ##SITENAME##', '<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="padding:20px 20px 0 20px">\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Sehr geehrte/r&nbsp;##NAME##</p>\r\n\r\n			<p style="color: #545454; font-size: 13px; line-height: 20px;">Ihr neues Passwort lautet:&nbsp;##PASSWORD##</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'NAME,PASSWORD,SITENAME', NULL, '2015-06-26 00:00:00', '2015-06-26 18:28:29'),
(4, 'Ask a Question', 'info@theilerdruck.ch', 'info@theilerdruck.ch', 'Frage zum Produkt: ##PRODUCTNAME##', '<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td class="" colspan="2" style="padding:20px 20px 0 20px">\r\n			<p class="" style="color: #545454; font-size: 13px; line-height: 20px;">Dear Admin!</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="" style="padding:20px 20px 0 20px">Name:</td>\r\n			<td class="" style="padding:20px 20px 0 20px">##NAME##</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="" style="padding:20px 20px 0 20px">Email:</td>\r\n			<td class="" style="padding:20px 20px 0 20px">##EMAIL##</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="" style="padding:20px 20px 0 20px">Phone:</td>\r\n			<td class="" style="padding:20px 20px 0 20px">##PHONE##</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="" style="padding:20px 20px 0 20px">Question:</td>\r\n			<td class="" style="padding:20px 20px 0 20px">##QUESTION##</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'NAME,EMAIL,PHONE,QUESTION,PRODUCTNAME', NULL, '2015-07-07 18:44:36', '2015-07-07 15:34:10'),
(5, 'Answer for a Question', 'info@theilerdruck.ch', 'info@theilerdruck.ch', 'Antwort zum Produkt: ##PRODUCTNAME##', '<table width="100%" border="0" cellspacing="0" cellpadding="0">\r\n    <tr>\r\n        <td colspan="2" style="padding:20px 20px 0 20px">\r\n            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear ##NAME##</p>\r\n        </td>\r\n    </tr>\r\n    \r\n    <tr>\r\n        <td style="padding:20px 20px 0 20px">Question:</td>\r\n        <td style="padding:20px 20px 0 20px">##QUESTION##</td>\r\n    </tr>\r\n    \r\n    <tr>\r\n        <td style="padding:20px 20px 0 20px">Answer:</td>\r\n        <td style="padding:20px 20px 0 20px">##ANSWER##</td>\r\n    </tr>\r\n</table>', 'NAME,QUESTION,ANSWER,PRODUCTNAME', NULL, '2015-07-07 19:08:56', '2015-07-07 19:08:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=443 ;

--
-- Dumping data for table `td_languages`
--

INSERT INTO `td_languages` (`language_id`, `english`, `german`, `created`, `modified`) VALUES
(1, 'Register An Account', 'Konto erstellen', '2015-05-12 17:18:27', '2015-05-13 17:48:37'),
(2, 'Change Password', 'Passwort ändern', '2015-05-12 17:18:58', '2015-06-18 16:10:04'),
(3, 'New Password', 'Neues Passwort', '2015-05-12 17:18:58', '2015-05-13 17:10:15'),
(4, 'Confirm Password', 'Passwort bestätigen', '2015-05-12 17:18:58', '2015-06-18 16:10:28'),
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
(33, 'Save Paper Variant', 'Papierarten übernehmen', '2015-05-12 17:18:59', '2015-06-18 16:17:51'),
(34, 'Back', 'zurück', '2015-05-12 17:18:59', '2015-06-16 18:52:16'),
(35, 'Paper Name', 'Papierbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:53'),
(36, 'Range in milligram', 'Gewicht in g/m²', '2015-05-12 17:18:59', '2015-06-29 08:05:17'),
(37, 'Manage Paper Variants', 'Papierarten verwalten', '2015-05-12 17:18:59', '2015-05-13 17:06:03'),
(38, 'Paper range in mg', 'Papiergewicht in g/m²', '2015-05-12 17:18:59', '2015-06-29 08:03:56'),
(39, 'Paper range in gram', 'Papiergewicht in g', '2015-05-12 17:18:59', '2015-05-13 17:50:44'),
(40, 'Action', 'Aktion', '2015-05-12 17:18:59', '2015-06-17 12:47:42'),
(41, 'Save', 'Speichern ', '2015-05-12 17:18:59', '2015-06-26 18:29:02'),
(42, 'Product Add', 'Artikel hinzufügen', '2015-05-12 17:18:59', '2015-06-18 16:17:08'),
(43, 'Add Product', 'Produkt hinzufügen', '2015-05-12 17:18:59', '2015-06-18 16:06:34'),
(44, 'Product Name', 'Artikelname', '2015-05-12 17:18:59', '2015-05-13 17:33:45'),
(45, 'Product Description', 'Artikelbeschreibung', '2015-05-12 17:18:59', '2015-05-13 17:15:24'),
(46, 'Product SKU', 'Artikel SKU', '2015-05-12 17:18:59', '2015-05-13 17:33:58'),
(47, 'Product Factor', 'Faktor', '2015-05-12 17:18:59', '2015-05-13 17:33:40'),
(48, 'Product No.Of Pages', 'Artikelumfang', '2015-05-12 17:18:59', '2015-05-13 17:33:50'),
(49, 'Product No.Of Copies', 'Artikelauflage', '2015-05-12 17:18:59', '2015-05-13 17:33:47'),
(50, 'Product Image', 'Artikelbild', '2015-05-12 17:18:59', '2015-05-13 17:33:42'),
(51, 'Save Product', 'Artikel übernehmen', '2015-05-12 17:18:59', '2015-06-18 16:17:58'),
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
(67, 'Save Shipping Cost', 'Versandkosten übernehmen', '2015-05-12 17:19:00', '2015-06-18 16:18:06'),
(68, 'Target Zip From', 'Ziel PLZ von', '2015-05-12 17:19:00', '2015-05-13 17:47:13'),
(69, 'Target Zip To', 'Ziel PLZ nach', '2015-05-12 17:19:00', '2015-05-13 17:47:15'),
(70, 'Basic Weight Price', 'Grundpreis Gewicht', '2015-05-12 17:19:00', '2015-05-13 15:31:41'),
(71, 'Additional Weight Price', 'Zusatzpreis für Gewicht', '2015-05-12 17:19:00', '2015-06-18 16:07:27'),
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
(82, 'Additional Services', 'Zusätzlicher Service', '2015-05-30 16:58:03', '2015-06-18 16:07:20'),
(83, 'Calculate Shipping', 'Versand berechnen', '2015-05-30 16:58:03', '2015-06-02 03:41:57'),
(84, 'Country', 'Land', '2015-05-30 16:58:03', '2015-06-02 03:44:37'),
(85, 'Update Totals', 'Summen aktualisieren', '2015-05-30 16:58:03', '2015-06-02 03:57:58'),
(86, 'Cart Totals', 'Warenkorb Gesamt', '2015-05-30 16:58:03', '2015-06-02 03:42:23'),
(87, 'Shipping Cost', 'Versandkosten', '2015-05-30 16:58:03', '2015-06-02 03:55:18'),
(88, 'Total Net', 'Gesamtnetto', '2015-05-30 16:58:03', '2015-06-02 03:57:03'),
(89, 'incl. 8% VAT.', 'inkl. 8% MwSt.', '2015-05-30 16:58:03', '2015-06-26 11:19:38'),
(90, 'Total Gross', 'Gesamtbrutto', '2015-05-30 16:58:03', '2015-06-02 03:57:01'),
(91, 'Update Cart', 'Warenkorb aktualisieren', '2015-05-30 16:58:03', '2015-06-02 03:57:41'),
(92, 'Proceed to Checkout', 'Zur Kasse gehen', '2015-05-30 16:58:03', '2015-06-02 04:15:07'),
(93, 'Billing Address', 'Rechnungsadresse', '2015-05-30 16:58:03', '2015-06-02 03:40:02'),
(94, 'Shipping Address', 'Versandadresse ', '2015-05-30 16:58:03', '2015-06-02 03:54:48'),
(95, 'Payment Method', 'Zahlungsmethode', '2015-05-30 16:58:03', '2015-06-02 04:14:46'),
(96, 'Summary', 'Zusammenfassung', '2015-05-30 16:58:03', '2015-06-02 03:56:05'),
(97, 'Company', 'Firma', '2015-05-30 16:58:03', '2015-06-02 03:43:32'),
(98, 'required fields', 'Pflichtfelder', '2015-05-30 16:58:03', '2015-06-23 01:07:16'),
(99, 'Company or Individual', 'Firma oder Privatperson', '2015-05-30 16:58:03', '2015-06-02 03:44:09'),
(100, 'Company Name', 'Firmenname', '2015-05-30 16:58:03', '2015-06-02 03:43:38'),
(101, 'Personal Data', 'Persönliche Daten', '2015-05-30 16:58:03', '2015-06-18 16:16:00'),
(102, 'Title', 'Titel', '2015-05-30 16:58:03', '2015-06-02 03:56:10'),
(103, 'Firstname', 'Vorname', '2015-05-30 16:58:03', '2015-06-02 03:46:33'),
(104, 'Lastname', 'Nachname', '2015-05-30 16:58:03', '2015-06-02 03:47:26'),
(105, 'Your Address Details', 'Ihre Adressedaten', '2015-05-30 16:58:03', '2015-06-02 03:59:42'),
(106, 'Street/No', 'Strasse / Hausnummer', '2015-05-30 16:58:03', '2015-06-02 03:55:59'),
(107, 'Additional address', 'Zusätzliche Adresse', '2015-05-30 16:58:03', '2015-06-18 16:07:10'),
(108, 'City', 'Ort', '2015-05-30 16:58:03', '2015-06-23 02:02:48'),
(109, 'Post Code', 'PLZ', '2015-05-30 16:58:03', '2015-06-02 03:53:08'),
(110, 'Your Contact Information', 'Ihre Kontaktdaten', '2015-05-30 16:58:03', '2015-06-02 03:59:54'),
(111, 'Mobile', 'Mobil', '2015-05-30 16:58:03', '2015-06-02 03:48:38'),
(112, 'Phone', 'Telefon', '2015-05-30 16:58:03', '2015-06-02 03:52:42'),
(113, 'Continue your order', 'Mit der Bestellung fortfahren', '2015-05-30 16:58:03', '2015-06-02 03:44:31'),
(114, 'Registration', 'Registration', '2015-05-30 16:58:03', '2015-06-02 03:53:35'),
(115, 'I am new here', 'Ich bin neu hier', '2015-05-30 16:58:03', '2015-06-02 03:46:52'),
(116, 'Welcome on Theiler Druck AG', 'Willkommen bei der Theiler Druck AG', '2015-05-30 16:58:03', '2015-06-02 03:59:22'),
(117, 'By logging in at Theiler Druck you are able to order more quick, know your order status at any time and you will always get an updated summary of your current orders.', 'Wenn Sie sich bei uns registrieren, sind Sie in der Lage, schneller und einfacher den Status Ihrer Bestellungen zu prüfen und erhalten eine aktuelle übersicht über Ihre aktuellen Aufträge.', '2015-05-30 16:58:03', '2015-06-18 16:09:28'),
(118, 'Create Account', 'Konto anlegen', '2015-05-30 16:58:03', '2015-06-02 03:44:52'),
(119, 'I already have an account', 'Ich bin bereits registriert', '2015-05-30 16:58:03', '2015-06-02 03:46:45'),
(120, 'Billing Address Change', 'Rechnungsadresse ändern', '2015-05-30 16:58:03', '2015-06-18 16:07:54'),
(121, 'Shipping Address Change', 'Versandadresse ändern', '2015-05-30 16:58:03', '2015-06-18 16:18:21'),
(122, 'Already have an account?', 'Sie sind schon registriert?', '2015-05-30 16:58:03', '2015-06-02 03:39:12'),
(123, 'Login here', 'Hier anmelden', '2015-05-30 16:58:03', '2015-06-02 03:47:43'),
(124, 'Date of Birth', 'Geburtsdatum', '2015-05-30 16:58:03', '2015-06-02 03:45:10'),
(125, 'Repeat Password', 'Passwort wiederholen', '2015-05-30 16:58:03', '2015-06-02 03:54:02'),
(126, 'Choose Shipping Address', 'Versandadresse auswählen', '2015-05-30 16:58:03', '2015-06-18 16:10:14'),
(127, 'Shipping address and billing address are identical', 'Versandadresse und Rechnungsadresse sind identisch', '2015-05-30 16:58:03', '2015-06-02 03:55:00'),
(128, 'Create new shipping address', 'Neue Versandadresse anlegen', '2015-05-30 16:58:03', '2015-06-02 03:45:01'),
(129, 'Payment method change', 'Zahlungsmethode ändern', '2015-05-30 16:58:03', '2015-06-18 16:16:08'),
(130, 'Comment to the order', 'Kommentar zur Bestellung', '2015-05-30 16:58:03', '2015-06-02 03:43:18'),
(131, 'Your shopping cart contains the following products', 'Ihr Warenkorb enthält folgende Artikel', '2015-05-30 16:58:03', '2015-06-02 04:00:05'),
(132, 'Edit cart', 'Warenkorb bearbeiten', '2015-05-30 16:58:03', '2015-06-02 03:45:52'),
(133, 'View Cart', 'Warenkorb ansehen', '2015-05-30 16:58:03', '2015-06-02 03:58:49'),
(134, 'Register now', 'Jetzt registrieren', '2015-05-30 16:58:03', '2015-06-02 03:53:30'),
(135, 'New here ?', 'Neu hier?', '2015-05-30 16:58:03', '2015-06-02 03:48:55'),
(136, 'My Account', 'Mein Konto', '2015-05-30 16:58:03', '2015-06-02 03:48:43'),
(137, 'Change Billing Address', 'Rechnungsadresse ändern', '2015-05-30 16:58:03', '2015-06-18 16:09:55'),
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
(159, 'Order Items', 'Bestellübersicht', '2015-05-30 16:58:04', '2015-06-18 16:14:49'),
(160, 'Add Page', 'Seite hinzufügen', '2015-05-30 16:58:04', '2015-06-18 16:06:36'),
(161, 'Page Title', 'Seiten Titel', '2015-05-30 16:58:04', '2015-06-02 03:51:40'),
(162, 'Page Description', 'Seitenbeschreibung', '2015-05-30 16:58:04', '2015-06-02 03:51:07'),
(163, 'Save Page', 'Seite speichern', '2015-05-30 16:58:04', '2015-06-02 03:54:31'),
(164, 'Manage Pages', 'Seiten verwalten', '2015-05-30 16:58:04', '2015-06-02 03:48:04'),
(165, 'Page Language', 'Seitensprache', '2015-05-30 16:58:04', '2015-06-02 03:51:14'),
(166, 'Descripition', 'Beschreibung', '2015-05-30 16:58:04', '2015-06-02 03:45:38'),
(167, 'Slug', 'Slug', '2015-05-30 16:58:04', '2015-06-02 03:55:29'),
(168, 'Edit', 'Bearbeiten', '2015-05-30 16:58:04', '2015-07-02 22:14:09'),
(169, 'Page', 'Seite', '2015-05-30 16:58:04', '2015-06-02 03:51:01'),
(170, 'View Page', 'Seite ansehen', '2015-05-30 16:58:04', '2015-06-02 03:59:04'),
(171, 'Page Slug', 'Page Slug', '2015-05-30 16:58:04', '2015-06-02 03:51:24'),
(172, 'Page Status', 'Seiten Status', '2015-05-30 16:58:04', '2015-06-02 03:51:32'),
(173, 'Picture Upload', 'Bild hochladen', '2015-05-30 16:58:04', '2015-06-02 03:52:48'),
(174, 'Add StaticPage', 'Statische Seite hinzufügen', '2015-05-30 16:58:04', '2015-06-18 16:06:26'),
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
(193, 'Parallax Image', 'Parallax Bild', '2015-06-09 18:23:53', '2015-06-09 20:52:20'),
(194, 'Parallax Caption', 'Parallax Bildüberschrift', '2015-06-09 18:23:53', '2015-06-18 16:15:14'),
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
(206, 'Ask a Question', 'Frage zum Produkt stellen', '2015-06-09 18:23:53', '2015-06-25 18:46:30'),
(207, 'Your name', 'Ihr Name', '2015-06-09 18:23:53', '2015-06-09 20:53:47'),
(208, 'Your email address', 'Ihre E-Mail Adresse', '2015-06-09 18:23:53', '2015-06-09 20:53:41'),
(209, 'Your phone', 'Ihre Telefonnr.', '2015-06-09 18:23:53', '2015-06-09 20:54:03'),
(210, 'Captcha', 'Captcha', '2015-06-09 18:23:53', '2015-06-09 20:54:47'),
(211, 'Pictures', 'Bilder', '2015-06-12 16:57:44', '2015-06-16 01:09:42'),
(212, 'Contact Person', 'Ansprechpartner', '2015-06-12 16:57:44', '2015-06-23 01:03:11'),
(213, 'Add', 'Hinzufügen', '2015-06-12 16:57:44', '2015-06-18 16:06:42'),
(214, 'Add Contact Person', 'Kontaktperson hinzufügen', '2015-06-12 16:57:44', '2015-06-18 16:06:39'),
(215, 'Position', 'Position', '2015-06-12 16:57:44', '2015-06-16 01:11:34'),
(216, 'Image', 'Bild', '2015-06-12 16:57:44', '2015-06-16 00:46:58'),
(217, 'Level', 'Reihenfolge', '2015-06-12 16:57:44', '2015-06-17 18:04:48'),
(218, 'Edit Contact Person', 'Kontaktperson bearbeiten', '2015-06-12 16:57:44', '2015-06-16 00:40:09'),
(219, 'Contact Persons', 'Ansprechpartner', '2015-06-12 16:57:44', '2015-06-23 01:03:17'),
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
(231, 'Product Type', 'Produktart', '2015-06-12 16:57:44', '2015-07-02 13:26:58'),
(232, 'Format', 'Format', '2015-06-12 16:57:44', '2015-06-16 00:45:28'),
(233, 'Customised Size', 'Individuelle Grösse', '2015-06-12 16:57:44', '2015-06-18 16:12:49'),
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
(250, 'ready-for-exposure Data deliver on', 'belichtungsfertige Daten liefern auf', '2015-06-12 16:57:45', '2015-06-18 00:27:13'),
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
(264, 'Do not hesitate to ask for a free quote. we will gladly make our offer .', 'Zögern Sie nicht, verlangen Sie eine unverbindliche Offerte. Wir unterbreiten Ihnen gerne unser Angebot. ', '2015-06-12 16:57:45', '2015-06-18 16:13:21'),
(265, 'Hide Inquiry', 'zuklappen', '2015-06-12 16:57:45', '2015-06-16 01:19:29'),
(266, 'Sheet', 'Einzelblatt', '2015-06-12 16:57:45', '2015-06-16 01:14:19'),
(267, 'Leaflet', 'Flugblatt', '2015-06-12 16:57:45', '2015-06-16 00:48:10'),
(268, 'Catalogue', 'Prospekt', '2015-06-12 16:57:45', '2015-06-16 01:12:29'),
(269, 'Business cards', 'Vistenkarten', '2015-06-12 16:57:45', '2015-06-16 00:34:06'),
(270, 'Brochure with envelope', 'Broschüre mit Umschlag', '2015-06-12 16:57:45', '2015-06-18 16:08:02'),
(271, 'Brochure without cover', 'Broschüre ohne Umschlag', '2015-06-12 16:57:45', '2015-06-18 16:08:10'),
(272, 'Envelopes', 'Couverts', '2015-06-12 16:57:45', '2015-06-16 00:38:12'),
(273, 'Please filling out : adhesive strips with or without windows, ( left / right), with, rubberized', 'Bitte ausfüllen: mit Fenster, ohne Fenster, (links/rechts), mit Haftstreifen, gummiert', '2015-06-12 16:57:45', '2015-06-18 00:19:45'),
(274, 'printed on one side', 'einseitig bedruckt', '2015-06-12 16:57:45', '2015-06-16 00:41:53'),
(275, 'printed on both sides', 'beidseitig bedruckt', '2015-06-12 16:57:45', '2015-06-16 00:30:36'),
(276, 'Neusatz & design by Theiler Druck AG', 'Neusatz & design durch Theiler Druck AG', '2015-06-12 16:57:45', '2015-06-16 01:21:04'),
(277, 'Raw data + Image sources delivered / set breaks by Theiler Druck AG', 'Rohdaten + Bildvorlagen geliefert / Satzumbruch durch Theiler Druck AG', '2015-06-12 16:57:45', '2015-06-16 01:12:49'),
(278, 'Supplied exposure -ready data with program / ​​system information and color- expressive', 'Belichtungsfertige Daten mit Programm/systemangaben und farbverbindlichen Ausdruck angeliefert', '2015-06-12 16:57:45', '2015-06-16 01:16:21'),
(279, 'Please note that we can only process your request if the address details are correct', 'Bitte beachten Sie, dass wir Ihre Anfrage nur bearbeiten, wenn die Adressangaben korrekt sind.', '2015-06-12 16:57:45', '2015-06-16 01:11:02'),
(280, 'Submit Request', 'Anfrage abschicken', '2015-06-12 16:57:45', '2015-06-16 01:16:03'),
(281, 'Show Inquiry', 'aufklappen', '2015-06-12 16:57:45', '2015-06-16 01:19:17'),
(282, 'Service', 'Leistung ', '2015-06-12 16:57:45', '2015-06-16 01:13:53'),
(283, 'Edit service content', 'Leistungsinhalte bearbeiten ', '2015-06-12 16:57:45', '2015-06-16 21:01:32'),
(284, 'Service Title', 'Titel Leistung ', '2015-06-12 16:57:45', '2015-06-16 21:16:58'),
(285, 'Icon', 'Icon', '2015-06-12 16:57:45', '2015-06-16 00:47:04'),
(286, 'Description', 'Beschreibung', '2015-06-12 16:57:45', '2015-06-16 00:38:20'),
(287, 'Edit service', 'Leistungen bearbeiten', '2015-06-12 16:57:45', '2015-06-16 21:01:25'),
(288, 'Services', 'Unsere Vorteile', '2015-06-12 16:57:45', '2015-06-23 17:45:49'),
(289, 'Manage Services', 'Leistungen verwalten', '2015-06-12 16:57:45', '2015-06-16 00:49:23'),
(290, 'Add Service', 'Dienstleistung hinzufügen', '2015-06-12 16:57:45', '2015-06-18 16:06:31'),
(291, 'Calculate shipping costs', 'Versandkosten kalkulieren', '2015-06-13 19:52:00', '2015-06-13 19:52:00'),
(292, 'Orders history', 'Bestellhistorie', '2015-06-16 18:05:28', '2015-06-16 21:16:08'),
(293, 'Purchases statistics', 'Einkaufstatistiken', '2015-06-16 18:05:28', '2015-06-23 00:26:54'),
(294, 'Activity', 'Aktivitäten', '2015-06-16 18:05:28', '2015-06-16 20:32:29'),
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
(305, 'Edit this item', 'Bearbeiten', '2015-06-16 18:05:28', '2015-06-18 17:07:07'),
(306, 'Contact Address', 'Kontaktadresse', '2015-06-16 18:05:28', '2015-06-16 20:59:00'),
(307, 'Address 1', 'Adresse 1', '2015-06-16 18:05:28', '2015-06-16 20:52:11'),
(308, 'Address 2', 'Adresse 2', '2015-06-16 18:05:29', '2015-06-16 20:52:18'),
(309, 'Website', 'Webseite', '2015-06-16 18:05:29', '2015-06-16 21:18:52'),
(310, 'Facebook', 'Facebook', '2015-06-16 18:05:29', '2015-06-18 16:13:35'),
(311, 'Twitter', 'Twitter', '2015-06-16 18:05:29', '2015-07-07 11:12:07'),
(312, 'Linkedin', 'Linkedin', '2015-06-16 18:05:29', '2015-07-07 11:13:25'),
(313, 'Manage Contact Address', 'Kontaktadressen verwalten', '2015-06-16 18:05:29', '2015-06-16 21:08:54'),
(314, 'Your order has been placed successfully', 'Ihre Bestellung wurde erfolgreich abgeschickt', '2015-06-16 18:05:29', '2015-06-23 00:34:16'),
(315, 'Your invoice pdf attached with this mail', 'Ihre Rechnung im PDF Format ist angehängt an diese E-Mail', '2015-06-16 18:05:29', '2015-06-16 21:19:33'),
(316, 'INVOICE', 'RECHNUNG', '2015-06-16 18:05:29', '2015-06-16 21:03:59'),
(317, 'Offset white', 'Offset weiss', '2015-06-16 18:05:29', '2015-06-16 18:30:11'),
(318, 'Offset color', 'Offset fabrig', '2015-06-16 18:05:29', '2015-06-16 18:30:26'),
(319, 'Laser-Inkjet', 'Laser-Inkjet', '2015-06-16 18:05:29', '2015-06-16 18:30:38'),
(320, 'chem. Paper', 'chem. Papier', '2015-06-16 18:05:29', '2015-06-16 18:30:51'),
(321, 'matt coated', 'matt gerstrichen', '2015-06-16 18:05:29', '2015-06-16 18:31:02'),
(322, 'glossy coated', 'glänzend gestrichen', '2015-06-16 18:05:29', '2015-06-16 18:31:16'),
(323, 'Business card', 'Visitenkarten', '2015-06-16 18:05:29', '2015-06-16 18:31:29'),
(324, 'wire stiched', 'Drahtheftung', '2015-06-16 18:05:29', '2015-06-16 18:31:45'),
(325, 'eyelet ring', 'Ringösen', '2015-06-16 18:05:29', '2015-06-16 18:31:59'),
(326, 'adhesive binding', 'Klebebindung', '2015-06-16 18:05:29', '2015-06-16 18:32:16'),
(327, 'thread stitched', 'Fadenheftung', '2015-06-16 18:05:29', '2015-06-16 18:32:33'),
(328, 'folded', 'gefalzt', '2015-06-16 18:05:29', '2015-06-16 18:32:48'),
(329, 'fluted', 'gerillt', '2015-06-16 18:05:29', '2015-06-16 18:32:58'),
(330, 'punched', 'gestanzt', '2015-06-16 18:05:29', '2015-06-16 18:33:11'),
(331, 'perforated', 'perforiert', '2015-06-16 18:05:29', '2015-06-16 18:33:27'),
(332, 'slitted', 'geschlitzt', '2015-06-16 18:05:29', '2015-06-16 18:33:38'),
(333, 'Forgot Password ?', 'Passwort vergessen?', '2015-06-16 18:05:29', '2015-06-16 21:03:34'),
(334, 'Last Name', 'Nachname', '2015-06-16 18:05:29', '2015-06-16 21:07:41'),
(335, 'Reset Password', 'Passwort zurücksetzen', '2015-06-16 18:05:29', '2015-06-16 21:18:28'),
(339, 'Mr', 'Herr', '2015-06-19 12:02:00', '2015-06-19 12:02:00'),
(340, 'Ms', 'Frau', '2015-06-19 12:02:00', '2015-06-19 12:02:00'),
(341, 'Invoice', 'Rechnung', '2015-06-19 12:02:00', '2015-06-19 12:02:00'),
(342, 'Pending', 'Ausstehend', '2015-06-19 12:02:00', '2015-07-02 22:18:42'),
(343, 'Progress', 'Bestellung wird bearbeitet', '2015-06-19 12:02:00', '2015-07-02 22:16:44'),
(344, 'Completed', 'Fertiggestellt', '2015-06-19 12:02:00', '2015-06-19 12:02:00'),
(345, 'Cancel', 'Stornieren', '2015-06-19 12:02:00', '2015-06-19 12:02:00'),
(346, 'Success', 'Erfolg', '2015-06-19 13:26:00', '2015-06-19 13:26:00'),
(347, 'No File Selected', 'keine Datei ausgewählt', '2015-06-19 13:33:00', '2015-06-19 13:33:00'),
(348, 'Email/Password combination was wrong', 'E-Mail / Passwort Kombination falsch!', '2015-06-19 20:23:00', '2015-06-23 00:08:13'),
(349, 'You have logged out successfully!!!.', 'Sie haben sich erfolgreich abgemeldet', '2015-06-19 20:23:00', '2015-06-23 00:31:27'),
(350, 'Profile has been updated successfully!!!.', 'Profil wurde erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:26:12'),
(351, 'Profile can not be update.', 'Profil kann nicht aktualisiert werden', '2015-06-19 20:23:00', '2015-06-23 00:25:56'),
(352, 'Password changed successfully.', 'Passwort wurde erfolgreich geändert', '2015-06-19 20:23:00', '2015-06-23 00:16:28'),
(353, 'Password can not be changed .', 'Passwort kann nicht geändert werden', '2015-06-19 20:23:00', '2015-06-23 00:15:29'),
(354, 'New password has been sent to your mail.', 'Neues Passwort wurde an Ihre E-Mail Adresse gesandt!', '2015-06-19 20:23:00', '2015-06-23 00:12:39'),
(355, 'This email address is not exists.', 'Diese E-Mail Adresse existiert nicht', '2015-06-19 20:23:00', '2015-06-23 00:30:12'),
(356, 'Login is incorrect', 'Anmeldung war falsch', '2015-06-19 20:23:00', '2015-06-23 00:12:15'),
(357, 'Registration failed, Please check the errors in the form', 'Registration ist fehlgeschlagen. Bitte prüfen Sie Ihre Eingaben', '2015-06-19 20:23:00', '2015-06-23 00:28:09'),
(358, 'Contact Address updated successfully', 'Kontaktadresse erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:04:47'),
(359, 'ContactPerson has been successfully added', 'Ansprechpartner wurde erfolgreich hinzugefügt', '2015-06-19 20:23:00', '2015-06-23 01:03:22'),
(360, 'Content updated successfully', 'Inhalt wurde erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:05:18'),
(361, 'Language updated successfully.', 'Sprache wurde erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:11:33'),
(362, 'Language can not be updated, Please try again', 'Sprache kann nicht aktualisiert werden. Bitte versuchen Sie es noch einmal', '2015-06-19 20:23:00', '2015-06-23 00:11:18'),
(363, 'Invalid Order', 'Falsche Bestellung', '2015-06-19 20:23:00', '2015-06-23 00:09:12'),
(364, 'Access denied.', 'Zugriff verweigert', '2015-06-19 20:23:00', '2015-06-23 00:03:51'),
(365, 'Page has been successfully added', 'Seite wurde erfolgreich hinzugefügt', '2015-06-19 20:23:00', '2015-06-23 00:14:07'),
(366, 'Your Message sent successfully', 'Ihre Nachricht wurde erfolgreich gesendet', '2015-06-19 20:23:00', '2015-06-23 00:32:30'),
(367, 'Captcha is not matched', 'Captchacode stimmt nicht überein', '2015-06-19 20:23:00', '2015-06-23 00:04:10'),
(368, 'Your Inquiry sent successfully', 'Ihre Anfrage wurde erfolgreich gesendet', '2015-06-19 20:23:00', '2015-06-23 00:32:09'),
(369, 'Invalid Paper Variant', 'Ungültige Papier Variante', '2015-06-19 20:23:00', '2015-06-23 00:10:27'),
(370, 'Paper Variant Updated Successfully!!!', 'Papier Variente wurde erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:15:13'),
(371, 'Paper Variant Not Updated', 'Papier Variante wurde nicht aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:14:22'),
(372, 'Slider Image width & height not matched', 'Sliderbild hat das falsche Format', '2015-06-19 20:23:00', '2015-06-23 00:29:57'),
(373, 'Picture has been successfully added', 'Bild wurde erfolgreich hinzugefügt', '2015-06-19 20:23:00', '2015-06-23 00:16:42'),
(374, 'Invalid Picture', 'Ungültiges Bild', '2015-06-19 20:23:00', '2015-06-23 00:10:20'),
(375, 'Product picture deleted successfully', 'Produktbild wurde erfolgreich gelöscht', '2015-06-19 20:23:00', '2015-06-23 00:17:48'),
(376, 'Price Calculation Updated Successfully!!!', 'Preiskalkulation wurde erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:16:57'),
(377, 'Your answer saved successfully', 'Ihre Frage wurde erfolgreich gespeichert', '2015-06-19 20:23:00', '2015-06-23 00:31:53'),
(378, 'Invalid Question', 'Ungültige Frage', '2015-06-19 20:23:00', '2015-06-23 00:10:46'),
(379, 'Product question deleted successfully', 'Frage zum Produkt wurde erfolgreich gelöscht', '2015-06-19 20:23:00', '2015-06-23 00:18:21'),
(380, 'Your question submitted successfully', 'Ihre Frage wurde erfolgreich gesendet', '2015-06-19 20:23:00', '2015-06-23 00:35:26'),
(381, 'Your question not submitted. Try again later', 'Ihre Frage wurde nicht gesendet. Bitte versuchen Sie es später noch einmal', '2015-06-19 20:23:00', '2015-06-23 00:34:49'),
(382, 'Invalid Product', 'Ungültiges Produkt', '2015-06-19 20:23:00', '2015-06-23 00:10:38'),
(383, 'Product has been successfully added', 'Produkt wurde erfolgreich hinzugefügt', '2015-06-19 20:23:00', '2015-06-23 00:17:27'),
(384, 'Product updated successfully', 'Produkt erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:25:43'),
(385, 'Failed to update product', 'Produkt konnte nicht aktualisiert werden', '2015-06-19 20:23:00', '2015-06-23 00:09:01'),
(386, 'Service has been successfully added', 'Leistung wurde erfolgreich hinzugefügt', '2015-06-19 20:23:00', '2015-06-23 00:28:45'),
(387, 'Invalid Shipping Cost', 'Ungültige Versandkosten', '2015-06-19 20:23:00', '2015-06-23 00:10:55'),
(388, 'Shipping Cost Updated Successfully!!!', 'Versandkosten wurden erfolgreich aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:29:16'),
(389, 'Shipping Cost Not Updated', 'Versandkosten wurden nicht aktualisiert', '2015-06-19 20:23:00', '2015-06-23 00:29:00'),
(390, 'Registration completed successfully, You can login now', 'Die Registration war erfolgreich . Sie können sich jetzt einloggen ', '2015-06-19 20:23:00', '2015-06-23 00:27:42'),
(391, 'Registration failed, Please try again', 'Registration ist fehlgeschlagen. Bitte versuchen Sie es nochmal', '2015-06-19 20:23:00', '2015-06-23 00:28:25'),
(392, 'Password changed successfully', 'Passwort wurde erfolgreich geändert', '2015-06-19 20:23:00', '2015-06-23 00:15:45'),
(393, 'Old password not matched', 'Stimmt nicht mit altem Passwort überein', '2015-06-19 20:23:00', '2015-06-23 00:13:53'),
(394, 'Your Password Reset Link sent to your email address.', 'Ihr Passwort Reset-Link wurde an Ihre E-Mail Adresse geschickt', '2015-06-19 20:23:01', '2015-06-23 00:34:11'),
(395, 'This Email Address Not Exists', 'Diese E-Mail Adresse existiert nicht', '2015-06-19 20:23:01', '2015-06-23 00:30:29'),
(396, 'Not a valid Reset link', 'Kein gültiges Reset-Link', '2015-06-19 20:23:01', '2015-06-23 00:13:21'),
(397, 'This Reset Link Expired. Please Try again.', 'Dieser Reset-Link ist abgelaufen. Bitte versuchen Sie es nochmal', '2015-06-19 20:23:01', '2015-06-23 00:31:03'),
(398, 'Your Password Changed Successfully.', 'Ihr Passwort wurde erfolgreich geändert', '2015-06-19 20:23:01', '2015-06-23 00:33:33'),
(399, 'Invalid Page', 'Falsche Seite', '2015-06-19 20:23:01', '2015-06-23 00:09:17'),
(400, 'Delete', 'Löschen', '2015-06-24 11:30:55', '2015-06-26 17:57:59'),
(401, 'Images', 'Bilder', '2015-06-24 11:30:55', '2015-06-26 17:59:51'),
(402, 'Slider', 'Slider', '2015-06-24 11:30:55', '2015-07-07 11:12:01'),
(403, 'Parallax', 'Parallax', '2015-06-24 11:30:55', '2015-06-26 19:23:31'),
(404, 'Payment Methods', 'Zahlungsmöglichkeiten', '2015-06-24 11:30:55', '2015-06-26 18:01:37'),
(405, 'Email Templates', 'E-Mail Vorlagen', '2015-06-24 11:30:55', '2015-06-26 17:58:48'),
(406, 'Edit Email Template', 'E-Mail Vorlage beantworten', '2015-06-24 11:30:55', '2015-06-26 17:58:08'),
(407, 'Variables', 'Variablen', '2015-06-24 11:30:55', '2015-06-26 18:02:23'),
(408, 'Manage uploaded pictures', 'Hochgeladene Bilder verwalten', '2015-06-24 11:30:55', '2015-06-26 18:00:12'),
(409, 'Update pictures', 'Bilder aktualisieren', '2015-06-24 11:30:55', '2015-06-26 18:02:10'),
(410, 'Uploaded pictures', 'Hochgeladene Bilder', '2015-06-24 11:30:55', '2015-06-26 18:02:17'),
(411, 'Footer Column', 'Footerspalte', '2015-06-24 11:30:55', '2015-06-26 17:59:14'),
(412, 'Edit Payment Method', 'Zahlungsmethode bearbeiten', '2015-06-24 11:30:55', '2015-06-26 17:58:35'),
(413, 'Fee', 'Gebühr', '2015-06-24 11:30:55', '2015-06-26 17:59:01'),
(414, 'Add Slider', 'Slider hinzufügen', '2015-06-24 11:30:55', '2015-06-26 17:56:52'),
(415, 'Image width & Height must be ', 'Bildbreite und Höhe muss sein:', '2015-06-24 11:30:55', '2015-06-26 17:59:44'),
(416, 'Edit Slider', 'Slider bearbeiten', '2015-06-24 11:30:55', '2015-06-26 17:58:41'),
(417, 'Sliders', 'Slider', '2015-06-24 11:30:55', '2015-06-26 18:01:58'),
(418, 'Are you sure you wish to delete?', 'Möchten Sie es wirklich löschen?', '2015-06-24 11:30:55', '2015-06-26 17:57:31'),
(420, 'Edit Parallax', 'Parallax bearbeiten', '2015-06-24 11:30:55', '2015-06-26 17:58:21'),
(421, 'Caption', 'Bildunterschrift', '2015-06-24 11:30:55', '2015-06-26 17:57:52'),
(422, 'Individual', 'Privat', '2015-06-24 12:45:00', '2015-06-24 12:45:00'),
(423, 'Switzerland', 'Schweiz', '2015-06-24 12:45:00', '2015-06-24 12:45:00'),
(424, 'Send', 'senden', '2015-06-24 12:45:00', '2015-06-24 12:45:00'),
(425, 'Binding order', 'Zahlungspflichtig bestellen', '2015-06-25 12:45:00', '2015-06-25 12:45:00'),
(426, 'Here you can enter a comment to your order', 'Hier können Sie einen Kommentar zu Ihrer Bestellung eingeben', '2015-06-26 12:08:00', '2015-06-26 12:08:00'),
(427, 'Manage Payment Methods', 'Zahlungsmethode verwalten', '2015-06-26 12:08:00', '2015-06-26 12:08:00'),
(428, 'Self Pick Up', 'Abholung ab Rampe', '2015-07-02 15:28:46', '2015-07-02 13:29:23'),
(429, 'your order placed successfully', 'Ihre Bestellung ist erfolgreich eingegangen', '2015-07-02 16:08:12', '2015-07-07 00:32:08'),
(430, 'Contact Person deleted successfully', 'Ansprechpartner erfolgreich gelöscht', '2015-07-02 16:09:02', '2015-07-02 16:09:02'),
(431, 'order deleted successfully', 'Bestellung erfolgreich gelöscht', '2015-07-02 18:59:36', '2015-07-02 22:15:22'),
(432, 'Your cart is cleared', 'Ihr Warenkorb wurde gelöscht', '2015-07-03 10:18:00', '2015-07-07 11:13:05'),
(433, 'Billing address updated successfully', 'Rechnungsadresse wurde erfolgreich aktualisiert', '2015-07-03 10:18:00', '2015-07-07 11:10:47'),
(434, 'Billing address can not updated', 'Rechnungsadresse konnte nicht aktualisiert werden', '2015-07-03 10:18:00', '2015-07-07 11:10:22'),
(435, 'Profile updated successfully', 'Profil wurde erfolgreich aktualisiert', '2015-07-03 10:18:00', '2015-07-07 11:11:50'),
(436, 'Profile can not be updated', 'Profil konnte nicht aktualisiert werden', '2015-07-03 10:18:00', '2015-07-07 11:11:42'),
(437, 'Password does not match', 'Passwörter stimmen nicht überein', '2015-07-03 10:18:00', '2015-07-07 11:11:23'),
(438, 'User has been successfully edited', 'Benutzer wurde erfolgreich bearbeitet', '2015-07-03 10:18:00', '2015-07-07 11:12:22'),
(439, 'Single price', 'Einzelprice', '2015-07-17 17:52:43', '2015-07-17 17:52:43'),
(440, 'Gross price', 'Bruttopreis', '2015-07-17 17:52:43', '2015-07-17 17:52:43'),
(441, 'Street / No.', 'Strasse / Nr.', '2015-07-17 17:54:37', '2015-07-17 17:54:37'),
(442, 'shipping address zip code must be within {number}', 'Lieferadresse PLZ müssen innerhalb sein {number}', '2015-07-17 17:57:47', '2015-07-17 17:57:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `td_orders`
--

INSERT INTO `td_orders` (`order_id`, `order_unique_id`, `user_id`, `order_billing_address`, `order_shipping_address`, `order_payment_method`, `order_summary`, `order_good_for_print_on_paper`, `order_express_within_4_days`, `order_total_weight`, `order_shipping_cost`, `order_total_net`, `order_tax`, `order_total_gross`, `order_final_amount`, `order_status`, `created`, `modified`) VALUES
(10, 'TD-1435868566-OCW', 2, '{"address_id":"2","user_id":"2","address_type":"0","address_title":"Mr","address_firstname":"julius","address_lastname":"molnar","address_company_type":"Individual","address_company_name":"","address_street":"Fr\\u00f6lichstr. 10 1\\/3","address_additional":"","address_city":"Augsburg","address_post_code":"5050","address_country":"Switzerland","address_phone":"0821 512662","address_mobile":"","created":"2015-05-19 21:07:53","modified":"2015-06-12 01:38:47"}', '{"identical":2}', '{"id":"3","name":"Rechnung","fee":"0","caption":"Die Zahlung per Rechnung ist nur f\\u00fcr Firmenkunden, \\u00f6ffentliche Einrichtungen und Beh\\u00f6rden innerhalb der Schweiz m\\u00f6glich. Privatkunden k\\u00f6nnen derzeit leider nicht per Rechnung beliefert werden. "}', '{"comment":""}', 0, 0, 1632.96, 0, 4619.32, 401.68, 5021, 5021, '1', '2015-07-02 22:22:46', '2015-07-02 22:22:46'),
(12, 'TD-1436220365-ROX', 2, '{"address_id":"2","user_id":"2","address_type":"0","address_title":"Mr","address_firstname":"julius","address_lastname":"molnar","address_company_type":"Individual","address_company_name":"","address_street":"Fr\\u00f6lichstr. 10 1\\/3","address_additional":"","address_city":"Augsburg","address_post_code":"5050","address_country":"Switzerland","address_phone":"0821 512662","address_mobile":"","created":"2015-05-19 21:07:53","modified":"2015-06-12 01:38:47"}', '{"identical":"0","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"adsfadsf","address_lastname":"adfadsfdsad","address_street":"dsfadsf 4","address_additional":"","address_city":"adsfadf","address_post_code":"1999","address_country":"Switzerland","address_mobile":"2342342342","address_phone":"2342342342"}', '{"id":"2","name":"Bank\\u00fcberweisung","fee":"0","caption":"Mit der Zahlungsart Vorauskasse k\\u00f6nnen Sie den Rechnungsbetrag Ihrer Bestellung durch Bank\\u00fcberweisung auf unser Konto begleichen. Nach Eingang des Rechnungsbetrages auf unserem Konto liefern wir die Bestellung an Sie aus.\\r\\n\\r\\nF\\u00fcr die \\u00dcberweisung erhalten Sie in der Best\\u00e4tigungsmail unsere Kontoverbindung, mit Angabe der Bestellnummer, die Sie bitte bei der \\u00dcberweisung des Rechnungsbetrages angeben. Die \\u00dcberweisung k\\u00f6nnen Sie bequem per Online-Banking t\\u00e4tigen oder den \\u00dcberweisungsbeleg bei Ihrer Bank einreichen.\\r\\n\\r\\nBitte beachten Sie, dass sich die Lieferzeit bei der Zahlungsart Vorauskasse um die Zeitdauer verl\\u00e4ngert, bis Ihre Zahlung auf unserem Konto eingeht. Der \\u00dcberweisungsvorgang dauert i.d.R. abh\\u00e4ngig von den Geldinstituten 2-4 Werktage. Je eher Sie die \\u00dcberweisung veranlassen, desto schneller k\\u00f6nnen wir Ihre Bestellung ausliefern.\\r\\n\\r\\nDie Zahlung per Vorauskasse\\/Bank\\u00fcberweisung ist f\\u00fcr alle Lieferl\\u00e4nder weltweit m\\u00f6glich. F\\u00fcr einige L\\u00e4nder haben wir die Zahlung per Vorkasse\\/Bank\\u00fcberweisung als ausschlie\\u00dfliche Zahlungsart definiert. Sie wird f\\u00fcr diese Lieferl\\u00e4nder im Bestellvorgang daher als einzige Zahlungsart angeboten."}', '{"comment":"DAs ist ein kommentar bei der Bestellung. BANK\\u00dcBERWEISUNG\\r\\n"}', 6, 450, 16329.6, 2625, 22391.88, 1947.12, 24339, 27420, '1', '2015-07-07 00:06:05', '2015-07-07 00:06:05'),
(13, 'TD-1437031276-SZV', 2, '{"address_id":"2","user_id":"2","address_type":"0","address_title":"Mr","address_firstname":"julius","address_lastname":"molnar","address_company_type":"Individual","address_company_name":"","address_street":"Fr\\u00f6lichstr. 10 1\\/3","address_additional":"","address_city":"Augsburg","address_post_code":"5050","address_country":"Switzerland","address_phone":"0821 512662","address_mobile":"","created":"2015-05-19 21:07:53","modified":"2015-06-12 01:38:47"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":"2","name":"Bank\\u00fcberweisung","fee":"0","caption":"Mit der Zahlungsart Vorauskasse k\\u00f6nnen Sie den Rechnungsbetrag Ihrer Bestellung durch Bank\\u00fcberweisung auf unser Konto begleichen. Nach Eingang des Rechnungsbetrages auf unserem Konto liefern wir die Bestellung an Sie aus.\\r\\n\\r\\nF\\u00fcr die \\u00dcberweisung erhalten Sie in der Best\\u00e4tigungsmail unsere Kontoverbindung, mit Angabe der Bestellnummer, die Sie bitte bei der \\u00dcberweisung des Rechnungsbetrages angeben. Die \\u00dcberweisung k\\u00f6nnen Sie bequem per Online-Banking t\\u00e4tigen oder den \\u00dcberweisungsbeleg bei Ihrer Bank einreichen.\\r\\n\\r\\nBitte beachten Sie, dass sich die Lieferzeit bei der Zahlungsart Vorauskasse um die Zeitdauer verl\\u00e4ngert, bis Ihre Zahlung auf unserem Konto eingeht. Der \\u00dcberweisungsvorgang dauert i.d.R. abh\\u00e4ngig von den Geldinstituten 2-4 Werktage. Je eher Sie die \\u00dcberweisung veranlassen, desto schneller k\\u00f6nnen wir Ihre Bestellung ausliefern.\\r\\n\\r\\nDie Zahlung per Vorauskasse\\/Bank\\u00fcberweisung ist f\\u00fcr alle Lieferl\\u00e4nder weltweit m\\u00f6glich. F\\u00fcr einige L\\u00e4nder haben wir die Zahlung per Vorkasse\\/Bank\\u00fcberweisung als ausschlie\\u00dfliche Zahlungsart definiert. Sie wird f\\u00fcr diese Lieferl\\u00e4nder im Bestellvorgang daher als einzige Zahlungsart angeboten."}', '{"comment":""}', 0, 0, 68.04, 180, 861.12, 74.88, 936, 1116, '1', '2015-07-16 09:21:16', '2015-07-16 09:21:16'),
(14, 'TD-1437139452-MLW', 10, '{"address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"Test","address_lastname":"test","address_street":"10, Main street","address_additional":"tet","address_city":"city","address_post_code":"7000","address_country":"Switzerland","address_mobile":"","address_phone":"12323131"}', '{"identical":"1","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"","address_lastname":"","address_street":"","address_additional":"","address_city":"","address_post_code":"","address_country":"Switzerland","address_mobile":"","address_phone":""}', '{"id":"2","name":"Bank\\u00fcberweisung","fee":"0","caption":"Mit der Zahlungsart Vorauskasse k\\u00f6nnen Sie den Rechnungsbetrag Ihrer Bestellung durch Bank\\u00fcberweisung auf unser Konto begleichen. Nach Eingang des Rechnungsbetrages auf unserem Konto liefern wir die Bestellung an Sie aus.\\r\\n\\r\\nF\\u00fcr die \\u00dcberweisung erhalten Sie in der Best\\u00e4tigungsmail unsere Kontoverbindung, mit Angabe der Bestellnummer, die Sie bitte bei der \\u00dcberweisung des Rechnungsbetrages angeben. Die \\u00dcberweisung k\\u00f6nnen Sie bequem per Online-Banking t\\u00e4tigen oder den \\u00dcberweisungsbeleg bei Ihrer Bank einreichen.\\r\\n\\r\\nBitte beachten Sie, dass sich die Lieferzeit bei der Zahlungsart Vorauskasse um die Zeitdauer verl\\u00e4ngert, bis Ihre Zahlung auf unserem Konto eingeht. Der \\u00dcberweisungsvorgang dauert i.d.R. abh\\u00e4ngig von den Geldinstituten 2-4 Werktage. Je eher Sie die \\u00dcberweisung veranlassen, desto schneller k\\u00f6nnen wir Ihre Bestellung ausliefern.\\r\\n\\r\\nDie Zahlung per Vorauskasse\\/Bank\\u00fcberweisung ist f\\u00fcr alle Lieferl\\u00e4nder weltweit m\\u00f6glich. F\\u00fcr einige L\\u00e4nder haben wir die Zahlung per Vorkasse\\/Bank\\u00fcberweisung als ausschlie\\u00dfliche Zahlungsart definiert. Sie wird f\\u00fcr diese Lieferl\\u00e4nder im Bestellvorgang daher als einzige Zahlungsart angeboten."}', '{"comment":""}', 0, 0, 56.16, 180, 861.12, 74.88, 936, 1116, '1', '2015-07-17 18:54:12', '2015-07-17 18:54:12'),
(15, 'TD-1437405785-YHN', 11, '{"address_company_type":"Company","address_company_name":"Theiler Druck AG","address_title":"Mr","address_firstname":"Walter","address_lastname":"Feldmann","address_street":"Verenastrasse 2","address_additional":"","address_city":"Wollerau","address_post_code":"8832","address_country":"Switzerland","address_mobile":"079 778 99 13","address_phone":"044 787 03 65"}', '{"identical":"0","address_company_type":"Company","address_company_name":"Theiler Druck AG","address_title":"Mr","address_firstname":"Walter","address_lastname":"Feldmann","address_street":"Verendastrasse 2","address_additional":"","address_city":"Wollerau","address_post_code":"1999","address_country":"Switzerland","address_mobile":"079 778 99 13","address_phone":"778 787 03 65"}', '{"id":"3","name":"Rechnung","fee":"0","caption":"Die Zahlung per Rechnung ist nur f\\u00fcr Firmenkunden, \\u00f6ffentliche Einrichtungen und Beh\\u00f6rden innerhalb der Schweiz m\\u00f6glich. Privatkunden k\\u00f6nnen derzeit leider nicht per Rechnung beliefert werden. "}', '{"comment":""}', 0, 0, 408.24, 240, 1621.04, 140.96, 1762, 2002, '1', '2015-07-20 20:53:05', '2015-07-20 20:53:05'),
(16, 'TD-1437569974-TVB', 11, '{"address_company_type":"Company","address_company_name":"Theiler Druck AG","address_title":"Mr","address_firstname":"Walter","address_lastname":"Feldmann","address_street":"Verenastrasse 2","address_additional":"","address_city":"Wollerau","address_post_code":"8832","address_country":"Switzerland","address_mobile":"079 778 99 13","address_phone":"044 787 03 65"}', '{"identical":"0","address_company_type":"Individual","address_company_name":"","address_title":"Mr","address_firstname":"Walter","address_lastname":"Feldmann","address_street":"Neugaden 158","address_additional":"","address_city":"Schw\\u00e4ndi","address_post_code":"1500","address_country":"Switzerland","address_mobile":"","address_phone":"044 787 03 65"}', '{"id":"2","name":"Bank\\u00fcberweisung","fee":"0","caption":"Mit der Zahlungsart Vorauskasse k\\u00f6nnen Sie den Rechnungsbetrag Ihrer Bestellung durch Bank\\u00fcberweisung auf unser Konto begleichen. Nach Eingang des Rechnungsbetrages auf unserem Konto liefern wir die Bestellung an Sie aus.\\r\\n\\r\\nF\\u00fcr die \\u00dcberweisung erhalten Sie in der Best\\u00e4tigungsmail unsere Kontoverbindung, mit Angabe der Bestellnummer, die Sie bitte bei der \\u00dcberweisung des Rechnungsbetrages angeben. Die \\u00dcberweisung k\\u00f6nnen Sie bequem per Online-Banking t\\u00e4tigen oder den \\u00dcberweisungsbeleg bei Ihrer Bank einreichen.\\r\\n\\r\\nBitte beachten Sie, dass sich die Lieferzeit bei der Zahlungsart Vorauskasse um die Zeitdauer verl\\u00e4ngert, bis Ihre Zahlung auf unserem Konto eingeht. Der \\u00dcberweisungsvorgang dauert i.d.R. abh\\u00e4ngig von den Geldinstituten 2-4 Werktage. Je eher Sie die \\u00dcberweisung veranlassen, desto schneller k\\u00f6nnen wir Ihre Bestellung ausliefern.\\r\\n\\r\\nDie Zahlung per Vorauskasse\\/Bank\\u00fcberweisung ist f\\u00fcr alle Lieferl\\u00e4nder weltweit m\\u00f6glich. F\\u00fcr einige L\\u00e4nder haben wir die Zahlung per Vorkasse\\/Bank\\u00fcberweisung als ausschlie\\u00dfliche Zahlungsart definiert. Sie wird f\\u00fcr diese Lieferl\\u00e4nder im Bestellvorgang daher als einzige Zahlungsart angeboten."}', '{"comment":""}', 0, 0, 68.04, 180, 947.6, 82.4, 1030, 1210, '1', '2015-07-22 18:29:34', '2015-07-22 18:29:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `td_order_items`
--

INSERT INTO `td_order_items` (`order_item_id`, `order_id`, `order_item_product_key`, `order_item_product_value`, `created`, `modified`) VALUES
(10, 10, '1_16_10000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"16","item_product_no_of_copies":"10000","paper_id":"1","item_quantity":"1","item_price":2129,"item_sub_price":2129,"item_weight":544.32,"item_sub_weight":544.32,"cart_sessionid":"0f046fbbe20aaf7d8ef37da0d5f6192b","item_picture_upload":[]}', '2015-07-02 22:22:46', '2015-07-02 22:22:46'),
(11, 10, '1_16_20000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"16","item_product_no_of_copies":"20000","paper_id":"1","item_quantity":"1","item_price":2892,"item_sub_price":2892,"item_weight":1088.64,"item_sub_weight":1088.64,"cart_sessionid":"0f046fbbe20aaf7d8ef37da0d5f6192b","item_picture_upload":[]}', '2015-07-02 22:22:46', '2015-07-02 22:22:46'),
(13, 12, '1_32_50000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"32","item_product_no_of_copies":"50000","paper_id":"1","item_quantity":"3","item_price":8113,"item_sub_price":24339,"item_weight":5443.2,"item_sub_weight":16329.6,"cart_sessionid":"21220e09f8fa59d94f2120311e02840b","item_picture_upload":[]}', '2015-07-07 00:06:05', '2015-07-07 00:06:05'),
(14, 13, '1_4_5000_1', '{"product_id":"1","product_name":"Zeitung Broadsheet","product_description":"315 mm x 480 mm\\r\\nDruck 4-farbig\\r\\n2 B\\u00fcnde mit Ausnahme von\\r\\n4 und 8 Seiten Umfang","product_image":"wSd6V_zeitung.jpg","product_sku":"000000","product_slug":"zeitung-broadsheet","product_factor":"0.1512","item_product_no_of_pages":"4","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":68.04,"item_sub_weight":68.04,"cart_sessionid":"e908a736afb65bd8831c0375174d3af3","item_picture_upload":["zFr-montessori-kinderhaus.jpg"]}', '2015-07-16 09:21:16', '2015-07-16 09:21:16'),
(15, 14, '3_8_5000_1', '{"product_id":"3","product_name":"Brosch\\u00fcren A4","product_description":"210x297\\r\\ngeheftet\\r\\nDruck 4-farbig\\r\\nkreuzgeb\\u00fcndelt auf Europalette","product_image":"6rWz4_broschuere.jpg","product_sku":"00000000","product_slug":"broschueren-a4","product_factor":"0.0624","item_product_no_of_pages":"8","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":936,"item_sub_price":936,"item_weight":56.16,"item_sub_weight":56.16,"user_id":"10","item_picture_upload":[]}', '2015-07-17 18:54:12', '2015-07-17 18:54:12'),
(16, 15, '2_8_30000_1', '{"product_id":"2","product_name":"Zeitung Tabloid","product_description":"240mm x 315mm\\t\\t\\r\\nDruck 4-farbig\\t\\t\\r\\nkreuzgeb\\u00fcndelt auf Europalette\\t\\t","product_image":"uWOea_zeitung.jpg","product_sku":"0000000","product_slug":"zeitung-tabloid","product_factor":"0.0756","item_product_no_of_pages":"8","item_product_no_of_copies":"30000","paper_id":"1","item_quantity":"1","item_price":1762,"item_sub_price":1762,"item_weight":408.24,"item_sub_weight":408.24,"user_id":"11","item_picture_upload":[]}', '2015-07-20 20:53:05', '2015-07-20 20:53:05'),
(17, 16, '2_8_5000_1', '{"product_id":"2","product_name":"Zeitung Tabloid","product_description":"240mm x 315mm\\t\\t\\r\\nDruck 4-farbig\\t\\t\\r\\nkreuzgeb\\u00fcndelt auf Europalette\\t\\t","product_image":"uWOea_zeitung.jpg","product_sku":"0000000","product_slug":"zeitung-tabloid","product_factor":"0.0756","item_product_no_of_pages":"8","item_product_no_of_copies":"5000","paper_id":"1","item_quantity":"1","item_price":1030,"item_sub_price":1030,"item_weight":68.04,"item_sub_weight":68.04,"user_id":"11","item_picture_upload":[]}', '2015-07-22 18:29:34', '2015-07-22 18:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `td_pages`
--

CREATE TABLE IF NOT EXISTS `td_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` varchar(255) DEFAULT NULL,
  `page_content` longtext NOT NULL,
  `page_px_image` varchar(255) DEFAULT NULL,
  `page_px_caption` mediumtext,
  `is_one_page` char(1) NOT NULL DEFAULT '0',
  `sort_value` int(11) DEFAULT NULL,
  `page_column` tinyint(4) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `td_pages`
--

INSERT INTO `td_pages` (`page_id`, `page_title`, `page_subtitle`, `page_content`, `page_px_image`, `page_px_caption`, `is_one_page`, `sort_value`, `page_column`, `created`, `modified`) VALUES
(1, 'Prepress', 'Prozess- und farbsicher', '<div class="row ">\r\n<div class="col-xs-12 col-sm-7 col-md-7 ">\r\n<h2>Datenmanagement und Design</h2>\r\n\r\n<p class="">F&uuml;r die schnelle, einfache und qualitativ hochwertige Aufbereitung von Druckdaten bieten wir die komplette Dienstleistung an. Daf&uuml;r setzen wir die neuesten technischen Einrichtungen ein.</p>\r\n\r\n<p class="">Ausgebildete Fachleute stehen Ihnen mit ihrem Know-how und ihrer Kreativit&auml;t hilfreich zur Seite. Polygrafinnen und Polygrafen r&uuml;cken Ihre Bilder ins richtige Licht, w&auml;hlen die passende Schrift oder machen Vorschl&auml;ge f&uuml;r die Gestaltung Ihrer Drucksache.</p>\r\n\r\n<p class="">Unser Korrektorat pr&uuml;ft alles nochmals auf inhaltliche, orthografische und grammatische Fehlerfreiheit, steht Ihnen aber auch f&uuml;r stilistische Fragen gerne zur Verf&uuml;gung.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5 "><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages/section-img.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12 ">&nbsp;\r\n<p class="">Wir arbeiten mit modernsten Apple-Macintosh-Computern und Peripherieger&auml;ten auf Basis der g&auml;ngigsten Anwenderprogramme. Nat&uuml;rlich d&uuml;rfen auch Kunden unsere Vorstufenleistungen geniessen, die (noch) nicht bei uns drucken.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="row ">\r\n<div class="col-xs-12 col-sm-12 col-md-12 ">\r\n<h2>Unser Service:</h2>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5 ">\r\n<ul>\r\n	<li>Gestaltung</li>\r\n	<li>Neusatz</li>\r\n	<li>Hauseigenes Korrektorat</li>\r\n	<li>&Uuml;bernahme von Kundendaten ab PC oder MAC</li>\r\n	<li>Datenverwaltung und -archivierung</li>\r\n	<li>Datenerfassung ab Manuskriptvorlage</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-7 col-md-7  ">\r\n<ul>\r\n	<li>Scannen ab Vorlage</li>\r\n	<li>Bearbeitung von Text-, Grafik- und Bilddaten</li>\r\n	<li>Automatisierte Bildbearbeitung &ndash; mit &laquo;IntelliTune&raquo; haben wir die M&ouml;glichkeit, Ihre Bilder rationell und qualitativ auf hohem Niveau zu verarbeiten</li>\r\n	<li>Datenbelichtung direkt auf die Druckplatte</li>\r\n	<li>Plotts und Plakate auch lichtecht und wetterfest</li>\r\n</ul>\r\n</div>\r\n</div>\r\n', 'prallax-img6.jpg', '<h1 class="short text-shadow  white bold"><strong>Prozess- und farbsicher</strong></h1>', '1', 1, 2, '2015-08-07 13:27:48', '2015-08-07 16:57:48'),
(2, 'Offsetdruck', 'Service und professionell', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>&laquo;Die Kunst des Druckens ist die Effizienz der Ausf&uuml;hrung&raquo;</h2>\r\n\r\n<p>Unsere eigentliche Kernkompetenz liegt im Offset-Druckverfahren. Der Bogenoffset erm&ouml;glicht vielf&auml;ltigste Kombinationen in einem einzigen Druckvorgang. Er bietet eine grosse Vielseitigkeit betreffend Druckformat und Farbgebung und zeichnet sich durch eine hohe Flexibilit&auml;t in Bezug auf Sonderfertigungstechniken aus. Bei Zeitungsprodukten steht unsere Rollenoffset-Druckmaschine ganz zu Ihrer Verf&uuml;gung.</p>\r\n\r\n<h2>Zeitungs-Rollenoffset:</h2>\r\n\r\n<p>Zeitungs-Rollenrotation WIFAG OF-07 (2 Werke / 32 Seiten im Zeitungsformat, durchgehend 4-farbig Skala)</p>\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages/section-img2.jpg" /></div>\r\n\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Bogenoffset:</h2>\r\n\r\n<ul>\r\n	<li>Unser Druck-Maschinenpark umfasst:<br />\r\n	5-Farben-Heidelberg CD 74-5+L, 52 x 74 cm<br />\r\n	(+L = mit integriertem Dispersions-Lackwerk)<br />\r\n	4-Farben-Heidelberg Speedmaster, 37 x 52 cm<br />\r\n	2-Farben-Heidelberg Speedmaster, 52 x 74 cm</li>\r\n	<br />\r\n	<br />\r\n	&nbsp;\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5">\r\n<h2>Unsere Produkte:</h2>\r\n\r\n<ul>\r\n	<li>Familien- und Gesch&auml;ftsdrucksachen, Gesch&auml;ftsberichte, Visitenkarten, Briefb&ouml;gen, Kuverts, Imagebrosch&uuml;ren, Flyer, Prospekte, Blocks, Festschriften, Brosch&uuml;ren, Warenkataloge, Bedienungsanleitungen, Plakate, Werbedrucksachen, Preislisten, Selbstklebeetiketten, Zeitschriften, Zeitungen, B&uuml;cher&hellip;</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12">\r\n<p><br />\r\n&hellip; in kleiner oder grosser Auflage, farbig und lackiert oder schwarz auf weiss, seidenmatt oder gl&auml;nzend &hellip; so, wie Sie es w&uuml;nschen!</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 'prallax-img2.jpg', '<h1 class="short text-shadow  white bold"><strong>Service und professionell</strong></h1>', '1', 2, 2, '2015-06-30 14:34:22', '2015-06-04 07:45:08'),
(3, 'Digitaldruck', 'darf es etwas weniger sein?', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Farb-System</h2>\r\n\r\n<p>Unser digitales Farbsystem ist auf die Anforderungen des Produktionsdrucks abgestimmt. F&uuml;r Kleinauflagen ist der Digitaldruck besonders geeignet.</p>\r\n\r\n<p>Unser digitales Farbsystem ist auf die Anforderungen des Produktionsdrucks abgestimmt. F&uuml;r Kleinauflagen ist der Digitaldruck besonders geeignet.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//section-img3.jpg" /></div>\r\n</div>\r\n\r\n<section class="top">\r\n<div class="row" id="oder">\r\n<div class="col-md-12">\r\n<div class="sections-heading">Oder f&uuml;r den A4</div>\r\n\r\n<div class="sections-sub-heading">Volumenausdruck</div>\r\n\r\n<div class="sections-content">\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Schwarz/Weiss-System</h2>\r\n\r\n<p>Unser leistungsstarkes Schwarz/Weiss-Produktionssystem ist speziell f&uuml;r den Volumenausdruck von A4-Office-Dokumenten geeignet und zeichnet sich durch hohe Zuverl&auml;ssigkeit aus.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages/section-img4.jpg" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 'Atr1w_prallax-img3.jpg', '<h1 class="short text-shadow  white bold"><strong>darf es etwas weniger sein?</strong></h1>', '1', 3, 2, '2015-06-30 14:34:22', '2015-06-04 22:57:10'),
(4, 'Oder für den A4', 'Volumendruck', '<div class="row ">\r\n<div class="col-xs-12 col-sm-7 col-md-7 ">\r\n<h2>Schwarz/Weiss-System</h2>\r\n\r\n<p class="">Unser leistungsstarkes Schwarz/Weiss-Produktionssystem ist speziell f&uuml;r den Volumenausdruck von A4-Office-Dokumenten geeignet und zeichnet sich durch hohe Zuverl&auml;ssigkeit aus.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5 "><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages/section-img4.jpg" /></div>\r\n</div>\r\n', '0upmp_prallax-img3.jpg', '<h1 class="short text-shadow  white bold"><strong>darf es etwas weniger sein?</strong></h1>', '0', 4, 2, '2015-08-07 13:34:12', '2015-08-07 17:04:12'),
(5, 'Postpress', 'Der letzte Schliff', '<h2>Postpress</h2>\r\n\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Damit Ihre Drucksachen auch richtig gut ankommen! Dank einem breiten Maschinenpark und schlagkr&auml;ftigen Partnern sind wir in der Lage, Ihnen eine umfassende Palette von Ausr&uuml;starbeiten zu offerieren. Wenn Sie am Schluss als zufriedener Kunde &uuml;berzeugt sind, vom richtigen Partner betreut worden zu sein freut uns das. Wir sind gern f&uuml;r Sie da!</p>\r\n\r\n<h2>Unser Service:</h2>\r\n\r\n<p>Wir banderolieren, bandieren, bohren, kleben Ihre CD ein, kuvertieren, nummerieren, etikettieren, heften mit Draht, falzen und individualisieren, z&auml;hlen ab, klebebinden, perforieren, rillen und schneiden, stanzen und lochen, runden Ecken ab, sammelheften, stecken ein und teilen aus, tragen zusammen, verpacken, stapeln, palettieren und adressieren, liefern aus und sind bereit f&uuml;r Ihren n&auml;chsten Auftrag&hellip;</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//section-img5.jpg" /></div>\r\n</div>\r\n', 'prallax-img4.jpg', '<h1 class="short text-shadow  white bold"><strong>Der letzte Schliff</strong></h1>', '1', 5, 2, '2015-06-30 14:34:22', '2015-06-04 07:46:47'),
(6, 'Lettershop', 'Der letzte Schliff', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Hier findet die technische Abwicklung einer Aussendung statt: Standard-Mail oder Spezialversand &ndash; wir wissen, worauf es ankommt. Der Produktionsweg eines Mailings ist lang. Auch dann noch, wenn die Idee bereits zu Papier gebracht und das Mailing kreiert wurde. Bevor Mailings beim Adressaten ankommen, durchlaufen sie noch zahlreiche Arbeitsschritte: von der Adressaufbereitung &uuml;ber das Personalisieren und Kuvertieren bis hin zum Versand. Unser Lettershop verpackt auch Komplexes!</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//section-img6.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<h2>Unser Service:</h2>\r\n\r\n<p>personalisieren, schneiden, falzen, kuvertieren, Handkonfektionierung von Beilagen, adressieren, sortieren, b&uuml;ndeln, verpacken, Postaus- lieferung</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5">\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Das Kuvertieren gelingt am kosteng&uuml;nstigsten maschinell. Wir kuvertieren in den Formaten C5/6, C5 und B5. Von Hand kuvertieren wir in allen Formaten, Varianten und Schwierigkeitsgraden.</p>\r\n</div>\r\n</div>\r\n', 'prallax-img5.jpg', '<h1 class="short text-shadow  white bold"><strong>Der Lettershop verpackt auch komplexes!</strong></h1>', '1', 6, 2, '2015-06-30 14:34:22', '2015-06-04 07:47:26'),
(7, 'Klimaneutrales', '', '<div class="row">\r\n<div class="col-xs-12 col-sm-7 col-md-7">\r\n<p>Setzen Sie f&uuml;r Ihr Unternehmen ein deutliches Zeichen f&uuml;r einen aktiven Klimaschutz. Drucken Sie Ihre Werbemittel mit uns klimaneutral und profitieren Sie von den positiven Signalen f&uuml;r ein vorbildliches Engagement. Beim klimaneutralen Druck mit ClimatePartner werden alle CO2-Emissionen, die w&auml;hrend der Entstehung einer Drucksache freigesetzt werden, ermittelt und durch den Ankauf und die verbindliche Stilllegung von anerkannten Emissionsminderungs-Zertifikaten ausgeglichen. Die Theiler Druck AG und ihre Kundschaft unterst&uuml;tzen das erste Schweizer Klimaschutzprojekt, das den Wald als CO2-Senke nutzt.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-5 col-md-5"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//section-img7.jpg" /></div>\r\n\r\n<div class="col-xs-12 col-sm-12 col-md-12">\r\n<p>&nbsp;</p>\r\n\r\n<p>Oberallmig Klimaschutzprojekt &ndash; optimierte Waldbewirtschaftung bei der Oberallmeindkorporation Schwyz</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-9 col-md-10">\r\n<p class="client-partnertxt"><img src="http://zeitungsdrucker.ch/files/pages//cp-logo.jpg" /> Das Ziel des Projektes ist, den Wald als CO2-Senke mittels Speicherung von Kohlenstoff in der Biomasse des Waldes zus&auml;tzlich zu den bestehenden Vorratsmengen zu nutzen. Durch eine moderate Erh&ouml;hung des Holzvorrates von 281 m3/ha innert 30 Jahren auf 300 m3/ha werden rund 245&#39;000 t CO2 aus der Luft entnommen und im Holz eingelagert. Auf diesem Vorratsniveau werden k&uuml;nftig &uuml;ber einen gr&ouml;sseren Holzzuwachs die Kompensationsm&ouml;glichkeiten durch den nachwachsenden Rohstoff erh&ouml;ht. Mit einer angepassten Waldbewirtschaftung wird sichergestellt, dass die Funktionen des Waldes (Schutz vor Naturgefahren, Holzproduktion, Biodiversit&auml;t, Erholung etc.) weiterhin nachhaltig erf&uuml;llt werden und der Wald sich stabil und vital entwickelt.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-2"><a href="http://www.theilerdruck.ch/bilder/klimaneutral/waldschutz_oak_schweiz_de.pdf" target="_blank"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//client-doc1.png" /></a></div>\r\n\r\n<div class="col-xs-12 col-sm-9 col-md-10">\r\n<h2>Klimaschutzprojekt Windkraft in Indien</h2>\r\n\r\n<p class="client-partnertxt"><img src="http://zeitungsdrucker.ch/files/pages//cp-logo.jpg" /> Damit Wind zur Stromproduktion genutzt werden kann, m&uuml;ssen Luftmassen in Bewegung sein. Die Kraft dieser Masse treibt die Bewegung von Rotoren an, die diese mechanische Energie der Luft ernten und in elektrische Energie transformieren. In Palsodi betriebt Ruchi Infrastructure Ltd. (RIL) einen Windpark, der auf die auf diese Weise gewonnene Energie in das nationale Stromnetz einspeist. Dies stellt eine klimafreundliche Alternative zu den in Indien dominierenden Kohlekraftwerken dar, welche hohe Treibhausgasemissionen verursachen. Der Windpark besteht aus 17 Suzlon Windturbinen, die mit Siemens-Komponenten ausgestattet sind und &uuml;ber eine Gesamtkapazit&auml;t von 10,2 MW verf&uuml;gen. Laut dem indischen Energieministerium leidet das Land an einem Stromdefizit von etwa 10%. Das Klimaschutzprojekt tr&auml;gt deshalb nicht nur zu einer emissionsfreien Zukunft bei, sondern verbessert gleichzeitig auch die indische Stromversorgung. W&auml;hrend seiner zehnj&auml;hrigen Laufzeit als Klimaschutzprojekt spart der Windpark insgesamt voraussichtlich ca. 200.000 t an CO2-&Auml;quivalente ein.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-2"><a href="http://www.theilerdruck.ch/bilder/klimaneutral/windenergie palsodi_indien_de.pdf" target="_blank"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//client-doc2.png" /></a></div>\r\n\r\n<div class="col-xs-12 col-sm-4 col-md-4">\r\n<input class="form-control" type="text" onblur="if(this.value=='''') this.value=''IKS-Nummer Abfrage'';" onclick="this.value=''''" value="ID Nummer Abfrage" size="28" id="iks_input" />\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-4 col-md-4">\r\n<input class="btn btn-primary btn-lg" type="button" onclick="window.open(''http://cpol.climatepartner.com/pages/popup/cert_popup.jsf?iks_nr='' + document.getElementById(''iks_input'').value,''_cert'',''width=995,height=725,scrollbars=yes'');" value="Suchen" id="iks_submit" name="button">\r\n</div>\r\n</div>\r\n', 'prallax-img6.jpg', '<h1 class="short text-shadow  white bold"><strong>Klimaneutraler Druck wird bei uns grossgeschrieben</strong></h1>', '1', 7, 2, '2015-06-30 14:34:22', '2015-06-04 23:42:35'),
(8, 'Service', '', '<div class="row">\r\n<div class="col-xs-12 col-sm-6 col-md-6">\r\n<h2>PDFX-ready</h2>\r\n\r\n<p>Durch die Einhaltung gewisser Standards kann eine optimale Verarbeitung Ihrer Daten garantiert werden.</p>\r\n\r\n<h2>PDFX-ready Output</h2>\r\n\r\n<p>Wir sind &laquo;PDFX-ready Output Classic CMYK + SPOT&raquo;-zertifiziert und sind somit in der Lage, DPF/X-Daten nach den Spezifikationen von PDFX-ready zu empfangen und auszugeben</p>\r\n\r\n<h2>PDFX-ready Creator</h2>\r\n\r\n<p>Wir sind PDFX-ready Creator Classic zertifiziert und sind somit in der Lage, einwandfreie PDFX-ready-Daten im Farbraum CMYK herzustellen.</p>\r\n\r\n<h2>PDF Distiller-Settings</h2>\r\n\r\n<p>Falls Sie PDF-Daten mit dem Acrobat Distiller schreiben, verwenden Sie f&uuml;r eine m&ouml;glichst einfache Weiterverarbeitung unsere Distiller-Settings.</p>\r\n\r\n<p><a href="http://www.theilerdruck.ch/downloads/Theilerdruck.joboptions.zip" target="_blank"><img alt="" src="http://zeitungsdrucker.ch/files/pages//pdf-icon.png" style="width: 26px; height: 32px;" /> PDF Distiller-Settings herunterladen</a></p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-6 col-md-6"><a href="http://www.theilerdruck.ch/downloads/PDFX-ready_CREATOR.pdf" target="_blank"><img alt="" class="img-responsive" src="http://zeitungsdrucker.ch/files/pages//pdfx.png" /></a></div>\r\n</div>\r\n\r\n<section class="top">\r\n<div class="row">\r\n<div class="col-md-12">\r\n<div class="sections-heading">FTP-Zugang</div>\r\n\r\n<div class="sections-content">\r\n<div class="row">\r\n<div class="col-xs-12 col-sm-9 col-md-6">\r\n<p>Falls Sie noch keinen Benutzernamen und Passwort zu unserem FTP-Server besitzen, k&ouml;nnen Sie diese bei uns anfordern.</p>\r\n</div>\r\n\r\n<div class="col-xs-12 col-sm-3 col-md-6"><a href ="https://tdw.dyndns.info/" target="_blank" class="btn btn-primary btn-lg">FTP starten</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', NULL, '', '1', 8, 2, '2015-06-30 14:34:22', '2015-06-04 23:39:13'),
(9, 'Zahlungsmöglichkeiten', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus. &Ouml;&Auml;&Uuml; &szlig; &ouml;&auml;&uuml;&nbsp;</p>\r\n', NULL, '', '1', 1, 1, '2015-06-23 08:39:40', '2015-06-23 19:20:33'),
(10, 'Versandinformationen', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus.</p>\r\n', NULL, '', '1', 2, 1, '2015-06-20 15:52:30', '2015-06-20 15:43:45'),
(11, 'Widerrufsbelehrung', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus.</p>\r\n', NULL, '', '1', 3, 1, '2015-06-20 15:52:30', '2015-06-20 15:44:27'),
(12, 'Impressum', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus.</p>\r\n', NULL, '', '1', 4, 1, '2015-06-20 15:52:30', '2015-06-20 15:44:57'),
(13, 'AGB', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus.</p>\r\n', NULL, '', '1', 5, 1, '2015-06-20 15:52:30', '2015-06-20 15:46:00'),
(14, 'Datenschutz', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a mattis tellus. Quisque pellentesque pulvinar mollis. Aenean eu efficitur felis. Phasellus tristique sit amet metus vitae lobortis. Maecenas lectus massa, semper id enim quis, viverra semper risus. Aenean faucibus leo augue, eu finibus lacus scelerisque vitae. Praesent metus lacus, congue sit amet ornare at, lacinia sed felis. Suspendisse nec massa massa. Integer aliquet mauris ut fringilla interdum. Pellentesque non erat et arcu faucibus rutrum eget non tellus. Praesent porta ullamcorper elementum. Etiam et convallis ex, a mollis massa. Nullam ante eros, venenatis eu magna sed, blandit fermentum sapien. Vestibulum luctus ut nibh at tempus. Ut scelerisque felis lectus.</p>\r\n', NULL, '', '1', 6, 1, '2015-06-20 15:52:31', '2015-06-20 15:46:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `td_paper_variants`
--

INSERT INTO `td_paper_variants` (`paper_id`, `paper_rang_mgrm`, `paper_rang_grm`, `paper_name`, `created`, `modified`) VALUES
(1, 45, 0.045, 'weisslich Zeitungsdruck', '2015-04-25 00:00:00', '2015-05-06 13:49:56'),
(2, 52, 0.052, 'aufgebessertes, helleres Papier', '2015-04-25 00:00:00', '2015-08-07 16:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `td_payment_methods`
--

CREATE TABLE IF NOT EXISTS `td_payment_methods` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(255) NOT NULL,
  `payment_caption` text,
  `payment_fee` double DEFAULT '0',
  `is_active` enum('1','0') DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_payment_methods`
--

INSERT INTO `td_payment_methods` (`payment_id`, `payment_name`, `payment_caption`, `payment_fee`, `is_active`, `created`, `modified`) VALUES
(1, 'Cash on delivery', 'Small information', 5.04, '0', '2015-06-20 17:01:00', '2015-06-20 17:01:00'),
(2, 'Banküberweisung', 'Mit der Zahlungsart Vorauskasse können Sie den Rechnungsbetrag Ihrer Bestellung durch Banküberweisung auf unser Konto begleichen. Nach Eingang des Rechnungsbetrages auf unserem Konto liefern wir die Bestellung an Sie aus.\r\n\r\nFür die Überweisung erhalten Sie in der Bestätigungsmail unsere Kontoverbindung, mit Angabe der Bestellnummer, die Sie bitte bei der Überweisung des Rechnungsbetrages angeben. Die Überweisung können Sie bequem per Online-Banking tätigen oder den Überweisungsbeleg bei Ihrer Bank einreichen.\r\n\r\nBitte beachten Sie, dass sich die Lieferzeit bei der Zahlungsart Vorauskasse um die Zeitdauer verlängert, bis Ihre Zahlung auf unserem Konto eingeht. Der Überweisungsvorgang dauert i.d.R. abhängig von den Geldinstituten 2-4 Werktage. Je eher Sie die Überweisung veranlassen, desto schneller können wir Ihre Bestellung ausliefern.\r\n\r\nDie Zahlung per Vorauskasse/Banküberweisung ist für alle Lieferländer weltweit möglich. Für einige Länder haben wir die Zahlung per Vorkasse/Banküberweisung als ausschließliche Zahlungsart definiert. Sie wird für diese Lieferländer im Bestellvorgang daher als einzige Zahlungsart angeboten.', 0, '1', '2015-06-20 17:00:00', '2015-06-25 12:21:22'),
(3, 'Rechnung', 'Die Zahlung per Rechnung ist nur für Firmenkunden, öffentliche Einrichtungen und Behörden innerhalb der Schweiz möglich. Privatkunden können derzeit leider nicht per Rechnung beliefert werden. ', 0, '1', '2015-06-20 17:00:00', '2015-06-23 00:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `td_pictures`
--

CREATE TABLE IF NOT EXISTS `td_pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_block` enum('SL','PL') NOT NULL DEFAULT 'SL',
  `picture_title` varchar(255) NOT NULL,
  `picture_image` mediumtext,
  `picture_sort` smallint(6) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `td_pictures`
--

INSERT INTO `td_pictures` (`picture_id`, `picture_block`, `picture_title`, `picture_image`, `picture_sort`, `created`, `modified`) VALUES
(1, 'SL', 'Slider 1', 'Eaofq_1920x450-1.jpg', 4, '2015-06-19 16:02:47', '2015-06-19 16:58:18'),
(2, 'SL', 'Slider 2', 'zquXW_1920x450-2.jpg', 2, '2015-06-19 16:03:03', '2015-06-19 16:03:03'),
(3, 'SL', 'Slider 3', 'HAMkh_1920x450-3.jpg', 3, '2015-06-19 16:03:20', '2015-06-19 16:03:20'),
(4, 'SL', 'Slider 4', 'jHh3t_1920x450-4.jpg', 1, '2015-06-19 16:03:35', '2015-06-19 16:58:45'),
(5, 'PL', 'Klimaneutraler Druck wird bei uns grossgeschrieben', 'YqvRZ_prallax-img6.jpg', NULL, '2015-06-19 16:23:00', '2015-06-25 19:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `td_products`
--

CREATE TABLE IF NOT EXISTS `td_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_additional_info` mediumtext,
  `product_image` mediumtext NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_factor` double NOT NULL,
  `product_no_of_pages` longtext NOT NULL,
  `product_no_of_copies` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `td_products`
--

INSERT INTO `td_products` (`product_id`, `product_name`, `product_description`, `product_additional_info`, `product_image`, `product_sku`, `product_slug`, `product_factor`, `product_no_of_pages`, `product_no_of_copies`, `created`, `modified`) VALUES
(1, 'Zeitung Broadsheet', '315 mm x 480 mm\r\nDruck 4-farbig\r\n2 Bünde mit Ausnahme von\r\n4 und 8 Seiten Umfang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', 'wSd6V_zeitung.jpg', '000000', 'zeitung-broadsheet', 0.1512, '["4","6","8","12","16","20","24","28","32"]', '["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000","31000","32000","33000","34000","35000","36000","37000","38000","39000","40000","41000","42000","43000","44000","45000","46000","47000","48000","49000","50000"]', '2015-05-06 05:21:54', '2015-08-07 20:55:29'),
(2, 'Zeitung Tabloid', '240mm x 315mm		\r\nDruck 4-farbig		\r\nkreuzgebündelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', 'uWOea_zeitung.jpg', '0000000', 'zeitung-tabloid', 0.0756, '["8","12","16","24","32","40","48","56","64"]', '["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000","31000","32000","33000","34000","35000","36000","37000","38000","39000","40000","41000","42000","43000","44000","45000","46000","47000","48000","49000","50000"]', '2015-05-06 05:44:53', '2015-08-07 20:50:13'),
(3, 'Broschüren A4', '210x297\r\ngeheftet\r\nDruck 4-farbig\r\nkreuzgebündelt auf Europalette', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas lacus at libero volutpat, vitae posuere ipsum porta. Curabitur a orci ac nisl efficitur posuere. Nunc at bibendum purus, in interdum nisi. Fusce imperdiet ultrices posuere. Aliquam eget maximus neque. Aenean quis facilisis felis. Nulla mattis ullamcorper purus in faucibus? Nulla in lorem enim. Quisque in turpis non sapien rhoncus gravida. Maecenas pharetra mollis mi, ut laoreet odio rhoncus sed.\r\n\r\nFusce tempor, quam in maximus auctor, dolor urna volutpat augue, et porta justo diam quis mauris! Nullam quis faucibus felis, eu posuere ex. Phasellus nec ex nisi! Vestibulum pretium tristique odio nec viverra. Praesent ornare lacus orci, ut dictum nibh ornare vitae! Fusce tempus eleifend erat tincidunt convallis. Nam erat lectus, placerat in velit eget, feugiat lacinia velit. Etiam nec vehicula mi. Fusce rhoncus erat condimentum dignissim condimentum. Mauris eget efficitur elit. Pellentesque congue augue vel congue tincidunt! Donec at leo mauris. Curabitur eget eleifend sapien. Suspendisse consequat dolor vitae massa commodo varius. Vestibulum bibendum aliquet nulla, non malesuada tortor mattis at? Sed id est ac erat facilisis aliquet.\r\n\r\nAenean nisl arcu, condimentum in egestas et, efficitur vitae quam! Mauris volutpat vehicula ex, et placerat erat pulvinar a. Integer aliquet; ipsum id vulputate ultricies; arcu turpis malesuada est, id euismod libero dolor id nisi. Vivamus metus dui; molestie commodo consectetur ut, sodales ac ligula. Cras consectetur mi vel tincidunt porta. Vestibulum dapibus sapien ante, volutpat auctor felis convallis et. Praesent posuere nisl est. Etiam rutrum est purus, sed gravida enim feugiat ac! Proin a suscipit lacus. Morbi eleifend nisi id sodales aliquam. Quisque vel metus vitae risus convallis tincidunt et eget nulla? Donec blandit consectetur nulla ut dapibus. Vestibulum lorem lectus, mollis sit amet egestas nec, laoreet at sem! Sed maximus orci ante, in mollis nisi fermentum at.\r\n', '6rWz4_broschuere.jpg', '00000000', 'broschueren-a4', 0.0624, '["8","12","16","24","32","40","48","56","64"]', '["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000","31000","32000","33000","34000","35000","36000","37000","38000","39000","40000","41000","42000","43000","44000","45000","46000","47000","48000","49000","50000"]', '2015-05-07 06:33:01', '2015-08-07 20:41:03'),
(4, 'Broschüren A5', '148 x 210		\r\ngeheftet		\r\nDruck 4-farbig		\r\nkreuzgebündelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eleifend quam eget diam sollicitudin consequat! Mauris pretium velit a ante vestibulum, non ornare sem rhoncus. Ut augue mi, viverra sed semper a, tincidunt id eros. Nunc non efficitur nunc. Suspendisse potenti. Morbi in metus aliquet, semper orci sed, viverra justo! Quisque tincidunt accumsan elementum. Nullam nisl est, ullamcorper sit amet sagittis ac, egestas nec urna. Donec feugiat feugiat tempor. Pellentesque tristique suscipit lobortis. Vivamus viverra lacinia urna et tincidunt! In tellus ipsum, fringilla vitae lacinia ut; tincidunt eget sapien. Donec at magna eu quam facilisis rhoncus. Etiam tristique iaculis mi commodo pretium. Aenean at ligula ornare; malesuada tortor a, aliquam enim. Proin accumsan nisl sem, id feugiat nisl blandit id.\r\n\r\nQuisque suscipit sagittis velit, non luctus leo maximus quis. Nunc sed ante a ante luctus tincidunt. Nunc libero ex, sagittis in vulputate vitae, convallis nec ante. Donec vitae porttitor nulla. Nullam pharetra purus eros, quis hendrerit nisi mattis dapibus. Sed sit amet varius nulla. Suspendisse aliquam lorem enim, a faucibus ipsum maximus sit amet. Sed pellentesque sit amet libero sed auctor. Praesent vitae dolor ac lorem finibus luctus. Cras sagittis fringilla libero, a pharetra eros posuere vitae. Duis porta ligula sem, sed vulputate sem tempor sit amet. Sed ante turpis, fermentum ac tellus ac, elementum blandit lacus.\r\n\r\nDonec elit eros, blandit sit amet sem quis, aliquam sollicitudin mi! Nam fermentum pulvinar orci vitae cursus. Morbi laoreet auctor ipsum sit amet venenatis? Maecenas sit amet lobortis velit. Nunc elementum mattis magna commodo fermentum. Fusce posuere neque ac posuere tincidunt. Nullam venenatis felis ac purus fringilla, ultrices bibendum ligula mattis. Curabitur dignissim, leo finibus convallis viverra; magna eros gravida diam, id varius libero augue eget ante. Nulla malesuada risus vitae lacus efficitur, vel malesuada neque malesuada. Quisque mollis tincidunt tellus, at lobortis metus convallis quis.', 'dEuNW_broschuereA5.jpg', 'product4', 'broschueren-a5', 0.0311, '["16","24","32","48","64","80","96","112","128"]', '["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000","31000","32000","33000","34000","35000","36000","37000","38000","39000","40000","41000","42000","43000","44000","45000","46000","47000","48000","49000","50000"]', '2015-05-07 06:41:32', '2015-08-07 20:34:44'),
(5, 'Preislisten A4', '210x297		\r\ngeheftet		\r\nDruck 1-farbig schwarz		\r\nkreuzgebündelt auf Europalette		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eleifend quam eget diam sollicitudin consequat! Mauris pretium velit a ante vestibulum, non ornare sem rhoncus. Ut augue mi, viverra sed semper a, tincidunt id eros. Nunc non efficitur nunc. Suspendisse potenti. Morbi in metus aliquet, semper orci sed, viverra justo! Quisque tincidunt accumsan elementum. Nullam nisl est, ullamcorper sit amet sagittis ac, egestas nec urna. Donec feugiat feugiat tempor. Pellentesque tristique suscipit lobortis. Vivamus viverra lacinia urna et tincidunt! In tellus ipsum, fringilla vitae lacinia ut; tincidunt eget sapien. Donec at magna eu quam facilisis rhoncus. Etiam tristique iaculis mi commodo pretium. Aenean at ligula ornare; malesuada tortor a, aliquam enim. Proin accumsan nisl sem, id feugiat nisl blandit id. mlk\r\n\r\nQuisque suscipit sagittis velit, non luctus leo maximus quis. Nunc sed ante a ante luctus tincidunt. Nunc libero ex, sagittis in vulputate vitae, convallis nec ante. Donec vitae porttitor nulla. Nullam pharetra purus eros, quis hendrerit nisi mattis dapibus. Sed sit amet varius nulla. Suspendisse aliquam lorem enim, a faucibus ipsum maximus sit amet. Sed pellentesque sit amet libero sed auctor. Praesent vitae dolor ac lorem finibus luctus. Cras sagittis fringilla libero, a pharetra eros posuere vitae. Duis porta ligula sem, sed vulputate sem tempor sit amet. Sed ante turpis, fermentum ac tellus ac, elementum blandit lacus.\r\n\r\nDonec elit eros, blandit sit amet sem quis, aliquam sollicitudin mi! Nam fermentum pulvinar orci vitae cursus. Morbi laoreet auctor ipsum sit amet venenatis? Maecenas sit amet lobortis velit. Nunc elementum mattis magna commodo fermentum. Fusce posuere neque ac posuere tincidunt. Nullam venenatis felis ac purus fringilla, ultrices bibendum ligula mattis. Curabitur dignissim, leo finibus convallis viverra; magna eros gravida diam, id varius libero augue eget ante. Nulla malesuada risus vitae lacus efficitur, vel malesuada neque malesuada. Quisque mollis tincidunt tellus, at lobortis metus convallis quis.', 'yMn6v_preisliste.jpg', '000000', 'preislisten-a4', 0.0624, '["8","12","16","24","32","40","48","56","64"]', '["1000","2000","3000","4000","5000","6000","7000","8000","9000","10000","11000","12000","13000","14000","15000","16000","17000","18000","19000","20000","21000","22000","23000","24000","25000","26000","27000","28000","29000","30000","31000","32000","33000","34000","35000","36000","37000","38000","39000","40000","41000","42000","43000","44000","45000","46000","47000","48000","49000","50000"]', '2015-05-07 06:43:53', '2015-08-07 18:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_answers`
--

CREATE TABLE IF NOT EXISTS `td_product_answers` (
  `product_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_question_id` int(11) NOT NULL,
  `answer_content` mediumtext NOT NULL,
  `answer_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_answer_id`),
  KEY `FK_td_product_answers` (`product_question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_product_answers`
--

INSERT INTO `td_product_answers` (`product_answer_id`, `product_question_id`, `answer_content`, `answer_status`, `created`, `modified`) VALUES
(1, 1, 'das ist die riesenantwort darauf! ', '1', '2015-07-06 22:58:27', '2015-07-06 22:58:27'),
(2, 5, 'This is the answer.', '1', '2015-07-07 15:54:59', '2015-07-07 15:54:59'),
(3, 2, 'This is the answer for a question..', '1', '2015-07-15 12:40:56', '2015-07-15 12:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_prices`
--

CREATE TABLE IF NOT EXISTS `td_product_prices` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `paper_variant_id` int(11) NOT NULL,
  `pp_no_of_pages` double NOT NULL,
  `pp_no_of_copies` double NOT NULL,
  `pp_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `FK_td_product_prices` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=361 ;

--
-- Dumping data for table `td_product_prices`
--

INSERT INTO `td_product_prices` (`pp_id`, `product_id`, `paper_variant_id`, `pp_no_of_pages`, `pp_no_of_copies`, `pp_price`, `created`, `modified`) VALUES
(1, 1, 1, 4, 1000, 878, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(2, 1, 1, 4, 5000, 1011, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(3, 1, 1, 4, 10000, 1176, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(4, 1, 1, 4, -1, 31.4, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(5, 1, 1, 8, 1000, 1000, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(6, 1, 1, 8, 5000, 1251, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(7, 1, 1, 8, 10000, 1437, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(8, 1, 1, 8, -1, 47, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(9, 1, 1, 12, 1000, 1244, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(10, 1, 1, 12, 5000, 1488, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(11, 1, 1, 12, 10000, 1731, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(12, 1, 1, 12, -1, 55.4, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(13, 1, 1, 16, 1000, 1494, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(14, 1, 1, 16, 5000, 1852, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(15, 1, 1, 16, 10000, 2300, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(16, 1, 1, 16, -1, 82.4, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(17, 1, 1, 20, 1000, 1868, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(18, 1, 1, 20, 5000, 2282, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(19, 1, 1, 20, 10000, 2705, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(20, 1, 1, 20, -1, 90.3, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(21, 1, 1, 24, 1000, 2135, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(22, 1, 1, 24, 5000, 2520, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(23, 1, 1, 24, 10000, 2983, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(24, 1, 1, 24, -1, 94.8, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(25, 1, 1, 28, 1000, 2353, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(26, 1, 1, 28, 5000, 2885, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(27, 1, 1, 28, 10000, 3405, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(28, 1, 1, 28, -1, 115.8, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(29, 1, 1, 32, 1000, 2571, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(30, 1, 1, 32, 5000, 3156, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(31, 1, 1, 32, 10000, 3785, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(32, 1, 1, 32, -1, 124.4, '2015-05-06 05:34:54', '2015-08-07 20:57:05'),
(33, 2, 1, 8, 1000, 980, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(34, 2, 1, 8, 5000, 1113, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(35, 2, 1, 8, 10000, 1270, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(36, 2, 1, 8, -1, 31.6, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(37, 2, 1, 16, 1000, 1206, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(38, 2, 1, 16, 5000, 1362, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(39, 2, 1, 16, 10000, 1552, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(40, 2, 1, 16, -1, 40.5, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(41, 2, 1, 24, 1000, 1407, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(42, 2, 1, 24, 5000, 1607, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(43, 2, 1, 24, 10000, 1870, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(44, 2, 1, 24, -1, 54.5, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(45, 2, 1, 32, 1000, 1896, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(46, 2, 1, 32, 5000, 2142, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(47, 2, 1, 32, 10000, 2808, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(48, 2, 1, 32, -1, 86.7, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(49, 2, 1, 40, 1000, 2176, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(50, 2, 1, 40, 5000, 2465, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(51, 2, 1, 40, 10000, 2922, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(52, 2, 1, 40, -1, 84.3, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(53, 2, 1, 48, 1000, 2389, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(54, 2, 1, 48, 5000, 2722, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(55, 2, 1, 48, 10000, 3221, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(56, 2, 1, 48, -1, 95.5, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(57, 2, 1, 56, 1000, 2755, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(58, 2, 1, 56, 5000, 3134, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(59, 2, 1, 56, 10000, 3678, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(60, 2, 1, 56, -1, 107.6, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(61, 2, 1, 64, 1000, 2970, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(62, 2, 1, 64, 5000, 3535, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(63, 2, 1, 64, 10000, 4088, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(64, 2, 1, 64, -1, 120.3, '2015-05-08 05:10:39', '2015-08-07 20:52:09'),
(65, 5, 1, 8, 1000, 1160, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(66, 5, 1, 8, 5000, 1362, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(67, 5, 1, 8, 10000, 1607, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(68, 5, 1, 8, -1, 49.1, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(69, 5, 1, 16, 1000, 1385, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(70, 5, 1, 16, 5000, 1612, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(71, 5, 1, 16, 10000, 1889, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(72, 5, 1, 16, -1, 58, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(73, 5, 1, 24, 1000, 1587, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(74, 5, 1, 24, 5000, 1856, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(75, 5, 1, 24, 10000, 2207, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(76, 5, 1, 24, -1, 72, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(77, 5, 1, 32, 1000, 2076, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(78, 5, 1, 32, 5000, 2392, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(79, 5, 1, 32, 10000, 3145, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(80, 5, 1, 32, -1, 104.2, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(81, 5, 1, 40, 1000, 2355, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(82, 5, 1, 40, 5000, 2714, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(83, 5, 1, 40, 10000, 3259, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(84, 5, 1, 40, -1, 101.8, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(85, 5, 1, 48, 1000, 2569, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(86, 5, 1, 48, 5000, 2971, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(87, 5, 1, 48, 10000, 3558, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(88, 5, 1, 48, -1, 113, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(89, 5, 1, 56, 1000, 2935, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(90, 5, 1, 56, 5000, 3383, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(91, 5, 1, 56, 10000, 4015, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(92, 5, 1, 56, -1, 125.1, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(93, 5, 1, 64, 1000, 3149, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(94, 5, 1, 64, 5000, 3784, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(95, 5, 1, 64, 10000, 4425, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(96, 5, 1, 64, -1, 137.8, '2015-05-13 20:41:31', '2015-08-07 19:18:35'),
(97, 3, 1, 8, 1000, 1187, '2015-05-13 20:42:48', '2015-08-07 20:48:58'),
(98, 3, 1, 8, 5000, 1386, '2015-05-13 20:42:48', '2015-08-07 20:48:58'),
(99, 3, 1, 8, 10000, 1634, '2015-05-13 20:42:48', '2015-08-07 20:48:58'),
(100, 3, 1, 8, -1, 49.6, '2015-05-13 20:42:48', '2015-08-07 20:48:58'),
(101, 3, 1, 16, 1000, 1459, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(102, 3, 1, 16, 5000, 1795, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(103, 3, 1, 16, 10000, 2216, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(104, 3, 1, 16, -1, 84.2, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(105, 3, 1, 24, 1000, 1884, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(106, 3, 1, 24, 5000, 2274, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(107, 3, 1, 24, 10000, 2762, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(108, 3, 1, 24, -1, 97.6, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(109, 3, 1, 32, 1000, 2286, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(110, 3, 1, 32, 5000, 2731, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(111, 3, 1, 32, 10000, 3286, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(112, 3, 1, 32, -1, 111, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(113, 3, 1, 40, 1000, 2915, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(114, 3, 1, 40, 5000, 3429, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(115, 3, 1, 40, 10000, 4069, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(116, 3, 1, 40, -1, 128.1, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(117, 3, 1, 48, 1000, 3357, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(118, 3, 1, 48, 5000, 3923, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(119, 3, 1, 48, 10000, 4631, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(120, 3, 1, 48, -1, 141.6, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(121, 3, 1, 56, 1000, 3744, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(122, 3, 1, 56, 5000, 4369, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(123, 3, 1, 56, 10000, 5148, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(124, 3, 1, 56, -1, 155.8, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(125, 3, 1, 64, 1000, 4132, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(126, 3, 1, 64, 5000, 4809, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(127, 3, 1, 64, 10000, 5655, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(128, 3, 1, 64, -1, 169.2, '2015-05-13 20:45:39', '2015-08-07 20:48:58'),
(129, 4, 1, 16, 1000, 1333, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(130, 4, 1, 16, 5000, 1614, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(131, 4, 1, 16, 10000, 1966, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(132, 4, 1, 16, -1, 70.4, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(133, 4, 1, 32, 1000, 2254, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(134, 4, 1, 32, 5000, 2811, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(135, 4, 1, 32, 10000, 3509, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(136, 4, 1, 32, -1, 139.5, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(137, 4, 1, 48, 1000, 2901, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(138, 4, 1, 48, 5000, 3511, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(139, 4, 1, 48, 10000, 4274, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(140, 4, 1, 48, -1, 152.5, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(141, 4, 1, 64, 1000, 3502, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(142, 4, 1, 64, 5000, 4171, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(143, 4, 1, 64, 10000, 5006, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(144, 4, 1, 64, -1, 167, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(145, 4, 1, 80, 1000, 3984, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(146, 4, 1, 80, 5000, 4831, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(147, 4, 1, 80, 10000, 5890, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(148, 4, 1, 80, -1, 211.9, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(149, 4, 1, 96, 1000, 4951, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(150, 4, 1, 96, 5000, 5850, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(151, 4, 1, 96, 10000, 6976, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(152, 4, 1, 96, -1, 225.1, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(153, 4, 1, 112, 1000, 5546, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(154, 4, 1, 112, 5000, 6469, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(155, 4, 1, 112, 10000, 7622, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(156, 4, 1, 112, -1, 230.5, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(157, 4, 1, 128, 1000, 5818, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(158, 4, 1, 128, 5000, 6793, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(159, 4, 1, 128, 10000, 8009, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(160, 4, 1, 128, -1, 243.2, '2015-05-13 20:48:27', '2015-08-07 20:37:36'),
(161, 1, 2, 4, 1000, 883, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(162, 1, 2, 4, 5000, 1023, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(163, 1, 2, 4, 10000, 1198, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(164, 1, 2, 4, -1, 33.4, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(165, 1, 2, 8, 1000, 1007, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(166, 1, 2, 8, 5000, 1271, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(167, 1, 2, 8, 10000, 1476, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(168, 1, 2, 8, -1, 50.7, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(169, 1, 2, 12, 1000, 1255, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(170, 1, 2, 12, 5000, 1520, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(171, 1, 2, 12, 10000, 1790, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(172, 1, 2, 12, -1, 60.8, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(173, 1, 2, 16, 1000, 1508, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(174, 1, 2, 16, 5000, 1894, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(175, 1, 2, 16, 10000, 2377, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(176, 1, 2, 16, -1, 89.5, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(177, 1, 2, 20, 1000, 1885, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(178, 1, 2, 20, 5000, 2335, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(179, 1, 2, 20, 10000, 2803, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(180, 1, 2, 20, -1, 99.1, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(181, 1, 2, 24, 1000, 2156, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(182, 1, 2, 24, 5000, 2584, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(183, 1, 2, 24, 10000, 3100, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(184, 1, 2, 24, -1, 105.4, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(185, 1, 2, 28, 1000, 2377, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(186, 1, 2, 28, 5000, 2958, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(187, 1, 2, 28, 10000, 3541, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(188, 1, 2, 28, -1, 128.3, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(189, 1, 2, 32, 1000, 2597, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(190, 1, 2, 32, 5000, 3240, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(191, 1, 2, 32, 10000, 3941, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(192, 1, 2, 32, -1, 138.7, '2015-07-06 12:58:12', '2015-08-07 20:59:26'),
(193, 2, 2, 8, 1000, 986, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(194, 2, 2, 8, 5000, 1124, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(195, 2, 2, 8, 10000, 1292, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(196, 2, 2, 8, -1, 33.6, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(197, 2, 2, 16, 1000, 1212, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(198, 2, 2, 16, 5000, 1382, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(199, 2, 2, 16, 10000, 1591, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(200, 2, 2, 16, -1, 44.2, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(201, 2, 2, 24, 1000, 1418, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(202, 2, 2, 24, 5000, 1638, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(203, 2, 2, 24, 10000, 1928, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(204, 2, 2, 24, -1, 59.9, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(205, 2, 2, 32, 1000, 1911, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(206, 2, 2, 32, 5000, 2185, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(207, 2, 2, 32, 10000, 1886, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(208, 2, 2, 32, -1, 93.9, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(209, 2, 2, 40, 1000, 2193, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(210, 2, 2, 40, 5000, 2517, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(211, 2, 2, 40, 10000, 3019, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(212, 2, 2, 40, -1, 93.2, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(213, 2, 2, 48, 1000, 2409, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(214, 2, 2, 48, 5000, 2785, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(215, 2, 2, 48, 10000, 3338, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(216, 2, 2, 48, -1, 106.1, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(217, 2, 2, 56, 1000, 2779, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(218, 2, 2, 56, 5000, 3208, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(219, 2, 2, 56, 10000, 3813, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(220, 2, 2, 56, -1, 120.1, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(221, 2, 2, 64, 1000, 2997, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(222, 2, 2, 64, 5000, 3619, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(223, 2, 2, 64, 10000, 4243, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(224, 2, 2, 64, -1, 134.6, '2015-07-06 13:02:13', '2015-08-07 20:55:04'),
(225, 5, 1, 12, 1000, 1285, '2015-07-14 16:36:33', '2015-08-07 19:18:35'),
(226, 5, 1, 12, 5000, 1490, '2015-07-14 16:36:33', '2015-08-07 19:18:35'),
(227, 5, 1, 12, 10000, 1757, '2015-07-14 16:36:33', '2015-08-07 19:18:35'),
(228, 5, 1, 12, -1, 52.6, '2015-07-14 16:36:33', '2015-08-07 19:18:35'),
(229, 5, 2, 8, 1000, 1166, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(230, 5, 2, 8, 5000, 1374, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(231, 5, 2, 8, 10000, 1629, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(232, 5, 2, 8, -1, 51.1, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(233, 5, 2, 12, 1000, 1292, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(234, 5, 2, 12, 5000, 1508, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(235, 5, 2, 12, 10000, 1788, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(236, 5, 2, 12, -1, 55.2, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(237, 5, 2, 16, 1000, 1391, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(238, 5, 2, 16, 5000, 1632, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(239, 5, 2, 16, 10000, 1928, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(240, 5, 2, 16, -1, 61.7, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(241, 5, 2, 24, 1000, 1598, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(242, 5, 2, 24, 5000, 1888, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(243, 5, 2, 24, 10000, 2265, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(244, 5, 2, 24, -1, 77.4, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(245, 5, 2, 32, 1000, 2090, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(246, 5, 2, 32, 5000, 2434, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(247, 5, 2, 32, 10000, 3223, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(248, 5, 2, 32, -1, 111.3, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(249, 5, 2, 40, 1000, 2373, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(250, 5, 2, 40, 5000, 2767, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(251, 5, 2, 40, 10000, 3356, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(252, 5, 2, 40, -1, 110.7, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(253, 5, 2, 48, 1000, 2589, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(254, 5, 2, 48, 5000, 3035, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(255, 5, 2, 48, 10000, 3675, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(256, 5, 2, 48, -1, 123.6, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(257, 5, 2, 56, 1000, 2958, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(258, 5, 2, 56, 5000, 3457, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(259, 5, 2, 56, 10000, 4150, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(260, 5, 2, 56, -1, 137.6, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(261, 5, 2, 64, 1000, 3176, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(262, 5, 2, 64, 5000, 3869, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(263, 5, 2, 64, 10000, 4580, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(264, 5, 2, 64, -1, 152.1, '2015-07-14 16:39:22', '2015-08-07 20:33:25'),
(265, 1, 1, 6, 1000, 1023, '2015-08-07 15:39:40', '2015-08-07 20:57:05'),
(266, 1, 1, 6, 5000, 1148, '2015-08-07 15:39:40', '2015-08-07 20:57:05'),
(267, 1, 1, 6, 10000, 1315, '2015-08-07 15:39:40', '2015-08-07 20:57:05'),
(268, 1, 1, 6, -1, 32.5, '2015-08-07 15:39:40', '2015-08-07 20:57:05'),
(269, 1, 2, 6, 1000, 1031, '2015-08-07 15:41:41', '2015-08-07 20:59:26'),
(270, 1, 2, 6, 5000, 1166, '2015-08-07 15:41:41', '2015-08-07 20:59:26'),
(271, 1, 2, 6, 10000, 1347, '2015-08-07 15:41:41', '2015-08-07 20:59:26'),
(272, 1, 2, 6, -1, 35.1, '2015-08-07 15:41:41', '2015-08-07 20:59:26'),
(273, 4, 1, 24, 1000, 1674, '2015-08-07 20:37:36', '2015-08-07 20:37:36'),
(274, 4, 1, 24, 5000, 1983, '2015-08-07 20:37:36', '2015-08-07 20:37:36'),
(275, 4, 1, 24, 10000, 2367, '2015-08-07 20:37:36', '2015-08-07 20:37:36'),
(276, 4, 1, 24, -1, 76.9, '2015-08-07 20:37:36', '2015-08-07 20:37:36'),
(277, 4, 2, 16, 1000, 1348, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(278, 4, 2, 16, 5000, 1651, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(279, 4, 2, 16, 10000, 2031, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(280, 4, 2, 16, -1, 76, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(281, 4, 2, 24, 1000, 1698, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(282, 4, 2, 24, 5000, 2039, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(283, 4, 2, 24, 10000, 2466, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(284, 4, 2, 24, -1, 85.3, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(285, 4, 2, 32, 1000, 2263, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(286, 4, 2, 32, 5000, 2830, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(287, 4, 2, 32, 10000, 3540, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(288, 4, 2, 32, -1, 142.1, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(289, 4, 2, 48, 1000, 2913, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(290, 4, 2, 48, 5000, 3539, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(291, 4, 2, 48, 10000, 4322, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(292, 4, 2, 48, -1, 156.6, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(293, 4, 2, 64, 1000, 3519, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(294, 4, 2, 64, 5000, 4208, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(295, 4, 2, 64, 10000, 5071, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(296, 4, 2, 64, -1, 172.6, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(297, 4, 2, 80, 1000, 3997, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(298, 4, 2, 80, 5000, 4871, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(299, 4, 2, 80, 10000, 5964, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(300, 4, 2, 80, -1, 218.6, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(301, 4, 2, 96, 1000, 4971, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(302, 4, 2, 96, 5000, 5903, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(303, 4, 2, 96, 10000, 7069, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(304, 4, 2, 96, -1, 233.1, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(305, 4, 2, 112, 1000, 5568, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(306, 4, 2, 112, 5000, 6530, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(307, 4, 2, 112, 10000, 7731, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(308, 4, 2, 112, -1, 240.2, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(309, 4, 2, 128, 1000, 5844, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(310, 4, 2, 128, 5000, 6861, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(311, 4, 2, 128, 10000, 8132, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(312, 4, 2, 128, -1, 254.2, '2015-08-07 20:39:31', '2015-08-07 20:40:32'),
(313, 3, 1, 12, 1000, 1447, '2015-08-07 20:43:07', '2015-08-07 20:48:58'),
(314, 3, 1, 12, 5000, 1694, '2015-08-07 20:43:07', '2015-08-07 20:48:58'),
(315, 3, 1, 12, 10000, 2003, '2015-08-07 20:43:07', '2015-08-07 20:48:58'),
(316, 3, 1, 12, -1, 61.8, '2015-08-07 20:43:07', '2015-08-07 20:48:58'),
(317, 3, 2, 8, 1000, 1191, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(318, 3, 2, 8, 5000, 1395, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(319, 3, 2, 8, 10000, 1650, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(320, 3, 2, 8, -1, 51.1, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(321, 3, 2, 12, 1000, 1453, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(322, 3, 2, 12, 5000, 1708, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(323, 3, 2, 12, 10000, 2027, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(324, 3, 2, 12, -1, 63.7, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(325, 3, 2, 16, 1000, 1463, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(326, 3, 2, 16, 5000, 1811, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(327, 3, 2, 16, 10000, 2245, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(328, 3, 2, 16, -1, 86.8, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(329, 3, 2, 24, 1000, 1891, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(330, 3, 2, 24, 5000, 2298, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(331, 3, 2, 24, 10000, 2806, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(332, 3, 2, 24, -1, 101.6, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(333, 3, 2, 32, 1000, 2296, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(334, 3, 2, 32, 5000, 2763, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(335, 3, 2, 32, 10000, 3345, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(336, 3, 2, 32, -1, 116.4, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(337, 3, 2, 40, 1000, 2929, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(338, 3, 2, 40, 5000, 3469, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(339, 3, 2, 40, 10000, 4143, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(340, 3, 2, 40, -1, 134.9, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(341, 3, 2, 48, 1000, 3372, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(342, 3, 2, 48, 5000, 3971, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(343, 3, 2, 48, 10000, 4720, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(344, 3, 2, 48, -1, 149.7, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(345, 3, 2, 56, 1000, 3763, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(346, 3, 2, 56, 5000, 4425, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(347, 3, 2, 56, 10000, 5252, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(348, 3, 2, 56, -1, 165.3, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(349, 3, 2, 64, 1000, 4153, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(350, 3, 2, 64, 5000, 4874, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(351, 3, 2, 64, 10000, 5774, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(352, 3, 2, 64, -1, 180.1, '2015-08-07 20:46:02', '2015-08-07 20:46:02'),
(353, 2, 1, 12, 1000, 1105, '2015-08-07 20:52:09', '2015-08-07 20:52:09'),
(354, 2, 1, 12, 5000, 1240, '2015-08-07 20:52:09', '2015-08-07 20:52:09'),
(355, 2, 1, 12, 10000, 1421, '2015-08-07 20:52:09', '2015-08-07 20:52:09'),
(356, 2, 1, 12, -1, 35.1, '2015-08-07 20:52:09', '2015-08-07 20:52:09'),
(357, 2, 2, 12, 1000, 1112, '2015-08-07 20:55:04', '2015-08-07 20:55:04'),
(358, 2, 2, 12, 5000, 1258, '2015-08-07 20:55:04', '2015-08-07 20:55:04'),
(359, 2, 2, 12, 10000, 1452, '2015-08-07 20:55:04', '2015-08-07 20:55:04'),
(360, 2, 2, 12, -1, 37.7, '2015-08-07 20:55:04', '2015-08-07 20:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `td_product_questions`
--

CREATE TABLE IF NOT EXISTS `td_product_questions` (
  `product_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `question_name` varchar(100) NOT NULL,
  `question_email` varchar(255) NOT NULL,
  `question_phone` varchar(100) NOT NULL,
  `question_content` mediumtext NOT NULL,
  `question_status` char(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_question_id`),
  KEY `FK_td_product_questions` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `td_product_questions`
--

INSERT INTO `td_product_questions` (`product_question_id`, `product_id`, `question_name`, `question_email`, `question_phone`, `question_content`, `question_status`, `created`, `modified`) VALUES
(1, 3, 'hasso', 'info@pandavisuals.eu', '123123123', 'das ist eine riesenfrage!', '1', '2015-07-06 22:57:39', '2015-07-06 22:57:39'),
(2, 3, 'name', 'info@pandavisuals.eu', '234234', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '1', '2015-07-06 23:32:02', '2015-07-06 23:32:02'),
(4, 1, 'Nadesh', 'nadsnaddy@gmail.com', '1234', 'This is for a question?', '1', '2015-07-07 15:26:12', '2015-07-07 15:26:12'),
(5, 1, 'Nadesh', 'nadsnaddy@gmail.com', '123', 'Testing Question?', '1', '2015-07-07 15:30:57', '2015-07-07 15:30:57'),
(6, 1, 'Nadesh', 'nadsnaddy@gmail.com', '123', 'This is for testing', '1', '2015-07-15 10:32:42', '2015-07-15 10:32:42'),
(7, 1, 'Nadesh', 'nadsnaddy@gmail.com', '123', 'This is for another testing', '1', '2015-07-15 10:33:29', '2015-07-15 10:33:29'),
(8, 1, 'Nadesh', 'nadsnaddy@gmail.com', '123', 'This is test1', '1', '2015-07-15 10:36:15', '2015-07-15 10:36:15'),
(9, 1, 'Nadesh', 'nadsnaddy@gmail.com', '124', 'This is test2', '1', '2015-07-15 10:36:46', '2015-07-15 10:36:46'),
(10, 5, 'asdf', 'adsf@asdf.com', 'asdf324', 'asdfadsfadsf', '1', '2015-07-15 11:44:28', '2015-07-15 11:44:28'),
(11, 5, 'adfadsf', 'ads@sdfasf.com', '234234', 'asdfadfadf', '1', '2015-07-15 11:44:42', '2015-07-15 11:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `td_services`
--

CREATE TABLE IF NOT EXISTS `td_services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_caption` mediumtext NOT NULL,
  `sort_value` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `td_services`
--

INSERT INTO `td_services` (`service_id`, `service_title`, `service_image`, `service_caption`, `sort_value`, `created`, `modified`) VALUES
(1, '360°-Rundumservice', 'repeat', 'Flexibilität, Agilität und Professionalität sind Werte, auf deren Fundament wir Ihr ganz individuelles Service-Paket schnüren. Die Dienstleistungsmodule, aus denen wir Ihren individuellen Service-Massanzug schneidern, sind vielfältig - ob Smoking oder robuste Arbeitskleidung - bei uns sind Sie gut betreut.\r\n', 1, '2015-06-25 06:12:35', '2015-06-25 17:42:35'),
(2, 'Seit 1985', 'trophy', 'ist die Theiler Druck AG ein in der Region fest verankerter und bedeutender Druckerei- und Verlagsbetrieb. Wir festigen unsere Stellung im Markt durch technische und innovative Neuerungen und Leistungen. Mit unserem ausgeprägten Qualitäts- und Umweltbewusstsein sind wir der richtige Ansprechpartner. ', 3, '2015-06-25 06:13:45', '2015-06-25 17:43:44'),
(3, 'Kostentransparenz', 'money', 'Soll das Budget eingehalten werden und die Kosten im Griff bleiben, auch hier sind wir konkurrenzfähig – testen Sie uns.', 2, '2015-06-23 06:17:54', '2015-06-23 17:47:54');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`user_id`, `user_name`, `user_lastname`, `user_dob`, `user_email`, `user_password`, `user_last_login`, `user_login_ip`, `user_status`, `password_reset_token`, `created`, `modified`) VALUES
(2, 'julius molnar', NULL, '0000-00-00', 'webmaster@flashartists.de', '893906ab038c221d6557843d2c0a40a71bb635d3', '0000-00-00 00:00:00', '', '1', '', '2015-05-19 21:07:53', '2015-05-19 21:07:53'),
(4, 'julius molnar', NULL, '1988-04-13', 'julius.molnar@outlook.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '', '2015-05-21 22:05:03', '2015-05-21 22:05:03'),
(5, 'evbbbb evb', NULL, '2015-05-04', 'info@glaswelt24.ch', '89ffe3c670c43f84ddf176b992cbfda8e3ba3d99', '0000-00-00 00:00:00', '', '1', '', '2015-05-26 02:41:47', '2015-05-26 02:41:47'),
(10, 'Test', 'test', NULL, 'softwaretesterid@gmail.com', '2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c', '0000-00-00 00:00:00', '', '1', '', '2015-07-17 18:34:21', '2015-07-17 18:34:21'),
(11, 'Walter', 'Feldmann', '2020-10-20', 'w.feldmann@theilerdruck.ch', '335c08cfdfb267b9a11bc87dbcee7c721fabdced', '0000-00-00 00:00:00', '', '1', '', '2015-07-20 20:20:24', '2015-07-22 18:31:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `td_user_addresses`
--

INSERT INTO `td_user_addresses` (`address_id`, `user_id`, `address_type`, `address_title`, `address_firstname`, `address_lastname`, `address_company_type`, `address_company_name`, `address_street`, `address_additional`, `address_city`, `address_post_code`, `address_country`, `address_phone`, `address_mobile`, `created`, `modified`) VALUES
(2, 2, '0', 'Mr', 'julius', 'molnar', 'Individual', '', 'Frölichstr. 10 1/3', '', 'Augsburg', '5050', 'Switzerland', '0821 512662', '', '2015-05-19 21:07:53', '2015-06-12 01:38:47'),
(4, 4, '0', 'Mr', 'julius', 'molnar', 'Individual', '', 'frölichstrasse 10 1/3', '', 'augsburg', '86150', 'Switzerland', '23424234234', '', '2015-05-21 22:05:03', '2015-05-21 22:05:03'),
(5, 5, '0', 'Mr', 'evbbbb', 'evb', 'Company', 'rhbh', 'fcdvxv', '', 'dvsd', '8855', 'Switzerland', '0438446518', '', '2015-05-26 02:41:47', '2015-05-26 02:41:47'),
(10, 10, '0', 'Mr', 'Test', 'test', 'Individual', '', '10, Main street', 'tet', 'city', 'plz', 'Switzerland', '12323131', '', '2015-07-17 18:34:21', '2015-07-17 18:34:21'),
(11, 11, '0', 'Mr', 'Walter', 'Feldmann', 'Company', 'Theiler Druck AG', 'Verenastrasse 2', '', 'Wollerau', '8832', 'Switzerland', '044 787 03 65', '079 778 99 13', '2015-07-20 20:20:24', '2015-07-20 20:20:24');

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
