/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MariaDB
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 12/03/2019 20:12:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for packeddata
-- ----------------------------
DROP TABLE IF EXISTS `packeddata`;
CREATE TABLE `packeddata`  (
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  `model` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `code` char(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `boxNumber` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `weekNumber` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `packedNum` int(5) DEFAULT NULL,
  `maxPackNum` int(5) DEFAULT NULL,
  `time1` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `time2` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`SN`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of packeddata
-- ----------------------------
INSERT INTO `packeddata` VALUES (1, 'model1', 'code1', 'box1', '2', 1, 15, '2019-1-1', '2019-1-1');
INSERT INTO `packeddata` VALUES (2, 'model1', 'code7', 'box7', '8', 9, 15, '2019-1-8', '2019-1-1');

-- ----------------------------
-- Table structure for tdb_goods_types
-- ----------------------------
DROP TABLE IF EXISTS `tdb_goods_types`;
CREATE TABLE `tdb_goods_types`  (
  `type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdb_goods_types
-- ----------------------------
INSERT INTO `tdb_goods_types` VALUES (1, '爷爷', 0);
INSERT INTO `tdb_goods_types` VALUES (2, '父亲', 1);
INSERT INTO `tdb_goods_types` VALUES (3, '儿子', 2);

-- ----------------------------
-- Table structure for test2
-- ----------------------------
DROP TABLE IF EXISTS `test2`;
CREATE TABLE `test2`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of test2
-- ----------------------------
INSERT INTO `test2` VALUES (1, '爷爷', 0);
INSERT INTO `test2` VALUES (2, '父亲', 1);
INSERT INTO `test2` VALUES (3, '儿子', 2);
INSERT INTO `test2` VALUES (4, '女儿', 2);

SET FOREIGN_KEY_CHECKS = 1;
