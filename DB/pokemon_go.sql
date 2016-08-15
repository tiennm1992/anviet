-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 10:13 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon_go`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_post_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_view` int(11) NOT NULL,
  `user_like` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `avatar`, `description`, `content`, `user_post_id`, `type`, `video`, `image`, `user_view`, `user_like`, `comment_id`, `category_id`, `created_datetime`) VALUES
(1, 'cdc', 'uploads/ca6cb0c3d2a7d0b517c9e312c84b27f0.jpg', '', '', 7, 1, 'uploads/ca6cb0c3d2a7d0b517c9e312c84b27f0.jpgca6cb0c3d2a7d0b517c9e312c84b27f0.jpg8844208ccdd9480662fae148e52b154c.JPG', 'uploads/ca6cb0c3d2a7d0b517c9e312c84b27f0.jpgca6cb0c3d2a7d0b517c9e312c84b27f0.jpg', 0, 0, 0, 0, '2016-08-10 14:11:40'),
(2, 'khong gi la hay ca', 'uploads/ca6cb0c3d2a7d0b517c9e312c84b27f0.jpg', '', '', 7, 2, 'uploads/8157570afbb008bf3c4bfe5856443acd.mp4', '', 0, 0, 0, 0, '2016-08-11 09:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `face_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `phone` int(11) NOT NULL,
  `birth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `face_id`, `first_name`, `last_name`, `gender`, `full_name`, `email`, `phone`, `birth`, `avatar`, `address`, `status`, `created_datetime`, `last_login`, `level`) VALUES
(5, 'minhtien', '22925436c2ac8d218ee806cd1fab5949', '', '', '', '', '', '', 0, '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'client_Minh Tiến', '', '1015113148596468', 'Nguyễn', 'Minh Tiến', 'male', 'Nguyễn Minh Tiến', 'minhminhtien1992@gmail.com', 0, '', 'https://graph.facebook.com/1015113148596468/picture?type=large', '', 0, '2016-08-09 14:54:59', '0000-00-00 00:00:00', 0),
(8, 'Minh Thanh', '', '819546618182085', 'Thanh', 'Minh', 'male', 'Minh Thanh', '', 0, '', 'https://graph.facebook.com/819546618182085/picture?type=large', '', 0, '2016-08-10 09:21:46', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
