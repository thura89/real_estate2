-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2022 at 01:15 AM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myanmar1_real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `region` int(11) DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township` int(11) DEFAULT NULL,
  `type_of_street` int(11) DEFAULT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `properties_id`, `region`, `street_name`, `ward`, `township`, `type_of_street`, `building_name`, `building_type`, `created_at`, `updated_at`) VALUES
(12, 14, 15, 'Zena Perkins', 'Nemo sit iusto ut ci', 51, 2, NULL, NULL, '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(13, 15, 6, 'ThabinShweHtee', '5', 152, 1, NULL, NULL, '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(18, 20, 3, 'HOOH', '5', 73, 2, NULL, NULL, '2021-09-23 04:49:09', '2021-09-23 05:22:23'),
(19, 21, 5, 'ThabinShweHtee', '5', 129, 2, NULL, NULL, '2021-09-23 04:50:44', '2021-09-23 04:50:44'),
(32, 34, 3, 'Kyang Gone1', '7', 76, 2, 'Hla Building', 1, '2021-09-24 09:34:56', '2021-11-05 05:55:41'),
(33, 35, 2, 'Pyi Gyi Tan Gon', 'Pyi Gyi Tan Kon', 50, 2, 'Pyi Gyi', 1, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(34, 36, 8, 'Taung Gyi', '5', 197, 1, NULL, NULL, '2021-09-27 09:27:02', '2021-09-27 11:44:18'),
(35, 37, 3, 'ThabinShweHtee', 'KyiPwarYay', 76, 2, 'Hla Building', NULL, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(36, 38, 4, 'Danubyu', '5', 103, 1, 'Danubyu', NULL, '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(37, 39, 5, 'chauk', 'KyiPwarYay', 128, 1, 'Chauk', NULL, '2021-09-28 05:32:36', '2021-09-28 05:32:36'),
(38, 40, 7, 'Kawthoung', 'Kawthong', 189, 1, NULL, NULL, '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(39, 41, 1, 'Pabedan', 'lathar', 5, 1, 'Lathar', NULL, '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(40, 42, 2, 'myeik', 'myeik', 47, 1, 'Myeik', NULL, '2021-09-28 09:49:27', '2021-10-04 05:46:14'),
(41, 43, 2, 'ThabinShweHtee', '3', 46, 2, NULL, NULL, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(42, 44, 1, 'ThabinShweHtee', 'KyiPwarYay', 5, 2, NULL, NULL, '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(43, 45, 2, 'ThabinShweHtee', 'KyiPwarYay', 48, 1, NULL, NULL, '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(44, 46, 1, 'ThabinShweHtee', 'KyiPwarYay', 8, 2, 'Chauk', 2, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(45, 47, 13, 'Rudyard Flowers', 'Sit fugit illum s', 305, 2, NULL, NULL, '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(46, 48, 4, 'ThabinShweHtee 1', 'KyiPwarYay', 104, 2, NULL, NULL, '2021-10-04 05:39:48', '2021-11-05 05:57:24'),
(47, 49, 3, 'ThabinShweHtee', 'Pyi Gyi Tan Kon', 75, 1, NULL, NULL, '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(48, 50, 4, 'ThabinShweHtee', 'KyiPwarYay', 103, 2, NULL, NULL, '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(49, 51, 1, 'ThabinShweHtee', 'KyiPwarYayhkh', 6, 2, 'Hla Building', 2, '2021-10-11 05:27:25', '2021-10-11 05:28:34'),
(50, 52, 1, 'ThabinShweHtee', 'KyiPwarYay', 3, 1, 'Hla Building', NULL, '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(70, 80, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(71, 81, 2, 'street', 'ward', 3, 1, 'name', NULL, '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(72, 82, 2, 'street', 'ward', 3, 1, 'name', NULL, '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(73, 83, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-02-24 12:06:51', '2022-02-24 12:06:51'),
(74, 84, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(75, 85, 2, 'text', 'text', 3, 1, NULL, NULL, '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(81, 91, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(82, 92, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(83, 93, 2, 'text', 'text', 4, 1, NULL, NULL, '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(84, 94, 2, 'text', 'text', 3, 1, NULL, NULL, '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(85, 95, 2, 'text', 'text', 4, 1, 'text', NULL, '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(87, 97, 1, 'Streete', 'wartd', 1, 1, 'helow', NULL, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(88, 98, 2, 'text', 'text', 4, 1, 'text', NULL, '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(89, 99, 9, 'Ulric Vega', 'Aut do corporis labo', 259, 1, NULL, NULL, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(90, 100, 10, 'Stone Summers', 'Earum saepe cum cons', 265, 2, 'Wylie Ballard', NULL, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(93, 103, 6, 'Ivana Francis', 'Sit amet sunt dolo', 153, 1, 'Donna Callahan', NULL, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(94, 104, 4, 'Wesley Medina', 'Amet dolorum except', 105, 1, NULL, NULL, '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(95, 105, 12, 'Price Kinney', 'Nesciunt dolor labo', 293, 1, NULL, NULL, '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(96, 106, 9, 'Joan Walter', 'Sint et ut fugiat m', 259, 2, 'Shelly Stout', NULL, '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(97, 107, 5, 'Cara Barton', 'Voluptatibus volupta', 129, 3, NULL, NULL, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(98, 108, 14, 'Wing Goff', 'Quis soluta autem vo', 252, 1, NULL, NULL, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(99, 109, 1, 'Wang Thornton', 'Rerum rem et iure re', 4, 3, NULL, NULL, '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(100, 110, 15, 'Eliana Cruz', 'Omnis sapiente earum', 321, 3, 'Briar Vincent', NULL, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(101, 111, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(102, 112, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(103, 113, 11, 'Olivia Franks', 'Id modi deserunt no', 277, 3, NULL, NULL, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(104, 114, 9, 'Maebaung Monastery', 'No.3', 259, 1, NULL, NULL, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(105, 115, 9, 'အုတ်ဖိုလမ်း', 'အမှတ်(၁)', 259, 1, NULL, NULL, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(106, 116, 9, 'ရတနာဒီပ', 'အမှတ်(၉)', 259, 1, 'Condo', NULL, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(108, 118, 1, 'မင်္ဂလာ', '၁၃ ရပ်ကွက်', 27, 1, NULL, NULL, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(109, 119, 1, 'သစ္စာ', 'အမှတ်(၁)', 12, 1, '11', NULL, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(110, 120, 1, 'မေတ္တာညွှန့်', 'တာေမွ', 13, 1, '၃၃၅', NULL, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(111, 121, 3, 'ရတနာ', '၄', 76, 1, NULL, NULL, '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(112, 122, 4, 'မေတ္တာ', '၅', 103, 1, NULL, NULL, '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(113, 123, 9, 'မဲဘောင်', 'မဲဘောင်', 259, 1, NULL, NULL, '2022-07-19 20:56:31', '2022-07-23 17:10:31'),
(114, 124, 15, 'ဘူးကွဲ', '၃', 325, 1, 'C2', NULL, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(165, 175, 9, 'ဝါဆိုဦး', 'အမှတ်(၉)', 259, 1, NULL, NULL, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(166, 176, 9, 'ချယ်ရီ', 'လှာကမြင်', 259, 1, NULL, NULL, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(167, 177, 9, 'ကော့ကျိုက်', 'ကော့ကျိုက်', 259, 1, NULL, NULL, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(168, 178, 9, 'တောင်ကလေး', 'တောင်ကလေး', 259, 1, NULL, NULL, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(169, 179, 9, 'ထုံးအို င်လမ်း', 'အမှတ်(၇)', 259, 1, NULL, NULL, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(170, 180, 9, 'လှာကမြင်', 'လှာကမြင်', 259, 1, NULL, NULL, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(171, 181, 9, 'တောင်ကလေး', 'တောင်ကလေး', 259, 1, NULL, NULL, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(172, 182, 9, 'ရတနာဒီပ', 'ရတနာဒီပ', 259, 1, NULL, NULL, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(174, 184, 9, 'ဝါဆိုဦး', 'ဝါဆိုဦး', 259, 1, NULL, NULL, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(175, 185, 9, 'ပြည်ထောင်စု', 'ပြည်ထောင်စု', 259, 1, NULL, NULL, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(176, 186, 1, 'ရန်ကင်း', 'ရန်ကင်း', 14, 1, 'Condo', NULL, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(177, 187, 1, 'ကြည့်မြင်တိုင်', 'ကြည့်မြင်တိုင်', 8, 1, 'Condo', NULL, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(178, 188, 1, 'တာ​ေ မွ', 'တာ​ေ မွ', 13, 1, 'Condo', NULL, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(179, 189, 1, 'မင်္ဂလာတောင်ညွှန့်', 'မင်္ဂလာတောင်ညွှန့်', 12, 1, 'Condo', NULL, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(180, 190, 1, 'ပုဇွန်တောင်', 'ပုဇွန်တောင်', 6, 1, 'Condo', NULL, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(181, 191, 1, 'ပုဇွန်တောင်', 'ပုဇွန်တောင်', 6, 1, 'condo', NULL, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(182, 192, 1, 'ရေ​ေ ကျာ်', 'ရေ​ေ ကျာ်', 6, 1, 'Condo', NULL, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(183, 193, 1, 'မင်္ဂလာတောင်ညွှန့်', 'မင်္ဂလာတောင်ညွှန့်', 12, 1, 'condo', NULL, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(184, 194, 1, 'အလုံ', 'အလုံ', 7, 1, 'Condo', NULL, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(185, 195, 1, 'အလုံ', 'ရန်ကုန်', 7, 1, 'Condo', NULL, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(186, 196, 9, 'တောင်ကလေး', 'တောင်ကလေး', 259, 1, NULL, NULL, '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(187, 197, 9, 'မြဝတီ', 'ကရင်', 263, 1, NULL, NULL, '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(188, 198, 9, 'ကော့ကရိတ်', 'ကော့ကရိတ်', 261, 1, NULL, NULL, '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(189, 199, 9, 'တောင်ကလေး', 'တောင်ကလေး', 259, 1, NULL, NULL, '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(190, 200, 9, 'လှာကမြင်', 'လှာကမြင်', 259, 1, NULL, NULL, '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(217, 227, 2, 'street_name', 'ward', 3, 1, NULL, NULL, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(224, 234, 2, 'street_name', 'ward', 3, 1, NULL, NULL, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(229, 239, 2, 'street_name', 'ward', 3, 1, NULL, NULL, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(232, 242, 1, 'ပြည်ထောင်စုလမ်းမ', 'အနောက်ပိုင်း', 15, 1, NULL, NULL, '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(234, 244, 9, 'Thazin', 'အပိုင်း2', 259, 1, 'ခရမ်းရင့်', NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(235, 245, 9, 'Thazin', 'အပိုင်း2', 259, 1, 'ခရမ်းရင့်', NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(236, 246, 9, 'Thazin', 'အပိုင်း2', 259, 1, 'ခရမ်းရင့်', NULL, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(239, 249, 9, 'မြရတနာ', 'Nk.1', 259, 2, NULL, NULL, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(240, 250, 3, 'သစ္စာလမ်း', 'ရပ်ကွက်ကြီး ၇', 73, 3, NULL, NULL, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(241, 251, 10, 'မြိုင်သာယာ 10 လမ်း', 'မြိုင်သာယာ ရပ်ငွက်', 270, 2, NULL, NULL, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(242, 252, 5, 'သီတာလမ်း', 'No.1', 131, 2, NULL, NULL, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(243, 253, 10, 'ဇီဇဝါလမ်း', 'မုဒုံ', 271, 3, NULL, NULL, '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(244, 254, 9, 'ဝါဆိုဦး ၁ လမ်း', 'No.9', 259, 2, NULL, NULL, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(245, 255, 15, 'စံပယ်', 'ကျေက်စိမ်း', 319, 2, 'ယင်ူမာ', NULL, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(246, 256, 13, 'သဇင်လမ်း', 'No.8', 313, 2, NULL, NULL, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(247, 257, 2, 'စကားဝါလမ်း', 'ရပ်ကွက်ကြီး12', 53, 2, NULL, NULL, '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(248, 258, 1, 'သံသုမာလမ်း', '15 ရပ်ကွက်', 26, 3, NULL, NULL, '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(249, 259, 10, '၃၃ လမ်း', 'No.6', 268, 2, NULL, NULL, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(250, 260, 9, 'တောင်ကြားလမ်း', 'ခလောက်နို့ရွာ', 259, 1, NULL, NULL, '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(252, 262, 9, 'ယုဇနလမ်း', 'No.2', 259, 2, NULL, NULL, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(253, 263, 1, 'ရတနာလမ်းမကြီး', 'တောင်ဥက္ကလာ', 27, 1, NULL, NULL, '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(254, 264, 7, 'မေခလာလမ်း', 'ရန်ကြီးအောင်ရပ်ကွက်', 188, 2, NULL, NULL, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(255, 265, 15, 'စံပယ်လမ်း', 'အမှတ် 5', 323, 2, NULL, NULL, '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(256, 266, 6, 'မြရတနာလမ်း', 'မြို့သစ်ရပ်ကွက်', 164, 2, NULL, NULL, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(257, 267, 1, 'သစ္စာ', '၃', 14, 1, 'Grand city', NULL, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(258, 268, 9, 'လှိုင်းဘွဲ ဘားအံ မိန်းလမ်းမကြီး', 'တောင်ကလေးရွာ', 259, 1, NULL, NULL, '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(259, 269, 1, 'သီရိလမ်း', 'ချောင်းဝ', 22, 2, NULL, NULL, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(260, 270, 1, 'ကမ်းနားလမ်း', 'သန်လျင်', 30, 1, '5B', NULL, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(261, 271, 15, 'ကျောက်ဖြူလမ်း', 'ကျောက်တွင်းကုန်းရပ်ကွက်', 321, 2, NULL, NULL, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(262, 272, 1, 'မေတ္တာညွန့်', 'တာေမွ', 13, 1, '3C', NULL, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(263, 273, 9, 'ခရေလမ်း ဆ', 'ဖားစည်မြေရပ်ကွက်', 258, 2, NULL, NULL, '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(264, 274, 2, 'မြို့ပြင်လမ်း', 'မြို့သစ်ရပ်ကွက်', 50, 2, NULL, NULL, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(265, 275, 12, 'ဒေဝီလမ်း', 'မေခလာ', 300, 2, 'ရွှေပြည်တောင်', NULL, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(266, 276, 8, 'ချယ်ရီလမ်း', 'ချယ်ရီရပ်ကွက်', 197, 2, NULL, NULL, '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(267, 277, 3, '‌သီတာ', 'ရတနာ', 79, 3, 'စိန်ရွှေ', NULL, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(268, 278, 2, 'မေတ္တာ', '၃', 47, 1, 'D3', NULL, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(269, 279, 10, 'ဗညားလမ်း', 'ရှင်စောပုရပ်ကွက်', 268, 2, NULL, NULL, '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(270, 280, 9, 'မဲဘောင်', 'အမှတ်9', 259, 2, 'ရွှေဖားစည်', NULL, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(271, 281, 9, 'ွှေဖားစည်လမ်း', 'ွှေဖားစည်', 259, 1, '​ေ ရွှဖားစည်', NULL, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(272, 282, 9, 'ကြာအင်း', 'အမှတ်9', 259, 1, 'ကြာအင်စ', NULL, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(273, 283, 15, 'ဇေယျာသီရိ', 'ဇေယျာသီရိ', 326, 1, 'A4', NULL, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(274, 284, 1, 'ဗဟန်း', 'ဗဟန်း', 11, 1, '7C', NULL, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(275, 285, 1, 'ကမ်းနားလမ်း', 'သန်လျင်', 30, 1, '5C', NULL, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(276, 286, 2, 'မိုးကုတ်', 'မိုးကုတ်', 57, 1, '​ေ ကျာက်စိမ်း', NULL, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(277, 287, 8, 'ကလော', 'ကလော', 198, 1, 'ကလော', NULL, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(278, 288, 8, 'အင်းလေး', 'အင်းလေး', 197, 1, 'A3', NULL, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(279, 289, 7, 'မေတ္တာ', 'မေတ္တာ', 188, 1, 'Condo', NULL, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(280, 290, 1, 'ဇေယျဝတီ', 'ဗဟိုလမ်းမပေါ်', 3, 2, 'ရှမ်းလမ်းမ', NULL, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(282, 292, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(297, 307, 2, 'မဟာန္ဓုလ', '55/', 50, 1, 'သမိုင်း', NULL, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(299, 309, 9, 'ရှင်စောပု', 'အမှတ်3', 258, 2, '6လွှာ', NULL, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(300, 310, 9, 'ရှင်စောပု', 'အမှတ်3', 258, 2, '6လွှာ', NULL, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(301, 311, 8, 'ချယ်ရီ', 'အပိုင်း2', 202, 3, 'နန်းမြေ', NULL, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(304, 314, 2, 'အနော်ရထား', 'အပိုင်း3', 51, 1, 'မြကန်သာ', NULL, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(305, 315, 1, 'ဉ္းပုည', 'ပန်းလှိုင်', 9, 1, 'ပန်းဘုံ', NULL, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(306, 316, 2, 'စေတနာ', 'မေတ္တာ', 51, 2, 'စေတန်', NULL, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(308, 318, 3, 'ဥတ္တမာ', 'သီရိ', 80, 1, 'ချမ်းသာ', NULL, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(309, 319, 9, 'မြမြင့်မိုရ်', 'အမှတ် ၄', 259, 3, NULL, NULL, '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(310, 320, 11, 'ပတ္တမြားလမ်း', 'No.9', 289, 2, NULL, NULL, '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(311, 321, 4, 'ရတနာလမ်း', 'ရေကျော်ရပ်ကွက်', 105, 1, NULL, NULL, '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(312, 322, 8, 'ပုလဲလမ်း', 'No.1', 204, 2, NULL, NULL, '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(313, 323, 1, 'လှည်းတန်းလမ်း', 'လသာ', 3, 2, NULL, NULL, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(314, 324, 3, 'ဆံတော်တွင်းလမ်းမ', 'No.7', 73, 1, NULL, NULL, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(315, 325, 1, 'လှိုင်သာယာ', 'လှိုင်သာယာ', 23, 1, 'လှိုင်သာယာ', NULL, '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(316, 326, 15, 'သူရိဓမ္မ', 'မြင့်သီတာ', 325, 1, 'ကျောက်ကောင်း', NULL, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(317, 327, 1, 'သခင်ဖိုးလကြီး', '14/1ရပ်ကွက်', 27, 1, 'စွယ်တော်', NULL, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(318, 328, 1, '​ေ ရွှပေါက်ကံ', '​ေ ရွှပေါက်ကံ', 26, 1, '​ေ ရွှပေါက်ကံ', NULL, '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(319, 329, 1, 'လှိုင်သာယာ', 'လှိုင်သာယာ', 23, 1, 'လှိုင်သာယာ', NULL, '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(320, 330, 6, 'ကမ္ဘာအေး', 'ဘုရားလမ်း', 156, 1, 'နယ်သာ', NULL, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(321, 331, 1, 'မင်္ဂလာဒုံ', 'မင်္ဂလာဒုံ', 25, 1, 'မင်္ဂလာဒုံ', NULL, '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(322, 332, 1, 'သစ္စာ', '​ေ ရွှပြည်သာ', 39, 1, '​ေ ရွှပြည်သာ', NULL, '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(323, 333, 1, 'မဘဂုဏ်ရည်', 'အမှတ် ၈၁', 29, 1, 'သာကေတ', NULL, '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(324, 334, 1, 'မင်္ဂလာဒုံ', 'မင်္ဂလာဒုံ', 25, 1, 'မင်္ဂလာဒုံ', NULL, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(325, 335, 1, 'သာ​ေ ကတ', 'သာကေတ', 29, 1, 'သာကေတ', NULL, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(326, 336, 1, 'ဒဂုံ', 'အ​ေ ရှ့ဒဂုံ', 16, 1, 'အ​ေ ရှ့ဒဂုံ', NULL, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(358, 368, 2, 'street', 'ward', 3, 1, NULL, NULL, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` smallint(6) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `phone`, `email`, `role_id`, `password`, `ip`, `user_agent`, `login_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '09259071325', 'administrator@estate.com', 1, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '2021-10-27 07:40:35', NULL, '2021-10-27 07:40:35'),
(2, 'Staff', '09888888888', 'staff@estate.com', 2, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', '2021-10-11 02:13:04', NULL, '2021-10-11 02:13:04'),
(3, 'Editor', '094646464646', 'editor@gmail.com', 3, '$2y$10$.DQP.L5W2msOhXRnABog1eWSbMw9j5HJX2bRTOIxJ2XOnfw.DKBDu', NULL, NULL, NULL, '2021-10-17 03:41:48', '2021-10-17 03:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `agent_users`
--

CREATE TABLE `agent_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_type` smallint(6) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_users`
--

INSERT INTO `agent_users` (`id`, `company_name`, `phone`, `email`, `address`, `description`, `agent_type`, `images`, `cover_photo`, `agent_theme`, `verify_code`, `password`, `ip`, `user_agent`, `login_at`, `created_at`, `updated_at`, `facebook_id`) VALUES
(1, 'Agent Myanmar', '09323232334', 'myanmar@gmail.com', 'ThabinShweHtee', 'ThabinShweHtee', 1, '616b9f36700e0_1634443062.jpg', NULL, NULL, NULL, '$2y$10$bF8ebLcVp2POBujaeYbqSOHSOveNk45f0vF6Gw32Tr9k8nC6R0agK', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '2021-10-22 10:00:30', '2021-09-17 12:52:46', '2021-10-22 10:00:30', NULL),
(2, 'Shwe Agent ', '09323232335', 'shweagent@gmail.com', 'ThabinShweHtee', 'ThabinShweHtee', 1, '615ac77c09eb9_1633339260.jpg', NULL, NULL, NULL, '$2y$10$bF8ebLcVp2POBujaeYbqSOHSOveNk45f0vF6Gw32Tr9k8nC6R0agK', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', '2021-10-08 05:31:37', '2021-09-17 12:52:46', '2021-10-08 05:31:37', NULL),
(3, 'Line Property', '09878787878', 'linepro@gmail.com', 'Hlaing', 'Hliang Agent', 2, '616b9c09257f9_1634442249.jpg', NULL, NULL, NULL, '$2y$10$b79em/X6kIPaT0uUY049M.NN8cmqZ2XRR611Y0XCWk0hhCph8OhIK', NULL, NULL, '2021-10-27 07:40:20', '2021-10-17 03:44:09', '2021-10-27 07:40:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_sizes`
--

CREATE TABLE `area_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `building_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fence_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fence_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_sizes`
--

INSERT INTO `area_sizes` (`id`, `properties_id`, `building_width`, `building_length`, `fence_width`, `fence_length`, `front_area`, `height`, `level`, `measurement`, `area_unit`, `area_size`, `length`, `width`, `area_option`, `created_at`, `updated_at`) VALUES
(12, 14, 'Sunt voluptas accusa', 'Aperiam autem ipsam', 'Molestiae aute venia', 'Nihil omnis et asper', 'Velit sit ut aliqui', NULL, NULL, '1', NULL, NULL, '2332', '1234', '1', '2021-09-19 14:41:28', '2022-06-02 09:14:41'),
(13, 15, '30', '50', '40', '60', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(18, 20, NULL, NULL, '40', '60', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-23 04:49:09', '2021-09-23 04:49:09'),
(19, 21, NULL, NULL, '4', '60', '40', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-23 04:50:44', '2021-09-23 04:50:44'),
(32, 34, '25', '50', NULL, NULL, NULL, NULL, '3', '1', NULL, NULL, NULL, NULL, NULL, '2021-09-24 09:34:56', '2021-09-24 09:34:56'),
(33, 35, '100', '100', NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(34, 36, '40', '50', NULL, NULL, '40', NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, '2021-09-27 09:27:02', '2021-09-27 09:27:02'),
(35, 37, '100', '100', NULL, NULL, '100', NULL, '6', '1', NULL, NULL, NULL, NULL, NULL, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(36, 38, '30', '50', '40', '60', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(37, 39, '30', '50', '40', '60', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 05:32:36', '2021-09-28 05:32:36'),
(38, 40, '100', '100', '100', '200', '100', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(39, 41, '40', '60', NULL, NULL, NULL, NULL, '4', '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(40, 42, '100', '100', NULL, NULL, NULL, NULL, '6', '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:49:27', '2021-09-28 09:49:27'),
(41, 43, '40', '100', '100', '100', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(42, 44, NULL, NULL, '100', '100', '100', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(43, 45, NULL, NULL, '40', '100', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(44, 46, '100', '100', NULL, NULL, NULL, NULL, '3', '2', NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(45, 47, NULL, NULL, 'Voluptatum rem aut d', 'Ipsum iste dolorem e', 'Voluptate distinctio', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(46, 48, '100', '100', '100', '100', '40', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(47, 49, NULL, NULL, '40', '100', '34', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(48, 50, '100', '100', '100', '100', '40', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(49, 51, '100', '100', NULL, NULL, NULL, NULL, '3', '2', NULL, NULL, NULL, NULL, NULL, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(50, 52, '100', '100', NULL, NULL, NULL, NULL, '3', '1', NULL, NULL, NULL, NULL, NULL, '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(70, 80, '12', '3', '12', '3', '12', NULL, NULL, '1', '3', '12', NULL, NULL, '2', '2022-01-31 12:30:13', '2022-08-05 20:00:51'),
(71, 81, '12', '3', NULL, NULL, '12', NULL, '3', '1', NULL, NULL, NULL, NULL, NULL, '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(72, 82, '12', '3', NULL, NULL, '12', NULL, '3', '2', NULL, NULL, NULL, NULL, NULL, '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(73, 83, '12', '3', '12', '3', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(74, 84, '12', '3', '12', '3', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(75, 85, NULL, NULL, '12', '12', '2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(81, 91, '12', '3', '12', '3', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(82, 92, '12', '3', '12', '3', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(83, 93, NULL, NULL, '12', '12', '2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(84, 94, NULL, NULL, '12', '12', '2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(85, 95, '12', '12', '12', '12', '2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(87, 97, '12', '12', NULL, NULL, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(88, 98, '12', '12', '12', '12', '2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(89, 99, NULL, NULL, 'Deleniti velit commo', 'Saepe aut nihil in q', 'Aut laboriosam quia', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(90, 100, NULL, NULL, NULL, NULL, NULL, NULL, '22', NULL, NULL, NULL, '123123', '123123', '1', '2022-05-30 10:09:00', '2022-05-31 08:32:38'),
(91, 103, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, '123', '123', '1', '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(92, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '234', '123', '123', '2', '2022-05-31 07:47:43', '2022-05-31 08:43:29'),
(93, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1232', NULL, NULL, '2', '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(94, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '321321', '123123', '1', '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(95, 107, 'Perspiciatis dignis', 'Quia ipsum in dolor', 'Temporibus aut est a', 'Consequatur tempore', 'Proident illum nat', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(96, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(97, 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(98, 110, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, '233', '234', '1', '2022-06-06 05:15:36', '2022-06-06 07:17:43'),
(99, 111, '12', '3', '12', '3', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(100, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '12', '1', '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(101, 113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '123', NULL, NULL, '2', '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(102, 114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40', '25', '1', '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(103, 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '15', '1', '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(104, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(106, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(107, 119, NULL, NULL, NULL, NULL, NULL, NULL, '8', NULL, '1', '1800', NULL, NULL, '2', '2022-07-19 20:30:55', '2022-07-23 21:44:36'),
(108, 120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '20000', NULL, NULL, '2', '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(109, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(110, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', '50', '1', '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(111, 123, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, '20', '20', '1', '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(112, 124, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, '20', '15', '1', '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(163, 175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '60', '1', '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(164, 176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(165, 177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '340', '80', '1', '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(166, 178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '60', '1', '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(167, 179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', '50', '1', '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(168, 180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(169, 181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(170, 182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(172, 184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(173, 185, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(174, 186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40', '20', '1', '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(175, 187, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(176, 188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(177, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(178, 190, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1650', NULL, NULL, '2', '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(179, 191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(180, 192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(181, 193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(182, 194, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1650', NULL, NULL, '2', '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(183, 195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1750', NULL, NULL, '2', '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(184, 196, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(185, 197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '60', '1', '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(186, 198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(187, 199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(188, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(215, 227, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '1', '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(222, 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '1', '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(227, 239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '1', '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(230, 242, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '20', '1', '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(232, 244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(233, 245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(234, 246, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(237, 249, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '40', '1', '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(238, 250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', '20', '1', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(239, 251, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(240, 252, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '20', '1', '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(241, 253, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '25', '1', '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(242, 254, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '20', '1', '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(243, 255, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '60', '1', '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(244, 256, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(245, 257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70', '40', '1', '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(246, 258, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(247, 259, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '35', '1', '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(248, 260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400', '200', '1', '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(250, 262, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '35', '1', '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(251, 263, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(252, 264, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40', '20', '1', '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(253, 265, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', '60', '1', '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(254, 266, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '40', '1', '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(255, 267, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '986', NULL, NULL, '2', '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(256, 268, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200', '100', '1', '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(257, 269, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '60', '1', '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(258, 270, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1200', NULL, NULL, '2', '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(259, 271, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', '60', '1', '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(260, 272, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(261, 273, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '130', '80', '1', '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(262, 274, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', '50', '1', '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(263, 275, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '65', '1', '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(264, 276, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(265, 277, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(266, 278, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1800', NULL, NULL, '2', '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(267, 279, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(268, 280, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40', '40', '1', '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(269, 281, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(270, 282, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '60', '1', '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(271, 283, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1400', NULL, NULL, '2', '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(272, 284, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(273, 285, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(274, 286, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1500', NULL, NULL, '2', '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(275, 287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(276, 288, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1500', NULL, NULL, '2', '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(277, 289, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1600', NULL, NULL, '2', '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(278, 290, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '15', '1', '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(280, 292, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '12', '1', '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(295, 307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '18', '1', '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(297, 309, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '20', '1', '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(298, 310, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '20', '1', '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(299, 311, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55', '19', '1', '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(302, 314, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', '22', '1', '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(303, 315, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70', '60', '1', '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(304, 316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '30', NULL, NULL, '2', '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(306, 318, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '40', '1', '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(307, 319, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '20', '1', '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(308, 320, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60', '20', '1', '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(309, 321, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '40', '1', '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(310, 322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '93', '30', '1', '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(311, 323, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', '60', '1', '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(312, 324, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', '150', '1', '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(313, 325, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200', '140', '1', '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(314, 326, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '60', NULL, NULL, '2', '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(315, 327, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, '17', '10', '1', '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(316, 328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '240', '200', '1', '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(317, 329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, '2', '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(318, 330, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56', '28', '1', '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(319, 331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2.5', NULL, NULL, '2', '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(320, 332, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1.5', NULL, NULL, '2', '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(321, 333, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, '2', '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(322, 334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '0.5', NULL, NULL, '2', '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(323, 335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1', NULL, NULL, '2', '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(324, 336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', '100', '1', '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(356, 368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '12', '1', '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `building_amenities`
--

CREATE TABLE `building_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `elevator` int(11) NOT NULL DEFAULT 0,
  `garage` int(11) NOT NULL DEFAULT 0,
  `fitness_center` int(11) NOT NULL DEFAULT 0,
  `security` int(11) NOT NULL DEFAULT 0,
  `swimming_pool` int(11) NOT NULL DEFAULT 0,
  `spa_hot_tub` int(11) NOT NULL DEFAULT 0,
  `playground` int(11) NOT NULL DEFAULT 0,
  `garden` int(11) NOT NULL DEFAULT 0,
  `carpark` int(11) NOT NULL DEFAULT 0,
  `own_transformer` int(11) NOT NULL DEFAULT 0,
  `disposal` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_amenities`
--

INSERT INTO `building_amenities` (`id`, `properties_id`, `elevator`, `garage`, `fitness_center`, `security`, `swimming_pool`, `spa_hot_tub`, `playground`, `garden`, `carpark`, `own_transformer`, `disposal`, `created_at`, `updated_at`) VALUES
(13, 34, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:34:56', '2021-09-26 09:58:50'),
(14, 35, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(15, 36, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-27 09:27:02', '2021-09-27 11:29:06'),
(16, 37, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(17, 41, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:21:29', '2021-09-28 09:27:22'),
(18, 42, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:49:27', '2021-09-28 09:59:45'),
(19, 46, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(20, 51, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(21, 52, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 0, '2021-11-05 04:45:41', '2021-11-05 04:45:41'),
(22, 81, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(23, 82, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-02-01 08:21:40', '2022-02-01 08:22:59'),
(24, 97, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(25, 100, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(26, 103, 0, 0, 1, 0, 1, 1, 0, 1, 0, 1, 1, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(27, 110, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(28, 116, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(30, 119, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(31, 120, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(32, 123, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, '2022-07-19 20:56:31', '2022-07-23 17:10:31'),
(33, 124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(34, 186, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(35, 187, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(36, 188, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(37, 189, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(38, 190, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(39, 191, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(40, 192, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(41, 193, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(42, 194, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(43, 195, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(45, 244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(46, 245, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(47, 246, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(50, 255, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(51, 267, 1, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(52, 270, 1, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(53, 272, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(54, 275, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(55, 277, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(56, 278, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(57, 280, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(58, 281, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(59, 282, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(60, 283, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(61, 284, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(62, 285, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(63, 286, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(64, 287, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(65, 288, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(66, 289, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(67, 290, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(68, 307, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(70, 309, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(71, 310, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(72, 311, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(75, 314, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(76, 315, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(77, 316, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(79, 318, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(80, 326, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(81, 327, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(82, 330, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, '2022-08-05 14:53:15', '2022-08-05 14:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `developer_users`
--

CREATE TABLE `developer_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developer_users`
--

INSERT INTO `developer_users` (`id`, `company_name`, `phone`, `email`, `images`, `address`, `description`, `theme`, `verify_code`, `password`, `ip`, `user_agent`, `login_at`, `created_at`, `updated_at`) VALUES
(1, 'Developers', '09454545454', 'developer@gmail.com', '6163d3d3158cd_1633932243.png', 'Addres', 'Addres', NULL, NULL, '$2y$10$bF8ebLcVp2POBujaeYbqSOHSOveNk45f0vF6Gw32Tr9k8nC6R0agK', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '2021-10-27 01:50:42', NULL, '2021-10-27 01:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `following_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `following_id`, `created_at`, `updated_at`) VALUES
(2, 1, 6, '2022-01-20 07:13:04', '2022-01-20 07:13:04'),
(3, 1, 8, '2022-01-20 07:13:09', '2022-01-20 07:13:09'),
(8, 1, 9, '2022-01-23 05:04:05', '2022-01-23 05:04:05'),
(10, 4, 3, '2022-08-13 14:04:52', '2022-08-13 14:04:52'),
(21, 4, 34, '2022-08-13 14:52:33', '2022-08-13 14:52:33'),
(22, 4, 36, '2022-08-13 14:52:33', '2022-08-13 14:52:33'),
(26, 4, 11, '2022-08-13 15:16:36', '2022-08-13 15:16:36'),
(28, 4, 32, '2022-08-13 19:06:14', '2022-08-13 19:06:14'),
(29, 4, 6, '2022-08-13 19:16:55', '2022-08-13 19:16:55'),
(31, 62, 1, '2022-08-14 20:37:47', '2022-08-14 20:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `lot_features`
--

CREATE TABLE `lot_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `cornet_lot` int(11) NOT NULL DEFAULT 0,
  `garden` int(11) NOT NULL DEFAULT 0,
  `lake` int(11) NOT NULL DEFAULT 0,
  `mountain` int(11) NOT NULL DEFAULT 0,
  `river` int(11) NOT NULL DEFAULT 0,
  `pool` int(11) NOT NULL DEFAULT 0,
  `sea` int(11) NOT NULL DEFAULT 0,
  `city` int(11) NOT NULL DEFAULT 0,
  `pagoda` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lot_features`
--

INSERT INTO `lot_features` (`id`, `properties_id`, `cornet_lot`, `garden`, `lake`, `mountain`, `river`, `pool`, `sea`, `city`, `pagoda`, `created_at`, `updated_at`) VALUES
(1, 34, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:34:56', '2021-09-26 10:04:42'),
(2, 35, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:57:20', '2021-11-05 08:27:00'),
(3, 41, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:21:29', '2021-09-28 09:27:22'),
(4, 42, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:49:27', '2021-09-28 09:59:45'),
(5, 46, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(6, 51, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(7, 52, 1, 0, 0, 1, 0, 0, 1, 0, 0, '2021-11-05 04:45:41', '2021-11-05 04:45:41'),
(8, 97, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(9, 100, 1, 1, 0, 0, 0, 1, 0, 1, 0, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(10, 103, 0, 0, 0, 1, 0, 1, 1, 1, 0, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(11, 110, 0, 1, 0, 0, 1, 0, 1, 1, 1, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(12, 116, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(14, 119, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-19 20:30:55', '2022-07-23 21:55:16'),
(15, 120, 0, 1, 0, 0, 0, 0, 0, 1, 1, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(16, 186, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(17, 187, 0, 1, 0, 0, 1, 0, 0, 0, 1, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(18, 188, 0, 1, 0, 0, 1, 0, 0, 0, 1, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(19, 189, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(20, 190, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(21, 191, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(22, 192, 0, 1, 0, 0, 1, 0, 0, 0, 0, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(23, 193, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(24, 194, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(25, 195, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(27, 244, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(28, 245, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(29, 246, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(32, 255, 0, 0, 0, 1, 0, 1, 0, 0, 0, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(33, 267, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(34, 270, 0, 1, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(35, 272, 0, 1, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(36, 275, 1, 0, 0, 1, 0, 0, 0, 0, 1, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(37, 277, 1, 0, 1, 1, 1, 0, 0, 0, 0, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(38, 278, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(39, 280, 0, 1, 0, 0, 1, 0, 0, 1, 0, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(40, 281, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(41, 282, 1, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(42, 283, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(43, 284, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(44, 285, 0, 1, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(45, 286, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(46, 287, 0, 0, 0, 1, 0, 0, 0, 1, 0, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(47, 288, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(48, 289, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(49, 290, 1, 0, 0, 0, 0, 1, 1, 1, 0, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(50, 307, 0, 0, 0, 1, 1, 1, 0, 0, 0, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(52, 309, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(53, 310, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(54, 311, 1, 1, 0, 1, 1, 0, 1, 0, 0, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(57, 314, 0, 0, 0, 0, 1, 0, 0, 1, 1, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(58, 315, 1, 0, 0, 0, 0, 1, 1, 0, 0, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(59, 316, 0, 0, 0, 0, 1, 1, 0, 1, 1, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(61, 318, 0, 1, 0, 0, 1, 0, 1, 1, 0, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(62, 326, 0, 1, 0, 1, 1, 1, 1, 0, 0, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(63, 330, 0, 1, 1, 0, 0, 0, 0, 0, 1, '2022-08-05 14:53:15', '2022-08-05 14:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_07_054111_create_admin_user_table', 1),
(5, '2021_09_07_055413_create_roles_table', 1),
(6, '2021_09_09_152223_create_agent_users_table', 1),
(7, '2021_09_10_095213_create_properties_table', 1),
(11, '2021_09_10_131327_create_prices_table', 1),
(12, '2021_09_10_132109_create_suppliments_table', 1),
(13, '2021_09_10_141235_create_partations_table', 1),
(16, '2021_09_14_151747_create_region_township_tables', 2),
(17, '2021_09_15_094138_create_rent_prices_table', 3),
(20, '2021_09_10_130906_create_area_sizes_table', 5),
(21, '2021_09_10_144051_create_payments_table', 6),
(22, '2021_09_10_142020_create_situations_table', 7),
(23, '2021_09_16_171458_create_unit_amenities_table', 8),
(24, '2021_09_10_125844_create_property_images_table', 9),
(25, '2021_09_19_110321_add_category_to_properties_table', 10),
(26, '2021_09_10_130250_create_addresses_table', 11),
(28, '2021_09_23_111614_add_fence_condition_to_situation', 12),
(29, '2021_09_23_125831_add_building_name_and_apartmentcondo_type_to_addresses', 13),
(30, '2021_09_24_132304_create_building_amenities_table', 14),
(31, '2021_09_24_132831_create_lot_features_table', 15),
(32, '2021_09_26_173621_add_land_type_to_situations', 16),
(34, '2021_09_27_111641_add_shop_to_situations', 17),
(35, '2021_09_28_110709_add_industrial_type_to_situations', 18),
(36, '2021_10_04_125649_add_image_to_agent_users', 19),
(42, '2021_10_07_102921_create_want_to_buy_rents_table', 20),
(43, '2021_10_07_104645_create_news_table', 20),
(46, '2021_10_11_103650_create_developer_users_table', 21),
(47, '2021_10_11_114146_add_developer_id_to_properties', 21),
(49, '2021_10_12_151002_create_new_projects_table', 22),
(50, '2021_10_22_170631_add_cover_photo_to_agent_users', 23),
(51, '2021_10_28_161330_add_facebook_id_to_agent_users_table', 24),
(52, '2014_10_12_000000_create_users_table', 25),
(53, '2021_11_01_160000_add_field_to_users_table', 26),
(55, '2021_11_02_161617_add_agent_type_users_table', 27),
(56, '2021_11_12_170335_change_developer_id_to_user_id_buy_rent_table', 28),
(57, '2016_06_01_000001_create_oauth_auth_codes_table', 29),
(58, '2016_06_01_000002_create_oauth_access_tokens_table', 29),
(59, '2016_06_01_000003_create_oauth_refresh_tokens_table', 29),
(60, '2016_06_01_000004_create_oauth_clients_table', 29),
(61, '2016_06_01_000005_create_oauth_personal_access_clients_table', 29),
(63, '2021_11_30_161137_add_google_id_to_users_table', 30),
(64, '2021_12_28_113440_create_wish_lists_table', 31),
(65, '2022_01_07_171158_add_apple_id_to_users_table', 32),
(66, '2022_01_20_130628_create_follows_table', 33),
(67, '2022_01_23_115322_create_sliders_table', 34),
(68, '2022_01_29_121853_add_images_to_new_projects_table', 35),
(69, '2022_03_22_101603_add_title_to_properties', 36),
(70, '2022_04_18_154000_add_region_and_township_to_users', 37),
(75, '2022_05_04_164006_add_company_photos_to_users_table', 38),
(76, '2022_05_25_143015_add_other_phones_to_users_table', 38),
(78, '2022_05_26_142744_add_hot_feature_to_propterties_table', 39),
(86, '2022_06_03_143205_add_recommended_to_properties_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_by` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_letter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_title`, `post_by`, `view_count`, `category`, `images`, `post_letter`, `created_at`, `updated_at`) VALUES
(1, 'Todays', 18, 32, 1, '61ee389a46970_1643002010.jpg', 'Loren Ipsum lo Loren Ipsum loLoren Ipsum loLoren Ipsum loLoren Ipsum lo', '2021-10-15 09:43:41', '2022-06-17 19:22:39'),
(2, 'ThaDinGyut', 18, 16, 2, '61ee543d34cb4_1643009085.jpg', 'Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', '2021-11-05 05:01:29', '2022-06-19 16:10:06'),
(3, 'Sample News 1', 18, NULL, 1, '61ee50000179b_1643008000.jpg', 'Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Donec rutrum congue leo eget malesuada.', '2021-11-05 05:16:47', '2022-01-24 07:06:40'),
(4, 'ThaDinGyut', 18, NULL, 2, '61ee50afb0a69_1643008175.jpg', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.', '2022-01-24 07:09:35', '2022-01-24 07:09:35'),
(5, 'Debitis consequat V', 1, 2, 1, '629dac6380071_1654500451.png', 'Voluptatem voluptatu', '2022-06-06 07:27:31', '2022-06-20 00:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `new_projects`
--

CREATE TABLE `new_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `townsandvillages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_unit` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT NULL,
  `max_price` int(11) DEFAULT NULL,
  `purchase_type` int(11) DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `new_project_sale_type` int(11) DEFAULT NULL,
  `preparation` int(11) DEFAULT NULL,
  `project_start_at` timestamp NULL DEFAULT NULL,
  `project_end_at` timestamp NULL DEFAULT NULL,
  `about_project` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevator` int(11) NOT NULL DEFAULT 0,
  `garage` int(11) NOT NULL DEFAULT 0,
  `fitness_center` int(11) NOT NULL DEFAULT 0,
  `security` int(11) NOT NULL DEFAULT 0,
  `swimming_pool` int(11) NOT NULL DEFAULT 0,
  `spa_hot_tub` int(11) NOT NULL DEFAULT 0,
  `playground` int(11) NOT NULL DEFAULT 0,
  `garden` int(11) NOT NULL DEFAULT 0,
  `carpark` int(11) NOT NULL DEFAULT 0,
  `own_transformer` int(11) NOT NULL DEFAULT 0,
  `disposal` int(11) NOT NULL DEFAULT 0,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_projects`
--

INSERT INTO `new_projects` (`id`, `user_id`, `region`, `township`, `townsandvillages`, `wards`, `street_name`, `type_of_street`, `currency_code`, `area_unit`, `min_price`, `max_price`, `purchase_type`, `installment`, `new_project_sale_type`, `preparation`, `project_start_at`, `project_end_at`, `about_project`, `elevator`, `garage`, `fitness_center`, `security`, `swimming_pool`, `spa_hot_tub`, `playground`, `garden`, `carpark`, `own_transformer`, `disposal`, `images`, `created_at`, `updated_at`) VALUES
(1, 18, '10', '266', 'Et voluptatem sed t', 'Illum officia quis', 'Ethan Morris', '2', 'us', 2, 435, 178, 3, 0, 5, 1, '2022-02-01 03:32:59', '2025-02-01 03:32:59', 'Consectetur cum sol', 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, '[\"61f8a9eb7c2dd_1643686379.jpg\"]', '2022-02-01 03:32:59', '2022-02-01 03:32:59'),
(2, 18, '8', '199', 'Qui at et totam volu', 'wardsss', 'Sed asperiores quibu', '1Oren Peterson', 'mmk', 2, 200, 300, 1, 0, 1, 1, '2022-06-08 08:35:21', '2024-06-08 08:35:21', 'Special Project Real', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, '[\"629dc0640b801_1654505572.jpg\",\"62a05ebc5c295_1654677180.png\",\"62a05f49cf189_1654677321.png\",\"62a05f49cfc5c_1654677321.png\"]', '2022-02-03 07:45:59', '2022-06-08 08:35:21'),
(3, 1, '13', '303', 'Voluptas voluptas fa', 'Sint eum omnis temp', 'Kimberly Mccarthy', '1', 'mmk', 1, 265, 762, 1, 0, 2, 2, '2029-06-06 07:29:30', '2031-06-06 07:29:30', 'Non sequi in elit s', 1, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, '[\"629dacdaad1e4_1654500570.jpg\",\"629dacdaaddcb_1654500570.jpg\"]', '2022-06-06 07:29:30', '2022-06-06 07:29:30'),
(4, 4, '8', '199', 'Veniam accusamus ma', 'Rerum vel harum solu', 'Rhona Townsend', '3', 'mmk', 1, 485, 68, 1, 0, 3, 1, '2031-06-06 09:16:32', '2033-06-06 09:16:32', 'Officiis nihil ad im', 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, '[\"629dc5f0170f1_1654506992.gif\",\"629dc5df32639_1654506975.jpg\"]', '2022-06-06 08:49:35', '2022-06-06 09:16:32'),
(5, 4, '12', '297', 'Distinctio Quaerat', 'Recusandae Suscipit', 'Wyatt Thompson', '3', 'mmk', 1, 246, 205, 2, 0, 7, 3, '2025-06-06 08:52:52', '2029-06-06 08:52:52', 'Earum ex sunt dolore', 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, '[\"629dc0640b801_1654505572.jpg\"]', '2022-06-06 08:49:44', '2022-06-06 08:52:52'),
(6, 4, '8', '200', 'Nam enim autem eveni', 'Voluptas aliquam eli', 'Abdul Joyner', '2', 'sg', 2, 86, 545, 2, 0, 5, 2, '2025-06-06 09:37:08', '2033-06-06 09:37:08', 'Reprehenderit non c', 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, '[\"629dcac4a8a8a_1654508228.png\",\"629dcab8cce88_1654508216.jpg\"]', '2022-06-06 09:04:03', '2022-06-06 09:37:08'),
(7, 4, '1', '34', '2', '1', 'street', '1', 'mmk', 2, 200, 300, 1, 0, 1, 1, '2022-06-06 09:57:33', '2024-06-06 09:57:33', 'Special Project', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"629dcf8d23d09_1654509453.jpg\",\"629dcf8d24317_1654509453.jpg\",\"629dcf8d244e9_1654509453.jpg\"]', '2022-06-06 09:51:43', '2022-06-06 09:57:33'),
(8, 4, '1', '34', '2', '1', 'street', '1', 'mmk', 2, 200, 300, 1, 0, 1, 1, '2022-06-06 10:01:44', '2024-06-06 10:01:44', 'Special Project', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"629dd08853850_1654509704.jpg\"]', '2022-06-06 09:58:04', '2022-06-06 10:01:44'),
(9, 4, '1', '34', '2', '1', 'street', '1', 'mmk', 2, 200, 300, 1, 0, 1, 1, '2022-06-06 10:01:12', '2024-06-06 10:01:12', 'Special Project', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"629dd068edf39_1654509672.png\",\"629dd068ee9a3_1654509672.png\"]', '2022-06-06 10:01:12', '2022-06-06 10:01:12'),
(10, 10, '13', '304', 'Corrupti velit cons', 'Elit labore atque n', 'Rigel Sims', '1', 'sg', 2, 152, 50, 2, 0, 5, 3, '2030-06-10 02:27:42', '2035-06-10 02:27:42', 'Sit sequi id quis pa', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, '[\"62a2ac1ed88da_1654828062.png\"]', '2022-06-10 02:27:42', '2022-06-10 02:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('000ba5606e2f7c61af68eab55c3cffd2c9806fd082981d03b0102a85a9fff23f6e72f8f94fe46ad2', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:28:32', '2022-08-08 01:28:32', '2023-08-07 21:28:32'),
('00be6004c3f3ad226d6db074afa6afa863bfe311d13dc853f4b1c2b01fcc911de7ec0f1dee718bb9', 4, 5, 'Real Estate', '[]', 0, '2022-08-09 01:57:42', '2022-08-09 01:57:42', '2023-08-08 21:57:42'),
('02f2f02b97919a917bbcc2aa77f643fe46861d71b275ca13d201c3d2f168cf4d69b04ab43f1e589e', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:48:38', '2022-08-05 19:48:38', '2023-08-05 15:48:38'),
('040c70e1e5b0eb87ffb3d1b5d4f2f37aa544f58f81d3431193d857657066ff1303dcbea8cf2c9168', 26, 3, 'Real Estate', '[]', 0, '2022-03-22 03:31:03', '2022-03-22 03:31:03', '2023-03-22 10:01:03'),
('046182d8d0bcd700f7fefce72cbdf9d12921d1b86a7f6bd9cd4a81ef84c782d7575d8b5d6ae086cd', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 02:59:56', '2022-08-07 02:59:56', '2023-08-06 22:59:56'),
('057ed00688e14b9c796ed5b2935c6eb6cf57d88a5ac08d8e2cb6cadfd093d2bb0f7d01a42e070fd1', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 15:44:49', '2022-08-11 15:44:49', '2023-08-11 11:44:49'),
('063b7c359b43f3602da6b53ce2fece59cff5b0735ad88b75e4c7c7a4125b46083b24776b1a75478d', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 12:52:13', '2022-07-29 12:52:13', '2023-07-29 08:52:13'),
('064e098ef8f35b00a4c4fd0d1202f57724cd7c7a44f5e87345f6d63db9595e753deaab01b1fc30bd', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 21:49:17', '2022-07-23 21:49:17', '2023-07-23 17:49:17'),
('08bc6c67b0c9ed0cb79f0b9f7f92fce9e16bfc9690c233985eb22d3b9ce17fddd864f4587515800b', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 20:56:02', '2022-08-08 20:56:02', '2023-08-08 16:56:02'),
('093ca174dd91fc4b8573064025652b859261f7aec44088c4f44d20492072226cb00d38974a890625', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 02:19:19', '2022-07-22 02:19:19', '2023-07-21 22:19:19'),
('09813fbc6b740ea4f5695ff57e6224732a46fbdd127ecabb9894f12555a3b6e541d4c5d36c7d7e90', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:47:29', '2022-08-05 19:47:29', '2023-08-05 15:47:29'),
('09c59172d4a80d501b3af0e4dedf181eedabc2d275808d4a59a6d62df803fc2593d009cdee70175c', 4, 5, 'Real Estate', '[]', 0, '2022-08-09 17:42:16', '2022-08-09 17:42:16', '2023-08-09 13:42:16'),
('09ca825ddb7169a663f94138036e171139ded55256ddce7a03af055ab03fab8a7649b672b7d7c0de', 23, 3, 'Real Estate', '[]', 0, '2022-02-15 03:28:33', '2022-02-15 03:28:33', '2023-02-15 09:58:33'),
('0aa52961cf7e04b0bc3850d41510a1799bb368bf25090097c15c3f2dc603ff8d2bc19d2592d8e6e4', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:24:38', '2022-03-17 02:24:38', '2023-03-17 08:54:38'),
('0b121c1d16b5360edf78156144c4b9c71aa58602b1394682db3867e9017dc2bd1e731705f49a790b', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 17:15:25', '2022-07-19 17:15:25', '2023-07-19 13:15:25'),
('0c4448eeb8510d3924e7704e4d1aa4aa980de90bcbc1458b58d7054c01e32e889963aff110783683', 26, 3, 'Real Estate', '[]', 0, '2022-03-22 09:09:06', '2022-03-22 09:09:06', '2023-03-22 15:39:06'),
('0ccf5f1df57b44a98dbc4e333fa2bb3c56e40b504f01df7b193f15bc9be7c8dafb756aab3eace272', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 22:01:32', '2022-07-22 22:01:32', '2023-07-22 18:01:32'),
('0d21ca5c6572c2e30aa6bfb0c61eabd3e3e614d6583b1c470746fe0fdce1d329d071f101752b2bd0', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:51:37', '2022-08-04 23:51:37', '2023-08-04 19:51:37'),
('0e296c54771c0dc067588a1b64aaa14ca33af7072a2ea4ed1f0cb917288c26392457e2313f703f26', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:58:23', '2022-07-30 14:58:23', '2023-07-30 10:58:23'),
('0f181133686229bf4bfad36882753aa9feb384a4d432d293763c9cd923a69a4a1b4cab586272af66', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 00:07:16', '2022-07-29 00:07:16', '2023-07-28 20:07:16'),
('0f3ff69eaa6e42d4d7891293aa76362422b177970405633b3f59f3f6c9d8e30492bb5e8e6554c4e4', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:00:23', '2022-08-07 03:00:23', '2023-08-06 23:00:23'),
('0f8d57856b1f14b3844ad05480838be16d1924fb6c8fc786232cb19cbbf5ade59ee2b5da7b4c49ff', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 13:53:39', '2022-08-13 13:53:39', '2023-08-13 09:53:39'),
('0fae4ab62fbe378aff9ff42ff1816ceaf15e75a264ee6d5851986c462d60edb6df9de984c5ca10d3', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:30:54', '2022-07-19 14:30:54', '2023-07-19 10:30:54'),
('0fd5f3aaec5028b6bd5f05ffc6ebfc5c7b3145496c353b4ab0ee65fefbb9f8dd61438c735ab74126', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 11:03:42', '2021-11-23 11:03:42', '2022-11-23 17:33:42'),
('0ff012a8693d91cf289a8fe56897d8d23028460aa79eb599b526bb999e4e9cac0b20f7c88814a770', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:17:04', '2021-11-23 06:17:04', '2022-11-23 12:47:04'),
('10460015251770d7a09d7a8d21f8c802b25982575b71fd98b8305bece6510b0b25ba96a464a14449', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 03:20:10', '2022-07-22 03:20:10', '2023-07-21 23:20:10'),
('108408d35787a5dd7e6e3b7ba2bfd5f5e3b16588135c043a5557d7f19630dfafce95d1dd359022c9', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:58', '2022-07-28 02:01:58', '2023-07-27 22:01:58'),
('1085a430bbdd0e72803e23c837b809a9577f9abf8dc04a80c2e15af980c196fc61f3e18668a9f29f', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:19:55', '2022-08-03 03:19:55', '2023-08-02 23:19:55'),
('129b8777cc6ad28b94af54f9d1e5d2b8263a8cad9c8898ef95abf518ee6220abbbda8333825b7b0d', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 15:44:27', '2022-08-12 15:44:27', '2023-08-12 11:44:27'),
('12f1cf18fc064e7e196f498c0642fd8a70cda51fb684a325599eed74cb3b69b94cda0deca63413a0', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:27:51', '2022-08-12 21:27:51', '2023-08-12 17:27:51'),
('1319a6501f74735727f19846249c1ddb32e81b510e2f59814305d94a9dde6f4e9ee26633ec708850', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:47:40', '2022-08-05 19:47:40', '2023-08-05 15:47:40'),
('1351e2d32560508fb26a89521011701c7c30b32800f687874dace21812d318fc9825a268a7e1d47c', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:03:44', '2022-08-12 17:03:44', '2023-08-12 13:03:44'),
('1452505c4c610def567083a855870067ece6c18d54783bd95c71909fd06c5941b121db11955cc00e', 4, 5, 'Real Estate', '[]', 0, '2022-07-21 22:15:17', '2022-07-21 22:15:17', '2023-07-21 18:15:17'),
('1505a269d188ec0d5cf3669eabca4436635dbef84d7a93a4222b5f3f2e44b05fd3d00b2842b6d8f5', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:10:15', '2022-08-12 17:10:15', '2023-08-12 13:10:15'),
('1566301e950570a01daa5fa39fd02e211e1aeea1c9f34026fdf9ed576e1f0880ebe5daae6f6a55f5', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:34:11', '2022-07-19 14:34:11', '2023-07-19 10:34:11'),
('156ce8cfb2d20b49f72b79be4997ee184ea3e15f283ce5747dba063f97390bc8a8ca6b5f29903b9b', 4, 5, 'Real Estate', '[]', 0, '2022-07-20 01:32:06', '2022-07-20 01:32:06', '2023-07-19 21:32:06'),
('15dbc31d14bc78cafe6d194c42c6b991f8ca24143cacfb3cdfaca8458cd2f8b1754ec1f0735d87dd', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 16:41:13', '2022-08-11 16:41:13', '2023-08-11 12:41:13'),
('160debc832d17a56c40f3eee6276fd9f91f42a378380117c0970eee22100aed2918e718f283d7e05', 4, 5, 'Real Estate', '[]', 0, '2022-07-20 21:24:01', '2022-07-20 21:24:01', '2023-07-20 17:24:01'),
('1959c10c08665aa2bb3738e53aef7c9edea31d1939b16971315011e50387958a6a81c9d14d577560', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:39:51', '2022-08-05 20:39:51', '2023-08-05 16:39:51'),
('19d3a727ce4a48b7d48ac9578ba550841e7919eb4737bc22ae96bb7a9627500af9c9335afb7576a8', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 18:24:12', '2022-08-12 18:24:12', '2023-08-12 14:24:12'),
('1a11c3d302be797a305a8c6c887829b51d6ab080c2ad7a8783425d29b28a7bdd64fca8b45f90362a', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 20:28:05', '2022-08-07 20:28:05', '2023-08-07 16:28:05'),
('1a1938c68848a9cc8ca5906f891358011635f201399f6a4ba93c4bcdff13c4e31a65c36fc6a2fbaf', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:58', '2022-07-28 02:01:58', '2023-07-27 22:01:58'),
('1aa46e9770af723559eab2787d62e633a260c6a57e3d8510bfb1c6643b917fb094587cbd1b08e607', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:58:15', '2022-08-12 16:58:15', '2023-08-12 12:58:15'),
('1c14eae634dcebe84cac9a2e02c8b8d930c03db403c9ce8c6bd13032fd919e6d88282be64604a8a1', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:43:35', '2022-07-22 01:43:35', '2023-07-21 21:43:35'),
('1d12eacd453dfde1f69d50976efdd3cd15e0ff3c150fdedea752b6ebc14808b1dd667f0db783ab75', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:37:04', '2022-07-30 15:37:04', '2023-07-30 11:37:04'),
('1dbae1165c5eee6fb0d3e96e536c45ce6a0f90b4505b69f56c4da664dba9ee365aebf7822e2be43a', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 20:36:40', '2022-08-08 20:36:40', '2023-08-08 16:36:40'),
('1e437a95c2159b414b176b493838aa3a6b2d9ff851adeba5d47ca10e2a2f8f9c4e3c25f1babfb2a1', 63, 5, 'Real Estate', '[]', 0, '2022-08-15 18:27:56', '2022-08-15 18:27:56', '2023-08-15 14:27:56'),
('1edda28f02c2ee6ef4f00602975214264bc89fa1c9637096a8435138fdd7c3b67c1b13a600dadd42', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:29:35', '2022-08-12 21:29:35', '2023-08-12 17:29:35'),
('1f54cc4957b4853391f754008d013f898398466325791d149489cff565fc2862c6c76171792100e3', 18, 3, 'Real Estate', '[]', 0, '2022-02-03 02:50:02', '2022-02-03 02:50:02', '2023-02-03 09:20:02'),
('1f72f0b483ed3c7af3f8c32c1c68520c4202ff85c5e270b7ff9d0a44e8f73f536fd64fc43e50efc8', 11, 3, 'Real Estate', '[]', 0, '2021-11-23 11:37:00', '2021-11-23 11:37:00', '2022-11-23 18:07:00'),
('1feb22b777712f4a3ec8f9e53dde8771fdbb281400726b8d1af876535ffc3c6a7ae71a1c1a1d3859', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:35:06', '2022-07-30 15:35:06', '2023-07-30 11:35:06'),
('1feeba1d59b022308d991eec7d22efe648a9f1602adcf31c330eb8b8a93408e1a8edc861f242946b', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 03:49:29', '2022-08-05 03:49:29', '2023-08-04 23:49:29'),
('20486092a2bcc4076c68bd6cfdcb90589a39b1ba7e28f1f259bccb13d2aa33745c79f59317a3bc3f', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:13:10', '2022-07-30 15:13:10', '2023-07-30 11:13:10'),
('204968920c5d6c3f742c925b834b8019904a74666333b552d1679f29ac29c45221c9e65ab93f6c23', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:12:42', '2022-08-08 01:12:42', '2023-08-07 21:12:42'),
('207437040dbc0be909fc7045bc191df9b88da2117420d88d196beb3dbd65fca9d1cab0bf08ec99e7', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:48:47', '2022-08-05 19:48:47', '2023-08-05 15:48:47'),
('209dc0665338f7f574a1848765344732079bac7c668d048d99f6eca960a18bdc4e23087b432f6bee', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 22:00:34', '2022-07-22 22:00:34', '2023-07-22 18:00:34'),
('2121f70e2499ff7a56026c7cd11a839d4f156c114116474bb6bbe13e6a6db1e491cb8e03d5be6f6e', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 21:13:39', '2022-07-23 21:13:39', '2023-07-23 17:13:39'),
('21c40f31a61070484aa6fcf05a214d05d5c7e074e55d7105c2789686bb8aeb2c768c730a0ed8dabb', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 18:56:05', '2022-07-23 18:56:05', '2023-07-23 14:56:05'),
('223f9caa8e65c39b7fb95032c3c3eeba07c4f8bf48eabd55136c5d6cdc242001a39ed74f809015b7', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:33:59', '2022-07-30 14:33:59', '2023-07-30 10:33:59'),
('225159d988d0a4d4d1c342d5eaaab4d85ab60890902dc1f82c21c1650eecb5ca9b5dc45fb89042f8', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 18:51:37', '2022-07-23 18:51:37', '2023-07-23 14:51:37'),
('22af9194412a437d9763ccef826ef303a159daa72179d9449ffa46f0335bfeb11812533c4ab75c67', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:35:24', '2022-08-12 21:35:24', '2023-08-12 17:35:24'),
('22d928e17b4e24418c11a0f3d230e2313811765e150c3f56a7b09112e0bcabfaa34f9b7cbb5e5d83', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:58:42', '2022-07-30 13:58:42', '2023-07-30 09:58:42'),
('22d9a481e6c189aa61a3cd447a23cc2a68cacbfccf293b6a7a4865305e3193985ee1be6e2afc16e3', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:54:13', '2022-07-23 20:54:13', '2023-07-23 16:54:13'),
('233ad6518f19440d35034d6b529184f320084361267c0c3d0ad50d432b68636296b1a3067e774c1c', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:00:11', '2022-07-29 03:00:11', '2023-07-28 23:00:11'),
('2392c045583fb7cc2f6ef87b9a031f0bda0b92cd39179ee7fe9e85da3a061bafff8fb4e44b72891e', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 01:29:59', '2022-08-12 01:29:59', '2023-08-11 21:29:59'),
('239d0d95cd11630e6756909c563ca9a602ed52731c8cd30a6b5f8a68a8be131eef52cd5bbb315193', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 00:43:50', '2022-08-03 00:43:50', '2023-08-02 20:43:50'),
('24a163af51fee90478621626573073e0f62db64b4a845f2bddac3aa313d81472a5705a7a892cdb34', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:09:02', '2022-08-12 17:09:02', '2023-08-12 13:09:02'),
('2591433103f6ce2cfce522a09cebe9204991a4a001c784e544cd021ec91cfc6c3f52b172b57d50c4', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:22:16', '2022-08-05 20:22:16', '2023-08-05 16:22:16'),
('25f9cc1c0b28e27b73af2fbbe75df4d9f9b8386b3e8dc7b7df03c06c189916363b7259845b3e1daf', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 20:01:58', '2022-08-11 20:01:58', '2023-08-11 16:01:58'),
('2620a3cbdab3805aaa4def3c334be7930ca6c0cccd168e76bc1675a65fbd86eec7e3239a2a2c0596', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:08:15', '2022-08-12 17:08:15', '2023-08-12 13:08:15'),
('26dc06dc833e35ee7b83b3a488bc6d866eaafec5ce5e7989acdcb14e45527829a3863e5962ef618a', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 23:50:32', '2022-07-28 23:50:32', '2023-07-28 19:50:32'),
('27525c51956c8d75d7d5dd43aa06098dbbc588fae6312bbb2732e84cb3f7d0791a9471faa5436834', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:43:26', '2022-08-12 16:43:26', '2023-08-12 12:43:26'),
('2807d6ab0b290483b3b68dc8dcebd1e31fd62fa2f1e22d0b89c1187e96c6159bd1fbe10c32e9338c', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:56:31', '2022-07-30 14:56:31', '2023-07-30 10:56:31'),
('28dbbc8aeb9b3e52a25e7b6de9166b79bbe1b27d97163ffd8d3ae34c29c47b3bf83143477bb19ce4', 1, 3, 'Real Estate', '[]', 0, '2021-12-01 05:11:28', '2021-12-01 05:11:28', '2022-12-01 11:41:28'),
('28dee94a0530ea7b0dfe29066e21957fddcefa92e85edf6cfa07c6b07d4c8310e91c4e8bee63b09b', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:23:15', '2022-08-12 17:23:15', '2023-08-12 13:23:15'),
('29323a70fd4907320b7790b3e84cb94f70799c5becc2e4bae615b2971a8def6a9f86cfc288e3769c', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:20:32', '2022-07-30 13:20:32', '2023-07-30 09:20:32'),
('2932edc14830c26c207f040282871519436809e55d420d6d2fd10007cb114e30c7b69e817a6111b1', 21, 5, 'Real Estate', '[]', 0, '2022-07-02 00:16:17', '2022-07-02 00:16:17', '2023-07-01 20:16:17'),
('2953c1b8876f6f73e7b468a52b90674a62ffbb71f47c6c9b6d77a2fd0b21bc5bc2de21c66bbc5c7f', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:35:19', '2022-08-04 23:35:19', '2023-08-04 19:35:19'),
('2a12e216c7e557bf48403b574506c798d4593edd1340c782e3aa214bd4605aaa0b08d05b73dc786c', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:44:16', '2022-08-12 16:44:16', '2023-08-12 12:44:16'),
('2a93c7e5b8e2b20d2c65d01887e8967c8f2298eb0207957bda3a9a2a8e5396da5cc52069d7c1cf85', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:44:40', '2022-08-12 16:44:40', '2023-08-12 12:44:40'),
('2b7bc72ed4f20e81d8ee5992c4192f11bf4844ded96a1281053fd4ca4ef756e6b26a646e9d7c3090', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:29:59', '2022-07-22 01:29:59', '2023-07-21 21:29:59'),
('2c1265baefe9f994a9773f97aa3e2d400fc84a104dac565994fa68884973ca002dcc57130632dc7f', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 02:27:35', '2022-08-12 02:27:35', '2023-08-11 22:27:35'),
('2cbe1ddfa510fd25f8f7799e3432eed127230344232069cc20b84cd6fcb842d3b56d1cab6e81df63', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:00', '2022-07-28 02:02:00', '2023-07-27 22:02:00'),
('2cf2709a659088ad509e83541f0bf234439d5b90d4ea2b837ef9da699af7fdadf84b6fef072ce264', 62, 5, 'Real Estate', '[]', 0, '2022-08-14 20:10:43', '2022-08-14 20:10:43', '2023-08-14 16:10:43'),
('2e0a65be06dcf444b95d6da4aa97e16575ce83380e70fe44e0e0caeb46b609267a2ea21a40992a57', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 15:26:17', '2022-08-11 15:26:17', '2023-08-11 11:26:17'),
('2fc33ea6e80ef64d8cf00f666e30b60b2bec37169bc0dc1ba8db80c714b26fb120b8caf446686831', 4, 5, 'Real Estate', '[]', 0, '2022-08-14 03:24:30', '2022-08-14 03:24:30', '2023-08-13 23:24:30'),
('30a1686e72a3de5f84432dc0a15db712faf3a6eb425ff7cf0a260d0d389da515ececa90d71431ae6', 4, 5, 'Real Estate', '[]', 0, '2022-08-09 00:05:01', '2022-08-09 00:05:01', '2023-08-08 20:05:01'),
('30ed601f95ef47346a3cf984a2c26836125250baa592821e3796673843fd1566f8c01220d33890f8', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:49:21', '2022-08-05 19:49:21', '2023-08-05 15:49:21'),
('3122f2abc28dd5abd568bc76d0fbf6178ed3409d616a8ab2bdb5965109feccfff007e34d287576c9', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:13:54', '2022-08-12 17:13:54', '2023-08-12 13:13:54'),
('312f7c71e443780f2673d1799299f59be737e0661ef389cb5cc8aec86ce409d5c0c95704d9a8cd2e', 4, 5, 'Real Estate', '[]', 0, '2022-08-02 00:26:56', '2022-08-02 00:26:56', '2023-08-01 20:26:56'),
('31493a9465f5380a889b26da1a3b87234feae906216e40db05ddfc418a3c67ec3d82abe243d7dbd2', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:05', '2022-07-28 02:02:05', '2023-07-27 22:02:05'),
('34d224b6bb15b11ed6900658c520aa613253447582a631af735d7bc1273d4d740f20c6726c272165', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:59:20', '2022-08-12 16:59:20', '2023-08-12 12:59:20'),
('35045707420a5c5313e3370fa0c554e273dc87a6f6370eb72ccb774462f0c92602b45e62ec44c61e', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:11:43', '2022-08-07 03:11:43', '2023-08-06 23:11:43'),
('353302683aa60848b8daeb0eba905811d0d50d45f5be6ae00880e9b23cc4bf80e67a6bf13847c169', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:00', '2022-07-28 02:02:00', '2023-07-27 22:02:00'),
('35f018bb3a290c5881c381953c2b32531206bd1f2aff64eae63574711caa8100ff8acdf1cd52516a', 22, 3, 'Real Estate', '[]', 0, '2022-02-15 03:00:15', '2022-02-15 03:00:15', '2023-02-15 09:30:15'),
('360ad2f7eb04ffca350ec2afe4145e3e995f732c2f6963027a12f5a1db19034c8be0fbc65cbb31cd', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 05:33:36', '2021-11-23 05:33:36', '2022-11-23 12:03:36'),
('366a7e218713c1a425217030071b7cf8a7d6d415c17638d7fd78f8caa26f771b486d127f07b5a6a0', 58, 5, 'Real Estate', '[]', 0, '2022-08-13 21:07:30', '2022-08-13 21:07:30', '2023-08-13 17:07:30'),
('36dc7684dbd6c5b98b2acc4dd565316a2626a293fd34b8b5ca1d6f7b12dc2ef61af8b775f39b23e3', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 04:16:35', '2022-08-07 04:16:35', '2023-08-07 00:16:35'),
('396f4983d7c9847d9eee8442bf8a0833a7a2a431e375d21c58749570cbdb3a74fa948518884a6483', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 00:29:01', '2022-07-22 00:29:01', '2023-07-21 20:29:01'),
('3a67c239fc429fffe816031c7922ecb12bfee58923eb6c373550c6598b62925f31d4d8cd9467a8ab', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:10:04', '2022-08-12 17:10:04', '2023-08-12 13:10:04'),
('3a82e0d1cf360b21c2fffb1e674a50343a5f2742a8fd68df66a5ff61ec905ebb8d30aea24e919eb6', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:10:54', '2022-07-29 03:10:54', '2023-07-28 23:10:54'),
('3bf2a72a7553de36f3f8189eb59a60a6aae81fd6832a4be4c38202cf59ebbd78694d8f1855cfd3c7', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 02:30:02', '2022-08-11 02:30:02', '2023-08-10 22:30:02'),
('3bf81eca7706c4b914a1dc552a18cdbf3c3a14408acee3781139d0fe0212b9344c2b8d74cb2fcf85', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:34:14', '2022-07-22 01:34:14', '2023-07-21 21:34:14'),
('3c7cff056a19e4b4a00079c21cfab49286fd8a0e4a39c6153b6a91126e4c44d16dda82eb04d3bf07', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 02:23:14', '2022-08-11 02:23:14', '2023-08-10 22:23:14'),
('3c863c35f3761ba26f37da0f5204fea0d590364934609a09534368496c540d3449b5f29361a6a547', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:45:09', '2022-08-12 16:45:09', '2023-08-12 12:45:09'),
('3c924f76460a1827cc18ee9054692f58e9170e1c99f306018939c4e4a47b6102e60a538bc3e89601', 4, 5, 'Real Estate', '[]', 0, '2022-07-24 00:04:04', '2022-07-24 00:04:04', '2023-07-23 20:04:04'),
('3cc2053d380594ec4a66f6544be3e52439ed501e124144f65df31e7886be186195ac9c8d04119c82', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 10:57:17', '2021-11-23 10:57:17', '2022-11-23 17:27:17'),
('3d9892b60e49e4288a58b0c5d5951988b50d9f7c2d74263d8e88973ad8c42382ece0e7344666747f', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:48:47', '2022-08-05 19:48:47', '2023-08-05 15:48:47'),
('3db0b1f913d34b4a23236ff56023a19095ca25371f9eb2a01d7f0db1323684011b782242b7caac9f', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 15:50:03', '2022-08-12 15:50:03', '2023-08-12 11:50:03'),
('3e888979963abcd0d36b786caa63fd462004179ae06c5becdc9c1c8579c0f34af38a2c4bd4a78593', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:30:57', '2022-08-05 02:30:57', '2023-08-04 22:30:57'),
('3eadd2680827139719e91635c011505ae49457107ff67a3a9990ac56ae915760e1cd73b215236fc3', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:06:28', '2022-07-29 03:06:28', '2023-07-28 23:06:28'),
('3f2aceec6ecf5806cc35453ed72b1451272de4d88395775eff4b24690c59a840070448919a614e9e', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:24:44', '2022-08-05 01:24:44', '2023-08-04 21:24:44'),
('3fbc0d69779411e0268bfb6c6393cea155c523a08ca10675645782d0e9d2c1a370cd1cf2453c94aa', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:13:52', '2022-07-19 14:13:52', '2023-07-19 10:13:52'),
('40dd78488d86701244e191375e407b7dd2e2a6fff4e679dcba85fe0a0107b5337de19c9bbe3a510b', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 04:33:31', '2022-08-07 04:33:31', '2023-08-07 00:33:31'),
('4195f726a07f87767ac88aba69251498495aa3788a8a19b837e81bbed8ef81594030b26c042e81cd', 18, 3, 'Real Estate', '[]', 1, '2022-02-03 03:12:39', '2022-02-03 03:12:39', '2023-02-03 09:42:39'),
('41afcd7b03694d52a81da095644fcec700a05dfad34217bd6885bca48b5b777502be1ec42649ca0d', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:14:38', '2022-08-05 01:14:38', '2023-08-04 21:14:38'),
('421777cec7e63ec27d8bfeb1249733cc68ab1ca49df696072d7e00d4b465967ebe874aedd82a0e13', 4, 5, 'Real Estate', '[]', 0, '2022-08-17 01:21:25', '2022-08-17 01:21:25', '2023-08-16 21:21:25'),
('433699edbc1176f71a334850edac366295bd2ee16c89e67480dd4bdcb358a2a528ed777ee9d84698', 4, 5, 'Real Estate', '[]', 0, '2022-08-10 01:50:30', '2022-08-10 01:50:30', '2023-08-09 21:50:30'),
('43a41aad4fb645d110dbad6a345170229df7e214866518d048521f2c5501604aae0bc1b7390955c0', 1, 5, 'Real Estate', '[]', 0, '2022-07-16 17:27:01', '2022-07-16 17:27:01', '2023-07-16 13:27:01'),
('43b7d7d16cec9407d880b4ac22567b89254853483d20956b28b16471f65011b9eb09b958c2b8dd96', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 03:26:15', '2022-08-05 03:26:15', '2023-08-04 23:26:15'),
('4477af912fee2d708d6bd155e6093eb0f951583ba2743d23e8d10a8572b59fdf52ab6758b78d4973', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:56:15', '2022-08-12 16:56:15', '2023-08-12 12:56:15'),
('46033b2cbe07a40c2e747b3891e3d1a2606fe2d5cb4992ef8932fb6fd31fd0529f22b1176eb67e42', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:55:50', '2022-08-12 16:55:50', '2023-08-12 12:55:50'),
('460ee26a291c3d6ca850e3d12054146ecba72ae9a49a30177a15f5305727516c3808eb3651785042', 1, 5, 'Real Estate', '[]', 0, '2022-08-04 23:44:17', '2022-08-04 23:44:17', '2023-08-04 19:44:17'),
('4683957e268dbe6ff1427e5bc86613d2bd1865cc89c58640711e8d4a3cbcb86421ae5c1751708f99', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:04:46', '2021-11-23 06:04:46', '2022-11-23 12:34:46'),
('46a2debc49795c5ca3aeb74e187844f5b90874666eb998185493e7b369ba569c1da4fe82ac377a44', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:18:51', '2022-08-03 03:18:51', '2023-08-02 23:18:51'),
('47bd963e1461c276d043eed5b2b96db3ce3256a404705480994a76d1bc2f6eba77e473b1a7603cdb', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:33:08', '2022-07-30 15:33:08', '2023-07-30 11:33:08'),
('4820fc91a76c412c4814e07d6781ec35484e65b7c38b02b9e276c3971fa9cb174b75b620bfe5e461', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 19:00:55', '2022-07-23 19:00:55', '2023-07-23 15:00:55'),
('488ae60a2719721291b815f5a1bdfecfb9682a4bf7eed93ac34b75cdbe9b6aae3bda4e02f48da8d6', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:58', '2022-07-28 02:01:58', '2023-07-27 22:01:58'),
('48faa389b60fb671de592e08040bed8e9510041f99071d8763b214920034963b8abd6a2ba9f025f3', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 05:04:58', '2021-11-23 05:04:58', '2022-11-23 11:34:58'),
('496fb4e4e739507195b9593f0f09895310b1a3e9a1aa886bd12c6b685e42323a297cdc7204e2ece6', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 00:06:03', '2022-07-29 00:06:03', '2023-07-28 20:06:03'),
('49bdae282955ef7d0330f989a1a6446f5556f95f5c9d5ff0ee7228699a57d7771fde07ae0cf162e4', 4, 5, 'Real Estate', '[]', 0, '2022-07-26 00:03:08', '2022-07-26 00:03:08', '2023-07-25 20:03:08'),
('4a7c0ce1905230fc1bffa2e02bef394eb7eca1f63949b185e403bd2400e1306af8b6c0f74e34603a', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:03:00', '2022-08-04 23:03:00', '2023-08-04 19:03:00'),
('4aafe52d8a27504c56d80d1086879e8542bc414441968e1dc088ceb358671fe0eff0a93df7229d32', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 20:39:26', '2022-07-30 20:39:26', '2023-07-30 16:39:26'),
('4b03e088e02a85bb49cf863b1de95230656ffeece7355b6477250501825f083a4d72e729aa7478bd', 23, 3, 'Real Estate', '[]', 0, '2022-02-15 03:37:20', '2022-02-15 03:37:20', '2023-02-15 10:07:20'),
('4b31f4f55f2c9d7519d4afca59a71dd1ba0f93908379d2aea7ec886a19c0601d0ffc39f017bbfa26', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 02:02:16', '2022-08-12 02:02:16', '2023-08-11 22:02:16'),
('4b43776d4e43fd68ec406413fe5398d50ff4bf557cf3737d3d5280aa274177e0b2bfa2fb1d1d51dc', 4, 3, 'Real Estate', '[]', 0, '2021-11-25 05:50:47', '2021-11-25 05:50:47', '2022-11-25 12:20:47'),
('4c5c6c3c076ce48fa46bf1dd169dc2fbbeca2f7b23eb2f7923e6c165e95f513a269996ca6763dab6', 4, 5, 'Real Estate', '[]', 0, '2022-07-21 21:20:47', '2022-07-21 21:20:47', '2023-07-21 17:20:47'),
('4c7df0d2ef75eca973224e8f48d0242251454fcaf9797306547376758c6ae2caa11146b898ab7906', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 18:37:29', '2022-07-23 18:37:29', '2023-07-23 14:37:29'),
('4cfd34a3f4a7d13ee03f47b1a574cdcfce2f5fc8310bc0035f7af3385b7dfad247fb6ce6fb4f3726', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:13:02', '2022-07-30 15:13:02', '2023-07-30 11:13:02'),
('4d05a57eba717bf1d2346c59fb2af0645720f0bb8f880f8f2a47fed8aa49c25141b0e95111e8f6e9', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 00:20:45', '2022-07-23 00:20:45', '2023-07-22 20:20:45'),
('4d309328dcea6acead483b0db878b7ee7bd984808bafd070e6a21aff6b819066f4226f4068bb09cf', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 13:54:16', '2022-07-23 13:54:16', '2023-07-23 09:54:16'),
('4d97b98c62847f7240003a55c024dcf27b4ce18556393d6c60e3bf8d93a1f655204fdacc7b45b437', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 18:01:49', '2022-07-19 18:01:49', '2023-07-19 14:01:49'),
('4e04833720e8e59b2f716e18453b8920669f12e1c0991844015e1110cad3e7ceef54020fea1f0049', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:25:41', '2022-03-17 02:25:41', '2023-03-17 08:55:41'),
('4e8cdbc976cb6b8425a3f709cac3ea6470a4a0c6bd715862ed9d3817222f1e68677c332af075101e', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 02:30:59', '2022-07-22 02:30:59', '2023-07-21 22:30:59'),
('500d84c147871c369b449e9b432bb4bee1ba68846480cccde7eb4ba6879d0aa642eb78fda607acb8', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:03', '2022-07-28 02:02:03', '2023-07-27 22:02:03'),
('501c11aae36c6f050d01233aaef52de6ef99e9013016d81ec3ae012dfd95cfc41170ff5d6533de4e', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 02:38:54', '2022-08-03 02:38:54', '2023-08-02 22:38:54'),
('503d72448f1f34232f52bc437be55377f1f825b9f61a741b865c2647319c255bc2a23fd2cb84cfea', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 02:56:54', '2022-08-07 02:56:54', '2023-08-06 22:56:54'),
('50c1a4d141ea59fdc564f3c4eca7c86fbb7b8a5a4bcff784f3815fc50977566a77f5a8b8bbcc936c', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:11:30', '2022-07-30 14:11:30', '2023-07-30 10:11:30'),
('50c7e1056f996b39dedb8545fdcb7d1c97fea1089a374609cdf613c7756a29616b63b18e9ec89b99', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:54:17', '2022-07-30 13:54:17', '2023-07-30 09:54:17'),
('50eb4375dea5ec70020778f737d7f30cd58d28b8137673728cbd7391e6aedfd06628cf9a0eb29225', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:47:39', '2022-08-05 19:47:39', '2023-08-05 15:47:39'),
('5233621541df9b5895b6041bc54b0f31cd08e6ec64cd169b3324b43d739c73628d8b2a918b276e1b', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:15:10', '2021-11-23 06:15:10', '2022-11-23 12:45:10'),
('531eb7463a7dd1cf7ee75e47131a1992a64630c0fd30667242af37d5449feb7527b42fb96e8c5a07', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:45:27', '2022-08-05 01:45:27', '2023-08-04 21:45:27'),
('55959b6a8495364de62d01dbaab4351a2b0d64a7fe6b1cf0b4316871a2be00336e5052a7d9c09886', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 15:50:04', '2022-08-11 15:50:04', '2023-08-11 11:50:04'),
('56b2b4f128c4256f32f4328591940a97a8856b7860bd6adea136b12deb1e0faf7a8a8e27b6f24184', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 18:02:01', '2022-07-19 18:02:01', '2023-07-19 14:02:01'),
('56d140a49e9b99ff34168770a0cb39729f93f3775e936fc81b443a317fbce8eec468f3e4e97de6ba', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:12:38', '2022-08-12 17:12:38', '2023-08-12 13:12:38'),
('56ddbae197961c95aa3892e75c154cbf2f6fc2cb0669de6ed662078c2205284310d600c7fa087583', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 16:06:53', '2022-07-30 16:06:53', '2023-07-30 12:06:53'),
('57efeac57a2dde75fb7dac2b00ab8af3a9dcea428407f1a683cf3b2dc3531561437daff8cd71a593', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:01', '2022-07-28 02:02:01', '2023-07-27 22:02:01'),
('58ad4e18e80893902bee4e4cac06184d96edd72ad35c5b5458810b8a26c9f5c67031dbf7077e1dda', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 00:45:43', '2022-08-13 00:45:43', '2023-08-12 20:45:43'),
('58fc6e89789e8519e864ae1854e7bfa2d9e32d6e36b8fc578a4338632c720181f5b3843d1cf74d56', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:14:49', '2022-07-29 03:14:49', '2023-07-28 23:14:49'),
('59246e9738180d99fbc9161822f27c2b955efee4c5723ac000ed15b45f019c3acac4ff24924ccd6a', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 21:54:13', '2022-08-07 21:54:13', '2023-08-07 17:54:13'),
('5b18dfc62769225b02d35882456481fd3b797fe7a58830a806776ed10d4abc8aca9eb26ffa4eb3be', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:21:12', '2022-03-17 02:21:12', '2023-03-17 08:51:12'),
('5b3cd602b92afa7eba975d7b050ad778fb32de444d722bf2be943adcac87a5b43a038d163b9db905', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:26:16', '2022-03-17 02:26:16', '2023-03-17 08:56:16'),
('5b5598059c1c25b6832b2281f4e5c5c8d166a8a029d8201dc3e647c9ee06c9bd772243ec95de792d', 4, 5, 'Real Estate', '[]', 0, '2022-06-24 02:17:18', '2022-06-24 02:17:18', '2023-06-23 22:17:18'),
('5b90fbc7ef319b65ccc4ed8e7a02f0d95ae669aaca8d4cd6a3802861026824d2286ed4e7584730ad', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 16:19:12', '2022-07-30 16:19:12', '2023-07-30 12:19:12'),
('5c040a1114e433af252c043a8458ab7abbee86f181018d2a9fda7bb9499f326c300ffbed3914cefa', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 21:02:49', '2022-07-30 21:02:49', '2023-07-30 17:02:49'),
('5c3968bb06b01e1c0ea1f9b6c7ab9af0d5cc0e8056f218cefe829a8b4144f23e8047bc503e58ec67', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 04:03:35', '2022-07-22 04:03:35', '2023-07-22 00:03:35'),
('5d439204716e5a1420d2ce4e479b8065edc2f3e00952679608a2f4119bf6bf766d8ff550cb808907', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 20:40:20', '2022-08-12 20:40:20', '2023-08-12 16:40:20'),
('5f16296a2e2c26684b9e330d549c089a80e6dbbe457c3f4ebffa93e74c4cdbe463a9a89cfe422629', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 20:26:39', '2022-08-07 20:26:39', '2023-08-07 16:26:39'),
('5f7c9501f79cbd06aeb32374f84d1a3d23433b134875182aad2298398a72b62bef1724ffa3fc7d5c', 1, 5, 'Real Estate', '[]', 1, '2022-05-26 04:35:37', '2022-05-26 04:35:37', '2023-05-26 11:05:37'),
('5fbe82c65e5e31a3dabc3c04c7f8bf21a2436a60396a7b3b47e5caeb21296d584486d64ef2dfc1dc', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 16:52:59', '2022-07-19 16:52:59', '2023-07-19 12:52:59'),
('613cebfd01fc955f2c0e70483a9b97c74c653208f5cf9d70491b3a984be26ee85d7bdd9b6e977835', 4, 5, 'Real Estate', '[]', 0, '2022-08-15 17:53:00', '2022-08-15 17:53:00', '2023-08-15 13:53:00'),
('6216a7d87f8df8b6bc4d172d16e2bda7ecdcc835d6cb30e1add49d1a0e61e688ac21db1ff639ed2a', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:55:19', '2022-07-30 13:55:19', '2023-07-30 09:55:19'),
('6268505e4ae2027a9ce2fad068960e30c61159af1cf87e9b0f07e9973af85d00466d4f36ed36837e', 3, 3, 'Real Estate', '[]', 1, '2021-11-24 07:58:45', '2021-11-24 07:58:45', '2022-11-24 14:28:45'),
('64930285da0ebab24353b8b6512e3b0f6e6e04d470d497c21cbdb01922bc4651256d5a269cd63acf', 11, 3, 'Real Estate', '[]', 0, '2021-11-24 07:49:52', '2021-11-24 07:49:52', '2022-11-24 14:19:52'),
('6564d4f9c6549068b4426bbe942f0d1305a92e74a06771ffc9333a4267873b17333bb5010d4cae27', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:02:17', '2022-07-29 03:02:17', '2023-07-28 23:02:17'),
('660ff65adc5795ce8f69c63c8ae3b9787b3259992e5cbbb32690bfabe8ae74dee1f5775b32e355c7', 4, 5, 'Real Estate', '[]', 0, '2022-07-21 01:12:36', '2022-07-21 01:12:36', '2023-07-20 21:12:36'),
('662c52aca9bef81bb33d91f0d48aa7c98f7e4473c3bd4758f998d31b2f935f36aae15e20965f2b34', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:13:31', '2022-08-12 17:13:31', '2023-08-12 13:13:31'),
('66d9a0cb6e3d2774690baa84a69cbaa89a31dbaa90972643c3dcd332865bb5dcc9310d2a1499f703', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:49:17', '2022-08-05 19:49:17', '2023-08-05 15:49:17'),
('671b9e435da6e3ba2549e5635de59c31baba592dd26b1ce7b19508308b15916781899f32fe0a4121', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:12:42', '2022-08-08 01:12:42', '2023-08-07 21:12:42'),
('676f7b258b0c11265a3461f9b1665933310d1f4ea4865eb177096b00bec6a4ee13f456e0e409cfa8', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:07:49', '2022-08-12 17:07:49', '2023-08-12 13:07:49'),
('6830a2e22b9e7548482d3adecb310a2ae68ee9110cfb8cdef05c01f31c5616e4a62aaf61422205b1', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:12:10', '2022-08-05 02:12:10', '2023-08-04 22:12:10'),
('6baaa0b41f693e27b0d0223db2479102cf36ba2ce206c9085e854535b047ab6f09d7137df18512cb', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 15:44:26', '2022-08-12 15:44:26', '2023-08-12 11:44:26'),
('6c23bc2969b6ae4de9ebfd2c64f1e9b588ff12785dee1b56e5438b075f6a88e89c13b9770bd713be', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:49:21', '2022-08-05 19:49:21', '2023-08-05 15:49:21'),
('6d194245f0fc3a1f056483b0d0ab64eb90c0a2458741b9374a6a06014163a7ab61276dfb8e15b6e1', 4, 5, 'Real Estate', '[]', 0, '2022-06-19 15:54:44', '2022-06-19 15:54:44', '2023-06-19 11:54:44'),
('6d5faf14065ece34b5752d7813c93ecc30996d1af2f083d1ba300fb1c987137bcd65f8438c8f721f', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:24:33', '2022-08-05 20:24:33', '2023-08-05 16:24:33'),
('6d6b107c2b59044ea4f5e03889ce2f4c1a4027cf9ecef592eba6a02d6d0409546af3768eec29aa71', 27, 5, 'Real Estate', '[]', 0, '2022-08-12 18:10:12', '2022-08-12 18:10:12', '2023-08-12 14:10:12'),
('6e2e950a8f23c64bf27c85c0398d528cf57af87ff2b7711c9338ed2acb302bc10168f5199e0e32ae', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:33:35', '2022-08-05 01:33:35', '2023-08-04 21:33:35'),
('6efccdc7940cddcf4af85e5feb5bfea48b74f7b2b303779cc3a569de1763077a32c132b9676b46fc', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:46:05', '2022-08-12 16:46:05', '2023-08-12 12:46:05'),
('6f1fa302d776459d4e44af1c3d1b16cbbe6e8104f56a26748a4ab58e8fbb790f7f37d3f8413a9dbb', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 00:31:18', '2022-08-03 00:31:18', '2023-08-02 20:31:18'),
('6fa1e76d910635b66d0eb849a06b875968d04948aa0e5418fa06aadf1637b511c2344747f2b07ad3', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:34:53', '2022-07-19 14:34:53', '2023-07-19 10:34:53'),
('7162954189ae88b9dd740e9f7fcb6d0d5ba7269d0e5684a87dec996d2c91493c5a089d38381f9c09', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:45:29', '2022-07-19 14:45:29', '2023-07-19 10:45:29'),
('717a8cdf2078c55816b87861f0843c903ce05eb4036c266dd3d9a55bf29ed47a2cf19356a508f105', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:54:59', '2022-07-22 01:54:59', '2023-07-21 21:54:59'),
('71860459fe47494f14ddbd80c2179e8e252f803e0359e1a18cea6d82fb3afd96df68674330da7e7d', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:36:43', '2022-08-05 20:36:43', '2023-08-05 16:36:43'),
('71abee8ad0846a3ffe30774c625c86d1d04fad142b54fa26d73755a3c23bbb5204c7c4f881848c75', 4, 5, 'Real Estate', '[]', 0, '2022-07-21 01:14:36', '2022-07-21 01:14:36', '2023-07-20 21:14:36'),
('726ff94dbccbff61d4a8f5b8ffefa61afaba0145e87825f14dd85d24525115cc83c2215a67989868', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:29:56', '2022-07-19 14:29:56', '2023-07-19 10:29:56'),
('72cefa6d02d4a2ae1f82dd9fc8d0e9bb7d69c44b9f64e13200c37fe4c092c0d126fe0b9fc43bc991', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:01', '2022-07-28 02:02:01', '2023-07-27 22:02:01'),
('72e3333b1fb28cfb07c9421e0804084746c6d716fa81be45b43dc430108ef5b8c4497249e227ede6', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 21:12:05', '2022-08-07 21:12:05', '2023-08-07 17:12:05'),
('72eab558128066ff6415db70f574d82ab1b8de814c92989acca72039c6ec9ed22e29bba1169c7d63', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:22:36', '2022-08-03 03:22:36', '2023-08-02 23:22:36'),
('730edbf96dad7f4621bca35d031cea841b4cf607d8c9c13bb81a54f8f28388f796c319c41dd54fba', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:28:34', '2022-08-07 03:28:34', '2023-08-06 23:28:34'),
('7328d88afd04b5605f26832c138277de42506a000962665539e192310750b400933668e2bab977a5', 4, 5, 'Real Estate', '[]', 0, '2022-06-06 08:48:13', '2022-06-06 08:48:13', '2023-06-06 15:18:13'),
('733f232b639ccf0e0aac6f67bc5be75c0c9c50407d2a33ea7a030236ce045326b9fe20f7ace62312', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 01:25:25', '2022-07-28 01:25:25', '2023-07-27 21:25:25'),
('734474a1ed2a57a093724af444b058f1d56cfe9e4beb351dae2e0b1661b397863899c866c300ff95', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 14:52:43', '2022-08-13 14:52:43', '2023-08-13 10:52:43'),
('736610fd17256cedb1211e8bb1cca553bd9b63fd75a141c495b53a1696fe9c427f43a0062df08e3c', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:17:33', '2022-08-03 03:17:33', '2023-08-02 23:17:33'),
('73b2e4887f8ae8293de4be3b48dcfe9f0af7febbd0263b51244f48f5967348aa88905d0ff289e115', 4, 5, NULL, '[]', 0, '2022-07-30 13:54:18', '2022-07-30 13:54:18', '2023-07-30 09:54:18'),
('75641022f5f3c1ed6b6c3fc0876fb716ec716b928b714ae45680db95a3f2dbe5d65bb9bfb8c21adb', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:55', '2022-07-28 02:01:55', '2023-07-27 22:01:55'),
('75882063255e2a66ab18fd2ec10baeedaff674d60b17efe1a1b46f8287342d1928e5a8e9db51b59b', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 03:26:22', '2022-08-05 03:26:22', '2023-08-04 23:26:22'),
('7616c04bb6a3679f3fd284bb4a025236930b477bc080998ee9c57c6e01c534afd7da225268a6647a', 4, 5, 'Real Estate', '[]', 0, '2022-06-26 02:52:16', '2022-06-26 02:52:16', '2023-06-25 22:52:16'),
('7626013471b20f964651bcf11e6d51b2c4df392e305df6020d50830c4f29a614926a276238c95fb2', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 00:34:37', '2022-08-03 00:34:37', '2023-08-02 20:34:37'),
('768567af494398d65115de3755d13b7e9c8f480f992f44ea7c5d40f08f24ac8d6058c8e501c49ac5', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:04:52', '2022-07-23 20:04:52', '2023-07-23 16:04:52'),
('788fcd60277a7b0be95cd9bab4f07652259f73c53a2980f36aa69ea0ce0ebe26c3bc960ecfaaa6fa', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:31:28', '2022-08-05 20:31:28', '2023-08-05 16:31:28'),
('793f91d9b972fa900896bba89e2b536fa4a6548869245d738831232371da0cb4aeca0459bf779830', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:00:07', '2022-07-29 03:00:07', '2023-07-28 23:00:07'),
('79ff4ecea064bf4090ec1760ee588307bf66ef7f106cebedebed61aaf806ed6555f34a26b86426f9', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 20:02:11', '2022-08-07 20:02:11', '2023-08-07 16:02:11'),
('7a318eb5270282c79e631cbbdfb7e560f150a85ca40159570fe803d154f7311cd18eac874c43f47b', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 04:11:39', '2022-07-22 04:11:39', '2023-07-22 00:11:39'),
('7b796ebd8a3a0f3ea9ce1a8f09f14cc2948f1db1681fa98e3b8d390c4245a295493651b1c025db28', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:04', '2022-07-28 02:02:04', '2023-07-27 22:02:04'),
('7bfe7b8efe1b655dec07e4f2aba3dcd7dbc7ab069472e2914fbad9f09851bc2a37b7ff40d0f97472', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:46:43', '2022-07-30 13:46:43', '2023-07-30 09:46:43'),
('7c787843ae0b7210e62d0f25a390e1e12c26c09029d39471985bb19d3acd9d89f92f4224820352d9', 4, 5, 'Real Estate', '[]', 0, '2022-07-02 00:16:14', '2022-07-02 00:16:14', '2023-07-01 20:16:14'),
('7d74e92ca0eac019ddd63386e56cec4b05f499b3a2be0a85c85dd3cd361da0527c1f8ca77db9f05d', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:13:50', '2022-03-17 02:13:50', '2023-03-17 08:43:50'),
('7d77a81c007c66ae9e54172f91f48a18dab34108a75ea307279bb91d25fa53e0633fd559bbf40af6', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:02', '2022-07-28 02:02:02', '2023-07-27 22:02:02'),
('7e6048b49d9ffb982e3205fd0e7578ce6ca918100fe21c4189fbc5d5169f9ef46b489144c84dc143', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:34:46', '2022-08-13 21:34:46', '2023-08-13 17:34:46'),
('7f237e7cb1aa39d9163929c528b235773139aa720f2a65dfb0187c6a6037278d27e3c37565c66791', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:31:49', '2022-07-19 14:31:49', '2023-07-19 10:31:49'),
('7fe5494f2329bb3df9c53fb327453d85c4617eb7e7f406bb60edd397a50a75daf18e954be21ce22e', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 18:33:30', '2022-08-12 18:33:30', '2023-08-12 14:33:30'),
('81137dd1979c2cf1a69d45e5159e23ea14234a680176525fa260df87774330411ed1d0b0f508e407', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:13:44', '2022-07-30 15:13:44', '2023-07-30 11:13:44'),
('814ece9c3a3ed92b5786bc18c51793dcde010375b38cd422252248bb87459228c1e17752e8f40bd7', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:42:33', '2022-08-12 16:42:33', '2023-08-12 12:42:33'),
('825c2d2598e255fc108bd52ffd0efe2323f97387c0270f35adccb58c89a84c1afd06f09141b6a3c8', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 02:59:08', '2022-08-07 02:59:08', '2023-08-06 22:59:08'),
('828c83edd16151ca342c253575cca11aeb83cd1fcc3296d81ad6cad1df503967e0f2ccd68c14e320', 60, 5, 'Real Estate', '[]', 0, '2022-08-13 21:14:05', '2022-08-13 21:14:05', '2023-08-13 17:14:05'),
('835400f1464caabc1c3c7fd9837d199d417bdedebe2b0ace4fffcf41fa0fd9373da631579c2e4d2c', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 04:03:34', '2022-07-22 04:03:34', '2023-07-22 00:03:34'),
('8398a5264128c66d68c0226b35f7c18616b394bee688539107ec6cd6fdf605fecea6cc41128d4f7e', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 14:12:19', '2022-08-13 14:12:19', '2023-08-13 10:12:19'),
('83ddce04ec270abd07cf3ba7e8f49ec539e3b90c6a7a18295d33adf19c7d880c3898565122da25c8', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:42:56', '2022-08-12 16:42:56', '2023-08-12 12:42:56'),
('83fdcfaf563226a80c3e1363f66818ed2bbbb54d2240aedb5054f87da94add85010641277b43767f', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:19:40', '2022-07-23 20:19:40', '2023-07-23 16:19:40'),
('854f44332bfb7f5ecbab75e439174f550e16143d45134df211c04ea569c9948f27256e01d1504774', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:20:21', '2022-08-07 03:20:21', '2023-08-06 23:20:21'),
('85d314f999ee79692d600307d4a92c81553868880cf5e6d96ed3b426524b7ebc2a99cb964f14a0b1', 60, 5, 'Real Estate', '[]', 0, '2022-08-13 21:13:59', '2022-08-13 21:13:59', '2023-08-13 17:13:59'),
('86388ad90fd3de18272def097f74343bb950a389a8d66b445df9f2d2de163209ca00130f5c15f825', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:30:37', '2022-08-05 20:30:37', '2023-08-05 16:30:37'),
('873f4b9e08e0b44de53fcfe839980acc895aef2710bcc5fe6d97e50e57127f9b980dc026d4c20702', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:30:06', '2022-08-12 21:30:06', '2023-08-12 17:30:06'),
('8794083b5a628098edc42c4dc43238274a15a4cfedcd286b7d972919214f790938c8e1b1cb272a62', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:25:52', '2022-03-17 02:25:52', '2023-03-17 08:55:52'),
('87e8a9ce912b9f69b7c68ddf066064035d6044c0be821125d3135b1eae90ff964ad6c13b471e8434', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:04', '2022-07-28 02:02:04', '2023-07-27 22:02:04'),
('883164fab87efe32f17aab350b6a761605dff7b5d6869d6732440a3370e572ef359cfa8c894f2787', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 03:03:13', '2022-07-22 03:03:13', '2023-07-21 23:03:13'),
('8839b2be1a852a16b2d29687a3f675e61f5b5a723f8f9048b148ac1d534d76d130d8bf6b8cd131da', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:24:58', '2022-07-30 13:24:58', '2023-07-30 09:24:58'),
('89f1fffc0221db7b61555b376e2161047d06016a277202771b5229f8d1e8c0191f60e4da88f1ac0f', 18, 3, 'Real Estate', '[]', 0, '2022-02-15 03:37:46', '2022-02-15 03:37:46', '2023-02-15 10:07:46'),
('8ad5fc7ef0a24fb285bdefb139979f7a0f4b35b1ed2c37144e66ef2d6818984512f9087dd1f0ffd6', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:30:54', '2022-08-05 02:30:54', '2023-08-04 22:30:54'),
('8b00b7599dc5040767e4cf5a3bee7b615c045d6bff9bb377b1e086cf31353c1e5c5a9ab5d07aec08', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:27:10', '2022-08-12 21:27:10', '2023-08-12 17:27:10'),
('8c16e0e3eee5ebcdfed97856f1385f6558f63968971825df7cdbe0aab3f0229fc3dc1ca94cee7cd4', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 00:07:07', '2022-08-08 00:07:07', '2023-08-07 20:07:07'),
('8cd665a515ecd5955a4070c0e9fd91d63cc1bdbbade98936b4beffdd7a817894ac39939a630a7993', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:01', '2022-07-28 02:02:01', '2023-07-27 22:02:01'),
('8cf0b74c40c48ec5051fb45acfa9e2fe5818a4f0afff41193a09ca4745959108cbc741b978e6eb91', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:28:32', '2022-08-08 01:28:32', '2023-08-07 21:28:32'),
('8db1363db260281e13895ea98db2edbf3a968cfba5bfbb66110fab30157f4cd14eaa91c69d7eafd1', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 02:30:59', '2022-07-22 02:30:59', '2023-07-21 22:30:59'),
('8e1dc7a2bd9a513f9e98bd44b5ba466d43425d0e232f791e730ee0ea7114b721a4177ead885ff19f', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:04:33', '2022-08-05 01:04:33', '2023-08-04 21:04:33'),
('8ffba50c2777bb86fddbdc2d6bd778ae682b9230b651bfef3d963a65c1f48cacb7b453b2fb2e8275', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:12:00', '2022-07-29 03:12:00', '2023-07-28 23:12:00'),
('90236b9b0bf044ca635f04bccec8d90a415a339760c5f16f0e856e4135d62781492dbc79498a9f93', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 02:33:23', '2022-08-03 02:33:23', '2023-08-02 22:33:23'),
('90c3b545bc2cdbbcbab32d81e72778ea233992aabf08d2f9adfe085f9aa02bdf8257d19712d490d4', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 03:49:18', '2022-08-05 03:49:18', '2023-08-04 23:49:18'),
('9160171c1d5570b3d172f4ad2acffa960c4d1dd4e1adecc8c9c13009ebb113e08161e3f291ce312e', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 01:30:56', '2022-07-23 01:30:56', '2023-07-22 21:30:56'),
('91a5dd3f05620cebff5e262995242fc00a0225a1a0e5dc469756f33eb68f94198dd9a14a52c552a0', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:15:23', '2022-08-12 17:15:23', '2023-08-12 13:15:23'),
('91aeebfb8a2b3b45f33a2e44f7349b31cce435275b6b252ed1aa1d1f8eb663d0916ce2b7de7ec615', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:17:45', '2022-08-05 19:17:45', '2023-08-05 15:17:45'),
('925c2e65ea664901cb6d5a4074fc1df7c3e3a931097e66d9d501d9c7f161a3a134935026d69314f0', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:10:49', '2022-07-30 14:10:49', '2023-07-30 10:10:49'),
('94a68ae049d8efe8c4019e5e37eefba30c7dd0ad1888d8018b8b1372c7158985274853f73fe735f5', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 03:07:35', '2022-07-29 03:07:35', '2023-07-28 23:07:35'),
('959a7661a78e4990bd8edaa03bcc2b1117f93218bce408d39348a3d4b6ac71233181f0774391bff9', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 00:23:18', '2022-08-05 00:23:18', '2023-08-04 20:23:18'),
('95a3c60fffdd238b62bf648a930f82eb357ec35b1d53895743e027b4905e5ccacffe243a0493020f', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 01:28:19', '2022-07-23 01:28:19', '2023-07-22 21:28:19'),
('95e9ab02baf3f85369102c6940813271a9567d8cd9e06a0e597256681748fcdcadb1695e8231ec9f', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:11:09', '2022-07-30 14:11:09', '2023-07-30 10:11:09'),
('960baf2b5e92d3edfea6723271adfe936e0db62ba57c6144fbc188878d7a0e294da1858c0f21c613', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:48:25', '2022-08-04 23:48:25', '2023-08-04 19:48:25'),
('965fd41091bdff71f8bff90d874eab71d8212cb1e0f20b192c4027d0806a42f00171ab62fa305157', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 03:03:13', '2022-07-22 03:03:13', '2023-07-21 23:03:13'),
('96c79f661385d1b9b576763e1b22bbf6d2dbd10a5744fff34653d29be3836aca2ec5b465054cbaed', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:04', '2022-07-28 02:02:04', '2023-07-27 22:02:04'),
('982b2b6dd250b5f9e5eafe085e50ddbdea1b0f7f34a02b95b156138fd67fb009dd657b79b3043ea7', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 02:28:22', '2022-07-29 02:28:22', '2023-07-28 22:28:22'),
('98b48e673d8a0014c4c2c6f8613e91303daa11fc97cab9fd0354e98bf26b2800cb5ef002ba8363d3', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 21:28:17', '2022-08-12 21:28:17', '2023-08-12 17:28:17'),
('9a25626096165d14c1a5e4e32207277850a329cc0cc9660caa61c1a0ca9bca9580120d20173011b4', 18, 3, 'Real Estate', '[]', 1, '2022-02-03 06:01:09', '2022-02-03 06:01:09', '2023-02-03 12:31:09'),
('9a52c3e237c73c137bf115c7273618a649ecde1e1c9cd9bb80b17803ba01561c762a20734dbb1ea8', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:47:34', '2022-07-30 13:47:34', '2023-07-30 09:47:34'),
('9a885de4705662cda041f49fc300f5380e543deb9c5f0cbbf2c67c0303fb894b59307a2e20e9fe19', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:57', '2022-07-28 02:01:57', '2023-07-27 22:01:57'),
('9aa5fa5d2c015842bc9d24f44baafd7976201db0e6277f07046595242e58b455111305f7939fe522', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:37:17', '2022-08-05 20:37:17', '2023-08-05 16:37:17'),
('9ac0871cfec869ac08a9c2bd1ee3f5e966b4ae61e37aae8b7cfe7e3d4ffe0e4779703f8dcd457ead', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 21:30:42', '2022-07-22 21:30:42', '2023-07-22 17:30:42'),
('9b27ec44d376b8a924033bd5304fabe0d268fa0a13d962e9304ccd782610bc21265357e5ef268987', 11, 3, 'Real Estate', '[]', 0, '2022-01-05 08:28:13', '2022-01-05 08:28:13', '2023-01-05 14:58:13'),
('9bfd058e6b2e4f3d9a933fd2c805fc9dede623ae18f48ccfa9297d5c5f3e345914d8310e21a3b769', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 21:13:42', '2022-08-08 21:13:42', '2023-08-08 17:13:42'),
('9c0f4ec0f091950a937bb8a6dfe76ee0f8ab51d03dcdb00bdf48ccf30d3d59f26b5226690fb1a434', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:39:36', '2022-07-22 01:39:36', '2023-07-21 21:39:36'),
('9d8e93ae7f32e833b66970b785c3ccfd30d0ec8ef4c4db0cc33d6e4870aa50d05ffed67eb1768863', 4, 5, 'Real Estate', '[]', 0, '2022-07-25 23:24:57', '2022-07-25 23:24:57', '2023-07-25 19:24:57'),
('9e22300b36cd144cc7be32e72915613e1b4ae6d868195c171abe473af9c6f93bd2c801c5e71ff0ea', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:53:23', '2022-07-22 01:53:23', '2023-07-21 21:53:23'),
('9fc3c313a99b4a56ac0a32e0fb63b610e930147459bd0bd1affca72aa4c08d1c8936e5210684e339', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:18:21', '2022-08-05 01:18:21', '2023-08-04 21:18:21');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('a0739a24d291a9174f17e3f7b6a51aa848ce5e9cc4c53735a77dd169738c8c6f3529f47432f2f01f', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 21:58:21', '2022-08-13 21:58:21', '2023-08-13 17:58:21'),
('a0fa22557a84ee663caad8ba4f75a04f677f4b4f7b58a6a701d865bbf1bf20f43cbf6395eb6103a7', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 18:02:35', '2022-07-19 18:02:35', '2023-07-19 14:02:35'),
('a15156b675853d997958a944ae4ba667551c79fc4dcc9cb11e11986d9075f1a1b1ba96cac0cd4a47', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:41:22', '2022-07-23 20:41:22', '2023-07-23 16:41:22'),
('a154f9e4fea3944ccf9cb17d507ece2f5bc6394c260d9232cc91fda09024937889886dda24b4f1e2', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:59', '2022-07-28 02:01:59', '2023-07-27 22:01:59'),
('a16266f53e102ddea4fbcaf4a6b78ea292ce1d8e01a7917020eced4e03e32d8760bd9b4d25a966a4', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 20:37:16', '2022-08-12 20:37:16', '2023-08-12 16:37:16'),
('a28471c2bac51197b41ce963bebd9a3609d7d448dfc0b90e9290534bf4b1781894189e49266b3bc2', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:16:17', '2022-07-30 13:16:17', '2023-07-30 09:16:17'),
('a2d9cb4d47221cf8889c082d893246ebd36a680bdbc65f1127588a20b08f8305d0ea5e77caa5e012', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 23:33:04', '2022-08-08 23:33:04', '2023-08-08 19:33:04'),
('a3580272078427872e89db522b52e639ec9d27f484d27b71a25cca28c9da85459659bb01f30306aa', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:05:32', '2022-08-07 03:05:32', '2023-08-06 23:05:32'),
('a37e63f2190e8d8c0e973967c0de22ce7b6812d9e8b6d8ec90fb149aa46dda65c6ff282109602b2d', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 11:04:19', '2021-11-23 11:04:19', '2022-11-23 17:34:19'),
('a3d5eba854923c68a92ba7936414ab00f7df14e1a59ace5ec09f872e55257b9affa352e0b91a474b', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:23:25', '2022-07-23 20:23:25', '2023-07-23 16:23:25'),
('a471d2c858ac1ac2a1d3166b9b418b528a6249018fa8c2b406e45e1cb7a18fc2ab426a2e9912dd1c', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:43:50', '2022-08-12 16:43:50', '2023-08-12 12:43:50'),
('a47f132bf6de4310c4287ce676d9907ab90a5a15118fe65ce2e3c46d153865b9439667cf730f726a', 11, 3, 'Real Estate', '[]', 1, '2021-11-24 07:56:56', '2021-11-24 07:56:56', '2022-11-24 14:26:56'),
('a4bcca3e1934dc454bfe55b795f4d0c3968e0f6641cafbd444c5081544a9dc53bba40ef16b74f984', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:06:45', '2022-07-23 20:06:45', '2023-07-23 16:06:45'),
('a4d13393ed863ef70ccd85fabce762c0a7f92418f1deac9b3450101651cbd67e4a55226bcdc7e476', 1, 5, 'Real Estate', '[]', 0, '2022-07-16 22:54:09', '2022-07-16 22:54:09', '2023-07-16 18:54:09'),
('a5e027eef2cd61ad5fbf5dda1aa7c9d9be6c5ea016b92bbfee657f99b5969ef1ff31206010625c46', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:12:16', '2022-08-05 02:12:16', '2023-08-04 22:12:16'),
('a7e548b0bc88749c9ad439e3f53c1ccbdda66b6ad21420f5ed7f2dc633ccd2fd937388b93bd11a24', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 02:37:49', '2022-07-22 02:37:49', '2023-07-21 22:37:49'),
('a8802da787ac491aeba35ae7b57959b2fb4be771e76e01c5a4f6e567d9497819f09c6692af904c3a', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:47:40', '2022-08-04 23:47:40', '2023-08-04 19:47:40'),
('a89bfbffe609cc291de6913db2824ef18ebef33837932d3793f9dc2c97fe8532ff29d6016e97b938', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 01:30:11', '2022-08-12 01:30:11', '2023-08-11 21:30:11'),
('a91c11de07c1f82677943661ade762fececa13638c7232d0e9687ef603f866e87383fa1429b9703b', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:31:14', '2022-07-22 01:31:14', '2023-07-21 21:31:14'),
('aa58ed9b694ae9073cf4c7493e4ac225a740960c4d04880ed13c21dc6392e7cdb1e5324dcd5af9df', 60, 5, 'Real Estate', '[]', 0, '2022-08-13 21:13:21', '2022-08-13 21:13:21', '2023-08-13 17:13:21'),
('aafb674fb159f2d6dfda3a034b2cb50d3a42d96b16abbb6d2330f29d60ede0c89645dabdb6ae3cf4', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:30:23', '2022-07-30 15:30:23', '2023-07-30 11:30:23'),
('ab309c128582a6ed3ba2961dc68af20c92a0dd9ff8c3928e07a5733f4bc06e29336376a257c91fe8', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 01:51:00', '2022-07-22 01:51:00', '2023-07-21 21:51:00'),
('ab9b943ae95d06e855939ae0632a50c1f46ed0e82ef67495466f9728cbae0faf058d43a0d655b208', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 21:49:39', '2022-07-23 21:49:39', '2023-07-23 17:49:39'),
('ac421279b5df85f536f8459d3c692e26b931d498e01f16902f7442f04d49f91960cffec13c758ef0', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 23:10:37', '2022-07-28 23:10:37', '2023-07-28 19:10:37'),
('ad69bef058076f2bace8c81130d83ac5ce6589e6aaa080d7f2dab2b7417deb28358279af069ff0fa', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:49:59', '2022-08-05 02:49:59', '2023-08-04 22:49:59'),
('ae077dcdbc6a139b3a07f21ebe2fda550f01c5619af533dffacaa8ba64d116d4f4717909e51ebbac', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:44:42', '2022-07-19 14:44:42', '2023-07-19 10:44:42'),
('ae80abd162c921ba2c62d21dfcc790d6f5ca16a283070c6ea5b057e6663837930891670dfa12cd02', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:36:29', '2022-08-13 21:36:29', '2023-08-13 17:36:29'),
('af83ecd53ad900d0e0c3bb04aa60108e2b78efd8b5d910c5360cb13726614d7309b5be06170eb2d4', 4, 5, 'Real Estate', '[]', 0, '2022-08-15 18:52:48', '2022-08-15 18:52:48', '2023-08-15 14:52:48'),
('b0682eb684668f0158f7d51a6e61c28c765459bd6c7f8772f5e70ca42ae5ece0eefef7469ca9720c', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:10:56', '2022-08-07 03:10:56', '2023-08-06 23:10:56'),
('b1ce9a2195389bd4a8e97823f62ecfe0ca4b509c6e9230925a25468cec5206a9dd41acb53ddf3d7f', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 01:34:53', '2022-08-11 01:34:53', '2023-08-10 21:34:53'),
('b1f096231e3658c94d4364f1829306b1378b93951900a9a7cbe70f5b7e3c4d3ce571f699135d2fe8', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 19:03:13', '2022-07-23 19:03:13', '2023-07-23 15:03:13'),
('b2f69edb4ba62665505ba76aeb80bcf6855e7cab165fd500f062c54537bfc176d5ea7df40f90b93b', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 01:17:28', '2022-08-12 01:17:28', '2023-08-11 21:17:28'),
('b32e529f921aeed9cd866a5cc1c8cc9db55e476611f661d822e2fec44c0bad2e92198fb89d15eb28', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 23:50:53', '2022-08-07 23:50:53', '2023-08-07 19:50:53'),
('b3f414a485d942c5b7527037e9f6047cb9494c2876f0df47138b9b0586729307db865c18927982e5', 18, 3, 'Real Estate', '[]', 1, '2022-03-04 03:42:26', '2022-03-04 03:42:26', '2023-03-04 10:12:26'),
('b40480abfd642992267ee7f3533bfe39c90dd58b8d59d8930e500f9e8955f26e192b47bc4b5e1b6d', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 23:46:18', '2022-08-08 23:46:18', '2023-08-08 19:46:18'),
('b4ea270ba51881934fc8482e8674869d03cf18c0c4d903ac686465a12c51379b163bb8542dc8661c', 20, 3, 'Real Estate', '[]', 0, '2022-01-06 03:16:25', '2022-01-06 03:16:25', '2023-01-06 09:46:25'),
('b52ef94f85c09b2617ae920b5e257c7e68998d0f34e5aab5c32c370aaa8b2896a3a05c8959ea1636', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 11:01:42', '2021-11-23 11:01:42', '2022-11-23 17:31:42'),
('b5dc66313b9104c61e7a5140c7c020156f0612d85f9481d280ef23867e27a278df82d0e978e154de', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:13:43', '2022-08-08 01:13:43', '2023-08-07 21:13:43'),
('b6a83ed5175602a03b795cd4be5fdfad6c84fb1a709b450b46a0cf42468ff38e2b7f7ce85b6926c8', 36, 5, 'Real Estate', '[]', 0, '2022-05-26 04:40:34', '2022-05-26 04:40:34', '2023-05-26 11:10:34'),
('b6d7d8fbc2bfa0277d8ed371d1cc8f9fc0db676435359e954c67341f4ca713dbf54b91a6f88cef9d', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:22:56', '2022-08-12 17:22:56', '2023-08-12 13:22:56'),
('b853761ca03dd56782fe02fb2008e177dd18ace049c6a22295b3bb93e3c3f28d47bd9ea7bfcca1bb', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 21:13:23', '2022-07-23 21:13:23', '2023-07-23 17:13:23'),
('b8e7746439391c547fb2539ac175d9b1a32a50e025a2589bcc2dedd48363a7e4155a9c0e4b2f6b3f', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:04', '2022-07-28 02:02:04', '2023-07-27 22:02:04'),
('b9481e0cb4127ca9523eb0266a5801d1bb8d74c346ffea9a00427321574b49b9096c8d3ac1309d15', 21, 3, 'Real Estate', '[]', 0, '2022-03-17 02:14:13', '2022-03-17 02:14:13', '2023-03-17 08:44:13'),
('b9adefa6c292f565eac9c67dfdb4c35aedc6bcbf4faaad16831e9e42c3b57e3b5572c88dfca6d859', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:45:36', '2022-08-12 16:45:36', '2023-08-12 12:45:36'),
('b9bfb02800fcd4a092982314bc267823a183dcdae8c8d9e29394a08de3ab4983e39f0a5cf741cb10', 27, 5, 'Real Estate', '[]', 0, '2022-08-12 17:36:20', '2022-08-12 17:36:20', '2023-08-12 13:36:20'),
('ba5f663227c7b23f40f44817c221a292202f934b39c8d29dd3b5a71d90ab6d5ddbb789f2655a84e5', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:07:59', '2022-08-07 03:07:59', '2023-08-06 23:07:59'),
('bb791b44a5486450750f01a2f6712ba1b95f8d751e0daf8b2182fd4a7d8cc2e3bcef9ca53843f90d', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 02:49:31', '2022-08-07 02:49:31', '2023-08-06 22:49:31'),
('bc06c6e5d93b0830a0cc21a879cbdb8f9099a768d771ceab41ef73d6e9fc50e7cba35cbf422c87c1', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:30:30', '2022-08-05 20:30:30', '2023-08-05 16:30:30'),
('bc71a6777d64af12a635bdde109dfac6d1d1eded45407ccd3835b6b2f08e4b2e5a593533359b195e', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:44:07', '2022-08-12 16:44:07', '2023-08-12 12:44:07'),
('bda4cfcbdefae3cabbfb6ce72de233e419ce0dda896d9cb23434efad2aa0d738e5c69f6b11bd1765', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 19:01:37', '2022-07-23 19:01:37', '2023-07-23 15:01:37'),
('bdf3e763ba230109e82c808a95c140dd9d5da6c5a28bc74471c9c70d86464846fedf6d163c410d45', 62, 5, 'Real Estate', '[]', 0, '2022-08-14 20:10:48', '2022-08-14 20:10:48', '2023-08-14 16:10:48'),
('be085b3df6e5365188ab45855fedf51b3079315bbdb4943e50159417816c575e512136e7af7b68f8', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 22:09:53', '2022-07-22 22:09:53', '2023-07-22 18:09:53'),
('be33eddc9133f7ffac010335439a22aeee29b1ac5831b0f3ea8cc50b219d04f2845985d7708b9102', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 02:35:09', '2022-07-22 02:35:09', '2023-07-21 22:35:09'),
('be751193230eabffc4195eb90467c13bc4b2936d00f095a21cefbf4c62307250b56a893c05538f7f', 11, 3, 'Real Estate', '[]', 0, '2021-11-24 07:50:12', '2021-11-24 07:50:12', '2022-11-24 14:20:12'),
('bff186aebce8dac8b5c124da3990d064e96ebdb481fb8f2be31f4545949f9a94ded052bff4e20f81', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:05', '2022-07-28 02:02:05', '2023-07-27 22:02:05'),
('c1117d885aa23139871fb0203b09e133325b4d24d0b8d7ad7b8da2ee6f3083bf98b69522d9f49112', 4, 5, 'Real Estate', '[]', 0, '2022-08-15 19:21:45', '2022-08-15 19:21:45', '2023-08-15 15:21:45'),
('c137b750193cb2731f70a2c8fcae3ec32aa5dd96554b74905d389f0ff19383cf2af7a8f07f938861', 25, 3, 'Real Estate', '[]', 0, '2022-03-10 02:50:05', '2022-03-10 02:50:05', '2023-03-10 09:20:05'),
('c21e250dad0a08764e578b6d9d4136de9d31780637006b519afca4336ccb8bee074a89c8295a6956', 11, 3, 'Real Estate', '[]', 0, '2021-11-23 12:30:00', '2021-11-23 12:30:00', '2022-11-23 19:00:00'),
('c21f23b02e22d0d8cad171d85ca3ef93f1b0b3ae5549c26cf99e1248fa47923c5f5f7d286625a3bf', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:14:43', '2021-11-23 06:14:43', '2022-11-23 12:44:43'),
('c3402082f741c7aa05388d072a2064624e6ab115852227c9427c76480c33b84bfe72aa470d5cf67f', 4, 5, 'Real Estate', '[]', 0, '2022-06-19 14:57:14', '2022-06-19 14:57:14', '2023-06-19 10:57:14'),
('c34f0f36eebf7a5791ebae383df0f475cd8c1c3ce9252304be520a6b69d98d889fcd6b434ace3f6b', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 01:38:12', '2022-08-05 01:38:12', '2023-08-04 21:38:12'),
('c4226165a12af921a837d6d10adaea2ce37d1c61a0166244d5ec2355b1b99d7f9bb94774e8ee7d08', 60, 5, 'Real Estate', '[]', 0, '2022-08-13 21:13:30', '2022-08-13 21:13:30', '2023-08-13 17:13:30'),
('c47e8b6b441ba5e0996ebbb2c8e2d6daaaaf4276ac86236359a331b3c5fc3fa8507d1fc2abf1bb4b', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:59:22', '2022-07-30 13:59:22', '2023-07-30 09:59:22'),
('c4a5c15bb0745cc31723cd9abd40091bf400beabfadf3a445369d9e5ad54f45483db59cdde1b6952', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:02:00', '2022-07-28 02:02:00', '2023-07-27 22:02:00'),
('c4bbc06314f5703afe477be50911040a0ea9e86e86f9fe34ea8484b240179f7ed30c9a4bce8d4e7e', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:07:26', '2022-08-12 17:07:26', '2023-08-12 13:07:26'),
('c61deae413b7a4de9dc3ede921324bf69ca3660d79b8f41af219817ffbdda5468eae1b42eb125b0b', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 00:12:25', '2022-08-03 00:12:25', '2023-08-02 20:12:25'),
('c6e26c1ca4bac80bf4afe2ffd571856daf8ef5fde0e4a4eea7ab67cc169152441779009a8379d51b', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:24:51', '2022-08-05 20:24:51', '2023-08-05 16:24:51'),
('c70adb0f11e12007e55f2992c9201f86916cb3fa8fb2c51f70f85f7b03cdb7912300a332511f39ef', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:37:36', '2022-08-05 20:37:36', '2023-08-05 16:37:36'),
('c79b6d88eab453c00303576b16da208ca6bde62e9679261758e7dd8957ed38e4be46a41de14d18e8', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 21:48:18', '2022-08-13 21:48:18', '2023-08-13 17:48:18'),
('c7a45e412e5508468737628f53e3ea96c9ed99fca93ea0909d6a6095c40e8a431ee53b78ea229e52', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 21:12:16', '2022-08-07 21:12:16', '2023-08-07 17:12:16'),
('c7cd9d6a665f0f81a89f8143b4f81f911add977050e61129f07dfac9659d07ee138dc7beb8d49e5e', 26, 3, 'Real Estate', '[]', 0, '2022-03-22 03:27:37', '2022-03-22 03:27:37', '2023-03-22 09:57:37'),
('c822f2fd539c410aac33b62c23c0bc49caa2f1475d589d72bfe705dbb868ab769605a64b00d4ccbc', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:19:13', '2021-11-23 06:19:13', '2022-11-23 12:49:13'),
('c862e872152f4ae8bddfd97ea8f82040d9fe58c510a931bdacbafda1673d03b1e6307b847d08a6e5', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 04:33:33', '2022-08-07 04:33:33', '2023-08-07 00:33:33'),
('c93da8fe52263a41db52307fd548fc7df4585b0af4124a8f79a81420fe36123f4e2c915f38f60426', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 20:52:43', '2022-08-08 20:52:43', '2023-08-08 16:52:43'),
('c94eeaaf6e9071ea7bc9d5cc58209940230a33481530e65cd30cafb18d09f9b5b0d8cbbfed2530e7', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 16:19:13', '2022-07-30 16:19:13', '2023-07-30 12:19:13'),
('cbae555477bcfa7294a44603f68e27cf3517e2c229573e0c06a360746355b2feb4c652b69b328376', 4, 5, 'Real Estate', '[]', 0, '2022-08-02 00:26:10', '2022-08-02 00:26:10', '2023-08-01 20:26:10'),
('cce134ed1245c898ce04e1edd5cc1ffaae9a22df6f4c1af18a5a6fb67c2fa65debf7d470fa600cf7', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 06:37:18', '2021-11-23 06:37:18', '2022-11-23 13:07:18'),
('cd33767efceff4a78f218bccb2a5a450a7b401af618e5a919d1ae9c3806c6c0b0beeac247739aca9', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 20:49:05', '2022-08-05 20:49:05', '2023-08-05 16:49:05'),
('ce9aefcdfa3a4b09ed42a4c75d4c54439cb92d39069e244e0ec35817d14b38a8ecbf9bb8adba3905', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 19:03:39', '2022-07-23 19:03:39', '2023-07-23 15:03:39'),
('cecffb6d6607cb8b22896c21dc03cda1d9c5a01cdd9318acf6c3f19d3412f640b4f23eb80d1b4557', 27, 5, 'Real Estate', '[]', 0, '2022-08-12 18:07:15', '2022-08-12 18:07:15', '2023-08-12 14:07:15'),
('d1cc70bdac07dca520a1d40c784351f211011167796206840f27ed6c98331f31e878d967d3f16b84', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:59', '2022-07-28 02:01:59', '2023-07-27 22:01:59'),
('d3bdf7c5e4d2ca1a3ffe083c67dade8ea7d2d76d09812412f2a555ce42a377b0a3c58cbad44c89f7', 11, 3, 'Real Estate', '[]', 0, '2021-11-23 06:27:18', '2021-11-23 06:27:18', '2022-11-23 12:57:18'),
('d3f93eb7a0f3561aacb7e01c4c3db87ac91a20ffe950bce8e24ada77e0a6079ac350ff4fcbbec5ac', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 19:47:40', '2022-08-05 19:47:40', '2023-08-05 15:47:40'),
('d41466b1797de260e5b6e43d16372bee319aa4537ade27164cfbf143eb35e9cf448a1ea40d0f0bdc', 11, 3, 'Real Estate', '[]', 1, '2021-11-23 11:37:38', '2021-11-23 11:37:38', '2022-11-23 18:07:38'),
('d43f3b975863e69b7bbea0f3a4f58dad741a1154ce84780522dcfc5d212084fd0a892d8e6dc34cb4', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:58:39', '2022-08-12 16:58:39', '2023-08-12 12:58:39'),
('d46493d5ae8041ab190545f72318cfcf3ea98bcc1e40034546a185b27cf3f73dca0830fe5a9f161d', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 21:10:25', '2022-08-07 21:10:25', '2023-08-07 17:10:25'),
('d50f51b9e93b506a3ca87ac5ed95d59a6e3d4f5f6d72a135879a99f08572a7dbf59ad582a617b639', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 20:54:31', '2022-08-07 20:54:31', '2023-08-07 16:54:31'),
('d5c9940c2159452a5abed13e548bd82b532cb0042438a9743c352e9c238ab32d94b72e9b3a4e5b9d', 4, 5, 'Real Estate', '[]', 0, '2022-08-02 00:23:48', '2022-08-02 00:23:48', '2023-08-01 20:23:48'),
('d78870fcb9c17a3c4c5033b8fddc8fe822a2eb0fae2ec35e7d42566bcbdf5eacc4b847e6d706cd3e', 4, 5, 'Real Estate', '[]', 0, '2022-07-20 01:40:31', '2022-07-20 01:40:31', '2023-07-19 21:40:31'),
('d7b2239dbb5857bf3b9510caee009f02d9b2ced49eff4e95b35385316085e06fcd387e9d93778bc1', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:34:25', '2022-08-13 21:34:25', '2023-08-13 17:34:25'),
('d8b57dea3845007712e637b01ac1d56ae5eed52f5e7394e10292ed302613baf8e3afaaff99aba477', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:56', '2022-07-28 02:01:56', '2023-07-27 22:01:56'),
('db2aeacaa373fe9069db91e82426ba322930fdafd0f9f3abd2b65c7ae88e8d128381dd32cffe53fb', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 03:26:33', '2022-08-05 03:26:33', '2023-08-04 23:26:33'),
('dbeabc09be26ab467d60f483da9a77296d4cd814c09717d09f24a3b81bf27289d989ed1f5a59a381', 4, 5, 'Real Estate', '[]', 0, '2022-07-16 23:01:54', '2022-07-16 23:01:54', '2023-07-16 19:01:54'),
('dc83bd183637e6d2fc4a611638b051f6054264eaa574d6b4bcb6566ccc24e397b0ab0d31fe5cce72', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 18:03:01', '2022-07-19 18:03:01', '2023-07-19 14:03:01'),
('dc9184c45dcbec176e27272bbccaf13c318e5efdee3d7a0352495066f6ab996a4c1a12dcbe577025', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 18:59:52', '2022-07-23 18:59:52', '2023-07-23 14:59:52'),
('dc9b322b3a88a0d9df9b70ef9129c66442028ff03d2db6b469bb62cb0d1942421d551abba4efc6f2', 20, 3, 'Real Estate', '[]', 0, '2022-01-05 11:16:04', '2022-01-05 11:16:04', '2023-01-05 17:46:04'),
('dca6372afab12ffb8dcf331d4d966851cbb0f9def5f75c437700ba6bd51e9b8906b2c95a12ee0df6', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 22:54:54', '2022-07-23 22:54:54', '2023-07-23 18:54:54'),
('dcdc3c65b20d58100064dab24d89c012abcd1dbe4f687bf99923fc1eff7fd54d78d4dc5dd1bdfef5', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 20:48:36', '2022-07-30 20:48:36', '2023-07-30 16:48:36'),
('dce1f231ba47ee484d44b7d0a64653bbb55997a3248270d6d438f07803f71e3f7fa2583f287cdd8b', 4, 5, 'Real Estate', '[]', 0, '2022-08-09 19:51:48', '2022-08-09 19:51:48', '2023-08-09 15:51:48'),
('dd8969ffd9d21385c51da84b90b96ad9ac5982f90a7b24cca810b3bf16b666644550fbf3bf6fbc9f', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 18:16:54', '2022-08-12 18:16:54', '2023-08-12 14:16:54'),
('ddda0c549fa64da10d6a1b8ba1e00435c4a7aefc8bda0b01e4dec832df7770b60267573a055ac0fa', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:57:46', '2022-08-07 03:57:46', '2023-08-06 23:57:46'),
('dde1f400d2b21f13d1bb8a0981451a7892d86b1156b39fb5846605d5126d14a705fd26ea03fe8633', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:33:30', '2022-07-19 14:33:30', '2023-07-19 10:33:30'),
('dfe352a793b27e23a2dea8d37c5be7412b612b561ccb583201f4e01d2c79268dc8c406e32ecd0241', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:12:11', '2022-08-07 03:12:11', '2023-08-06 23:12:11'),
('e15bb470952bc5edd668ebca082bf81022f79ea614e2e721dc774defb2b45d64bf5f023352862ae4', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 21:44:14', '2022-08-13 21:44:14', '2023-08-13 17:44:14'),
('e32d01a3d0fc255002c0739ef4fc2d7d0b25a27cf2ccc89b60f52c263491ae860c693e032f863eb4', 4, 5, 'Real Estate', '[]', 0, '2022-08-08 01:13:41', '2022-08-08 01:13:41', '2023-08-07 21:13:41'),
('e3c1151fd815512cb4d1893be7e4c5ce0f59581a7cf46386e77c84832cfe8c8069598acc98dfa4ab', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 01:29:55', '2022-07-23 01:29:55', '2023-07-22 21:29:55'),
('e4b01f550867eadb72f7196f4f8173cef14acd4936d35acc8d9d151a70ad5274856b4a4d81063984', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 01:28:25', '2022-07-23 01:28:25', '2023-07-22 21:28:25'),
('e64904c6dc3c5753eab62353cda3dbf835ab0657a956dd1f507ef65bec3acab7e09bd2da2888d04e', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:58:52', '2022-08-13 21:58:52', '2023-08-13 17:58:52'),
('e64c7875753a61aef2acb652cc1bb0b8365d4f486efe39440d8752c77bcf6a17d5e7768ad92fc181', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:22:43', '2022-07-23 20:22:43', '2023-07-23 16:22:43'),
('e664ba176318954494756941e22264a0b1f4d802f087d02d1269b9b6167d836272b0534ac64f2af1', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:32:16', '2022-07-30 15:32:16', '2023-07-30 11:32:16'),
('e66f8c8dd8845063290ed730258458cc18b53c7230fad765e442ee5dcea5e3d8ba1fc510744c12b4', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 00:36:50', '2022-07-22 00:36:50', '2023-07-21 20:36:50'),
('e6c762c6d3cfd6cc977d80ed296bb1a7b6349360d8869806e8833d7b6443bad272bd3e0f99f44154', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 18:45:32', '2022-08-12 18:45:32', '2023-08-12 14:45:32'),
('e72b340a9f0a522f69f4086575c6051aa309c802ef37490b56ea7a94920cf9ac6c3b28028a508583', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:17:25', '2022-08-03 03:17:25', '2023-08-02 23:17:25'),
('e7526adf217a577a4f3ecaf3441a1400945fafa9223ea8fb9fdf4802efb458b30651d503c1b567e6', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:03:51', '2022-07-30 15:03:51', '2023-07-30 11:03:51'),
('e8189f525a1bb3469c7e03e61a1c4aab3d709ebe7b284ccad383a4289362e65e2a6755cddcb103ab', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 19:07:45', '2022-08-13 19:07:45', '2023-08-13 15:07:45'),
('e81d4d12494363b689100eae1dc6238e56df3fba1e3be35d205fd5111bbd4eb7926b55b9b05a76f9', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 14:34:28', '2022-07-19 14:34:28', '2023-07-19 10:34:28'),
('e83f780370f699016e39f589496a5e3758c459a2bfa65b3c944a805b4b199ca340a7f623a0d92e48', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 03:11:03', '2022-08-07 03:11:03', '2023-08-06 23:11:03'),
('e9389e6043fa292e3e9ab1095b8012e00646baf46f52c6f40f51d4e78e48d20bcc68b18d363b719d', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:35:40', '2022-08-13 21:35:40', '2023-08-13 17:35:40'),
('ea3dce2c5beb234d82d9a47a60d8b165fb612f4f50b83156e87dfcee9d249a21331375912eca6f6f', 4, 5, 'Real Estate', '[]', 0, '2022-07-28 02:01:57', '2022-07-28 02:01:57', '2023-07-27 22:01:57'),
('eb529c9863bada5e8f899492c8873ec5591a2827b9e071687c32f944d4291ba2375a2246e8748860', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 17:53:28', '2022-07-19 17:53:28', '2023-07-19 13:53:28'),
('ec2755105f9d0385f75bcba41ccb11f38de0ac36489b973f85db67db49d166c367cefcd839282a6e', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:45:18', '2022-08-12 16:45:18', '2023-08-12 12:45:18'),
('ecaea38c95447a10e824082d827c5f62aadaa2b8c4993391c677d1dec25895f9e6e857e152c271cb', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:30:52', '2022-07-30 15:30:52', '2023-07-30 11:30:52'),
('ecb10b96a9319a37874764c8608a36a1f9c2aa0772e7e227898df5fcf8350dd5460d87af2519599a', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 15:34:10', '2022-07-30 15:34:10', '2023-07-30 11:34:10'),
('ecbea84aeda3e599e66cb21aeed83fdb731d026269102d73789eb41e22c3b1d09760b6663534bd9a', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 00:38:35', '2022-07-22 00:38:35', '2023-07-21 20:38:35'),
('ee17787e79ac8fdd6d0e6a10e975f75f95c4c481f0496a642120a7e136652e80146097fcb65eccb6', 4, 5, 'Real Estate', '[]', 0, '2022-08-07 04:16:36', '2022-08-07 04:16:36', '2023-08-07 00:16:36'),
('ef1b604e81c8d5dc344762fb29cf4ec2c6db4c3185a46462f9529cc3e890222d50373bd2487f09ab', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:25:35', '2022-08-12 16:25:35', '2023-08-12 12:25:35'),
('ef369f2fb46c2a6ad72645b507f334b2bf3b4f4d2ca7d667fcabf2aec0b36c0b14fa23e2c59ab82e', 11, 1, 'Real Estate', '[]', 0, '2021-11-23 06:12:50', '2021-11-23 06:12:50', '2022-11-23 12:42:50'),
('efa00ba7ffb5ac9d788aaa36d2e3cb4a4bcbd201b025b26103ba8b04f3e7e7c73939083e273eb2ee', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:14:58', '2022-08-12 17:14:58', '2023-08-12 13:14:58'),
('f1128a69c88664ab21bfdd4b9537cc2dec2e8e564ee2bb7cb374604aea880f2525176d53fe0df347', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 14:00:52', '2022-07-30 14:00:52', '2023-07-30 10:00:52'),
('f16fef3db097da3538ee168d48e520b871c5e4e80b72c2141a692ebbf88a02b0469d7e96edc904b1', 4, 5, 'Real Estate', '[]', 0, '2022-08-04 23:50:41', '2022-08-04 23:50:41', '2023-08-04 19:50:41'),
('f217e81e99da4bbff43f0857d4c1db4477afae49ec376e0d3193df9d27aa8d56051187e164493348', 62, 5, 'Real Estate', '[]', 0, '2022-08-13 21:37:08', '2022-08-13 21:37:08', '2023-08-13 17:37:08'),
('f40a0e5e848b40da73d2e2b9d55592e757fb7931adc479f040023cf96b8aafe8dccbe8c14d97f381', 63, 5, 'Real Estate', '[]', 0, '2022-08-15 18:28:13', '2022-08-15 18:28:13', '2023-08-15 14:28:13'),
('f4c0b1a694578c2b399d87e67f68ee5bbdb8b4d6fa8ef0ac6ebd6aa09c5800ed728f1d62d0453541', 4, 5, 'Real Estate', '[]', 0, '2022-07-22 22:11:27', '2022-07-22 22:11:27', '2023-07-22 18:11:27'),
('f5b47a6b05c73a38bb5aa7aaa5f9d85e98cef494301a785ce33a16a17c097181eae66bc39143e2b8', 4, 5, 'Real Estate', '[]', 0, '2022-07-19 17:15:24', '2022-07-19 17:15:24', '2023-07-19 13:15:24'),
('f6625c97011c78fd0aa54049878c595300575746bc7aca4a45fa321fbffafe301601ba0ac108c991', 4, 5, 'Real Estate', '[]', 0, '2022-08-05 02:05:26', '2022-08-05 02:05:26', '2023-08-04 22:05:26'),
('f69a1a241817127eb80fd7c1e53242a44577a3e068495903e606da983c46a4e8d6434287796a33bc', 4, 5, 'Real Estate', '[]', 0, '2022-07-02 00:15:51', '2022-07-02 00:15:51', '2023-07-01 20:15:51'),
('f6d27295070d2987ed608b0be50df2e88380faab75419b7235cef4a06006c1a76598be7840dd25c2', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 17:00:06', '2022-08-12 17:00:06', '2023-08-12 13:00:06'),
('f7ad28605a02ae1502a9a551aee63e08c9c7364776e3967ce486330638eaa4723df51f778e1f38c9', 4, 5, 'Real Estate', '[]', 0, '2022-08-13 00:46:19', '2022-08-13 00:46:19', '2023-08-12 20:46:19'),
('f7e9e425c6796030a0c6bfa086d1a6af08b495699a43417010c18519fede90825fe4e2f6b034871b', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 14:53:48', '2022-08-11 14:53:48', '2023-08-11 10:53:48'),
('f949b80d7b5c1c8f4a2290b040641ed3ec66f652526ead08ab95c7199f6d02d7c46206cc1680a7fb', 4, 5, 'Real Estate', '[]', 0, '2022-07-21 01:10:44', '2022-07-21 01:10:44', '2023-07-20 21:10:44'),
('f9ec7622cd11c934b9d4c7b980d75ef2b32e99825313e3c6074527ac0c1572ad186190548664b5a0', 4, 5, 'Real Estate', '[]', 0, '2022-08-12 16:59:44', '2022-08-12 16:59:44', '2023-08-12 12:59:44'),
('fb73a854858f58cc39556d070e2e8d1cbda2ada9465e783e4d4137484e016a1c778b277f6c1acb30', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 13:37:51', '2022-07-30 13:37:51', '2023-07-30 09:37:51'),
('fc340916fa2ba0867ff66c710e8c38f5ec4829af564c5f51f9a28d2098df64c4fb2965c5192fdea1', 4, 5, 'Real Estate', '[]', 0, '2022-07-23 20:24:03', '2022-07-23 20:24:03', '2023-07-23 16:24:03'),
('fc3b1587949ace417b5b77f38307e00ce2b2891c1a3b9d2129609612f9f7ddac19affe5adc45301d', 4, 5, 'Real Estate', '[]', 0, '2022-07-29 00:09:10', '2022-07-29 00:09:10', '2023-07-28 20:09:10'),
('fd18fd83e146b6368ab6d2be932eb8d88fba9b883b529457ff4fc286becbfb0fb0b627b492f2b07b', 4, 5, 'Real Estate', '[]', 0, '2022-07-30 21:05:11', '2022-07-30 21:05:11', '2023-07-30 17:05:11'),
('ff57e3073d25795595190b9cc4669cdf4c0c7989643f819b639238ecf64647af8f00ee09e4d7bcb8', 4, 5, 'Real Estate', '[]', 0, '2022-08-11 19:59:12', '2022-08-11 19:59:12', '2023-08-11 15:59:12'),
('ff59dc18040fec2d5cf7afd92e5b2ba19c2aae86c8c0c8729b6838e95297d77a2ab71baf38d0fd69', 4, 5, 'Real Estate', '[]', 0, '2022-08-03 03:18:48', '2022-08-03 03:18:48', '2023-08-02 23:18:48'),
('ff5ad497ef6c3ec1aad64b0a7b7e3dbe8240300b6477c41254696b7004ec86b78fd608d848329999', 1, 3, 'Real Estate', '[]', 0, '2021-12-07 08:09:09', '2021-12-07 08:09:09', '2022-12-07 14:39:09'),
('ffac38ed1b86e6029a9af1bf8a3008597c9536e04955095033f78185a81ad476d9dbb86ec2fa9c06', 1, 5, 'Real Estate', '[]', 1, '2022-06-06 08:24:41', '2022-06-06 08:24:41', '2023-06-06 14:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'BRba3wdyLUmKYNuPftc2imici2Q15iNhZD2cISRw', NULL, 'http://localhost', 1, 0, 0, '2021-11-23 03:54:42', '2021-11-23 03:54:42'),
(2, NULL, 'Laravel Password Grant Client', 'b97TNPWqJvL0iJNLP07rPRbFSf6prSKldSu4HAnW', 'users', 'http://localhost', 0, 1, 0, '2021-11-23 03:54:42', '2021-11-23 03:54:42'),
(3, NULL, 'Laravel Personal Access Client', 'jTQPRRdy9zj8bZrlEpoKWtpjcfsGUTW2NhySdF3S', NULL, 'http://localhost', 1, 0, 0, '2021-11-23 06:21:08', '2021-11-23 06:21:08'),
(4, NULL, 'Laravel Password Grant Client', 'vzVarAVuPNTuC3MFdXL50S7Kg65EAh8uCuTLdEd3', 'users', 'http://localhost', 0, 1, 0, '2021-11-23 06:21:08', '2021-11-23 06:21:08'),
(5, NULL, 'Laravel Personal Access Client', 'X6ohUzh5pLMpXaVH4nfRGlnzUYv7r8v7bKUn0sZn', NULL, 'http://localhost', 1, 0, 0, '2022-05-24 10:41:17', '2022-05-24 10:41:17'),
(6, NULL, 'Laravel Password Grant Client', 'BLFCQnikLo8iGgCZJFetu13yid1kP3Ox8E1ZBzyx', 'users', 'http://localhost', 0, 1, 0, '2022-05-24 10:41:17', '2022-05-24 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-23 03:54:42', '2021-11-23 03:54:42'),
(2, 3, '2021-11-23 06:21:08', '2021-11-23 06:21:08'),
(3, 5, '2022-05-24 10:41:17', '2022-05-24 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partations`
--

CREATE TABLE `partations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bath_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partations`
--

INSERT INTO `partations` (`id`, `properties_id`, `type`, `bed_room`, `bath_room`, `carpark`, `created_at`, `updated_at`) VALUES
(12, 14, '2', '6', '9', '1', '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(13, 15, '1', '1', '1', '1', '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(18, 20, '2', '1', '1', '1', '2021-09-23 04:49:09', '2021-09-23 04:49:09'),
(19, 21, '2', '1', '1', '1', '2021-09-23 04:50:44', '2021-09-23 05:22:40'),
(32, 34, '2', '1', '1', '1', '2021-09-24 09:34:56', '2021-09-26 09:30:35'),
(33, 35, '2', '3', '2', '1', '2021-09-24 09:57:20', '2021-11-05 08:27:00'),
(34, 36, '2', '3', '3', '1', '2021-09-27 09:27:02', '2021-09-27 11:29:06'),
(35, 37, '2', '6', '2', '1', '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(36, 38, '2', '6', '2', '1', '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(37, 39, '2', '5', '5', '1', '2021-09-27 09:48:34', '2021-09-28 09:13:16'),
(38, 40, '2', '4', '3', '1', '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(39, 41, '2', '3', '2', '1', '2021-09-28 09:21:29', '2021-10-04 10:56:00'),
(40, 42, '2', '5', '3', '1', '2021-09-28 09:49:27', '2021-09-28 09:59:44'),
(41, 43, '2', '3', '3', '1', '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(42, 44, '2', '1', '1', '1', '2021-09-28 10:02:17', '2021-09-28 10:46:15'),
(43, 45, '2', '1', '1', '1', '2021-09-28 10:47:52', '2021-09-28 10:48:54'),
(44, 46, '2', '5', '7', '1', '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(45, 48, '2', '4', '4', '1', '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(46, 49, '2', '3', '3', '1', '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(47, 50, '2', '3', '3', '1', '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(48, 51, '2', '5', '4', '1', '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(49, 52, '2', '2', '3', '4', '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(69, 80, '1', NULL, NULL, '1', '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(70, 81, '1', NULL, NULL, '1', '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(71, 82, '1', NULL, NULL, '1', '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(72, 83, '1', NULL, NULL, '1', '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(73, 84, '1', NULL, NULL, '1', '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(74, 85, '1', NULL, NULL, '1', '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(75, 91, '1', NULL, NULL, '1', '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(76, 92, '1', NULL, NULL, '1', '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(77, 94, '1', NULL, NULL, '1', '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(78, 95, '1', NULL, NULL, '1', '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(80, 97, '1', NULL, NULL, '2', '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(81, 98, '1', NULL, NULL, '1', '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(82, 99, '1', NULL, NULL, NULL, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(83, 100, '2', '6', '2', NULL, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(84, 103, '2', '7', '8', NULL, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(85, 104, '2', '2', '3', NULL, '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(86, 105, '2', '5', '6', NULL, '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(87, 106, '1', NULL, NULL, NULL, '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(88, 107, '2', '2', '4', NULL, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(89, 108, '2', '8', '7', NULL, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(90, 109, '2', '9', '3', NULL, '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(91, 110, '2', '3', '2', NULL, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(92, 111, '1', NULL, NULL, NULL, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(93, 112, '1', NULL, NULL, NULL, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(94, 113, '2', '3', '1', NULL, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(95, 114, '2', '4', '2', NULL, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(96, 115, '1', NULL, NULL, NULL, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(97, 116, '2', '2', '1', NULL, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(99, 118, '2', '3', '2', NULL, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(100, 119, '2', '3', '2', NULL, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(101, 120, '2', '2', '1', NULL, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(102, 123, '2', '2', '1', NULL, '2022-07-19 20:56:31', '2022-07-23 17:10:31'),
(103, 124, '1', NULL, NULL, NULL, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(154, 175, '2', '3', '2', NULL, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(155, 176, '2', '2', '1', NULL, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(156, 177, '2', '3', '1', NULL, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(157, 178, '2', '6', '6', NULL, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(158, 179, '1', NULL, NULL, NULL, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(159, 180, '2', '2', '1', NULL, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(160, 181, '1', NULL, NULL, NULL, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(161, 182, '2', '2', '1', NULL, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(163, 184, '1', NULL, NULL, NULL, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(164, 185, '2', '2', '1', NULL, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(165, 186, '2', '2', '2', NULL, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(166, 187, '2', '2', '2', NULL, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(167, 188, '2', '2', '2', NULL, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(168, 189, '2', '2', '2', NULL, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(169, 190, '1', NULL, NULL, NULL, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(170, 191, '2', '3', '1', NULL, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(171, 192, '2', '2', '1', NULL, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(172, 193, '2', '2', '2', NULL, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(173, 194, '2', '1', '1', NULL, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(174, 195, '2', '2', '2', NULL, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(201, 227, '1', NULL, NULL, NULL, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(208, 234, '1', NULL, NULL, NULL, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(213, 239, '1', NULL, NULL, NULL, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(217, 244, '1', NULL, NULL, NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(218, 245, '1', NULL, NULL, NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(219, 246, '1', NULL, NULL, NULL, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(222, 249, '2', '4', '2', NULL, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(223, 250, '1', NULL, NULL, NULL, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(224, 252, '1', NULL, NULL, NULL, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(225, 254, '2', '2', '1', NULL, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(226, 255, '2', '2', '1', NULL, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(227, 256, '2', '2', '1', NULL, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(228, 259, '2', '2', '1', NULL, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(229, 262, '2', '3', '2', NULL, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(230, 264, '2', '4', '2', NULL, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(231, 266, '1', NULL, NULL, NULL, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(232, 267, '2', '2', '2', NULL, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(233, 269, '2', '2', '1', NULL, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(234, 270, '2', '2', '2', NULL, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(235, 271, '2', '6', '2', NULL, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(236, 272, '2', '2', '2', NULL, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(237, 274, '1', NULL, NULL, NULL, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(238, 275, '1', NULL, NULL, NULL, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(239, 277, '1', NULL, NULL, NULL, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(240, 278, '2', '2', '2', NULL, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(241, 280, '2', '2', '1', NULL, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(242, 281, '2', '2', '2', NULL, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(243, 282, '1', NULL, NULL, NULL, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(244, 283, '2', '2', '2', NULL, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(245, 284, '2', '2', '2', NULL, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(246, 285, '2', '2', '2', NULL, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(247, 286, '2', '2', '2', NULL, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(248, 287, '2', '2', '2', NULL, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(249, 288, '2', '2', '2', NULL, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(250, 289, '2', '3', '2', NULL, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(251, 290, '2', '3', '2', NULL, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(253, 292, '1', NULL, NULL, NULL, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(268, 307, '2', '4', '3', NULL, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(270, 309, '2', '2', '1', NULL, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(271, 310, '2', '2', '1', NULL, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(272, 311, '2', '3', '1', NULL, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(275, 314, '2', '3', '3', NULL, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(276, 315, '1', NULL, NULL, NULL, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(277, 316, '2', '1', '2', NULL, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(279, 318, '1', NULL, NULL, NULL, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(280, 319, '1', NULL, NULL, NULL, '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(281, 320, '1', NULL, NULL, NULL, '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(282, 321, '1', NULL, NULL, NULL, '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(283, 322, '1', NULL, NULL, NULL, '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(284, 323, '1', NULL, NULL, NULL, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(285, 324, '1', NULL, NULL, NULL, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(286, 325, '1', NULL, NULL, NULL, '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(287, 326, '1', NULL, NULL, NULL, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(288, 327, '1', NULL, NULL, NULL, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(289, 328, '1', NULL, NULL, NULL, '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(290, 329, '1', NULL, NULL, NULL, '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(291, 330, '1', NULL, NULL, NULL, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(292, 331, '1', NULL, NULL, NULL, '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(293, 332, '1', NULL, NULL, NULL, '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(294, 333, '1', NULL, NULL, NULL, '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(295, 334, '1', NULL, NULL, NULL, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(296, 335, '1', NULL, NULL, NULL, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(297, 336, '1', NULL, NULL, NULL, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(326, 368, '1', NULL, NULL, NULL, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_type` int(11) DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `properties_id`, `purchase_type`, `installment`, `created_at`, `updated_at`) VALUES
(12, 14, 1, 0, '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(13, 15, 2, 1, '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(18, 20, 1, 1, '2021-09-23 04:49:09', '2021-09-23 04:49:09'),
(19, 21, 2, 0, '2021-09-23 04:50:44', '2021-09-23 05:22:40'),
(32, 34, 1, 0, '2021-09-24 09:34:56', '2021-09-26 09:30:35'),
(33, 35, 1, 0, '2021-09-24 09:57:20', '2021-11-05 08:27:00'),
(34, 36, 2, 1, '2021-09-27 09:27:02', '2021-09-27 09:27:02'),
(35, 37, 2, 0, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(36, 38, 1, 1, '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(37, 39, 2, 0, '2021-09-28 05:32:36', '2021-09-28 05:32:36'),
(38, 40, 2, 1, '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(39, 41, 1, 0, '2021-09-28 09:21:29', '2021-09-28 09:27:22'),
(40, 42, 1, 0, '2021-09-28 09:49:27', '2021-09-28 09:59:45'),
(41, 43, 2, 0, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(42, 44, 2, 0, '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(43, 45, 1, 1, '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(44, 46, 2, 0, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(45, 47, 2, 0, '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(46, 48, 2, 1, '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(47, 49, 1, 1, '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(48, 50, 1, 1, '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(49, 51, 1, 0, '2021-10-11 05:27:25', '2021-10-11 05:28:34'),
(50, 52, 2, 1, '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(70, 80, 1, 1, '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(71, 81, 1, 1, '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(72, 82, 1, 1, '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(73, 83, 1, 1, '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(74, 84, 1, 1, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(75, 85, 1, 1, '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(81, 91, 1, 1, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(82, 92, 1, 1, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(83, 93, 1, 1, '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(84, 94, 1, 1, '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(85, 95, 1, 1, '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(87, 97, 1, 1, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(88, 98, 1, 1, '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(89, 99, 3, 0, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(90, 100, 1, 0, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(91, 103, 1, 0, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(92, 104, 1, 1, '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(93, 105, 3, 1, '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(94, 106, 1, 0, '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(95, 107, 3, 1, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(96, 108, 2, 0, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(97, 109, 3, 1, '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(98, 110, 1, 1, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(99, 111, 1, 1, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(100, 112, 1, 1, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(101, 113, 3, 1, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(102, 114, 1, 1, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(103, 115, 1, 1, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(104, 116, 1, 0, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(106, 118, 1, 0, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(107, 119, 1, 1, '2022-07-19 20:30:55', '2022-07-23 21:44:36'),
(108, 120, 1, 0, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(109, 121, 2, 1, '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(110, 122, 1, 1, '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(111, 123, 1, 1, '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(112, 124, 1, 1, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(163, 175, 1, 1, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(164, 176, 1, 1, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(165, 177, 1, 1, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(166, 178, 1, 1, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(167, 179, 1, 1, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(168, 180, 1, 0, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(169, 181, 1, 0, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(170, 182, 1, 0, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(172, 184, 1, 0, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(173, 185, 1, 0, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(174, 186, 1, 1, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(175, 187, 1, 1, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(176, 188, 1, 1, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(177, 189, 1, 1, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(178, 190, 1, 1, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(179, 191, 1, 0, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(180, 192, 1, 0, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(181, 193, 1, 0, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(182, 194, 1, 0, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(183, 195, 1, 0, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(184, 196, 1, 1, '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(185, 197, 1, 1, '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(186, 198, 1, 1, '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(187, 199, 1, 1, '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(188, 200, 1, 1, '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(215, 227, 1, 0, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(222, 234, 1, 0, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(227, 239, 1, 0, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(230, 242, 2, 1, '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(232, 244, 2, 1, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(233, 245, 2, 1, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(234, 246, 2, 1, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(237, 249, 1, 1, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(238, 250, 1, 1, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(239, 251, 1, 1, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(240, 252, 1, 1, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(241, 253, 1, 1, '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(242, 254, 1, 1, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(243, 255, 2, 1, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(244, 256, 2, 1, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(245, 257, 1, 1, '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(246, 258, 2, 1, '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(247, 259, 2, 1, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(248, 260, 2, 1, '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(250, 262, 1, 0, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(251, 263, 2, 0, '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(252, 264, 1, 0, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(253, 265, 2, 0, '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(254, 266, 1, 0, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(255, 267, 1, 1, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(256, 268, 1, 0, '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(257, 269, 1, 0, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(258, 270, 1, 1, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(259, 271, 1, 0, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(260, 272, 1, 1, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(261, 273, 1, 0, '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(262, 274, 1, 0, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(263, 275, 2, 1, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(264, 276, 1, 0, '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(265, 277, 1, 1, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(266, 278, 1, 1, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(267, 279, 1, 0, '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(268, 280, 1, 1, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(269, 281, 1, 1, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(270, 282, 2, 1, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(271, 283, 1, 1, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(272, 284, 1, 0, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(273, 285, 1, 0, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(274, 286, 1, 0, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(275, 287, 1, 0, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(276, 288, 1, 0, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(277, 289, 1, 0, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(278, 290, 1, 0, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(280, 292, 1, 1, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(295, 307, 3, 0, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(297, 309, 2, 0, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(298, 310, 2, 0, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(299, 311, 3, 0, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(302, 314, 1, 0, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(303, 315, 2, 1, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(304, 316, 2, 1, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(306, 318, 2, 1, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(307, 319, 1, 1, '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(308, 320, 1, 1, '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(309, 321, 1, 1, '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(310, 322, 1, 1, '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(311, 323, 1, 0, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(312, 324, 1, 0, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(313, 325, 2, 1, '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(314, 326, 1, 1, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(315, 327, 1, 1, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(316, 328, 2, 1, '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(317, 329, 2, 1, '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(318, 330, 2, 1, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(319, 331, 2, 1, '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(320, 332, 2, 1, '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(321, 333, 2, 1, '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(322, 334, 1, 0, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(323, 335, 1, 0, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(324, 336, 1, 0, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(356, 368, 1, 1, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `price_by_area` int(11) DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `properties_id`, `price`, `area`, `price_by_area`, `currency_code`, `created_at`, `updated_at`) VALUES
(5, 15, 3000, 1, 20, 'mmk', '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(10, 20, 400, 2, 200, 'mmk', '2021-09-23 04:49:09', '2021-09-23 04:49:09'),
(23, 34, 400, 1, 10, 'mmk', '2021-09-24 09:34:56', '2021-09-24 09:34:56'),
(24, 36, 4000, 1, 40, 'mmk', '2021-09-27 09:27:02', '2021-09-27 09:27:02'),
(25, 38, 50, 1, 50, 'mmk', '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(26, 40, 4000, 2, 1000, 'us', '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(27, 45, 4000, 2, 200, 'us', '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(28, 48, 400, 2, 10, 'us', '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(29, 49, 3000, 1, 40, 'mmk', '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(30, 50, 4000, 1, 10, 'mmk', '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(31, 52, 2000, 2, 200, 'mmk', '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(51, 80, 1200, 1, 10, 'mmk', '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(52, 81, 1200, 1, 10, 'mmk', '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(53, 82, 1200, 1, 10, 'mmk', '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(54, 83, 1200, 1, 10, 'mmk', '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(55, 85, 200, 1, 20, 'mmk', '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(61, 93, 200, 1, 20, 'mmk', '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(62, 94, 200, 1, 20, 'mmk', '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(63, 95, 200, 1, 20, 'mmk', '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(65, 97, 300, 1, 10, 'mmk', '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(66, 98, 200, 1, 20, 'mmk', '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(67, 100, 53, 1, 272, 'mmk', '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(68, 104, 1234, 1, 12, 'mmk', '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(69, 105, 11233, 2, 1233, 'mmk', '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(70, 107, 123, 1, 1, 'mmk', '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(71, 109, 278, 1, 974, 'us', '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(72, 110, 245, 2, 12, 'us', '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(73, 113, 123, 2, 12, 'mmk', '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(74, 114, 250000000, 2, 250000000, 'mmk', '2022-07-19 18:10:07', '2022-07-19 18:16:03'),
(75, 115, 380, 1, 380, 'mmk', '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(76, 119, 25000000, 1, 25000000, 'mmk', '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(77, 121, 500, 1, 500, 'mmk', '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(78, 122, 1000, 1, 1000, 'mmk', '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(79, 123, 150000, 1, 150000, 'mmk', '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(80, 175, 150000, 1, 150000, 'mmk', '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(81, 176, 1000000, 1, 10000000, 'mmk', '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(82, 177, 2000, 1, 2000, 'mmk', '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(83, 178, 900, 1, 900, 'mmk', '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(84, 179, 1000, 1, 1000, 'mmk', '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(85, 186, 200000, 1, 200000, 'mmk', '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(86, 187, 200000, 1, 200000, 'mmk', '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(87, 188, 200000, 1, 200000, 'mmk', '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(88, 189, 200000, 1, 2000000, 'mmk', '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(89, 190, 19000, 1, 1900, 'mmk', '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(90, 196, 650, 1, 650, 'mmk', '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(91, 197, 1200, 1, 1200, 'mmk', '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(92, 198, 1300, 1, 1300, 'mmk', '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(93, 199, 200, 1, 200, 'mmk', '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(94, 200, 350, 1, 350, 'mmk', '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(95, 242, 1050, 1, 1050, 'mmk', '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(97, 244, 600, 1, 600, 'us', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(98, 245, 600, 1, 600, 'us', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(99, 246, 600, 1, 600, 'us', '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(102, 249, 1700, 1, 1700, 'mmk', '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(103, 250, 600, 1, 600, 'mmk', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(104, 251, 580, 1, 580, 'mmk', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(105, 252, 850, 1, 850, 'mmk', '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(106, 253, 130, 1, 130, 'mmk', '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(107, 254, 1550, 1, 1550, 'mmk', '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(108, 255, 700, 2, 350, 'us', '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(109, 256, 1400, 1, 1400, 'mmk', '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(110, 257, 480, 2, 480, 'mmk', '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(111, 258, 1200, 1, 120, 'mmk', '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(112, 259, 1500, 1, 1500, 'mmk', '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(113, 260, 2000, 2, 2000, 'mmk', '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(114, 267, 3200, 1, 3200, 'mmk', '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(115, 270, 2500, 1, 2500, 'mmk', '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(116, 272, 2000, 1, 2000, 'mmk', '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(117, 275, 700, 2, 700, 'mmk', '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(118, 277, 350, 2, 350, 'mmk', '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(119, 278, 2300, 1, 2300, 'mmk', '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(120, 280, 300, 2, 300, 'mmk', '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(121, 281, 1500, 1, 1500, 'mmk', '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(122, 282, 270, 1, 270, 'mmk', '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(123, 283, 1300, 1, 1300, 'mmk', '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(124, 315, 30000, 1, 30000, 'mmk', '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(125, 316, 25000, 1, 2500, 'mmk', '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(127, 318, 1500, 1, 1500, 'mmk', '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(128, 319, 300, 1, 300, 'mmk', '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(129, 320, 280, 1, 280, 'mmk', '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(130, 321, 320, 1, 320, 'mmk', '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(131, 322, 300, 1, 300, 'mmk', '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(132, 325, 2000, 1, 2000, 'mmk', '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(133, 326, 1800, 2, 1800, 'mmk', '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(134, 327, 250000, 1, 250000, 'mmk', '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(135, 328, 3000, 1, 3000, 'mmk', '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(136, 329, 4000, 1, 4000, 'mmk', '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(137, 330, 1200, 2, 1200, 'mmk', '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(138, 331, 4500, 2, 4500, 'mmk', '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(139, 332, 1500, 2, 1500, 'mmk', '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(140, 333, 3500, 2, 3500, 'mmk', '2022-08-05 15:10:49', '2022-08-05 15:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `developer_id` bigint(20) DEFAULT NULL,
  `p_code` bigint(20) DEFAULT NULL,
  `view_count` bigint(20) DEFAULT NULL,
  `lat` bigint(20) DEFAULT NULL,
  `long` bigint(20) DEFAULT NULL,
  `properties_type` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hot_feature` int(11) NOT NULL DEFAULT 0,
  `recommended_feature` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `agent_id`, `admin_id`, `user_id`, `developer_id`, `p_code`, `view_count`, `lat`, `long`, `properties_type`, `category`, `status`, `hot_feature`, `recommended_feature`, `created_at`, `updated_at`) VALUES
(14, 'Amet nisi in tempor', NULL, 1, 1, NULL, 494490571, NULL, 112344533, 112344533, 2, 1, 1, 1, 1, '2021-09-19 14:41:28', '2022-06-06 07:54:06'),
(15, 'Amet nisi in tempor', NULL, 1, 1, NULL, 403029514, NULL, 112344533, 112344533, 1, 1, 0, 0, 0, '2021-09-20 05:25:28', '2022-06-06 07:44:48'),
(20, 'Amet nisi in tempor', NULL, 1, 8, NULL, 277560595, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2021-09-23 04:49:09', '2022-06-06 07:44:48'),
(21, 'Amet nisi in tempor', NULL, 1, 2, NULL, 968742083, NULL, 112344533, 112344533, 2, 2, 1, 0, 0, '2021-09-23 04:50:44', '2022-06-06 07:44:48'),
(34, 'Amet nisi in tempor', NULL, 1, 3, NULL, 657982951, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2021-09-24 09:34:56', '2022-06-06 07:44:48'),
(35, 'Amet nisi in tempor', NULL, 1, 4, NULL, 145862066, NULL, 112344533, 112344533, 2, 3, 1, 0, 0, '2021-09-24 09:57:20', '2022-06-06 07:44:48'),
(36, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 5, NULL, 363242118, NULL, 112344533, 112344533, 1, 6, 1, 0, 0, '2021-09-27 09:27:02', '2022-06-06 07:44:48'),
(37, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 1, NULL, 804200215, NULL, 112344533, 112344533, 2, 6, 1, 0, 0, '2021-09-27 09:48:34', '2022-06-06 07:44:48'),
(38, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 3, NULL, 847928210, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2021-09-28 05:28:42', '2022-06-06 07:44:48'),
(39, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 2, NULL, 641413276, NULL, 112344533, 112344533, 2, 7, 1, 0, 0, '2021-09-28 05:32:36', '2022-06-06 07:44:48'),
(40, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 3, NULL, 728213316, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2021-09-28 09:16:28', '2022-06-06 07:44:48'),
(41, 'lorun ipsum lorun log lorun ipsum lorun log ', 1, NULL, 1, NULL, 299125455, NULL, 112344533, 112344533, 2, 4, 1, 0, 0, '2021-09-28 09:21:29', '2022-06-06 07:44:48'),
(42, 'lorun ipsum lorun log lorun ipsum lorun log ', 1, NULL, 2, NULL, 129300330, NULL, 112344533, 112344533, 2, 4, 1, 0, 0, '2021-09-28 09:49:27', '2022-06-06 07:44:48'),
(43, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 3, NULL, 979401379, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2021-09-28 10:02:17', '2022-06-06 07:44:48'),
(44, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 4, NULL, 350890835, NULL, 112344533, 112344533, 2, 2, 1, 0, 0, '2021-09-28 10:27:16', '2022-06-06 07:44:48'),
(45, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 5, NULL, 76905003, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2021-09-28 10:47:52', '2022-06-06 07:44:48'),
(46, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, 1, 3, NULL, 461013484, NULL, 112344533, 112344533, 2, 3, 1, 0, 0, '2021-09-28 10:51:00', '2022-06-06 07:44:48'),
(47, 'Omnis voluptatum qui', NULL, NULL, 18, 1, 147730273, NULL, 112344533, 112344533, 2, 5, 1, 0, 0, '2021-09-28 10:53:02', '2022-06-06 07:44:48'),
(48, 'lorun ipsum lorun log lorun ipsum lorun log ', 1, NULL, 3, NULL, 231745284, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2021-10-04 05:39:48', '2022-06-06 07:44:48'),
(49, 'lorun ipsum lorun log lorun ipsum lorun log ', 1, NULL, 4, NULL, 675492687, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2021-10-04 05:47:46', '2022-06-06 07:44:48'),
(50, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 5, NULL, 422378678, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2021-10-11 05:25:28', '2022-06-06 07:44:48'),
(51, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 2, NULL, 854028485, NULL, 112344533, 112344533, 2, 3, 1, 0, 0, '2021-10-11 05:27:25', '2022-06-06 07:44:48'),
(52, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 1, NULL, 22426372, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2021-11-05 04:45:40', '2022-06-06 07:44:48'),
(80, 'whole sale', NULL, NULL, 4, NULL, 442422564, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-01-31 12:30:13', '2022-08-05 20:00:51'),
(81, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 1, NULL, 168144567, NULL, NULL, NULL, 1, 6, 1, 0, 0, '2022-01-31 12:38:05', '2022-06-06 07:44:48'),
(82, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 556458021, NULL, 112344533, 112344533, 1, 6, 1, 0, 0, '2022-02-01 08:21:40', '2022-06-06 07:44:48'),
(83, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 23, NULL, 643266485, NULL, NULL, NULL, 1, 1, 1, 0, 0, '2022-02-24 12:06:51', '2022-06-06 07:44:48'),
(84, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 199303893, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-03-04 11:25:11', '2022-06-06 07:44:48'),
(85, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 858973287, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-03-05 13:46:32', '2022-06-06 07:44:48'),
(91, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 899998347, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-03-05 13:59:27', '2022-06-06 07:44:48'),
(92, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 430168167, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-03-05 13:59:49', '2022-06-06 07:44:48'),
(93, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 260921899, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-03-05 14:01:03', '2022-06-06 07:44:48'),
(94, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 615405099, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-03-05 14:01:37', '2022-06-06 07:44:48'),
(95, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 313275241, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-03-05 14:03:42', '2022-06-06 07:44:48'),
(97, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 344139937, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-03-05 14:08:24', '2022-06-06 07:44:48'),
(98, 'lorun ipsum lorun log lorun ipsum lorun log ', NULL, NULL, 18, NULL, 93894533, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-03-05 14:11:00', '2022-06-06 07:44:48'),
(99, 'Et mollitia necessit', NULL, NULL, 1, NULL, 44520881, NULL, 112344533, 112344533, 2, 2, 1, 1, 0, '2022-05-26 08:12:46', '2022-06-06 07:44:48'),
(100, 'Ex et voluptates ut', NULL, NULL, 1, NULL, 735234975, NULL, 112344533, 112344533, 1, 3, 1, 1, 0, '2022-05-30 10:09:00', '2022-06-06 07:44:48'),
(103, 'Dolor voluptas eum i', NULL, NULL, 1, NULL, 651393849, NULL, 112344533, 112344533, 2, 3, 1, 1, 0, '2022-05-30 10:26:11', '2022-06-06 07:44:48'),
(104, 'Fuga Est adipisci ess house', NULL, NULL, 1, NULL, 527888594, NULL, 112344533, 112344533, 1, 1, 1, 1, 0, '2022-05-31 07:47:43', '2022-06-06 07:44:48'),
(105, 'Veniam Nam in eos c', NULL, NULL, 1, NULL, 380337305, NULL, 112344533, 112344533, 1, 2, 1, 1, 0, '2022-06-02 07:38:37', '2022-06-06 07:44:48'),
(106, 'Recusandae Aliquip', NULL, NULL, 1, NULL, 525362101, NULL, 112344533, 112344533, 2, 7, 1, 1, 1, '2022-06-02 09:45:36', '2022-06-06 07:44:48'),
(107, 'Commodo illo explica', NULL, NULL, 11, NULL, 208053750, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-06-06 03:37:19', '2022-06-06 07:44:48'),
(108, 'Nisi id accusamus en', NULL, NULL, 11, NULL, 190803284, NULL, 112344533, 112344533, 2, 2, 1, 0, 0, '2022-06-06 05:11:47', '2022-06-06 07:44:48'),
(109, 'Deleniti exercitatio', NULL, NULL, 11, NULL, 326794570, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-06-06 05:13:22', '2022-06-06 07:44:48'),
(110, 'Delectus explicabo', NULL, NULL, 11, NULL, 507354012, NULL, 112344533, 112344533, 1, 4, 1, 0, 0, '2022-06-06 05:15:36', '2022-06-06 07:44:48'),
(111, 'အမြန်ရောင်း/ငှား', NULL, NULL, 4, NULL, 89941114, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(112, 'အမြန်ရောင်း/ငှား', NULL, NULL, 4, NULL, 953915570, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(113, 'Inventore voluptatem', NULL, NULL, 10, NULL, 471917010, NULL, 112344533, 112344533, 1, 1, 0, 0, 0, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(114, 'House Sale', NULL, NULL, 1, NULL, 529033903, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(115, 'House Sale', NULL, NULL, 1, NULL, 65403822, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(116, 'Condo ကောင်းကောင်းလေးမှာနေချင်သူများအတွက်', NULL, NULL, 1, NULL, 37845646, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(118, 'အိမ်ငှားချင်သူများအတွက်', NULL, NULL, 1, NULL, 436154166, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(119, 'Condo ဝယ်ချင်သူများအတွက်', NULL, NULL, 1, NULL, 243707836, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(120, 'Condo အငှား', NULL, NULL, 1, NULL, 984684339, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(121, 'မြေရောင်း', NULL, NULL, 1, NULL, 711710548, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(122, 'မြေရောင်းမည်', NULL, NULL, 1, NULL, 365782386, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(123, 'ဆိုင်ခန်းဝယ်ချင်သူများ', NULL, NULL, 1, NULL, 746649672, NULL, 112344533, 112344533, 1, 6, 1, 0, 0, '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(124, 'ဆိုင်ခန်းအငှား', NULL, NULL, 1, NULL, 591936430, NULL, 112344533, 112344533, 2, 6, 1, 0, 0, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(175, 'ဘားအံမြို့တွင်းခြံဝန်းကျယ်ကျယ်နှင့် အိမ်သန့်သန့်လေးရောင်းမည်', NULL, NULL, 1, NULL, 810617821, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(176, 'အသင့်နေထိုင်ရန်အိမ်ကောင်းအိမ်သန့်လေး ရောင်းမည်', NULL, NULL, 1, NULL, 342664846, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(177, 'ခြံဝန်းကျယ်နှင့်အိမ်ရောင်းမည်', NULL, NULL, 1, NULL, 611940767, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(178, 'အိမ်ကောင်းအိမ်သန့်လေးရောင်းပေးမည်', NULL, NULL, 1, NULL, 312587039, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(179, 'ခြံတစ်ခြံနှင့် အိမ်၃လုံးရောင်းပေးမည်', NULL, NULL, 1, NULL, 934235536, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(180, 'အိမ်သန့်သန့်လေးတစ်လုံးငှားပေးမည်', NULL, NULL, 1, NULL, 263855324, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(181, 'အိမ်ကောင်းလေးမှငှားချင်သူများအတွက် စဥ်းစားသင့်တဲ့အိမ်လေး', NULL, NULL, 1, NULL, 827747414, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(182, 'မိသားစုနှင့်ေအးချမ်းစွာနေထိုင်နိုင်မည့်အိမ်ငှားပေးမည်', NULL, NULL, 1, NULL, 138585677, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(184, 'အိမ်ငှားမည်', NULL, NULL, 1, NULL, 653222321, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(185, 'အိမ်ငှားမည်', NULL, NULL, 1, NULL, 367673389, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(186, 'မိသားစုနှင့်နေချင်စဖွယ် Condo ရောင်းမည်', NULL, NULL, 1, NULL, 31879746, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(187, 'ရန်ကုန်မြို့တွင်းရှိ Condo ရောင်းပေးမည်', NULL, NULL, 1, NULL, 762063995, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(188, 'တာ​ေ မွမြို့အတွင်းရှိ Condo ရောင်းမည်', NULL, NULL, 1, NULL, 570692606, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(189, 'Condo ရောင်းမည်', NULL, NULL, 1, NULL, 436782081, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(190, '(1650-Sqft) အကျယ် ပုဇွန်တောင်မြို့နယ် ဗန္ဒုလကွန်ဒိုတွင် ကွန်ဒိုရောင်းရန်ရှိသည်', NULL, NULL, 1, NULL, 586627644, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(191, '49 လမ်း mini condo အငှား', NULL, NULL, 1, NULL, 813459757, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(192, 'ရေ​ေ ကျာ်လမ်းမပေါ်ရှိ ပြင်ဆင်ပြီး အသင့်နေရုံ condo ငှားမည်', NULL, NULL, 1, NULL, 329251495, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(193, 'Ocean အနီး Condo အခန်းငှားမည်', NULL, NULL, 1, NULL, 277506616, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(194, 'Royal sinmin အဆင့်မြင့် Condo တွင်အခန်းငှားရန်ရှိသည်', NULL, NULL, 1, NULL, 617726233, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(195, 'River view condo 1750 sqft အငှား', NULL, NULL, 1, NULL, 231811857, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(196, 'မြေကွက်ကျယ်ရောင်းမည်', NULL, NULL, 1, NULL, 409915371, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(197, 'ကရင်ပြည်နယ် မြဝတီမြို့ရှိ မြေကွက်ရောင်းမည်', NULL, NULL, 1, NULL, 584186617, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(198, 'မြေကွက်ရောင်းရန်', NULL, NULL, 1, NULL, 58721822, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(199, 'ခြံရောင်းရန်ရှိသည်', NULL, NULL, 1, NULL, 536018030, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(200, 'လှာကမြင်ရှိ ခြံရောင်းမည်', NULL, NULL, 1, NULL, 854693998, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(227, 'Title', NULL, NULL, 1, NULL, 528850460, NULL, 112344533, 112344533, 2, 1, 0, 0, 0, '2022-07-29 01:10:14', '2022-07-29 03:03:53'),
(234, 'Title', NULL, NULL, 1, NULL, 179859637, NULL, 112344533, 112344533, 2, 1, 1, 1, 1, '2022-07-29 03:25:13', '2022-07-29 03:27:48'),
(239, 'Title', NULL, NULL, 4, NULL, 929428637, NULL, NULL, NULL, 2, 1, 0, 0, 0, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(242, 'ဈေးနှုန်းတန် မြေကွက် အမြန်ရောင်းမယ်', NULL, NULL, 1, NULL, 961586553, NULL, 112344533, 112344533, 1, 5, 1, 0, 0, '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(244, 'ဘားအံမြို့၊အမှတ်1၊', NULL, NULL, 1, NULL, 948732908, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(245, 'ဘားအံမြို့၊အမှတ်1၊', NULL, NULL, 1, NULL, 751496945, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(246, 'ဘားအံမြို့၊အမှတ်1၊', NULL, NULL, 1, NULL, 975421785, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(249, 'အိမ်ကောင်းအိမ်သန့်လေးနဲ့နေချင်သူများအတွက်', NULL, NULL, 1, NULL, 517196265, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(250, 'အေးချမ်းစွာနေထိုင်လိုသူများအတွက်', NULL, NULL, 1, NULL, 723075544, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(251, 'မော်လမြိုင်တက္ကသိုလ် အနီးက ထားကောင်းရောင်းမြတ်  location ကောင်းတဲ့ ခြံတစ်ကွက်', NULL, NULL, 1, NULL, 253007849, NULL, 112344533, 112344533, 1, 5, 1, 0, 1, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(252, 'အဆောင်ဖွင့်ချင်သူများအတွက်သင့်တော်သော', NULL, NULL, 1, NULL, 567918520, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(253, 'သိန်း 100ကျော် နဲ့ မြေကွက် ပိုင်ဆိုင်နိုင်မဲ့အခွင့်အရေး', NULL, NULL, 1, NULL, 208733980, NULL, 112344533, 112344533, 1, 5, 1, 1, 0, '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(254, 'မိသားစုနှင့်အေးအေးချမ်းချမ်းနေချင်သူများအတွက်', NULL, NULL, 1, NULL, 209548429, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(255, 'ဘားအံမြို့၊အမှတ်2 ၊ရတနာသီရိရပ်ကွက်', NULL, NULL, 1, NULL, 900311137, NULL, 112344533, 112344533, 1, 3, 0, 0, 1, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(256, 'အိမ်ကောင်းအိမ်သန့်လေးပိုင်ဆိုင်ချင်ပါသလား?', NULL, NULL, 1, NULL, 545118188, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(257, 'ရင်းနီးထားရန်အလား အလာ ရှိသော မြေကွက်', NULL, NULL, 1, NULL, 886864995, NULL, 112344533, 112344533, 1, 5, 1, 1, 1, '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(258, 'ရောင်းကောင်းထားမြတ်သော ခြံတစ်ကွက်', NULL, NULL, 1, NULL, 390358618, NULL, 112344533, 112344533, 1, 5, 1, 1, 1, '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(259, 'ဝယ်ယူပြီးအသင့်နေထိုင်ယုံအိမ်လေးတစ်လုံးနဲ့မိတ်ဆက်ပေးပါရစေ', NULL, NULL, 1, NULL, 123618073, NULL, 112344533, 112344533, 1, 1, 1, 0, 0, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(260, 'ကျယ်ကျယ်ဝန်းဝန်းနေချင်တဲ့ လူကြီးမင်းတို့အတွက်', NULL, NULL, 1, NULL, 764774513, NULL, 112344533, 112344533, 1, 5, 1, 1, 1, '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(262, 'ဗိုလ်ချုပ်လမ်းမကြီးတစ်ကွက်ငုပ် မှာတည်ရှိသောအိမ်နှင့်ခြံငှားမည်', NULL, NULL, 1, NULL, 553846546, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(263, 'စားသောက်ဆိုင်ဖွင့်ချင်သောမိဆွေတို့အတွက်', NULL, NULL, 1, NULL, 400502094, NULL, 112344533, 112344533, 2, 5, 1, 0, 1, '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(264, 'နှစ်ထပ်အိမ်နှင့်ခြံငှားမည်', NULL, NULL, 1, NULL, 487305784, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(265, 'တိုက်ခန်းဆောက်ချင်သော လူကြီးမင်းတို့အတွက်', NULL, NULL, 1, NULL, 790357575, NULL, 112344533, 112344533, 2, 5, 1, 0, 1, '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(266, 'Company ရုံးခန်းငှားချင်သူများအတွက်', NULL, NULL, 1, NULL, 949089541, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(267, 'Grand city condo ရောင်းမည်', NULL, NULL, 1, NULL, 804357261, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(268, 'ဂိုဒေါင်ဆောက်ချင်သော မိတ်ဆွေတို့အတွက်', NULL, NULL, 1, NULL, 367228650, NULL, 112344533, 112344533, 2, 5, 1, 1, 1, '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(269, 'အိမ်လှလှလေးတစ်လုံး ငှားမည်', NULL, NULL, 1, NULL, 354990142, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(270, 'Condo ဆိုရှုခင်းကောင်းမှာနေချင်သူများအတွက်', NULL, NULL, 1, NULL, 526574298, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(271, 'စီးပွားရေးလုပ်ဖို့ပဲငှားငှားလူနေဖို့ပဲငှားငှား အဆင်ပြေတဲ့နေရာကောင်းလေး ငှားမည်', NULL, NULL, 1, NULL, 714416068, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(272, 'တာေမွမှာ Condo ဝယ်ချင်သူများအတွက်', NULL, NULL, 1, NULL, 361472646, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(273, 'ပျိုးပင်ပန်းပင် စိုက်ပျိုးရောင်းဝယ်ချင်သောလူကြီးမင်းတို့အတွက်', NULL, NULL, 1, NULL, 811699019, NULL, 112344533, 112344533, 2, 5, 1, 1, 1, '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(274, 'အိမ်ကောင်းအိမ်သန့်လေးတစ်လုံး ငှားမည်', NULL, NULL, 1, NULL, 903779721, NULL, 112344533, 112344533, 2, 1, 1, 0, 0, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(275, 'ရင်းနှီးမြှုပ်နှံချင်‌ေသာသူများအတွက်', NULL, NULL, 1, NULL, 270615094, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(276, 'ရုံးဖွင့်ချင်သော လူကြီးမင်းတို့အတွက်', NULL, NULL, 1, NULL, 341046637, NULL, 112344533, 112344533, 2, 5, 1, 0, 1, '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(277, 'တိုက်ခန်းရောင်းရန်ရှိသည်', NULL, NULL, 1, NULL, 919607462, NULL, 112344533, 112344533, 1, 3, 1, 0, 0, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(278, 'Condo လေးရောင်းပေးပါ့မယ်', NULL, NULL, 1, NULL, 905139104, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(279, 'ယာယီနေထိုင်ချင်သော မိတ်ဆွေတို့အတွက်', NULL, NULL, 1, NULL, 844118989, NULL, 112344533, 112344533, 2, 5, 1, 0, 1, '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(280, 'ကိုယ်ပိုင်တိုက်ခန်းနဲ့သီးသန့်နေချင်သူများအတွက်ဈေးတန်တန်နဲ့ရမယ်', NULL, NULL, 1, NULL, 792704459, NULL, 112344533, 112344533, 1, 3, 0, 1, 0, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(281, 'ဘားအံမြို့မှာ Condo ဝယ်ချင်သူများအတွက်', NULL, NULL, 1, NULL, 219314503, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(282, 'အိမ်ယာကောင်ူကောင်းတဲ့နေချင်သူအတွက်‌ေနရာ‌ေကာင်း‌ေလးပါက်', NULL, NULL, 1, NULL, 855073049, NULL, 112344533, 112344533, 1, 3, 0, 0, 1, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(283, 'Condo ကောင်းကောင်းလေးဝယ်ချင်သူများအတွက်', NULL, NULL, 1, NULL, 658426372, NULL, 112344533, 112344533, 1, 8, 1, 0, 0, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(284, 'Condo ငှားချင်သူများအတွက်', NULL, NULL, 1, NULL, 797510678, NULL, 112344533, 112344533, 2, 8, 0, 0, 0, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(285, 'ရှုခင်းကောင်းတဲ့နေရာမှာ Condo ငှားချင်သူများအတွက်', NULL, NULL, 1, NULL, 378676536, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(286, 'နေရာကောင်းလေးမှာ Condo ငှားမည်', NULL, NULL, 1, NULL, 649267605, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(287, 'Condo ငှားမယ်ဆို', NULL, NULL, 1, NULL, 56063123, NULL, 112344533, 112344533, 2, 8, 0, 0, 0, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(288, 'အေးဆေးအနားယူလို့ရမည့် Condo ငှားမည်', NULL, NULL, 1, NULL, 183467642, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(289, 'Condo ငှားမည်', NULL, NULL, 1, NULL, 940400295, NULL, 112344533, 112344533, 2, 8, 1, 0, 0, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(290, 'ဈေးလည်းသင့်ရမယ်တိုက်ခန်းလည်းသန့်ရမယ်ဆိုတဲ့သူများအတွက်', NULL, NULL, 1, NULL, 725917435, NULL, 112344533, 112344533, 2, 3, 0, 1, 0, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(292, 'အမြန်ရောင်း/ငှား Test', NULL, NULL, 1, NULL, 381353521, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(307, 'သန့်ပြန့်မှကြိုက်သောသူအတွက်တစ်လ2သိန်းကျေဖြင့်သာအငှားချမယ်ာ်', NULL, NULL, 1, NULL, 223265951, NULL, 112344533, 112344533, 2, 3, 0, 1, 0, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(309, 'တိုက်ခန်းငှားရန်ရှိသည်', NULL, NULL, 1, NULL, 883139192, NULL, 112344533, 112344533, 2, 3, 1, 0, 0, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(310, 'တိုက်ခန်းငှားရန်ရှိသည်', NULL, NULL, 1, NULL, 415565050, NULL, 112344533, 112344533, 2, 3, 1, 1, 0, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(311, 'အငှားပို့စ်လေးပါ', NULL, NULL, 1, NULL, 556292658, NULL, 112344533, 112344533, 2, 3, 0, 0, 0, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(314, 'တိုက်ခန်းငှားရန်ရှိသည်', NULL, NULL, 1, NULL, 911617778, NULL, 112344533, 112344533, 2, 3, 1, 0, 0, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(315, 'စီးပွါးရေးလုပ်ချင်သူအတွက်အမြန်ရောင်းရန်ရှိသည်', NULL, NULL, 1, NULL, 828717720, NULL, 112344533, 112344533, 1, 4, 1, 1, 0, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(316, 'ကိုယ်ပိုင်ရုံးခန်းဖွင့်ချင်သူအတွက်အဆင်ပြေမယ့်နေရာလေးနဲ့မိတ်ဆက်ပေးချင်ပါတယ်', NULL, NULL, 1, NULL, 472483818, NULL, 112344533, 112344533, 1, 4, 0, 1, 1, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(318, 'ရုံးခန်းရောင်းရန်ရှိတယ်', NULL, NULL, 1, NULL, 210688603, NULL, 112344533, 112344533, 1, 4, 1, 0, 0, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(319, 'View ကောင်းကောင်းလေးနဲ့စိတ်ကြိုက်အိမ်ဆောက်ချင်သူများအတွက်', NULL, NULL, 1, NULL, 216014075, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(320, 'ခြံသည်းရိုးကာပြီးသားခြံကွက်လေးရောင်းရန်ရှိသည်', NULL, NULL, 1, NULL, 995947163, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(321, 'မြို့ပြရဲ့မနီးမဝေးလေးမှာတည်ရှိသော ခြံကွက်လွတ်ရောင်းမည်', NULL, NULL, 1, NULL, 647438047, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(322, 'မြေကွက်လွတ်အမြန်ရောင်းမည်', NULL, NULL, 1, NULL, 129035834, NULL, 112344533, 112344533, 1, 2, 1, 0, 0, '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(323, 'စီးပွားရေးလုပ်ချင်သူများအတွက်အဆင်ပြေသောမြေနေရာလွတ်ငှားမည်', NULL, NULL, 1, NULL, 983092671, NULL, 112344533, 112344533, 2, 2, 1, 0, 0, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(324, 'လုပ်ငန်းကြီးကြီးမားမားလုပ်ချင်သူများအတွက် မြေနေရာကျယ်ငှားမည်', NULL, NULL, 1, NULL, 764086023, NULL, 112344533, 112344533, 2, 2, 1, 0, 0, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(325, 'လှိုင်သာယာစက်မှုဇုန်အတွင်း ဂိုထောင်ရောင်းမည်', NULL, NULL, 1, NULL, 49461459, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(326, 'ရင်းနှီးမြုပ်နှံချင်သူတွေအတွက်', NULL, NULL, 1, NULL, 88776764, NULL, 112344533, 112344533, 1, 4, 1, 1, 0, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(327, 'ဆိုင်ခန်း ဖွင်ဖို့ အဆင်ပြေတဲ့နေရာ ရှာနေပါသလား', NULL, NULL, 1, NULL, 703246419, NULL, 112344533, 112344533, 1, 6, 1, 1, 1, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(328, 'မြောက်ဥက္ကလာ ​ေ ရွှပေါက်ကံ စက်မှုဇုန်တွင် ဂိုထောင်ရောင်းမည်', NULL, NULL, 1, NULL, 982496403, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(329, 'လှိုင်သာယာစက်မှုဇုန်ရှိ တနေရာရောင်းမည်', NULL, NULL, 1, NULL, 804858140, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(330, 'Office', NULL, NULL, 1, NULL, 664854808, NULL, 112344533, 112344533, 1, 4, 1, 0, 0, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(331, 'မင်္ဂလာဒုံစက်မှုဇုန်ရှိ ဂိုထောင်ရောင်းမည်', NULL, NULL, 1, NULL, 99105210, NULL, 112344533, 112344533, 1, 7, 0, 0, 0, '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(332, '​ေ ရွှပြည်သာစက်မှုဇုန်ရှိ တနေရာရောင်းမည်', NULL, NULL, 1, NULL, 912316435, NULL, 112344533, 112344533, 1, 7, 0, 0, 0, '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(333, 'သာကေတစက်မှုဇုန်အတွင်း စက်ရုံတစ်ခုရောင်းမည်', NULL, NULL, 1, NULL, 161987282, NULL, 112344533, 112344533, 1, 7, 1, 0, 0, '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(334, 'စက်မှုဇုန်တွင် ဂိုထောင်ငှားမည်', NULL, NULL, 1, NULL, 914486221, NULL, 112344533, 112344533, 2, 7, 1, 0, 0, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(335, 'သာကေတစက်မှုဇုန်အတွင်း စက်ရုံတစ်ခုငှားမည်', NULL, NULL, 1, NULL, 266993695, NULL, 112344533, 112344533, 2, 7, 1, 0, 0, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(336, 'ဒဂုံစက်မှုဇုန်ရှိဂိုထောင်ငှားမည်', NULL, NULL, 1, NULL, 193873446, NULL, 112344533, 112344533, 2, 7, 1, 0, 0, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(368, 'အမြန်ရောင်း/ငှား', NULL, NULL, 4, NULL, 641072911, NULL, NULL, NULL, 2, 1, 1, 0, 0, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `properties_id`, `images`, `created_at`, `updated_at`) VALUES
(6, 14, '[\"629db29e58b6b_1654502046.jpg\"]', '2021-09-19 14:41:28', '2022-06-06 07:54:06'),
(7, 15, '[\"614ae417dc10b_1632298007.png\"]', '2021-09-20 05:25:28', '2021-09-22 08:06:47'),
(10, 20, '[\"614c0f0fc3988_1632374543.jpg\"]', '2021-09-23 04:49:09', '2021-09-23 06:00:43'),
(11, 21, '[\"614c19b86373d_1632377272.jpg\",\"614c19b864248_1632377272.jpg\"]', '2021-09-23 04:50:44', '2021-09-23 11:31:38'),
(12, 34, '[\"615045d885f6f_1632650712.jpg\"]', '2021-09-24 09:34:56', '2021-09-26 10:05:12'),
(13, 35, '[\"6184ead4a772b_1636100820.jpg\",\"614da100d668c_1632477440.jpg\"]', '2021-09-24 09:57:21', '2021-11-05 08:27:09'),
(14, 36, '[\"61518e6665076_1632734822.jpg\",\"61518e66708bc_1632734822.jpg\"]', '2021-09-27 09:27:02', '2021-09-27 11:44:18'),
(15, 37, '[\"6151937290d7f_1632736114.jpg\",\"615193729b951_1632736114.jpg\",\"61519372a0a5c_1632736114.jpg\",\"61519372a16c7_1632736114.jpg\"]', '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(16, 38, '[\"6152a80ac96e2_1632806922.jpg\",\"6152a80ad9183_1632806922.jpg\",\"6152a80ada3eb_1632806922.jpg\"]', '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(17, 39, '[\"6152a8f418bba_1632807156.jpg\",\"6152a8f422413_1632807156.jpg\",\"6152a8f4257a4_1632807156.jpg\"]', '2021-09-28 05:32:36', '2021-09-28 09:13:16'),
(18, 40, '[\"6152dd6c8dfc8_1632820588.jpg\",\"6152dda0c25f1_1632820640.jpg\"]', '2021-09-28 09:16:28', '2021-09-28 09:17:20'),
(19, 41, '[\"6152de991bd5c_1632820889.jpg\"]', '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(20, 42, '[\"6152e52798eb2_1632822567.jpg\",\"6152e527a2574_1632822567.jpg\",\"6152e527a4e82_1632822567.jpg\"]', '2021-09-28 09:49:27', '2021-10-04 05:46:14'),
(21, 43, '[\"6152e8298f08c_1632823337.jpg\"]', '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(22, 44, '[\"6152ee0428b4c_1632824836.jpg\",\"6152ee041c54d_1632824836.jpg\"]', '2021-09-28 10:27:16', '2021-09-28 10:46:15'),
(23, 45, '[\"6152f2d870859_1632826072.jpg\"]', '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(24, 46, '[\"6152f394c78a7_1632826260.jpg\"]', '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(25, 47, '[\"6152f40ec31b6_1632826382.jpg\"]', '2021-09-28 10:53:02', '2021-09-28 12:40:31'),
(26, 48, '[\"615a93a4457d1_1633325988.jpg\",\"615a93a456ac4_1633325988.jpg\",\"615a93a459a1a_1633325988.jpg\",\"615a93a45a43a_1633325988.jpg\"]', '2021-10-04 05:39:48', '2021-11-05 05:57:24'),
(27, 49, '[\"615a958256331_1633326466.jpg\"]', '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(28, 50, '[\"6163cac8da556_1633929928.jpg\"]', '2021-10-11 05:25:29', '2021-10-11 05:25:29'),
(29, 51, '[\"6163cb82cf381_1633930114.jpg\"]', '2021-10-11 05:27:25', '2021-10-11 05:28:34'),
(30, 52, '[\"6184b6f5024ea_1636087541.jpg\",\"6184b6f5052ea_1636087541.jpg\",\"6184b6f50590d_1636087541.png\"]', '2021-11-05 04:45:41', '2021-11-05 04:45:41'),
(31, 80, '[\"61f7d6559ed72_1643632213.jpg\"]', '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(32, 81, '[\"61f7d82da4480_1643632685.jpg\"]', '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(33, 82, '[\"61f8ed9437a47_1643703700.jpg\"]', '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(34, 83, '[\"621774dc1cd4d_1645704412.jpg\"]', '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(35, 84, '[\"6221f7177dd97_1646393111.jpg\"]', '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(36, 85, '[\"622369b826ba3_1646487992.jpg\"]', '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(37, 91, '[\"62236cbf88f58_1646488767.jpg\"]', '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(38, 92, '[\"62236cd5cbd78_1646488789.jpg\",\"62236cd5cd3fd_1646488789.jpg\"]', '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(39, 93, '[\"62236d1f4a810_1646488863.jpg\"]', '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(40, 94, '[\"62236d4136185_1646488897.jpg\"]', '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(41, 95, '[\"62236dbebb428_1646489022.jpg\"]', '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(42, 97, '[\"62236ed821220_1646489304.jpg\"]', '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(43, 98, '[\"62236f741e1e7_1646489460.jpg\"]', '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(44, 99, '[\"628f367e5ce07_1653552766.jpg\",\"628f367e642b2_1653552766.jpg\",\"628f367e6872d_1653552766.jpg\"]', '2022-05-26 08:12:46', '2022-05-26 08:22:17'),
(45, 100, '[\"629497bc9457f_1653905340.jpg\"]', '2022-05-30 10:09:00', '2022-05-30 10:09:00'),
(46, 103, '[\"62949bc3a2f33_1653906371.jpg\"]', '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(47, 104, '[\"6295c81f3fb80_1653983263.jpg\"]', '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(48, 105, '[\"629868fd08f63_1654155517.jpg\"]', '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(49, 106, '[\"629886c00efe5_1654163136.jpg\"]', '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(50, 107, '[\"629d766f51d94_1654486639.png\"]', '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(51, 108, '[\"629d8c930f801_1654492307.jpg\",\"629d8c9310662_1654492307.jpg\"]', '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(52, 109, '[\"629d8cf2cc394_1654492402.jpg\"]', '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(53, 110, '[\"629d8d78efe4a_1654492536.jpg\",\"629dab6624e5b_1654500198.jpg\"]', '2022-06-06 05:15:36', '2022-06-06 07:23:18'),
(54, 111, '[\"62a1b381e5eb8_1654764417.png\"]', '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(55, 112, '[\"62a1bc4c116f8_1654766668.png\"]', '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(56, 113, '[\"62a1cf4cdd7ea_1654771532.png\",\"62a1cf4cdf556_1654771532.png\"]', '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(57, 114, '[\"62d65fd7b02e3_1658216407.jpg\",\"62d65fd78efa7_1658216407.jpg\"]', '2022-07-19 18:10:07', '2022-07-19 18:16:03'),
(58, 115, '[\"62d678938cefe_1658222739.jpg\",\"62d67893a47b9_1658222739.jpg\"]', '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(59, 116, '[\"62d67c428ba3d_1658223682.jpg\"]', '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(61, 118, '[\"62d67f0bc2376_1658224395.jpg\"]', '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(62, 119, '[\"62d680d77a6ab_1658224855.jpg\",\"62d680d77ce7b_1658224855.jpg\"]', '2022-07-19 20:30:55', '2022-07-23 21:55:16'),
(63, 120, '[\"62d6820c4b3c3_1658225164.jpg\"]', '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(64, 121, '[\"62d68288f2a2b_1658225288.jpg\"]', '2022-07-19 20:38:09', '2022-07-19 20:38:09'),
(65, 122, '[\"62d683a1d3299_1658225569.jpg\"]', '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(66, 123, '[\"62d686d7c0f89_1658226391.jpg\"]', '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(67, 124, '[\"62d689618a6b3_1658227041.jpg\"]', '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(78, 175, '[\"62dd21a3604c2_1658659235.jpg\",\"62dd21a37604b_1658659235.jpg\"]', '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(79, 176, '[\"62dd2d1e48f84_1658662174.jpg\",\"62dd2d1e4bf58_1658662174.jpg\",\"62dd2d1e51e33_1658662174.jpg\"]', '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(80, 177, '[\"62dd4b75cb7b6_1658669941.jpg\",\"62dd4b760b178_1658669942.jpg\"]', '2022-07-25 00:09:02', '2022-07-25 00:09:02'),
(81, 178, '[\"62dd4d6010106_1658670432.jpg\",\"62dd4d6012845_1658670432.jpg\"]', '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(82, 179, '[\"62dd4e9608d11_1658670742.jpg\",\"62dd4e960e37d_1658670742.jpg\"]', '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(83, 180, '[\"62ddff50a701f_1658715984.jpg\"]', '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(84, 181, '[\"62de00dc120e1_1658716380.jpg\"]', '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(85, 182, '[\"62de019fe6362_1658716575.jpg\"]', '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(87, 184, '[\"62de032f84016_1658716975.jpg\"]', '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(88, 185, '[\"62de042147bfb_1658717217.jpg\"]', '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(89, 186, '[\"62de08e5d10c0_1658718437.jpg\"]', '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(90, 187, '[\"62de0a495ecd1_1658718793.jpg\"]', '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(91, 188, '[\"62de0ebf9a0d8_1658719935.jpg\"]', '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(92, 189, '[\"62de0fef38133_1658720239.jpg\"]', '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(93, 190, '[\"62de119a50d3c_1658720666.jpg\"]', '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(94, 191, '[\"62de12cee1184_1658720974.jpg\"]', '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(95, 192, '[\"62de140105e9e_1658721281.jpg\"]', '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(96, 193, '[\"62de1574d487d_1658721652.jpg\"]', '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(97, 194, '[\"62de169ac5b10_1658721946.jpg\"]', '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(98, 195, '[\"62de17580a5af_1658722136.jpg\"]', '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(99, 196, '[\"62de1cb7d013c_1658723511.jpg\"]', '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(100, 197, '[\"62de1d920da7d_1658723730.jpg\"]', '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(101, 198, '[\"62de21fcb04ce_1658724860.jpg\"]', '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(102, 199, '[\"62de22b04f297_1658725040.jpg\"]', '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(103, 200, '[\"62de232e2a0fb_1658725166.jpg\"]', '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(104, 227, '[\"62e2ba71066fe_1659026033.png\"]', '2022-07-29 01:10:14', '2022-07-29 03:04:05'),
(111, 234, '[\"62e2c16803f17_1659027816.jpg\"]', '2022-07-29 03:25:13', '2022-07-29 03:33:36'),
(115, 239, '[\"62e353584d728_1659065176.\"]', '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(116, 242, '[\"62eb621acd94a_1659593242.jpg\"]', '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(118, 244, '[\"62eb650cb1ab6_1659593996.jpg\",\"62eb650cb4c3b_1659593996.jpg\"]', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(119, 245, '[\"62eb650cd6544_1659593996.jpg\",\"62eb650cd969f_1659593996.jpg\"]', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(120, 246, '[\"62eb650d28d9a_1659593997.jpg\",\"62eb650d2b1db_1659593997.jpg\"]', '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(123, 249, '[\"62eb65ae1c7c6_1659594158.jpg\",\"62eb65ae1ec99_1659594158.jpg\"]', '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(124, 250, '[\"62eb66bc7fec8_1659594428.jpg\"]', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(125, 251, '[\"62eb66bce766b_1659594428.jpg\",\"62eb66bd02bd6_1659594429.jpg\"]', '2022-08-04 16:57:09', '2022-08-04 16:57:09'),
(126, 252, '[\"62eb67adaa138_1659594669.jpg\"]', '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(127, 253, '[\"62eb6880873fc_1659594880.jpg\",\"62eb688096f27_1659594880.jpg\",\"62eb6880a3a2c_1659594880.jpg\",\"62eb6880af57a_1659594880.jpg\"]', '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(128, 254, '[\"62eb696e37e65_1659595118.jpg\"]', '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(129, 255, '[\"62eb6a369c336_1659595318.jpg\",\"62eb6a369fb51_1659595318.jpg\"]', '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(130, 256, '[\"62eb6a50380ea_1659595344.jpg\"]', '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(131, 257, '[\"62eb6b8db94ee_1659595661.jpg\",\"62eb6b8dc0acf_1659595661.jpg\",\"62eb6b8dcd9d4_1659595661.jpg\"]', '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(132, 258, '[\"62eb6dea0dc8b_1659596266.jpg\",\"62eb6dea360c6_1659596266.jpg\",\"62eb6dea5123a_1659596266.jpg\",\"62eb6dea7196e_1659596266.jpg\",\"62eb6deb2eafe_1659596267.jpg\"]', '2022-08-04 17:27:47', '2022-08-04 17:27:47'),
(133, 259, '[\"62eb70a80d40d_1659596968.jpg\"]', '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(134, 260, '[\"62eb70c236002_1659596994.jpg\",\"62eb70c238717_1659596994.jpg\",\"62eb70c238f20_1659596994.jpg\"]', '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(135, 262, '[\"62eb73cc16b82_1659597772.jpg\"]', '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(136, 263, '[\"62eb759db86ea_1659598237.jpg\"]', '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(137, 264, '[\"62eb75f9c7a52_1659598329.jpg\"]', '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(138, 265, '[\"62eb77042059a_1659598596.jpg\"]', '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(139, 266, '[\"62eb77d90f443_1659598809.jpg\"]', '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(140, 267, '[\"62eb780231d80_1659598850.jpg\"]', '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(141, 268, '[\"62eb780a1959d_1659598858.jpg\"]', '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(142, 269, '[\"62eb78d1bbcd8_1659599057.jpg\"]', '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(143, 270, '[\"62eb7b434eb65_1659599683.jpg\"]', '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(144, 271, '[\"62eb7c8f09c7d_1659600015.jpg\"]', '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(145, 272, '[\"62eb7cef7cf76_1659600111.jpg\"]', '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(146, 273, '[\"62eb7d42dff56_1659600194.jpg\",\"62eb7d42e320b_1659600194.jpg\",\"62eb7d42e647b_1659600194.jpg\"]', '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(147, 274, '[\"62eb7dbbdff39_1659600315.jpg\"]', '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(148, 275, '[\"62eb7ed871469_1659600600.jpg\",\"62eb7ed8748a5_1659600600.jpg\",\"62eb7ed874e88_1659600600.jpg\"]', '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(149, 276, '[\"62eb7f71b0413_1659600753.jpg\",\"62eb7f71bad7c_1659600753.jpg\",\"62eb7f71c87fa_1659600753.jpg\"]', '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(150, 277, '[\"62eb80fa67098_1659601146.jpg\",\"62eb80fa6997c_1659601146.jpg\",\"62eb80fa69dbe_1659601146.jpg\"]', '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(151, 278, '[\"62eb81a8a78ac_1659601320.jpg\"]', '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(152, 279, '[\"62eb822491f95_1659601444.jpg\",\"62eb822498d9b_1659601444.jpg\",\"62eb8224a783f_1659601444.jpg\"]', '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(153, 280, '[\"62eb82c7c01f0_1659601607.jpg\",\"62eb82c7c353e_1659601607.jpg\",\"62eb82c7c3d1f_1659601607.jpg\"]', '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(154, 281, '[\"62eb832a9caad_1659601706.jpg\"]', '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(155, 282, '[\"62eb84039197a_1659601923.jpg\",\"62eb840393c58_1659601923.jpg\"]', '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(156, 283, '[\"62eb845325e82_1659602003.jpg\"]', '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(157, 284, '[\"62eb89eae9116_1659603434.jpg\"]', '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(158, 285, '[\"62eb8b24e022a_1659603748.jpg\"]', '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(159, 286, '[\"62eb8cc5875a0_1659604165.jpg\"]', '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(160, 287, '[\"62eb8d8be144d_1659604363.jpg\"]', '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(161, 288, '[\"62eb8fd78ffdf_1659604951.jpg\"]', '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(162, 289, '[\"62eb93b940117_1659605945.jpg\"]', '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(163, 290, '[\"62ebaf08b405c_1659612936.jpg\",\"62ebaf08b819a_1659612936.jpg\",\"62ebaf08b8d67_1659612936.jpg\",\"62ebaf08b98ed_1659612936.jpg\"]', '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(165, 292, '[\"62ebc68d36b7c_1659618957.png\"]', '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(174, 307, '[\"62ec5b7b2d4f4_1659657083.jpg\",\"62ec5b7b357d8_1659657083.jpg\",\"62ec5b7b37b12_1659657083.jpg\"]', '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(176, 309, '[\"62ec5f4b12fe8_1659658059.jpg\",\"62ec5f4b2cb6d_1659658059.jpg\"]', '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(177, 310, '[\"62ec5f586ea60_1659658072.jpg\",\"62ec5f5888812_1659658072.jpg\"]', '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(178, 311, '[\"62ec609e313c3_1659658398.jpg\",\"62ec609e38ebd_1659658398.jpg\",\"62ec609e44633_1659658398.jpg\"]', '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(181, 314, '[\"62ec6433e68af_1659659315.jpg\",\"62ec6433e9e6c_1659659315.jpg\",\"62ec6433ea237_1659659315.jpg\"]', '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(182, 315, '[\"62ec65af4df02_1659659695.jpg\",\"62ec65af5029f_1659659695.jpg\"]', '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(183, 316, '[\"62ec66c8e77bf_1659659976.jpg\",\"62ec66c8e9e30_1659659976.jpg\",\"62ec66c8eaa09_1659659976.jpg\",\"62ec66c8eadcd_1659659976.jpg\"]', '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(185, 318, '[\"62ec811a09828_1659666714.jpg\"]', '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(186, 319, '[\"62ec86478098c_1659668039.jpg\"]', '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(187, 320, '[\"62ec86f316a9c_1659668211.jpg\"]', '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(188, 321, '[\"62ec879fe3f51_1659668383.jpg\"]', '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(189, 322, '[\"62ec883885867_1659668536.jpg\"]', '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(190, 323, '[\"62ec88dfb88d2_1659668703.jpg\"]', '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(191, 324, '[\"62ec89a1d1193_1659668897.jpg\"]', '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(192, 325, '[\"62ec97aa61981_1659672490.jpg\"]', '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(193, 326, '[\"62ec986e7eec2_1659672686.jpg\",\"62ec986e82281_1659672686.jpg\"]', '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(194, 327, '[\"62ec99e84fb9b_1659673064.jpg\",\"62ec99e851fea_1659673064.jpg\",\"62ec99e852314_1659673064.jpg\",\"62ec99e852696_1659673064.jpg\"]', '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(195, 328, '[\"62ec9a620c521_1659673186.jpg\"]', '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(196, 329, '[\"62ec9b1c7385b_1659673372.jpg\"]', '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(197, 330, '[\"62ec9b33e532a_1659673395.jpg\",\"62ec9b33e83eb_1659673395.jpg\",\"62ec9b33e8df2_1659673395.jpg\"]', '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(198, 331, '[\"62ec9d5d084a6_1659673949.jpg\"]', '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(199, 332, '[\"62ec9e7302651_1659674227.jpg\"]', '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(200, 333, '[\"62ec9f51c0ec1_1659674449.jpg\"]', '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(201, 334, '[\"62eca0a7c4bf8_1659674791.jpg\"]', '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(202, 335, '[\"62eca1c39bc74_1659675075.jpg\"]', '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(203, 336, '[\"62eca4002a6f2_1659675648.jpg\"]', '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(234, 368, '[\"62f484fb47eb0_1660191995.png\"]', '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yangon Region', NULL, NULL),
(2, 'Mandalay Region', NULL, NULL),
(3, 'Bago Region', NULL, NULL),
(4, 'Ayeyarwady Region', NULL, NULL),
(5, 'Magway Region', NULL, NULL),
(6, 'Sagaing Region', NULL, NULL),
(7, 'Tanintharyi Region', NULL, NULL),
(8, 'Shan State', NULL, NULL),
(9, 'Kayin State', NULL, NULL),
(10, 'Mon State', NULL, NULL),
(11, 'Rakhine State', NULL, NULL),
(12, 'Chin State', NULL, NULL),
(13, 'Kachin State', NULL, NULL),
(14, 'Kayah State', NULL, NULL),
(15, 'Nay Pyi Taw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rent_prices`
--

CREATE TABLE `rent_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `price_by_area` int(11) DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_month` int(11) DEFAULT NULL,
  `rent_pay_type` int(11) DEFAULT NULL,
  `rent_payby_daily` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rent_prices`
--

INSERT INTO `rent_prices` (`id`, `properties_id`, `price`, `area`, `price_by_area`, `currency_code`, `minimum_month`, `rent_pay_type`, `rent_payby_daily`, `created_at`, `updated_at`) VALUES
(2, 14, 806, 1, 961, 'us', 1, 1, 2, '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(3, 21, 2000, 1, 20, 'mmk', 1, 1, 1, '2021-09-23 04:50:44', '2021-09-23 04:50:44'),
(4, 35, 400, 1, 300, 'mmk', 4, 2, 2, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(5, 37, 500, 1, 5, 'mmk', 1, 1, 1, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(6, 39, 400, 1, 20, 'mmk', 1, 1, 2, '2021-09-28 05:32:36', '2021-09-28 08:54:05'),
(7, 41, 4000, 2, 4, 'us', 3, 2, 2, '2021-09-28 09:21:29', '2021-09-28 09:47:06'),
(8, 42, 4000, 1, 4, 'us', 2, 2, 2, '2021-09-28 09:49:27', '2021-09-28 09:49:27'),
(9, 43, 1000, 2, 50, 'us', 3, 2, 2, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(10, 44, 1000, 1, 1000, 'us', 2, 2, 2, '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(11, 46, 4000, 2, 50, 'sg', 3, 2, 2, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(12, 47, 953, 1, 545, 'us', 2, 1, 2, '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(13, 51, 4040, 2, 30, 'sg', 2, 2, 2, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(14, 84, 300, 1, 10, 'mmk', 1, 2, 1, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(15, 91, 300, 1, 10, 'mmk', 1, 2, 1, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(16, 92, 300, 1, 10, 'mmk', 1, 2, 1, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(17, 99, 20000, 1, 100, 'us', 4, 1, 1, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(18, 103, 12000, 2, 1200, 'mmk', 3, 1, 1, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(19, 106, 132, 2, 12, 'us', 1, 1, 1, '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(20, 108, 1233, 1, 12, 'us', 3, 2, 1, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(21, 111, 300, 1, 10, 'mmk', 1, 2, 1, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(22, 112, 300, 1, 10, 'mmk', 1, 2, 1, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(23, 116, 200000, 1, 200000, 'mmk', 1, 1, 2, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(25, 118, 150000, 1, 150000, 'mmk', 1, 1, 2, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(26, 120, 200000, 1, 200000, 'mmk', 1, 1, 2, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(27, 124, 20000, 1, 20000, 'mmk', 1, 1, 2, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(77, 180, 150000, 1, 150000, 'mmk', 2, 1, 2, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(78, 181, 150000, 1, 150000, 'mmk', 1, 1, 2, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(79, 182, 1500000, 1, 150000, 'mmk', 1, 1, 2, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(81, 184, 150000, 1, 150000, 'mmk', 1, 1, 2, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(82, 185, 1500000, 1, 150000, 'mmk', 1, 1, 2, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(83, 191, 2000, 1, 2000, 'mmk', 1, 1, 1, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(84, 192, 1600, 1, 1600, 'mmk', 1, 1, 2, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(85, 193, 1500, 1, 1500, 'mmk', 1, 1, 1, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(86, 194, 900, 1, 900, 'mmk', 1, 1, 1, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(87, 195, 1500, 1, 1500, 'mmk', 1, 1, 1, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(114, 227, 1111, 1, 1, 'mmk', 1, 2, 1, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(121, 234, 1111, 1, 1, 'mmk', 1, 2, 1, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(126, 239, 1111, 1, 1, 'mmk', 1, 2, 1, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(129, 262, 300000, 1, 300000, 'mmk', 2, 2, 2, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(130, 263, 25, 1, 25, 'mmk', 3, 2, 1, '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(131, 264, 350000, 1, 350000, 'mmk', 3, 1, 2, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(132, 265, 10, 1, 10, 'mmk', 3, 1, 1, '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(133, 266, 500000, 1, 500000, 'mmk', 4, 2, 2, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(134, 268, 15, 1, 15, 'mmk', 2, 2, 1, '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(135, 269, 150000, 1, 150000, 'mmk', 3, 2, 2, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(136, 271, 800000, 1, 800000, 'mmk', 4, 2, 2, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(137, 273, 500000, 1, 500000, 'mmk', 4, 2, 1, '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(138, 274, 150000, 1, 150000, 'mmk', 2, 1, 2, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(139, 276, 700000, 1, 700000, 'mmk', 3, 2, 1, '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(140, 279, 300000, 1, 300000, 'mmk', 3, 1, 1, '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(141, 284, 150000, 1, 150000, 'mmk', 2, 2, 2, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(142, 285, 150000, 1, 150000, 'mmk', 2, 2, 2, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(143, 286, 150000, 1, 1500000, 'mmk', 2, 2, 2, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(144, 287, 100000, 1, 100000, 'mmk', 2, 2, 2, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(145, 288, 100000, 1, 100000, 'mmk', 2, 2, 2, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(146, 289, 150000, 1, 150000, 'mmk', 1, 2, 1, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(147, 290, 30000, 2, 30000, 'mmk', 2, 1, 1, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(149, 292, 300, 1, 10, 'mmk', 1, 2, 1, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(164, 307, 20000, 2, 250000, 'mmk', 3, 1, 1, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(166, 309, 20000, 2, 20000, 'mmk', 1, 1, 1, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(167, 310, 20000, 2, 20000, 'mmk', 1, 1, 1, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(168, 311, 25000, 1, 25000, 'mmk', 2, 1, 1, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(171, 314, 200000, 1, 200000, 'mmk', 2, 1, 1, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(172, 323, 650, 1, 650, 'mmk', 4, 2, 2, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(173, 324, 1500000, 1, 1500000, 'mmk', 4, 2, 2, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(174, 334, 150, 2, 150, 'mmk', 2, 2, 2, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(175, 335, 50, 2, 50, 'mmk', 2, 2, 2, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(176, 336, 50, 1, 50, 'mmk', 2, 2, 2, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(182, 368, 300, 1, 10, 'mmk', 1, 2, 1, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` smallint(6) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `situations`
--

CREATE TABLE `situations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `type_of_building` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_repairing` int(11) DEFAULT NULL,
  `year_of_construction` int(11) DEFAULT NULL,
  `building_condition` int(11) DEFAULT NULL,
  `current_fence_situation` int(11) DEFAULT NULL,
  `fence_condition` int(11) DEFAULT NULL,
  `land_type` int(11) DEFAULT NULL,
  `shop_type` int(11) DEFAULT NULL,
  `industrial_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `situations`
--

INSERT INTO `situations` (`id`, `properties_id`, `type_of_building`, `building_repairing`, `year_of_construction`, `building_condition`, `current_fence_situation`, `fence_condition`, `land_type`, `shop_type`, `industrial_type`, `created_at`, `updated_at`) VALUES
(6, 14, 'Esse quo modi qui am', 3, 1973, 2, NULL, NULL, NULL, NULL, NULL, '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(7, 15, 'Wooden', 2, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(10, 20, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-23 04:49:09', '2021-09-23 04:49:09'),
(11, 21, NULL, 2, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2021-09-23 04:50:44', '2021-09-23 04:50:44'),
(24, 34, NULL, 1, 2021, 1, NULL, NULL, NULL, NULL, NULL, '2021-09-24 09:34:56', '2021-09-24 09:34:56'),
(25, 35, NULL, 2, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(26, 36, NULL, 3, 2020, 3, NULL, NULL, NULL, 1, NULL, '2021-09-27 09:27:02', '2021-09-27 09:27:02'),
(27, 37, NULL, 1, 2021, 1, NULL, NULL, NULL, 1, NULL, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(28, 38, NULL, 1, 2021, 1, NULL, NULL, NULL, NULL, 1, '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(29, 39, NULL, 2, 2020, 2, NULL, NULL, NULL, NULL, 1, '2021-09-28 05:32:36', '2021-09-28 05:32:36'),
(30, 40, 'Wooden', 3, 2013, 3, NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:16:28', '2021-09-28 09:17:20'),
(31, 41, NULL, 3, 2017, 3, NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(32, 42, NULL, 2, 2019, 3, NULL, NULL, NULL, NULL, NULL, '2021-09-28 09:49:27', '2021-09-28 09:49:27'),
(33, 43, 'Wooden', 2, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(34, 44, NULL, 2, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(35, 45, NULL, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(36, 46, NULL, 2, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(37, 47, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(38, 48, 'Wooden', 2, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(39, 49, NULL, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(40, 50, 'Wooden', 2, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(41, 51, NULL, 2, 2019, 3, NULL, NULL, NULL, NULL, NULL, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(42, 52, NULL, 3, 2020, 3, NULL, NULL, NULL, NULL, NULL, '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(45, 80, '1', 1, 2022, 2, NULL, NULL, NULL, NULL, NULL, '2022-01-31 12:30:13', '2022-08-05 20:00:51'),
(46, 81, NULL, 1, 2022, 2, NULL, NULL, NULL, 1, NULL, '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(47, 82, NULL, 1, 2020, 2, NULL, NULL, NULL, 1, NULL, '2022-02-01 08:21:40', '2022-02-01 08:22:59'),
(48, 83, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(49, 84, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(50, 85, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(56, 91, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(57, 92, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(58, 93, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(59, 94, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(60, 95, NULL, 1, 2019, 1, NULL, NULL, NULL, NULL, 2, '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(61, 97, NULL, 2, 1989, 1, NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(62, 98, NULL, 1, 2019, 1, NULL, NULL, NULL, NULL, 2, '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(63, 99, NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(64, 100, NULL, 1, 2009, 2, NULL, NULL, NULL, NULL, NULL, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(65, 103, NULL, 2, 2013, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(66, 104, 'Non commodo laborios', 3, 1994, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(67, 105, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(68, 106, NULL, 2, 1971, 2, NULL, NULL, NULL, NULL, 2, '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(69, 107, 'Ad nulla ipsum susc', 3, 2005, 2, NULL, NULL, NULL, NULL, NULL, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(70, 108, NULL, 2, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(71, 109, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(72, 110, NULL, 3, 2010, 2, NULL, NULL, NULL, NULL, NULL, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(73, 111, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(74, 112, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(75, 113, 'Est eos laborum C', 3, 1997, 1, NULL, NULL, NULL, NULL, NULL, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(76, 114, 'RC 2 floor', 3, 2022, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(77, 115, 'RC', 3, 2012, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(78, 116, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(80, 118, 'RC', 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(81, 119, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(82, 120, NULL, 3, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(83, 121, NULL, 3, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(84, 122, NULL, 3, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(85, 123, NULL, 3, 2019, 2, NULL, NULL, NULL, 2, NULL, '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(86, 124, NULL, 3, 2021, 2, NULL, NULL, NULL, 2, NULL, '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(136, 175, 'RC', 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(137, 176, 'RC', 3, 2021, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(138, 177, 'Rc', 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(139, 178, 'RC', 3, 2019, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(140, 179, 'RC', 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(141, 180, 'RC', 3, 2020, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(142, 181, 'RC', 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(143, 182, 'RC', 3, 2021, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(145, 184, 'RC', 3, 2020, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(146, 185, 'RC', 3, 2020, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(147, 186, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(148, 187, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(149, 188, NULL, 3, 2020, 3, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(150, 189, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(151, 190, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(152, 191, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(153, 192, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(154, 193, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(155, 194, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(156, 195, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(157, 196, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(158, 197, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(159, 198, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(160, 199, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(161, 200, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(188, 227, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(195, 234, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(200, 239, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(203, 242, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(205, 244, NULL, 3, 2015, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(206, 245, NULL, 3, 2015, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(207, 246, NULL, 3, 2015, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(210, 249, 'RC', 3, 2015, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(211, 250, 'RC', 3, 2011, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(212, 251, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(213, 252, 'RC', 3, 2009, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(214, 253, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(215, 254, 'RC+သစ်', 3, 2010, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(216, 255, NULL, 2, 2010, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(217, 256, 'RC', 3, 2016, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(218, 257, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(219, 258, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(220, 259, 'RC', 2, 2014, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(221, 260, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(222, 262, 'RC', 3, 2013, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(223, 263, NULL, 3, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(224, 264, 'RC+သစ်', 3, 2006, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(225, 265, NULL, 3, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(226, 266, 'RC', 3, 2012, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(227, 267, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(228, 268, NULL, 3, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(229, 269, 'RC', 3, 2022, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(230, 270, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(231, 271, 'RC', 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(232, 272, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(233, 273, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(234, 274, 'ပျဥ်းကတိုးသစ်အိမ်', 3, 2015, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(235, 275, NULL, 3, 2021, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(236, 276, NULL, 3, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(237, 277, NULL, 2, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(238, 278, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(239, 279, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(240, 280, NULL, 3, 2018, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(241, 281, NULL, 3, 2018, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(242, 282, NULL, 3, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(243, 283, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(244, 284, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(245, 285, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(246, 286, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(247, 287, NULL, 3, 2019, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(248, 288, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(249, 289, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(250, 290, NULL, 3, 2016, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(252, 292, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(267, 307, NULL, 3, 2017, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(269, 309, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(270, 310, NULL, 3, 2020, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(271, 311, NULL, 2, 2022, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(274, 314, NULL, 3, 2017, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(275, 315, NULL, 2, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(276, 316, NULL, 3, 2018, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(278, 318, NULL, 3, 2019, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(279, 319, NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(280, 320, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(281, 321, NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(282, 322, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(283, 323, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(284, 324, NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(285, 325, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(286, 326, NULL, 3, 2018, 3, NULL, NULL, NULL, NULL, NULL, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(287, 327, NULL, 3, 2019, 2, NULL, NULL, NULL, 2, NULL, '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(288, 328, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(289, 329, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(290, 330, NULL, 3, 2017, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(291, 331, NULL, 3, 2019, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(292, 332, NULL, 3, 2018, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(293, 333, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(294, 334, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(295, 335, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(296, 336, NULL, 3, 2020, 2, NULL, NULL, NULL, NULL, 2, '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(327, 368, '1', 1, 2020, 2, NULL, NULL, NULL, NULL, NULL, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `images`, `status`, `created_at`, `updated_at`) VALUES
(9, 'On the Smile', '61ee36ac82174_1643001516.jpg', 1, '2022-01-24 04:43:25', '2022-01-31 05:57:02'),
(10, 'Slider 2', '61ee2e8a56d09_1642999434.jpg', 1, '2022-01-24 04:43:54', '2022-01-24 04:43:54'),
(11, 'Slider 3', '61ee2ea3cb623_1642999459.jpg', 1, '2022-01-24 04:44:19', '2022-01-24 04:44:19'),
(12, 'Slider', '61f7774cbbcc0_1643607884.jpg', 1, '2022-01-31 05:44:44', '2022-01-31 05:44:44'),
(13, 'nono', '61f77a24a0955_1643608612.jpg', 1, '2022-01-31 05:56:52', '2022-01-31 05:56:52'),
(14, 'Voluptas mollitia el', '629dac89a509f_1654500489.jpg', 1, '2022-06-06 07:28:09', '2022-06-06 07:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliments`
--

CREATE TABLE `suppliments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `water_sys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electricity_sys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliments`
--

INSERT INTO `suppliments` (`id`, `properties_id`, `water_sys`, `electricity_sys`, `note`, `created_at`, `updated_at`) VALUES
(6, 14, '1', '1', 'Officiis eos amet e', '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(7, 15, '1', '1', 'Hello', '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(10, 20, '0', '0', NULL, '2021-09-23 04:49:09', '2021-09-23 05:22:23'),
(11, 21, '1', '1', NULL, '2021-09-23 04:50:44', '2021-09-23 04:50:44'),
(24, 34, '1', '1', 'Hello', '2021-09-24 09:34:56', '2021-09-24 09:34:56'),
(25, 35, '0', '1', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.', '2021-09-24 09:57:20', '2021-11-05 08:27:00'),
(26, 36, '0', '0', 'hoho', '2021-09-27 09:27:02', '2021-09-27 11:29:06'),
(27, 37, '1', '1', NULL, '2021-09-27 09:48:34', '2021-09-27 09:48:34'),
(28, 38, '1', '1', 'DanuByu', '2021-09-28 05:28:42', '2021-09-28 05:28:42'),
(29, 39, '1', '1', 'HOHO', '2021-09-28 05:32:36', '2021-09-28 05:32:36'),
(30, 40, '0', '0', 'Hello', '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(31, 41, '0', '1', 'NO water', '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(32, 42, '0', '0', 'HIHI', '2021-09-28 09:49:27', '2021-09-28 09:49:27'),
(33, 43, '1', '1', 'HOHO', '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(34, 44, '1', '1', 'HOHO', '2021-09-28 10:27:16', '2021-09-28 10:27:16'),
(35, 45, '1', '1', 'hihi', '2021-09-28 10:47:52', '2021-09-28 10:47:52'),
(36, 46, '1', '1', 'HOHO', '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(37, 47, '0', '1', 'Irure omnis nisi rep', '2021-09-28 10:53:02', '2022-04-19 07:10:37'),
(38, 48, '0', '0', 'NO', '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(39, 49, '1', '1', 'HOHO', '2021-10-04 05:47:46', '2021-10-04 05:47:46'),
(40, 50, '1', '0', 'HELLO DEVELOPER PROPERTY', '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(41, 51, '0', '0', 'HELLOE', '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(42, 52, '1', '1', 'testerer', '2021-11-05 04:45:40', '2021-11-05 04:45:40'),
(45, 80, '1', '1', 'text', '2022-01-31 12:30:13', '2022-01-31 12:30:13'),
(46, 81, '1', '1', 'text', '2022-01-31 12:38:05', '2022-01-31 12:38:05'),
(47, 82, '1', '1', 'text', '2022-02-01 08:21:40', '2022-02-01 08:21:40'),
(48, 83, '1', '1', 'text', '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(49, 84, '1', '1', 'text', '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(50, 85, '1', '1', 'textarea', '2022-03-05 13:46:32', '2022-03-05 13:46:32'),
(56, 91, '1', '1', 'text', '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(57, 92, '1', '1', 'text', '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(58, 93, '1', '1', 'textarea', '2022-03-05 14:01:03', '2022-03-05 14:01:03'),
(59, 94, '1', '1', 'textarea', '2022-03-05 14:01:37', '2022-03-05 14:01:37'),
(60, 95, '1', '1', 'textarea', '2022-03-05 14:03:42', '2022-03-05 14:03:42'),
(61, 97, '1', '1', 'text', '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(62, 98, '1', '1', 'textarea', '2022-03-05 14:11:00', '2022-03-05 14:11:00'),
(63, 99, '0', '1', 'Labore molestiae ape', '2022-05-26 08:12:46', '2022-05-26 08:12:46'),
(64, 100, '0', '1', 'Tenetur ea sit moles', '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(65, 103, '0', '0', 'Id vel esse veniam', '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(66, 104, '0', '0', 'Sequi aut suscipit e', '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(67, 105, '1', '1', 'Tempor excepteur off', '2022-06-02 07:38:37', '2022-06-02 07:38:37'),
(68, 106, '1', '0', 'Dolores provident i', '2022-06-02 09:45:36', '2022-06-02 09:45:36'),
(69, 107, '0', '0', 'In quaerat et do ips', '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(70, 108, '0', '0', 'Sapiente proident m', '2022-06-06 05:11:47', '2022-06-06 05:11:47'),
(71, 109, '0', '0', 'Praesentium deserunt', '2022-06-06 05:13:22', '2022-06-06 05:13:22'),
(72, 110, '0', '0', 'Non eum qui ad offic', '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(73, 111, '1', '1', 'text', '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(74, 112, '1', '1', 'text', '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(75, 113, '0', '0', 'Nam anim aperiam et', '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(76, 114, '1', '1', 'Near Market, Near School, Near Shopping Mall', '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(77, 115, '1', '1', 'ဈေးနီး\r\nကြောင်းနီး', '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(78, 116, '1', '1', 'Near Shopping mall\r\nNear park\r\nNear pagoda', '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(80, 118, '1', '1', 'Near park\r\nNear hospital\r\nNear pagoda\r\nNear market', '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(81, 119, '1', '1', 'မင်္ဂလာတောင်ညွှန့်\r\nေဈးနီး\r\nဘုရားနီး', '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(82, 120, '1', '1', 'တာေမွဈေးနီး\r\nသုဝဏ္ဏလမ်းဆုံ\r\nစမ်း​ေ ချာင်း', '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(83, 121, '0', '0', 'လယ်ယာမြေ', '2022-07-19 20:38:08', '2022-07-19 20:38:08'),
(84, 122, '0', '0', 'ပုံစံ(၇) ရပြီး အိမ်ဆောက်လို့ရ', '2022-07-19 20:42:49', '2022-07-19 20:42:49'),
(85, 123, '1', '1', 'အချက်အချာကျသော ဈေးတန်း', '2022-07-19 20:56:31', '2022-07-19 20:56:31'),
(86, 124, '0', '1', 'အချက်အချာကျသော ဆိုင်ခန်းနေရာ', '2022-07-19 21:07:21', '2022-07-19 21:07:21'),
(136, 175, '1', '1', 'ဘားအံမြို့ အမှတ်(၉) ရပ်ကွက် ဝါဆိုဦး ၊ဈေးနီး ၊​ေ ကျာင်းနီး၊ ရေမီးစုံ', '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(137, 176, '1', '1', 'လှာကမြင် ချယ်ရီလမ်း \r\nလမ်းမတန်းနီး\r\nေဈးနီး\r\nေကျာင်းနီး\r\nရေမီးစုံ', '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(138, 177, '1', '1', 'ဈေးနီး \r\n​ေ ကျာင်းနီး\r\nတိတ်ဆိတ် အေးချမ်း\r\nကော့ကျိုက်​ေ ကျးရွာ', '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(139, 178, '1', '1', 'တောင်ကလေး\r\nလမ်းမနီး\r\nလူနေတိတ်ဆိတ်\r\nပတ်ဝန်းကျင်သန့်', '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(140, 179, '1', '1', 'အိမ်တစ်အိမ်နှင့် ဆိုင်ခန်း၃ခန်း\r\nလမ်းထောင့် \r\nဈေးနီး\r\n​ေ ကျာင်းနီး', '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(141, 180, '1', '1', 'ဈေးနီး\r\nေ ကျာင်းနီး\r\nလမ်းမနီး', '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(142, 181, '1', '1', 'ဈေးနီး\r\nေကျာင်းနီး\r\nလမ်းမတန်းနီး\r\nတိတ်ဆိတ်အေး ချမ်း', '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(143, 182, '1', '1', 'တိတ်ဆိတ်အေးချမ်း၍ နေထိုင်ရန်သင့်တော်\r\nခြံဝန်းကျယ်မို့ မိသားစုနှင့်နေရန်အဆင်ပြေ', '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(145, 184, '1', '1', 'Shopping mall နဲ့နီး\r\nလမ်းမတန်းနီး\r\nစည်းကားသောရပ်ကွက်', '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(146, 185, '1', '1', 'တိတ်ဆိတ်​ေ အးချမ်း၍ မိသားစုနှင့်နေရန်သင့်တော်', '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(147, 186, '1', '1', 'မိသားစုနှင့်နေချင်စဖွယ် Condo လေး\r\nရေကူးကန်နှင့် ကစားကွင်းရှိတော့ ကလေးတို့အကြိုက် လူကြီးများအတွက်လဲအပန်းဖြေလို့ရ', '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(148, 187, '1', '1', 'မိသားစုနှင့်နေချင်သူများအတွက် သင့်တော်', '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(149, 188, '1', '1', 'အေအေးချမ်းချမ်း နေချင်သူများအတွက် အဆင်ပြေတဲ့ Condo', '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(150, 189, '1', '1', 'မင်္ဂလာတောင်ညွှန့်ရှိ CONDO', '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(151, 190, '1', '1', '(1650) sqft \r\nပြင်ဆင်ပြီး\r\nဗန္ဒုလကွန်ဒို', '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(152, 191, '1', '1', '(1800) Sqft\r\nပါကေးခင်း\r\nနောက် ေကြွပြားကပ်\r\nပြင်ဆင်ပြီး', '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(153, 192, '1', '1', 'ေေကျာ်လမ်းမပေါ်မှာဖြစ်လို့ သွားလာရလွယ်ကူပြီး အသင့်နေရုံပြင်ဆင်ထားသည့် Condo ခန်းငှားမည်', '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(154, 193, '1', '1', 'Ocean အနီးရှိ အဆင်သင့်နေရုံ Condo ငှားမည်', '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(155, 194, '1', '1', 'Royal sinmin Condo\r\n(1650) Sqft', '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(156, 195, '1', '1', 'အလုံကမ်းနားလမ်း\r\nRiver view condo', '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(157, 196, '0', '0', 'ကရင်ပြည်နယ် ဖာပွန်ခရိုင် မြေကွက်ကျယ်', '2022-07-25 15:01:51', '2022-07-25 15:01:51'),
(158, 197, '0', '0', 'မြဝတီမြို့နယ်ရှိ ခြံကွက်ကျယ်', '2022-07-25 15:05:30', '2022-07-25 15:05:30'),
(159, 198, '0', '0', 'ကရင်ပြည်နယ် ကော့ကရိတ်', '2022-07-25 15:24:20', '2022-07-25 15:24:20'),
(160, 199, '0', '0', 'ကရင်ပြည်နယ် ဘားအံမြို့ တောင်ကလေးရှိခြံရောင်းမည်', '2022-07-25 15:27:20', '2022-07-25 15:27:20'),
(161, 200, '0', '0', 'လှာကမြင်ရှိ မြေကွက်ရောင်းပေးမည်', '2022-07-25 15:29:26', '2022-07-25 15:29:26'),
(188, 227, '1', '1', 'note', '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(195, 234, '1', '1', 'note', '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(200, 239, '1', '1', 'note', '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(203, 242, '1', '1', 'ဈေးနီး၊ ကျောင်းနီးပီး သွားလာရအဆင်ပြေ', '2022-08-04 16:37:22', '2022-08-04 16:37:22'),
(205, 244, '1', '1', 'ဈေး‌နီး၊ကျောင်းနီး၊ဘဏ်နီး', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(206, 245, '1', '1', 'ဈေး‌နီး၊ကျောင်းနီး၊ဘဏ်နီး', '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(207, 246, '1', '1', 'ဈေး‌နီး၊ကျောင်းနီး၊ဘဏ်နီး', '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(210, 249, '1', '1', 'စျေးနီး ကျောင်းနီး အေးချမ်းပြီးအချက်အချာကျ', '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(211, 250, '1', '1', 'စျေးနီး ကျောင်းနီး ကွန်ပျူတာ တက္ကသိုလ်အနီး အေးချမ်း', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(212, 251, '1', '0', 'သမိန်ဗလန်း လမ်းမကြီးအနောက် နှစ်လမ်းကျော် မြိုင်သာယာ ဈေးနီးကျောင်းနီး  ဒေသန္တရ ဈေးရုံအနီး', '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(213, 252, '1', '1', 'မကွေးတက္ကသိုလ်အနီး စီးပွားရေးအချက်အချာကျသောနေရာ', '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(214, 253, '0', '0', 'တိတ်ဆိတ်အေးချမ်းပီး ရင်းနီးထားရန် အလားအလာ ရှိသော မြေကွက်', '2022-08-04 17:04:40', '2022-08-04 17:04:40'),
(215, 254, '1', '1', 'ဗိုလ်ချုပ်လမ်းမကြီးတစ်ကွက်ငုပ် ဝါဆိုဦးစျေးအနီး ကျောင်းနီး ကားဝင်းကြီးအနီး', '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(216, 255, '1', '1', 'ဈေးသင့်လို့းမိသာစုနဲ့အေးချမ်းစွာနေချင်သူအတွက်အထူးအဆင်ပြေ', '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(217, 256, '1', '1', 'စျေးနီးကျောင်းနီး အေးချမ်းတိတ်ဆိတ်', '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(218, 257, '1', '0', 'ဘေးပတ်ဝန်းကျင် ရှူခင်းကောင်း၊ ‌‌လူနေအိမ်များပီးအေ းအေးချမ်းချမ်း အနားယူလိုသော လူကြီးမင်းတို့အတွက်နေရာကောင်းလေးဖြစ်ပါတယ် ရှင့်', '2022-08-04 17:17:41', '2022-08-04 17:17:41'),
(219, 258, '1', '1', 'ဂိုဒေါင်ဆောက်မလား၊ အဆောင်ဆောက်မလား၊ ဝပ်ရှော့ လုပ်မလား စီးပွားရေး လုပ်ရန် အရမ်း အဆင်ပြေသောနေရာ', '2022-08-04 17:27:46', '2022-08-04 17:27:46'),
(220, 259, '1', '1', 'တိတ်ဆိတ်အေးချမ်းစွာနေထိုင်လိုသောလူကြီးမင်းများအတွက် အထူးသင့်တော်သောနေရာကောင်းလေးဖြစ်', '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(221, 260, '0', '0', 'ဇွဲကပင်တောင် view မြင်ရ', '2022-08-04 17:39:54', '2022-08-04 17:39:54'),
(222, 262, '1', '1', 'မြို့မစျေးကြီးအနီး Bank နီး ကျောင်းနီး', '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(223, 263, '1', '1', 'စားသောက်ဆိုင်ဖွင့်ခဲ့သောနေရာဖြစ်သောကြောင့်', '2022-08-04 18:00:37', '2022-08-04 18:00:37'),
(224, 264, '1', '1', 'စျေးနီးကျောင်းနီး ကုန်တိုက်အနီး သွားလာရလွယ်ကူ', '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(225, 265, '1', '1', 'တိတ်ဆိတ် ငြိမ်းချမ်းပီး မြို့တွင်းနဲ့မနီးမဝေး', '2022-08-04 18:06:36', '2022-08-04 18:06:36'),
(226, 266, '1', '1', 'သွားလာရလွယ်ကူ ... နေရာကောင်း Bank နီး စျေးနီး', '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(227, 267, '1', '1', 'Myanmar plaza အနီး\r\nအင်းယားကန်နီး\r\nမိုးကောင်းဘုရားနီး\r\nရန်ကင်းကလေးဆေးရုံအနီး', '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(228, 268, '1', '1', 'ကျယ်ကျယ်ဝန်းဝန်းရှိပီး သွားလာရအဆင်ပြေ တဲ့အပြင် အခြားအဆောက်အဦးမရှိပါ', '2022-08-04 18:10:58', '2022-08-04 18:10:58'),
(229, 269, '1', '1', 'စျေးနီးကျောင်းနီး တိတ်ဆိတ်စွာနေထိုင်ချင်သောသူများအတွက်', '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(230, 270, '1', '1', 'Market နီး\r\nမြစ်ရဲ့အနီး\r\nရေကူးကန်၊14 hrs security', '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(231, 271, '1', '1', 'စီးပွားရေး အချက်ချာကောင်းတဲ့နေရာလေးဖြစ် စျေးနီးကျောင်းနီး', '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(232, 272, '1', '1', 'ဈေးနီး\r\nစက်မှုဇုန်နီး', '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(233, 273, '1', '1', 'လူအဝင်အထွက်များပီး စီးပွားရေးလုပ်ရန် အထူးသင့်တော်သော နေရာ', '2022-08-04 18:33:14', '2022-08-04 18:33:14'),
(234, 274, '1', '1', 'စျေးနီးကျောင်းနီး', '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(235, 275, '1', '1', 'မနေဖိရင်‌ေတာင်ရင်းနှီးမြှုပ်ထားဖို့အဆင်ပြေသောကြောင့်ဝယ်ယူဖို့အထူးသင့်တော်ပါတယ်', '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(236, 276, '1', '1', 'ဆိတ်ငြိမ်သောရပ်ကွက် ဖြစ်ပီး၊ လမ်းအဝင်အထွက်ကောင်းသော နေရာ', '2022-08-04 18:42:33', '2022-08-04 18:42:33'),
(237, 277, '1', '1', 'တိုက်ခန်းနဲ့နေချင်သူများအတွက်', '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(238, 278, '1', '1', 'ကမ်းနားလမ်းအနီး', '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(239, 279, '1', '1', 'အိမ်ခြေနည်းပီး ဆိတ်ငြိမ်သောရပ်ကွက် ၊\r\nပတ်ဝန်းကျင်ကောင်းပီး အေးချမ်းသောနေရာ', '2022-08-04 18:54:04', '2022-08-04 18:54:04'),
(240, 280, '1', '1', 'ဈေးတန်လိာ့အမြန်ဆုံးလက်ဦးသင့်', '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(241, 281, '1', '1', 'စာသင်​ေ ကျာင်းနီး\r\nဈေးနီး\r\nဘုန်းကြီး​ေ ကျာင်းနီး', '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(242, 282, '1', '1', 'ဈေးတန်လို့အမြန်ဆုံးဝယ်သင့်ပါတယ်', '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(243, 283, '1', '1', 'ဘုရားနီး\r\nCondo သန့်', '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(244, 284, '1', '1', NULL, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(245, 285, '1', '1', 'Market နီး\r\nကမ်းနားလမ်းနီး', '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(246, 286, '1', '1', 'ဈေးနီး\r\nဘုရားနီး\r\nပန်းခြံနီး', '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(247, 287, '1', '1', 'ေအးချမ်း၊တိတ်ဆိတ်၍နေချင်စရာကောင်း၊ security 24 hrs', '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(248, 288, '1', '1', 'အင်းလေးကန်အနီး\r\nဘုရားအနီး', '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(249, 289, '1', '1', 'Market နီး\r\nHospital နီး\r\nSchool နီး', '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(250, 290, '1', '1', 'ဈေးသင့်ပြီးကျယ်ကျယ်ဝန်းဝန်းနေချင်သူအတွက်အထူးသင့်တော်သည်', '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(252, 292, '1', '1', 'text', '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(267, 307, '1', '1', 'ဝယ်မလား ငှားမလား တန်စေရမယိ', '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(269, 309, '1', '1', 'ဈေးသင့်ပြီးအေးဆေးနေချင်သူများမတွက်အထူးသင့်တော်သည်', '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(270, 310, '1', '1', 'ဈေးသင့်ပြီးအေးဆေးနေချင်သူများမတွက်အထူးသင့်တော်သည်', '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(271, 311, '1', '1', 'အငှားပို့စ်လေးပါ', '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(274, 314, '1', '1', 'တိုက်ခန်းငှားရန်ရှိသည်', '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(275, 315, '1', '1', 'စီးပွါးရေးလုပ်ချင်သူအတွက်အမြန်ရောသ်းရန်ရှိသည်', '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(276, 316, '1', '1', 'ကိုယ်ပိုင်ရုံးခန်းဖွင့်ချင်သူများအတွက်‌အဆင်ပြေမယ့်နေရာလေးနဲ့မိတ်ဆက်ပေးချင်ပါတယ်', '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(278, 318, '1', '1', 'ကျယ်ကျယ်ဝန်းဝန်းနဲ့သန့်သန့်ပြန်ပြန့်ကိုမှလိုချင်သူတွေအတွက်အရမ်းအဆင်ပြေပါတယ်', '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(279, 319, '0', '0', 'စျေးနီးကျောင်းနီး နေရာကောင်း', '2022-08-05 13:23:59', '2022-08-05 13:23:59'),
(280, 320, '0', '0', 'အချက်အချာကျသောနေရာတွင်ရှိ', '2022-08-05 13:26:51', '2022-08-05 13:26:51'),
(281, 321, '1', '1', 'မြို့နဲ့လည်းမနီးမဝေးကျေးလက်ရဲ့သဘာဝအလှများနှင့်နေချင်သူများအတွက်', '2022-08-05 13:29:43', '2022-08-05 13:29:43'),
(282, 322, '0', '0', 'အေးချမ်းစွာနေထိုင်လိုသူများအတွက်', '2022-08-05 13:32:16', '2022-08-05 13:32:16'),
(283, 323, '1', '1', 'စိီးပွားရေးအတွက်အချက်ချာကျသောနေရာကောင်းလေးဖြစ်', '2022-08-05 13:35:03', '2022-08-05 13:35:03'),
(284, 324, '1', '1', 'အလုပ်ရုံ ဖွင့်ချင်သူများအတွက်သင့်တော်ပြီး အချက်အချာကျသောနေရာမှာရှိ', '2022-08-05 13:38:17', '2022-08-05 13:38:17'),
(285, 325, '1', '1', 'လှိုင်သာယာစက်မှုဇုန်\r\nမြေအကျယ်အဝန်း (140´× 200´)\r\nေဈးနှုန်း သိန်း 2000\r\nလမ်းနှစ်ဖက်ပေါက် ထောင့်ကွက်', '2022-08-05 14:38:10', '2022-08-05 14:38:10'),
(286, 326, '1', '1', 'ရင်းနှီးမြုပ်နှံချင်သူအတွက်အထူးသင့်တော်သည့်နေရာလေးပါ', '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(287, 327, '1', '1', 'ဈေးနီး ကျောင်းနီး ဆိုင်ခန်းဖွင့်ရန် နေရာကောင်း', '2022-08-05 14:47:44', '2022-08-05 14:47:44'),
(288, 328, '1', '1', '​ေ ရွှပေါက်ကံ စက်မှုဇုန်\r\nဂိုထောင်အကျယ် 200´× 240´\r\nဈေးနှုန်း သိန်း 3000', '2022-08-05 14:49:46', '2022-08-05 14:49:46'),
(289, 329, '1', '1', 'လှိုင်သာယာစက်မှုဇုန်\r\nအကျယ်အဝန်း ၂ ဧက\r\nPrice သိန်း4000', '2022-08-05 14:52:52', '2022-08-05 14:52:52'),
(290, 330, '1', '1', 'အသင့်နေထိုင်လို့ရပြီးကိုယ်ပိုင်စီးပွါးရေးလုပ်ချင်သူအတွက်', '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(291, 331, '1', '1', 'လှိုင်သာယာစက်မှုဇုန်\r\nမြေအကျယ် 2.5 ဧက\r\nprice သိန်း 4500', '2022-08-05 15:02:29', '2022-08-05 15:02:29'),
(292, 332, '1', '1', '​ေ ရွှပြည်သာစက်မှုဇုန်\r\nမြေအကျယ် 1.5 ဧက\r\nဈေးနှုန်း သိန်း 1500', '2022-08-05 15:07:07', '2022-08-05 15:07:07'),
(293, 333, '1', '1', 'သာကေတစက်မှုဇုန်\r\nအကျယ်အဝန်း 2 ဧက\r\nဈေးနှုန်း 3500', '2022-08-05 15:10:49', '2022-08-05 15:10:49'),
(294, 334, '1', '1', 'မင်္ဂလာဒုံစက်မှုဇုန်\r\nအကျယ်အဝန်း 0.5 ဧက\r\nဈေးနှုန်း ၁လ သိန်း ၁၅၀', '2022-08-05 15:16:31', '2022-08-05 15:16:31'),
(295, 335, '1', '1', 'သာကေတစက်မှုဇုန်\r\nအကျယ်အဝန်း 1ဧက\r\nအငှားေဈး ၁လ သိန်း  ၅၀', '2022-08-05 15:21:15', '2022-08-05 15:21:15'),
(296, 336, '1', '1', '​ေ ရှ့ဒဂုံစက်မှုဇုန်\r\nအကျယ်အဝန်း (100´×150´)\r\n၁လ သိန်း ၅၀', '2022-08-05 15:30:48', '2022-08-05 15:30:48'),
(327, 368, '1', '1', 'text', '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(2, 'Lanmadaw', 1, '2021-09-14 09:35:51', '2021-09-14 09:35:51'),
(3, 'Latha', 1, '2021-09-14 09:35:51', '2021-09-14 09:35:51'),
(4, 'Kyauktada', 1, '2021-09-14 09:35:51', '2021-09-14 09:35:51'),
(5, 'Pabedan', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(6, 'Pazundaung', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(7, 'Ahlone', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(8, 'Kyeemyindaing', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(9, 'Sanchaung', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(10, 'Bahan', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(11, 'Botahtaung', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(12, 'Mingalartaungnyunt', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(13, 'Tamwe', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(14, 'Yankin', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(15, 'Dagon', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(16, 'Dagon Myothit (East)', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(17, 'Dagon Myothit (North)', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(18, 'Dagon Myothit (South)', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(19, 'Dagon Myothit (Seikkan)', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(20, 'Kamaryut', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(21, 'Insein', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(22, 'Hlaing', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(23, 'Hlaingtharya', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(24, 'Mayangone', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(25, 'Mingaladon', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(26, 'North Okkalapa', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(27, 'South Okkalapa', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(28, 'Thingangyun', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(29, 'Thaketa', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(30, 'Thanlyin', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(31, 'Dala', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(32, 'Dawbon', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(33, 'Hmawbi', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(34, 'Hlegu', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(35, 'Htantabin', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(36, 'Kawhmu', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(37, 'Kayan', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(38, 'Kungyangon', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(39, 'Shwepyithar', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(40, 'Taikkyi', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(41, 'Thongwa', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(42, 'Twantay', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(43, 'Kyauktan', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(44, 'Seikgyikanaungto', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(45, 'Palae Myothit', 1, '2021-09-14 09:35:52', '2021-09-14 09:35:52'),
(46, 'Aung Myay Thar Zan', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(47, 'Chan Aye Thar Zan', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(48, 'Mahar Aung Myay', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(49, 'Chan Mya Thar Si', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(50, 'Pyi Gyi Tan Kon', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(51, 'Amarapura', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(52, 'Pa Thein Gyi', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(53, 'Pyin Oo Lwin', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(54, 'Madaya', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(55, 'Singu', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(56, 'Thabeikkyin', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(57, 'Mogok', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(58, 'Kyaukpadaung', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(59, 'Kyaukse', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(60, 'Sintgaing', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(61, 'Myittha', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(62, 'Tada-U', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(63, 'Myingyan', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(64, 'Thaungtha', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(65, 'Natogyi', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(66, 'Nyaung-U', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(67, 'Meiktila', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(68, 'Mahlaing', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(69, 'Thazi', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(70, 'Wundwin', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(71, 'Pyawbwe', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(72, 'Yamethin', 2, '2021-09-14 09:39:41', '2021-09-14 09:39:41'),
(73, 'Bago', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(74, 'Daik-U', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(75, 'Kawa', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(76, 'Thanatpin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(77, 'Waw', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(78, 'Nyaunglebin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(79, 'Shwegyin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(80, 'Pyay', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(81, 'Paukkaung', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(82, 'Thegon', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(83, 'Shwedaung', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(84, 'Padaung', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(85, 'Paungde', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(86, 'Nattalin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(87, 'Zigon', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(88, 'Tharrawaddy', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(89, 'Gyobingauk', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(90, 'Letpadan', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(91, 'Minhla', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(92, 'Monyo', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(93, 'Okpho', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(94, 'Taungoo', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(95, 'Oktwin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(96, 'Tantabin', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(97, 'Yedashe', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(98, 'Pyu', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(99, 'Kyauktaga', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(100, 'Kyaukkyi', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(101, 'Hpa Yar Gyi', 3, '2021-09-14 09:54:45', '2021-09-14 09:54:45'),
(102, 'Bogale', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(103, 'Danubyu', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(104, 'Einme', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(105, 'Hinthada', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(106, 'Ingapu', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(107, 'Kangyidaunt', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(108, 'Kyaiklat', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(109, 'Kyangin', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(110, 'Kyaunggon', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(111, 'Kyonpyaw', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(112, 'Labutta', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(113, 'Lemyethna', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(114, 'Maubin', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(115, 'Mawlamyinegyun', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(116, 'Myanaung', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(117, 'Myaungmya', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(118, 'Ngapudaw', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(119, 'Nyaungdon', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(120, 'Pantanaw', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(121, 'Pathein', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(122, 'Pyapon', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(123, 'Thabaung', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(124, 'Wakema', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(125, 'Yegyi', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(126, 'Zalun', 4, '2021-09-14 09:55:36', '2021-09-14 09:55:36'),
(127, 'Aunglan', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(128, 'Chauk', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(129, 'Gangaw', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(130, 'Kamma', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(131, 'Magway', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(132, 'Minbu', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(133, 'Mindon', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(134, 'Minhla', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(135, 'Myaing', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(136, 'Myothit', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(137, 'Natmauk', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(138, 'Ngape', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(139, 'Pakokku', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(140, 'Pauk', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(141, 'Pwintbyu', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(142, 'Salin', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(143, 'Saw', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(144, 'Seikphyu', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(145, 'Sidoktaya', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(146, 'Sinbaungwe', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(147, 'Taungdwingyi', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(148, 'Thayet', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(149, 'Tilin', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(150, 'Yenangyaung', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(151, 'Yesagyo', 5, '2021-09-14 10:52:11', '2021-09-14 10:52:11'),
(152, 'Sagaing', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(153, 'Monywa', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(154, 'Shwebo', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(155, 'Tabayin', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(156, 'Katha', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(157, 'Ayadaw', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(158, 'Banmauk', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(159, 'Budalin', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(160, 'Chaung-U', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(161, 'Hkamti', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(162, 'Homalin', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(163, 'Indaw', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(164, 'Kale', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(165, 'Kalewa', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(166, 'kanbalu', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(167, 'Kani', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(168, 'Kawlin', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(169, 'Khin-U', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(170, 'Kyunhla', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(171, 'Lahe', 6, '2021-09-14 10:53:16', '2021-09-14 10:53:16'),
(172, 'Mawlaik', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(173, 'Mingin', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(174, 'Myaung', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(175, 'Myinmu', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(176, 'Nanyun', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(177, 'Pale', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(178, 'Paungbyin', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(179, 'Pinlebu', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(180, 'Salingyi', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(181, 'Tamu', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(182, 'Taze', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(183, 'Tigyaing', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(184, 'Wetlet', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(185, 'Wuntho', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(186, 'Ye-U', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(187, 'Yinmabin', 6, '2021-09-14 10:53:17', '2021-09-14 10:53:17'),
(188, 'Dawei', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(189, 'Kawthoung', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(190, 'Myeik', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(191, 'Bokpyin', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(192, 'Kyunsu', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(193, 'Palaw', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(194, 'Tanintharyi', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(195, 'Thayetchaung', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(196, 'Yebyu', 7, '2021-09-14 10:54:53', '2021-09-14 10:54:53'),
(197, 'Taunggyi', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(198, 'Kalaw', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(199, 'Aung Ban', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(200, 'Kengtung', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(201, 'Tachileik', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(202, 'Hsipaw', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(203, 'Kyuakme', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(204, 'Lashio', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(205, 'Muse', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(206, 'Nawnghkio', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(207, 'Hopong', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(208, 'Loilen', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(209, 'Nyaungshwe', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(210, 'Pindaya', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(211, 'Pinlaung', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(212, 'Matman', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(213, 'Monghpyak', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(214, 'Monghsat', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(215, 'Mongkhet', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(216, 'Mongla', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(217, 'Mongping', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(218, 'Mongton', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(219, 'Mongyang', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(220, 'Mongyawng', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(221, 'Hopang', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(222, 'Hseni', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(223, 'Konkyan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(224, 'Kunlong', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(225, 'Kutkai', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(226, 'Laukkaing', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(227, 'Mabein', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(228, 'Mongmao', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(229, 'Mongmit', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(230, 'Mongyai', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(231, 'Namhsan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(232, 'Namtu', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(233, 'Nanhkan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(234, 'Pangsang', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(235, 'Pangwaun', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(236, 'Tangyan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(237, 'Hsihseng', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(238, 'Kunhing', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(239, 'Kyethi', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(240, 'Laihka', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(241, 'Langkho', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(242, 'Lawksawk', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(243, 'Mawkmai', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(244, 'Monghsu', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(245, 'Mongkaung', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(246, 'Mongnai', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(247, 'Mongpan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(248, 'Nansang', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(249, 'Pekon', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(250, 'Ywangan', 8, '2021-09-14 10:56:05', '2021-09-14 10:56:05'),
(251, 'Bawlakhe', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(252, 'Demoso', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(253, 'Hpasawng', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(254, 'Hpruso', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(255, 'Loikaw', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(256, 'Mese', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(257, 'Shadaw', 14, '2021-09-14 11:09:48', '2021-09-14 11:09:48'),
(258, 'Hlaingbwe', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(259, 'Hpa-An', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(260, 'Hpapun', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(261, 'Kawkareik', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(262, 'Kyain Seikgyi', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(263, 'Myawaddy', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(264, 'Thandaung', 9, '2021-09-14 11:17:12', '2021-09-14 11:17:12'),
(265, 'Bilin', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(266, 'Chaungzon', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(267, 'Kyaikmaraw', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(268, 'Kyaikto', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(269, 'Kyaukpyu', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(270, 'Mawlamyine', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(271, 'Mudon', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(272, 'Paung', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(273, 'Thanbyuzayat', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(274, 'Thaton', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(275, 'Ye', 10, '2021-09-14 11:18:11', '2021-09-14 11:18:11'),
(276, 'Ann', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(277, 'Buthidaung', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(278, 'Gwa', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(279, 'Kyauktaw', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(280, 'Maungdaw', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(281, 'Minbya', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(282, 'Mrauk-U', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(283, 'Munaung', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(284, 'Myebon', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(285, 'Pauktaw', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(286, 'Ponnagyun', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(287, 'Ramree', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(288, 'Rathedaung', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(289, 'Sittwe', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(290, 'Thandwe', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(291, 'Toungup', 11, '2021-09-14 11:19:00', '2021-09-14 11:19:00'),
(292, 'Falam', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(293, 'Hakha', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(294, 'Htantlang', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(295, 'Kanpetlet', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(296, 'Madupi', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(297, 'Mindat', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(298, 'Paletwa', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(299, 'Tiddim', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(300, 'Tonzang', 12, '2021-09-14 11:19:39', '2021-09-14 11:19:39'),
(301, 'Bhamo', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(302, 'Chipwi', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(303, 'Hpakan', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(304, 'Injangyang', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(305, 'Kawnglanghpu', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(306, 'Machanbaw', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(307, 'Mansi', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(308, 'Mogaung', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(309, 'Mohnyin', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(310, 'Momauk', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(311, 'Myitkyina', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(312, 'Nogmung', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(313, 'Puta-O', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(314, 'Shwegu', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(315, 'Sumprabum', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(316, 'Tanai', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(317, 'Tsawlaw', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(318, 'Waingmaw', 13, '2021-09-14 11:20:17', '2021-09-14 11:20:17'),
(319, 'Pyinmana', 15, '2021-09-14 11:21:18', '2021-09-14 11:21:18'),
(320, 'Tatkon', 15, '2021-09-14 11:21:18', '2021-09-14 11:21:18'),
(321, 'Lewe', 15, '2021-09-14 11:21:18', '2021-09-14 11:21:18'),
(322, 'Dekkhinathiri', 15, '2021-09-14 11:21:18', '2021-09-14 11:21:18'),
(323, 'Ottarathiri', 15, '2021-09-14 11:21:18', '2021-09-14 11:21:18'),
(324, 'Pobbathiri', 15, '2021-09-14 11:21:19', '2021-09-14 11:21:19'),
(325, 'Zabuthiri', 15, '2021-09-14 11:21:19', '2021-09-14 11:21:19'),
(326, 'Zeyathiri', 15, '2021-09-14 11:21:19', '2021-09-14 11:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `unit_amenities`
--

CREATE TABLE `unit_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `refrigerator` int(11) NOT NULL DEFAULT 0,
  `washing_machine` int(11) NOT NULL DEFAULT 0,
  `mirowave` int(11) NOT NULL DEFAULT 0,
  `gas_or_electric_stove` int(11) NOT NULL DEFAULT 0,
  `air_conditioning` int(11) NOT NULL DEFAULT 0,
  `tv` int(11) NOT NULL DEFAULT 0,
  `cable_satellite` int(11) NOT NULL DEFAULT 0,
  `internet_wifi` int(11) NOT NULL DEFAULT 0,
  `water_heater` int(11) NOT NULL DEFAULT 0,
  `security_cctv` int(11) NOT NULL DEFAULT 0,
  `fire_alarm` int(11) NOT NULL DEFAULT 0,
  `dinning_table` int(11) NOT NULL DEFAULT 0,
  `bed` int(11) NOT NULL DEFAULT 0,
  `sofa_chair` int(11) NOT NULL DEFAULT 0,
  `private_swimming_pool` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_amenities`
--

INSERT INTO `unit_amenities` (`id`, `properties_id`, `refrigerator`, `washing_machine`, `mirowave`, `gas_or_electric_stove`, `air_conditioning`, `tv`, `cable_satellite`, `internet_wifi`, `water_heater`, `security_cctv`, `fire_alarm`, `dinning_table`, `bed`, `sofa_chair`, `private_swimming_pool`, `created_at`, `updated_at`) VALUES
(6, 14, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '2021-09-19 14:41:28', '2022-04-19 07:11:59'),
(7, 15, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 05:25:28', '2021-09-20 05:25:28'),
(22, 34, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:34:56', '2021-09-24 09:34:56'),
(23, 35, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-24 09:57:20', '2021-09-24 09:57:20'),
(24, 40, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:16:28', '2021-09-28 09:16:28'),
(25, 41, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:21:29', '2021-09-28 09:21:29'),
(26, 42, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 09:49:27', '2021-09-28 09:49:27'),
(27, 43, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 10:02:17', '2021-09-28 10:02:17'),
(28, 46, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-09-28 10:51:00', '2021-09-28 10:51:00'),
(29, 48, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-04 05:39:48', '2021-10-04 05:39:48'),
(30, 50, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-11 05:25:28', '2021-10-11 05:25:28'),
(31, 51, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-11 05:27:25', '2021-10-11 05:27:25'),
(32, 52, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, '2021-11-05 04:45:41', '2021-11-05 04:45:41'),
(39, 80, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-01-31 12:30:13', '2022-02-01 08:06:16'),
(40, 83, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-02-24 12:06:52', '2022-02-24 12:06:52'),
(41, 84, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-04 11:25:11', '2022-03-04 11:25:11'),
(42, 91, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-05 13:59:27', '2022-03-05 13:59:27'),
(43, 92, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-05 13:59:49', '2022-03-05 13:59:49'),
(44, 97, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-05 14:08:24', '2022-03-05 14:08:24'),
(45, 100, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '2022-05-30 10:09:00', '2022-05-31 08:18:06'),
(46, 103, 1, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, '2022-05-30 10:26:11', '2022-05-30 10:26:11'),
(47, 104, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, '2022-05-31 07:47:43', '2022-05-31 07:47:43'),
(48, 107, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0, '2022-06-06 03:37:19', '2022-06-06 03:37:19'),
(49, 110, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, '2022-06-06 05:15:36', '2022-06-06 05:15:36'),
(50, 111, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-06-09 08:46:57', '2022-06-09 08:46:57'),
(51, 112, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-06-09 09:24:28', '2022-06-09 09:24:28'),
(52, 113, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-09 10:45:32', '2022-06-09 10:45:32'),
(53, 114, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-19 18:10:07', '2022-07-19 18:10:07'),
(54, 115, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-19 19:55:39', '2022-07-19 19:55:39'),
(55, 116, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, '2022-07-19 20:11:22', '2022-07-19 20:11:22'),
(57, 118, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 1, 0, 0, '2022-07-19 20:23:15', '2022-07-19 20:23:15'),
(58, 119, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, '2022-07-19 20:30:55', '2022-07-19 20:30:55'),
(59, 120, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, 1, 1, 1, 0, 0, '2022-07-19 20:36:04', '2022-07-19 20:36:04'),
(107, 175, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2022-07-24 21:10:35', '2022-07-24 21:10:35'),
(108, 176, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, '2022-07-24 21:59:34', '2022-07-24 21:59:34'),
(109, 177, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-25 00:09:01', '2022-07-25 00:09:01'),
(110, 178, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, '2022-07-25 00:17:12', '2022-07-25 00:17:12'),
(111, 179, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-25 00:22:22', '2022-07-25 00:22:22'),
(112, 180, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, '2022-07-25 12:56:24', '2022-07-25 12:56:24'),
(113, 181, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-25 13:03:00', '2022-07-25 13:03:00'),
(114, 182, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, '2022-07-25 13:06:15', '2022-07-25 13:06:15'),
(116, 184, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, '2022-07-25 13:12:55', '2022-07-25 13:12:55'),
(117, 185, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, '2022-07-25 13:16:57', '2022-07-25 13:16:57'),
(118, 186, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, '2022-07-25 13:37:17', '2022-07-25 13:37:17'),
(119, 187, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, '2022-07-25 13:43:13', '2022-07-25 13:43:13'),
(120, 188, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, '2022-07-25 14:02:15', '2022-07-25 14:02:15'),
(121, 189, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, '2022-07-25 14:07:19', '2022-07-25 14:07:19'),
(122, 190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, '2022-07-25 14:14:26', '2022-07-25 14:14:26'),
(123, 191, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, '2022-07-25 14:19:34', '2022-07-25 14:19:34'),
(124, 192, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, '2022-07-25 14:24:41', '2022-07-25 14:24:41'),
(125, 193, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, '2022-07-25 14:30:52', '2022-07-25 14:30:52'),
(126, 194, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, '2022-07-25 14:35:46', '2022-07-25 14:35:46'),
(127, 195, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, '2022-07-25 14:38:56', '2022-07-25 14:38:56'),
(154, 227, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-29 01:10:14', '2022-07-29 01:10:14'),
(161, 234, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-29 03:25:13', '2022-07-29 03:25:13'),
(166, 239, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-29 13:56:16', '2022-07-29 13:56:16'),
(170, 244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(171, 245, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:56', '2022-08-04 16:49:56'),
(172, 246, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:49:57', '2022-08-04 16:49:57'),
(175, 249, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:52:38', '2022-08-04 16:52:38'),
(176, 250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 16:57:08', '2022-08-04 16:57:08'),
(177, 252, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:01:09', '2022-08-04 17:01:09'),
(178, 254, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:08:38', '2022-08-04 17:08:38'),
(179, 255, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:11:58', '2022-08-04 17:11:58'),
(180, 256, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:12:24', '2022-08-04 17:12:24'),
(181, 259, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:39:28', '2022-08-04 17:39:28'),
(182, 262, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 17:52:52', '2022-08-04 17:52:52'),
(183, 264, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 18:02:09', '2022-08-04 18:02:09'),
(184, 266, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, '2022-08-04 18:10:09', '2022-08-04 18:10:09'),
(185, 267, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, '2022-08-04 18:10:50', '2022-08-04 18:10:50'),
(186, 269, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 18:14:17', '2022-08-04 18:14:17'),
(187, 270, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, '2022-08-04 18:24:43', '2022-08-04 18:24:43'),
(188, 271, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, '2022-08-04 18:30:15', '2022-08-04 18:30:15'),
(189, 272, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 18:31:51', '2022-08-04 18:31:51'),
(190, 274, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 18:35:15', '2022-08-04 18:35:15'),
(191, 275, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 18:40:00', '2022-08-04 18:40:00'),
(192, 277, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '2022-08-04 18:49:06', '2022-08-04 18:49:06'),
(193, 278, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '2022-08-04 18:52:00', '2022-08-04 18:52:00'),
(194, 280, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, '2022-08-04 18:56:47', '2022-08-04 18:56:47'),
(195, 281, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, '2022-08-04 18:58:26', '2022-08-04 18:58:26'),
(196, 282, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:02:03', '2022-08-04 19:02:03'),
(197, 283, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:03:23', '2022-08-04 19:03:23'),
(198, 284, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:27:14', '2022-08-04 19:27:14'),
(199, 285, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:32:28', '2022-08-04 19:32:28'),
(200, 286, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:39:25', '2022-08-04 19:39:25'),
(201, 287, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:42:43', '2022-08-04 19:42:43'),
(202, 288, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 19:52:31', '2022-08-04 19:52:31'),
(203, 289, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-08-04 20:09:05', '2022-08-04 20:09:05'),
(204, 290, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '2022-08-04 22:05:36', '2022-08-04 22:05:36'),
(206, 292, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-08-04 23:45:57', '2022-08-04 23:45:57'),
(221, 307, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 0, '2022-08-05 10:21:23', '2022-08-05 10:21:23'),
(223, 309, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, '2022-08-05 10:37:39', '2022-08-05 10:37:39'),
(224, 310, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, '2022-08-05 10:37:52', '2022-08-05 10:37:52'),
(225, 311, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, '2022-08-05 10:43:18', '2022-08-05 10:43:18'),
(228, 314, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '2022-08-05 10:58:35', '2022-08-05 10:58:35'),
(229, 315, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, '2022-08-05 11:04:55', '2022-08-05 11:04:55'),
(230, 316, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, '2022-08-05 11:09:36', '2022-08-05 11:09:36'),
(232, 318, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, '2022-08-05 13:01:54', '2022-08-05 13:01:54'),
(233, 326, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, '2022-08-05 14:41:26', '2022-08-05 14:41:26'),
(234, 330, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, 1, 0, '2022-08-05 14:53:15', '2022-08-05 14:53:15'),
(249, 368, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-08-11 14:56:35', '2022-08-11 14:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` smallint(6) DEFAULT NULL,
  `agent_type` int(11) DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `company_name`, `phone`, `description`, `township`, `region`, `address`, `user_type`, `agent_type`, `theme`, `profile_photo`, `cover_photo`, `company_images`, `verify_code`, `facebook_id`, `ip`, `user_agent`, `login_at`, `google_id`, `apple_id`, `other_phone`) VALUES
(1, 'James', 'administrator@estate.com', NULL, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', NULL, NULL, '2022-08-14 20:17:22', NULL, '09259071325', 'Description', '6', '1', 'Address', 1, NULL, NULL, '61811c47b2a47_1635851335.jpg', '61811c2fae328_1635851311.jpg', NULL, NULL, NULL, '45.41.104.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2022-08-14 20:17:22', NULL, NULL, NULL),
(3, 'John', 'agent@estate.com', NULL, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', NULL, NULL, '2022-05-19 09:17:10', 'Magic Real', '09123123123', 'Heloi', NULL, NULL, 'Helot', 4, 1, '2', '6184e673acec5_1636099699.jpg', '6184e673af33a_1636099699.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.109 Safari/537.36', '2022-03-04 05:42:27', NULL, NULL, NULL),
(4, 'Wilsmith', 'developer@estate.com', NULL, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', NULL, NULL, '2022-08-14 20:16:25', 'Developer', '09234234234', 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.', NULL, NULL, 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.', 5, NULL, NULL, '6184f7332c913_1636103987.jpg', NULL, '[]', NULL, NULL, '45.41.104.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2022-08-14 20:16:25', NULL, NULL, '[null]'),
(6, 'Anne Marie', 'editor@gmail.com', NULL, '$2y$10$Pzcmaxbo9vzgNI/ngPA.p.LEAhCMF.2B5/oRgXEk1SxYbjq7vT/Qm', NULL, '2021-11-02 08:56:42', '2022-04-19 04:12:43', NULL, '09456456456', 'Editor', '49', '2', 'ThabinShweHtee', 3, NULL, NULL, '61811c5f50d7a_1635851359.jpg', '61811c5f55775_1635851359.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Staff', 'staff@estate.com', NULL, '$2y$10$/IaQppEBzTHtKnEhRJYcBe.1qotqto1Zuh9KCwRVwjbesXqCrfLxy', NULL, '2021-11-02 09:31:57', '2021-11-05 05:16:20', NULL, '0943434343', 'sdes', NULL, NULL, 'ddress', 2, NULL, NULL, '61811c9c66b04_1635851420.jpg', '61811c9c69141_1635851420.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '2021-11-05 05:16:20', NULL, NULL, NULL),
(8, 'Shwe Taung', 'shwe@gmail.com', NULL, '$2y$10$c5QRpjaIIqNoAUHCOHX1eOAOpGabWF9OlL0S8Ag3aZwF.Y2Ef.2xq', NULL, '2021-11-02 10:48:00', '2022-06-19 15:58:59', 'Shwe Taung', '09767676333', 'Description', '47', '2', 'Address', 4, 1, NULL, '', '', NULL, NULL, NULL, '103.116.12.76', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-19 15:58:59', NULL, NULL, NULL),
(9, 'asus', 'asus@gmail.com', NULL, '$2y$10$SyaZg9CXDS.02njIfUNTe.jF5AzIss61jHsbtGgdjkrYa094pCELC', NULL, '2021-11-05 03:17:59', '2022-06-06 03:35:55', 'Myanmar', '09223343', 'Asus Decsription', NULL, NULL, 'Asus Street', 4, 3, NULL, '6184a6cb4fdf4_1636083403.jpg', '6184a26791cbe_1636082279.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-06 03:35:55', NULL, NULL, NULL),
(10, 'Nann', 'nan@gmail.com', NULL, '$2y$10$yEWZ6KTG21lXPdZ5Hf/e9.ZQdoaku3i.zSjbBsU2C7N3FOV2R7rai', NULL, '2021-11-05 10:08:48', '2022-06-10 02:27:03', 'Shwe Pyi Nan', '09343834839', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque,', '75', '3', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque,', 5, NULL, NULL, '618502b07f84e_1636106928.jpg', '618502b08303e_1636106928.jpg', '[]', NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-10 02:27:03', NULL, NULL, '[\"0909877767676\",\"1234234523523\",\"2342342342323\"]'),
(11, 'Super', 'acer@gmail.com', NULL, '$2y$10$xTOFoqACSxzzMDC6MRRST.S15SjOI3PCOAqhFrirC38gw5OQBh4Vq', NULL, '2021-11-23 05:04:58', '2022-06-08 11:00:04', 'Dagon', '09451701998', NULL, '2', '1', 'Dagon Yangon', 4, 1, NULL, '629d7ba5d96bb_1654487973.jpg', '619c7679efcca_1637643897.png', '[\"629d76b737204_1654486711.png\",\"62a0813485ab9_1654686004.png\"]', NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-08 10:47:49', NULL, NULL, '[\"012929020220\",\"292929292992\",\"09123334455\"]'),
(18, 'Mason Lloyd', 'qipywuj@mailinator.com', NULL, '$2y$10$0TywGJopZvXVlZ60pAX9BOFsMT6GgE0nlGvZuvKoavv98q/99L0s2', NULL, '2021-11-30 10:58:36', '2022-04-19 04:13:34', NULL, '21029922', 'Laborum dolorum eu i', NULL, '10', 'Nisi qui natus enim', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-19 03:09:30', NULL, NULL, NULL),
(21, 'Thura', 'thura@gmail.com', NULL, '$2y$10$n/wwCRDXFAyCM143TSs72etDn2IvgLmlY1UvTYSznlFSN/Nc8j.pO', NULL, '2022-01-18 07:11:52', '2022-01-18 07:11:52', NULL, '09259071323', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '572194', NULL, NULL, NULL, NULL, '101641624883662746966', NULL, NULL),
(23, 'Acer', 'mkty@gmail.com', NULL, '$2y$10$sYIsLvzZh/ffY/tyLfyvoOXGHctCrmyUP8wYEK3lCAXkCIC20TKiK', NULL, '2022-02-15 03:27:53', '2022-04-19 03:28:08', 'Sonic', '09252904395', 'he', '75', '3', 'holahos', 4, 1, NULL, '620b1de19f998_1644895713.jpg', '620b1de1a3774_1644895713.jpg', NULL, '708449', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '2022-03-11 12:37:14', NULL, NULL, NULL),
(25, 'v47', 'v47@gmail.com', NULL, '$2y$10$UEKSb4uYL3HXLj3NuTRZg.jQVwlacMbb3Y6bds8TmYaFBi6BWqaHy', NULL, '2022-03-10 02:45:58', '2022-03-10 02:50:05', 'Nay', '09259071326', NULL, NULL, NULL, 'holahos', 6, NULL, NULL, '6229675d4eacc_1646880605.png', '6229675d5b2a9_1646880605.png', NULL, '889196', NULL, '127.0.0.1', 'PostmanRuntime/7.29.0', '2022-03-10 02:50:05', NULL, NULL, NULL),
(26, 'Vape', 'shinohara@gmail.com', NULL, '$2y$10$STTgmzDunxd16Wu7yqliMOChRSpb9dhY5Dpx1L61wsxYxXz76o346', NULL, '2022-03-22 03:27:37', '2022-06-06 03:35:28', 'Shinoharas', '09259083939', 'HOHO', NULL, NULL, 'Dagon Yangon', 4, 1, NULL, '623942296023b_1647919657.png', '6239422965a58_1647919657.png', NULL, NULL, '1234567890ASDFGHJKLZXCVBNM', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-06 03:35:28', NULL, NULL, NULL),
(27, 'Myanmar', 'yathar@gmail.com', NULL, '$2y$10$ztX1VwsDzCscLPLrsYhBq.XOeF57ABVM6x.vkkXP5zUJk5WT4aARq', NULL, '2022-04-18 09:41:11', '2022-06-06 03:36:16', 'Yathar', '09234494833', 'I am new User', NULL, NULL, '7wards, 10 streets, No,09.', 4, 1, NULL, '625d3236e8075_1650274870.jpg', '625d3236ebb65_1650274870.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-06 03:36:16', NULL, NULL, NULL),
(28, 'Shana Foley', 'xexeq@mailinator.com', NULL, '$2y$10$m3UDgNRxUJ5TsJeW7B3hvOhU4QwWGRt87bLVjqO1Db0XZvR/V.8Nu', NULL, '2022-04-19 03:58:31', '2022-04-19 03:58:31', 'Mcgowan Workman Traders', '5833433', 'Aut ut molestiae et', NULL, '7', 'Temporibus id dolore', 5, NULL, NULL, '625e3367acc77_1650340711.jpg', '625e3367b5023_1650340711.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Clayton Bowen', 'ruhuzig@mailinator.com', NULL, '$2y$10$xrxhmenqju08kWxf7l/4oOghn9l5gZa/ZjjrJ9m1oyBUDIp2Kj7qu', NULL, '2022-04-19 04:27:41', '2022-04-19 04:27:41', NULL, '80333793', 'Culpa a quia veniam', '302', '13', 'Officia autem laudan', 2, NULL, NULL, '625e3a3dcf4de_1650342461.jpg', '625e3a3dd00db_1650342461.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Raven Pierce', 'moqomy@mailinator.com', NULL, '$2y$10$ShYQjLQiyh0l3GqdO/4oleKtF4tnW.WFmWCn/SjQPIMh/pFC61tHa', NULL, '2022-05-05 09:18:29', '2022-05-19 09:19:17', 'Cline Fulton Traders s', '09234334444', 'Esse voluptatibus N', NULL, NULL, 'Dolores qui voluptat', 4, 5, NULL, '6273966568d2c_1651742309.jpg', '6273966572f17_1651742309.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Edan Day', 'zoweciqa@mailinator.com', NULL, '$2y$10$U7jp4gUXzZNUdMLYb11qbuhxl4kvMYsC5z0L8o8BvzmxhApGP3Ytq', NULL, '2022-05-05 10:09:57', '2022-05-19 09:44:27', 'Benjamin and Campbell Co s', '2026337', 'Porro iure illum au', NULL, NULL, 'Laborum Esse dolor', 5, NULL, NULL, '6273a274e9d70_1651745396.jpg', '6273a274f156f_1651745396.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Bradley Gibbs', 'fyla@mailinator.com', NULL, '$2y$10$gDJGv.1aCce4PvFXklAIWOVUDvsL23ITFR9WAyXWM5MST8PWmdykK', NULL, '2022-05-19 07:03:47', '2022-05-19 09:17:24', 'Mccormick and Mcconnell Inc', '09246810293', 'Reiciendis cumque mo', NULL, NULL, 'Facere iusto quis qu', 4, 2, NULL, '6285ebd39175e_1652943827.jpg', '6285ebd396250_1652943827.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Kiara Mckay', 'manidutef@mailinator.com', NULL, '$2y$10$MbxzydnAZOMlkftwIQFTk.ft2ANz1FC6QfzPlvwm/fL4Y.eUwzARm', NULL, '2022-05-19 07:37:24', '2022-05-19 09:18:41', 'Bowen Mcclain LLC', '4189988', 'Molestiae quam Nam d', NULL, NULL, 'Qui labore quis culp', 4, 2, NULL, '6285f3b439ebc_1652945844.jpg', '6285f3b43e1b3_1652945844.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Duncan Richmond', 'bumemera@mailinator.com', NULL, '$2y$10$j9xXt1Jn5Ln8ExtXCmx1juDaxukpelob6yxy3LzEKQ3OKsErQ9q/S', NULL, '2022-05-19 09:45:15', '2022-05-19 09:45:15', 'Velazquez and Francis Co', '4883833', 'Eius sit omnis exerc', '74', '3', 'Ut autem aperiam seq', 5, NULL, NULL, '628611aadf5a3_1652953514.png', '628611aae3223_1652953514.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Heather Robles', 'mobasyrase@mailinator.com', NULL, '$2y$10$aRyTmePzkvS3uDkGe0epie5J3hPioUGeF8b58oIzc6K/WNarOTMv.', NULL, '2022-05-25 08:53:01', '2022-06-03 10:11:25', 'Barnes and Lucas Plc', '0924681012', 'Minim sit et ex ut', NULL, NULL, 'Minima deserunt enim', 4, 4, NULL, '628dee6dbb2fd_1653468781.jpg', '628dee6dc43e3_1653468781.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36', '2022-06-03 10:10:37', NULL, NULL, '[null]'),
(37, 'Zena Brooks', 'jodybeni@mailinator.com', NULL, '$2y$10$39zlVxEAcpnrtu1dBKSW6ObCQgs0EXfYANmRFjPpynk2aDVgyqlTe', NULL, '2022-05-25 09:55:11', '2022-05-25 10:10:07', 'Phelps and Ferrell Traders', '09123455667', 'In occaecat facilis', NULL, NULL, 'Soluta deserunt lore', 5, NULL, NULL, '628dfcffa3be1_1653472511.jpg', '628dfcffa97cf_1653472511.jpg', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36', '2022-05-25 10:10:07', NULL, NULL, NULL),
(38, 'Test', 'test@gmail.com', NULL, '$2y$10$FQU6zCzcnCTmhxunljB4DeAry/3.RTRDay55C7bWKA4VtW/6Tse.W', NULL, '2022-06-17 19:38:43', '2022-06-17 19:38:43', NULL, '09123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476185', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'ARJUN', 'aks.arjun.karki@gmail.com', NULL, '$2y$10$uK3cJR5Bv3CTYmJ97F6M4uYZcrIj0cDwHwmeJXHV01XS2OO6gc4lm', NULL, '2022-06-17 19:39:36', '2022-06-20 00:48:35', NULL, '09797485462', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '326461', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'mkty', 'mktyy@gmail.com', NULL, '$2y$10$iY9VxD3Gix8R/N2TpzQKMeiN9bULMZwbeLutlOUDcR6qxk.cAUnzK', NULL, '2022-07-24 00:18:44', '2022-07-24 00:18:44', NULL, '09252904390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '712373', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Name', '1@gmail.com', NULL, '$2y$10$zp.Ib9UOogsTO5oEufErtu3MahGltR7ynQCf9LNMh2HdoWfm83gbi', NULL, '2022-07-29 02:01:09', '2022-07-29 02:01:09', NULL, '09999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '137640', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Name', '11@gmail.com', NULL, '$2y$10$PhBjQY7lDCfgm4ftwFPYwOzBseWDOgWVhwwZdM3Lthim.oE8LSgwq', NULL, '2022-07-29 02:11:20', '2022-07-29 02:11:20', NULL, '0989899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '241608', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Name', '111@gmail.com', NULL, '$2y$10$iPbW5ViSe4AFiLU6lsjrRucqW1RbpBtamyidt0O6vywD27zows2G6', NULL, '2022-07-29 02:12:28', '2022-07-29 02:12:28', NULL, '09898993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '766408', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Name', '1111@gmail.com', NULL, '$2y$10$hWhBBkBO13.ke5vQ4.o3CuVhdNmttnsVlqTmfCtJY4h/rDmh6cAve', NULL, '2022-07-29 02:18:17', '2022-07-29 02:18:17', NULL, '098989931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596672', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Name', 'aa@gmail.com', NULL, '$2y$10$/XqhpHtSYGwkhqkjLBjyReuMZYDlkCbbLRi/0ZNZ1pPsXlmXt/nQe', NULL, '2022-08-10 02:01:34', '2022-08-10 02:01:34', NULL, '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520789', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Nnn', 'bb@gmail.com', NULL, '$2y$10$V5SvqpSDau.auMH8M15Mh.tQJgUPCw0hs2N.YTYhqhVfuNHgugh7K', NULL, '2022-08-10 02:11:49', '2022-08-10 02:11:49', NULL, '2131643', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '772765', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Ddd', 'bbb@gmail.com', NULL, '$2y$10$UFQFoijy3xnzFkOVtR/vNeP87ISwuyWk2.FdzSkwfxINZxPmZ3/GO', NULL, '2022-08-10 02:17:57', '2022-08-10 02:17:57', NULL, '3669', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '186291', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'dd', 'Azsw@gmail.com', NULL, '$2y$10$8cEONmOAEFkuY12XbmJjjurnFRO3eCFHDahbTwzq9Rc3XvhvyX1Zm', NULL, '2022-08-10 02:19:35', '2022-08-10 02:19:35', NULL, 'dddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '885735', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'dd', 'Azaqsw@gmail.com', NULL, '$2y$10$pjcD21d1Ja4wwhr4Aw1SAuvVKKwsGKtfgsbyyK04mWRzWVIP9Cj2S', NULL, '2022-08-10 02:20:10', '2022-08-10 02:20:10', NULL, '25244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '665023', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'dd', 'aqsw@gmail.com', NULL, '$2y$10$byOeU.XhGDGDsDQZgjDfk.7hjM6ueg79hJ.BBujDftd9syXZdF7Dy', NULL, '2022-08-10 02:20:44', '2022-08-10 02:20:44', NULL, '2524412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '121159', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'dd', 'Cssa@gmail.com', NULL, '$2y$10$bmgieZ22K09H0xcIr6lxnOZu0UYeXU8RbCuHSIyOrr/sSakrUX4rO', NULL, '2022-08-10 02:22:46', '2022-08-10 02:22:46', NULL, '2559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '184647', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'dd', 'Cqqssa@gmail.com', NULL, '$2y$10$D0g1giV521EFeZssJgksb.kDr8Esl76G2YaGJvRRWY9BqitaV8udS', NULL, '2022-08-10 02:28:38', '2022-08-10 02:28:38', NULL, '25592', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '620493', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'dd', 'Zz@gmail.com', NULL, '$2y$10$/y38kL86AOmUdJo5OG8FpOEV3WuEqywZEDZ00YmRTWFjEuX6nWq0u', NULL, '2022-08-10 02:36:30', '2022-08-10 02:36:30', NULL, 'dddd2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103703', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'dd', 'QZz@gmail.com', NULL, '$2y$10$ySfG.TFUypBq2j0OP1TJ1OsqXkBO09HnhxYQoOvQBfLb4mLaklR4O', NULL, '2022-08-10 02:36:57', '2022-08-10 02:36:57', NULL, 'dddd2255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '714345', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'dd', 'Sss@gmail.com', NULL, '$2y$10$bW/ihQnM5Eq5cUFuqCbjiu.PVr9DcHCp4.ojnI4QhsMvDrd8ijlKS', NULL, '2022-08-10 02:41:26', '2022-08-10 02:41:26', NULL, 'dddd66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '967011', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'mkty', 'sai@gmail.com', NULL, '$2y$10$xWpB5AkuOgee8Ty7UGjYTebxXTjdJNbxPKTHCOshAK08TMSrE1.6O', NULL, '2022-08-10 11:24:22', '2022-08-10 11:24:22', NULL, '095210641', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '884119', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'testermmss', 'testermm1s@gmail.com', NULL, '$2y$10$N16hxzR29nAxln/WupD87OesibMQ.SE7NFjvxnJcok6CYCMZUPuwi', NULL, '2022-08-10 14:03:35', '2022-08-10 14:03:35', NULL, '09259071322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '173371', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Name', 'cc@gmail.com', NULL, '$2y$10$FF/Qj0EIeufQ9bLJRMkeSecvFQTqBeecl/B0IJPxsd8BDaCIcoQDy', NULL, '2022-08-13 21:06:36', '2022-08-13 21:07:30', 'Qqq', '123456', NULL, NULL, NULL, 'Qqqq', 4, 1, NULL, '62f77eea99662_1660387050.jpg', '62f77eea9e285_1660387050.jpg', '[]', '512613', NULL, '8.30.234.44', 'okhttp/4.9.2', '2022-08-13 21:07:30', NULL, NULL, NULL),
(59, 'Aung Kyaw Soe', 'aks@gmail.com', NULL, '$2y$10$/mkyaiFXxDj8ZVOjaeseserQf29iAVjqC4ymZ2QPgvHGNhfbd/FNS', NULL, '2022-08-13 21:09:46', '2022-08-13 21:09:46', NULL, '0912345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '637288', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'mkty', 'vv@gmail.com', NULL, '$2y$10$OnZT4c2jD5ocMJ3YAJ4NLOolHohBuUw2CM95YgM9rkr1przu3cM3i', NULL, '2022-08-13 21:11:08', '2022-08-13 21:14:05', NULL, '09252904392', NULL, NULL, NULL, 'holahos', 5, 1, NULL, '62f780758d644_1660387445.jpg', '62f780758ea9b_1660387445.jpg', '[]', '408435', NULL, '45.41.104.215', 'PostmanRuntime/7.29.2', '2022-08-13 21:14:05', NULL, NULL, NULL),
(61, 'Aung Kyaw Soe', 'aeks@gmail.com', NULL, '$2y$10$9ns2rgyVwnXXw3I0.3ZbfucEWK1/fGGz2PfidLFex1ZfbYco2TwNW', NULL, '2022-08-13 21:15:51', '2022-08-13 21:15:51', NULL, '0912345672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '706426', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Aung Kyaw Soe', 'Zzz@gmail.com', NULL, '$2y$10$wj88eXwmzaHsbU7fe2H44uf0jVnua9G2C7lB58GtodFVgMQmFftbO', NULL, '2022-08-13 21:26:57', '2022-08-14 03:24:11', 'Company', '0911223344', NULL, NULL, NULL, 'Qqq', 6, NULL, NULL, '62f785b58c348_1660388789.jpg', '62f785b58e894_1660388789.jpg', '[]', '459478', NULL, '45.41.104.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2022-08-14 03:24:11', NULL, NULL, NULL),
(63, 'sai', 'sainyanhtay@gmail.com', NULL, '$2y$10$zqdK0c8eNvY47uHOymcVFOR5zBHXq4fc5SfPTjBXFHgI3JCFBm062', NULL, '2022-08-15 18:27:03', '2022-08-15 18:27:56', 'sai', '09977820675', NULL, NULL, NULL, 'san chaung', 6, NULL, NULL, '62f9fc8497ac7_1660550276.png', '62f9fc849c2fb_1660550276.png', '[]', '810400', NULL, '103.25.76.171', 'okhttp/4.9.2', '2022-08-15 18:27:56', NULL, NULL, NULL),
(64, 'Tine Myay', 'administrator@tinemyay.com', NULL, '$2a$12$cwiBem26yiXO9sa61AL3qOOMDvYljpRrRHW5C37Ir79hDFEWyzL5G', NULL, NULL, '2022-08-15 18:45:23', NULL, '09259071321', 'Description', '6', '1', 'Address', 1, NULL, NULL, '61811c47b2a47_1635851335.jpg', '61811c2fae328_1635851311.jpg', NULL, NULL, NULL, '45.125.4.28', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-08-15 18:45:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `want_to_buy_rents`
--

CREATE TABLE `want_to_buy_rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `developer_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget_from` int(11) DEFAULT NULL,
  `budget_to` int(11) DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_unit` int(11) DEFAULT NULL,
  `area_width` int(11) DEFAULT NULL,
  `area_length` int(11) DEFAULT NULL,
  `floor_level` int(11) DEFAULT NULL,
  `completion` int(11) DEFAULT NULL,
  `furnished_status` int(11) DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties_type` int(11) DEFAULT NULL,
  `properties_category` int(11) DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_broke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `want_to_buy_rents`
--

INSERT INTO `want_to_buy_rents` (`id`, `agent_id`, `admin_id`, `user_id`, `developer_id`, `title`, `budget_from`, `budget_to`, `currency_code`, `area_unit`, `area_width`, `area_length`, `floor_level`, `completion`, `furnished_status`, `phone_no`, `region`, `township`, `properties_type`, `properties_category`, `descriptions`, `co_broke`, `terms_condition`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 18, NULL, 'Hello HIHI', 200, 400, 'us', 1, 500, 600, 2, 2, 1, '09323232334', '3', '75', 2, 3, 'HElloohohohoa', '1', 1, 1, '2021-10-08 04:31:35', '2021-10-08 05:33:52'),
(5, 1, NULL, 3, NULL, 'MacBook Air', 400, 500, 'us', 2, 500, 500, 1, 2, 1, '09323232334', '2', '48', 1, 3, 'Hello', '0', 1, 1, '2021-10-08 04:36:52', '2021-10-08 04:36:52'),
(7, NULL, NULL, 18, 1, 'HELLO', 400, 600, 'mmk', 2, 400, 400, 2, 1, 2, '094545454545', '1', '2', 1, 3, 'BUY', '1', 1, 1, '2021-10-11 05:40:05', '2021-11-05 04:47:27'),
(8, NULL, NULL, 3, NULL, 'HIHI', 200, 300, 'mmk', 1, 200, 200, 1, 1, 1, '09334393849393', '1', '2', 1, 1, 'Loren Ip sumlo Loren Ip sumloLoren Ip sumlo', '1', 1, 1, '2021-11-05 04:43:35', '2021-11-25 03:20:22'),
(9, NULL, NULL, 4, NULL, 'Buy Mel', 2000, 3000, 'mmk', 2, 400, 600, NULL, 2, NULL, '09234234234', '3', '75', 1, 1, 'Quisque velit nisi, pretium ut lacinia in, elementum id enim.', '1', 1, 1, '2021-11-05 09:08:29', '2021-11-05 09:08:29'),
(10, NULL, NULL, 4, NULL, 'HEI', 200, 500, 'mmk', 2, 300, 400, NULL, 2, NULL, '09234234234', '1', '2', 1, 2, 'Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada.', '1', 1, 1, '2021-11-05 09:09:28', '2021-11-05 09:09:28'),
(11, NULL, NULL, 18, NULL, 'HIHI', 200, 300, 'mmk', 1, 200, 200, 1, 1, 1, '09334393849393', '1', '2', 1, 1, 'Loren Ip sumlo Loren Ip sumloLoren Ip sumlo', '1', 1, 1, '2022-02-07 05:08:59', '2022-02-07 05:08:59'),
(12, NULL, NULL, 18, NULL, 'Voluptate deserunt a', 42, 93, 'us', 2, 100, 100, NULL, 2, NULL, '730292920202', '13', '302', 2, 8, 'Ea minim velit ea il', '1', 1, 1, '2022-04-18 03:27:19', '2022-04-18 03:27:19'),
(13, NULL, NULL, 11, NULL, 'Tempora praesentium', 33, 19, 'sg', 1, 123, 123, NULL, 1, NULL, '0892829292', '10', '265', 2, 8, 'Eum ut quibusdam nos', '0', 1, 1, '2022-06-06 04:08:10', '2022-06-06 04:10:24'),
(14, NULL, NULL, 11, NULL, 'Dolore dolorum lauda', 59, 56, 'us', 1, 84, 13, 27, 2, 1, '09929829239', '5', '127', 1, 3, 'Nam voluptas molliti', '1', 1, 1, '2022-06-06 07:23:47', '2022-06-06 07:23:47'),
(15, NULL, NULL, 10, NULL, 'Omnis commodo ut in', 95, 15, 'sg', 2, 25, 63, NULL, 1, NULL, '66123123412', '1', '3', 2, 8, 'Rem esse ipsum ut fa', '1', 1, 1, '2022-06-09 10:46:52', '2022-06-09 10:46:52'),
(17, NULL, NULL, 62, NULL, 'Title', 222, 333, 'mmk', 1, 11, 22, 3, 1, 1, '1111111', '1', '4', 1, 3, 'Dddd', '0', 1, 1, '2022-08-14 03:23:02', '2022-08-14 03:23:02'),
(18, NULL, NULL, 4, NULL, 'Title', 111, 222, 'mmk', 1, 11, 22, 1, 1, 1, '1122223333', '1', '4', 1, 3, 'Yyy', '0', 1, 0, '2022-08-14 03:27:34', '2022-08-14 03:27:34'),
(19, NULL, NULL, 4, NULL, 'Ttt', 33, 55, 'sg', 1, 333, 555, NULL, 2, NULL, '3236', '1', '4', 2, 1, 'Rrr', '0', 1, 1, '2022-08-14 03:32:47', '2022-08-14 03:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(2, 1, 15, '2021-12-28 10:20:31', '2021-12-28 10:20:31'),
(5, 1, 37, '2022-01-07 15:08:36', '2022-01-07 15:08:36'),
(8, 18, 47, '2022-02-03 02:53:39', '2022-02-03 02:53:39'),
(9, 18, 82, '2022-02-03 02:53:43', '2022-02-03 02:53:43'),
(26, 4, 327, '2022-08-11 15:59:31', '2022-08-11 15:59:31'),
(27, 4, 124, '2022-08-11 15:59:45', '2022-08-11 15:59:45'),
(28, 4, 37, '2022-08-11 16:00:05', '2022-08-11 16:00:05'),
(29, 4, 81, '2022-08-11 16:01:05', '2022-08-11 16:01:05'),
(32, 4, 333, '2022-08-12 21:02:00', '2022-08-12 21:02:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `agent_users`
--
ALTER TABLE `agent_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agent_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `agent_users_email_unique` (`email`);

--
-- Indexes for table `area_sizes`
--
ALTER TABLE `area_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_sizes_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `building_amenities`
--
ALTER TABLE `building_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_amenities_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `developer_users`
--
ALTER TABLE `developer_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `developer_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `developer_users_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_user_id_foreign` (`user_id`),
  ADD KEY `follows_following_id_foreign` (`following_id`);

--
-- Indexes for table `lot_features`
--
ALTER TABLE `lot_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_features_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_projects`
--
ALTER TABLE `new_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `partations`
--
ALTER TABLE `partations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partations_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_p_code_unique` (`p_code`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_prices`
--
ALTER TABLE `rent_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_prices_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situations`
--
ALTER TABLE `situations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `situations_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliments`
--
ALTER TABLE `suppliments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliments_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_amenities`
--
ALTER TABLE `unit_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_amenities_properties_id_foreign` (`properties_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `want_to_buy_rents`
--
ALTER TABLE `want_to_buy_rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_property_id_foreign` (`property_id`),
  ADD KEY `wish_lists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_users`
--
ALTER TABLE `agent_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area_sizes`
--
ALTER TABLE `area_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `building_amenities`
--
ALTER TABLE `building_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `developer_users`
--
ALTER TABLE `developer_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lot_features`
--
ALTER TABLE `lot_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `new_projects`
--
ALTER TABLE `new_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partations`
--
ALTER TABLE `partations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rent_prices`
--
ALTER TABLE `rent_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `situations`
--
ALTER TABLE `situations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suppliments`
--
ALTER TABLE `suppliments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `unit_amenities`
--
ALTER TABLE `unit_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `want_to_buy_rents`
--
ALTER TABLE `want_to_buy_rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `area_sizes`
--
ALTER TABLE `area_sizes`
  ADD CONSTRAINT `area_sizes_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `building_amenities`
--
ALTER TABLE `building_amenities`
  ADD CONSTRAINT `building_amenities_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_following_id_foreign` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lot_features`
--
ALTER TABLE `lot_features`
  ADD CONSTRAINT `lot_features_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partations`
--
ALTER TABLE `partations`
  ADD CONSTRAINT `partations_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rent_prices`
--
ALTER TABLE `rent_prices`
  ADD CONSTRAINT `rent_prices_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `situations`
--
ALTER TABLE `situations`
  ADD CONSTRAINT `situations_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliments`
--
ALTER TABLE `suppliments`
  ADD CONSTRAINT `suppliments_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_amenities`
--
ALTER TABLE `unit_amenities`
  ADD CONSTRAINT `unit_amenities_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
