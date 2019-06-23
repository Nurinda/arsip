/*
 Navicat Premium Data Transfer

 Source Server         : Prototype
 Source Server Type    : MySQL
 Source Server Version : 100203
 Source Host           : localhost:3306
 Source Schema         : arsip

 Target Server Type    : MySQL
 Target Server Version : 100203
 File Encoding         : 65001

 Date: 23/06/2019 19:59:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fullname` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `display_picture` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES (1, 'nurin', '4a7d1ed414474e4033ac29ccb8653d9b', 'nurindarm@gmaill.com', 'Nurinda Ramadhanty Maula', 'display_picture_1.jpg', 'admin');
INSERT INTO `account` VALUES (8, 'windi', '4a7d1ed414474e4033ac29ccb8653d9b', 'Windi@gmail.com', 'Windi Putri Nur Aini', 'no.jpg', 'contributor');
INSERT INTO `account` VALUES (10, 'AAS', '4a7d1ed414474e4033ac29ccb8653d9b', NULL, 'AASS', 'no.jpg', 'contributor');

-- ----------------------------
-- Table structure for archive
-- ----------------------------
DROP TABLE IF EXISTS `archive`;
CREATE TABLE `archive`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `producer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `production_date` date NULL DEFAULT NULL,
  `production_place` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `duration_hour` int(11) NULL DEFAULT NULL,
  `duration_minute` int(11) NULL DEFAULT NULL,
  `duration_second` int(11) NULL DEFAULT NULL,
  `filetype` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `storage` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `entry_date` timestamp(0) NULL DEFAULT current_timestamp(0),
  `id_contributor` int(11) NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category` int(11) NULL DEFAULT NULL,
  `sub_category` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of archive
-- ----------------------------
INSERT INTO `archive` VALUES (1, 'Acara Datangnya Presiden ke Banyumanik', 'Kunjungan Kerja Gubernur Jateng DI Pembantu Gub wil Pati, Pekalongan, Kedu, Surakarta, Semarang', 'Bakohumas Setwida Jateng', 'Setwida Jateng', '2019-05-15', 'Banyumanik', 1, 30, 28, 'SHV', 'lemari', '2019-05-28 15:19:18', 8, 0, 'oFwsgSFFSPc', 'SBR 23', 0, 12);
INSERT INTO `archive` VALUES (2, 'Coba', 'Percobaan', 'Coba', 'Sony Pictures', '2019-02-02', 'Semarang', 10, 10, 2, NULL, 'Semarang', '2019-06-23 15:22:41', 8, NULL, 'kbFjyHhpFqU', '299', 0, 50);
INSERT INTO `archive` VALUES (3, 'Coba', 'Percobaan', 'Coba', 'Sony Pictures', '2019-02-02', 'Semarang', 10, 10, 2, NULL, 'Semarang', '2019-06-23 15:25:08', 8, NULL, 'kbFjyHhpFqU', '299', 0, 50);
INSERT INTO `archive` VALUES (5, 'coba', 'niwni', 'ninini', 'idwih', '2019-12-12', 'ninini', 12, 12, 2, NULL, 'SVS', '2019-06-23 16:02:23', 10, NULL, 'oFwsgSFFSPc', '299', 0, 40);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `info` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (0, 'UMUMS', NULL);
INSERT INTO `category` VALUES (12, 'Coba Kategori', NULL);
INSERT INTO `category` VALUES (100, 'PEMERINTAHAN', NULL);
INSERT INTO `category` VALUES (200, 'POLITIK', NULL);
INSERT INTO `category` VALUES (300, 'KEAMANAN DAN KETERTIBAN UMUM', NULL);
INSERT INTO `category` VALUES (400, 'KESEJAHTERAAN RAKYAT', NULL);
INSERT INTO `category` VALUES (500, 'PEREKONOMIAN', NULL);
INSERT INTO `category` VALUES (600, 'PEKERJAAN UMUM DAN KETENAGAAN', NULL);
INSERT INTO `category` VALUES (700, 'PENGAWASAN', NULL);
INSERT INTO `category` VALUES (800, 'KEPEGAWAIAN', NULL);
INSERT INTO `category` VALUES (900, 'KEUANGAN', NULL);

-- ----------------------------
-- Table structure for contributor
-- ----------------------------
DROP TABLE IF EXISTS `contributor`;
CREATE TABLE `contributor`  (
  `id` int(11) NOT NULL,
  `institute` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `capacity` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contributor
-- ----------------------------
INSERT INTO `contributor` VALUES (8, 'ArpusdaS', 'Semarang', 10);
INSERT INTO `contributor` VALUES (10, 'ASC', NULL, 100);

-- ----------------------------
-- Table structure for sub_category
-- ----------------------------
DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category`  (
  `id` int(11) NOT NULL,
  `sub_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_category` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_category
-- ----------------------------
INSERT INTO `sub_category` VALUES (20, 'BARANG DAN JASA', 0);
INSERT INTO `sub_category` VALUES (22, 'Coba', 0);
INSERT INTO `sub_category` VALUES (30, 'KEKAYAAN DAERAH', 0);
INSERT INTO `sub_category` VALUES (40, 'PERPUSTAKAAN/DOKUMEN/KEARSIPAN/SANDI', 0);
INSERT INTO `sub_category` VALUES (50, 'PERENCANAAN DAN EVALUASI', 0);
INSERT INTO `sub_category` VALUES (60, 'ORGANISASI/KETATALAKSANAAN', 0);
INSERT INTO `sub_category` VALUES (70, 'PENELITIAN DAN PENGEMBANGAN', 0);
INSERT INTO `sub_category` VALUES (80, 'KONPERENSI/RAPAT KOORDINASI', 0);
INSERT INTO `sub_category` VALUES (90, 'PERJALANAN DINAS', 0);
INSERT INTO `sub_category` VALUES (110, 'PEMERINTAHAN PUSAT', 100);
INSERT INTO `sub_category` VALUES (120, 'PEMERINTAHAN PROVINSI', 100);
INSERT INTO `sub_category` VALUES (130, 'PEMERINTAHAN KABUPATEN/KOTA', 100);
INSERT INTO `sub_category` VALUES (140, 'PEMERINTAHAN DESA/KELURAHAN', 100);
INSERT INTO `sub_category` VALUES (150, 'LEGISLATIF MPR/DPR/DPD', 100);
INSERT INTO `sub_category` VALUES (160, 'DPRD PROVINSI', 100);
INSERT INTO `sub_category` VALUES (170, 'DPRD KABUPATEN/KOTA', 100);
INSERT INTO `sub_category` VALUES (180, 'HUKUM', 100);
INSERT INTO `sub_category` VALUES (190, 'HUBUNGAN LUAR NEGERI', 100);
INSERT INTO `sub_category` VALUES (210, 'KEPARTAIAN', 200);
INSERT INTO `sub_category` VALUES (220, 'ORGANISASI KEMASYARAKATAN', 200);
INSERT INTO `sub_category` VALUES (230, 'ORGANISASI PROFESI DAN FUNGSONAL', 200);
INSERT INTO `sub_category` VALUES (240, 'ORGANISASI PEMUDA', 200);
INSERT INTO `sub_category` VALUES (250, 'ORGANISASI BURUH, TANI, DAN NELAYAN', 200);
INSERT INTO `sub_category` VALUES (260, 'ORGANISASI WANITA', 200);
INSERT INTO `sub_category` VALUES (270, 'PEMILU, PILKADA', 200);
INSERT INTO `sub_category` VALUES (280, 'PENGAWASAN PEMILU/PILKADA', 200);
INSERT INTO `sub_category` VALUES (310, 'PERTAHANAN', 300);
INSERT INTO `sub_category` VALUES (320, 'KEMILITERAN/TNI', 300);
INSERT INTO `sub_category` VALUES (330, 'KEAMANAN', 300);
INSERT INTO `sub_category` VALUES (340, 'PERLINDUNGAN MASYARAKAT', 300);
INSERT INTO `sub_category` VALUES (350, 'KEJAHATAN', 300);
INSERT INTO `sub_category` VALUES (360, 'BENCANA', 300);
INSERT INTO `sub_category` VALUES (370, 'KECELAKAAN', 300);
INSERT INTO `sub_category` VALUES (380, 'PENDAMPINGAN. REHABILITASI DAN REKONSTRUKSI', 300);
INSERT INTO `sub_category` VALUES (390, 'KERJASAMA BPBD DENGAN INSTANSI LAIN', 300);

-- ----------------------------
-- Table structure for webconf
-- ----------------------------
DROP TABLE IF EXISTS `webconf`;
CREATE TABLE `webconf`  (
  `id` int(1) NOT NULL,
  `host` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `crypto` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `port` int(4) NULL DEFAULT NULL,
  `login_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of webconf
-- ----------------------------
INSERT INTO `webconf` VALUES (1, 'smtp.office365.com', 'admin@sipmaft.com', 'sipmaFT@2019', 'tls', 587, 'login_bg.JPG');

-- ----------------------------
-- View structure for view_archive
-- ----------------------------
DROP VIEW IF EXISTS `view_archive`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_archive` AS SELECT
	a.id,
	a.title,
	a.description,
	a.producer,
	a.copyright,
	a.production_date,
	a.production_place,
	a.duration_hour,
	a.duration_minute,
	a.duration_second,
	a.filetype,
	a.`storage`,
	a.entry_date,
	a.id_contributor,
	a.`status`,
	a.link,
	a.video_number,
	b.fullname as 'contributor',
	b.id AS 'id_pic',
	c.institute,
	c.capacity,
	c.address 
FROM
	archive AS a,
	account AS b,
	contributor AS c 
WHERE
	a.id_contributor = b.id 
AND 
  a.id_contributor = c.id ;

-- ----------------------------
-- View structure for view_category
-- ----------------------------
DROP VIEW IF EXISTS `view_category`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_category` AS SELECT
	a.id,
	a.category,
	a.info,
	count( b.id ) as sub_count
FROM
	`category` AS a
	LEFT JOIN `sub_category` AS b ON a.id = b.id_category 
GROUP BY
	a.id
ORDER BY
	a.id ASC ;

-- ----------------------------
-- View structure for view_contributor
-- ----------------------------
DROP VIEW IF EXISTS `view_contributor`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_contributor` AS SELECT
	a.id,
	a.username,
	a.`password`,
	a.fullname,
	a.email,
	a.role,
	a.display_picture,
	c.institute,
	c.address,
	c.capacity,
	count(b.id) as storage_used,
	(c.capacity - count(b.id)) as storage_available
FROM
	`account` AS a
	LEFT JOIN `archive` AS b ON a.id = b.id_contributor
	INNER JOIN `contributor` AS c ON c.id = a.id
GROUP BY a.id ;

SET FOREIGN_KEY_CHECKS = 1;
