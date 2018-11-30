-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 01:30 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookarlogin`
--

CREATE TABLE `bookarlogin` (
  `UserId` varchar(100) NOT NULL,
  `LoginDate` date NOT NULL,
  `LoginTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookarlogin`
--

INSERT INTO `bookarlogin` (`UserId`, `LoginDate`, `LoginTime`) VALUES
('AEnB862656POP-INN', '2018-09-05', '15:44:15'),
('AEnB862656POP-INN', '2018-10-02', '05:20:11'),
('AEnB862656POP-INN', '2018-10-02', '05:47:36'),
('AEnB862656POP-INN', '2018-10-04', '13:35:20'),
('AEnB862656POP-INN', '2018-10-04', '15:01:02'),
('AEnB862656POP-INN', '2018-10-07', '07:58:28'),
('AEnB862656POP-INN', '2018-10-07', '08:23:20'),
('AEnB862656POP-INN', '2018-10-07', '08:24:22'),
('ACxX738909POP-INN', '2018-10-15', '13:11:39'),
('ACxX738909POP-INN', '2018-10-16', '11:30:39'),
('ACxX738909POP-INN', '2018-10-17', '15:48:42'),
('ACxX738909POP-INN', '2018-10-17', '15:56:00'),
('ACxX738909POP-INN', '2018-10-17', '20:05:15'),
('AGnj497207POP-INN', '2018-10-17', '20:07:51'),
('ACxX738909POP-INN', '2018-10-18', '10:48:48'),
('ACxX738909POP-INN', '2018-10-22', '16:24:18'),
('ACxX738909POP-INN', '2018-10-27', '19:54:31'),
('ACxX738909POP-INN', '2018-10-28', '18:59:24'),
('ACxX738909POP-INN', '2018-10-29', '05:00:58'),
('ACxX738909POP-INN', '2018-10-29', '08:37:12'),
('ACxX738909POP-INN', '2018-11-06', '09:12:43'),
('ACxX738909POP-INN', '2018-11-13', '09:08:32'),
('ACxX738909POP-INN', '2018-11-13', '11:09:12'),
('ACxX738909POP-INN', '2018-11-15', '00:57:45'),
('ACxX738909POP-INN', '2018-11-15', '01:09:08'),
('ACxX738909POP-INN', '2018-11-15', '01:25:21'),
('ACxX738909POP-INN', '2018-11-15', '01:35:30'),
('ACxX738909POP-INN', '2018-11-28', '15:04:25'),
('ACxX738909POP-INN', '2018-11-28', '15:13:56'),
('ACxX738909POP-INN', '2018-11-28', '15:23:11'),
('ACxX738909POP-INN', '2018-11-28', '15:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `bookarreg`
--

CREATE TABLE `bookarreg` (
  `UserId` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `ProfilePic` varchar(600) NOT NULL,
  `CoverPic` varchar(600) NOT NULL,
  `OpeningDays` varchar(15) NOT NULL,
  `OpeningTime` time NOT NULL,
  `ClosingTime` time NOT NULL,
  `Email` varchar(250) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegDate` date NOT NULL,
  `RegTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookarreg`
--

INSERT INTO `bookarreg` (`UserId`, `Username`, `UserType`, `ProfilePic`, `CoverPic`, `OpeningDays`, `OpeningTime`, `ClosingTime`, `Email`, `PhoneNo`, `Address`, `City`, `Country`, `Password`, `RegDate`, `RegTime`) VALUES
('ACxX738909POP-INN', 'BOOKAR', 'Admin', 'Uploaded\\Images\\15.jpg', 'Uploaded\\Images\\Banner.jpg', 'Everyday', '08:00:00', '18:00:00', 'ngizee@gmail.com', '254705972361', '23', 'Limuru', 'Kenya', '689f862e4aefa2bc9b673010aedc3d6e', '2018-10-15', '13:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `bookar_store`
--

CREATE TABLE `bookar_store` (
  `Category` varchar(100) NOT NULL,
  `BookarId` varchar(100) NOT NULL,
  `OwnerId` varchar(100) NOT NULL,
  `BookarName` varchar(300) NOT NULL,
  `BookarDesc` varchar(3000) NOT NULL,
  `PicPath` varchar(500) NOT NULL,
  `BookarStock` varchar(15) NOT NULL,
  `BookarSeatsTotal` int(10) NOT NULL,
  `BookarPrice` int(10) UNSIGNED NOT NULL,
  `BookarLocation` varchar(1000) NOT NULL,
  `BookarVacancy` varchar(10) NOT NULL,
  `BookarDate` date NOT NULL,
  `BookarTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookar_store`
--

INSERT INTO `bookar_store` (`Category`, `BookarId`, `OwnerId`, `BookarName`, `BookarDesc`, `PicPath`, `BookarStock`, `BookarSeatsTotal`, `BookarPrice`, `BookarLocation`, `BookarVacancy`, `BookarDate`, `BookarTime`) VALUES
('BMW', '723025AJC', 'ACxX738909POP-INN', 'X5', '4 wheel racer Bima', 'Uploaded\\Images\\mainPage.jpg', '5', 4, 4000, 'Kisumu', 'Vacant', '2018-11-15', '00:59:42'),
('TOYOTA', '682325Ablu', 'ACxX738909POP-INN', 'Beast', '4 wheel drive machine', 'Uploaded\\Images\\Toyota-Car-Free-Download-PNG.png', '5', 4, 2000, 'Nairobi', 'Vacant', '2018-11-13', '09:37:00'),
('NISSAN', '199470AduS', 'ACxX738909POP-INN', 'jim', 'white', 'Uploaded\\Images\\bugatticarsSec-3.png', '1', 5, 3000, 'kitui', 'Vacant', '2018-11-15', '01:40:22'),
('TOYOTA', '247610ABjL', 'ACxX738909POP-INN', 'timer', 'htutr', 'Uploaded\\Images\\rollsroycecarsSec-6.png', '1', 4, 2000, 'nakuru', 'Vacant', '2018-11-15', '01:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `poppinuser`
--

CREATE TABLE `poppinuser` (
  `Name` varchar(255) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegDate` date NOT NULL,
  `RegTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poppin_reg_admin`
--

CREATE TABLE `poppin_reg_admin` (
  `Email` varchar(500) NOT NULL,
  `Unique_Code` varchar(255) NOT NULL,
  `RegDate` date NOT NULL,
  `RegTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poppin_reg_admin`
--

INSERT INTO `poppin_reg_admin` (`Email`, `Unique_Code`, `RegDate`, `RegTime`) VALUES
('ngizee@gmail.com', 'AxHK584797POP-INRSV', '2018-10-15', '12:41:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookarreg`
--
ALTER TABLE `bookarreg`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `bookar_store`
--
ALTER TABLE `bookar_store`
  ADD PRIMARY KEY (`BookarId`);

--
-- Indexes for table `poppin_reg_admin`
--
ALTER TABLE `poppin_reg_admin`
  ADD PRIMARY KEY (`Unique_Code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
