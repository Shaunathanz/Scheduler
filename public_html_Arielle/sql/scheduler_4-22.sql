-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 05:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler_old`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
`id` int(3) NOT NULL,
  `tutor_id` int(3) NOT NULL,
  `date` date NOT NULL,
  `time_start` varchar(10) NOT NULL,
  `time_end` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Unconfirmed',
  `student_id` int(7) DEFAULT NULL,
  `time_off` bit(1) NOT NULL DEFAULT b'0',
  `assignment` text NOT NULL,
  `file` varchar(400) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `tutor_id`, `date`, `time_start`, `time_end`, `subject`, `status`, `student_id`, `time_off`, `assignment`, `file`, `student_name`, `student_email`) VALUES
(1, 1, '2021-04-10', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(2, 1, '2021-04-10', '14:00', '16:00', 'Discrete Mathematics', 'Confirmed', 2, b'0', '', '', '', ''),
(4, 1, '2021-04-10', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(5, 1, '2021-04-10', '7:00', '8:00', 'Discrete Mathematics', 'Unconfirmed', 3, b'0', '', '', '', ''),
(12, 1, '2021-04-11', '10:00', '12:00', 'Test', 'Confirmed', 1, b'0', '', '', '', ''),
(14, 1, '2021-04-11', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(15, 1, '2021-04-11', '14:00', '16:00', 'Discrete Mathematics', '', 2, b'0', '', '', '', ''),
(16, 1, '2021-04-11', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(13, 1, '2021-04-11', '7:00', '8:00', 'Discrete Mathematics', 'Unconfirmed', 3, b'0', '', '', '', ''),
(18, 1, '2021-04-13', '10:00', '12:00', 'Test', 'Confirmed', 1, b'0', '', '', '', ''),
(17, 1, '2021-04-15', '7;00', '8:00', 'Discrete Mathematics', 'Unconfirmed', 3, b'0', '', '', '', ''),
(19, 1, '2021-04-17', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(11, 1, '2021-04-18', '1:00', '2:00', 'Algebra', 'Unconfirmed', 3, b'0', '', '', '', ''),
(23, 1, '2021-04-18', '7:00', '9:00', 'How to Avoid Working', 'Unconfirmed', 3, b'0', '', '', '', ''),
(20, 1, '2021-04-20', '14:00', '16:00', 'Discrete Mathematics', 'Confirmed', 2, b'0', '', '', '', ''),
(21, 1, '2021-04-25', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(22, 1, '2021-04-26', '1:00', '2:00', 'Algebra', 'Unconfirmed', 3, b'0', '', '', '', ''),
(3, 2, '2021-04-10', '10:00', '12:00', 'Calculus', 'Unconfirmed', 4, b'0', '', '', '', ''),
(8, 3, '2021-04-11', '10:00', '12:00', 'Something History Related', 'Confirmed', 3, b'0', '', '', '', ''),
(9, 3, '2021-04-11', '8:00', '10:00', 'Something History Related', 'Confirmed', 1, b'0', '', '', '', ''),
(24, 3, '2021-04-21', '0700', '0700', 'Algebra', 'Unconfirmed', 3, b'0', '', '', '', ''),
(6, 4, '2021-04-10', '1:00', '2:00', 'Advanced Mopping Techniques', 'Unconfirmed', 2, b'0', '', '', '', ''),
(7, 4, '2021-04-11', '1:00', '2:00', 'Mopping Basics', 'Confirmed', 3, b'0', '', '', '', ''),
(25, 4, '2021-04-22', '07:00', '08:00', 'Another History Topic', 'Rejected', 0, b'0', 'Lab3', '', 'Test', 'test@gmail.cm'),
(26, 4, '2021-04-22', '09:00', '10:00', 'Algebra', 'Rejected', 0, b'0', 'Lab5', '', 'test caregiver', 'rpd@mail.com'),
(29, 4, '2021-04-22', '11:00', '12:00', 'Algebra', 'Unconfirmed', 0, b'0', 'sf', '', 'test caregiver', 'rpd@mail.com'),
(34, 4, '2021-04-22', '13:00', '14:00', 'Algebra', 'Unconfirmed', 0, b'0', 'sf', '1619105747-1617002085866.JPEG', 'test caregiver', 'rpd@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE IF NOT EXISTS `available` (
  `tutor_id` int(3) NOT NULL,
  `time_start` int(4) NOT NULL,
  `time_end` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`tutor_id`, `time_start`, `time_end`) VALUES
(1, 700, 1500),
(2, 900, 1700),
(3, 1500, 1900),
(4, 1200, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`) VALUES
(1, 'Shaun G.', 'example@email.com'),
(2, 'Kayla J.', 'kayjay@email.com'),
(3, 'Jen H.', 'jenh@email.com'),
(4, 'Josh R.', 'jrnottolkien@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `tutor_id` int(3) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`tutor_id`, `subject`) VALUES
(2, 'Algebra'),
(2, 'Calculus'),
(2, 'Discrete Mathematics'),
(2, 'How to Avoid Working'),
(2, 'Pre Calculus'),
(3, 'Another History Topic'),
(3, 'European History'),
(3, 'How to Avoid Working'),
(3, 'Some History Topic'),
(4, 'How to Avoid Working'),
(4, 'Sweeping Floor Basics');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
`id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(400) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `name`, `email`, `password`, `img`, `phone`, `subject`) VALUES
(4, 'Dr. Jan Itor', 'broom-life@school.com', 'test', '1618586792-b.jpg', '123456', ''),
(3, 'History Person', 'history@school.com', 'test', '', '', ''),
(2, 'Math Lady', 'math@school.com', 'test', '', '', ''),
(1, 'Test Tutor', 'test@test.com', 'test', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
 ADD PRIMARY KEY (`tutor_id`,`date`,`time_start`), ADD KEY `appt_id` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
 ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`tutor_id`,`subject`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
 ADD PRIMARY KEY (`name`,`email`), ADD KEY `tutor_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;