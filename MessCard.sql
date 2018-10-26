-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2018 at 02:54 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MessCard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `Contractor_ID` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Licence_No` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `due_list`
--

CREATE TABLE `due_list` (
  `Rollno` varchar(12) NOT NULL,
  `Due` float NOT NULL,
  `Amountpaid` float NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `due_list`
--

INSERT INTO `due_list` (`Rollno`, `Due`, `Amountpaid`, `Date`) VALUES
('B160408CS', 500, 500, '2018-10-22'),
('B160475ME', 10000.5, 456.6, '2018-02-21'),
('B160135CS', 0, 100, '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `mess_card`
--

CREATE TABLE `mess_card` (
  `Curr_messcard` varchar(10) NOT NULL,
  `Prev_messcard` varchar(10) DEFAULT NULL,
  `Rollno` varchar(12) NOT NULL,
  `Curr_mess` varchar(15) NOT NULL,
  `Prev_mess` varchar(15) DEFAULT NULL,
  `Month` varchar(15) NOT NULL,
  `Update_mess` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess_card`
--

INSERT INTO `mess_card` (`Curr_messcard`, `Prev_messcard`, `Rollno`, `Curr_mess`, `Prev_mess`, `Month`, `Update_mess`) VALUES
('B160123', 'B160123', 'B160135CS', 'A', 'B', 'June', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mess_info`
--

CREATE TABLE `mess_info` (
  `Mess_ID` varchar(5) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Capacity` int(10) NOT NULL,
  `Contractor_ID` varchar(10) NOT NULL,
  `Remaining` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess_info`
--

INSERT INTO `mess_info` (`Mess_ID`, `Name`, `Type`, `Capacity`, `Contractor_ID`, `Remaining`) VALUES
('1021', 'A', 'Mixed Non-Veg', 350, 'C1001', 210),
('1034', 'B', 'South Non-Veg', 350, '12983', 100);

-- --------------------------------------------------------

--
-- Table structure for table `mess_user`
--

CREATE TABLE `mess_user` (
  `ContractorId` varchar(20) NOT NULL,
  `Password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess_user`
--

INSERT INTO `mess_user` (`ContractorId`, `Password`) VALUES
('C1001', '$2y$10$jbvejGxLOq1W1R20gWkQ9uAeR0ZeFru4mUEfM/YJOxnGaMZeSCey.');

-- --------------------------------------------------------

--
-- Table structure for table `official_info`
--

CREATE TABLE `official_info` (
  `Official_ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `official_user`
--

CREATE TABLE `official_user` (
  `Official_ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `official_user`
--

INSERT INTO `official_user` (`Official_ID`, `Password`) VALUES
('ameen', 'ameen1234'),
('O01', 'ameen123');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Rollno` varchar(12) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Branch` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Programme` varchar(10) NOT NULL,
  `Hostel` varchar(10) NOT NULL,
  `Room` int(5) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Rollno`, `Name`, `Branch`, `DOB`, `Programme`, `Hostel`, `Room`, `Phone`) VALUES
('B160408CS', 'Muhammed Ameen', 'CSE', '1998-01-30', 'B.Tech', 'B', 336, '9048586859'),
('B160135CS', 'SHAJAHAN FARIZ', 'CSE', '1997-11-20', 'B.Tech', 'B', 231, '8547730166');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `Rollno` varchar(12) NOT NULL,
  `Password` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`Rollno`, `Password`) VALUES
('B160135CS', '$2y$10$jbvejGxLOq1W1R20gWkQ9uAeR0ZeFru4mUEfM/YJOxnGaMZeSCey.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`Contractor_ID`);

--
-- Indexes for table `due_list`
--
ALTER TABLE `due_list`
  ADD PRIMARY KEY (`Rollno`);

--
-- Indexes for table `mess_card`
--
ALTER TABLE `mess_card`
  ADD PRIMARY KEY (`Curr_messcard`);

--
-- Indexes for table `mess_info`
--
ALTER TABLE `mess_info`
  ADD PRIMARY KEY (`Mess_ID`);

--
-- Indexes for table `mess_user`
--
ALTER TABLE `mess_user`
  ADD PRIMARY KEY (`ContractorId`);

--
-- Indexes for table `official_info`
--
ALTER TABLE `official_info`
  ADD PRIMARY KEY (`Official_ID`);

--
-- Indexes for table `official_user`
--
ALTER TABLE `official_user`
  ADD PRIMARY KEY (`Official_ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Rollno`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`Rollno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
