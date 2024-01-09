/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.30 : Database - deshbuilers
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`deshbuilers` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `deshbuilers`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('YES','NO') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`phone_number`,`email_verified_at`,`role_id`,`password`,`remember_token`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Admin','admin@gmail.com','01746693552',NULL,1,'$2y$10$dNR6Q4QdbPGdoLgdIfGmOO/qP2PeH577rZaF60U/qIC07bAdAqYvO',NULL,'YES',NULL,1,NULL,'2023-10-01 00:29:14'),
(2,'Md. Ripon Mia','ripon.solutionspin@gmail.com','01746693552',NULL,2,'$2y$10$dNR6Q4QdbPGdoLgdIfGmOO/qP2PeH577rZaF60U/qIC07bAdAqYvO',NULL,'NO',NULL,1,NULL,'2023-10-01 00:30:18');

/*Table structure for table `bank_cashes` */

DROP TABLE IF EXISTS `bank_cashes`;

CREATE TABLE `bank_cashes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `description` text,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` tinyint DEFAULT NULL,
  `updated_by` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `bank_cashes` */

insert  into `bank_cashes`(`id`,`name`,`account_number`,`description`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Bank Asia update','3235326363689','<p>This is description update</p>','YES',1,1,'2024-01-09 18:42:07','2024-01-09 18:42:45');

/*Table structure for table `credit_vouchers` */

DROP TABLE IF EXISTS `credit_vouchers`;

CREATE TABLE `credit_vouchers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `voucher_no` varchar(50) DEFAULT NULL,
  `bank_cash_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `ledger_name_id` int DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `particulars` text,
  `cheque_number` varchar(100) DEFAULT NULL,
  `voucher_date` date DEFAULT NULL,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` tinyint DEFAULT NULL,
  `updated_by` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `credit_vouchers` */

/*Table structure for table `debit_vouchers` */

DROP TABLE IF EXISTS `debit_vouchers`;

CREATE TABLE `debit_vouchers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `voucher_no` varchar(50) DEFAULT NULL,
  `bank_cash_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `ledger_name_id` int DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `particulars` text,
  `voucher_date` date DEFAULT NULL,
  `cheque_number` varchar(100) DEFAULT NULL,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` tinyint DEFAULT NULL,
  `updated_by` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `debit_vouchers` */

/*Table structure for table `ledger_groups` */

DROP TABLE IF EXISTS `ledger_groups`;

CREATE TABLE `ledger_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `ledger_groups` */

insert  into `ledger_groups`(`id`,`name`,`description`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'test','<p>hjj</p>','YES',1,NULL,'2024-01-06 19:12:47','2024-01-06 19:12:47');

/*Table structure for table `ledger_names` */

DROP TABLE IF EXISTS `ledger_names`;

CREATE TABLE `ledger_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ledger_type` int DEFAULT NULL,
  `ledger_group` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `type` enum('DR','CR') DEFAULT NULL,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `ledger_names` */

insert  into `ledger_names`(`id`,`ledger_type`,`ledger_group`,`name`,`unit`,`type`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,1,'Test update','kg update','CR','NO',1,1,'2024-01-06 19:14:06','2024-01-06 19:16:24');

/*Table structure for table `ledger_types` */

DROP TABLE IF EXISTS `ledger_types`;

CREATE TABLE `ledger_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` int DEFAULT NULL,
  `status` enum('YES','NO') DEFAULT 'NO',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `ledger_types` */

insert  into `ledger_types`(`id`,`name`,`code`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Assets update',101,'YES',1,1,'2024-01-06 18:26:24','2024-01-06 18:27:29');

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `launching_date` date DEFAULT NULL,
  `hand_over_date` date DEFAULT NULL,
  `details` text COLLATE utf8mb4_general_ci,
  `status` enum('YES','NO') COLLATE utf8mb4_general_ci DEFAULT 'NO',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `projects` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
