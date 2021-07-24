-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-04-16 10:41:18
-- 伺服器版本: 5.7.21-log
-- PHP 版本： 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `store`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `namekey` char(30) DEFAULT NULL,
  `birth` char(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `postal` int(10) DEFAULT NULL,
  `address` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`id`, `name`, `namekey`, `birth`, `phone`, `postal`, `address`) VALUES
(2, '肥宅', 'O123246346', '1974-04-16', '912345678', 608, 'chayi100-10'),
(3, '考拉 ', 'O123246380', '1990-04-11', '099878788', 608, 'chayi100-10'),
(5, '寶寶', 'L123505050', '1994-04-12', '0912345678', 205, '嘉義縣水上鄉100-10123'),
(6, 'Maho', 'O123246346', '1985-03-12', '0912345678', 608, '嘉義縣水上鄉100-10');

-- --------------------------------------------------------

--
-- 資料表結構 `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`,`account`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
