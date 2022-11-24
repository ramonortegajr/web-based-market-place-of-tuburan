-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 10:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ompls`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receiver` varchar(10) NOT NULL,
  `id_sender` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_receiver`, `id_sender`, `message`, `date`) VALUES
(60, '64', '58', 'hi kath', '14-11-2022');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE IF NOT EXISTS `chat_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gig_post`
--

CREATE TABLE IF NOT EXISTS `gig_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `posted_by` varchar(10) NOT NULL,
  `posted_image` varchar(30) NOT NULL,
  `isavail` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prim` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `gig_post`
--

INSERT INTO `gig_post` (`id`, `id_post`, `category`, `content`, `date`, `posted_by`, `posted_image`, `isavail`, `image`, `prim`) VALUES
(170, '63', 'Web Development', 'I am offering Web Development.', '2022-11-12 15:46:33', 'liza', '', '1', 'ard.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) NOT NULL,
  `id_professional` varchar(10) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `project_fullname` varchar(40) NOT NULL COMMENT 'Complete = 1 Not Complete = 0',
  `project_address` varchar(40) NOT NULL,
  `project_contact` varchar(30) NOT NULL,
  `project_date` varchar(30) NOT NULL,
  `project_sug` varchar(100) NOT NULL,
  `project_status` varchar(30) NOT NULL,
  `date_completed` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `id_user`, `id_professional`, `project_title`, `project_fullname`, `project_address`, `project_contact`, `project_date`, `project_sug`, `project_status`, `date_completed`) VALUES
(46, '4', '63', 'Cellphone Repair', 'Jessabel Castro', 'Tuburan Cebu', '09518767704', '2022-11-12', '-Broken Screen\r\nplease replace', 'Completed', '2022/11/12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `address`, `contact`, `email`, `type`, `username`, `password`) VALUES
(4, 'Jessabel Castro', 'Tuburan Cebu', '09372637623', 'jessabel@gmail.com', 'Client', 'jazz', 'jazz'),
(5, 'Ramon Ortega Jr', 'Cebu City', '09518767704', 'ramonortegajr1997@gmail.com', 'Client', 'ram', 'ram');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `datejoin` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isVerified` varchar(2) NOT NULL,
  `image` varchar(30) NOT NULL,
  `hiredtimes` varchar(10) NOT NULL,
  `skills` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `firstname`, `lastname`, `address`, `mobile`, `position`, `email`, `facebook`, `datejoin`, `type`, `username`, `password`, `isVerified`, `image`, `hiredtimes`, `skills`) VALUES
(58, 'Goju', 'Saturo', 'Okahama, Japan', '096727382332', 'System IT Support', 'gujosaturo@gmail.com', 'gujosaturo', '2022-10-07', 'Admin', 'goju', 'goju', '1', 'gojo saturo.jpg', '0', ''),
(63, 'Liza', 'Soberano', 'Nashville, New Jersey', '09518767704', 'IT Support', 'liza@gmail.com', 'liza', '2022-11-12', 'Professional', 'liza', 'liza', '1', 'liza.jpg', '1', 'PHYTON,REACT,NODE JS'),
(64, 'Kath', 'Bernardo', 'Metro Manila', '09763726376', 'Software Engineer', 'kath@gmail.com', 'kath', '2022-11-13', 'Professional', 'kath', 'kath', '1', 'kath.jpg', '0', 'HTML,CSS,JAVASCRIPT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
