-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2015 at 07:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_quiz`
--
CREATE DATABASE IF NOT EXISTS `db_quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_quiz`;

-- --------------------------------------------------------

--
-- Table structure for table `table_question`
--

DROP TABLE IF EXISTS `table_question`;
CREATE TABLE IF NOT EXISTS `table_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_difficulty` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer4` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
CREATE TABLE IF NOT EXISTS `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_score` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` float NOT NULL,
  `user_contact` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Triggers `table_user`
--
DROP TRIGGER IF EXISTS `table_user_BUPD`;
DELIMITER //
CREATE TRIGGER `table_user_BUPD` BEFORE UPDATE ON `table_user`
 FOR EACH ROW BEGIN
INSERT INTO table_user_audit
VALUES(null,OLD.user_id,OLD.user_name,OLD.user_email,OLD.user_phone,OLD.user_fb,OLD.user_score,OLD.user_time, DEFAULT);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_user_audit`
--

DROP TABLE IF EXISTS `table_user_audit`;
CREATE TABLE IF NOT EXISTS `table_user_audit` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
