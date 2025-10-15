-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 13 2025 г., 03:12
-- Версия сервера: 5.7.39-log
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CosmeticProducts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Brands`
--

CREATE TABLE `Brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Brands`
--

INSERT INTO `Brands` (`brand_id`, `brand_name`) VALUES
(5, 'Garnier'),
(7, 'Green Mama'),
(4, 'L’Oréal Paris'),
(3, 'Natura Siberica'),
(6, 'Vichy'),
(1, 'Афродита'),
(2, 'Чистая Линия');

-- --------------------------------------------------------

--
-- Структура таблицы `Cities`
--

CREATE TABLE `Cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Cities`
--

INSERT INTO `Cities` (`city_id`, `city_name`) VALUES
(5, 'Владикавказ'),
(3, 'Ессентуки'),
(1, 'Краснодар'),
(7, 'Минеральные Воды'),
(4, 'Ростов-на-Дону'),
(2, 'Сочи'),
(6, 'Ставрополь');

-- --------------------------------------------------------

--
-- Структура таблицы `Enterprises`
--

CREATE TABLE `Enterprises` (
  `enterprise_id` int(11) NOT NULL,
  `enterprise_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Enterprises`
--

INSERT INTO `Enterprises` (`enterprise_id`, `enterprise_name`, `city_id`) VALUES
(1, 'ИП Начевный Андрей Евгеньевич', 1),
(2, 'Косметик-Юг', 1),
(3, 'Сочи-Косметик', 2),
(4, 'Эссенция-Плюс', 3),
(5, 'РостовКосметика', 4),
(6, 'КавказБьюти', 5),
(7, 'СтавропольФарм', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `OrderItems`
--

CREATE TABLE `OrderItems` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `OrderItems`
--

INSERT INTO `OrderItems` (`order_item_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 2),
(3, 2, 3, 5),
(4, 2, 10, 4),
(5, 3, 4, 2),
(6, 3, 9, 1),
(7, 4, 5, 3),
(8, 5, 6, 2),
(9, 6, 7, 1),
(10, 6, 8, 3),
(11, 7, 2, 2),
(12, 7, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `enterprise_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`order_id`, `enterprise_id`, `order_date`) VALUES
(1, 1, '2025-01-10'),
(2, 2, '2025-02-14'),
(3, 3, '2025-03-22'),
(4, 4, '2025-05-30'),
(5, 5, '2024-11-05'),
(6, 6, '2025-08-17'),
(7, 7, '2024-12-20');

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`product_id`, `product_name`, `brand_id`) VALUES
(1, 'Креммасло OL', 1),
(2, 'Маска с морской солью', 1),
(3, 'Гель для умывания', 2),
(4, 'Шампунь с шикшей', 3),
(5, 'Тональный крем', 4),
(6, 'Мицеллярная вода', 5),
(7, 'Крем для лица с гиалуроновой кислотой', 6),
(8, 'Бальзам для губ', 7),
(9, 'Скраб для тела', 3),
(10, 'Крем для рук', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '12345', 1),
(2, 'user', '12345', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Индексы таблицы `Cities`
--
ALTER TABLE `Cities`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `city_name` (`city_name`);

--
-- Индексы таблицы `Enterprises`
--
ALTER TABLE `Enterprises`
  ADD PRIMARY KEY (`enterprise_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Brands`
--
ALTER TABLE `Brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Cities`
--
ALTER TABLE `Cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Enterprises`
--
ALTER TABLE `Enterprises`
  MODIFY `enterprise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Enterprises`
--
ALTER TABLE `Enterprises`
  ADD CONSTRAINT `enterprises_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `Cities` (`city_id`);

--
-- Ограничения внешнего ключа таблицы `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `Enterprises` (`enterprise_id`);

--
-- Ограничения внешнего ключа таблицы `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `Brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
