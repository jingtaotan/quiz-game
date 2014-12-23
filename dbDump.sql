-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2014 at 04:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

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

CREATE TABLE IF NOT EXISTS `table_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_difficulty` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_answer4` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `table_question`
--

INSERT INTO `table_question` (`question_id`, `question_description`, `question_difficulty`, `question_answer1`, `question_answer2`, `question_answer3`, `question_answer4`) VALUES
(1, 'What is the tallest building in Malaysia?', '1', 'KL Tower', 'Highland Tower', 'Tall Tower', 'Another Tower'),
(2, 'What is my name?', '1', 'Chris', 'anon', 'anon', 'anon'),
(3, 'rrere', '1', 'fgdfg', 'dsdf', 'fgdfg', 'fgdfg'),
(4, 'fgdfg', '1', 'fgdfg', 'fgdfg', 'fgdfg', 'fgdfg'),
(5, 'fgdfgree', '1', 'fgdfgree', 'fgdfgree', 'fgdfgree', 'fgdfgree'),
(6, 'fgdfgree', '1', 'fgdfgree', 'fgdfgree', 'fgdfgree', 'fgdfgree');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE IF NOT EXISTS `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_score` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` float NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
