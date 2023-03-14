-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 11:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `er_cashpowerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashpower`
--

CREATE TABLE `cashpower` (
  `cashID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `seriaNumber` varchar(45) NOT NULL,
  `status` int(2) NOT NULL,
  `dateOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashpower`
--

INSERT INTO `cashpower` (`cashID`, `title`, `seriaNumber`, `status`, `dateOn`) VALUES
(1, 'Nokia p1', 'N001', 1, '2022-12-15'),
(2, 'Nokia', 'N001', 1, '2022-12-15'),
(3, 'Nokia P12', 'N001212', 2, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `cashpowercitizen`
--

CREATE TABLE `cashpowercitizen` (
  `idCC` int(11) NOT NULL,
  `citizenNames` varchar(100) NOT NULL,
  `cashpowerID` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashpowercitizen`
--

INSERT INTO `cashpowercitizen` (`idCC`, `citizenNames`, `cashpowerID`, `date`) VALUES
(1, 'enock-ndagijimana', 3, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblcitizen`
--

CREATE TABLE `tblcitizen` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(18) NOT NULL,
  `cell` varchar(45) NOT NULL,
  `Sector` varchar(45) NOT NULL,
  `ActiveStatus` varchar(11) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcitizen`
--

INSERT INTO `tblcitizen` (`id`, `Firstname`, `Lastname`, `phoneNumber`, `cell`, `Sector`, `ActiveStatus`, `addedDate`) VALUES
(2, 'Alice ', 'umuhoza', '0788515635', 'kabumba', 'bugeshi', '1', '2021-11-22 10:24:16'),
(3, 'nigoote', 'nigoote', '0783982874', 'huye', 'Ruhashya', '1', '2022-11-07 17:40:50'),
(6, 'enock', 'ndagijimana', '0783982872', 'nyagahinga', 'kabutare', '1', '2022-12-14 14:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payrequest`
--

CREATE TABLE `tbl_payrequest` (
  `idP` int(11) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `Transactionref` varchar(200) NOT NULL,
  `TransactionIDMoMo` varchar(255) DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reqUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payrequest`
--

INSERT INTO `tbl_payrequest` (`idP`, `phone`, `amount`, `Transactionref`, `TransactionIDMoMo`, `status`, `date`, `reqUserId`) VALUES
(3, '0783982872', '10', 'ffe037792vcdmx51e8l5h4603qf0064a0996872', NULL, 'pending', '2022-12-15 13:15:51', 6),
(4, '0783982872', '10', 'ffe037792vcdmx51e8l5h4603qf0064a0965913', NULL, 'pending', '2022-12-15 13:16:15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `reqID` int(11) NOT NULL,
  `citizenID` int(11) NOT NULL,
  `sectorIDFromUser` int(11) NOT NULL,
  `LandDocPath` varchar(100) NOT NULL,
  `EUCL_Branch` varchar(45) NOT NULL,
  `addedOn` date NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`reqID`, `citizenID`, `sectorIDFromUser`, `LandDocPath`, `EUCL_Branch`, `addedOn`, `status`) VALUES
(8, 6, 4, 'uploadsF/file_6._.63d3734ee8326.jpg', 'remera', '2023-01-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `usercategory` varchar(18) NOT NULL,
  `phoneNumber` varchar(18) NOT NULL,
  `district` varchar(45) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `names`, `usercategory`, `phoneNumber`, `district`, `sector`, `username`, `password`, `addedDate`, `Status`) VALUES
(1, 'ndagijimana enock', 'admin', '0783982872', 'gasabo', 'rusororo', 'enock', 'enock@123', '2021-10-21 11:45:21', '1'),
(2, 'muzihirwa christophe', 'engineer', '0783982872', 'gasabo', 'rusororo', 'chris', 'chris@123', '2021-10-21 11:56:10', '1'),
(3, 'jmv', 'engineer', '0788515634', 'rubavu', 'bugeshi', 'jmv', 'jmv@123', '2021-11-22 10:11:28', '1'),
(4, 'chantal', 'engineer', '0780156299', 'Huye', 'Ruhashya', 'chan', '123', '2022-10-20 13:41:44', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashpower`
--
ALTER TABLE `cashpower`
  ADD PRIMARY KEY (`cashID`);

--
-- Indexes for table `cashpowercitizen`
--
ALTER TABLE `cashpowercitizen`
  ADD PRIMARY KEY (`idCC`),
  ADD KEY `cashpowerID` (`cashpowerID`);

--
-- Indexes for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payrequest`
--
ALTER TABLE `tbl_payrequest`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `reqUserId` (`reqUserId`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`reqID`),
  ADD KEY `citizenID` (`citizenID`),
  ADD KEY `sectorIDFromUser` (`sectorIDFromUser`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashpower`
--
ALTER TABLE `cashpower`
  MODIFY `cashID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashpowercitizen`
--
ALTER TABLE `cashpowercitizen`
  MODIFY `idCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_payrequest`
--
ALTER TABLE `tbl_payrequest`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashpowercitizen`
--
ALTER TABLE `cashpowercitizen`
  ADD CONSTRAINT `cashpowercitizen_ibfk_1` FOREIGN KEY (`cashpowerID`) REFERENCES `cashpower` (`cashID`);

--
-- Constraints for table `tbl_payrequest`
--
ALTER TABLE `tbl_payrequest`
  ADD CONSTRAINT `tbl_payrequest_ibfk_1` FOREIGN KEY (`reqUserId`) REFERENCES `tblcitizen` (`id`);

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_1` FOREIGN KEY (`citizenID`) REFERENCES `tblcitizen` (`id`),
  ADD CONSTRAINT `tbl_request_ibfk_2` FOREIGN KEY (`sectorIDFromUser`) REFERENCES `usertbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
