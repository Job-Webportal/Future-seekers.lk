-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 03:04 AM
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
  `App_ID` int(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Contact_No` int(10) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Verified` tinyint(1) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Province` varchar(100) DEFAULT NULL,
  `About_me` varchar(255) DEFAULT NULL,
  `Graduated` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `Emp_ID` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_email` varchar(120) NOT NULL,
  `com_password` varchar(120) NOT NULL,
  `com_bsn` varchar(255) NOT NULL,
  `com_web` varchar(255) DEFAULT NULL,
  `com_tel` int(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Verified` tinyint(1) DEFAULT NULL,
  `com_logo` varchar(255) DEFAULT NULL,
  `company_picture` varchar(200) DEFAULT NULL,
  `HR_Admin` varchar(255) DEFAULT NULL,
  `com_desc` varchar(255) DEFAULT NULL,
  `com_service` varchar(255) DEFAULT NULL,
  `com_size` int(255) DEFAULT NULL,
  `com_type` varchar(255) DEFAULT NULL,
  `com_model` varchar(255) DEFAULT NULL,
  `com_employ` varchar(255) DEFAULT NULL,
  `founded` int(5) DEFAULT NULL,
  `vision` varchar(255) DEFAULT NULL,
  `mission` varchar(255) DEFAULT NULL,
  `hr_position` varchar(255) DEFAULT NULL,
  `hr_mail` varchar(255) DEFAULT NULL,
  `hr_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`Emp_ID`, `com_name`, `com_email`, `com_password`, `com_bsn`, `com_web`, `com_tel`, `location`, `created_at`, `Verified`, `com_logo`, `company_picture`, `HR_Admin`, `com_desc`, `com_service`, `com_size`, `com_type`, `com_model`, `com_employ`, `founded`, `vision`, `mission`, `hr_position`, `hr_mail`, `hr_picture`) VALUES
(1, 'Aston Martin', 'aston@works.com', '$2y$10$T22QZRWlByyjSaAD6XnY4uigqmURgxCC1Z2UHLn5Dxd.7eTFGteza', '7-89-A', '', 112345678, '', '2021-12-02 14:14:30', 1, '', '', 'Cooper Amilly', '', '', 0, 'Automobile industry', 'None', '', 0, '', '', '', '', '');

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
(7, 'aston@works.com', '$2y$10$T22QZRWlByyjSaAD6XnY4uigqmURgxCC1Z2UHLn5Dxd.7eTFGteza', 1, 'Employer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`App_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Contact_No` (`Contact_No`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`Emp_ID`),
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
  MODIFY `App_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
