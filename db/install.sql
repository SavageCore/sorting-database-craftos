-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2013 at 12:54 PM
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
  `process` tinyint(1) NOT NULL,
  `threshold` int(11) NOT NULL,
  UNIQUE KEY `id,meta` (`id`,`meta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc_items`
--

INSERT INTO `mc_items` (`id`, `meta`, `name`, `short`, `uuid`, `amount`, `process`, `threshold`) VALUES
(15, 0, 'IronOre', 'IRNO', 0, 955, 1, 0),
(265, 0, 'Iron', 'IRN', 0, 912, 0, 3456),
(5267, 5, 'Copper', 'CPR', 0, 57, 0, 3456),
(5267, 4, 'Tin', 'TIN', 0, 203, 0, 3456),
(266, 0, 'Gold', 'GLD', 0, 184, 0, 3456),
(5267, 3, 'Silver', 'SILV', 0, 489, 0, 3456),
(264, 0, 'Diamond', 'DMND', 0, 62, 0, 3456),
(5, 1, 'SprucePlank', 'SPRP', 0, 3392, 0, 3456),
(17, 1, 'SpruceLog', 'SPRL', 0, 3456, 0, 3456),
(2001, 0, 'CopperOre', 'CPRO', 0, 208, 1, 0),
(263, 0, 'Coal', 'COAL', 0, 965, 0, 3456),
(21256, 29, 'Invar', 'INVR', 0, 21, 0, 3456),
(2001, 4, 'FerrousOre', 'FERO', 0, 28, 1, 0),
(2001, 1, 'TinOre', 'TINO', 0, 180, 1, 0),
(14, 0, 'GoldOre', 'GLDO', 0, 132, 1, 0),
(2001, 2, 'SilverOre', 'SLVO', 0, 155, 1, 0),
(2001, 3, 'LeadOre', 'LEDO', 0, 148, 1, 0),
(21256, 23, 'Lead', 'LED', 0, 316, 0, 3456),
(21256, 28, 'Nickel', 'NIKL', 0, 69, 0, 3456),
(3139, 6, 'NetherCopperOre', 'NCPO', 0, 2, 1, 0),
(3139, 7, 'NetherTinOre', 'NTNO', 0, 2, 1, 0),
(3139, 3, 'NetherIronOre', 'NIRN', 0, 2, 1, 0),
(30189, 0, 'Scrap', 'SCRP', 0, 56030, 0, 0),
(1, 0, 'Stone', 'STN', 0, 319, 0, 3456),
(4, 0, 'Cobblestone', 'CBBL', 0, 3456, 0, 3456),
(215, 0, 'Marble', 'MRBL', 0, 213, 0, 3456),
(13, 0, 'Gravel', 'GRVL', 0, 1, 0, 1),
(3, 0, 'Dirt', 'DRT', 0, 1, 0, 1),
(87, 0, 'NetherRack', 'NRCK', 87, 0, 0, 1),
(215, 2, 'MarbleBrick', 'MBLB', 0, 204, 0, 3456),
(98, 0, 'StoneBrick', 'STNB', 0, 489, 0, 3456),
(6, 1, 'SpruceSapling', 'SRPS', 0, 1, 0, 1);
