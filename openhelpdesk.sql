-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 26. Januar 2012 um 10:13
-- Server Version: 5.1.41
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `openhelpdesk`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mailaccounts`
--

CREATE TABLE IF NOT EXISTS `mailaccounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(10) NOT NULL,
  `folder` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `mailaccounts`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mailaccounts_queues`
--

CREATE TABLE IF NOT EXISTS `mailaccounts_queues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mailaccount_id` int(10) unsigned NOT NULL,
  `queue_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `mailaccounts_queues`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `ticket_id` int(10) unsigned NOT NULL,
  `timestamp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mailaccount_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `mails`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `queues`
--

CREATE TABLE IF NOT EXISTS `queues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `queues`
--

INSERT INTO `queues` (`id`, `name`, `description`) VALUES
(1, 'Pool', 'Default queue for new, unassigned tickets');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'New'),
(2, 'Answered and still open'),
(3, 'Answered waiting for feedback'),
(4, 'Closed successfully'),
(5, 'Closed without success'),
(6, 'Rejected');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `reporter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `queue_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `tickets`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `users`
--

