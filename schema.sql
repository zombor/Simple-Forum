-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2009 at 09:18 PM
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
  PRIMARY KEY  (`id`),
  KEY `forum_discussion_id` (`forum_discussion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_discussions`
--

CREATE TABLE IF NOT EXISTS `forum_discussions` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(75) NOT NULL,
  `forum_category_id` mediumint(9) unsigned NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `forum_category_id` (`forum_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_discussions`
--

CREATE TABLE IF NOT EXISTS `forum_user_discussions` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL,
  `forum_discussion_id` mediumint(8) unsigned NOT NULL,
  `forum_comment_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `forum_discussion_id` (`forum_discussion_id`),
  KEY `forum_comment_id` (`forum_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD CONSTRAINT `forum_comments_ibfk_1` FOREIGN KEY (`forum_discussion_id`) REFERENCES `forum_discussions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_discussions`
--
ALTER TABLE `forum_discussions`
  ADD CONSTRAINT `forum_discussions_ibfk_1` FOREIGN KEY (`forum_category_id`) REFERENCES `forum_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_user_discussions`
--
ALTER TABLE `forum_user_discussions`
  ADD CONSTRAINT `forum_user_discussions_ibfk_2` FOREIGN KEY (`forum_comment_id`) REFERENCES `forum_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_user_discussions_ibfk_1` FOREIGN KEY (`forum_discussion_id`) REFERENCES `forum_discussions` (`id`) ON DELETE CASCADE;
