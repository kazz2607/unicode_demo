-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 01, 2024 at 10:41 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unicode-demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `status`, `create_at`, `update_at`, `deleted_at`) VALUES
(6, 'Bài viết 2', 'Bài viết 2', 0, NULL, '2024-11-01 08:39:54', '2024-11-01 08:39:54'),
(8, 'Bài viết 4', 'Bài viết 4', 0, NULL, '2024-11-01 08:39:22', NULL),
(9, 'Bài viết 1', 'Bài viết 1', 0, NULL, '2024-11-01 08:39:21', NULL),
(10, 'Bài viết 2', 'Bài viết 2', 0, NULL, NULL, NULL),
(11, 'Bài viết 3', 'Bài viết 3', 0, NULL, NULL, NULL),
(12, 'Bài viết 4', 'Bài viết 4', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group_id`, `status`, `trash`, `create_at`, `update_at`) VALUES
(3, 'Văn D', 'info@webvina.net', 1, 1, 0, '2024-10-29 11:38:31', '2024-10-31 12:37:26'),
(4, 'Văn C', 'nguyentuanltc@gmail.com', 2, 1, 0, '2024-10-30 01:46:59', '2024-10-30 13:13:32'),
(5, 'Văn B', 'nguyentuan@gmail.com', 1, 0, 0, '2024-10-30 03:17:51', '2024-10-30 13:13:24'),
(6, 'Văn A - Update', '22@webvina.net', 2, 0, 0, '2024-10-30 03:38:08', '2024-10-31 14:02:57'),
(7, 'Văn E', 'nguyentuan2607@gmail.com', 1, 1, 0, '2024-10-30 03:52:00', '2024-10-31 14:02:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
