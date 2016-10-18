-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2016 at 02:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `password`, `image`) VALUES
(1, '', '', 'admin@admin.com', 'admin', ''),
(2, 'Jerick', 'Labasan', 'jerick@outlook.com', '5fcd7d2cefc7e22b1a86d7c57a86189b68a7dc23c0d260dc16b6903bfd1a3449', 'Drow_Ranger.png'),
(3, 'Elaine', 'Bago', 'elaine@yahoo.com', 'c95b257d009a92c1350ae49cec255bdeecb7116d28fae64567a1a7621f9028ae', 'Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` int(50) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` text NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`aid`, `title`, `content`, `author`, `date_published`, `image`) VALUES
(1, 'First Blog with Image', 'The world''s famous dessert on earth!', 2, '2016-10-06 10:06:08', 'Desert.jpg'),
(2, 'My First Blog', '                          asdasdasd', 3, '2016-10-07 03:27:19', 'Koala.jpg'),
(3, 'First Time', 'Remember the first time you went to a show and saw your favorite band. You wore their shirt, and sang every word. You didn''t know anything about scene politics, haircuts, or what was cool. All you knew was that this music made you feel different from anyone you shared a locker with. Someone finally understood you. This is what music is about. \r\nRead more at: http://www.brainyquote.com/quotes/keywords/first_time.html', 3, '2016-10-07 06:28:39', 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `filename`) VALUES
(1, 'Codeigniter get last insert id.pdf'),
(2, '(Froilan Villaester)2015-07-24.pdf'),
(3, '(Froilan Villaester)2015-07-24.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
