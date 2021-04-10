-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2021 at 02:35 AM
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
  `status` varchar(11) NOT NULL DEFAULT 'Unconfirmed',
  `student_id` int(7) DEFAULT NULL,
  `time_off` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Available`
--

CREATE TABLE `Available` (
  `tutor_id` int(3) NOT NULL,
  `start` int(4) NOT NULL,
  `end` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Available`
--

INSERT INTO `Available` (`tutor_id`, `start`, `end`) VALUES
(4, 700, 1500),
(5, 900, 1700),
(6, 1500, 1900),
(7, 1200, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `id` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `tutor_id` int(3) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`tutor_id`, `subject`) VALUES
(5, 'Algebra'),
(5, 'Calculus'),
(5, 'Discrete Mathematics'),
(5, 'Pre Calculus'),
(6, 'Another History Topic'),
(6, 'European History'),
(6, 'Some History Topic'),
(7, 'How to Avoid Working'),
(7, 'Sweeping Floor Basics');

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
(7, 'Dr. Jan Itor', 'broom-life@school.com', '1234', ''),
(6, 'History Person', 'whoreallydid911@school.com', '9-11', ''),
(5, 'Math Lady', 'crazy4math@school.com', '3.141592', ''),
(4, 'Test Tutor', 'test@test.com', 'test', '');

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
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tutor`
--
ALTER TABLE `Tutor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
