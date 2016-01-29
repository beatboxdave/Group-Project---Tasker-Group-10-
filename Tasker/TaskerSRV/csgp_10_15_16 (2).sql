-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 11:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csgp_10_15_16`
--
CREATE DATABASE IF NOT EXISTS `csgp_10_15_16` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csgp_10_15_16`;

-- --------------------------------------------------------

--
-- Table structure for table `task_data`
--

DROP TABLE IF EXISTS `task_data`;
CREATE TABLE IF NOT EXISTS `task_data` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `teamMember` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `startDate` date NOT NULL,
  `expEndDate` date NOT NULL,
  `taskElements` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `task_data`
--

TRUNCATE TABLE `task_data`;
-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

DROP TABLE IF EXISTS `team_member`;
CREATE TABLE IF NOT EXISTS `team_member` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `team_member`
--

TRUNCATE TABLE `team_member`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_data`
--
ALTER TABLE `task_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_data`
--
ALTER TABLE `task_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
