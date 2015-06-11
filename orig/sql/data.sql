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

--
-- Dumping data for table `az_area`
--

INSERT INTO `az_area` (`id`, `name`) VALUES
(1, 'Arts and Social Sciences'),
(2, 'Aviation'),
(3, 'Business and Management'),
(4, 'Design'),
(5, 'Digital Media'),
(6, 'Engineering'),
(7, 'English Language and Study Skills'),
(8, 'Environment and Land Management'),
(9, 'Film and Television'),
(10, 'Health Sciences'),
(11, 'Information and Communication Technologies'),
(12, 'Media and Communications'),
(13, 'Performing and Creative Arts'),
(14, 'Psychology'),
(15, 'Science'),
(16, 'Trades and Apprenticeships');

--
-- Dumping data for table `az_database`
--

INSERT INTO `az_database` (`id`, `name`, `description`, `time`, `url`, `alt_url`) VALUES
(1, 'Proquest European Business\r\n', 'This database contains the latest European business and financial information. Includes quality resources such as The Economist, Fortune and European Business Journal.', '2002-', 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205', NULL),
(2, 'Business & Company ASAP', 'Business and trade journals, newspapers and company directory profiles with full text and images. Subjects include companies, markets and industries, market trends, mergers and acquisitions, management theory and company overviews.', '1999-', 'http://ezproxy.lib.swin.edu.au/login?url=http://find.galegroup.com/menu/start?userGroupName=swinburne1&prod=BCPM', NULL);

--
-- Dumping data for table `az_database_area`
--

INSERT INTO `az_database_area` (`id`, `database_id`, `area_id`) VALUES
(1, 1, 2),
(2, 1, 2);

--
-- Dumping data for table `az_database_subject`
--

INSERT INTO `az_database_subject` (`id`, `database_id`, `subject_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 5),
(4, 2, 7);

--
-- Dumping data for table `az_subject`
--

INSERT INTO `az_subject` (`id`, `area_id`, `name`) VALUES
(1, 2, 'Accounting'),
(2, 2, 'Advertising'),
(3, 2, 'Banking and Finance'),
(4, 2, 'Business and Management'),
(5, 2, 'Human Resource management'),
(6, 2, 'International Business'),
(7, 2, 'Marketing'),
(8, 2, 'Public Relations'),
(9, 2, 'Tourism');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
