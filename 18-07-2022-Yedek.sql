-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Tem 2022, 18:31:19
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `netcrm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account`
--

CREATE TABLE `account` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `accountId` int(11) NOT NULL,
  `type` enum('BANK','CASH') NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `initialBalance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `bankName` varchar(155) DEFAULT NULL,
  `bankIban` varchar(155) DEFAULT NULL,
  `bankAccountNumber` varchar(155) DEFAULT NULL,
  `bankBranch` varchar(155) DEFAULT NULL,
  `lastUsedAt` datetime DEFAULT current_timestamp(),
  `fkBank` int(11) DEFAULT NULL,
  `fkCurrency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `account`
--

INSERT INTO `account` (`deletedAt`, `updatedAt`, `createdAt`, `accountId`, `type`, `name`, `balance`, `initialBalance`, `bankName`, `bankIban`, `bankAccountNumber`, `bankBranch`, `lastUsedAt`, `fkBank`, `fkCurrency`) VALUES
(NULL, '2022-07-18 15:54:31', '2022-07-18 15:54:31', 1, 'CASH', 'Nakit Kasa 1', '10.00', '10.00', NULL, NULL, NULL, NULL, '2022-07-18 15:54:31', NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accountactivity`
--

CREATE TABLE `accountactivity` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `accountActivityId` int(11) NOT NULL,
  `type` enum('INCOME','EXPENSE') NOT NULL,
  `target` varchar(255) NOT NULL,
  `targetId` int(11) DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `actionDate` date NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(8,2) NOT NULL,
  `beforeAmount` decimal(8,2) NOT NULL,
  `afterAmount` decimal(8,2) NOT NULL,
  `fkSale` int(11) DEFAULT NULL,
  `fkExpense` int(11) DEFAULT NULL,
  `fkCustomer` int(11) DEFAULT NULL,
  `fkSupplier` int(11) DEFAULT NULL,
  `fkAccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `accountactivity`
--

INSERT INTO `accountactivity` (`deletedAt`, `updatedAt`, `createdAt`, `createdBy`, `accountActivityId`, `type`, `target`, `targetId`, `explanation`, `actionDate`, `amount`, `beforeAmount`, `afterAmount`, `fkSale`, `fkExpense`, `fkCustomer`, `fkSupplier`, `fkAccount`) VALUES
(NULL, '2022-07-18 15:54:31', '2022-07-18 15:54:31', 0, 1, 'INCOME', 'INITIAL', NULL, NULL, '2022-07-18', '10.00', '0.00', '10.00', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activitylog`
--

CREATE TABLE `activitylog` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `activityLogId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fkUser` int(11) DEFAULT NULL,
  `fkCustomer` int(11) DEFAULT NULL,
  `fkSale` int(11) DEFAULT NULL,
  `fkExpense` int(11) NOT NULL,
  `fkCollect` int(11) DEFAULT NULL,
  `fkPayment` int(11) DEFAULT NULL,
  `fkDocument` int(11) DEFAULT NULL,
  `fkNote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `activitylog`
--

INSERT INTO `activitylog` (`deletedAt`, `updatedAt`, `createdAt`, `createdBy`, `activityLogId`, `type`, `fkUser`, `fkCustomer`, `fkSale`, `fkExpense`, `fkCollect`, `fkPayment`, `fkDocument`, `fkNote`) VALUES
(NULL, '2022-07-13 00:47:15', '2022-07-13 00:47:15', 1, 1, 'ADD_EXPENSE', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(NULL, '2022-07-13 00:47:15', '2022-07-13 00:47:15', 1, 2, 'ADD_PAYMENT', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(NULL, '2022-07-13 00:47:56', '2022-07-13 00:47:56', 1, 3, 'ADD_EXPENSE', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(NULL, '2022-07-13 00:47:56', '2022-07-13 00:47:56', 1, 4, 'ADD_PAYMENT', NULL, NULL, NULL, 2, NULL, 2, NULL, NULL),
(NULL, '2022-07-13 00:48:09', '2022-07-13 00:48:09', 1, 5, 'EDIT_PAYMENT', NULL, NULL, NULL, 2, NULL, 2, NULL, NULL),
(NULL, '2022-07-13 02:21:36', '2022-07-13 02:21:36', 1, 6, 'EDIT_PAYMENT', NULL, NULL, NULL, 2, NULL, 3, NULL, NULL),
(NULL, '2022-07-13 02:21:48', '2022-07-13 02:21:48', 1, 7, 'ADD_DOCUMENT', NULL, NULL, NULL, 0, NULL, NULL, 1, NULL),
(NULL, '2022-07-13 02:22:33', '2022-07-13 02:22:33', 1, 8, 'ADD_DOCUMENT', NULL, NULL, NULL, 0, NULL, NULL, 2, NULL),
(NULL, '2022-07-13 02:30:09', '2022-07-13 02:30:09', 1, 9, 'DELETE_PAYMENT', NULL, NULL, NULL, 2, NULL, 2, NULL, NULL),
(NULL, '2022-07-13 02:37:40', '2022-07-13 02:37:40', 1, 10, 'EDIT_PAYMENT', NULL, NULL, NULL, 2, NULL, 9, NULL, NULL),
(NULL, '2022-07-14 23:11:47', '2022-07-14 23:11:47', 1, 11, 'ADD_EXPENSE', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(NULL, '2022-07-14 23:13:11', '2022-07-14 23:13:11', 1, 12, 'EDIT_PAYMENT', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(NULL, '2022-07-14 23:13:24', '2022-07-14 23:13:24', 1, 13, 'EDIT_PAYMENT', NULL, NULL, NULL, 1, NULL, 2, NULL, NULL),
(NULL, '2022-07-14 23:13:35', '2022-07-14 23:13:35', 1, 14, 'EDIT_PAYMENT', NULL, NULL, NULL, 1, NULL, 3, NULL, NULL),
(NULL, '2022-07-14 23:13:57', '2022-07-14 23:13:57', 1, 15, 'EDIT_PAYMENT', NULL, NULL, NULL, 1, NULL, 4, NULL, NULL),
(NULL, '2022-07-14 23:14:02', '2022-07-14 23:14:02', 1, 16, 'EDIT_PAYMENT', NULL, NULL, NULL, 1, NULL, 5, NULL, NULL),
(NULL, '2022-07-14 23:14:16', '2022-07-14 23:14:16', 1, 18, 'ADD_PAYMENT', NULL, NULL, NULL, 1, NULL, 7, NULL, NULL),
(NULL, '2022-07-14 23:29:14', '2022-07-14 23:29:14', 1, 19, 'ADD_SALE', NULL, 1, 1, 0, NULL, NULL, NULL, NULL),
(NULL, '2022-07-15 00:40:44', '2022-07-15 00:40:44', 1, 20, 'ADD_PAYMENT', NULL, NULL, NULL, 1, NULL, 8, NULL, NULL),
(NULL, '2022-07-15 00:46:02', '2022-07-15 00:46:02', 1, 21, 'EDIT_COLLECT', NULL, 1, 1, 0, 7, NULL, NULL, NULL),
(NULL, '2022-07-15 00:46:05', '2022-07-15 00:46:05', 1, 22, 'EDIT_COLLECT', NULL, 1, 1, 0, 6, NULL, NULL, NULL),
(NULL, '2022-07-15 00:46:11', '2022-07-15 00:46:11', 1, 23, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:47:31', '2022-07-15 00:47:31', 1, 24, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:47:36', '2022-07-15 00:47:36', 1, 25, 'EDIT_COLLECT', NULL, 1, 1, 0, 4, NULL, NULL, NULL),
(NULL, '2022-07-15 00:47:41', '2022-07-15 00:47:41', 1, 26, 'EDIT_COLLECT', NULL, 1, 1, 0, 3, NULL, NULL, NULL),
(NULL, '2022-07-15 00:47:48', '2022-07-15 00:47:48', 1, 27, 'EDIT_COLLECT', NULL, 1, 1, 0, 2, NULL, NULL, NULL),
(NULL, '2022-07-15 00:47:55', '2022-07-15 00:47:55', 1, 28, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:51:46', '2022-07-15 00:51:46', 1, 29, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:51:52', '2022-07-15 00:51:52', 1, 30, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:52:13', '2022-07-15 00:52:13', 1, 31, 'EDIT_COLLECT', NULL, 1, 1, 0, 5, NULL, NULL, NULL),
(NULL, '2022-07-15 00:52:19', '2022-07-15 00:52:19', 1, 32, 'EDIT_COLLECT', NULL, 1, 1, 0, 2, NULL, NULL, NULL),
(NULL, '2022-07-15 00:52:26', '2022-07-15 00:52:26', 1, 33, 'EDIT_COLLECT', NULL, 1, 1, 0, 2, NULL, NULL, NULL),
(NULL, '2022-07-15 00:52:45', '2022-07-15 00:52:45', 1, 34, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:53:00', '2022-07-15 00:53:00', 1, 35, 'EDIT_COLLECT', NULL, 1, 1, 0, 3, NULL, NULL, NULL),
(NULL, '2022-07-15 00:53:03', '2022-07-15 00:53:03', 1, 36, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:53:06', '2022-07-15 00:53:06', 1, 37, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:53:28', '2022-07-15 00:53:28', 1, 38, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:53:38', '2022-07-15 00:53:38', 1, 39, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:54:35', '2022-07-15 00:54:35', 1, 40, 'EDIT_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL),
(NULL, '2022-07-15 00:54:54', '2022-07-15 00:54:54', 1, 41, 'EDIT_COLLECT', NULL, 1, 1, 0, 3, NULL, NULL, NULL),
(NULL, '2022-07-15 00:55:01', '2022-07-15 00:55:01', 1, 42, 'EDIT_COLLECT', NULL, 1, 1, 0, 6, NULL, NULL, NULL),
(NULL, '2022-07-15 00:55:05', '2022-07-15 00:55:05', 1, 43, 'EDIT_COLLECT', NULL, 1, 1, 0, 6, NULL, NULL, NULL),
(NULL, '2022-07-15 00:55:09', '2022-07-15 00:55:09', 1, 44, 'EDIT_COLLECT', NULL, 1, 1, 0, 6, NULL, NULL, NULL),
(NULL, '2022-07-17 00:50:06', '2022-07-17 00:50:06', 1, 45, 'ADD_SALE', NULL, 1, 2, 0, NULL, NULL, NULL, NULL),
(NULL, '2022-07-17 00:50:48', '2022-07-17 00:50:48', 1, 46, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:37:20', '2022-07-17 01:37:20', 1, 48, 'ADD_COLLECT', NULL, 1, 2, 0, 11, NULL, NULL, NULL),
(NULL, '2022-07-17 01:37:27', '2022-07-17 01:37:27', 1, 49, 'EDIT_COLLECT', NULL, 1, 2, 0, 11, NULL, NULL, NULL),
(NULL, '2022-07-17 01:37:31', '2022-07-17 01:37:31', 1, 50, 'EDIT_COLLECT', NULL, 1, 2, 0, 11, NULL, NULL, NULL),
(NULL, '2022-07-17 01:39:18', '2022-07-17 01:39:18', 1, 51, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:39:21', '2022-07-17 01:39:21', 1, 52, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:39:32', '2022-07-17 01:39:32', 1, 53, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:39:40', '2022-07-17 01:39:40', 1, 54, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:56:44', '2022-07-17 01:56:44', 1, 55, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:56:50', '2022-07-17 01:56:50', 1, 56, 'EDIT_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 01:58:02', '2022-07-17 01:58:02', 1, 57, 'ADD_COLLECT', NULL, 1, 2, 0, 12, NULL, NULL, NULL),
(NULL, '2022-07-17 01:58:30', '2022-07-17 01:58:30', 1, 58, 'EDIT_COLLECT', NULL, 1, 2, 0, 12, NULL, NULL, NULL),
(NULL, '2022-07-17 02:00:37', '2022-07-17 02:00:37', 1, 61, 'ADD_COLLECT', NULL, 1, 2, 0, 15, NULL, NULL, NULL),
(NULL, '2022-07-17 02:00:41', '2022-07-17 02:00:41', 1, 62, 'DELETE_COLLECT', NULL, 1, 2, 0, 9, NULL, NULL, NULL),
(NULL, '2022-07-17 02:02:51', '2022-07-17 02:02:51', 1, 63, 'DELETE_COLLECT', NULL, 1, 2, 0, 8, NULL, NULL, NULL),
(NULL, '2022-07-17 02:02:55', '2022-07-17 02:02:55', 1, 64, 'DELETE_COLLECT', NULL, 1, 2, 0, 15, NULL, NULL, NULL),
(NULL, '2022-07-17 02:02:57', '2022-07-17 02:02:57', 1, 65, 'DELETE_COLLECT', NULL, 1, 2, 0, 12, NULL, NULL, NULL),
(NULL, '2022-07-17 02:03:06', '2022-07-17 02:03:06', 1, 66, 'DELETE_COLLECT', NULL, 1, 2, 0, 18, NULL, NULL, NULL),
(NULL, '2022-07-17 02:03:11', '2022-07-17 02:03:11', 1, 67, 'EDIT_COLLECT', NULL, 1, 2, 0, 17, NULL, NULL, NULL),
(NULL, '2022-07-17 02:03:13', '2022-07-17 02:03:13', 1, 68, 'DELETE_COLLECT', NULL, 1, 2, 0, 17, NULL, NULL, NULL),
(NULL, '2022-07-18 15:54:40', '2022-07-18 15:54:40', 1, 69, 'ADD_SALE', NULL, 1, 1, 0, NULL, NULL, NULL, NULL),
(NULL, '2022-07-18 15:55:29', '2022-07-18 15:55:29', 1, 70, 'ADD_COLLECT', NULL, 1, 1, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bank`
--

CREATE TABLE `bank` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `bankId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bank`
--

INSERT INTO `bank` (`deletedAt`, `updatedAt`, `createdAt`, `bankId`, `name`) VALUES
(NULL, '2022-04-19 19:43:58', '2022-04-19 19:43:58', 1, 'Akbank'),
(NULL, '2022-04-19 19:43:58', '2022-04-19 19:43:58', 2, 'Garanti Bankası'),
(NULL, '2022-04-19 19:44:09', '2022-04-19 19:44:09', 3, 'Ziraat Bankası'),
(NULL, '2022-04-19 19:44:09', '2022-04-19 19:44:19', 4, 'Türkiye İş Bankası');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `city`
--

CREATE TABLE `city` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `cityId` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `city`
--

INSERT INTO `city` (`deletedAt`, `updatedAt`, `createdAt`, `cityId`, `title`) VALUES
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 1, 'Adana'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 2, 'Adıyaman'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 3, 'Afyonkarahisar'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 4, 'Ağrı'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 5, 'Amasya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 6, 'Ankara'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 7, 'Antalya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 8, 'Artvin'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 9, 'Aydın'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 10, 'Balıkesir'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 11, 'Bilecik'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 12, 'Bingöl'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 13, 'Bitlis'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 14, 'Bolu'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 15, 'Burdur'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 16, 'Bursa'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 17, 'Çanakkale'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 18, 'Çankırı'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 19, 'Çorum'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 20, 'Denizli'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 21, 'Diyarbakır'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 22, 'Edirne'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 23, 'Elâzığ'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 24, 'Erzincan'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 25, 'Erzurum'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 26, 'Eskişehir'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 27, 'Gaziantep'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 28, 'Giresun'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 29, 'Gümüşhane'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 30, 'Hakkâri'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 31, 'Hatay'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 32, 'Isparta'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 33, 'Mersin'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 34, 'İstanbul'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 35, 'İzmir'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 36, 'Kars'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 37, 'Kastamonu'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 38, 'Kayseri'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 39, 'Kırklareli'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 40, 'Kırşehir'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 41, 'Kocaeli'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 42, 'Konya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 43, 'Kütahya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 44, 'Malatya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 45, 'Manisa'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 46, 'Kahramanmaraş'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 47, 'Mardin'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 48, 'Muğla'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 49, 'Muş'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 50, 'Nevşehir'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 51, 'Niğde'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 52, 'Ordu'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 53, 'Rize'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 54, 'Sakarya'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 55, 'Samsun'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 56, 'Siirt'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 57, 'Sinop'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 58, 'Sivas'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 59, 'Tekirdağ'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 60, 'Tokat'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 61, 'Trabzon'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 62, 'Tunceli'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 63, 'Şanlıurfa'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 64, 'Uşak'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 65, 'Van'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 66, 'Yozgat'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 67, 'Zonguldak'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 68, 'Aksaray'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 69, 'Bayburt'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 70, 'Karaman'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 71, 'Kırıkkale'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 72, 'Batman'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 73, 'Şırnak'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 74, 'Bartın'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 75, 'Ardahan'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 76, 'Iğdır'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 77, 'Yalova'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 78, 'Karabük'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 79, 'Kilis'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 80, 'Osmaniye'),
(NULL, '2022-04-14 23:53:58', '2022-04-14 23:53:58', 81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `collect`
--

CREATE TABLE `collect` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `collectId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `explanation` text DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `collectDate` date NOT NULL,
  `status` varchar(111) NOT NULL DEFAULT 'PENDING',
  `fkCustomer` int(11) NOT NULL,
  `fkCurrency` int(11) NOT NULL,
  `fkAccount` int(11) DEFAULT NULL,
  `fkSale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `collect`
--

INSERT INTO `collect` (`deletedAt`, `updatedAt`, `createdAt`, `collectId`, `amount`, `explanation`, `fileName`, `collectDate`, `status`, `fkCustomer`, `fkCurrency`, `fkAccount`, `fkSale`) VALUES
(NULL, '2022-07-18 15:55:29', '2022-07-18 15:55:29', 1, '10.00', 'Açıklama', NULL, '2022-07-20', 'PENDING', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `config`
--

CREATE TABLE `config` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `configId` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `config`
--

INSERT INTO `config` (`deletedAt`, `updatedAt`, `createdAt`, `configId`, `name`, `value`) VALUES
(NULL, '2022-06-27 05:54:55', '2022-04-11 22:33:16', 1, 'title', 'NetCRM v0.1'),
(NULL, '2022-06-27 05:54:55', '2022-04-11 22:54:23', 2, 'companyInformation', '{\"name\":\"Netpus Yaz\\u0131l\\u0131m & Otomasyon Hizmetleri\",\"address\":\"Cenneto\\u011flu Mh. Ye\\u015fillik Cd. No 228-230 Karaba\\u011flar \\/ \\u0130ZM\\u0130R\",\"email\":\"info@ahmetcakmak.net\",\"taxNumber\":\"50167268218\",\"taxOffice\":\"Gaziemir VD\",\"phone\":\"0(232) 332 1102\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `country`
--

CREATE TABLE `country` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `countryId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `country`
--

INSERT INTO `country` (`deletedAt`, `updatedAt`, `createdAt`, `countryId`, `title`) VALUES
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 1, 'Türkiye'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 2, 'Abhazya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 3, 'Afganistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 4, 'Almanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 5, 'Amerika Birleşik Devletleri'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 6, 'Andorra'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 7, 'Angola'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 8, 'Antigua ve Barbuda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 9, 'Arjantin'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 10, 'Arnavutluk'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 11, 'Avustralya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 12, 'Avusturya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 13, 'Azerbaycan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 14, 'Bahamalar'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 15, 'Bahreyn'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 16, 'Bangladeş'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 17, 'Barbados'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 18, 'Batı Sahra'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 19, 'Belarus'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 20, 'Belçika'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 21, 'Belize'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 22, 'Benin'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 23, 'Bhutan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 24, 'Birleşik Arap Emirlikleri'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 25, 'Bolivya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 26, 'Bosna Hersek'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 27, 'Botsvana'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 28, 'Brezilya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 29, 'Brunei'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 30, 'Bulgaristan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 31, 'Burkina Faso'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 32, 'Burundi'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 33, 'Cezayir'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 34, 'Cibuti Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 35, 'Çad'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 36, 'Çek Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 37, 'Çin Halk Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 38, 'Dağlık Karabağ Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 39, 'Danimarka'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 40, 'Doğu Timor'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 41, 'Dominik Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 42, 'Dominika'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 43, 'Ekvador'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 44, 'Ekvator Ginesi'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 45, 'El Salvador'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 46, 'Endonezya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 47, 'Eritre'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 48, 'Ermenistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 49, 'Estonya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 50, 'Etiyopya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 51, 'Fas'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 52, 'Fiji'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 53, 'Fildişi Sahilleri'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 54, 'Filipinler'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 55, 'Filistin'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 56, 'Finlandiya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 57, 'Fransa'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 58, 'Gabon'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 59, 'Gambiya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 60, 'Gana'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 61, 'Gine Bissau'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 62, 'Gine'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 63, 'Grenada'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 64, 'Guyana'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 65, 'Guatemala'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 66, 'Güney Afrika Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 67, 'Güney Kore'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 68, 'Güney Osetya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 69, 'Gürcistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 70, 'Haiti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 71, 'Hırvatistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 72, 'Hindistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 73, 'Hollanda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 74, 'Honduras'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 75, 'Irak'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 76, 'İngiltere'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 77, 'İran'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 78, 'İrlanda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 79, 'İspanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 80, 'İsrail'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 81, 'İsveç'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 82, 'İsviçre'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 83, 'İtalya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 84, 'İzlanda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 85, 'Jamaika'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 86, 'Japonya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 87, 'Kamboçya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 88, 'Kamerun'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 89, 'Kanada'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 90, 'Karadağ'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 91, 'Katar'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 92, 'Kazakistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 93, 'Kenya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 94, 'Kırgızistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 95, 'Kıbrıs Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 96, 'Kiribati'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 97, 'Kolombiya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 98, 'Komorlar'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 99, 'Kongo'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 100, 'Kongo Demokratik Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 101, 'Kosova'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 102, 'Kosta Rika'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 103, 'Kuveyt'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 104, 'Kuzey Kıbrıs Türk Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 105, 'Kuzey Kore'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 106, 'Küba'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 107, 'Lakota Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 108, 'Laos'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 109, 'Lesotho'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 110, 'Letonya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 111, 'Liberya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 112, 'Libya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 113, 'Liechtenstein'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 114, 'Litvanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 115, 'Lübnan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 116, 'Lüksemburg'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 117, 'Macaristan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 118, 'Madagaskar'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 119, 'Makedonya Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 120, 'Malavi'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 121, 'Maldivler'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 122, 'Malezya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 123, 'Mali'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 124, 'Malta'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 125, 'Marshall Adaları'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 126, 'Meksika'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 127, 'Mısır'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 128, 'Mikronezya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 129, 'Moğolistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 130, 'Moldova'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 131, 'Monako'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 132, 'Moritanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 133, 'Moritus'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 134, 'Mozambik'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 135, 'Myanmar'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 136, 'Namibya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 137, 'Nauru'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 138, 'Nepal'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 139, 'Nikaragua'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 140, 'Nijer'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 141, 'Nijerya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 142, 'Norveç'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 143, 'Orta Afrika Cumhuriyeti'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 144, 'Özbekistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 145, 'Pakistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 146, 'Palau'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 147, 'Panama'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 148, 'Papua Yeni Gine'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 149, 'Paraguay'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 150, 'Peru'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 151, 'Polonya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 152, 'Portekiz'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 153, 'Romanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 154, 'Ruanda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 155, 'Rusya Federasyonu'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 156, 'Saint Kitts ve Nevis'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 157, 'Saint Lucia'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 158, 'Saint Vincent ve Grenadinler'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 159, 'Samoa'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 160, 'San Marino'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 161, 'Sao Tome ve Principe'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 162, 'Sealand'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 163, 'Senegal'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 164, 'Seyşeller'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 165, 'Sırbistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 166, 'Sierra Leone'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 167, 'Singapur'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 168, 'Slovakya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 169, 'Slovenya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 170, 'Solomon Adaları'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 171, 'Somali'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 172, 'Somaliland'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 173, 'Sri Lanka'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 174, 'Sudan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 175, 'Surinam'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 176, 'Suudi Arabistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 177, 'Suriye'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 178, 'Svaziland'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 179, 'Şili'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 180, 'Tacikistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 181, 'Tamil Eelam'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 182, 'Tanzanya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 183, 'Tayland'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 184, 'Tayvan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 185, 'Togo'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 186, 'Tonga'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 187, 'Transdinyester'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 188, 'Trinidad ve Tobago'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 189, 'Tunus'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 190, 'Tuvalu'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 192, 'Türkmenistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 193, 'Uganda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 194, 'Ukrayna'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 195, 'Umman'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 196, 'Uruguay'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 197, 'Ürdün'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 198, 'Vanuatu'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 199, 'Vatikan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 200, 'Venezuela'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 201, 'Vietnam'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 202, 'Yemen'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 203, 'Yeni Zelanda'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 204, 'Yeşil Burun'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 205, 'Yunanistan'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 206, 'Zambiya'),
(NULL, '2022-04-15 19:03:03', '2022-04-15 19:03:03', 207, 'Zimbabve');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `currency`
--

CREATE TABLE `currency` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `currencyId` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `symbol` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `currency`
--

INSERT INTO `currency` (`deletedAt`, `updatedAt`, `createdAt`, `currencyId`, `code`, `name`, `symbol`) VALUES
(NULL, '2022-04-18 23:28:51', '2022-04-18 23:28:51', 1, 'TRY', 'Türk Lirası', '₺'),
(NULL, '2022-04-18 23:28:51', '2022-04-18 23:28:51', 2, 'USD', 'ABD Doları', '$'),
(NULL, '2022-04-18 23:28:58', '2022-04-18 23:28:58', 3, 'EUR', 'Euro', '€');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `customerId` int(11) NOT NULL,
  `type` enum('INDIVIDUAL','CORPORATE') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `taxOffice` varchar(255) DEFAULT NULL,
  `taxNumber` varchar(255) DEFAULT NULL,
  `identityNumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `secondPhone` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `fkCustomerGroup` int(11) DEFAULT NULL,
  `fkCountry` int(11) NOT NULL,
  `fkCity` int(11) DEFAULT NULL,
  `fkDistrict` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`deletedAt`, `updatedAt`, `createdAt`, `customerId`, `type`, `name`, `email`, `shortName`, `taxOffice`, `taxNumber`, `identityNumber`, `address`, `phone`, `secondPhone`, `notes`, `balance`, `fkCustomerGroup`, `fkCountry`, `fkCity`, `fkDistrict`) VALUES
(NULL, '2022-07-18 15:53:30', '2022-07-18 15:53:30', 1, 'INDIVIDUAL', 'Yeni Müşteri', 'test@test.com', NULL, NULL, '11111111111', NULL, 'Adres Bilgisi', NULL, NULL, NULL, '1180.00', NULL, 1, 35, 375);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customergroup`
--

CREATE TABLE `customergroup` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `customerGroupId` int(11) NOT NULL,
  `seq` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `district`
--

CREATE TABLE `district` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `districtId` int(11) NOT NULL,
  `title` varchar(55) DEFAULT NULL,
  `fkCity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `district`
--

INSERT INTO `district` (`deletedAt`, `updatedAt`, `createdAt`, `districtId`, `title`, `fkCity`) VALUES
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 1, 'Abana', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 2, 'Acıgöl', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 3, 'Acıpayam', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 4, 'Adaklı', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 5, 'Adalar', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 6, 'Adapazarı', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 7, 'Adıyaman', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 8, 'Adilcevaz', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 9, 'Afşin', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 10, 'Afyonkarahisar', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 11, 'Ağaçören', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 12, 'Ağın', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 13, 'Ağlasun', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 14, 'Ağlı', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 15, 'Ağrı', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 16, 'Ahırlı', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 17, 'Ahlat', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 18, 'Ahmetli', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 19, 'Akçaabat', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 20, 'Akçadağ', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 21, 'Akçakale', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 22, 'Akçakent', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 23, 'Akçakoca', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 24, 'Akdağmadeni', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 25, 'Akdeniz', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 26, 'Akhisar', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 27, 'Akıncılar', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 28, 'Akkışla', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 29, 'Akkuş', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 30, 'Akören', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 31, 'Akpınar', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 32, 'Aksaray', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 33, 'Akseki', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 34, 'Aksu', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 35, 'Aksu', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 36, 'Akşehir', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 37, 'Akyaka', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 38, 'Akyazı', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 39, 'Akyurt', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 40, 'Alaca', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 41, 'Alacakaya', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 42, 'Alaçam', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 43, 'Aladağ', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 44, 'Alanya', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 45, 'Alaplı', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 46, 'Alaşehir', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 47, 'Aliağa', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 48, 'Almus', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 49, 'Alpu', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 50, 'Altıeylül', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 51, 'Altındağ', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 52, 'Altınekin', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 53, 'Altınordu', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 54, 'Altınova', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 55, 'Altınözü', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 56, 'Altıntaş', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 57, 'Altınyayla', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 58, 'Altınyayla', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 59, 'Altunhisar', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 60, 'Alucra', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 61, 'Amasra', 74),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 62, 'Amasya', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 63, 'Anamur', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 64, 'Andırın', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 65, 'Antakya', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 66, 'Araban', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 67, 'Araç', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 68, 'Araklı', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 69, 'Aralık', 76),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 70, 'Arapgir', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 71, 'Ardahan', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 72, 'Ardanuç', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 73, 'Ardeşen', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 74, 'Arguvan', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 75, 'Arhavi', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 76, 'Arıcak', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 77, 'Arifiye', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 78, 'Armutlu', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 79, 'Arnavutköy', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 80, 'Arpaçay', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 81, 'Arsin', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 82, 'Arsuz', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 83, 'Artova', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 84, 'Artuklu', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 85, 'Artvin', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 86, 'Asarcık', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 87, 'Aslanapa', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 88, 'Aşkale', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 89, 'Atabey', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 90, 'Atakum', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 91, 'Ataşehir', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 92, 'Atkaracalar', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 93, 'Avanos', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 94, 'Avcılar', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 95, 'Ayancık', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 96, 'Ayaş', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 97, 'Aybastı', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 98, 'Aydıncık', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 99, 'Aydıncık', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 100, 'Aydıntepe', 69),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 101, 'Ayrancı', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 102, 'Ayvacık', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 103, 'Ayvacık', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 104, 'Ayvalık', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 105, 'Azdavay', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 106, 'Aziziye', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 107, 'Babadağ', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 108, 'Babaeski', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 109, 'Bafra', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 110, 'Bağcılar', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 111, 'Bağlar', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 112, 'Bahçe', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 113, 'Bahçelievler', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 114, 'Bahçesaray', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 115, 'Bahşili', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 116, 'Bakırköy', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 117, 'Baklan', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 118, 'Bala', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 119, 'Balçova', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 120, 'Balışeyh', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 121, 'Balya', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 122, 'Banaz', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 123, 'Bandırma', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 124, 'Bartın', 74),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 125, 'Baskil', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 126, 'Başakşehir', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 127, 'Başçiftlik', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 128, 'Başiskele', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 129, 'Başkale', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 130, 'Başmakçı', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 131, 'Başyayla', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 132, 'Batman', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 133, 'Battalgazi', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 134, 'Bayat', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 135, 'Bayat', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 136, 'Bayburt', 69),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 137, 'Bayındır', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 138, 'Baykan', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 139, 'Bayraklı', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 140, 'Bayramiç', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 141, 'Bayramören', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 142, 'Bayrampaşa', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 143, 'Bekilli', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 144, 'Belen', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 145, 'Bergama', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 146, 'Besni', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 147, 'Beşikdüzü', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 148, 'Beşiktaş', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 149, 'Beşiri', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 150, 'Beyağaç', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 151, 'Beydağ', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 152, 'Beykoz', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 153, 'Beylikdüzü', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 154, 'Beylikova', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 155, 'Beyoğlu', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 156, 'Beypazarı', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 157, 'Beyşehir', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 158, 'Beytüşşebap', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 159, 'Biga', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 160, 'Bigadiç', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 161, 'Bilecik', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 162, 'Bingöl', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 163, 'Birecik', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 164, 'Bismil', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 165, 'Bitlis', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 166, 'Bodrum', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 167, 'Boğazkale', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 168, 'Boğazlıyan', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 169, 'Bolu', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 170, 'Bolvadin', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 171, 'Bor', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 172, 'Borçka', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 173, 'Bornova', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 174, 'Boyabat', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 175, 'Bozcaada', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 176, 'Bozdoğan', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 177, 'Bozkır', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 178, 'Bozkurt', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 179, 'Bozkurt', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 180, 'Bozova', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 181, 'Boztepe', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 182, 'Bozüyük', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 183, 'Bozyazı', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 184, 'Buca', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 185, 'Bucak', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 186, 'Buharkent', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 187, 'Bulancak', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 188, 'Bulanık', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 189, 'Buldan', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 190, 'Burdur', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 191, 'Burhaniye', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 192, 'Bünyan', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 193, 'Büyükçekmece', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 194, 'Büyükorhan', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 195, 'Canik', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 196, 'Ceyhan', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 197, 'Ceylanpınar', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 198, 'Cide', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 199, 'Cihanbeyli', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 200, 'Cizre', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 201, 'Cumayeri', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 202, 'Çağlayancerit', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 203, 'Çal', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 204, 'Çaldıran', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 205, 'Çamardı', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 206, 'Çamaş', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 207, 'Çameli', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 208, 'Çamlıdere', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 209, 'Çamlıhemşin', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 210, 'Çamlıyayla', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 211, 'Çamoluk', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 212, 'Çan', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 213, 'Çanakçı', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 214, 'Çanakkale', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 215, 'Çandır', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 216, 'Çankaya', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 217, 'Çankırı', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 218, 'Çardak', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 219, 'Çarşamba', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 220, 'Çarşıbaşı', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 221, 'Çat', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 222, 'Çatak', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 223, 'Çatalca', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 224, 'Çatalpınar', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 225, 'Çatalzeytin', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 226, 'Çavdarhisar', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 227, 'Çavdır', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 228, 'Çay', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 229, 'Çaybaşı', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 230, 'Çaycuma', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 231, 'Çayeli', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 232, 'Çayıralan', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 233, 'Çayırlı', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 234, 'Çayırova', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 235, 'Çaykara', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 236, 'Çekerek', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 237, 'Çekmeköy', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 238, 'Çelebi', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 239, 'Çelikhan', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 240, 'Çeltik', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 241, 'Çeltikçi', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 242, 'Çemişgezek', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 243, 'Çerkeş', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 244, 'Çerkezköy', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 245, 'Çermik', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 246, 'Çeşme', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 247, 'Çıldır', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 248, 'Çınar', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 249, 'Çınarcık', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 250, 'Çiçekdağı', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 251, 'Çifteler', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 252, 'Çiftlik', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 253, 'Çiftlikköy', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 254, 'Çiğli', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 255, 'Çilimli', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 256, 'Çine', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 257, 'Çivril', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 258, 'Çobanlar', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 259, 'Çorlu', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 260, 'Çorum', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 261, 'Çubuk', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 262, 'Çukurca', 30),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 263, 'Çukurova', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 264, 'Çumra', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 265, 'Çüngüş', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 266, 'Daday', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 267, 'Dalaman', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 268, 'Damal', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 269, 'Darende', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 270, 'Dargeçit', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 271, 'Darıca', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 272, 'Datça', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 273, 'Dazkırı', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 274, 'Defne', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 275, 'Delice', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 276, 'Demirci', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 277, 'Demirköy', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 278, 'Demirözü', 69),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 279, 'Demre', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 280, 'Derbent', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 281, 'Derebucak', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 282, 'Dereli', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 283, 'Derepazarı', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 284, 'Derik', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 285, 'Derince', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 286, 'Derinkuyu', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 287, 'Dernekpazarı', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 288, 'Develi', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 289, 'Devrek', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 290, 'Devrekani', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 291, 'Dicle', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 292, 'Didim', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 293, 'Digor', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 294, 'Dikili', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 295, 'Dikmen', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 296, 'Dilovası', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 297, 'Dinar', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 298, 'Divriği', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 299, 'Diyadin', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 300, 'Dodurga', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 301, 'Doğanhisar', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 302, 'Doğankent', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 303, 'Doğanşar', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 304, 'Doğanşehir', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 305, 'Doğanyol', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 306, 'Doğanyurt', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 307, 'Doğubayazıt', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 308, 'Domaniç', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 309, 'Dörtdivan', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 310, 'Dörtyol', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 311, 'Döşemealtı', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 312, 'Dulkadiroğlu', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 313, 'Dumlupınar', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 314, 'Durağan', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 315, 'Dursunbey', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 316, 'Düzce', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 317, 'Düziçi', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 318, 'Düzköy', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 319, 'Eceabat', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 320, 'Edirne', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 321, 'Edremit', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 322, 'Edremit', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 323, 'Efeler', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 324, 'Eflani', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 325, 'Eğil', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 326, 'Eğirdir', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 327, 'Ekinözü', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 328, 'Elazığ', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 329, 'Elbeyli', 79),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 330, 'Elbistan', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 331, 'Eldivan', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 332, 'Eleşkirt', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 333, 'Elmadağ', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 334, 'Elmalı', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 335, 'Emet', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 336, 'Emirdağ', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 337, 'Emirgazi', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 338, 'Enez', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 339, 'Erbaa', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 340, 'Erciş', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 341, 'Erdek', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 342, 'Erdemli', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 343, 'Ereğli', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 344, 'Ereğli', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 345, 'Erenler', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 346, 'Erfelek', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 347, 'Ergani', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 348, 'Ergene', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 349, 'Ermenek', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 350, 'Eruh', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 351, 'Erzin', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 352, 'Erzincan', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 353, 'Esenler', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 354, 'Esenyurt', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 355, 'Eskil', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 356, 'Eskipazar', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 357, 'Espiye', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 358, 'Eşme', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 359, 'Etimesgut', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 360, 'Evciler', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 361, 'Evren', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 362, 'Eynesil', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 363, 'Eyüp', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 364, 'Eyyübiye', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 365, 'Ezine', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 366, 'Fatih', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 367, 'Fatsa', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 368, 'Feke', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 369, 'Felahiye', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 370, 'Ferizli', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 371, 'Fethiye', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 372, 'Fındıklı', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 373, 'Finike', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 374, 'Foça', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 375, 'Gaziemir', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 376, 'Gaziosmanpaşa', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 377, 'Gazipaşa', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 378, 'Gebze', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 379, 'Gediz', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 380, 'Gelendost', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 381, 'Gelibolu', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 382, 'Gemerek', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 383, 'Gemlik', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 384, 'Genç', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 385, 'Gercüş', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 386, 'Gerede', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 387, 'Gerger', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 388, 'Germencik', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 389, 'Gerze', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 390, 'Gevaş', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 391, 'Geyve', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 392, 'Giresun', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 393, 'Gökçeada', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 394, 'Gökçebey', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 395, 'Göksun', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 396, 'Gölbaşı', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 397, 'Gölbaşı', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 398, 'Gölcük', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 399, 'Göle', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 400, 'Gölhisar', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 401, 'Gölköy', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 402, 'Gölmarmara', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 403, 'Gölova', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 404, 'Gölpazarı', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 405, 'Gölyaka', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 406, 'Gömeç', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 407, 'Gönen', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 408, 'Gönen', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 409, 'Gördes', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 410, 'Görele', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 411, 'Göynücek', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 412, 'Göynük', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 413, 'Güce', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 414, 'Güçlükonak', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 415, 'Güdül', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 416, 'Gülağaç', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 417, 'Gülnar', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 418, 'Gülşehir', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 419, 'Gülyalı', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 420, 'Gümüşhacıköy', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 421, 'Gümüşhane', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 422, 'Gümüşova', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 423, 'Gündoğmuş', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 424, 'Güney', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 425, 'Güneysınır', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 426, 'Güneysu', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 427, 'Güngören', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 428, 'Günyüzü', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 429, 'Gürgentepe', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 430, 'Güroymak', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 431, 'Gürpınar', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 432, 'Gürsu', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 433, 'Gürün', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 434, 'Güzelbahçe', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 435, 'Güzelyurt', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 436, 'Hacıbektaş', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 437, 'Hacılar', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 438, 'Hadim', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 439, 'Hafik', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 440, 'Hakkâri', 30),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 441, 'Halfeti', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 442, 'Haliliye', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 443, 'Halkapınar', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 444, 'Hamamözü', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 445, 'Hamur', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 446, 'Han', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 447, 'Hanak', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 448, 'Hani', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 449, 'Hanönü', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 450, 'Harmancık', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 451, 'Harran', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 452, 'Hasanbeyli', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 453, 'Hasankeyf', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 454, 'Hasköy', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 455, 'Hassa', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 456, 'Havran', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 457, 'Havsa', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 458, 'Havza', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 459, 'Haymana', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 460, 'Hayrabolu', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 461, 'Hayrat', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 462, 'Hazro', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 463, 'Hekimhan', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 464, 'Hemşin', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 465, 'Hendek', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 466, 'Hınıs', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 467, 'Hilvan', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 468, 'Hisarcık', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 469, 'Hizan', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 470, 'Hocalar', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 471, 'Honaz', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 472, 'Hopa', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 473, 'Horasan', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 474, 'Hozat', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 475, 'Hüyük', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 476, 'Iğdır', 76),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 477, 'Ilgaz', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 478, 'Ilgın', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 479, 'Isparta', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 480, 'İbradı', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 481, 'İdil', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 482, 'İhsangazi', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 483, 'İhsaniye', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 484, 'İkizce', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 485, 'İkizdere', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 486, 'İliç', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 487, 'İlkadım', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 488, 'İmamoğlu', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 489, 'İmranlı', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 490, 'İncesu', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 491, 'İncirliova', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 492, 'İnebolu', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 493, 'İnegöl', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 494, 'İnhisar', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 495, 'İnönü', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 496, 'İpekyolu', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 497, 'İpsala', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 498, 'İscehisar', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 499, 'İskenderun', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 500, 'İskilip', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 501, 'İslahiye', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 502, 'İspir', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 503, 'İvrindi', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 504, 'İyidere', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 505, 'İzmit', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 506, 'İznik', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 507, 'Kabadüz', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 508, 'Kabataş', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 509, 'Kadıköy', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 510, 'Kadınhanı', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 511, 'Kadışehri', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 512, 'Kadirli', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 513, 'Kağıthane', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 514, 'Kağızman', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 515, 'Kahta', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 516, 'Kale', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 517, 'Kale', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 518, 'Kalecik', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 519, 'Kalkandere', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 520, 'Kaman', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 521, 'Kandıra', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 522, 'Kangal', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 523, 'Kapaklı', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 524, 'Karabağlar', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 525, 'Karaburun', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 526, 'Karabük', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 527, 'Karacabey', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 528, 'Karacasu', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 529, 'Karaçoban', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 530, 'Karahallı', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 531, 'Karaisalı', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 532, 'Karakeçili', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 533, 'Karakoçan', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 534, 'Karakoyunlu', 76),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 535, 'Karaköprü', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 536, 'Karaman', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 537, 'Karamanlı', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 538, 'Karamürsel', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 539, 'Karapınar', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 540, 'Karapürçek', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 541, 'Karasu', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 542, 'Karataş', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 543, 'Karatay', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 544, 'Karayazı', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 545, 'Karesi', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 546, 'Kargı', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 547, 'Karkamış', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 548, 'Karlıova', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 549, 'Karpuzlu', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 550, 'Kars', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 551, 'Karşıyaka', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 552, 'Kartal', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 553, 'Kartepe', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 554, 'Kastamonu', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 555, 'Kaş', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 556, 'Kavak', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 557, 'Kavaklıdere', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 558, 'Kayapınar', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 559, 'Kaynarca', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 560, 'Kaynaşlı', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 561, 'Kazan', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 562, 'Kazımkarabekir', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 563, 'Keban', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 564, 'Keçiborlu', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 565, 'Keçiören', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 566, 'Keles', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 567, 'Kelkit', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 568, 'Kemah', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 569, 'Kemaliye', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 570, 'Kemalpaşa', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 571, 'Kemer', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 572, 'Kemer', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 573, 'Kepez', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 574, 'Kepsut', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 575, 'Keskin', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 576, 'Kestel', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 577, 'Keşan', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 578, 'Keşap', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 579, 'Kıbrıscık', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 580, 'Kınık', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 581, 'Kırıkhan', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 582, 'Kırıkkale', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 583, 'Kırkağaç', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 584, 'Kırklareli', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 585, 'Kırşehir', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 586, 'Kızılcahamam', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 587, 'Kızılırmak', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 588, 'Kızılören', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 589, 'Kızıltepe', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 590, 'Kiğı', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 591, 'Kilimli', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 592, 'Kilis', 79),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 593, 'Kiraz', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 594, 'Kocaali', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 595, 'Kocaköy', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 596, 'Kocasinan', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 597, 'Koçarlı', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 598, 'Kofçaz', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 599, 'Konak', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 600, 'Konyaaltı', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 601, 'Korgan', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 602, 'Korgun', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 603, 'Korkut', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 604, 'Korkuteli', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 605, 'Kovancılar', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 606, 'Koyulhisar', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 607, 'Kozaklı', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 608, 'Kozan', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 609, 'Kozlu', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 610, 'Kozluk', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 611, 'Köprübaşı', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 612, 'Köprübaşı', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 613, 'Köprüköy', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 614, 'Körfez', 41),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 615, 'Köse', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 616, 'Köşk', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 617, 'Köyceğiz', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 618, 'Kula', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 619, 'Kulp', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 620, 'Kulu', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 621, 'Kuluncak', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 622, 'Kumlu', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 623, 'Kumluca', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 624, 'Kumru', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 625, 'Kurşunlu', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 626, 'Kurtalan', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 627, 'Kurucaşile', 74),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 628, 'Kuşadası', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 629, 'Kuyucak', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 630, 'Küçükçekmece', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 631, 'Küre', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 632, 'Kürtün', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 633, 'Kütahya', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 634, 'Laçin', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 635, 'Ladik', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 636, 'Lalapaşa', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 637, 'Lapseki', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 638, 'Lice', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 639, 'Lüleburgaz', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 640, 'Maçka', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 641, 'Maden', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 642, 'Mahmudiye', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 643, 'Malazgirt', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 644, 'Malkara', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 645, 'Maltepe', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 646, 'Mamak', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 647, 'Manavgat', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 648, 'Manyas', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 649, 'Marmara', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 650, 'Marmaraereğlisi', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 651, 'Marmaris', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 652, 'Mazgirt', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 653, 'Mazıdağı', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 654, 'Mecitözü', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 655, 'Melikgazi', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 656, 'Menderes', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 657, 'Menemen', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 658, 'Mengen', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 659, 'Menteşe', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 660, 'Meram', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 661, 'Meriç', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 662, 'Merkezefendi', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 663, 'Merzifon', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 664, 'Mesudiye', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 665, 'Mezitli', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 666, 'Midyat', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 667, 'Mihalgazi', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 668, 'Mihalıççık', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 669, 'Milas', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 670, 'Mucur', 40),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 671, 'Mudanya', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 672, 'Mudurnu', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 673, 'Muradiye', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 674, 'Muratlı', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 675, 'Muratpaşa', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 676, 'Murgul', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 677, 'Musabeyli', 79),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 678, 'Mustafakemalpaşa', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 679, 'Muş', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 680, 'Mut', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 681, 'Mutki', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 682, 'Nallıhan', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 683, 'Narlıdere', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 684, 'Narman', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 685, 'Nazımiye', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 686, 'Nazilli', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 687, 'Nevşehir', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 688, 'Niğde', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 689, 'Niksar', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 690, 'Nilüfer', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 691, 'Nizip', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 692, 'Nurdağı', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 693, 'Nurhak', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 694, 'Nusaybin', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 695, 'Odunpazarı', 26);
INSERT INTO `district` (`deletedAt`, `updatedAt`, `createdAt`, `districtId`, `title`, `fkCity`) VALUES
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 696, 'Of', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 697, 'Oğuzeli', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 698, 'Oğuzlar', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 699, 'Oltu', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 700, 'Olur', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 701, 'Ondokuzmayıs', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 702, 'Onikişubat', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 703, 'Orhaneli', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 704, 'Orhangazi', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 705, 'Orta', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 706, 'Ortaca', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 707, 'Ortahisar', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 708, 'Ortaköy', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 709, 'Ortaköy', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 710, 'Osmancık', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 711, 'Osmaneli', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 712, 'Osmangazi', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 713, 'Osmaniye', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 714, 'Otlukbeli', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 715, 'Ovacık', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 716, 'Ovacık', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 717, 'Ödemiş', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 718, 'Ömerli', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 719, 'Özalp', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 720, 'Özvatan', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 721, 'Palandöken', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 722, 'Palu', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 723, 'Pamukkale', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 724, 'Pamukova', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 725, 'Pasinler', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 726, 'Patnos', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 727, 'Payas', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 728, 'Pazar', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 729, 'Pazar', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 730, 'Pazarcık', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 731, 'Pazarlar', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 732, 'Pazaryeri', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 733, 'Pazaryolu', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 734, 'Pehlivanköy', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 735, 'Pendik', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 736, 'Perşembe', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 737, 'Pertek', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 738, 'Pervari', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 739, 'Pınarbaşı', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 740, 'Pınarbaşı', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 741, 'Pınarhisar', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 742, 'Piraziz', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 743, 'Polateli', 79),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 744, 'Polatlı', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 745, 'Posof', 75),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 746, 'Pozantı', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 747, 'Pursaklar', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 748, 'Pülümür', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 749, 'Pütürge', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 750, 'Refahiye', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 751, 'Reşadiye', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 752, 'Reyhanlı', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 753, 'Rize', 53),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 754, 'Safranbolu', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 755, 'Saimbeyli', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 756, 'Salıpazarı', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 757, 'Salihli', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 758, 'Samandağ', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 759, 'Samsat', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 760, 'Sancaktepe', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 761, 'Sandıklı', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 762, 'Sapanca', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 763, 'Saray', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 764, 'Saray', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 765, 'Saraydüzü', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 766, 'Saraykent', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 767, 'Sarayköy', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 768, 'Sarayönü', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 769, 'Sarıcakaya', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 770, 'Sarıçam', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 771, 'Sarıgöl', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 772, 'Sarıkamış', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 773, 'Sarıkaya', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 774, 'Sarıoğlan', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 775, 'Sarıveliler', 70),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 776, 'Sarıyahşi', 68),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 777, 'Sarıyer', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 778, 'Sarız', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 779, 'Saruhanlı', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 780, 'Sason', 72),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 781, 'Savaştepe', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 782, 'Savur', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 783, 'Seben', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 784, 'Seferihisar', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 785, 'Selçuk', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 786, 'Selçuklu', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 787, 'Selendi', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 788, 'Selim', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 789, 'Senirkent', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 790, 'Serdivan', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 791, 'Serik', 7),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 792, 'Serinhisar', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 793, 'Seydikemer', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 794, 'Seydiler', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 795, 'Seydişehir', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 796, 'Seyhan', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 797, 'Seyitgazi', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 798, 'Sındırgı', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 799, 'Siirt', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 800, 'Silifke', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 801, 'Silivri', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 802, 'Silopi', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 803, 'Silvan', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 804, 'Simav', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 805, 'Sinanpaşa', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 806, 'Sincan', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 807, 'Sincik', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 808, 'Sinop', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 809, 'Sivas', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 810, 'Sivaslı', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 811, 'Siverek', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 812, 'Sivrice', 23),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 813, 'Sivrihisar', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 814, 'Solhan', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 815, 'Soma', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 816, 'Sorgun', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 817, 'Söğüt', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 818, 'Söğütlü', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 819, 'Söke', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 820, 'Sulakyurt', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 821, 'Sultanbeyli', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 822, 'Sultandağı', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 823, 'Sultangazi', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 824, 'Sultanhisar', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 825, 'Suluova', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 826, 'Sulusaray', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 827, 'Sumbas', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 828, 'Sungurlu', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 829, 'Sur', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 830, 'Suruç', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 831, 'Susurluk', 10),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 832, 'Susuz', 36),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 833, 'Suşehri', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 834, 'Süleymanpaşa', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 835, 'Süloğlu', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 836, 'Sürmene', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 837, 'Sütçüler', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 838, 'Şabanözü', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 839, 'Şahinbey', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 840, 'Şalpazarı', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 841, 'Şaphane', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 842, 'Şarkışla', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 843, 'Şarkikaraağaç', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 844, 'Şarköy', 59),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 845, 'Şavşat', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 846, 'Şebinkarahisar', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 847, 'Şefaatli', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 848, 'Şehitkamil', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 849, 'Şehzadeler', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 850, 'Şemdinli', 30),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 851, 'Şenkaya', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 852, 'Şenpazar', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 853, 'Şereflikoçhisar', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 854, 'Şırnak', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 855, 'Şile', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 856, 'Şiran', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 857, 'Şirvan', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 858, 'Şişli', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 859, 'Şuhut', 3),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 860, 'Talas', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 861, 'Taraklı', 54),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 862, 'Tarsus', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 863, 'Taşkent', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 864, 'Taşköprü', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 865, 'Taşlıçay', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 866, 'Taşova', 5),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 867, 'Tatvan', 13),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 868, 'Tavas', 20),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 869, 'Tavşanlı', 43),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 870, 'Tefenni', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 871, 'Tekkeköy', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 872, 'Tekman', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 873, 'Tepebaşı', 26),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 874, 'Tercan', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 875, 'Termal', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 876, 'Terme', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 877, 'Tillo', 56),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 878, 'Tire', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 879, 'Tirebolu', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 880, 'Tokat', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 881, 'Tomarza', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 882, 'Tonya', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 883, 'Toprakkale', 80),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 884, 'Torbalı', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 885, 'Toroslar', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 886, 'Tortum', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 887, 'Torul', 29),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 888, 'Tosya', 37),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 889, 'Tufanbeyli', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 890, 'Tunceli', 62),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 891, 'Turgutlu', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 892, 'Turhal', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 893, 'Tuşba', 65),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 894, 'Tut', 2),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 895, 'Tutak', 4),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 896, 'Tuzla', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 897, 'Tuzluca', 76),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 898, 'Tuzlukçu', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 899, 'Türkeli', 57),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 900, 'Türkoğlu', 46),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 901, 'Uğurludağ', 19),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 902, 'Ula', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 903, 'Ulaş', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 904, 'Ulubey', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 905, 'Ulubey', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 906, 'Uluborlu', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 907, 'Uludere', 73),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 908, 'Ulukışla', 51),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 909, 'Ulus', 74),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 910, 'Urla', 35),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 911, 'Uşak', 64),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 912, 'Uzundere', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 913, 'Uzunköprü', 22),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 914, 'Ümraniye', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 915, 'Ünye', 52),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 916, 'Ürgüp', 50),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 917, 'Üsküdar', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 918, 'Üzümlü', 24),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 919, 'Vakfıkebir', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 920, 'Varto', 49),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 921, 'Vezirköprü', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 922, 'Viranşehir', 63),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 923, 'Vize', 39),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 924, 'Yağlıdere', 28),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 925, 'Yahşihan', 71),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 926, 'Yahyalı', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 927, 'Yakakent', 55),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 928, 'Yakutiye', 25),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 929, 'Yalıhüyük', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 930, 'Yalova', 77),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 931, 'Yalvaç', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 932, 'Yapraklı', 18),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 933, 'Yatağan', 48),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 934, 'Yavuzeli', 27),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 935, 'Yayladağı', 31),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 936, 'Yayladere', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 937, 'Yazıhan', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 938, 'Yedisu', 12),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 939, 'Yenice', 17),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 940, 'Yenice', 78),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 941, 'Yeniçağa', 14),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 942, 'Yenifakılı', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 943, 'Yenimahalle', 6),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 944, 'Yenipazar', 9),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 945, 'Yenipazar', 11),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 946, 'Yenişarbademli', 32),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 947, 'Yenişehir', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 948, 'Yenişehir', 21),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 949, 'Yenişehir', 33),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 950, 'Yerköy', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 951, 'Yeşilhisar', 38),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 952, 'Yeşilli', 47),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 953, 'Yeşilova', 15),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 954, 'Yeşilyurt', 44),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 955, 'Yeşilyurt', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 956, 'Yığılca', 81),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 957, 'Yıldırım', 16),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 958, 'Yıldızeli', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 959, 'Yomra', 61),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 960, 'Yozgat', 66),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 961, 'Yumurtalık', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 962, 'Yunak', 42),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 963, 'Yunusemre', 45),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 964, 'Yusufeli', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 965, 'Yüksekova', 30),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 966, 'Yüreğir', 1),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 967, 'Zara', 58),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 968, 'Zeytinburnu', 34),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 969, 'Zile', 60),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 970, 'Zonguldak', 67),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 971, 'Kemalpaşa', 8),
(NULL, '2022-04-14 23:53:33', '2022-04-14 23:53:33', 972, 'Sultanhanı', 68);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `document`
--

CREATE TABLE `document` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `documentId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `fkSale` int(11) DEFAULT NULL,
  `fkExpense` int(11) DEFAULT NULL,
  `fkCustomer` int(11) DEFAULT NULL,
  `fkSupplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `expense`
--

CREATE TABLE `expense` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `expenseId` int(11) NOT NULL,
  `invoiceNumber` bigint(20) DEFAULT NULL,
  `invoiceDate` date NOT NULL,
  `totalPrice` decimal(10,4) NOT NULL,
  `totalVat` decimal(10,2) NOT NULL,
  `totalPriceWithVat` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `fkCurrency` int(11) NOT NULL,
  `fkSupplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `expenseproduct`
--

CREATE TABLE `expenseproduct` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `expenseProductId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unitPrice` decimal(10,4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` decimal(10,4) NOT NULL,
  `vatPercent` int(11) NOT NULL,
  `totalPriceWithVat` decimal(8,2) NOT NULL,
  `fkUnit` int(11) NOT NULL,
  `fkProduct` int(11) NOT NULL,
  `fkExpense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `note`
--

CREATE TABLE `note` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `noteId` int(11) NOT NULL,
  `explanation` text NOT NULL,
  `createdBy` int(11) NOT NULL,
  `fkCustomer` int(11) DEFAULT NULL,
  `fkSupplier` int(11) DEFAULT NULL,
  `fkSale` int(11) DEFAULT NULL,
  `fkExpense` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment`
--

CREATE TABLE `payment` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `paymentId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `explanation` text DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `paymentDate` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `fkSupplier` int(11) DEFAULT NULL,
  `fkCurrency` int(11) DEFAULT NULL,
  `fkAccount` int(11) DEFAULT NULL,
  `fkExpense` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permission`
--

CREATE TABLE `permission` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `permissionId` int(11) NOT NULL,
  `seq` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `permission`
--

INSERT INTO `permission` (`deletedAt`, `updatedAt`, `createdAt`, `permissionId`, `seq`, `title`, `slug`, `parentId`) VALUES
(NULL, '2022-04-10 02:49:11', '2022-04-10 02:49:11', 1, 99, 'Yönetim', '', NULL),
(NULL, '2022-04-10 02:50:45', '2022-04-10 02:50:45', 2, 0, 'Sistem Ayarları', 'manage-settings', 1),
(NULL, '2022-04-10 02:51:45', '2022-04-10 02:51:45', 3, 0, 'Kullanıcı İşlemleri', '', NULL),
(NULL, '2022-04-10 02:52:50', '2022-04-10 02:52:50', 4, 1, 'Kullanıcı Oluştur', 'add-user', 3),
(NULL, '2022-04-10 02:52:50', '2022-04-10 02:52:50', 5, 2, 'Kullanıcı Düzenle', 'edit-user', 3),
(NULL, '2022-04-10 02:54:57', '2022-04-10 02:54:57', 6, 3, 'Kullanıcı Sil', 'delete-user', 3),
(NULL, '2022-04-10 02:54:57', '2022-04-10 02:54:57', 7, 1, 'Kullanıcı Listesi', 'view-user', 3),
(NULL, '2022-04-10 02:56:20', '2022-04-10 02:56:20', 8, 2, 'Rol İşlemleri', 'role-management', NULL),
(NULL, '2022-04-10 02:57:23', '2022-04-10 02:57:23', 9, 2, 'Rol Oluştur', 'add-role', 8),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 11, 3, 'Rol Düzenle', 'edit-role', 8),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 12, 4, 'Rol Sil', 'delete-role', 8),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 14, 1, 'Rol Görüntüle', 'view-role', 8),
(NULL, '2022-04-17 16:39:56', '2022-04-17 16:39:56', 15, 2, 'Müşteri Yönetimi', '', NULL),
(NULL, '2022-04-10 02:57:23', '2022-04-10 02:57:23', 17, 2, 'Müşteri Oluştur', 'add-customer', 15),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 18, 3, 'Müşteri Düzenle', 'edit-customer', 15),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 19, 4, 'Müşteri Sil', 'delete-customer', 15),
(NULL, '2022-04-10 02:57:41', '2022-04-10 02:57:41', 20, 1, 'Müşteri Görüntüle', 'view-customer', 15),
(NULL, '2022-04-17 17:23:45', '2022-04-17 17:23:45', 21, 5, 'Müşteri Grupları', 'manage-customer-groups', 15),
(NULL, '2022-04-22 00:30:54', '2022-04-22 00:30:54', 23, 99, 'Kasa & Bankalar', '', NULL),
(NULL, '2022-04-22 00:30:54', '2022-04-22 00:30:54', 24, 99, 'Yeni Oluştur', 'add-account', 23),
(NULL, '2022-04-22 00:30:54', '2022-04-22 00:30:54', 25, 99, 'Düzenle', 'edit-account', 23),
(NULL, '2022-04-22 00:30:54', '2022-04-22 00:30:54', 26, 99, 'Sil/Arşivle', 'delete-account', 23),
(NULL, '2022-04-22 00:30:54', '2022-04-22 00:30:54', 27, 99, 'Hesap Hareketleri', 'view-account-activity', 23),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 29, 5, 'Satış Yönetimi', '', NULL),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 30, 1, 'Satış Faturası Oluştur', 'add-sale', 29),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 31, 4, 'Doküman İşlemleri', 'add-sale-document', 29),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 33, 6, 'Not Ekle & Düzenle', 'add-edit-sale-note', 29),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 34, 2, 'Satış Faturası Düzenle', 'edit-sale', 29),
(NULL, '2022-06-26 23:29:50', '2022-06-26 23:29:50', 35, 3, 'Satışları Görüntüle', 'view-sale', 29),
(NULL, '2022-06-27 00:51:12', '2022-06-27 00:51:12', 36, 5, 'Tahsilatlar', '', NULL),
(NULL, '2022-06-27 00:51:12', '2022-06-27 00:51:12', 37, 1, 'Tahsilat Oluştur', 'add-collect', 36),
(NULL, '2022-06-27 00:51:12', '2022-06-27 00:51:12', 38, 2, 'Tahsilat Düzenle', 'edit-collect', 36),
(NULL, '2022-06-27 00:51:12', '2022-06-27 00:51:12', 39, 3, 'Tahsilat Sil', 'delete-collect', 36),
(NULL, '2022-06-27 00:51:12', '2022-06-27 00:51:12', 40, 4, 'Tahsilatları Görüntüle', 'view-collect', 36);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `productId` int(11) NOT NULL,
  `type` enum('PRODUCT','SERVICE') NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `productCode` varchar(255) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `stockTracking` enum('ACTIVE','PASSIVE') DEFAULT 'PASSIVE',
  `stock` decimal(8,2) DEFAULT 0.00,
  `initialStock` decimal(8,2) DEFAULT 0.00,
  `vatPercent` int(11) NOT NULL,
  `fkUnit` int(11) NOT NULL,
  `fkCurrency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`deletedAt`, `updatedAt`, `createdAt`, `productId`, `type`, `name`, `productCode`, `unitPrice`, `totalPrice`, `stockTracking`, `stock`, `initialStock`, `vatPercent`, `fkUnit`, `fkCurrency`) VALUES
(NULL, '2022-07-18 15:53:57', '2022-07-18 15:53:57', 1, 'SERVICE', 'Test', 'NP202201', '1000.00', '1180.00', 'PASSIVE', '0.00', '0.00', 18, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role`
--

CREATE TABLE `role` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `roleId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `colorClass` varchar(155) NOT NULL DEFAULT 'light-info',
  `isEditable` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `role`
--

INSERT INTO `role` (`deletedAt`, `updatedAt`, `createdAt`, `roleId`, `title`, `colorClass`, `isEditable`) VALUES
(NULL, '2022-03-22 23:12:47', '2022-03-22 23:12:47', 1, 'Yönetici', 'light-info', '0'),
('2022-04-08 20:41:04', '2022-04-08 20:25:43', '2022-04-08 20:25:43', 10, 'Örnek Rol', 'light-info', '1'),
(NULL, '2022-04-08 21:39:21', '2022-04-08 21:39:21', 11, 'Örnek Rol 1', 'light-info', '1'),
('2022-04-17 16:39:16', '2022-04-15 23:05:28', '2022-04-15 23:05:28', 12, 'sdafsfasfasf', 'light-info', '1'),
('2022-04-17 16:39:10', '2022-04-17 15:58:08', '2022-04-17 15:58:08', 13, 'dxx', 'light-info', '1'),
('2022-04-17 16:39:13', '2022-04-17 15:58:28', '2022-04-17 15:58:28', 14, 'rqwerqwerqw', 'light-info', '1'),
('2022-04-17 16:39:08', '2022-04-17 16:39:04', '2022-04-17 16:39:04', 15, 'sadf', 'light-info', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rolepermission`
--

CREATE TABLE `rolepermission` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `rolePermissionId` int(11) NOT NULL,
  `fkRole` int(11) NOT NULL,
  `fkPermission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rolepermission`
--

INSERT INTO `rolepermission` (`deletedAt`, `updatedAt`, `createdAt`, `rolePermissionId`, `fkRole`, `fkPermission`) VALUES
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 83, 11, 4),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 84, 11, 5),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 85, 11, 7),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 86, 11, 14),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 87, 11, 9),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 88, 11, 11),
(NULL, '2022-04-15 23:05:46', '2022-04-15 23:05:46', 89, 11, 12),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 90, 12, 4),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 91, 12, 5),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 92, 12, 6),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 93, 12, 7),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 94, 12, 14),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 95, 12, 9),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 96, 12, 11),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 97, 12, 12),
('2022-04-17 16:39:16', '2022-04-17 15:58:00', '2022-04-17 15:58:00', 98, 12, 2),
('2022-04-17 16:39:08', '2022-04-17 16:39:04', '2022-04-17 16:39:04', 101, 15, 9),
('2022-04-17 16:39:08', '2022-04-17 16:39:04', '2022-04-17 16:39:04', 102, 15, 12),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 263, 1, 40),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 264, 1, 39),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 265, 1, 38),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 266, 1, 37),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 267, 1, 35),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 268, 1, 34),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 269, 1, 33),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 270, 1, 31),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 271, 1, 30),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 272, 1, 27),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 273, 1, 26),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 274, 1, 25),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 275, 1, 24),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 276, 1, 21),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 277, 1, 20),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 278, 1, 19),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 279, 1, 18),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 280, 1, 17),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 281, 1, 14),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 282, 1, 12),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 283, 1, 11),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 284, 1, 9),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 285, 1, 7),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 286, 1, 6),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 287, 1, 5),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 288, 1, 4),
(NULL, '2022-06-27 01:01:31', '2022-06-27 01:01:31', 289, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sale`
--

CREATE TABLE `sale` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `saleId` int(11) NOT NULL,
  `invoiceNumber` bigint(20) DEFAULT NULL,
  `invoiceDate` date NOT NULL,
  `totalPrice` decimal(10,4) NOT NULL,
  `totalVat` decimal(10,2) NOT NULL,
  `totalPriceWithVat` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `invoiceNotes` text DEFAULT NULL,
  `fkCurrency` int(11) NOT NULL,
  `fkCustomer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sale`
--

INSERT INTO `sale` (`deletedAt`, `updatedAt`, `createdAt`, `saleId`, `invoiceNumber`, `invoiceDate`, `totalPrice`, `totalVat`, `totalPriceWithVat`, `balance`, `notes`, `invoiceNotes`, `fkCurrency`, `fkCustomer`) VALUES
(NULL, '2022-07-18 15:54:40', '2022-07-18 15:54:40', 1, 2022001, '2022-07-18', '1000.0000', '180.00', '1180.00', '1180.00', 'asdfasdfdas', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saleproduct`
--

CREATE TABLE `saleproduct` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `saleProductId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unitPrice` decimal(10,4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` decimal(10,4) NOT NULL,
  `vatPercent` int(11) NOT NULL,
  `totalPriceWithVat` decimal(8,2) NOT NULL,
  `fkUnit` int(11) NOT NULL,
  `fkProduct` int(11) NOT NULL,
  `fkSale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `saleproduct`
--

INSERT INTO `saleproduct` (`deletedAt`, `updatedAt`, `createdAt`, `saleProductId`, `name`, `unitPrice`, `quantity`, `totalPrice`, `vatPercent`, `totalPriceWithVat`, `fkUnit`, `fkProduct`, `fkSale`) VALUES
(NULL, '2022-07-18 15:54:40', '2022-07-18 15:54:40', 1, 'Test', '1000.0000', 1, '1000.0000', 18, '1180.00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sector`
--

CREATE TABLE `sector` (
  `deletedAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `sectorId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stackactivity`
--

CREATE TABLE `stackactivity` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `stackActivityId` int(11) NOT NULL,
  `type` enum('IN','OUT') NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `afterStack` decimal(10,0) NOT NULL,
  `explanation` varchar(255) NOT NULL,
  `fkUser` int(11) NOT NULL,
  `fkProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

CREATE TABLE `status` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `statusId` int(11) NOT NULL,
  `type` enum('SALE') NOT NULL DEFAULT 'SALE',
  `title` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supplier`
--

CREATE TABLE `supplier` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `supplierId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `taxOffice` varchar(255) DEFAULT NULL,
  `taxNumber` varchar(255) DEFAULT NULL,
  `identityNumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `secondPhone` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `fkCountry` int(11) NOT NULL,
  `fkCity` int(11) DEFAULT NULL,
  `fkDistrict` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unit`
--

CREATE TABLE `unit` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `unitId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `unit`
--

INSERT INTO `unit` (`deletedAt`, `updatedAt`, `createdAt`, `unitId`, `name`) VALUES
(NULL, '2022-04-24 01:24:55', '2022-04-24 01:24:55', 1, 'Adet'),
(NULL, '2022-04-24 01:24:55', '2022-04-24 01:24:55', 2, 'Metre'),
(NULL, '2022-07-18 15:57:34', '2022-07-18 15:57:34', 3, 'Kasa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(99) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `theme` varchar(22) NOT NULL DEFAULT 'light',
  `lastSeenAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fkRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`deletedAt`, `updatedAt`, `createdAt`, `userId`, `firstName`, `lastName`, `email`, `password`, `phone`, `birthDate`, `image`, `theme`, `lastSeenAt`, `fkRole`) VALUES
(NULL, '2022-07-18 18:17:49', '2022-04-08 20:22:07', 1, 'Ahmet', 'ÇAKMAK', 'ahmet@netpus.com.tr', '123123', '905079747767', NULL, 'saedfasdf', 'light', '2022-07-18 18:17:49', 1),
(NULL, '2022-04-08 22:54:59', '2022-04-08 22:54:59', 7, 'Ömer', 'ÇAKMAK', 'omer@netpus.com.tr', '$2y$10$Zr.3.ji8n7kHDrEAQ2rxduSDOmdIWOdYvtWUfJ0ZrJme26LcjqZJm', '905423345912', '2000-04-09', '', 'light', '2022-04-08 22:54:59', 11),
(NULL, '2022-04-08 22:55:24', '2022-04-08 22:55:24', 8, 'Gökhan', 'ÇAKMAK', 'gokhan@netpus.com.tr', '$2y$10$h95pkFm2J2wC3JcFjDsRMe5T06wqn9aJDMRyUeeqviqiGXAkivbrm', '905532714706', NULL, 'user/c958280e-9d26-4709-b1e6-56d4d434c035.png', 'light', '2022-04-09 16:46:59', 11);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `fkBank` (`fkBank`),
  ADD KEY `fkCurrency` (`fkCurrency`);

--
-- Tablo için indeksler `accountactivity`
--
ALTER TABLE `accountactivity`
  ADD PRIMARY KEY (`accountActivityId`),
  ADD KEY `fkAccount` (`fkAccount`);

--
-- Tablo için indeksler `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`activityLogId`);

--
-- Tablo için indeksler `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankId`);

--
-- Tablo için indeksler `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`);

--
-- Tablo için indeksler `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`collectId`);

--
-- Tablo için indeksler `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Tablo için indeksler `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`);

--
-- Tablo için indeksler `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyId`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `fkCountry` (`fkCountry`,`fkCity`,`fkDistrict`),
  ADD KEY `fkCustomerGroup` (`fkCustomerGroup`),
  ADD KEY `fkDistrict` (`fkDistrict`),
  ADD KEY `fkCity` (`fkCity`);

--
-- Tablo için indeksler `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`customerGroupId`);

--
-- Tablo için indeksler `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`);

--
-- Tablo için indeksler `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`documentId`);

--
-- Tablo için indeksler `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseId`),
  ADD KEY `fkCurrency` (`fkCurrency`),
  ADD KEY `fkSupplier` (`fkSupplier`);

--
-- Tablo için indeksler `expenseproduct`
--
ALTER TABLE `expenseproduct`
  ADD PRIMARY KEY (`expenseProductId`),
  ADD KEY `fkSale` (`fkExpense`),
  ADD KEY `fkUnit` (`fkUnit`,`fkProduct`,`fkExpense`),
  ADD KEY `fkProduct` (`fkProduct`);

--
-- Tablo için indeksler `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteId`);

--
-- Tablo için indeksler `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Tablo için indeksler `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permissionId`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Tablo için indeksler `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Tablo için indeksler `rolepermission`
--
ALTER TABLE `rolepermission`
  ADD PRIMARY KEY (`rolePermissionId`),
  ADD KEY `fkRole` (`fkRole`,`fkPermission`),
  ADD KEY `fkPermission` (`fkPermission`);

--
-- Tablo için indeksler `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`saleId`),
  ADD KEY `fkCurrency` (`fkCurrency`,`fkCustomer`),
  ADD KEY `fkCustomer` (`fkCustomer`);

--
-- Tablo için indeksler `saleproduct`
--
ALTER TABLE `saleproduct`
  ADD PRIMARY KEY (`saleProductId`),
  ADD KEY `fkSale` (`fkSale`),
  ADD KEY `fkUnit` (`fkUnit`,`fkProduct`,`fkSale`),
  ADD KEY `fkProduct` (`fkProduct`);

--
-- Tablo için indeksler `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sectorId`);

--
-- Tablo için indeksler `stackactivity`
--
ALTER TABLE `stackactivity`
  ADD PRIMARY KEY (`stackActivityId`);

--
-- Tablo için indeksler `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Tablo için indeksler `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`),
  ADD KEY `fkCountry` (`fkCountry`,`fkCity`,`fkDistrict`),
  ADD KEY `fkDistrict` (`fkDistrict`),
  ADD KEY `fkCity` (`fkCity`);

--
-- Tablo için indeksler `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitId`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `fkRole` (`fkRole`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `account`
--
ALTER TABLE `account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `accountactivity`
--
ALTER TABLE `accountactivity`
  MODIFY `accountActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `activityLogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Tablo için AUTO_INCREMENT değeri `bank`
--
ALTER TABLE `bank`
  MODIFY `bankId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `city`
--
ALTER TABLE `city`
  MODIFY `cityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `collect`
--
ALTER TABLE `collect`
  MODIFY `collectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- Tablo için AUTO_INCREMENT değeri `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `customerGroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=973;

--
-- Tablo için AUTO_INCREMENT değeri `document`
--
ALTER TABLE `document`
  MODIFY `documentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `expenseproduct`
--
ALTER TABLE `expenseproduct`
  MODIFY `expenseProductId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `note`
--
ALTER TABLE `note`
  MODIFY `noteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `permission`
--
ALTER TABLE `permission`
  MODIFY `permissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `rolepermission`
--
ALTER TABLE `rolepermission`
  MODIFY `rolePermissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- Tablo için AUTO_INCREMENT değeri `sale`
--
ALTER TABLE `sale`
  MODIFY `saleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `saleproduct`
--
ALTER TABLE `saleproduct`
  MODIFY `saleProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sector`
--
ALTER TABLE `sector`
  MODIFY `sectorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `stackactivity`
--
ALTER TABLE `stackactivity`
  MODIFY `stackActivityId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `unit`
--
ALTER TABLE `unit`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fkCustomerGroup`) REFERENCES `customergroup` (`customerGroupId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`fkDistrict`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`fkCountry`) REFERENCES `country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_ibfk_4` FOREIGN KEY (`fkCity`) REFERENCES `city` (`cityId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `rolepermission`
--
ALTER TABLE `rolepermission`
  ADD CONSTRAINT `rolepermission_ibfk_1` FOREIGN KEY (`fkRole`) REFERENCES `role` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rolepermission_ibfk_2` FOREIGN KEY (`fkPermission`) REFERENCES `permission` (`permissionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`fkCurrency`) REFERENCES `currency` (`currencyId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`fkCustomer`) REFERENCES `customer` (`customerId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `saleproduct`
--
ALTER TABLE `saleproduct`
  ADD CONSTRAINT `saleproduct_ibfk_1` FOREIGN KEY (`fkSale`) REFERENCES `sale` (`saleId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `saleproduct_ibfk_2` FOREIGN KEY (`fkProduct`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fkRole`) REFERENCES `role` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
