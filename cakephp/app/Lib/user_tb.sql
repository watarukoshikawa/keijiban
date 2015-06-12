-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 6 朁E08 日 16:01
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kensyu_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_tb`
--

CREATE TABLE IF NOT EXISTS `user_tb` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `value` int(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_tb`
--

INSERT INTO `user_tb` (`id`, `name`, `value`, `pass`, `date`) VALUES
(1, 'saito', 100, '3110', '0000-00-00 00:00:00'),
(2, 'yudai', 1000, 'saito', '2015-06-05 17:54:46'),
(12, 'test', 4545, 'test', '2015-06-08 14:06:24'),
(13, 'a', 1, 'aaaaa', '2015-06-08 14:19:08'),
(14, 'test33', 33, 'test33', '2015-06-08 14:23:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
