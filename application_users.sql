-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Contact_No` int(10) NOT NULL,
  `Eductaion` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Verified` tinyint(1) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `School` varchar(200) DEFAULT NULL,
  `Grade` varchar(100) DEFAULT NULL,
  `About_me` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `Firstname`, `Lastname`, `password`, `Email`, `Contact_No`, `Eductaion`, `created_at`, `Verified`, `profile_picture`, `School`, `Grade`, `About_me`) VALUES
(9, 'Renesh', 'Benedict', '$2y$10$ESjicJ9PXV0Qp7uHYEwnm.QePFpTZBezm2mahPyXCfOrsgDKAIN26', 'reneshbenedict@gmail.com', 773140722, '', '2021-11-16 15:14:38', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_email` varchar(120) NOT NULL,
  `com_password` varchar(120) NOT NULL,
  `com_bsn` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Verified` tinyint(1) DEFAULT NULL,
  `company_picture` varchar(200) DEFAULT NULL,
  `HR_Admin` varchar(255) DEFAULT NULL,
  `com_desc` varchar(255) DEFAULT NULL,
  `workforce` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `com_name`, `com_email`, `com_password`, `com_bsn`, `created_at`, `Verified`, `company_picture`, `HR_Admin`, `com_desc`, `workforce`) VALUES
(7, 'Bentley Motors', 'bentley@outlook.com', '$2y$10$.BJHJB7SinHDQcYIiuBhFOaFMEyRxuNrJLtmW5.tdxPB4UmulXqlW', 'P-34-I', '2021-11-16 15:38:57', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `verified`, `Type`) VALUES
(1, 'Cleo@Admin.com', 'cleo123', 1, 'Administrator'),
(2, 'Tim@Admin.com', 'tim456', 1, 'Administrator'),
(3, 'Robert@Admin.com', 'robert89', 1, 'Administrator'),
(4, '', '$2y$10$.BJHJB7SinHDQcYIiuBhFOaFMEyRxuNrJLtmW5.tdxPB4UmulXqlW', 0, 'Employer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Contact_No` (`Contact_No`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `com_email` (`com_email`),
  ADD UNIQUE KEY `com_bsn` (`com_bsn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
