-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 09:58 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_march`
--

CREATE TABLE `tbl_march` (
  `userid` int(11) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `ito` varchar(255) NOT NULL,
  `iby` varchar(255) NOT NULL,
  `ie` varchar(255) NOT NULL,
  `idate` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_march`
--

INSERT INTO `tbl_march` (`userid`, `uemail`, `upass`, `ito`, `iby`, `ie`, `idate`, `fname`, `lname`, `address`, `contact`, `picture`, `gender`) VALUES
(201510839, 'tian@gmail.com', '12345', 'Juan Dela Cruz', 'Christian Daniel D. Henry', 'issuer@example.com', '03-15-2019 09:56:29 pm', 'Christian Daniel', 'Henry', '#0139 Sto. Tomas Subic, Zambales', '09060878388', 'avatar.jpg', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_march`
--
ALTER TABLE `tbl_march`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_march`
--
ALTER TABLE `tbl_march`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201510840;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
