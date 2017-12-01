-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 10:13 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

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
-- Table structure for table `login_portal`
--

CREATE TABLE IF NOT EXISTS `login_portal` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imageupload`
--

CREATE TABLE IF NOT EXISTS `tbl_imageupload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) NOT NULL,
  `trans_no` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `category` varchar(500) NOT NULL,
  `idpicture` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `tbl_imageupload`
--

INSERT INTO `tbl_imageupload` (`id`, `image`, `trans_no`, `mem_id`, `category`, `idpicture`) VALUES
(7, 'talongmaylahi.jpg', 7, 2, 'vegetable', 1),
(8, 'talongtagalog.jpg', 9, 2, 'vegetable', 2),
(9, 'pikomangga.jpg', 10, 2, 'fruit', 3),
(10, 'mangga.jpg', 11, 2, 'fruit', 4),
(11, 'bigas.jpg', 18, 2, 'cereal', 5),
(12, 'bigasmalagkit.jpg', 19, 2, 'cereal', 6),
(13, 'buto_ng_kamatis.jpg', 20, 2, 'seed', 7),
(14, 'silinglabuyo.jpg', 21, 2, 'seed', 8),
(15, 'baboybagongurak.JPG', 22, 2, 'meat & poultry', 9),
(16, 'itlogtagalog.JPG', 23, 2, 'meat & poultry', 10),
(17, 'yellow-bell-flower.jpg', 24, 2, 'flower', 11),
(18, 'sunflower.jpg', 25, 2, 'flower', 12),
(19, 'Lagundi.jpg', 26, 2, 'herbal products', 13),
(119, 'sambong.jpg', 0, 2, 'herbal product', 16),
(109, 'download.jpg', 0, 2, 'other product', 15),
(107, 'download (1).jpg', 0, 2, 'other product', 15),
(108, 'download (2).jpg', 0, 2, 'other product', 15),
(123, 'imageshj.jpg', 0, 2, 'vegetable', 1),
(124, 'imageshj.jpg', 0, 2, 'vegetable', 1),
(125, 'lansones.jpg', 0, 16, 'fruit', 17);

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
  `positionadmin` varchar(255) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_cooperative`, `mem_lname`, `mem_fname`, `mem_mname`, `mem_gender`, `mem_homeaddress`, `mem_provaddress`, `mem_number`, `mem_email`, `mem_age`, `mem_status`, `mem_dateofbirth`, `username`, `password`, `mem_privilage`, `mem_datecreated`, `mem_imagename`, `positionadmin`) VALUES
(2, 'aaa', 'lopez', 'aljon', 'de mesa', 'male', 'manadaluyon', 'batangas', 906, 'aljon_mlopez@yahoo.com', 21, 'single', '2016-12-31 00:00:00', 'aljon', 'lopez', 'member', '0000-00-00', '3.png', ''),
(3, 'aaa', 'anlabo', 'aas', 'aaa', 'male', 'manda', 'bats', 12639810, 'anlabo@yahoo.com', 12, 'single', '2016-12-31 00:00:00', 'lojan', 'zepol', 'admin', '2015-12-17', '', 'CEO'),
(4, 'aaa', 'magulo', 'aas', 'aaa', 'male', 'manda', 'bats', 12639810, 'magulo@yahoo.com', 12, 'single', '2016-12-31 00:00:00', 'aaa', 'aaa', 'member', '0000-00-00', '', ''),
(14, '', 'admin', 'admin', 'admin', 'male', 'admin', 'admin', 1237891, 'admin@gmail.com', 25, 'single', '2016-12-31 00:00:00', 'admin', 'admin', 'admin', '2016-01-18', 'product.jpg', 'CEO'),
(15, '', 'user1', 'user1', 'user1', 'male', 'user1', 'user1', 1723981297, 'user1@gmail.com', 21, 'single', '2011-07-29 00:00:00', 'user1', 'user1', 'member', '2016-01-19', 'ngaun.jpg', 'bbb'),
(16, 'aaa', 'ngaun', 'ngaun', 'ngaun', 'male', 'ngaun', 'ngaun', 123, 'ngaun@gmail.com', 23, 'single', '1994-02-05 00:00:00', 'ngaun', 'ngaun', 'member', '2016-01-19', 'now.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `mem_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productsell`
--

CREATE TABLE IF NOT EXISTS `tbl_productsell` (
  `trans_no` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prod_pname` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `validation` varchar(255) NOT NULL,
  `category` varchar(500) NOT NULL,
  `idpicture` int(11) NOT NULL,
  PRIMARY KEY (`trans_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `tbl_productsell`
--

INSERT INTO `tbl_productsell` (`trans_no`, `prod_name`, `prod_description`, `user_name`, `user_number`, `date`, `prod_pname`, `mem_id`, `validation`, `category`, `idpicture`) VALUES
(7, 'talong na kulay violet', 'ito ang violet na talong a', 'aljon', 906, '2016-01-05 00:00:00', 'imageshj.jpg', 2, 'approve', 'vegetable', 1),
(9, 'Talong na tagalog', 'ito ay bihira lng sa syodad sa probinsya ito madami', 'aljon', 906, '2016-01-05 00:00:00', 'talongtagalog.jpg', 2, 'approve', 'vegetable', 2),
(10, 'mangga na piko', 'ito ay mahahaba na mangga', 'aljon', 906, '2016-01-06 00:00:00', 'pikomangga.jpg', 2, 'approve', 'fruit', 3),
(11, 'Mangga na indian', 'mangga na mejo bilog', 'aljon', 906, '2016-01-07 14:35:29', 'mangga.jpg', 2, 'approve', 'fruit', 4),
(18, 'rice', 'bigas na maputi at masarap', 'aljon', 906, '2016-01-14 00:00:00', 'bigas.jpg', 2, 'approve', 'cereal', 5),
(19, 'bigas na malagkit', 'ito ay bigas na hndi isinasaing ito ay ginagamat na pang suman at kung ano ano na malagkit', 'aljon', 906, '2016-01-14 00:00:00', 'bigasmalagkit.jpg', 2, 'approve', 'cereal', 6),
(20, 'tomato seed', 'pantanim na kamatis para meron na kau', 'aljon', 906, '2016-01-14 00:00:00', 'buto_ng_kamatis.jpg', 2, 'approve', 'seed', 7),
(21, 'chili seed', 'buto ng siling labuyo itanim nio para meron na kau', 'aljon', 906, '2016-01-14 00:00:00', 'silinglabuyo.jpg', 2, 'approve', 'seed', 8),
(22, 'meat', 'karneng baboy bagong urak lang', 'aljon', 906, '2016-01-14 00:00:00', 'baboybagongurak.JPG', 2, 'approve', 'meat & poultry', 9),
(23, 'egg', 'itlog ng tagalog na manok fresh na fresh', 'aljon', 906, '2016-01-14 00:00:00', 'itlogtagalog.JPG', 2, 'approve', 'meat & poultry', 10),
(24, 'Yellow bell', 'bulaklak na madali tumubo', 'aljon', 906, '2016-01-14 00:00:00', 'yellow-bell-flower.jpg', 2, 'approve', 'flower', 11),
(25, 'sunflower', 'para marawan buhay nio', 'aljon', 906, '2016-01-14 00:00:00', 'sunflower.jpg', 2, 'approve', 'flower', 12),
(26, 'lagundi', 'pangpagaaan ng ubo nio', 'aljon', 906, '2016-01-14 00:00:00', 'Lagundi.jpg', 2, 'approve', 'herbal product', 13),
(92, 'animal', 'mga malulupit na hayop', 'aljon', 906, '2016-01-15 11:03:35', 'download.jpg', 2, 'approve', 'other product', 15),
(104, 'sambong', 'gamot kahit saan', 'aljon', 906, '2016-01-18 11:54:32', 'sambong.jpg', 2, 'approve', 'herbal product', 16),
(105, 'lansones', 'prutas na malupit', 'ngaun', 123, '2016-01-19 11:32:07', 'lansones.jpg', 16, 'approve', 'fruit', 17);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`rep_no`, `mem_id`, `rep_dateofpayment`, `rep_amountbalance`, `rep_term`, `rep_amoutmonthly`, `rep_amounofpay`, `rep_fname`, `rep_lname`, `rep_mname`) VALUES
(16, 2, '2016-01-04 10:49:05', 10, 2, 10, 10, 'aljon', 'lopez', 'de mesa'),
(17, 2, '2016-01-04 10:49:07', 0, 2, 10, 10, 'aljon', 'lopez', 'de mesa'),
(18, 2, '2016-01-06 17:56:39', 0, 2, 1000, 2000, 'aljon', 'lopez', 'de mesa'),
(19, 16, '2016-01-19 10:44:56', 2500, 2, 2500, 2500, 'ngaun', 'ngaun', 'ngaun'),
(20, 16, '2016-01-19 10:44:59', 0, 2, 2500, 2500, 'ngaun', 'ngaun', 'ngaun');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(20, 2, '2016-01-04 10:49:07', 0, 2, 10, 10, 'aljon', 'lopez', 'de mesa'),
(21, 2, '2016-01-06 17:56:39', 0, 2, 1000, 2000, 'aljon', 'lopez', 'de mesa'),
(22, 16, '2016-01-19 10:44:56', 2500, 2, 2500, 2500, 'ngaun', 'ngaun', 'ngaun'),
(23, 16, '2016-01-19 10:44:59', 0, 2, 2500, 2500, 'ngaun', 'ngaun', 'ngaun');

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
(16, '2016-01-19 10:42:21', 5000, 2, 2500, 'ngaun');

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
('Completed', 0, 0, 'ngaun', 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
