-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2016 at 01:53 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hypa4680_wickedresume`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `addUser`$$
$$

DROP PROCEDURE IF EXISTS `changePassword`$$
$$

DROP PROCEDURE IF EXISTS `deleteUser`$$
$$

DROP PROCEDURE IF EXISTS `editUser`$$
$$

DROP PROCEDURE IF EXISTS `getLoginInfo`$$
$$

DROP PROCEDURE IF EXISTS `getUserInfo`$$
$$

DROP PROCEDURE IF EXISTS `getUserInfoFromEmail`$$
$$

DROP PROCEDURE IF EXISTS `getUserList`$$
$$

DROP PROCEDURE IF EXISTS `listUserLevels`$$
$$

DROP PROCEDURE IF EXISTS `setUserInactiveStatus`$$
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `us01_users`
--

DROP TABLE IF EXISTS `us01_users`;
CREATE TABLE IF NOT EXISTS `us01_users` (
  `userUID` varchar(45) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `userLevel` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `postalCode` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `inactive` varchar(45) DEFAULT '0',
  `deleted` int(11) DEFAULT NULL,
  `dateDeleted` datetime DEFAULT NULL,
  `dateAdded` datetime DEFAULT NULL,
  PRIMARY KEY (`userUID`),
  UNIQUE KEY `userUID_UNIQUE` (`userUID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `us01_users`
--

INSERT INTO `us01_users` (`userUID`, `fname`, `lname`, `email`, `password`, `userLevel`, `address`, `city`, `province`, `country`, `postalCode`, `phone`, `inactive`, `deleted`, `dateDeleted`, dateAdded) VALUES
('{D44881E6-B7DB-4846-8AA9-E1E83A977556}', 'Liam', 'Rice', 'liam.rice@gmail.com', '4cc4210c81a14174901e8a8923d65a95', NULL, '66 monmore rd', '', '', '', '', '', '0', NULL, NULL, CURRENT_TIMESTAMP),
('{D8DC77D5-9F9B-4CB7-81E3-203C790C1714}', 'viki', 'kotarba', 'liam.rice@hyparec.com', '4cc4210c81a14174901e8a8923d65a95', NULL, '', '', '', '', '', '', '0', NULL, NULL, CURRENT_TIMESTAMP);

-- --------------------------------------------------------

--
-- Table structure for table `us02_userlevel`
--

DROP TABLE IF EXISTS `us02_userlevel`;
CREATE TABLE IF NOT EXISTS `us02_userlevel` (
  `userLevelUID` int(11) NOT NULL AUTO_INCREMENT,
  `userLevelDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userLevelUID`),
  UNIQUE KEY `userLevelUID_UNIQUE` (`userLevelUID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `us02_userlevel`
--

INSERT INTO `us02_userlevel` (`userLevelUID`, `userLevelDesc`) VALUES
(1, 'User'),
(2, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
