-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: review_control
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT curdate(),
  `fk_subject` int(11) NOT NULL,
  `number_of_review` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (143,'Classes (JS)','2020-10-17 10:00:00',30,6),(166,'import (JS modules)','2020-10-20 05:00:00',30,6),(168,'Classes (TS)','2020-10-30 06:00:00',30,6),(190,'Decorators (TS)','2020-09-06 05:00:00',30,5),(191,'Basic concepts','2020-09-11 05:00:00',30,5),(192,'Introduction to modules','2020-09-15 05:00:00',30,5),(194,'Services and DI','2020-09-03 05:00:00',30,4),(195,'TOH: editor','2020-09-05 05:00:00',30,4),(200,'Test 1','2020-08-27 05:00:00',29,5),(201,'Como quieras hehehe','2020-08-27 05:00:00',29,3),(202,'Test 3','2020-12-14 06:00:00',29,2),(203,'Test 4','2002-08-07 05:00:00',29,0),(204,'Test 5','2020-12-08 06:00:00',29,2),(205,'Test 6','2005-08-08 05:00:00',29,2),(206,'Test 7','2006-08-08 05:00:00',29,2),(207,'Test 8','2003-08-08 05:00:00',29,2),(208,'Test 9','2004-08-08 05:00:00',29,2),(209,'Test 10','2004-08-08 05:00:00',29,2),(212,'Delete','2004-08-08 05:00:00',29,1),(219,'TOH: display a list','2020-09-10 05:00:00',30,4),(220,'TOH: create a feature component','2020-09-12 05:00:00',30,4),(221,'Test 11','2020-08-13 05:00:00',29,0),(222,'Test 12','2020-08-13 05:00:00',29,0),(223,'Test 13','2020-08-13 05:00:00',29,0),(224,'Test 14','2020-08-13 05:00:00',29,0),(225,'Test 15','2020-08-13 05:00:00',31,0),(231,'20','2020-08-13 05:00:00',0,0),(233,'TOH: add services','2020-09-14 05:00:00',30,4),(234,'TOH: routing','2020-08-26 05:00:00',0,0),(235,'TOH: routing','2020-08-26 05:00:00',0,0),(236,'TOH: routing','2020-08-27 05:00:00',0,0),(237,'TOH: routing','2020-09-01 05:00:00',30,2),(238,'Register','2020-08-27 05:00:00',0,0),(239,'Register','2020-08-27 05:00:00',0,0),(240,'Register','2020-08-27 05:00:00',29,0);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER setDefaultDate
    BEFORE INSERT ON review
    FOR EACH ROW
    SET NEW.review_date = ADDDATE(curdate(), INTERVAL 1 DAY) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (29,'New subject',1),(30,'Angular official docs',3),(31,'My subject',1);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `profile_picture` varchar(1024) DEFAULT 'no_picture',
  `password` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','no_picture','admin'),(2,'user','no_picture','user'),(3,'Joe','no_picture','arzeus1998');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-31 17:51:37
