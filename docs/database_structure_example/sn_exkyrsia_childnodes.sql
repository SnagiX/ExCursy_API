-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 03 2020 г., 20:27
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
-- Структура таблицы `sn_exkyrsia_childnodes`
--

CREATE TABLE `sn_exkyrsia_childnodes` (
  `u_id` int(11) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `tag` tinytext NOT NULL,
  `type` tinytext NOT NULL,
  `insensity` tinyint(3) UNSIGNED NOT NULL,
  `position_x` float NOT NULL,
  `position_y` float NOT NULL,
  `position_z` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sn_exkyrsia_childnodes`
--

INSERT INTO `sn_exkyrsia_childnodes` (`u_id`, `id`, `tag`, `type`, `insensity`, `position_x`, `position_y`, `position_z`) VALUES
(1, 1, 'a-light', 'ambient', 4, 0, 0, 0),
(2, 1, 'a-light', 'point', 1, 0, 0, -1.2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sn_exkyrsia_childnodes`
--
ALTER TABLE `sn_exkyrsia_childnodes`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sn_exkyrsia_childnodes`
--
ALTER TABLE `sn_exkyrsia_childnodes`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
