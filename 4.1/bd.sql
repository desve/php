-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 05 2018 г., 19:18
-- Версия сервера: 5.5.57-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `year`, `isbn`, `genre`) VALUES
(1, 'Жесткий тайм-менеджмент. Возьмите свою жизнь под контроль', 'Дэн Кеннеди', 2015, '978-5-9614-5086-6', 'Самосовершенствование'),
(2, 'Совершенный код. Практическое руководство по разработке программного обеспечения', 'Стив Макконнелл', 2005, '978-5-7502-0064-1', 'Программирование'),
(3, 'Богатый папа, бедный папа', 'Роберт Кийосаки', 2011, '978-985-15-1659-5', 'Бизнес'),
(4, 'Scrum. Революционный метод управления проектами', 'Джефф Сазерленд', 2014, '978-5-00057-722-6', 'Менеджмент'),
(5, 'Пятьдесят оттенков серого', 'Э. Л. Джеймс', 2012, '978-5-699-78002-0', 'Современная зарубежная литература'),
(6, 'Remote. Офис не обязателен', 'Джейсон Фрайд', 2013, '978-500057-038-8', 'Карьера'),
(7, 'Rework: бизнес без предрассудков', 'Джейсон Фрайд', 2010, '978-5-91657-119-6', 'Бизнес'),
(8, 'Сначала скажите «нет». Секреты профессиональных переговорщиков', 'Джим Кэмп', 1998, '978-5-98124-453-7', 'Психология'),
(9, 'Квадрант денежного потока', 'Роберт Кийосаки', 2011, '978-9-8515-2315-9', 'Бизнес'),
(10, 'Руководство богатого папы по инвестированию', 'Роберт Кийосаки', 2008, '978-985-15-0420-2', 'Бизнес');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
