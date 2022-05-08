-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 مايو 2021 الساعة 20:47
-- إصدار الخادم: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave system`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(20) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `email_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`admin_id`, `name_admin`, `password_admin`, `email_admin`) VALUES
(1, 'Rami', '4444', 'rami7@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `auth`
--

CREATE TABLE `auth` (
  `user_id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `auth_admin`
--

CREATE TABLE `auth_admin` (
  `user_id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `Emp_code` varchar(20) NOT NULL,
  `Gender` text NOT NULL,
  `Birthday` date NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `info` varchar(40) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `employee`
--

INSERT INTO `employee` (`id`, `Emp_code`, `Gender`, `Birthday`, `First_name`, `Last_name`, `info`, `Country`, `Email`, `City`, `Address`, `Password`, `Mobile`, `Reg_date`) VALUES
(12, '20183070', 'Male', '2021-05-18', 'Rami', 'Al-mallahi', 'information', 'فلسطين', 'raminazmi7@gmail.com', 'Gaza', 'Al-sahaba', '444', 592867916, '21-05-9 08:39:05'),
(14, '20182541', 'Male', '2021-05-18', 'Moaz', 'Abu zarifa', 'information', 'فلسطين', 'moazabuzarifa1@gmail.com', 'Gaza', 'Al-sahaba', '444', 592867916, '21-05-9 08:41:14'),
(15, '20187645', 'Male', '2021-05-18', 'Abed Alaziz', 'Al-najar', 'information', 'فلسطين', 'abedalaziz4@gmail.com', 'Gaza', 'Al-sahaba', '444', 592867916, '21-05-9 08:42:07');

-- --------------------------------------------------------

--
-- بنية الجدول `leave`
--

CREATE TABLE `leave` (
  `Leave_id` int(11) NOT NULL,
  `idleave` int(11) NOT NULL,
  `From_date` date NOT NULL,
  `To_date` date NOT NULL,
  `Type_Leave` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Descripton` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `positing_date` varchar(50) NOT NULL,
  `Status` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Emp_code` (`Emp_code`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`Leave_id`),
  ADD KEY `For` (`idleave`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_admin`
--
ALTER TABLE `auth_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `Leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `Forigon` FOREIGN KEY (`user_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD CONSTRAINT `Forigon2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `For` FOREIGN KEY (`idleave`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
