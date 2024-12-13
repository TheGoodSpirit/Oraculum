-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `email`, `password`, `created_at`) VALUES
(1, 'Manish', 'admin1@example.com', 'Admin123', '0000-00-00 00:00:00'),
(2, 'Vishal', 'admin2@example.com', 'Admin123', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `user_id`, `body`, `created_at`, `votes`) VALUES
(1, 1, 1, 'asdfghjkl;', '2024-12-03 00:33:13', 1),
(2, 2, 4, 'qwaesrdtfygubnm', '2024-12-11 00:44:20', 1),
(3, 2, 4, 'I dont know', '2024-12-11 00:52:13', 2),
(4, 6, 4, '+2', '2024-12-11 00:54:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answer_votes`
--

CREATE TABLE `answer_votes` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer_votes`
--

INSERT INTO `answer_votes` (`id`, `answer_id`, `user_id`, `vote`, `created_at`) VALUES
(1, 1, 1, 1, '2024-12-03 00:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `moderation`
--

CREATE TABLE `moderation` (
  `mod_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `user_id`, `title`, `body`, `created_at`) VALUES
(2, 1, 'How does the Agile methodology differ from the Waterfall model in software development?', 'How?', '2024-12-05 01:08:43'),
(3, 1, 'How is this evevn posssible?', 'How', '2024-12-05 01:12:39'),
(4, 2, 'How does the CPU generate logical addresses', 'Why?', '2024-12-05 02:39:14'),
(5, 4, 'How does the CPU generate logical addresses ?', 'when', '2024-12-11 00:49:47'),
(6, 1, 'What is your first school level?', 'level?', '2024-12-11 00:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `saved_questions`
--

CREATE TABLE `saved_questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Manish', 'mannish079@gmail.com', '$2y$10$Bz4xUiXSHlAhG9WHCtEyY.idBftSNt0bmt0YYjmVLdgnWgkVk4VD6', '2024-12-03 00:32:30'),
(14, 'Bishal', 'forgame.np@gmail.com', '$2y$10$afy9.YhrTLS.LQdiv8mOy.uyDkgsQOKJmKRyucr2adp6RPJXJnzwq', '2024-12-12 15:57:32'),
(16, 'gmanish', 'ghimiremanish007@gmail.com', '$2y$10$cpSo9XOfWtMZQClj4VM.LugWAnnqk5dz7JYiHf6uVlAi8p6tOVb8.', '2024-12-12 16:05:28'),
(17, 'Sonali', 'sonuthapa172004@gmail.com', '$2y$10$KzQ/gnP5bQ6Nyz2J7PjiEeAfxLa2ESO0Nhsfsch0/RxTkhkvpcJ82', '2024-12-12 16:22:41'),
(20, 'Suraj', 'surazbashyal@gmail.com', '$2y$10$fP3ZE1e9O45mu9esCK46hO/AsOr549.qY7ELPHJeltmHjbrW3ETB6', '2024-12-12 16:43:35'),
(21, 'Atom', 'atomicdev09@gmail.com', '$2y$10$uwf680jdH8hWy30jXO92r.ICDXKKrsNGhQSpv6IltJvTXoUKClZj.', '2024-12-12 16:45:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `answer_votes`
--
ALTER TABLE `answer_votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vote` (`answer_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `moderation`
--
ALTER TABLE `moderation`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `saved_questions`
--
ALTER TABLE `saved_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answer_votes`
--
ALTER TABLE `answer_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moderation`
--
ALTER TABLE `moderation`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saved_questions`
--
ALTER TABLE `saved_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_votes`
--
ALTER TABLE `answer_votes`
  ADD CONSTRAINT `answer_votes_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`),
  ADD CONSTRAINT `answer_votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`);

--
-- Constraints for table `saved_questions`
--
ALTER TABLE `saved_questions`
  ADD CONSTRAINT `saved_questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `saved_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
