-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2021 at 03:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_15_131618_todo_table', 1);

--
-- Dumping data for table `todo_table`
--

INSERT INTO `todo_table` (`id`, `task_title`, `assigned_by`, `assigned_to`, `task_status`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Interior', 'cal', NULL, 'changes', 'ckencindicidncidcnincdcdc', '2021-06-15 13:06:50', '2021-06-15 14:28:42'),
(3, 'Flooring123', 'ram', 'caleb', 'changes', 'itnigniginrtgitgrg', '2021-06-15 14:25:30', '2021-06-15 14:33:41');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'caleb', 'caleb@gmail.com', NULL, 'alliswell', NULL, NULL, NULL),
(2, 'ram', 'ram@gmail.com', NULL, '$2y$10$lzdkU2BPxBhu.z5VejSexO6iiSmS/7D1hsD.3qZknS6TGO2oUOhne', NULL, '2021-06-15 14:20:11', '2021-06-15 14:20:11'),
(3, 'rueben', 'patrick@gmail.com', NULL, '$2y$10$THjNSt6/PYJ5Ec3uy7iP8u9rk0fCkj4gVRyl2JO5WAox9olv6Bo6a', NULL, '2021-06-15 22:59:44', '2021-06-15 22:59:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
