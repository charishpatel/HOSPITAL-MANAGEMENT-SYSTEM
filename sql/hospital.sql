-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 06:52 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `desg` varchar(30) NOT NULL,
  `avb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fName`, `desg`, `avb`) VALUES
(1, 'ali', 'mbbs', '11Am-to-3Pm');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `pName` varchar(30) NOT NULL,
  `pAge` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `pName`, `pAge`, `gender`, `mobile`, `address`) VALUES
(9, 'imtiyaz', 22, 'male', '1234567895', 'msk mill'),
(10, 'afzal', 24, 'male', '1475849788', 'KBN hostel'),
(11, 'john', 24, 'male', '1234567895', 'kgb colony'),
(12, 'imtiyaz', 23, 'male', '1234567895', 'msk mill'),
(13, 'imt', 23, 'male', '8971509400', 'raichur');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `pid` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `date`, `pid`) VALUES
(1, '2018-09-28', 9),
(2, '2018-09-28', 10),
(3, '2018-09-29', 11),
(4, '2018-09-29', 12),
(5, '2018-09-29', 11),
(6, '2018-09-30', 12),
(7, '2018-10-01', 13);

-- --------------------------------------------------------

--
-- Table structure for table `receiptitem`
--

CREATE TABLE `receiptitem` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `sname` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiptitem`
--

INSERT INTO `receiptitem` (`id`, `sid`, `sname`, `price`, `rid`, `pid`, `date`) VALUES
(1, 2, 'blood test', 200, 1, 9, '2018-09-28'),
(2, 3, 'urine test', 1000, 1, 9, '2018-09-28'),
(3, 2, 'blood test', 200, 2, 10, '2018-09-28'),
(4, 3, 'urine test', 1000, 2, 10, '2018-09-28'),
(5, 2, 'blood test', 200, 3, 11, '2018-09-29'),
(6, 3, 'urine test', 1000, 3, 11, '2018-09-29'),
(7, 3, 'urine test', 1000, 4, 12, '2018-09-29'),
(8, 5, 'blood test', 700, 4, 12, '2018-09-29'),
(9, 4, 'operation', 6000, 4, 12, '2018-09-29'),
(10, 5, 'blood test', 500, 5, 11, '2018-09-29'),
(11, 4, 'operation', 5000, 5, 11, '2018-09-29'),
(12, 3, 'urine test', 1000, 5, 11, '2018-09-29'),
(13, 4, 'operation', 5000, 6, 12, '2018-09-30'),
(14, 5, 'blood test', 500, 6, 12, '2018-09-30'),
(15, 6, 'teethwash', 500, 7, 13, '2018-10-01'),
(16, 5, 'blood test', 500, 7, 13, '2018-10-01'),
(17, 4, 'operation', 5000, 7, 13, '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(3) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `price` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `sname`, `dept`, `price`) VALUES
(3, 'urine test', 'testing', '2000'),
(4, 'operation', 'opd1', '5000'),
(5, 'blood test', 'testing', '600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiptitem`
--
ALTER TABLE `receiptitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiptItemFK` (`rid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiptitem`
--
ALTER TABLE `receiptitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receiptitem`
--
ALTER TABLE `receiptitem`
  ADD CONSTRAINT `receiptItemFK` FOREIGN KEY (`rid`) REFERENCES `receipt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
