-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2015 at 06:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bibliogarphy-shyam`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `OwnerEmail` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`ID`, `OwnerEmail`, `DisplayName`) VALUES
(2, 'abhirathore2006@gmail.com', ''),
(4, 'coolasr@gmail.com', ''),
(5, 'coolasr@gmail.com', ''),
(6, 'abhirathore2006@gmail.com', ''),
(7, 'ankurjai1991@gmail.com', ''),
(8, 'ankurjai1991@gmail.com', ''),
(9, 'ankurjai1991@gmail.com', ''),
(10, 'ankurjai1991@gmail.com', ''),
(11, 'ankurjai1991@gmail.com', ''),
(12, 'ankurjai1991@gmail.com', ''),
(13, '123@gmai.com', ''),
(14, '123@gmai.com', ''),
(18, 'shyam@gmail.com', 'Trash'),
(19, 'shyam@gmail.com', 'Unfiled'),
(20, 'shyam@gmail.com', 'fhsj'),
(21, 'abc123@gmail.com', 'Trash'),
(22, 'abc123@gmail.com', 'Unfiled'),
(23, 'abc123@gmail.com', 'abc'),
(24, 'abc123@gmail.com', 'ami');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Author` varchar(100) NOT NULL,
  `Abstract` varchar(200) NOT NULL,
  `PDF` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Annote` varchar(200) NOT NULL,
  `BookTitle` varchar(100) NOT NULL,
  `Chapter` varchar(10) NOT NULL,
  `CrossReference` varchar(100) NOT NULL,
  `Edition` int(6) NOT NULL,
  `E-Print` varchar(40) NOT NULL,
  `HowPublished` varchar(100) NOT NULL,
  `Institution` varchar(200) NOT NULL,
  `Journal` varchar(100) NOT NULL,
  `BibTeXKey` varchar(100) NOT NULL,
  `PublishMonth` varchar(20) NOT NULL,
  `Note` tinytext NOT NULL,
  `IssueNumber` varchar(40) NOT NULL,
  `Organisation` varchar(200) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `School` varchar(200) NOT NULL,
  `Series` varchar(100) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Publish Type` varchar(100) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `Volume` varchar(40) NOT NULL,
  `Year` year(4) NOT NULL,
  `AddedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SharedLibraryID` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`ID`, `Author`, `Abstract`, `PDF`, `Address`, `Annote`, `BookTitle`, `Chapter`, `CrossReference`, `Edition`, `E-Print`, `HowPublished`, `Institution`, `Journal`, `BibTeXKey`, `PublishMonth`, `Note`, `IssueNumber`, `Organisation`, `Pages`, `Publisher`, `School`, `Series`, `Title`, `Publish Type`, `URL`, `Volume`, `Year`, `AddedAt`, `SharedLibraryID`) VALUES
(3, 'abhi1', 'dsfjfkj', 'djvs', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'hey', '', 'cvkcx', '', 1980, '2015-12-17 08:17:35', 5),
(5, 'Abc', 'this is about', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'max', '', 'www.123.com', '', 2012, '2015-12-18 10:45:30', 8),
(7, '', '', 'undefined', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0000, '2015-12-18 12:09:29', 7),
(8, 'djs', 'sff', 'undefined', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '12345', '', 'sff', '', 0000, '2015-12-19 14:00:19', 10),
(12, 'drew', '12345', 'undefined', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'mass', '', '1234', '', 0000, '2015-12-20 12:41:25', 21),
(13, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'messi', '', '', '', 0000, '2015-12-20 14:30:12', 23),
(14, 'hjjk', 'bjk', 'undefined', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'fg', '', 'hjkh', '', 0000, '2015-12-21 17:22:47', 24);

-- --------------------------------------------------------

--
-- Table structure for table `sharedlibrary`
--

CREATE TABLE IF NOT EXISTS `sharedlibrary` (
  `ID` bigint(20) NOT NULL,
  `ShareEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sharedlibrary`
--

INSERT INTO `sharedlibrary` (`ID`, `ShareEmail`) VALUES
(2, 'coolasr@gmail.com'),
(5, 'abhirathore2006@gmail.com'),
(7, 'ajcreatingdfutre@gmail.com'),
(23, 'ankurjai1991@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `DisplayName`) VALUES
('12345@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mango'),
('1234@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bhavesh av'),
('123@gmai.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Bhavesh'),
('123@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bhavesh'),
('abc123@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'abc123'),
('abhirathore2006@gmail.com', 'c0f3fc9217bf9ef9ed628c02747bea7b2b3c80e7', 'Abhimanyu'),
('ajcreatingdfutre@gmail.com', '4428eb9fa7c32088c7070702065dd01b1b9b779e', 'asdfg'),
('ankurjai1991@gmail.com', 'b981565350ccaf4ee07388b8c99b61b0ca0a947c', 'Ankur'),
('coolasr@gmail.com', 'c0f3fc9217bf9ef9ed628c02747bea7b2b3c80e7', 'coolasr@gmail.com'),
('shyam@gmail.com', '26c312ddb098d0f2ff20fe35be4c53f9056e348c', 'shyam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
