-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: us-cdbr-east-06.cleardb.net
-- Generation Time: Dec 29, 2022 at 08:00 PM
-- Server version: 5.6.50-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroku_b47502116c564e0`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `staffID` varchar(50) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`staffID`, `code`, `level`) VALUES
('1217043', 'i7xfz0si', '400'),
('1220016', 'xxrc058w', '300'),
('1220017', 'qxqdczv4', '100'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `staffID` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailverification`
--

INSERT INTO `emailverification` (`staffID`, `email`, `code`) VALUES
('12200164', 'prignhutt@gmail.com', '2m4h'),
('989672', 'agyeiwaah1889@gmail.com', '2zgy');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `staffID` varchar(100) NOT NULL DEFAULT '',
  `passport` text,
  `matricula` text,
  `admission` text,
  `studyLeave` text,
  `masterList` text,
  `ghanaCard` text,
  `ssnitCard` text,
  `voterCard` text,
  `rank1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`staffID`, `passport`, `matricula`, `admission`, `studyLeave`, `masterList`, `ghanaCard`, `ssnitCard`, `voterCard`, `rank1`) VALUES
('1220016', 'file/335204passportx@23uag52_x-@@k31220016myphoto-removebg-preview.png', 'file/588499matriculax@23uag52_x-@@k312200161220016_august_2022_payslip (1).pdf', 'file/467193admissionx@23uag52_x-@@k31220016ict-elective-full.pdf', 'file/208468studyleavex@23uag52_x-@@k31220016css-grid.pdf', 'file/12916masterlistx@23uag52_x-@@k312200161-converted.pdf', 'file/913015ghanacardx@23uag52_x-@@k31220016cs252applets07.pdf', 'file/406062ssnitx@23uag52_x-@@k31220016cs252applets07.pdf', 'not set', 'Senior Superintendent II');

-- --------------------------------------------------------

--
-- Table structure for table `memberbio`
--

CREATE TABLE `memberbio` (
  `staffID` varchar(100) NOT NULL DEFAULT '',
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
  `yearOfAdmission` int(11) DEFAULT NULL,
  `yearOfCompletion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberbio`
--

INSERT INTO `memberbio` (`staffID`, `email`, `mobile`, `ghanaCard`, `fName`, `mName`, `lName`, `regNumber`, `admissionNumber`, `ssnitNumber`, `voterNumber`, `gender`, `studyLeaveStatus`, `level`, `dob`, `course`, `region`, `yearOfAdmission`, `yearOfCompletion`) VALUES
('1217043', 'franval12.fba@gmail.com', '0246143281', 'GHA-717025790-0', 'FRANCIS', '', 'BOACHIE-AGYEMAN', '13876/2016', 'As2045', 'F089108050010', ' ', 'Male', 'Yes', '300', '1989-10-23', 'BSC. INFORMATION TECNOLOGY', 'Ashanti', 2019, 2023),
('1220016', 'prignutt@gmail.com', '0549822202', 'GHA-1000000000-2', 'APPIAH', 'KUBI', 'ENOCH', 'reg11111111111', 'ad888888888888888', 'sniiiiiiiiiiiiiiiiiii', ' ', 'Male', 'Yes', '300', '1989-10-23', 'BSC. INFORMATION TECNOLOGY', 'Bono East', 2019, 2023),
('1228482', 'nanaowusuben@gmail.com', '0243398852', 'GHA-717721193-6', 'BENJAMIN', '', 'OWUSU', '30032/16', '1156471', 'F058408300019', ' ', 'Male', 'Yes', '300', '1986-08-30', 'BSC. INFORMATION TECNOLOGY EDUCATION', 'Ashanti', 2020, 2024),
('5191040357', 'kwakyebernard100@gmail.com', '0553871833', 'GHA-400034666-6', 'BERNARD', '', 'KWAKYE', '0553871833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('656786', 'aggorfrancis22@gmail.com', '0245668202', 'GHA-5655665567-0', 'FRANCIS', 'WORLASI', 'AGGOR', '6482/10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('989672', 'agyeiwaah1889@gmail.com', '0241733418', 'GHA-718809350-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `memberfile`
-- (See below for the actual view)
--
CREATE TABLE `memberfile` (
`staffID` varchar(100)
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
,`yearOfAdmission` int(11)
,`yearOfCompletion` int(11)
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
  `staffID` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberpassword`
--

INSERT INTO `memberpassword` (`staffID`, `username`, `password`) VALUES
('1217043', 'Nana Boachie-Agyeman', '1022c*As'),
('1220016', 'Appiah', 'aaaaa11111@A'),
('1228482', 'Nana Ben', 'NanaBen@52'),
('5191040357', '200011484', 'Brainer@1000'),
('656786', 'Hitler', '2244@Hitler');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `staffID` varchar(100) NOT NULL,
  `vemail` varchar(11) NOT NULL DEFAULT '0',
  `vcode` varchar(11) NOT NULL DEFAULT '0',
  `vmobile` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`staffID`, `vemail`, `vcode`, `vmobile`) VALUES
('1217043', '1', '1', '0'),
('1220016', '1', '1', '0'),
('1228482', '1', '1', '0'),
('5191040357', '1', '0', '0'),
('656786', '1', '0', '0');

-- --------------------------------------------------------

--
-- Structure for view `memberfile`
--
DROP TABLE IF EXISTS `memberfile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bf2517ab3380df`@`%` SQL SECURITY DEFINER VIEW `memberfile`  AS SELECT `memberbio`.`staffID` AS `staffID`, `memberbio`.`email` AS `email`, `memberbio`.`mobile` AS `mobile`, `memberbio`.`ghanaCard` AS `ghanaCard`, `memberbio`.`fName` AS `fName`, `memberbio`.`mName` AS `mName`, `memberbio`.`lName` AS `lName`, `memberbio`.`regNumber` AS `regNumber`, `memberbio`.`admissionNumber` AS `admissionNumber`, `memberbio`.`ssnitNumber` AS `ssnitNumber`, `memberbio`.`voterNumber` AS `voterNumber`, `memberbio`.`gender` AS `gender`, `memberbio`.`studyLeaveStatus` AS `studyLeaveStatus`, `memberbio`.`level` AS `level`, `memberbio`.`dob` AS `dob`, `memberbio`.`course` AS `course`, `memberbio`.`region` AS `region`, `memberbio`.`yearOfAdmission` AS `yearOfAdmission`, `memberbio`.`yearOfCompletion` AS `yearOfCompletion`, `file`.`passport` AS `passport`, `file`.`matricula` AS `matricula`, `file`.`admission` AS `admission`, `file`.`studyLeave` AS `studyLeave`, `file`.`masterList` AS `masterList`, `file`.`ghanaCard` AS `fghanaCard`, `file`.`ssnitCard` AS `ssnitCard`, `file`.`voterCard` AS `voterCard`, `file`.`rank1` AS `rank1` FROM (`memberbio` left join `file` on((`memberbio`.`staffID` = `file`.`staffID`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
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
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fkMemberFile` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memberpassword`
--
ALTER TABLE `memberpassword`
  ADD CONSTRAINT `memberpassword_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verified`
--
ALTER TABLE `verified`
  ADD CONSTRAINT `memberverified` FOREIGN KEY (`staffID`) REFERENCES `memberbio` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
