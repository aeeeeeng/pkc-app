/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL - mysql
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:8889
 Source Schema         : db_doc_pkc

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 08/08/2019 19:32:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for balansitas
-- ----------------------------
DROP TABLE IF EXISTS `balansitas`;
CREATE TABLE `balansitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `balansitas_year` varchar(5) DEFAULT NULL,
  `balansitas_month` varchar(2) DEFAULT NULL,
  `balansitas_day` varchar(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of balansitas
-- ----------------------------
BEGIN;
INSERT INTO `balansitas` VALUES (3, 57, '2019', '07', '06', '2019-07-21 08:03:51', '2019-07-24 17:53:15', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `balansitas` VALUES (4, 74, '2019', '01', '31', '2019-07-24 17:19:08', '2019-07-24 17:56:00', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `balansitas` VALUES (5, 75, '2018', '01', '01', '2019-07-24 17:31:50', '2019-07-24 17:34:45', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `balansitas` VALUES (6, 76, '2019', '07', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (7, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (8, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (9, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (10, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (11, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (12, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (13, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (14, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (15, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (16, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (17, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (18, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (19, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (20, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (21, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (22, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (23, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (24, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (25, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (26, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (27, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (28, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (29, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (30, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (31, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (32, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (33, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (34, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (35, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (36, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (37, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (38, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (39, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (40, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (41, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (42, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (43, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (44, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (45, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (46, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (47, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (48, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (49, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (50, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (51, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (52, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (53, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (54, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (55, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (56, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (57, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (58, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (59, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (60, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (61, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (62, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (63, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (64, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (65, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (66, 6, '2015', '01', '01', '2019-07-24 17:56:49', NULL, 'aeeeeeng', NULL);
COMMIT;

-- ----------------------------
-- Table structure for buku_pintar
-- ----------------------------
DROP TABLE IF EXISTS `buku_pintar`;
CREATE TABLE `buku_pintar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `bp_year` varchar(5) DEFAULT NULL,
  `bp_month` varchar(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of buku_pintar
-- ----------------------------
BEGIN;
INSERT INTO `buku_pintar` VALUES (4, 54, '2018', '01', '2019-07-20 19:08:47', '2019-07-24 16:33:10', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `buku_pintar` VALUES (5, 55, '2019', '03', '2019-07-20 19:09:10', '2019-07-21 08:16:30', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `buku_pintar` VALUES (6, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (7, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (8, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (9, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (10, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (11, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (12, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (13, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (14, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (15, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (16, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (17, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (18, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (19, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (20, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (21, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (22, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (23, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (24, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (25, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (26, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (27, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (28, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (29, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (30, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (31, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (32, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (33, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (34, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (35, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (36, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (37, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (38, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (39, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (40, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (41, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (42, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (43, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (44, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (45, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (46, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (47, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (48, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (49, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (50, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (51, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (52, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (53, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (54, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (55, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (56, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (57, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (58, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (59, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (60, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (61, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (62, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (63, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (64, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (65, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (66, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (67, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (68, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (69, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (70, 55, '2019', '01', '2019-07-20 19:09:10', NULL, 'aeeeeeng', NULL);
COMMIT;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` text,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_download_path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
BEGIN;
INSERT INTO `files` VALUES (35, '20190719091737-laporan_bulanan-12-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719091737-laporan_bulanan-12-2019.jpg', '.jpg', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MTczNy1sYXBvcmFuX2J1bGFuYW4tMTItMjAxOS5qcGc=');
INSERT INTO `files` VALUES (36, '20190719082120-laporan_bulanan-1-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719082120-laporan_bulanan-1-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MjEyMC1sYXBvcmFuX2J1bGFuYW4tMS0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (37, '20190719082607-laporan_bulanan-3-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719082607-laporan_bulanan-3-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MjYwNy1sYXBvcmFuX2J1bGFuYW4tMy0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (38, '20190719083017-laporan_bulanan-4-2019.jpeg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719083017-laporan_bulanan-4-2019.jpeg', '.jpeg', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MzAxNy1sYXBvcmFuX2J1bGFuYW4tNC0yMDE5LmpwZWc=');
INSERT INTO `files` VALUES (39, '20190719083204-laporan_bulanan-5-2019.xlsx', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719083204-laporan_bulanan-5-2019.xlsx', '.xlsx', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MzIwNC1sYXBvcmFuX2J1bGFuYW4tNS0yMDE5Lnhsc3g=');
INSERT INTO `files` VALUES (40, '20190719083317-laporan_bulanan-6-2019.xls', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719083317-laporan_bulanan-6-2019.xls', '.xls', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MzMxNy1sYXBvcmFuX2J1bGFuYW4tNi0yMDE5Lnhscw==');
INSERT INTO `files` VALUES (41, '20190719083506-laporan_bulanan-1-2018.pdf', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719083506-laporan_bulanan-1-2018.pdf', '.pdf', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA4MzUwNi1sYXBvcmFuX2J1bGFuYW4tMS0yMDE4LnBkZg==');
INSERT INTO `files` VALUES (42, '20190719092732-laporan_bulanan-7-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092732-laporan_bulanan-7-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MjczMi1sYXBvcmFuX2J1bGFuYW4tNy0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (43, '20190719092805-laporan_bulanan-1-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092805-laporan_bulanan-1-2019.jpg', '.jpg', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MjgwNS1sYXBvcmFuX2J1bGFuYW4tMS0yMDE5LmpwZw==');
INSERT INTO `files` VALUES (44, '20190719092823-laporan_bulanan-2-2019.xlsx', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092823-laporan_bulanan-2-2019.xlsx', '.xlsx', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MjgyMy1sYXBvcmFuX2J1bGFuYW4tMi0yMDE5Lnhsc3g=');
INSERT INTO `files` VALUES (45, '20190719092853-laporan_bulanan-3-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092853-laporan_bulanan-3-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5Mjg1My1sYXBvcmFuX2J1bGFuYW4tMy0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (46, '20190719092915-laporan_bulanan-8-2019.jpeg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092915-laporan_bulanan-8-2019.jpeg', '.jpeg', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MjkxNS1sYXBvcmFuX2J1bGFuYW4tOC0yMDE5LmpwZWc=');
INSERT INTO `files` VALUES (47, '20190719092929-laporan_bulanan-9-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092929-laporan_bulanan-9-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MjkyOS1sYXBvcmFuX2J1bGFuYW4tOS0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (48, '20190719092941-laporan_bulanan-10-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092941-laporan_bulanan-10-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5Mjk0MS1sYXBvcmFuX2J1bGFuYW4tMTAtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (49, '20190719092957-laporan_bulanan-11-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719092957-laporan_bulanan-11-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5Mjk1Ny1sYXBvcmFuX2J1bGFuYW4tMTEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (50, '20190719093013-laporan_bulanan-12-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190719093013-laporan_bulanan-12-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcxOTA5MzAxMy1sYXBvcmFuX2J1bGFuYW4tMTItMjAxOS5wbmc=');
INSERT INTO `files` VALUES (52, '20190720094436-laporan_harian-03-07-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190720094436-laporan_harian-03-07-2019.png', '.png', 'http://wcm.loc:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIwMDk0NDM2LWxhcG9yYW5faGFyaWFuLTAzLTA3LTIwMTkucG5n');
INSERT INTO `files` VALUES (53, '20190720190736-buku_pintar-01-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/buku_pintar/20190720190736-buku_pintar-01-2019.png', '.png', 'http://wcm.loc:8888/pkc_app/api/buku_pintar/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2J1a3VfcGludGFyLzIwMTkwNzIwMTkwNzM2LWJ1a3VfcGludGFyLTAxLTIwMTkucG5n');
INSERT INTO `files` VALUES (54, '20190720192003-buku_pintar-02-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/buku_pintar/20190720192003-buku_pintar-02-2019.jpg', '.jpg', 'http://wcm.loc:8888/pkc_app/api/buku_pintar/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2J1a3VfcGludGFyLzIwMTkwNzIwMTkyMDAzLWJ1a3VfcGludGFyLTAyLTIwMTkuanBn');
INSERT INTO `files` VALUES (55, '20190720190910-buku_pintar-02-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/buku_pintar/20190720190910-buku_pintar-02-2019.png', '.png', 'http://wcm.loc:8888/pkc_app/api/buku_pintar/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2J1a3VfcGludGFyLzIwMTkwNzIwMTkwOTEwLWJ1a3VfcGludGFyLTAyLTIwMTkucG5n');
INSERT INTO `files` VALUES (56, '20190724173626-balansitas-02-02-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190724173626-balansitas-02-02-2018.png', '.png', 'http://localhost:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjQxNzM2MjYtYmFsYW5zaXRhcy0wMi0wMi0yMDE4LnBuZw==');
INSERT INTO `files` VALUES (57, '20190721082225-balansitas-05-07-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190721082225-balansitas-05-07-2019.jpg', '.jpg', 'http://localhost:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjEwODIyMjUtYmFsYW5zaXRhcy0wNS0wNy0yMDE5LmpwZw==');
INSERT INTO `files` VALUES (58, '20190721091107-permentan-PERMENTAN20190001-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permentan/20190721091107-permentan-PERMENTAN20190001-2019.png', '.png', 'http://localhost:8888/pkc_app/api/permentan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbnRhbi8yMDE5MDcyMTA5MTEwNy1wZXJtZW50YW4tUEVSTUVOVEFOMjAxOTAwMDEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (59, '20190721094721-permentan-PERMENTAN20190001-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permentan/20190721094721-permentan-PERMENTAN20190001-2019.png', '.png', 'http://localhost:8888/pkc_app/api/permentan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbnRhbi8yMDE5MDcyMTA5NDcyMS1wZXJtZW50YW4tUEVSTUVOVEFOMjAxOTAwMDEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (60, '20190721121608-permendag-PERMENDAG20180001-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permendag/20190721121608-permendag-PERMENDAG20180001-2018.png', '.png', 'http://localhost:8888/pkc_app/api/permendag/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbmRhZy8yMDE5MDcyMTEyMTYwOC1wZXJtZW5kYWctUEVSTUVOREFHMjAxODAwMDEtMjAxOC5wbmc=');
INSERT INTO `files` VALUES (61, '20190721155029-SK-PROVINSI-SKP20170002-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/sk_provinsi/20190721155029-SK-PROVINSI-SKP20170002-2017.png', '.png', 'http://localhost:8888/pkc_app/api/sk_provinsi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NrX3Byb3ZpbnNpLzIwMTkwNzIxMTU1MDI5LVNLLVBST1ZJTlNJLVNLUDIwMTcwMDAyLTIwMTcucG5n');
INSERT INTO `files` VALUES (62, '20190722134431-peraturan-pupuk-indonesia-SRTPI20180002-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/srt_pi/20190722134431-peraturan-pupuk-indonesia-SRTPI20180002-2018.png', '.png', 'http://localhost:8888/pkc_app/api/srt_pi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NydF9waS8yMDE5MDcyMjEzNDQzMS1wZXJhdHVyYW4tcHVwdWstaW5kb25lc2lhLVNSVFBJMjAxODAwMDItMjAxOC5wbmc=');
INSERT INTO `files` VALUES (63, '20190722141119-peraturan-pupuk-indonesia-SRTPI20180002-2018.xls', '/Applications/MAMP/htdocs/pkc_app/upload/documents/srt_pi/20190722141119-peraturan-pupuk-indonesia-SRTPI20180002-2018.xls', '.xls', 'http://localhost:8888/pkc_app/api/srt_pi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NydF9waS8yMDE5MDcyMjE0MTExOS1wZXJhdHVyYW4tcHVwdWstaW5kb25lc2lhLVNSVFBJMjAxODAwMDItMjAxOC54bHM=');
INSERT INTO `files` VALUES (64, '20190722142414-peraturan-pupuk-indonesia-SRTPI20170001-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/srt_pi/20190722142414-peraturan-pupuk-indonesia-SRTPI20170001-2017.png', '.png', 'http://localhost:8888/pkc_app/api/srt_pi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NydF9waS8yMDE5MDcyMjE0MjQxNC1wZXJhdHVyYW4tcHVwdWstaW5kb25lc2lhLVNSVFBJMjAxNzAwMDEtMjAxNy5wbmc=');
INSERT INTO `files` VALUES (66, '20190722161304-harga_tebus_subsidi-HS20200001-2020.xls', '/Applications/MAMP/htdocs/pkc_app/upload/documents/harga_subsidi/20190722161304-harga_tebus_subsidi-HS20200001-2020.xls', '.xls', 'http://localhost:8888/pkc_app/api/harga_subsidi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2hhcmdhX3N1YnNpZGkvMjAxOTA3MjIxNjEzMDQtaGFyZ2FfdGVidXNfc3Vic2lkaS1IUzIwMjAwMDAxLTIwMjAueGxz');
INSERT INTO `files` VALUES (67, '20190723145551-laporan_harian-01-1-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190723145551-laporan_harian-01-1-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIzMTQ1NTUxLWxhcG9yYW5faGFyaWFuLTAxLTEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (68, '20190723145910-laporan_harian-02-01-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190723145910-laporan_harian-02-01-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIzMTQ1OTEwLWxhcG9yYW5faGFyaWFuLTAyLTAxLTIwMTkucG5n');
INSERT INTO `files` VALUES (69, '20190723153801-laporan_harian-02-07-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190723153801-laporan_harian-02-07-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIzMTUzODAxLWxhcG9yYW5faGFyaWFuLTAyLTA3LTIwMTkucG5n');
INSERT INTO `files` VALUES (70, '20190723155601-laporan_harian-04-07-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190723155601-laporan_harian-04-07-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIzMTU1NjAxLWxhcG9yYW5faGFyaWFuLTA0LTA3LTIwMTkucG5n');
INSERT INTO `files` VALUES (71, '20190723165615-laporan_bulanan-07-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190723165615-laporan_bulanan-07-2019.jpg', '.jpg', 'http://192.168.1.3:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcyMzE2NTYxNS1sYXBvcmFuX2J1bGFuYW4tMDctMjAxOS5qcGc=');
INSERT INTO `files` VALUES (72, '20190723165841-laporan_harian-10-07-2019.docx', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_harian/20190723165841-laporan_harian-10-07-2019.docx', '.docx', 'http://192.168.1.3:8888/pkc_app/api/laporan_harian/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5faGFyaWFuLzIwMTkwNzIzMTY1ODQxLWxhcG9yYW5faGFyaWFuLTEwLTA3LTIwMTkuZG9jeA==');
INSERT INTO `files` VALUES (73, '20190724164943-buku_pintar-02-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/buku_pintar/20190724164943-buku_pintar-02-2019.png', '.png', 'http://localhost:8888/pkc_app/api/buku_pintar/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2J1a3VfcGludGFyLzIwMTkwNzI0MTY0OTQzLWJ1a3VfcGludGFyLTAyLTIwMTkucG5n');
INSERT INTO `files` VALUES (74, '20190724172909-balansitas-31-01-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190724172909-balansitas-31-01-2019.png', '.png', 'http://localhost:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjQxNzI5MDktYmFsYW5zaXRhcy0zMS0wMS0yMDE5LnBuZw==');
INSERT INTO `files` VALUES (75, '20190724173445-balansitas-01-01-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190724173445-balansitas-01-01-2018.png', '.png', 'http://localhost:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjQxNzM0NDUtYmFsYW5zaXRhcy0wMS0wMS0yMDE4LnBuZw==');
INSERT INTO `files` VALUES (76, '20190724175649-balansitas-01-07-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190724175649-balansitas-01-07-2019.jpg', '.jpg', 'http://192.168.1.3:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjQxNzU2NDktYmFsYW5zaXRhcy0wMS0wNy0yMDE5LmpwZw==');
INSERT INTO `files` VALUES (77, '20190725152718-permendag-PERMENDAG20160003-2016.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permendag/20190725152718-permendag-PERMENDAG20160003-2016.png', '.png', 'http://localhost:8888/pkc_app/api/permendag/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbmRhZy8yMDE5MDcyNTE1MjcxOC1wZXJtZW5kYWctUEVSTUVOREFHMjAxNjAwMDMtMjAxNi5wbmc=');
INSERT INTO `files` VALUES (78, '20190725160136-peraturan-pupuk-indonesia-SRTPI20150005-2015.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/srt_pi/20190725160136-peraturan-pupuk-indonesia-SRTPI20150005-2015.png', '.png', 'http://localhost:8888/pkc_app/api/srt_pi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NydF9waS8yMDE5MDcyNTE2MDEzNi1wZXJhdHVyYW4tcHVwdWstaW5kb25lc2lhLVNSVFBJMjAxNTAwMDUtMjAxNS5wbmc=');
INSERT INTO `files` VALUES (79, '20190727103640-permentan-PERMENTAN20170003-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permentan/20190727103640-permentan-PERMENTAN20170003-2017.png', '.png', 'http://localhost:8888/pkc_app/api/permentan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbnRhbi8yMDE5MDcyNzEwMzY0MC1wZXJtZW50YW4tUEVSTUVOVEFOMjAxNzAwMDMtMjAxNy5wbmc=');
INSERT INTO `files` VALUES (80, '20190727110236-SK-PROVINSI-SKP20150003-2015.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/sk_provinsi/20190727110236-SK-PROVINSI-SKP20150003-2015.png', '.png', 'http://localhost:8888/pkc_app/api/sk_provinsi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NrX3Byb3ZpbnNpLzIwMTkwNzI3MTEwMjM2LVNLLVBST1ZJTlNJLVNLUDIwMTUwMDAzLTIwMTUucG5n');
INSERT INTO `files` VALUES (81, '20190727170713-harga_tebus_subsidi-HS20180003-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/harga_subsidi/20190727170713-harga_tebus_subsidi-HS20180003-2018.png', '.png', 'http://localhost:8888/pkc_app/api/harga_subsidi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2hhcmdhX3N1YnNpZGkvMjAxOTA3MjcxNzA3MTMtaGFyZ2FfdGVidXNfc3Vic2lkaS1IUzIwMTgwMDAzLTIwMTgucG5n');
INSERT INTO `files` VALUES (82, '20190727172043-harga_tebus_subsidi-HS20170004-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/harga_subsidi/20190727172043-harga_tebus_subsidi-HS20170004-2017.png', '.png', 'http://localhost:8888/pkc_app/api/harga_subsidi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2hhcmdhX3N1YnNpZGkvMjAxOTA3MjcxNzIwNDMtaGFyZ2FfdGVidXNfc3Vic2lkaS1IUzIwMTcwMDA0LTIwMTcucG5n');
INSERT INTO `files` VALUES (83, '20190730094900-laporan_bulanan-01-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190730094900-laporan_bulanan-01-2019.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDczMDA5NDkwMC1sYXBvcmFuX2J1bGFuYW4tMDEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (84, '20190807143932-harga_tebus_non_subsidi-2019.xlsx', '/Applications/MAMP/htdocs/pkc_app/upload/documents/harga_non_subsidi/20190807143932-harga_tebus_non_subsidi-2019.xlsx', '.xlsx', 'http://localhost:8888/pkc_app/api/harga_non_subsidi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2hhcmdhX25vbl9zdWJzaWRpLzIwMTkwODA3MTQzOTMyLWhhcmdhX3RlYnVzX25vbl9zdWJzaWRpLTIwMTkueGxzeA==');
INSERT INTO `files` VALUES (85, '20190807145429-harga_tebus_non_subsidi-2018.xls', '/Applications/MAMP/htdocs/pkc_app/upload/documents/harga_non_subsidi/20190807145429-harga_tebus_non_subsidi-2018.xls', '.xls', 'http://localhost:8888/pkc_app/api/harga_non_subsidi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2hhcmdhX25vbl9zdWJzaWRpLzIwMTkwODA3MTQ1NDI5LWhhcmdhX3RlYnVzX25vbl9zdWJzaWRpLTIwMTgueGxz');
INSERT INTO `files` VALUES (86, '20190807154836-laporan_kinerja_bulanan-04-2019.xlsx', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_kinerja_bulanan/20190807154836-laporan_kinerja_bulanan-04-2019.xlsx', '.xlsx', 'http://localhost:8888/pkc_app/api/laporan_kinerja_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fa2luZXJqYV9idWxhbmFuLzIwMTkwODA3MTU0ODM2LWxhcG9yYW5fa2luZXJqYV9idWxhbmFuLTA0LTIwMTkueGxzeA==');
COMMIT;

-- ----------------------------
-- Table structure for harga_non_subsidi
-- ----------------------------
DROP TABLE IF EXISTS `harga_non_subsidi`;
CREATE TABLE `harga_non_subsidi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `hns_year` varchar(4) NOT NULL,
  `hns_product` int(1) NOT NULL,
  `hns_date` date NOT NULL,
  `hns_number` varchar(255) NOT NULL,
  `hns_about` text NOT NULL,
  `hns_description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of harga_non_subsidi
-- ----------------------------
BEGIN;
INSERT INTO `harga_non_subsidi` VALUES (1, 82, '2019', 1, '2019-08-07', 'HNS/2019/0001', 'tes', 'tes', '2019-08-07 21:00:42', NULL, 'aeeeeeng', NULL);
INSERT INTO `harga_non_subsidi` VALUES (2, 82, '2019', 2, '2019-08-08', 'HNS/2019/0002', 'tes 1', 'tes 1', '2019-08-07 21:06:27', NULL, 'aeeeeeng', NULL);
INSERT INTO `harga_non_subsidi` VALUES (4, 84, '2019', 3, '2019-08-06', 'HNS/2019/0003', 'tes 2', 'tes 2', '2019-08-07 14:39:32', NULL, 'aeeeeeng', NULL);
INSERT INTO `harga_non_subsidi` VALUES (5, 85, '2018', 3, '2019-08-10', 'HNS/2019/0004', 'tes 3 update', 'tes 3 update', '2019-08-07 14:40:23', '2019-08-07 14:54:29', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for harga_subsidi
-- ----------------------------
DROP TABLE IF EXISTS `harga_subsidi`;
CREATE TABLE `harga_subsidi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `hs_year` varchar(5) DEFAULT NULL,
  `hs_number` varchar(255) DEFAULT NULL,
  `hs_description` varchar(255) DEFAULT NULL,
  `hs_urea` int(11) DEFAULT NULL,
  `hs_npk` int(11) DEFAULT NULL,
  `hs_organik` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of harga_subsidi
-- ----------------------------
BEGIN;
INSERT INTO `harga_subsidi` VALUES (3, 66, '2020', 'HS/2020/0001', 'TES EDIT', 7500000, 7600000, 7550000, '2019-07-22 15:59:20', '2019-07-27 17:23:12', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `harga_subsidi` VALUES (4, 81, '2018', 'HS/2018/0003', 'COBA INSERT', 25000000, 21200000, 1700000, '2019-07-27 17:07:13', NULL, 'aeeeeeng', NULL);
INSERT INTO `harga_subsidi` VALUES (5, 82, '2017', 'HS/2017/0004ok', 'UPDATE\r\n', 122350000, 16000000, 16000000, '2019-07-27 17:08:12', '2019-07-27 17:31:55', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for laporan_bulanan
-- ----------------------------
DROP TABLE IF EXISTS `laporan_bulanan`;
CREATE TABLE `laporan_bulanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `lb_year` varchar(4) NOT NULL,
  `lb_month` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_bulanan
-- ----------------------------
BEGIN;
INSERT INTO `laporan_bulanan` VALUES (28, 38, '2019', '04', '2019-07-19 08:30:17', 'aeeeeeng', '2019-07-30 09:51:10', 'admin');
INSERT INTO `laporan_bulanan` VALUES (29, 39, '2019', '05', '2019-07-19 08:32:04', 'aeeeeeng', '2019-07-23 16:13:38', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (30, 40, '2019', '06', '2019-07-19 08:33:17', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (31, 41, '2018', '01', '2019-07-19 08:35:06', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (32, 42, '2019', '07', '2019-07-19 09:27:32', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (33, 43, '2019', '12', '2019-07-19 09:28:05', 'aeeeeeng', '2019-07-21 08:17:35', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (34, 44, '2019', '02', '2019-07-19 09:28:23', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (35, 45, '2019', '03', '2019-07-19 09:28:53', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (36, 46, '2019', '08', '2019-07-19 09:29:15', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (37, 47, '2019', '09', '2019-07-19 09:29:29', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (38, 48, '2019', '10', '2019-07-19 09:29:41', 'aeeeeeng', '2019-07-19 09:36:09', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (39, 49, '2019', '11', '2019-07-19 09:29:57', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (40, 50, '2019', '01', '2019-07-19 09:30:13', 'aeeeeeng', '2019-07-21 08:17:22', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (41, 56, '2017', '01', '2019-07-20 19:23:57', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (42, 71, '2019', '07', '2019-07-23 16:56:15', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (43, 83, '2019', '01', '2019-07-30 09:49:00', 'admin', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for laporan_harian
-- ----------------------------
DROP TABLE IF EXISTS `laporan_harian`;
CREATE TABLE `laporan_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `lh_year` varchar(5) DEFAULT NULL,
  `lh_month` varchar(2) DEFAULT NULL,
  `lh_day` varchar(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_harian
-- ----------------------------
BEGIN;
INSERT INTO `laporan_harian` VALUES (1, 41, '2019', '07', '01', '2019-07-20 16:04:55', '2019-07-23 16:50:04', 'aeeeeng', 'aeeeeeng');
INSERT INTO `laporan_harian` VALUES (3, 52, '2019', '07', '03', '2019-07-20 09:28:55', '2019-07-20 09:44:37', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `laporan_harian` VALUES (5, 68, '2019', '01', '02', '2019-07-23 14:59:10', NULL, 'aeeeeeng', NULL);
INSERT INTO `laporan_harian` VALUES (6, 69, '2019', '07', '02', '2019-07-23 15:38:01', '2019-07-23 15:59:45', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `laporan_harian` VALUES (8, 72, '2019', '07', '10', '2019-07-23 16:58:41', NULL, 'aeeeeeng', NULL);
COMMIT;

-- ----------------------------
-- Table structure for laporan_kinerja_bulanan
-- ----------------------------
DROP TABLE IF EXISTS `laporan_kinerja_bulanan`;
CREATE TABLE `laporan_kinerja_bulanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `lkb_year` varchar(4) NOT NULL,
  `lkb_month` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_kinerja_bulanan
-- ----------------------------
BEGIN;
INSERT INTO `laporan_kinerja_bulanan` VALUES (1, 83, '2019', '01', '2019-08-07 22:16:26', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_kinerja_bulanan` VALUES (2, 83, '2019', '02', '2019-08-07 22:19:47', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_kinerja_bulanan` VALUES (3, 83, '2019', '03', '2019-08-07 22:20:02', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_kinerja_bulanan` VALUES (5, 86, '2019', '04', '2019-08-07 15:33:10', 'aeeeeeng', '2019-08-07 15:48:36', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for permendag
-- ----------------------------
DROP TABLE IF EXISTS `permendag`;
CREATE TABLE `permendag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `permendag_year` varchar(5) DEFAULT NULL,
  `permendag_number` varchar(255) DEFAULT NULL,
  `permendag_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permendag
-- ----------------------------
BEGIN;
INSERT INTO `permendag` VALUES (1, 59, '2019', 'PERMENDAG/2019/0001', 'Permendag Pertama', '2019-07-21 18:40:09', NULL, 'aeeeeeng', NULL);
INSERT INTO `permendag` VALUES (3, 60, '2018', 'PERMENDAG/2018/0001', 'nyoba update coy', '2019-07-21 12:02:50', '2019-07-21 12:16:08', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for permentan
-- ----------------------------
DROP TABLE IF EXISTS `permentan`;
CREATE TABLE `permentan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `permentan_number` varchar(255) DEFAULT NULL,
  `permentan_year` varchar(255) DEFAULT NULL,
  `permentan_description` varchar(255) DEFAULT NULL,
  `permentan_total_urea` float DEFAULT NULL,
  `permentan_total_npk` float DEFAULT NULL,
  `permentan_total_organik` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permentan
-- ----------------------------
BEGIN;
INSERT INTO `permentan` VALUES (1, 57, 'PERMENTAN-0001', '2019', 'ini permentan pertama', 0.1, 2.8, 9.3, '2019-07-21 15:28:46', NULL, 'aeeeeeng', NULL);
INSERT INTO `permentan` VALUES (4, 59, 'PERMENTAN/2019/0001', '2019', 'coba saja', 7, 7, 7, '2019-07-21 09:12:24', '2019-07-21 09:47:21', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for sk_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `sk_provinsi`;
CREATE TABLE `sk_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `sp_number` varchar(255) DEFAULT NULL,
  `sp_year` varchar(5) DEFAULT NULL,
  `sp_region` varchar(255) DEFAULT NULL,
  `sp_total_urea` float DEFAULT NULL,
  `sp_total_npk` float DEFAULT NULL,
  `sp_total_organik` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_provinsi
-- ----------------------------
BEGIN;
INSERT INTO `sk_provinsi` VALUES (1, 60, 'SKP/2019/0001', '2019', 'JAWA TIMUR', 1.1, 2.3, 7.9, '2019-07-21 21:08:22', NULL, 'aeeeeeng', NULL);
INSERT INTO `sk_provinsi` VALUES (3, 61, 'SKP/2017/0002', '2017', 'NUSA TENGGARA BARAT', 7.1, 7.2, 7.3, '2019-07-21 15:36:37', '2019-07-21 15:50:29', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for srt_pi
-- ----------------------------
DROP TABLE IF EXISTS `srt_pi`;
CREATE TABLE `srt_pi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `sp_number` varchar(255) DEFAULT NULL,
  `sp_year` varchar(5) DEFAULT NULL,
  `sp_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of srt_pi
-- ----------------------------
BEGIN;
INSERT INTO `srt_pi` VALUES (1, 60, 'SRTPI/2019/0001', '2019', 'FIRST', '2019-07-22 10:14:42', NULL, 'aeeeeeng', NULL);
INSERT INTO `srt_pi` VALUES (2, 62, 'SRTPI/2018/0002', '2018', 'TES INSERT', '2019-07-22 13:44:31', NULL, 'aeeeeeng', NULL);
INSERT INTO `srt_pi` VALUES (3, 63, 'SRTPI/2018/0002', '2018', 'TES INSERT', '2019-07-22 14:11:19', NULL, 'aeeeeeng', NULL);
INSERT INTO `srt_pi` VALUES (4, 64, 'SRTPI/2017/0001', '2017', 'TES UPDATE', '2019-07-22 14:16:03', '2019-07-22 14:24:14', 'aeeeeeng', 'aeeeeeng');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `access` varchar(255) NOT NULL DEFAULT 'client',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (29, 'aeeeeeng', '8da5927f46a9910d958ac54444fa171a', 'aeeeeeng@gmail.com', 'syahril', 'ardi', 'Syahril Ardi', '2019-07-19 02:30:30', '2019-07-30 09:51:32', 'admin', NULL, 'admin');
INSERT INTO `users` VALUES (30, 'afendi', '76cf4079ac1b10a3f8c77ca4bd161b29', 'afendi@gmail.com', 'afendi', NULL, 'afendi ', '2019-07-19 02:30:57', NULL, 'client', NULL, NULL);
INSERT INTO `users` VALUES (31, 'aengganteng', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'aaaa@a.a', 'aaaaaa', NULL, 'aaaaaa ', '2019-07-21 16:01:57', NULL, 'client', NULL, NULL);
INSERT INTO `users` VALUES (32, 'yokoyoko', 'dcdf8fa61ccb836f936f89a2b60077bc', 'yokoyoko@yokoyoko.com', 'yoko', NULL, 'yoko ', '2019-07-25 16:50:34', NULL, 'admin', NULL, NULL);
INSERT INTO `users` VALUES (33, 'tes', '08e789053de980e0f1ac70a61125a17d', 'tes@tes.com', 'tes', 'saleho', 'tes tes', '2019-07-27 09:10:15', '2019-07-27 09:34:04', 'admin', NULL, 'aeeeeeng');
INSERT INTO `users` VALUES (34, 'tesnew', '80c5de8840035b67765172a16d7b5e0e', 'tesnew@tes.com', 'tes', 'new', 'tes new', '2019-07-27 09:34:50', '2019-07-27 09:36:46', 'admin', NULL, 'aeeeeeng');
INSERT INTO `users` VALUES (35, 'createoke', 'c33796fa8a22a25126d23f64adac71ba', 'create@oke.com', 'create', 'oke', 'create oke', '2019-07-27 09:37:16', NULL, 'client', NULL, NULL);
INSERT INTO `users` VALUES (36, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'aku', 'admin', 'aku admin', '2019-07-29 13:34:18', '2019-07-29 13:35:08', 'admin', NULL, 'admin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
