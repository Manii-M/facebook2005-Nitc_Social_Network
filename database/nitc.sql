-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 02:31 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nitc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `comment`) VALUES
(4, 'dhiraj@gmail.com', 'radheysaraan@gmail.com', 'text'),
(5, 'manishsahu8696@gmail.com', 'dhiraj@gmail.com', 'fdf'),
(6, 'dhiraj@gmail.com', 'manishsahu8696@gmail.com', 'hii'),
(7, 'dhiraj@gmail.com', 'radheysaraan@gmail.com', 'test'),
(8, 'dhiraj@gmail.com', 'manishsahu8696@gmail.com', ',mk.,');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`count` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`count`, `id`, `comment`, `email`) VALUES
(1, 4, 'good', 'post/s_288259b26d5ca7684.jpg'),
(2, 4, 'nice', 'post/s_288259b26d5ca7684.jpg'),
(3, 4, 'gf', 'post/s_288259b26d5ca7684.jpg'),
(4, 4, 'testing', 'dhiraj@gmail.com'),
(5, 4, 'test2', 'dhiraj@gmail.com'),
(6, 4, 'dkjewf', 'dhiraj@gmail.com'),
(7, 7, 'test1', 'dhiraj@gmail.com'),
(8, 7, 'test2', 'dhiraj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
`id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `s_status` varchar(50) NOT NULL,
  `r_status` varchar(50) NOT NULL,
  `friends` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sender`, `receiver`, `s_status`, `r_status`, `friends`) VALUES
(26, 'dhiraj@gmail.com', 'radheysaraan@gmail.com', 'SEND', 'ACCEPTED', 'YES'),
(27, 'hitesh@gmail.com', 'radheysaraan@gmail.com', 'SEND', 'ACCEPTED', 'YES'),
(28, 'manishsahu8696@gmail.com', 'dhiraj@gmail.com', 'SEND', 'ACCEPTED', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE IF NOT EXISTS `friend_list` (
`id` int(11) NOT NULL,
  `user1` varchar(100) NOT NULL,
  `user2` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`id`, `user1`, `user2`, `status`) VALUES
(4, 'dhiraj@gmail.com', 'radheysaraan@gmail.com', 'YES'),
(5, 'radheysaraan@gmail.com', 'dhiraj@gmail.com', 'YES'),
(6, 'hitesh@gmail.com', 'radheysaraan@gmail.com', 'YES'),
(7, 'radheysaraan@gmail.com', 'hitesh@gmail.com', 'YES'),
(8, 'manishsahu8696@gmail.com', 'dhiraj@gmail.com', 'YES'),
(9, 'dhiraj@gmail.com', 'manishsahu8696@gmail.com', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `username` varchar(50) NOT NULL,
  `rcv` varchar(50) NOT NULL,
  `msg` varchar(60000) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`username`, `rcv`, `msg`, `id`) VALUES
('manishsahu8696@gmail.com', 'manishsahu8696@gmail.com', 'hii', 1),
('manishsahu8696@gmail.com', 'hitesh@gmail.com', 'Hii', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `text` varchar(200) NOT NULL,
  `like` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `email`, `image`, `text`, `like`, `status`) VALUES
(3, 'manishsahu8696@gmail.com', 'post/s_382559b26d14b1635.jpg', 'test', '', ''),
(4, 'manishsahu8696@gmail.com', 'post/s_288259b26d5ca7684.jpg', 'hello NiTC', '4', 'TRUE'),
(5, 'dhiraj@gmail.com', 'post/s_598859db2116037f4.jpg', 'hii', '1', 'TRUE'),
(6, 'dhiraj@gmail.com', 'post/s_607759db224a8f0f5.jpg', ' testing', '17', 'TRUE'),
(7, 'dhiraj@gmail.com', 'post/s_612259db4ec44b556.png', 'test', '3', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fname`, `lname`, `email`, `password`, `mobile`, `dob`, `gender`, `image`) VALUES
('Dhiraj', 'Sahu', 'dhiraj@gmail.com', '5961', '7879767470', '31/10/1992', 'male', 'profilepic/ganeshqq.jpg'),
('Hitesh', 'Sahu', 'hitesh@gmail.com', '2711', '8960437205', '07/08/1994', 'male', 'profilepic/16.jpg'),
('Manish', 'Sahu', 'manishsahu8696@gmail.com', '3976', '8602811878', '02/12/1996', 'male', 'profilepic/Capture.JPG'),
('Radhey', 'Baba', 'radheysaraan@gmail.com', '3049', '8963214755', '1992-04-01', 'male', 'profilepic/thumb-1920-675871.jpg'),
('Rahul', 'Kumar', 'rahul@gmail.com', '7698', '8963214754', '2012-12-02', 'male', 'profilepic/Capture.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`count`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`email`,`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `count` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
