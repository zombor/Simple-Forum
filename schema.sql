-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2009 at 07:24 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.6

--
-- Database: `jeremybush_mtgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE IF NOT EXISTS `forum_categories` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `order` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(75) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `content` longtext NOT NULL,
  `forum_discussion_id` mediumint(8) unsigned NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_discussions`
--

CREATE TABLE IF NOT EXISTS `forum_discussions` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(75) NOT NULL,
  `forum_category_id` mediumint(9) NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
