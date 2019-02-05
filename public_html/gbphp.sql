-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 05 2019 г., 15:41
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `quanity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(2) NOT NULL,
  `url` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CountClick` int(3) NOT NULL COMMENT 'Количество переходов',
  `ProductDescription` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `size`, `name`, `CountClick`, `ProductDescription`) VALUES
(1, '1.jpg', '767 x 529', '1', 63, 'Это хороший товар.'),
(2, '2.jpg', '560 x 542', '2', 27, 'Очень хороший товар.'),
(3, '3.jpg', '1600 x 665', '3', 2, 'Товар.'),
(4, '4.jpg', '560 x 261', '4', 4, 'Очень хороший товар. Очень хороший товар. Очень хороший товар. Очень хороший товар.'),
(5, '5.jpg', '1600 x 438', '5', 0, 'Нужный товар.'),
(6, '6.jpg', '560 x 542', '6', 6, 'Новый товар.'),
(7, '7.jpg', '597 x 724', '7', 12, 'Самый новый товар.');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `num` int(11) NOT NULL COMMENT 'номер отзыва',
  `id_images` int(11) NOT NULL,
  `name` text NOT NULL COMMENT 'имя',
  `review` text NOT NULL COMMENT 'отзыв'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`num`, `id_images`, `name`, `review`) VALUES
(23, 2, 'wetewtwt', 'e'),
(27, 2, 'ADadA', 'ADadAD'),
(31, 7, 'eqwqwe', 'wqeqwe'),
(32, 6, '4234234', '23423423'),
(33, 4, 'eqwetwet', 'eq'),
(35, 4, 'qwrqr', 'wqrqwr'),
(37, 5, 'safasf', '124214124'),
(40, 7, 'werewrwerwer', 'ewrwerwe'),
(41, 5, '142352315', '3253253253252'),
(42, 3, '1242412', '412412412'),
(43, 5, '3463443634', '634634634634'),
(44, 6, 'wqrqwqw', 'wqrqwr'),
(45, 3, '32523', '5235235'),
(49, 1, 'ФВфв', 'ФВФВ'),
(63, 1, 'sdshsdhdshsdh', 'sdhsdhsdhsdddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(67, 1, '1421414', '124124142'),
(68, 1, 'ASDASFAFASF', 'SAFASFASFAFAFSAFAF'),
(69, 0, '', ''),
(70, 1, 'sgdssd', 'sdgsdgsd'),
(71, 0, '', ''),
(72, 0, '', ''),
(73, 0, '', ''),
(74, 0, '', ''),
(75, 0, '', ''),
(76, 0, '', ''),
(78, 0, '', ''),
(79, 1, 'safaas', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffftttttttttt'),
(80, 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '0' COMMENT '1 - адин, 0 - юзер',
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `dob`) VALUES
(1, 'Вася', 'admin', '21db9c15a75962a0865d5a39fe7fb9ff', 1, '2000-01-25'),
(2, 'Света', 'svet', 'svet', 0, NULL),
(35, 'Саня', 'sah', '123', 0, '2004-02-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`num`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT COMMENT 'номер отзыва', AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
