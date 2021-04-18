-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2021 at 01:26 AM
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
(13, 1, '2021-04-11', 700, 800, 'Discrete Mathematics', 'Unconfirmed', 3, b'0'),
(12, 1, '2021-04-11', 1000, 1200, 'Test', 'Confirmed', 1, b'0'),
(14, 1, '2021-04-11', 1200, 1400, 'Discrete Mathematics', 'Confirmed', 1, b'0'),
(15, 1, '2021-04-11', 1400, 1600, 'Discrete Mathematics', 'Confirmed', 2, b'0'),
(16, 1, '2021-04-11', 1600, 1700, 'Discrete Mathematics', 'Confirmed', 3, b'0'),
(18, 1, '2021-04-13', 1000, 1200, 'Test', 'Confirmed', 1, b'0'),
(17, 1, '2021-04-15', 700, 800, 'Discrete Mathematics', 'Unconfirmed', 3, b'0'),
(19, 1, '2021-04-17', 1200, 1400, 'Discrete Mathematics', 'Confirmed', 1, b'0'),
(11, 1, '2021-04-18', 100, 200, 'Algebra', 'Unconfirmed', 3, b'0'),
(23, 1, '2021-04-18', 700, 900, 'How to Avoid Working', 'Unconfirmed', 3, b'0'),
(20, 1, '2021-04-20', 1400, 1600, 'Discrete Mathematics', 'Confirmed', 2, b'0'),
(21, 1, '2021-04-25', 1600, 1700, 'Discrete Mathematics', 'Confirmed', 3, b'0'),
(22, 1, '2021-04-26', 100, 200, 'Algebra', 'Unconfirmed', 3, b'0'),
(3, 2, '2021-04-10', 1000, 1200, 'Calculus', 'Unconfirmed', 4, b'0'),
(9, 3, '2021-04-11', 800, 1000, 'Something History Related', 'Confirmed', 1, b'0'),
(9, 3, '2021-04-11', 1000, 1200, 'Something History Related', 'Confirmed', 3, b'0'),
(8, 4, '2021-04-10', 100, 200, 'Advanced Mopping Techniques', 'Unconfirmed', 2, b'0'),
(8, 4, '2021-04-11', 100, 200, 'Mopping Basics', 'Unconfirmed', 3, b'0');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
