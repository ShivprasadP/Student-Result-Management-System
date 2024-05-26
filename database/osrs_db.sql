-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 05:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(30) NOT NULL,
  `level` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `level`, `section`, `date_created`) VALUES
(1, 'First', 'CSE', '2023-07-08 11:03:47'),
(2, 'Second', 'CSE', '2023-07-08 11:03:53'),
(3, 'Third', 'CSE', '2023-07-08 11:03:59'),
(4, 'Fourth', 'CSE', '2023-07-08 11:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `totalgrade` varchar(10) NOT NULL,
  `totalcredit` int(11) NOT NULL,
  `pointer` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `class_id`, `totalgrade`, `totalcredit`, `pointer`, `date_created`) VALUES
(1, 1, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(2, 2, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(3, 3, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(4, 4, 1, 'CD', 15, 5, '2023-09-01 20:35:55'),
(5, 5, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(6, 6, 1, 'DD', 12, 4, '2023-09-01 20:35:55'),
(7, 7, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(8, 8, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(9, 9, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(10, 10, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(11, 11, 1, 'CC', 18, 6, '2023-09-01 20:35:55'),
(12, 12, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(13, 13, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(14, 14, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(15, 15, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(16, 16, 1, 'CC', 18, 6, '2023-09-01 20:35:55'),
(17, 17, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(18, 18, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(19, 19, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(20, 20, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(21, 21, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(22, 22, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(23, 23, 1, 'CC', 18, 6, '2023-09-01 20:35:55'),
(24, 24, 1, 'CC', 18, 6, '2023-09-01 20:35:55'),
(25, 25, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(26, 26, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(27, 27, 1, 'BC', 21, 7, '2023-09-01 20:35:55'),
(28, 28, 1, 'DD', 12, 4, '2023-09-01 20:35:55'),
(29, 29, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(30, 30, 1, 'DD', 12, 4, '2023-09-01 20:35:55'),
(31, 31, 1, 'CC', 18, 6, '2023-09-01 20:35:55'),
(32, 32, 1, 'FF', 0, 0, '2023-09-01 20:35:55'),
(33, 1, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(34, 2, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(35, 3, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(36, 4, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(37, 5, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(38, 6, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(39, 7, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(40, 8, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(41, 9, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(42, 10, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(43, 11, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(44, 12, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(45, 13, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(46, 14, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(47, 15, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(48, 16, 1, 'CC', 24, 6, '2023-09-01 20:35:59'),
(49, 17, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(50, 18, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(51, 19, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(52, 20, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(53, 21, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(54, 22, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(55, 23, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(56, 24, 1, 'CC', 24, 6, '2023-09-01 20:35:59'),
(57, 25, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(58, 26, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(59, 27, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(60, 28, 1, 'FF', 0, 0, '2023-09-01 20:35:59'),
(61, 29, 1, 'CC', 24, 6, '2023-09-01 20:35:59'),
(62, 30, 1, 'CC', 24, 6, '2023-09-01 20:35:59'),
(63, 31, 1, 'BC', 28, 7, '2023-09-01 20:35:59'),
(64, 32, 1, 'FF', 0, 0, '2023-09-01 20:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `result_items`
--

CREATE TABLE `result_items` (
  `id` int(30) NOT NULL,
  `result_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `ca1` int(11) NOT NULL,
  `ca2` int(11) NOT NULL,
  `mse` int(11) NOT NULL,
  `ese` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_items`
--

INSERT INTO `result_items` (`id`, `result_id`, `subject_id`, `ca1`, `ca2`, `mse`, `ese`, `marks`, `grade`, `credit`, `date_created`) VALUES
(1, 1, 2, 9, 9, 5, 7, 30, 'FF', 0, '2023-09-01 20:35:55'),
(2, 2, 2, 8, 9, 6, 11, 34, 'FF', 0, '2023-09-01 20:35:55'),
(3, 3, 2, 9, 9, 5, 1, 24, 'FF', 0, '2023-09-01 20:35:55'),
(4, 4, 2, 9, 9, 11, 21, 50, 'CD', 15, '2023-09-01 20:35:55'),
(5, 5, 2, 7, 8, 9, 8, 32, 'FF', 0, '2023-09-01 20:35:55'),
(6, 6, 2, 8, 8, 13, 20, 49, 'DD', 12, '2023-09-01 20:35:55'),
(7, 7, 2, 8, 9, 7, 7, 31, 'FF', 0, '2023-09-01 20:35:55'),
(8, 8, 2, 9, 9, 10, 15, 43, 'FF', 0, '2023-09-01 20:35:55'),
(9, 9, 2, 8, 9, 15, 10, 42, 'FF', 0, '2023-09-01 20:35:55'),
(10, 10, 2, 7, 6, 12, 4, 29, 'FF', 0, '2023-09-01 20:35:55'),
(11, 11, 2, 9, 9, 14, 24, 56, 'CC', 18, '2023-09-01 20:35:55'),
(12, 12, 2, 8, 8, 6, 13, 35, 'FF', 0, '2023-09-01 20:35:55'),
(13, 13, 2, 8, 9, 12, 16, 45, 'FF', 0, '2023-09-01 20:35:55'),
(14, 14, 2, 8, 9, 15, 12, 44, 'FF', 0, '2023-09-01 20:35:55'),
(15, 15, 2, 8, 6, 13, 13, 40, 'FF', 0, '2023-09-01 20:35:55'),
(16, 16, 2, 10, 9, 16, 20, 55, 'CC', 18, '2023-09-01 20:35:55'),
(17, 17, 2, 7, 8, 2, 2, 19, 'FF', 0, '2023-09-01 20:35:55'),
(18, 18, 2, 10, 9, 13, 7, 39, 'FF', 0, '2023-09-01 20:35:55'),
(19, 19, 2, 9, 9, 18, 11, 47, 'FF', 0, '2023-09-01 20:35:55'),
(20, 20, 2, 8, 7, 16, 7, 38, 'FF', 0, '2023-09-01 20:35:55'),
(21, 21, 2, 8, 8, 10, 7, 33, 'FF', 0, '2023-09-01 20:35:55'),
(22, 22, 2, 8, 8, 13, 8, 37, 'FF', 0, '2023-09-01 20:35:55'),
(23, 23, 2, 8, 9, 14, 20, 51, 'CC', 18, '2023-09-01 20:35:55'),
(24, 24, 2, 9, 9, 18, 20, 56, 'CC', 18, '2023-09-01 20:35:55'),
(25, 25, 2, 8, 7, 14, 5, 34, 'FF', 0, '2023-09-01 20:35:55'),
(26, 26, 2, 8, 8, 18, 18, 52, 'FF', 0, '2023-09-01 20:35:55'),
(27, 27, 2, 9, 9, 17, 28, 63, 'BC', 21, '2023-09-01 20:35:55'),
(28, 28, 2, 8, 9, 11, 20, 48, 'DD', 12, '2023-09-01 20:35:55'),
(29, 29, 2, 8, 8, 14, 7, 37, 'FF', 0, '2023-09-01 20:35:55'),
(30, 30, 2, 8, 9, 12, 20, 49, 'DD', 12, '2023-09-01 20:35:55'),
(31, 31, 2, 9, 9, 17, 26, 61, 'CC', 18, '2023-09-01 20:35:55'),
(32, 32, 2, 8, 8, 8, 15, 39, 'FF', 0, '2023-09-01 20:35:55'),
(33, 1, 1, 9, 10, 6, 14, 39, 'FF', 0, '2023-09-01 20:35:59'),
(34, 2, 1, 9, 9, 5, 8, 31, 'FF', 0, '2023-09-01 20:35:59'),
(35, 3, 1, 10, 10, 6, 1, 27, 'FF', 0, '2023-09-01 20:35:59'),
(36, 4, 1, 10, 10, 11, 5, 36, 'FF', 0, '2023-09-01 20:35:59'),
(37, 5, 1, 8, 9, 5, 1, 23, 'FF', 0, '2023-09-01 20:35:59'),
(38, 6, 1, 9, 9, 4, 0, 22, 'FF', 0, '2023-09-01 20:35:59'),
(39, 7, 1, 9, 9, 14, 2, 34, 'FF', 0, '2023-09-01 20:35:59'),
(40, 8, 1, 8, 9, 11, 2, 30, 'FF', 0, '2023-09-01 20:35:59'),
(41, 9, 1, 8, 8, 13, 0, 29, 'FF', 0, '2023-09-01 20:35:59'),
(42, 10, 1, 9, 7, 12, 0, 28, 'FF', 0, '2023-09-01 20:35:59'),
(43, 11, 1, 9, 10, 12, 9, 40, 'FF', 0, '2023-09-01 20:35:59'),
(44, 12, 1, 8, 9, 11, 1, 29, 'FF', 0, '2023-09-01 20:35:59'),
(45, 13, 1, 9, 9, 13, 1, 32, 'FF', 0, '2023-09-01 20:35:59'),
(46, 14, 1, 9, 8, 8, 1, 26, 'FF', 0, '2023-09-01 20:35:59'),
(47, 15, 1, 8, 9, 12, 5, 34, 'FF', 0, '2023-09-01 20:35:59'),
(48, 16, 1, 8, 9, 13, 20, 50, 'CC', 24, '2023-09-01 20:35:59'),
(49, 17, 1, 7, 9, 5, 3, 24, 'FF', 0, '2023-09-01 20:35:59'),
(50, 18, 1, 10, 10, 9, 2, 31, 'FF', 0, '2023-09-01 20:35:59'),
(51, 19, 1, 10, 10, 12, 9, 41, 'FF', 0, '2023-09-01 20:35:59'),
(52, 20, 1, 8, 9, 5, 1, 23, 'FF', 0, '2023-09-01 20:35:59'),
(53, 21, 1, 8, 9, 3, 3, 23, 'FF', 0, '2023-09-01 20:35:59'),
(54, 22, 1, 9, 9, 13, 2, 33, 'FF', 0, '2023-09-01 20:35:59'),
(55, 23, 1, 10, 9, 5, 1, 25, 'FF', 0, '2023-09-01 20:35:59'),
(56, 24, 1, 9, 9, 11, 26, 55, 'CC', 24, '2023-09-01 20:35:59'),
(57, 25, 1, 9, 7, 6, 1, 23, 'FF', 0, '2023-09-01 20:35:59'),
(58, 26, 1, 9, 8, 5, 11, 33, 'FF', 0, '2023-09-01 20:35:59'),
(59, 27, 1, 9, 9, 10, 14, 42, 'FF', 0, '2023-09-01 20:35:59'),
(60, 28, 1, 8, 9, 10, 10, 37, 'FF', 0, '2023-09-01 20:35:59'),
(61, 29, 1, 10, 9, 13, 20, 52, 'CC', 24, '2023-09-01 20:35:59'),
(62, 30, 1, 10, 9, 16, 20, 55, 'CC', 24, '2023-09-01 20:35:59'),
(63, 31, 1, 10, 10, 16, 25, 61, 'BC', 28, '2023-09-01 20:35:59'),
(64, 32, 1, 8, 8, 9, 1, 26, 'FF', 0, '2023-09-01 20:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `class_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `firstname`, `middlename`, `lastname`, `gender`, `address`, `class_id`, `date_created`) VALUES
(1, '2210108003', 'ANJALI', 'SHRISHAIL', 'AIWALE', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(2, '2210108004', 'ASAD', 'MAHAMADANJAR', 'ATHANIKAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(3, '2210108005', 'TEJAS', 'RAKESH', 'BELEKAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(4, '2210108006', 'SANIKA', 'SATISH', 'BUDDHANAVAR', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(5, '2210108007', 'OMKAR', 'SUNIL', 'CHAVAN', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(6, '2210108008', 'ADITYA', 'VINOD', 'DAKE', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(7, '2210108009', 'AMIT', 'SUNIL', 'DEVKATE', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(8, '2210108010', 'SIDDHI', 'SHRIPAD', 'DHANAWADE', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(9, '2210108012', 'UDAYAN', 'PRITHVIRAJ', 'GAIKWAD', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(10, '2210108013', 'ANURAG', 'MOHAN', 'HANAGANDI', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(11, '2210108014', 'AKHILESH', 'JAYWANT', 'JADHAV', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:06'),
(12, '2210108015', 'SAIRAJ', 'SANDIP', 'JADHAV', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(13, '2210108016', 'SOURABH', 'BHANUDAS', 'JAGTAP', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(14, '2210108017', 'ROHAN', 'RAJENDRA', 'JAYGOUND', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(15, '2210108020', 'YASH', 'MILIND', 'KAMBLE', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(16, '2210108024', 'ANJALI', 'SHEKHAR', 'KOLI', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(17, '2210108026', 'PRATHAMESH', 'DHANAJI', 'KUMBHAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(18, '2210108032', 'PRATIK', 'KHANDU', 'NIRMAL', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(19, '2210108034', 'AJMAEEN', 'AKHLAQUE', 'PATEL', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(20, '2210108038', 'SATEJ', 'RAVINDRA', 'PATIL', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(21, '2210108039', 'SHIVPRASAD', 'RAJENDRA', 'PATIL', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(22, '2210108043', 'VEDANT', 'SHIVRAJ', 'PATIL', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(23, '2210108044', 'HARSHAL', 'SANTOSH', 'PAWAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(24, '2210108047', 'TANAJI', 'JALANE', 'SHRUTI', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(25, '2210108048', 'SHREEYANSH', 'SANJAY', 'SONAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(26, '2210108049', 'NUMAN', 'MAKBUL', 'SOUDAGAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(27, '2210108050', 'PRITI', 'GUNDU', 'TAKADE', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(28, '2230108054', 'RUSHIKESH', 'ARUN', 'JEDI', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(29, '2230108056', 'RITESH', 'SANJAY', 'RUGE', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(30, '2230108057', 'PRASAD', 'UTTAM', 'SHELAR', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(31, '2240108058', 'TANUJA', 'POPAT', 'PATIL', 'Female', 'Ichalkaranji', 1, '2023-07-08 13:05:07'),
(32, '2240108059', 'SUJAL', 'SHANUR', 'PENDHARI', 'Male', 'Ichalkaranji', 1, '2023-07-08 13:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(30) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `credit` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject`, `credit`, `description`, `date_created`) VALUES
(1, 'BSHA11', 'Engineeering Mathematics', 24, '', '2023-07-08 11:25:00'),
(2, 'BSHA12', 'Engineering Physics', 20, '', '2023-07-08 11:25:00'),
(3, 'BSHA13', 'Communication Skills', 24, '', '2023-07-08 11:25:00'),
(4, 'BSHA14', 'Engineering Graphics', 20, '', '2023-07-08 11:25:00'),
(5, 'BSHA15', 'Basic Civil Engineering', 10, '', '2023-07-08 11:25:00'),
(6, 'BSHA16', 'Basic Mechanical Engineering', 10, '', '2023-07-08 11:25:00'),
(7, 'BSHA12L', 'Engineering Physics Laboratory', 10, '', '2023-07-08 11:25:00'),
(8, 'BSHA13L', 'Communication Skills Laboratory', 10, '', '2023-07-08 11:25:00'),
(9, 'BSHA14L', 'Engineering Graphics Laboratory', 10, '', '2023-07-08 11:25:00'),
(10, 'BSHA17', 'Workshop Practices', 20, '', '2023-07-08 11:25:00'),
(11, 'BSHA11', 'Engineeering Mathematics', 24, '', '2023-09-01 20:08:17'),
(12, 'BSHA12', 'Engineering Physics', 20, '', '2023-09-01 20:08:17'),
(13, 'BSHA13', 'Communication Skills', 24, '', '2023-09-01 20:08:17'),
(14, 'BSHA14', 'Engineering Graphics', 20, '', '2023-09-01 20:08:17'),
(15, 'BSHA15', 'Basic Civil Engineering', 10, '', '2023-09-01 20:08:17'),
(16, 'BSHA16', 'Basic Mechanical Engineering', 10, '', '2023-09-01 20:08:17'),
(17, 'BSHA12L', 'Engineering Physics Laboratory', 10, '', '2023-09-01 20:08:17'),
(18, 'BSHA13L', 'Communication Skills Laboratory', 10, '', '2023-09-01 20:08:17'),
(19, 'BSHA14L', 'Engineering Graphics Laboratory', 10, '', '2023-09-01 20:08:17'),
(20, 'BSHA17', 'Workshop Practices', 20, '', '2023-09-01 20:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Online Student Result System', 'info@sample.comm', '+12345', 'Sharad Institute of Technology', '1605927480_download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `type`, `date_created`) VALUES
(1, 'Administrator', '', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2020-11-20 13:25:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_items`
--
ALTER TABLE `result_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `result_items`
--
ALTER TABLE `result_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
