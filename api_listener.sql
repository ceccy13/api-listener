-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 май 2020 в 21:57
-- Версия на сървъра: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_listener`
--
CREATE DATABASE IF NOT EXISTS `api_listener` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `api_listener`;

-- --------------------------------------------------------

--
-- Структура на таблица `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `shipping_total` float NOT NULL,
  `create_time` int(11) NOT NULL,
  `timezone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `order`
--

INSERT INTO `order` (`id`, `total`, `shipping_total`, `create_time`, `timezone`, `created_at`) VALUES
(1004871, 10.46, 2.4, 1579866242, 'Asia/Singapore', '2020-05-30 19:23:39');

-- --------------------------------------------------------

--
-- Структура на таблица `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `SKU` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SKU`),
  UNIQUE KEY `SKU` (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=844 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `created_at`, `expired_at`, `is_active_status`) VALUES
(843, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI5YTJhZjhmMzU0NmQ0MDRiNjBkYjc2NzJlOTIwZTE2MjdmNGYyZTE0MzMwMzEwNzdkZGIyNTgyYmYxZDcxYTJkYWM1YTZiMzQ1ZjMwMWQ5In0.eyJhdWQiOiJ2bGFkaXNsYXYuc3RyYXRvbmlrb3ZAd2VhcmVwZW50YWdvbi5jb20iLCJqdGkiOiJiOWEyYWY4ZjM1NDZkNDA0YjYwZGI3NjcyZTkyMGUxNjI3ZjRmMmUxNDMzMDMxMDc3ZGRiMjU4MmJmMWQ3MWEyZGFjNWE2YjM0NWYzMDFkOSIsImlhdCI6MTU5MDg2NjYxNywibmJmIjoxNTkwODY2NjE3LCJleHAiOjE1OTA4NzAyMTcsInN1YiI6IiIsInNjb3BlcyI6W119.BQQrNcxPecMtKE08dDNPbKmshbzeGeCUmJVPQmJeMLSiKjQClcDBmXyAvOOAeM6tYx3aekIv3647ZY509hIDSlSa5liJzWNi75NHYdFg6HUWySPcIot2jdNKVix2cFb3mrBBHLvQE4VRAjbP6ctvNUcI3JiaFSl8BB_o6eJahQ-Q84MWjIgscyWRRdWdaneTNt6L6r3kvE_EGXIsyYqAFFfK9kAHkrgaloBAiIdpu9zKre0iiADBZ6qnztDJ3Abo9ZvwJmxspljN_6obRkhATknOX1IULQkKRxTE0Ha58WFrR1kanwaAl_u3Zg2xISRxxIUpbIx9PQb7aAf8yf1u0g', '2020-05-30 19:23:37', '2020-05-30 20:23:37', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
