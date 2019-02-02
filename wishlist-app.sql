-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2019 at 06:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wishlist-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE `item_tbl` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(255) NOT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_url` varchar(255) NOT NULL,
  `item_priority` int(11) NOT NULL,
  `item_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`item_id`, `user_id`, `item_name`, `item_price`, `item_description`, `item_url`, `item_priority`, `item_image`) VALUES
(28, 5, 'Cinema Tickets', 12312, 'sdadsa', 'dasdas', 1, NULL),
(32, 5, 'Kittens', 250, 'Down down and up', 'www.google.com', 1, NULL),
(106, 41, 'Dogs', 21321, 'sadasd', 'dsadasdsa', 1, NULL),
(107, 41, 'asdsadsadsa', 232, 'sadasd', 'sadasd2321', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `priority_tbl`
--

CREATE TABLE `priority_tbl` (
  `priority_id` int(11) NOT NULL,
  `priority_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priority_tbl`
--

INSERT INTO `priority_tbl` (`priority_id`, `priority_name`) VALUES
(1, 'Must Have'),
(2, 'Nice to Have'),
(3, 'If You Can');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_list_name` varchar(255) DEFAULT NULL,
  `user_list_description` varchar(255) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `user_name`, `user_email`, `user_password`, `user_list_name`, `user_list_description`, `user_active`) VALUES
(4, 'Vihanga', 'vihanga123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Chrsitsmas', 'Cllectionssssss', 1),
(5, 'Banda', 'banda123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Summer Wishes', 'Summer time', 0),
(38, 'Cat', 'Cat@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'This is cat\'s list', 'This is a description of the cats list', 0),
(39, 'Jill', 'Jill@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'This is mokakhari', 'This is ', 0),
(40, 'Jack', 'Jack@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'This jack\'s List', 'This is his decription for the list', 0),
(41, 'Cats', 'Cats@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Cat\'s List', 'This is cats desc', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_priority` (`item_priority`);

--
-- Indexes for table `priority_tbl`
--
ALTER TABLE `priority_tbl`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD CONSTRAINT `item_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`user_id`),
  ADD CONSTRAINT `item_tbl_ibfk_2` FOREIGN KEY (`item_priority`) REFERENCES `priority_tbl` (`priority_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
