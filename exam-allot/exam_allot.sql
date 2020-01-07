-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 04:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_allot`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dhead` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptname`, `dhead`) VALUES
('cs', 'BA Patil');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `usn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE `examdate` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `subcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sem` int(20) NOT NULL,
  `scheme` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`date`, `time`, `subcode`, `sem`, `scheme`) VALUES
('2018-11-21', '09:00:00', '15cs01', 5, 15),
('2018-11-21', '13:00:00', '15cs02', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `examhall`
--

CREATE TABLE `examhall` (
  `hallno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `block` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noofseats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `examhall`
--

INSERT INTO `examhall` (`hallno`, `block`, `noofseats`) VALUES
('MB001', 'A', 30),
('MB002', 'B', 30);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `deptname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phno` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `mname`, `lname`, `deptname`, `email`, `phno`) VALUES
('cs01', 'anita', 'm', 's', 'cs', 'cs01@gmail.com', '987654321'),
('cs02', 'adarsh', 'a', 'b', 'cs', 'cs02@gmail.com', '9876543212');

-- --------------------------------------------------------

--
-- Table structure for table `facultyhallallot`
--

CREATE TABLE `facultyhallallot` (
  `hallno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fid` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sem` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phno` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `fname`, `mname`, `lname`, `sem`, `email`, `phno`) VALUES
('2kl16cs666', 'ashutosh', 'ashok', 'jadhav', '5', 'ashutoshjadhav661@gmail.com', '9960998766'),
('2kl16cs017', 'charudatt', 'p', 'dhamnekar', '5', 'charudatt4945@gmail.com', '6369790999');

-- --------------------------------------------------------

--
-- Table structure for table `studenthallallot`
--

CREATE TABLE `studenthallallot` (
  `subcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hallno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `block` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `usnfrom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usnto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fid` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptname`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`usn`,`subcode`),
  ADD KEY `subcode` (`subcode`);

--
-- Indexes for table `examdate`
--
ALTER TABLE `examdate`
  ADD PRIMARY KEY (`subcode`);

--
-- Indexes for table `examhall`
--
ALTER TABLE `examhall`
  ADD PRIMARY KEY (`hallno`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`,`email`),
  ADD KEY `deptname` (`deptname`);

--
-- Indexes for table `facultyhallallot`
--
ALTER TABLE `facultyhallallot`
  ADD PRIMARY KEY (`hallno`,`fid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `subcode` (`subcode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`,`email`);

--
-- Indexes for table `studenthallallot`
--
ALTER TABLE `studenthallallot`
  ADD PRIMARY KEY (`hallno`,`usnfrom`,`usnto`,`fid`),
  ADD KEY `subcode` (`subcode`),
  ADD KEY `usnfrom` (`usnfrom`),
  ADD KEY `usnto` (`usnto`),
  ADD KEY `fid` (`fid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`subcode`) REFERENCES `examdate` (`subcode`),
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`deptname`) REFERENCES `department` (`deptname`);

--
-- Constraints for table `facultyhallallot`
--
ALTER TABLE `facultyhallallot`
  ADD CONSTRAINT `facultyhallallot_ibfk_1` FOREIGN KEY (`hallno`) REFERENCES `examhall` (`hallno`),
  ADD CONSTRAINT `facultyhallallot_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `facultyhallallot_ibfk_3` FOREIGN KEY (`subcode`) REFERENCES `examdate` (`subcode`);

--
-- Constraints for table `studenthallallot`
--
ALTER TABLE `studenthallallot`
  ADD CONSTRAINT `studenthallallot_ibfk_1` FOREIGN KEY (`subcode`) REFERENCES `examdate` (`subcode`),
  ADD CONSTRAINT `studenthallallot_ibfk_2` FOREIGN KEY (`usnfrom`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `studenthallallot_ibfk_3` FOREIGN KEY (`usnto`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `studenthallallot_ibfk_4` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `studenthallallot_ibfk_5` FOREIGN KEY (`hallno`) REFERENCES `examhall` (`hallno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
