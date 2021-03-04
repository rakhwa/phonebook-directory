/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : phonebook

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 07/01/2021 16:26:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` int NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_user_id`(`user_id`) USING BTREE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (2, 'rakhwa ', 'bee', 98255678, 'pechs', 1);
INSERT INTO `contact` VALUES (3, 'blue-blooded', 'byjchs', 2147483647, 'karachi', 1);
INSERT INTO `contact` VALUES (4, 'ayesha ', 'bcom ms', 2147483647, 'abcd', 1);
INSERT INTO `contact` VALUES (5, 'amna', 'bscs', 3458900, 'gulshan', 1);
INSERT INTO `contact` VALUES (6, 'sara', 'becs', 2147483647, 'johar', 1);
INSERT INTO `contact` VALUES (7, 'tes12', 'test', 23456789, 'test', 1);
INSERT INTO `contact` VALUES (11, 'test1', 'test', 234234, 'test', 1);
INSERT INTO `contact` VALUES (13, 'testet', 'testtt', 3333332, 'NK', 1);
INSERT INTO `contact` VALUES (14, 'sofia', 'mbbs', 98654, 'bhaddurabad', 2);
INSERT INTO `contact` VALUES (15, 'maha meher', 'btech ms', 2147483647, 'johar', 1);
INSERT INTO `contact` VALUES (16, 'tedyy', 'mass telecom', 2147483647, 'hadeed', 3);
INSERT INTO `contact` VALUES (18, 'saba', 'namme', 98654, 'poetry', 2);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email_index`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'rakhwa', 'rakhwa', 'rakhwa@gmail.com', '123');
INSERT INTO `user` VALUES (2, 'raheem', 'raheem', 'raheem@hmail.com', 'new');
INSERT INTO `user` VALUES (3, 'maha', 'maha', 'maha@gmail.com', 'abc');

SET FOREIGN_KEY_CHECKS = 1;
