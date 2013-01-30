-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2013 at 05:21 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `savagecore`
--

-- --------------------------------------------------------

--
-- Table structure for table `mc_items`
--

CREATE TABLE IF NOT EXISTS `mc_items` (
  `id` int(4) NOT NULL COMMENT 'In-game block ID',
  `meta` int(11) DEFAULT NULL COMMENT 'In-game metadata',
  `name` varchar(20) NOT NULL COMMENT 'Name of block',
  `short` varchar(4) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL COMMENT 'Unique ID from MiscPeripherals',
  `amount` int(11) NOT NULL COMMENT 'Amount of item in storage',
  UNIQUE KEY `id,meta` (`id`,`meta`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;