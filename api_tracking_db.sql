-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 08:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_tracking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner_api_logs`
--

CREATE TABLE `tbl_partner_api_logs` (
  `log_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partner_api_logs`
--

INSERT INTO `tbl_partner_api_logs` (`log_id`, `p_id`, `request_date`) VALUES
(1, 1, '2020-10-16 17:35:14'),
(2, 1, '2020-10-16 18:53:54'),
(3, 1, '2020-10-13 18:53:55'),
(4, 1, '2020-10-14 18:53:55'),
(5, 1, '2020-09-30 18:53:56'),
(6, 1, '2020-10-16 18:53:56'),
(7, 1, '2020-10-16 18:53:56'),
(8, 2, '2020-10-16 18:54:06'),
(9, 2, '2020-10-16 18:54:06'),
(10, 2, '2020-10-16 19:03:57'),
(11, 1, '2020-10-16 19:24:08'),
(12, 1, '2020-10-17 05:51:17'),
(13, 1, '2020-10-17 05:51:59'),
(14, 1, '2020-10-17 05:52:13'),
(15, 1, '2020-10-17 05:52:41'),
(16, 1, '2020-10-17 05:53:12'),
(17, 1, '2020-10-17 05:53:34'),
(18, 1, '2020-10-17 05:53:58'),
(19, 1, '2020-10-17 05:54:13'),
(20, 1, '2020-10-17 05:54:21'),
(21, 1, '2020-10-17 05:54:39'),
(22, 1, '2020-10-17 05:54:43'),
(23, 1, '2020-10-17 05:54:44'),
(24, 1, '2020-10-17 05:55:34'),
(25, 1, '2020-10-17 05:55:35'),
(26, 1, '2020-10-17 05:55:35'),
(27, 1, '2020-10-17 05:55:35'),
(28, 1, '2020-10-17 05:55:36'),
(29, 1, '2020-10-17 05:55:36'),
(30, 1, '2020-10-17 05:55:45'),
(31, 1, '2020-10-17 05:55:46'),
(32, 1, '2020-10-17 05:55:46'),
(33, 1, '2020-10-17 05:55:47'),
(34, 1, '2020-10-17 05:55:47'),
(35, 2, '2020-10-17 05:56:14'),
(36, 2, '2020-10-17 05:56:15'),
(37, 2, '2020-10-17 05:56:15'),
(38, 2, '2020-10-17 05:56:15'),
(39, 2, '2020-10-17 05:56:15'),
(40, 2, '2020-10-17 05:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner_details`
--

CREATE TABLE `tbl_partner_details` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_key` varchar(255) NOT NULL,
  `p_email` varchar(255) DEFAULT NULL,
  `p_status` tinyint(2) DEFAULT '0',
  `inserted_date` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partner_details`
--

INSERT INTO `tbl_partner_details` (`p_id`, `p_name`, `p_key`, `p_email`, `p_status`, `inserted_date`, `last_updated`) VALUES
(1, 'Partner A', '9f39be15-7577-480b-939b-e2295e749cec', 'partnera@gmail.com', 1, '2020-10-15 18:30:00', '2020-10-15 18:30:00'),
(2, 'Partner B', '864db7fd-f51f-4e2c-8544-726a11e18ea1', 'partnerb@gmail.com', 1, '2020-10-15 18:30:00', '2020-10-15 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_data`
--

CREATE TABLE `tbl_users_data` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_phone` varchar(100) DEFAULT NULL,
  `u_status` tinyint(2) DEFAULT '0',
  `inserted_date` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_data`
--

INSERT INTO `tbl_users_data` (`u_id`, `u_name`, `u_email`, `u_phone`, `u_status`, `inserted_date`, `last_updated`) VALUES
(1, 'User 1', 'user1@gmail.com', '9876543210', 1, '2020-10-15 18:30:00', '2020-10-16 12:10:21'),
(2, 'User 2', 'user2@gmail.com', '9876543201', 1, '2020-10-15 18:30:00', '2020-10-16 12:10:21'),
(3, 'User 3', 'user3@gmail.com', '9876543201', 1, '2020-10-15 18:30:00', '2020-10-16 12:10:21'),
(4, 'User 4', 'user4@gmail.com', '9876543201', 1, '2020-10-15 18:30:00', '2020-10-16 12:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_partner_api_logs`
--
ALTER TABLE `tbl_partner_api_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_partner_details`
--
ALTER TABLE `tbl_partner_details`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_key` (`p_key`);

--
-- Indexes for table `tbl_users_data`
--
ALTER TABLE `tbl_users_data`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_partner_api_logs`
--
ALTER TABLE `tbl_partner_api_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_partner_details`
--
ALTER TABLE `tbl_partner_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users_data`
--
ALTER TABLE `tbl_users_data`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
