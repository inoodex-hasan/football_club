-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2026 at 12:47 PM
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
(1, 'About Us', NULL, 'Welcome to AMBIT10N Academy, the premier soccer and futsal community in Dhaka, Bangladesh. Founded by Sanjay Karim, AMBIT10N is committed to nurturing and developing talent in every aspect of the beautiful game, combining expert coaching with holistic training methods, strong family values, and deep-rooted discipline.<br>​<br>Our comprehensive training caters to players of all skill levels, including personalized sessions that emphasize technical skills and game intelligence. Led by highly experienced and deeply passionate players and coaches, including Omar Sise, Diego Rojas, Nikola Vitorovic &amp; Sanjay Karim, we foster a community and create an environment where players thrive, both in competitive play and personal development.<br>​<br>At AMBIT10N, we know that soccer and futsal are more than just sports—they are pathways to personal growth and success in other walks of life. With fundamental training and mastery, along with the blessings of a supportive community, we are committed to guiding each player on their journey to achieving their dreams and becoming their best self.<br>&nbsp;<br>Join us, and unleash your best self.<br>​<br>The AMBIT10N Difference<br>​<br>Unlike many traditional clubs, which often become saturated and system-focused, prioritizing structure over individual growth, AMBIT10N is committed to developing the player, not just the team.<br>​<br>🔹 Smaller Training Groups, Bigger Impact – With lower player-to-coach ratios, every athlete receives personalized attention, ensuring they are more than just a number on a roster.<br>​<br>🔹 Individual Growth Over System Fit – While many clubs emphasize rigid systems and formations, we prioritize developing adaptable, intelligent, and creative players who can excel in any environment.<br>​<br>🔹 More Coaches, More Mentorship – Our elite coaching staff consists of many young professional footballers, giving players first-hand insight into what it takes to succeed at the next level.<br>​<br>Comprehensive Development<br>​<br>Our player development model goes beyond just training sessions:<br>​<br>⚽ Elite Soccer &amp; Futsal Training – The highest level of instruction in the country, focused on refining technical ability, game intelligence, and creativity.<br><br>📚 Classroom Sessions – In-depth tactical analysis, film study, and sports psychology to develop smarter, more well-rounded athletes.<br><br>💪 A Culture of Excellence – A training environment that builds confidence, resilience, and a deep love for the game.<br><br>🌍 Pathway to Pro<br>&nbsp;<br>At AMBIT10N Academy, we don’t just build teams—we build players, equipping them with the skills, mindset, and work ethic to compete at the highest level and pursue their greatest dreams.<br>​<br>Train. Learn. Compete. Succeed.', '[\"uploads/about/1768043227_696232db1ffc5.jpeg\"]', 1, '2025-12-27 03:32:18', '2026-01-10 05:07:07');

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
(36, 39, 2, 'Jadyn Dickens', 'your.email+fakedata85385@gmail.com', '475-227-6081', 'Accusamus aperiam harum sint.', 'Haverhill', '9', 290, NULL, 'pending', '2026-01-10 05:23:47', '2026-01-10 05:23:47'),
(37, 40, 1, 'Cayla Schultz', 'your.email+fakedata71407@gmail.com', '137-376-4640', 'Asperiores facilis nesciunt in voluptatem optio reiciendis.', 'Folsom', '178', 198, NULL, 'completed', '2026-01-10 05:25:50', '2026-01-10 05:26:04'),
(38, 41, 2, 'Mac Hyatt', 'your.email+fakedata46125@gmail.com', '240-357-6685', 'Cum voluptates ad.', 'Merced', '580', 55, NULL, 'pending', '2026-01-10 05:33:52', '2026-01-10 05:33:52'),
(39, 42, 2, 'Emerson Swift', 'your.email+fakedata37434@gmail.com', '939-747-7397', 'Corrupti blanditiis sunt soluta maiores.', 'Elizabeth', '18', 215, NULL, 'pending', '2026-01-10 05:37:22', '2026-01-10 05:37:22'),
(40, 43, 2, 'Celestino Batz', 'your.email+fakedata97508@gmail.com', '727-457-5516', 'Libero corrupti facere quis.', 'Biloxi', '92', 637, NULL, 'pending', '2026-01-10 05:39:23', '2026-01-10 05:39:23'),
(41, 44, 2, 'Celestino Batz', 'your.email+fakedata97508@gmail.com', '727-457-5516', 'Libero corrupti facere quis.', 'Biloxi', '92', 637, 'uploads/admissions/media_69623a7997780.jpg', 'pending', '2026-01-10 05:39:37', '2026-01-10 05:39:37'),
(42, 45, 2, 'Mikayla Batz', 'your.email+fakedata89780@gmail.com', '802-113-0458', 'Possimus autem ipsa ipsa vitae pariatur odit.', 'Colorado Springs', '240', 278, NULL, 'pending', '2026-01-10 05:40:49', '2026-01-10 05:40:49'),
(43, 46, 2, 'Viva Price', 'your.email+fakedata39572@gmail.com', '639-967-7974', 'Fuga maiores molestias dolor nobis nulla mollitia vel temporibus commodi.', 'Gresham', '582', 364, NULL, 'pending', '2026-01-10 05:41:46', '2026-01-10 05:41:46'),
(44, 47, 2, 'Izabella Carroll', 'your.email+fakedata14607@gmail.com', '461-125-5836', 'Dolore distinctio adipisci consectetur exercitationem pariatur aliquam.', 'Cypress', '485', 576, NULL, 'pending', '2026-01-10 05:43:31', '2026-01-10 05:43:31');

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
('laravel-cache-general_setting', 'O:25:\"App\\Models\\GeneralSetting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"general_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:9:\"site_name\";s:13:\"Football Club\";s:13:\"contact_email\";s:22:\"footballclub@gmail.com\";s:13:\"contact_phone\";s:11:\"01930705309\";s:15:\"contact_address\";s:15:\"Mirpur11, Dhaka\";s:13:\"currency_name\";s:3:\"BDT\";s:13:\"currency_icon\";s:3:\"৳\";s:9:\"time_zone\";s:10:\"Asia/Dhaka\";s:3:\"map\";N;s:10:\"created_at\";s:19:\"2025-12-17 10:55:48\";s:10:\"updated_at\";s:19:\"2025-12-17 10:55:48\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:9:\"site_name\";s:13:\"Football Club\";s:13:\"contact_email\";s:22:\"footballclub@gmail.com\";s:13:\"contact_phone\";s:11:\"01930705309\";s:15:\"contact_address\";s:15:\"Mirpur11, Dhaka\";s:13:\"currency_name\";s:3:\"BDT\";s:13:\"currency_icon\";s:3:\"৳\";s:9:\"time_zone\";s:10:\"Asia/Dhaka\";s:3:\"map\";N;s:10:\"created_at\";s:19:\"2025-12-17 10:55:48\";s:10:\"updated_at\";s:19:\"2025-12-17 10:55:48\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:9:\"site_name\";i:1;s:13:\"contact_email\";i:2;s:13:\"contact_phone\";i:3;s:15:\"contact_address\";i:4;s:13:\"currency_name\";i:5;s:13:\"currency_icon\";i:6;s:9:\"time_zone\";i:7;s:3:\"map\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1768052099),
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
(6, NULL, '[\"uploads/gallery/images/1768043445_696233b561c53.jpeg\", \"uploads/gallery/images/1768043445_696233b562137.jpeg\", \"uploads/gallery/images/1768043445_696233b562647.jpeg\"]', '[]', '2026-01-10 05:10:45', '2026-01-10 05:10:45'),
(7, NULL, '[\"uploads/gallery/images/1768043469_696233cd68302.jpeg\", \"uploads/gallery/images/1768043469_696233cd68720.jpeg\", \"uploads/gallery/images/1768043469_696233cd68bf0.jpeg\"]', '[]', '2026-01-10 05:11:09', '2026-01-10 05:11:09'),
(8, NULL, '[\"uploads/gallery/images/1768043600_696234508484f.jpg\"]', '[]', '2026-01-10 05:13:20', '2026-01-10 05:13:20'),
(9, NULL, '[\"uploads/gallery/images/1768043658_6962348a69ef7.jpeg\", \"uploads/gallery/images/1768043658_6962348a6a455.jpeg\", \"uploads/gallery/images/1768043658_6962348a6a9ec.jpeg\", \"uploads/gallery/images/1768043658_6962348a6af54.jpeg\"]', '[]', '2026-01-10 05:14:18', '2026-01-10 05:14:18'),
(10, NULL, '[]', '[\"uploads/gallery/videos/1768043715_696234c3e0c0e.mp4\", \"uploads/gallery/videos/1768043715_696234c3e10cd.mp4\", \"uploads/gallery/videos/1768043715_696234c3e15ca.mp4\", \"uploads/gallery/videos/1768043715_696234c3e1adf.mp4\", \"uploads/gallery/videos/1768043715_696234c3e1f9d.mp4\", \"uploads/gallery/videos/1768043715_696234c3e23e3.mp4\"]', '2026-01-10 05:15:15', '2026-01-10 05:15:15'),
(11, NULL, '[]', '[\"uploads/gallery/videos/1768043858_696235520849e.mp4\"]', '2026-01-10 05:17:38', '2026-01-10 05:17:38');

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
(73, '2025_12_29_065308_add_educational_qualification_to_admissions_table', 14),
(74, '2026_01_10_121332_create_terms_conditions_table', 15),
(75, '2026_01_10_123032_create_privacy_policies_table', 16);

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
(39, 2, 'cod_696236c3045bd', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:23:47', '2026-01-10 05:23:47'),
(40, 1, 'tran_6962373e382d8', 'Processing', 9000, '৳', '260110172601kL4lP8pQ6zYRtp4', 'BKASH-BKash', 'BKash Mobile Banking', '2026-01-10 05:25:50', '2026-01-10 05:26:04'),
(41, 2, 'cod_69623920033da', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:33:52', '2026-01-10 05:33:52'),
(42, 2, 'cod_696239f266522', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:37:22', '2026-01-10 05:37:22'),
(43, 2, 'cod_69623a6b5729f', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:39:23', '2026-01-10 05:39:23'),
(44, 2, 'cod_69623a799775c', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:39:37', '2026-01-10 05:39:37'),
(45, 2, 'cod_69623ac140422', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:40:49', '2026-01-10 05:40:49'),
(46, 2, 'cod_69623afa37a78', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:41:46', '2026-01-10 05:41:46'),
(47, 2, 'cod_69623b639443d', 'Pending', 0, '৳', 'N/A', 'Doorstep', 'N/A', '2026-01-10 05:43:31', '2026-01-10 05:43:31');

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
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Privacy Policy', '<p>&lt;h2&gt;Privacy Policy of Ambition Football Club&lt;/h2&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We at Ambition Football Club are committed to protecting your privacy and ensuring the security of your personal information.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;1. Information We Collect&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We may collect personal information such as name, email, phone number, and other details when you register for our programs, events, or contact us.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;2. How We Use Your Information&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;ul&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;To provide our services and training programs.&lt;/li&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;To communicate important updates or announcements.&lt;/li&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;To improve our website and offerings.&lt;/li&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/ul&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;3. Sharing Your Information&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We do not sell or rent your personal information to third parties. We may share information with trusted partners to provide our services.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;4. Security&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We implement reasonable security measures to protect your personal information from unauthorized access or disclosure.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;5. Cookies &amp; Tracking&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Our website may use cookies to enhance user experience. You can control cookie settings in your browser.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;6. Changes to This Policy&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We may update this Privacy Policy from time to time. Updated policies will be posted on this page.&lt;/p&gt;<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;If you have any questions regarding our Privacy Policy, please contact us at &lt;strong&gt;Ambitionfcmd@gmail.com&lt;/strong&gt;.&lt;/p&gt;</p>', 1, '2026-01-10 06:42:52', '2026-01-10 06:42:52');

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
(1, 'Anik Rahman', 'Footballer', 'Outstanding service and smooth experience! Everything worked perfectly and the support team was very helpful.', 5, 'uploads/reviews/review_1768046335.jpeg', 1, '2025-12-28 04:30:43', '2026-01-10 05:58:55'),
(2, 'Charles Greene', 'Defender', '<p>Great experience overall. The support team responded quickly, though there’s minor room for improvement in delivery times.</p>', 5, 'uploads/reviews/review_1768046384.jpeg', 1, '2026-01-10 05:59:44', '2026-01-10 05:59:44'),
(3, 'Sameer Mia', 'Mid-fielder', '<p>Good quality and easy to navigate. Some features could be more intuitive, but overall a solid experience.</p>', 5, 'uploads/reviews/review_1768046430.jpeg', 1, '2026-01-10 06:00:30', '2026-01-10 06:00:30');

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
('f38xzPk74ijxBqIEHUMQHY5MtW53eAnbnwckjBMU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGZ4dXVrclVFYVZ6d1JpTDU4Qk9ocld6TUJuTXRNYmQyVlpmd0tNZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLm9yZGVycy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768044342),
('KqwLz65XuKxdjAxU051iZ1yKnHQdjLMujv2pW7cT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYm1WbUs0dk1yVm5ycERDYU9CU2FONDBOZUUwQjhHS3hDd2tvQXpiMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL29yZGVycyI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcHJpdmFjeS1wb2xpY2llcyI7czo1OiJyb3V0ZSI7czoyODoiYWRtaW4ucHJpdmFjeV9wb2xpY2llcy5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768049220);

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
(2, 'AMBIT10N Academy', 'Fearless. Focused. United.', 'With a legacy spanning decades, AMBIT10N Academy blends rich football tradition with modern tactics to deliver thrilling performances every season.', 'uploads/sliders/1768041405-KzjpsnDDgq.jpeg', 1, '2025-12-27 03:11:05', '2026-01-10 04:36:45'),
(3, 'AMBIT10N Academy', 'Pride of the City', '<p>AMBIT10N Academy is built on passion, discipline, and teamwork. Competing at the highest level, the club represents the fighting spirit of our city on and off the pitch.</p>', 'uploads/sliders/1768041252-XLDS237I2f.jpeg', 1, '2026-01-10 03:37:58', '2026-01-10 04:34:12');

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
(2, 'Omar Sise', 'Director of Coaching', 'uploads/team/1768042522_6962301a8866d.jpeg', 1, '2025-12-27 05:11:34', '2026-01-10 04:55:22'),
(3, 'Diego Rojas', 'Technical Director', 'uploads/team/1768042364_69622f7cf3682.jpeg', 1, '2026-01-10 04:52:45', '2026-01-10 04:52:45'),
(4, 'Nikola Vitrovic', 'Director fo Foreign Affairs', 'uploads/team/1768042585_696230597c7aa.jpeg', 1, '2026-01-10 04:56:25', '2026-01-10 04:56:25'),
(5, 'Sanjay Karim', 'Academy Director', 'uploads/team/1768042608_69623070f2cbd.jpeg', 1, '2026-01-10 04:56:48', '2026-01-10 04:56:48'),
(6, 'S.I Simon', 'Head Physio', 'uploads/team/1768042645_69623095124f2.jpeg', 1, '2026-01-10 04:57:25', '2026-01-10 04:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Website Terms & Conditions', '<p>&lt;h2&gt;Welcome to Ambition Football Club&lt;/h2&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;By accessing or using our website, you agree to be bound by these Terms and Conditions. Please read them carefully before using our services.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;1. Use of Website&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;You agree to use the website only for lawful purposes and in a way that does not infringe the rights of others.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;2. User Accounts&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Some sections of the website may require you to register. You are responsible for keeping your login details confidential.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;3. Payments &amp; Refunds&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;All payments for training programs or events are final unless otherwise specified. Refunds are processed according to our refund policy.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;4. Intellectual Property&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;All content, logos, and materials are the property of Ambition Football Club and cannot be copied or reused without permission.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3&gt;5. Changes to Terms&lt;/h3&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;We reserve the right to update these Terms &amp; Conditions at any time. Updated terms will be posted on this page.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Thank you for being a part of Ambition Football Club. For any questions, contact us at &lt;strong&gt;Ambitionfcmd@gmail.com&lt;/strong&gt;.&lt;/p&gt;</p>', 1, '2026-01-10 06:29:19', '2026-01-10 06:29:19');

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
(1, 'Pro Development Package', '<p>2 practices per week&nbsp;</p><p>⁠Friday &amp; Saturday</p><p>⁠Location 1: Turf Nation (Tejgaon) ~ 10:00-11:30AM</p><p>Location 2: (100 Feet, Madani Avenue) ~ 5:30-7:00pm\r\n                                </p><br>', '1 month', 9000.00, NULL, NULL, 1, '2025-12-17 02:10:07', '2026-01-10 04:47:04', 0),
(2, 'Elite Academy Package', '<p>2 practices per week&nbsp;</p><p>⁠Friday &amp; Saturday</p><p>⁠Location 1: Turf Nation (Tejgaon) ~ 10:00-11:30AM</p><p>Location 2: (100 Feet, Madani Avenue) ~ 5:30-7:00pm\r\n                                </p><br>', '1 Month', 7000.00, NULL, NULL, 1, '2025-12-28 00:55:02', '2026-01-10 04:47:04', 0),
(3, 'Basic Training Package', '<p>2 practices per week&nbsp;</p><p>⁠Friday &amp; Saturday</p><p>⁠Location 1: Turf Nation (Tejgaon) ~ 10:00-11:30AM</p><p>Location 2: (100 Feet, Madani Avenue) ~ 5:30-7:00pm\r\n                                </p>', '1 month', 5000.00, NULL, NULL, 1, '2025-12-28 00:55:49', '2026-01-10 04:47:04', 1);

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
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
