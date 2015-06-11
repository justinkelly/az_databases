-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- Host: mysql-pri.cc.swin.edu.au:3306
-- Generation Time: May 15, 2015 at 02:10 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `az_area`
--

CREATE TABLE IF NOT EXISTS `az_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `az_database`
--

CREATE TABLE IF NOT EXISTS `az_database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `time` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `alt_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `az_database_area`
--

CREATE TABLE IF NOT EXISTS `az_database_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `database_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `database_id_index` (`database_id`),
  KEY `area_id_idnex` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `az_database_subject`
--

CREATE TABLE IF NOT EXISTS `az_database_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `database_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `database_area_id_index` (`database_id`),
  KEY `subject_id_index` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `az_subject`
--

CREATE TABLE IF NOT EXISTS `az_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `az_aubject_area_index` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `az_database_area`
--
ALTER TABLE `az_database_area`
  ADD CONSTRAINT `az_database_area_database_area` FOREIGN KEY (`area_id`) REFERENCES `az_area` (`id`),
  ADD CONSTRAINT `az_database_area_database_constraint` FOREIGN KEY (`database_id`) REFERENCES `az_database` (`id`);

--
-- Constraints for table `az_database_subject`
--
ALTER TABLE `az_database_subject`
  ADD CONSTRAINT `az_database_subject_subject_constraint` FOREIGN KEY (`subject_id`) REFERENCES `az_subject` (`id`),
  ADD CONSTRAINT `az_database_subject_database_constraint` FOREIGN KEY (`database_id`) REFERENCES `az_database` (`id`);

--
-- Constraints for table `az_subject`
--
ALTER TABLE `az_subject`
  ADD CONSTRAINT `az_subject_area_contraint` FOREIGN KEY (`area_id`) REFERENCES `az_area` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
