-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: medical_info
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Suger',1,'2020-04-15 00:15:35','2020-03-01 15:23:18'),(2,'Quia minima.',0,'2009-08-23 20:12:15','2002-01-27 13:06:05'),(3,'Quos in.',0,'1972-08-06 15:37:15','1987-12-18 14:57:47'),(4,'Doloribus qui.',4,'2021-04-10 07:28:13','1995-06-15 09:10:43'),(5,'Consequatur.',9,'1980-02-06 23:49:08','1970-08-08 14:30:12'),(6,'Ut doloremque.',5,'2011-03-09 06:08:46','1981-08-22 00:20:51'),(7,'Enim id sit.',7,'2003-06-15 21:56:40','1989-04-20 08:51:37'),(8,'Necessitatibus.',3,'1986-10-09 14:52:34','2010-04-30 18:09:45'),(9,'Totam sed.',2,'2015-03-01 00:50:20','1998-03-21 11:59:38'),(10,'Nemo quo.',6,'2000-11-18 11:52:24','1973-07-06 21:29:58'),(11,'Omnis nihil.',8,'2002-08-02 02:33:33','1989-08-26 21:43:38'),(12,'Numquam est.',4,'1977-08-02 23:19:08','1972-01-19 17:15:22'),(13,'Eum qui qui.',2,'2015-06-26 07:00:47','1982-03-23 04:32:54'),(14,'Dolores dolore.',0,'1970-01-21 14:58:21','2001-06-09 23:05:32'),(15,'Neque.',6,'2002-09-19 23:46:10','1987-12-16 14:17:43'),(16,'Impedit id est.',2,'2007-09-01 06:35:11','2005-02-27 17:01:02'),(17,'Nisi non.',4,'1979-05-22 13:09:52','1984-07-25 09:50:42'),(18,'Dolorem.',8,'1979-07-31 03:10:59','1996-10-23 19:28:45'),(19,'Eum cupiditate.',2,'2022-07-30 00:30:29','1989-12-02 00:52:56'),(20,'Odio quo rerum.',3,'1993-11-29 20:41:05','1978-07-14 22:49:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2023_03_18_195913_create_petient_table',1),(3,'2023_03_18_232248_create_categories_table',1),(4,'2023_03_21_154037_create_users_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_fname` varchar(15) NOT NULL,
  `patient_lname` varchar(15) NOT NULL,
  `patient_dob` datetime DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `patient_gender` int(11) NOT NULL COMMENT '1=>Male.2=>Female',
  `patient_number` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `visited_date` datetime DEFAULT NULL,
  `next_visit_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'suhasini','swamy','2017-03-03 00:00:00',1,1,'1212121212',1,'2023-03-10 00:00:00','2023-03-29 00:00:00','2017-12-07 16:02:11'),(2,'vishal','swamy','2007-12-01 00:00:00',1,1,'6789871234',1,'2023-03-02 00:00:00','2023-03-03 20:18:57','2023-03-20 16:04:37'),(3,'sujata','smy','1995-03-01 00:00:00',1,1,'5645678987',1,'2023-03-17 00:00:00','2023-03-25 00:00:00','2023-03-20 16:10:04'),(4,'savitri','smy','2018-03-01 00:00:00',1,2,'1212121213',0,'2023-03-03 00:00:00','2023-03-24 00:00:00','2023-03-20 16:30:48'),(5,'test','test','2023-03-16 00:00:00',1,2,'1212121214',1,'2023-03-22 00:00:00','2023-03-25 00:00:00','2023-03-22 20:23:21');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(29) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sai','','sai@gmail.com',NULL,'$2y$10$YwlpEUwPSXmCaD5/gUaUceC2jtK3VXbXKXpxcmmQXdxNBXCwGT/r6',NULL,NULL,NULL),(2,'test','','test@gmail.com',NULL,'$2y$10$3PnwiHTHzLbHseqbyK87z.Au3fZ4WsQ.9ZPL/ncMN.w1lK8bGzUJW',NULL,NULL,NULL),(3,'test@gmail.com','','test1@gmail.com',NULL,'$2y$10$6/tG4y6bHPGUPsmvmOWdeek6oJaUFhXfV9DPs0WFK5.hb/cvg65Pi',NULL,NULL,NULL),(5,'savitri','test','test34@gmail.com',NULL,'$2y$10$l323RSZFMpfFcJHO9HfASOUu.3zYHq9lNZCQg.XPqg/7l6pWD5tQC',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_old`
--

DROP TABLE IF EXISTS `users_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_old` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_rpassword` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_old`
--

LOCK TABLES `users_old` WRITE;
/*!40000 ALTER TABLE `users_old` DISABLE KEYS */;
INSERT INTO `users_old` VALUES (1,'test','test','test@gmail.com','1231231231','1231231231',1,'2023-03-20 15:15:13',NULL),(2,'savitri','smy','savitri@gmail.com','1231231231','1231231231',1,'2023-03-20 16:25:04',NULL);
/*!40000 ALTER TABLE `users_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'medical_info'
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getActivePatientData` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getActivePatientData`()
    NO SQL
BEGIN

    SET @query =  'SELECT count(*) as records FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 and  p.is_active=1';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getCategoriesData` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoriesData`()
    NO SQL
BEGIN

SET @query =  'SELECT * FROM `categories` where is_active=1 ';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getInActivePatientData` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInActivePatientData`()
    NO SQL
BEGIN

    SET @query =  'SELECT count(*) as records FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 and  p.is_active=0';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPatientData` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPatientData`()
    NO SQL
BEGIN

SET @query =  'SELECT p.*,TIMESTAMPDIFF(YEAR, p.patient_dob, CURDATE()) AS p_age FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 ';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertPateintDetails` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPateintDetails`(IN `patient_fname` VARCHAR(2050), IN `patient_lname` VARCHAR(2050), IN `patient_dob` VARCHAR(2050), IN `patient_gender` VARCHAR(2050), IN `category_id` VARCHAR(2050), IN `patient_number` VARCHAR(2050))
    NO SQL
BEGIN

SET @v_petient_fname = `patient_fname`;
SET @v_petient_lname=patient_lname;
SET @v_patient_dob=patient_dob;
SET @v_category_id=category_id;
SET @v_patient_gender=patient_gender;
SET @v_patient_number=patient_number;

        INSERT INTO categories (
                                    patient_fname,
                                    patient_lname,
                                    patient_dob,
                                    category_id,
                                    patient_gender,
                                    patient_number,
                                    is_active,
                                    created_at,
                                    updated_at
                                )
                        VALUES (
                                @v_patient_fname,
                                @v_patient_lname,
                                @v_patient_dob,
                                @v_category_id,
                                @v_patient_gender,
                                @v_patient_number,
                                1,
                                CURRENT_TIMESTAMP,
                                NULL
                            );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-23 10:34:28
