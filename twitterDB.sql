-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 23.88.65.9:3306
-- Generation Time: Sty 07, 2024 at 03:39 PM
-- Wersja serwera: 10.11.4-MariaDB-1~deb12u1
-- Wersja PHP: 8.2.8

CREATE DATABASE twitter;
use twitter;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_92584`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `tag` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `isForAdult` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `tag`, `img`, `created_at`, `user_id`, `title`, `isForAdult`) VALUES
(146, 'Test for kids', 'test', NULL, '2024-01-07 15:33:02', 22, 'Test', 0),
(147, 'EXAMPLE TEXT', '', NULL, '2024-01-07 15:33:25', 22, 'EXAMPLE TEXT', 0),
(148, 'EXAMPLE TEXT', '', NULL, '2024-01-07 15:33:27', 22, 'EXAMPLE TEXT', 0),
(149, 'EXAMPLE TEXT', '', NULL, '2024-01-07 15:33:30', 22, 'EXAMPLE TEXT', 0),
(150, 'EXAMPLE TEXT', '', NULL, '2024-01-07 15:33:32', 22, 'EXAMPLE TEXT', 0),
(151, 'EXAMPLE TEXT', '', NULL, '2024-01-07 15:33:34', 22, 'EXAMPLE TEXT', 0),
(152, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:33:53', 8, 'EXAMPLE TEXT ADULT', 1),
(153, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:33:59', 8, 'EXAMPLE TEXT ADULT', 1),
(154, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:34:02', 8, 'EXAMPLE TEXT ADULT', 1),
(155, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:34:05', 8, 'EXAMPLE TEXT ADULT', 0),
(156, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:34:08', 8, 'EXAMPLE TEXT ADULT', 1),
(157, 'EXAMPLE TEXT ADULT', '', NULL, '2024-01-07 15:34:11', 8, 'EXAMPLE TEXT ADULT', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `display_name` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `isAdult` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `display_name`, `avatar`, `created_at`, `isAdmin`, `isAdult`) VALUES
(2, 'value1', 'value2', 'value3', NULL, '2023-11-23 20:19:35', 0, 0),
(3, '@skuciak', '$2y$10$jtoJuW5k8nTQl6tGqU5WqOVsrK.cIMi5MQWHiltmn8zyJXUWcDaJi', 'Skuciak', NULL, '2023-12-22 13:28:44', 0, 0),
(4, '@skciak2', '$2y$10$epuoQqpCS1mwD5Y.vAaCvehdLM.AJzX7GlSf/ssf2zcdEqWqjlHmS', 'Skciak2', NULL, '2023-12-22 13:29:43', 0, 0),
(5, '@skciak3', '$2y$10$EuQlr3rwV/tKmmRHpJIByua8S6CEYay5sPysmYsEG8DwFB3iXEfrC', 'Skciak3', NULL, '2023-12-22 13:30:04', 0, 0),
(7, '@pablo123', '$2y$10$ulqoJfEFaYziMI5TnbLwmu827tmcDlvmZ72/1Z3dYSsD2zdl7IZzy', 'pablo 123', '6586beb0e01a7_pobrane-removebg-preview(1).png', '2023-12-22 13:33:08', 0, 0),
(8, '@zaq', '$2y$10$5Wt1DwlUsO6.sTfqxONAiu0FsEFl1gjYikVYo4Jhvfw.ndZOAbevy', 'zaq', '6586b87bc7d06_1cda942ea12d209a97812d83edd887429.png', '2023-12-22 13:34:06', 1, 1),
(13, '@vvv', '$2y$10$aVw0ccPwFlolpeRaQ6wJ0.wHQokdBU5Zh4dQ2SXcjPPXuXlEq9sgu', 'vvv', NULL, '2023-12-22 23:13:30', 0, 0),
(17, '@rrr', '$2y$10$qrEu6gfLUP6ZSAo.OzP5LePvRYrI/OyUcZeDDoTe7Yp6T.amdsRc2', 'rrr', NULL, '2023-12-22 23:17:24', 0, 0),
(20, '@ok1', '$2y$10$4vUoRP.htdlgVqVWqDTAqOSi2lCx1vaH0f4al/yupH4GL9Dr4rEQW', 'ok1', '6586260bca845_1cda942ea12d209a97812d83edd887429.png', '2023-12-22 23:27:26', 0, 0),
(21, '@yyy', '$2y$10$UGP6sKCjl7k5fEyMw0W5Uuau5I41Nx1uWyXAfzZVW9VDEqDHlN12u', 'yyy', NULL, '2023-12-22 23:51:10', 0, 0),
(22, '@zxc', '$2y$10$MjDvVUp8PssPxgnw7GLEtePCaF242xLmA7aT.Hpfk6H/MHlSVs1Oq', 'zxc', '6586c81e29779_pobrane.jpg', '2023-12-23 11:44:29', 0, 0),
(25, '@vvasdwas', '$2y$10$22ju0jxKhOqR9BjliEzhAucdiEGR1fSh8GVZnCcp7vugcDyt0Opdm', 'vvasdwas', NULL, '2023-12-31 12:33:42', 0, 0),
(27, '@admin', '$2y$10$JUJmqSWeWAraFW/dsozi/.ajp.gZmWLsgukI0WjRsjv6K/vCyPmg2', 'admin', NULL, '2024-01-07 15:36:16', 1, 1);

-- --------------------------------------------------------

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments_ibfk_2` (`post_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
