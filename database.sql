-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 27, 2016 at 03:36 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `taskbook`
--
CREATE DATABASE `taskbook` ;

-- --------------------------------------------------------

--
-- Table structure for table `memberLogIn`
--

CREATE TABLE `taskbook`.`memberLogIn` (
  `ID` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberLogIn`
--

INSERT INTO `taskbook`.`memberLogIn` (`ID`, `username`, `password`, `position`) VALUES
(1, 'sagar', 'sagar', 0),
(2, 'ashutosh', 'ashutosh', 0),
(4, 'dipramit', 'dipramit', 0),
(5, 'isha', 'isha', 0),
(6, 'shivanshu', 'shivanshu', 0),
(7, 'rishit', 'rishit', 0),
(8, 'paras', 'paras', 0),
(9, 'sahil', 'sahil', 0),
(10, 'shubham', 'shubham', 0),
(11, 'abhinav', 'abhinav', 0),
(12, 'harshit', 'harshit', 0),
(13, 'pradhumn', 'pradhumn', 0),
(14, 'harsh', 'harsh', 1),
(15, 'rohitkumar', 'rohitk', 1),
(16, 'rohitboga', 'rohitb', 1),
(17, 'ankit', 'ankit', 1),
(18, 'himanshu', 'himanshu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taskAssign`
--

CREATE TABLE `taskbook`.`taskAssign` (
  `ID` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `assignedby` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--
INSERT INTO `taskbook`.`taskAssign` (`ID`, `username`, `task`, `assignedby`) VALUES
(1, 'sagar','' ,'' ),
(2, 'ashutosh',' ','' ),
(4, 'dipramit','' ,'' ),
(5, 'isha','' ,'' ),
(6, 'shivanshu','' ,'' ),
(7, 'rishit','' ,'' ),
(8, 'paras','' ,'' ),
(9, 'sahil','' ,'' ),
(10, 'shubham','' ,'' ),
(11, 'abhinav','' ,'' ),
(12, 'harshit','' ,'' ),
(13, 'pradhumn','' ,'' );
--
-- Indexes for table `memberLogIn`
--
ALTER TABLE `taskbook`.`memberLogIn`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `taskAssign`
--
ALTER TABLE `taskbook`.`taskAssign`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memberLogIn`
--
ALTER TABLE `taskbook`.`memberLogIn`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `taskAssign`
--
ALTER TABLE `taskbook`.`taskAssign`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;