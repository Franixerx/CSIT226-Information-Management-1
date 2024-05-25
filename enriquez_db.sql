-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 08:51 AM
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
-- Database: `enriquez_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `AmenityID` varchar(15) NOT NULL,
  `AmenityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dorm`
--

CREATE TABLE `dorm` (
  `DormID` varchar(15) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Barangay` varchar(50) NOT NULL,
  `City` varchar(5) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `ZIP code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dorm_amenity`
--

CREATE TABLE `dorm_amenity` (
  `dormID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `Landlord` varchar(50) NOT NULL,
  `contactPerson` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` varchar(15) NOT NULL,
  `Availability` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Capacity` varchar(50) NOT NULL,
  `Occupancy` varchar(50) NOT NULL,
  `dormID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `TenantID` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` varchar(11) NOT NULL,
  `dateStarted` varchar(11) NOT NULL,
  `dateEnded` varchar(11) NOT NULL,
  `Deposit` varchar(11) NOT NULL,
  `TenantID` varchar(11) NOT NULL,
  `roomID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `UserID` varchar(10) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UserID`, `Password`, `phoneNumber`, `Email`, `Role`) VALUES
('19-0105-16', 'wachichaw', '09217011868', 'enriquezpiolo45@gmail.com', 'tenant'),
('19-1203-23', 'wachaweq', '0192391824', 'darwin@cit.edu', 'tenant'),
('20-0108-12', 'nrqzwat', '09217011845', 'piolonrqz@cit.edu', 'landlord'),
('20-8116-39', 'wadasdasd', '09123123', 'jerjen@cit.edu', 'tenant'),
('22-1233-10', 'wasjduihfjh', '91831209873', 'luis@cit.edu', 'tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`AmenityID`);

--
-- Indexes for table `dorm`
--
ALTER TABLE `dorm`
  ADD PRIMARY KEY (`DormID`);

--
-- Indexes for table `dorm_amenity`
--
ALTER TABLE `dorm_amenity`
  ADD PRIMARY KEY (`dormID`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`Landlord`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `dormID` (`dormID`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`TenantID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `TenantID` (`TenantID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`dormID`) REFERENCES `dorm_amenity` (`dormID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `tenants` (`TenantID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`RoomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
