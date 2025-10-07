-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-10-07 07:53:22
-- 伺服器版本： 11.5.2-MariaDB
-- PHP 版本： 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bearman`
--

-- --------------------------------------------------------

--
-- 資料表結構 `adminasidebar`
--

DROP TABLE IF EXISTS `adminasidebar`;
CREATE TABLE IF NOT EXISTS `adminasidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL COMMENT '主選單',
  `subtitle` varchar(10) DEFAULT NULL COMMENT '子選單',
  `link` varchar(30) DEFAULT NULL COMMENT 'RouterLink',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='後台側欄列表';

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `front_home`
--

DROP TABLE IF EXISTS `front_home`;
CREATE TABLE IF NOT EXISTS `front_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL COMMENT '標題',
  `seq` int(11) DEFAULT NULL COMMENT '排序',
  `type` char(1) DEFAULT NULL COMMENT 'S:幻燈片/T:文字/P:圖片方塊/L:Logo',
  `typeId` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT 'Y' COMMENT 'Y:啟用',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='首頁物件類型及排序';

--
-- 傾印資料表的資料 `front_home`
--

INSERT INTO `front_home` (`id`, `title`, `seq`, `type`, `typeId`, `active`, `createTime`) VALUES
(2, 'slogan1:我們的願景', 1, 'T', 1, '', '2025-03-09 10:49:55'),
(4, 'Slogan2:我們的服務', 2, 'T', 2, 'Y', '2025-03-09 10:55:21');

-- --------------------------------------------------------

--
-- 資料表結構 `front_type_logo`
--

DROP TABLE IF EXISTS `front_type_logo`;
CREATE TABLE IF NOT EXISTS `front_type_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `createTime` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `front_type_logo_items`
--

DROP TABLE IF EXISTS `front_type_logo_items`;
CREATE TABLE IF NOT EXISTS `front_type_logo_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `front_type_logo_id` int(11) NOT NULL,
  `logo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `front_type_logo_id` (`front_type_logo_id`),
  KEY `logo_id` (`logo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `front_type_pic`
--

DROP TABLE IF EXISTS `front_type_pic`;
CREATE TABLE IF NOT EXISTS `front_type_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_data` text DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='圖塊連結區域';

-- --------------------------------------------------------

--
-- 資料表結構 `front_type_slide`
--

DROP TABLE IF EXISTS `front_type_slide`;
CREATE TABLE IF NOT EXISTS `front_type_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_data` text DEFAULT NULL COMMENT '圖片與對應連結，JSON 格式',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='幻燈片儲存內容';

--
-- 傾印資料表的資料 `front_type_slide`
--

INSERT INTO `front_type_slide` (`id`, `image_data`, `createTime`) VALUES
(7, '[{\"src\":\"images/slidePic/slide_202509021609_487_0.jpg\",\"url\":\"google.com\"},{\"src\":\"images/slidePic/slide_202509021609_519_1.jpg\",\"url\":null}]', '2025-09-02 08:09:34');

-- --------------------------------------------------------

--
-- 資料表結構 `front_type_text`
--

DROP TABLE IF EXISTS `front_type_text`;
CREATE TABLE IF NOT EXISTS `front_type_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `subtitle` varchar(250) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='首頁文案(type:T)';

--
-- 傾印資料表的資料 `front_type_text`
--

INSERT INTO `front_type_text` (`id`, `title`, `subtitle`, `content`, `createTime`) VALUES
(1, '我們的願景', '從啟蒙到精進，陪伴您音樂成長的每一步<br>——為未來撲救美好旋律。', NULL, '2025-03-09 10:52:57'),
(2, '我們的服務', '從選擇到學習，<br>遠熊樂器一站式解決你的音樂需求', '我們不僅提供高品質的樂器，同時提供專業的音樂教育和全面的配件支持。<br>\r\n無論您需要樂器本身還是相關的配件和教學，我們都能提供全方位的解決方案。', '2025-03-09 10:52:57');

-- --------------------------------------------------------

--
-- 資料表結構 `logos`
--

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `createTime` timestamp NULL DEFAULT current_timestamp(),
  `createBy` varchar(30) NOT NULL COMMENT '誰新增的',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `job` char(1) NOT NULL DEFAULT '1' COMMENT '0:管理員/1:小編',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='後台管理人員列表';

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `job`, `createTime`) VALUES
(1, 'admin', '123456', '0', '2024-09-10 02:29:00'),
(2, '111', '12346', '0', '2024-09-10 02:29:00'),
(3, 'test', '123456', '1', '2024-09-10 02:29:25');

-- --------------------------------------------------------

--
-- 資料表結構 `memberlist`
--

DROP TABLE IF EXISTS `memberlist`;
CREATE TABLE IF NOT EXISTS `memberlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` text DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 100,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否停權 0:關閉/1:啟用',
  `remark` varchar(120) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `memberlist`
--

INSERT INTO `memberlist` (`id`, `name`, `password`, `address`, `tel`, `email`, `level`, `active`, `remark`, `createTime`) VALUES
(1, 'test01', '123456', '這是地址這是地址這是地址', '987654321', 'aaaa@mail.com', 999, 1, '測試帳號', '2024-08-27 07:34:53'),
(2, 'test02', '123456', '這是地址這是地址這是地址這是地址', '987654321', 'bbb@mail.com', 100, 1, '測試二號', '2024-08-27 07:34:53'),
(3, 'XXX', '123456', '地址地址地址地址', '13541534', 'aa@mail.com', 100, 1, NULL, '2024-08-28 06:51:25'),
(4, 'XXX', '123456', '地址地址地址地址', '13541534', 'aa@mail.com', 100, 1, NULL, '2024-08-28 06:56:04'),
(5, '小光', '123456', '地址地址地址地址', '13541534', 'aa@mail.com', 100, 1, NULL, '2024-09-09 07:48:11'),
(6, 'XXX', '123456', '這裡是聯絡地址', '13541534', 'aa@mail.com', 100, 1, NULL, '2024-09-09 07:53:16'),
(7, '趙小熊', '123456', '地址地址地址地址', '13541534', 'aa@mail.com', 100, 1, NULL, '2024-09-09 07:55:26'),
(8, 'aaaa', '123456', '台中市西屯區工業一路200號', '422233333', 'test@mail.com', 100, 1, NULL, '2024-09-09 07:57:12'),
(9, 'aaaa', '123456', '台中市西屯區工業一路200號', '422233333', 'test@mail.com', 100, 1, '測試測試', '2024-09-09 07:58:07'),
(19, '王二狗', '123456', 'aaaaaaaaa', '12345678', 'dasds@mail', 100, 1, NULL, '2024-09-15 18:03:09'),
(22, '炸', '444444', 'sdkjaljklsandjkan', '13215645', 'aa@mail.com', 100, 1, 'dsdasdfdgrgw', '2024-09-15 18:12:16'),
(21, '彈', '111111', 'ggsdfsfsfadasdad', '4654143515', 'vv@gmail.como', 100, 1, NULL, '2024-09-15 18:11:26');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(30, 'App\\Models\\Admin\\Manager', 5, 'AUTH TOKEN', '0446632e9e6c422bb22a2cf64d8dc4ae848af79fe00426d3667224e6dcc402cd', '[\"*\"]', '2024-11-30 08:18:59', '2024-11-30 08:18:50', '2024-11-30 08:18:59'),
(51, 'App\\Models\\Admin\\Manager', 3, 'AUTH TOKEN', 'b470469e30edd7e85825fba4008c22661a4fdd7014197b3f08a142bce7bfd7a8', '[\"*\"]', '2024-12-29 09:39:11', '2024-12-29 09:39:11', '2024-12-29 09:39:11'),
(111, 'App\\Models\\Admin\\Manager', 1, 'AUTH TOKEN', 'a6e3c5f95ced77ba0fe1e7bfbbd795a09c1e5ca94e3eb4ccfac8372365947b04', '[\"*\"]', '2025-09-20 06:10:16', '2025-09-20 06:05:44', '2025-09-20 06:10:16');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
