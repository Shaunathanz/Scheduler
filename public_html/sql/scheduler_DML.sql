-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2021 at 02:37 AM
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

--
-- Dumping data for table `Available`
--

INSERT INTO `Available` (`tutor_id`, `start`, `end`) VALUES
(4, 700, 1500),
(5, 900, 1700),
(6, 1500, 1900),
(7, 1200, 1300);

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

--
-- Dumping data for table `Tutor`
--

INSERT INTO `Tutor` (`id`, `name`, `email`, `password`, `img`) VALUES
(7, 'Dr. Jan Itor', 'broom-life@school.com', '1234', ''),
(6, 'History Person', 'whoreallydid911@school.com', '9-11', ''),
(5, 'Math Lady', 'crazy4math@school.com', '3.141592', ''),
(4, 'Test Tutor', 'test@test.com', 'test', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
