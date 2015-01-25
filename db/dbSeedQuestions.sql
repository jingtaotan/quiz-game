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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_question`
--

LOCK TABLES `table_question` WRITE;
/*!40000 ALTER TABLE `table_question` DISABLE KEYS */;
INSERT INTO `table_question` VALUES (1,'When is the official Malaysia Independence day?','1','31st August','23-Sep','19-Jul','14-Oct'),(2,'How many states are there in Malaysia?','1','13','14','15','16'),(3,'Who is Malaysia\'s first astronaut?','1','Sheikh Muszaphar Shukor','Muhammed Faris','Anousheh Ansari','Muhammad Abu Bakar'),(4,'Where is Malaysia\'s home stadium?','1','Bukit Jalil National Stadium','KLFA Stadium','MBPJ Stadium','Shah Alam Stadium'),(5,'Which city has the largest population?','2','Tokyo','Shanghai','Jakarta','Berlin'),(6,'When was belgium formed?','2','1830','1850','1825','1839'),(7,'Which of these countries is not a Commonwealth country?','2','Germany','Pakistan','New Zealand','Jamaica'),(8,'When was Germany formed?','2','1871','1850','1889','1859'),(9,'How long is the great wall of china?','2','5500 miles','6100 miles','5600 miles','5700 miles'),(10,'Approximately how many countries are there in Europe?','2','50','70','80','40'),(11,'When was the Euro currency introduced?','2','1999','1997','1990','1995'),(12,'Who was the first president of the United States of America?','2','George Washington','Thomas Jefferson','John Tyler','Franklin Pierce'),(13,'Where is the first McDonald\'s in Malaysia?','2','Jalan Bukit Bintang','Jalan Sultan Ismail','Jalan Masjid India','Jalan Ampang'),(14,'In which year was the Berlin Wall built?','3','1961','1959','1965','1954'),(15,'Which country among the answers has the most public holidays?','3','India','Malaysia','Germany','USA'),(16,'Which of the following is not one of the official language of Belgium?','3','Flemish','Dutch','French','German'),(17,'How tall is Mount Everest?','3','8848 m','9224 m','8722 m','7824 m'),(18,'When was Russia formed?','3','25th December 1991','2nd December 1991','21st December 1991','20th November 1991'),(19,'Arvato comprised of 7 solution groups. Which of the following is not one of the solution groups?','4','Healthcare Solutions','Finance Solutions','IT Solutions','Digital Marketing'),(20,'What is Malaysia\'s International Direct Dial (IDD) country code?','1','60','6','44','1'),(21,'What timezone is Malaysia in?','1','GMT +8','GMT +0','GMT +6','GMT -10'),(22,'What timezone is Japan in?','2','GMT +9','GMT +8','GMT +10','GMT +2'),(23,'What is Singapore\'s International Direct Dial (IDD) country code?','2','65','60','6','55'),(26,'Which of these countries do not use the dollar as its currency?','2','Vietnam','Singapore','Australia','Brunei'),(27,'What is the capital of Australia?','2','Canberra','Sydney','Melbourne','Perth'),(28,'Which city has the largest tram system in the world?','2','Melbourne','Saint Petersburg','Berlin','Moscow'),(29,'Which country is the city of Timbuktu located in?','2','Mali','Nepal','India','Madagascar'),(30,'Which of these countries does not observe Daylight Saving Time (DST)?','2','China','Germany','United Kingdom','Fiji'),(31,'Where is the Leaning Tower of Pisa?','2','Italy','France','Spain','England'),(32,'Where is the landmark Machu Picchu located?','2','Peru','Chile','Spain','India'),(33,'How long does a flight take from Kuala Lumpur to Melbourne, Australia?','2','8 hours','10 hours','12 hours','6 hours'),(34,'What is the name of Seoul, South Korea\'s international airport?','2','Incheon','Gimpo','Jeju','Busan'),(35,'What is the name of Paris, France\'s main international airport?','3','Charles de Gaulle','Orly','Le Bourget','Heathrow'),(36,'Which of these countries is not an European Union member?','3','Switzerland','France','Bulgaria','Spain'),(37,'In which year were East and West Germany reunified?','3','1990','1992','1988','1985'),(38,'In which German city was Beethoven born?','3','Bonn','Hamburg','Berlin','Cologne'),(40,'What is the name of Malaysia\'s national flag?','1','Jalur Gemilang','Jalur Kuning','Jalur Merah','Jalur Biru'),(41,'How many Federal Territories does Malaysia have?','1','3','4','5','2'),(42,'Who is the 1st Prime Minister of Malaysia?','1','Tunku Abdul Rahman','Tun Abdul Razak','Tun Hussein b.Onn','Tunku Abdullah'),(43,'Which is the longest river in Malaysia?','1','Rajang River','Kinabatangan','Amazon','Kelantan River'),(44,'Which of the following is the capital city of India?','1','New Delhi','Bangalore','Chennai','Mumbai'),(46,'Which of the following European cities is not a national capital?','1','Zurich','Brussels','Viena','Berlin'),(47,'Which is the most populated Asia city?','2','Shanghai, China','Beijing, China','Mumbai, India','Tokyo, Japan'),(48,'Which one of these European countries has the largest area?','2','Ukraine','Sweden','United Kingdom','Switzerland'),(49,'What is the nationality of William Shakespeare?','2','British','French','German','Italian'),(50,'Who is the current CEO of Microsoft?','2','Satya Nadella','Mark Zuckerberg','Steve Jobs','Bill Gates'),(51,'Which eastern European country is the world\'s biggest consumer of beer?','3','Czech Republic','Austria','Germany','Poland'),(52,' Which one of these European countries does not have a border with Germany?','3','Italy','Czech','Denmark','Swiss'),(53,'Which one of these European countries has a coast on the Mediterranean Sea?','3','Croatia','Romania','Macedonia','Viena'),(54,'Which one of these European countries is not member of the European Union (EU)?','3','Norway','Slovenia','Portugal','German'),(55,' Tallin is the capital city of which Eastern European country?','3','Estonia','Latvia','Belarus','Brussels'),(56,'What is the nationality of Mozart?','3','Austrian','Italian','Mexican','British'),(57,'What is the nationality of Karl Max','3','German','Italian','British','Portuguese'),(58,'What year was Twitter founded?','3','2006','2005','2004','2007'),(59,'What is the capital city of Malaysia?','1','Kuala Lumpur','Selangor','Putrajaya','Cyberjaya'),(60,'How many colours are there in Malaysia\'s flag?','1','4','5','6','7'),(61,'What is the largest flower in the Malaysia? ','1','Rafflesia ','Sun Flower','Monasia','Pitcher'),(62,'Which is the highest mountain in West Malaysia?','1','Tahan','Kinabalu','Jerai','Nuang'),(63,'Which one of the following is the longest river in West Malaysia?','1','Pahang','Rajang','Kinabatangan','Perak'),(64,'How many colours are there in Selangor\'s flag?','1','3','4','5','6'),(65,'Which one of these countries are not using the Euro currency?','2','Sweden','Estonia','Italy','Cyprus'),(66,'Which one of these places is not in Germany?','2','Amsterdam','Dortmund','Coburg','Hannover'),(67,'Which one is the longest river in France?','2','Loire','Rhone ','Marne','Garonne'),(68,'Which one of these colours are not in Germany\'s flag?','2','Brown','Red','Black','Yellow'),(69,'What is the capital city of Germany?','2','Berlin','Munich','Frankfurt','Nuremberg'),(70,'Which was the place that was initially erected for Malaya\'s declaration of independence?','1','Stadium Merdeka','Stadium Melaka ','Dataran Merdeka','Dataran Melaka'),(71,'What is the capital city of Brazil?','2','Brasilia','Sao Paulo','Rio de Janeiro','Salvador'),(72,'What is the capital city of Turkey?','2','Ankara','Istanbul','Bursa','Izmir'),(73,'What is the capital city of Switzerland?','2','Bern','Geneva','Basel','Zurich'),(74,'Who was the first man to pee on the Moon?','2','Buzz Aldrin','Neil Armstrong','Pete Conrad','Alan Bean'),(75,'In Malaysia, we(arvato) develop the software and systems which form the technology component of arvato’s solutions. Which one of the following technology that we are not specialize in? ','4','PHP Technologies','Java Technologies','Microsoft Technologies','SAP Business Technologies');
/*!40000 ALTER TABLE `table_question` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-25 22:49:57
