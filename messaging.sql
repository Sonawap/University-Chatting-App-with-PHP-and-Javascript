-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 09:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `user_name`, `message`, `dateposted`) VALUES
(1, 7, 'Oladele Olalekan', 'hi', '6:41 PM 27-Feb-2019'),
(2, 7, 'Oladele Olalekan', 'how ', '6:41 PM 27 Feb 2019'),
(3, 8, 'Olasola Kayode', 'ok', '7:28 PM 27 Feb 2019'),
(4, 13, 'ojo ade', 'hello, who is here', '5:22 PM 01 Mar 2019'),
(5, 13, 'ojo ade', 'You are all welcome online', '5:23 PM 01 Mar 2019'),
(6, 13, 'ojo ade', 'jhbaf', '5:23 PM 01 Mar 2019'),
(7, 13, 'ojo ade', 'heeeeeee', '5:23 PM 01 Mar 2019'),
(8, 13, 'ojo ade', 'jhhxc cxnmvx', '5:24 PM 01 Mar 2019'),
(9, 13, 'ojo ade', 'hgshs fsnbsf', '5:24 PM 01 Mar 2019'),
(10, 13, 'ojo ade', 'ok', '5:28 PM 01 Mar 2019'),
(11, 10, 'Dupe Oyedele', 'ok', '6:16 PM 01 Mar 2019');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `faculty`) VALUES
(5, 'Computer Science', 'Applied Science');

-- --------------------------------------------------------

--
-- Table structure for table `dm`
--

CREATE TABLE `dm` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm`
--

INSERT INTO `dm` (`id`, `sender_id`, `reciever_id`, `message`, `dateposted`) VALUES
(1, 4, 7, 'hi', '6:42 PM 27 Feb 2019'),
(2, 8, 7, 'hi', '6:42 PM 27 Feb 2019'),
(3, 12, 7, 'hi', '6:42 PM 27 Feb 2019'),
(4, 4, 8, 'hi', '6:45 PM 27 Feb 2019'),
(5, 12, 7, 'hi', '6:46 PM 27 Feb 2019'),
(6, 12, 7, 'hi', '6:46 PM 27 Feb 2019'),
(7, 7, 8, 'hi', '6:47 PM 27 Feb 2019'),
(8, 12, 7, 'hi', '6:47 PM 27 Feb 2019'),
(9, 4, 7, 'hi', '6:47 PM 27 Feb 2019'),
(10, 8, 7, 'hi', '6:47 PM 27 Feb 2019'),
(11, 7, 4, 'ok', '7:11 PM 27 Feb 2019'),
(12, 7, 12, 'what', '7:11 PM 27 Feb 2019'),
(13, 7, 12, 'ok', '7:27 PM 27 Feb 2019'),
(14, 4, 7, 'ok', '7:28 PM 27 Feb 2019'),
(15, 4, 7, 'ok', '7:29 PM 27 Feb 2019'),
(16, 4, 7, 'hi', '7:30 PM 27 Feb 2019'),
(17, 7, 8, 'how are u', '7:33 PM 27 Feb 2019'),
(18, 6, 8, 'hi', '7:35 AM 28 Feb 2019'),
(19, 6, 8, 'how are you doing? Mr paul', '7:36 AM 28 Feb 2019'),
(20, 4, 6, 'Kunle', '7:37 AM 28 Feb 2019'),
(21, 6, 4, 'yes\n', '7:37 AM 28 Feb 2019'),
(22, 4, 6, 'how are you doing?', '7:39 AM 28 Feb 2019'),
(23, 6, 4, 'am ok', '7:39 AM 28 Feb 2019'),
(24, 4, 6, 'ok', '7:39 AM 28 Feb 2019'),
(25, 6, 4, 'how is school going? hope everyone is right', '7:40 AM 28 Feb 2019'),
(26, 4, 6, 'yes', '7:40 AM 28 Feb 2019'),
(27, 4, 6, 'yes', '7:40 AM 28 Feb 2019'),
(28, 6, 4, 'ok', '7:40 AM 28 Feb 2019'),
(29, 4, 6, 'yes', '7:40 AM 28 Feb 2019'),
(30, 4, 8, 'hi', '11:00 PM 28 Feb 2019'),
(31, 8, 4, 'how are you doing?', '11:00 PM 28 Feb 2019'),
(32, 8, 6, 'hi', '10:43 AM 01 Mar 2019'),
(33, 13, 10, 'Hello', '5:22 PM 01 Mar 2019'),
(34, 13, 10, 'hi', '5:24 PM 01 Mar 2019'),
(35, 10, 13, 'hi', '5:25 PM 01 Mar 2019'),
(36, 13, 10, 'ok', '5:25 PM 01 Mar 2019'),
(37, 13, 10, 'ok', '5:25 PM 01 Mar 2019'),
(38, 13, 10, 'ok', '5:26 PM 01 Mar 2019'),
(39, 10, 13, 'ok', '5:26 PM 01 Mar 2019'),
(40, 10, 13, 'ok', '5:26 PM 01 Mar 2019'),
(41, 10, 13, 'ok', '5:26 PM 01 Mar 2019'),
(42, 13, 10, 'ok', '5:28 PM 01 Mar 2019'),
(43, 13, 4, 'hello', '5:29 PM 01 Mar 2019'),
(44, 14, 4, 'hi', '6:02 PM 01 Mar 2019'),
(45, 14, 4, 'ok', '6:02 PM 01 Mar 2019'),
(46, 14, 4, 'ok', '6:02 PM 01 Mar 2019');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`) VALUES
(2, 'Applied Science\r\n'),
(4, 'Environmental'),
(5, 'Engineering'),
(6, 'Social Science'),
(7, 'Business'),
(8, 'Information and Technology'),
(9, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `receiver_name` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `user_id`, `sender_id`, `sender_name`, `receiver_name`, `message`, `dateposted`, `time`) VALUES
(1, 8, 7, 'Olasola Kayode', 'Oladele Olalekan', 'how are u', '6:47 PM 27 Feb 2019', '1551292400'),
(2, 7, 12, 'Oladele Olalekan', 'Olamide Olatunde', 'ok', '6:47 PM 27 Feb 2019', '1551292023'),
(3, 7, 4, 'Oladele Olalekan', 'Paul  Sola Moses', 'hi', '6:47 PM 27 Feb 2019', '1551292218'),
(4, 8, 6, 'Olasola Kayode', 'Adekunle Ajayi', 'hi', '7:35 AM 28 Feb 2019', '1551433407'),
(5, 6, 4, 'Adekunle Ajayi', 'Paul  Sola Moses', 'yes', '7:37 AM 28 Feb 2019', '1551336034'),
(6, 8, 4, 'Olasola Kayode', 'Paul  Sola Moses', 'how are you doing?', '11:00 PM 28 Feb 2019', '1551391238'),
(7, 10, 13, 'Dupe Oyedele', 'ojo ade', 'ok', '5:22 PM 01 Mar 2019', '1551457714'),
(8, 4, 13, 'Paul  Sola Moses', 'ojo ade', 'hello', '5:29 PM 01 Mar 2019', '1551457761'),
(9, 4, 14, 'Paul  Sola Moses', 'Alex Garrent', 'ok', '6:02 PM 01 Mar 2019', '1551459774');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(8, 'ND1'),
(9, 'ND2'),
(10, 'HND1'),
(11, 'HND2'),
(12, 'ND1 PT'),
(13, 'ND2 PT'),
(14, 'HND1 PT '),
(15, 'HND2 PT'),
(16, 'PT3 HND');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `othername` varchar(120) NOT NULL,
  `level` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateposted` varchar(50) NOT NULL,
  `profile_pic` varchar(300) NOT NULL DEFAULT 'avatar_2x.png',
  `active` int(11) NOT NULL DEFAULT '1',
  `account_type` varchar(250) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `othername`, `level`, `department`, `faculty`, `email`, `password`, `dateposted`, `profile_pic`, `active`, `account_type`) VALUES
(4, 'Paul ', 'Sola Moses', 'ND1', 'Computer Science', 'Engineering', 'sola@gmail.com', 'f3f8f775befef8c98d8d4e47c3487bfd', '2019-02-23', 'IMG_20180625_203316_411.jpg', 1, 'admin'),
(6, 'Adekunle', 'Ajayi', 'ND2', 'Computer Science', 'Applied Science', 'kunle@gmail.com', 'f3f8f775befef8c98d8d4e47c3487bfd', '2019-02-23', 'IMG_20190106_1330412.jpg', 0, 'user'),
(7, 'Oladele', 'Olalekan', 'HND2', 'Account', 'Applied Science', 'olalekan@gmail.com', '343b1c4a3ea721b2d640fc8700db0f36', '2019-02-23', 'WhatsApp Image 2019-01-31 at 16.02.54.jpeg', 1, 'user'),
(8, 'Olasola', 'Kayode', 'ND1', 'Computer Science', 'Engineering', 'kayode@gmail.com', 'f3f8f775befef8c98d8d4e47c3487bfd', '2019-02-23', 'FB_IMG_1537445063503.jpg', 1, 'user'),
(10, 'Dupe', 'Oyedele', 'ND1', 'Computer Science', 'Engineering', 'dupe@gmail.com', 'f3f8f775befef8c98d8d4e47c3487bfd', '2019-02-24', 'FB_IMG_1537447513886.jpg', 1, 'user'),
(11, 'Ola', 'Ojo', 'ND1', 'Computer Science', 'Applied Science', 'ola@gmail.com', '343b1c4a3ea721b2d640fc8700db0f36', '2019-02-25', 'avatar_2x.png', 1, 'user'),
(12, 'Olamide', 'Olatunde', 'ND2', 'Account', 'Applied Science', 'olamide@gmail.com', 'f3f8f775befef8c98d8d4e47c3487bfd', '2019-02-27', 'avatar_2x.png', 1, 'user'),
(13, 'ojo', 'ade', 'HND2', 'Computer Science', 'Applied Science', 'ojo@gmail.com', '343b1c4a3ea721b2d640fc8700db0f36', '2019-03-01', 'FB_IMG_1537447120886.jpg', 1, 'user'),
(14, 'Alex', 'Garrent', 'HND1', 'Computer Science', 'Business', 'alex@gmail.com', 'e6f41bad2eebe58b8147ec36597a824e', '2019-03-01', 'IMG_20180705_162501_632.jpg', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` char(100) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `user_id`, `name`, `profile_pic`, `time`) VALUES
(43, 'psi1sv1i3q1mj86v8km6auu156', 4, 'Paul  Sola Moses', 'IMG_20180625_203316_411.jpg', 1551470392);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm`
--
ALTER TABLE `dm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dm`
--
ALTER TABLE `dm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
