-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2023 at 03:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepteduploads`
--

CREATE TABLE `accepteduploads` (
  `nickname` varchar(30) NOT NULL,
  `txtpost` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `data` blob NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminuploads`
--

CREATE TABLE `adminuploads` (
  `nickname` varchar(30) NOT NULL,
  `txtpost` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `data` blob NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


--
-- Table structure for table `signuptable`
--

CREATE TABLE `signuptable` (
  `fullname` varchar(30) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phno` varchar(30) NOT NULL,
  `action` varchar(30) DEFAULT NULL,
  `accesskey` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `proimg` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepteduploads`
--
ALTER TABLE `accepteduploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminuploads`
--
ALTER TABLE `adminuploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepteduploads`
--
ALTER TABLE `accepteduploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminuploads`
--
ALTER TABLE `adminuploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
