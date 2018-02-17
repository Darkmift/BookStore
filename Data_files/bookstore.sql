-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 01:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(60) DEFAULT NULL,
  `author_name` varchar(60) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `img_url` mediumtext,
  `year` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `NAME`, `author_name`, `price`, `img_url`, `year`) VALUES
(1, '×¤×¨×?×?×?×¨ ×?.×?', 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9d', 0, '1987-11-28', '0000-00-00'),
(2, '×?×? ×?×?×?×?×?× ×?×¢×©×?×? ×?×?', '×?×?×?×? ×?\'×?× ×?', 74.21, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/011250726.jpg', '1985-01-26'),
(3, '×?×? ×?×?×?×?×?× ×?×¢×©×?×? ×?×?', '×?×?×?×? ×?\'×?× ×?', 69.64, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/010073646.jpg', '2011-02-24'),
(4, 'תן למילים לעשות בך', 'פרייזר ט.מ', 99.34, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/011250726.jpg', '2010-01-04'),
(5, 'תן למילים לעשות בך', 'סטיב ג\'ונס', 74.96, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/010073646.jpg', '1998-04-11'),
(6, 'רודן', 'פרייזר ט.מ', 88.34, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/011324074.jpg', '2008-11-17'),
(7, '×?×? ×?×?×?×?×?× ×?×¢×©×?×? ×?×?', '×?×?×?×? ×?\'×?× ×?', 94.76, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/010073646.jpg', '2003-03-09'),
(8, '×?×?×?×?×? ×?× ×?×©', '×?×?×?×? ×?\'×?× ×?', 63.7, 'steim.amazingcdn.space/catalog/product/cache/1/image/300x/9df78eab33525d08d6e5fb8d27136e95/0/1/011324074.jpg', '1991-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(60) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `NAME`, `phone`) VALUES
(1, 'Optimus Prime', '0549876541'),
(2, 'דניאל שטרן', '0549876543'),
(3, 'קובי בן-שטרית', '0549876542');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `buy_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
