-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour commerce-lap
CREATE DATABASE IF NOT EXISTS `commerce-lap` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `commerce-lap`;

-- Listage de la structure de la table commerce-lap. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password_admin` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.admin : ~1 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `password_admin`) VALUES
	(1, 'admin@gmail.com', 'test');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `lib_categorie` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.categories : ~2 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `lib_categorie`) VALUES
	(1, 'laptop'),
	(2, 'Outils Informatique');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. commandes
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `commande_date` date DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `last_name_user` varchar(255) DEFAULT NULL,
  `qty_product` int(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `adresse_user` varchar(255) DEFAULT NULL,
  `code_postal` varchar(255) DEFAULT NULL,
  `country_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.commandes : ~0 rows (environ)
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. description_laptop
CREATE TABLE IF NOT EXISTS `description_laptop` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `rom_product` varchar(255) DEFAULT NULL,
  `ram_product` varchar(255) DEFAULT NULL,
  `processor_product` text,
  `graphique_product` text,
  `other_description` text,
  `screen_product` text,
  `id_product` int(255) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.description_laptop : ~7 rows (environ)
/*!40000 ALTER TABLE `description_laptop` DISABLE KEYS */;
INSERT INTO `description_laptop` (`id`, `rom_product`, `ram_product`, `processor_product`, `graphique_product`, `other_description`, `screen_product`, `id_product`) VALUES
	(35, '1TO', '12GB', '2.6GHZ', '2GB', 'USB', '12000px ', 32),
	(36, '2TO', '32GB', '3.9GHZ', '4GB', '9TH', '1200px', 33),
	(37, '4TO', '64GB', '5GHZ ', '5GB', 'Autonomie 3J', '12000px ', 34),
	(38, '1TO', '32GB', '4GHZ', '8GB', 'USB ', '2000px ', 35),
	(39, '2TO', '8GB', '2.6GHZ', '8GB', 'USB 3.0', '3000px ', 36),
	(40, '500GB', '8GB', '2.5GHZ', '8GB', 'USB', '2000px', 37),
	(41, '500GB', '2GB', '2.6GHZ', '3GB', 'USB', '2000px', 38);
/*!40000 ALTER TABLE `description_laptop` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. description_outil
CREATE TABLE IF NOT EXISTS `description_outil` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `descriptions` text NOT NULL,
  `id_product` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.description_outil : ~16 rows (environ)
/*!40000 ALTER TABLE `description_outil` DISABLE KEYS */;
INSERT INTO `description_outil` (`id`, `descriptions`, `id_product`) VALUES
	(6, 'Prise JACK. Prise mal 2.4 ', 18),
	(7, 'Bluetooth 2.3 Autonomie 24H ', 19),
	(8, '2 controleurs analogique. Technologie bluetooth. Autonomie 8H', 20),
	(9, 'Bluetooth', 21),
	(10, 'Autonomie 4h', 22),
	(11, 'Autonomie 4H', 23),
	(12, '100px', 24),
	(13, '8000 P ', 25),
	(14, 'Autonomie 23H', 26),
	(15, 'Autonomie 23h', 27),
	(16, 'Autonomie 12h', 28),
	(17, '3400px ', 29),
	(18, 'Marque Apple Autonomie 23H', 30),
	(19, 'Prise', 39),
	(20, 'Autonomie', 40),
	(21, 'Trois palier', 41);
/*!40000 ALTER TABLE `description_outil` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_payment` date NOT NULL,
  `montant` int(11) NOT NULL DEFAULT '0',
  `user_email` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.payments : ~0 rows (environ)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Listage de la structure de la table commerce-lap. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(255) NOT NULL,
  `lib_product` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `img_link_product` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Listage des données de la table commerce-lap.products : ~23 rows (environ)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `price`, `lib_product`, `categorie_id`, `img_link_product`) VALUES
	(18, 23, 'Ecouteur Sans fil', 2, 'product/outils/1667374226791bluetooth-headphone.png'),
	(19, 240, 'Casque ', 2, 'product/outils/1667374324227bghead-phone.png'),
	(20, 245, 'Manette', 2, 'product/outils/1667374508546gaming-gear.png'),
	(21, 15, 'Casque Musique', 2, 'product/outils/1667374613836hiclipart.com (18).png'),
	(22, 2109, 'Watch ', 2, 'product/outils/1667374646507apple-watch-2.png'),
	(23, 500, 'Airpods pro', 2, 'product/outils/1667374845423bgearphone.png'),
	(24, 2000, 'Apareil ', 2, 'product/outils/16676675335794.LumixDSLR.png'),
	(25, 4000, 'Drone ', 2, 'product/outils/1667374921025drone.png'),
	(26, 3000, 'Casque 3TH', 2, 'product/outils/1667374955996headphone.png'),
	(27, 5000, 'Headphone', 2, 'product/outils/1667375033967hiclipart.com (16).png'),
	(28, 2300, 'PlayStation 4', 2, 'product/outils/1667375116500game-box.png'),
	(29, 23000, 'AtechCam1080p', 2, 'product/outils/16673751756805.AtechCam1080p.png'),
	(30, 23000, 'Apple Earphones', 2, 'product/outils/166737529026429.AppleEarphones.png'),
	(32, 5000, 'Dell Latitude 4545', 1, 'product/laptop/166737566036216577275718356398119_sd.jpg'),
	(33, 5400, 'Macbook Pro 2022', 1, 'product/laptop/166737585432816577275290796458907_sd.jpg'),
	(34, 5400, 'Dell Alienware', 1, 'product/laptop/166737593018816577275290796458907_sd.jpg'),
	(35, 45000, 'Alienware ', 1, 'product/laptop/166737608655616577274954026486643_sd.jpg'),
	(36, 5400, 'Macbook ', 1, 'product/laptop/166737619427516577276400066455135_sd.jpg'),
	(37, 2000, 'Asus ', 1, 'product/laptop/166737633522916577276400066455135_sd.jpg'),
	(38, 2300, 'Asus Version 3.0 2022', 1, 'product/laptop/166750471222616577275718356398119_sd.jpg'),
	(39, 2300, 'Phone', 2, 'product/outils/16675600598398.BenQ2020.png'),
	(40, 500, 'Apple Watch', 2, 'product/outils/166756010113711.Netgear2020.png'),
	(41, 3400, 'TelloDrone 3.0', 2, 'product/outils/166766778670324.TelloDrone.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
