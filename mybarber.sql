-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 12:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybarber`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `ab_id` bigint(20) UNSIGNED NOT NULL,
  `ab_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ab_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ab_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ab_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `ab_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`ab_id`, `ab_title`, `ab_caption`, `ab_desc`, `ab_image`, `ab_active`, `created_at`, `updated_at`) VALUES
(1, 'About', 'About Caption', 'About Description', 'default.jpg', 1, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(2, 'Dolores enim quis.', 'Ipsum iusto enim distinctio accusamus qui aut.', 'Ab tempore alias molestiae est laudantium quae numquam tempore atque dolores voluptatibus dignissimos ab neque necessitatibus maiores dolor aperiam.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(3, 'Ad omnis ipsam mollitia.', 'Voluptatem blanditiis non reiciendis eum qui nihil aut corporis sint.', 'Vitae laboriosam facere nostrum quisquam vitae eum quo quia rerum ut nemo qui asperiores repudiandae voluptas quo officia quam nihil rerum et accusamus.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(4, 'Quam sint.', 'Ipsam distinctio et similique molestias fuga rem occaecati quaerat excepturi aspernatur.', 'Ipsa exercitationem optio et laborum voluptatem natus tempore rerum assumenda et quod sit impedit velit quo est eum molestiae corrupti velit alias.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pwd`, `admin_image`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$DkQlvSFc343H8x.BBcMhF.hviWCGeevR5X2F8KT.vb8Hz1aYGuHGi', 'default.jpg', '2020-02-16 04:03:07', '2020-02-16 04:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_cat_id` bigint(20) NOT NULL,
  `blog_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_title_slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_cat_id`, `blog_title`, `blog_title_slug`, `blog_content`, `blog_author`, `blog_image`, `blog_post_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ab ipsa sint vel.', 'ab-ipsa-sint-vel', 'Libero nisi ducimus ducimus ab fugiat et dolores non aliquid perferendis molestiae quia beatae a omnis aliquam voluptatem incidunt esse fugit possimus consectetur soluta officiis dignissimos illo autem neque reiciendis sed facere facilis voluptatem et voluptate sed animi qui hic.', 'Bailee Cremin', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(2, 3, 'Qui repellat qui doloremque quam esse.', 'qui-repellat-qui-doloremque-quam-esse', 'Facilis dignissimos voluptate quia nesciunt at et animi sit officiis iure dignissimos minima rerum suscipit est maiores sunt libero suscipit a et eaque harum dolor maxime eius fugit impedit minus similique et qui repellendus magnam.', 'Antwon Pacocha', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(3, 2, 'Maxime aspernatur in quia.', 'maxime-aspernatur-in-quia', 'Error id saepe voluptatem amet quidem ut ea qui corporis minima voluptatibus cupiditate quia id labore corporis ea quasi beatae minima odio porro et deleniti officia dolorem accusamus sit temporibus porro porro.', 'Xander Macejkovic', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(4, 3, 'Dolorum et minus quis sunt aspernatur.', 'dolorum-et-minus-quis-sunt-aspernatur', 'Unde unde et doloribus deleniti deleniti ipsa ea non possimus nulla architecto iste dignissimos illum blanditiis sit et officiis rerum molestiae omnis labore sunt laboriosam cum quos officia enim error excepturi sint.', 'Kaley Schimmel', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(5, 2, 'Fuga porro magni.', 'fuga-porro-magni', 'Dolore eveniet non dolor voluptates facere nulla consectetur est et ut beatae voluptates aut qui sequi sint nesciunt odit dolor quam possimus animi necessitatibus deleniti vel vitae consequatur excepturi eius tempora magni ut ut esse assumenda inventore.', 'Daisha Hill Jr.', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(6, 3, 'Numquam voluptas magnam maiores maxime.', 'numquam-voluptas-magnam-maiores-maxime', 'Repudiandae necessitatibus neque sunt ut velit quo laborum omnis doloremque sed perferendis quae qui harum aliquam non omnis dolorem praesentium voluptate neque vero doloribus aut provident praesentium repudiandae possimus quam.', 'Hayley Cassin', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(7, 2, 'Ea aut magnam voluptatem soluta reprehenderit.', 'ea-aut-magnam-voluptatem-soluta-reprehenderit', 'Illum quis distinctio et ut eos voluptatem quia esse quos ut delectus aliquid explicabo ut aut et quia reprehenderit autem reiciendis non ea quidem illum voluptatem esse itaque veniam nisi voluptatum assumenda et eligendi voluptas nemo ut ut eius totam.', 'Isom Toy II', 'default.jpg', '2020-02-16 11:03:14', '2020-02-16 04:03:14', '2020-02-16 04:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `blog_cat_id` bigint(20) UNSIGNED NOT NULL,
  `blog_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`blog_cat_id`, `blog_cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Id vel.', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(2, 'Sapiente iste.', '2020-02-16 04:03:14', '2020-02-16 04:03:14'),
(3, 'Occaecati.', '2020-02-16 04:03:14', '2020-02-16 04:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_headers`
--

CREATE TABLE `blog_headers` (
  `blog_hd_id` bigint(20) UNSIGNED NOT NULL,
  `blog_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_headers`
--

INSERT INTO `blog_headers` (`blog_hd_id`, `blog_hd_title`, `blog_hd_caption`, `blog_hd_image`, `blog_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Blog', 'Our daily blogs', 'default.jpg', 1, '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(2, 'Ut ullam omnis voluptatem.', 'Quidem dolor non porro neque.', 'default.jpg', 0, '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(3, 'Cupiditate sed autem aut.', 'Ut assumenda quae aliquid.', 'default.jpg', 0, '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(4, 'Cumque labore sed.', 'Nisi et voluptas ut sit.', 'default.jpg', 0, '2020-02-16 04:03:13', '2020-02-16 04:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `created_at`, `updated_at`) VALUES
(1, 'Randall Breitenberg', 'pagac.chaya@yahoo.com', '(568) 500-3210 x745', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(2, 'Amaya Runolfsson', 'bhyatt@gmail.com', '435-994-3642 x65238', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(3, 'Finn O\'Kon', 'kip.bogisich@weber.com', '636.664.8841 x57169', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(4, 'Morgan Krajcik', 'german43@yahoo.com', '(825) 264-8837 x83184', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(5, 'Harrison Ritchie', 'vella.veum@hotmail.com', '+1-790-418-0807', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(6, 'Vance Aufderhar', 'sim80@shields.com', '839-455-1184 x08091', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(7, 'Shania Simonis', 'delphine28@harris.com', '983-234-7429 x00076', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(8, 'Rae Koepp', 'jalon33@borer.com', '+1 (316) 398-7294', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(9, 'Viva Herman', 'emosciski@hotmail.com', '(379) 857-0085 x042', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(10, 'Nova Luettgen', 'sporer.willard@reinger.net', '+1-351-857-9387', '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `error_pages`
--

CREATE TABLE `error_pages` (
  `error_pg_id` bigint(20) UNSIGNED NOT NULL,
  `error_pg_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_pg_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_pg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `error_pages`
--

INSERT INTO `error_pages` (`error_pg_id`, `error_pg_title`, `error_pg_desc`, `error_pg_image`, `created_at`, `updated_at`) VALUES
(1, 'Error 404', 'Page not found', 'default,jpg', '2020-02-16 04:03:07', '2020-02-16 04:03:07');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gal_id` bigint(20) UNSIGNED NOT NULL,
  `gal_tag_id` bigint(20) NOT NULL,
  `gal_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gal_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`gal_id`, `gal_tag_id`, `gal_title`, `gal_image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Et ad inventore.', 'default.jpg', '2020-02-16 04:03:12', '2020-02-16 04:03:12'),
(2, 1, 'Nihil accusamus.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(3, 2, 'Aut et.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(4, 3, 'Et assumenda magni.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(5, 1, 'Ex cum.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(6, 3, 'Natus vitae.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(7, 3, 'Perferendis ut sequi.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(8, 2, 'Unde doloremque.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(9, 3, 'Aspernatur doloribus.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(10, 3, 'Molestiae quia autem.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_headers`
--

CREATE TABLE `gallery_headers` (
  `gal_hd_id` bigint(20) UNSIGNED NOT NULL,
  `gal_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gal_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gal_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_headers`
--

INSERT INTO `gallery_headers` (`gal_hd_id`, `gal_hd_title`, `gal_hd_image`, `gal_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Gallery', 'default.jpg', 1, '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(2, 'Id fugit repellat.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(3, 'Officiis aut aut ut et.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(4, 'Unde ipsa.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tags`
--

CREATE TABLE `gallery_tags` (
  `gal_tag_id` bigint(20) UNSIGNED NOT NULL,
  `gal_tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_tags`
--

INSERT INTO `gallery_tags` (`gal_tag_id`, `gal_tag_name`, `created_at`, `updated_at`) VALUES
(1, 'modi', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(2, 'nesciunt', '2020-02-16 04:03:12', '2020-02-16 04:03:12'),
(3, 'aliquid', '2020-02-16 04:03:12', '2020-02-16 04:03:12');

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
(53, '2020_01_17_062041_create_reservation_details_table', 1),
(69, '2020_02_09_130242_create_websockets_statistics_entries_table', 4),
(70, '2020_02_09_132737_create_notifications_table', 5),
(71, '2020_02_10_044654_create_roles_table', 6),
(322, '2014_10_12_000000_create_users_table', 7),
(323, '2014_10_12_100000_create_password_resets_table', 7),
(324, '2019_08_19_000000_create_failed_jobs_table', 7),
(325, '2020_01_17_051437_create_services_table', 7),
(326, '2020_01_17_051731_create_abouts_table', 7),
(327, '2020_01_17_051917_create_reservations_table', 7),
(328, '2020_01_17_052013_create_customers_table', 7),
(329, '2020_01_17_060144_create_admins_table', 7),
(330, '2020_01_25_080502_create_teams_table', 7),
(331, '2020_02_01_042535_create_testimonials_table', 7),
(332, '2020_02_01_043644_create_testimonial_headers_table', 7),
(333, '2020_02_01_065235_create_team_headers_table', 7),
(334, '2020_02_01_120447_create_products_table', 7),
(335, '2020_02_01_124511_create_product_headers_table', 7),
(336, '2020_02_02_071734_create_treatment_types_table', 7),
(337, '2020_02_02_072053_create_treatments_table', 7),
(338, '2020_02_02_091950_create_treatment_headers_table', 7),
(339, '2020_02_04_084002_create_sliders_table', 7),
(340, '2020_02_04_124758_create_galleries_table', 7),
(341, '2020_02_04_133807_create_gallery_headers_table', 7),
(342, '2020_02_04_134044_create_gallery_tags_table', 7),
(343, '2020_02_06_112648_create_service_headers_table', 7),
(344, '2020_02_07_112854_create_reservation_headers_table', 7),
(345, '2020_02_10_122000_create_settings_table', 7),
(346, '2020_02_11_123706_create_reservation_modes_table', 7),
(347, '2020_02_11_143248_create_reservation_messages_table', 7),
(348, '2020_02_12_112444_create_profiles_table', 7),
(349, '2020_02_12_124635_create_blogs_table', 7),
(350, '2020_02_12_130503_create_blog_categories_table', 7),
(351, '2020_02_12_130841_create_blog_headers_table', 7),
(352, '2020_02_14_144759_create_error_pages_table', 7);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` bigint(20) UNSIGNED NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_price` bigint(20) NOT NULL,
  `prd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `prd_name_slug`, `prd_price`, `prd_image`, `created_at`, `updated_at`) VALUES
(1, 'Ducimus illum sint.', 'ducimus-illum-sint', 75365, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(2, 'Ut magnam esse.', 'ut-magnam-esse', 91502, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(3, 'Voluptatem voluptatem sed.', 'voluptatem-voluptatem-sed', 29115, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(4, 'Nihil enim quam.', 'nihil-enim-quam', 38328, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(5, 'Aut est.', 'aut-est', 59318, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(6, 'Reprehenderit voluptatem consequatur.', 'reprehenderit-voluptatem-consequatur', 71991, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(7, 'Ipsa et impedit.', 'ipsa-et-impedit', 50472, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(8, 'Accusantium ea architecto.', 'accusantium-ea-architecto', 76650, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(9, 'Delectus et.', 'delectus-et', 33599, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(10, 'Dolor ut magnam.', 'dolor-ut-magnam', 54901, 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_headers`
--

CREATE TABLE `product_headers` (
  `prd_hd_id` bigint(20) UNSIGNED NOT NULL,
  `prd_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_headers`
--

INSERT INTO `product_headers` (`prd_hd_id`, `prd_hd_title`, `prd_hd_caption`, `prd_hd_image`, `prd_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Products', 'See Our Products', 'default.jpg', 1, '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(2, 'Voluptatem nihil maiores consequatur.', 'Voluptatem dolore asperiores qui et adipisci corporis illo omnis natus aut sed.', 'default.jpg', 0, '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(3, 'Ea eaque fugiat.', 'Quod vel esse ea quod consequuntur qui ab voluptatibus aut error quia debitis ut.', 'default.jpg', 0, '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(4, 'Quia id sit.', 'Id quia laudantium quo laboriosam dignissimos molestias sunt.', 'default.jpg', 0, '2020-02-16 04:03:10', '2020-02-16 04:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `profile_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_ig` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `profile_phone`, `profile_email`, `profile_fb`, `profile_ig`, `profile_twitter`, `profile_address`, `created_at`, `updated_at`) VALUES
(1, '111111111111', 'company@email.co.id', 'companyfb', 'companyig', 'companytwitter', 'company address', '2020-02-16 04:03:14', '2020-02-16 04:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `rsv_id` bigint(20) UNSIGNED NOT NULL,
  `treat_id` bigint(20) NOT NULL,
  `rsv_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_headers`
--

CREATE TABLE `reservation_headers` (
  `rsv_hd_id` bigint(20) UNSIGNED NOT NULL,
  `rsv_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_headers`
--

INSERT INTO `reservation_headers` (`rsv_hd_id`, `rsv_hd_title`, `rsv_hd_caption`, `rsv_hd_image`, `rsv_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Make Reservation', 'Book now', 'default.jpg', 1, '2020-02-16 04:03:07', '2020-02-16 04:03:07'),
(2, 'Id ipsa ea.', 'Delectus cum dolores nemo est qui consequatur.', 'default.jpg', 0, '2020-02-16 04:03:07', '2020-02-16 04:03:07'),
(3, 'Aspernatur ullam aut.', 'Blanditiis ea nobis facilis excepturi et ut sit.', 'default.jpg', 0, '2020-02-16 04:03:07', '2020-02-16 04:03:07'),
(4, 'Molestiae nesciunt accusantium.', 'Aut mollitia tenetur magnam aliquid animi nulla totam.', 'default.jpg', 0, '2020-02-16 04:03:07', '2020-02-16 04:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_messages`
--

CREATE TABLE `reservation_messages` (
  `rsv_msg_id` bigint(20) UNSIGNED NOT NULL,
  `rsv_msg_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsv_msg_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv_msg_subject` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv_msg_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv_msg_footer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_messages`
--

INSERT INTO `reservation_messages` (`rsv_msg_id`, `rsv_msg_status`, `rsv_msg_name`, `rsv_msg_subject`, `rsv_msg_content`, `rsv_msg_footer`, `created_at`, `updated_at`) VALUES
(1, 'confirm', 'Admin', 'Reservation Aprrovement', 'Reservation confirm', 'Copyright 2020', '2020-02-16 04:03:07', '2020-02-16 04:03:07'),
(2, 'dismiss', 'Admin', 'Reservation Fail', 'Reservation dismiss', 'Copyright 2020', '2020-02-16 04:03:07', '2020-02-16 04:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_modes`
--

CREATE TABLE `reservation_modes` (
  `rsv_mode_id` bigint(20) UNSIGNED NOT NULL,
  `rsv_mode_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_modes`
--

INSERT INTO `reservation_modes` (`rsv_mode_id`, `rsv_mode_active`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` bigint(20) UNSIGNED NOT NULL,
  `serv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `serv_name`, `serv_name_slug`, `serv_desc`, `serv_image`, `created_at`, `updated_at`) VALUES
(1, 'beatae', 'beatae', 'Sint magnam aut sit omnis dicta et rerum et omnis adipisci corporis quia corrupti consectetur quos voluptatibus qui cum aut beatae placeat quaerat et et magnam numquam est.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(2, 'ut', 'ut', 'Recusandae aut autem ducimus est recusandae sint voluptatem minima tempora in illum ullam eos et est consequatur eveniet pariatur.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(3, 'quod', 'quod', 'Dignissimos iure quis numquam similique deserunt mollitia voluptatem id quae impedit modi soluta nobis molestias et corrupti impedit.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(4, 'vero', 'vero', 'Ad sit blanditiis et eos minima sit iste qui odit ut accusantium ut beatae velit quia.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(5, 'nihil', 'nihil', 'Alias quis et minus impedit esse qui doloremque magnam impedit ut dolorem qui mollitia vel molestias qui et aut.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_headers`
--

CREATE TABLE `service_headers` (
  `serv_hd_id` bigint(20) UNSIGNED NOT NULL,
  `serv_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_headers`
--

INSERT INTO `service_headers` (`serv_hd_id`, `serv_hd_title`, `serv_hd_caption`, `serv_hd_image`, `serv_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Services', 'Our kindly services', 'default.jpg', 1, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(2, 'Numquam et laboriosam necessitatibus.', 'Quo et ex repudiandae aut velit omnis fugit nobis.', 'default.jpg', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(3, 'Omnis ipsam a autem.', 'Recusandae iusto suscipit in et cumque quae qui et totam autem dolorem eum quia.', 'default.jpg', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(4, 'Quis maiores quia.', 'Aspernatur ipsam mollitia tempora rerum fuga enim voluptas.', 'default.jpg', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` bigint(20) UNSIGNED NOT NULL,
  `set_web_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_m_author` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_m_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_m_keyword` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_web_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `set_web_title`, `set_m_author`, `set_m_desc`, `set_m_keyword`, `set_web_logo`, `created_at`, `updated_at`) VALUES
(1, 'MyBarber', 'My Author', 'My Website', 'My Keyword', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_caption`, `slider_image`, `created_at`, `updated_at`) VALUES
(1, 'Et delectus qui sapiente est perferendis.', 'Aut unde at expedita velit soluta reiciendis placeat eos et aut ut iste laboriosam non ipsum exercitationem.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(2, 'Recusandae debitis est dolores.', 'Et sequi aspernatur et qui libero quasi molestiae ut debitis animi rerum placeat provident exercitationem a temporibus commodi soluta molestiae et consequatur iste magnam.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(3, 'Necessitatibus atque officiis aut omnis laborum.', 'Voluptatem aut omnis nobis maiores inventore qui saepe et qui distinctio illo soluta eaque est harum enim eos rem ut expedita et natus nobis dolores sed voluptatibus.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13'),
(4, 'Consequuntur id libero dolor autem et provident.', 'Est qui dolorem et id et molestiae sed non animi optio asperiores voluptatibus expedita quo perferendis et error qui ut.', 'default.jpg', '2020-02-16 04:03:13', '2020-02-16 04:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tm_id` bigint(20) UNSIGNED NOT NULL,
  `tm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_profile` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tm_id`, `tm_name`, `tm_job`, `tm_profile`, `tm_image`, `created_at`, `updated_at`) VALUES
(1, 'Branson Davis', 'Brickmason', 'Voluptates quod et perferendis ab vero cum et excepturi id quasi quisquam cupiditate adipisci quod nulla dolores sint voluptatem explicabo dolor quae dolor.', 'default.jpg', '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(2, 'Helena Parisian', 'Electrical Engineering Technician', 'Reiciendis maiores officia ipsam ut vitae et unde nemo omnis perspiciatis quia consequatur.', 'default.jpg', '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(3, 'Bettie Howe', 'Millwright', 'Deserunt qui ratione sit molestiae dignissimos sunt tempora ad est cum cupiditate eveniet esse qui exercitationem eum possimus similique.', 'default.jpg', '2020-02-16 04:03:09', '2020-02-16 04:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `team_headers`
--

CREATE TABLE `team_headers` (
  `tm_hd_id` bigint(20) UNSIGNED NOT NULL,
  `tm_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_headers`
--

INSERT INTO `team_headers` (`tm_hd_id`, `tm_hd_title`, `tm_hd_caption`, `tm_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Teams', 'Proffesional teams', 1, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(2, 'Perspiciatis quibusdam ut magnam corrupti et.', 'Est facere consequatur eos recusandae exercitationem libero et repudiandae ipsum vel totam at neque repellat doloribus.', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(3, 'Placeat consequatur et est molestiae nostrum consequatur.', 'Reprehenderit minus et expedita modi consequatur recusandae alias natus culpa occaecati facilis et unde et.', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08'),
(4, 'Tempora veniam autem dolores.', 'Dolor occaecati ea quam asperiores enim rerum mollitia nihil est.', 0, '2020-02-16 04:03:08', '2020-02-16 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`test_id`, `test_name`, `test_caption`, `test_image`, `created_at`, `updated_at`) VALUES
(1, 'Noemy Bins', 'Libero dolorum tempore laborum dolorem qui nihil quod eius voluptatem asperiores nisi officiis id tempora ullam.', 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(2, 'June Russel', 'Sunt et id ipsum sunt optio non aspernatur mollitia nobis ut quia adipisci et sint facere voluptatem temporibus hic quasi ex nobis enim nemo.', 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(3, 'Herminio Hintz', 'Consectetur et eaque cumque sint officia ducimus modi odio nam cupiditate quisquam itaque libero dolores enim asperiores dicta est facilis voluptate et ad.', 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(4, 'Prof. Diamond Daniel', 'Aliquam accusamus magni doloremque omnis eos ducimus nam odit saepe voluptatibus illo occaecati voluptatum omnis totam nihil provident.', 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(5, 'Ally Torphy', 'Est exercitationem quae et deserunt id voluptatum quod natus autem hic ut cum.', 'default.jpg', '2020-02-16 04:03:10', '2020-02-16 04:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_headers`
--

CREATE TABLE `testimonial_headers` (
  `test_hd_id` bigint(20) UNSIGNED NOT NULL,
  `test_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `test_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_headers`
--

INSERT INTO `testimonial_headers` (`test_hd_id`, `test_hd_title`, `test_hd_caption`, `test_hd_image`, `test_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Customer Testimonial', 'Best of our client', 'default.jpg', 1, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(2, 'Rerum ut et quod consequuntur.', 'Esse sed necessitatibus nihil voluptatem porro alias accusantium et tempora sapiente explicabo.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(3, 'Quae ullam incidunt.', 'Quos quam illum odio est esse sit.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09'),
(4, 'Laboriosam autem.', 'Et id illum non commodi quidem quod necessitatibus velit et distinctio sunt animi error.', 'default.jpg', 0, '2020-02-16 04:03:09', '2020-02-16 04:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `treat_id` bigint(20) UNSIGNED NOT NULL,
  `treat_type_id` bigint(20) NOT NULL,
  `treat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_price` bigint(20) NOT NULL,
  `treat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`treat_id`, `treat_type_id`, `treat_name`, `treat_name_slug`, `treat_desc`, `treat_price`, `treat_image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Culpa quo.', 'culpa-quo', 'Eum modi delectus ipsam rerum impedit cupiditate rem quibusdam asperiores dolor.', 22048, 'default.jpg', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(2, 1, 'Voluptatem nihil.', 'voluptatem-nihil', 'Dignissimos eius autem voluptatem beatae et possimus ut impedit.', 62391, 'default.jpg', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(3, 3, 'Corrupti quia.', 'corrupti-quia', 'Repellat repudiandae ad ea aut inventore temporibus.', 71342, 'default.jpg', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(4, 3, 'Sed amet.', 'sed-amet', 'Odit illum voluptas repudiandae quaerat cupiditate laborum culpa ratione rerum aliquam est.', 49089, 'default.jpg', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(5, 3, 'Laborum dignissimos non.', 'laborum-dignissimos-non', 'Sed autem magni et eum nostrum voluptatem distinctio.', 71225, 'default.jpg', '2020-02-16 04:03:11', '2020-02-16 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_headers`
--

CREATE TABLE `treatment_headers` (
  `treat_hd_id` bigint(20) UNSIGNED NOT NULL,
  `treat_hd_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_hd_caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_hd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_hd_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatment_headers`
--

INSERT INTO `treatment_headers` (`treat_hd_id`, `treat_hd_title`, `treat_hd_caption`, `treat_hd_image`, `treat_hd_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Best Treatment', 'Best of our treatment', 'default.jpg', 1, '2020-02-16 04:03:10', '2020-02-16 04:03:10'),
(2, 'Soluta quia consequatur laborum.', 'Odit ducimus esse et atque non commodi provident sint sequi omnis quaerat.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(3, 'Aut accusantium voluptas quis odio.', 'Dicta praesentium aperiam unde libero pariatur quae dolorem.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(4, 'Facilis ut eligendi.', 'Magnam vel voluptates et et eligendi temporibus aperiam sint iusto perferendis laboriosam.', 'default.jpg', 0, '2020-02-16 04:03:11', '2020-02-16 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_types`
--

CREATE TABLE `treatment_types` (
  `treat_type_id` bigint(20) UNSIGNED NOT NULL,
  `treat_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatment_types`
--

INSERT INTO `treatment_types` (`treat_type_id`, `treat_type_name`, `created_at`, `updated_at`) VALUES
(1, 'quidem', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(2, 'numquam', '2020-02-16 04:03:11', '2020-02-16 04:03:11'),
(3, 'nobis', '2020-02-16 04:03:11', '2020-02-16 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`blog_cat_id`);

--
-- Indexes for table `blog_headers`
--
ALTER TABLE `blog_headers`
  ADD PRIMARY KEY (`blog_hd_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `error_pages`
--
ALTER TABLE `error_pages`
  ADD PRIMARY KEY (`error_pg_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `gallery_headers`
--
ALTER TABLE `gallery_headers`
  ADD PRIMARY KEY (`gal_hd_id`);

--
-- Indexes for table `gallery_tags`
--
ALTER TABLE `gallery_tags`
  ADD PRIMARY KEY (`gal_tag_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `product_headers`
--
ALTER TABLE `product_headers`
  ADD PRIMARY KEY (`prd_hd_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`rsv_id`);

--
-- Indexes for table `reservation_headers`
--
ALTER TABLE `reservation_headers`
  ADD PRIMARY KEY (`rsv_hd_id`);

--
-- Indexes for table `reservation_messages`
--
ALTER TABLE `reservation_messages`
  ADD PRIMARY KEY (`rsv_msg_id`);

--
-- Indexes for table `reservation_modes`
--
ALTER TABLE `reservation_modes`
  ADD PRIMARY KEY (`rsv_mode_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `service_headers`
--
ALTER TABLE `service_headers`
  ADD PRIMARY KEY (`serv_hd_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tm_id`);

--
-- Indexes for table `team_headers`
--
ALTER TABLE `team_headers`
  ADD PRIMARY KEY (`tm_hd_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `testimonial_headers`
--
ALTER TABLE `testimonial_headers`
  ADD PRIMARY KEY (`test_hd_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treat_id`);

--
-- Indexes for table `treatment_headers`
--
ALTER TABLE `treatment_headers`
  ADD PRIMARY KEY (`treat_hd_id`);

--
-- Indexes for table `treatment_types`
--
ALTER TABLE `treatment_types`
  ADD PRIMARY KEY (`treat_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `ab_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `blog_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_headers`
--
ALTER TABLE `blog_headers`
  MODIFY `blog_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `error_pages`
--
ALTER TABLE `error_pages`
  MODIFY `error_pg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery_headers`
--
ALTER TABLE `gallery_headers`
  MODIFY `gal_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_tags`
--
ALTER TABLE `gallery_tags`
  MODIFY `gal_tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_headers`
--
ALTER TABLE `product_headers`
  MODIFY `prd_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `rsv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_headers`
--
ALTER TABLE `reservation_headers`
  MODIFY `rsv_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_messages`
--
ALTER TABLE `reservation_messages`
  MODIFY `rsv_msg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation_modes`
--
ALTER TABLE `reservation_modes`
  MODIFY `rsv_mode_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_headers`
--
ALTER TABLE `service_headers`
  MODIFY `serv_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_headers`
--
ALTER TABLE `team_headers`
  MODIFY `tm_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonial_headers`
--
ALTER TABLE `testimonial_headers`
  MODIFY `test_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `treat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treatment_headers`
--
ALTER TABLE `treatment_headers`
  MODIFY `treat_hd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatment_types`
--
ALTER TABLE `treatment_types`
  MODIFY `treat_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
