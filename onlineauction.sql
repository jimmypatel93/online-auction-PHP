-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 12:34 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `ProductID` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `basePrice` int(10) NOT NULL,
  `bidAmount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`ProductID`, `user_id`, `name`, `basePrice`, `bidAmount`) VALUES
('2', 'x0d3pw', 'bag', 3, 20),
('3', 'x0d3pw', 'bird', 10, 20),
('5', '6jyf9g', 'car', 32000, 33000),
('5', '6jyf9g', 'car', 32000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `BasePrice` int(10) NOT NULL,
  `description` text NOT NULL,
  `active` int(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `user_id`, `Name`, `BasePrice`, `description`, `active`, `date`) VALUES
(5, 'x0d3pw', 'car', 32000, 'This is an antique car, build in 1934. ', 1, '21-Dec-2016  22:52:33'),
(6, 'x0d3pw', 'case', 800, 'This is the case which is used to keep antique jewellery. ', 1, '21-Dec-2016  22:53:29'),
(7, '6jyf9g', 'castle painting', 1200, 'This is the famous painting of castle.', 1, '21-Dec-2016  23:00:29'),
(8, '6jyf9g', 'watch', 120, 'This is the watch build in 1912. ', 1, '21-Dec-2016  23:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(500) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `Active` int(10) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `FirstName`, `LastName`, `username`, `password`, `emailId`, `Active`, `date`) VALUES
('6jyf9g', 'Aniket', 'Tare', 'aniket', 'aniket', 'aniket@gmail.com', 1, '21-Dec-2016  22:57:22'),
('x0d3pw', 'jimmy', 'patel', 'jimmy', 'jimmy', 'j@gmail.com', 1, '18-Dec-2016  05:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);
ALTER TABLE `product` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
