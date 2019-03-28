-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2018 at 09:34 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parking`
--
CREATE DATABASE IF NOT EXISTS `parking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parking`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `firstname`, `lastname`, `username`, `password`) VALUES
(33232725, 'Festus', 'Mutai', 'admin', 'Tycdxva4');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(20) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(50) NOT NULL,
  `datein` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `dateout` date DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `period` int(20) NOT NULL,
  `idno` int(20) DEFAULT NULL,
  `parkid` varchar(50) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `datetimein` int(20) DEFAULT NULL,
  `datetimeout` int(20) DEFAULT NULL,
  PRIMARY KEY (`bookid`),
  KEY `bookuserfk` (`idno`),
  KEY `bookparkfk` (`parkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `plate_number`, `datein`, `timein`, `dateout`, `timeout`, `period`, `idno`, `parkid`, `amount`, `payment_status`, `datetimein`, `datetimeout`) VALUES
(1, 'KCG188J', '2018-08-07', '14:08:00', '2018-08-07', '17:00:00', 3, 33232725, 'pkl001', 143, 'paid', 1533650880, 1533661200),
(2, 'KCG188J', '2018-08-07', '15:00:00', '2018-08-07', '15:00:00', 0, 33232725, 'pkl001', 0, 'paid', 1533654000, 1533654000),
(3, 'KCG188J', '2018-08-07', '15:00:00', '2018-08-10', '15:00:00', 72, 33232725, 'pkl001', 3600, 'paid', 1533654000, 1533913200),
(4, 'KCG188J', '2018-08-08', '18:35:00', '2018-08-08', '19:00:00', 0, 33232725, 'pkl011', 21, 'paid', 1533753300, 1533754800),
(5, 'KCG188J', '2018-08-08', '19:02:00', '2018-08-08', '20:00:00', 1, 33232725, 'pkl011', 48, 'paid', 1533754920, 1533758400);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cust_view`
--
CREATE TABLE IF NOT EXISTS `cust_view` (
`datein` date
,`dateout` date
,`idno` int(20)
,`bookid` int(20)
,`parkname` varchar(50)
,`timeout` time
,`amount` int(20)
,`payment_status` varchar(50)
,`timein` time
,`datetimeout` int(20)
,`plate_number` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `parkinglot`
--

CREATE TABLE IF NOT EXISTS `parkinglot` (
  `parkid` varchar(20) NOT NULL,
  `parkname` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `openinghours` varchar(50) DEFAULT NULL,
  `capacity` int(20) DEFAULT NULL,
  `fee` int(20) DEFAULT NULL,
  PRIMARY KEY (`parkid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkinglot`
--

INSERT INTO `parkinglot` (`parkid`, `parkname`, `location`, `openinghours`, `capacity`, `fee`) VALUES
('pkl001', 'T-mall Parking Lot', 'Langata road, Mbagati Round about', '0600H-0000H', 0, 50),
('pkl002', 'Harambee Avenue Parking Lot', 'Nairobi CBD', '0600H-0000H', 200, 50),
('pkl003', 'Kencom Parking Lot', 'Nairobi CBD', '0600H-2000H', 250, 30),
('pkl004', 'Hilton Parking Lot', 'Nairobi CBD', '0500H-2200H', 300, 100),
('pkl005', 'Afya Center Parking Lot', 'Nairobi CBD', '0600H-0000H', 350, 50),
('pkl006', 'Odeon Parking Lot', 'Nairobi CBD', '0500H-2300H', 400, 50),
('pkl007', 'Jivanjee Parking Lot', 'Nairobi CBD', '0600H-0000H', 500, 50),
('pkl008', 'Kocha', 'Nairobi CBD', '0600H-0000H', 550, 50),
('pkl009', 'Moi Avenue Parking Lot', 'Nairobi CBD', '0500H-2200H', 600, 50),
('pkl010', 'ArchivesParking Lot', 'Nairobi CBD', '0500H-2300H', 650, 50),
('pkl011', 'Uhuru Park Parking Lot', 'Nairobi CBD', '0600H-0000H', 50, 50),
('pkl012', 'Nyamakima Parking Lot', 'Nairobi CBD', '0500H-2300H', 700, 50),
('pkl013', 'Inter-Continental Parking Lot', 'Nairobi CBD', '0600H-20000H', 750, 100),
('pkl014', 'Railways Parking Lot', 'Nairobi CBD', '0600H-0000H', 800, 50),
('pkl015', 'Bus Station Parking Lot', 'Nairobi CBD', '0500H-2300H', 900, 50),
('pkl016', 'Syokimau Parking Lot', 'Mombasa Road near SGR Terminus', '0500H-2300H', 1000, 50),
('pkl017', 'Nyayo National Stadium Parking Lot', 'Nairobi CBD, Nyayo National Stadium', '0600H-2000H', 640, 50),
('pkl019', 'TRM Parking Lot', 'Thika Road, Roysambu', '0600H-2000H', 560, 50),
('pkl020', 'Unicity Parking Lot', 'Thika Road, Kenyatta University', '0600H-0000H', 50, 500),
('pkl021', 'Garden City Parking Lot ', 'Thika Road, Garden City Mall', '0600H-2000H', 900, 50),
('pkl022', 'Wendani Parking Lot', 'Thika Road, Kahawa Wendani', '0600H-2000H', 300, 50);

-- --------------------------------------------------------

--
-- Table structure for table `parklotmanager`
--

CREATE TABLE IF NOT EXISTS `parklotmanager` (
  `managerid` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `parkid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`managerid`),
  KEY `managerparkfk` (`parkid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parklotmanager`
--

INSERT INTO `parklotmanager` (`managerid`, `firstname`, `lastname`, `parkid`, `username`, `password`, `email`) VALUES
(33232725, 'Chris', 'Kiama', 'pkl011', 'manageruhuru', 'Tycdxva4', 'manageruhuru@uhuru.co.ke');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `idno` int(20) DEFAULT NULL,
  `transactionid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `idno`, `transactionid`) VALUES
(1, 33232725, 'txn001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idno` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `plate_number` varchar(50) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `profile` blob NOT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idno`, `firstname`, `lastname`, `plate_number`, `phone`, `email`, `password`, `profile`) VALUES
(33232725, 'FESTUS', 'KIPKEMOI', 'KCG188J', 704010956, 'KIPKEMOIFESTUS@GMAIL.COM', 'Tycdxva4', 0x63696f2e706e67),
(33232726, 'Chris', 'Kiama', 'KCG188J', 701009576, 'chriskiama@gmail.com', '12345678', '');

-- --------------------------------------------------------

--
-- Structure for view `cust_view`
--
DROP TABLE IF EXISTS `cust_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cust_view` AS select `b`.`datein` AS `datein`,`b`.`dateout` AS `dateout`,`b`.`idno` AS `idno`,`b`.`bookid` AS `bookid`,`p`.`parkname` AS `parkname`,`b`.`timeout` AS `timeout`,`b`.`amount` AS `amount`,`b`.`payment_status` AS `payment_status`,`b`.`timein` AS `timein`,`b`.`datetimeout` AS `datetimeout`,`b`.`plate_number` AS `plate_number` from (`book` `b` join `parkinglot` `p` on((`b`.`parkid` = `p`.`parkid`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `bookparkfk` FOREIGN KEY (`parkid`) REFERENCES `parkinglot` (`parkid`),
  ADD CONSTRAINT `bookuserfk` FOREIGN KEY (`idno`) REFERENCES `user` (`idno`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `parklotmanager`
--
ALTER TABLE `parklotmanager`
  ADD CONSTRAINT `managerparkfk` FOREIGN KEY (`parkid`) REFERENCES `parkinglot` (`parkid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
