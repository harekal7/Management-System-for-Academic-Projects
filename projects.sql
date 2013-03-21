-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 06:00 AM
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
  `info` varchar(1000) NOT NULL,
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

INSERT INTO `project` (`Name`, `id`, `info`, `author`, `guide`, `year`, `PL`, `domain`, `status`) VALUES
('Library Management', 1, 'Library management refers to the issues involved in managing a library. In recent years the conception of a library''s field and functions has grown so rapidly that library administration has become a recognized science with problems vastly broader and deeper and demanding well-equipped professional schools giving systematic instruction to those in whose charge the leading libraries will be placed', 'Sunil Kumar', 'Srikanth H R', 2001, 'HTML, CSS, JavaScrip', 'Web', 1),
('Timetable Generation', 2, 'The Software generates complex time-tables for educational institutions.Very useful for Engineering Colleges , Medical Colleges , Management Institutes & Big educational Institutions where creation of time-tables is an difficult task.', 'Vasudev', 'Sathyam Vellal', 2010, 'Python', 'GUI based Desktop Application', 0),
('Management System for Academic Projects', 3, 'Project management software has a capacity to help plan, organize, and manage resource pools and develop resource estimates. Depending the sophistication of the software, resource including estimation and planning, scheduling, cost control and budget management, resource allocation, collaboration software, communication, decision-making, quality management and documentation or administration systems', 'Somashekhar', 'Phalachandra', 2008, 'HTML5, CSS3, Javascr', 'Web', 1),
('Faculty Adviser Automation', 4, 'The faculty member appointed to provide academic guidance and mentorship to a student through the completion of his or her graduate degree. Adviser and advisor are used interchangeably', 'Shivaraj', 'N S Kumar', 2009, 'Java', 'GUI based Desktop Application', 1),
('Sparse Matrix', 5, 'In the subfield of numerical analysis, a sparse matrix is a matrix populated primarily with zeros as elements of the table. Conceptually, sparsity corresponds to systems which are loosely coupled', 'Niranjan', 'H B Mahesh', 2011, 'C', 'Data-Structures', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usn` varchar(10) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usn`, `passwd`, `usertype`) VALUES
('1pi10cs116', '787c302218a2e9581a917d3d7a7ac368', 'user'),
('1pi10cs115', '47e904d1c52e9eb66f584a17aa0f247f', 'user'),
('1pi10cs105', 'f6c02f372fb1fb4f03f6b54c122de449', 'user'),
('1pi10cs089', 'ec4f2d42f39101b65c43293a4ac0869c', 'user'),
('1pi10cs113', '265e1a8386bfab6432aaf414da94aa3b', 'user'),
('8147555550', 'c9ee7456f835593ff0dbf825fe68b688', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
