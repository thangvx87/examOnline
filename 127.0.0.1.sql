-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2013 at 02:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam_online`
--
CREATE DATABASE `exam_online` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `exam_online`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PassWorld` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Level` int(11) NOT NULL,
  `Status` bit(1) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store Account';

-- --------------------------------------------------------

--
-- Table structure for table `registry`
--

CREATE TABLE IF NOT EXISTS `registry` (
  `RegistryId` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `UserName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `FullName` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Birthday` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SexAccount` bit(1) NOT NULL DEFAULT b'0',
  `HomeTown` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Capchar` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PassWord` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RegistryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
