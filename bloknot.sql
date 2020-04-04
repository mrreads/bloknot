-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2020 г., 16:34
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bloknot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bloknoti`
--

CREATE TABLE `bloknoti` (
  `id_bloknot` int(11) NOT NULL,
  `bloknot_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bloknoti`
--

INSERT INTO `bloknoti` (`id_bloknot`, `bloknot_name`) VALUES
(1, 'блокнот 1'),
(2, 'блокнот 2'),
(3, 'блокнот 3');

-- --------------------------------------------------------

--
-- Структура таблицы `zapiski`
--

CREATE TABLE `zapiski` (
  `id_zapis` int(11) NOT NULL,
  `text_zapis` varchar(1000) NOT NULL,
  `id_bloknot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zapiski`
--

INSERT INTO `zapiski` (`id_zapis`, `text_zapis`, `id_bloknot`) VALUES
(1, 'записка 1 первому блокнотуу!', 1),
(2, 'и еще одна записка к первому блокноту!', 1),
(3, 'иииии еще одна', 1),
(4, 'записка ко второму блокноту', 2),
(5, 'очередная записка ко второму блокноту', 2),
(6, 'и что же это? конечно же записка ко 2 блокноту!', 2),
(8, 'еще одна записка к третьему блокноту', 3),
(9, 'и еще одна записка к третьему блокноту!!!', 3),
(23, 'записка к третьему блокнотику!!!', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bloknoti`
--
ALTER TABLE `bloknoti`
  ADD PRIMARY KEY (`id_bloknot`);

--
-- Индексы таблицы `zapiski`
--
ALTER TABLE `zapiski`
  ADD PRIMARY KEY (`id_zapis`),
  ADD KEY `id_bloknot` (`id_bloknot`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bloknoti`
--
ALTER TABLE `bloknoti`
  MODIFY `id_bloknot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `zapiski`
--
ALTER TABLE `zapiski`
  MODIFY `id_zapis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zapiski`
--
ALTER TABLE `zapiski`
  ADD CONSTRAINT `zapiski_ibfk_1` FOREIGN KEY (`id_bloknot`) REFERENCES `bloknoti` (`id_bloknot`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
