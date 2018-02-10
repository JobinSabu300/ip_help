-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 07:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcaip`
--

-- --------------------------------------------------------

--
-- Table structure for table `cources`
--

CREATE TABLE `cources` (
  `course` varchar(5) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `subjectcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cources`
--

INSERT INTO `cources` (`course`, `sem`, `subject`, `subjectcode`) VALUES
('bca', '1', 'C', 'BCA-105'),
('bca', '1', 'Introduction to Computers & IT', 'BCA-107'),
('mca', '1', 'co', 'mca-201');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(5) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `unit` int(1) NOT NULL,
  `file` varchar(50) NOT NULL,
  `d_link` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `keywords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `subjectcode`, `unit`, `file`, `d_link`, `topic`, `keywords`) VALUES
(1, 'BCA-105', 1, 'cn.pdf', '', 'Pointers', 'Pointers'),
(2, 'BCA-105', 2, 'cn2.pdf', '', 'Functions', 'Functions');

-- --------------------------------------------------------

--
-- Table structure for table `practicals`
--

CREATE TABLE `practicals` (
  `practical_id` int(11) NOT NULL,
  `cource_id` int(11) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `topic` text NOT NULL,
  `code` text NOT NULL,
  `file` text NOT NULL,
  `d_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicals`
--

INSERT INTO `practicals` (`practical_id`, `cource_id`, `subjectcode`, `topic`, `code`, `file`, `d_link`) VALUES
(2, 1, 'BCA-105', 'Write a program to check wheather a number is even or odd', '', 'new.txt', ''),
(3, 1, 'BCA-105', 'Write a program to check wheather a number is even or odd', '#include <stdio.h>\r\nint main()\r\n{\r\n    int number;\r\n\r\n    printf(\"Enter an integer: \");\r\n    scanf(\"%d\", &number);\r\n\r\n    // True if the number is perfectly divisible by 2\r\n    if(number % 2 == 0)\r\n        printf(\"%d is even.\", number);\r\n    else\r\n        printf(\"%d is odd.\", number);\r\n\r\n    return 0;\r\n}', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `qustion_paper`
--

CREATE TABLE `qustion_paper` (
  `paper_id` int(5) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `paper_type` varchar(8) NOT NULL,
  `file` varchar(20) NOT NULL,
  `d_link` varchar(20) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qustion_paper`
--

INSERT INTO `qustion_paper` (`paper_id`, `subjectcode`, `paper_type`, `file`, `d_link`, `year`) VALUES
(1, 'BCA-105', 'External', 'c.pdf', '', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tags_id` int(11) NOT NULL,
  `tags title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags_r`
--

CREATE TABLE `tags_r` (
  `tags_id` int(11) NOT NULL,
  `notes_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `practical_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cources`
--
ALTER TABLE `cources`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `practicals`
--
ALTER TABLE `practicals`
  ADD PRIMARY KEY (`practical_id`);

--
-- Indexes for table `qustion_paper`
--
ALTER TABLE `qustion_paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `practicals`
--
ALTER TABLE `practicals`
  MODIFY `practical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qustion_paper`
--
ALTER TABLE `qustion_paper`
  MODIFY `paper_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
