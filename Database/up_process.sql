-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 04:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `up_process`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `username`, `password`, `company_code`, `designation`) VALUES
(3, 'uProcess', 'eyepatch_2', 'd101639174fb3f76b491cc69725dcc41', 'b7c6724594a90d237da50ee3616e1214', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `username`, `password`, `company_code`, `designation`) VALUES
(4, 'eyepatch', 'eyepatch', '202cb962ac59075b964b07152d234b70', 'b7c6724594a90d237da50ee3616e1214', 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `assigned_time` time(6) NOT NULL,
  `due_time` time(6) NOT NULL,
  `sub_time` time(6) NOT NULL,
  `category` varchar(100) NOT NULL,
  `assigned_to` varchar(100) NOT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `task_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `assigned_time`, `due_time`, `sub_time`, `category`, `assigned_to`, `assigned_by`, `status`, `task_date`) VALUES
(5, 'new2', 'huqweuiklfrwklklfrwklklfrwklklfrwkl', '03:49:34.000000', '03:54:00.000000', '07:42:27.000000', 'emp', 'eyepatch', 'eyepatch', 'pending', '2021-03-06'),
(6, 'new2', 'huqweuiklfrwklklfrwklklfrwklklfrwkl', '03:49:34.000000', '03:54:00.000000', '07:53:46.000000', 'admin', 'eyepatch', 'eyepatch', 'submitted', '2021-03-06'),
(7, 'dfnsdjk', 'sdjknfsdkjf', '05:34:37.000000', '00:00:00.000000', '07:42:27.000000', 'emp', 'eyepatch', 'eyepatch', 'pending', '2021-03-06'),
(9, 'dfnskd', 'kasdfnkdsjfn', '05:35:20.000000', '00:00:00.000000', '07:53:39.000000', 'emp', 'eyepatch', 'eyepatch', 'done', '2021-03-06'),
(10, 'dnfnjskd', 'jdngsdj', '06:52:27.000000', '00:00:00.000000', '07:42:27.000000', 'emp', 'eyepatch', 'eyepatch', 'pending', '2021-03-06'),
(11, 'latest', 'sdnfkdsj', '07:09:27.000000', '00:00:00.000000', '07:51:38.000000', 'emp', 'eyepatch', 'eyepatch', 'pending', '2021-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
