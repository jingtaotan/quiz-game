CREATE DATABASE  IF NOT EXISTS `db_quiz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_quiz`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: db_quiz
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
-- Table structure for table `table_question`
--

DROP TABLE IF EXISTS `table_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_difficulty` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer4` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_question`
--

LOCK TABLES `table_question` WRITE;
/*!40000 ALTER TABLE `table_question` DISABLE KEYS */;
INSERT INTO `table_question` VALUES (1,'When is the official Malaysia Independence day?','1','31st August','23-Sep','19-Jul','14-Oct'),(2,'How many states are there in Malaysia?','1','13','14','15','16'),(3,'Who is Malaysia\'s first astronaut?','1','Sheikh Muszaphar Shukor','Muhammed Faris','Anousheh Ansari','Muhammad Abu Bakar'),(4,'Where is Malaysia\'s home stadium?','1','Bukit Jalil National Stadium','KLFA Stadium','MBPJ Stadium','Shah Alam Stadium'),(5,'Which city has the largest population?','2','Tokyo','Shanghai','Jakarta','Berlin'),(6,'When was belgium formed?','2','1830','1850','1825','1839'),(7,'Which of these countries is not a Commonwealth country?','2','Germany','Pakistan','New Zealand','Jamaica'),(8,'When was Germany formed?','2','1871','1850','1889','1859'),(9,'How long is the great wall of china?','2','5500 miles','6100 miles','5600 miles','5700 miles'),(10,'Approximately how many countries are there in Europe?','2','50','70','80','40'),(11,'When was the Euro currency introduced?','2','1999','1997','1990','1995'),(12,'Who was the first president of the United States of America?','2','George Washington','Thomas Jefferson','John Tyler','Franklin Pierce'),(13,'Where is the first McDonald\'s in Malaysia?','2','Jalan Bukit Bintang','Jalan Sultan Ismail','Jalan Masjid India','Jalan Ampang'),(14,'In which year was the Berlin Wall built?','3','1961','1959','1965','1954'),(15,'Which country among the answers has the most public holidays?','3','India','Malaysia','Germany','USA'),(16,'Which of the following is not one of the official language of Belgium?','3','Flemish','Dutch','French','German'),(17,'How tall is Mount Everest?','3','8848 m','9224 m','8722 m','7824 m'),(18,'When was Russia formed?','3','25th December 1991','2nd December 1991','21st December 1991','20th November 1991'),(19,'Arvato comprised of 7 solution groups. Which of the following is not one of the solution groups?','4','Healthcare Solutions','Finance Solutions','IT Solutions','Digital Marketing'),(20,'What is Malaysia\'s International Direct Dial (IDD) country code?','1','60','6','44','1'),(21,'What timezone is Malaysia in?','1','GMT +8','GMT +0','GMT +6','GMT -10'),(22,'What timezone is Japan in?','2','GMT +9','GMT +8','GMT +10','GMT +2'),(23,'What is Singapore\'s International Direct Dial (IDD) country code?','2','65','60','6','55'),(24,'.tv domains are often used for websites related to television, it is the country-level domain of…','2','Tuvalu','Thailand','Tasmania','Vietnam'),(25,'.fm domains are often used for websites related to radio, it is the country-level domain of…','2','Federated States of Micronesia','Finland','Malaysia','Hawaii'),(26,'Which of these countries do not use the dollar as its currency?','2','Vietnam','Singapore','Australia','Brunei'),(27,'What is the capital of Australia?','2','Canberra','Sydney','Melbourne','Perth'),(28,'Which city has the largest tram system in the world?','2','Melbourne','Saint Petersburg','Berlin','Moscow'),(29,'Which country is the city of Timbuktu located in?','2','Mali','Nepal','India','Madagascar'),(30,'Which of these countries does not observe Daylight Saving Time (DST)?','2','China','Germany','United Kingdom','Fiji'),(31,'Where is the Leaning Tower of Pisa?','2','Italy','France','Spain','England'),(32,'Where is the landmark Machu Picchu located?','2','Peru','Chile','Spain','India'),(33,'How long does a flight take from Kuala Lumpur to Melbourne, Australia?','2','8 hours','10 hours','12 hours','6 hours'),(34,'What is the name of Seoul, South Korea\'s international airport?','2','Incheon','Gimpo','Jeju','Busan'),(35,'What is the name of Paris, France\'s main international airport?','3','Charles de Gaulle','Orly','Le Bourget','Heathrow'),(36,'Which of these countries is not an European Union member?','3','Switzerland','France','Bulgaria','Spain'),(37,'In which year were East and West Germany reunified?','3','1990','1992','1988','1985'),(38,'In which German city was Beethoven born?','3','Bonn','Hamburg','Berlin','Cologne'),(39,'Which of these is not a traditional German dish?','3','Fondue','Sauerkraut','Schweinshaxe','Spätzle'),(40,'What is the name of Malaysia\'s national flag?','1','Jalur Gemilang','Jalur Kuning','Jalur Merah','Jalur Biru'),(41,'How many Federal Territories does Malaysia have?','1','3','4','5','2'),(42,'Who is the 1st Prime Minister of Malaysia?','1','Tunku Abdul Rahman','Tun Abdul Razak','Tun Hussein b.Onn','Tunku Abdullah'),(43,'Which is the longest river in Malaysia?','1','Rajang River','Kinabatangan','Amazon','Kelantan River'),(44,'Which of the following is the capital city of India?','1','New Delhi','Bangalore','Chennai','Mumbai'),(45,'In Malaysia, we(arvato) develop the software and systems which form the technology component of arvato’s solutions. Which one of the following technology that we are not specialize in? ','4','PHP Technologies','Java Technologies','Microsoft Technologies','SAP Business Technologies'),(46,'Which of the following European cities is not a national capital?','1','Zurich','Brussels','Viena','Berlin'),(47,'Which is the most populated Asia city?','2','Shanghai, China','Beijing, China','Mumbai, India','Tokyo, Japan'),(48,'Which one of these European countries has the largest area?','2','Ukraine','Sweden','United Kingdom','Switzerland'),(49,'What is the nationality of William Shakespeare?','2','British','French','German','Italian'),(50,'Who is the current CEO of Microsoft?','2','Satya Nadella','Mark Zuckerberg','Steve Jobs','Bill Gates'),(51,'Which eastern European country is the world\'s biggest consumer of beer?','3','Czech Republic','Austria','Germany','Poland'),(52,' Which one of these European countries does not have a border with Germany?','3','Italy','Czech','Denmark','Swiss'),(53,'Which one of these European countries has a coast on the Mediterranean Sea?','3','Croatia','Romania','Macedonia','Viena'),(54,'Which one of these European countries is not member of the European Union (EU)?','3','Norway','Slovenia','Portugal','German'),(55,' Tallin is the capital city of which Eastern European country?','3','Estonia','Latvia','Belarus','Brussels'),(56,'What is the nationality of Mozart?','3','Austrian','Italian','Mexican','British'),(57,'What is the nationality of Karl Max','3','German','Italian','British','Portuguese'),(58,'What year was Twitter founded?','3','2006','2005','2004','2007'),(59,'What is the capital city of Malaysia?','1','Kuala Lumpur','Selangor','Putrajaya','Cyberjaya'),(60,'How many colours are there in Malaysia\'s flag?','1','4','5','6','7'),(61,'What is the largest flower in the Malaysia? ','1','Rafflesia ','Sun Flower','Monasia','Pitcher'),(62,'Which is the highest mountain in West Malaysia?','1','Tahan','Kinabalu','Jerai','Nuang'),(63,'Which one of the following is the longest river in West Malaysia?','1','Pahang','Rajang','Kinabatangan','Perak'),(64,'How many colours are there in Selangor\'s flag?','1','3','4','5','6'),(65,'Which one of these countries are not using the Euro currency?','2','Sweden','Estonia','Italy','Cyprus'),(66,'Which one of these places is not in Germany?','2','Amsterdam','Dortmund','Coburg','Hannover'),(67,'Which one is the longest river in France?','2','Loire','Rhone ','Marne','Garonne'),(68,'Which one of these colours are not in Germany\'s flag?','2','Brown','Red','Black','Yellow'),(69,'What is the capital city of Germany?','2','Berlin','Munich','Frankfurt','Nuremberg'),(70,'Which was the place that was initially erected for Malaya\'s declaration of independence?','1','Stadium Merdeka','Stadium Melaka ','Dataran Merdeka','Dataran Melaka'),(71,'What is the capital city of Brazil?','2','Brasilia','Sao Paulo','Rio de Janeiro','Salvador'),(72,'What is the capital city of Turkey?','2','Ankara','Istanbul','Bursa','Izmir'),(73,'What is the capital city of Switzerland?','2','Bern','Geneva','Basel','Zurich'),(74,'Who was the first man to pee on the Moon?','2','Buzz Aldrin','Neil Armstrong','Pete Conrad','Alan Bean');
/*!40000 ALTER TABLE `table_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_register`
--

DROP TABLE IF EXISTS `table_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_register` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `areaOfInterest` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_register`
--

LOCK TABLES `table_register` WRITE;
/*!40000 ALTER TABLE `table_register` DISABLE KEYS */;
INSERT INTO `table_register` VALUES ('Chris Lim',1,'0154322345','kaiyuan9224@gmail.com',23,'Fresh Graduate','idk','idk','0'),('Chris Lim',2,'0154322345','kaiyuan9224@gmail.com',18,'Fresh Graduate','idk','idk','0'),('Chris Lim',3,'0154322345','kaiyuan9224@gmail.com',18,'Fresh Graduate','sfewwere','dsdfsdf','1');
/*!40000 ALTER TABLE `table_register` ENABLE KEYS */;
UNLOCK TABLES;

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
  `user_phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_score` int(2) NOT NULL,
  `user_time` float NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (3,'TestUser211','kaiyuan9224@gmail.com','0154322345','FBID',42,4.18),(4,'TestUser2','kaiyuan9224@gmail.com','0154322345','FBID1',20,12.2),(5,'TestUser3','kaiyuan9224@gmail.com','0154322345','FBID',3,5),(6,'TestUser4','kaiyuan9224@gmail.com','0154322345','FBID',27,2.96),(7,'TestUser5','kaiyuan9224@gmail.com','0154322345','FBID',20,3.1),(8,'TestUser6','kaiyuan9224@gmail.com','0154322345','FBID',40,3.11),(9,'TestUser7','kaiyuan9224@gmail.com','0154322345','FBID',13,3.5),(10,'TestUser7','kaiyuan9224@gmail.com','0154322345','FBID',23,2.89),(11,'TestUser8','kaiyuan9224@gmail.com','0154322345','FBID',27,4.85),(12,'TestUser9','kaiyuan9224@gmail.com','0154322345','FBID',20,4.03),(13,'TestUser10','kaiyuan9224@gmail.com','0154322345','FBID',63,4.02),(14,'TestUser11','kaiyuan9224@gmail.com','0154322345','FBID',30,3.16),(15,'TestUser12','kaiyuan9224@gmail.com','0154322345','FBID',18,7.51),(16,'TestUser13','kaiyuan9224@gmail.com','0154322345','FBID',13,5.2),(17,'TestUser14','kai','01322332','FBVF',0,30),(18,'TestUser1','kaiyuan9224@gmail.com','0154322345','FBID',34,4.18),(19,'TestUser13','kaiyuan9224@gmail.com','0154322345','FBID',27,9.23),(21,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',100,7.86),(25,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',0,0.71),(26,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',17,0.75),(27,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',50,0.94),(28,'TempUser1','kaiyuan9224@gmail.com','0154322345','142220064954c50f497709d',39,2.22),(29,'TempUser2','kaiyuan9224@gmail.com','0163453234','142220073954c50fa397233',28,2.8),(30,'Chris Lim','','','142225490254c5e33674fc6',6,2.81),(31,'','','','142225576354c5e693ac59e',50,3.62),(32,'Chris Lim','kaiyuan9224@gmail.com','','142225609254c5e7dc469de',28,2.42),(33,'','','','142226656654c610c67b19d',0,2.54),(34,'','','','142226661154c610f3a9fc9',17,2.41),(35,'','','','142226684854c611e038c80',17,2.17),(36,'Chris Lim','kaiyuan9224@gmail.com','','142226796454c6163c415db',17,2.1),(37,'','','','142226797354c6164581f9b',17,2.1),(38,'Chris Lim','kaiyuan9224@gmail.com','','142226815654c616fc7e759',17,2.1),(39,'Chris Lim','kaiyuan9224@gmail.com','','142226816554c6170521773',17,2.1),(40,'','','','142226822054c6173c3dfca',67,3.74),(41,'','','','142226834054c617b48d9e5',17,2.1),(42,'','','','142226854854c61884781ec',17,2.1),(43,'TestUser13','kaiyuan9224@gmail.com','015432234','142226949254c61c340a510',50,2.66),(44,'TempUser1','kaiyuan9224@gmail.com','01543223','142227197254c625e49f3ca',50,2.66),(45,'Chris Lim','kaiyuan9224@gmail.com','0154322345','142227279654c6291c69fb4',50,2.66),(46,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',44,2.86),(47,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865',22,2.34);
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

--
-- Table structure for table `table_user_audit`
--

DROP TABLE IF EXISTS `table_user_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_score` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` float NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user_audit`
--

LOCK TABLES `table_user_audit` WRITE;
/*!40000 ALTER TABLE `table_user_audit` DISABLE KEYS */;
INSERT INTO `table_user_audit` VALUES (1,1,'dummy','dummy','dummy','dummy','22',31,'2015-01-09 08:19:42'),(2,0,'dummy','dummy','dummy','dummy','20',31,'2015-01-09 09:52:14'),(3,0,'','','','','',0,'2015-01-09 09:53:51'),(4,3,'','','','','',0,'2015-01-09 09:56:49'),(5,3,'TestUser1','kaiyuan9224@gmail.com','0154322345','FBID','40',4.18,'2015-01-09 10:01:12'),(6,3,'TestUser1','kaiyuan9224@gmail.com','0154322345','FBID','42',4.18,'2015-01-15 09:55:55'),(7,4,'TestUser2','kaiyuan9224@gmail.com','0154322345','FBID1','22',3.05,'2015-01-15 09:58:36'),(8,4,'TestUser2','kaiyuan9224@gmail.com','0154322345','FBID1','30',40,'2015-01-15 10:14:25'),(9,5,'TestUser3','kaiyuan9224@gmail.com','0154322345','FBID','0',5,'2015-01-16 09:40:40'),(10,20,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865','0',2.51,'2015-01-21 01:23:49'),(11,20,'Chris Lim','kaiyuan9224@gmail.com','0154322345','999474276733865','33',24.91,'2015-01-21 01:42:32'),(12,19,'TestUser13','kaiyuan9224@gmail.com','0154322345','','27',9.23,'2015-01-21 08:35:02');
/*!40000 ALTER TABLE `table_user_audit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-06  9:20:24
