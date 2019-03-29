-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 08:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id` int(11) NOT NULL,
  `tags` text,
  `keywords` text,
  `contents` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `tags`, `keywords`, `contents`, `updated_at`, `created_at`) VALUES
(2, 'offer_for_samsung', 'mobile', 'Cheapmobiles at Rs.250 #offerMobile250', '2019-03-09 12:49:07', '2019-03-09 12:49:07'),
(3, 'offerMobile250', 'Rs.250', 'Hsjsj', '2019-03-09 13:03:19', '2019-03-09 13:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `title` text,
  `contents` text,
  `fake` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user`, `title`, `contents`, `fake`, `updated_at`, `created_at`) VALUES
(1, 'mariyan', 'eherh', 'wreherh', 80, '2019-03-19 14:32:03', '2019-03-19 14:32:03'),
(2, 'mariyan', 'heth', 'eherher', 40, '2019-03-19 14:32:52', '2019-03-19 14:32:52'),
(3, 'mariyan', 'mjry', 'mdrt', 20, '2019-03-19 14:33:35', '2019-03-19 14:33:35'),
(4, 'mariyanfdbe', 'vgrewg', 'erbeb', 70, '2019-03-19 14:36:30', '2019-03-19 14:36:30'),
(5, 'mariyan', 'test', 'mine', 50, '2019-03-20 03:50:36', '2019-03-20 03:50:36'),
(6, 'mariyan', '#offer_for_nokia', 'Cheapmobiles at Rs.250 #offerMobile250', 75, '2019-03-20 08:00:50', '2019-03-20 08:00:50'),
(12, 'mariyans', '#offer_for_nokia', 'Cheapmobiles at Rs.250 #offerMobile250', 100, '2019-03-20 08:36:56', '2019-03-20 08:36:56'),
(13, 'mariyan', 'hello', 'i am very sad today', 0, '2019-03-20 08:39:40', '2019-03-20 08:39:40'),
(14, 'mariyan', 'urogu', 'iuyiuywei', 0, '2019-03-20 14:04:08', '2019-03-20 14:04:08'),
(15, 'athulya', '#offer_for_nokia', 'good nokia mobiles at good rate', 0, '2019-03-20 14:08:52', '2019-03-20 14:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `Hobie` text,
  `dp` text,
  `priv` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `age`, `gender`, `mail`, `Hobie`, `dp`, `priv`, `created_at`, `updated_at`) VALUES
(1, 'athulya', 'athulya', 21, 'female', 'athulya@gmail.com', NULL, NULL, 'admin', '2019-03-19 18:53:25', '0000-00-00 00:00:00'),
(2, 'mariyan', 'mariyan', 21, 'female', 'mariyan@gmail.com', 'something', NULL, 'user', '2019-03-19 18:54:21', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
