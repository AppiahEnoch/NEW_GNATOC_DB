-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: containers-us-west-98.railway.app:6385
-- Generation Time: Jan 12, 2023 at 06:09 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `staffID` varchar(50) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`staffID`, `code`, `level`) VALUES
('1217043', 'i7xfz0si', '400'),
('1220016', 'f9ghjzt', '400'),
('1220017', 'xgksbnk', '300'),
('1228482', '788poyrr', '3'),
('656786', 'eiiv02d7', '400'),
('989672', 'sa43fmr5', '300');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course` text,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course`, `code`) VALUES
('BSC. INFORMATION TECNOLOGY', ''),
('BSC. ENGLISH EDUCATION', ''),
('BSC. ACCOUNTING', '');

-- --------------------------------------------------------

--
-- Table structure for table `emailverification`
--

CREATE TABLE `emailverification` (
  `staffID` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emailverification`
--

INSERT INTO `emailverification` (`staffID`, `email`, `code`) VALUES
('1220016', 'prignutt@gmail.com', '6475'),
('1220017', 'trolligold@gmail.com', 'zrb696f');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `staffID` varchar(50) NOT NULL DEFAULT '0',
  `passport` text,
  `matricula` text,
  `admission` text,
  `studyLeave` text,
  `masterList` text,
  `ghanaCard` text,
  `ssnitCard` text,
  `voterCard` text,
  `rank1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`staffID`, `passport`, `matricula`, `admission`, `studyLeave`, `masterList`, `ghanaCard`, `ssnitCard`, `voterCard`, `rank1`) VALUES
('1220016', 'file/256042passportx@23uag52_x-@@k31220016farmer.png', 'file/836640matriculax@23uag52_x-@@k31220016gggggg.pdf', 'file/31401admissionx@23uag52_x-@@k31220016gggggg.pdf', 'file/8431621220016receipt-2002-0766.pdf', 'file/427800masterlistx@23uag52_x-@@k31220016gggggg.pdf', 'file/318930ghanacardx@23uag52_x-@@k31220016gggggg.pdf', 'file/1020981220016receipt-2002-0766.pdf', 'not set', 'Senior Superintendent II');

-- --------------------------------------------------------

--
-- Table structure for table `memberbio`
--

CREATE TABLE `memberbio` (
  `staffID` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `ghanaCard` varchar(30) DEFAULT NULL,
  `fName` varchar(50) DEFAULT NULL,
  `mName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL,
  `regNumber` varchar(50) DEFAULT NULL,
  `admissionNumber` varchar(50) DEFAULT NULL,
  `ssnitNumber` varchar(30) DEFAULT NULL,
  `voterNumber` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `studyLeaveStatus` varchar(4) DEFAULT NULL,
  `level` varchar(4) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `course` text,
  `region` varchar(20) DEFAULT NULL,
  `yearOfAdmission` int DEFAULT NULL,
  `yearOfCompletion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `memberbio`
--

INSERT INTO `memberbio` (`staffID`, `email`, `mobile`, `ghanaCard`, `fName`, `mName`, `lName`, `regNumber`, `admissionNumber`, `ssnitNumber`, `voterNumber`, `gender`, `studyLeaveStatus`, `level`, `dob`, `course`, `region`, `yearOfAdmission`, `yearOfCompletion`) VALUES
('1220016', 'prignutt@gmail.com', '0549822202', 'GHA-1000120', 'APPIAH', 'KUBI', 'ENOCH', 're233333333333333', '355addddddddddd', 'sn333333333333', ' ', 'Female', 'No', '400', '1989-10-23', 'BSC. INFORMATION TECNOLOGY', 'Savannah', 2019, 2023),
('1220017', 'trolligold@gmail.com', '0549822201', 'GHA-1000120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `memberfile`
-- (See below for the actual view)
--
CREATE TABLE `memberfile` (
`staffID` varchar(50)
,`email` varchar(255)
,`mobile` varchar(11)
,`ghanaCard` varchar(30)
,`fName` varchar(50)
,`mName` varchar(50)
,`lName` varchar(50)
,`regNumber` varchar(50)
,`admissionNumber` varchar(50)
,`ssnitNumber` varchar(30)
,`voterNumber` varchar(30)
,`gender` varchar(10)
,`studyLeaveStatus` varchar(4)
,`level` varchar(4)
,`dob` date
,`course` text
,`region` varchar(20)
,`yearOfAdmission` int
,`yearOfCompletion` int
,`passport` text
,`matricula` text
,`admission` text
,`studyLeave` text
,`masterList` text
,`fghanaCard` text
,`ssnitCard` text
,`voterCard` text
,`rank1` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `memberpassword`
--

CREATE TABLE `memberpassword` (
  `staffID` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `memberpassword`
--

INSERT INTO `memberpassword` (`staffID`, `username`, `password`) VALUES
('1220016', 'appiah', 'aaaaa11111@A');

-- --------------------------------------------------------

--
-- Table structure for table `sysadmin`
--

CREATE TABLE `sysadmin` (
  `staffID` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sysadmin`
--

INSERT INTO `sysadmin` (`staffID`, `username`, `password`, `email`, `mobile`) VALUES
('000000', 'admin', '000', 'prignutt@gmail.com', '0549822202');

-- --------------------------------------------------------

--
-- Table structure for table `verified`
--

CREATE TABLE `verified` (
  `staffID` varchar(50) NOT NULL,
  `vemail` varchar(11) NOT NULL DEFAULT '0',
  `vcode` varchar(11) NOT NULL DEFAULT '0',
  `vmobile` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`staffID`, `vemail`, `vcode`, `vmobile`) VALUES
('1220016', '1', '1', '0');

-- --------------------------------------------------------

--
-- Structure for view `memberfile`
--
DROP TABLE IF EXISTS `memberfile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `memberfile`  AS SELECT `memberbio`.`staffID` AS `staffID`, `memberbio`.`email` AS `email`, `memberbio`.`mobile` AS `mobile`, `memberbio`.`ghanaCard` AS `ghanaCard`, `memberbio`.`fName` AS `fName`, `memberbio`.`mName` AS `mName`, `memberbio`.`lName` AS `lName`, `memberbio`.`regNumber` AS `regNumber`, `memberbio`.`admissionNumber` AS `admissionNumber`, `memberbio`.`ssnitNumber` AS `ssnitNumber`, `memberbio`.`voterNumber` AS `voterNumber`, `memberbio`.`gender` AS `gender`, `memberbio`.`studyLeaveStatus` AS `studyLeaveStatus`, `memberbio`.`level` AS `level`, `memberbio`.`dob` AS `dob`, `memberbio`.`course` AS `course`, `memberbio`.`region` AS `region`, `memberbio`.`yearOfAdmission` AS `yearOfAdmission`, `memberbio`.`yearOfCompletion` AS `yearOfCompletion`, `file`.`passport` AS `passport`, `file`.`matricula` AS `matricula`, `file`.`admission` AS `admission`, `file`.`studyLeave` AS `studyLeave`, `file`.`masterList` AS `masterList`, `file`.`ghanaCard` AS `fghanaCard`, `file`.`ssnitCard` AS `ssnitCard`, `file`.`voterCard` AS `voterCard`, `file`.`rank1` AS `rank1` FROM (`memberbio` left join `file` on((`memberbio`.`staffID` = `file`.`staffID`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `emailverification`
--
ALTER TABLE `emailverification`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `memberbio`
--
ALTER TABLE `memberbio`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `memberpassword`
--
ALTER TABLE `memberpassword`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `verified`
--
ALTER TABLE `verified`
  ADD PRIMARY KEY (`staffID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emailverification`
--
ALTER TABLE `emailverification`
  ADD CONSTRAINT `fkmemberEmail` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fkeMemberFile` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memberpassword`
--
ALTER TABLE `memberpassword`
  ADD CONSTRAINT `fkMemberPassword` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verified`
--
ALTER TABLE `verified`
  ADD CONSTRAINT `fkmemberverify` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
