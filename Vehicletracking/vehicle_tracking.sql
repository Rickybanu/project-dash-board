-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2012 at 01:51 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicle_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `emp_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `emp_emailId` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `date_birth` date NOT NULL,
  `emp_gender` varchar(200) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50006 ;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `first_name`, `last_name`, `emp_emailId`, `password`, `address1`, `address2`, `date_birth`, `emp_gender`, `emp_designation`) VALUES
(50005, 'Bala', 'M', 'bala@gmail.com', 'welcome', 'tuty', 'tuty', '1985-02-06', 'Male', 'Manager'),
(50004, 'Kalai', 'selvan', 'dsfgf@gmail.com', 'welcome', 'tuty', 'tuty', '1985-02-02', 'Male', 'Manager'),
(50003, 'testvalue', 'display', 'abc@abcd.com', 'welcome', 'tuty', 'tuty', '2010-02-01', 'Male', 'Engineer'),
(50002, 'Ganesh', 'Test', 'abc@abc.com', 'welcome', 'tuty', 'tuty', '1985-02-03', 'Male', 'Manager'),
(50001, 'Sundar', 'Murugesan', 'sundarsvtm@gmail.com', 'welcome', 'Tuty', 'Tuty', '2002-03-01', 'Male', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email_Id` varchar(300) NOT NULL,
  `emp_designation` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `email_Id`, `emp_designation`) VALUES
(1, 'Sundar', 'welcome', 'sundar', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE IF NOT EXISTS `vehicle_details` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_category` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `emp_id` bigint(100) NOT NULL,
  `vehicle_number` varchar(200) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `vehicle_status` varchar(200) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1009 ;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`vehicle_id`, `vehicle_category`, `vehicle_type`, `emp_id`, `vehicle_number`, `time_in`, `time_out`, `vehicle_status`) VALUES
(1000, 'Staff Vehicle', 'Two Wheeler', 50002, 'TN 72 AH 5682', '2012-03-07 00:40:38', '2012-04-19 18:54:56', 'Closed'),
(1005, 'Student vehicle', 'Four Wheeler', 50001, 'Test Vehicle', '2012-04-20 18:25:38', '2012-04-21 07:07:04', 'Closed'),
(1006, 'College vehicle', 'Two Wheeler', 50001, 'TN 69 AH 3232', '2012-04-20 18:55:35', '2012-04-20 06:07:03', 'Closed'),
(1007, 'College vehicle', 'Four Wheeler', 50001, '9999', '2012-04-26 19:40:09', '2012-04-27 19:40:36', 'Closed'),
(1008, 'College vehicle', 'Two Wheeler', 50001, 'TN 69 AH 3232', '2012-04-27 19:45:34', '2012-04-27 19:45:49', 'Closed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
