-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2021 at 01:09 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `id` int(3) NOT NULL,
  `tutor_id` int(3) NOT NULL,
  `date` date NOT NULL,
  `time_start` int(4) NOT NULL,
  `time_end` int(4) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Unconfirmed',
  `student_id` int(7) DEFAULT NULL,
  `time_off` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`id`, `tutor_id`, `date`, `time_start`, `time_end`, `subject`, `status`, `student_id`, `time_off`) VALUES
(4, 1, '2021-04-10', 700, 800, 'Discrete Mathematics', 'Unconfirmed', 3, b'0'),
(1, 1, '2021-04-10', 1200, 1400, 'Discrete Mathematics', 'Confirmed', 1, b'0'),
(2, 1, '2021-04-10', 1400, 1600, 'Discrete Mathematics', 'Confirmed', 2, b'0'),
(4, 1, '2021-04-10', 1600, 1700, 'Discrete Mathematics', 'Confirmed', 3, b'0'),
(3, 2, '2021-04-10', 1000, 1200, 'Calculus', 'Unconfirmed', 4, b'0'),
(9, 3, '2021-04-11', 800, 1000, 'Something History Related', 'Confirmed', 1, b'0'),
(9, 3, '2021-04-11', 1000, 1200, 'Something History Related', 'Confirmed', 3, b'0'),
(8, 4, '2021-04-10', 100, 200, 'Advanced Mopping Techniques', 'Unconfirmed', 2, b'0'),
(8, 4, '2021-04-11', 100, 200, 'Mopping Basics', 'Unconfirmed', 3, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Available`
--

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

CREATE TABLE `Subject` (
  `tutor_id` int(3) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`tutor_id`, `subject`) VALUES
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
-- Table structure for table `Tutor`
--

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
(4, 'Dr. Jan Itor', 'broom-life@school.com', 'test', ''),
(3, 'History Person', 'whoreallydid911@school.com', 'test', ''),
(2, 'Math Lady', 'crazy4math@school.com', 'test', ''),
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
  ADD PRIMARY KEY (`name`,`email`),
  ADD KEY `tutor_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Tutor`
--
ALTER TABLE `Tutor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
