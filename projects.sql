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

 Date: 09/04/2025 14:17:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `projects_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'Pekan Sentral Phase 1', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', 'project-1-67f39f709472d', 1, 'residential', 'completed', '2025-04-07 09:48:32', '2025-04-07 10:22:49');
INSERT INTO `projects` VALUES (2, 'Pekan Sentral Phase 2', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', '2', 1, 'industrial', 'completed', NULL, NULL);
INSERT INTO `projects` VALUES (3, 'Detached Factories (D3)', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', '3', 1, 'commercial', 'completed', NULL, NULL);
INSERT INTO `projects` VALUES (4, 'Pekan Nenas Petrol Station and Drive-thru Restaurant', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', '4', 1, 'residential', 'completed', NULL, NULL);
INSERT INTO `projects` VALUES (5, 'Detached Factories (D4)', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', '5', 1, 'industrial', 'ongoing', NULL, NULL);
INSERT INTO `projects` VALUES (6, 'Sepang Medical Centre', 'Sepang, Selangor', '6', 1, 'commercial', 'ongoing', NULL, NULL);
INSERT INTO `projects` VALUES (7, 'Pekan Sentral Phase 3', 'Pekan Nenas Industrial Park, Pekan Nenas, Johor', '7', 1, 'residential', 'ongoing', NULL, NULL);
INSERT INTO `projects` VALUES (8, 'Calia Residences by PGB', 'Danga Bay, Johor Bahru', '8', 1, 'industrial', 'upcomming', NULL, NULL);
INSERT INTO `projects` VALUES (9, 'PGB Tech Park @ Nusajaya', 'Mukim Tanjung Kupang, Johor Bahru, Johor', '9', 1, 'commercial', 'future', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
