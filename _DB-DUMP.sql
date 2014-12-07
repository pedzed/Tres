-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2014 at 08:25 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tres`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(254) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `surname`, `date_created`, `date_modified`) VALUES
(1, 'ped', 'pedped', 'ped@tresframework.com', 'Ped', 'Zed', '2014-06-11 14:20:24', '0000-00-00 00:00:00'),
(2, 'ped2', 'pedped', 'ped@tresframework.com', 'ped', 'zed', '2014-09-03 07:19:23', '0000-00-00 00:00:00'),
(4, 'john', '', 'john@example.com', 'John', 'Doe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'FireDart', '', 'julian@tresframework.com', 'Julian', '', '2014-12-04 23:06:05', '0000-00-00 00:00:00'),
(6, 'pedzed', '', 'ped@tresframework.com', 'Ped', 'Zed', '2014-12-05 01:20:18', '0000-00-00 00:00:00');
