-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2012. dec. 12. 11:29
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Menü kategóriák' AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created`) VALUES
(1, 'varosi-kalandok', 'Városi kalandok', '2012-12-06 08:51:26'),
(2, 'korutazasok', 'Körutazások', '0000-00-00 00:00:00'),
(3, 'nyaralasok-uveghegyen-tul', 'Üveghegyen túl', '0000-00-00 00:00:00'),
(4, 'nyaralasok-uveghegyen-innen', 'Üveghegyen innen', '0000-00-00 00:00:00'),
(5, 'felfedezoutak', 'Felfedezőutak', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=5 ;

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`id`, `information`, `useful_information`, `created`, `name`, `visa_info`, `image_file`, `slug`) VALUES
(1, 'Görögország', 'Görögország hasznos', '2012-12-12 09:16:59', 'Görögország', 'Vízum Görögországba', 'gorogo.png', 'Görögország1'),
(2, 'Deviza előírások: a belföldi és külföldi fizetőeszközök be- és kivitele nem korlátozott.\r\nEgészségügyi előírások: kötelező védőoltás nincs, több helyen a palackozott víz fogyasztása javasolt.\r\nElektromos feszültség: 220 V.\r\nPénznem: euro, 1 EUR = 100 cent. Nemzetközi hitelkártyák széles körben elfogadottak.\r\nIdőjárás: kontinentális', 'Franciaország nemzeti szimbóluma Marianne, a gall-sapkás nőalak, aki egyben a szabadság és a francia forradalom jelképe is. Az előző szimbólum a Gall Kakas volt, a vakmerő bátorság jelképe.', '2012-12-12 09:16:59', 'Franciaország', 'Vízum Franciaországba', 'franciao.png', 'Franciaország2'),
(3, '', 'A spanyol szó végső eredete a latin HISPANIOLUS, azaz kb. ’hispánka’, amely espaignol alakban került a provanszálba, onnan español írásmóddal a spanyolba, majd a többi (újlatin) nyelvbe. A magyar nyelvben egy északolasz nyelvjárási – s-sel ejtett – spagnol alak honosodott meg.', '2012-12-12 09:16:59', 'Spanyolország', NULL, '3.jpeg', 'Spanyolország3'),
(4, '', 'Skócia (angolul Scotland, skót gaelül Alba) Nyugat-Európában található, Nagy-Britannia második legnagyobb országrésze terület és népesség alapján. A Brit-sziget északi harmadát foglalja el, délről Anglia, keletről az Északi-tenger, északról és nyugatról az Atlanti-óceán határolja, délnyugatról pedig az Északi-csatorna és az Ír-tenger. Mintegy 790 sziget tartozik hozzá.', '2012-12-12 09:16:59', 'Skócia', NULL, '3.jpeg', 'Skócia4');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `star_rating`, `description`, `accommodation`, `price`, `trip_id`) VALUES
(1, 'Catalonia Aragón', 3, 'Az egyszerű, de barátságos szálloda a Sagrada amiliától alig pár lépésre épült. Tömegközlekedéssel vagy gyalogosan a város többi nevezetessége is könnyen megközelíthető. 160 szobája légkondicionált, telefonnal, tv-vel, széffel és hajszárítóval felszerelt. Szolgáltatásai: étterem, bár, parkoló.', 'Teszt hotel 1 ellátása', 'Kétágyas szoba 13 900 Ft/fő/éj reggelivel', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image_file`, `created`) VALUES
(1, 'Sokan szeretnek nyaralni!', 'Kutatók megállapították, hogy a nyaralás jó.', '3.jpeg', '0000-00-00 00:00:00'),
(2, 'A hajó utak menők!', 'Brit tudósok kimutatták, hogy az emberek 98%-a imádja a hajókat. Miért ne nyaralna ön is hajón?', '4.jpeg', '2012-12-06 08:51:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=10 ;

--
-- A tábla adatainak kiíratása `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `image_file`, `trip_id`) VALUES
(1, '1. nap', 'leírás', NULL, 1),
(2, '1. nap', 'Elutazás Budapestről menetrend szerinti járattal, átszállással. Érkezés Edinburghba a késő délutáni órákban. Vacsora és szállás Edinburghban.', '3.jpeg', 3),
(3, '2. nap', 'Egész napos városnézés Edinburghban. Először panorámás városnézés: a város „új” negyede: az 1766 és 1840 között emelt épületek között elbűvölő terek és kertek láthatók. Az óváros látnivalói: a Royal Mile, a Grass market, a Cowgate, a Skót Királyi Múzeum, majd az Edinburgh kastély és a Holyrood House megtekintése, amely a királyi család szálláshelye volt. Vacsora és szállás Edinburghban.', '3.jpeg', 3),
(4, '3. nap', 'Látogatás Stirlingbe, a vár megtekintése, ami az egyik legnagyobb és – úgy építészetileg, mint történelmileg – legfontosabb vár Skóciában. Látogatás Doune kastélyában, ahol a Gyalog galopp című film több jelenetét is forgatták. A tavakkal és erdőkkel tarkított The Trossachs Nemzeti Parkon, majd Glencoe vidékén keresztül továbbutazás Fort Williambe. Vacsora és szállás Fort William környékén.', '3.jpeg', 3),
(5, '4. nap', 'Egész napos kirándulás a Skye szigetre. Elsőnek az 1745-ös felkelés emlékére emelt Glenfinnan emlékmű felkeresése. Rövid kompos utazás Mallaigből a sziget déli csücskére, Armadale-be. A Cuillin hegyeken át északra utazva Portree halászfaluig jutunk, ahonnan busszal folytatjuk az utat a szárazföldre. Ezután az 1214-ben épült Eilean Donan vár megtekintésére kerül sor, amely számos filmnek szolgált díszletül. Vacsora és szállás Fort William környékén.', '3.jpeg', 3),
(6, '5. nap', 'Utazás az Urqhuart kastélyhoz a „rémektől hemzsegő” Loch Ness-i tó melett. Az úton érdemes ébernek lenni, hátha Nessi is felbukkan a tó vizén. Skócia leghíresebb kiállításának a Loch Ness 2000-nek a meglátogatása, majd késő délután utazás Invernessbe. Vacsora és szállás Inverness környékén.', '3.jpeg', 3),
(7, '6. nap', 'Délelőtt az 1746-os csata helyszíne, Culloden Moor megtekintése, ahol az angol kormány csapatai leverték a lázadást. Majd látogatás a Speyside régióban fekvő híres Glenfiddich whiskey lepárlóba, ahol a helyi szakemberek bemutatják az ital elkészítésének menetét, majd kóstolásra nyílik lehetőség. Ezután az Elgin katedrális romjainak megtekintése, melynek története a 13. századra nyúlik vissza. Vacsora és szállás Inverness környékén.', '3.jpeg', 3),
(8, '7. nap', 'Továbbutazás Perth irányába. A Blair kastély, majd a Pitlochry felkeresése. Ha valaki az előző nap elmulasztotta volna a whisky kóstolást, akkor most Skócia legkisebb lepárlóját tekintheti meg, az Edradour lepárlót, amely 1825 óta készíti a finom italt. Néhány mérföldre, északra látható a Scone palota, amely a skót uralkodók koronázási helye volt. Délután visszaérkezés Perthbe, vacsora és szállás Perthben.', '3.jpeg', 3),
(9, '8. nap', 'Transzfer a repülőtérre, elutazás Budapestre a menetrend szerint.', '3.jpeg', 3);

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
(3, 2, 'Korzika (franciául: Corse, korzikaiul: Corsica) a Földközi-tenger negyedik legnagyobb szigete (Szicília, Szardínia, és Ciprus után). Olaszországtól nyugatra, Szardínia szigetétől északra, Franciaországtól pedig délkeletre fekszik. A szigetet a Ligúr-tenger választja el a szárazföldtől.', '2012-12-06 13:58:06', 'Korzika'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Látnivalók tárolása' AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `sights`
--

INSERT INTO `sights` (`id`, `name`, `image_file`, `created`) VALUES
(1, 'Teszt látnivaló', '3.jpeg', '2012-12-06 08:51:26'),
(2, 'Hotel képe', '3.jpeg', '2012-12-06 08:51:26');

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
(1, 1),
(2, 7);

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
  PRIMARY KEY (`id`),
  KEY `country` (`country_id`),
  KEY `region` (`region_id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Egyes utak tárolása' AUTO_INCREMENT=10 ;

--
-- A tábla adatainak kiíratása `trips`
--

INSERT INTO `trips` (`id`, `description`, `name`, `price`, `travel_date`, `image_file`, `updated`, `created`, `short_description`, `travel_price_includes`, `country_id`, `circle_image_file`, `hajozz`, `region_id`, `category_id`, `accommodation`, `travel_method`, `minimal_persons`, `extra`, `extra_title`, `star_rating`, `day`, `special`, `service`, `slug`) VALUES
(1, 'Spanyolország második legnagyobb városa évek óta vonzza az utazókat, művészeket és építészeket. A területét és népességét illetően az első helyen álló főváros, Madrid „örök riválisa” nem csak a focipályán. Érseki központ, egyetemváros, kongresszusi centrum és jelentős kikötőváros. 1992-ben itt rendezték a XXV. nyári olimpiai játékokat. A várost történeti eredetüknek megfelelően tíz kerületre osztották és szinte mindegyikben világhírű látnivalók várnak minket.', 'Barcelona', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Spanyolország második legnagyobb városa évek óta vonzza az utazókat, művészeket és építészeket. A területét és népességét illetően az első helyen álló főváros, Madrid „örök riválisa” nem csak a focipályán.', 'Büféreggeli, transzfer', 3, 'temp.png', 1, 1, 1, 'Ellátás az úthoz', 'Budapestről közvetlen járatot a Wizzair, fapados légitársaság üzemeltet. Menetrendszerinti járatokkal átszállással lehet eljutni a katalán fővárosba.\r\nA repülőtérről taxival, busszal és metróval lehet a központba jutni.\r\nVárosi közlekedés: leggyorsabb a metró, de a buszhálózat is elég sűrű. Jegyek minden állomáson kaphatók, gyűjtőjegy és pár napos travelcard is vehető, ami korlátlan utazást biztosít.\r\nÉrdemes megvenni a Barcelona cardot, programunktól függően 2, 3, 4 vagy 5 napra, amivel ingyenes a tömegközlekedés, 90 nevezetességhez a belépés, valamint számos múzeumba és egyéb közlekedési eszközön kínál kedvezményt. Várostérképet és egy kis útikönyvet is adnak mellé', 12, 'Extra leírás', 'Extra szöveges blokk címe', NULL, NULL, NULL, NULL, 'Barcelona1'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 2.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 1, 'temp.png', 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 2.2'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Skócia szépségei', '319 000 Ft/fő + kb. 62 000 Ft/fő repülőtéri illeték', '2012.: május 22–29., szeptember 11–18.', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Hangulatos várak, festői tájak és az esetleges hűvös időjárás tökéletes ellenszere, a lélekmelegítő skót whisky vár Skóciában.', 'az utazást és programot a fenitek szerint magyar idegenvezetéssel, 7 éjszaka szállást kétágyas szobában, félpanziót, a betegség-, baleset-, poggyász- és útlemondási biztosítást.\r\n\r\nBelépők ára kb. 39 000 Ft/fő. Egyágyas felár 85 000 Ft/fő.', 4, 'temp.png', 0, NULL, 2, 'félpanzió, középkategóriájú (helyi háromcsillagos) szállodákban, kétágyas szobákban, 2 éj Edinburgh, 2 éj Fort William környéke, 2 éj Inverness környéke, 1 éj Perth.', 'Menetrend szerinti járatokkal Budapest – Edinburgh – Budapest útvonalon átszállással, a körutazás alatt légkondicionált autóbusszal. ', 20, NULL, NULL, NULL, NULL, NULL, NULL, 'Skócia szépségei3'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 4.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 4.4'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 5.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 5.5'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 6.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 6.6'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 9.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 9.7'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 10.', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 10.8'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit sapien. Curabitur nulla nibh, ornare a posuere nec, hendrerit non elit. Sed vestibulum lacus non est posuere eget adipiscing libero faucibus. Vivamus laoreet lorem a tortor feugiat non viverra velit pharetra. Cras ac tellus et urna blandit sodales vel ut ligula. Suspendisse potenti. Duis id elit elit. Quisque at nisl vel neque ultrices egestas. Vestibulum sit amet arcu ut libero placerat ornare id sed nibh. Sed molestie laoreet fermentum. Morbi aliquet, turpis in tristique pulvinar, mi nibh dictum mi, sed bibendum est ligula nec nulla. ', 'Teszt út 11', '120000', '2012-11-11', 'lisabon.jpeg', '2012-12-12 09:16:13', '0000-00-00 00:00:00', 'Teszt út rövid leírása', 'Büféreggeli, transzfer', 2, 'temp.png', 0, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teszt út 119');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
