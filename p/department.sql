-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2021 at 09:49 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `department`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `DEPT` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PASSWORD` (`PASSWORD`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USERNAME`, `PASSWORD`, `DEPT`) VALUES
(1, 'user', 'pass', 'Computer Science'),
(2, 'user2', 'passw', 'Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `ID` int(11) NOT NULL,
  `ASSIGNMENT` varchar(50) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `SI` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SI`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`ID`, `ASSIGNMENT`, `DATE`, `SI`) VALUES
(13, 'complete', '13:09:01Aug/10/2021', 1),
(13, 'complete', '15:28:16Aug/11/2021', 2);

-- --------------------------------------------------------

--
-- Table structure for table `codepage`
--

DROP TABLE IF EXISTS `codepage`;
CREATE TABLE IF NOT EXISTS `codepage` (
  `CODE` varchar(6) NOT NULL,
  `SEMESTER` int(2) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SUBJECT` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CODE` (`CODE`),
  KEY `AID` (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codepage`
--

INSERT INTO `codepage` (`CODE`, `SEMESTER`, `YEAR`, `SUBJECT`, `ID`, `AID`) VALUES
('2012TE', 1, 1, 'ENGLISH', 1, 1),
('2312AL', 1, 1, 'MATHS', 2, 1),
('2415DJ', 1, 1, 'DIGITAL', 3, 1),
('2516CP', 2, 1, 'CPP', 4, 1),
('2617OS', 3, 2, 'OS', 5, 1),
('2718DB', 3, 2, 'DBMS', 6, 1),
('2819PH', 4, 2, 'PHP', 7, 1),
('2910LI', 4, 2, 'LINUX', 10, 1),
('2222TE', 2, 1, 'GRAMMAR', 11, 1),
('2222AL', 2, 1, 'MATHS', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(11) NOT NULL,
  `IMAGES` text NOT NULL,
  `UPRN` int(11) NOT NULL,
  `CODE` varchar(10) NOT NULL,
  `SI` int(11) NOT NULL AUTO_INCREMENT,
  `AID` int(11) NOT NULL,
  PRIMARY KEY (`SI`),
  KEY `AID` (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `IMAGES`, `UPRN`, `CODE`, `SI`, `AID`) VALUES
(1, '61141a7a579499.73499141.jfif', 192113118, '2222AL', 42, 1),
(1, '61141a90baea41.68238806.jfif', 192113118, '2222AL', 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `QID` int(11) NOT NULL AUTO_INCREMENT,
  `LINK` varchar(300) NOT NULL,
  `CID` int(11) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  PRIMARY KEY (`QID`),
  KEY `CID` (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QID`, `LINK`, `CID`, `DATE`) VALUES
(6, 'https://docs.google.com/forms/d/e/1FAIpQLScjZR5q6RJB1kd9f1SwQx-wWkC_Eg-MPiIFI_VcGYQIrs8FHQ/viewform?usp=sf_link', 13, '9:23:42/Aug/12/2021');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `UPRN` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SEMESTER` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UPRN` (`UPRN`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`NAME`, `EMAIL`, `UPRN`, `YEAR`, `SEMESTER`, `ID`) VALUES
('Hari', 'hari@gmail.com', 192113118, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL,
  `VIDEO` varchar(100) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SEMESTER` int(11) NOT NULL,
  `SI` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SI`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`ID`, `VIDEO`, `YEAR`, `SEMESTER`, `SI`) VALUES
(13, '61141d2a9e7873.45675863.mp4', 1, 2, 7),
(13, '6114ed93e9f891.63743554.mp4', 1, 2, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `codepage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `codepage`
--
ALTER TABLE `codepage`
  ADD CONSTRAINT `codepage_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `assign` (`SI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `codepage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `codepage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
