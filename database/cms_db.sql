-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 03:25 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(5, 'mycscums', 'MyCyberSecurity Clinic UMS, Faculty of Computing and Informatics, Ground Floor, Block A of FKJ Building, Jalan UMS', 'Kota Kinabalu', 'Sabah', '88400', 'Malaysia', '+6088320000', '2022-03-07 13:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `disk`
--

CREATE TABLE `disk` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email` varchar(120) NOT NULL,
  `sender_ic` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_email` varchar(120) NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Recovery, 2=Sanitizzation',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `hardware` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disk`
--

INSERT INTO `disk` (`id`, `reference_number`, `sender_name`, `sender_email`, `sender_ic`, `sender_contact`, `recipient_name`, `recipient_email`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `hardware`, `serial`, `model`, `storage`, `price`, `status`, `date_created`) VALUES
(9, '054683269063', 'Test user ', 'testuser@gmail.com', '0', '0121234567', 'teststaff', 'teststaff@gmail.com', '08843215432', 1, '5', '', 'Apacer', 'Xs1234432', 'SSD', 'apacer xgen', 120, 0, '2022-03-11 07:58:17'),
(10, '597246900091', 'Ahmad Amsari Bin Muhammad', 'amsari136ict@gmail.com', '980613125241', '0128169267', 'MyCSC Staff Intern', 'mycscstaff1@gmail.com', '08843215432', 2, '5', '', 'SanDisk', 'san1281645', 'HDD', '213dqdsad', 0, 0, '2022-03-13 11:21:25'),
(11, '176762898492', 'Viken Design', 'vikentshirtdesign@gmail.com', '980613125241', '0128169267', 'teststaff', 'teststaff@gmail.com', '08843215432', 2, '5', '', 'SanDisk', 'san1281645', 'HDD', '213dqdsad', 0, 0, '2022-03-13 12:26:07'),
(12, '486683084062', 'sharpudin bin ismail', 'amsari136ict@gmail.com', '980613125241', '0128169267', 'staff', 'stafftest@gmail.com', '08843215432', 1, '5', '', 'SanDisk', 'san1281645', 'HDD', '213dqdsad', 0, 1, '2022-03-13 12:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `disk_tracks`
--

CREATE TABLE `disk_tracks` (
  `id` int(30) NOT NULL,
  `disk_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disk_tracks`
--

INSERT INTO `disk_tracks` (`id`, `disk_id`, `status`, `date_created`) VALUES
(1, 2, 1, '2020-11-27 09:53:27'),
(2, 3, 1, '2020-11-27 09:55:17'),
(3, 1, 1, '2020-11-27 10:28:01'),
(4, 1, 2, '2020-11-27 10:28:10'),
(5, 1, 3, '2020-11-27 10:28:16'),
(6, 1, 4, '2020-11-27 11:05:03'),
(7, 1, 5, '2020-11-27 11:05:17'),
(8, 1, 7, '2020-11-27 11:05:26'),
(9, 3, 2, '2020-11-27 11:05:41'),
(10, 6, 1, '2020-11-27 14:06:57'),
(11, 7, 1, '2022-03-07 22:15:30'),
(12, 2, 7, '2022-03-10 17:48:48'),
(13, 2, 5, '2022-03-10 19:11:47'),
(14, 2, 9, '2022-03-10 19:12:57'),
(22, 1, 8, '2022-03-11 00:32:54'),
(23, 6, 2, '2022-03-11 08:28:25'),
(24, 12, 1, '2022-03-13 22:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'MyCSC UMS System', 'mycsc_ums@ums.edu.my', '+6088320000', 'MyCyberSecurity Clinic UMS, Faculty of Computing and Informatics, Ground Floor, Block A of FKJ Building, Jalan UMS, 88400, Kota Kinabalu, Sabah, Malaysia.', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2020-11-26 10:57:04'),
(4, 'ahmad', 'amsari', 'bi17110100@student.ums.edu.my', '1844156d4166d94387f1a4ad031ca5fa', 2, 5, '2022-03-07 13:48:36'),
(5, 'norin', 'kissasa', 'norin@gmail.com', 'ed587e8a8513ab6022e1007c6c8bed5d', 2, 5, '2022-03-07 13:50:00'),
(6, 'mycsc', 'staff1', 'staffmycsc@gmail.com', 'de9bf5643eabf80f4a56fda3bbb84483', 2, 5, '2022-03-07 13:58:20'),
(7, 'mycsc', 'staff2', 'staff2@gmail.com', '04d4b37015f6ba05077ae49776a76b95', 2, 5, '2022-03-07 14:36:16'),
(9, 'Hisham', 'Hishami', 'hisham@gmail.com', '1b30509f95227cf230be756da4e94126', 2, 5, '2022-03-11 01:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disk`
--
ALTER TABLE `disk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disk_tracks`
--
ALTER TABLE `disk_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disk`
--
ALTER TABLE `disk`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `disk_tracks`
--
ALTER TABLE `disk_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
