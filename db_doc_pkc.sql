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

 Date: 21/07/2019 22:58:17
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of balansitas
-- ----------------------------
BEGIN;
INSERT INTO `balansitas` VALUES (2, 56, '2019', '07', '02', '2019-07-21 14:05:53', NULL, 'aeeeeeng', NULL);
INSERT INTO `balansitas` VALUES (3, 57, '2019', '07', '06', '2019-07-21 08:03:51', '2019-07-21 08:22:45', 'aeeeeeng', 'aeeeeeng');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of buku_pintar
-- ----------------------------
BEGIN;
INSERT INTO `buku_pintar` VALUES (3, NULL, NULL, NULL, '2019-07-20 19:07:36', NULL, 'aeeeeeng', NULL);
INSERT INTO `buku_pintar` VALUES (4, 54, '2019', '02', '2019-07-20 19:08:47', '2019-07-20 19:20:03', 'aeeeeeng', 'aeeeeeng');
INSERT INTO `buku_pintar` VALUES (5, 55, '2019', '03', '2019-07-20 19:09:10', '2019-07-21 08:16:30', 'aeeeeeng', 'aeeeeeng');
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

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
INSERT INTO `files` VALUES (56, '20190720192357-laporan_bulanan-1-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/laporan_bulanan/20190720192357-laporan_bulanan-1-2017.png', '.png', 'http://localhost:8888/pkc_app/api/laporan_bulanan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2xhcG9yYW5fYnVsYW5hbi8yMDE5MDcyMDE5MjM1Ny1sYXBvcmFuX2J1bGFuYW4tMS0yMDE3LnBuZw==');
INSERT INTO `files` VALUES (57, '20190721082225-balansitas-05-07-2019.jpg', '/Applications/MAMP/htdocs/pkc_app/upload/documents/balansitas/20190721082225-balansitas-05-07-2019.jpg', '.jpg', 'http://localhost:8888/pkc_app/api/balansitas/download?path=Li91cGxvYWQvZG9jdW1lbnRzL2JhbGFuc2l0YXMvMjAxOTA3MjEwODIyMjUtYmFsYW5zaXRhcy0wNS0wNy0yMDE5LmpwZw==');
INSERT INTO `files` VALUES (58, '20190721091107-permentan-PERMENTAN20190001-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permentan/20190721091107-permentan-PERMENTAN20190001-2019.png', '.png', 'http://localhost:8888/pkc_app/api/permentan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbnRhbi8yMDE5MDcyMTA5MTEwNy1wZXJtZW50YW4tUEVSTUVOVEFOMjAxOTAwMDEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (59, '20190721094721-permentan-PERMENTAN20190001-2019.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permentan/20190721094721-permentan-PERMENTAN20190001-2019.png', '.png', 'http://localhost:8888/pkc_app/api/permentan/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbnRhbi8yMDE5MDcyMTA5NDcyMS1wZXJtZW50YW4tUEVSTUVOVEFOMjAxOTAwMDEtMjAxOS5wbmc=');
INSERT INTO `files` VALUES (60, '20190721121608-permendag-PERMENDAG20180001-2018.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/permendag/20190721121608-permendag-PERMENDAG20180001-2018.png', '.png', 'http://localhost:8888/pkc_app/api/permendag/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3Blcm1lbmRhZy8yMDE5MDcyMTEyMTYwOC1wZXJtZW5kYWctUEVSTUVOREFHMjAxODAwMDEtMjAxOC5wbmc=');
INSERT INTO `files` VALUES (61, '20190721155029-SK-PROVINSI-SKP20170002-2017.png', '/Applications/MAMP/htdocs/pkc_app/upload/documents/sk_provinsi/20190721155029-SK-PROVINSI-SKP20170002-2017.png', '.png', 'http://localhost:8888/pkc_app/api/sk_provinsi/download?path=Li91cGxvYWQvZG9jdW1lbnRzL3NrX3Byb3ZpbnNpLzIwMTkwNzIxMTU1MDI5LVNLLVBST1ZJTlNJLVNLUDIwMTcwMDAyLTIwMTcucG5n');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_bulanan
-- ----------------------------
BEGIN;
INSERT INTO `laporan_bulanan` VALUES (28, 38, '2019', '4', '2019-07-19 08:30:17', 'aeeeeeng', '2019-07-21 14:34:26', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (29, 39, '2019', '5', '2019-07-19 08:32:04', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (30, 40, '2019', '6', '2019-07-19 08:33:17', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (31, 41, '2018', '1', '2019-07-19 08:35:06', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (32, 42, '2019', '7', '2019-07-19 09:27:32', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (33, 43, '2019', '12', '2019-07-19 09:28:05', 'aeeeeeng', '2019-07-21 08:17:35', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (34, 44, '2019', '2', '2019-07-19 09:28:23', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (35, 45, '2019', '3', '2019-07-19 09:28:53', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (36, 46, '2019', '8', '2019-07-19 09:29:15', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (37, 47, '2019', '9', '2019-07-19 09:29:29', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (38, 48, '2019', '10', '2019-07-19 09:29:41', 'aeeeeeng', '2019-07-19 09:36:09', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (39, 49, '2019', '11', '2019-07-19 09:29:57', 'aeeeeeng', NULL, NULL);
INSERT INTO `laporan_bulanan` VALUES (40, 50, '2019', '1', '2019-07-19 09:30:13', 'aeeeeeng', '2019-07-21 08:17:22', 'aeeeeeng');
INSERT INTO `laporan_bulanan` VALUES (41, 56, '2017', '1', '2019-07-20 19:23:57', 'aeeeeeng', NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laporan_harian
-- ----------------------------
BEGIN;
INSERT INTO `laporan_harian` VALUES (1, 41, '2019', '07', '01', '2019-07-20 16:04:55', NULL, 'aeeeeng', NULL);
INSERT INTO `laporan_harian` VALUES (3, 52, '2019', '07', '03', '2019-07-20 09:28:55', '2019-07-20 09:44:37', 'aeeeeeng', 'aeeeeeng');
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
