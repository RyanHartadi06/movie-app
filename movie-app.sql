-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'music',	'music',	'https://image.com',	NULL,	'2021-08-09 20:18:57',	'2021-08-09 20:18:57'),
(2,	'perang dunia',	'perang-dunia',	'https://image.com',	NULL,	'2021-08-09 20:18:57',	'2021-08-09 20:18:57'),
(3,	'keren',	'keren',	'https:localhost.com',	NULL,	'2021-08-09 21:07:21',	'2021-08-09 21:07:21');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `movie_id`, `user_id`, `comment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	1,	3,	'asdsadasd',	NULL,	NULL,	NULL),
(2,	1,	3,	'asdsadasdasdasdasdasdas',	NULL,	NULL,	NULL),
(3,	1,	4,	'qwqewqeqwewqeasdasd',	NULL,	'2021-08-10 04:48:11',	'2021-08-10 04:48:11');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2021_08_10_030032_create_movies_table',	1),
(5,	'2021_08_10_030632_create_categories_table',	1),
(6,	'2021_08_10_030717_create_comments_table',	1),
(7,	'2021_08_10_030856_create_ratings_table',	1),
(8,	'2021_08_10_084731_add_user_column',	2),
(9,	'2019_12_14_000001_create_personal_access_tokens_table',	3),
(10,	'2021_08_10_100812_delete_fields_comment',	4),
(11,	'2021_08_10_100835_add_fields_comment',	4),
(12,	'2021_08_10_115428_add_rows_in_movie',	5);

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `movies` (`id`, `title`, `slug`, `year`, `category_id`, `rating`, `image`, `description`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'perang',	'perang',	'2020',	1,	2.66667,	'hdsadsad',	'hdsadsad12312321wqeqweqwe',	1,	NULL,	'2021-08-09 20:23:22',	'2021-08-10 05:47:52'),
(2,	'fast and farious',	'fast-and-farious',	'2020',	3,	0,	'hdsadsad',	'hdsadsad12312321wqeqweqwe',	1,	NULL,	'2021-08-09 20:23:22',	'2021-08-09 20:23:22');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1,	'App\\Models\\User',	3,	'authToken',	'f04909a44a9e467fd79e78a849d381328b6eb4cc7028daf22c48a9817eb53fd4',	'[\"*\"]',	NULL,	'2021-08-10 02:30:55',	'2021-08-10 02:30:55'),
(2,	'App\\Models\\User',	4,	'authToken',	'24d7463e52bd2c954c8323cd9f2a597bd80b9bc9bb7a98d74b2d2a14fa0aa3aa',	'[\"*\"]',	NULL,	'2021-08-10 02:41:50',	'2021-08-10 02:41:50'),
(4,	'App\\Models\\User',	4,	'authToken',	'83b7df90ea08360cecd8f9a17869c789c6fc9675ca26a34d1bd960c68129f25d',	'[\"*\"]',	'2021-08-10 03:00:30',	'2021-08-10 03:00:11',	'2021-08-10 03:00:30'),
(6,	'App\\Models\\User',	4,	'authToken',	'23cfb5e5561fbae4d0c68f6bed759988ea5214ae16931e81b0fda4bdbb02efb5',	'[\"*\"]',	'2021-08-10 05:47:51',	'2021-08-10 05:38:49',	'2021-08-10 05:47:51');

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ratings` (`id`, `movie_id`, `user_id`, `rating`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	1,	4,	2,	NULL,	'2021-08-10 05:39:03',	'2021-08-10 05:39:03'),
(2,	1,	4,	2,	NULL,	'2021-08-10 05:39:15',	'2021-08-10 05:39:15'),
(3,	1,	4,	4,	NULL,	'2021-08-10 05:46:30',	'2021-08-10 05:46:30'),
(4,	1,	4,	4,	NULL,	'2021-08-10 05:47:52',	'2021-08-10 05:47:52');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Ryan',	'admin@admin.com',	'081359652164',	NULL,	'$2y$10$aum3isDiYYQqvQjtNw0xuuvX3yb8CM0ZR/HAL6swAyRRa1ceoBK62',	'ADMIN',	NULL,	'2021-08-09 20:21:27',	'2021-08-09 20:21:27'),
(3,	'RyanUser',	'user@admin.com',	'081359652162',	NULL,	'$2y$10$aum3isDiYYQqvQjtNw0xuuvX3yb8CM0ZR/HAL6swAyRRa1ceoBK62',	'USER',	NULL,	'2021-08-09 20:21:27',	'2021-08-09 20:21:27'),
(4,	'anthine',	'anthine@gmail.com',	'12312312312312312',	NULL,	'$2y$10$7ZPnNUKyJdmH.Cm2U26z6ekSal1XLxDL5CA621lE6b4PrthWjwic6',	'USER',	NULL,	'2021-08-10 02:41:50',	'2021-08-10 02:41:50');

-- 2021-08-10 12:51:28
