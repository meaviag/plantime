-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2024 г., 09:08
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `task_id`, `user_id`, `comment`) VALUES
(1, 65, 19, 'dasdsadsadsada'),
(2, 88, 19, 'dsadsadsadas'),
(10, 88, 19, 'dsadas'),
(11, 88, 19, ''),
(12, 88, 19, 'dsadsadsa'),
(13, 88, 19, 'ПРИВЕТ\r\n'),
(17, 88, 19, 'nnknk'),
(18, 88, 19, 'adsaddasdsa'),
(19, 88, 19, 'выфвфы'),
(20, 64, 19, 'ПРРИВЕТИК\r\n'),
(21, 64, 19, 'КОШКА\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `id_user`, `task`, `status`, `created_at`) VALUES
(64, 19, 'уцйуцй', 'Выполнено', '2024-06-11 08:58:02'),
(65, 19, 'уцйуцй', 'Выполнено', '2024-06-11 08:58:31'),
(82, 19, 'уцйуцй', 'Не выполнено', '2024-06-12 15:15:08'),
(85, 18, 'выфвыфв', 'Не выполнено', '2024-06-12 20:07:39'),
(86, 18, 'dsa', 'Не выполнено', '2024-06-12 20:07:59'),
(87, 31, 'мяу', 'Не выполнено', '2024-06-12 22:02:09'),
(88, 19, 'ffdsf', 'Не выполнено', '2024-06-12 23:02:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'Екатерина', 'katy@mail.com', '25d55ad283aa400af464c76d713c07ad'),
(19, 'Влад', 'vlad@mail.com', '25d55ad283aa400af464c76d713c07ad'),
(20, 'ро', 'kusskova.violetta@gmail.com', 'b4fb8c802583d75c36858811115b6272'),
(26, 'вфывфыуцйвыф', 'saddsadsa@dsadsadasd', '64cf4e9215ca99ab3538cfe5f339a6ec'),
(27, 'ывфвфывыфвыфв', 'dsadsaldikaslda@dsadsadsad', '1276a502d9c713aa08d393912259a209'),
(28, 'ВФЫВФЫВЫФВЫФВ', 'dsadasdsa@dsadsadsa', '6fc6ebe096a39d9b527cdc3783382d98'),
(29, 'Елена', 'elena@mail.com', '150094bae43168decd5f071e671969ad'),
(30, 'Марина', 'marina@mail.com', 'ada26a9fe12a17a6962e6eaf9df3700d'),
(31, 'Евгения', 'jenya@mail.com', 'e13254982811d57017db5dc259ba3514');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
