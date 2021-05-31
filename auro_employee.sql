-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:00 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auro_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `auro_education`
--

CREATE TABLE `auro_education` (
  `auro_emp_id` varchar(255) NOT NULL,
  `auro_education` varchar(255) NOT NULL,
  `auro_institute` varchar(255) NOT NULL,
  `auro_pass` varchar(255) NOT NULL,
  `auro_grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auro_emp`
--

CREATE TABLE `auro_emp` (
  `auro_id` varchar(255) NOT NULL,
  `auro_name` varchar(255) NOT NULL,
  `auro_email` varchar(255) NOT NULL,
  `auro_address` text NOT NULL,
  `auro_phone` varchar(19) NOT NULL,
  `auro_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auro_emp`
--
ALTER TABLE `auro_emp`
  ADD PRIMARY KEY (`auro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
