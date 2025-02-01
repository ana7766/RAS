-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 19786159222, 'test1@mailinator.com', '21232f297a57a5a743894a0e4a801fc3', '2025-01-01 06:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `CreationDate`) VALUES
(1, 'Cetvorotockas', '2024-05-03 11:06:50'),
(2, 'Dvotockas', '2024-05-03 11:06:50'),
(4, 'Biciklo', '2024-05-03 11:06:50'),
(6, 'Elektricno Vozilo', '2024-08-16 06:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblregusers`
--

CREATE TABLE `tblregusers` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblregusers`
--

INSERT INTO `tblregusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(2, 'Jane', 'Doe', 1234567890, 'user@mailinator.com', 'f925916e2754e5e03f75dd58a5733251', '2025-01-02 19:05:56'),
(3, 'Georgina', 'Smith', 1234567895, 'tesss@mailinator.com', '2168ad5e463d9accb215edaafa31c8d9', '2025-01-03 19:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, '125061388', 'Elektricno Vozilo', 'Tata Nexon', 'DL8CAS1234', 'Jane Doe', 1234567890, '2025-01-16 07:42:36', '2025-01-31 15:34:09', '50', 'NA', 'Out'),
(2, '787303637', 'Dvotockas', 'Honda Actvia', 'UP81AN4851', 'Jane Doe', 1234567890, '2025-01-16 07:42:36', '2025-01-31 15:34:17', '20', 'NA', 'Out'),
(3, '901288727', 'Cetvorotockas', 'Hyundai i10', 'Dl6CAs1234', 'Jane Doe', 1234567890, '2025-01-16 07:42:36', '2025-01-31 15:34:21', '30', 'NA', 'Out');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` int(11) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `humidity` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `city`, `temperature`, `description`, `humidity`, `time`) VALUES
(1, 'Belgrade', 279.45, 'clear sky', 77, '2025-01-26 21:33:15'),
(2, 'Belgrade', 286.05, 'heavy intensity rain', 69, '2025-01-28 23:14:14'),
(3, 'Belgrade', 286.05, 'heavy intensity rain', 69, '2025-01-28 23:14:15'),
(4, 'Belgrade', 286.42, 'heavy intensity rain', 70, '2025-01-28 23:14:19'),
(5, 'Belgrade', 286.42, 'heavy intensity rain', 70, '2025-01-28 23:14:28'),
(6, 'Belgrade', 286.42, 'heavy intensity rain', 70, '2025-01-28 23:14:36'),
(7, 'Belgrade', 12.9, 'heavy intensity rain', 69, '2025-01-28 23:17:55'),
(8, 'Belgrade', 12.9, 'heavy intensity rain', 69, '2025-01-28 23:17:58'),
(9, 'Belgrade', 12.9, 'heavy intensity rain', 68, '2025-01-28 23:20:07'),
(10, 'Belgrade', 12.9, 'heavy intensity rain', 68, '2025-01-28 23:20:09'),
(11, 'Belgrade', 12.9, 'heavy intensity rain', 68, '2025-01-28 23:20:10'),
(12, 'Belgrade', 12.9, 'heavy intensity rain', 68, '2025-01-28 23:20:16'),
(13, 'Belgrade', 12.9, 'heavy intensity rain', 68, '2025-01-28 23:20:16'),
(14, 'Belgrade', 13.27, 'kiša jakog intenziteta', 69, '2025-01-28 23:21:11'),
(15, 'Belgrade', 13.27, 'kiša jakog intenziteta', 69, '2025-01-28 23:21:13'),
(16, 'Belgrade', 13.27, 'kiša jakog intenziteta', 69, '2025-01-28 23:22:26'),
(17, 'Belgrade', 13.27, 'kiša jakog intenziteta', 69, '2025-01-28 23:22:41'),
(18, 'Bijeljina', 13.78, 'umjerena kiša', 84, '2025-01-28 23:37:47'),
(19, 'Bijeljina', 13.78, 'umjerena kiša', 84, '2025-01-28 23:37:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VehicleCat` (`VehicleCat`);

--
-- Indexes for table `tblregusers`
--
ALTER TABLE `tblregusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MobileNumber` (`MobileNumber`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblregusers`
--
ALTER TABLE `tblregusers`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
