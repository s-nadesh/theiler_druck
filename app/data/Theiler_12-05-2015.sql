/*
SQLyog Ultimate v8.55 
MySQL - 5.5.36 : Database - theiler_druck
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `td_admins` */

DROP TABLE IF EXISTS `td_admins`;

CREATE TABLE `td_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_last_login` datetime NOT NULL,
  `admin_login_ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `td_admins` */

insert  into `td_admins`(`admin_id`,`admin_name`,`admin_email`,`admin_password`,`admin_last_login`,`admin_login_ip`,`created`,`modified`) values (1,'Admin','admin@theilerdruck.com','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','2015-05-12 16:41:47','127.0.0.1','2015-04-24 00:00:00','2015-05-12 16:41:47');

/*Table structure for table `td_carts` */

DROP TABLE IF EXISTS `td_carts`;

CREATE TABLE `td_carts` (
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

/*Data for the table `td_carts` */

insert  into `td_carts`(`cart_id`,`cart_sessionid`,`user_id`,`product_id`,`cart_product_no_of_pages`,`cart_product_no_of_copies`,`paper_id`,`sh_cost_id`,`cart_quantity`,`created`,`modified`) values ('5549adbd-d5c8-4abf-8723-0c10ea533ad5','',1,1,8,6000,2,0,2,'2015-05-06 05:59:25','2015-05-06 05:59:25');

/*Table structure for table `td_paper_variants` */

DROP TABLE IF EXISTS `td_paper_variants`;

CREATE TABLE `td_paper_variants` (
  `paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_rang_mgrm` double NOT NULL,
  `paper_rang_grm` double NOT NULL,
  `paper_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `td_paper_variants` */

insert  into `td_paper_variants`(`paper_id`,`paper_rang_mgrm`,`paper_rang_grm`,`paper_name`,`created`,`modified`) values (1,45,0.045,'weisslich Zeitungsdruck','2015-04-25 00:00:00','2015-04-30 08:21:36'),(2,52,0.052,'edelweiss aufgebessert','2015-04-25 00:00:00','2015-04-28 11:46:48');

/*Table structure for table `td_product_prices` */

DROP TABLE IF EXISTS `td_product_prices`;

CREATE TABLE `td_product_prices` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `pp_no_of_pages` double NOT NULL,
  `pp_no_of_copies` double NOT NULL,
  `pp_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `FK_td_product_prices` (`product_id`),
  CONSTRAINT `FK_td_product_prices` FOREIGN KEY (`product_id`) REFERENCES `td_products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `td_product_prices` */

insert  into `td_product_prices`(`pp_id`,`product_id`,`pp_no_of_pages`,`pp_no_of_copies`,`pp_price`,`created`,`modified`) values (1,1,4,1000,813,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(2,1,4,5000,936,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(3,1,4,10000,1089,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(4,1,4,-1,29.1,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(5,1,8,1000,926,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(6,1,8,5000,1158,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(7,1,8,10000,1331,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(8,1,8,-1,43.5,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(9,1,12,1000,1152,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(10,1,12,5000,1378,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(11,1,12,10000,1603,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(12,1,12,-1,51.3,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(13,1,16,1000,1383,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(14,1,16,5000,1715,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(15,1,16,10000,2129,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(16,1,16,-1,76.3,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(17,1,20,1000,1729,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(18,1,20,5000,2113,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(19,1,20,10000,2505,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(20,1,20,-1,83.6,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(21,1,24,1000,1977,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(22,1,24,5000,2334,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(23,1,24,10000,2762,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(24,1,24,-1,87.8,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(25,1,28,1000,2179,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(26,1,28,5000,2671,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(27,1,28,10000,3153,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(28,1,28,-1,107.2,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(29,1,32,1000,2380,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(30,1,32,5000,2922,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(31,1,32,10000,3505,'2015-05-06 05:34:54','2015-05-06 05:34:54'),(32,1,32,-1,115.2,'2015-05-06 05:34:54','2015-05-06 05:34:54');

/*Table structure for table `td_products` */

DROP TABLE IF EXISTS `td_products`;

CREATE TABLE `td_products` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `td_products` */

insert  into `td_products`(`product_id`,`product_name`,`product_description`,`product_image`,`product_sku`,`product_slug`,`product_factor`,`product_no_of_pages`,`product_no_of_copies`,`created`,`modified`) values (1,'Newspaper broadsheet','315mm x 480mm\r\n4-color printing\r\n2 frets with the exception of\r\n4 and 8 pages in length','QZMAV_pro5.jpg','product1','newspaper-broadsheet',0.1512,'[\"4\",\"8\",\"12\",\"16\",\"20\",\"24\",\"28\",\"32\"]','[\"5000\",\"6000\",\"7000\",\"8000\",\"9000\",\"10000\",\"15000\",\"20000\",\"25000\",\"30000\",\"40000\",\"50000\"]','2015-05-06 05:21:54','2015-05-06 05:21:54'),(2,'Newspaper Tabloid','240mm x 315mm\r\n4-color printing\r\nkreuzgebÃ¼ndelt on Euro pallet','CdxbD_pro4.jpg','product2','newspaper-tabloid',0.0756,'[\"8\",\"16\",\"24\",\"32\",\"40\",\"48\",\"56\",\"64\"]','[\"5000\",\"6000\",\"7000\",\"8000\",\"9000\",\"10000\",\"15000\",\"20000\",\"25000\",\"30000\",\"40000\",\"50000\"]','2015-05-06 05:44:53','2015-05-06 05:44:53');

/*Table structure for table `td_shipping_costs` */

DROP TABLE IF EXISTS `td_shipping_costs`;

CREATE TABLE `td_shipping_costs` (
  `sh_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_cost_zip_from` varchar(100) NOT NULL,
  `sh_cost_zip_to` varchar(100) NOT NULL,
  `sh_cost_basic_weight_price` double NOT NULL,
  `sh_cost_additional_weight_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`sh_cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `td_shipping_costs` */

insert  into `td_shipping_costs`(`sh_cost_id`,`sh_cost_zip_from`,`sh_cost_zip_to`,`sh_cost_basic_weight_price`,`sh_cost_additional_weight_price`,`created`,`modified`) values (1,'1000','1999',180,15,'2015-04-25 00:00:00','2015-04-28 12:42:10'),(2,'2000','2999',180,12,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(3,'3000','3999',180,10,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(4,'4000','4999',180,8,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(5,'5000','5999',180,6,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(6,'6000','6999',180,5,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(7,'7000','7999',180,7,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(8,'8000','8999',180,3,'2015-04-25 00:00:00','2015-04-25 00:00:00'),(9,'9000','9999',180,5,'2015-04-25 00:00:00','2015-04-25 00:00:00');

/*Table structure for table `td_static_pages` */

DROP TABLE IF EXISTS `td_static_pages`;

CREATE TABLE `td_static_pages` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(255) NOT NULL,
  `page_lang` enum('eng','de') NOT NULL DEFAULT 'eng',
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `td_static_pages` */

/*Table structure for table `td_users` */

DROP TABLE IF EXISTS `td_users`;

CREATE TABLE `td_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `td_users` */

insert  into `td_users`(`user_id`,`user_name`,`user_email`,`user_password`,`user_last_login`,`user_login_ip`,`user_status`,`created`,`modified`) values (1,'Nadesh','test@gmail.com','2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c','0000-00-00 00:00:00','','1','2015-05-05 07:03:44','2015-05-05 07:03:44'),(2,'Nadesh','test1@gmail.com','2c2ffbd839d354b15988d6bdfdb5ac2daa99f49c','0000-00-00 00:00:00','','1','2015-05-05 07:07:47','2015-05-05 07:07:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
