-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2012. dec. 15. 16:45
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
-- Tábla szerkezet: `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'milyen címen akarjuk elérni a kategóriát',
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Ez jelenik meg a menüben',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keywords` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Menü kategóriák' AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created`, `keywords`, `title`) VALUES
(1, 'varosi-kalandok', 'Városi kalandok', '2012-12-13 11:28:27', 'Városi kalandok', 'Városi kalandok'),
(2, 'korutazasok', 'Körutazások', '2012-12-13 11:28:27', 'Körutazások', 'Körutazások'),
(3, 'nyaralasok-uveghegyen-tul', 'Üveghegyen túl', '2012-12-13 11:28:27', 'Üveghegyen túl', 'Üveghegyen túl'),
(4, 'nyaralasok-uveghegyen-innen', 'Üveghegyen innen', '2012-12-13 11:28:27', 'Üveghegyen innen', 'Üveghegyen innen'),
(5, 'felfedezoutak', 'Felfedezőutak', '2012-12-13 11:28:27', 'Felfedezőutak', 'Felfedezőutak');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `contact_type` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet: `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information` text COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Kötelező országinformációk',
  `useful_information` text COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Érdekességek és egyéb országgal kapcsolatos hasznos információk',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `visa_info` text COLLATE utf8_hungarian_ci,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`id`, `information`, `useful_information`, `created`, `name`, `visa_info`, `image_file`, `slug`, `keywords`, `title`) VALUES
(1, 'Görögország', 'Görögország hasznos', '2012-12-13 12:34:53', 'Görögország', 'vízum információ: Görögország', 'gorogo.png', 'Görögország1', 'Görögország', 'Görögország'),
(2, 'Deviza előírások: a belföldi és külföldi fizetőeszközök be- és kivitele nem korlátozott.\r\nEgészségügyi előírások: kötelező védőoltás nincs, több helyen a palackozott víz fogyasztása javasolt.\r\nElektromos feszültség: 220 V.\r\nPénznem: euro, 1 EUR = 100 cent. Nemzetközi hitelkártyák széles körben elfogadottak.\r\nIdőjárás: kontinentális', 'Franciaország nemzeti szimbóluma Marianne, a gall-sapkás nőalak, aki egyben a szabadság és a francia forradalom jelképe is. Az előző szimbólum a Gall Kakas volt, a vakmerő bátorság jelképe.', '2012-12-15 14:44:09', 'Franciaország', 'vízum információ: Franciaország', 'franciao.png', 'franciaorszag', 'Franciaország', 'Franciaország'),
(3, 'országinformáció: Spanyolország', 'A spanyol szó végső eredete a latin HISPANIOLUS, azaz kb. ’hispánka’, amely espaignol alakban került a provanszálba, onnan español írásmóddal a spanyolba, majd a többi (újlatin) nyelvbe. A magyar nyelvben egy északolasz nyelvjárási – s-sel ejtett – spagnol alak honosodott meg.', '2012-12-15 14:52:04', 'Spanyolország', 'vízum információ: Spanyolország', 'franciao.png', 'Spanyolország3', 'Spanyolország', 'Spanyolország'),
(4, 'országinformáció: Skócia', 'Skócia (angolul Scotland, skót gaelül Alba) Nyugat-Európában található, Nagy-Britannia második legnagyobb országrésze terület és népesség alapján. A Brit-sziget északi harmadát foglalja el, délről Anglia, keletről az Északi-tenger, északról és nyugatról az Atlanti-óceán határolja, délnyugatról pedig az Északi-csatorna és az Ír-tenger. Mintegy 790 sziget tartozik hozzá.', '2012-12-13 12:35:30', 'Skócia', 'vízum információ: Skócia', '3.jpeg', 'Skócia4', 'Skócia', 'Skócia'),
(5, 'A Német Szövetségi Köztársaság (németül Bundesrepublik Deutschland; nemzetközi szerződésekben, okmányokban, hivatalos fórumokon a Németországi Szövetségi Köztársaság megnevezés szerepel hivatalos országnévként) Európa vezető, s a világ negyedik vezető ipari és gazdasági nagyhatalma (az USA, Kína és Japán után), Közép-Európában fekszik.', 'A Német Szövetségi Köztársaság (németül Bundesrepublik Deutschland; nemzetközi szerződésekben, okmányokban, hivatalos fórumokon a Németországi Szövetségi Köztársaság megnevezés szerepel hivatalos országnévként) Európa vezető, s a világ negyedik vezető ipari és gazdasági nagyhatalma (az USA, Kína és Japán után), Közép-Európában fekszik.', '2012-12-15 14:52:11', 'Németország', NULL, 'franciao.png', 'nemetorszag', 'Németország', 'Németország'),
(6, 'A Magyarországnál hétszer kisebb területű szigetcsoport 690 szigete és több mint 2000 korallszirtje Floridától délkeletre ívelődik az Atlanti-óceánban.', 'A Magyarországnál hétszer kisebb területű szigetcsoport 690 szigete és több mint 2000 korallszirtje Floridától délkeletre ívelődik az Atlanti-óceánban.', '2012-12-15 14:52:46', 'Bahamák/Bermudák', NULL, 'franciao.png', 'bahamak-bermudak', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `star_rating` int(11) NOT NULL,
  `description` text COLLATE utf8_hungarian_ci,
  `accommodation` text COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `trip_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=4 ;

--
-- A tábla adatainak kiíratása `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `star_rating`, `description`, `accommodation`, `price`, `trip_id`) VALUES
(1, 'Catalonia Aragón', 3, 'Az egyszerű, de barátságos szálloda a Sagrada amiliától alig pár lépésre épült. Tömegközlekedéssel vagy gyalogosan a város többi nevezetessége is könnyen megközelíthető. 160 szobája légkondicionált, telefonnal, tv-vel, széffel és hajszárítóval felszerelt. Szolgáltatásai: étterem, bár, parkoló.', 'Teszt hotel 1 ellátása', 'Kétágyas szoba 13 900 Ft/fő/éj reggelivel', 1),
(2, 'A&O Hauptbahnhof', 2, 'A főpályaudvartól 10 perc sétára épült a szálloda. A Hafen-city és a legjelentősebb bevásárlóutcák is gyalogos távolságra vannak. A szobákban wifi, a hallban internetsarok várja a vendégeket. Szolgáltatásai: billiárd, csocsó, Nintendo játékok, bár. Szobái egyszerűen berendezettek.', 'Ellátás', 'Kétágyas szoba 12 200 Ft/fő/éjtől', 2),
(3, 'Commodore', 3, 'A hoteltől néhány perc sétára van a kikötő, a belváros és a Reeperbahn negyed. Szobái barátságosan felszereltek, tv-vel, telefonnal, wifivel berendezettek. Szolgáltatásai: étterem, bár, parkoló.', '', 'Kétágyas szoba 16 700 Ft/fő/éjtől', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `maps`
--

DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `lng` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `trip_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `maps`
--

INSERT INTO `maps` (`id`, `lat`, `lng`, `trip_id`, `created`) VALUES
(1, '40.737102', '-73.990318', 6, '2012-12-14 11:15:48'),
(2, '40.749825', '-73.987963', 6, '2012-12-14 11:15:48');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=11 ;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image_file`, `created`, `slug`, `keywords`, `page_title`) VALUES
(1, 'Sokan szeretnek nyaralni!', 'Kutatók megállapították, hogy a nyaralás jó.2', '3.jpeg', '2012-12-14 11:50:52', 'sokan-szeretnek-nyaralni', 'Sokan szeretnek nyaralni!', 'Sokan szeretnek nyaralni!'),
(2, 'A hajó utak menők!', 'Brit tudósok kimutatták, hogy az emberek 98%-a imádja a hajókat. Miért ne nyaralna ön is hajón?', '3.jpeg', '2012-12-13 12:31:07', 'a-hajo-utak-menok', 'A hajó utak menők!', 'A hajó utak menők!');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `trip_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=13 ;

--
-- A tábla adatainak kiíratása `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `image_file`, `trip_id`) VALUES
(1, '1. nap', 'leírás', NULL, 1),
(2, '1. nap', 'Elutazás Budapestről menetrend szerinti járattal, átszállással. Érkezés Edinburghba a késő délutáni órákban. Vacsora és szállás Edinburghban.', '3.jpeg', 6),
(3, '2. nap', 'Egész napos városnézés Edinburghban. Először panorámás városnézés: a város „új” negyede: az 1766 és 1840 között emelt épületek között elbűvölő terek és kertek láthatók. Az óváros látnivalói: a Royal Mile, a Grass market, a Cowgate, a Skót Királyi Múzeum, majd az Edinburgh kastély és a Holyrood House megtekintése, amely a királyi család szálláshelye volt. Vacsora és szállás Edinburghban.', '3.jpeg', 6),
(4, '3. nap', 'Látogatás Stirlingbe, a vár megtekintése, ami az egyik legnagyobb és – úgy építészetileg, mint történelmileg – legfontosabb vár Skóciában. Látogatás Doune kastélyában, ahol a Gyalog galopp című film több jelenetét is forgatták. A tavakkal és erdőkkel tarkított The Trossachs Nemzeti Parkon, majd Glencoe vidékén keresztül továbbutazás Fort Williambe. Vacsora és szállás Fort William környékén.', '3.jpeg', 6),
(5, '4. nap', 'Egész napos kirándulás a Skye szigetre. Elsőnek az 1745-ös felkelés emlékére emelt Glenfinnan emlékmű felkeresése. Rövid kompos utazás Mallaigből a sziget déli csücskére, Armadale-be. A Cuillin hegyeken át északra utazva Portree halászfaluig jutunk, ahonnan busszal folytatjuk az utat a szárazföldre. Ezután az 1214-ben épült Eilean Donan vár megtekintésére kerül sor, amely számos filmnek szolgált díszletül. Vacsora és szállás Fort William környékén.', '3.jpeg', 6),
(6, '5. nap', 'Utazás az Urqhuart kastélyhoz a „rémektől hemzsegő” Loch Ness-i tó melett. Az úton érdemes ébernek lenni, hátha Nessi is felbukkan a tó vizén. Skócia leghíresebb kiállításának a Loch Ness 2000-nek a meglátogatása, majd késő délután utazás Invernessbe. Vacsora és szállás Inverness környékén.', '3.jpeg', 6),
(7, '6. nap', 'Délelőtt az 1746-os csata helyszíne, Culloden Moor megtekintése, ahol az angol kormány csapatai leverték a lázadást. Majd látogatás a Speyside régióban fekvő híres Glenfiddich whiskey lepárlóba, ahol a helyi szakemberek bemutatják az ital elkészítésének menetét, majd kóstolásra nyílik lehetőség. Ezután az Elgin katedrális romjainak megtekintése, melynek története a 13. századra nyúlik vissza. Vacsora és szállás Inverness környékén.', '3.jpeg', 6),
(8, '7. nap', 'Továbbutazás Perth irányába. A Blair kastély, majd a Pitlochry felkeresése. Ha valaki az előző nap elmulasztotta volna a whisky kóstolást, akkor most Skócia legkisebb lepárlóját tekintheti meg, az Edradour lepárlót, amely 1825 óta készíti a finom italt. Néhány mérföldre, északra látható a Scone palota, amely a skót uralkodók koronázási helye volt. Délután visszaérkezés Perthbe, vacsora és szállás Perthben.', '3.jpeg', 6),
(9, '8. nap', 'Transzfer a repülőtérre, elutazás Budapestre a menetrend szerint.', '3.jpeg', 6),
(10, '1. nap', 'Elutazás Budapestről menetrend szerinti járattal, átszállással. Érkezés Edinburghba a késő délutáni órákban. Vacsora és szállás Edinburghban.', 'Skocia_Edinburgh.jpg', 3),
(11, '2. nap', 'Egész napos városnézés Edinburghban. Először panorámás városnézés: a város „új” negyede: az 1766 és 1840 között emelt épületek között elbűvölő terek és kertek láthatók. Az óváros látnivalói: a Royal Mile, a Grass market, a Cowgate, a Skót Királyi Múzeum, majd az Edinburgh kastély és a Holyrood House megtekintése, amely a királyi család szálláshelye volt. Vacsora és szállás Edinburghban.', 'Skocia_Stirling.jpg', 3),
(12, '3. nap', 'Látogatás Stirlingbe, a vár megtekintése, ami az egyik legnagyobb és – úgy építészetileg, mint történelmileg – legfontosabb vár Skóciában. Látogatás Doune kastélyában, ahol a Gyalog galopp című film több jelenetét is forgatták. A tavakkal és erdőkkel tarkított The Trossachs Nemzeti Parkon, majd Glencoe vidékén keresztül továbbutazás Fort Williambe. Vacsora és szállás Fort William környékén.', 'Skocia_Urquhart.jpg', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL COMMENT 'Ország azonosítója',
  `description` text COLLATE utf8_hungarian_ci,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Országok régióinak tárolása';

--
-- A tábla adatainak kiíratása `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `description`, `created`, `name`) VALUES
(1, 1, 'Kréta leírása', '2012-12-06 08:51:26', 'Kréta'),
(2, 1, 'Korfu leírása', '0000-00-00 00:00:00', 'Korfu'),
(3, 2, 'Korzika (franciául: Corse, korzikaiul: Corsica) a Földközi-tenger negyedik legnagyobb szigete (Szicília, Szardínia, és Ciprus után). Olaszországtól nyugatra, Szardínia szigetétől északra, Franciaországtól pedig délkeletre fekszik. A szigetet a Ligúr-tenger választja el a szárazföldtől.\r\n\r\n<p>Korzika Franciaország 26 régiójának egyike, noha a jog magát Korzika szigetét "kollektív territórumként" határozza meg. Számos olyan fontos jogot élvez, amely nagyobb hatáskört biztosít számára, mint amennyi a többi régió rendelkezésére áll, de összességében jogi helyzete mégiscsak a többi régióéhoz hasonló. A köznyelvben Korzikát mindenesetre csak mint régiont említik meg.</p>', '2012-12-15 14:24:00', 'Korzika'),
(4, 2, 'Cote d azur', '0000-00-00 00:00:00', 'Cote d azur');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights`
--

DROP TABLE IF EXISTS `sights`;
CREATE TABLE IF NOT EXISTS `sights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Látnivaló képe',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Látnivalók tárolása' AUTO_INCREMENT=21 ;

--
-- A tábla adatainak kiíratása `sights`
--

INSERT INTO `sights` (`id`, `name`, `image_file`, `created`) VALUES
(1, 'Barcelona-1', 'bcn1.jpg', '2012-12-15 15:38:37'),
(2, 'Hotel képe', 'ufrascone1.jpg', '2012-12-15 15:10:55'),
(3, 'Hamburg-1', '1Hamburg2.jpg', '2012-12-15 14:01:31'),
(4, 'Hamburg-2', 'Hamburg4.jpg', '2012-12-15 14:01:00'),
(5, 'Hamburg-3', 'Hamburg3.jpg', '2012-12-15 14:01:46'),
(6, 'Cove-1', 'Atlantis_Cove8.jpg', '2012-12-15 15:07:32'),
(7, 'Cove-2', 'Atlantis_Cove1.jpg', '2012-12-15 15:07:55'),
(8, 'Cove-3', 'Atlantis_Cove15.jpg', '2012-12-15 15:08:15'),
(9, 'A főépület', 'jardin1.jpg', '2012-12-15 15:09:30'),
(10, 'Egyágyas szoba', 'jardin2.jpg', '2012-12-15 15:10:04'),
(11, 'Szoba', 'ufrascone2.jpg', '2012-12-15 15:11:22'),
(12, 'Látkép a szobából', 'ufrascone3.jpg', '2012-12-15 15:11:47'),
(13, 'A hotel medencéje', 'Mouettes2.jpg', '2012-12-15 15:12:39'),
(14, 'A hotel tengerpartja', 'Mouettes5.jpg', '2012-12-15 15:13:09'),
(15, 'A szoba belülről', 'Mouettes3.jpg', '2012-12-15 15:13:42'),
(16, 'Látkép', 'funtana1.jpg', '2012-12-15 15:17:30'),
(17, 'A hotel szobája', 'funtana2.jpg', '2012-12-15 15:17:52'),
(18, 'A szálloda medencéje', 'funtana3.jpg', '2012-12-15 15:18:39'),
(19, 'Barcelona-2', 'bcn2.jpg', '2012-12-15 15:38:48'),
(20, 'Barcelona-3', 'bcn4.jpg', '2012-12-15 15:38:59');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `sights_trips`
--

DROP TABLE IF EXISTS `sights_trips`;
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
(4, 2),
(3, 2),
(5, 2),
(6, 4),
(7, 4),
(8, 4),
(9, 9),
(10, 9),
(2, 7),
(11, 7),
(12, 7),
(13, 14),
(15, 14),
(14, 14),
(16, 15),
(17, 15),
(18, 15),
(1, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Az ár leírása szövegesen''',
  `travel_date` varchar(255) COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Időpontok leírása''',
  `image_file` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT '''kép fájl neve''',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '2012-10-19 12:35:27',
  `short_description` text COLLATE utf8_hungarian_ci NOT NULL COMMENT '''Út rövid leírása, a listázáskor ez jelenik meg''',
  `travel_price_includes` text COLLATE utf8_hungarian_ci COMMENT '''Mit tartalmaz az ár''',
  `country_id` int(11) NOT NULL COMMENT 'Ország azonosítója',
  `circle_image_file` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT '''kör alakú kép fájl neve''',
  `hajozz` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'kikerüljön-e a hajozz.eu-ra mutató link?',
  `region_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `accommodation` text COLLATE utf8_hungarian_ci,
  `travel_method` text COLLATE utf8_hungarian_ci,
  `minimal_persons` int(11) DEFAULT NULL,
  `extra` text COLLATE utf8_hungarian_ci COMMENT 'Tetszőleges szöveges blokk',
  `extra_title` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT 'Tetszőleges szöveges blokk címe',
  `star_rating` int(11) DEFAULT NULL,
  `day` text COLLATE utf8_hungarian_ci,
  `special` text COLLATE utf8_hungarian_ci,
  `service` text COLLATE utf8_hungarian_ci,
  `slug` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country_id`),
  KEY `region` (`region_id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Egyes utak tárolása' AUTO_INCREMENT=17 ;

--
-- A tábla adatainak kiíratása `trips`
--

INSERT INTO `trips` (`id`, `description`, `name`, `price`, `travel_date`, `image_file`, `updated`, `created`, `short_description`, `travel_price_includes`, `country_id`, `circle_image_file`, `hajozz`, `region_id`, `category_id`, `accommodation`, `travel_method`, `minimal_persons`, `extra`, `extra_title`, `star_rating`, `day`, `special`, `service`, `slug`, `keywords`, `title`) VALUES
(1, 'Spanyolország második legnagyobb városa évek óta vonzza az utazókat, művészeket és építészeket. A területét és népességét illetően az első helyen álló főváros, Madrid „örök riválisa” nem csak a focipályán. Érseki központ, egyetemváros, kongresszusi centrum és jelentős kikötőváros. 1992-ben itt rendezték a XXV. nyári olimpiai játékokat. A várost történeti eredetüknek megfelelően tíz kerületre osztották és szinte mindegyikben világhírű látnivalók várnak minket.', 'Barcelona', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-13 11:27:29', '0000-00-00 00:00:00', 'Spanyolország második legnagyobb városa évek óta vonzza az utazókat, művészeket és építészeket. A területét és népességét illetően az első helyen álló főváros, Madrid „örök riválisa” nem csak a focipályán.', 'Büféreggeli, transzfer', 3, 'temp.png', 1, 1, 1, 'Ellátás az úthoz', 'Budapestről közvetlen járatot a Wizzair, fapados légitársaság üzemeltet. Menetrendszerinti járatokkal átszállással lehet eljutni a katalán fővárosba.\r\nA repülőtérről taxival, busszal és metróval lehet a központba jutni.\r\nVárosi közlekedés: leggyorsabb a metró, de a buszhálózat is elég sűrű. Jegyek minden állomáson kaphatók, gyűjtőjegy és pár napos travelcard is vehető, ami korlátlan utazást biztosít.\r\nÉrdemes megvenni a Barcelona cardot, programunktól függően 2, 3, 4 vagy 5 napra, amivel ingyenes a tömegközlekedés, 90 nevezetességhez a belépés, valamint számos múzeumba és egyéb közlekedési eszközön kínál kedvezményt. Várostérképet és egy kis útikönyvet is adnak mellé', 12, 'Extra leírás', 'Extra szöveges blokk címe', NULL, NULL, NULL, NULL, 'Barcelona1', 'Barcelona', 'Barcelona'),
(2, '<p>A teherhajóktól a hatalmas óceánjárókig és a legkülönlegesebb vitorláshajókig mindenféle hajó megfordult már a kikötőben.</p>\r\n<p>1850 és 1939 között Hamburg más szempontból is a Világ kapuját jelentette. 5 millió európai emigrált innen. A kikötőben egykor több épületet tartottak fenn számukra, ahol az indulásra várhattak. Ezek közül az egyiket eredeti állapotába állították vissza és egy interaktív múzeumként működik, hogy bemutassa milyen nehéz döntés lehetett elhagyni a megszokott mindennapokat az ismeretlenért.</p>\r\n<p>A kikötőn kívül azonban még sok más is vonzza a látogatókat. 1,7 millió lakosával a második legnépesebb város Németországban. Vonzáskörzeteivel együtt Hamburg hétszer akkora, mint Párizs és két és félszer nagyobb területű, mint London. A város 14%-a parkokból és zöld területekből áll. 2302 hídjával megelőzi Amszterdamot és Velencét is. Jelentőségét mutatja, hogy a világon – New York után – itt található a legtöbb konzulátus, szám szerint 90.</p>\r\n<p>A kikötőn kívül azonban még sok más is vonzza a látogatókat. 1,7 millió lakosával a második legnépesebb város Németországban. Vonzáskörzeteivel együtt Hamburg hétszer akkora, mint Párizs és két és félszer nagyobb területű, mint London. A város 14%-a parkokból és zöld területekből áll. 2302 hídjával megelőzi Amszterdamot és Velencét is. Jelentőségét mutatja, hogy a világon – New York után – itt található a legtöbb konzulátus, szám szerint 90.</p>\r\n<p>A szórakoztatásról 31 színház, 6 koncertterem, 10 kabaré, 50 állami és privát múzeum gondoskodik. Az újonnan épült ultramodern kereskedelmi és üzleti központ, a Hafen-city az Elba partján fekszik.</p>\r\n<p>A városközpontban a leglátogatottabb nevezetességek az Alster-tó, a Városháza és a halpiac. A St. Michaelis templom a város egyik jelképe, közkedvelt nevén Michel. A barokk templom tornyába lépcsőn és lifttel is felmehetünk, hogy a városra nyíló panorámában gyönyörködhessünk. A város legnépszerűbb utcája a Reeperbahn negyedben a St. Pauli, ahol éjszakai bárok, mulatók, színházak, éttermek és diszkók találhatók. Itt van a piroslámpás negyed is.</p>\r\n<p>Látogasson el Ön is Hamburgba!</p>', 'Hamburg', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-15 13:51:27', '0000-00-00 00:00:00', '„A szabadságot, melyet a régiek kiharcoltak, méltón kell óvnia az utókornak”.\r\nEz Hamburg Szabad- és Hanzaváros jelmondata.\r\nA kozmopolita város az Elbának és a régi időktől fennálló kereskedelmi jogosultságának köszönheti egész létét.\r\nRotterdam és Antwerpen után Európa legnagyobb forgalmú kikötővárosa, ezért a németek a Világ Kapujának is emlegetik. Hamburgban működik a világ legmodernebb, teljesen automatizált konténerkikötője, így hiába van 120 km-re a tengertől a világ 7. legnagyobb forgalmú konténerkikötőjének számít.', 'Büféreggeli, transzfer', 5, 'temp.png', 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hamburg', 'Hamburg', 'Hamburg'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Skócia szépségei', '319 000 Ft/fő + kb. 62 000 Ft/fő repülőtéri illeték', '2012.: május 22–29., szeptember 11–18.', 'lisabon.jpeg', '2012-12-13 11:27:29', '0000-00-00 00:00:00', 'Hangulatos várak, festői tájak és az esetleges hűvös időjárás tökéletes ellenszere, a lélekmelegítő skót whisky vár Skóciában.', 'az utazást és programot a fenitek szerint magyar idegenvezetéssel, 7 éjszaka szállást kétágyas szobában, félpanziót, a betegség-, baleset-, poggyász- és útlemondási biztosítást.\r\n\r\nBelépők ára kb. 39 000 Ft/fő. Egyágyas felár 85 000 Ft/fő.', 4, 'temp.png', 0, NULL, 2, 'félpanzió, középkategóriájú (helyi háromcsillagos) szállodákban, kétágyas szobákban, 2 éj Edinburgh, 2 éj Fort William környéke, 2 éj Inverness környéke, 1 éj Perth.', 'Menetrend szerinti járatokkal Budapest – Edinburgh – Budapest útvonalon átszállással, a körutazás alatt légkondicionált autóbusszal. ', 20, NULL, NULL, NULL, NULL, NULL, NULL, 'Skócia szépségei3', 'Skócia szépségei', 'Skócia szépségei'),
(4, 'Szobái tágasak, óceánra néző francia erkéllyel, tágas terekkel és gardróbbal, márvány fürdőszobával és bárral felszereltek. Egy lépéssel lejjebb, a hálóval egy légtérben egy kis nappali rész is tartozik minden szobához kanapéval, íróasztallal. Természetesen a legújabb technikai megoldások sem maradnak el: síkképernyős HD tv, Ipod-, MP3- és laptop-töltő is van a szobában.\r\n<p>Éttermeiben ázsiai, francia és grill ételek mellett, a fine dining és a tenger gyümölcsei szerelmesei is megtalálják számításaikat, de ha ahhoz van kedved, a nemzetközi svédasztalról is válogathatsz. További kávézók és bárok is a vendégek rendelkezésére állnak.</p>\r\n<p>Szolgáltatásai: kaszinó, éjszakai klub, tradicionális balinéz masszázst és európai kezeléseket, gőzfürdőt és szaunát kínáló spa, festői elhelyezkedésű, 18-lyukú golfpálya, fitneszterem, hat teniszpálya bérelhető felszereléssel és oktatással, kézműves foglalkozások, sziklamászás, videojáték-terem, színház, könyvtár, yacht-kikötő, romváros-jellegű merülőhely a búvárkodás kedvelőinek.</p>\r\n<p>A szállóvendégek közelebbről megismerkedhetnek a fókákkal, rájákkal, delfinekkel és cápákkal is. A delfineket a sekély vízben simogathatják az úszni tudó kisgyerekek is, a mély vízben a jó úszók akár együtt is úszhatnak velük. A cápák közt egy speciális bukósisakban lehet sétálgatni a tengervízben, míg egy másik medencében az üvegfalú csúszdán keresztül láthatod a körülötted úszkáló cápákat.</p>\r\n<p>További „vizes programok” a szállodában: 24 órás aquapark csúszdákkal, játékokkal, hullámfürdővel, 20 medencével (ebből három gyerekmedence), egy gyerekeknek fenntartott vizesjátékokkal tarkított várral, egy 11-tagú fürdőmedence-rendszerrel, egy 25 méteres úszómedence, akváriumok és az óceán élővilágát bemutató különféle medencék (rájás, cápás, korallos, stb.)</p>\r\n<p>A gyerekeket az előbb felsoroltakon kívül rengeteg foglalkozás várja (főzőprogram, sportverseny, játékok, stb.), a tiniket külön diszkó várja a legtrendibb játékokkal, zenékkel, „igazi” bárpulttal egy felnőttmentes övezetben. A szálló vendégei akár a rengeteg vizi élőlény etetésében is részt vehetnek.</p>', 'The Cove Atlantis, Bahamák', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'Az Atlantis szállodacsoport egyik tagja a Bahamákon, közvetlenül a mesés tengerparton fekszik. Különlegessége exkluzív részlege, ahol egy 800 m2-es medence és két kisebb medence, napozóágyak (akár 360 fokos kilátással), festői partszakasz, privát pavilonok és egy kaszinó várja csak a felnőtteket.', 'Büféreggeli, transzfer', 6, 'temp.png', 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'the-cove-bahamak', 'Teszt út 4.', 'The Cove Atlantis, Bahamák'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 5.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-13 11:27:29', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 5.5', 'Teszt út 5.', 'Teszt út 5.'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Skócia felfedezése', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 6.6', 'Teszt út 6.', 'Skócia felfedezése'),
(7, 'Egy frissen felújított picike ház, összesen 11 szobával, melyek mindegyike nagyon hangulatosan berendezett. A házban található egy kis kávéház, a reggeli és a vacsora egy kis családi vendéglőben kerül felszolgálásra, mely kb. 700 méterre található a szállodától. Szép idő esetén a reggelit a szálloda teraszán szolgálják fel. A szállodában van ezen kívül egy kis panorámaterasz, bár és Internet, valamint parkoló.\r\n<p>A szobák színesek és nagyon hangulatosak, fürdőszobával és WC-vel, valamint műholdas TV-vel felszereltek és remek kilátás nyílik a szobákból a hegyekre. Foglalhatóak családi szobák, melyek két egymásba nyíló kétágyas szobából állnak, melyeknek közös a fürdőszobája.</p>\r\n<p>Sport és szórakozás: Térítés ellenében: lovaglás. Ezen kívül lehetőség van fürdőzésre a közeli patakban és rengeteg túrázási- és hegymászási kaland várja a környéken az ide érkezőket. Lehetőség van a GR20-as túraútvonalba is bekapcsolódni is innen.</p>', 'Hotel U Frascone', '12 100 Ft/fő/éj-től', '2012-11-11', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'A hotel kategóriájához képest jó minőségű, szép, barátságos és tiszta. Félúton van Ajaccio és Bastia között, kb. 600 méterre a tengerszint felett és kb. 1 km-re Venaco településtől, remek kilátással a hegyekre. Ez nem tengerparti szállás, de tökéletes kiindulópontja lehet a hegyi túráknak.', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 3, 4, 'reggeli', NULL, 0, NULL, NULL, 2, NULL, NULL, NULL, 'hotel-u-frascone', 'Teszt út 9.', 'Hotel U Frascone'),
(8, 'A neoklasszikus stílusú épület árkádjai és oszlopsorai közt napozóteraszok és kertek várják a vendégeket. Festői kilátás nyílik az öbölre és Monte Carlora. A kikapcsolódásra vágyó vendégek mellett szeretettel és minden szükséges szolgáltatással várják az üzleti utazókat, konferencia résztvevőket.\r\n<p>Szolgáltatásai: 4 étterem (kettő az épületben, kettő a kertekben), a tengerre néző teraszon bár, 10 konferenciaterem, egy külső és egy belső medence pezsgőfürdővel, gyerekmedence, spa,fitneszterem,  kaszinó (145 új fejlesztésű játékgéppel, ami egyszerűsíti a fizetést és nem kell mindig a kasszához járulni újabb zsetonokért), gyerekklub (6-12 éveseknek szabadtéri programok, sportolási lehetőségek, kreatív foglalkozások), éjszakai bár. A Kék Gin bárban külön billiárdszoba van, DJ szolgáltatja a zenét, a pultnál 17 különféle gint, Martini-kreációkat és különleges koktélokat kínálnak. A spaban 900 m2-en frissülhetnek és szépülhetnek a vendégek, minden korcsoportnak különféle jógaórákat is tartanak.</p>\r\n<p>Szobái légkondicionáltak, minibárral, tv-vel, hajszárítóval, széffel, telefonnal, DVD-lejátszóval, szélessávú internettel várják a vendégeket.\r\nA szálló vendégei a Monte Carlo Beach Clubban a legkülönfélébb vizisportokat próbálhatják ki, a country klubban 21 salakos teniszpálya közül választhatnak. A pályák közül 5 kivilágítható, többségük a tengerre néz. (Itt tartják a Monte Carlo Rolex Masters versenyeket is.)  A közelben gyönyörű környezetben egy 18-lyukú golfpálya várja a profi és amatőr játékosokat.</p>', 'Monte Carlo Bay Hotel and Resort', '33 900 Ft/fő/éj', '2012-11-11', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'Az autentikus és elegáns klubhotel a 30-as évek eleganciáját és legendáját teremti újjá. 4 hektárnyi kert, egy világszínvonalú spa, éttermek, kaszinó és egy legendás éjszakai bár tartozik a szállodához. 334 szobájának 75%-a a tengerre néz.', 'Reggeli', 2, 'temp.png', 0, 4, 4, '', '', NULL, '', '', 5, '', '', '', 'teszt-ut-10', 'Teszt út 10.', 'Monte Carlo Bay Hotel and Resort'),
(9, 'Szobái egyszerűen, de kényelmesen berendezettek. Többségükhöz balkon vagy terasz tartozik. Légkondicionáltak, tv-vel, telefonnal, rádióval és hajszárítóval rendelkeznek.\r\n<p>\r\nSzolgáltatásai: bár, étterem, szabadtéri és belső medence, hammam, masszázs.</p>', 'Les Jardins de St. Maxime', '19 600 Ft/fő/éj-től', '', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'A legendás St. Tropez közelében, a botanikus kertekhez közel, a homokos tengerparttól pár percnyire épült a szálloda. A hotel kertjében bougainvillea, pálmafák és babérfák nyújtanak árnyékot, a hatalmas üvegajtóknak köszönhetően az épület belseje is igen világos.', '', 2, 'temp.png', 0, 3, 4, 'Reggeli', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'Teszt út 119', 'Teszt út 11', 'Les Jardins de St. Maxime'),
(14, 'Egy 19. század végén épült főúri házban található a szálloda, melyet nagyon szépen felújítottak.<p>A szálloda hangulata magával ragadó, nem véletlen, hogy a ház tagja a francia „Châteaux & Hôtels de France“ láncnak. A vendégek rendelkezésére áll egy étterem, bárok, internet kapcsolat, egy szalon és terasz, valamint zárt parkoló.</p><p>A ház 28 szobával rendelkezik, mindegyikük elegánsan berendezett és jól felszerelt. Van bennük fürdőszoba/WC, hajszárító, fürdőköntös, telefon, műholdas tv, hűtőszekrény és légkondícionálás. Foglalhatóak tengerre néző szobák és teraszos tengerre néző szobák is. A superior szobák nagyobb méretűek, nagyobb balkon tartozik hozzájuk, mely részben fedett. A lakosztályokhoz külön szalon is tartozik.</p>\r\n<p>A vendégek rendelkezésére áll egy fűthető medence, mely a tengerre néz, továbbá napzóágyak és napernyők és pezsgőfürdő. Térítés ellenében: kerékpárkölcsönzés, masszázs, vízisportok és tenisz. A szállodától kb. 300 méterre van lehetőség hajót bérelni vagy akár hajókirándulásokat tenni és kb. 10 km távolságra van golfozási lehetőség is.</p>', 'Hotel Les Mouettes', '24 200 Ft/fő/éj-től', '', 'lisabon.jpeg', '2012-12-15 15:07:17', '2012-12-15 14:18:42', 'A szálloda kb. 1,5 km távolságra található Ajaccio történelmi központjától, csodálatos helyen, egy emelkedőn fekszik, ahonnan nagyon szép kilátás nyílik az öbölre. A korzikai naplementét a vendégek a szálloda kis privát strandjáról élvezhetik.\r\n', '', 2, 'temp.png', 0, 3, 4, 'Reggeli', '', NULL, '', '', 4, '', '', '', 'futana-marina', 'futana marina', 'Hotel Les Mouettes'),
(15, 'Ile-Rousse virágzó város, a sziget egyik idegenforgalmi központja. Enyhe klímája és öböl menti homokos strandja a várost tavasztól őszig frekventált nyaralóhellyé teszik. A város főterén - melyet hatalmas platánok árnyékolnak és kávéházak szegélyeznek - mindig nagy a nyüzsgés. A várossal szemközti szigetre, melyről a nevét is kapta a település (vörös sziget), érdekes kirándulás tehető. Legmagasabb pontján egy világítótorony áll, ahonnan szép kilátás nyílik a szomszéd szigetekre, a kikötőre, Ile Rousse-ra és a magasan fekvő Monticello falura.\r\n<p>Családi vezetés alatt álló nagyon barátságos szálloda. Szép idő esetén a reggelit a teraszon szolgálják fel. A vendégek rendelkezésére áll egy bár, internet (térítés ellenében), panorámaterasz és zárt parkoló. A szálloda 29 szobával várja a vendégeket. Mindegyik szoba jól felszerelt, van bennük zuhanyzós fürdőszoba, WC, telefon, műholdas tv, légkondícionáló és minden szobához tartozik balkon vagy egy kis kertrész. Minden szoba  tengerre néz és igény esetén foglalható picit nagyobb méretű superior szoba is.\r\nA vendégek rendelkezésére áll egy fűtött külső medence, napozóterasz, mely a tengerre néz. Itt vannak napágyak és napernyők. Térítés ellenében: kerékpár kölcsönzés, vízisportok a parton és csónakkölcsönzés.</p>', 'Funtana Marina', '14 300 Ft/fő/éj-től', '', '11lisabon.jpeg', '2012-12-15 15:07:17', '2012-12-15 14:21:49', 'Ile Rousse fölött fekszik a szálloda, ahonnan csodás kilátás nyílik a településre és az öbölre. A városközpont kb. 1 km távolságra található és ugyanilyen távolságra van a strand is.', '', 2, 'temp.png', 0, 3, 4, 'Reggeli', '', NULL, '', '', 3, '', '', '', 'futana-marina-1', 'futana marina', 'Funtana Marina'),
(16, 'Egy frissen felújított picike ház, összesen 11 szobával, melyek mindegyike nagyon hangulatosan berendezett. A házban található egy kis kávéház, a reggeli és a vacsora egy kis családi vendéglőben kerül felszolgálásra, mely kb. 700 méterre található a szállodától. Szép idő esetén a reggelit a szálloda teraszán szolgálják fel. A szállodában van ezen kívül egy kis panorámaterasz, bár és Internet, valamint parkoló.\r\n<p>A szobák színesek és nagyon hangulatosak, fürdőszobával és WC-vel, valamint műholdas TV-vel felszereltek és remek kilátás nyílik a szobákból a hegyekre. Foglalhatóak családi szobák, melyek két egymásba nyíló kétágyas szobából állnak, melyeknek közös a fürdőszobája.</p>\r\n<p>Sport és szórakozás: Térítés ellenében: lovaglás. Ezen kívül lehetőség van fürdőzésre a közeli patakban és rengeteg túrázási- és hegymászási kaland várja a környéken az ide érkezőket. Lehetőség van a GR20-as túraútvonalba is bekapcsolódni is innen.</p>', 'Hotel U Frascone', '12 100 Ft/fő/éj-től', '2012-11-11', 'lisabon.jpeg', '2012-12-15 15:07:17', '0000-00-00 00:00:00', 'A hotel kategóriájához képest jó minőségű, szép, barátságos és tiszta. Félúton van Ajaccio és Bastia között, kb. 600 méterre a tengerszint felett és kb. 1 km-re Venaco településtől, remek kilátással a hegyekre. Ez nem tengerparti szállás, de tökéletes kiindulópontja lehet a hegyi túráknak.', 'Büféreggeli, transzfer', 7, 'temp.png', 0, 3, 4, 'reggeli', NULL, 0, NULL, NULL, 2, NULL, NULL, NULL, 'hotel-u-frascone', 'Teszt út 9.', 'Hotel U Frascone');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
