/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.22-MariaDB : Database - eps
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eps` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `eps`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `program_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`program_id`,`event_id`,`email`,`name`,`password`,`country_id`,`city`,`street`,`address`,`phone_no`,`image`,`created_at`,`updated_at`) values (1,NULL,NULL,'hafiz@gmail.com','test','2222222','1','Dhaka','Moghbazar','21/2 , new eskaton road Moghbazar','01777439292','../Image/1688407001900.jpg','2023-07-03 17:48:02','2023-07-03 17:56:41');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `programId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDate` date NOT NULL,
  `donationStartDate` date NOT NULL,
  `donationClosingDate` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `events` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (38,'2014_10_12_000000_create_users_table',1),(39,'2014_10_12_100000_create_password_resets_table',1),(40,'2019_08_19_000000_create_failed_jobs_table',1),(41,'2019_12_14_000001_create_personal_access_tokens_table',1),(42,'2023_06_19_184110_create_admins_table',1),(43,'2023_06_21_174949_program',1),(44,'2023_06_21_175426_program_event',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `programs` */

/*Table structure for table `ref_country` */

DROP TABLE IF EXISTS `ref_country`;

CREATE TABLE `ref_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_country` */

insert  into `ref_country`(`id`,`name`) values (1,'Afghanistan'),(2,'Albania'),(3,'Algeria'),(4,'Andorra'),(5,'Angola'),(6,'Antigua and Barbuda'),(7,'Argentina'),(8,'Armenia'),(9,'Australia'),(10,'Austria'),(11,'Azerbaijan'),(12,'Bahamas'),(13,'Bahrain'),(14,'Bangladesh'),(15,'Barbados'),(16,'Belarus'),(17,'Belgium'),(18,'Belize'),(19,'Benin'),(20,'Bhutan'),(21,'Bolivia'),(22,'Bosnia and Herzegovina'),(23,'Botswana'),(24,'Brazil'),(25,'Brunei'),(26,'Bulgaria'),(27,'Burkina Faso'),(28,'Burundi'),(29,'Cabo Verde'),(30,'Cambodia'),(31,'Cameroon'),(32,'Canada'),(33,'Central African Republic'),(34,'Chad'),(35,'Chile'),(36,'China'),(37,'Colombia'),(38,'Comoros'),(39,'Congo'),(40,'Costa Rica'),(41,'Croatia'),(42,'Cuba'),(43,'Cyprus'),(44,'Czech Republic'),(45,'Denmark'),(46,'Djibouti'),(47,'Dominica'),(48,'Dominican Republic'),(49,'East Timor'),(50,'Ecuador'),(51,'Egypt'),(52,'El Salvador'),(53,'Equatorial Guinea'),(54,'Eritrea'),(55,'Estonia'),(56,'Eswatini'),(57,'Ethiopia'),(58,'Fiji'),(59,'Finland'),(60,'France'),(61,'Gabon'),(62,'Gambia'),(63,'Georgia'),(64,'Germany'),(65,'Ghana'),(66,'Greece'),(67,'Grenada'),(68,'Guatemala'),(69,'Guinea'),(70,'Guinea-Bissau'),(71,'Guyana'),(72,'Haiti'),(73,'Honduras'),(74,'Hungary'),(75,'Iceland'),(76,'India'),(77,'Indonesia'),(78,'Iran'),(79,'Iraq'),(80,'Ireland'),(81,'Israel'),(82,'Italy'),(83,'Jamaica'),(84,'Japan'),(85,'Jordan'),(86,'Kazakhstan'),(87,'Kenya'),(88,'Kiribati'),(89,'Korea, North'),(90,'Korea, South'),(91,'Kosovo'),(92,'Kuwait'),(93,'Kyrgyzstan'),(94,'Laos'),(95,'Latvia'),(96,'Lebanon'),(97,'Lesotho'),(98,'Liberia'),(99,'Libya'),(100,'Liechtenstein'),(101,'Lithuania'),(102,'Luxembourg'),(103,'Madagascar'),(104,'Malawi'),(105,'Malaysia'),(106,'Maldives'),(107,'Mali'),(108,'Malta'),(109,'Marshall Islands'),(110,'Mauritania'),(111,'Mauritius'),(112,'Mexico'),(113,'Micronesia'),(114,'Moldova'),(115,'Monaco'),(116,'Mongolia'),(117,'Montenegro'),(118,'Morocco'),(119,'Mozambique'),(120,'Myanmar'),(121,'Namibia'),(122,'Nauru'),(123,'Nepal'),(124,'Netherlands'),(125,'New Zealand'),(126,'Nicaragua'),(127,'Niger'),(128,'Nigeria'),(129,'North Macedonia'),(130,'Norway'),(131,'Oman'),(132,'Pakistan'),(133,'Palau'),(134,'Panama'),(135,'Papua New Guinea'),(136,'Paraguay'),(137,'Peru'),(138,'Philippines'),(139,'Poland'),(140,'Portugal'),(141,'Qatar'),(142,'Romania'),(143,'Russia'),(144,'Rwanda'),(145,'Saint Kitts and Nevis'),(146,'Saint Lucia'),(147,'Saint Vincent and the Grenadines'),(148,'Samoa'),(149,'San Marino'),(150,'Sao Tome and Principe'),(151,'Saudi Arabia'),(152,'Senegal'),(153,'Serbia'),(154,'Seychelles'),(155,'Sierra Leone'),(156,'Singapore'),(157,'Slovakia'),(158,'Slovenia'),(159,'Solomon Islands'),(160,'Somalia'),(161,'South Africa'),(162,'South Sudan'),(163,'Spain'),(164,'Sri Lanka'),(165,'Sudan'),(166,'Suriname'),(167,'Sweden'),(168,'Switzerland'),(169,'Syria'),(170,'Taiwan'),(171,'Tajikistan'),(172,'Tanzania'),(173,'Thailand'),(174,'Togo'),(175,'Tonga'),(176,'Trinidad and Tobago'),(177,'Tunisia'),(178,'Turkey'),(179,'Turkmenistan'),(180,'Tuvalu'),(181,'Uganda'),(182,'Ukraine'),(183,'United Arab Emirates'),(184,'United Kingdom'),(185,'United States'),(186,'Uruguay'),(187,'Uzbekistan'),(188,'Vanuatu'),(189,'Vatican City'),(190,'Venezuela'),(191,'Vietnam'),(192,'Yemen'),(193,'Zambia'),(194,'Zimbabwe');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
