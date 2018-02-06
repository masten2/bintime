-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 07 2018 р., 01:00
-- Версія сервера: 5.5.50
-- Версія PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bintime`
--

-- --------------------------------------------------------

--
-- Структура таблиці `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `client`
--

INSERT INTO `client` (`id`, `login`, `password`, `name`, `lastName`, `gender`, `created_at`, `mail`) VALUES
(21, 'FinalLogin1', '123456', 'Т', 'Т', 1, '2018-02-06 23:54:20', 'final@gmail.com'),
(22, 'FinalLogin2', '123456', 'Name111', 'Lastname222', 1, '2018-02-06 23:55:51', 'final2@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблиці `clientAddress`
--

CREATE TABLE IF NOT EXISTS `clientAddress` (
  `id` int(11) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `countryCode` varchar(255) NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `streetName` varchar(255) NOT NULL,
  `houseNumber` varchar(255) NOT NULL,
  `apartmentNumber` varchar(255) DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `clientAddress`
--

INSERT INTO `clientAddress` (`id`, `postcode`, `countryCode`, `cityName`, `streetName`, `houseNumber`, `apartmentNumber`, `client_id`) VALUES
(20, '050505', 'UA', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 21),
(21, '040404', 'UA', 'asdasd222', 'asdasd222', 'asdasd222', 'asasd222', 22),
(22, '01230123012', 'GE', 'sadasd', 'dasdasd', 'asdasd', 'dasdasd', 22),
(23, '31231', 'AS', 'dasdasd', 'asdasdasd', 'asdasdas', 'adsdasd', 22),
(24, '2132132', 'SD', 'sdad', 'asdasd', 'asdasd', 'asdasd', 22),
(25, '213123', 'AS', 'sadasd', 'asdasd', 'dasdasd', 'asdsad', 22),
(26, '213123', 'SD', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 22);

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1517925701),
('m180206_140122_create_client_table', 1517925704),
('m180206_140319_create_clientAddress_table', 1517926131),
('m180206_181151_create_clientAddress_table', 1517940756);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Індекси таблиці `clientAddress`
--
ALTER TABLE `clientAddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientAddress_client_id` (`client_id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблиці `clientAddress`
--
ALTER TABLE `clientAddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `clientAddress`
--
ALTER TABLE `clientAddress`
  ADD CONSTRAINT `clientAddress_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
