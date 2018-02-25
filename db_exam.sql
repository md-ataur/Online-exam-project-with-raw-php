-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 07:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_answer` (
`id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`id`, `quesNo`, `rightAns`, `answer`) VALUES
(1, 1, 1, 'Hyper Text Markup Language'),
(2, 1, 0, 'Hyperlinks and Text Markup Language'),
(3, 1, 0, 'Home Tool Markup Language'),
(4, 1, 0, 'Home Txt Markup Language'),
(5, 2, 0, 'Mozilla'),
(6, 2, 1, 'The World Wide Web Consortium'),
(7, 2, 0, 'Microsoft'),
(8, 2, 0, 'Google'),
(9, 3, 0, 'Computer Style Sheets'),
(10, 3, 0, 'Colorful Style Sheets'),
(11, 3, 1, 'Cascading Style Sheets'),
(12, 3, 0, 'Creative Style Sheets'),
(37, 4, 0, '&lt;scripting&gt;'),
(38, 4, 1, '&lt;script&gt;'),
(39, 4, 0, '&lt;javascript&gt;'),
(40, 4, 0, '&lt;js&gt;'),
(41, 5, 0, 'alertBox("Hello World");'),
(42, 5, 1, 'alert("Hello World");'),
(43, 5, 0, 'msgBox("Hello World");'),
(44, 5, 0, 'msg("Hello World");'),
(45, 6, 0, 'function = myFunction()'),
(46, 6, 1, 'function myFunction()'),
(47, 6, 0, 'function:myFunction()'),
(48, 6, 0, 'myFunction()'),
(49, 7, 1, 'if (i == 5)'),
(50, 7, 0, 'if i = 5'),
(51, 7, 0, 'if i = 5 then'),
(52, 7, 0, 'if i == 5 then'),
(53, 8, 0, 'Personal Hypertext Processor'),
(54, 8, 1, 'PHP: Hypertext Preprocessor'),
(55, 8, 0, 'Private Home Page'),
(56, 8, 0, 'Personal Home Page');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
`id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'What does HTML stand for?'),
(2, 2, 'Who is making the Web standards?'),
(3, 3, 'What does CSS stand for?'),
(10, 4, ' Inside which HTML element do we put the JavaScript?'),
(11, 5, 'How do you write "Hello World" in an alert box?'),
(12, 6, 'How do you create a function in JavaScript?'),
(13, 7, 'How to write an IF statement in JavaScript?'),
(14, 8, 'What does PHP stand for?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(7, 'Karim Ullah', 'karim', '81dc9bdb52d04dc20036dbd8313ed055', 'karim@gmail.com', 1),
(9, 'Khalid Aman', 'khalid', '81dc9bdb52d04dc20036dbd8313ed055', 'khalid@gmail.com', 0),
(10, 'Ataur Rahman', 'ataur', '81dc9bdb52d04dc20036dbd8313ed055', 'ataur@gmail.com', 0),
(11, 'Hadiqul Islam', 'hadiqul', '81dc9bdb52d04dc20036dbd8313ed055', 'hadiqul@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
