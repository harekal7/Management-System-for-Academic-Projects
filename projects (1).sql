-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 08:56 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Name` varchar(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `guide` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `PL` varchar(20) NOT NULL,
  `domain` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Name`, `id`, `author`, `guide`, `year`, `PL`, `domain`, `status`) VALUES
('Library Management', 1, 'Sunil Kumar', 'Srikanth H R', 2001, 'HTML, CSS, JavaScrip', 'Web', 0),
('Timetable Generation', 2, 'Vasudev', 'Sathyam Vellal', 2010, 'Python', 'GUI based Desktop Application', 0),
('Management System for Academic Projects', 3, 'Somashekhar', 'Phalachandra', 2008, 'HTML5, CSS3, Javascr', 'Web', 1),
('Faculty Adviser Automation', 4, 'Shivaraj', 'N S Kumar', 2009, 'Java', 'GUI based Desktop Application', 1),
('Sparse Matrix', 5, 'Niranjan', 'H B Mahesh', 2011, 'C', 'Data-Structures', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usn` varchar(10) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usn`, `passwd`, `email`, `usertype`, `DOB`, `gender`, `phone`) VALUES
('1pi10cs116', '787c302218a2e9581a917d3d7a7ac368', '1pi10cs116@gmail.com', 'user', '2013-04-09', 1, '+919445656432'),
('1pi10cs115', '47e904d1c52e9eb66f584a17aa0f247f', '1pi10cs115@yahoo.com', 'user', '2004-06-09', 0, '+919445890876'),
('1pi10cs105', 'f6c02f372fb1fb4f03f6b54c122de449', '1pi10cs105@yahoo.com', 'user', '2003-12-31', 0, '+919445899990'),
('1pi10cs089', 'ec4f2d42f39101b65c43293a4ac0869c', '1pi10cs089@gmail.com', 'user', '2005-03-26', 1, '+919499956432'),
('1pi10cs113', '265e1a8386bfab6432aaf414da94aa3b', '1pi10cs113@gmail.com', 'user', '2004-05-11', 0, '+917769656432'),
('8147555550', 'c9ee7456f835593ff0dbf825fe68b688', 'profbadrip@gmail.com', 'admin', '2003-07-15', 1, '+918147555550');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
