/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : pcr_db

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 04/07/2021 07:50:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `type` int(11) NULL DEFAULT 1,
  `start_date` date NOT NULL,
  `end_date` date NULL DEFAULT NULL,
  `start_time` time(0) NOT NULL,
  `valid_hours` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of histories
-- ----------------------------
INSERT INTO `histories` VALUES (20, 18, 1, '2021-06-24', '2021-06-24', '03:56:49', 0, '2021-06-24 17:59:13', '2021-06-24 17:59:13');
INSERT INTO `histories` VALUES (21, 18, 1, '2021-06-24', '2021-06-25', '15:00:42', 20, '2021-06-24 18:00:48', '2021-06-24 18:00:48');
INSERT INTO `histories` VALUES (23, 18, 2, '2021-06-25', '2021-06-26', '15:07:51', 24, '2021-06-24 18:08:06', '2021-06-24 18:08:06');
INSERT INTO `histories` VALUES (26, 16, 1, '2021-02-11', '2021-02-11', '04:33:57', 0, '2021-07-03 07:34:13', '2021-07-03 07:34:13');
INSERT INTO `histories` VALUES (27, 16, 1, '2021-05-16', '2021-05-16', '04:34:17', 0, '2021-07-03 07:34:32', '2021-07-03 07:34:42');
INSERT INTO `histories` VALUES (28, 16, 1, '2021-05-26', '2021-05-26', '04:35:01', 0, '2021-07-03 07:35:22', '2021-07-03 07:35:38');
INSERT INTO `histories` VALUES (29, 16, 1, '2021-05-31', '2021-05-31', '04:35:56', 0, '2021-07-03 07:36:13', '2021-07-03 07:36:13');
INSERT INTO `histories` VALUES (30, 16, 1, '2021-06-04', '2021-06-04', '04:36:16', 0, '2021-07-03 07:36:27', '2021-07-03 07:36:27');
INSERT INTO `histories` VALUES (31, 16, 1, '2021-06-11', '2021-06-11', '04:36:29', 0, '2021-07-03 07:36:41', '2021-07-03 07:36:41');
INSERT INTO `histories` VALUES (32, 16, 1, '2021-06-17', '2021-06-17', '04:36:45', 0, '2021-07-03 07:36:58', '2021-07-03 07:36:58');
INSERT INTO `histories` VALUES (33, 16, 2, '2021-06-21', '2021-06-21', '04:37:12', 0, '2021-07-03 07:37:29', '2021-07-03 07:37:29');
INSERT INTO `histories` VALUES (34, 16, 1, '2021-06-25', '2021-06-25', '04:37:46', 0, '2021-07-03 07:38:01', '2021-07-03 07:38:01');
INSERT INTO `histories` VALUES (35, 16, 2, '2021-05-29', '2021-05-29', '04:38:22', 0, '2021-07-03 07:38:49', '2021-07-03 07:38:49');
INSERT INTO `histories` VALUES (36, 16, 1, '2021-07-03', '2021-07-03', '04:39:27', 0, '2021-07-03 07:39:36', '2021-07-03 07:39:36');
INSERT INTO `histories` VALUES (37, 18, 1, '2021-07-03', '2021-07-03', '01:21:02', 4, '2021-07-03 15:23:34', '2021-07-03 15:23:34');
INSERT INTO `histories` VALUES (38, 19, 1, '2021-07-04', '2021-07-04', '06:53:29', 1, '2021-07-04 20:53:33', '2021-07-04 20:53:33');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_06_19_012736_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_06_19_171507_create_histories_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('boris.nikolaev716@gmail.com', '$2y$10$72Abwr1XNVXmAho3bOTLeuuctId7QFpm/cNLhJHr8nWpkhdfsXrQ.', '2021-06-19 08:45:56');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (1, 'App\\Models\\User', 15, 'PCR-TEST-USER', '5141e94c2b34e6e57cfcfc34b7840e48a8771a75c19ec51f9395a171d71f33e1', '[\"*\"]', NULL, '2021-06-23 10:13:00', '2021-06-23 10:13:00');
INSERT INTO `personal_access_tokens` VALUES (2, 'App\\Models\\User', 15, 'PCR-TEST-USER', '184e6bfd9587b80e24f16776e4ce5ff474586033866b196b2c35edfadc9d4add', '[\"*\"]', NULL, '2021-06-23 10:19:30', '2021-06-23 10:19:30');
INSERT INTO `personal_access_tokens` VALUES (3, 'App\\Models\\User', 15, 'PCR-TEST-USER', '97d04c07c125e6322d6dec2e8d7ae7e0bdca0945e48536b6d489f65b8c109a56', '[\"*\"]', NULL, '2021-06-23 10:21:17', '2021-06-23 10:21:17');
INSERT INTO `personal_access_tokens` VALUES (4, 'App\\Models\\User', 15, 'PCR-TEST-USER', '1486df88809b27b48ce0bf075c0aabefeca600868fc80e63f43c9b260167e7b6', '[\"*\"]', NULL, '2021-06-23 10:24:43', '2021-06-23 10:24:43');
INSERT INTO `personal_access_tokens` VALUES (5, 'App\\Models\\User', 15, 'PCR-TEST-USER', '1ca335bc07f6f96dc1a8eba76f2cdb299203c201896cd40901f0ab7e23bae944', '[\"*\"]', NULL, '2021-06-23 10:27:02', '2021-06-23 10:27:02');
INSERT INTO `personal_access_tokens` VALUES (6, 'App\\Models\\User', 15, 'PCR-TEST-USER', '1f5e93e8b6af55fa4b9967e05ce594ba7a46ee0176d368e69ebb75db0f10afe1', '[\"*\"]', NULL, '2021-06-23 10:28:28', '2021-06-23 10:28:28');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('178JYzvwAiIMyIHJpkIkkyhpvZoMzwe5QscU719S', NULL, '178.171.53.122', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTndMRGlxOTM5UWEyQjhyaDBTNHJscVg4T3UxZzBkWjZMYUdNUjdZYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343167);
INSERT INTO `sessions` VALUES ('4X12Ztrg1YllGjpPAk04Dnr3UNrGvNaQbG9SU1N4', 1, '176.205.85.37', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVnhsNko1M0JPaENKeVI0emhlN0JUR3lKVmhhekxmOTJ0VjV2algxdyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vd2E5dGEubGlmZS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbnNuUTJpYlhTQ21oVG5vNTJ0NWtBZXlERVFQS24uTFhqVlNPOUxsVnFmMTZrSFF1SGYyUC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG5zblEyaWJYU0NtaFRubzUydDVrQWV5REVRUEtuLkxYalZTTzlMbFZxZjE2a0hRdUhmMlAuIjt9', 1625406135);
INSERT INTO `sessions` VALUES ('6sMGkfLokZmS3K9vG485q3FjXrAvYboHmmJO7KBG', NULL, '3.139.101.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTlMWktTWGFiblF1cHFSZ2VFU3pIZTc1bTc1d0R0M2NBUVcya2FIciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625403408);
INSERT INTO `sessions` VALUES ('94auhTwXWT6fQbmFX6jxURTm8M0tytjTTnpK3DNK', NULL, '193.160.69.206', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXNpUEkxcnVtVkR4QXJkQXBibmU4SHRxTUxlcFU4WVpDSG5Gam9GdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625297702);
INSERT INTO `sessions` VALUES ('apzIN8spJtmjQBR4zyoxZwTSZW7RsSb6eMKBDCBP', NULL, '52.36.249.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFNKSzQyMjVtOVlnZUYwV014T0lmWUxVQ0ZPazBTaTBtaWJZM0R2MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354287);
INSERT INTO `sessions` VALUES ('bFXKUXMKLMdz3CLspMIE6CynlVcaEUGXJTJy5Nqy', NULL, '193.47.59.229', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnoxNWFhR0RVRlRMbWU1QlZKcnhDRkNreHhZT29lTHZmR1JzMWFnMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343167);
INSERT INTO `sessions` VALUES ('BjQiD2NZg7PjWGXPRTpIlXmlM1mcgSqktUNriU5G', NULL, '52.36.249.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1I0eUJKajg0ZzVrUmZNTVBXcVViTUgydHd5NVVsdGRlcXBIT2hXdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354294);
INSERT INTO `sessions` VALUES ('c9s8lDOe5FHZGzS3Tn4WhUtywV12I3D6UrRG89vJ', NULL, '193.160.69.112', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUtueWloaWc5QThwaG55UkVjb2RHTGZoQ3B5S2c2WnIyekVYdE5idyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297703);
INSERT INTO `sessions` VALUES ('D2AxbfjhVOap2AGS635RKPAMBRoj3nNTSkldfNn5', NULL, '179.61.152.66', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRktoclR2djlrQ1Vrd3dLT3dBajREMUdzUU1qMklwM3NKRkFSRWNSTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297702);
INSERT INTO `sessions` VALUES ('dg7BFWs8RfrmMZzbAYydeOqkEvk0RFBEP0I7z15f', NULL, '94.57.112.227', 'ALHOSENN/1.0 (com.chat.QSXiYuChat; build:1; iOS 14.6.0) Alamofire/5.4.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVc0RnN1SENUc3pwSDl5YkZQc2ZXSlFzclgwVWxOTE43bkNwbG1QTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cud2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625339215);
INSERT INTO `sessions` VALUES ('dNTAa1RiK50Z1AWFk8mmI2LJTVZPxXX6HJ21BlP5', NULL, '3.139.101.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXZzUUN1clNjNm43UzBXRTBLTDhtbHIxVTAyYmI0bnNvOTN6ZzJpMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625403407);
INSERT INTO `sessions` VALUES ('ev6FVSZo1sUeOujZtTvzAuV20HclY71U8Vosdce8', NULL, '54.36.149.67', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1o4VjBBQUlZenA5TFBMQ3I0RU9vY1djb0pqbnVka2tUd2Vvb05aMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly93d3cud2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625391898);
INSERT INTO `sessions` VALUES ('FPMLg4YVbCqCn4QvxjVwoOBe7LEnGajbsw7t646P', 2, '188.43.235.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiT1FtZnYzQXlhd3FZcGUydGlaVm1sTktBZnhYWFhqVVM4QzMwMFMzSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93YTl0YS5saWZlL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQwQktRODdiTjlRd0hQYy51d2VzSlVlR1RMNXZlZzhXbkw1b1owMkNnNkRyYXpmaXpad0xqLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMEJLUTg3Yk45UXdIUGMudXdlc0pVZUdUTDV2ZWc4V25MNW9aMDJDZzZEcmF6Zml6WndMai4iO30=', 1625301159);
INSERT INTO `sessions` VALUES ('GfV3xaNveZ1a5ooBTTye7DjA88AsqT1LQEXK2EcW', NULL, '94.57.112.227', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2ozUVhaSWo3N1NYVVl0Y3EyT3VXV1Z5TXZhZmRkRVdzWUZuOTNMcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625338588);
INSERT INTO `sessions` VALUES ('H5BESNvlQ0gCN9vLP7Xvypgm6Fi4cpcgpLmR3byj', NULL, '154.16.38.80', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0w5RkNBWk1WS0N1NUM2cjNGRDFGTGZhT01OT1pUZzJuWjROUWVqZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625297701);
INSERT INTO `sessions` VALUES ('h79KiHn4UcTFwAijm4C01G41sPcWV5uvnnQ8tzY9', NULL, '193.160.69.112', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienNZZTgybTVuN3d4REE4Wkd5UDRERW1PZTk3OW96SDBOam16UmJnVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297703);
INSERT INTO `sessions` VALUES ('J7hNvJHd3af4zE2f3Ka9nReINKp790ZMB1SXzjeL', NULL, '34.214.129.32', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGhVYmJZS1pmVTI2emNDSEpJNEVCb001bmUyZXVyNkdPTzFncHVRViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354203);
INSERT INTO `sessions` VALUES ('JyyjarLzyfIuOB5F4yzGoOtO9YhkCp1oObXC5IJp', 2, '188.43.235.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieDQxOEZBU2pVQ05DankybXJHemh3SnpXbFBkZzRyQjZPejI1U203cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93YTl0YS5saWZlL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQwQktRODdiTjlRd0hQYy51d2VzSlVlR1RMNXZlZzhXbkw1b1owMkNnNkRyYXpmaXpad0xqLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMEJLUTg3Yk45UXdIUGMudXdlc0pVZUdUTDV2ZWc4V25MNW9aMDJDZzZEcmF6Zml6WndMai4iO30=', 1625300766);
INSERT INTO `sessions` VALUES ('kClCfhurqlgSDDGWj4JtlKYZ1DQid23yQ8GZztgm', 1, '94.57.112.227', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoic1BhbG5FTHVyejd4c21McHViVEJ0ajZwRE1haXJWTTlDcHROb01TVCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vd2E5dGEubGlmZS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbnNuUTJpYlhTQ21oVG5vNTJ0NWtBZXlERVFQS24uTFhqVlNPOUxsVnFmMTZrSFF1SGYyUC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG5zblEyaWJYU0NtaFRubzUydDVrQWV5REVRUEtuLkxYalZTTzlMbFZxZjE2a0hRdUhmMlAuIjt9', 1625339875);
INSERT INTO `sessions` VALUES ('kE9LGzkOhvq8nMpItAW6q6mQ0Jxtb5EZyzZJL4cm', NULL, '172.102.129.241', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDNpbVNPOGNOd2JPYnJ2cmFNUUc1ZXVmWnI1NWRrejA1UmN2TXNWTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625297701);
INSERT INTO `sessions` VALUES ('KHaRElbnZ5MQRH21jyJc94hLJU5VI6Uza2lUnQbW', NULL, '94.126.205.179', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTNiNHVmUjFOOGRhQllHN3o0RkVXc0VlSnN0bmpvdXpKcU12SkRENiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343168);
INSERT INTO `sessions` VALUES ('L7WwnFrK9X7JT3injNFMkUhVuQDKHKESk6HL04z7', NULL, '185.232.22.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHVRSEV4TnVFQ1FmRXJzUWFncmdseHVrTmlnWUpjM21NdHhLYkFuWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625333825);
INSERT INTO `sessions` VALUES ('LDNynccc9UrDM2cXB1cJrIebu8Rj6nD4ECioP8vX', NULL, '179.61.152.66', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGlSTWZXVkY2M3RqeGN0VkcyZkYwd3BDVzRJY2JzeGk1UTBZOHZ3bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297702);
INSERT INTO `sessions` VALUES ('LrqTVvyE3YQhUPPmsgyFuLCYtAL8agTFxp4u2Kin', NULL, '77.90.163.13', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWFYTXVDNzl6UUtGMFl3WUpmV2ZhQ0ZGdkVNTDRxWmgwbml3a0R5NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625297701);
INSERT INTO `sessions` VALUES ('M1ApAskel8e4t8jWT1L2mZoBxzns4xtPC8EpWGlm', NULL, '54.214.217.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDRadlo5dktId3llejlMekNkUEhUYlJ3ajZBZUdBdHV0NEFUTWd2RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354171);
INSERT INTO `sessions` VALUES ('nnyWjmHSH7PR4u4NMCpQktzQv40kC0dymgLO5x0W', NULL, '191.101.78.208', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2xCZll0RmtieFJFaVhvMWowdHl3UTVHZWRlSlJFcGxTYnNtS3ZXUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625343167);
INSERT INTO `sessions` VALUES ('ocOsgHR6KmhMA3ZS1okwU6jSYYKW4w5JAvnhj0i1', NULL, '94.126.205.202', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk1PbWt3elBJeXFWbU54ZmVIU2NwMmM2blJmeU00dVY5YWMwaU5XOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343175);
INSERT INTO `sessions` VALUES ('otUQNcCtRBpXFXsUuinoHXBrooKDWNpER0TzF13d', NULL, '185.151.57.136', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGtpczNXb202UnNQZlpXQU90MVdsSWpycWdHOWI3YW5vb09qendNSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297701);
INSERT INTO `sessions` VALUES ('PxznxpP6e46aMYzLLdQtQH6IbL9doAsR2D0Oqlj8', NULL, '84.22.151.226', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXVoZjdnZzlkQ2daOTNuZ05RYmIzcXNaN3dIdWZSY2h2SjNEZUg3dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625343167);
INSERT INTO `sessions` VALUES ('q6tBnroQS4KqnjVFNzKbyTwVPpsC2NEpymbA2nC6', NULL, '92.118.160.13', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEt3bVdhVkhmTlE5VFllaXJ3SWo1dU54bXFweUxsczVRTlBiakVpOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625338392);
INSERT INTO `sessions` VALUES ('QD0x9N0k8SB3irV7NU78BELSVj0Kx8QiuYwjXpSw', NULL, '94.126.205.126', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlo2T2lJNlp3MFBsWXN4U2o4V1hkNlR2bjVHT0dCTmUwVzhvZ0F2aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343170);
INSERT INTO `sessions` VALUES ('QHu3P8kMG8yobyoMM5GPnmUkNZywHmWGBifR2Vdj', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo3OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiMXREckJhb3FpazhKWDhWb3VtTko2Ulh4eDBuVG9mSlQ2aEFlWWUxeSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDhrNkhoREszdmFzaVA3LnZlTENVemVKSWloTzZIa0tTOWxaLzltcTZNNFFiNmI2S0JuZ3NlIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ4azZIaERLM3Zhc2lQNy52ZUxDVXplSklpaE82SGtLUzlsWi85bXE2TTRRYjZiNktCbmdzZSI7fQ==', 1625409311);
INSERT INTO `sessions` VALUES ('r7QY6Q4CJFbrwnKCXgBEakkSv7YhuauSnHt0Xs1J', NULL, '181.214.213.219', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEFSNmpIZVl1OGJBRjZqNDVTd2M5MkpkbVNZWjZGc0tLMEtkRFdyRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625297702);
INSERT INTO `sessions` VALUES ('Sfj5sMzM6VRdYlj7JyoCG3PXDfD72L33IONJ1KsA', NULL, '54.194.243.233', 'Pandalytics/1.0 (https://domainsbot.com/pandalytics/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFN0RnF0VVp0bmtJblVQMTVIVjRRYXJaeVRyaWtiTGNNYnBTekdMQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625337069);
INSERT INTO `sessions` VALUES ('TTJ4w2ZMtWgeR0Qd9z1nV5hbYJml5gpz7ViddXqe', NULL, '54.214.217.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1BmMFNjd3NxSWlRVU9RM2VwVThlVW1sMWZjQTNkQTAycWVlbW1aVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354180);
INSERT INTO `sessions` VALUES ('U1L2VEQKZquh59usc9ApMqOVIPKvlKz6cc2UOMZa', NULL, '84.22.151.226', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVBZemJtVXQ3UVlWOE4yR3NhMlVpSThmeVA3U3l0OGlzZVVkSU04UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625343167);
INSERT INTO `sessions` VALUES ('uXH7G8jMQDR3PRHyksmmqHkk10iBOjByz3YqZIfP', NULL, '191.101.78.208', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDlWTXRMWkJVSWM1azdVZ3JldjduZk04aDFISFBmd2VVQ2t0ek1sbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625343167);
INSERT INTO `sessions` VALUES ('uyRjEfruR2paQtOWHmkXziGVTzD8luVYwTdljzDX', NULL, '92.118.160.13', 'Go http package', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWdwWDV4OUVTZmRGeXpoUjJkWmRRT1hkN0NzeWRXQlpWdUFuZ2VVQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd2E5dGEubGlmZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625338393);
INSERT INTO `sessions` VALUES ('VHSyeNlDHDhmsYojWkAHQ17O6TyZaNMLPMgdh5sC', NULL, '176.205.85.37', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieVN2bXFiZGRKTEU0M3YwME5vTDNOd0xib25zMnZSUXN2Y0Z1RDh2dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625406062);
INSERT INTO `sessions` VALUES ('WWV6HgqpN9wWSAipr4Z0pzWsRwVvmEmsf6u2XHFw', 2, '188.43.235.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWkhLa3ZhRnU4ZDUyOTYzcU5JbGo0ckR4TklQNm9ycWg5ekZLTmU3ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93YTl0YS5saWZlL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQwQktRODdiTjlRd0hQYy51d2VzSlVlR1RMNXZlZzhXbkw1b1owMkNnNkRyYXpmaXpad0xqLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMEJLUTg3Yk45UXdIUGMudXdlc0pVZUdUTDV2ZWc4V25MNW9aMDJDZzZEcmF6Zml6WndMai4iO30=', 1625402411);
INSERT INTO `sessions` VALUES ('xHEtQYlrKEEtT27DvGqmCUdYYd7QD2VWxnPUcc8T', NULL, '179.61.183.186', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGJWVUYzekpiRDl4S2dvNE1qeXdMRnB2cnlhMFZiNGlYbFVZVTVpZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93YTl0YS5saWZlL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625343175);
INSERT INTO `sessions` VALUES ('XJCtXBB1apzUPrpNrIgJKCnbqpJ4E8mj7HnmZrwP', 1, '176.205.85.37', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1 Safari/605.1.15', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUDh3eVV1bGNzcWNJdzlrSU14UjZhSEZlelJEeHVLdWdrdnNjczRpaCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vd2E5dGEubGlmZS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbnNuUTJpYlhTQ21oVG5vNTJ0NWtBZXlERVFQS24uTFhqVlNPOUxsVnFmMTZrSFF1SGYyUC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG5zblEyaWJYU0NtaFRubzUydDVrQWV5REVRUEtuLkxYalZTTzlMbFZxZjE2a0hRdUhmMlAuIjt9', 1625310848);
INSERT INTO `sessions` VALUES ('xKbYgH6naGiFazKMxETqK3dnZ22PZyWvdMsaUbVz', NULL, '54.36.148.151', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3hKTlVHc0dDNEh4TlU1S3c2TzZ6Rmk0b3pJcjhNNTBWbzllYlJRMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625388772);
INSERT INTO `sessions` VALUES ('Y834mGn9yCG5xsKzmO5YcR1Y0pIKX55CoqWNeDLV', NULL, '124.126.78.136', 'Mozilla/5.0 (Linux; U; Android 9; zh-cn; RMX1901 Build/QKQ1.190918.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 HeyTapBrowser/40.7.22.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDRiS3Nrbm4ySGpYb2tHOUlucEZkNGhBMGJWWG9WWkcwY2x3ZUlOWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LndhOXRhLmxpZmUvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1625380906);
INSERT INTO `sessions` VALUES ('yFGFgenmFHBYtxLqEeKCwTx81Ye7LGWVj3eza29S', NULL, '124.126.78.136', 'Mozilla/5.0 (Linux; U; Android 9; zh-cn; RMX1901 Build/QKQ1.190918.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 HeyTapBrowser/40.7.22.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWZ1ajNJaEt0RjhaQVRuU3U5QkdFNVZqV2UzZTkzZTF5N25rTGc3ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3LndhOXRhLmxpZmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1625380895);
INSERT INTO `sessions` VALUES ('YsgZ40IsLrin0EVcAfVqGBnUqZVKQqsMtt0KZKSp', NULL, '52.35.20.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQk9oWDdtOWdEeXlmcE45NUdRMDhVNjNYd0ZtSGd5S0JZUVM5Ykp3ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93YTl0YS5saWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625354484);
INSERT INTO `sessions` VALUES ('ZKxb57WoRmZCIGNDINHWIf86aeJlaQrbWFrBVXo2', NULL, '94.126.205.179', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZW1idWZsUHg1dmRZTmlyRk8wQzltWW8wNlVQa051UFc3MmpqN0xKcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd2E5dGEubGlmZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1625297701);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabic_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT 0,
  `role` int(11) NULL DEFAULT 1,
  `moblie` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `last_update` timestamp(0) NULL DEFAULT NULL,
  `show_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Ibrahim Osman', NULL, 'i.osmann@yahoo.com', '$2y$10$GcMJ/5/o8DvLZeCH8DOdluI3UpoBRDJWKbjkHrBAwfASwhfSlJtN6', 1, 2, '0501212770', NULL, '$2y$10$CiSgcmFjehLfMQtodmvHfe4TpsahY7cqH9G0/olM8tqdxDN.Tjc3G', NULL, NULL, NULL, NULL, 'upload/avatar/1625409179.jpg', '2021-06-22 08:41:25', '2021-07-04 21:32:59', NULL, '000000');
INSERT INTO `users` VALUES (2, 'Yelizaveta R', NULL, 'yelizavetarudneva@mail.ru', '$2y$10$zCARDpSVzd.x3E4w1IdAm.degrbeR4sixvDfc6l5dwqGE91Yg2kDa', 1, 2, '9233748273', NULL, '$2y$10$8k6HhDK3vasiP7.veLCUzeJIihO6HkKS9lZ/9mq6M4Qb6b6KBngse', NULL, NULL, NULL, NULL, 'upload/avatar/1625409197.png', '2021-06-19 08:38:59', '2021-07-04 21:33:17', '2021-06-22 13:17:53', 'qwe12312');
INSERT INTO `users` VALUES (16, 'Ibrahim Othman Ibrahim Syed Ahmed', 'ابراهيم عثمان ابراهيم سيد احمد', '784-1987-3816369-4', 'P02285476', 1, 1, '501212770', NULL, '$2y$10$qPoqlHASShF2rw0QRAuEi.Sk3s5Ka32J6kfFQgGjYcJEqdogHI73O', NULL, NULL, NULL, NULL, 'upload/avatar/1625409311.png', '2021-06-23 21:45:57', '2021-07-04 21:35:11', '2021-07-03 07:39:36', NULL);
INSERT INTO `users` VALUES (18, 'Ibrahim', 'ابراهيم', '111-1111-1111111-1', '123123123', 1, 1, '123123123', NULL, '$2y$10$GVtqMDKVNgV1IhjgWzV99Ou9lS8IKPnrBVyNtBgRi88QHWq6UzVPC', NULL, NULL, NULL, NULL, 'upload/avatar/1625409263.png', '2021-06-24 17:59:04', '2021-07-04 21:34:23', '2021-07-03 15:23:34', NULL);
INSERT INTO `users` VALUES (19, 'Test User', 'الاسم العربي', '123-3123-1231231-2', '123123', 1, 1, '123123', NULL, '$2y$10$1WMhNH1CRUUeJ93ZFoBqO.r1QoAs7PakgOtqrrt6j9khv87GVpwSS', NULL, NULL, NULL, NULL, '', '2021-07-04 19:39:21', '2021-07-04 20:53:33', '2021-07-04 20:53:33', NULL);

SET FOREIGN_KEY_CHECKS = 1;
