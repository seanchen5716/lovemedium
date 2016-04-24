-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2015 at 08:05 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rumblr`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config` text COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `blogs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `name`, `config`, `domain`, `created_at`, `updated_at`) VALUES
(1, 2, 'vishnu', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 02:43:57', '2015-09-29 02:43:57'),
(2, 3, 'vichu', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 03:58:53', '2015-09-29 03:58:53'),
(3, 4, 'trivikram', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 04:24:55', '2015-09-29 04:24:55'),
(4, 5, 'vishnu', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 08:58:39', '2015-09-29 08:58:39'),
(5, 6, 'sachin', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 09:02:52', '2015-09-29 09:02:52'),
(6, 6, 'ncjns', '{"title":"hello","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-29 10:12:03', '2015-09-29 10:12:03'),
(7, 6, 'messi', '{"title":"messi","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":"ljk;\\/jkn"}', '', '2015-09-29 10:13:42', '2015-10-06 09:13:23'),
(8, 6, 'uiikn', '{"title":"bb","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-09-30 02:07:07', '2015-09-30 02:07:07'),
(9, 7, 'vishnu ns', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":"asdcasd"}', '', '2015-09-30 05:51:10', '2015-09-30 06:45:10'),
(10, 6, 'tree', '{"title":"tree","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-10-06 09:16:31', '2015-10-06 09:16:31'),
(11, 8, 'Beckham', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-10-08 01:47:13', '2015-10-08 01:47:13'),
(12, 9, 'trivikram', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-10-17 06:04:17', '2015-10-17 06:04:17'),
(13, 10, 'krutika', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-10-29 07:24:19', '2015-10-29 07:24:19'),
(14, 11, 'krutika', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-10-29 07:32:39', '2015-10-29 07:32:39'),
(15, 19, 'admin', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-11-02 09:25:04', '2015-11-02 09:25:04'),
(16, 20, 'vishnu', '{"title":"Untitled","picture":"assets\\/images\\/default_avatar.png","description":"","customcss":""}', '', '2015-11-02 19:49:21', '2015-11-02 19:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE IF NOT EXISTS `bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `user_id`, `story_id`, `created_at`, `updated_at`) VALUES
(4, 8, 22, '2015-11-03 08:31:21', '2015-11-03 08:31:21'),
(7, 8, 18, '2015-11-03 08:43:03', '2015-11-03 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `story_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 8, 18, 'Awsome story::would like to visit this place.', '2015-11-03 08:29:28', '2015-11-03 08:29:28'),
(2, 8, 22, 'bad one\n', '2015-11-03 08:31:09', '2015-11-03 08:31:09'),
(3, 8, 18, 'jkhsdfjksdfj', '2015-11-03 08:43:42', '2015-11-03 08:43:42'),
(4, 8, 18, 'cool', '2015-11-03 08:50:37', '2015-11-03 08:50:37'),
(5, 8, 24, 'niceone', '2015-11-03 08:52:55', '2015-11-03 08:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `type`, `type_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 18, 8, '2015-11-03 08:59:51', '2015-11-03 08:59:51'),
(3, 2, 8, 18, '2015-11-03 09:00:45', '2015-11-03 09:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Users', '{"users":1}', '2015-09-29 02:40:28', '2015-09-29 02:40:28'),
(2, 'Admins', '{"admin":1,"users":1}', '2015-09-29 02:40:28', '2015-09-29 02:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `likes_post_id_foreign` (`post_id`),
  KEY `likes_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned NOT NULL,
  `receiver_id` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_04_15_115839_create_blogs_table', 1),
('2014_04_15_120600_create_posts_table', 1),
('2014_04_15_120923_create_tags_table', 1),
('2014_04_15_121026_create_regular_posts_table', 1),
('2014_04_15_122015_create_posts_tags_table', 1),
('2014_04_15_122307_create_pages_table', 1),
('2014_04_15_122520_create_likes_table', 1),
('2014_04_15_122740_create_follows_table', 1),
('2014_04_18_014521_add_username_field_to_users_table', 1),
('2014_04_22_130755_create_reblogged_posts_table', 1),
('2014_04_23_072224_create_messages_table', 1),
('2014_05_15_073948_settings', 1),
('2015_10_01_140956_create_story_table', 2),
('2015_10_03_143600_create_story_table', 3),
('2015_10_06_134008_add_tag_id_story', 4),
('2015_10_08_111015_create_recommendations_table', 5),
('2015_10_08_111328_add_rec_count_story_tb', 5),
('2015_10_08_121657_add_rec_count_story_tb', 6),
('2015_10_19_065739_create_comment_tb', 7),
('2015_10_19_131918_create_follows_tb', 8),
('2015_10_27_102250_create_bookmark_tb', 9),
('2015_10_28_193257_add_picture_bio_column_to_user', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pages_blog_id_foreign` (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('regular','reblogged') COLLATE utf8_unicode_ci NOT NULL,
  `search_index` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_blog_id_foreign` (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type`, `search_index`, `blog_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'regular', 'first post-', 3, '2015-09-29 08:21:21', '2015-09-29 08:21:21', NULL),
(2, 'regular', 'first post-', 5, '2015-09-29 09:31:50', '2015-09-29 09:31:50', NULL),
(3, 'regular', 'mars - mars', 5, '2015-09-29 09:35:48', '2015-09-29 09:35:48', NULL),
(4, 'regular', 'mars vishnu-', 5, '2015-09-29 09:39:45', '2015-09-29 09:39:45', NULL),
(5, 'reblogged', 'mars vishnu-', 5, '2015-09-29 09:43:07', '2015-09-29 09:43:07', NULL),
(6, 'regular', '', 9, '2015-09-30 06:55:48', '2015-09-30 06:55:48', NULL),
(7, 'regular', 'hello-', 9, '2015-09-30 06:56:43', '2015-09-30 06:56:43', NULL),
(8, 'regular', 'funny videos', 9, '2015-09-30 06:57:46', '2015-09-30 06:57:46', NULL),
(9, 'regular', 'cartoon', 9, '2015-09-30 07:32:51', '2015-09-30 07:32:51', NULL),
(10, 'regular', '', 9, '2015-09-30 08:38:43', '2015-09-30 08:38:43', NULL),
(11, 'regular', '', 9, '2015-09-30 08:51:33', '2015-09-30 08:51:33', NULL),
(12, 'regular', 'trivikram', 9, '2015-09-30 08:55:32', '2015-09-30 08:55:32', NULL),
(13, 'regular', '', 5, '2015-10-01 01:15:51', '2015-10-01 01:15:51', NULL),
(14, 'regular', 'messi messi - messi', 5, '2015-10-01 01:17:04', '2015-10-01 01:17:04', NULL),
(15, 'regular', 'tintu', 5, '2015-10-01 01:17:57', '2015-10-01 01:17:57', NULL),
(16, 'regular', 'asdfa-sdf', 5, '2015-10-01 01:18:18', '2015-10-01 01:18:18', NULL),
(17, 'regular', 'GAMES-gaming', 9, '2015-10-01 08:01:30', '2015-10-01 08:01:30', NULL),
(18, 'regular', 'combo girl', 9, '2015-10-01 08:06:15', '2015-10-01 08:06:15', NULL),
(19, 'regular', 'fwsdfs-sdcfasdf', 10, '2015-10-06 09:16:46', '2015-10-06 09:16:46', NULL),
(20, 'regular', 'fwsdfs-sdcfasdf', 10, '2015-10-06 09:16:47', '2015-10-06 09:16:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE IF NOT EXISTS `posts_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_tags_post_id_foreign` (`post_id`),
  KEY `posts_tags_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reblogged_posts`
--

CREATE TABLE IF NOT EXISTS `reblogged_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `original_post_id` int(10) unsigned NOT NULL,
  `type` enum('text','image','quote','link') COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reblogged_posts_post_id_foreign` (`post_id`),
  KEY `reblogged_posts_original_post_id_foreign` (`original_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reblogged_posts`
--

INSERT INTO `reblogged_posts` (`id`, `post_id`, `original_post_id`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 4, 'text', '{"comment":" "}', '2015-09-29 09:43:07', '2015-09-29 09:43:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE IF NOT EXISTS `recommendations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`id`, `user_id`, `story_id`, `created_at`, `updated_at`) VALUES
(1, 8, 18, '2015-11-03 08:29:06', '2015-11-03 08:29:06'),
(2, 8, 22, '2015-11-03 08:31:01', '2015-11-03 08:31:01'),
(3, 8, 24, '2015-11-03 08:52:50', '2015-11-03 08:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `regular_posts`
--

CREATE TABLE IF NOT EXISTS `regular_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `type` enum('text','video','audio','image','quote','chat','link') COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regular_posts_post_id_foreign` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `regular_posts`
--

INSERT INTO `regular_posts` (`id`, `post_id`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'text', '{"title":"first post","content":"hi guys"}', '2015-09-29 08:21:21', '2015-09-29 08:21:21', NULL),
(2, 2, 'text', '{"title":"first post","content":"hello world"}', '2015-09-29 09:31:50', '2015-09-29 09:31:50', NULL),
(3, 3, 'link', '{"url":"https:\\/\\/en.wikipedia.org\\/wiki\\/Mars","title":"mars","caption":"mars"}', '2015-09-29 09:35:48', '2015-09-29 09:35:48', NULL),
(4, 4, 'text', '{"title":"mars vishnu","content":"Mars is the fourth planet from the Sun and the second smallest planet in the Solar System, after Mercury. Named after the Roman god of war, it is often referred to as the &quot;Red Planet&quot; because the iron oxide prevalent on its surface gives it a reddish appearance.[16] Mars is a terrestrial planet with a thin atmosphere, having surface features reminiscent both of the impact craters of the Moon and the volcanoes, valleys, deserts, and polar ice caps of Earth. The rotational period and seasonal cycles of Mars are likewise similar to those of Earth, as is the tilt that produces the seasons. Mars is the site of Olympus Mons, the largest volcano and second-highest known mountain in the Solar System, and of Valles Marineris, one of the largest canyons in the Solar System. The smooth Borealis basin in the northern hemisphere covers 40% of the planet and may be a giant impact feature.[17][18] Mars has two moons, Phobos and Deimos, which are small and irregularly shaped. These may be captured asteroids,[19][20] similar to 5261 Eureka, a Mars trojan.\\r\\n\\r\\nUntil the first successful Mars flyby in 1965 by Mariner 4, many speculated about the presence of liquid water on the planet''s surface. This was based on observed periodic variations in light and dark patches, particularly in the polar latitudes, which appeared to be seas and continents; long, dark striations were interpreted by some as irrigation channels for liquid water. These straight line features were later explained as optical illusions, though geological evidence gathered by unmanned missions suggests that Mars once had large-scale water coverage on its surface at some earlier stage of its life.[21] In 2005, radar data revealed the presence of large quantities of water ice at the poles[22] and at mid-latitudes.[23][24] The Mars rover Spirit sampled chemical compounds containing water molecules in March 2007. The Phoenix lander directly sampled water ice in shallow Martian soil on July 31, 2008.[25]\\r\\n\\r\\nMars is host to seven functioning spacecraft: five in orbit&mdash;2001 Mars Odyssey, Mars Express, Mars Reconnaissance Orbiter, MAVEN and Mars Orbiter Mission&mdash;and two on the surface&mdash;Mars Exploration Rover Opportunity and the Mars Science Laboratory Curiosity. Observations by the Mars Reconnaissance Orbiter have revealed possible flowing water during the warmest months on Mars.[26] In 2013, NASA''s Curiosity rover discovered that Mars''s soil contains between 1.5% and 3% water by mass (albeit attached to other compounds and thus not freely accessible).[27]\\r\\n\\r\\nThere are ongoing investigations assessing the past habitability potential of Mars, as well as the possibility of extant life. In situ investigations have been performed by the Viking landers, Spirit and Opportunity rovers, Phoenix lander, and Curiosity rover. Future astrobiology missions are planned, including the Mars 2020 and ExoMars rovers.[28][29][30][31]\\r\\n\\r\\nMars can easily be seen from Earth with the naked eye, as can its reddish coloring. Its apparent magnitude reaches &minus;2.91,[7] which is surpassed only by Jupiter, Venus, the Moon, and the Sun. Optical ground-based telescopes are typically limited to resolving features about 300 kilometers (190 mi) across when Earth and Mars are closest because of Earth''s atmosphere"}', '2015-09-29 09:39:45', '2015-09-29 09:39:45', NULL),
(5, 6, 'video', '{"url":"uploads\\/videos\\/Job interview - World''s Toughest Job.mp4","filename":"Job interview - World''s Toughest Job.mp4"}', '2015-09-30 06:55:48', '2015-09-30 06:55:48', NULL),
(6, 7, 'chat', '{"title":"hello","content":"hey\\r\\n"}', '2015-09-30 06:56:43', '2015-09-30 06:56:43', NULL),
(7, 8, 'video', '{"url":"uploads\\/videos\\/video.mp4","filename":"video.mp4"}', '2015-09-30 06:57:46', '2015-09-30 06:57:46', NULL),
(8, 9, 'video', '{"url":"\\/uploads\\/videos\\/video.mp4","filename":"video.mp4"}', '2015-09-30 07:32:51', '2015-09-30 07:32:51', NULL),
(9, 10, 'video', '{"url":"uploads\\/videos\\/video.mp4","filename":"video.mp4"}', '2015-09-30 08:38:43', '2015-09-30 08:38:43', NULL),
(10, 11, 'video', '{"url":"uploads\\/videos\\/Job interview - World''s Toughest Job.mp4","filename":"Job interview - World''s Toughest Job.mp4"}', '2015-09-30 08:51:33', '2015-09-30 08:51:33', NULL),
(11, 12, 'video', '{"url":"uploads\\/videos\\/video.mp4","filename":"video.mp4"}', '2015-09-30 08:55:32', '2015-09-30 08:55:32', NULL),
(12, 13, 'image', '{"files":["uploads\\/pictures\\/content.png"]}', '2015-10-01 01:15:51', '2015-10-01 01:15:51', NULL),
(13, 14, 'link', '{"url":"http:\\/\\/www.espnfc.com\\/barcelona\\/story\\/2636807\\/lionel-messi-does-not-know-if-he-will-make-clasico-brother","title":"messi messi","caption":"messi the king of football"}', '2015-10-01 01:17:04', '2015-10-01 01:17:04', NULL),
(14, 15, 'quote', '{"content":"abcd is the first 4 letters of english alphabets\\r\\n","source":"tintu lkg a"}', '2015-10-01 01:17:58', '2015-10-01 01:17:58', NULL),
(15, 16, 'chat', '{"title":"asdfa","content":"asdfasdf"}', '2015-10-01 01:18:19', '2015-10-01 01:18:19', NULL),
(16, 17, 'text', '{"title":"GAMES","content":"gaming is the best pass time asdfasd"}', '2015-10-01 08:01:30', '2015-10-06 03:44:11', NULL),
(17, 18, 'image', '{"files":["uploads\\/pictures\\/combo2_old.jpg"]}', '2015-10-01 08:06:16', '2015-10-01 08:06:16', NULL),
(18, 19, 'text', '{"title":"fwsdfs","content":"dfasdfasdf"}', '2015-10-06 09:16:47', '2015-10-06 09:16:47', NULL),
(19, 20, 'text', '{"title":"fwsdfs","content":"dfasdfasdf"}', '2015-10-06 09:16:47', '2015-10-06 09:16:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option`, `value`, `created_at`, `updated_at`) VALUES
(1, 'header_code', '', '2015-09-29 02:40:28', '2015-09-29 02:40:28'),
(2, 'footer_code', '', '2015-09-29 02:40:28', '2015-09-29 02:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tag_id` int(11) DEFAULT NULL,
  `rec_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `user_id`, `type`, `content`, `created_at`, `updated_at`, `tag_id`, `rec_count`) VALUES
(17, 0, 0, ' <h3 class="graf graf--h3 graf--first">Kerala</h3> <p class="graf graf--p">Kerala also known as Gods own country is one of the best places in India.The region was a prominent spice exporter from 3000 BCE. The Chera Dynasty was the first prominent kingdom based in Kerala, though it frequently struggled against attacks from the neighbouring Cholas and Pandyas. In the 15th century, the spice trade attracted Portuguese traders to Kerala, and paved the way for the European colonisation of India. After independence, Travancore and Cochin joined the Republic of India and Travancore-Cochin was given the status of a state. Kerala state was formed in 1956 by merging the Malabar district, Travancore-Cochin (excluding four southern taluks), and the taluk of Kasargod, South Kanara.</p><figure contenteditable="false" class="graf--figure graf--iframe graf--first" name="7m0rqtcsor" tabindex="0"> <div class="iframeContainer"> <iframe frameborder="0" width="700" height="393" data-media-id="" src="http://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FpG3kzWXWjMk%3Ffeature%3Doembed&amp;url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DpG3kzWXWjMk&amp;image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FpG3kzWXWjMk%2Fhqdefault.jpg&amp;key=57eb3fe2c91144c5be4e8144a707eb77&amp;type=text%2Fhtml&amp;schema=youtube" data-height="480" data-width="854"> </iframe> </div> <figcaption contenteditable="true" data-default-value="Type caption for embed (optional)" class="imageCaption"> <a rel="nofollow" class="markup--anchor markup--figure-anchor" data-href="" href="http://www.youtube.com/watch?v=pG3kzWXWjMk" target="_blank">http://www.youtube.com/watch?v=pG3kzWXWjMk</a> </figcaption> <br></figure><p class="graf graf--p graf--empty is-selected" name="6vg1p58kt9"><br></p><p class="graf--last"> </p>', '2015-11-03 07:03:31', '2015-11-03 07:03:31', NULL, 0),
(18, 18, 1, '\n   					 \n   					 \n   					  <h3 class="graf graf--h3 graf--first">Kerala</h3> <p class="graf graf--p">Kerala also known as Gods own country is one of the best places in India.The region was a prominent spice exporter from 3000 BCE. The Chera Dynasty was the first prominent kingdom based in Kerala, though it frequently struggled against attacks from the neighbouring Cholas and Pandyas. In the 15th century, the spice trade attracted Portuguese traders to Kerala, and paved the way for the European colonisation of India. After independence, Travancore and Cochin joined the Republic of India and Travancore-Cochin was given the status of a state. Kerala state was formed in 1956 by merging the Malabar district, Travancore-Cochin (excluding four southern taluks), and the taluk of Kasargod, South Kanara.</p><figure contenteditable="false" class="graf--figure graf--iframe graf--first" name="7m0rqtcsor" tabindex="0"> <div class="iframeContainer"> <iframe frameborder="0" width="700" height="393" data-media-id="" src="http://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FpG3kzWXWjMk%3Ffeature%3Doembed&amp;url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DpG3kzWXWjMk&amp;image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FpG3kzWXWjMk%2Fhqdefault.jpg&amp;key=57eb3fe2c91144c5be4e8144a707eb77&amp;type=text%2Fhtml&amp;schema=youtube" data-height="480" data-width="854"> </iframe> </div> <figcaption contenteditable="true" data-default-value="Type caption for embed (optional)" class="imageCaption"> <a rel="nofollow" class="markup--anchor markup--figure-anchor" data-href="" href="http://www.youtube.com/watch?v=pG3kzWXWjMk" target="_blank">http://www.youtube.com/watch?v=pG3kzWXWjMk</a> </figcaption> <br></figure><p class="graf graf--p graf--empty is-selected" name="6vg1p58kt9"><br></p><p class="graf--last"> </p>												', '2015-11-03 07:03:48', '2015-11-03 08:48:31', 46, 1),
(20, 18, 1, ' <h3 class="graf graf--h3 graf--first">Sachin<br></h3><p class="graf graf--p graf--empty"></br></p><p class="graf graf--p is-selected" name="0pobxirudi">Sachin is the best Indian Cricketer&nbsp;</p><p class="graf--last"> </p>', '2015-11-03 07:10:55', '2015-11-03 07:12:18', 47, 0),
(21, 18, 1, ' <h3 class="graf graf--h3 graf--first">Ganguly</h3><p class="graf graf--p graf--empty"><br></p><p class="graf graf--p graf--empty" name="5qrn1dobt9"><br></p><p class="graf graf--p graf--empty" name="2z4nsl9pb9"><br></p> <p class="graf graf--p"><br></p><p class="graf graf--p graf--empty" name="laklbit3xr"><br></p><p class="graf graf--p is-selected" name="vi57et57b9">Ganguly is th b</p><p class="graf--last"> </p>', '2015-11-03 08:01:36', '2015-11-03 08:02:04', 47, 0),
(22, 18, 1, '\n   					  <h3 class="graf graf--h3 graf--first">England</h3><p class="graf graf--p graf--empty"><br></p><p class="graf graf--p graf--empty" name="xcivn29"><br></p><p class="graf graf--p graf--empty" name="ou4ck81tt9"><br></p><p class="graf graf--p graf--empty" name="u63p6qolxr"><br></p> <p class="graf graf--p"><br></p><p class="graf graf--p graf--empty" name="2hj59rizfr"><br></p><p class="graf graf--p is-selected" name="215jqbyb9">sjhdfh;asdfj''sldfv''lsjmfkl</p><p class="graf--last"> </p>				', '2015-11-03 08:03:42', '2015-11-03 08:31:13', 48, 1),
(23, 18, 2, ' <h3 class="graf graf--h3 graf--first">Gonguras</h3><p class="graf graf--p graf--empty"><br></p><p class="graf graf--p graf--empty" name="z2vrla0pb9"><br></p> <p class="graf graf--p is-selected">good resta</p><p class="graf--last"> </p>', '2015-11-03 08:13:02', '2015-11-03 08:13:17', NULL, 0),
(24, 8, 1, ' <h3 class="graf graf--h3 graf--first">Deepavali</h3><p class="graf graf--p graf--empty"><br></p> <figure contenteditable="false" class="graf graf--figure is-defaultValue" name="qvzyy9o1or" tabindex="0"> <div style="max-width: 274px; max-height: 184px;" class="aspectRatioPlaceholder is-locked"> <div style="padding-bottom: 67.1532846715328%;" class="aspect-ratio-fill"></div> <img src="http://localhost:8000/story_images/si1446560502_14118000.jpg" data-height="184" data-width="274" data-image-id="" class="graf-image" data-delayed-src=""> </div> <figcaption contenteditable="true" data-default-value="Type caption for image (optional)" class="imageCaption">  <br> </figcaption> </figure><p class="graf graf--p">deepavali is celevbrated all over India</p><figure contenteditable="false" class="graf--figure graf--iframe graf--first" name="vwrhkw3ik9" tabindex="0"> <div class="iframeContainer"> <iframe frameborder="0" width="700" height="393" data-media-id="" src="http://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FHrrW3rO51ak%3Ffeature%3Doembed&amp;url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DHrrW3rO51ak&amp;image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FHrrW3rO51ak%2Fhqdefault.jpg&amp;key=57eb3fe2c91144c5be4e8144a707eb77&amp;type=text%2Fhtml&amp;schema=youtube" data-height="480" data-width="854"> </iframe> </div> <figcaption contenteditable="true" data-default-value="Type caption for embed (optional)" class="imageCaption"> <a rel="nofollow" class="markup--anchor markup--figure-anchor" data-href="" href="http://www.youtube.com/watch?v=HrrW3rO51ak" target="_blank">http://www.youtube.com/watch?v=HrrW3rO51ak</a> </figcaption> <br></figure><p class="graf graf--p" name="968nis5rk9">jksdjhs''lfjasnhasn</p><p class="graf--last"> </p>', '2015-11-03 08:50:48', '2015-11-03 08:52:49', 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(46, 'Tourism', '2015-11-03 07:06:06', '2015-11-03 07:06:06'),
(47, 'Cricket', '2015-11-03 07:10:35', '2015-11-03 07:10:35'),
(48, 'Nation', '2015-11-03 08:04:12', '2015-11-03 08:04:12'),
(49, 'Diwali', '2015-11-03 08:52:41', '2015-11-03 08:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 4, 0, 0, '2015-09-29 03:57:42', NULL, NULL),
(3, 3, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(4, 4, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(5, 5, '127.0.0.1', 2, 0, 0, '2015-09-29 09:02:04', NULL, NULL),
(6, 6, '127.0.0.1', 5, 1, 1, '2015-11-01 08:29:31', '2015-11-01 08:29:31', '2015-11-02 20:21:13'),
(7, 6, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(8, 7, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(9, 8, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(10, 9, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(11, 10, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(12, 13, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(13, 15, '127.0.0.1', 1, 0, 0, '2015-11-01 07:46:15', NULL, NULL),
(14, 16, '127.0.0.1', 5, 1, 0, '2015-11-01 21:14:28', '2015-11-01 21:14:28', NULL),
(15, 17, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(16, 18, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(17, 20, NULL, 0, 0, 0, NULL, NULL, NULL),
(18, 21, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`, `username`, `bio`, `picture`) VALUES
(2, 'vishnu.ns@provenlogic.net3241', 'aaa111', NULL, 1, 'Mw60VjBngKeSEpRiOfcKKmFTOQXGl0D9ruEMUwXtol', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-29 02:43:56', '2015-09-29 02:43:57', 'vishnu', '', NULL),
(3, 'vishnu.ns@provenlogic.netasd', '$2y$10$W7uvOYb29Md7I9DQfrohWO9XIiDoUFp9jYRxjKOYf/aL36HKr9aSy', NULL, 1, 'uU4Z1fApqomIw75nzYdJQ3ruk1uuahTXIUaasHtkQ9', NULL, '2015-09-29 04:23:59', '$2y$10$Zfy5q8X8x77cgmj5YWEOxOLL.VW99rt99ocsbDP3ELJBh0TJI0JfS', NULL, NULL, NULL, '2015-09-29 03:58:52', '2015-09-29 04:23:59', 'vichu', '', NULL),
(4, 'vishnu.ns@provenlogic.net132', '$2y$10$sXRJn6As3AHznWAwn8.ERu84O4uIEROkMnDHErPARIsRLie0oV5AC', NULL, 1, 'uU4Z1fApqomIw75nzYdJQ3ruk1uuahTXIUaasHtkQ9', '2015-09-29 04:25:12', '2015-09-29 09:02:04', '$2y$10$3vCyXLK3lLmS.qo1wb7.NuI.ze0dTP/NFETaGQqfomLqn9BEiBvSi', NULL, NULL, NULL, '2015-09-29 04:24:54', '2015-09-29 09:02:04', 'trivikram', '', NULL),
(5, 'vishnu.ns@provenlogic.netasdad', '$2y$10$SsQNjFLiNqI/ow3gotigY.tGrwipRwJFJzzqq5ag3Q7/kxY7f8.nG', NULL, 1, 'uU4Z1fApqomIw75nzYdJQ3ruk1uuahTXIUaasHtkQ9', '2015-09-29 08:59:55', '2015-09-29 09:01:35', '$2y$10$TZpHl/JSDtkOsEccOXe/k.diarXziqBrANb8RSyAvtNG0qyfzCLxq', NULL, NULL, NULL, '2015-09-29 08:58:38', '2015-09-29 09:01:35', 'vishnu', '', NULL),
(6, 'vishnu.ns@provenlogic.netsdf', '$2y$10$W6LkwC94CptDwTcy4WbX7ueHIBP683f07FilD7e4A.SjgUJC44sHq', NULL, 1, NULL, '2015-09-29 09:03:22', '2015-11-01 07:46:58', '$2y$10$yZ.xAc5VzCesx3H40jpcOOh0OiE.UuCcUtDVLjGmzUyPVIuQsGL1q', NULL, NULL, NULL, '2015-09-29 09:02:51', '2015-11-01 08:27:46', 'sachin', 'sacin is the best cricketer', 'uploads/pictures/ronaldo.jpg'),
(7, 'vishnu.ns195@gmail.com', '$2a$10$pRBx7EYFvBwIcbnfevT4V.CGjbDQ8LHvbXl2A.SkDR.rJX8ee4Lzy', NULL, 1, NULL, '2015-09-30 05:51:31', '2015-10-08 07:41:37', '$2y$10$x6yUq.Gx13CwPNgp0Ri.3eNbdHq92pokMIIsuwKTSmc5SgzQZYjC6', NULL, NULL, NULL, '2015-09-30 05:51:08', '2015-10-08 07:41:37', 'vishnu ns', '', NULL),
(8, 'beckham@football.com', '$2y$10$Q2/GrDZca9wyLt6dqzd0DOqRegqpxUR6U6j7yTkfaHJxDjXZTGoYW', NULL, 1, 'jcY8c4gE0BjA17y63mmiUXL3wRfMnLjzgMypGgJs9U', NULL, '2015-11-03 08:28:49', '$2y$10$y6u/w4dZlm.jRtjqc5riZ.tTqyyLHEo1MkrEe/Xn5.K6BiLJuj.my', NULL, NULL, NULL, '2015-10-08 01:47:11', '2015-11-03 08:46:03', 'Beckham', 'I am a  footballer', 'uploads/pictures/beckham.jpg'),
(9, 'trivikram@provenlogic.net', '$2y$10$DjUOs9afssfB3mxKRe3GA.YK36LRCzDr2fLdcVDHrmTKRkYAc/sIq', NULL, 1, NULL, '2015-10-17 06:04:58', '2015-10-17 06:05:38', '$2y$10$JlDYS1hy.VjJYjb6QYRHEeu3vAeWQO1QDqNFeCbnjzh6Q7pMgcVde', NULL, NULL, NULL, '2015-10-17 06:04:16', '2015-10-17 06:05:38', 'trivikram', '', NULL),
(10, 'krutika@provenlogic.netsdfas', '$2y$10$V9yvBVR6skTT.IWQjLFo7./dQUrtiqn2m32YLrkfdhxbcwGCTGWpy', NULL, 1, NULL, '2015-10-29 07:25:14', '2015-10-29 07:27:00', '$2y$10$MBist.GGxm7TVFqOsAF5.en87.VH57ABqoQQbsWL7JZ7gbXT5/x5C', NULL, NULL, NULL, '2015-10-29 07:24:17', '2015-10-29 07:27:00', 'krutika', '', NULL),
(11, 'krutika@provenlogic.net', '$2a$10$pRBx7EYFvBwIcbnfevT4V.CGjbDQ8LHvbXl2A.SkDR.rJX8ee4Lzy', NULL, 1, NULL, '2015-10-29 07:35:13', NULL, NULL, NULL, NULL, NULL, '2015-10-29 07:32:38', '2015-10-29 07:35:13', 'krutika', '', NULL),
(12, 'vishnu.ns@provenlogic.net,nvn,', '$2y$10$E./5YwYRqQL7GZqmjqMb1.8d0vS72JZQwgULmTHAWJolVObP5F/My', NULL, 0, '6Amz5mGss3lcGAOk7mXmopob6392Yu6oyBiLOsqnoA', NULL, NULL, NULL, NULL, NULL, NULL, '2015-10-29 07:56:03', '2015-10-29 07:56:03', 'vichu', '', NULL),
(13, 'vishnu.ns@provenlogic.netkljjkl', '$2y$10$bz56xqijwRWUgznb239HE.kHpfs4hhaP.MYEQjrI6HU24MPztRu1.', NULL, 1, NULL, '2015-11-01 07:36:08', '2015-11-01 07:38:05', '$2y$10$AmvG1brwpMHm10sVx7hr9u2nKrRkIiEvhl1WXKBPX8RQ.6S65tKo.', NULL, NULL, NULL, '2015-11-01 07:35:42', '2015-11-01 07:38:05', 'kouch', '', NULL),
(14, 'vishnu.ns@provenlogic.netjk;kj', '$2y$10$aZvDKce00KaYGUnYEK9pPevoocQ9cDcAcGUFrW5lcZLEOn/oRqqVO', NULL, 1, NULL, '2015-11-01 07:40:48', NULL, NULL, NULL, NULL, NULL, '2015-11-01 07:40:35', '2015-11-01 07:40:48', 'kohli', '', NULL),
(15, 'zsdfsdf', '$2y$10$S/E07MgIAa5QWqd5k4e0uure9ehS/snBcjzZyv4b4TXLIgRxOgKfW', NULL, 1, NULL, '2015-11-01 07:46:00', NULL, NULL, NULL, NULL, NULL, '2015-11-01 07:45:45', '2015-11-01 07:46:00', 'gain', '', NULL),
(18, 'vishnu.ns@gmail.com', '$2y$10$f8dHTi2RsaEHyay/66bhWuRZmutOeDoGF1mg5fJW4i.LomseJ0E3O', NULL, 1, 'm4WJlHNUxOTxOIYlVqxHWOdRuSOtWcb6obVwMzrERR', NULL, '2015-11-03 09:00:36', '$2y$10$njIQh.8aB0UoWiZtxS7.6eo24w4JLaH5ujh89HvbgMWsFWw2/NOYC', NULL, NULL, NULL, '2015-11-01 21:24:06', '2015-11-03 09:00:36', 'mamu', 'he is a champ', 'uploads/pictures/ronaldo.jpg'),
(19, 'vishnu.ns@provenlogic.netzcZSD', '$2y$10$hYe1eh4UUFvllsXJ5a7aROSs0wvVpwNPqngLX2F2Rd8nxNvoBogra', NULL, 0, NULL, '2015-11-02 19:12:36', NULL, NULL, NULL, NULL, NULL, '2015-11-02 09:25:03', '2015-11-02 19:12:36', 'admin', '', NULL),
(20, 'vishnu.ns@provenlogic.netsDSf', '$2y$10$2AeJ8/ToGKs5kDf43V3gOOKwULMDchxHfJ7/b3sIohZlK5EHc/uV6', NULL, 1, NULL, NULL, '2015-11-02 19:49:21', '$2y$10$PaveTQDLi35FzzeASNVgMOULQv4idLiXWjEmYxiLq46T7TiNMN3Vu', NULL, NULL, NULL, '2015-11-02 19:49:21', '2015-11-02 19:49:21', 'vishnu', '', NULL),
(21, 'vishnu.ns@provenlogic.net', '$2y$10$IpdlWnPRAe9KhedMwcLJgOI2ByshLt6FjAyDecpi9BVi9f9N62a1u', NULL, 1, NULL, NULL, '2015-11-03 03:52:00', '$2y$10$GkSAZs7uWUQ/i1fOl4u6Xe.JcEjb7PRSHZ1H11NVz4ZY6.oDnTD0a', NULL, NULL, NULL, '2015-11-02 19:52:31', '2015-11-03 03:52:00', 'vishnu champ', '21 champ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(21, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `posts_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `reblogged_posts`
--
ALTER TABLE `reblogged_posts`
  ADD CONSTRAINT `reblogged_posts_original_post_id_foreign` FOREIGN KEY (`original_post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `reblogged_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `regular_posts`
--
ALTER TABLE `regular_posts`
  ADD CONSTRAINT `regular_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
