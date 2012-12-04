-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2012. dec. 04. 14:23
-- Szerver verzió: 5.5.16
-- PHP verzió: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `7merfold_development`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information` text COLLATE utf8_hungarian_ci NOT NULL,
  `useful_information` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights`
--

CREATE TABLE IF NOT EXISTS `sights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `sights`
--

INSERT INTO `sights` (`id`, `name`, `image_file`) VALUES
(1, 'Két ember háta adatbázisból', '3.jpeg');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights_trips`
--

CREATE TABLE IF NOT EXISTS `sights_trips` (
  `sight_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `sights_trips`
--

INSERT INTO `sights_trips` (`sight_id`, `trip_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `travel_date` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `travel_price_includes` text COLLATE utf8_hungarian_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `country_id` int(11) NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `circle_image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `short_description` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `trips`
--

INSERT INTO `trips` (`id`, `name`, `description`, `price`, `travel_date`, `travel_price_includes`, `updated`, `created`, `country_id`, `image_file`, `circle_image_file`, `short_description`) VALUES
(1, 'Teszt utazás 1.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', '12000', '2012-12-11', 'büféreggeli\r\nsajtoskifli\r\nmedence használat', '2012-12-04 12:33:33', '0000-00-00 00:00:00', 1, '', '', 'Teszt utazás rövid leírása');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
