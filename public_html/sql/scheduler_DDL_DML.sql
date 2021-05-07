-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 01:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `tutor_id`, `date`, `time_start`, `time_end`, `subject`, `status`, `student_id`, `time_off`, `assignment`, `file`, `student_name`, `student_email`) VALUES
(86, 1, '2021-04-06', '07:00', '08:00', 'Pre Calculus', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(78, 1, '2021-04-06', '10:00', '11:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmai.com'),
(79, 1, '2021-04-07', '11:00', '12:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(1, 1, '2021-04-10', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(2, 1, '2021-04-10', '14:00', '16:00', 'Discrete Mathematics', 'Confirmed', 2, b'0', '', '', '', ''),
(4, 1, '2021-04-10', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(5, 1, '2021-04-10', '7:00', '8:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(12, 1, '2021-04-11', '10:00', '12:00', 'Test', 'Confirmed', 1, b'0', '', '', '', ''),
(14, 1, '2021-04-11', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(15, 1, '2021-04-11', '14:00', '16:00', 'Discrete Mathematics', '', 2, b'0', '', '', '', ''),
(16, 1, '2021-04-11', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(13, 1, '2021-04-11', '7:00', '8:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(18, 1, '2021-04-13', '10:00', '12:00', 'Test', 'Confirmed', 1, b'0', '', '', '', ''),
(74, 1, '2021-04-14', '07:00', '07:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(17, 1, '2021-04-15', '7;00', '8:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(19, 1, '2021-04-17', '12:00', '14:00', 'Discrete Mathematics', 'Confirmed', 1, b'0', '', '', '', ''),
(11, 1, '2021-04-18', '1:00', '2:00', 'Algebra', 'Confirmed', 3, b'0', '', '', '', ''),
(23, 1, '2021-04-18', '7:00', '9:00', 'How to Avoid Working', 'Confirmed', 3, b'0', '', '', '', ''),
(63, 1, '2021-04-20', '08:00', '09:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jorjasj', 'jorjasj@gmail.com'),
(20, 1, '2021-04-20', '14:00', '16:00', 'Discrete Mathematics', 'Confirmed', 2, b'0', '', '', '', ''),
(87, 1, '2021-04-22', '07:00', '08:00', 'Discrete Mathematics', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(21, 1, '2021-04-25', '16:00', '17:00', 'Discrete Mathematics', 'Confirmed', 3, b'0', '', '', '', ''),
(22, 1, '2021-04-26', '1:00', '2:00', 'Algebra', 'Confirmed', 3, b'0', '', '', '', ''),
(73, 1, '2021-05-04', '07:00', '07:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(70, 1, '2021-05-04', '08:00', '09:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'wd', 'wd@f.com'),
(75, 1, '2021-05-04', '11:00', '12:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(41, 1, '2021-05-05', '07:00', '08:00', 'Algebra', 'Confirmed', 0, b'0', 'exam', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(40, 1, '2021-05-05', '12:00', '13:00', 'Algebra', 'Confirmed', 0, b'0', 'axam4', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(36, 1, '2021-05-06', '07:00', '08:00', 'Algebra', 'Rejected', 0, b'0', 'exam5', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(37, 1, '2021-05-07', '07:00', '07:00', 'Algebra', 'Confirmed', 0, b'0', 'axam4', '', 'Arielle 123', 'hounton.arielle@gmail.com'),
(43, 1, '2021-05-07', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', 'Lab11', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(83, 1, '2021-05-07', '11:00', '12:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(39, 1, '2021-05-09', '07:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'Arielle Hounton', 'sdfghj'),
(67, 1, '2021-05-11', '08:00', '09:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'test', 'jor@gmail.com'),
(44, 1, '2021-05-13', '09:00', '11:00', 'Algebra', 'Confirmed', 0, b'0', 'Mine', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(45, 1, '2021-05-16', '07:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', 'mine2', '', 'Arielle Hounton', 'hounton.arielle@gmail.com'),
(68, 1, '2021-05-18', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'frgrg', 'erfgre@gamil.com'),
(88, 1, '2021-05-19', '07:00', '08:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(76, 1, '2021-05-21', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(69, 1, '2021-05-25', '08:00', '09:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'refgre', 't@t.com'),
(64, 1, '2021-05-26', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jasdoina', 'j@gmail.com'),
(72, 1, '2021-05-30', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(77, 1, '2021-05-31', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmai.com'),
(81, 1, '2021-06-01', '07:00', '07:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(82, 1, '2021-06-03', '08:00', '09:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(80, 1, '2021-06-18', '09:00', '10:00', 'Algebra', 'Confirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(3, 2, '2021-04-10', '10:00', '12:00', 'Calculus', 'Unconfirmed', 4, b'0', '', '', '', ''),
(49, 2, '2021-05-11', '10:00', '12:00', 'Algebra', 'Unconfirmed', 0, b'0', 'test', '', 'test', 'jorjasj@gmail.com'),
(8, 3, '2021-04-11', '10:00', '12:00', 'Something History Related', 'Confirmed', 3, b'0', '', '', '', ''),
(9, 3, '2021-04-11', '8:00', '10:00', 'Something History Related', 'Confirmed', 1, b'0', '', '', '', ''),
(24, 3, '2021-04-21', '0700', '0700', 'Algebra', 'Unconfirmed', 3, b'0', '', '', '', ''),
(6, 4, '2021-04-10', '1:00', '2:00', 'Advanced Mopping Techniques', 'Unconfirmed', 2, b'0', '', '', '', ''),
(7, 4, '2021-04-11', '1:00', '2:00', 'Mopping Basics', 'Confirmed', 3, b'0', '', '', '', ''),
(84, 4, '2021-04-21', '09:00', '10:00', 'How to Avoid Working', 'Unconfirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(25, 4, '2021-04-22', '07:00', '08:00', 'Another History Topic', 'Rejected', 0, b'0', 'Lab3', '', 'Test', 'test@gmail.cm'),
(26, 4, '2021-04-22', '09:00', '10:00', 'Algebra', 'Rejected', 0, b'0', 'Lab5', '', 'test caregiver', 'rpd@mail.com'),
(29, 4, '2021-04-22', '11:00', '12:00', 'Algebra', 'Unconfirmed', 0, b'0', 'sf', '', 'test caregiver', 'rpd@mail.com'),
(34, 4, '2021-04-22', '13:00', '14:00', 'Algebra', 'Unconfirmed', 0, b'0', 'sf', '1619105747-1617002085866.JPEG', 'test caregiver', 'rpd@mail.com'),
(71, 4, '2021-05-05', '08:00', '09:00', 'Algebra', 'Unconfirmed', 0, b'0', '', '', 'jason', 'jorjasj@gmail.com'),
(50, 4, '2021-05-11', '07:00', '08:00', 'Discrete Mathematics', 'Unconfirmed', 0, b'0', '', '', 'test', 'jorjasj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
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

CREATE TABLE `student` (
  `id` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `subject` (
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
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `access_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `access_token`) VALUES
(1, '{\"access_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiIwZjIwYzIxMS01ZWQyLTRkOWEtOTRlZC0xNDdkNzc1ZTdhNGUifQ.eyJ2ZXIiOjcsImF1aWQiOiJlNGZmZTU4NjBlNDBmMmM3NjUzOWQzNTY4ZDFjNzZhYiIsImNvZGUiOiJ4VE1nVWlNVjlmX29IN0NzRm9uUlpXaHhLeklUR09MLUEiLCJpc3MiOiJ6bTpjaWQ6TXdjM1NoNHRSbktqYllBTEJUUXNWZyIsImdubyI6MCwidHlwZSI6MCwidGlkIjo4LCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJvSDdDc0ZvblJaV2h4S3pJVEdPTC1BIiwibmJmIjoxNjIwMDgxMjg5LCJleHAiOjE2MjAwODQ4ODksImlhdCI6MTYyMDA4MTI4OSwiYWlkIjoiX3NuXzlteEFScWVWekU2Uk8wc0dKUSIsImp0aSI6IjY5ZDg1MzgxLWNkZmUtNGY0My05MjdiLTgxZDY4YzlmZjUxNCJ9.XQtBah2kPssBWXeuBeaVE2JAk_m1hUcWg2jKk2eic1sjQRuK2hIidti-pZlD-MUNn8cscAHBGeO3UDFblDwc1w\",\"token_type\":\"bearer\",\"refresh_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiI4OWVjMzc1Zi1iOGIyLTRlYzMtYWI2Mi01NjM3NmUzNjJhYjIifQ.eyJ2ZXIiOjcsImF1aWQiOiJlNGZmZTU4NjBlNDBmMmM3NjUzOWQzNTY4ZDFjNzZhYiIsImNvZGUiOiJ4VE1nVWlNVjlmX29IN0NzRm9uUlpXaHhLeklUR09MLUEiLCJpc3MiOiJ6bTpjaWQ6TXdjM1NoNHRSbktqYllBTEJUUXNWZyIsImdubyI6MCwidHlwZSI6MSwidGlkIjo4LCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJvSDdDc0ZvblJaV2h4S3pJVEdPTC1BIiwibmJmIjoxNjIwMDgxMjg5LCJleHAiOjIwOTMxMjEyODksImlhdCI6MTYyMDA4MTI4OSwiYWlkIjoiX3NuXzlteEFScWVWekU2Uk8wc0dKUSIsImp0aSI6ImZiZTA1OWFiLWFjYTItNDQ0My04ZGQxLWU3ZGU3NDQzOGE1NCJ9.sr-2dZb9vKLyeISvI6oDfHcUDWtiFIY0c6MOD0fKFnWufW_He0ExAG6PTpxn_kp6gW49VMtG8uNTPAvPO8mBWw\",\"expires_in\":3599,\"scope\":\"chat_channel:read chat_channel:write chat_contact:read chat_message:read chat_message:write contact:read meeting:read meeting:write pac:read pac:write phone:read phone:write phone_call_control:read phone_call_control:write phone_e911:read phone_sms:read phone_sms:write recording:read recording:write tsp:read tsp:write user:read user:write user_profile user_zak:read webinar:read webinar:write\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(400) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `disable_dates` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `name`, `email`, `password`, `img`, `phone`, `subject`, `disable_dates`) VALUES
(4, 'Dr. Jan Itor', 'broom-life@school.com', 'test', '1618586792-b.jpg', '123456', '', '2021-04-24,2021-04-25'),
(3, 'History Person', 'history@school.com', 'test', '', '', '', ''),
(2, 'Math Lady', 'math@school.com', 'test', '', '', '', ''),
(1, 'Test Tutor 1', 'test@test.com', 'test', '1619971397-A2Home_page.PNG', '', '', '2021-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`tutor_id`,`date`,`time_start`),
  ADD KEY `appt_id` (`id`),
  ADD KEY `id` (`id`);

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
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`name`,`email`),
  ADD KEY `tutor_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
