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
-- Структура таблицы `sn_exkyrsia_info`
--

CREATE TABLE `sn_exkyrsia_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `published` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sn_exkyrsia_info`
--

INSERT INTO `sn_exkyrsia_info` (`id`, `title`, `description`, `published`) VALUES
(1, 'VR headset demo', 'Первая демо - модель нашего проекта', '2020-09-11 13:57:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sn_exkyrsia_info`
--
ALTER TABLE `sn_exkyrsia_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sn_exkyrsia_info`
--
ALTER TABLE `sn_exkyrsia_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
