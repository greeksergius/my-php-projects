-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.35:3306
-- Время создания: Дек 04 2024 г., 03:22
-- Версия сервера: 10.6.20-MariaDB-cll-lve-log
-- Версия PHP: 7.4.11
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
--
-- Структура таблицы `rasptable`
--
CREATE TABLE `rasptable_changes` (
  `idr` int(11) NOT NULL,
  `groupsql` varchar(100) NOT NULL,
  `numberlectionsql` int(3) NOT NULL,
  `timelectionsql` text NOT NULL,
  `namelectionsql` varchar(255) NOT NULL,
  `fioprepodsql` varchar(255) NOT NULL,
  `audsql` varchar(255) NOT NULL,
  `datelectionsql` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
--
-- Индексы сохранённых таблиц
--
-- База данных: `yakit_journalattendance`
--
INSERT INTO `rasptable_changes` (`idr`, `groupsql`, `numberlectionsql`, `timelectionsql`, `namelectionsql`, `fioprepodsql`, `audsql`, `datelectionsql`) VALUES
(1, 'ЮП-9-24', 3, '11.40- 13.10', 'Основы безопасности и защиты Родины', 'Рогожина Татьяна Васильевна', 'каб. 607', '2024-12-07'),
(2, 'ЮП-9-24', 6, '16.55- 18.25', 'Литература', 'Пономарева Раиса Дмитриевна', 'Moodle', '2024-12-07');
-- --------------------------------------------------------
-- Индексы таблицы `rasptable`
--
ALTER TABLE `rasptable_changes`
  ADD UNIQUE KEY `idr` (`idr`);
--
-- AUTO_INCREMENT для сохранённых таблиц
--
ALTER TABLE `rasptable_changes`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
--
-- AUTO_INCREMENT для таблицы `rasptable`
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

