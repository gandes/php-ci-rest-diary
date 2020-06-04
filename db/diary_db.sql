-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2020 at 05:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(8) NOT NULL,
  `diary` text NOT NULL,
  `diary_date` date NOT NULL,
  `user_id` int(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `diary`, `diary_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ada deh', '2020-06-03', 1, '2020-06-04 22:55:52', '2020-06-03 22:55:52'),
(5, 'Post 2', '2020-06-06', 6, '2020-06-04 05:09:04', '2020-06-04 05:14:30'),
(7, 'Post 24', '2020-06-07', 6, '2020-06-04 05:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` binary(60) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `join_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `token` binary(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `fullname`, `birthday`, `join_date`, `last_login`, `token`) VALUES
(6, 'joni@ga.com', 'joni', 0x243279243130242f5148674f6d634d4b6e386b42786259396d2e65764f374b2f7946766d7a5a6f73744e4937594f6352626b3236662f7837486d7547, 'joni gitu', '2020-02-05', '2020-06-04 04:34:34', '2020-06-04 05:08:28', 0x24327924313024375363346876504b7450694d7058487345757875644f4b764b7469305334384a37526743474d5167314e637134514a574779426853),
(7, 'afsdf@ga.com', 'asd', 0x243279243130245a3242743536682e384a41417969524d35427454334f5965386a4f462f7550587a6550786a6a4b2f593832447a7461384c395a5569, 'gagaga', '2020-02-05', '2020-06-04 05:26:10', '0000-00-00 00:00:00', 0x000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
(8, 'afsdf@ga.com', 'asdassA3^3', 0x24327924313024644a4f6b2f785954645561482e4551416d766d33317530565469616f425249484b34646978526c6164467749576d6265765235482e, 'gagaga', '2020-02-05', '2020-06-04 05:28:47', '0000-00-00 00:00:00', 0x000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
