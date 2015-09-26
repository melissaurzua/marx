# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: marx
# Generation Time: 2015-09-26 03:24:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;

INSERT INTO `group` (`id`, `name`, `limit`)
VALUES
	(1,'WG Wertschaft',400),
	(2,'Roadtrip',200),
	(3,'Freundin',100);

/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_user`;

CREATE TABLE `group_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `group_user` WRITE;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;

INSERT INTO `group_user` (`id`, `id_user`, `id_group`)
VALUES
	(1,1,1),
	(2,2,1),
	(3,3,1);

/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shopping_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shopping_list`;

CREATE TABLE `shopping_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article` varchar(255) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shopping_list` WRITE;
/*!40000 ALTER TABLE `shopping_list` DISABLE KEYS */;

INSERT INTO `shopping_list` (`id`, `article`, `checked`)
VALUES
	(1,'WC-Papier',NULL),
	(3,'Zahnpasta',NULL),
	(4,'Pasta',1);

/*!40000 ALTER TABLE `shopping_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_group_user` int(11) DEFAULT NULL,
  `id_transaction_type` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_execution` datetime DEFAULT NULL,
  `executed` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_transaction_cycle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;

INSERT INTO `transaction` (`id`, `id_group_user`, `id_transaction_type`, `value`, `date`, `date_execution`, `executed`, `title`, `id_transaction_cycle`)
VALUES
	(1,3,1,10,'2015-09-20 15:00:00','2015-09-20 15:00:00',1,'Coop',NULL),
	(2,2,1,20,'2015-09-20 00:00:00','2015-09-20 00:00:00',1,'Baumarkt',NULL),
	(3,1,1,70,'2015-09-15 00:00:00','2015-09-15 00:00:00',1,'Migros',NULL),
	(32,1,2,50,'2015-09-26 01:27:20','2015-09-26 01:27:20',0,'Coop',NULL),
	(33,1,1,100,'2015-01-02 00:00:00','2015-01-02 00:00:00',1,'Diverses',NULL),
	(34,2,1,50,'2015-01-02 00:00:00','2015-01-02 00:00:00',1,'Migros',NULL),
	(35,3,1,200,'2015-01-02 00:00:00','2015-01-02 00:00:00',1,'Coop',NULL),
	(36,1,1,150,'2015-02-02 00:00:00','2015-02-02 00:00:00',1,'Markt',NULL),
	(37,2,1,130,'2015-02-02 00:00:00','2015-02-02 00:00:00',1,'Denner',NULL),
	(38,3,1,50,'2015-02-02 00:00:00','2015-02-02 00:00:00',1,'Volg',NULL),
	(39,1,1,125,'2015-03-02 00:00:00','2015-03-02 00:00:00',1,'Swisscom',NULL),
	(40,2,1,125,'2015-03-02 00:00:00','2015-03-02 00:00:00',1,'EWB',NULL),
	(41,3,1,100,'2015-03-02 00:00:00','2015-03-02 00:00:00',1,'Billag',NULL),
	(42,1,1,75,'2015-04-02 00:00:00','2015-04-02 00:00:00',1,'Radikal',NULL),
	(43,2,1,190,'2015-04-02 00:00:00','2015-04-02 00:00:00',1,'Landi',NULL),
	(45,1,1,133,'2015-05-02 00:00:00','2015-05-02 00:00:00',1,'Coop',NULL),
	(46,2,1,154,'2015-05-02 00:00:00','2015-05-02 00:00:00',1,'Migros',NULL),
	(47,3,1,83,'2015-05-02 00:00:00','2015-05-02 00:00:00',1,'Layup',NULL),
	(48,1,1,200,'2015-06-02 00:00:00','2015-06-02 00:00:00',1,'DoIt',NULL),
	(49,2,1,50,'2015-06-02 00:00:00','2015-06-02 00:00:00',1,'Micasa',NULL),
	(50,3,1,100,'2015-06-02 00:00:00','2015-06-02 00:00:00',1,'Migros',NULL),
	(51,1,1,180,'2015-07-02 00:00:00','2015-07-02 00:00:00',1,'Post',NULL),
	(52,2,1,100,'2015-07-02 00:00:00','2015-07-02 00:00:00',1,'Essen',NULL),
	(53,3,2,120,'2015-07-02 00:00:00','2015-07-02 00:00:00',1,'Ikea',NULL),
	(54,1,1,90,'2015-08-02 00:00:00','2015-08-02 00:00:00',1,'Coop',NULL),
	(55,2,1,110,'2015-08-02 00:00:00','2015-08-02 00:00:00',1,'Migros',NULL),
	(56,3,1,50,'2015-08-02 00:00:00','2015-08-02 00:00:00',1,'Markt',NULL),
	(57,1,2,100,'2015-10-02 00:00:00','2015-10-02 00:00:00',1,'Swisscom Rechnung',NULL),
	(58,3,1,48,'2015-09-26 02:45:52','2015-09-26 02:45:52',1,'Post',NULL),
	(59,2,1,40,'2015-09-12 00:00:00','2015-09-12 00:00:00',1,'Denner',NULL),
	(60,3,1,25,'2015-09-05 00:00:00','2015-09-05 00:00:00',1,'Markt',NULL),
	(100,3,1,50,'2015-04-02 00:00:00','2015-04-02 00:00:00',1,'Post',NULL);

/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaction_cycle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction_cycle`;

CREATE TABLE `transaction_cycle` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transaction_cycle` WRITE;
/*!40000 ALTER TABLE `transaction_cycle` DISABLE KEYS */;

INSERT INTO `transaction_cycle` (`id`, `title`)
VALUES
	(1,'Woche'),
	(2,'Monat'),
	(3,'Jahr');

/*!40000 ALTER TABLE `transaction_cycle` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaction_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction_type`;

CREATE TABLE `transaction_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transaction_type` WRITE;
/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;

INSERT INTO `transaction_type` (`id`, `name`)
VALUES
	(1,'instant'),
	(2,'manual'),
	(3,'cyclic');

/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `email`, `password`)
VALUES
	(1,'Christian','chrigu@marx.com','098f6bcd4621d373cade4e832627b4f6'),
	(2,'Beni','beni@marx.com','098f6bcd4621d373cade4e832627b4f6'),
	(3,'Dino','dino@marx.com','098f6bcd4621d373cade4e832627b4f6'),
	(4,'Lara','cindy@gmail.com','098f6bcd4621d373cade4e832627b4f6'),
	(5,'Jan','jan@gmail.com','098f6bcd4621d373cade4e832627b4f6'),
	(6,'Kevin','kevin@gmail.com','098f6bcd4621d373cade4e832627b4f6');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
