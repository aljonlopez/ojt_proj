-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 07:01 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cooperative`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan`
--

CREATE TABLE IF NOT EXISTS `tbl_loan` (
  `mem_id` int(11) NOT NULL,
  `dateloangiven` datetime NOT NULL,
  `amountgiven` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loantmp`
--

CREATE TABLE IF NOT EXISTS `tbl_loantmp` (
  `mem_id` int(11) NOT NULL,
  `dateloangiven` datetime NOT NULL,
  `amountgiven` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_cooperative` varchar(255) NOT NULL,
  `mem_lname` varchar(255) NOT NULL,
  `mem_fname` varchar(255) NOT NULL,
  `mem_mname` varchar(255) NOT NULL,
  `mem_gender` varchar(20) NOT NULL,
  `mem_homeaddress` varchar(255) NOT NULL,
  `mem_provaddress` varchar(255) NOT NULL,
  `mem_number` int(11) NOT NULL,
  `mem_email` varchar(255) NOT NULL,
  `mem_age` int(11) NOT NULL,
  `mem_status` varchar(50) NOT NULL,
  `mem_dateofbirth` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mem_privilage` varchar(50) NOT NULL,
  `mem_datecreated` date NOT NULL,
  `mem_imagename` varchar(255) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_cooperative`, `mem_lname`, `mem_fname`, `mem_mname`, `mem_gender`, `mem_homeaddress`, `mem_provaddress`, `mem_number`, `mem_email`, `mem_age`, `mem_status`, `mem_dateofbirth`, `username`, `password`, `mem_privilage`, `mem_datecreated`, `mem_imagename`) VALUES
(2, 'aaa', 'lopez', 'aljon', 'de mesa', 'male', 'manadaluyon', 'batangas', 906, 'aljon_mlopez@yahoo.com', 21, 'single', '2016-12-31 00:00:00', 'aljon', 'lopez', 'member', '0000-00-00', '3.png'),
(3, 'admin', 'zepol', 'lojan', 'mesa', 'male', 'santol', 'balayan', 999, 'lojan.1994.lopez@gmail.com', 21, 'Single', '1994-02-15 00:00:00', 'lojan', 'zepol', 'admin', '2015-12-17', ''),
(4, 'aaa', 'aaa', 'aas', 'aaa', 'male', 'manda', 'bats', 12639810, '@ya', 12, 'single', '2015-12-31 00:00:00', 'aaa', 'aaa', 'member', '0000-00-00', 'eastern.jpeg'),
(8, '', 'try', 'try', '', '', '', '', 0, 'try.try@gmail.com', 0, '', '2016-12-31 00:00:00', 'try', 'try', 'member', '2016-01-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `mem_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`mem_id`, `message`) VALUES
(0, 'Congratulations your request is already approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productsell`
--

CREATE TABLE IF NOT EXISTS `tbl_productsell` (
  `trans_no` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prod_pname` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `validation` varchar(255) NOT NULL,
  PRIMARY KEY (`trans_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_productsell`
--

INSERT INTO `tbl_productsell` (`trans_no`, `prod_name`, `prod_description`, `prod_price`, `user_name`, `user_number`, `date`, `prod_pname`, `mem_id`, `validation`) VALUES
(7, 'haha', 'haha', 70, 'aljon', 906, '2016-01-05 00:00:00', '2.png', 2, 'approve'),
(9, 'bbb', 'bbb', 50, 'aljon', 906, '2016-01-05 00:00:00', 'VOIPwebpg.png', 2, 'approve'),
(10, 'hhh', 'sa', 312, 'aljon', 906, '2016-01-06 00:00:00', '3.png', 2, 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productselltemp`
--

CREATE TABLE IF NOT EXISTS `tbl_productselltemp` (
  `trans_no` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prod_pname` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE IF NOT EXISTS `tbl_reports` (
  `rep_no` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `rep_dateofpayment` datetime NOT NULL,
  `rep_amountbalance` int(11) NOT NULL,
  `rep_term` int(11) NOT NULL,
  `rep_amoutmonthly` int(11) NOT NULL,
  `rep_amounofpay` int(11) NOT NULL,
  `rep_fname` varchar(50) NOT NULL,
  `rep_lname` varchar(50) NOT NULL,
  `rep_mname` varchar(50) NOT NULL,
  PRIMARY KEY (`rep_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`rep_no`, `mem_id`, `rep_dateofpayment`, `rep_amountbalance`, `rep_term`, `rep_amoutmonthly`, `rep_amounofpay`, `rep_fname`, `rep_lname`, `rep_mname`) VALUES
(6, 2, '2016-01-04 00:00:00', 2500, 2, 2500, 2500, 'aljon', 'lopez', 'de mesa'),
(7, 2, '2016-01-04 00:00:00', 0, 2, 2500, 2500, 'aljon', 'lopez', 'de mesa'),
(8, 2, '2016-01-04 00:00:00', 2000, 2, 2000, 2000, 'aljon', 'lopez', 'de mesa'),
(9, 2, '2016-01-04 00:00:00', 0, 2, 2000, 2000, 'aljon', 'lopez', 'de mesa'),
(10, 2, '2016-01-04 00:00:00', 4000, 2, 4000, 4000, 'aljon', 'lopez', 'de mesa'),
(11, 2, '2016-01-04 00:00:00', 0, 2, 4000, 4000, 'aljon', 'lopez', 'de mesa'),
(12, 2, '2016-01-04 00:00:00', 500, 2, 500, 500, 'aljon', 'lopez', 'de mesa'),
(13, 2, '2016-01-04 00:00:00', 0, 2, 500, 500, 'aljon', 'lopez', 'de mesa'),
(14, 2, '2016-01-04 00:00:00', 4500, 2, 4500, 4500, 'aljon', 'lopez', 'de mesa'),
(15, 2, '2016-01-04 00:00:00', 0, 2, 4500, 4500, 'aljon', 'lopez', 'de mesa'),
(16, 2, '2016-01-04 10:49:05', 10, 2, 10, 10, 'aljon', 'lopez', 'de mesa'),
(17, 2, '2016-01-04 10:49:07', 0, 2, 10, 10, 'aljon', 'lopez', 'de mesa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp`
--

CREATE TABLE IF NOT EXISTS `tbl_temp` (
  `rep_no` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `rep_dateofpayment` datetime NOT NULL,
  `rep_amountbalance` int(11) NOT NULL,
  `rep_term` int(11) NOT NULL,
  `rep_amoutmonthly` int(11) NOT NULL,
  `rep_amounofpay` int(11) NOT NULL,
  `rep_fname` varchar(255) NOT NULL,
  `rep_lname` varchar(255) NOT NULL,
  `rep_mname` varchar(255) NOT NULL,
  PRIMARY KEY (`rep_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_temp`
--

INSERT INTO `tbl_temp` (`rep_no`, `mem_id`, `rep_dateofpayment`, `rep_amountbalance`, `rep_term`, `rep_amoutmonthly`, `rep_amounofpay`, `rep_fname`, `rep_lname`, `rep_mname`) VALUES
(9, 2, '2016-01-04 00:00:00', 2500, 2, 2500, 2500, 'aljon', 'lopez', 'de mesa'),
(10, 2, '2016-01-04 00:00:00', 0, 2, 2500, 2500, 'aljon', 'lopez', 'de mesa'),
(11, 2, '2016-01-04 00:00:00', 2000, 2, 2000, 2000, 'aljon', 'lopez', 'de mesa'),
(12, 2, '2016-01-04 00:00:00', 0, 2, 2000, 2000, 'aljon', 'lopez', 'de mesa'),
(13, 2, '2016-01-04 00:00:00', 4000, 2, 4000, 4000, 'aljon', 'lopez', 'de mesa'),
(14, 2, '2016-01-04 00:00:00', 0, 2, 4000, 4000, 'aljon', 'lopez', 'de mesa'),
(15, 2, '2016-01-04 00:00:00', 500, 2, 500, 500, 'aljon', 'lopez', 'de mesa'),
(16, 2, '2016-01-04 00:00:00', 0, 2, 500, 500, 'aljon', 'lopez', 'de mesa'),
(17, 2, '2016-01-04 00:00:00', 4500, 2, 4500, 4500, 'aljon', 'lopez', 'de mesa'),
(18, 2, '2016-01-04 00:00:00', 0, 2, 4500, 4500, 'aljon', 'lopez', 'de mesa'),
(19, 2, '2016-01-04 10:49:05', 10, 2, 10, 10, 'aljon', 'lopez', 'de mesa'),
(20, 2, '2016-01-04 10:49:07', 0, 2, 10, 10, 'aljon', 'lopez', 'de mesa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temploan`
--

CREATE TABLE IF NOT EXISTS `tbl_temploan` (
  `mem_id` int(11) NOT NULL,
  `dateloangiven` datetime NOT NULL,
  `amountgiven` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_temploan`
--

INSERT INTO `tbl_temploan` (`mem_id`, `dateloangiven`, `amountgiven`, `term`, `monthly`, `name`) VALUES
(2, '2016-01-04 10:48:34', 20, 2, 10, 'aljon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_trans` (
  `trans_status` varchar(255) NOT NULL,
  `trans_termleft` int(11) NOT NULL,
  `trans_balance` int(11) NOT NULL,
  `trans_name` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trans`
--

INSERT INTO `tbl_trans` (`trans_status`, `trans_termleft`, `trans_balance`, `trans_name`, `mem_id`) VALUES
('Completed', 0, 0, 'aljon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE IF NOT EXISTS `try` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`id`, `image`) VALUES
(3, '../assets/images/hotline.png'),
(4, 'assets/images/3.png'),
(5, '3.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
