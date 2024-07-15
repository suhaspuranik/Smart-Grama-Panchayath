-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 04:14 PM
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
  `relation` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `cname` varchar(50) NOT NULL,
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

INSERT INTO `application` (`userid`, `type`, `apno`, `status`, `comment`, `name`, `lname`, `fname`, `mname`, `religion`, `adhar`, `gender`, `paddress`, `pob`, `btype`, `cod`, `hname`, `cast`, `category`, `income`, `foccupation`, `moccupation`, `relation`, `dname`, `cname`, `pid`, `ctype`, `cfor`, `work`, `iproof`, `hproof`, `aproof`, `dproof`, `dob`, `time`, `dod`) VALUES
(1, 'death', '365055', 'passed to admin', '', '', '', 'cvbnm,', 'cvbnm,', 'Hindu', 0, 'male', '', 'House', '', 'cancer', 'Govt Hospital Udupi', '', '', 0, '', '', '', 'suhas', '', '', '', '', '', 'images/Adhar card.png', '', 'images/hospital.jpg', 'images/Adhar card.png', '2023-06-08', '00:35:00', '2023-06-12'),
(1, 'income', '463105', 'passed to admin', '', 'suhas', 'dsf', 'CVBNM', 'BNM', '', 123456789, '', '', '', '', '', '', 'SDFG', '', 234567, 'GFV', 'CVBN', '', '', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'cast', '479705', 'passed to admin', '', 'suhas', 'puranik', 'ganesh', 'suhas', '', 2147483647, '', '', '', '', '', '', 'brahmin', 'Genaral', 0, '', '', '', '', '', '', '', '', '', 'images/Adhar card.png', '', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL),
(1, 'birth', '514265', 'passed to admin', '', 'suhas', '', 'saiprakash', 'sahitya', 'Hindu', 0, 'male', '', 'Hospital', '', '', 'Govt Hospital Udupi', '', '', 0, '', '', '', '', '', '', '', '', '', 'images/Adhar card.png', 'images/hospital.jpg', 'images/Adrees Proof.jpg', '', '2023-06-09', '00:30:00', NULL),
(1, 'water', '5818960', 'pending', '', '', '', '', '', '', 0, '', 'xcvbn', '', '', '', '', '', '', 0, '', '', '', '', '', '1234567890', 'New Connection', 'Residential', 'nbsxn s', 'images/Adhar card.png', 'images/hospital.jpg', 'images/Adrees Proof.jpg', '', NULL, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `userid` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `comp` varchar(2000) NOT NULL,
  `reply` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elogin`
--

CREATE TABLE `elogin` (
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elogin`
--

INSERT INTO `elogin` (`empid`) VALUES
(7686);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `fname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cnum` varchar(20) NOT NULL,
  `qli` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`fname`, `email`, `cnum`, `qli`, `address`, `day`, `month`, `year`, `gender`, `empid`, `pass`, `status`) VALUES
('Rishabh pant', 'nishanthm808@gmail.com', '7022175944', 'BCA', 'Kotilingeshwara road', 15, 'Jan', 2001, 'male', '', '', 'pending '),
('saiprakash', 'nameisnishanth@gmail.com', '1234567890', 'MCA', 'DURGANUGRAHA\r\nNEAR DURGAPARAMESHWARI MATT', 12, 'Jan', 2000, 'm', '2329', 'saiprakash60', 'approved'),
('suhas', 'suhaspuranik003@gmail.com', '06361452859', 'MCA', 'DURGANUGRAHA\r\nNEAR DURGAPARAMESHWARI MATT', 12, 'Jan', 2003, 'f', '7686', 'suhas85', 'approved');

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
('mahesh', 'nameisnishanth@gmail', '8884114362', 'not so good..');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`) VALUES
('suhas');

-- --------------------------------------------------------

--
-- Table structure for table `villager`
--

CREATE TABLE `villager` (
  `userid` int(11) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cnum` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villager`
--

INSERT INTO `villager` (`userid`, `uname`, `fname`, `gender`, `address`, `pass`, `cpass`, `email`, `cnum`, `dob`) VALUES
(1, 'suhas', 'Suhas Puranik', 'male', 'Durganugra Near Durgaparameshwari Matt Chitrapady-', '1234567890', '1234567890', 'suhaspuranik003@gmail.com', '6361452859', '2003-12-03');

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
