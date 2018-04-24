-- --------------------------------------------------------
-- Host:                         192.168.10.158
-- Server version:               5.5.56-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for qh_beer_shop
CREATE DATABASE IF NOT EXISTS `qh_beer_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `qh_beer_shop`;

-- Dumping structure for table qh_beer_shop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_users_orders` (`user_id`),
  CONSTRAINT `FK1_users_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table qh_beer_shop.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL DEFAULT '0',
  `product_id` int(11) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK1_product_id_order_detail` (`product_id`),
  KEY `FK2_orders_order_detail` (`order_id`),
  CONSTRAINT `FK2_orders_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table qh_beer_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `picture` varchar(200) NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned DEFAULT NULL,
  `times_sold` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table qh_beer_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `phone` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL DEFAULT '0',
  `last_name` varchar(50) NOT NULL DEFAULT '0',
  `age` int(10) unsigned NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `wallet` decimal(10,2) unsigned DEFAULT '0.00',
  `info` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for trigger qh_beer_shop.QuantityUpdate
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `QuantityUpdate` AFTER INSERT ON `order_detail` FOR EACH ROW UPDATE products 
	  SET quantity = quantity - NEW.quantity,
     times_sold = times_sold + NEW.quantity
   WHERE id = NEW.product_id//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger qh_beer_shop.ReduceWalletMoney
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `ReduceWalletMoney` AFTER INSERT ON `orders` FOR EACH ROW UPDATE users 
     SET wallet = wallet - NEW.total_price
   WHERE id = NEW.user_id//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
