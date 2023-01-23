/*
 Navicat Premium Data Transfer

 Source Server         : local mysql
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : local

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 23/01/2023 16:31:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `productType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `size` double NULL DEFAULT NULL,
  `weight` double NULL DEFAULT NULL,
  `height` double NULL DEFAULT NULL,
  `length` double NULL DEFAULT NULL,
  `width` double NULL DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sku_index`(`sku` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_persian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'testSku', 'testName', 100.00, 'dvd', 123, NULL, NULL, NULL, NULL, '2023-01-22 19:15:07');
INSERT INTO `products` VALUES (4, 'test', 'ZjO', 100.00, 'dvd', 123, NULL, NULL, NULL, NULL, '2023-01-23 02:37:20');
INSERT INTO `products` VALUES (8, 'vvtester', 'vfdvr', 100.00, 'dvd', 123, NULL, NULL, NULL, NULL, '2023-01-23 02:52:51');
INSERT INTO `products` VALUES (9, 'WbuYl', 'DVD', 100.00, 'dvd', 10, NULL, NULL, NULL, NULL, '2023-01-23 13:00:41');
INSERT INTO `products` VALUES (10, '31YAC8', 'FURNITURE', 100.00, 'furniture', NULL, NULL, 20, 30, 40, '2023-01-23 13:00:46');
INSERT INTO `products` VALUES (11, 'NvgI0', 'BOOK', 100.00, 'book', NULL, 45, NULL, NULL, NULL, '2023-01-23 13:00:47');
INSERT INTO `products` VALUES (16, 'h0JDi', 'DVD', 100.00, 'dvd', 10, NULL, NULL, NULL, NULL, '2023-01-23 13:17:14');
INSERT INTO `products` VALUES (17, 'NKaAZ0', 'FURNITURE', 100.00, 'furniture', NULL, NULL, 20, 30, 40, '2023-01-23 13:17:19');
INSERT INTO `products` VALUES (18, 'NccP1', 'BOOK', 100.00, 'book', NULL, 45, NULL, NULL, NULL, '2023-01-23 13:17:19');

SET FOREIGN_KEY_CHECKS = 1;
