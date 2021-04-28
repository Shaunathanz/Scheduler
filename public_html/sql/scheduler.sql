-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2021 at 09:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler`
--
CREATE DATABASE IF NOT EXISTS `scheduler` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

DROP TABLE IF EXISTS `Appointment`;
CREATE TABLE `Appointment` (
  `id` int(3) NOT NULL,
  `tutor_id` int(3) NOT NULL,
  `date` date NOT NULL,
  `time_start` int(4) NOT NULL,
  `time_end` int(4) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Unconfirmed',
  `assignment_info` varchar(500) NOT NULL,
  `student_id` int(7) DEFAULT NULL,
  `time_off` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`id`, `tutor_id`, `date`, `time_start`, `time_end`, `subject`, `status`, `assignment_info`, `student_id`, `time_off`) VALUES
(4, 1, '2021-04-10', 700, 800, 'Discrete Mathematics', 'Unconfirmed', '', 3, b'0'),
(1, 1, '2021-04-10', 1200, 1400, 'Discrete Mathematics', 'Confirmed', '', 1, b'0'),
(2, 1, '2021-04-10', 1400, 1600, 'Discrete Mathematics', 'Confirmed', '', 2, b'0'),
(4, 1, '2021-04-10', 1600, 1700, 'Discrete Mathematics', 'Confirmed', '', 3, b'0'),
(13, 1, '2021-04-11', 700, 800, 'Discrete Mathematics', 'Unconfirmed', '', 3, b'0'),
(12, 1, '2021-04-11', 1000, 1200, 'Test', 'Confirmed', '', 1, b'0'),
(14, 1, '2021-04-11', 1200, 1400, 'Discrete Mathematics', 'Confirmed', '', 1, b'0'),
(15, 1, '2021-04-11', 1400, 1600, 'Discrete Mathematics', 'Confirmed', '', 2, b'0'),
(16, 1, '2021-04-11', 1600, 1700, 'Discrete Mathematics', 'Confirmed', '', 3, b'0'),
(18, 1, '2021-04-13', 1000, 1200, 'Test', 'Confirmed', '', 1, b'0'),
(17, 1, '2021-04-15', 700, 800, 'Discrete Mathematics', 'Unconfirmed', '', 3, b'0'),
(19, 1, '2021-04-17', 1200, 1400, 'Discrete Mathematics', 'Confirmed', '', 1, b'0'),
(11, 1, '2021-04-18', 100, 200, 'Algebra', 'Unconfirmed', '', 3, b'0'),
(23, 1, '2021-04-18', 700, 900, 'How to Avoid Working', 'Unconfirmed', '', 3, b'0'),
(20, 1, '2021-04-20', 1400, 1600, 'Discrete Mathematics', 'Confirmed', '', 2, b'0'),
(21, 1, '2021-04-25', 1600, 1700, 'Discrete Mathematics', 'Confirmed', '', 3, b'0'),
(22, 1, '2021-04-26', 100, 200, 'Algebra', 'Unconfirmed', '', 3, b'0'),
(3, 2, '2021-04-10', 1000, 1200, 'Calculus', 'Unconfirmed', '', 4, b'0'),
(24, 2, '2021-04-10', 1200, 1400, 'Discrete Mathematics', 'Confirmed', '', 1, b'0'),
(28, 2, '2021-04-11', 1600, 1700, 'Discrete Mathematics', 'Confirmed', '', 3, b'0'),
(26, 2, '2021-04-18', 700, 900, 'How to Avoid Working', 'Unconfirmed', '', 3, b'0'),
(27, 3, '2021-04-10', 700, 800, 'Discrete Mathematics', 'Unconfirmed', '', 3, b'0'),
(9, 3, '2021-04-11', 800, 1000, 'Something History Related', 'Confirmed', '', 1, b'0'),
(9, 3, '2021-04-11', 1000, 1200, 'Something History Related', 'Confirmed', '', 3, b'0'),
(25, 3, '2021-04-25', 1600, 1700, 'Discrete Mathematics', 'Confirmed', '', 3, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Available`
--

DROP TABLE IF EXISTS `Available`;
CREATE TABLE `Available` (
  `tutor_id` int(3) NOT NULL,
  `time_start` int(4) NOT NULL,
  `time_end` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Available`
--

INSERT INTO `Available` (`tutor_id`, `time_start`, `time_end`) VALUES
(1, 700, 1500),
(2, 900, 1700),
(3, 1500, 1900),
(4, 1200, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
CREATE TABLE `Student` (
  `id` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`id`, `name`, `email`) VALUES
(1, 'Shaun G.', 'example@email.com'),
(2, 'Kayla J.', 'kayjay@email.com'),
(3, 'Jen H.', 'jenh@email.com'),
(4, 'Josh R.', 'jrnottolkien@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

DROP TABLE IF EXISTS `Subject`;
CREATE TABLE `Subject` (
  `tutor_id` int(3) NOT NULL,
  `subject` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`tutor_id`, `subject`) VALUES
(1, 'Beginning Japanese I'),
(1, 'Beginning Japanese II'),
(1, 'Calculus'),
(1, 'Chemistry'),
(1, 'College Algebra'),
(1, 'Computer Security'),
(1, 'Database Management Systems'),
(1, 'Discrete Mathematics'),
(1, 'Internet Application Development'),
(1, 'Intro to Data Structures'),
(1, 'Organization of Programming Languages'),
(1, 'Precalculus'),
(1, 'Programming with Objects'),
(1, 'Sociology of Deviance'),
(1, 'Statistics'),
(1, 'Web Design & Implementation'),
(1, 'Writing for the Web'),
(2, 'Calculus'),
(2, 'College Algebra'),
(2, 'Discrete Mathematics'),
(2, 'Precalculus'),
(2, 'Statistics'),
(3, 'Sociology of Deviance'),
(4, 'Chemistry'),
(5, 'Beginning Japanese I'),
(5, 'Beginning Japanese II'),
(5, 'Writing for the Web'),
(6, 'Computer Security'),
(6, 'Database Management Systems'),
(6, 'Discrete Mathematics'),
(6, 'Internet Application Development'),
(6, 'Intro to Data Structures'),
(6, 'Organization of Programming Languages'),
(6, 'Programming with Objects'),
(6, 'Web Design & Implementation'),
(6, 'Writing for the Web');

-- --------------------------------------------------------

--
-- Table structure for table `Tutor`
--

DROP TABLE IF EXISTS `Tutor`;
CREATE TABLE `Tutor` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tutor`
--

INSERT INTO `Tutor` (`id`, `name`, `email`, `password`, `img`) VALUES
(6, 'Computer Science Tutor', 'compsci@school.com', 'test', ''),
(5, 'Language Tutor', 'language@school.com', 'test', ''),
(2, 'Math Tutor', 'math@school.com', 'test', ''),
(4, 'Science Tutor', 'science@school.com', 'test', ''),
(3, 'Sociology Tutor', 'sociology@school.com', 'test', ''),
(1, 'Test Tutor', 'test@test.com', 'test', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`tutor_id`,`date`,`time_start`),
  ADD KEY `appt_id` (`id`);

--
-- Indexes for table `Available`
--
ALTER TABLE `Available`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`tutor_id`,`subject`);

--
-- Indexes for table `Tutor`
--
ALTER TABLE `Tutor`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD KEY `tutor_id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Tutor`
--
ALTER TABLE `Tutor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
