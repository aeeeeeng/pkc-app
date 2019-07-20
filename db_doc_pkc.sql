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

 Date: 20/07/2019 14:36:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_bulanan
-- ----------------------------
BEGIN;
INSERT INTO `laporan_bulanan` VALUES (28, 38, '2019', '4', '2019-07-19 08:30:17', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (29, 39, '2019', '5', '2019-07-19 08:32:04', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (30, 40, '2019', '6', '2019-07-19 08:33:17', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (31, 41, '2018', '1', '2019-07-19 08:35:06', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (32, 42, '2019', '7', '2019-07-19 09:27:32', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (33, 43, '2019', '1', '2019-07-19 09:28:05', 'aeeeeeng', '2019-07-19 09:36:06', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (34, 44, '2019', '2', '2019-07-19 09:28:23', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (35, 45, '2019', '3', '2019-07-19 09:28:53', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (36, 46, '2019', '8', '2019-07-19 09:29:15', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (37, 47, '2019', '9', '2019-07-19 09:29:29', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (38, 48, '2019', '10', '2019-07-19 09:29:41', 'aeeeeeng', '2019-07-19 09:36:09', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (39, 49, '2019', '11', '2019-07-19 09:29:57', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (40, 50, '2019', '12', '2019-07-19 09:30:13', 'aeeeeeng', NULL, NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (29, 'aeeeeeng', '8da5927f46a9910d958ac54444fa171a', 'aeeeeeng@gmail.com', 'Syahril', 'Ardi', 'Syahril Ardi', '2019-07-19 02:30:30', NULL, 'admin');
INSERT INTO `users` VALUES (30, 'afendi', '76cf4079ac1b10a3f8c77ca4bd161b29', 'afendi@gmail.com', 'afendi', NULL, 'afendi ', '2019-07-19 02:30:57', NULL, 'client');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
