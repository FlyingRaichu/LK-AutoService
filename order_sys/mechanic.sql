-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 19. pro 2017, 05:11
-- Verze serveru: 10.1.21-MariaDB
-- Verze PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `mechanic`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `defect`
--

CREATE TABLE `defect` (
  `id` int(11) NOT NULL,
  `defect` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `defect`
--

INSERT INTO `defect` (`id`, `defect`, `price`) VALUES
(1, 'Brake Pads', 990),
(2, 'Oil change', 200),
(3, 'Broken light', 400);

-- --------------------------------------------------------

--
-- Struktura tabulky `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `defect` varchar(50) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `defect`, `time`, `status`) VALUES
(2, 'Peter', 93842934, '1', '2017-12-18 13:17:00.302923', '1'),
(4, 'Peter', 93842934, '1', '2017-12-17 16:10:20.393760', '4'),
(8, 'Hans', 48930459, '3', '2017-12-17 16:10:20.396501', '3'),
(11, 'John Doe', 32323232, '1', '2017-12-17 16:10:20.400318', '2'),
(13, 'Peter', 93842934, '1', '2017-12-17 16:10:20.417973', '2'),
(14, 'Hans', 48930459, '1', '2017-12-17 16:10:20.437199', '4'),
(15, 'Hans', 48930459, '3', '2017-12-17 16:10:20.442383', '4'),
(17, 'Peter', 93842934, '2', '2017-12-17 16:10:20.450345', '3'),
(18, 'Peter', 93842934, '1', '2017-12-17 16:10:20.455946', '4'),
(19, 'Hans', 48930459, '1', '2017-12-17 14:47:31.396111', '1'),
(20, 'Hans', 48930459, '3', '2017-12-17 14:47:40.437965', '1'),
(21, 'John Doe', 32323232, '1', '2017-12-17 16:10:20.464223', '2'),
(23, 'Peter', 93842934, '1', '2017-12-17 16:10:20.467264', '3'),
(24, 'Hans', 48930459, '1', '2017-12-17 16:10:20.470115', '2'),
(25, 'Hans', 48930459, '3', '2017-12-17 14:47:40.437965', '1'),
(26, 'Peter', 93842934, '2', '2017-12-17 16:10:20.388434', '2'),
(27, 'Peter', 93842934, '1', '2017-12-17 16:10:20.393760', '4'),
(29, 'John Doe', 32323232, '1', '2017-12-17 16:10:20.400318', '2'),
(30, 'Peter', 93842934, '3', '2017-12-18 07:07:35.371598', '2'),
(31, 'Hans', 48930459, '1', '2017-12-17 16:10:20.437199', '4'),
(32, 'Hans', 48930459, '3', '2017-12-17 16:10:20.442383', '4'),
(33, 'Peter', 93842934, '2', '2017-12-17 16:10:20.450345', '3'),
(34, 'Peter', 93842934, '1', '2017-12-17 16:10:20.455946', '4'),
(35, 'Hans', 48930459, '1', '2017-12-17 14:47:31.396111', '1'),
(36, 'Hans', 48930459, '3', '2017-12-17 14:47:40.437965', '1'),
(37, 'John Doe', 32323232, '1', '2017-12-17 16:10:20.464223', '2'),
(38, 'Peter', 93842934, '1', '2017-12-17 16:10:20.467264', '3'),
(39, 'Hans', 48930459, '1', '2017-12-17 16:10:20.470115', '2'),
(40, 'Hans', 48930459, '3', '2017-12-17 14:47:40.437965', '1'),
(48, 'Karen', 123456789, '1', '2017-12-18 14:27:20.000000', '1');

-- --------------------------------------------------------

--
-- Struktura tabulky `status_table`
--

CREATE TABLE `status_table` (
  `id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `status_table`
--

INSERT INTO `status_table` (`id`, `status`) VALUES
(1, 'Complete'),
(2, 'Declined'),
(3, 'Open'),
(4, 'Processed');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `status_table`
--
ALTER TABLE `status_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `defect`
--
ALTER TABLE `defect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pro tabulku `status_table`
--
ALTER TABLE `status_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
