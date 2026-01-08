-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 05:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Project 1', NULL, '2026-01-08 10:36:39', '2026-01-08 10:36:39'),
(6, 'Project 2', NULL, '2026-01-08 10:36:53', '2026-01-08 10:36:53'),
(7, 'Project 3', NULL, '2026-01-08 10:37:03', '2026-01-08 10:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL DEFAULT 'pending',
  `project_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `project_id`, `due_date`, `created_at`, `updated_at`) VALUES
(5, 'Project 1 Task', 'in_progress', 5, '2026-01-08', '2026-01-08 10:37:25', '2026-01-08 10:37:25'),
(6, 'Project 1 Task 2', 'completed', 5, '2026-01-14', '2026-01-08 10:44:00', '2026-01-08 10:44:00'),
(7, 'Project 1 Task 3', 'in_progress', 5, NULL, '2026-01-08 10:44:31', '2026-01-08 10:44:31'),
(8, 'Project 2 Task 1', 'in_progress', 6, NULL, '2026-01-08 10:45:50', '2026-01-08 10:45:50'),
(9, 'Project 2 Task 2', 'pending', 6, NULL, '2026-01-08 10:46:08', '2026-01-08 10:46:08'),
(11, 'Project 2 Task 3', 'pending', 6, NULL, '2026-01-08 10:51:56', '2026-01-08 10:51:56'),
(12, 'Project 3 Task 1', 'pending', 7, '2026-01-08', '2026-01-08 10:52:19', '2026-01-08 10:52:19'),
(13, 'Project 3 Task 2', 'pending', 7, '2026-01-16', '2026-01-08 10:52:31', '2026-01-08 10:52:31'),
(14, 'Project 3 Task 3', 'in_progress', 7, NULL, '2026-01-08 10:52:48', '2026-01-08 10:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
