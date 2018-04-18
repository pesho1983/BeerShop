-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- Dumping data for table qh_beer_shop.orders: ~7 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `date`, `user_id`, `total_price`) VALUES
	(16, '2018-04-17 15:22:28', 1, 2333.00),
	(17, '2018-04-17 15:25:31', 1, 2333.00),
	(18, '2018-04-17 15:25:38', 1, 2333.00),
	(19, '2018-04-17 15:26:40', 1, 2333.00),
	(20, '2018-04-17 15:26:42', 1, 2333.00),
	(21, '2018-04-17 15:26:44', 1, 2333.00),
	(22, '2018-04-17 15:26:44', 1, 2333.00),
	(23, '2018-04-17 15:26:45', 1, 2333.00),
	(24, '2018-04-17 15:26:49', 1, 2333.00),
	(25, '2018-04-17 15:27:29', 1, 2333.00),
	(26, '2018-04-17 15:34:43', 1, 2333.00),
	(27, '2018-04-17 15:34:44', 1, 2333.00),
	(28, '2018-04-17 15:39:19', 1, 2333.00),
	(29, '2018-04-17 15:39:20', 1, 2333.00),
	(30, '2018-04-17 15:50:22', 1, 2333.00),
	(31, '2018-04-17 15:50:25', 1, 2333.00),
	(32, '2018-04-17 15:51:41', 1, 2333.00),
	(33, '2018-04-17 15:52:07', 1, 2333.00),
	(34, '2018-04-17 15:54:51', 1, 2333.00),
	(35, '2018-04-17 15:54:52', 1, 2333.00),
	(36, '2018-04-17 15:59:45', 1, 2333.00),
	(37, '2018-04-17 16:03:56', 1, 233785.00),
	(38, '2018-04-17 16:04:31', 1, 233785.00),
	(39, '2018-04-17 16:04:35', 1, 233785.00),
	(40, '2018-04-17 16:04:37', 1, 233785.00),
	(41, '2018-04-17 16:04:38', 1, 233785.00),
	(42, '2018-04-17 16:04:39', 1, 233785.00),
	(43, '2018-04-17 16:05:13', 1, 233785.00),
	(44, '2018-04-17 16:17:37', 1, 6048.00),
	(45, '2018-04-17 16:20:49', 1, 985.00),
	(46, '2018-04-17 16:21:50', 1, 432.00),
	(47, '2018-04-17 16:26:21', 1, 726.00),
	(48, '2018-04-18 10:49:32', 1, 5509.00),
	(49, '2018-04-18 12:14:29', 1, 232229.00),
	(50, '2018-04-18 14:17:29', 1, 839.00),
	(51, '2018-04-18 14:24:55', 1, 233394.00),
	(52, '2018-04-18 14:28:04', 1, 233394.00),
	(53, '2018-04-18 14:28:20', 1, 331.00),
	(54, '2018-04-18 15:02:04', 1, 432.00);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

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
  CONSTRAINT `FK1_product_id_order_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK2_orders_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table qh_beer_shop.order_detail: ~47 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
	(1, 28, 38, 0.00, 5),
	(2, 29, 38, 0.00, 5),
	(3, 30, 38, 0.00, 5),
	(4, 31, 38, 0.00, 5),
	(5, 32, 38, 0.00, 5),
	(6, 33, 38, 0.00, 5),
	(7, 34, 38, 0.00, 5),
	(8, 35, 38, 0.00, 5),
	(9, 38, 35, 0.00, 1),
	(10, 38, 38, 0.00, 6),
	(11, 38, 36, 0.00, 4),
	(12, 39, 35, 0.00, 1),
	(13, 39, 38, 0.00, 6),
	(14, 39, 36, 0.00, 4),
	(15, 40, 35, 0.00, 1),
	(16, 40, 38, 0.00, 6),
	(17, 40, 36, 0.00, 4),
	(18, 41, 35, 0.00, 1),
	(19, 41, 38, 0.00, 6),
	(20, 41, 36, 0.00, 4),
	(21, 42, 35, 0.00, 1),
	(22, 42, 38, 0.00, 6),
	(23, 42, 36, 0.00, 4),
	(24, 43, 35, 0.00, 1),
	(25, 43, 38, 0.00, 6),
	(26, 43, 36, 0.00, 4),
	(27, 44, 36, 0.00, 14),
	(28, 45, 36, 0.00, 2),
	(29, 45, 38, 0.00, 1),
	(30, 46, 36, 0.00, 1),
	(31, 47, 38, 0.00, 6),
	(32, 48, 29, 0.00, 1),
	(33, 48, 31, 0.00, 6),
	(34, 48, 36, 0.00, 4),
	(35, 49, 38, 0.00, 1),
	(36, 49, 35, 0.00, 1),
	(37, 49, 32, 0.00, 1),
	(38, 49, 34, 0.00, 1),
	(39, 50, 36, 0.00, 1),
	(40, 50, 24, 0.00, 1),
	(41, 50, 26, 0.00, 1),
	(42, 50, 38, 0.00, 3),
	(43, 52, 34, 234.00, 1),
	(44, 52, 35, 231331.00, 1),
	(45, 52, 40, 331.00, -1),
	(46, 52, 36, 432.00, 5),
	(47, 53, 40, 331.00, 1),
	(48, 54, 36, 432.00, 1);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table qh_beer_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `picture` varchar(200) NOT NULL DEFAULT '0',
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table qh_beer_shop.products: ~17 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `quantity`) VALUES
	(23, 'Heinekenche', 'asdbcs', 23.00, 'b1320c48cc602ef69b6fd7f0b8527c6e6ccac720-NavBar an', 32),
	(24, 'Mastika', 'mastika', 12.00, 'cd67ca27afc866d589c6acfaafb4b651606d28eb-3MBresizefdsd.jpg', 12),
	(25, 'Glarusche', 'Glarus ale', 23.00, '157bc43302874a193c2ea4409b8f750ce642b755-GGG.jpeg', 158),
	(26, 'asd', 'ads', 32.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit.png', 31),
	(27, 'dsadas', 'dsadsa', 23.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit1.png', 43),
	(28, 'eqrqr', '231ewq', 32.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit2.png', 43),
	(29, 'ewqeqw', 'rqewr', 523.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit3.png', 543),
	(30, 'ytry', 'rew', 5321.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit4.png', 21),
	(31, 'ytrtyr', 'ytryr', 543.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit5.png', 634),
	(32, 'tret', 'ytr34', 543.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit6.png', 534),
	(33, 'ityu', 'yuttyu', 436.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit7.png', 23),
	(34, 'hgfghfd', 'dh', 234.00, '0e65724c47257e641343fcac0dfbeb5ef6f4fe8b-shit8.png', 634),
	(35, 'dcasca', 'csdacasd', 231331.00, '8d622ad42aa157c6e037de80e5ee44e116d97269-sadvasv12a.jpeg', 41421),
	(36, 'vadfvq', 'vqewvwq', 432.00, '31d9c1a95be90aca2620f7d2188f2ee533480792-2131.jpg', 4321),
	(37, 'Jejka Paca', 'jejka paca', 1.00, 'ff496e7c9dcb9bf6ea8354a3c1cc25099bb3e6c0-beta.jpg', 0),
	(38, 'Glarus Porter', 'България, алкохол 4,6% ,бутилка 500 мл Портър (на английски: Porter - портиер, носач) е тъмен ейл с характерен винен привкус, силен малцов аромат и наситен вкус, в който едновременно присъстват и сладост и горчивина. Въпреки широко разпространените представи, портърите не винаги имат високо съдържание на алкохол, напр. класическите английски портъри имат алкохолно съдържание не повече от 5 %. Портър е предшественик на стаут ейла - друг вид тъмен малцов ейл. Тъмно кафяв цвят, рубинени отенъци, добра прозрачност и кремава пяна.Препоръчана температура на поднасяне: 7-12 градуса\r\n\r\n', 121.00, '8d622ad42aa157c6e037de80e5ee44e116d97269-eqweqw3421.jpeg', 1231),
	(40, 'DDDDDDDDD', 'DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', 331.00, '5e08f4351337f9338d9b1b8a0630af73ee58d2d5-343434.jpg', 13);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table qh_beer_shop.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `address`, `first_name`, `last_name`, `age`, `picture`, `wallet`) VALUES
	(1, 'gosho123', '$2y$12$tqjR.aKJwzr/Vne.ZsXiauCh9CRHYFGpRZmfIwrmVNnOoYSjlsWaW', 'dasdas@ab.nh', '1212212121', 'ewqewq', 'dasdas', 'dasdas', 654, '3eaf39be44cc03d3508afbd9c8a5cee90978489f-ewq.jpg', 0.00),
	(2, 'gosho12', '$2y$10$gDPhGh5pv6Q4LEeC8NVTi.9XY5Rc2VP3h8jojqnEbgZBAumz8wSyW', 'sdasde@bab.nh', '1212121212', 'wqeqwe', 'dsasda', 'das', 1223, NULL, 0.00),
	(3, 'admin', '$2y$10$aEh7Wuc/F61oU/pncIA6kO03MlSa7kesSghz82pF8fLUSwLR7.LGO', 'dasdasq23@avac.bg', '1212121212', 'dwav', 'admin', 'adminov', 1290, '5bdbd5bc362053d0bb77d852ad1fdaec01a372ab-new.png', 0.00),
	(4, 'gosho234', '$2y$10$DdEIb93BLkB6InWeUMk3quQ0hyjIFLROGrd21a73iF9Yt2usC2D6u', 'goshovec@abv.bg', '1221212122', 'adsa', 'goshovec', 'goshovec', 4903, '8d622ad42aa157c6e037de80e5ee44e116d97269-ci-corona-extra-17ddab5e602499d2.jpeg', 0.00),
	(5, '0', '0', '0', '0', '0', '0', '0', 0, '68c0760d7c067221830c2df1e7b65a0093b3d40c-download.jpg', 0.00);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
