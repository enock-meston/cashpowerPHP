-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 10:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashpowerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `paymenttbl`
--

CREATE TABLE `paymenttbl` (
  `payid` int(11) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `citizenPhoneNumber` varchar(11) NOT NULL,
  `Datetopay` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenttbl`
--

INSERT INTO `paymenttbl` (`payid`, `amount`, `citizenPhoneNumber`, `Datetopay`, `status`) VALUES
(8, '100', '0783657753', '2022-09-20 10:20:38', 1),
(9, '100', '0780339074', '2022-09-20 10:30:38', 1),
(10, '100', '0788625244', '2022-09-29 13:58:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcitizen`
--

CREATE TABLE `tblcitizen` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(18) NOT NULL,
  `UPI` varchar(200) NOT NULL,
  `EUCL_Branch` varchar(45) NOT NULL,
  `cell` varchar(45) NOT NULL,
  `Sector` varchar(45) NOT NULL,
  `ActiveStatus` varchar(11) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcitizen`
--

INSERT INTO `tblcitizen` (`id`, `Firstname`, `Lastname`, `phoneNumber`, `UPI`, `EUCL_Branch`, `cell`, `Sector`, `ActiveStatus`, `addedDate`) VALUES
(5, 'masengesho', 'clemence ', '0783657753', 'uploadsF/file_masengesho.jpg', 'Kigali ', 'gisozi ', 'nyamirambo ', '2', '2022-09-20 10:10:24'),
(6, 'kwizera', 'remy', '0780339074', 'uploadsF/file_kwizera.jpg', 'Kigali ', 'nyarugenge ', 'nyamirambo ', '2', '2022-09-20 10:28:36'),
(7, 'havugimana ', 'Francois', '0788625244', 'uploadsF/file_havugimana .jpg', 'Kigali ', 'nyarugenge ', 'nyamirambo', '2', '2022-09-29 13:57:22'),
(8, 'kwizera', 'remy', '078339074', 'uploadsF/file_kwizera.jpg', 'Kigali ', 'nyarugenge ', 'nyamirambo ', '2', '2022-09-30 09:47:02');

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
(1, 'Havugimana Remy', 'admin', '0780339074', 'nyarugenge', 'nyamirambo', 'remy', 'remy@123', '2022-09-19 08:25:35', '1'),
(3, 'kwizera', 'engineer', '0780339074', 'nyarugenge', 'nyamirambo', 'kwizera', 'kwizera@123', '2022-09-20 08:51:27', '1'),
(4, 'masengesho clemence aimee', 'admin', '0783657753', 'nyarugenge', 'nyamirambo', 'clemence', 'clemence8430', '2022-09-19 13:01:21', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
