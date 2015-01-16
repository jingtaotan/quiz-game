CREATE DATABASE  IF NOT EXISTS `db_quiz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_quiz`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: db_quiz
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_score` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` float NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (3,'TestUser211','kaiyuan9224@gmail.com','0154322345','FBID','42',4.18),(4,'TestUser2','kaiyuan9224@gmail.com','0154322345','FBID1','20',12.2),(5,'TestUser3','kaiyuan9224@gmail.com','0154322345','FBID','3',5),(6,'TestUser4','kaiyuan9224@gmail.com','0154322345','FBID','27',2.96),(7,'TestUser5','kaiyuan9224@gmail.com','0154322345','FBID','20',3.1),(8,'TestUser6','kaiyuan9224@gmail.com','0154322345','FBID','40',3.11),(9,'TestUser7','kaiyuan9224@gmail.com','0154322345','FBID','13',3.5),(10,'TestUser7','kaiyuan9224@gmail.com','0154322345','FBID','23',2.89),(11,'TestUser8','kaiyuan9224@gmail.com','0154322345','FBID','27',4.85),(12,'TestUser9','kaiyuan9224@gmail.com','0154322345','FBID','20',4.03),(13,'TestUser10','kaiyuan9224@gmail.com','0154322345','FBID','63',4.02),(14,'TestUser11','kaiyuan9224@gmail.com','0154322345','FBID','30',3.16),(15,'TestUser12','kaiyuan9224@gmail.com','0154322345','FBID','18',7.51),(16,'TestUser13','kaiyuan9224@gmail.com','0154322345','FBID','13',5.2),(17,'TestUser14','kai','01322332','FBVF','0',30),(18,'TestUser1','kaiyuan9224@gmail.com','0154322345','FBID','34',4.18);
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `table_user_BUPD` BEFORE UPDATE ON `table_user` FOR EACH ROW
BEGIN
INSERT INTO table_user_audit
VALUES(null,OLD.user_id,OLD.user_name,OLD.user_email,OLD.user_phone,OLD.user_fb,OLD.user_score,OLD.user_time, DEFAULT);
END */;;
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

-- Dump completed on 2015-01-16 17:45:01
