-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 02:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zurni`
--

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `DonatorID` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL,
  `SSN` int(10) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `DonatorPhoneNumber` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donator`
--
ALTER TABLE `donator` ADD `email` INT(30) NOT NULL AFTER `password`;

INSERT INTO `donator` (`DonatorID`, `username`, `password`, `Name`, `Age`, `SSN`, `Address`, `DonatorPhoneNumber`,`shahad@gmail.com`) VALUES
(1, 'shahad', '123456', 'Shahad', 22, 1036859874, 'tameer st, muruj, dist, hhouse no,3', 505462871);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `HospitalD` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `NumberOfWards` int(4) DEFAULT NULL,
  `HPhoneNumber` int(10) DEFAULT NULL,
  `NoOfRooms` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`HospitalD`, `Name`, `Address`, `NumberOfWards`, `HPhoneNumber`, `NoOfRooms`) VALUES
(1, 'dalla', 'riyadh', 10, 920009, 400);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL,
  `RoomNo` int(4) DEFAULT NULL,
  `hAddress` varchar(100) DEFAULT NULL,
  `PatientPhoneNumber` int(10) DEFAULT NULL,
  `RelativesToContact` int(10) DEFAULT NULL,
  `WardID` int(10) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `Name`, `Age`, `RoomNo`, `hAddress`, `PatientPhoneNumber`, `RelativesToContact`, `WardID`, `url`) VALUES
(4, 'Sara', 13, 409, 'riyadh', 55588545, 25745245, 1, 'PatientPage.php');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(10) NOT NULL,
  `patientID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `patientID`) VALUES
(0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `ReqID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `ReqDescription` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `WardID` int(10) NOT NULL,
  `WardName` varchar(30) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`WardID`, `WardName`, `specialization`) VALUES
(1, 'cancer', 'cancer treatment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`DonatorID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `SSN` (`SSN`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HospitalD`),
  ADD UNIQUE KEY `Address` (`Address`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `hAddress` (`hAddress`,`WardID`),
  ADD KEY `WardID` (`WardID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`ReqID`),
  ADD KEY `FK_ReqPatient_PatientID` (`PatientID`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`WardID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `DonatorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `HospitalD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `ReqID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `WardID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`hAddress`) REFERENCES `hospital` (`Address`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`WardID`) REFERENCES `ward` (`WardID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `FK_ReqPatient_PatientID` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
