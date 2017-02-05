-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 02:01 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectx`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `id` int(11) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`id`, `firstName`, `lastName`) VALUES
(1, 'Edwin', 'Semzaba'),
(2, 'Denis', 'pro'),
(3, 'Emmanuel', 'Meena');

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `author` int(30) NOT NULL,
  `copy_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `title`, `category`, `author`, `copy_count`) VALUES
(1, 'Ngoswe kitovu cha uzembe', 'swahili', 1, 1),
(2, 'Mabala the farmer', 'english', 1, 0),
(3, 'advance web technology', 'technology', 2, 8),
(4, 'Mastering Java Standard Edition', 'technology', 3, 95),
(5, 'database prog', 'tech', 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `Borrowed_Book`
--

CREATE TABLE `Borrowed_Book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` varchar(35) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Borrowed_Book`
--

INSERT INTO `Borrowed_Book` (`id`, `book_id`, `user_id`, `date_borrowed`, `date_return`) VALUES
(4, 2, '1', '2017-01-22', '2017-02-01'),
(5, 2, '1', '2017-01-22', '2017-02-05'),
(6, 2, '1', '2017-01-22', '2017-02-05'),
(15, 2, '1', '2017-01-23', '2017-02-06'),
(16, 2, '1', '2017-01-23', '2017-02-06'),
(17, 2, '1', '2017-01-23', '2017-02-06'),
(18, 2, '1', '2017-01-23', '2017-02-06'),
(19, 2, '1', '2017-01-23', '2017-02-06'),
(20, 2, '1', '2017-01-23', '2017-02-06'),
(21, 2, '1', '2017-01-23', '2017-02-06'),
(22, 2, '1', '2017-01-23', '2017-02-06'),
(23, 2, '1', '2017-01-23', '2017-02-06'),
(24, 2, '1', '2017-01-23', '2017-02-06'),
(25, 2, '1', '2017-01-23', '2017-02-06'),
(26, 2, '1', '2017-01-23', '2017-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `Librarian`
--

CREATE TABLE `Librarian` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Requested_Book`
--

CREATE TABLE `Requested_Book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` varchar(30) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(65) NOT NULL,
  `role` int(1) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `firstName`, `lastName`, `phone`, `password`, `role`, `date_joined`) VALUES
('1', 'emmanuel', 'meena', '0719030004', 'fjskfjdskfjsdkfdsjkf', 1, '2017-01-22 17:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Borrowed_Book`
--
ALTER TABLE `Borrowed_Book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Librarian`
--
ALTER TABLE `Librarian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Requested_Book`
--
ALTER TABLE `Requested_Book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Borrowed_Book`
--
ALTER TABLE `Borrowed_Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Librarian`
--
ALTER TABLE `Librarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Requested_Book`
--
ALTER TABLE `Requested_Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
