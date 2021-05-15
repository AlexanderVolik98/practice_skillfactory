-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 15 2021 г., 22:15
-- Версия сервера: 5.7.33-0ubuntu0.18.04.1
-- Версия PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice_secure`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `LOGIN` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_role` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `LOGIN`, `PASSWORD`, `user_role`) VALUES
(15, 'eelsay1@gmail.com', '$2y$10$0L.8xs3.N0xysngm9CWXDe35YYTFjXho6A48UQQ3ccpkZN0QgFjUa', 'admin'),
(16, 'eelsay1@gmail.com123', '$2y$10$nMujMZzM4EtXm.3VDJO57OT6f3yRTxx9qOUt3E7W/r2OzawHfppvi', 'user'),
(19, '', '$2y$10$EuyijKiUIEMvJVpdxSkL1unGAsaH9X5fH7D.q4je7MVZ1Zgje3n1.', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
