-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 11 2020 г., 21:12
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1117769_default`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sn_exkyrsia_config`
--

CREATE TABLE `sn_exkyrsia_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinytext NOT NULL,
  `smooth` tinyint(1) NOT NULL DEFAULT '0',
  `fadeIn` tinyint(1) NOT NULL DEFAULT '0',
  `scale_x` float NOT NULL,
  `scale_y` float NOT NULL,
  `scale_z` float NOT NULL,
  `rotation_x` float NOT NULL,
  `rotation_y` float NOT NULL,
  `rotation_z` float NOT NULL,
  `position_x` float NOT NULL,
  `position_y` float NOT NULL,
  `position_z` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sn_exkyrsia_config`
--

INSERT INTO `sn_exkyrsia_config` (`id`, `type`, `smooth`, `fadeIn`, `scale_x`, `scale_y`, `scale_z`, `rotation_x`, `rotation_y`, `rotation_z`, `position_x`, `position_y`, `position_z`) VALUES
(1, 'custom', 0, 1, 0.5, 0.5, 0.5, -90, 0, 0, 0, -0.5, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sn_exkyrsia_config`
--
ALTER TABLE `sn_exkyrsia_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sn_exkyrsia_config`
--
ALTER TABLE `sn_exkyrsia_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
