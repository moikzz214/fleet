-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 10:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moikzz_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `mz_balances`
--

CREATE TABLE `mz_balances` (
  `zid` bigint(20) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zbalance` double NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_balances`
--

INSERT INTO `mz_balances` (`zid`, `zparent`, `zbalance`, `updated_date`) VALUES
(1, 1, 8.6, '2019-05-28 08:32:04'),
(2, 2, 0, '2019-05-27 05:33:45'),
(3, 3, 127.5, '2019-05-27 05:33:49'),
(4, 4, 11.35, '2019-05-30 06:51:59'),
(5, 5, 250, '2019-05-27 05:33:53'),
(6, 6, 127.5, '2019-05-27 05:33:55'),
(7, 7, 30.7, '2019-05-27 07:01:04'),
(8, 8, 250, '2019-05-27 05:33:59'),
(9, 9, 127.5, '2019-05-27 05:34:02'),
(10, 10, 35.85, '2019-05-29 09:53:04'),
(11, 11, 12, '2019-06-02 07:03:26'),
(12, 12, 29.7, '2019-06-09 08:48:28'),
(13, 13, 141, '2019-06-11 05:28:55'),
(14, 14, 18.5, '2019-06-11 05:28:21'),
(15, 15, 31.85, '2019-06-10 11:42:00'),
(16, 16, 36.85, '2019-06-10 10:59:07'),
(17, 17, 46.5, '2019-06-11 06:14:56'),
(18, 64, 0, '2019-06-11 08:16:37'),
(19, 65, 0, '2019-06-11 08:29:45'),
(20, 66, 0, '2019-06-11 08:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `mz_categories`
--

CREATE TABLE `mz_categories` (
  `zid` bigint(20) NOT NULL,
  `ztitle` tinytext NOT NULL,
  `ztype` varchar(50) NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_categories`
--

INSERT INTO `mz_categories` (`zid`, `ztitle`, `ztype`, `zauthor`, `zdate_published`, `zparent`, `zstatus`) VALUES
(1, 'Cat 1', 'product', 1, '2019-04-29 00:00:00', 0, 9),
(2, 'Cat 2', 'product', 1, '2019-04-29 00:00:00', 0, 9),
(3, 'Cat 3', 'product', 1, '2019-04-29 00:00:00', 0, 9),
(4, 'Cat 4', 'page', 1, '2019-05-01 00:00:00', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mz_chat_conversation`
--

CREATE TABLE `mz_chat_conversation` (
  `zid` bigint(20) NOT NULL,
  `zchat_session` bigint(20) NOT NULL,
  `zcontent` varchar(250) NOT NULL,
  `zdate_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zstatus` int(2) NOT NULL,
  `zread` int(1) NOT NULL,
  `zauthor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_chat_session`
--

CREATE TABLE `mz_chat_session` (
  `zid` bigint(20) NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zchatwith` bigint(20) NOT NULL,
  `ztype` varchar(15) NOT NULL DEFAULT 'private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_comments`
--

CREATE TABLE `mz_comments` (
  `zid` bigint(20) NOT NULL,
  `ztitle` tinytext NOT NULL,
  `zcontent` mediumtext NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zemail` varchar(150) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_contactform`
--

CREATE TABLE `mz_contactform` (
  `zid` bigint(20) NOT NULL,
  `ztitle` text NOT NULL,
  `zcontent` text NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zsend_to` varchar(150) NOT NULL,
  `zsend_from` varchar(150) NOT NULL,
  `zsend_cc` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_extras_free`
--

CREATE TABLE `mz_extras_free` (
  `zid` bigint(20) NOT NULL,
  `ztitle` varchar(200) NOT NULL,
  `ztype` varchar(50) NOT NULL,
  `zstatus` int(2) NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zdate_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_extras_free`
--

INSERT INTO `mz_extras_free` (`zid`, `ztitle`, `ztype`, `zstatus`, `zauthor`, `zdate_published`) VALUES
(1, 'Water', 'meal', 9, 0, '2019-06-10 09:54:40'),
(2, 'Juice', 'meal', 9, 0, '2019-06-09 08:25:46'),
(3, 'Bread', 'meal', 9, 0, '2019-06-09 08:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `mz_history`
--

CREATE TABLE `mz_history` (
  `zid` bigint(20) NOT NULL,
  `his_type` varchar(80) NOT NULL,
  `his_type_id` bigint(20) NOT NULL,
  `his_field_new` text NOT NULL,
  `his_field_old` text NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zauthor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_media`
--

CREATE TABLE `mz_media` (
  `zid` bigint(20) NOT NULL,
  `ztitle` tinytext NOT NULL,
  `zcontent` mediumtext NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zauthor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_orderdetails`
--

CREATE TABLE `mz_orderdetails` (
  `zid` bigint(20) NOT NULL,
  `zorder_id` bigint(20) NOT NULL,
  `zproduct` bigint(20) NOT NULL,
  `zcomp` mediumtext NOT NULL,
  `zprice` double NOT NULL,
  `zdate_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_orderdetails`
--

INSERT INTO `mz_orderdetails` (`zid`, `zorder_id`, `zproduct`, `zcomp`, `zprice`, `zdate_order`) VALUES
(1, 1, 1, 'Slice Fruit,Watermelon Fruit, Full Fruit', 126, '2019-05-29'),
(2, 1, 17, 'Slice Fruit,Watermelon Fruit, Full Fruit', 26, '2019-05-30'),
(3, 1, 18, 'Slice Fruit,Watermelon Fruit, Full Fruit', 30, '2019-06-01'),
(4, 1, 5, 'Slice Fruit,Watermelon Fruit, Full Fruit', 130, '2019-06-02'),
(5, 2, 1, 'Slice Fruit,Watermelon Fruit, Full Fruit', 126, '2019-05-29'),
(6, 2, 17, 'Slice Fruit,Watermelon Fruit, Full Fruit', 26, '2019-05-30'),
(7, 2, 18, 'Slice Fruit,Watermelon Fruit, Full Fruit', 30, '2019-06-01'),
(8, 3, 17, 'Slice Fruit', 26, '2019-05-30'),
(9, 3, 18, 'Watermelon Fruit, Full Fruit', 30, '2019-06-01'),
(10, 4, 5, 'Slice Fruit,Watermelon Fruit, Full Fruit', 130, '2019-06-02'),
(11, 4, 5, 'Slice Fruit,Watermelon Fruit, Full Fruit', 130, '2019-06-09'),
(12, 5, 17, 'Slice Fruit,Watermelon Fruit, Full Fruit', 26, '2019-06-06'),
(13, 5, 18, 'Slice Fruit,Watermelon Fruit, Full Fruit', 30, '2019-06-08'),
(14, 6, 9, 'Water', 132.15, '2019-06-11'),
(15, 6, 17, 'Juice,Bread', 26, '2019-06-13'),
(16, 7, 18, 'Water,Juice', 30, '2019-06-15'),
(17, 7, 5, 'Water,Juice', 130, '2019-06-09'),
(18, 8, 9, 'Water,Juice', 132.15, '2019-06-11'),
(19, 8, 17, 'Water,Juice', 26, '2019-06-13'),
(20, 9, 18, 'Juice,Bread', 30, '2019-06-15'),
(21, 9, 19, 'Water,Bread', 25, '2019-06-16'),
(22, 10, 17, 'Bread', 26, '2019-06-13'),
(23, 10, 18, 'Water', 30, '2019-06-15'),
(24, 10, 19, 'Water,Bread', 25, '2019-06-16'),
(25, 11, 17, 'Water,Juice', 26, '2019-06-13'),
(26, 11, 18, 'Water,Juice', 30, '2019-06-15'),
(27, 12, 20, 'Water,Juice', 28, '2019-06-17'),
(28, 13, 17, 'Water,Juice', 26, '2019-06-13'),
(29, 13, 18, 'Water,Juice', 30, '2019-06-15'),
(30, 13, 19, 'Water,Juice', 25, '2019-06-16'),
(31, 14, 20, 'Water,Juice', 28, '2019-06-17'),
(32, 15, 18, 'Water,Juice', 30, '2019-06-15'),
(33, 15, 17, 'Water,Juice', 26, '2019-06-13'),
(34, 16, 19, 'Water,Juice', 25, '2019-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `mz_orders`
--

CREATE TABLE `mz_orders` (
  `zid` bigint(20) NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zorder_to` bigint(20) NOT NULL,
  `zorganization` bigint(20) NOT NULL,
  `zad_ons` mediumtext,
  `znotes` mediumtext,
  `zstatus` int(2) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `ztotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_orders`
--

INSERT INTO `mz_orders` (`zid`, `zauthor`, `zorder_to`, `zorganization`, `zad_ons`, `znotes`, `zstatus`, `zdate_published`, `ztotal`) VALUES
(1, 2, 10, 1, 't1', 'n1', 9, '2019-05-29 13:53:04', 312),
(2, 2, 11, 1, 't2', 'n2', 9, '2019-05-29 14:01:41', 182),
(3, 2, 4, 1, 't3', 'n3', 9, '2019-05-30 10:51:59', 56),
(4, 2, 15, 1, 't4', 'n4', 9, '2019-06-02 09:01:31', 260),
(5, 2, 11, 1, NULL, NULL, 9, '2019-06-02 11:03:26', 56),
(6, 2, 12, 0, NULL, NULL, 9, '2019-06-09 12:30:47', 158.15),
(7, 2, 12, 0, NULL, NULL, 9, '2019-06-09 12:48:27', 160),
(8, 2, 16, 0, NULL, NULL, 9, '2019-06-10 12:10:14', 158.15),
(9, 2, 16, 0, NULL, NULL, 9, '2019-06-10 14:59:06', 55),
(10, 2, 14, 0, NULL, NULL, 9, '2019-06-10 15:01:52', 81),
(11, 2, 15, 0, NULL, NULL, 9, '2019-06-10 15:41:59', 56),
(12, 2, 14, 0, NULL, NULL, 9, '2019-06-11 09:28:21', 28),
(13, 2, 13, 0, NULL, NULL, 9, '2019-06-11 09:28:48', 81),
(14, 2, 13, 0, NULL, NULL, 9, '2019-06-11 09:28:54', 28),
(15, 2, 17, 0, NULL, NULL, 9, '2019-06-11 10:12:42', 56),
(16, 2, 17, 0, NULL, NULL, 9, '2019-06-11 10:14:56', 25);

-- --------------------------------------------------------

--
-- Table structure for table `mz_organization`
--

CREATE TABLE `mz_organization` (
  `zid` bigint(20) NOT NULL,
  `ztitle` varchar(150) NOT NULL,
  `zcontent` mediumtext NOT NULL,
  `ztype` varchar(80) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_organization`
--

INSERT INTO `mz_organization` (`zid`, `ztitle`, `zcontent`, `ztype`, `zdate_published`, `zauthor`, `zparent`, `zstatus`) VALUES
(1, 'School 1', 'Description 1', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(2, 'School 2', 'Description 2', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(3, 'School 3', 'Description 3', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(4, 'School 4', 'Description 4', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(5, 'GAG', 'Company 1', 'comp', '0000-00-00 00:00:00', 1, 0, 9),
(6, 'GAC', 'Company 2', 'comp', '0000-00-00 00:00:00', 1, 0, 9),
(7, 'Gallega', 'Company 3', 'comp', '0000-00-00 00:00:00', 1, 0, 9),
(8, 'Grade 1', 'Grade 1', 'gr', '0000-00-00 00:00:00', 1, 1, 9),
(9, 'Grade 2', 'Grade 2', 'gr', '0000-00-00 00:00:00', 1, 1, 9),
(10, 'Grade 4', 'Grade 5', 'gr', '0000-00-00 00:00:00', 1, 2, 9),
(11, 'Grade 6', 'Grade 6', 'gr', '0000-00-00 00:00:00', 1, 2, 9),
(12, 'Section 1', 'Section 1', 'sec', '0000-00-00 00:00:00', 1, 2, 9),
(13, 'Section 2', 'Section 1', 'sec', '0000-00-00 00:00:00', 1, 2, 9),
(14, 'School 5', 'Description 5', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(15, 'School 6', 'Description 6', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(16, 'School 7', 'Description 7', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(17, 'School 8', 'Description 8', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(18, 'School 9', 'Description 9', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(19, 'School 10', 'Description 2', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(20, 'School 11', 'Description 3', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(21, 'School 12', 'Description 4', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(22, 'School 13', 'Description 5', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(23, 'School 14', 'Description 6', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(24, 'School 15', 'Description 7', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(25, 'School 16', 'Description 8', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(26, 'School 17', 'Description 1', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(27, 'School 18', 'Description 2', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(28, 'School 19', 'Description 3', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(29, 'School 20', 'Description 4', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(30, 'School 21', 'Description 5', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(31, 'School 22', 'Description 6', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(32, 'School 23', 'Description 7', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(33, 'School 24', 'Description 8', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(34, 'School 25', 'Description 9', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(35, 'School 26', 'Description 2', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(36, 'School 27', 'Description 3', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(37, 'School 28', 'Description 4', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(38, 'School 29', 'Description 5', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(39, 'School 30', 'Description 6', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(40, 'School 31', 'Description 7', 'sc', '0000-00-00 00:00:00', 1, 0, 9),
(41, 'School 32', 'Description 8', 'sc', '0000-00-00 00:00:00', 1, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mz_orgscity`
--

CREATE TABLE `mz_orgscity` (
  `zid` bigint(20) NOT NULL,
  `zcode` varchar(5) NOT NULL,
  `zstate` varchar(150) NOT NULL,
  `zaddress` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_orgscity`
--

INSERT INTO `mz_orgscity` (`zid`, `zcode`, `zstate`, `zaddress`) VALUES
(1, 'uae', 'Dubai', 'Dubai St'),
(2, 'uae', 'Sharjah', 'Shj St'),
(3, 'uae', 'Abu Dhabi', 'AUH St');

-- --------------------------------------------------------

--
-- Table structure for table `mz_orgsmeta`
--

CREATE TABLE `mz_orgsmeta` (
  `zid` bigint(20) NOT NULL,
  `zorganization` bigint(20) NOT NULL,
  `zcountry` varchar(150) NOT NULL,
  `zcn_code` varchar(5) NOT NULL,
  `zstate` varchar(120) NOT NULL,
  `zaddress` mediumtext NOT NULL,
  `zlink` varchar(200) NOT NULL,
  `zcomp_license` varchar(150) NOT NULL,
  `zcomp_vat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_orgsmeta`
--

INSERT INTO `mz_orgsmeta` (`zid`, `zorganization`, `zcountry`, `zcn_code`, `zstate`, `zaddress`, `zlink`, `zcomp_license`, `zcomp_vat`) VALUES
(1, 1, 'United Arab Emirates', 'uae', 'Dubai', 'Dubai', '', '', ''),
(2, 2, 'United Arab Emirates', 'uae', 'Sharjah', 'Sharjah', '', '', ''),
(3, 3, 'United States of America', 'usa', 'New York', 'New York', '', '', ''),
(4, 4, 'Philippines', 'ph', 'Cebu', 'Cebu', '', '', ''),
(5, 5, '', '', '', '', '', '', ''),
(6, 6, '', '', '', '', '', '', ''),
(7, 7, '', '', '', '', '', '', ''),
(8, 8, '', '', '', '', '', '', ''),
(9, 9, '', '', '', '', '', '', ''),
(10, 10, '', '', '', '', '', '', ''),
(11, 11, '', '', '', '', '', '', ''),
(12, 12, '', '', '', '', '', '', ''),
(13, 13, '', '', '', '', '', '', ''),
(14, 14, '', '', '', '', '', '', ''),
(15, 15, '', '', '', '', '', '', ''),
(16, 16, '', '', '', '', '', '', ''),
(17, 17, '', '', '', '', '', '', ''),
(18, 18, '', '', '', '', '', '', ''),
(19, 19, '', '', '', '', '', '', ''),
(20, 20, '', '', '', '', '', '', ''),
(21, 21, '', '', '', '', '', '', ''),
(22, 22, '', '', '', '', '', '', ''),
(23, 23, '', '', '', '', '', '', ''),
(24, 24, '', '', '', '', '', '', ''),
(25, 25, '', '', '', '', '', '', ''),
(26, 26, '', '', '', '', '', '', ''),
(27, 27, '', '', '', '', '', '', ''),
(28, 28, '', '', '', '', '', '', ''),
(29, 29, '', '', '', '', '', '', ''),
(30, 30, '', '', '', '', '', '', ''),
(31, 31, '', '', '', '', '', '', ''),
(32, 32, '', '', '', '', '', '', ''),
(33, 33, '', '', '', '', '', '', ''),
(34, 34, '', '', '', '', '', '', ''),
(35, 35, '', '', '', '', '', '', ''),
(36, 36, '', '', '', '', '', '', ''),
(37, 37, '', '', '', '', '', '', ''),
(38, 38, '', '', '', '', '', '', ''),
(39, 39, '', '', '', '', '', '', ''),
(40, 40, '', '', '', '', '', '', ''),
(41, 41, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mz_payments`
--

CREATE TABLE `mz_payments` (
  `zid` bigint(20) NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zorder_to` bigint(20) NOT NULL,
  `zref_num` varchar(80) NOT NULL,
  `zamount` double NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_persons`
--

CREATE TABLE `mz_persons` (
  `zid` bigint(20) NOT NULL,
  `ztitle` mediumtext NOT NULL,
  `zcontent` text NOT NULL,
  `zimage` varchar(250) NOT NULL,
  `zlanguage` int(2) NOT NULL,
  `zmeta_title` tinytext NOT NULL,
  `zmeta_desc` mediumtext NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_postmain`
--

CREATE TABLE `mz_postmain` (
  `zid` bigint(20) NOT NULL,
  `ztitle` mediumtext NOT NULL,
  `zcontent` text NOT NULL,
  `ztype` varchar(50) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zcategory` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zlast_author` bigint(20) NOT NULL,
  `zlast_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zapprove_by` bigint(20) NOT NULL DEFAULT '0',
  `zimage1` varchar(150) DEFAULT NULL,
  `zimage2` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_products`
--

CREATE TABLE `mz_products` (
  `zid` bigint(20) NOT NULL,
  `znav_id` varchar(20) NOT NULL,
  `zorganization` bigint(20) NOT NULL,
  `ztitle` mediumtext NOT NULL,
  `zcontent` text NOT NULL,
  `zauthor` bigint(20) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zdate_display` mediumtext NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zcategory` bigint(20) NOT NULL,
  `zprice` double NOT NULL,
  `zimages` varchar(150) NOT NULL,
  `zstatus` int(2) NOT NULL,
  `zdescription` text NOT NULL,
  `zsaleprice` tinyint(1) NOT NULL,
  `zimage1` varchar(250) NOT NULL,
  `zmeta_title` tinytext NOT NULL,
  `zmeta_desc` mediumtext NOT NULL,
  `znotes` mediumtext NOT NULL,
  `zlanguage` bigint(20) NOT NULL,
  `zperson` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_products`
--

INSERT INTO `mz_products` (`zid`, `znav_id`, `zorganization`, `ztitle`, `zcontent`, `zauthor`, `zdate_published`, `zdate_display`, `zparent`, `zcategory`, `zprice`, `zimages`, `zstatus`, `zdescription`, `zsaleprice`, `zimage1`, `zmeta_title`, `zmeta_desc`, `znotes`, `zlanguage`, `zperson`) VALUES
(1, '', 1, 'Menu 1', ' Description 1 Menu', 1, '2019-05-24 00:00:00', '[\"2019-05-22\",\"2019-05-29\",\"2019-06-05\"]', 1, 1, 126, '', 9, 'other desc 1', 0, '', 'meta title 1', 'meta desc 1', 'notes 1', 0, 0),
(2, '', 2, 'Menu 2', ' Description 1 Menu', 1, '2019-05-22 00:00:00', '[\"2019-05-26\",\"2019-06-02\",\"2019-06-09\"]', 1, 1, 130, '', 9, 'other desc 2', 0, '', 'meta title 2', 'meta desc 2', 'notes 2', 0, 0),
(3, '', 1, 'Menu 3', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-27\",\"2019-06-03\",\"2019-06-10\"]', 1, 2, 125.25, '', 9, 'other desc 3', 0, '', 'meta title 3', 'meta desc 3', 'notes 3', 0, 0),
(4, '', 2, 'Menu 4', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '2019-05-27', 1, 2, 126, '', 9, 'other desc 4', 0, '', 'meta title 4', 'meta desc 4', 'notes 4', 0, 0),
(5, '', 1, 'Menu 5', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-26\",\"2019-06-02\",\"2019-06-09\"]', 1, 2, 130, '', 9, 'other desc 5', 0, '', 'meta title 5', 'meta desc 5', 'notes 5', 0, 0),
(6, '', 1, 'Menu 6', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-22\",\"2019-05-29\",\"2019-06-05\"]', 1, 2, 147, '', 6, 'other desc 6', 0, '', 'meta title 6', 'meta desc 6', 'notes 6', 0, 0),
(7, '', 1, 'Menu 7', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-27\",\"2019-06-03\",\"2019-06-10\"]', 1, 3, 126, '', 5, 'other desc 7', 0, '', 'meta title 7', 'meta desc 7', 'notes 7', 0, 0),
(8, '', 1, 'Menu 8', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-27\",\"2019-06-03\",\"2019-06-10\"]', 1, 3, 130, '', 9, 'other desc 8', 0, '', 'meta title 8', 'meta desc 8', 'notes 8', 0, 0),
(9, '', 1, 'Menu 9', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-28\",\"2019-06-04\",\"2019-06-11\"]', 1, 3, 132.15, '', 9, 'other desc 9', 0, '', 'meta title 9', 'meta desc 9', 'notes 9', 0, 0),
(10, '', 1, 'Menu 11', ' Description 11 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-27\",\"2019-06-03\",\"2019-06-10\"]', 1, 1, 128, '', 9, 'other desc 11', 0, '', 'meta title 11', 'meta desc 11', 'notes 11', 0, 0),
(11, '', 1, 'Menu 12', ' Description 12 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-28\",\"2019-06-04\",\"2019-06-11\"]', 1, 1, 131, '', 9, 'other desc 12', 0, '', 'meta title 12', 'meta desc 12', 'notes 12', 0, 0),
(12, '', 1, 'Menu 13', ' Description 13 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-30\",\"2019-06-06\",\"2019-06-13\"]', 1, 2, 130, '', 9, 'other desc 13', 0, '', 'meta title 13', 'meta desc 13', 'notes 13', 0, 0),
(13, '', 1, 'Menu 14', ' Description 14 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-01\",\"2019-06-08\",\"2019-06-15\"]', 1, 2, 118.75, '', 9, 'other desc 14', 0, '', 'meta title 14', 'meta desc 14', 'notes 14', 0, 0),
(14, '', 1, 'Menu 15', ' Description 15 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-16\",\"2019-06-23\",\"2019-06-30\"]', 1, 2, 126, '', 9, 'other desc 15', 0, '', 'meta title 15', 'meta desc 15', 'notes 15', 0, 0),
(15, '', 1, 'Menu 16', ' Description 16 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-17\",\"2019-06-24\",\"2019-07-01\"]', 1, 2, 30, '', 9, 'other desc 16', 0, '', 'meta title 16', 'meta desc 16', 'notes 16', 0, 0),
(16, '', 1, 'Menu 17', ' Description 1 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-18\",\"2019-06-25\",\"2019-07-02\"]', 1, 2, 12.67, '', 9, 'other desc 6', 0, '', 'meta title 6', 'meta desc 6', 'notes 6', 0, 0),
(17, '', 1, 'Menu 18', ' Description 18 Menu', 1, '2019-04-29 00:00:00', '[\"2019-05-30\",\"2019-06-06\",\"2019-06-13\"]', 1, 3, 26, '', 9, 'other desc 7', 0, '', 'meta title 7', 'meta desc 7', 'notes 7', 0, 0),
(18, '', 1, 'Menu 19', ' Description 19 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-01\",\"2019-06-08\",\"2019-06-15\"]', 1, 3, 30, '', 9, 'other desc 8', 0, '', 'meta title 8', 'meta desc 8', 'notes 8', 0, 0),
(19, '', 1, 'Menu 20', ' Description 20 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-16\",\"2019-06-23\",\"2019-06-30\"]', 1, 3, 25, '', 9, 'other desc 9', 0, '', 'meta title 9', 'meta desc 9', 'notes 9', 0, 0),
(20, '', 1, 'Menu 21', ' Description 21 Menu', 1, '2019-04-29 00:00:00', '[\"2019-06-17\",\"2019-06-24\",\"2019-07-01\"]', 1, 3, 28, '', 9, 'other desc 11', 0, '', 'meta title 11', 'meta desc 11', 'notes 11', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mz_profile`
--

CREATE TABLE `mz_profile` (
  `zid` bigint(20) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL,
  `zfirstname` varchar(80) NOT NULL,
  `zmiddlename` varchar(80) NOT NULL,
  `zlastname` varchar(80) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zwebsite` varchar(150) NOT NULL,
  `zimage1` varchar(250) NOT NULL,
  `zimage2` varchar(250) NOT NULL,
  `zdob` date NOT NULL,
  `zemail` varchar(150) NOT NULL,
  `zphone_num` varchar(20) NOT NULL,
  `zcompany` bigint(20) NOT NULL,
  `zdepartment` bigint(20) NOT NULL,
  `zposition` bigint(20) NOT NULL,
  `zcontent1` mediumtext NOT NULL,
  `zcontent2` mediumtext NOT NULL,
  `zcountry` bigint(20) NOT NULL,
  `zstate` bigint(20) NOT NULL,
  `zaddress` varchar(200) NOT NULL,
  `zpostal_code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_profile`
--

INSERT INTO `mz_profile` (`zid`, `zparent`, `zstatus`, `zfirstname`, `zmiddlename`, `zlastname`, `zdate_published`, `zwebsite`, `zimage1`, `zimage2`, `zdob`, `zemail`, `zphone_num`, `zcompany`, `zdepartment`, `zposition`, `zcontent1`, `zcontent2`, `zcountry`, `zstate`, `zaddress`, `zpostal_code`) VALUES
(1, 1, 9, 'Steve', 'Silva', 'Ayala', '0000-00-00 00:00:00', '', '', '', '1987-04-09', 'jacob@gagroup.net', '0563983675', 5, 0, 0, 'Dont fuck with me', '', 0, 0, '', ''),
(2, 2, 9, 'John', 's', 'Doe', '0000-00-00 00:00:00', 'https://gagroup.net/', '', '', '1985-03-19', 'moikzz214@gmail.com', '0563245543', 0, 0, 0, 'Dont fuck with me 2', '', 0, 0, 'Dubai, Tecom', '345234'),
(3, 3, 9, 'Tibor', 'S', 'Ku', '0000-00-00 00:00:00', '', '', '', '1987-06-25', 'tibor@gmail.com', '3243242', 0, 0, 0, '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mz_social_media`
--

CREATE TABLE `mz_social_media` (
  `zid` bigint(20) NOT NULL,
  `ztitle` varchar(150) NOT NULL,
  `zicon` varchar(250) NOT NULL,
  `zlink` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_subprofile`
--

CREATE TABLE `mz_subprofile` (
  `zid` bigint(20) NOT NULL,
  `zparent` bigint(20) NOT NULL,
  `zstatus` int(2) NOT NULL,
  `zfirstname` varchar(80) NOT NULL,
  `zmiddlename` varchar(80) NOT NULL,
  `zlastname` varchar(80) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zorganization` bigint(20) NOT NULL,
  `zstate` bigint(20) NOT NULL,
  `zbalance` double NOT NULL,
  `zimage1` varchar(250) NOT NULL,
  `zdivision` bigint(20) NOT NULL,
  `zsection` bigint(20) NOT NULL,
  `zgrade` bigint(20) NOT NULL,
  `zvalid_id` varchar(150) NOT NULL,
  `zdate_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_subprofile`
--

INSERT INTO `mz_subprofile` (`zid`, `zparent`, `zstatus`, `zfirstname`, `zmiddlename`, `zlastname`, `zdate_published`, `zorganization`, `zstate`, `zbalance`, `zimage1`, `zdivision`, `zsection`, `zgrade`, `zvalid_id`, `zdate_updated`) VALUES
(1, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 10:03:30'),
(2, 2, 7, 'Carla 1', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(3, 3, 9, 'Mark', 'K', 'Shu', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(4, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 11.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(5, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(6, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(7, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(8, 2, 9, 'WWWWWW', 'K', 'OOOOO', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(9, 2, 9, 'EEEEEE', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(10, 2, 9, 'ZZZZZZ', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 35.85, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(11, 2, 9, 'XXXXXX', 'K', 'Santos', '2019-04-29 00:00:00', 1, 0, 12, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(12, 2, 9, 'CCCC', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 29.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(13, 2, 9, 'VVVVV', 'K', 'KKKK', '2019-04-29 00:00:00', 1, 0, 141, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(14, 2, 9, 'NNNNN', 'K', 'JJJJJ', '2019-04-29 00:00:00', 1, 0, 18.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(15, 2, 9, 'MMMMMM', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 31.85, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(16, 2, 9, 'TTTTTT', 'K', 'OOOOO', '2019-04-29 00:00:00', 1, 0, 36.85, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(17, 2, 9, 'YYYYYY', 'K', 'JJJJJ', '2019-04-29 00:00:00', 1, 0, 46.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(18, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 08:43:46'),
(19, 2, 9, 'Carla 2', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(20, 3, 9, 'Mark', 'K', 'Shu', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(21, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(22, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(23, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(24, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(25, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 08:43:46'),
(26, 2, 9, 'Carla 3', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(27, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(28, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(29, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(30, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(31, 2, 9, 'WWWWWW', 'K', 'OOOOO', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(32, 2, 9, 'EEEEEE', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(33, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(34, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(35, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(36, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(37, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 08:43:46'),
(38, 2, 9, 'Carla 4', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(39, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(40, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(41, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(42, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(43, 2, 9, 'WWWWWW', 'K', 'OOOOO', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(44, 2, 9, 'EEEEEE', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(45, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 08:43:46'),
(46, 2, 9, 'Carla 5', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(47, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(48, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(49, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(50, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(51, 2, 9, 'WWWWWW', 'K', 'OOOOO', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(52, 2, 9, 'EEEEEE', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(53, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(54, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(55, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(56, 2, 9, 'WWWWWW', 'K', 'OOOOO', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(57, 2, 9, 'EEEEEE', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(58, 2, 9, 'Mike', 'K', 'Santos', '2019-04-23 00:00:00', 1, 0, 8.6, '', 0, 0, 8, '234645542', '2019-06-11 08:43:46'),
(59, 2, 9, 'Carla 6', 'K', 'Santos', '2019-04-29 00:00:00', 2, 0, 0, '', 0, 0, 10, '64565472', '2019-06-11 08:43:46'),
(60, 2, 9, 'AAA', 'K', 'LLLLL', '2019-04-23 00:00:00', 1, 0, 67.35, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(61, 2, 9, 'BBBBB', 'K', 'KKKK', '2019-04-29 00:00:00', 2, 0, 250, '', 0, 0, 0, '64565472', '2019-06-11 08:43:46'),
(62, 2, 9, 'DDDDDD', 'K', 'JJJJJ', '2019-04-29 00:00:00', 3, 0, 127.5, '', 0, 0, 0, '12357657', '2019-06-11 08:43:46'),
(63, 2, 9, 'QQQQQQ', 'K', 'PPPPP', '2019-04-23 00:00:00', 1, 0, 30.7, '', 0, 0, 0, '234645542', '2019-06-11 08:43:46'),
(64, 2, 9, 'Harold', '', 'Faaa', '2019-06-11 12:16:37', 2, 0, 0, '', 0, 12, 11, '111111111333333', '2019-06-11 10:00:55'),
(65, 2, 9, 'Mirko', '', 'Zabal', '2019-06-11 12:29:44', 4, 0, 0, '', 0, 0, 0, '553523432', '2019-06-11 08:43:46'),
(66, 2, 9, 'asdasdasd', '', 'asdasdsa', '2019-06-11 12:32:11', 2, 0, 0, '', 0, 0, 0, '32132132121', '2019-06-11 08:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `mz_system`
--

CREATE TABLE `mz_system` (
  `zid` int(11) NOT NULL,
  `zsystem_option` varchar(80) NOT NULL,
  `zsystem_value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_system`
--

INSERT INTO `mz_system` (`zid`, `zsystem_option`, `zsystem_value`) VALUES
(1, 'site_url', 'http://localhost/moikzz/'),
(2, 'site_title', 'Moikzz the Great'),
(3, 'site_content', 'Customize System'),
(4, 'users_can_register', '0'),
(5, 'admin_email', 'jacob@gagroup.net'),
(6, 'site_logo', ''),
(7, 'site_icon', ''),
(8, 'site_meta_title', ''),
(9, 'site_meta_desc', ''),
(10, 'site_meta_keywords', ''),
(11, 'site_analytics', ''),
(12, 'site_language_default', 'en'),
(13, 'site_language_back_default', 'en'),
(14, 'menu_header_top', '[\"\"]'),
(15, 'menu_header', '[\"\"]'),
(16, 'menu_footer', '[\"\"]'),
(17, 'menu_footer_bottom', '[\"\"]'),
(18, 't_subprofile', '0'),
(19, 't_persons', '0'),
(20, 't_comments', '0'),
(21, 't_testimonials', '0'),
(22, 't_history', '1'),
(23, 't_products', '0'),
(24, 't_contactform', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mz_testimonials`
--

CREATE TABLE `mz_testimonials` (
  `zid` bigint(20) NOT NULL,
  `zcustomer_name` varchar(150) NOT NULL,
  `zposition` varchar(250) NOT NULL,
  `zcompany` varchar(250) NOT NULL,
  `zmessage` mediumtext NOT NULL,
  `zimage` varchar(200) NOT NULL,
  `zdate_published` datetime NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mz_users`
--

CREATE TABLE `mz_users` (
  `zid` bigint(20) NOT NULL,
  `zusername` varchar(250) NOT NULL,
  `zpassword` tinytext NOT NULL,
  `ztype` int(10) NOT NULL,
  `zstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_users`
--

INSERT INTO `mz_users` (`zid`, `zusername`, `zpassword`, `ztype`, `zstatus`) VALUES
(1, 'moikzz214', '1234567', 1, 9),
(2, 'parent1', '1234567', 4, 9),
(3, 'parent2', '1234567', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mz_users_type`
--

CREATE TABLE `mz_users_type` (
  `zid` int(10) NOT NULL,
  `ztitle` varchar(150) NOT NULL,
  `zvalue` text NOT NULL,
  `zauthor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_users_type`
--

INSERT INTO `mz_users_type` (`zid`, `ztitle`, `zvalue`, `zauthor`) VALUES
(1, 'superadmin', 'all', 1),
(2, 'staff', 'menus', 1),
(3, 'editor', 'pages,pages', 1),
(4, 'parents', 'cart', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mz_balances`
--
ALTER TABLE `mz_balances`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_categories`
--
ALTER TABLE `mz_categories`
  ADD PRIMARY KEY (`zid`),
  ADD KEY `zparent` (`zparent`);

--
-- Indexes for table `mz_chat_conversation`
--
ALTER TABLE `mz_chat_conversation`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_chat_session`
--
ALTER TABLE `mz_chat_session`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_comments`
--
ALTER TABLE `mz_comments`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_contactform`
--
ALTER TABLE `mz_contactform`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_extras_free`
--
ALTER TABLE `mz_extras_free`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_history`
--
ALTER TABLE `mz_history`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_media`
--
ALTER TABLE `mz_media`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_orderdetails`
--
ALTER TABLE `mz_orderdetails`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_orders`
--
ALTER TABLE `mz_orders`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_organization`
--
ALTER TABLE `mz_organization`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_orgscity`
--
ALTER TABLE `mz_orgscity`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_orgsmeta`
--
ALTER TABLE `mz_orgsmeta`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_payments`
--
ALTER TABLE `mz_payments`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_persons`
--
ALTER TABLE `mz_persons`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_postmain`
--
ALTER TABLE `mz_postmain`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_products`
--
ALTER TABLE `mz_products`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_profile`
--
ALTER TABLE `mz_profile`
  ADD PRIMARY KEY (`zid`),
  ADD KEY `zfirstname` (`zfirstname`),
  ADD KEY `zlastname` (`zlastname`),
  ADD KEY `zimage1` (`zimage1`),
  ADD KEY `zcompany` (`zcompany`),
  ADD KEY `zparent` (`zparent`);

--
-- Indexes for table `mz_social_media`
--
ALTER TABLE `mz_social_media`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_subprofile`
--
ALTER TABLE `mz_subprofile`
  ADD PRIMARY KEY (`zid`),
  ADD KEY `zfirstname` (`zfirstname`),
  ADD KEY `zlastname` (`zlastname`),
  ADD KEY `zorganization` (`zorganization`),
  ADD KEY `zparent` (`zparent`);

--
-- Indexes for table `mz_system`
--
ALTER TABLE `mz_system`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_testimonials`
--
ALTER TABLE `mz_testimonials`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_users`
--
ALTER TABLE `mz_users`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `mz_users_type`
--
ALTER TABLE `mz_users_type`
  ADD PRIMARY KEY (`zid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mz_balances`
--
ALTER TABLE `mz_balances`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mz_categories`
--
ALTER TABLE `mz_categories`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mz_chat_conversation`
--
ALTER TABLE `mz_chat_conversation`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_chat_session`
--
ALTER TABLE `mz_chat_session`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_comments`
--
ALTER TABLE `mz_comments`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_contactform`
--
ALTER TABLE `mz_contactform`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_extras_free`
--
ALTER TABLE `mz_extras_free`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mz_history`
--
ALTER TABLE `mz_history`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_media`
--
ALTER TABLE `mz_media`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_orderdetails`
--
ALTER TABLE `mz_orderdetails`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mz_orders`
--
ALTER TABLE `mz_orders`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mz_organization`
--
ALTER TABLE `mz_organization`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mz_orgscity`
--
ALTER TABLE `mz_orgscity`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mz_orgsmeta`
--
ALTER TABLE `mz_orgsmeta`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mz_payments`
--
ALTER TABLE `mz_payments`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_persons`
--
ALTER TABLE `mz_persons`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_postmain`
--
ALTER TABLE `mz_postmain`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_products`
--
ALTER TABLE `mz_products`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mz_profile`
--
ALTER TABLE `mz_profile`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mz_social_media`
--
ALTER TABLE `mz_social_media`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_subprofile`
--
ALTER TABLE `mz_subprofile`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `mz_system`
--
ALTER TABLE `mz_system`
  MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mz_testimonials`
--
ALTER TABLE `mz_testimonials`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mz_users`
--
ALTER TABLE `mz_users`
  MODIFY `zid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mz_users_type`
--
ALTER TABLE `mz_users_type`
  MODIFY `zid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
