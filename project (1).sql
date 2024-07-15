-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 08:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(20) NOT NULL DEFAULT 'admin',
  `pass` varchar(20) NOT NULL DEFAULT 'admin@123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `userid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `apno` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `comment` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `adhar` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pob` varchar(20) NOT NULL,
  `btype` varchar(20) NOT NULL,
  `cod` varchar(50) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `cast` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `income` int(11) NOT NULL,
  `foccupation` varchar(20) NOT NULL,
  `moccupation` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `ctype` varchar(30) NOT NULL,
  `cfor` varchar(30) NOT NULL,
  `work` varchar(50) NOT NULL,
  `iproof` varchar(500) NOT NULL,
  `hproof` varchar(500) NOT NULL,
  `aproof` varchar(500) NOT NULL,
  `dproof` varchar(500) NOT NULL,
  `dob` date DEFAULT NULL,
  `time` time NOT NULL,
  `dod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`userid`, `type`, `apno`, `status`, `comment`, `name`, `lname`, `fname`, `mname`, `religion`, `adhar`, `gender`, `paddress`, `pob`, `btype`, `cod`, `hname`, `cast`, `category`, `income`, `foccupation`, `moccupation`, `dname`, `pid`, `ctype`, `cfor`, `work`, `iproof`, `hproof`, `aproof`, `dproof`, `dob`, `time`, `dod`) VALUES
(1, 'sandya', '217601', 'approved', '', 'suhas', 'puranik', 'Ganesh', 'saroja', '', 2147483647, 'male', '', '', '', '', '', 'brahmin', '', 14000, 'mechanic', '', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', '1963-05-29', '00:00:00', NULL),
(1, 'cast', '305586', 'passed to admin', '', 'suhas', 'puranik', 'ganesh', 'suhas', '', 1234567890, '', '', '', '', '', '', 'brahmin', 'Genaral', 0, '', '', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'water', '3837108', 'pending', '', 'suhas', '', '', '', '', 0, '', 'mangaluru', '', '', '', '', '', '', 0, '', '', '', '88181', 'New Connection', 'Residential', 'NO', 'images/Adhar card.png', 'images/Adrees Proof.jpg', 'images/hospital.jpg', '', NULL, '00:00:00', NULL),
(1, 'income', '657449', 'passed to admin', '', 'suhas', 'puranik', 'ganesh', 'saroja', '', 2147483647, '', '', '', '', '', '', 'brahmin', '', 14000, 'priest', 'housewife', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'birth', '697250', 'pending', '', 'suhas', '', 'Ganesh', 'Saroja', 'Hindu', 0, 'male', '', 'Hospital', '', '', 'Govt Hospital Udupi', '', '', 0, '', '', '', '', '', '', '', 'images/Adhar card.png', 'images/hospital.jpg', 'images/Adrees Proof.jpg', '', '2023-06-21', '23:21:00', NULL),
(1, 'ayush', '777939', 'approved', '', 'suhas', 'puranik', 'ganesh', 'saroja', '', 2147483647, '', '', '', '', '', '', 'brahmin', '', 23000, 'priest', 'housewife', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'building', '779920', 'approved', '', 'Suhas Puranik', '', '', '', '', 2147483647, '', '', '', 'House', '', '', '', 'Construction', 0, '', '', '', '9090', '', '', 'nothing', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'water', '8444499', 'pending', '', 'suhas', '', '', '', '', 0, '', 'kundapur', '', '', '', '', '', '', 0, '', '', '', '123718', 'New Connection', 'Residential', 'no', 'images/Adhar card.png', 'images/hospital.jpg', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `userid` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `comp` varchar(2000) NOT NULL,
  `reply` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`userid`, `email`, `comp`, `reply`, `status`) VALUES
(1, 'suhaspuranik003@gmail.com', 'not good', ' sorry for inconvinience', 'replied'),
(1, 'suhaspuranik003@gmail.com', 'no proper details in income certificate', '', 'pending ');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `fname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `cnum` varchar(20) NOT NULL,
  `qli` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`fname`, `email`, `dob`, `cnum`, `qli`, `address`, `gender`, `empid`, `pass`, `status`) VALUES
('Suhas Puranik', 'saiprakashp960@gmail.com', '2002-11-11', '06361452859', 'MCA', 'Durganugra Near Durgaparameshwari Matt Chitrapady-', 'male', '', '', 'pending '),
('suhas', 'nameisnishanth@gmail.com', '2002-02-02', '6361452859', 'bca', 'kundapur', 'male', '2709', 'suhas29', 'approved'),
('Suhas Puranik', 'suhaspuranik003@gmail.com', '2002-01-01', '06361452859', 'BCA', 'Durganugra Near Durgaparameshwari Matt Chitrapady-', 'male', '8383', 'suhas18', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cnum` varchar(10) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `cnum`, `feedback`) VALUES
('suhas', 'suhaspuranik003@gmai', '0636145285', 'very nice'),
('mahesh', 'nameisnishanth@gmail', '8884114362', 'not so good..'),
('suhas', 'suhaspuranik003@gmai', '0636145285', 'Very nice');

-- --------------------------------------------------------

--
-- Table structure for table `otptable`
--

CREATE TABLE `otptable` (
  `otp` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otptable`
--

INSERT INTO `otptable` (`otp`, `email`) VALUES
('6198', 'suhaspuranik003@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `villager`
--

CREATE TABLE `villager` (
  `uname` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cnum` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villager`
--

INSERT INTO `villager` (`uname`, `fname`, `gender`, `address`, `userid`, `pass`, `cpass`, `email`, `cnum`, `dob`) VALUES
('suhas', 'suhas puranik', 'male', 'Durganugra Near Durgaparameshwari Matt Chitrapady-', 1, 'Suhas@2003', 'Suhas@2003', 'suhaspuranik003@gmail.com', '6361452859', '2003-12-03'),
('suhaso', 'suhas', 'male', 'kundapur', 2, 'Suhas@2003', 'Suhas@2003', 'suhaspuranik@gmail.com', '6361452859', '2002-03-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`apno`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `villager`
--
ALTER TABLE `villager`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `villager`
--
ALTER TABLE `villager`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `villager` (`userid`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `villager` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
