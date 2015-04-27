/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : esatker_1
Target Host     : localhost:3306
Target Database : esatker_1
Date: 4/27/2015 11:38:31 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for akomodasi_perjalanan
-- ----------------------------
DROP TABLE IF EXISTS `akomodasi_perjalanan`;
CREATE TABLE `akomodasi_perjalanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_perjalanan` varchar(25) NOT NULL,
  `kode_provinsi` varchar(25) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `biaya_perjalanan_pns` varchar(20) NOT NULL,
  `biaya_perjalanan_s1_lk` varchar(20) NOT NULL,
  `biaya_perjalanan_d3_lk` varchar(20) NOT NULL,
  `biaya_perjalanan_smu_lk` varchar(20) NOT NULL,
  `biaya_perjalanan_dk` varchar(20) NOT NULL,
  `biaya_diklat` varchar(20) NOT NULL,
  `biaya_taksi` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of akomodasi_perjalanan
-- ----------------------------

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES ('1', '521211', 'Belanja Bahan');
INSERT INTO `akun` VALUES ('2', '521213', 'Honor output kegiatan');
INSERT INTO `akun` VALUES ('3', '521219', 'Belanja Barang Non Operas');
INSERT INTO `akun` VALUES ('4', '521811', 'Belanja Barang Untuk Pers');
INSERT INTO `akun` VALUES ('5', '522141', 'Belanja Sewa');
INSERT INTO `akun` VALUES ('6', '522151', 'Belanja Jasa Profesi');
INSERT INTO `akun` VALUES ('7', '524111', 'Belanja Perjalanan Biasa');

-- ----------------------------
-- Table structure for anggaran
-- ----------------------------
DROP TABLE IF EXISTS `anggaran`;
CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(25) NOT NULL,
  `id_akun` varchar(50) NOT NULL,
  `pagu` varchar(100) NOT NULL,
  `tahun_anggaran` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of anggaran
-- ----------------------------
INSERT INTO `anggaran` VALUES ('2', '1', '1', '4000000', '2015');

-- ----------------------------
-- Table structure for approval
-- ----------------------------
DROP TABLE IF EXISTS `approval`;
CREATE TABLE `approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(25) NOT NULL,
  `kode_jabatan` varchar(25) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of approval
-- ----------------------------

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `pagu_harga` varchar(20) NOT NULL,
  `kode_jenis_barang` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'KOM001', 'Monitor LCD (Toshiba)', 'pcs', '1500000', 'Bahan Komputer');

-- ----------------------------
-- Table structure for biaya_akomodasi
-- ----------------------------
DROP TABLE IF EXISTS `biaya_akomodasi`;
CREATE TABLE `biaya_akomodasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(25) DEFAULT NULL,
  `status_pegawai` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_akomodasi
-- ----------------------------
INSERT INTO `biaya_akomodasi` VALUES ('1', 'ACEH', 'PNS', '360000');
INSERT INTO `biaya_akomodasi` VALUES ('2', 'SUMATERA UTARA', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('3', 'RIAU', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('4', 'KEPULAUAN RIAU', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('5', 'JAMBI', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('6', 'SUMATERA BARAT', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('7', 'SUMATERA SELATAN', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('8', 'LAMPUNG', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('9', 'BENGKULU', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('10', 'BANGKA BELITUNG', 'PNS', '410000');
INSERT INTO `biaya_akomodasi` VALUES ('11', 'BANTEN', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('12', 'JAWA BARAT', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('13', 'D.K.I   JAKARTA', 'PNS', '530000');
INSERT INTO `biaya_akomodasi` VALUES ('14', 'JAWA TENGAH', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('15', 'D.I.  YOGYAKARTA', 'PNS', '420000');
INSERT INTO `biaya_akomodasi` VALUES ('16', 'JAWA TIMUR', 'PNS', '410000');
INSERT INTO `biaya_akomodasi` VALUES ('17', 'B A L I', 'PNS', '480000');
INSERT INTO `biaya_akomodasi` VALUES ('18', 'NUSA TENGGARA BARAT', 'PNS', '440000');
INSERT INTO `biaya_akomodasi` VALUES ('19', 'NUSA TENGGARA TIMUR', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('20', 'KALIMANTAN BARAT', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('21', 'KALIMANTAN TENGAH', 'PNS', '360000');
INSERT INTO `biaya_akomodasi` VALUES ('22', 'KALIMANTAN SELATAN', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('23', 'KALIMANTAN TIMUR', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('24', 'KALIMANTAN UTARA ', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('25', 'SULAWESI UTARA', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('26', 'GORONTALO', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('27', 'SULAWESI BARAT', 'PNS', '410000');
INSERT INTO `biaya_akomodasi` VALUES ('28', 'SULAWESI SELATAN', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('29', 'SULAWESI TENGAH', 'PNS', '370000');
INSERT INTO `biaya_akomodasi` VALUES ('30', 'SULAWESI TENGGARA', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('31', 'MALUKU', 'PNS', '380000');
INSERT INTO `biaya_akomodasi` VALUES ('32', 'MALUKU UTARA', 'PNS', '430000');
INSERT INTO `biaya_akomodasi` VALUES ('33', 'PAPUA', 'PNS', '580000');
INSERT INTO `biaya_akomodasi` VALUES ('34', 'PAPUA BARAT', 'PNS', '480000');
INSERT INTO `biaya_akomodasi` VALUES ('35', 'ACEH', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('36', 'SUMATERA UTARA', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('37', 'RIAU', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('38', 'KEPULAUAN RIAU', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('39', 'JAMBI', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('40', 'SUMATERA BARAT', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('41', 'SUMATERA SELATAN', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('42', 'LAMPUNG', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('43', 'BENGKULU', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('44', 'BANGKA BELITUNG', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('45', 'BANTEN', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('46', 'JAWA BARAT', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('47', 'D.K.I   JAKARTA', 'Non PNS (S1)', '300000');
INSERT INTO `biaya_akomodasi` VALUES ('48', 'JAWA TENGAH', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('49', 'D.I.  YOGYAKARTA', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('50', 'JAWA TIMUR', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('51', 'B A L I', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('52', 'NUSA TENGGARA BARAT', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('53', 'NUSA TENGGARA TIMUR', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('54', 'KALIMANTAN BARAT', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('55', 'KALIMANTAN TENGAH', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('56', 'KALIMANTAN SELATAN', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('57', 'KALIMANTAN TIMUR', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('58', 'KALIMANTAN UTARA ', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('59', 'SULAWESI UTARA', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('60', 'GORONTALO', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('61', 'SULAWESI BARAT', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('62', 'SULAWESI SELATAN', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('63', 'SULAWESI TENGAH', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('64', 'SULAWESI TENGGARA', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('65', 'MALUKU', 'Non PNS (S1)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('66', 'MALUKU UTARA', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('67', 'PAPUA', 'Non PNS (S1)', '300000');
INSERT INTO `biaya_akomodasi` VALUES ('68', 'PAPUA BARAT', 'Non PNS (S1)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('69', 'ACEH', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('70', 'SUMATERA UTARA', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('71', 'RIAU', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('72', 'KEPULAUAN RIAU', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('73', 'JAMBI', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('74', 'SUMATERA BARAT', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('75', 'SUMATERA SELATAN', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('76', 'LAMPUNG', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('77', 'BENGKULU', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('78', 'BANGKA BELITUNG', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('79', 'BANTEN', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('80', 'JAWA BARAT', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('81', 'D.K.I   JAKARTA', 'Non PNS (D3)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('82', 'JAWA TENGAH', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('83', 'D.I.  YOGYAKARTA', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('84', 'JAWA TIMUR', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('85', 'B A L I', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('86', 'NUSA TENGGARA BARAT', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('87', 'NUSA TENGGARA TIMUR', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('88', 'KALIMANTAN BARAT', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('89', 'KALIMANTAN TENGAH', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('90', 'KALIMANTAN SELATAN', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('91', 'KALIMANTAN TIMUR', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('92', 'KALIMANTAN UTARA ', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('93', 'SULAWESI UTARA', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('94', 'GORONTALO', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('95', 'SULAWESI BARAT', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('96', 'SULAWESI SELATAN', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('97', 'SULAWESI TENGAH', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('98', 'SULAWESI TENGGARA', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('99', 'MALUKU', 'Non PNS (D3)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('100', 'MALUKU UTARA', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('101', 'PAPUA', 'Non PNS (D3)', '275000');
INSERT INTO `biaya_akomodasi` VALUES ('102', 'PAPUA BARAT', 'Non PNS (D3)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('103', 'ACEH', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('104', 'SUMATERA UTARA', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('105', 'RIAU', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('106', 'KEPULAUAN RIAU', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('107', 'JAMBI', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('108', 'SUMATERA BARAT', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('109', 'SUMATERA SELATAN', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('110', 'LAMPUNG', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('111', 'BENGKULU', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('112', 'BANGKA BELITUNG', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('113', 'BANTEN', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('114', 'JAWA BARAT', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('115', 'D.K.I   JAKARTA', 'Non PNS (SMU)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('116', 'JAWA TENGAH', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('117', 'D.I.  YOGYAKARTA', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('118', 'JAWA TIMUR', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('119', 'B A L I', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('120', 'NUSA TENGGARA BARAT', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('121', 'NUSA TENGGARA TIMUR', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('122', 'KALIMANTAN BARAT', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('123', 'KALIMANTAN TENGAH', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('124', 'KALIMANTAN SELATAN', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('125', 'KALIMANTAN TIMUR', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('126', 'KALIMANTAN UTARA ', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('127', 'SULAWESI UTARA', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('128', 'GORONTALO', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('129', 'SULAWESI BARAT', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('130', 'SULAWESI SELATAN', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('131', 'SULAWESI TENGAH', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('132', 'SULAWESI TENGGARA', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('133', 'MALUKU', 'Non PNS (SMU)', '200000');
INSERT INTO `biaya_akomodasi` VALUES ('134', 'MALUKU UTARA', 'Non PNS (SMU)', '225000');
INSERT INTO `biaya_akomodasi` VALUES ('135', 'PAPUA', 'Non PNS (SMU)', '250000');
INSERT INTO `biaya_akomodasi` VALUES ('136', 'PAPUA BARAT', 'Non PNS (SMU)', '225000');

-- ----------------------------
-- Table structure for biaya_penginapan
-- ----------------------------
DROP TABLE IF EXISTS `biaya_penginapan`;
CREATE TABLE `biaya_penginapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(25) NOT NULL,
  `golongan` varchar(25) DEFAULT NULL,
  `biaya` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_penginapan
-- ----------------------------
INSERT INTO `biaya_penginapan` VALUES ('1', 'ACEH', 'IV', '1080000');
INSERT INTO `biaya_penginapan` VALUES ('2', 'SUMATERA UTARA', 'IV', '703000');
INSERT INTO `biaya_penginapan` VALUES ('3', 'RIAU', 'IV', '868000');
INSERT INTO `biaya_penginapan` VALUES ('4', 'KEPULAUAN RIAU', 'IV', '650000');
INSERT INTO `biaya_penginapan` VALUES ('5', 'JAMBI', 'IV', '697000');
INSERT INTO `biaya_penginapan` VALUES ('6', 'SUMATERA BARAT', 'IV', '884000');
INSERT INTO `biaya_penginapan` VALUES ('7', 'SUMATERA SELATAN', 'IV', '605000');
INSERT INTO `biaya_penginapan` VALUES ('8', 'LAMPUNG', 'IV', '790000');
INSERT INTO `biaya_penginapan` VALUES ('9', 'BENGKULU', 'IV', '712000');
INSERT INTO `biaya_penginapan` VALUES ('10', 'BANGKA BELITUNG', 'IV', '850000');
INSERT INTO `biaya_penginapan` VALUES ('11', 'BANTEN', 'IV', '1024000');
INSERT INTO `biaya_penginapan` VALUES ('12', 'JAWA BARAT', 'IV', '949000');
INSERT INTO `biaya_penginapan` VALUES ('13', 'D.K.I   JAKARTA', 'IV', '800000');
INSERT INTO `biaya_penginapan` VALUES ('14', 'JAWA TENGAH', 'IV', '1024000');
INSERT INTO `biaya_penginapan` VALUES ('15', 'D.I.  YOGYAKARTA', 'IV', '747000');
INSERT INTO `biaya_penginapan` VALUES ('16', 'JAWA TIMUR', 'IV', '841000');
INSERT INTO `biaya_penginapan` VALUES ('17', 'B A L I', 'IV', '1304000');
INSERT INTO `biaya_penginapan` VALUES ('18', 'NUSA TENGGARA BARAT', 'IV', '737000');
INSERT INTO `biaya_penginapan` VALUES ('19', 'NUSA TENGGARA TIMUR', 'IV', '700000');
INSERT INTO `biaya_penginapan` VALUES ('20', 'KALIMANTAN BARAT', 'IV', '866000');
INSERT INTO `biaya_penginapan` VALUES ('21', 'KALIMANTAN TENGAH', 'IV', '923000');
INSERT INTO `biaya_penginapan` VALUES ('22', 'KALIMANTAN SELATAN', 'IV', '816000');
INSERT INTO `biaya_penginapan` VALUES ('23', 'KALIMANTAN TIMUR', 'IV', '1596000');
INSERT INTO `biaya_penginapan` VALUES ('24', 'KALIMANTAN UTARA ', 'IV', '1596000');
INSERT INTO `biaya_penginapan` VALUES ('25', 'SULAWESI UTARA', 'IV', '640000');
INSERT INTO `biaya_penginapan` VALUES ('26', 'GORONTALO', 'IV', '910000');
INSERT INTO `biaya_penginapan` VALUES ('27', 'SULAWESI BARAT', 'IV', '910000');
INSERT INTO `biaya_penginapan` VALUES ('28', 'SULAWESI SELATAN', 'IV', '968000');
INSERT INTO `biaya_penginapan` VALUES ('29', 'SULAWESI TENGAH', 'IV', '894000');
INSERT INTO `biaya_penginapan` VALUES ('30', 'SULAWESI TENGGARA', 'IV', '802000');
INSERT INTO `biaya_penginapan` VALUES ('31', 'MALUKU', 'IV', '680000');
INSERT INTO `biaya_penginapan` VALUES ('32', 'MALUKU UTARA', 'IV', '600000');
INSERT INTO `biaya_penginapan` VALUES ('33', 'PAPUA', 'IV', '754000');
INSERT INTO `biaya_penginapan` VALUES ('34', 'PAPUA BARAT', 'IV', '976000');
INSERT INTO `biaya_penginapan` VALUES ('35', 'ACEH', 'III', '410000');
INSERT INTO `biaya_penginapan` VALUES ('36', 'SUMATERA UTARA', 'III', '505000');
INSERT INTO `biaya_penginapan` VALUES ('37', 'RIAU', 'III', '450000');
INSERT INTO `biaya_penginapan` VALUES ('38', 'KEPULAUAN RIAU', 'III', '502000');
INSERT INTO `biaya_penginapan` VALUES ('39', 'JAMBI', 'III', '382000');
INSERT INTO `biaya_penginapan` VALUES ('40', 'SUMATERA BARAT', 'III', '477000');
INSERT INTO `biaya_penginapan` VALUES ('41', 'SUMATERA SELATAN', 'III', '514000');
INSERT INTO `biaya_penginapan` VALUES ('42', 'LAMPUNG', 'III', '374000');
INSERT INTO `biaya_penginapan` VALUES ('43', 'BENGKULU', 'III', '599000');
INSERT INTO `biaya_penginapan` VALUES ('44', 'BANGKA BELITUNG', 'III', '533000');
INSERT INTO `biaya_penginapan` VALUES ('45', 'BANTEN', 'III', '797000');
INSERT INTO `biaya_penginapan` VALUES ('46', 'JAWA BARAT', 'III', '515000');
INSERT INTO `biaya_penginapan` VALUES ('47', 'D.K.I   JAKARTA', 'III', '610000');
INSERT INTO `biaya_penginapan` VALUES ('48', 'JAWA TENGAH', 'III', '497000');
INSERT INTO `biaya_penginapan` VALUES ('49', 'D.I.  YOGYAKARTA', 'III', '629000');
INSERT INTO `biaya_penginapan` VALUES ('50', 'JAWA TIMUR', 'III', '499000');
INSERT INTO `biaya_penginapan` VALUES ('51', 'B A L I', 'III', '904000');
INSERT INTO `biaya_penginapan` VALUES ('52', 'NUSA TENGGARA BARAT', 'III', '540000');
INSERT INTO `biaya_penginapan` VALUES ('53', 'NUSA TENGGARA TIMUR', 'III', '662000');
INSERT INTO `biaya_penginapan` VALUES ('54', 'KALIMANTAN BARAT', 'III', '430000');
INSERT INTO `biaya_penginapan` VALUES ('55', 'KALIMANTAN TENGAH', 'III', '558000');
INSERT INTO `biaya_penginapan` VALUES ('56', 'KALIMANTAN SELATAN', 'III', '500000');
INSERT INTO `biaya_penginapan` VALUES ('57', 'KALIMANTAN TIMUR', 'III', '550000');
INSERT INTO `biaya_penginapan` VALUES ('58', 'KALIMANTAN UTARA ', 'III', '550000');
INSERT INTO `biaya_penginapan` VALUES ('59', 'SULAWESI UTARA', 'III', '549000');
INSERT INTO `biaya_penginapan` VALUES ('60', 'GORONTALO', 'III', '423000');
INSERT INTO `biaya_penginapan` VALUES ('61', 'SULAWESI BARAT', 'III', '425000');
INSERT INTO `biaya_penginapan` VALUES ('62', 'SULAWESI SELATAN', 'III', '539000');
INSERT INTO `biaya_penginapan` VALUES ('63', 'SULAWESI TENGAH', 'III', '493000');
INSERT INTO `biaya_penginapan` VALUES ('64', 'SULAWESI TENGGARA', 'III', '488000');
INSERT INTO `biaya_penginapan` VALUES ('65', 'MALUKU', 'III', '545000');
INSERT INTO `biaya_penginapan` VALUES ('66', 'MALUKU UTARA', 'III', '478000');
INSERT INTO `biaya_penginapan` VALUES ('67', 'PAPUA', 'III', '460000');
INSERT INTO `biaya_penginapan` VALUES ('68', 'PAPUA BARAT', 'III', '798000');
INSERT INTO `biaya_penginapan` VALUES ('69', 'ACEH', 'I', '370000');
INSERT INTO `biaya_penginapan` VALUES ('70', 'SUMATERA UTARA', 'I', '310000');
INSERT INTO `biaya_penginapan` VALUES ('71', 'RIAU', 'I', '380000');
INSERT INTO `biaya_penginapan` VALUES ('72', 'KEPULAUAN RIAU', 'I', '280000');
INSERT INTO `biaya_penginapan` VALUES ('73', 'JAMBI', 'I', '290000');
INSERT INTO `biaya_penginapan` VALUES ('74', 'SUMATERA BARAT', 'I', '370000');
INSERT INTO `biaya_penginapan` VALUES ('75', 'SUMATERA SELATAN', 'I', '310000');
INSERT INTO `biaya_penginapan` VALUES ('76', 'LAMPUNG', 'I', '356000');
INSERT INTO `biaya_penginapan` VALUES ('77', 'BENGKULU', 'I', '510000');
INSERT INTO `biaya_penginapan` VALUES ('78', 'BANGKA BELITUNG', 'I', '304000');
INSERT INTO `biaya_penginapan` VALUES ('79', 'BANTEN', 'I', '400000');
INSERT INTO `biaya_penginapan` VALUES ('80', 'JAWA BARAT', 'I', '463000');
INSERT INTO `biaya_penginapan` VALUES ('81', 'D.K.I   JAKARTA', 'I', '400000');
INSERT INTO `biaya_penginapan` VALUES ('82', 'JAWA TENGAH', 'I', '350000');
INSERT INTO `biaya_penginapan` VALUES ('83', 'D.I.  YOGYAKARTA', 'I', '461000');
INSERT INTO `biaya_penginapan` VALUES ('84', 'JAWA TIMUR', 'I', '329000');
INSERT INTO `biaya_penginapan` VALUES ('85', 'B A L I', 'I', '658000');
INSERT INTO `biaya_penginapan` VALUES ('86', 'NUSA TENGGARA BARAT', 'I', '360000');
INSERT INTO `biaya_penginapan` VALUES ('87', 'NUSA TENGGARA TIMUR', 'I', '400000');
INSERT INTO `biaya_penginapan` VALUES ('88', 'KALIMANTAN BARAT', 'I', '361000');
INSERT INTO `biaya_penginapan` VALUES ('89', 'KALIMANTAN TENGAH', 'I', '436000');
INSERT INTO `biaya_penginapan` VALUES ('90', 'KALIMANTAN SELATAN', 'I', '379000');
INSERT INTO `biaya_penginapan` VALUES ('91', 'KALIMANTAN TIMUR', 'I', '450000');
INSERT INTO `biaya_penginapan` VALUES ('92', 'KALIMANTAN UTARA ', 'I', '450000');
INSERT INTO `biaya_penginapan` VALUES ('93', 'SULAWESI UTARA', 'I', '342000');
INSERT INTO `biaya_penginapan` VALUES ('94', 'GORONTALO', 'I', '240000');
INSERT INTO `biaya_penginapan` VALUES ('95', 'SULAWESI BARAT', 'I', '360000');
INSERT INTO `biaya_penginapan` VALUES ('96', 'SULAWESI SELATAN', 'I', '378000');
INSERT INTO `biaya_penginapan` VALUES ('97', 'SULAWESI TENGAH', 'I', '389000');
INSERT INTO `biaya_penginapan` VALUES ('98', 'SULAWESI TENGGARA', 'I', '420000');
INSERT INTO `biaya_penginapan` VALUES ('99', 'MALUKU', 'I', '414000');
INSERT INTO `biaya_penginapan` VALUES ('100', 'MALUKU UTARA', 'I', '380000');
INSERT INTO `biaya_penginapan` VALUES ('101', 'PAPUA', 'I', '414000');
INSERT INTO `biaya_penginapan` VALUES ('102', 'PAPUA BARAT', 'I', '370000');
INSERT INTO `biaya_penginapan` VALUES ('103', 'ACEH', 'II', '370000');
INSERT INTO `biaya_penginapan` VALUES ('104', 'SUMATERA UTARA', 'II', '310000');
INSERT INTO `biaya_penginapan` VALUES ('105', 'RIAU', 'II', '380000');
INSERT INTO `biaya_penginapan` VALUES ('106', 'KEPULAUAN RIAU', 'II', '280000');
INSERT INTO `biaya_penginapan` VALUES ('107', 'JAMBI', 'II', '290000');
INSERT INTO `biaya_penginapan` VALUES ('108', 'SUMATERA BARAT', 'II', '370000');
INSERT INTO `biaya_penginapan` VALUES ('109', 'SUMATERA SELATAN', 'II', '310000');
INSERT INTO `biaya_penginapan` VALUES ('110', 'LAMPUNG', 'II', '356000');
INSERT INTO `biaya_penginapan` VALUES ('111', 'BENGKULU', 'II', '510000');
INSERT INTO `biaya_penginapan` VALUES ('112', 'BANGKA BELITUNG', 'II', '304000');
INSERT INTO `biaya_penginapan` VALUES ('113', 'BANTEN', 'II', '400000');
INSERT INTO `biaya_penginapan` VALUES ('114', 'JAWA BARAT', 'II', '463000');
INSERT INTO `biaya_penginapan` VALUES ('115', 'D.K.I   JAKARTA', 'II', '400000');
INSERT INTO `biaya_penginapan` VALUES ('116', 'JAWA TENGAH', 'II', '350000');
INSERT INTO `biaya_penginapan` VALUES ('117', 'D.I.  YOGYAKARTA', 'II', '461000');
INSERT INTO `biaya_penginapan` VALUES ('118', 'JAWA TIMUR', 'II', '329000');
INSERT INTO `biaya_penginapan` VALUES ('119', 'B A L I', 'II', '658000');
INSERT INTO `biaya_penginapan` VALUES ('120', 'NUSA TENGGARA BARAT', 'II', '360000');
INSERT INTO `biaya_penginapan` VALUES ('121', 'NUSA TENGGARA TIMUR', 'II', '400000');
INSERT INTO `biaya_penginapan` VALUES ('122', 'KALIMANTAN BARAT', 'II', '361000');
INSERT INTO `biaya_penginapan` VALUES ('123', 'KALIMANTAN TENGAH', 'II', '436000');
INSERT INTO `biaya_penginapan` VALUES ('124', 'KALIMANTAN SELATAN', 'II', '379000');
INSERT INTO `biaya_penginapan` VALUES ('125', 'KALIMANTAN TIMUR', 'II', '450000');
INSERT INTO `biaya_penginapan` VALUES ('126', 'KALIMANTAN UTARA ', 'II', '450000');
INSERT INTO `biaya_penginapan` VALUES ('127', 'SULAWESI UTARA', 'II', '342000');
INSERT INTO `biaya_penginapan` VALUES ('128', 'GORONTALO', 'II', '240000');
INSERT INTO `biaya_penginapan` VALUES ('129', 'SULAWESI BARAT', 'II', '360000');
INSERT INTO `biaya_penginapan` VALUES ('130', 'SULAWESI SELATAN', 'II', '378000');
INSERT INTO `biaya_penginapan` VALUES ('131', 'SULAWESI TENGAH', 'II', '389000');
INSERT INTO `biaya_penginapan` VALUES ('132', 'SULAWESI TENGGARA', 'II', '420000');
INSERT INTO `biaya_penginapan` VALUES ('133', 'MALUKU', 'II', '414000');
INSERT INTO `biaya_penginapan` VALUES ('134', 'MALUKU UTARA', 'II', '380000');
INSERT INTO `biaya_penginapan` VALUES ('135', 'PAPUA', 'II', '414000');
INSERT INTO `biaya_penginapan` VALUES ('136', 'PAPUA BARAT', 'II', '370000');

-- ----------------------------
-- Table structure for biaya_sewa
-- ----------------------------
DROP TABLE IF EXISTS `biaya_sewa`;
CREATE TABLE `biaya_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_sewa
-- ----------------------------

-- ----------------------------
-- Table structure for biaya_tiket
-- ----------------------------
DROP TABLE IF EXISTS `biaya_tiket`;
CREATE TABLE `biaya_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_asal` varchar(25) DEFAULT NULL,
  `kota_tujuan` varchar(25) DEFAULT NULL,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_tiket
-- ----------------------------
INSERT INTO `biaya_tiket` VALUES ('2', 'Bandung', 'Jakarta', 'Kereta Api', '1500000');
INSERT INTO `biaya_tiket` VALUES ('3', 'Jakarta', 'Bandung', 'Pesawat', '700000');
INSERT INTO `biaya_tiket` VALUES ('4', 'Bandung', 'Banda Aceh', 'Pesawat', '1500000');
INSERT INTO `biaya_tiket` VALUES ('5', 'Bandung', 'Medan', 'Pesawat', '700000');
INSERT INTO `biaya_tiket` VALUES ('7', 'Bandung', 'Jakarta', 'Pesawat', '700000');
INSERT INTO `biaya_tiket` VALUES ('8', 'Bandung', 'Surabaya', 'Pesawat', '1500000');
INSERT INTO `biaya_tiket` VALUES ('9', 'Bandung', 'Banjarmasin', 'Pesawat', '700000');
INSERT INTO `biaya_tiket` VALUES ('10', 'Bandung', 'Padang', 'Pesawat', '1500000');
INSERT INTO `biaya_tiket` VALUES ('11', 'Bandung', 'Manokwari', 'Pesawat', '700000');

-- ----------------------------
-- Table structure for biaya_transport_dlm_kota
-- ----------------------------
DROP TABLE IF EXISTS `biaya_transport_dlm_kota`;
CREATE TABLE `biaya_transport_dlm_kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_transport_dlm_kota
-- ----------------------------

-- ----------------------------
-- Table structure for golongan
-- ----------------------------
DROP TABLE IF EXISTS `golongan`;
CREATE TABLE `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_golongan` varchar(15) NOT NULL,
  `tarif_perjalanan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of golongan
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_barang
-- ----------------------------
DROP TABLE IF EXISTS `jenis_barang`;
CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL DEFAULT '0',
  `kode_jenis_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_barang
-- ----------------------------

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(25) NOT NULL,
  `kode_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `koordinator` varchar(25) DEFAULT NULL,
  `penanggung_jawab` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
INSERT INTO `kegiatan` VALUES ('1', '1', '2433.001.001.107', 'Inovasi Teknologi dan Manajemen Permukiman', '1', '2');
INSERT INTO `kegiatan` VALUES ('2', '1', '2433.001.003.107.A', 'Penelitian dan Pengembangan Teknologi Pengolahan Air Minum ', '1', '2');
INSERT INTO `kegiatan` VALUES ('3', '1', '2433.001.003.107.B', 'Pengkajian dan Pengembang ITF', '1', '2');
INSERT INTO `kegiatan` VALUES ('4', '1', '2433.001.004.107.A', 'Kelembagaan dalam Implementasi Kebijakan Sertifikat Laik Fungsi Bangunan Gedung', '1', '2');
INSERT INTO `kegiatan` VALUES ('5', '1', '2433.001.004.107.B', 'Penyusunan Pedoman Matra Ruang ', '1', '2');
INSERT INTO `kegiatan` VALUES ('6', '1', '2433.001.005.107', 'Potensi Bahan Bangunan Lokal untuk Mendukung Pembangunan Perumahan Sederhana Menggunakan Sistem Info', '1', '2');
INSERT INTO `kegiatan` VALUES ('7', '1', '2433.003.002.107.A', 'Pengembangan Model Penataan Kawasan Padat dan Kumuh di Perkotaan', '1', '2');
INSERT INTO `kegiatan` VALUES ('8', '1', '2433.003.002.107.B', 'Pengkajian dan Pengembangan Model Permukiman di Kawasan Pesisir', '1', '2');
INSERT INTO `kegiatan` VALUES ('9', '1', '2433.003.002.107.C', 'Pengembangan Model Penataan Kawasan Pulau-Pulau Kecil', '1', '2');
INSERT INTO `kegiatan` VALUES ('10', '1', '2433.003.002.107.D', 'Pengembangan Model Penataan Kawasan Perbatasan', '1', '2');
INSERT INTO `kegiatan` VALUES ('11', '1', '2433.003.004.107.A', 'Pengembangan Teknologi Perbaikan Gedung dan Perkuatan (Retrofingfitting) Struktur Beton Bertulang Un', '1', '2');
INSERT INTO `kegiatan` VALUES ('12', '1', '2433.003.004.107.B', 'Pengkajian dan Pengembangan Analisis Resiko Gempa ', '1', '2');
INSERT INTO `kegiatan` VALUES ('13', '1', '2433.003.004.107.C', 'Pengembangan Model Laboratorium Arsitektur, Struktur dan Utilitas', '1', '2');
INSERT INTO `kegiatan` VALUES ('14', '1', '2433.004.002.107', 'Penelitian Sistem Rating untuk Perumahan dan Permukiman Hijau', '1', '2');
INSERT INTO `kegiatan` VALUES ('15', '1', '2433.004.004.107', 'Pengembangan Green Label dalam Penyediaan Bahan Bangunan', '1', '2');
INSERT INTO `kegiatan` VALUES ('16', '1', '2433.004.006.107.A', 'Penyusunan Pedoman Sistem Rating Bangunan Hijau pada Bangunan Gedung', '1', '2');
INSERT INTO `kegiatan` VALUES ('17', '1', '2433.004.006.107.A', 'Pengembangan Metodelogi  Pengukuran Perhitungan Emisi Gas Rumah Kaca pada Sektor Air Limbah', '1', '2');
INSERT INTO `kegiatan` VALUES ('18', '1', '2433.005.004.107', 'Penyusunan Konsep Pedoman Teknologi Bahan Bangunan Alternatif', '1', '2');
INSERT INTO `kegiatan` VALUES ('19', '1', '2433.006.003.107.A', 'Pengembangan Teknologi Air Limbah dengan Sistem Vermibiofilter', '1', '2');
INSERT INTO `kegiatan` VALUES ('20', '1', '2433.006.003.107.B', 'Pengembangan dan Penerapan Teknologi Air Minum dan Sanitasi di Kawasan Permukiman DAS', '1', '2');
INSERT INTO `kegiatan` VALUES ('21', '1', '2433.006.003.107.C', 'Pengembangan dan Penerapan Teknologi Air Minum di Pulau Kecil', '1', '2');
INSERT INTO `kegiatan` VALUES ('22', '1', '2433.006.005.107', 'Pengkajian dan Penerapan Teknologi Rumah Murah, Sehat dan Layak Huni', '1', '2');
INSERT INTO `kegiatan` VALUES ('23', '1', '2433.008.001.014', 'Penyusunan Naskah Kebijakan Bidang Permukiman (Kajian Kebijakan)', '1', '2');
INSERT INTO `kegiatan` VALUES ('24', '1', '2433.009.001.040.A', 'Diseminasi dan Sosialisasi SPM Bidang Permukiman', '1', '2');
INSERT INTO `kegiatan` VALUES ('25', '1', '2433.009.001.040.B', 'Diseminasi dan Sosialisasi Teknologi Bidang Permukiman', '1', '2');
INSERT INTO `kegiatan` VALUES ('26', '1', '2433.009.001.040.C', 'Publikasi dan Dokumentasi Hasil Litbang', '1', '2');
INSERT INTO `kegiatan` VALUES ('27', '1', '2433.009.001.040.D', 'Penyelenggaraan dan Keikutsertaan Pameran', '1', '2');
INSERT INTO `kegiatan` VALUES ('28', '1', '2433.010.001.044', 'Bantuan Teknis / Administratif / Manajemen', '1', '2');
INSERT INTO `kegiatan` VALUES ('29', '1', '2433.012.001.048.A', 'Perencanaan/Implementasi/Pengelolaan Sistem Akuntansi Pemerintah', '1', '2');
INSERT INTO `kegiatan` VALUES ('30', '1', '2433.012.001.048.B', 'Pembinaan Administrasi dan Pengelolaan Keuangan', '1', '2');
INSERT INTO `kegiatan` VALUES ('31', '1', '2433.012.002.047.A', 'Pengelolaan Barang Milik/Kekayaan Negara', '1', '2');
INSERT INTO `kegiatan` VALUES ('32', '1', '2433.012.002.051.D', 'Penyelenggaraan Humas dan Protokol', '1', '2');
INSERT INTO `kegiatan` VALUES ('33', '1', '2433.012.002.051.E', 'Operasional Jaringan', '1', '2');
INSERT INTO `kegiatan` VALUES ('34', '1', '2433.012.002.051.F', 'Penyelenggaraan Sistem Informasi', '1', '2');
INSERT INTO `kegiatan` VALUES ('35', '1', '2433.012.002.053.D', 'Penelitian Klarifikasi, Registrasi, Penerapan Sistem Kearsipan', '1', '2');
INSERT INTO `kegiatan` VALUES ('36', '1', '2433.012.003.051.C', 'Penerbitan Jurnal', '1', '2');
INSERT INTO `kegiatan` VALUES ('37', '1', '2433.012.003.053.A', 'Penataan Manajemen Kelembagaan', '1', '2');
INSERT INTO `kegiatan` VALUES ('38', '1', '2433.012.003.053.B', 'Pengembangan Mutu Kelembagaan', '1', '2');
INSERT INTO `kegiatan` VALUES ('39', '1', '2433.012.003.053.C', 'Administrasi Umum dan Peningkatan Sarana Kelitbangan', '1', '2');
INSERT INTO `kegiatan` VALUES ('40', '1', '2433.012.003.058.A', 'Penyelenggaraan Kepustakaan', '1', '2');
INSERT INTO `kegiatan` VALUES ('41', '1', '2433.012.004.012.A', 'Pembinaan Administrasi Pengelolaan Kepegawaian', '1', '2');
INSERT INTO `kegiatan` VALUES ('42', '1', '2433.012.004.012.A', 'Pengembangan Jabatan Fungsional SDM Iptek', '1', '2');
INSERT INTO `kegiatan` VALUES ('43', '1', '2433.012.004.012.B', 'Pengembangan Kompetensi SDM', '1', '2');
INSERT INTO `kegiatan` VALUES ('44', '1', '2433.012.004.012.D', 'Pengurusan Visa/Paspor', '1', '2');
INSERT INTO `kegiatan` VALUES ('45', '1', '2433.012.004.012.E', 'Pengurusan HAKI', '1', '2');
INSERT INTO `kegiatan` VALUES ('46', '1', '2433.012.004.040.A', 'Penyelenggaraan dan Keikutsertaan dalam Seminar Nasional dan Internasional', '1', '2');
INSERT INTO `kegiatan` VALUES ('47', '1', '2433.012.005.018.A', 'Penyusunan Rencana Kerja dan Anggaran', '1', '2');
INSERT INTO `kegiatan` VALUES ('48', '1', '2433.012.005.200.A', 'Monitoring Pelaksanaan Kegiatan', '1', '2');
INSERT INTO `kegiatan` VALUES ('49', '1', '2433.012.005.200.B', 'Evaluasi Kemanfaatan Hasil Litbang', '1', '2');
INSERT INTO `kegiatan` VALUES ('50', '1', '2433.012.006.045.A', 'Kerjasama Dalam Negeri', '1', '2');
INSERT INTO `kegiatan` VALUES ('51', '1', '2433.012.006.045.B', 'Pengembangan Unit Inkubasi Hasil Litbang Permukiman', '1', '2');
INSERT INTO `kegiatan` VALUES ('52', '1', '2433.012.006.045.C', 'Kesekretariatan Kerjasama Luar Negeri', '1', '2');
INSERT INTO `kegiatan` VALUES ('53', '1', '2433.012.006.045.D', 'Kesekretariatan RCCEHUD', '1', '2');
INSERT INTO `kegiatan` VALUES ('54', '1', '2433.012.007.015', 'Perumusan SPM', '1', '2');
INSERT INTO `kegiatan` VALUES ('55', '1', '2433.012.008.011.A', 'Administrasi Kegiatan', '1', '2');
INSERT INTO `kegiatan` VALUES ('56', '1', '2433.012.009.055.A', 'Laboratorium Struktur dan Konstruksi Bangunan', '1', '2');
INSERT INTO `kegiatan` VALUES ('57', '1', '2433.012.009.055.B', 'Laboratorium Bahan Bangunan', '1', '2');
INSERT INTO `kegiatan` VALUES ('58', '1', '2433.012.009.055.C', 'Laboratorium Tata Bangunan', '1', '2');
INSERT INTO `kegiatan` VALUES ('59', '1', '2433.012.009.055.D', 'Laboratorium Lingkungan Permukiman', '1', '2');
INSERT INTO `kegiatan` VALUES ('60', '1', '2433.012.009.055.E', 'Studio Perumahan', '1', '2');
INSERT INTO `kegiatan` VALUES ('61', '1', '2433.012.009.060.A', 'Penyusunan Data Center', '1', '2');
INSERT INTO `kegiatan` VALUES ('62', '1', '2433.013.001.011', 'Pengelola PNBP (Administrasi Kegiatan)', '1', '2');
INSERT INTO `kegiatan` VALUES ('63', '1', '2433.013.002.152', 'Penerimaan Negara Bukan Pajak', '1', '2');
INSERT INTO `kegiatan` VALUES ('64', '1', '2433.014.001.114', 'Pengadaan Peralatan Laboratorium', '1', '2');
INSERT INTO `kegiatan` VALUES ('65', '1', '2433.994.001', 'Pembayaran Gaji dan Tunjangan', '1', '2');
INSERT INTO `kegiatan` VALUES ('66', '1', '2433.994.002.A', 'Pengadaan Toga/Pakaian Kerja Supir/Pesuruh/ Perawan/Dokter/Satpam/Tenaga Teknis Lainnya', '1', '2');
INSERT INTO `kegiatan` VALUES ('67', '1', '2433.994.002.C', 'Operasional Perkantoran dan Pimpinan (Rapat Koordinasi)', '1', '2');
INSERT INTO `kegiatan` VALUES ('68', '1', '2433.994.002.', 'Perawatan Gedung Kantor', '1', '2');
INSERT INTO `kegiatan` VALUES ('69', '1', '2433.994.002.E', 'Perawatan Rumah Negara', '1', '2');
INSERT INTO `kegiatan` VALUES ('70', '1', '2433.994.002.G', 'Perawatan Sarana Gedung', '1', '2');
INSERT INTO `kegiatan` VALUES ('71', '1', '2433.994.002.H', 'Perawatan Kendaraan Bermotor Roda 4/Roda 6/ Roda 10', '1', '2');
INSERT INTO `kegiatan` VALUES ('72', '1', '2433.994.002.I', 'Perawatan Kendaraan Bermotor Roda 2', '1', '2');
INSERT INTO `kegiatan` VALUES ('73', '1', '2433.994.002.K', 'Langganan Daya dan Jasa', '1', '2');
INSERT INTO `kegiatan` VALUES ('74', '1', '2433.994.002.L', 'Jasa Keamanan dan Kebersihan', '1', '2');
INSERT INTO `kegiatan` VALUES ('75', '1', '2433.994.002.M', 'Jasa Pos / Giro / Sertifikat', '1', '2');
INSERT INTO `kegiatan` VALUES ('76', '1', '2433.994.002.N', 'Pertemuan dan Penerimaan Delegasi/Misi/Tamu', '1', '2');
INSERT INTO `kegiatan` VALUES ('77', '1', '2433.994.002.P', 'Keperluan Perkantoran', '1', '2');
INSERT INTO `kegiatan` VALUES ('78', '1', '2433.996.001.114', 'Pengadaan Alat Studio dan Komunikasi', '1', '2');
INSERT INTO `kegiatan` VALUES ('79', '1', '2433.996.002.114', 'Pengadaan Alat Pengolah Data', '1', '2');
INSERT INTO `kegiatan` VALUES ('80', '1', '2433.997.001.114', 'Pengadaan Mebelair', '1', '2');
INSERT INTO `kegiatan` VALUES ('81', '1', '2433.998.001.056', 'Peningkatan / Pembangunan Prasarana dan Sarana Internal Kementerian PU', '1', '2');

-- ----------------------------
-- Table structure for komentar
-- ----------------------------
DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of komentar
-- ----------------------------
INSERT INTO `komentar` VALUES ('1', '1', 'admin', 'balik yu');
INSERT INTO `komentar` VALUES ('2', '1', 'admin', 'duh jelek');
INSERT INTO `komentar` VALUES ('3', '1', 'admin', 'butut');

-- ----------------------------
-- Table structure for koordinator
-- ----------------------------
DROP TABLE IF EXISTS `koordinator`;
CREATE TABLE `koordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_koordinator` varchar(25) NOT NULL,
  `kode_kegiatan` varchar(25) NOT NULL,
  `nama_koordinator` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of koordinator
-- ----------------------------

-- ----------------------------
-- Table structure for kota_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `kota_tujuan`;
CREATE TABLE `kota_tujuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_wilayah` int(11) DEFAULT NULL,
  `nama_provinsi` varchar(25) DEFAULT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kota_tujuan
-- ----------------------------
INSERT INTO `kota_tujuan` VALUES ('1', '11', 'Nanggroe Aceh Darussalam', 'Banda Aceh');
INSERT INTO `kota_tujuan` VALUES ('2', '12', 'Sumatera Utara', 'Medan');
INSERT INTO `kota_tujuan` VALUES ('3', '13', 'Sumatera Barat', 'Padang');
INSERT INTO `kota_tujuan` VALUES ('4', '14', ' Riau', 'Pekanbaru');
INSERT INTO `kota_tujuan` VALUES ('5', '15', ' Jambi', 'Jambi');
INSERT INTO `kota_tujuan` VALUES ('6', '16', ' Sumatera Selatan', 'Palembang ');
INSERT INTO `kota_tujuan` VALUES ('7', '17', ' Bengkulu', 'Bengkulu ');
INSERT INTO `kota_tujuan` VALUES ('8', '18', ' Lampung', ' Lampung');
INSERT INTO `kota_tujuan` VALUES ('9', '19', ' Kepulauan Bangka Belitun', 'Pangkal Pinang  ');
INSERT INTO `kota_tujuan` VALUES ('10', '21', ' Kepulauan Riau', 'Tanjung Pinang  ');
INSERT INTO `kota_tujuan` VALUES ('11', '31', ' Dki Jakarta', 'Jakarta ');
INSERT INTO `kota_tujuan` VALUES ('12', '32', ' Jawa Barat', 'Bandung ');
INSERT INTO `kota_tujuan` VALUES ('13', '33', ' Jawa Tengah', 'Semarang');
INSERT INTO `kota_tujuan` VALUES ('14', '34', ' D I Yogyakarta', 'Yogyakarta ');
INSERT INTO `kota_tujuan` VALUES ('15', '35', ' Jawa Timur', 'Surabaya');
INSERT INTO `kota_tujuan` VALUES ('16', '36', ' Banten', 'Tangerang');
INSERT INTO `kota_tujuan` VALUES ('17', '51', ' Bali', 'Denpasar');
INSERT INTO `kota_tujuan` VALUES ('18', '52', ' Nusa Tenggara Barat', 'Mataram ');
INSERT INTO `kota_tujuan` VALUES ('19', '53', ' Nusa Tenggara Timur', 'Kupang ');
INSERT INTO `kota_tujuan` VALUES ('20', '61', ' Kalimantan Barat', 'Pontianak ');
INSERT INTO `kota_tujuan` VALUES ('21', '62', ' Kalimantan Tengah', ' Palangkaraya');
INSERT INTO `kota_tujuan` VALUES ('22', '63', ' Kalimantan Selatan', 'Banjarmasin ');
INSERT INTO `kota_tujuan` VALUES ('23', '64', ' Kalimantan Timur', 'Samarinda ');
INSERT INTO `kota_tujuan` VALUES ('24', '71', ' Sulawesi Utara', 'Manado ');
INSERT INTO `kota_tujuan` VALUES ('25', '72', ' Sulawesi Tengah', 'Palu ');
INSERT INTO `kota_tujuan` VALUES ('26', '73', ' Sulawesi Selatan', 'Ujungpandang ');
INSERT INTO `kota_tujuan` VALUES ('27', '74', ' Sulawesi Tenggara', 'Kendari ');
INSERT INTO `kota_tujuan` VALUES ('28', '75', ' Gorontalo', 'Gorontalo ');
INSERT INTO `kota_tujuan` VALUES ('29', '76', ' Sulawesi Barat', ' Mamuju');
INSERT INTO `kota_tujuan` VALUES ('30', '81', ' M A L U K U', 'Ambon ');
INSERT INTO `kota_tujuan` VALUES ('31', '82', ' Maluku Utara', 'Ternate ');
INSERT INTO `kota_tujuan` VALUES ('32', '91', ' Papua Barat', 'Manokwari ');
INSERT INTO `kota_tujuan` VALUES ('33', '94', ' Papua', 'Jayapura ');

-- ----------------------------
-- Table structure for listcode
-- ----------------------------
DROP TABLE IF EXISTS `listcode`;
CREATE TABLE `listcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(50) DEFAULT NULL,
  `list_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of listcode
-- ----------------------------
INSERT INTO `listcode` VALUES ('36', 'Jenis Kendaraan', 'Pesawat');
INSERT INTO `listcode` VALUES ('4', '', 'Jenis Barang');
INSERT INTO `listcode` VALUES ('5', 'Jenis Barang', 'ATK, Bahan Komputer, dan Bahan Dokumentasi');
INSERT INTO `listcode` VALUES ('35', '', 'Jenis Kendaraan');
INSERT INTO `listcode` VALUES ('8', 'Jenis Barang', 'Bahan Kimia');
INSERT INTO `listcode` VALUES ('9', 'Jenis Barang', 'Bahan Bangunan');
INSERT INTO `listcode` VALUES ('10', 'Jenis Barang', 'Bahan Pembuatan Model');
INSERT INTO `listcode` VALUES ('11', 'Jenis Barang', 'Bahan Bantu Pengujian');
INSERT INTO `listcode` VALUES ('12', 'Jenis Barang', 'Bahan Maket');
INSERT INTO `listcode` VALUES ('13', 'Jenis Barang', 'Fotocopy dan Penjilidan');
INSERT INTO `listcode` VALUES ('14', 'Jenis Barang', 'Biaya Konsumsi / Jamuan Rapat');
INSERT INTO `listcode` VALUES ('15', '', 'Status Pegawai');
INSERT INTO `listcode` VALUES ('16', 'Status Pegawai', 'PNS');
INSERT INTO `listcode` VALUES ('18', 'Status Pegawai', 'Non PNS (S1)');
INSERT INTO `listcode` VALUES ('19', '', 'Golongan');
INSERT INTO `listcode` VALUES ('20', 'Golongan', 'I/A');
INSERT INTO `listcode` VALUES ('21', 'Golongan', 'I/B');
INSERT INTO `listcode` VALUES ('22', 'Golongan', 'I/C');
INSERT INTO `listcode` VALUES ('23', 'Golongan', 'I/D');
INSERT INTO `listcode` VALUES ('24', 'Golongan', 'II/A');
INSERT INTO `listcode` VALUES ('25', 'Golongan', 'II/B');
INSERT INTO `listcode` VALUES ('26', 'Golongan', 'II/C');
INSERT INTO `listcode` VALUES ('27', 'Golongan', 'II/D');
INSERT INTO `listcode` VALUES ('28', 'Golongan', 'III/A');
INSERT INTO `listcode` VALUES ('29', 'Golongan', 'III/B');
INSERT INTO `listcode` VALUES ('30', 'Golongan', 'III/C');
INSERT INTO `listcode` VALUES ('31', 'Golongan', 'III/D');
INSERT INTO `listcode` VALUES ('32', '', 'Satuan Barang');
INSERT INTO `listcode` VALUES ('33', 'Satuan Barang', 'dus');
INSERT INTO `listcode` VALUES ('34', 'Satuan Barang', 'pcs');
INSERT INTO `listcode` VALUES ('37', 'Jenis Kendaraan', 'Kereta Api');
INSERT INTO `listcode` VALUES ('38', 'Jenis Kendaraan', 'Perahu');
INSERT INTO `listcode` VALUES ('39', '', 'Jenis Penginapan');
INSERT INTO `listcode` VALUES ('40', 'Jenis Penginapan', 'Hotel');
INSERT INTO `listcode` VALUES ('41', 'Jenis Penginapan', 'Non Hotel');
INSERT INTO `listcode` VALUES ('42', 'Status Pegawai', 'Non PNS (D3)');
INSERT INTO `listcode` VALUES ('43', 'Status Pegawai', 'Non PNS (SMU)');

-- ----------------------------
-- Table structure for pajak
-- ----------------------------
DROP TABLE IF EXISTS `pajak`;
CREATE TABLE `pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pajak` varchar(25) NOT NULL,
  `persentase_pajak` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pajak
-- ----------------------------

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelas_jabatan` varchar(15) NOT NULL,
  `status` varchar(25) NOT NULL,
  `kode_unit` varchar(25) NOT NULL,
  `kriteria_pegawai` varchar(15) NOT NULL,
  `status_pendidikan` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('1', '196006151987032001', 'Prof (R) Dr. Ir. Anita Firmanti, MT', 'IV/d', 'Kepala Puslitbang Permukiman', '0000-00-00', '15', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('2', '196101131990031001', ' Ir. R. Johny F.S. Subrata, MA.', 'IV/B', 'Kepala Bagian Tata Usaha', '0000-00-00', '12', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('3', '196308311997031001', ' Nana Pudja Sukmana, ST.', 'III/D', 'Kasubbag Umum', '0000-00-00', '10', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('4', '196008281993031005', ' Drs. Agus Heriyanto, MAP.', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('5', '196001121982111001', ' Ramlan, S.Sos.', 'III/D', 'Pengolah BMN (Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('6', '195910011983031004', ' S  o  b  a  r, BE.', 'III/C', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('7', '196409091991031004', ' Widjianto, SST.', 'III/B', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('8', '198509292010121004', ' Sony Suryono, A.Md.', 'II/C', 'Penelaah Laporan BMN ', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('9', '196710272007101001', ' Yana Suryana, SE.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('10', '196803102007011004', ' Achmad Hidayat, S.AP.', 'III/a', 'Pelaksana Administrasi ( Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('11', '199005112014021004', 'Anindwiyan Dian Panduwijaya, A.Md', 'II/c', 'Teknisi', '0000-00-00', '', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('12', '197110042007012001', ' Siti Sadiah', 'II/B', 'Pelaksana Administrasi ( Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('13', '197010032007011004', ' S u h e n d i', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('14', '196412202007011002', ' Uteng Miftah', 'II/B', 'Pengolah BMN (Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('15', '196809142008121001', ' Zaenal Abidin', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('16', '196007121994031003', ' N  a  r  k  a  m', 'II/A', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('17', '196002272006041001', ' Ade Sahri', 'I/B', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('18', '', 'Totong Kurnia', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('19', '196810041991031002', ' Sujarwanto, S.AP., MM.', 'III/B', 'Kepala Subbag Keuangan', '0000-00-00', '10', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('20', '195809281980121002', ' Budy Siswanto, S.Sos.', 'III/D', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('21', '196709301993111001', ' Toraja Hutasoit, B.Sc.', 'III/C', 'Penelaah Anggaran dan PNBP (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('22', '196502011987021001', ' Iskandar, S.IP.', 'III/C', 'Urusan Pelaopran (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('23', '196202161984022002', ' Beben Sugiarti', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('24', '195801061982112002', ' K o k o y', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('25', '195911291986031007', ' Adjat Sudradjat', 'III/B', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('26', '197207142007012003', ' Tintin Djuartini', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('27', '196206262007012001', ' Sutajiah', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('28', '196905272007011002', ' Ahmad Gojali', 'II/B', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('29', '196806122007011004', ' Drajat Subuhri', 'II/B', 'Bendahara', '0000-00-00', '8', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('30', '196312222008122001', ' Kaswati', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('31', '197212212009111001', ' Apep Apepudin', 'II/A', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('32', '195810171989031003', ' J a e n u l', 'II/A', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('33', ' ', 'Susanto', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '');
INSERT INTO `pegawai` VALUES ('34', '195907151986031004', ' Tibin R. Prayudi, BE., SE., MM.', 'IV/A', 'Kepala Bidang Sumber Daya Kelitbangan', '0000-00-00', '12', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('35', '195905221990031001', ' Drs. Duddy Dwiyanto K, MBA.', 'IV/A', 'Kasubbid SDM', '0000-00-00', '10', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('36', '196206251999031001', ' Drs. Binanga Sinaga', 'III/D', 'Arsiparis Muda', '0000-00-00', '9', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('37', '196008051986021002', ' B u d i y o n o', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('38', '198107092008012002', ' Siska Purnianti, SH.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('39', '195912161989031004', ' W a s i d i', 'III/B', 'Analis Kepegawaian (Jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('40', '198307012009121001', ' Andro Ramadhanu, SH.', 'III/A', 'Analis Kepegawaian (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('41', '196706282007012001', ' Siti Rachmawati', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('42', '197101032007012003', ' N g a t i n i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('43', '196901102007011006', ' Jajang Mulyana', 'II/B', 'Pelaksana Administrasi (Jenjang II)', '0000-00-00', '5', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('44', '197303122007101002', ' W  o  w  o', 'II/A', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('45', '196801081998031002', ' Drs. Rudy R. Effendi, MT.', 'III/D', 'Kasubbid Sarana Kelitbangan', '0000-00-00', '10', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('46', '196606281993032001', ' Dra. Roosdharmawati', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('47', '760000228', ' Drs. Arif Sugiarto, MM.', 'IV/A', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('48', '196401291993111001', ' Maman Tarmansyah, ST., M.Si.', 'III/D', 'Pengolah Penye Penga Barang Jasa (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('49', '198404292010122005', ' Sari Nur Aini, S.IP.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('50', '196005031986021002', 'Aoh  Sukirman', 'III/C', 'Arsiparis Penyelia', '0000-00-00', '8', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('51', '195804051987021001', ' Slamet Suhaedit', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('52', '196706031993011004', ' Dadan Ramdani, A. Md.', 'III/B', 'Pelaksana Administrasi (Jenjang 1)', '0000-00-00', '6', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('53', '196410221989032003', ' Ai Rukmini', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('54', '198509252009121001', ' Haryo Budi Guruminda, ST.', 'III/A', 'Pengolah Kinerja Kelembagaan (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('55', '198808222010122002', ' Rydha Riyana Agustien, S.Si.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '');
INSERT INTO `pegawai` VALUES ('56', '196211251989031003', ' Ir. Lutfi Faizal', 'IV/B', 'Kepala Bidang Standar dan Diseminasi', '0000-00-00', '12', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('57', '198202082006041006', ' Sunarjito, ST, MT', 'III/B', 'Kasubbid Standar', '0000-00-00', '10', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('58', '196805201993031008', ' Ir. Dudi Dofarudin Hakim', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('59', '198602112009121001', ' Resha Febrian, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('60', '198506152009122001', ' Hanna Yuni Hernanti, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('61', '198310302010121002', ' Arif Setiawan, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('62', '198504252010122002', ' Ayu Kristianty Ferina, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('63', '197506292002122002', 'Ratna Iswari Utoro, ST., MT.', 'III/C', 'Penyusun Bimbingan Teknis ', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('64', '196902032007011006', ' T  o  n  i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('65', '196207221991022001', ' Dra. Yulinda Rosa, M.Si.', 'IV/A', 'Kasubbid Diseminasi/Peneliti Madya', '0000-00-00', '11', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('66', '198107142009121001', ' Ajun Hariono, ST., MSc.Eng.', 'III/B', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('67', '195908051984021002', ' G u s w a n d i, S.Sos.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('68', '197002071991032002', ' Neneng Kaniawati S, S.Sos., MM.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 1)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('69', '196605201991021002', ' S o f i y a n, A.Md.', 'III/B', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('70', '196111291993031001', ' Adang Triana', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('71', '197007272007101001', ' Asep Jiwa Praja', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '');
INSERT INTO `pegawai` VALUES ('72', '197109301998031001', ' Iwan Suprijanto, ST., MT.', 'IV/B', 'Kepala Bidang Program dan Kerjasama/ P. Utama', '0000-00-00', '13', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('73', '197104021998031003', ' Sugeng Paryanto, ST., MT.', 'III/C', 'Kasubbid Program dan Evaluasi', '0000-00-00', '10', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('74', '196611021994032002', ' Dra. Sri Sulasmi, MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('75', '198510192008012002', ' Rani Widyahantari, ST.', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('76', '198108152006042003', ' Neripha Ayu C, S.Si, MT', 'III/C', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('77', '198504272010122002', ' Anggi Wulandini, ST.', 'III/A', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('78', '198409222010011008', 'Agung Permana, ST', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('79', '198212032006042001', ' Fani Deviana, ST.', 'III/B', 'Kasubbid Pengembangan Kerjasama', '0000-00-00', '10', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('80', '196307101991032002', ' Lia Yulia Iriani, SH., M.Si.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('81', '195801281980011001', ' Moch.  Pandji Dermawan, A.Md.', 'III/D', 'Pranata Humas Penyelia', '0000-00-00', '8', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('82', '198412312009122001', ' Lucky Adhyati P, ST., MT.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('83', '197504032009021001', 'Mifta Priyanto, ST. MM', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('84', '196911091004021001', ' W  a  r  i  d  j  o', 'III/A', 'Pranata Humas Pelaksana', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('85', '198307032009121001', ' Adhi Yudha Mulia, ST.', 'III/B', 'Penelaah Kerjama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('86', '198510122010122022', ' Sri Maria Senjaya, ST.', 'III/A', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('87', '196710101994031006', ' Hendi Suhendi', 'II/A', 'Pengadmnistrasi Umum', '0000-00-00', '5', 'PNS', '4', '', '');
INSERT INTO `pegawai` VALUES ('88', '196409121991031002', ' Ir. Arvi Argyantoro, MA.', 'IV/B', 'Kepala Balai Tata Bangunan', '0000-00-00', '12', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('89', '196207061997031002', ' Ir. Maryoko Hadi, Dipl.E.Eng., MT.', 'III/D', 'Kasie Penel & Pengembangan', '0000-00-00', '9', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('90', '195207031982012001', ' Ir. Nurhasanah Azhar, MM.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('91', '195102211982031002', ' Ir. Rahim Siahaan, CES.', 'IV/D', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('92', '196407061990032002', ' Ir. Wahyu Wuryanti, MSc.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('93', '195411041979011002', ' W.  S. Witarso, ST.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('94', '197904062006041004', ' Mahatma Sindu Suryo, ST., MT.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('95', '196812032008121001', ' Wahyu Sujatmiko, ST., MT.', 'III/C', 'Penelti Madya', '0000-00-00', '9', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('96', '198005182008012017', ' Frieda Hariyani, ST.', 'III/B', 'Penyusun Monev & Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('97', '198201142006041002', ' Muhammad Nur Fajri A, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('98', '199010102014021002', 'Muhammad Ardimas Riyono, ST', 'III/A', 'Penyusun NSPK (Jenjang 1)', '0000-00-00', '', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('99', '196206071992091001', ' Jonsirwan, SST.', 'III/C', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('100', '196809071996032001', ' Ir. A v e n t i, MT.', 'III/D', 'Peneliti Muda ', '0000-00-00', '9', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('101', '196009191993121001', ' Ir. Nugraha Budi R,  MSc.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('102', '195806041982111002', ' M a r y o n o, BE.', 'III/D', 'Teknisi Litkayasa Penyelia', '0000-00-00', '8', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('103', '198702212008122001', ' Fanny Kusumawati, ST.', 'III/B', 'Penelaah Penerapan & Peltek (jen 2)', '0000-00-00', '7', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('104', '195808141983031008', ' Kamtua Sinaga', 'III/B', 'Teknisi (jenjang 3)', '0000-00-00', '6', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('105', '197808162008121001', ' Fefen Suhedi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('106', '196712132007011004', ' Dede Suhendar', 'II/B', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('107', '195808011986021001', ' Mamang Hidayat', 'II/C', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('108', '196106092007011002', ' U  n  d  a  n  g', 'I/B', 'Pengadministrasi Teknis (Jenjang 3)', '0000-00-00', '4', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('109', '', 'Maryana', '', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('110', ' ', 'Enang Rohiman', ' ', 'Caraka', '0000-00-00', '3', 'PNS', '5', '', '');
INSERT INTO `pegawai` VALUES ('111', '196511301990031001', ' Ir. Arief Sabaruddin, CES.', 'IV/C', 'Kepala Balai Perum dan Lingkungan/ P. Utama', '0000-00-00', '13', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('112', '197107121998032001', ' Ade Erma Setyowati, ST., M.Ec.Dev.', 'III/D', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '9', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('113', '197108121999031002', 'Prof (R) Dr. Andreas Wibowo, ST., MT.', 'IV/B', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('114', '195808131986031002', ' Ir. Puthut Samyahardja, CES., MSc.', 'IV/C', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('115', '195305181982012001', ' Ir. Lya Meilany Setyawaty, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('116', '195104231980112001', ' Ir. Ida Yudiarti Yunus, M.Si.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('117', '195412091986031001', ' Ir. Siti Zubaidah Kurdi, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('118', '195707271988032001', ' Dra. Titi Utami Endang R.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('119', '195708181991032002', ' Dra. Heni Suhaeni, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('120', '195909301998031001', ' Drs. Rusydi Alimaman', 'III/D', 'Pedal Madya', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('121', '198112052005022001', ' Rian Wulan Desriani, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('122', '198202252008122001', ' Fenita Indrasari, ST', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('123', '198202212008011011', ' Arip Pauzi Rachman, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('124', '196410281996031001', ' Rusli, ST., MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('125', '195611261986031003', ' Moch. Edi Nur, ST.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('126', '195603171983031006', ' Wahyu S. Yodhakersa, ST.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('127', '195701191986031001', ' Ir. B u d i o n o', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('128', '196705191994031005', ' Dyan Kardiyanto, SH.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('129', '195802081988031001', ' Drs. Ichwan Subiantoro, CES.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('130', '196111171993031002', ' Drs. Dadi Karyadi', 'III/D', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('131', '196708062001121002', ' Drs. Harri A. Setiadi, MT.', 'III/C', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('132', '196309281996031001', ' Erwin Sudirman, ST.', 'III/B', 'Pengolah data & informasi (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('133', '197911182005021002', ' S. Hidayatullah Santius, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('134', '197108112007011002', ' Iwan Hermawan', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '6', '', '');
INSERT INTO `pegawai` VALUES ('135', '196201201990031001', ' Ir. Sutadji Yuwasdiki, Dipl.E.Eng.', 'IV/B', 'Kepala Balai', '0000-00-00', '12', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('136', '196702081998031002', ' Ir. Johnny Rakhman,  Dipl. E.Eng.', 'III/D', 'Kasie Penelitian & Pengembangan', '0000-00-00', '9', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('137', '195205271981032001', ' Ir. Silvia Fransisca H, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('138', '196511111994021001', ' Ir. Moch. Ridwan, Dipl.E.Eng.', 'IV/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('139', '195704071983031005', 'Cecep Bakheri Bachroni, M. Eng', 'IV/a', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('140', '197412112009111001', ' Tedi Achmad Bahtiar, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('141', '197802192006041005', ' Muhammad Rusli, ST.', 'III/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('142', '198206192006041003', ' Christanto Yudha S S, ST.', 'III/B', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('143', '198612232009121001', ' Chiko Bhakti Mulia W, ST.', 'III/A', 'Penyusun Monev & Pelaporan (jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('144', '198112282005021001', ' Ferri Eka Putra, ST., MDM.', 'III/C', 'Kasie Penerapan & Pelayanan', '0000-00-00', '9', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('145', '198401212009121002', ' Azhar Pangarso , ST., M.Eng.Sc.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('146', '195802101988011001', ' Edoy Kurniadi', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('147', '195805211983031004', ' Sudarmanto', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('148', '198109202010121002', ' Yoga Megantara, ST.', 'III/A', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('149', '198603282010122003', ' Faiza Firlany, A.Md.', 'II/C', 'Penata O&P Laboratprium (Jenjang 1)', '0000-00-00', '6', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('150', '196603262007101001', ' S u r a s m i n', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('151', '196404082007101001', ' J  o  n o', 'II/B', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('152', '196205071994031002', ' Atep Hadri', 'II/A', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('153', '197107172002121001', ' M u l y a n a', 'I/C', 'Penata O&P Laboratorium (Jenjang 3)', '0000-00-00', '4', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('154', ' ', 'Hend Mustofa', ' ', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '7', '', '');
INSERT INTO `pegawai` VALUES ('155', '196003081989021001', ' Ir. Sudradjat, Dipl.SE. M.Eng.', 'IV/B', 'KEPALA BALAI AIR MINUM DAN PLP', '0000-00-00', '12', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('156', '196808021998032004', ' Ir. Fitrijani Anggraini, MT.', 'IV/A', 'Kasie Litbang/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('157', '195806261986031001', ' S a r b i d i, ST., MT.', 'IV/B', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('158', '196312121990012001', ' Ir. Ida Medawati, MT.', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('159', '196603031993032002', ' Dra. Tuti Kustiasih', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('160', '195912281990011001', ' T  o  h  i  r, ST., MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('161', '195804081978121001', ' Dadang Sobana, ST.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('162', '197301101998032004', ' Elis Hastuti, ST., MSc. ', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('163', '195906131990032001', ' Dra. Aryenti', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('164', '199001142014022006', 'Amallia Ashuri, S.T.', 'III/A', 'Teknisi', '0000-00-00', '7', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('165', '196907151996032001', ' Ir. Sri Darwati, MSc.', 'IV/A', 'Kasie Penerapan dan Pelayanan/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('166', '195710151982111001', ' Atang Sarbini, ST.', 'III/D', 'Perekayasa Madya', '0000-00-00', '9', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('167', '196104281990031004', ' Drs. R. Mukti Budiman', 'IV/A', 'Perekayasa Madya', '0000-00-00', '11', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('168', '197304241999012001', 'Reni Nuraeni, ST, MT', 'III/D', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('169', '195906081983031005', ' M u l y a n a, BE.', 'III/C', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('170', '198712302010122004', ' Siti Dahniar Indrayanti, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('171', '199003012014022002', 'Erma Mustika Sari, A.Md', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('172', '197003152007011005', ' Agus Sugiarto', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('173', '197204122007011003', ' Asep Hidayat', 'I/D', 'Pelaksana Administrasi (Jenjang1)', '0000-00-00', '4', 'PNS', '8', '', '');
INSERT INTO `pegawai` VALUES ('174', '196010091992031002', ' Ir. Agus Sarwono', 'IV/B', 'Kepala Balai Bahan Bangunan', '0000-00-00', '12', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('175', '195605061979031003', ' L a s i n o, ST., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('176', '196501071991032002', ' Ir. Nurul Aini Sulistyowati, MT.', 'IV/B', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '11', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('177', '195107161977112001', ' Andriati Amir Husin, M.Si., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('178', '195003031973011001', ' P u r w i t o, Dipl.E.Eng.', 'IV/C', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('179', '195911301993031001', ' Ir. Bambang Sugiharto, MT.', 'IV/A', 'Penyusun NSPK (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('180', '195603261983021001', ' Aan Sugiarto, BAE.', 'III/D', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('181', '198104012006041002', ' Dany Cahyadi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('182', '198403292009121002', ' Arif Noviayanto, ST.', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('183', '196211011993031002', ' Ir. Dadri Arbriyakto, MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('184', '198710152009121001', ' Arkadia Rhamo, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('185', '197103011994021001', ' R u s y a n a, A. Md.', 'III/B', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('186', '196808151994021001', ' I s m o n o', 'III/B', 'Penyelenggaran Layanan Teknis (Jenj 1)', '0000-00-00', '6', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('187', '195803231982121001', ' S u d i o n o', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('188', '196209031989031006', ' S u r a d i', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('189', '196508211993011004', ' Asep Kosasih', 'III/B', 'Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('190', '198512262011012011', 'Indriansi Nirwana, ST.', 'III/A', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('191', '198411132010121003', ' Moh. Anwar Mussaddad, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 2)', '0000-00-00', '6', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('192', '197010192007011002', ' Gultom Obet Haposan ', 'II/B', 'Pengadministrasi Teknis (Jenjang 2)', '0000-00-00', '5', 'PNS', '9', '', '');
INSERT INTO `pegawai` VALUES ('193', ' ', 'Usup Ruswandi', ' ', ' ', '0000-00-00', '', 'PNS', '9', '', '');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_pengguna` int(15) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pengguna`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('1', '1', 'Admin', '1234', 'Cimahi', 'admin@admin.com', 'admin', '0cc175b9c0f1b6a831c399e269772661', '123456');
INSERT INTO `pengguna` VALUES ('4', '1', 'Ratih', '222', 'cimahi', 'riza.fauzi.rahman@gmail.com', 'ratih', 'a5bd72a3d2c4d1686415f93a46fc7a0a', '222');
INSERT INTO `pengguna` VALUES ('5', '1', 'riza', '123456', 'cimahi', 'riza.fauzi.rahman@gmail.com', 'riza', 'd5f275885bd96778f7f01c814e405e7c', '1111');
INSERT INTO `pengguna` VALUES ('6', '2', 'tes', '222', 'tes', 'tes@tes.com', 'tes', '0cc175b9c0f1b6a831c399e269772661', '222');
INSERT INTO `pengguna` VALUES ('7', '1', 'Admin123', '1234', 'Cimahi', 'admin@admin.com', 'admin123', '21232f297a57a5a743894a0e4a801fc3', '123456');
INSERT INTO `pengguna` VALUES ('8', '1', 'Admin123456', '1234', 'Cimahi', 'admin@admin.com', 'admin123456', '21232f297a57a5a743894a0e4a801fc3', '123456');
INSERT INTO `pengguna` VALUES ('9', '1', 'taufik', '0009999', 'baleendah', 'ti.abdilah@gmail.com', 'opik123', 'a96697c9ced48372369b18fb47c003c0', '098234');
INSERT INTO `pengguna` VALUES ('10', '1', 'operator', '', '', '', 'operator', '0cc175b9c0f1b6a831c399e269772661', '');
INSERT INTO `pengguna` VALUES ('11', '2', '', '', '', '', 'eselon4', '0cc175b9c0f1b6a831c399e269772661', '');

-- ----------------------------
-- Table structure for perjalanan_dinas
-- ----------------------------
DROP TABLE IF EXISTS `perjalanan_dinas`;
CREATE TABLE `perjalanan_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_anggaran` varchar(25) NOT NULL,
  `jumlah_tujuan` int(2) NOT NULL,
  `maksud_perjalanan` varchar(250) NOT NULL,
  `jadwal_berangkat_1` date NOT NULL,
  `jadwal_berangkat_2` date DEFAULT NULL,
  `jadwal_berangkat_3` date DEFAULT NULL,
  `jadwal_pulang_1` date NOT NULL,
  `jadwal_pulang_2` date DEFAULT NULL,
  `jadwal_pulang_3` date DEFAULT NULL,
  `kota_tujuan_1` varchar(25) NOT NULL,
  `kota_tujuan_2` varchar(25) DEFAULT NULL,
  `kota_tujuan_3` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perjalanan_dinas
-- ----------------------------
INSERT INTO `perjalanan_dinas` VALUES ('1', 'Auto Generated', '5', '2', '3', 'maksud satu', '2015-04-20', '2015-04-21', '2015-04-22', '2015-04-21', '2015-04-22', '2015-04-23', '1', '2', '1');
INSERT INTO `perjalanan_dinas` VALUES ('2', '-', '2', '2', '1', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000-00-00', null, null, '0000-00-00', null, null, '1', null, null);
INSERT INTO `perjalanan_dinas` VALUES ('3', '-', '0', '2', '1', 'sssssssssssssssssssss', '2015-04-27', null, null, '2015-04-27', null, null, '19', null, null);
INSERT INTO `perjalanan_dinas` VALUES ('4', '-', '0', '2', '3', 'wwwwwwwwwwwwwwwwwwww1111111111111111', '2015-04-27', '2015-04-28', '2015-04-29', '2015-04-27', '2015-04-28', '2015-04-29', '17', '18', '19');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'operator');
INSERT INTO `role` VALUES ('2', 'esselon 4');
INSERT INTO `role` VALUES ('3', 'esselon 3');
INSERT INTO `role` VALUES ('4', 'asisten satker');
INSERT INTO `role` VALUES ('5', 'kepala satker');

-- ----------------------------
-- Table structure for transaksi_perjalanandinas_detail
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_perjalanandinas_detail`;
CREATE TABLE `transaksi_perjalanandinas_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_perjalanandinas_header` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `transport_pendukung` varchar(25) NOT NULL,
  `jenis_penginapan` varchar(25) NOT NULL,
  `pengeluaran_riil` varchar(50) NOT NULL,
  `jadwal_berangkat` date NOT NULL,
  `jadwal_pulang` date NOT NULL,
  `biaya_akomodasi` int(50) NOT NULL,
  `biaya_penginapan` int(50) NOT NULL,
  `kota_tujuan` varchar(250) NOT NULL,
  `transport_utama` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_perjalanandinas_detail
-- ----------------------------
INSERT INTO `transaksi_perjalanandinas_detail` VALUES ('71', '1', '4', '25000', 'Hotel', '75000', '2015-04-20', '2015-04-21', '1000000', '500000', 'Banda Aceh', '1500000');
INSERT INTO `transaksi_perjalanandinas_detail` VALUES ('72', '1', '4', '25000', 'Hotel', '75000', '2015-04-21', '2015-04-22', '700000', '200000', 'Banda Aceh', null);
INSERT INTO `transaksi_perjalanandinas_detail` VALUES ('73', '1', '48', '25000', 'Hotel', '75000', '2015-04-22', '2015-04-23', '1000000', '500000', 'Banda Aceh', null);

-- ----------------------------
-- Table structure for transaksi_perjalanandinas_header
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_perjalanandinas_header`;
CREATE TABLE `transaksi_perjalanandinas_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(50) NOT NULL,
  `status_approval` varchar(25) NOT NULL,
  `id_anggaran` varchar(25) NOT NULL,
  `jumlah_tujuan` int(2) NOT NULL,
  `maksud_perjalanan_1` varchar(250) NOT NULL,
  `maksud_perjalanan_2` varchar(250) NOT NULL,
  `maksud_perjalanan_3` varchar(250) NOT NULL,
  `jadwal_berangkat_1` date NOT NULL,
  `jadwal_berangkat_2` date NOT NULL,
  `jadwal_berangkat_3` date NOT NULL,
  `jadwal_pulang_1` date NOT NULL,
  `jadwal_pulang_2` date NOT NULL,
  `jadwal_pulang_3` date NOT NULL,
  `kota_tujuan_1` varchar(25) NOT NULL,
  `kota_tujuan_2` varchar(25) NOT NULL,
  `kota_tujuan_3` varchar(25) NOT NULL,
  `transport_utama_1` varchar(50) NOT NULL,
  `transport_utama_2` varchar(50) NOT NULL,
  `transport_utama_3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_perjalanandinas_header
-- ----------------------------
INSERT INTO `transaksi_perjalanandinas_header` VALUES ('1', 'Auto Generated', '5', '2', '3', 'maksud satu', 'maksud dua', 'maksud tiga', '2015-04-20', '2015-04-21', '2015-04-22', '2015-04-21', '2015-04-22', '2015-04-23', '1', '2', '1', '0', '0', '0');
INSERT INTO `transaksi_perjalanandinas_header` VALUES ('2', 'Auto Generated', '1', '0', '0', '0', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for transportasi
-- ----------------------------
DROP TABLE IF EXISTS `transportasi`;
CREATE TABLE `transportasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_moda` varchar(25) NOT NULL,
  `nama_moda` varchar(50) NOT NULL,
  `biaya_perjalanan` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transportasi
-- ----------------------------

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(50) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `kepala` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES ('1', 'BTU', 'Bagian Tata Usaha', '2');
INSERT INTO `unit` VALUES ('2', 'BSDK', 'Bidang Sumber Daya Kelitbangan', '34');
INSERT INTO `unit` VALUES ('3', 'BSD', 'Bidang Standar Dan Diseminasi', '56');
INSERT INTO `unit` VALUES ('4', 'BPK', 'Bidang Program Dan Kerjasama ', '72');
INSERT INTO `unit` VALUES ('5', 'BTB', 'Balai Tata Bangunan', '88');
INSERT INTO `unit` VALUES ('6', 'BPL', 'Balai Perumahan Dan Lingkungan', '111');
INSERT INTO `unit` VALUES ('7', 'BSKB', 'Balai Struktur Dan Konstruksi Bangunan', '135');
INSERT INTO `unit` VALUES ('8', 'BAMP', 'Balai Air Minum Dan PLP. ', '155');
INSERT INTO `unit` VALUES ('9', 'BBB', 'Balai  Bahan  Bangunan', '174');
INSERT INTO `unit` VALUES ('10', 'SATKER', 'Satker', '0');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
