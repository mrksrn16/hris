-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 06:33 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `overtime` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `isPaid` varchar(10) NOT NULL DEFAULT 'not-paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `employee_id`, `time_in`, `time_out`, `overtime`, `date`, `isPaid`) VALUES
(8, 5, '09:00:00', '10:27:00', -1, '2017-09-09', 'not-paid'),
(9, 1, '10:07:00', '03:51:00', -1, '2017-09-10', 'not-paid'),
(10, 1, '11:43:00', '03:51:00', -1, '2017-09-11', 'not-paid'),
(11, 4, '09:00:00', '11:49:00', -1, '2017-09-11', 'not-paid'),
(12, 1, '09:05:00', '03:51:00', -1, '2017-09-13', 'not-paid'),
(13, 5, '06:00:00', '10:27:00', -1, '2017-09-13', 'not-paid'),
(14, 5, '09:00:00', '10:27:00', -1, '2017-08-21', 'not-paid'),
(15, 1, '10:04:00', '03:51:00', -1, '2017-09-20', 'not-paid'),
(16, 1, '03:47:00', '03:51:00', -1, '2017-09-21', 'not-paid'),
(17, 1, '11:16:00', '03:51:00', -1, '2017-09-23', 'not-paid'),
(18, 1, '08:47:00', '03:51:00', -1, '2017-09-27', 'not-paid'),
(19, 1, '03:31:00', '03:51:00', -1, '2017-09-28', 'not-paid'),
(20, 1, '08:51:00', NULL, NULL, '2017-09-29', 'not-paid'),
(21, 1, '11:03:00', NULL, NULL, '2017-09-30', 'not-paid'),
(22, 5, '11:05:00', '10:27:00', -1, '2017-09-30', 'paid'),
(23, 1, '10:46:00', NULL, NULL, '2017-10-01', 'not-paid'),
(24, 5, '10:13:00', '10:27:00', -1, '2017-10-01', 'paid'),
(25, 1, '10:20:00', NULL, NULL, '2017-10-02', 'not-paid'),
(26, 4, '09:00:00', '19:00:00', 1, '2017-10-02', 'not-paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benefits`
--

CREATE TABLE IF NOT EXISTS `tbl_benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `sss` float NOT NULL,
  `philhealth` float NOT NULL,
  `pagibig` float NOT NULL,
  `tax` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_benefits`
--

INSERT INTO `tbl_benefits` (`id`, `position`, `sss`, `philhealth`, `pagibig`, `tax`) VALUES
(1, 'Supervisor', 491, 162, 100, 0),
(2, 'Manager', 472.3, 150, 255.32, 0),
(3, 'Cashier', 327, 100, 177.06, 0),
(4, 'Staff', 327, 100, 177.06, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bonus`
--

CREATE TABLE IF NOT EXISTS `tbl_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL,
  `isPaid` varchar(10) NOT NULL DEFAULT 'not-paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_bonus`
--

INSERT INTO `tbl_bonus` (`id`, `employee_id`, `amount`, `date`, `notes`, `isPaid`) VALUES
(2, 5, 200, '2017-09-29', 'Clothes', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_rate`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` float NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_employee_rate`
--

INSERT INTO `tbl_employee_rate` (`id`, `rate`, `position`) VALUES
(1, 512, 'Supervisor'),
(2, 491, 'Manager'),
(3, 340, 'Cashier'),
(4, 340, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holidays`
--

CREATE TABLE IF NOT EXISTS `tbl_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_holidays`
--

INSERT INTO `tbl_holidays` (`id`, `date`, `name`, `type`) VALUES
(3, '2017-01-01', 'New Year''s Day', 'regular'),
(4, '2017-03-29', 'Maundy Thursday', 'regular'),
(5, '2017-03-30', 'Good Friday', 'regular'),
(6, '2017-04-09', 'Araw ng Kagitingan', 'regular'),
(7, '2017-05-01', 'Labor Day', 'regular'),
(8, '2017-06-12', 'Independence Day', 'regular'),
(9, '2017-08-27', 'National Heroes Day', 'regular'),
(10, '2017-11-30', 'Bonifacio Day', 'regular'),
(11, '2017-12-25', 'Christmas Day', 'regular'),
(12, '2017-12-30', 'Rizal Day', 'regular'),
(13, '2017-02-16', 'Chinese New Year', 'special'),
(14, '2017-02-25', 'EDSA People Power Revolution Anniversary', 'special'),
(15, '2017-03-31', 'Black Saturday', 'special'),
(16, '2017-08-21', 'Ninoy Aquino Day', 'special'),
(17, '2017-11-01', 'All Saint''s Day', 'special'),
(18, '2017-12-31', 'Last Day of the year', 'special'),
(19, '2017-11-02', 'All Soul''s Day', 'special'),
(20, '2017-12-24', 'Christmas Eve', 'special');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`id`, `employee_id`, `date`, `notes`) VALUES
(1, 5, '2017-09-07', 'sick');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `date`, `employee_id`, `salary`, `status`) VALUES
(1, '2017-10-01', 5, 1000, 'paid'),
(2, '2017-10-01', 5, 2060, 'paid'),
(3, '2017-10-01', 5, 578, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime`
--

CREATE TABLE IF NOT EXISTS `tbl_overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `number_of_hours` int(11) NOT NULL,
  `employee_rate` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_pay` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'not-paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_overtime`
--

INSERT INTO `tbl_overtime` (`id`, `employee_id`, `number_of_hours`, `employee_rate`, `date`, `total_pay`, `status`) VALUES
(8, 4, 1, 100, '2017-09-11', 100, 'not-paid'),
(9, 5, 1, 70, '2017-09-09', 70, 'paid'),
(10, 5, 3, 100, '2017-09-12', 300, 'paid'),
(11, 5, 2, 100, '2017-09-13', 200, 'paid'),
(12, 4, 1, 70, '2017-10-02', 70, 'not-paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pagibig`
--

CREATE TABLE IF NOT EXISTS `tbl_pagibig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_pagibig`
--

INSERT INTO `tbl_pagibig` (`id`, `position`, `amount`) VALUES
(1, 'supervisor', 265.2),
(2, 'manager', 255.32),
(3, 'cashier', 177.06),
(4, 'staff', 177.06);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_philhealth`
--

CREATE TABLE IF NOT EXISTS `tbl_philhealth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_philhealth`
--

INSERT INTO `tbl_philhealth` (`id`, `position`, `amount`) VALUES
(1, 'supervisor', 162.5),
(2, 'manager', 150),
(3, 'cashier', 100),
(4, 'staff', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sss`
--

CREATE TABLE IF NOT EXISTS `tbl_sss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_sss`
--

INSERT INTO `tbl_sss` (`id`, `position`, `amount`) VALUES
(1, 'supervisor', 490.5),
(2, 'manager', 472.3),
(3, 'cashier', 327),
(4, 'staff', 327);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_total_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `total_days` int(11) NOT NULL,
  `employee_rate` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_holidays`
--

CREATE TABLE IF NOT EXISTS `tbl_total_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_holidays` int(11) NOT NULL,
  `employee_rate` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_total_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_leave` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_rate` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access`
--

CREATE TABLE IF NOT EXISTS `tbl_user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user_access`
--

INSERT INTO `tbl_user_access` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'employee', '0192023a7bbd73250516f069df18b500', 'employee'),
(4, 'janedoe', 'a8c0d2a9d332574951a8e4a0af7d516f', 'employee'),
(5, 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE IF NOT EXISTS `tbl_user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'default.png',
  `date_created` date NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `user_id`, `name`, `position`, `email`, `contact`, `address`, `birthday`, `photo`, `date_created`, `role`) VALUES
(1, 1, 'Mark Erwin Serna', 'Developer', 'admin@gmail.com', '123', 'Valenzuela', '2017-08-16', 'default.png', '2017-08-26', 'admin'),
(3, 4, 'Jane Doe', 'Cashier', 'sample@gmail.com', '123', 'Valenzuela', '2017-08-25', 'default.png', '2017-08-26', 'employee'),
(4, 5, 'John Doe', 'Cashier', 'sample@gmail.com', '0935472740', 'Valenzuela City', '2017-08-16', 'default.png', '2017-08-26', 'employee');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_attendance`
--
CREATE TABLE IF NOT EXISTS `vw_attendance` (
`ID` int(11)
,`TIME_IN` time
,`TIME_OUT` time
,`DATE` date
,`LEAVE_DATE` date
,`HOLIDAY` date
);
-- --------------------------------------------------------

--
-- Structure for view `vw_attendance`
--
DROP TABLE IF EXISTS `vw_attendance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_attendance` AS select `a`.`employee_id` AS `ID`,`a`.`time_in` AS `TIME_IN`,`a`.`time_out` AS `TIME_OUT`,`a`.`date` AS `DATE`,`l`.`date` AS `LEAVE_DATE`,`h`.`date` AS `HOLIDAY` from ((`tbl_attendance` `a` join `tbl_holidays` `h`) join `tbl_leave` `l`) where (`a`.`employee_id` = `l`.`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
