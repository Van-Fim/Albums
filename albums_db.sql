-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2024 г., 11:08
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `albums_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `user_id`) VALUES
(23, 'Альбом 1', 'Описание', 7),
(20, 'Мой альбом 1', 'Описание 1', 6),
(24, 'Альбом 2', 'Описание 2', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `image_id` int NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_id`, `comment`) VALUES
(1, 6, 17, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, ut! Possimus, et delectus minima accusamus eius maiores recusandae blanditiis fugiat porro adipisci reprehenderit numquam tempore ratione vitae eaque. Sapiente, odit.'),
(2, 7, 17, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, ut! Possimus, et delectus minima accusamus eius maiores recusandae blanditiis fugiat porro adipisci reprehenderit numquam tempore ratione vitae eaque. Sapiente, odit.'),
(11, 7, 10, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, ut! Possimus, et delectus minima accusamus eius maiores recusandae blanditiis fugiat porro adipisci reprehenderit numquam tempore ratione vitae eaque. Sapiente, odit.');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `album_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path`, `album_id`, `name`, `description`) VALUES
(8, '/uploads/images/img60f1.png', 20, 'Картинка 01', 'Описание 01'),
(16, '/uploads/images/img72f3.png', 24, 'Фотография', 'Описание моего фото'),
(10, '/uploads/images/img62f3.png', 20, 'Картинка 03', 'Описание 03'),
(17, '/uploads/images/img73f2.png', 24, 'Мое фото 1000', 'Описание моего фото 1'),
(18, '/uploads/images/img74f2.png', 24, 'Мое фото 2000', 'Описание моего фото 2'),
(19, '/uploads/images/img75f2.png', 24, 'Мое фото 3000', 'Описание моего фото 3'),
(20, '/uploads/images/img76f2.png', 24, 'Мое фото 4000', 'Описание моего фото 4'),
(21, '/uploads/images/img77f2.png', 23, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `image_id` int NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `image_id`, `type`) VALUES
(1, 6, 17, 'DISLIKE'),
(10, 7, 18, 'DISLIKE'),
(67, 7, 17, 'LIKE'),
(40, 7, 19, 'LIKE'),
(46, 7, 20, 'DISLIKE'),
(56, 7, 16, 'LIKE'),
(90, 7, 10, 'LIKE'),
(59, 7, 8, 'LIKE');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(7, 'vano', '1245a04c403535feb8166e5948f5245b'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(18, 'Userius', '20e8eac53b8afca0bbaed05fa78570e9');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
