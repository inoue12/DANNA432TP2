-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2015 at 12:36 AM
-- Server version: 5.5.44
-- PHP Version: 5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created` varchar(45) DEFAULT NULL,
  `modified` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Weeds', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(2, 'Mold', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(3, 'Dust mites', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(4, 'Pollen', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(5, 'Peanuts', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(6, 'Milk products', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(7, 'Egg', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(8, 'Fish', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(9, 'Shellfish', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(10, 'Tree nut', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(11, 'Fruits', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(12, 'Lactose', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(13, 'Asthma', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(14, 'Autism', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(15, 'Special Medication', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(16, 'Wheelchair', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(17, 'Diabetes', '2015-11-08 01:11:09', '2015-11-08 01:11:09'),
(18, 'Bad eye sight', '2015-11-08 01:11:09', '2015-11-08 01:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupe` int(11) NOT NULL,
  `local_num` int(11) NOT NULL,
  `session` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `maximum` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupe`, `local_num`, `session`, `maximum`, `subject_id`, `created`, `modified`, `user_id`) VALUES
(1, 34, 10, 'A2014', 16, 1, '2015-10-08', '2015-10-08', 3),
(2, 11, 3432423, 'A2014', 11, 4, '2015-11-09', '2015-11-09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`) VALUES
(1, 'Technique de l''informatique'),
(2, 'Sciences de la nature'),
(3, 'Science Humaine');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `other_details` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `middle_name`, `last_name`, `other_details`, `thumb`, `user_id`) VALUES
(2, 'Sir', '', 'Hebert', 'Allergies aux jeux video', NULL, NULL),
(3, 'Tristan', '', 'Santerre', 'N', NULL, 9),
(10, 'sdadsa', 'dsadsad', 'dasdsadas', 'dasdsadas', '/img/subjects/10.jpg', 3),
(11, 'Nana', 'nana', 'nana', 'Egg', '/img/subjects/11.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students_groups`
--

CREATE TABLE `students_groups` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students_groups`
--

INSERT INTO `students_groups` (`id`, `student_id`, `group_id`) VALUES
(1, 2, 1),
(3, 10, 1),
(4, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `number`, `title`, `user_id`, `program_id`) VALUES
(1, '12365', 'Cours Web 3', NULL, 1),
(2, '21432', 'Cour web 2', NULL, 1),
(3, '2147', 'Cours Web 1', NULL, 2),
(4, '2134', 'Philosophy', NULL, 3),
(5, '4513', 'Fonction de Travail', NULL, 2),
(6, '1232', 'Francais', NULL, 2),
(7, '321312321', 'dasdsad', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `last_name`, `user_id`) VALUES
(1, 'Andre', 'Pilon', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_groups`
--

CREATE TABLE `teachers_groups` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers_groups`
--

INSERT INTO `teachers_groups` (`id`, `teacher_id`, `group_id`, `user_id`) VALUES
(1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`, `active`) VALUES
(3, 'charles', '$2a$10$JifejJ5cu6MpZV5SBRg.buq739nG9.pakuW1BQf62fo.8sX.I/1dO', 'admin', 'charles@charles.com', '2015-09-29', '2015-09-29', 1),
(9, 'student', '$2a$10$EFQXeJlc1/zeTuiYk183OuuTBlfkGZmrmO7qpw2Xvdq6nXgjAzQ7G', 'student', 'na@na.com', '2015-10-07', '2015-10-07', 1),
(10, 'teacher', '$2a$10$/U5.PTV9fEIUf1ktqJkA1.gZ3R2s64ZQyeJ5tGnsbCl02tE.vFEYa', 'teacher', 'admin@admin.com', '2015-10-07', '2015-10-07', 1),
(17, 'nananananananbatman', '$2a$10$NHgqlY.50ZkwR/wN2KmspO7qAg4PMnczSSsCKed/G3O9ntyMtPZR.', 'student', 'nawar.danane@gmail.com', '2015-11-11', '2015-11-11', 1),
(18, 'nananan', '$2a$10$kPf33e14hXW5yofvJcSmFeO3jQ5OiA6nyt1YVGmhnLspspYqpSf4.', 'student', 'nawar.danane@gmail.com', '2015-11-11', '2015-11-11', 0),
(19, 'nananna', '$2a$10$HsiA3nELPbgZ6ZBsWvUaBOt5h8LhNShVv2diK0Ldq.pjWtZSEE7hq', 'student', 'nawar.danane@gmail.com', '2015-11-12', '2015-11-12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_groups`
--
ALTER TABLE `students_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_groups`
--
ALTER TABLE `teachers_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `students_groups`
--
ALTER TABLE `students_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teachers_groups`
--
ALTER TABLE `teachers_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
