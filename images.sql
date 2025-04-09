/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : pgb

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 09/04/2025 14:17:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `viewable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (1, 'App\\Models\\Project', 1, '/images/project1.jpg', NULL, 1, '2025-04-07 11:56:32', '2025-04-07 11:56:32');
INSERT INTO `images` VALUES (2, 'App\\Models\\Project', 1, '/images/project1-2.jpg', NULL, 2, '2025-04-07 11:56:32', '2025-04-07 11:56:32');
INSERT INTO `images` VALUES (3, 'App\\Models\\Project', 2, '/images/project2.jpg', NULL, 3, '2025-04-07 11:56:32', '2025-04-07 11:56:32');
INSERT INTO `images` VALUES (4, 'App\\Models\\Project', 3, '/images/project3.jpg', NULL, 4, '2025-04-07 11:56:32', '2025-04-07 11:56:32');
INSERT INTO `images` VALUES (5, 'App\\Models\\Project', 4, '/images/project4.jpg', NULL, 5, '2025-04-07 11:56:32', '2025-04-07 11:56:32');
INSERT INTO `images` VALUES (6, 'App\\Models\\Project', 5, '/images/project5.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');
INSERT INTO `images` VALUES (7, 'App\\Models\\Project', 6, '/images/project6.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');
INSERT INTO `images` VALUES (8, 'App\\Models\\Project', 7, '/images/project7.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');
INSERT INTO `images` VALUES (9, 'App\\Models\\Project', 8, '/images/project8.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');
INSERT INTO `images` VALUES (10, 'App\\Models\\Project', 8, '/images/project8-2.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');
INSERT INTO `images` VALUES (11, 'App\\Models\\Project', 9, '/images/project9.jpg', NULL, 1, '2025-04-07 09:48:32', '2025-04-07 09:48:32');

SET FOREIGN_KEY_CHECKS = 1;
