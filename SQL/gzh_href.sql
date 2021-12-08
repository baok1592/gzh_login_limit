-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-12-08 10:18:57
-- 服务器版本： 5.7.26-log
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sql_gzhs_ruhuash`
--

-- --------------------------------------------------------

--
-- 表的结构 `gzh_href`
--该表中填写了两条数据，rhedu和uniapp两条,前端可改变变量对应的值获取值
--

CREATE TABLE `gzh_href` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `gzh_href`
--

INSERT INTO `gzh_href` (`id`, `type`, `url`) VALUES
(1, 'uniapp', 'https://uniapp.dcloud.io'),
(2, 'rhedu', 'http://card.ruhuashop.com');

--
-- 转储表的索引
--

--
-- 表的索引 `gzh_href`
--
ALTER TABLE `gzh_href`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `gzh_href`
--
ALTER TABLE `gzh_href`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
