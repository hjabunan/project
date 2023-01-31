-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 11:17 AM
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
-- Database: `empmanagesysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_trans`
--

CREATE TABLE `leave_trans` (
  `leave_id` int(11) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `leave_days` int(11) NOT NULL,
  `leave_start` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_trans`
--

INSERT INTO `leave_trans` (`leave_id`, `leave_type`, `leave_days`, `leave_start`, `emp_id`, `status`) VALUES
(55, 'Vacation Leave', 3, '2018-07-13', 24, 'Approved'),
(56, 'Sick Leave', 5, '2018-07-14', 20, 'Approved'),
(57, 'Sick Leave', 10, '2018-07-14', 25, 'Approved'),
(58, 'Vacation Leave', 2, '2018-07-24', 31, 'Approved'),
(59, 'Sick Leave', 10, '2018-01-01', 32, 'declined'),
(60, 'Sick Leave', 10, '2018-01-01', 32, 'Approved'),
(61, 'Sick Leave', 10, '2018-01-01', 32, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `empstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `position`, `email`, `password`, `empstatus`) VALUES
(18, 'Cardo Dalisay', 'Police Officer', 'coco@gmail.com', '', ''),
(20, 'Rodrigo Duterte', 'President', 'du30@gmail.com', '30', ''),
(24, 'Kim Raven Nengasca', 'IT head', 'kimraven09@gmail.com', '1234', ''),
(25, 'Tommy Osmena', 'Mayor', 'tom@gmail.com', 'tommy', ''),
(29, 'jjon', 'crew', 'jon@gmail.com', '', 'deleted'),
(30, 'Jan Vince Kyamko', 'admin', 'kyanen@gmail.com', '1', ''),
(31, 'Joan Tero', 'Former ICT Adviser', 'joan@gmail.com', 'joan', ''),
(32, 'Emma Watson', 'Artist', 'emma@gmail.com', 'emma', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_trans`
--
ALTER TABLE `leave_trans`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_trans`
--
ALTER TABLE `leave_trans`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
