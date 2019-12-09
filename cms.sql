-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 05:09 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `ass_ID` int(11) NOT NULL,
  `ass_No` int(11) DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `ass_name` varchar(255) DEFAULT NULL,
  `sub_date` varchar(255) DEFAULT NULL,
  `ass_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ass_feedback`
--

CREATE TABLE `ass_feedback` (
  `f_id` int(11) NOT NULL,
  `f_ass_no` varchar(5) NOT NULL,
  `f_ass_name` varchar(100) NOT NULL,
  `f_course_code` varchar(50) NOT NULL,
  `f_ass_date` date NOT NULL,
  `f_stu_id` varchar(100) NOT NULL,
  `f_stu_name` varchar(100) NOT NULL,
  `f_ass_desc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(4) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_by_teacher_batch`
--

CREATE TABLE `course_by_teacher_batch` (
  `id` int(11) NOT NULL,
  `course_id` int(4) NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `batch` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_by_teacher_batch`
--

INSERT INTO `course_by_teacher_batch` (`id`, `course_id`, `teacher_code`, `batch`) VALUES
(45, 101, 'AKA', 1620);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `r_id` int(11) NOT NULL,
  `stu_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `mark` varchar(5) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `ex_id` int(11) NOT NULL,
  `ex_type` varchar(50) NOT NULL,
  `ex_date` date NOT NULL,
  `st_time` varchar(50) NOT NULL,
  `ed_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `roll` int(4) NOT NULL,
  `batch` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `t_position` varchar(255) NOT NULL,
  `t_speciality` varchar(255) NOT NULL,
  `t_profileImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `batch` int(2) NOT NULL,
  `role` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll` int(4) NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `batch`, `role`, `email`, `roll`, `teacher_code`, `password`) VALUES
(1, 'Admin', 0, 'admin', 'admin@admin.com', 0, '', 'f6fdffe48c908deb0f4c3bd36c032e72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ass_ID`);

--
-- Indexes for table `ass_feedback`
--
ALTER TABLE `ass_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_by_teacher_batch`
--
ALTER TABLE `course_by_teacher_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ass_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_by_teacher_batch`
--
ALTER TABLE `course_by_teacher_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
