-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-04-18 13:37:22
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
-- 資料庫： `minisystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `namekey` char(30) NOT NULL,
  `birth` char(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `postal` int(10) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`id`, `name`, `namekey`, `birth`, `phone`, `postal`, `address`, `password`) VALUES
(9, '盧本偉', 'L123456789', '1994-06-15', '0912345678', 608, '台中西區西屯路300-200', '123'),
(10, '王寶強', 'L111111111', '1986-12-16', '0912345678', 205, '台北市中華路三段2路', '123'),
(11, '張三', 'L111111112', '1997-03-12', '0912345678', 608, '台南市中正路三段4號', '123'),
(12, '李四', 'L111111113', '1978-01-25', '0912345678', 608, '台中甚麼甚麼路5號', '123'),
(13, '考拉熊', 'L111111115', '1992-02-12', '0998787885', 600, '澳洲某個考拉之森', '123'),
(14, '郭大峽', 'L111111114', '1967-02-23', '0998787888', 404, '高雄市高雄路高雄街20-90', '123'),
(15, '孫小石', 'L111111116', '1989-11-06', '0998787881', 654, '台中市南區精華路24-36', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `money` int(10) NOT NULL,
  `store_account` varchar(20) NOT NULL,
  `items_store_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `items`
--

INSERT INTO `items` (`id`, `name`, `money`, `store_account`, `items_store_name`) VALUES
(26, '蘋果', 15, 'loka', 'loka水果店'),
(27, '香蕉', 40, 'loka', 'loka水果店'),
(28, '蓮霧', 30, 'loka', 'loka水果店'),
(29, 'boomer獨特醬汁', 100, 'boomer', 'boomer烤肉店'),
(30, '膽汁', 60, 'boomer', 'boomer烤肉店'),
(31, '什滬牛肉', 220, 'boomer', 'boomer烤肉店'),
(32, '考拉毛皮', 500, 'koala', 'koala毛皮'),
(33, '考拉壁畫', 300, 'koala', 'koala毛皮'),
(34, '考拉玩偶', 50, 'koala', 'koala毛皮'),
(35, '麥克風', 2000, 'mic', 'mic麥克風店'),
(36, '雪怪麥克風', 5000, 'mic', 'mic麥克風店'),
(37, '路邊攤麥克風', 300, 'mic', 'mic麥克風店'),
(38, '約會邀請函', 3000, 'skype', 'skype社交'),
(39, '聊天邀請函', 1000, 'skype', 'skype社交'),
(40, '笑氣', 700, 'haha', 'haha大笑店'),
(41, '美國空氣瓶', 300, 'haha', 'haha大笑店'),
(42, '玩具', 50, 'haha', 'haha大笑店'),
(43, '西瓜汁', 50, 'ccc', 'ccc果汁店'),
(44, '葡萄汁', 90, 'ccc', 'ccc果汁店'),
(45, '櫻桃汁', 150, 'ccc', 'ccc果汁店'),
(46, '單人床', 6000, 'zzz', 'zzz床組'),
(47, '雙人床', 10000, 'zzz', 'zzz床組'),
(48, '彈簧床', 8000, 'zzz', 'zzz床組'),
(49, '心理諮詢費', 500, 'qqq', 'qqq心理諮詢'),
(50, '鎮定劑', 600, 'qqq', 'qqq心理諮詢'),
(51, '安眠劑', 800, 'qqq', 'qqq心理諮詢');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `store_name` varchar(20) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_address` char(50) NOT NULL,
  `num` int(6) NOT NULL,
  `num_money` int(10) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `order`
--

INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES
(10, 'boomer獨特醬汁', 'boomer烤肉店', '盧本偉', '0912345678', '台中西區西屯路300-200', 3, 100, '2018-03-20'),
(11, '笑氣', 'haha大笑店', '盧本偉', '0912345678', '台中西區西屯路300-200', 2, 700, '2018-03-20'),
(12, '櫻桃汁', 'ccc果汁店', '盧本偉', '0912345678', '台中西區西屯路300-200', 5, 150, '2018-03-24'),
(13, '蘋果', 'loka水果店', '盧本偉', '0912345678', '台中西區西屯路300-200', 3, 15, '2018-03-24'),
(14, '單人床', 'zzz床組', '王寶強', '0912345678', '台北市中華路三段2路', 2, 6000, '2018-03-21'),
(15, '麥克風', 'mic麥克風店', '王寶強', '0912345678', '台北市中華路三段2路', 3, 2000, '2018-03-21'),
(16, '什滬牛肉', 'boomer烤肉店', '王寶強', '0912345678', '台北市中華路三段2路', 20, 220, '2018-03-25'),
(17, '鎮定劑', 'qqq心理諮詢', '王寶強', '0912345678', '台北市中華路三段2路', 2, 600, '2018-03-25'),
(18, '香蕉', 'loka水果店', '張三', '0912345678', '台南市中正路三段4號', 20, 40, '2018-03-22'),
(19, '蓮霧', 'loka水果店', '張三', '0912345678', '台南市中正路三段4號', 50, 30, '2018-03-22'),
(20, '葡萄汁', 'ccc果汁店', '張三', '0912345678', '台南市中正路三段4號', 10, 90, '2018-03-29'),
(21, '聊天邀請函', 'skype社交', '張三', '0912345678', '台南市中正路三段4號', 1, 1000, '2018-03-29'),
(22, '考拉壁畫', 'koala毛皮', '李四', '0912345678', '台中甚麼甚麼路5號', 5, 300, '2018-03-23'),
(23, '考拉毛皮', 'koala毛皮', '李四', '0912345678', '台中甚麼甚麼路5號', 10, 500, '2018-03-23'),
(24, '考拉玩偶', 'koala毛皮', '李四', '0912345678', '台中甚麼甚麼路5號', 50, 50, '2018-03-31'),
(25, '考拉毛皮', 'koala毛皮', '考拉熊', '0998787885', '澳洲某個考拉之森', 20, 500, '2018-03-26'),
(26, '考拉壁畫', 'koala毛皮', '考拉熊', '0998787885', '澳洲某個考拉之森', 5, 300, '2018-03-26'),
(27, '考拉玩偶', 'koala毛皮', '考拉熊', '0998787885', '澳洲某個考拉之森', 20, 50, '2018-03-27'),
(28, '蘋果', 'loka水果店', '考拉熊', '0998787885', '澳洲某個考拉之森', 100, 15, '2018-03-27'),
(29, '蓮霧', 'loka水果店', '考拉熊', '0998787885', '澳洲某個考拉之森', 50, 30, '2018-03-28'),
(30, '香蕉', 'loka水果店', '考拉熊', '0998787885', '澳洲某個考拉之森', 40, 40, '2018-03-28'),
(31, '葡萄汁', 'ccc果汁店', '考拉熊', '0998787885', '澳洲某個考拉之森', 10, 90, '2018-04-18'),
(32, '單人床', 'zzz床組', '王寶強', '0912345678', '台北市中華路三段2路', 1, 6000, '2018-03-30'),
(33, '雪怪麥克風', 'mic麥克風店', '王寶強', '0912345678', '台北市中華路三段2路', 1, 5000, '2018-03-30'),
(34, '膽汁', 'boomer烤肉店', '王寶強', '0912345678', '台北市中華路三段2路', 20, 60, '2018-03-31'),
(35, '美國空氣瓶', 'haha大笑店', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 5, 300, '2018-04-03'),
(36, '玩具', 'haha大笑店', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 20, 50, '2018-04-02'),
(37, '什滬牛肉', 'boomer烤肉店', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 5, 220, '2018-04-02'),
(38, '雙人床', 'zzz床組', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 1, 10000, '2018-04-01'),
(39, '香蕉', 'loka水果店', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 20, 40, '2018-04-01'),
(40, '蓮霧', 'loka水果店', '郭大峽', '0998787888', '高雄市高雄路高雄街20-90', 20, 30, '2018-04-03'),
(41, '西瓜汁', 'ccc果汁店', '張三', '0912345678', '台南市中正路三段4號', 10, 50, '2018-04-05'),
(42, '櫻桃汁', 'ccc果汁店', '張三', '0912345678', '台南市中正路三段4號', 5, 150, '2018-04-06'),
(43, '麥克風', 'mic麥克風店', '孫小石', '0998787881', '台中市南區精華路24-36', 1, 2000, '2018-04-07'),
(44, '考拉毛皮', 'koala毛皮', '孫小石', '0998787881', '台中市南區精華路24-36', 6, 500, '2018-04-08'),
(45, '葡萄汁', 'ccc果汁店', '孫小石', '0998787881', '台中市南區精華路24-36', 7, 90, '2018-04-09'),
(46, '鎮定劑', 'qqq心理諮詢', '孫小石', '0998787881', '台中市南區精華路24-36', 8, 600, '2018-04-10');

-- --------------------------------------------------------

--
-- 資料表結構 `re_store`
--

CREATE TABLE `re_store` (
  `id` int(11) NOT NULL,
  `re_account` varchar(20) NOT NULL,
  `re_password` varchar(20) NOT NULL,
  `re_sales_account` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `re_store_name` varchar(20) NOT NULL,
  `re_enable` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- 資料表的匯出資料 `sales`
--

INSERT INTO `sales` (`id`, `account`, `password`) VALUES
(10, 'Maho01', '123'),
(11, 'Maho02', '123'),
(12, 'Maho03', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sales_account` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `store_name` varchar(20) NOT NULL,
  `enable` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`id`, `account`, `password`, `sales_account`, `store_name`, `enable`) VALUES
(13, 'loka', '123', 'Maho01', 'loka水果店', 1),
(14, 'boomer', '123', 'Maho01', 'boomer烤肉店', 1),
(15, 'koala', '123', 'Maho01', 'koala毛皮', 1),
(16, 'mic', '123', 'Maho02', 'mic麥克風店', 1),
(17, 'skype', '123', 'Maho02', 'skype社交', 1),
(18, 'haha', '123', 'Maho02', 'haha大笑店', 1),
(19, 'ccc', '123', 'Maho03', 'ccc果汁店', 1),
(20, 'zzz', '123', 'Maho03', 'zzz床組', 1),
(21, 'qqq', '123', 'Maho03', 'qqq心理諮詢', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`namekey`),
  ADD KEY `name` (`name`),
  ADD KEY `phone` (`phone`),
  ADD KEY `address` (`address`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`,`name`),
  ADD KEY `store_account` (`store_account`),
  ADD KEY `name` (`name`),
  ADD KEY `items_store_name` (`items_store_name`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_name` (`item_name`),
  ADD KEY `store_name` (`store_name`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `customer_phone` (`customer_phone`),
  ADD KEY `customer_address` (`customer_address`);

--
-- 資料表索引 `re_store`
--
ALTER TABLE `re_store`
  ADD PRIMARY KEY (`id`,`re_account`),
  ADD KEY `re_sales_account` (`re_sales_account`);

--
-- 資料表索引 `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`,`account`),
  ADD KEY `account` (`account`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`,`account`),
  ADD KEY `sales_account` (`sales_account`),
  ADD KEY `account` (`account`),
  ADD KEY `store_name` (`store_name`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表 AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用資料表 AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 使用資料表 AUTO_INCREMENT `re_store`
--
ALTER TABLE `re_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`store_account`) REFERENCES `store` (`account`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`items_store_name`) REFERENCES `store` (`store_name`);

--
-- 資料表的 Constraints `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `items` (`name`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`store_name`) REFERENCES `store` (`store_name`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`customer_name`) REFERENCES `customer` (`name`);

--
-- 資料表的 Constraints `re_store`
--
ALTER TABLE `re_store`
  ADD CONSTRAINT `re_store_ibfk_1` FOREIGN KEY (`re_sales_account`) REFERENCES `sales` (`account`);

--
-- 資料表的 Constraints `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`sales_account`) REFERENCES `sales` (`account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
