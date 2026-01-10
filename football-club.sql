-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2026 at 09:43 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football-club`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `description`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', NULL, '<p>It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>', '[\"uploads/about/1766829893_694faf450834e.jpeg\"]', 1, '2025-12-27 03:32:18', '2025-12-27 04:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `training_package_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `order_id`, `training_package_id`, `name`, `email`, `phone`, `educational_qualification`, `address`, `nid`, `age`, `image`, `status`, `created_at`, `updated_at`) VALUES
(32, 35, 3, 'Camila Gutmann', 'your.email+fakedata22444@gmail.com', '705-438-8222', 'Accusantium repu', 'Parma', '105', 215, 'uploads/admissions/media_69525e8fdef11.png', 'completed', '2025-12-29 04:57:19', '2025-12-29 04:57:32'),
(33, 36, 1, 'Imani Howell', 'your.email+fakedata94439@gmail.com', '044-855-8430', 'Inventore hic repellat at nemo dolorem.', 'Dayton', '454', 609, 'uploads/admissions/media_69525f211c3dc.png', 'completed', '2025-12-29 04:59:45', '2025-12-29 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-general_setting', 'O:25:\"App\\Models\\GeneralSetting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"general_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:9:\"site_name\";s:13:\"Football Club\";s:13:\"contact_email\";s:22:\"footballclub@gmail.com\";s:13:\"contact_phone\";s:11:\"01930705309\";s:15:\"contact_address\";s:15:\"Mirpur11, Dhaka\";s:13:\"currency_name\";s:3:\"BDT\";s:13:\"currency_icon\";s:3:\"৳\";s:9:\"time_zone\";s:10:\"Asia/Dhaka\";s:3:\"map\";N;s:10:\"created_at\";s:19:\"2025-12-17 10:55:48\";s:10:\"updated_at\";s:19:\"2025-12-17 10:55:48\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:9:\"site_name\";s:13:\"Football Club\";s:13:\"contact_email\";s:22:\"footballclub@gmail.com\";s:13:\"contact_phone\";s:11:\"01930705309\";s:15:\"contact_address\";s:15:\"Mirpur11, Dhaka\";s:13:\"currency_name\";s:3:\"BDT\";s:13:\"currency_icon\";s:3:\"৳\";s:9:\"time_zone\";s:10:\"Asia/Dhaka\";s:3:\"map\";N;s:10:\"created_at\";s:19:\"2025-12-17 10:55:48\";s:10:\"updated_at\";s:19:\"2025-12-17 10:55:48\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:9:\"site_name\";i:1;s:13:\"contact_email\";i:2;s:13:\"contact_phone\";i:3;s:15:\"contact_address\";i:4;s:13:\"currency_name\";i:5;s:13:\"currency_icon\";i:6;s:9:\"time_zone\";i:7;s:3:\"map\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1768041080),
('laravel-cache-usee@gmail.com|127.0.0.1', 'i:1;', 1767005937),
('laravel-cache-usee@gmail.com|127.0.0.1:timer', 'i:1767005937;', 1767005937);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka, Bangladesh', '01234569870', 'test@example.com', '2025-12-28 05:35:25', '2025-12-28 05:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint UNSIGNED NOT NULL,
  `Full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `Full_name`, `Email_address`, `Phone_number`, `Message`, `created_at`, `updated_at`) VALUES
(4, 'Eriberto Bartell', 'your.email+fakedata58417@gmail.com', '864-026-0724', 'Maxime magnam maiores sint sequi ea maxime rem voluptatem.', '2026-01-10 03:42:38', '2026-01-10 03:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `main_image`, `images`, `location`, `start_date`, `end_date`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stage Show', 'What to Bring<br><br>&nbsp; &nbsp; • Soccer cleats &amp; shin guards<br>&nbsp; &nbsp; • Water bottle<br>&nbsp; &nbsp; • Comfortable athletic wear<br>&nbsp; &nbsp; • Positive attitude!<br><br>Parents are welcome to stay and watch. Our coaches will evaluate players and provide feedback at the end of the session.', 'uploads/events/media_694fcc09bad54.jpeg', '[]', 'New York City', '2025-12-27', NULL, '11:00', '11:30', 1, '2025-12-27 06:07:37', '2025-12-27 06:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `images`, `videos`, `created_at`, `updated_at`) VALUES
(1, 'Test', '[\"uploads/gallery/images/1766910177_6950e8e1c337c.jpg\"]', '[\"uploads/gallery/videos/1766910177_6950e8e1c4952.mp4\"]', '2025-12-28 02:22:57', '2025-12-28 02:31:05'),
(2, NULL, '[\"uploads/gallery/images/1766916226_69510082dbe9b.jpg\"]', '[]', '2025-12-28 04:03:46', '2025-12-28 04:03:46'),
(3, NULL, '[\"uploads/gallery/images/1766916257_695100a1186a8.jpg\"]', '[]', '2025-12-28 04:04:17', '2025-12-28 04:04:57'),
(4, NULL, '[\"uploads/gallery/images/1766916271_695100afd455c.jpg\"]', '[]', '2025-12-28 04:04:31', '2025-12-28 04:04:31'),
(5, NULL, '[\"uploads/gallery/images/1766916309_695100d556449.jpg\"]', '[]', '2025-12-28 04:05:09', '2025-12-28 04:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `contact_email`, `contact_phone`, `contact_address`, `currency_name`, `currency_icon`, `time_zone`, `map`, `created_at`, `updated_at`) VALUES
(1, 'Football Club', 'footballclub@gmail.com', '01930705309', 'Mirpur11, Dhaka', 'BDT', '৳', 'Asia/Dhaka', NULL, '2025-12-17 04:55:48', '2025-12-17 04:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo_settings`
--

CREATE TABLE `logo_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_settings`
--

INSERT INTO `logo_settings` (`id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'uploads/logo/1851827979904697.svg', 'uploads/logo/1851827979906810.svg', '2025-12-18 00:53:02', '2025-12-18 00:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '0001_01_01_000000_create_users_table', 1),
(47, '0001_01_01_000001_create_cache_table', 1),
(48, '0001_01_01_000002_create_jobs_table', 1),
(49, '2025_12_11_111654_create_general_settings_table', 1),
(50, '2025_12_11_123739_create_email_configurations_table', 1),
(51, '2025_12_11_124701_create_logo_settings_table', 1),
(52, '2025_12_13_052423_create_missions_table', 1),
(53, '2025_12_13_064820_create_visions_table', 1),
(54, '2025_12_13_065622_create_abouts_table', 1),
(55, '2025_12_13_071403_create_training_packages_table', 1),
(56, '2025_12_13_082042_create_training_package_images_table', 1),
(57, '2025_12_13_110358_create_gallery_images_table', 1),
(58, '2025_12_14_054317_create_events_table', 1),
(59, '2025_12_15_074934_create_orders_table', 1),
(60, '2025_12_17_064449_create_admissions_table', 1),
(61, '2025_12_23_111004_create_sliders_table', 2),
(62, '2025_12_23_111005_create_sliders_table', 3),
(63, '2025_12_23_111009_create_abouts_table', 4),
(64, '2025_12_27_111009_create_abouts_table', 5),
(65, '2025_12_27_101332_create_teams_table', 6),
(66, '2025_12_27_101333_create_events_table', 7),
(67, '2025_12_27_101343_create_events_table', 8),
(68, '2025_12_28_064117_add_is_popular_to_training_packages_table', 9),
(69, '2025_12_28_080503_create_galleries_table', 10),
(70, '2025_12_28_102005_create_reviews_table', 11),
(71, '2025_12_28_110609_create_contacts_table', 12),
(72, '2025_12_28_120815_create_contact_forms_table', 13),
(73, '2025_12_29_065308_add_educational_qualification_to_admissions_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `training_package_id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_tran_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `training_package_id`, `transaction_id`, `status`, `amount`, `currency`, `bank_tran_id`, `card_type`, `card_issuer`, `created_at`, `updated_at`) VALUES
(4, 1, 'cod_69427ad2e4ea5', 'processing', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-17 03:41:38', '2025-12-18 04:47:31'),
(5, 1, 'tran_69427c4422f74', 'processing', 664, '৳', '251217154802w0U5JVBOuDt8kSE', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-17 03:47:48', '2025-12-18 04:47:32'),
(6, 1, 'tran_694290756ffd4', 'processing', 664, '৳', '251217171406gawKYD7qbBM1PoZ', 'NAGAD-Nagad', 'Nagad', '2025-12-17 05:13:57', '2025-12-18 04:47:33'),
(7, 1, 'cod_694295357ae81', 'processing', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-17 05:34:13', '2025-12-18 04:47:50'),
(8, 1, 'tran_69429546da2ff', 'cancelled', 664, '৳', NULL, NULL, NULL, '2025-12-17 05:34:30', '2025-12-18 04:48:51'),
(10, 1, 'tran_adm-1766048346-11635380', 'completed', 664, '৳', NULL, NULL, NULL, '2025-12-18 02:59:06', '2025-12-23 04:15:44'),
(12, 2, 'tran_69521e72a5af7', 'Pending', 699, '৳', NULL, NULL, NULL, '2025-12-29 00:23:46', '2025-12-29 00:23:46'),
(13, 2, 'cod_69521e9a5c9cb', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-29 00:24:26', '2025-12-29 00:24:26'),
(14, 1, 'cod_695230e0576f1', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-29 01:42:24', '2025-12-29 01:42:24'),
(15, 2, 'cod_69523c4bc1a01', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-29 02:31:07', '2025-12-29 02:31:07'),
(16, 1, 'cod_6952406aaa8a3', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2025-12-29 02:48:42', '2025-12-29 02:48:42'),
(17, 1, 'tran_69524080b4792', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 02:49:04', '2025-12-29 02:49:04'),
(18, 1, 'tran_695241099a279', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 02:51:21', '2025-12-29 02:51:21'),
(19, 1, 'tran_6952411d6dec5', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 02:51:41', '2025-12-29 02:51:41'),
(20, 1, 'tran_695241ba71325', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 02:54:18', '2025-12-29 02:54:18'),
(21, 1, 'tran_6952435cae681', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 03:01:16', '2025-12-29 03:01:16'),
(22, 1, 'tran_695243817c64b', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 03:01:53', '2025-12-29 03:01:53'),
(23, 1, 'tran_69524b7f4f791', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 03:35:59', '2025-12-29 03:35:59'),
(24, 1, 'tran_695252fbefe76', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:07:55', '2025-12-29 04:07:55'),
(25, 1, 'tran_695253aaa9419', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:10:50', '2025-12-29 04:10:50'),
(26, 1, 'tran_6952542587783', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:12:53', '2025-12-29 04:12:53'),
(27, 1, 'tran_6952549908551', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:14:49', '2025-12-29 04:14:49'),
(28, 1, 'tran_695255135298b', 'Processing', 399, '৳', '25122916173612pzopYNn2Ryysx', 'NAGAD-Nagad', 'Nagad', '2025-12-29 04:16:51', '2025-12-29 04:17:40'),
(29, 1, 'tran_69525a3e349d6', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:38:54', '2025-12-29 04:38:54'),
(30, 1, 'tran_69525a979dfa2', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:40:23', '2025-12-29 04:40:23'),
(31, 1, 'tran_69525bcb1a3ed', 'Pending', 399, '৳', NULL, NULL, NULL, '2025-12-29 04:45:31', '2025-12-29 04:45:31'),
(32, 1, 'tran_69525bfdd879f', 'Processing', 399, '৳', '251229164650XcUaT8O267Kx2yV', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-29 04:46:21', '2025-12-29 04:46:53'),
(33, 2, 'tran_69525c5f04430', 'Processing', 699, '৳', '251229164810GF3bBYEpC9gn2BD', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-29 04:47:59', '2025-12-29 04:48:14'),
(34, 2, 'tran_69525db7dfad1', 'Processing', 699, '৳', '2512291653520kyLsr5NDptAmmb', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-29 04:53:43', '2025-12-29 04:53:55'),
(35, 3, 'tran_69525e8fdeef2', 'Processing', 199, '৳', '2512291657288xDbO8EKpJ0FOcl', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-29 04:57:19', '2025-12-29 04:57:32'),
(36, 1, 'tran_69525f211c3bb', 'Processing', 399, '৳', '2512291659531otUWVYBTl8Lfpj', 'BKASH-BKash', 'BKash Mobile Banking', '2025-12-29 04:59:45', '2025-12-29 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `designation`, `comment`, `rating`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', 'Footballer', 'Super', 5, 'uploads/reviews/review_1766917843.png', 1, '2025-12-28 04:30:43', '2025-12-28 04:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('c4KHHeVOzon1W0C5sVpfAVgMlnPbVnguPYcq7c5f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibEg5MldmdmlPeDdnbE1Hc2RNdWFDSG9GSnNEeTBtdDZEZ3RLam5MRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767005171),
('f38xzPk74ijxBqIEHUMQHY5MtW53eAnbnwckjBMU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGZ4dXVrclVFYVZ6d1JpTDU4Qk9ocld6TUJuTXRNYmQyVlpmd0tNZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768038159),
('f3WgOtwoAlcctClaiqFNwfF9k4ZmMXIRVru3RuH5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ0RjYktsYWRaWWE1V2NON0ZkelB4NHpBdW1kZmxEWHJIRVpjVXYweSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3NldHRpbmdzIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFpbmluZy1wYWNrYWdlLzEiO3M6NToicm91dGUiO3M6MTY6InRyYWluaW5nLmRldGFpbHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1767003395),
('FBNyIGostDseYeKWo97i1GA4lmgUxqnhRGdEcEUU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzJYOUZITXBodkdZU3R3c2xiVWJBQ3dRaEFzV2lSRzNudVJnMmZwciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFpbmluZy1wYWNrYWdlLzEiO3M6NToicm91dGUiO3M6MTY6InRyYWluaW5nLmRldGFpbHMiO319', 1767005116),
('gyNZcXu3mPdEwjzRl6A3NCxZZq2vhVQYr7ALf7XO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiajdic3k5bGF0MDRLakt0TE44bVlscTkybGJXUHE0bHVUc0tSTkJoWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767006000),
('hGbm3EZt14RtpiDBL7brzkBh8HoNlFiNPKayBJfE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWmtCQTFKSGhTVHRrOEJYZDBuQzBjUk45Y0xudXU0RzJUU0ZycGlBSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2FkbWlzc2lvbiI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdHJhaW5pbmctcGFja2FnZS8xIjtzOjU6InJvdXRlIjtzOjE2OiJ0cmFpbmluZy5kZXRhaWxzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767005974),
('jUvmdqL7mmnXUn9YMoTf6zB0i4eHme0tKW7XHhyw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicExIOVc0djROODI5TWVXQnVUWm1YaEhWMW1aZWFINXNTdTYwc0ZNNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3NsaWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYWluaW5nLXBhY2thZ2UvMiI7czo1OiJyb3V0ZSI7czoxNjoidHJhaW5pbmcuZGV0YWlscyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767005615),
('ncQQww6MB2j3KXpsMh53La3UgdobsYY1vnduV1kp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib2FCcVdvMU5HMURzVWlZT09MT2tOT0hlaTNFZGVWbGs5M2hxRzU0MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767003460),
('OohjhHDQe1kFKO8IShgBdf2qlLyFAh2LLQoYaldR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGxIaHJrQ2FBVkp6ZUlXdWUxeDR0UUgxUDZhUDhUZVRYMUxJaVNCMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1767005827),
('wBEaUUGYmsXBfacHydLSBsPTLcme5bE821jcS6Rq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTG90Z2JkcWtHeGd2cXU4SGs3VGJuQzJyY09OUlNMVGkwY29BNkVrQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767005267);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Test', 'hello', 'this is a test', 'uploads/sliders/1768038110-V1IVfx0NmU.jpg', 1, '2025-12-27 03:11:05', '2026-01-10 03:41:50'),
(3, 'Slider 1', 'Test', '<p>hello</p><p><br></p>', 'uploads/sliders/1768037878-CfovmoEMWR.jpg', 1, '2026-01-10 03:37:58', '2026-01-10 03:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Aiden Pfeffer', 'Striker', 'uploads/team/1766833894_694fbee6401fc.png', 1, '2025-12-27 05:11:34', '2025-12-27 05:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `training_packages`
--

CREATE TABLE `training_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_packages`
--

INSERT INTO `training_packages` (`id`, `name`, `description`, `duration`, `price`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`, `is_popular`) VALUES
(1, 'Pro Development Package', '<p>4 sessions per week</p><p>Small group (4-6 players)</p><p>Advanced technical training</p><p><span>Tactical awareness</span></p><p><span>Video analysis</span></p><p><span>1 private session per month</span></p><p><span>Weekly progress report</span></p>', '1 month', 399.00, NULL, NULL, 1, '2025-12-17 02:10:07', '2025-12-28 01:07:39', 1),
(2, 'Elite Academy Package', '<p>                                    4 sessions per week</p><p>Small group (4-6 players)</p><p>Advanced technical training</p><p>Tactical awareness</p><p>Video analysis</p><p>1 private session per month</p><p>Weekly progress report\r\n                                </p>', '1 Month', 699.00, NULL, NULL, 1, '2025-12-28 00:55:02', '2025-12-28 01:07:39', 0),
(3, 'Basic Training Package', '<p>                                    2 sessions per week</p><p>Group training (10-15 players)</p><p>Basic skill development</p><p>Fitness &amp; conditioning</p><p>Monthly progress report\r\n                                </p>', '1 month', 199.00, NULL, NULL, 1, '2025-12-28 00:55:49', '2025-12-28 01:07:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `training_package_images`
--

CREATE TABLE `training_package_images` (
  `id` bigint UNSIGNED NOT NULL,
  `training_package_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '2025-12-17 02:09:30', '$2y$12$kDuBDp60AhLVCU9aMkVKwOPbLYNZbabxYsbUSABOQC5idqPcWlcve', NULL, 'vWzKPmBmXfqxTBDJ5c77mcELbyrC0WQrVc1h0qrM5uQkGz3GhQYvu5UK2Jvg', '2025-12-17 02:09:30', '2025-12-17 02:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admissions_order_id_foreign` (`order_id`),
  ADD KEY `admissions_training_package_id_foreign` (`training_package_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_settings`
--
ALTER TABLE `logo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_packages`
--
ALTER TABLE `training_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_package_images`
--
ALTER TABLE `training_package_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_package_images_training_package_id_foreign` (`training_package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_settings`
--
ALTER TABLE `logo_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_packages`
--
ALTER TABLE `training_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_package_images`
--
ALTER TABLE `training_package_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visions`
--
ALTER TABLE `visions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `admissions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissions_training_package_id_foreign` FOREIGN KEY (`training_package_id`) REFERENCES `training_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_package_images`
--
ALTER TABLE `training_package_images`
  ADD CONSTRAINT `training_package_images_training_package_id_foreign` FOREIGN KEY (`training_package_id`) REFERENCES `training_packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
