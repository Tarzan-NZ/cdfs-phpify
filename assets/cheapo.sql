-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 05:26 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`ID` mediumint(8) unsigned NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Privilege` enum('admin','moderator','user') NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Username`, `Email`, `Password`, `Privilege`, `CreationDate`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$6EnXa0AIM9DoGseMFHByD.3adJEwurxX6NKRNxcM2pQowKEMtxIyy', 'admin', '2015-06-12 02:47:00'),
(2, 'user', 'example@example.com', '$2y$10$tGBepGBpG9z34O2QAwZ03ecpsvJLB6uQINFDWq0lJZwsPkjN8fpOy', 'user', '2015-06-16 00:33:48'),
(3, 'blarg', 'blarg@example.com', '$2y$10$5YBvkLgxwNo71fNZqqxJKuwyN.TigRe8saA0GH5k5vsm/zFiIT5TW', 'user', '2015-06-16 00:35:03'),
(4, 'blah', 'blah@example.com', '$2y$10$ndgahtWFVlIIXtdxwG1k2OgMk2XSOkJLl4Fxu8mCOw1Rp4kG6fn7e', 'user', '2015-06-16 00:36:00'),
(5, 'blurg', 'blurg@example.com', '$2y$10$UCD3NUugvC9rx5DhrgRg4O8.L1xZ9Ud.MHUr5J29HlJhg7iIpnWz6', 'user', '2015-06-16 00:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`ID` tinyint(3) unsigned NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Description` varchar(160) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `Title`, `Description`, `Name`) VALUES
(1, 'Cheap deals for students - Home', 'The best student deals in NZ since ages ago', 'home'),
(2, 'Cheap deals for students - About Us', 'All the info you could ever need to know about us and what we do', 'about'),
(3, 'Cheap deals for students - Contact Us', 'Contact us info to harass us to fix or improve something', 'contact'),
(4, 'Cheap deals for students - Page not found, try again', 'OOPS, sorry we could not find the page you were looking for', '404'),
(5, 'Cheap deals for students - Register', 'Register a new account to get access to cheap student deals all over the country', 'register'),
(6, 'Cheap deals for students - Your Account', 'Your account page where you can change your password and profile picture', 'account');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
