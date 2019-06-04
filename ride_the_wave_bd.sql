-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2019 г., 09:37
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ride_the_wave_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `productinfo`
--

CREATE TABLE `productinfo` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `productinfo`
--

INSERT INTO `productinfo` (`id`, `product_name`, `product_price`, `Date`) VALUES
(1, 'albeni', '25', '2019-06-03 12:20:29'),
(2, 'bounty', '15', '2019-06-03 12:21:14'),
(3, 'cola', '15', '2019-06-03 12:21:30'),
(4, 'kitkat', '15', '2019-06-03 12:21:53'),
(5, 'konti', '30', '2019-06-03 12:22:42'),
(6, 'lays', '35', '2019-06-03 12:23:04'),
(7, 'letsgo', '25', '2019-06-03 12:23:22'),
(8, 'lubyatovo', '35', '2019-06-03 12:23:40'),
(9, 'picnic', '40', '2019-06-03 12:23:51'),
(10, 'snickers', '30', '2019-06-03 12:24:02'),
(11, 'twix', '20', '2019-06-03 12:24:17');

-- --------------------------------------------------------

--
-- Структура таблицы `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `userinfo`
--

INSERT INTO `userinfo` (`id`, `username`, `password`, `Date`) VALUES
(1, 'Aibek', '123', '2019-06-04 07:31:40');

-- --------------------------------------------------------

--
-- Структура таблицы `userproductchoice`
--

CREATE TABLE `userproductchoice` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_product_choice` varchar(30) NOT NULL,
  `product_times` int(6) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `userproductchoice`
--

INSERT INTO `userproductchoice` (`id`, `username`, `user_product_choice`, `product_times`, `Date`) VALUES
(1, 'aibek', 'albeni', 3, '2019-06-04 07:32:24'),
(2, 'aibek', 'kitkat', 2, '2019-06-04 07:32:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `userproductchoice`
--
ALTER TABLE `userproductchoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `productinfo`
--
ALTER TABLE `productinfo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `userproductchoice`
--
ALTER TABLE `userproductchoice`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
