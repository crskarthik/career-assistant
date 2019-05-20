-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 11:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scsvmv_placement_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE IF NOT EXISTS `placement` (
`SNO` int(100) NOT NULL,
  `COMPANY_NAME` varchar(300) NOT NULL,
  `JOB_DESCRIPTION` varchar(500) NOT NULL,
  `OFF_ON` int(10) NOT NULL,
  `10_PERCENT` varchar(50) NOT NULL,
  `12_PERCENT` varchar(50) NOT NULL,
  `ARREAR_COUNT` varchar(10) NOT NULL,
  `STANDING_COUNT` varchar(10) NOT NULL,
  `CSE` int(10) NOT NULL,
  `ECE` int(10) NOT NULL,
  `EEE` int(10) NOT NULL,
  `CIVIL_SE` int(10) NOT NULL,
  `EIE` int(10) NOT NULL,
  `IT` int(10) NOT NULL,
  `MECH` int(10) NOT NULL,
  `BCA` int(10) NOT NULL,
  `DATE` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`SNO`, `COMPANY_NAME`, `JOB_DESCRIPTION`, `OFF_ON`, `10_PERCENT`, `12_PERCENT`, `ARREAR_COUNT`, `STANDING_COUNT`, `CSE`, `ECE`, `EEE`, `CIVIL_SE`, `EIE`, `IT`, `MECH`, `BCA`, `DATE`) VALUES
(1, 'CSC', 'S/W ENGINEER', 1, '60', '70', '2', '1', 1, 0, 0, 0, 0, 1, 0, 1, '2015-01-23'),
(2, 'CTS', 'TESTER', 0, '60', '74', '1', '2', 1, 1, 1, 0, 0, 1, 0, 1, '2015-01-30'),
(3, 'TCS', 'DEVELOPER', 1, '60', '70', '1', '1', 1, 1, 1, 1, 1, 1, 1, 0, '2015-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `stu_login`
--

CREATE TABLE IF NOT EXISTS `stu_login` (
`SNO` int(100) NOT NULL,
  `UNAME` varchar(10) NOT NULL,
  `UPASS` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stu_login`
--

INSERT INTO `stu_login` (`SNO`, `UNAME`, `UPASS`) VALUES
(1, 'test', 'test'),
(2, '11119A000', '11119A000');

-- --------------------------------------------------------

--
-- Table structure for table `ug`
--

CREATE TABLE IF NOT EXISTS `ug` (
`SNO` int(10) NOT NULL,
  `REGNO` varchar(10) NOT NULL,
  `COURSE` varchar(20) NOT NULL,
  `SPECIALIZATION` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `FATHER_NAME` varchar(50) NOT NULL,
  `FATHER_OCCUPATION` varchar(100) NOT NULL,
  `MOTHER_NAME` varchar(50) NOT NULL,
  `MOTHER_OCCUPATION` varchar(100) NOT NULL,
  `ADDRESS1` varchar(500) NOT NULL,
  `ADDRESS2` varchar(500) NOT NULL,
  `STATE` varchar(40) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MOBILE` varchar(15) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `10_PERCENT` varchar(10) NOT NULL,
  `10_SCHOOL_NAME` varchar(100) NOT NULL,
  `10_BOARD` varchar(100) NOT NULL,
  `10_YOP` varchar(10) NOT NULL,
  `12_PERCENT` varchar(10) NOT NULL,
  `12_SCHOOL_NAME` varchar(100) NOT NULL,
  `12_BOARD` varchar(100) NOT NULL,
  `12_YOP` varchar(10) NOT NULL,
  `12_STREAM` varchar(20) NOT NULL,
  `DIP_PERCENT` varchar(10) NOT NULL,
  `DIP_YOP` varchar(10) NOT NULL,
  `ARREARS_HISTORY` varchar(10) NOT NULL,
  `STANDING_ARREARS` varchar(10) NOT NULL,
  `CGPA_SEM_1&2` varchar(10) NOT NULL,
  `CGPA_SEM_3` varchar(10) NOT NULL,
  `CGPA_SEM_4` varchar(10) NOT NULL,
  `CGPA_SEM_5` varchar(10) NOT NULL,
  `CGPA_SEM_6` varchar(10) NOT NULL,
  `CGPA_SEM_7` varchar(10) NOT NULL,
  `CGPA_SEM_8` varchar(10) NOT NULL,
  `CGPA_TILL` varchar(10) NOT NULL,
  `GAP_IN_YEAR` varchar(10) NOT NULL,
  `ADMISSION_YEAR` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ug`
--

INSERT INTO `ug` (`SNO`, `REGNO`, `COURSE`, `SPECIALIZATION`, `NAME`, `FATHER_NAME`, `FATHER_OCCUPATION`, `MOTHER_NAME`, `MOTHER_OCCUPATION`, `ADDRESS1`, `ADDRESS2`, `STATE`, `DOB`, `GENDER`, `EMAIL`, `MOBILE`, `PHONE`, `10_PERCENT`, `10_SCHOOL_NAME`, `10_BOARD`, `10_YOP`, `12_PERCENT`, `12_SCHOOL_NAME`, `12_BOARD`, `12_YOP`, `12_STREAM`, `DIP_PERCENT`, `DIP_YOP`, `ARREARS_HISTORY`, `STANDING_ARREARS`, `CGPA_SEM_1&2`, `CGPA_SEM_3`, `CGPA_SEM_4`, `CGPA_SEM_5`, `CGPA_SEM_6`, `CGPA_SEM_7`, `CGPA_SEM_8`, `CGPA_TILL`, `GAP_IN_YEAR`, `ADMISSION_YEAR`) VALUES
(1, '11119A000', 'B.E', 'BCA', 'TESTING', 'TEST_FATHER', 'TEST_FATHER_OFFICE', 'TEST_MOTHER', 'TEST_MOTHER_OFFICE', 'TEST_ADDRESS_1', 'TEST_ADDRESS_2', 'ANDHRA PRADESH', '10/02/1994', 'MALE', 'TEST@TEST.COM', '1234567890', '12345678', '90.2', 'TEST_SCHOOL_NAME_10', 'TEST_BOARD_NAME_10', '2009', '89.4', 'TEST_SCHOOL_NAME_12', 'TEST_BOARD_NAME_12', '2011', 'M.P.C', '', '', '1', '2', '7.8', '8', '8.34', '8.95', '8.23', '8.2', '', '8.34', '0', '2011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
 ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `stu_login`
--
ALTER TABLE `stu_login`
 ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `ug`
--
ALTER TABLE `ug`
 ADD PRIMARY KEY (`SNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stu_login`
--
ALTER TABLE `stu_login`
MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ug`
--
ALTER TABLE `ug`
MODIFY `SNO` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
