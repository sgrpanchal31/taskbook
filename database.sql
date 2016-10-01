-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 28, 2016 at 07:03 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE `taskbook`;
--
-- Database: `taskbook`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskAssign`
--

INSERT INTO `taskbook`.`taskAssign` (`ID`, `username`, `task`, `assignedby`) VALUES
(1, 'sagar', NULL, NULL),
(2, 'ashutosh', NULL, NULL),
(4, 'dipramit', NULL, NULL),
(5, 'isha', NULL, NULL),
(6, 'shivanshu', NULL, NULL),
(7, 'rishit', NULL, NULL),
(8, 'paras', NULL, NULL),
(9, 'sahil', NULL, NULL),
(10, 'shubham', NULL, NULL),
(11, 'abhinav', NULL, NULL),
(12, 'harshit', NULL, NULL),
(13, 'pradhumn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taskTable`
--

CREATE TABLE `taskbook`.`taskTable` (
  `ID` int(4) NOT NULL,
  `assignedBy` varchar(30) NOT NULL,
  `assignedTo` varchar(30) NOT NULL,
  `task` varchar(255) NOT NULL,
  `taskID` int(11) ,
  `status` int(2) NOT NULL,
  `assignedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `completedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--
INSERT INTO `taskbook`.`taskTable`(`ID`,`assignedBy`,`assignedTo`,`task`,`taskID`,`status`,`assignedTime`,`completedTime`) VALUES
(1,'','sagar','','',2,'',''),
(2,'','ashutosh','','',2,'',''),
(3,'','dipramit','','',2,'',''),
(4,'','isha','','',2,'',''),
(5,'','shivanshu','','',2,'',''),
(6,'','rishit','','',2,'',''),
(7,'','paras','','',2,'',''),
(8,'','sahil','','',2,'',''),
(9,'','shubham','','',2,'',''),
(10,'','abhinav','','',2,'',''),
(11,'','harshit','','',2,'',''),
(12,'','pradhumn','','',2,'','');


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
-- Indexes for table `taskTable`
--
ALTER TABLE `taskbook`.`taskTable`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `taskTable`
--
ALTER TABLE `taskbook`.`taskTable`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;