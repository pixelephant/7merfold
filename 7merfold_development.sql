-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2012. dec. 04. 15:36
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
  `information` text COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Kötelező országinformációk',
  `useful_information` text COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Érdekességek és egyéb országgal kapcsolatos hasznos információk',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`id`, `information`, `useful_information`, `created`, `name`) VALUES
(1, 'Országleírás', 'Hasznos információk', '2012-12-04 14:33:15', 'Teszt ország');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights`
--

CREATE TABLE IF NOT EXISTS `sights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Látnivaló képe',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Látnivalók tárolása' AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `sights`
--

INSERT INTO `sights` (`id`, `name`, `image_file`, `created`) VALUES
(1, 'Teszt látnivaló', '3.jpeg', '2012-12-04 14:33:15');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights_trips`
--

CREATE TABLE IF NOT EXISTS `sights_trips` (
  `sight_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  KEY `sight` (`sight_id`),
  KEY `trip` (`trip_id`)
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
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Az ár leírása szövegesen''',
  `travel_date` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Időpontok leírása''',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '2012-10-19 12:35:27',
  `short_description` text COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Út rövid leírása, a listázáskor ez jelenik meg''',
  `travel_price_includes` text COLLATE utf8_hungarian_ci COMMENT '''Mit tartalmaz az ár''',
  `country_id` int(11) NOT NULL COMMENT 'Ország azonosítója',
  `image_file` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT '''kép fájl neve''',
  `circle_image_file` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT '''kör alakú kép fájl neve''',
  `hajozz` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'kikerüljön-e a hajozz.eu-ra mutató link?',
  PRIMARY KEY (`id`),
  KEY `country` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Egyes utak tárolása' AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `trips`
--

INSERT INTO `trips` (`id`, `description`, `name`, `price`, `travel_date`, `updated`, `created`, `short_description`, `travel_price_includes`, `country_id`, `image_file`, `circle_image_file`, `hajozz`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 1.', '120000', '2012-11-11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 1, '3.jpeg', '3.jpeg', 1),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 1.', '120000', '2012-11-11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 1, '3.jpeg', '3.jpeg', 0);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `sights_trips`
--
ALTER TABLE `sights_trips`
  ADD CONSTRAINT `sight` FOREIGN KEY (`sight_id`) REFERENCES `sights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trip` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
