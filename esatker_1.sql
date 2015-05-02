-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2015 at 06:14 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esatker_1`
--
CREATE DATABASE `esatker_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esatker_1`;

-- --------------------------------------------------------

--
-- Table structure for table `akomodasi_perjalanan`
--

CREATE TABLE IF NOT EXISTS `akomodasi_perjalanan` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `akomodasi_perjalanan`
--


-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `kode_akun`, `jenis_belanja`) VALUES
(1, 521211, 'Belanja Bahan'),
(2, 521213, 'Honor output kegiatan'),
(3, 521219, 'Belanja Barang Non Operas'),
(4, 521811, 'Belanja Barang Untuk Pers'),
(5, 522141, 'Belanja Sewa'),
(6, 522151, 'Belanja Jasa Profesi'),
(7, 524111, 'Belanja Perjalanan Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(25) NOT NULL,
  `id_akun` varchar(50) NOT NULL,
  `pagu` varchar(100) NOT NULL,
  `tahun_anggaran` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `id_kegiatan`, `id_akun`, `pagu`, `tahun_anggaran`) VALUES
(2, '1', '1', '4000000', 2015),
(3, '1', '2', '1000000', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE IF NOT EXISTS `approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(25) NOT NULL,
  `kode_jabatan` varchar(25) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `approval`
--


-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `pagu_harga` varchar(20) NOT NULL,
  `kode_jenis_barang` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `pagu_harga`, `kode_jenis_barang`) VALUES
(1, 'KOM001', 'Monitor LCD (Toshiba)', 'pcs', '1500000', 'Bahan Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(25) NOT NULL,
  `status_pegawai` varchar(25) DEFAULT NULL,
  `golongan` varchar(25) DEFAULT NULL,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya`
--


-- --------------------------------------------------------

--
-- Table structure for table `biaya_akomodasi`
--

CREATE TABLE IF NOT EXISTS `biaya_akomodasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(25) DEFAULT NULL,
  `status_pegawai` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `biaya_akomodasi`
--

INSERT INTO `biaya_akomodasi` (`id`, `nama_kota`, `status_pegawai`, `biaya`) VALUES
(1, 'ACEH', 'PNS', 360000),
(2, 'SUMATERA UTARA', 'PNS', 370000),
(3, 'RIAU', 'PNS', 370000),
(4, 'KEPULAUAN RIAU', 'PNS', 370000),
(5, 'JAMBI', 'PNS', 370000),
(6, 'SUMATERA BARAT', 'PNS', 380000),
(7, 'SUMATERA SELATAN', 'PNS', 380000),
(8, 'LAMPUNG', 'PNS', 380000),
(9, 'BENGKULU', 'PNS', 380000),
(10, 'BANGKA BELITUNG', 'PNS', 410000),
(11, 'BANTEN', 'PNS', 370000),
(12, 'JAWA BARAT', 'PNS', 430000),
(13, 'D.K.I   JAKARTA', 'PNS', 530000),
(14, 'JAWA TENGAH', 'PNS', 370000),
(15, 'D.I.  YOGYAKARTA', 'PNS', 420000),
(16, 'JAWA TIMUR', 'PNS', 410000),
(17, 'B A L I', 'PNS', 480000),
(18, 'NUSA TENGGARA BARAT', 'PNS', 440000),
(19, 'NUSA TENGGARA TIMUR', 'PNS', 430000),
(20, 'KALIMANTAN BARAT', 'PNS', 380000),
(21, 'KALIMANTAN TENGAH', 'PNS', 360000),
(22, 'KALIMANTAN SELATAN', 'PNS', 380000),
(23, 'KALIMANTAN TIMUR', 'PNS', 430000),
(24, 'KALIMANTAN UTARA ', 'PNS', 430000),
(25, 'SULAWESI UTARA', 'PNS', 370000),
(26, 'GORONTALO', 'PNS', 370000),
(27, 'SULAWESI BARAT', 'PNS', 410000),
(28, 'SULAWESI SELATAN', 'PNS', 430000),
(29, 'SULAWESI TENGAH', 'PNS', 370000),
(30, 'SULAWESI TENGGARA', 'PNS', 380000),
(31, 'MALUKU', 'PNS', 380000),
(32, 'MALUKU UTARA', 'PNS', 430000),
(33, 'PAPUA', 'PNS', 580000),
(34, 'PAPUA BARAT', 'PNS', 480000),
(35, 'ACEH', 'Non PNS (S1)', 250000),
(36, 'SUMATERA UTARA', 'Non PNS (S1)', 250000),
(37, 'RIAU', 'Non PNS (S1)', 250000),
(38, 'KEPULAUAN RIAU', 'Non PNS (S1)', 250000),
(39, 'JAMBI', 'Non PNS (S1)', 250000),
(40, 'SUMATERA BARAT', 'Non PNS (S1)', 250000),
(41, 'SUMATERA SELATAN', 'Non PNS (S1)', 250000),
(42, 'LAMPUNG', 'Non PNS (S1)', 250000),
(43, 'BENGKULU', 'Non PNS (S1)', 250000),
(44, 'BANGKA BELITUNG', 'Non PNS (S1)', 275000),
(45, 'BANTEN', 'Non PNS (S1)', 250000),
(46, 'JAWA BARAT', 'Non PNS (S1)', 275000),
(47, 'D.K.I   JAKARTA', 'Non PNS (S1)', 300000),
(48, 'JAWA TENGAH', 'Non PNS (S1)', 275000),
(49, 'D.I.  YOGYAKARTA', 'Non PNS (S1)', 275000),
(50, 'JAWA TIMUR', 'Non PNS (S1)', 275000),
(51, 'B A L I', 'Non PNS (S1)', 275000),
(52, 'NUSA TENGGARA BARAT', 'Non PNS (S1)', 275000),
(53, 'NUSA TENGGARA TIMUR', 'Non PNS (S1)', 275000),
(54, 'KALIMANTAN BARAT', 'Non PNS (S1)', 250000),
(55, 'KALIMANTAN TENGAH', 'Non PNS (S1)', 250000),
(56, 'KALIMANTAN SELATAN', 'Non PNS (S1)', 250000),
(57, 'KALIMANTAN TIMUR', 'Non PNS (S1)', 275000),
(58, 'KALIMANTAN UTARA ', 'Non PNS (S1)', 275000),
(59, 'SULAWESI UTARA', 'Non PNS (S1)', 250000),
(60, 'GORONTALO', 'Non PNS (S1)', 250000),
(61, 'SULAWESI BARAT', 'Non PNS (S1)', 275000),
(62, 'SULAWESI SELATAN', 'Non PNS (S1)', 275000),
(63, 'SULAWESI TENGAH', 'Non PNS (S1)', 250000),
(64, 'SULAWESI TENGGARA', 'Non PNS (S1)', 250000),
(65, 'MALUKU', 'Non PNS (S1)', 250000),
(66, 'MALUKU UTARA', 'Non PNS (S1)', 275000),
(67, 'PAPUA', 'Non PNS (S1)', 300000),
(68, 'PAPUA BARAT', 'Non PNS (S1)', 275000),
(69, 'ACEH', 'Non PNS (D3)', 225000),
(70, 'SUMATERA UTARA', 'Non PNS (D3)', 225000),
(71, 'RIAU', 'Non PNS (D3)', 225000),
(72, 'KEPULAUAN RIAU', 'Non PNS (D3)', 225000),
(73, 'JAMBI', 'Non PNS (D3)', 225000),
(74, 'SUMATERA BARAT', 'Non PNS (D3)', 225000),
(75, 'SUMATERA SELATAN', 'Non PNS (D3)', 225000),
(76, 'LAMPUNG', 'Non PNS (D3)', 225000),
(77, 'BENGKULU', 'Non PNS (D3)', 225000),
(78, 'BANGKA BELITUNG', 'Non PNS (D3)', 250000),
(79, 'BANTEN', 'Non PNS (D3)', 225000),
(80, 'JAWA BARAT', 'Non PNS (D3)', 250000),
(81, 'D.K.I   JAKARTA', 'Non PNS (D3)', 275000),
(82, 'JAWA TENGAH', 'Non PNS (D3)', 250000),
(83, 'D.I.  YOGYAKARTA', 'Non PNS (D3)', 250000),
(84, 'JAWA TIMUR', 'Non PNS (D3)', 250000),
(85, 'B A L I', 'Non PNS (D3)', 250000),
(86, 'NUSA TENGGARA BARAT', 'Non PNS (D3)', 250000),
(87, 'NUSA TENGGARA TIMUR', 'Non PNS (D3)', 250000),
(88, 'KALIMANTAN BARAT', 'Non PNS (D3)', 225000),
(89, 'KALIMANTAN TENGAH', 'Non PNS (D3)', 225000),
(90, 'KALIMANTAN SELATAN', 'Non PNS (D3)', 225000),
(91, 'KALIMANTAN TIMUR', 'Non PNS (D3)', 250000),
(92, 'KALIMANTAN UTARA ', 'Non PNS (D3)', 250000),
(93, 'SULAWESI UTARA', 'Non PNS (D3)', 225000),
(94, 'GORONTALO', 'Non PNS (D3)', 225000),
(95, 'SULAWESI BARAT', 'Non PNS (D3)', 250000),
(96, 'SULAWESI SELATAN', 'Non PNS (D3)', 250000),
(97, 'SULAWESI TENGAH', 'Non PNS (D3)', 225000),
(98, 'SULAWESI TENGGARA', 'Non PNS (D3)', 225000),
(99, 'MALUKU', 'Non PNS (D3)', 225000),
(100, 'MALUKU UTARA', 'Non PNS (D3)', 250000),
(101, 'PAPUA', 'Non PNS (D3)', 275000),
(102, 'PAPUA BARAT', 'Non PNS (D3)', 250000),
(103, 'ACEH', 'Non PNS (SMU)', 200000),
(104, 'SUMATERA UTARA', 'Non PNS (SMU)', 200000),
(105, 'RIAU', 'Non PNS (SMU)', 200000),
(106, 'KEPULAUAN RIAU', 'Non PNS (SMU)', 200000),
(107, 'JAMBI', 'Non PNS (SMU)', 200000),
(108, 'SUMATERA BARAT', 'Non PNS (SMU)', 200000),
(109, 'SUMATERA SELATAN', 'Non PNS (SMU)', 200000),
(110, 'LAMPUNG', 'Non PNS (SMU)', 200000),
(111, 'BENGKULU', 'Non PNS (SMU)', 200000),
(112, 'BANGKA BELITUNG', 'Non PNS (SMU)', 225000),
(113, 'BANTEN', 'Non PNS (SMU)', 200000),
(114, 'JAWA BARAT', 'Non PNS (SMU)', 225000),
(115, 'D.K.I   JAKARTA', 'Non PNS (SMU)', 250000),
(116, 'JAWA TENGAH', 'Non PNS (SMU)', 225000),
(117, 'D.I.  YOGYAKARTA', 'Non PNS (SMU)', 225000),
(118, 'JAWA TIMUR', 'Non PNS (SMU)', 225000),
(119, 'B A L I', 'Non PNS (SMU)', 225000),
(120, 'NUSA TENGGARA BARAT', 'Non PNS (SMU)', 225000),
(121, 'NUSA TENGGARA TIMUR', 'Non PNS (SMU)', 225000),
(122, 'KALIMANTAN BARAT', 'Non PNS (SMU)', 200000),
(123, 'KALIMANTAN TENGAH', 'Non PNS (SMU)', 200000),
(124, 'KALIMANTAN SELATAN', 'Non PNS (SMU)', 200000),
(125, 'KALIMANTAN TIMUR', 'Non PNS (SMU)', 225000),
(126, 'KALIMANTAN UTARA ', 'Non PNS (SMU)', 225000),
(127, 'SULAWESI UTARA', 'Non PNS (SMU)', 200000),
(128, 'GORONTALO', 'Non PNS (SMU)', 200000),
(129, 'SULAWESI BARAT', 'Non PNS (SMU)', 225000),
(130, 'SULAWESI SELATAN', 'Non PNS (SMU)', 225000),
(131, 'SULAWESI TENGAH', 'Non PNS (SMU)', 200000),
(132, 'SULAWESI TENGGARA', 'Non PNS (SMU)', 200000),
(133, 'MALUKU', 'Non PNS (SMU)', 200000),
(134, 'MALUKU UTARA', 'Non PNS (SMU)', 225000),
(135, 'PAPUA', 'Non PNS (SMU)', 250000),
(136, 'PAPUA BARAT', 'Non PNS (SMU)', 225000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_penginapan`
--

CREATE TABLE IF NOT EXISTS `biaya_penginapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(25) NOT NULL,
  `golongan` varchar(25) DEFAULT NULL,
  `biaya` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `biaya_penginapan`
--

INSERT INTO `biaya_penginapan` (`id`, `nama_kota`, `golongan`, `biaya`) VALUES
(1, 'ACEH', 'IV', 1080000),
(2, 'SUMATERA UTARA', 'IV', 703000),
(3, 'RIAU', 'IV', 868000),
(4, 'KEPULAUAN RIAU', 'IV', 650000),
(5, 'JAMBI', 'IV', 697000),
(6, 'SUMATERA BARAT', 'IV', 884000),
(7, 'SUMATERA SELATAN', 'IV', 605000),
(8, 'LAMPUNG', 'IV', 790000),
(9, 'BENGKULU', 'IV', 712000),
(10, 'BANGKA BELITUNG', 'IV', 850000),
(11, 'BANTEN', 'IV', 1024000),
(12, 'JAWA BARAT', 'IV', 949000),
(13, 'D.K.I   JAKARTA', 'IV', 800000),
(14, 'JAWA TENGAH', 'IV', 1024000),
(15, 'D.I.  YOGYAKARTA', 'IV', 747000),
(16, 'JAWA TIMUR', 'IV', 841000),
(17, 'B A L I', 'IV', 1304000),
(18, 'NUSA TENGGARA BARAT', 'IV', 737000),
(19, 'NUSA TENGGARA TIMUR', 'IV', 700000),
(20, 'KALIMANTAN BARAT', 'IV', 866000),
(21, 'KALIMANTAN TENGAH', 'IV', 923000),
(22, 'KALIMANTAN SELATAN', 'IV', 816000),
(23, 'KALIMANTAN TIMUR', 'IV', 1596000),
(24, 'KALIMANTAN UTARA ', 'IV', 1596000),
(25, 'SULAWESI UTARA', 'IV', 640000),
(26, 'GORONTALO', 'IV', 910000),
(27, 'SULAWESI BARAT', 'IV', 910000),
(28, 'SULAWESI SELATAN', 'IV', 968000),
(29, 'SULAWESI TENGAH', 'IV', 894000),
(30, 'SULAWESI TENGGARA', 'IV', 802000),
(31, 'MALUKU', 'IV', 680000),
(32, 'MALUKU UTARA', 'IV', 600000),
(33, 'PAPUA', 'IV', 754000),
(34, 'PAPUA BARAT', 'IV', 976000),
(35, 'ACEH', 'III', 410000),
(36, 'SUMATERA UTARA', 'III', 505000),
(37, 'RIAU', 'III', 450000),
(38, 'KEPULAUAN RIAU', 'III', 502000),
(39, 'JAMBI', 'III', 382000),
(40, 'SUMATERA BARAT', 'III', 477000),
(41, 'SUMATERA SELATAN', 'III', 514000),
(42, 'LAMPUNG', 'III', 374000),
(43, 'BENGKULU', 'III', 599000),
(44, 'BANGKA BELITUNG', 'III', 533000),
(45, 'BANTEN', 'III', 797000),
(46, 'JAWA BARAT', 'III', 515000),
(47, 'D.K.I   JAKARTA', 'III', 610000),
(48, 'JAWA TENGAH', 'III', 497000),
(49, 'D.I.  YOGYAKARTA', 'III', 629000),
(50, 'JAWA TIMUR', 'III', 499000),
(51, 'B A L I', 'III', 904000),
(52, 'NUSA TENGGARA BARAT', 'III', 540000),
(53, 'NUSA TENGGARA TIMUR', 'III', 662000),
(54, 'KALIMANTAN BARAT', 'III', 430000),
(55, 'KALIMANTAN TENGAH', 'III', 558000),
(56, 'KALIMANTAN SELATAN', 'III', 500000),
(57, 'KALIMANTAN TIMUR', 'III', 550000),
(58, 'KALIMANTAN UTARA ', 'III', 550000),
(59, 'SULAWESI UTARA', 'III', 549000),
(60, 'GORONTALO', 'III', 423000),
(61, 'SULAWESI BARAT', 'III', 425000),
(62, 'SULAWESI SELATAN', 'III', 539000),
(63, 'SULAWESI TENGAH', 'III', 493000),
(64, 'SULAWESI TENGGARA', 'III', 488000),
(65, 'MALUKU', 'III', 545000),
(66, 'MALUKU UTARA', 'III', 478000),
(67, 'PAPUA', 'III', 460000),
(68, 'PAPUA BARAT', 'III', 798000),
(69, 'ACEH', 'I', 370000),
(70, 'SUMATERA UTARA', 'I', 310000),
(71, 'RIAU', 'I', 380000),
(72, 'KEPULAUAN RIAU', 'I', 280000),
(73, 'JAMBI', 'I', 290000),
(74, 'SUMATERA BARAT', 'I', 370000),
(75, 'SUMATERA SELATAN', 'I', 310000),
(76, 'LAMPUNG', 'I', 356000),
(77, 'BENGKULU', 'I', 510000),
(78, 'BANGKA BELITUNG', 'I', 304000),
(79, 'BANTEN', 'I', 400000),
(80, 'JAWA BARAT', 'I', 463000),
(81, 'D.K.I   JAKARTA', 'I', 400000),
(82, 'JAWA TENGAH', 'I', 350000),
(83, 'D.I.  YOGYAKARTA', 'I', 461000),
(84, 'JAWA TIMUR', 'I', 329000),
(85, 'B A L I', 'I', 658000),
(86, 'NUSA TENGGARA BARAT', 'I', 360000),
(87, 'NUSA TENGGARA TIMUR', 'I', 400000),
(88, 'KALIMANTAN BARAT', 'I', 361000),
(89, 'KALIMANTAN TENGAH', 'I', 436000),
(90, 'KALIMANTAN SELATAN', 'I', 379000),
(91, 'KALIMANTAN TIMUR', 'I', 450000),
(92, 'KALIMANTAN UTARA ', 'I', 450000),
(93, 'SULAWESI UTARA', 'I', 342000),
(94, 'GORONTALO', 'I', 240000),
(95, 'SULAWESI BARAT', 'I', 360000),
(96, 'SULAWESI SELATAN', 'I', 378000),
(97, 'SULAWESI TENGAH', 'I', 389000),
(98, 'SULAWESI TENGGARA', 'I', 420000),
(99, 'MALUKU', 'I', 414000),
(100, 'MALUKU UTARA', 'I', 380000),
(101, 'PAPUA', 'I', 414000),
(102, 'PAPUA BARAT', 'I', 370000),
(103, 'ACEH', 'II', 370000),
(104, 'SUMATERA UTARA', 'II', 310000),
(105, 'RIAU', 'II', 380000),
(106, 'KEPULAUAN RIAU', 'II', 280000),
(107, 'JAMBI', 'II', 290000),
(108, 'SUMATERA BARAT', 'II', 370000),
(109, 'SUMATERA SELATAN', 'II', 310000),
(110, 'LAMPUNG', 'II', 356000),
(111, 'BENGKULU', 'II', 510000),
(112, 'BANGKA BELITUNG', 'II', 304000),
(113, 'BANTEN', 'II', 400000),
(114, 'JAWA BARAT', 'II', 463000),
(115, 'D.K.I   JAKARTA', 'II', 400000),
(116, 'JAWA TENGAH', 'II', 350000),
(117, 'D.I.  YOGYAKARTA', 'II', 461000),
(118, 'JAWA TIMUR', 'II', 329000),
(119, 'B A L I', 'II', 658000),
(120, 'NUSA TENGGARA BARAT', 'II', 360000),
(121, 'NUSA TENGGARA TIMUR', 'II', 400000),
(122, 'KALIMANTAN BARAT', 'II', 361000),
(123, 'KALIMANTAN TENGAH', 'II', 436000),
(124, 'KALIMANTAN SELATAN', 'II', 379000),
(125, 'KALIMANTAN TIMUR', 'II', 450000),
(126, 'KALIMANTAN UTARA ', 'II', 450000),
(127, 'SULAWESI UTARA', 'II', 342000),
(128, 'GORONTALO', 'II', 240000),
(129, 'SULAWESI BARAT', 'II', 360000),
(130, 'SULAWESI SELATAN', 'II', 378000),
(131, 'SULAWESI TENGAH', 'II', 389000),
(132, 'SULAWESI TENGGARA', 'II', 420000),
(133, 'MALUKU', 'II', 414000),
(134, 'MALUKU UTARA', 'II', 380000),
(135, 'PAPUA', 'II', 414000),
(136, 'PAPUA BARAT', 'II', 370000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_sewa`
--

CREATE TABLE IF NOT EXISTS `biaya_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_sewa`
--


-- --------------------------------------------------------

--
-- Table structure for table `biaya_tiket`
--

CREATE TABLE IF NOT EXISTS `biaya_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_asal` varchar(25) DEFAULT NULL,
  `kota_tujuan` varchar(25) DEFAULT NULL,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `biaya_tiket`
--

INSERT INTO `biaya_tiket` (`id`, `kota_asal`, `kota_tujuan`, `jenis_kendaraan`, `biaya`) VALUES
(2, 'Bandung', 'Jakarta', 'Kereta Api', 1500000),
(3, 'Jakarta', 'Bandung', 'Pesawat', 700000),
(4, 'Bandung', 'Banda Aceh', 'Pesawat', 1500000),
(5, 'Bandung', 'Medan', 'Pesawat', 700000),
(7, 'Bandung', 'Jakarta', 'Pesawat', 700000),
(8, 'Bandung', 'Surabaya', 'Pesawat', 1500000),
(9, 'Bandung', 'Banjarmasin', 'Pesawat', 700000),
(10, 'Bandung', 'Padang', 'Pesawat', 1500000),
(11, 'Bandung', 'Manokwari', 'Pesawat', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_transport_dlm_kota`
--

CREATE TABLE IF NOT EXISTS `biaya_transport_dlm_kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_transport_dlm_kota`
--


-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern` varchar(20) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `pattern`, `counter`) VALUES
(1, 'IV-2015', 5),
(2, 'asdf12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_perjalanan_dinas`
--

CREATE TABLE IF NOT EXISTS `detail_perjalanan_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jenis_biaya` varchar(25) NOT NULL,
  `kota_asal` varchar(25) DEFAULT NULL,
  `kota_tujuan` varchar(25) DEFAULT NULL,
  `jenis_penginapan` varchar(25) DEFAULT NULL,
  `jenis_kendaraan` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `detail_perjalanan_dinas`
--

INSERT INTO `detail_perjalanan_dinas` (`id`, `id_pegawai`, `id_header`, `tgl_berangkat`, `tgl_pulang`, `jenis_biaya`, `kota_asal`, `kota_tujuan`, `jenis_penginapan`, `jenis_kendaraan`, `biaya`) VALUES
(1, 112, 3, '2015-04-27', '2015-04-27', 'harian', NULL, '0', NULL, NULL, 380000),
(2, 112, 3, '2015-04-27', '2015-04-27', 'penginapan', NULL, '0', 'Hotel', NULL, 356000),
(3, 112, 3, '2015-04-27', '2015-04-27', 'transport_utama', '0', '0', NULL, '', 0),
(4, 112, 3, '2015-04-27', '2015-04-27', 'transport_pendukung', NULL, NULL, NULL, NULL, 120000),
(5, 112, 3, '2015-04-27', '2015-04-27', 'representatif', NULL, NULL, NULL, NULL, 0),
(6, 112, 3, '2015-04-27', '2015-04-27', 'riil', NULL, NULL, NULL, NULL, 100000),
(7, 180, 6, '2015-04-30', '2015-05-02', 'harian', NULL, 'Jakarta', NULL, NULL, 1590000),
(8, 180, 6, '2015-04-30', '2015-05-02', 'penginapan', NULL, 'Jakarta', 'Hotel', NULL, 1220000),
(9, 180, 6, '2015-04-30', '2015-05-02', 'transport_utama', 'Bandung', 'Jakarta', NULL, 'Pesawat', 1400000),
(10, 180, 6, '2015-04-30', '2015-05-02', 'transport_pendukung', NULL, 'Jakarta', NULL, NULL, 100000),
(11, 180, 6, '2015-04-30', '2015-05-02', 'representatif', NULL, 'Jakarta', NULL, NULL, 0),
(12, 180, 6, '2015-04-30', '2015-05-02', 'riil', NULL, 'Jakarta', NULL, NULL, 200000),
(13, 10, 6, '2015-04-30', '2015-05-02', 'harian', NULL, 'Jakarta', NULL, NULL, 1590000),
(14, 10, 6, '2015-04-30', '2015-05-02', 'penginapan', NULL, 'Jakarta', 'Hotel', NULL, 1220000),
(15, 10, 6, '2015-04-30', '2015-05-02', 'transport_utama', 'Bandung', 'Jakarta', NULL, 'Pesawat', 1400000),
(16, 10, 6, '2015-04-30', '2015-05-02', 'transport_pendukung', NULL, 'Jakarta', NULL, NULL, 300000),
(17, 10, 6, '2015-04-30', '2015-05-02', 'representatif', NULL, 'Jakarta', NULL, NULL, 0),
(18, 10, 6, '2015-04-30', '2015-05-02', 'riil', NULL, 'Jakarta', NULL, NULL, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_golongan` varchar(15) NOT NULL,
  `tarif_perjalanan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `golongan`
--


-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id` int(11) NOT NULL DEFAULT '0',
  `kode_jenis_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--


-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(25) NOT NULL,
  `kode_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `koordinator` varchar(25) DEFAULT NULL,
  `penanggung_jawab` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode_unit`, `kode_kegiatan`, `nama_kegiatan`, `koordinator`, `penanggung_jawab`) VALUES
(1, '1', '2433.001.001.107', 'Inovasi Teknologi dan Manajemen Permukiman', '1', '2'),
(2, '1', '2433.001.003.107.A', 'Penelitian dan Pengembangan Teknologi Pengolahan Air Minum ', '1', '2'),
(3, '1', '2433.001.003.107.B', 'Pengkajian dan Pengembang ITF', '1', '2'),
(4, '1', '2433.001.004.107.A', 'Kelembagaan dalam Implementasi Kebijakan Sertifikat Laik Fungsi Bangunan Gedung', '1', '2'),
(5, '1', '2433.001.004.107.B', 'Penyusunan Pedoman Matra Ruang ', '1', '2'),
(6, '1', '2433.001.005.107', 'Potensi Bahan Bangunan Lokal untuk Mendukung Pembangunan Perumahan Sederhana Menggunakan Sistem Info', '1', '2'),
(7, '1', '2433.003.002.107.A', 'Pengembangan Model Penataan Kawasan Padat dan Kumuh di Perkotaan', '1', '2'),
(8, '1', '2433.003.002.107.B', 'Pengkajian dan Pengembangan Model Permukiman di Kawasan Pesisir', '1', '2'),
(9, '1', '2433.003.002.107.C', 'Pengembangan Model Penataan Kawasan Pulau-Pulau Kecil', '1', '2'),
(10, '1', '2433.003.002.107.D', 'Pengembangan Model Penataan Kawasan Perbatasan', '1', '2'),
(11, '1', '2433.003.004.107.A', 'Pengembangan Teknologi Perbaikan Gedung dan Perkuatan (Retrofingfitting) Struktur Beton Bertulang Un', '1', '2'),
(12, '1', '2433.003.004.107.B', 'Pengkajian dan Pengembangan Analisis Resiko Gempa ', '1', '2'),
(13, '1', '2433.003.004.107.C', 'Pengembangan Model Laboratorium Arsitektur, Struktur dan Utilitas', '1', '2'),
(14, '1', '2433.004.002.107', 'Penelitian Sistem Rating untuk Perumahan dan Permukiman Hijau', '1', '2'),
(15, '1', '2433.004.004.107', 'Pengembangan Green Label dalam Penyediaan Bahan Bangunan', '1', '2'),
(16, '1', '2433.004.006.107.A', 'Penyusunan Pedoman Sistem Rating Bangunan Hijau pada Bangunan Gedung', '1', '2'),
(17, '1', '2433.004.006.107.A', 'Pengembangan Metodelogi  Pengukuran Perhitungan Emisi Gas Rumah Kaca pada Sektor Air Limbah', '1', '2'),
(18, '1', '2433.005.004.107', 'Penyusunan Konsep Pedoman Teknologi Bahan Bangunan Alternatif', '1', '2'),
(19, '1', '2433.006.003.107.A', 'Pengembangan Teknologi Air Limbah dengan Sistem Vermibiofilter', '1', '2'),
(20, '1', '2433.006.003.107.B', 'Pengembangan dan Penerapan Teknologi Air Minum dan Sanitasi di Kawasan Permukiman DAS', '1', '2'),
(21, '1', '2433.006.003.107.C', 'Pengembangan dan Penerapan Teknologi Air Minum di Pulau Kecil', '1', '2'),
(22, '1', '2433.006.005.107', 'Pengkajian dan Penerapan Teknologi Rumah Murah, Sehat dan Layak Huni', '1', '2'),
(23, '1', '2433.008.001.014', 'Penyusunan Naskah Kebijakan Bidang Permukiman (Kajian Kebijakan)', '1', '2'),
(24, '1', '2433.009.001.040.A', 'Diseminasi dan Sosialisasi SPM Bidang Permukiman', '1', '2'),
(25, '1', '2433.009.001.040.B', 'Diseminasi dan Sosialisasi Teknologi Bidang Permukiman', '1', '2'),
(26, '1', '2433.009.001.040.C', 'Publikasi dan Dokumentasi Hasil Litbang', '1', '2'),
(27, '1', '2433.009.001.040.D', 'Penyelenggaraan dan Keikutsertaan Pameran', '1', '2'),
(28, '1', '2433.010.001.044', 'Bantuan Teknis / Administratif / Manajemen', '1', '2'),
(29, '1', '2433.012.001.048.A', 'Perencanaan/Implementasi/Pengelolaan Sistem Akuntansi Pemerintah', '1', '2'),
(30, '1', '2433.012.001.048.B', 'Pembinaan Administrasi dan Pengelolaan Keuangan', '1', '2'),
(31, '1', '2433.012.002.047.A', 'Pengelolaan Barang Milik/Kekayaan Negara', '1', '2'),
(32, '1', '2433.012.002.051.D', 'Penyelenggaraan Humas dan Protokol', '1', '2'),
(33, '1', '2433.012.002.051.E', 'Operasional Jaringan', '1', '2'),
(34, '1', '2433.012.002.051.F', 'Penyelenggaraan Sistem Informasi', '1', '2'),
(35, '1', '2433.012.002.053.D', 'Penelitian Klarifikasi, Registrasi, Penerapan Sistem Kearsipan', '1', '2'),
(36, '1', '2433.012.003.051.C', 'Penerbitan Jurnal', '1', '2'),
(37, '1', '2433.012.003.053.A', 'Penataan Manajemen Kelembagaan', '1', '2'),
(38, '1', '2433.012.003.053.B', 'Pengembangan Mutu Kelembagaan', '1', '2'),
(39, '1', '2433.012.003.053.C', 'Administrasi Umum dan Peningkatan Sarana Kelitbangan', '1', '2'),
(40, '1', '2433.012.003.058.A', 'Penyelenggaraan Kepustakaan', '1', '2'),
(41, '1', '2433.012.004.012.A', 'Pembinaan Administrasi Pengelolaan Kepegawaian', '1', '2'),
(42, '1', '2433.012.004.012.A', 'Pengembangan Jabatan Fungsional SDM Iptek', '1', '2'),
(43, '1', '2433.012.004.012.B', 'Pengembangan Kompetensi SDM', '1', '2'),
(44, '1', '2433.012.004.012.D', 'Pengurusan Visa/Paspor', '1', '2'),
(45, '1', '2433.012.004.012.E', 'Pengurusan HAKI', '1', '2'),
(46, '1', '2433.012.004.040.A', 'Penyelenggaraan dan Keikutsertaan dalam Seminar Nasional dan Internasional', '1', '2'),
(47, '1', '2433.012.005.018.A', 'Penyusunan Rencana Kerja dan Anggaran', '1', '2'),
(48, '1', '2433.012.005.200.A', 'Monitoring Pelaksanaan Kegiatan', '1', '2'),
(49, '1', '2433.012.005.200.B', 'Evaluasi Kemanfaatan Hasil Litbang', '1', '2'),
(50, '1', '2433.012.006.045.A', 'Kerjasama Dalam Negeri', '1', '2'),
(51, '1', '2433.012.006.045.B', 'Pengembangan Unit Inkubasi Hasil Litbang Permukiman', '1', '2'),
(52, '1', '2433.012.006.045.C', 'Kesekretariatan Kerjasama Luar Negeri', '1', '2'),
(53, '1', '2433.012.006.045.D', 'Kesekretariatan RCCEHUD', '1', '2'),
(54, '1', '2433.012.007.015', 'Perumusan SPM', '1', '2'),
(55, '1', '2433.012.008.011.A', 'Administrasi Kegiatan', '1', '2'),
(56, '1', '2433.012.009.055.A', 'Laboratorium Struktur dan Konstruksi Bangunan', '1', '2'),
(57, '1', '2433.012.009.055.B', 'Laboratorium Bahan Bangunan', '1', '2'),
(58, '1', '2433.012.009.055.C', 'Laboratorium Tata Bangunan', '1', '2'),
(59, '1', '2433.012.009.055.D', 'Laboratorium Lingkungan Permukiman', '1', '2'),
(60, '1', '2433.012.009.055.E', 'Studio Perumahan', '1', '2'),
(61, '1', '2433.012.009.060.A', 'Penyusunan Data Center', '1', '2'),
(62, '1', '2433.013.001.011', 'Pengelola PNBP (Administrasi Kegiatan)', '1', '2'),
(63, '1', '2433.013.002.152', 'Penerimaan Negara Bukan Pajak', '1', '2'),
(64, '1', '2433.014.001.114', 'Pengadaan Peralatan Laboratorium', '1', '2'),
(65, '1', '2433.994.001', 'Pembayaran Gaji dan Tunjangan', '1', '2'),
(66, '1', '2433.994.002.A', 'Pengadaan Toga/Pakaian Kerja Supir/Pesuruh/ Perawan/Dokter/Satpam/Tenaga Teknis Lainnya', '1', '2'),
(67, '1', '2433.994.002.C', 'Operasional Perkantoran dan Pimpinan (Rapat Koordinasi)', '1', '2'),
(68, '1', '2433.994.002.', 'Perawatan Gedung Kantor', '1', '2'),
(69, '1', '2433.994.002.E', 'Perawatan Rumah Negara', '1', '2'),
(70, '1', '2433.994.002.G', 'Perawatan Sarana Gedung', '1', '2'),
(71, '1', '2433.994.002.H', 'Perawatan Kendaraan Bermotor Roda 4/Roda 6/ Roda 10', '1', '2'),
(72, '1', '2433.994.002.I', 'Perawatan Kendaraan Bermotor Roda 2', '1', '2'),
(73, '1', '2433.994.002.K', 'Langganan Daya dan Jasa', '1', '2'),
(74, '1', '2433.994.002.L', 'Jasa Keamanan dan Kebersihan', '1', '2'),
(75, '1', '2433.994.002.M', 'Jasa Pos / Giro / Sertifikat', '1', '2'),
(76, '1', '2433.994.002.N', 'Pertemuan dan Penerimaan Delegasi/Misi/Tamu', '1', '2'),
(77, '1', '2433.994.002.P', 'Keperluan Perkantoran', '1', '2'),
(78, '1', '2433.996.001.114', 'Pengadaan Alat Studio dan Komunikasi', '1', '2'),
(79, '1', '2433.996.002.114', 'Pengadaan Alat Pengolah Data', '1', '2'),
(80, '1', '2433.997.001.114', 'Pengadaan Mebelair', '1', '2'),
(81, '1', '2433.998.001.056', 'Peningkatan / Pembangunan Prasarana dan Sarana Internal Kementerian PU', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_header`, `username`, `komentar`) VALUES
(1, '1', 'admin', 'balik yu'),
(2, '1', 'admin', 'duh jelek'),
(3, '1', 'admin', 'butut'),
(4, '2', 'esselon 4', '0'),
(5, '2', 'esselon 4', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE IF NOT EXISTS `koordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_koordinator` varchar(25) NOT NULL,
  `kode_kegiatan` varchar(25) NOT NULL,
  `nama_koordinator` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `koordinator`
--


-- --------------------------------------------------------

--
-- Table structure for table `kota_tujuan`
--

CREATE TABLE IF NOT EXISTS `kota_tujuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_wilayah` int(11) DEFAULT NULL,
  `nama_provinsi` varchar(25) DEFAULT NULL,
  `nama_kota` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id`, `kode_wilayah`, `nama_provinsi`, `nama_kota`) VALUES
(1, 11, 'ACEH', 'Banda Aceh'),
(2, 51, 'B A L I', 'Denpasar'),
(3, 19, 'BANGKA BELITUNG', 'Pangkal Pinang'),
(4, 36, 'BANTEN', 'Tangerang'),
(5, 17, 'BENGKULU', 'Bengkulu'),
(6, 34, 'D.I.  YOGYAKARTA', 'Yogyakarta'),
(7, 31, 'D.K.I   JAKARTA', 'Jakarta'),
(8, 75, 'GORONTALO', 'Gorontalo'),
(9, 15, 'JAMBI', 'Jambi'),
(10, 32, 'JAWA BARAT', 'Bandung'),
(11, 33, 'JAWA TENGAH', 'Semarang'),
(12, 35, 'JAWA TIMUR', 'Surabaya'),
(13, 61, 'KALIMANTAN BARAT', 'Pontianak'),
(14, 63, 'KALIMANTAN SELATAN', 'Banjarmasin'),
(15, 62, 'KALIMANTAN TENGAH', 'Palangkaraya'),
(16, 64, 'KALIMANTAN TIMUR', 'Samarinda'),
(17, NULL, 'KALIMANTAN UTARA ', 'Tanjung Selor'),
(18, 21, 'KEPULAUAN RIAU', 'Tanjung Pinang '),
(19, 18, 'LAMPUNG', 'Lampung'),
(20, 81, 'MALUKU', 'Ambon'),
(21, 82, 'MALUKU UTARA', 'Ternate'),
(22, 52, 'NUSA TENGGARA BARAT', 'Mataram'),
(23, 53, 'NUSA TENGGARA TIMUR', 'Kupang'),
(24, 94, 'PAPUA', 'Jayapura'),
(25, 91, 'PAPUA BARAT', 'Manokwari'),
(26, 14, 'RIAU', 'Pekanbaru'),
(27, 76, 'SULAWESI BARAT', 'Mamuju'),
(28, 73, 'SULAWESI SELATAN', 'Ujungpandang'),
(29, 72, 'SULAWESI TENGAH', 'Palu'),
(30, 74, 'SULAWESI TENGGARA', 'Kendari'),
(31, 71, 'SULAWESI UTARA', 'Manado'),
(32, 13, 'SUMATERA BARAT', 'Padang'),
(33, 16, 'SUMATERA SELATAN', 'Palembang'),
(34, 12, 'SUMATERA UTARA', 'Medan');

-- --------------------------------------------------------

--
-- Table structure for table `listcode`
--

CREATE TABLE IF NOT EXISTS `listcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(50) DEFAULT NULL,
  `list_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `listcode`
--

INSERT INTO `listcode` (`id`, `list_name`, `list_item`) VALUES
(36, 'Jenis Kendaraan', 'Pesawat'),
(4, '', 'Jenis Barang'),
(5, 'Jenis Barang', 'ATK, Bahan Komputer, dan Bahan Dokumentasi'),
(35, '', 'Jenis Kendaraan'),
(8, 'Jenis Barang', 'Bahan Kimia'),
(9, 'Jenis Barang', 'Bahan Bangunan'),
(10, 'Jenis Barang', 'Bahan Pembuatan Model'),
(11, 'Jenis Barang', 'Bahan Bantu Pengujian'),
(12, 'Jenis Barang', 'Bahan Maket'),
(13, 'Jenis Barang', 'Fotocopy dan Penjilidan'),
(14, 'Jenis Barang', 'Biaya Konsumsi / Jamuan Rapat'),
(15, '', 'Status Pegawai'),
(16, 'Status Pegawai', 'PNS'),
(18, 'Status Pegawai', 'Non PNS (S1)'),
(19, '', 'Golongan'),
(20, 'Golongan', 'I/A'),
(21, 'Golongan', 'I/B'),
(22, 'Golongan', 'I/C'),
(23, 'Golongan', 'I/D'),
(24, 'Golongan', 'II/A'),
(25, 'Golongan', 'II/B'),
(26, 'Golongan', 'II/C'),
(27, 'Golongan', 'II/D'),
(28, 'Golongan', 'III/A'),
(29, 'Golongan', 'III/B'),
(30, 'Golongan', 'III/C'),
(31, 'Golongan', 'III/D'),
(32, '', 'Satuan Barang'),
(33, 'Satuan Barang', 'dus'),
(34, 'Satuan Barang', 'pcs'),
(37, 'Jenis Kendaraan', 'Kereta Api'),
(38, 'Jenis Kendaraan', 'Perahu'),
(39, '', 'Jenis Penginapan'),
(40, 'Jenis Penginapan', 'Hotel'),
(41, 'Jenis Penginapan', 'Non Hotel'),
(42, 'Status Pegawai', 'Non PNS (D3)'),
(43, 'Status Pegawai', 'Non PNS (SMU)');

-- --------------------------------------------------------

--
-- Table structure for table `narasumber`
--

CREATE TABLE IF NOT EXISTS `narasumber` (
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
  `institusi` varchar(50) DEFAULT NULL,
  `kepakaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `narasumber`
--

INSERT INTO `narasumber` (`id`, `nip`, `nama`, `golongan`, `jabatan`, `tgl_lahir`, `kelas_jabatan`, `status`, `kode_unit`, `kriteria_pegawai`, `status_pendidikan`, `institusi`, `kepakaran`) VALUES
(1, '196006151987032001', 'Prof (R) Dr. Ir. Anita Firmanti, MT', 'IV/d', 'Kepala Puslitbang Permukiman', '0000-00-00', '15', 'PNS', '1', '', '', NULL, NULL),
(2, '196101131990031001', ' Ir. R. Johny F.S. Subrata, MA.', 'IV/B', 'Kepala Bagian Tata Usaha', '0000-00-00', '12', 'PNS', '1', '', '', NULL, NULL),
(3, '196308311997031001', ' Nana Pudja Sukmana, ST.', 'III/D', 'Kasubbag Umum', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL),
(4, '196008281993031005', ' Drs. Agus Heriyanto, MAP.', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '1', '', '', NULL, NULL),
(5, '196001121982111001', ' Ramlan, S.Sos.', 'III/D', 'Pengolah BMN (Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(6, '195910011983031004', ' S  o  b  a  r, BE.', 'III/C', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(7, '196409091991031004', ' Widjianto, SST.', 'III/B', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(8, '198509292010121004', ' Sony Suryono, A.Md.', 'II/C', 'Penelaah Laporan BMN ', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(9, '196710272007101001', ' Yana Suryana, SE.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(10, '196803102007011004', ' Achmad Hidayat, S.AP.', 'III/a', 'Pelaksana Administrasi ( Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(11, '199005112014021004', 'Anindwiyan Dian Panduwijaya, A.Md', 'II/c', 'Teknisi', '0000-00-00', '', 'PNS', '1', '', '', NULL, NULL),
(12, '197110042007012001', ' Siti Sadiah', 'II/B', 'Pelaksana Administrasi ( Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(13, '197010032007011004', ' S u h e n d i', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(14, '196412202007011002', ' Uteng Miftah', 'II/B', 'Pengolah BMN (Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(15, '196809142008121001', ' Zaenal Abidin', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(16, '196007121994031003', ' N  a  r  k  a  m', 'II/A', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(17, '196002272006041001', ' Ade Sahri', 'I/B', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL),
(18, '', 'Totong Kurnia', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL),
(19, '196810041991031002', ' Sujarwanto, S.AP., MM.', 'III/B', 'Kepala Subbag Keuangan', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL),
(20, '195809281980121002', ' Budy Siswanto, S.Sos.', 'III/D', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(21, '196709301993111001', ' Toraja Hutasoit, B.Sc.', 'III/C', 'Penelaah Anggaran dan PNBP (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(22, '196502011987021001', ' Iskandar, S.IP.', 'III/C', 'Urusan Pelaopran (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(23, '196202161984022002', ' Beben Sugiarti', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(24, '195801061982112002', ' K o k o y', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(25, '195911291986031007', ' Adjat Sudradjat', 'III/B', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL),
(26, '197207142007012003', ' Tintin Djuartini', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(27, '196206262007012001', ' Sutajiah', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(28, '196905272007011002', ' Ahmad Gojali', 'II/B', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL),
(29, '196806122007011004', ' Drajat Subuhri', 'II/B', 'Bendahara', '0000-00-00', '8', 'PNS', '1', '', '', NULL, NULL),
(30, '196312222008122001', ' Kaswati', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(31, '197212212009111001', ' Apep Apepudin', 'II/A', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(32, '195810171989031003', ' J a e n u l', 'II/A', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL),
(33, ' ', 'Susanto', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL),
(34, '195907151986031004', ' Tibin R. Prayudi, BE., SE., MM.', 'IV/A', 'Kepala Bidang Sumber Daya Kelitbangan', '0000-00-00', '12', 'PNS', '2', '', '', NULL, NULL),
(35, '195905221990031001', ' Drs. Duddy Dwiyanto K, MBA.', 'IV/A', 'Kasubbid SDM', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL),
(36, '196206251999031001', ' Drs. Binanga Sinaga', 'III/D', 'Arsiparis Muda', '0000-00-00', '9', 'PNS', '2', '', '', NULL, NULL),
(37, '196008051986021002', ' B u d i y o n o', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL),
(38, '198107092008012002', ' Siska Purnianti, SH.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL),
(39, '195912161989031004', ' W a s i d i', 'III/B', 'Analis Kepegawaian (Jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL),
(40, '198307012009121001', ' Andro Ramadhanu, SH.', 'III/A', 'Analis Kepegawaian (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL),
(41, '196706282007012001', ' Siti Rachmawati', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL),
(42, '197101032007012003', ' N g a t i n i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL),
(43, '196901102007011006', ' Jajang Mulyana', 'II/B', 'Pelaksana Administrasi (Jenjang II)', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL),
(44, '197303122007101002', ' W  o  w  o', 'II/A', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL),
(45, '196801081998031002', ' Drs. Rudy R. Effendi, MT.', 'III/D', 'Kasubbid Sarana Kelitbangan', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL),
(46, '196606281993032001', ' Dra. Roosdharmawati', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '2', '', '', NULL, NULL),
(47, '760000228', ' Drs. Arif Sugiarto, MM.', 'IV/A', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL),
(48, '196401291993111001', ' Maman Tarmansyah, ST., M.Si.', 'III/D', 'Pengolah Penye Penga Barang Jasa (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL),
(49, '198404292010122005', ' Sari Nur Aini, S.IP.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL),
(50, '196005031986021002', 'Aoh  Sukirman', 'III/C', 'Arsiparis Penyelia', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL),
(51, '195804051987021001', ' Slamet Suhaedit', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL),
(52, '196706031993011004', ' Dadan Ramdani, A. Md.', 'III/B', 'Pelaksana Administrasi (Jenjang 1)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL),
(53, '196410221989032003', ' Ai Rukmini', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL),
(54, '198509252009121001', ' Haryo Budi Guruminda, ST.', 'III/A', 'Pengolah Kinerja Kelembagaan (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL),
(55, '198808222010122002', ' Rydha Riyana Agustien, S.Si.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL),
(56, '196211251989031003', ' Ir. Lutfi Faizal', 'IV/B', 'Kepala Bidang Standar dan Diseminasi', '0000-00-00', '12', 'PNS', '3', '', '', NULL, NULL),
(57, '198202082006041006', ' Sunarjito, ST, MT', 'III/B', 'Kasubbid Standar', '0000-00-00', '10', 'PNS', '3', '', '', NULL, NULL),
(58, '196805201993031008', ' Ir. Dudi Dofarudin Hakim', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(59, '198602112009121001', ' Resha Febrian, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(60, '198506152009122001', ' Hanna Yuni Hernanti, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(61, '198310302010121002', ' Arif Setiawan, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(62, '198504252010122002', ' Ayu Kristianty Ferina, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(63, '197506292002122002', 'Ratna Iswari Utoro, ST., MT.', 'III/C', 'Penyusun Bimbingan Teknis ', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(64, '196902032007011006', ' T  o  n  i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL),
(65, '196207221991022001', ' Dra. Yulinda Rosa, M.Si.', 'IV/A', 'Kasubbid Diseminasi/Peneliti Madya', '0000-00-00', '11', 'PNS', '3', '', '', NULL, NULL),
(66, '198107142009121001', ' Ajun Hariono, ST., MSc.Eng.', 'III/B', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(67, '195908051984021002', ' G u s w a n d i, S.Sos.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(68, '197002071991032002', ' Neneng Kaniawati S, S.Sos., MM.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 1)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(69, '196605201991021002', ' S o f i y a n, A.Md.', 'III/B', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL),
(70, '196111291993031001', ' Adang Triana', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '3', '', '', NULL, NULL),
(71, '197007272007101001', ' Asep Jiwa Praja', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL),
(72, '197109301998031001', ' Iwan Suprijanto, ST., MT.', 'IV/B', 'Kepala Bidang Program dan Kerjasama/ P. Utama', '0000-00-00', '13', 'PNS', '4', '', '', NULL, NULL),
(73, '197104021998031003', ' Sugeng Paryanto, ST., MT.', 'III/C', 'Kasubbid Program dan Evaluasi', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL),
(74, '196611021994032002', ' Dra. Sri Sulasmi, MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '4', '', '', NULL, NULL),
(75, '198510192008012002', ' Rani Widyahantari, ST.', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(76, '198108152006042003', ' Neripha Ayu C, S.Si, MT', 'III/C', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(77, '198504272010122002', ' Anggi Wulandini, ST.', 'III/A', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(78, '198409222010011008', 'Agung Permana, ST', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(79, '198212032006042001', ' Fani Deviana, ST.', 'III/B', 'Kasubbid Pengembangan Kerjasama', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL),
(80, '196307101991032002', ' Lia Yulia Iriani, SH., M.Si.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '4', '', '', NULL, NULL),
(81, '195801281980011001', ' Moch.  Pandji Dermawan, A.Md.', 'III/D', 'Pranata Humas Penyelia', '0000-00-00', '8', 'PNS', '4', '', '', NULL, NULL),
(82, '198412312009122001', ' Lucky Adhyati P, ST., MT.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(83, '197504032009021001', 'Mifta Priyanto, ST. MM', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(84, '196911091004021001', ' W  a  r  i  d  j  o', 'III/A', 'Pranata Humas Pelaksana', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(85, '198307032009121001', ' Adhi Yudha Mulia, ST.', 'III/B', 'Penelaah Kerjama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(86, '198510122010122022', ' Sri Maria Senjaya, ST.', 'III/A', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL),
(87, '196710101994031006', ' Hendi Suhendi', 'II/A', 'Pengadmnistrasi Umum', '0000-00-00', '5', 'PNS', '4', '', '', NULL, NULL),
(88, '196409121991031002', ' Ir. Arvi Argyantoro, MA.', 'IV/B', 'Kepala Balai Tata Bangunan', '0000-00-00', '12', 'PNS', '5', '', '', NULL, NULL),
(89, '196207061997031002', ' Ir. Maryoko Hadi, Dipl.E.Eng., MT.', 'III/D', 'Kasie Penel & Pengembangan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL),
(90, '195207031982012001', ' Ir. Nurhasanah Azhar, MM.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL),
(91, '195102211982031002', ' Ir. Rahim Siahaan, CES.', 'IV/D', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL),
(92, '196407061990032002', ' Ir. Wahyu Wuryanti, MSc.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL),
(93, '195411041979011002', ' W.  S. Witarso, ST.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL),
(94, '197904062006041004', ' Mahatma Sindu Suryo, ST., MT.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL),
(95, '196812032008121001', ' Wahyu Sujatmiko, ST., MT.', 'III/C', 'Penelti Madya', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL),
(96, '198005182008012017', ' Frieda Hariyani, ST.', 'III/B', 'Penyusun Monev & Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL),
(97, '198201142006041002', ' Muhammad Nur Fajri A, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL),
(98, '199010102014021002', 'Muhammad Ardimas Riyono, ST', 'III/A', 'Penyusun NSPK (Jenjang 1)', '0000-00-00', '', 'PNS', '5', '', '', NULL, NULL),
(99, '196206071992091001', ' Jonsirwan, SST.', 'III/C', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL),
(100, '196809071996032001', ' Ir. A v e n t i, MT.', 'III/D', 'Peneliti Muda ', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL),
(101, '196009191993121001', ' Ir. Nugraha Budi R,  MSc.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL),
(102, '195806041982111002', ' M a r y o n o, BE.', 'III/D', 'Teknisi Litkayasa Penyelia', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL),
(103, '198702212008122001', ' Fanny Kusumawati, ST.', 'III/B', 'Penelaah Penerapan & Peltek (jen 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL),
(104, '195808141983031008', ' Kamtua Sinaga', 'III/B', 'Teknisi (jenjang 3)', '0000-00-00', '6', 'PNS', '5', '', '', NULL, NULL),
(105, '197808162008121001', ' Fefen Suhedi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL),
(106, '196712132007011004', ' Dede Suhendar', 'II/B', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL),
(107, '195808011986021001', ' Mamang Hidayat', 'II/C', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL),
(108, '196106092007011002', ' U  n  d  a  n  g', 'I/B', 'Pengadministrasi Teknis (Jenjang 3)', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL),
(109, '', 'Maryana', '', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL),
(110, ' ', 'Enang Rohiman', ' ', 'Caraka', '0000-00-00', '3', 'PNS', '5', '', '', NULL, NULL),
(111, '196511301990031001', ' Ir. Arief Sabaruddin, CES.', 'IV/C', 'Kepala Balai Perum dan Lingkungan/ P. Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL),
(112, '197107121998032001', ' Ade Erma Setyowati, ST., M.Ec.Dev.', 'III/D', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL),
(113, '197108121999031002', 'Prof (R) Dr. Andreas Wibowo, ST., MT.', 'IV/B', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL),
(114, '195808131986031002', ' Ir. Puthut Samyahardja, CES., MSc.', 'IV/C', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(115, '195305181982012001', ' Ir. Lya Meilany Setyawaty, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(116, '195104231980112001', ' Ir. Ida Yudiarti Yunus, M.Si.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(117, '195412091986031001', ' Ir. Siti Zubaidah Kurdi, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(118, '195707271988032001', ' Dra. Titi Utami Endang R.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(119, '195708181991032002', ' Dra. Heni Suhaeni, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(120, '195909301998031001', ' Drs. Rusydi Alimaman', 'III/D', 'Pedal Madya', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(121, '198112052005022001', ' Rian Wulan Desriani, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL),
(122, '198202252008122001', ' Fenita Indrasari, ST', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL),
(123, '198202212008011011', ' Arip Pauzi Rachman, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL),
(124, '196410281996031001', ' Rusli, ST., MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL),
(125, '195611261986031003', ' Moch. Edi Nur, ST.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(126, '195603171983031006', ' Wahyu S. Yodhakersa, ST.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(127, '195701191986031001', ' Ir. B u d i o n o', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(128, '196705191994031005', ' Dyan Kardiyanto, SH.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL),
(129, '195802081988031001', ' Drs. Ichwan Subiantoro, CES.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL),
(130, '196111171993031002', ' Drs. Dadi Karyadi', 'III/D', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL),
(131, '196708062001121002', ' Drs. Harri A. Setiadi, MT.', 'III/C', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL),
(132, '196309281996031001', ' Erwin Sudirman, ST.', 'III/B', 'Pengolah data & informasi (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL),
(133, '197911182005021002', ' S. Hidayatullah Santius, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL),
(134, '197108112007011002', ' Iwan Hermawan', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '6', '', '', NULL, NULL),
(135, '196201201990031001', ' Ir. Sutadji Yuwasdiki, Dipl.E.Eng.', 'IV/B', 'Kepala Balai', '0000-00-00', '12', 'PNS', '7', '', '', NULL, NULL),
(136, '196702081998031002', ' Ir. Johnny Rakhman,  Dipl. E.Eng.', 'III/D', 'Kasie Penelitian & Pengembangan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL),
(137, '195205271981032001', ' Ir. Silvia Fransisca H, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL),
(138, '196511111994021001', ' Ir. Moch. Ridwan, Dipl.E.Eng.', 'IV/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL),
(139, '195704071983031005', 'Cecep Bakheri Bachroni, M. Eng', 'IV/a', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL),
(140, '197412112009111001', ' Tedi Achmad Bahtiar, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL),
(141, '197802192006041005', ' Muhammad Rusli, ST.', 'III/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL),
(142, '198206192006041003', ' Christanto Yudha S S, ST.', 'III/B', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL),
(143, '198612232009121001', ' Chiko Bhakti Mulia W, ST.', 'III/A', 'Penyusun Monev & Pelaporan (jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL),
(144, '198112282005021001', ' Ferri Eka Putra, ST., MDM.', 'III/C', 'Kasie Penerapan & Pelayanan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL),
(145, '198401212009121002', ' Azhar Pangarso , ST., M.Eng.Sc.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL),
(146, '195802101988011001', ' Edoy Kurniadi', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL),
(147, '195805211983031004', ' Sudarmanto', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL),
(148, '198109202010121002', ' Yoga Megantara, ST.', 'III/A', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL),
(149, '198603282010122003', ' Faiza Firlany, A.Md.', 'II/C', 'Penata O&P Laboratprium (Jenjang 1)', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL),
(150, '196603262007101001', ' S u r a s m i n', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL),
(151, '196404082007101001', ' J  o  n o', 'II/B', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL),
(152, '196205071994031002', ' Atep Hadri', 'II/A', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL),
(153, '197107172002121001', ' M u l y a n a', 'I/C', 'Penata O&P Laboratorium (Jenjang 3)', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL),
(154, ' ', 'Hend Mustofa', ' ', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL),
(155, '196003081989021001', ' Ir. Sudradjat, Dipl.SE. M.Eng.', 'IV/B', 'KEPALA BALAI AIR MINUM DAN PLP', '0000-00-00', '12', 'PNS', '8', '', '', NULL, NULL),
(156, '196808021998032004', ' Ir. Fitrijani Anggraini, MT.', 'IV/A', 'Kasie Litbang/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL),
(157, '195806261986031001', ' S a r b i d i, ST., MT.', 'IV/B', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL),
(158, '196312121990012001', ' Ir. Ida Medawati, MT.', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(159, '196603031993032002', ' Dra. Tuti Kustiasih', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(160, '195912281990011001', ' T  o  h  i  r, ST., MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(161, '195804081978121001', ' Dadang Sobana, ST.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(162, '197301101998032004', ' Elis Hastuti, ST., MSc. ', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(163, '195906131990032001', ' Dra. Aryenti', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL),
(164, '199001142014022006', 'Amallia Ashuri, S.T.', 'III/A', 'Teknisi', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL),
(165, '196907151996032001', ' Ir. Sri Darwati, MSc.', 'IV/A', 'Kasie Penerapan dan Pelayanan/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL),
(166, '195710151982111001', ' Atang Sarbini, ST.', 'III/D', 'Perekayasa Madya', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL),
(167, '196104281990031004', ' Drs. R. Mukti Budiman', 'IV/A', 'Perekayasa Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL),
(168, '197304241999012001', 'Reni Nuraeni, ST, MT', 'III/D', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL),
(169, '195906081983031005', ' M u l y a n a, BE.', 'III/C', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL),
(170, '198712302010122004', ' Siti Dahniar Indrayanti, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL),
(171, '199003012014022002', 'Erma Mustika Sari, A.Md', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL),
(172, '197003152007011005', ' Agus Sugiarto', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '8', '', '', NULL, NULL),
(173, '197204122007011003', ' Asep Hidayat', 'I/D', 'Pelaksana Administrasi (Jenjang1)', '0000-00-00', '4', 'PNS', '8', '', '', NULL, NULL),
(174, '196010091992031002', ' Ir. Agus Sarwono', 'IV/B', 'Kepala Balai Bahan Bangunan', '0000-00-00', '12', 'PNS', '9', '', '', NULL, NULL),
(175, '195605061979031003', ' L a s i n o, ST., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL),
(176, '196501071991032002', ' Ir. Nurul Aini Sulistyowati, MT.', 'IV/B', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL),
(177, '195107161977112001', ' Andriati Amir Husin, M.Si., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL),
(178, '195003031973011001', ' P u r w i t o, Dipl.E.Eng.', 'IV/C', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL),
(179, '195911301993031001', ' Ir. Bambang Sugiharto, MT.', 'IV/A', 'Penyusun NSPK (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL),
(180, '195603261983021001', ' Aan Sugiarto, BAE.', 'III/D', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL),
(181, '198104012006041002', ' Dany Cahyadi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '9', '', '', NULL, NULL),
(182, '198403292009121002', ' Arif Noviayanto, ST.', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL),
(183, '196211011993031002', ' Ir. Dadri Arbriyakto, MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '9', '', '', NULL, NULL),
(184, '198710152009121001', ' Arkadia Rhamo, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL),
(185, '197103011994021001', ' R u s y a n a, A. Md.', 'III/B', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL),
(186, '196808151994021001', ' I s m o n o', 'III/B', 'Penyelenggaran Layanan Teknis (Jenj 1)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL),
(187, '195803231982121001', ' S u d i o n o', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL),
(188, '196209031989031006', ' S u r a d i', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL),
(189, '196508211993011004', ' Asep Kosasih', 'III/B', 'Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL),
(190, '198512262011012011', 'Indriansi Nirwana, ST.', 'III/A', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL),
(191, '198411132010121003', ' Moh. Anwar Mussaddad, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 2)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL),
(192, '197010192007011002', ' Gultom Obet Haposan ', 'II/B', 'Pengadministrasi Teknis (Jenjang 2)', '0000-00-00', '5', 'PNS', '9', '', '', NULL, NULL),
(193, ' ', 'Usup Ruswandi', ' ', ' ', '0000-00-00', '', 'PNS', '9', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE IF NOT EXISTS `pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pajak` varchar(25) NOT NULL,
  `persentase_pajak` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pajak`
--


-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
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
  `institusi` varchar(50) DEFAULT NULL,
  `kepakaran` varchar(100) DEFAULT NULL,
  `narasumber` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `golongan`, `jabatan`, `tgl_lahir`, `kelas_jabatan`, `status`, `kode_unit`, `kriteria_pegawai`, `status_pendidikan`, `institusi`, `kepakaran`, `narasumber`) VALUES
(1, '196006151987032001', 'Prof (R) Dr. Ir. Anita Firmanti, MT', 'IV/d', 'Kepala Puslitbang Permukiman', '0000-00-00', '15', 'PNS', '1', '', '', NULL, NULL, 0),
(2, '196101131990031001', ' Ir. R. Johny F.S. Subrata, MA.', 'IV/B', 'Kepala Bagian Tata Usaha', '0000-00-00', '12', 'PNS', '1', '', '', NULL, NULL, 0),
(3, '196308311997031001', ' Nana Pudja Sukmana, ST.', 'III/D', 'Kasubbag Umum', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL, 0),
(4, '196008281993031005', ' Drs. Agus Heriyanto, MAP.', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '1', '', '', NULL, NULL, 0),
(5, '196001121982111001', ' Ramlan, S.Sos.', 'III/D', 'Pengolah BMN (Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(6, '195910011983031004', ' S  o  b  a  r, BE.', 'III/C', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(7, '196409091991031004', ' Widjianto, SST.', 'III/B', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(8, '198509292010121004', ' Sony Suryono, A.Md.', 'II/C', 'Penelaah Laporan BMN ', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(9, '196710272007101001', ' Yana Suryana, SE.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(10, '196803102007011004', ' Achmad Hidayat, S.AP.', 'III/a', 'Pelaksana Administrasi ( Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(11, '199005112014021004', 'Anindwiyan Dian Panduwijaya, A.Md', 'II/c', 'Teknisi', '0000-00-00', '', 'PNS', '1', '', '', NULL, NULL, 0),
(12, '197110042007012001', ' Siti Sadiah', 'II/B', 'Pelaksana Administrasi ( Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(13, '197010032007011004', ' S u h e n d i', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(14, '196412202007011002', ' Uteng Miftah', 'II/B', 'Pengolah BMN (Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(15, '196809142008121001', ' Zaenal Abidin', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(16, '196007121994031003', ' N  a  r  k  a  m', 'II/A', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(17, '196002272006041001', ' Ade Sahri', 'I/B', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0),
(18, '', 'Totong Kurnia', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0),
(19, '196810041991031002', ' Sujarwanto, S.AP., MM.', 'III/B', 'Kepala Subbag Keuangan', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL, 0),
(20, '195809281980121002', ' Budy Siswanto, S.Sos.', 'III/D', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(21, '196709301993111001', ' Toraja Hutasoit, B.Sc.', 'III/C', 'Penelaah Anggaran dan PNBP (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(22, '196502011987021001', ' Iskandar, S.IP.', 'III/C', 'Urusan Pelaopran (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(23, '196202161984022002', ' Beben Sugiarti', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(24, '195801061982112002', ' K o k o y', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(25, '195911291986031007', ' Adjat Sudradjat', 'III/B', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0),
(26, '197207142007012003', ' Tintin Djuartini', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(27, '196206262007012001', ' Sutajiah', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(28, '196905272007011002', ' Ahmad Gojali', 'II/B', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0),
(29, '196806122007011004', ' Drajat Subuhri', 'II/B', 'Bendahara', '0000-00-00', '8', 'PNS', '1', '', '', NULL, NULL, 0),
(30, '196312222008122001', ' Kaswati', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(31, '197212212009111001', ' Apep Apepudin', 'II/A', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(32, '195810171989031003', ' J a e n u l', 'II/A', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0),
(33, ' ', 'Susanto', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0),
(34, '195907151986031004', ' Tibin R. Prayudi, BE., SE., MM.', 'IV/A', 'Kepala Bidang Sumber Daya Kelitbangan', '0000-00-00', '12', 'PNS', '2', '', '', NULL, NULL, 0),
(35, '195905221990031001', ' Drs. Duddy Dwiyanto K, MBA.', 'IV/A', 'Kasubbid SDM', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL, 0),
(36, '196206251999031001', ' Drs. Binanga Sinaga', 'III/D', 'Arsiparis Muda', '0000-00-00', '9', 'PNS', '2', '', '', NULL, NULL, 0),
(37, '196008051986021002', ' B u d i y o n o', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0),
(38, '198107092008012002', ' Siska Purnianti, SH.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0),
(39, '195912161989031004', ' W a s i d i', 'III/B', 'Analis Kepegawaian (Jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0),
(40, '198307012009121001', ' Andro Ramadhanu, SH.', 'III/A', 'Analis Kepegawaian (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0),
(41, '196706282007012001', ' Siti Rachmawati', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0),
(42, '197101032007012003', ' N g a t i n i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0),
(43, '196901102007011006', ' Jajang Mulyana', 'II/B', 'Pelaksana Administrasi (Jenjang II)', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0),
(44, '197303122007101002', ' W  o  w  o', 'II/A', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0),
(45, '196801081998031002', ' Drs. Rudy R. Effendi, MT.', 'III/D', 'Kasubbid Sarana Kelitbangan', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL, 0),
(46, '196606281993032001', ' Dra. Roosdharmawati', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '2', '', '', NULL, NULL, 0),
(47, '760000228', ' Drs. Arif Sugiarto, MM.', 'IV/A', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0),
(48, '196401291993111001', ' Maman Tarmansyah, ST., M.Si.', 'III/D', 'Pengolah Penye Penga Barang Jasa (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0),
(49, '198404292010122005', ' Sari Nur Aini, S.IP.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0),
(50, '196005031986021002', 'Aoh  Sukirman', 'III/C', 'Arsiparis Penyelia', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0),
(51, '195804051987021001', ' Slamet Suhaedit', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0),
(52, '196706031993011004', ' Dadan Ramdani, A. Md.', 'III/B', 'Pelaksana Administrasi (Jenjang 1)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0),
(53, '196410221989032003', ' Ai Rukmini', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0),
(54, '198509252009121001', ' Haryo Budi Guruminda, ST.', 'III/A', 'Pengolah Kinerja Kelembagaan (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0),
(55, '198808222010122002', ' Rydha Riyana Agustien, S.Si.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0),
(56, '196211251989031003', ' Ir. Lutfi Faizal', 'IV/B', 'Kepala Bidang Standar dan Diseminasi', '0000-00-00', '12', 'PNS', '3', '', '', NULL, NULL, 0),
(57, '198202082006041006', ' Sunarjito, ST, MT', 'III/B', 'Kasubbid Standar', '0000-00-00', '10', 'PNS', '3', '', '', NULL, NULL, 0),
(58, '196805201993031008', ' Ir. Dudi Dofarudin Hakim', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(59, '198602112009121001', ' Resha Febrian, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(60, '198506152009122001', ' Hanna Yuni Hernanti, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(61, '198310302010121002', ' Arif Setiawan, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(62, '198504252010122002', ' Ayu Kristianty Ferina, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(63, '197506292002122002', 'Ratna Iswari Utoro, ST., MT.', 'III/C', 'Penyusun Bimbingan Teknis ', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(64, '196902032007011006', ' T  o  n  i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL, 0),
(65, '196207221991022001', ' Dra. Yulinda Rosa, M.Si.', 'IV/A', 'Kasubbid Diseminasi/Peneliti Madya', '0000-00-00', '11', 'PNS', '3', '', '', NULL, NULL, 0),
(66, '198107142009121001', ' Ajun Hariono, ST., MSc.Eng.', 'III/B', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(67, '195908051984021002', ' G u s w a n d i, S.Sos.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(68, '197002071991032002', ' Neneng Kaniawati S, S.Sos., MM.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 1)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(69, '196605201991021002', ' S o f i y a n, A.Md.', 'III/B', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0),
(70, '196111291993031001', ' Adang Triana', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '3', '', '', NULL, NULL, 0),
(71, '197007272007101001', ' Asep Jiwa Praja', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL, 0),
(72, '197109301998031001', ' Iwan Suprijanto, ST., MT.', 'IV/B', 'Kepala Bidang Program dan Kerjasama/ P. Utama', '0000-00-00', '13', 'PNS', '4', '', '', NULL, NULL, 0),
(73, '197104021998031003', ' Sugeng Paryanto, ST., MT.', 'III/C', 'Kasubbid Program dan Evaluasi', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL, 0),
(74, '196611021994032002', ' Dra. Sri Sulasmi, MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '4', '', '', NULL, NULL, 0),
(75, '198510192008012002', ' Rani Widyahantari, ST.', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(76, '198108152006042003', ' Neripha Ayu C, S.Si, MT', 'III/C', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(77, '198504272010122002', ' Anggi Wulandini, ST.', 'III/A', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(78, '198409222010011008', 'Agung Permana, ST', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(79, '198212032006042001', ' Fani Deviana, ST.', 'III/B', 'Kasubbid Pengembangan Kerjasama', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL, 0),
(80, '196307101991032002', ' Lia Yulia Iriani, SH., M.Si.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '4', '', '', NULL, NULL, 0),
(81, '195801281980011001', ' Moch.  Pandji Dermawan, A.Md.', 'III/D', 'Pranata Humas Penyelia', '0000-00-00', '8', 'PNS', '4', '', '', NULL, NULL, 0),
(82, '198412312009122001', ' Lucky Adhyati P, ST., MT.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(83, '197504032009021001', 'Mifta Priyanto, ST. MM', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(84, '196911091004021001', ' W  a  r  i  d  j  o', 'III/A', 'Pranata Humas Pelaksana', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(85, '198307032009121001', ' Adhi Yudha Mulia, ST.', 'III/B', 'Penelaah Kerjama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(86, '198510122010122022', ' Sri Maria Senjaya, ST.', 'III/A', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0),
(87, '196710101994031006', ' Hendi Suhendi', 'II/A', 'Pengadmnistrasi Umum', '0000-00-00', '5', 'PNS', '4', '', '', NULL, NULL, 0),
(88, '196409121991031002', ' Ir. Arvi Argyantoro, MA.', 'IV/B', 'Kepala Balai Tata Bangunan', '0000-00-00', '12', 'PNS', '5', '', '', NULL, NULL, 0),
(89, '196207061997031002', ' Ir. Maryoko Hadi, Dipl.E.Eng., MT.', 'III/D', 'Kasie Penel & Pengembangan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0),
(90, '195207031982012001', ' Ir. Nurhasanah Azhar, MM.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL, 0),
(91, '195102211982031002', ' Ir. Rahim Siahaan, CES.', 'IV/D', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL, 0),
(92, '196407061990032002', ' Ir. Wahyu Wuryanti, MSc.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL, 0),
(93, '195411041979011002', ' W.  S. Witarso, ST.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL, 0),
(94, '197904062006041004', ' Mahatma Sindu Suryo, ST., MT.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0),
(95, '196812032008121001', ' Wahyu Sujatmiko, ST., MT.', 'III/C', 'Penelti Madya', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0),
(96, '198005182008012017', ' Frieda Hariyani, ST.', 'III/B', 'Penyusun Monev & Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL, 0),
(97, '198201142006041002', ' Muhammad Nur Fajri A, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0),
(98, '199010102014021002', 'Muhammad Ardimas Riyono, ST', 'III/A', 'Penyusun NSPK (Jenjang 1)', '0000-00-00', '', 'PNS', '5', '', '', NULL, NULL, 0),
(99, '196206071992091001', ' Jonsirwan, SST.', 'III/C', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0),
(100, '196809071996032001', ' Ir. A v e n t i, MT.', 'III/D', 'Peneliti Muda ', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0),
(101, '196009191993121001', ' Ir. Nugraha Budi R,  MSc.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0),
(102, '195806041982111002', ' M a r y o n o, BE.', 'III/D', 'Teknisi Litkayasa Penyelia', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0),
(103, '198702212008122001', ' Fanny Kusumawati, ST.', 'III/B', 'Penelaah Penerapan & Peltek (jen 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL, 0),
(104, '195808141983031008', ' Kamtua Sinaga', 'III/B', 'Teknisi (jenjang 3)', '0000-00-00', '6', 'PNS', '5', '', '', NULL, NULL, 0),
(105, '197808162008121001', ' Fefen Suhedi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0),
(106, '196712132007011004', ' Dede Suhendar', 'II/B', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL, 0),
(107, '195808011986021001', ' Mamang Hidayat', 'II/C', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL, 0),
(108, '196106092007011002', ' U  n  d  a  n  g', 'I/B', 'Pengadministrasi Teknis (Jenjang 3)', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL, 0),
(109, '', 'Maryana', '', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL, 0),
(110, ' ', 'Enang Rohiman', ' ', 'Caraka', '0000-00-00', '3', 'PNS', '5', '', '', NULL, NULL, 0),
(111, '196511301990031001', ' Ir. Arief Sabaruddin, CES.', 'IV/C', 'Kepala Balai Perum dan Lingkungan/ P. Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL, 0),
(112, '197107121998032001', ' Ade Erma Setyowati, ST., M.Ec.Dev.', 'III/D', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0),
(113, '197108121999031002', 'Prof (R) Dr. Andreas Wibowo, ST., MT.', 'IV/B', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL, 0),
(114, '195808131986031002', ' Ir. Puthut Samyahardja, CES., MSc.', 'IV/C', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(115, '195305181982012001', ' Ir. Lya Meilany Setyawaty, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(116, '195104231980112001', ' Ir. Ida Yudiarti Yunus, M.Si.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(117, '195412091986031001', ' Ir. Siti Zubaidah Kurdi, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(118, '195707271988032001', ' Dra. Titi Utami Endang R.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(119, '195708181991032002', ' Dra. Heni Suhaeni, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(120, '195909301998031001', ' Drs. Rusydi Alimaman', 'III/D', 'Pedal Madya', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(121, '198112052005022001', ' Rian Wulan Desriani, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0),
(122, '198202252008122001', ' Fenita Indrasari, ST', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0),
(123, '198202212008011011', ' Arip Pauzi Rachman, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0),
(124, '196410281996031001', ' Rusli, ST., MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0),
(125, '195611261986031003', ' Moch. Edi Nur, ST.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(126, '195603171983031006', ' Wahyu S. Yodhakersa, ST.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(127, '195701191986031001', ' Ir. B u d i o n o', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(128, '196705191994031005', ' Dyan Kardiyanto, SH.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0),
(129, '195802081988031001', ' Drs. Ichwan Subiantoro, CES.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0),
(130, '196111171993031002', ' Drs. Dadi Karyadi', 'III/D', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL, 0),
(131, '196708062001121002', ' Drs. Harri A. Setiadi, MT.', 'III/C', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0),
(132, '196309281996031001', ' Erwin Sudirman, ST.', 'III/B', 'Pengolah data & informasi (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL, 0),
(133, '197911182005021002', ' S. Hidayatullah Santius, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0),
(134, '197108112007011002', ' Iwan Hermawan', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '6', '', '', NULL, NULL, 0),
(135, '196201201990031001', ' Ir. Sutadji Yuwasdiki, Dipl.E.Eng.', 'IV/B', 'Kepala Balai', '0000-00-00', '12', 'PNS', '7', '', '', NULL, NULL, 0),
(136, '196702081998031002', ' Ir. Johnny Rakhman,  Dipl. E.Eng.', 'III/D', 'Kasie Penelitian & Pengembangan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0),
(137, '195205271981032001', ' Ir. Silvia Fransisca H, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL, 0),
(138, '196511111994021001', ' Ir. Moch. Ridwan, Dipl.E.Eng.', 'IV/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0),
(139, '195704071983031005', 'Cecep Bakheri Bachroni, M. Eng', 'IV/a', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL, 0),
(140, '197412112009111001', ' Tedi Achmad Bahtiar, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL, 0),
(141, '197802192006041005', ' Muhammad Rusli, ST.', 'III/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0),
(142, '198206192006041003', ' Christanto Yudha S S, ST.', 'III/B', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0),
(143, '198612232009121001', ' Chiko Bhakti Mulia W, ST.', 'III/A', 'Penyusun Monev & Pelaporan (jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0),
(144, '198112282005021001', ' Ferri Eka Putra, ST., MDM.', 'III/C', 'Kasie Penerapan & Pelayanan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0),
(145, '198401212009121002', ' Azhar Pangarso , ST., M.Eng.Sc.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL, 0),
(146, '195802101988011001', ' Edoy Kurniadi', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0),
(147, '195805211983031004', ' Sudarmanto', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0),
(148, '198109202010121002', ' Yoga Megantara, ST.', 'III/A', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0),
(149, '198603282010122003', ' Faiza Firlany, A.Md.', 'II/C', 'Penata O&P Laboratprium (Jenjang 1)', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0),
(150, '196603262007101001', ' S u r a s m i n', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0),
(151, '196404082007101001', ' J  o  n o', 'II/B', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0),
(152, '196205071994031002', ' Atep Hadri', 'II/A', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0),
(153, '197107172002121001', ' M u l y a n a', 'I/C', 'Penata O&P Laboratorium (Jenjang 3)', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL, 0),
(154, ' ', 'Hend Mustofa', ' ', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL, 0),
(155, '196003081989021001', ' Ir. Sudradjat, Dipl.SE. M.Eng.', 'IV/B', 'KEPALA BALAI AIR MINUM DAN PLP', '0000-00-00', '12', 'PNS', '8', '', '', NULL, NULL, 0),
(156, '196808021998032004', ' Ir. Fitrijani Anggraini, MT.', 'IV/A', 'Kasie Litbang/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0),
(157, '195806261986031001', ' S a r b i d i, ST., MT.', 'IV/B', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0),
(158, '196312121990012001', ' Ir. Ida Medawati, MT.', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(159, '196603031993032002', ' Dra. Tuti Kustiasih', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(160, '195912281990011001', ' T  o  h  i  r, ST., MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(161, '195804081978121001', ' Dadang Sobana, ST.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(162, '197301101998032004', ' Elis Hastuti, ST., MSc. ', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(163, '195906131990032001', ' Dra. Aryenti', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0),
(164, '199001142014022006', 'Amallia Ashuri, S.T.', 'III/A', 'Teknisi', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0),
(165, '196907151996032001', ' Ir. Sri Darwati, MSc.', 'IV/A', 'Kasie Penerapan dan Pelayanan/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0),
(166, '195710151982111001', ' Atang Sarbini, ST.', 'III/D', 'Perekayasa Madya', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0),
(167, '196104281990031004', ' Drs. R. Mukti Budiman', 'IV/A', 'Perekayasa Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0),
(168, '197304241999012001', 'Reni Nuraeni, ST, MT', 'III/D', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0),
(169, '195906081983031005', ' M u l y a n a, BE.', 'III/C', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0),
(170, '198712302010122004', ' Siti Dahniar Indrayanti, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL, 0),
(171, '199003012014022002', 'Erma Mustika Sari, A.Md', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL, 0),
(172, '197003152007011005', ' Agus Sugiarto', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '8', '', '', NULL, NULL, 0),
(173, '197204122007011003', ' Asep Hidayat', 'I/D', 'Pelaksana Administrasi (Jenjang1)', '0000-00-00', '4', 'PNS', '8', '', '', NULL, NULL, 0),
(174, '196010091992031002', ' Ir. Agus Sarwono', 'IV/B', 'Kepala Balai Bahan Bangunan', '0000-00-00', '12', 'PNS', '9', '', '', NULL, NULL, 0),
(175, '195605061979031003', ' L a s i n o, ST., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL, 0),
(176, '196501071991032002', ' Ir. Nurul Aini Sulistyowati, MT.', 'IV/B', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0),
(177, '195107161977112001', ' Andriati Amir Husin, M.Si., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL, 0),
(178, '195003031973011001', ' P u r w i t o, Dipl.E.Eng.', 'IV/C', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0),
(179, '195911301993031001', ' Ir. Bambang Sugiharto, MT.', 'IV/A', 'Penyusun NSPK (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0),
(180, '195603261983021001', ' Aan Sugiarto, BAE.', 'III/D', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0),
(181, '198104012006041002', ' Dany Cahyadi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '9', '', '', NULL, NULL, 0),
(182, '198403292009121002', ' Arif Noviayanto, ST.', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0),
(183, '196211011993031002', ' Ir. Dadri Arbriyakto, MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '9', '', '', NULL, NULL, 0),
(184, '198710152009121001', ' Arkadia Rhamo, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0),
(185, '197103011994021001', ' R u s y a n a, A. Md.', 'III/B', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0),
(186, '196808151994021001', ' I s m o n o', 'III/B', 'Penyelenggaran Layanan Teknis (Jenj 1)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0),
(187, '195803231982121001', ' S u d i o n o', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0),
(188, '196209031989031006', ' S u r a d i', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0),
(189, '196508211993011004', ' Asep Kosasih', 'III/B', 'Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0),
(190, '198512262011012011', 'Indriansi Nirwana, ST.', 'III/A', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0),
(191, '198411132010121003', ' Moh. Anwar Mussaddad, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 2)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0),
(192, '197010192007011002', ' Gultom Obet Haposan ', 'II/B', 'Pengadministrasi Teknis (Jenjang 2)', '0000-00-00', '5', 'PNS', '9', '', '', NULL, NULL, 0),
(193, ' ', 'Usup Ruswandi', ' ', ' ', '0000-00-00', '', 'PNS', '9', '', '', NULL, NULL, 0),
(194, '008', 'Taufik Ismail Abdilah, S.Kom', 'III/A', 'Peneliti', '1989-07-24', '2a', 'Status', '1', '', 'S1', 'UPI', 'Ahli Komputer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_jenis_pengguna`, `nama`, `nip`, `alamat`, `email`, `username`, `password`, `telp`) VALUES
(9, 1, 'taufik', '0009999', 'baleendah', 'ti.abdilah@gmail.com', 'opik123', 'a96697c9ced48372369b18fb47c003c0', '098234'),
(10, 1, 'operator', '', '', '', 'operator', '0cc175b9c0f1b6a831c399e269772661', ''),
(12, 3, 'esselon 3', '', '', '', 'esselon 3', '0cc175b9c0f1b6a831c399e269772661', ''),
(13, 2, 'esselon 4', '', '', '', 'esselon 4', '0cc175b9c0f1b6a831c399e269772661', ''),
(14, 4, 'asisten satker', '', '', '', 'asisten satker', '0cc175b9c0f1b6a831c399e269772661', ''),
(15, 5, 'ppk', '', '', '', 'ppk', '0cc175b9c0f1b6a831c399e269772661', '');

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan_dinas`
--

CREATE TABLE IF NOT EXISTS `perjalanan_dinas` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id`, `no_spt`, `status`, `id_anggaran`, `jumlah_tujuan`, `maksud_perjalanan`, `jadwal_berangkat_1`, `jadwal_berangkat_2`, `jadwal_berangkat_3`, `jadwal_pulang_1`, `jadwal_pulang_2`, `jadwal_pulang_3`, `kota_tujuan_1`, `kota_tujuan_2`, `kota_tujuan_3`) VALUES
(1, '002/SPPD/SATKER/LP/IV/2015', '5', '2', 3, 'maksud satu', '2015-04-20', '2015-04-21', '2015-04-22', '2015-04-21', '2015-04-22', '2015-04-23', '1', '2', '1'),
(2, '003/SPPD/SATKER/LP/IV/2015', '5', '2', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, '1', NULL, NULL),
(3, '004/SPPD/SATKER/LP/IV/2015', '5', '2', 1, 'sssssssssssssssssssss', '2015-04-27', NULL, NULL, '2015-04-27', NULL, NULL, '19', NULL, NULL),
(4, '-', '5', '2', 3, 'wwwwwwwwwwwwwwwwwwww1111111111111111', '2015-04-27', '2015-04-28', '2015-04-29', '2015-04-27', '2015-04-28', '2015-04-29', '17', '18', '19'),
(5, '-', '0', '2', 1, 'studi banding ke kota jakarta', '2015-05-05', '0000-00-00', '0000-00-00', '2015-05-08', '0000-00-00', '0000-00-00', '7', NULL, NULL),
(6, '005/SPPD/SATKER/LP/IV/2015', '5', '2', 1, 'studi banding jakarta 2 unit', '2015-04-30', '0000-00-00', '0000-00-00', '2015-05-02', '0000-00-00', '0000-00-00', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'operator'),
(2, 'esselon 4'),
(3, 'esselon 3'),
(4, 'asisten satker'),
(5, 'ppk');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_perjalanandinas_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_perjalanandinas_detail` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `transaksi_perjalanandinas_detail`
--

INSERT INTO `transaksi_perjalanandinas_detail` (`id`, `id_transaksi_perjalanandinas_header`, `id_pegawai`, `transport_pendukung`, `jenis_penginapan`, `pengeluaran_riil`, `jadwal_berangkat`, `jadwal_pulang`, `biaya_akomodasi`, `biaya_penginapan`, `kota_tujuan`, `transport_utama`) VALUES
(71, 1, '4', '25000', 'Hotel', '75000', '2015-04-20', '2015-04-21', 1000000, 500000, 'Banda Aceh', 1500000),
(72, 1, '4', '25000', 'Hotel', '75000', '2015-04-21', '2015-04-22', 700000, 200000, 'Banda Aceh', NULL),
(73, 1, '48', '25000', 'Hotel', '75000', '2015-04-22', '2015-04-23', 1000000, 500000, 'Banda Aceh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_perjalanandinas_header`
--

CREATE TABLE IF NOT EXISTS `transaksi_perjalanandinas_header` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaksi_perjalanandinas_header`
--

INSERT INTO `transaksi_perjalanandinas_header` (`id`, `no_spt`, `status_approval`, `id_anggaran`, `jumlah_tujuan`, `maksud_perjalanan_1`, `maksud_perjalanan_2`, `maksud_perjalanan_3`, `jadwal_berangkat_1`, `jadwal_berangkat_2`, `jadwal_berangkat_3`, `jadwal_pulang_1`, `jadwal_pulang_2`, `jadwal_pulang_3`, `kota_tujuan_1`, `kota_tujuan_2`, `kota_tujuan_3`, `transport_utama_1`, `transport_utama_2`, `transport_utama_3`) VALUES
(1, 'Auto Generated', '5', '2', 3, 'maksud satu', 'maksud dua', 'maksud tiga', '2015-04-20', '2015-04-21', '2015-04-22', '2015-04-21', '2015-04-22', '2015-04-23', '1', '2', '1', '0', '0', '0'),
(2, 'Auto Generated', '1', '0', 0, '0', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE IF NOT EXISTS `transportasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_moda` varchar(25) NOT NULL,
  `nama_moda` varchar(50) NOT NULL,
  `biaya_perjalanan` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transportasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(50) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `kepala` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `kode_unit`, `nama_unit`, `kepala`) VALUES
(1, 'BTU', 'Bagian Tata Usaha', 2),
(2, 'BSDK', 'Bidang Sumber Daya Kelitbangan', 34),
(3, 'BSD', 'Bidang Standar Dan Diseminasi', 56),
(4, 'BPK', 'Bidang Program Dan Kerjasama ', 72),
(5, 'BTB', 'Balai Tata Bangunan', 88),
(6, 'BPL', 'Balai Perumahan Dan Lingkungan', 111),
(7, 'BSKB', 'Balai Struktur Dan Konstruksi Bangunan', 135),
(8, 'BAMP', 'Balai Air Minum Dan PLP. ', 155),
(9, 'BBB', 'Balai  Bahan  Bangunan', 174),
(10, 'SATKER', 'Satker', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_role`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
