
<!-- saved from url=(0075)http://db.pykotech.com/adminer.php?username=userx&db=xpdb&dump=tbl_expenses -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">-- Adminer 4.0.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+00:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_bookmarks`;
CREATE TABLE `tbl_bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hyperurl` text NOT NULL,
  `category` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_expenses`;
CREATE TABLE `tbl_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `expensed` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_notecategories`;
CREATE TABLE `tbl_notecategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_notecategories` (`id`, `code`, `category`) VALUES
(1,	'EXPENSE',	'Expense Notes');

DROP TABLE IF EXISTS `tbl_notes`;
CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `exp_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tbl_notes` (`id`, `user_id`, `cat_id`, `exp_id`, `title`, `description`, `created`) VALUES
(1,	1,	18,	357,	'Type of Payment',	'Check was used',	'2014-02-18 20:21:17');

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE latin1_bin NOT NULL,
  `password` varchar(60) COLLATE latin1_bin NOT NULL,
  `email` varchar(80) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`) VALUES
(1,	'joe',	'b0aa31e4087e3f38e11457cde34b5ef2',	'jose.palala@gmail.com');

-- 2014-02-18 14:42:52
</pre></body></html>