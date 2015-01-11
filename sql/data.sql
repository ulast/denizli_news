-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu versiyonu:             5.6.17 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- times için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `times` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `times`;


-- tablo yapısı dökülüyor times.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `title` longtext NOT NULL,
  `url` longtext NOT NULL,
  PRIMARY KEY (`category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Veri çıktısı seçilmemişti


-- tablo yapısı dökülüyor times.news
CREATE TABLE IF NOT EXISTS `news` (
  `news_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `source` int(11) NOT NULL,
  `source_link` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  `category` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`news_ID`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Veri çıktısı seçilmemişti


-- tablo yapısı dökülüyor times.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `page_ID` int(11) NOT NULL AUTO_INCREMENT,
  `parent_ID` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`page_ID`),
  KEY `parent_ID` (`parent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Veri çıktısı seçilmemişti


-- tablo yapısı dökülüyor times.sources
CREATE TABLE IF NOT EXISTS `sources` (
  `source_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `url` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `logo` longtext NOT NULL,
  `last_insert` datetime NOT NULL,
  PRIMARY KEY (`source_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Veri çıktısı seçilmemişti


-- tablo yapısı dökülüyor times.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `video_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `image` longtext NOT NULL,
  `url` longtext NOT NULL,
  PRIMARY KEY (`video_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Veri çıktısı seçilmemişti
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
