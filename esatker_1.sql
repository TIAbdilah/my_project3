-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 11:47 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `esatker_1`
--
CREATE DATABASE `esatker_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esatker_1`;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `kode_akun`, `jenis_belanja`) VALUES
(1, 511111, 'Belanja Gaji Pokok PNS'),
(2, 511119, 'Belanja Pembulatan Gaji PNS'),
(3, 511121, 'Belanja Tunj.Suami/Istri PNS'),
(4, 511122, 'Belanja Tunj. Anak PNS'),
(5, 511123, 'Belanja Tunj. Struktural PNS'),
(6, 511124, 'Belanja Tunj. Fungsional PNS'),
(7, 511125, 'Belanja Tunj. PPh PNS'),
(8, 511126, 'BelanjaTunj. Beras PNS'),
(9, 511129, 'Belanja Uang Makan PNS'),
(10, 512111, 'Belanja Uang Honor Tetap'),
(11, 512151, 'Belanja Tunjangan Umum PNS'),
(12, 512211, 'Belanja Uang Lembur'),
(13, 512411, 'Belanja Pegawai (Tunjangan Khusus/Kegiatan)'),
(14, 521111, 'Belanja Keperluan Perkantoran'),
(15, 521111, 'Belanja Keperluan Sehari-hari Perkantoran (Lebih dari 40 Pegawai)'),
(16, 521114, 'Belanja Pengiriman Surat Dinas Pos Pusat'),
(17, 521115, 'Honor Operasional Satuan Kerja'),
(18, 521211, 'Belanja Bahan'),
(19, 521213, 'Honor output kegiatan'),
(20, 521219, 'Belanja Barang Non Operasional Lainnya'),
(21, 521811, 'Belanja Barang Untuk Persediaan Barang Konsumsi'),
(22, 521821, 'Belanja Barang Persediaan Bahan Baku'),
(23, 522111, 'Belanja Langganan Listrik'),
(24, 522112, 'Belanja Langganan Telepon'),
(25, 522113, 'Belanja Langganan Air'),
(26, 522141, 'Belanja Sewa'),
(27, 522151, 'Belanja Jasa Profesi'),
(28, 522191, 'Belanja Jasa Lainnya'),
(29, 523111, 'Belanja Biaya Pemeliharaan Gedung dan Bangunan '),
(30, 523112, 'Belanja Barang Persediaan Pemeliharaan'),
(31, 523119, 'Belanja Biaya Pemeliharaan Gedung dan Bangunan Lainnya'),
(32, 523121, 'Belanja Biaya Pemeliharaan Peralatan dan Mesin'),
(33, 523133, 'Belanja Biaya Pemeliharaan Jaringan'),
(34, 524111, 'Belanja Perjalanan Biasa'),
(35, 524211, 'Belanja Perjalanan Biasa - Luar Negeri'),
(36, 524219, 'Belanja Perjalanan Lainnya - Luar Negeri'),
(37, 526113, 'Belanja Gedung dan Bangunan untuk Diserahkan kepada Masyarakat/Pemda'),
(38, 532111, 'Belanja Modal Peralatan dan Mesin'),
(39, 533121, 'Belanja Penambahan Nilai Gedung dan Bangunan'),
(40, 536111, 'Belanja Modal Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(25) NOT NULL,
  `id_akun` varchar(50) NOT NULL,
  `pagu` int(15) NOT NULL,
  `tahun_anggaran` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=468 ;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `id_kegiatan`, `id_akun`, `pagu`, `tahun_anggaran`) VALUES
(1, '1', '18', 9187000, 2015),
(2, '1', '19', 223650000, 2015),
(3, '1', '20', 600000000, 2015),
(4, '1', '21', 461000000, 2015),
(5, '1', '26', 20731000, 2015),
(6, '1', '27', 180000000, 2015),
(7, '1', '34', 192992000, 2015),
(8, '2', '18', 6750000, 2015),
(9, '2', '19', 160040000, 2015),
(10, '2', '20', 363200000, 2015),
(11, '2', '21', 77406000, 2015),
(12, '2', '22', 24000000, 2015),
(13, '2', '26', 29484000, 2015),
(14, '2', '27', 36000000, 2015),
(15, '2', '34', 235120000, 2015),
(16, '3', '18', 8033000, 2015),
(17, '3', '19', 83200000, 2015),
(18, '3', '20', 50000000, 2015),
(19, '3', '21', 54000000, 2015),
(20, '3', '22', 24000000, 2015),
(21, '3', '26', 16894000, 2015),
(22, '3', '27', 54000000, 2015),
(23, '3', '34', 160513000, 2015),
(24, '4', '18', 4736000, 2015),
(25, '4', '19', 99200000, 2015),
(26, '4', '20', 53000000, 2015),
(27, '4', '21', 24000000, 2015),
(28, '4', '22', 24000000, 2015),
(29, '4', '26', 18942000, 2015),
(30, '4', '27', 300000000, 2015),
(31, '4', '34', 175062000, 2015),
(32, '5', '18', 16592000, 2015),
(33, '5', '19', 242540000, 2015),
(34, '5', '20', 250000000, 2015),
(35, '5', '21', 25500000, 2015),
(36, '5', '22', 24000000, 2015),
(37, '5', '26', 18888000, 2015),
(38, '5', '27', 300000000, 2015),
(39, '5', '34', 100480000, 2015),
(40, '6', '18', 71750000, 2015),
(41, '6', '19', 191040000, 2015),
(42, '6', '20', 378400000, 2015),
(43, '6', '21', 25500000, 2015),
(44, '6', '22', 72390000, 2015),
(45, '6', '26', 21698000, 2015),
(46, '6', '27', 123600000, 2015),
(47, '6', '34', 285622000, 2015),
(48, '7', '18', 55816000, 2015),
(49, '7', '19', 142650000, 2015),
(50, '7', '20', 130000000, 2015),
(51, '7', '21', 24000000, 2015),
(52, '7', '26', 9000000, 2015),
(53, '7', '27', 72000000, 2015),
(54, '7', '34', 240534000, 2015),
(55, '8', '18', 15630000, 2015),
(56, '8', '19', 75000000, 2015),
(57, '8', '20', 150000000, 2015),
(58, '8', '21', 24000000, 2015),
(59, '8', '26', 10000000, 2015),
(60, '8', '27', 34000000, 2015),
(61, '8', '34', 100000000, 2015),
(62, '8', '37', 200000000, 2015),
(63, '9', '18', 22800000, 2015),
(64, '9', '19', 139240000, 2015),
(65, '9', '20', 40000000, 2015),
(66, '9', '21', 25500000, 2015),
(67, '9', '22', 44342000, 2015),
(68, '9', '26', 22338000, 2015),
(69, '9', '27', 45000000, 2015),
(70, '9', '34', 320780000, 2015),
(71, '10', '18', 31535000, 2015),
(72, '10', '19', 89110000, 2015),
(73, '10', '20', 160000000, 2015),
(74, '10', '21', 24000000, 2015),
(75, '10', '26', 25238000, 2015),
(76, '10', '27', 135000000, 2015),
(77, '10', '34', 347117000, 2015),
(78, '11', '18', 5877000, 2015),
(79, '11', '19', 388500000, 2015),
(80, '11', '20', 215000000, 2015),
(81, '11', '21', 24000000, 2015),
(82, '11', '22', 114000000, 2015),
(83, '11', '26', 21747000, 2015),
(84, '11', '27', 54000000, 2015),
(85, '11', '34', 100876000, 2015),
(86, '12', '18', 9720000, 2015),
(87, '12', '19', 173750000, 2015),
(88, '12', '20', 363623000, 2015),
(89, '12', '21', 24000000, 2015),
(90, '12', '22', 62864000, 2015),
(91, '12', '26', 49510000, 2015),
(92, '12', '27', 144000000, 2015),
(93, '12', '34', 300156000, 2015),
(94, '13', '18', 4950000, 2015),
(95, '13', '19', 114500000, 2015),
(96, '13', '20', 259789000, 2015),
(97, '13', '21', 24000000, 2015),
(98, '13', '22', 124000000, 2015),
(99, '13', '26', 55546000, 2015),
(100, '13', '27', 61200000, 2015),
(101, '13', '34', 90914000, 2015),
(102, '13', '35', 150211000, 2015),
(103, '13', '38', 2147483647, 2015),
(104, '14', '18', 76100000, 2015),
(105, '14', '19', 129000000, 2015),
(106, '14', '20', 150000000, 2015),
(107, '14', '21', 24000000, 2015),
(108, '14', '26', 17488000, 2015),
(109, '14', '27', 107000000, 2015),
(110, '14', '34', 170112000, 2015),
(111, '14', '35', 100000000, 2015),
(112, '15', '18', 180274000, 2015),
(113, '15', '19', 164790000, 2015),
(114, '15', '20', 60000000, 2015),
(115, '15', '21', 25500000, 2015),
(116, '15', '26', 20862000, 2015),
(117, '15', '27', 121200000, 2015),
(118, '15', '34', 240374000, 2015),
(119, '16', '18', 5180000, 2015),
(120, '16', '19', 112500000, 2015),
(121, '16', '20', 140000000, 2015),
(122, '16', '21', 24000000, 2015),
(123, '16', '22', 48320000, 2015),
(124, '16', '26', 32884000, 2015),
(125, '16', '27', 60000000, 2015),
(126, '16', '34', 135716000, 2015),
(127, '17', '18', 33922000, 2015),
(128, '17', '19', 156500000, 2015),
(129, '17', '20', 85000000, 2015),
(130, '17', '21', 24000000, 2015),
(131, '17', '22', 24000000, 2015),
(132, '17', '26', 17104000, 2015),
(133, '17', '27', 54000000, 2015),
(134, '17', '34', 140974000, 2015),
(135, '18', '18', 55894000, 2015),
(136, '18', '19', 93790000, 2015),
(137, '18', '20', 63000000, 2015),
(138, '18', '21', 24000000, 2015),
(139, '18', '22', 150000000, 2015),
(140, '18', '26', 19568000, 2015),
(141, '18', '27', 30000000, 2015),
(142, '18', '34', 85748000, 2015),
(143, '19', '18', 69180000, 2015),
(144, '19', '19', 109600000, 2015),
(145, '19', '20', 110000000, 2015),
(146, '19', '21', 27000000, 2015),
(147, '19', '22', 389212000, 2015),
(148, '19', '26', 16848000, 2015),
(149, '19', '27', 48000000, 2015),
(150, '19', '34', 80660000, 2015),
(151, '20', '18', 71040000, 2015),
(152, '20', '19', 313950000, 2015),
(153, '20', '20', 2147483647, 2015),
(154, '20', '21', 24000000, 2015),
(155, '20', '22', 424000000, 2015),
(156, '20', '26', 82824000, 2015),
(157, '20', '27', 82720000, 2015),
(158, '20', '34', 550212000, 2015),
(159, '21', '18', 18429000, 2015),
(160, '21', '19', 100040000, 2015),
(161, '21', '20', 300000000, 2015),
(162, '21', '21', 37500000, 2015),
(163, '21', '26', 167043000, 2015),
(164, '21', '27', 72000000, 2015),
(165, '21', '34', 157857000, 2015),
(166, '21', '37', 2147483647, 2015),
(167, '22', '18', 9596000, 2015),
(168, '22', '19', 223800000, 2015),
(169, '22', '20', 1033500000, 2015),
(170, '22', '21', 30000000, 2015),
(171, '22', '22', 150000000, 2015),
(172, '22', '26', 137460000, 2015),
(173, '22', '27', 256400000, 2015),
(174, '22', '34', 650604000, 2015),
(175, '22', '37', 2147483647, 2015),
(176, '23', '18', 9794000, 2015),
(177, '23', '19', 111250000, 2015),
(178, '23', '20', 235500000, 2015),
(179, '23', '21', 48000000, 2015),
(180, '23', '26', 9956000, 2015),
(181, '23', '27', 75000000, 2015),
(182, '23', '34', 75000000, 2015),
(183, '24', '18', 48400000, 2015),
(184, '24', '19', 30300000, 2015),
(185, '24', '20', 1045881000, 2015),
(186, '24', '21', 42000000, 2015),
(187, '24', '27', 192800000, 2015),
(188, '24', '34', 500619000, 2015),
(189, '25', '18', 44458000, 2015),
(190, '25', '19', 39800000, 2015),
(191, '25', '20', 350000000, 2015),
(192, '25', '21', 52800000, 2015),
(193, '25', '26', 8766000, 2015),
(194, '25', '27', 70300000, 2015),
(195, '25', '34', 223502000, 2015),
(196, '26', '18', 8544000, 2015),
(197, '26', '20', 451250000, 2015),
(198, '26', '21', 45600000, 2015),
(199, '26', '27', 27200000, 2015),
(200, '26', '34', 40846000, 2015),
(201, '26', '38', 1014010000, 2015),
(202, '27', '18', 148306000, 2015),
(203, '27', '19', 38400000, 2015),
(204, '27', '20', 108000000, 2015),
(205, '27', '21', 34800000, 2015),
(206, '27', '26', 193086000, 2015),
(207, '27', '34', 160948000, 2015),
(208, '27', '38', 511360000, 2015),
(209, '28', '18', 15791000, 2015),
(210, '28', '19', 221500000, 2015),
(211, '28', '20', 90000000, 2015),
(212, '28', '21', 60000000, 2015),
(213, '28', '22', 220000000, 2015),
(214, '28', '26', 50909000, 2015),
(215, '28', '27', 81000000, 2015),
(216, '28', '34', 1233750000, 2015),
(217, '29', '18', 5852000, 2015),
(218, '29', '19', 10800000, 2015),
(219, '29', '20', 35000000, 2015),
(220, '29', '21', 36000000, 2015),
(221, '29', '27', 9000000, 2015),
(222, '29', '34', 85983000, 2015),
(223, '30', '18', 4397000, 2015),
(224, '30', '20', 35000000, 2015),
(225, '30', '21', 24000000, 2015),
(226, '30', '26', 7020000, 2015),
(227, '30', '27', 36000000, 2015),
(228, '30', '34', 69988000, 2015),
(229, '31', '18', 5706000, 2015),
(230, '31', '19', 8400000, 2015),
(231, '31', '20', 55000000, 2015),
(232, '31', '21', 30000000, 2015),
(233, '31', '26', 4212000, 2015),
(234, '31', '27', 15000000, 2015),
(235, '31', '34', 100072000, 2015),
(236, '32', '18', 27154000, 2015),
(237, '32', '20', 175900000, 2015),
(238, '32', '21', 25000000, 2015),
(239, '32', '27', 18000000, 2015),
(240, '32', '34', 35696000, 2015),
(241, '33', '18', 2080000, 2015),
(242, '33', '19', 38400000, 2015),
(243, '33', '20', 35000000, 2015),
(244, '33', '21', 12000000, 2015),
(245, '33', '27', 12000000, 2015),
(246, '33', '33', 15000000, 2015),
(247, '33', '34', 5840000, 2015),
(248, '34', '18', 3770000, 2015),
(249, '34', '19', 28500000, 2015),
(250, '34', '20', 25000000, 2015),
(251, '34', '21', 10000000, 2015),
(252, '34', '27', 13500000, 2015),
(253, '34', '34', 10680000, 2015),
(254, '35', '18', 4210000, 2015),
(255, '35', '19', 16000000, 2015),
(256, '35', '20', 58000000, 2015),
(257, '35', '21', 36000000, 2015),
(258, '35', '27', 12000000, 2015),
(259, '35', '34', 18240000, 2015),
(260, '36', '18', 53380000, 2015),
(261, '36', '19', 115200000, 2015),
(262, '36', '20', 150820000, 2015),
(263, '36', '21', 24000000, 2015),
(264, '36', '27', 42000000, 2015),
(265, '36', '34', 11600000, 2015),
(266, '37', '18', 9730000, 2015),
(267, '37', '19', 16000000, 2015),
(268, '37', '20', 265000000, 2015),
(269, '37', '21', 19760000, 2015),
(270, '37', '27', 90000000, 2015),
(271, '37', '34', 130300000, 2015),
(272, '38', '18', 8560000, 2015),
(273, '38', '20', 67000000, 2015),
(274, '38', '21', 24000000, 2015),
(275, '38', '27', 18000000, 2015),
(276, '38', '34', 15440000, 2015),
(277, '39', '18', 22972000, 2015),
(278, '39', '20', 179000000, 2015),
(279, '39', '21', 30000000, 2015),
(280, '39', '27', 24000000, 2015),
(281, '39', '34', 40778000, 2015),
(282, '40', '18', 25280000, 2015),
(283, '40', '20', 411500000, 2015),
(284, '40', '21', 25800000, 2015),
(285, '40', '27', 7500000, 2015),
(286, '40', '34', 19920000, 2015),
(287, '40', '40', 50000000, 2015),
(288, '41', '18', 12918000, 2015),
(289, '41', '19', 16000000, 2015),
(290, '41', '20', 40000000, 2015),
(291, '41', '21', 20600000, 2015),
(292, '41', '27', 24000000, 2015),
(293, '41', '34', 160082000, 2015),
(294, '42', '18', 9520000, 2015),
(295, '42', '20', 45000000, 2015),
(296, '42', '21', 24000000, 2015),
(297, '42', '27', 76200000, 2015),
(298, '42', '34', 130580000, 2015),
(299, '43', '18', 4466000, 2015),
(300, '43', '20', 165000000, 2015),
(301, '43', '21', 22500000, 2015),
(302, '43', '27', 71800000, 2015),
(303, '43', '34', 160844000, 2015),
(304, '44', '18', 2290000, 2015),
(305, '44', '21', 3000000, 2015),
(306, '44', '34', 15710000, 2015),
(307, '45', '18', 2260000, 2015),
(308, '45', '20', 20000000, 2015),
(309, '45', '21', 9600000, 2015),
(310, '45', '34', 10140000, 2015),
(311, '46', '18', 7693000, 2015),
(312, '46', '19', 15550000, 2015),
(313, '46', '20', 412000000, 2015),
(314, '46', '21', 25000000, 2015),
(315, '46', '26', 6262000, 2015),
(316, '46', '27', 48000000, 2015),
(317, '46', '34', 107090000, 2015),
(318, '46', '36', 130800000, 2015),
(319, '47', '18', 10441000, 2015),
(320, '47', '19', 36350000, 2015),
(321, '47', '20', 100000000, 2015),
(322, '47', '21', 55560000, 2015),
(323, '47', '27', 60000000, 2015),
(324, '47', '34', 240849000, 2015),
(325, '48', '18', 18646000, 2015),
(326, '48', '20', 140000000, 2015),
(327, '48', '21', 42000000, 2015),
(328, '48', '26', 5776000, 2015),
(329, '48', '27', 141600000, 2015),
(330, '48', '34', 130603000, 2015),
(331, '49', '18', 93089000, 2015),
(332, '49', '19', 28950000, 2015),
(333, '49', '20', 239250000, 2015),
(334, '49', '21', 36000000, 2015),
(335, '49', '22', 5000000, 2015),
(336, '49', '26', 13322000, 2015),
(337, '49', '27', 49600000, 2015),
(338, '49', '34', 165709000, 2015),
(339, '50', '18', 7322000, 2015),
(340, '50', '19', 23700000, 2015),
(341, '50', '20', 325000000, 2015),
(342, '50', '21', 48000000, 2015),
(343, '50', '26', 8766000, 2015),
(344, '50', '27', 50800000, 2015),
(345, '50', '34', 90312000, 2015),
(346, '51', '18', 6219000, 2015),
(347, '51', '20', 70000000, 2015),
(348, '51', '21', 24000000, 2015),
(349, '51', '26', 16371000, 2015),
(350, '51', '27', 79000000, 2015),
(351, '51', '34', 70310000, 2015),
(352, '52', '18', 4362000, 2015),
(353, '52', '19', 4550000, 2015),
(354, '52', '20', 50000000, 2015),
(355, '52', '21', 43200000, 2015),
(356, '52', '26', 6976000, 2015),
(357, '52', '27', 25300000, 2015),
(358, '52', '34', 90012000, 2015),
(359, '52', '36', 154500000, 2015),
(360, '53', '18', 5000000, 2015),
(361, '53', '19', 25000000, 2015),
(362, '53', '20', 250000000, 2015),
(363, '53', '21', 35000000, 2015),
(364, '53', '27', 35000000, 2015),
(365, '53', '34', 50000000, 2015),
(366, '53', '36', 150000000, 2015),
(367, '54', '18', 84834000, 2015),
(368, '54', '19', 98400000, 2015),
(369, '54', '20', 334000000, 2015),
(370, '54', '21', 60600000, 2015),
(371, '54', '27', 577500000, 2015),
(372, '54', '34', 223322000, 2015),
(373, '54', '36', 73614000, 2015),
(374, '55', '17', 138600000, 2015),
(375, '55', '18', 37140000, 2015),
(376, '55', '19', 79860000, 2015),
(377, '55', '20', 58000000, 2015),
(378, '55', '21', 146400000, 2015),
(379, '55', '27', 32400000, 2015),
(380, '55', '34', 225340000, 2015),
(381, '55', '40', 109510000, 2015),
(382, '56', '18', 29960000, 2015),
(383, '56', '19', 38400000, 2015),
(384, '56', '21', 30000000, 2015),
(385, '56', '28', 55000000, 2015),
(386, '56', '32', 90360000, 2015),
(387, '56', '34', 21280000, 2015),
(388, '57', '18', 28550000, 2015),
(389, '57', '19', 38400000, 2015),
(390, '57', '21', 30000000, 2015),
(391, '57', '28', 75000000, 2015),
(392, '57', '32', 50000000, 2015),
(393, '57', '34', 23050000, 2015),
(394, '58', '18', 86680000, 2015),
(395, '58', '19', 38400000, 2015),
(396, '58', '21', 31920000, 2015),
(397, '58', '28', 35000000, 2015),
(398, '58', '32', 50000000, 2015),
(399, '58', '34', 53000000, 2015),
(400, '59', '18', 52680000, 2015),
(401, '59', '19', 38400000, 2015),
(402, '59', '21', 30000000, 2015),
(403, '59', '28', 90000000, 2015),
(404, '59', '32', 136560000, 2015),
(405, '59', '34', 45960000, 2015),
(406, '60', '18', 42040000, 2015),
(407, '60', '19', 19200000, 2015),
(408, '60', '21', 24000000, 2015),
(409, '60', '32', 5000000, 2015),
(410, '60', '34', 40760000, 2015),
(411, '61', '18', 9120000, 2015),
(412, '61', '19', 38400000, 2015),
(413, '61', '20', 160000000, 2015),
(414, '61', '21', 48000000, 2015),
(415, '61', '27', 40500000, 2015),
(416, '61', '34', 100060000, 2015),
(417, '61', '38', 1012460000, 2015),
(418, '61', '40', 936460000, 2015),
(419, '62', '17', 25920000, 2015),
(420, '62', '18', 17240000, 2015),
(421, '62', '21', 54000000, 2015),
(422, '62', '34', 114480000, 2015),
(423, '63', '18', 121150000, 2015),
(424, '63', '19', 624750000, 2015),
(425, '63', '20', 22000000, 2015),
(426, '63', '21', 138000000, 2015),
(427, '63', '22', 220000000, 2015),
(428, '63', '26', 39500000, 2015),
(429, '63', '27', 25000000, 2015),
(430, '63', '30', 60000000, 2015),
(431, '63', '32', 180000000, 2015),
(432, '63', '34', 256860000, 2015),
(433, '63', '38', 511900000, 2015),
(434, '64', '38', 2147483647, 2015),
(435, '65', '1', 2147483647, 2015),
(436, '65', '2', 121000, 2015),
(437, '65', '3', 608846000, 2015),
(438, '65', '4', 174899000, 2015),
(439, '65', '5', 156780000, 2015),
(440, '65', '6', 1984395000, 2015),
(441, '65', '7', 576498000, 2015),
(442, '65', '8', 511537000, 2015),
(443, '65', '9', 1269192000, 2015),
(444, '65', '11', 266435000, 2015),
(445, '65', '10', 15960000, 2015),
(446, '65', '12', 311300000, 2015),
(447, '65', '13', 2147483647, 2015),
(448, '66', '14', 41250000, 2015),
(449, '67', '14', 44120000, 2015),
(450, '67', '34', 440691000, 2015),
(451, '68', '29', 1470000000, 2015),
(452, '69', '31', 408082000, 2015),
(453, '70', '32', 308080000, 2015),
(454, '71', '32', 1144710000, 2015),
(455, '72', '32', 6940000, 2015),
(456, '73', '14', 1050000000, 2015),
(457, '73', '23', 527700000, 2015),
(458, '73', '24', 228000000, 2015),
(459, '73', '25', 25200000, 2015),
(460, '74', '14', 2147483647, 2015),
(461, '75', '16', 12000000, 2015),
(462, '76', '14', 105180000, 2015),
(463, '77', '15', 288800000, 2015),
(464, '78', '38', 205062000, 2015),
(465, '79', '38', 663900000, 2015),
(466, '80', '38', 711960000, 2015),
(467, '81', '39', 1000000000, 2015);

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
  `kode_jenis_barang` varchar(100) NOT NULL,
  `tipe_barang` varchar(25) DEFAULT NULL,
  `merek_barang` varchar(25) DEFAULT NULL,
  `spesifikasi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `pagu_harga`, `kode_jenis_barang`, `tipe_barang`, `merek_barang`, `spesifikasi`) VALUES
(1, 'BB001', 'Semen', 'pcs', '50000', 'Bahan Bangunan', '-', 'Tiga Roda', '-'),
(2, 'AT001', 'Kertas HVS', 'rim', '42000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'BOLA DUNIA', 'A4, 80gr'),
(3, 'AT002', 'Kertas HVS', 'rim', '39000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'BOLA DUNIA', 'A4, 70gr'),
(4, 'AT003', 'Kertas HVS', 'rim', '42000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'BOLA DUNIA', 'F4, 80gr'),
(5, 'AT004', 'Kertas Concorde', 'set', '6000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', '-', '-', 'A4, 160gr, isi 10'),
(6, 'AT005', 'Glossy Photo Paper', 'pak', '29000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, '-', 'A4, isi 20'),
(7, 'AT006', 'Ordner Plastik A4 + Mica 8.5 cm', 'buah', '57000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'BAMBI ', 'A4'),
(8, 'AT007', 'BINDEX Odner Karton Folio 5 cm (727)', 'lusin', '140000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(9, 'AT008', 'BANTEX Box File Tipe 4011', 'buah', '20000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(10, 'AT009', 'BANTEX Box File Tipe 1034', 'buah', '13000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(11, 'AT010', 'Map President F4', 'buah', '8000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(12, 'AT011', 'DAICHI Map Bening L9001 (A4) Putih', 'lusin', '15000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(13, 'AT012', 'BAMBI Clear Holder F4 Isi 20', 'buah', '14000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(14, 'AT013', 'Binder Clips', 'kotak', '12000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'KENKO', 'No. 260'),
(15, 'AT014', 'Binder Clips', 'kotak', '8500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'KENKO', 'No. 200'),
(16, 'AT015', 'Binder Clips', 'kotak', '6000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'KENKO', 'No. 155'),
(17, 'AT016', 'Binder Clips', 'kotak', '5000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'KENKO', 'No. 111'),
(18, 'AT017', 'Binder Clips', 'kotak', '2700', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'KENKO', 'No. 107'),
(19, 'AT018', 'Whiteboard Spidol', 'buah', '7000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'SNOWMAN ', 'BG-12'),
(20, 'AT019', 'Stapler', 'buah', '60000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'MAX', '50'),
(21, 'AT020', 'Stapler', 'buah', '12500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'MAX', '10'),
(22, 'AT021', 'Isi Stapler', 'pak', '70000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'MAX', '50'),
(23, 'AT022', 'Isi Stapler', 'pak', '35000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'MAX', '10'),
(24, 'AT023', 'Stapler Remover', 'buah', '25000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'MAX', NULL),
(25, 'AT024', 'POST IT Mark & Note', 'set', '8000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(26, 'AT025', 'POST IT 654 Warna', 'set', '48000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(27, 'AT026', 'SINAR DUNIA Amplop Putih No. 90', 'pak', '15000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(28, 'AT027', 'SINAR DUNIA Amplop Putih No. 104', 'pak', '10000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(29, 'AT028', 'PILOT Balliner Ballpoint', 'lusin', '140000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(30, 'AT029', 'FASTER Ballpoint C6/606', 'lusin', '25000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(31, 'AT030', 'STEADLER Pensil 2B', 'lusin', '35000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(32, 'AT031', 'Penggaris Besi 40 cm', 'buah', '10000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(33, 'AT032', 'KENKO Rautan Meja Besar - Angel 5', 'buah', '50000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(34, 'AT033', 'KENKO Name Card Book 320', 'buah', '40000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(35, 'AT034', 'JOYKO Gunting 848', 'buah', '7500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(36, 'AT035', 'Dispenser Tape Sedang M700', 'buah', '12500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(37, 'AT036', 'KENKO Cutter L-500', 'pak', '14000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(38, 'AT037', 'KENKO Cutter A-300', 'pak', '10000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(39, 'AT038', 'KENKO Isi Cutter Besar L-500', 'tube', '4500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(40, 'AT039', 'KENKO Isi Cutter Kecil A-300', 'tube', '2400', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(41, 'AT040', 'Amplop Coklat A4', 'pak', '27000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(42, 'AT041', 'Amplop Coklat Folio', 'pak', '31000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(43, 'AT042', 'Pensil Mekanik Pentel 0.5', 'buah', '10000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(44, 'AT043', 'isi Pensil Mekanik 0.5', 'buah', '2500', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(45, 'AT044', 'BOSS Stabillo ', 'buah', '9000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(46, 'AT045', 'Black Tonner', 'buah', '850000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'HP', 'P1505 (85A)'),
(47, 'AT046', 'Black Tonner', 'buah', '850000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'HP', 'M1132 MFP (85A)'),
(48, 'AT047', 'Tinta Printer', 'buah', '100000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'Epson', 'Black - L350'),
(49, 'AT048', 'Tinta Printer', 'buah', '100000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'Epson', 'Cyan - L351'),
(50, 'AT049', 'Tinta Printer', 'buah', '100000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'Epson', 'Magenta - L352'),
(51, 'AT050', 'Tinta Printer', 'buah', '100000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'Epson', 'Yellow - L353'),
(52, 'AT051', 'USB Flashdisk', 'buah', '150000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'Kingston', '16 GB'),
(53, 'AT052', 'DVD-R', 'tabung', '200000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, 'isi 50'),
(54, 'AT053', 'CD-RW', 'tabung', '215000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, 'GT-Pro', 'isi 50'),
(55, 'AT054', 'Casing CD dan DVD Plastik', 'buah', '3000', 'ATK, Bahan Komputer, dan Bahan Dokumentasi', NULL, NULL, NULL),
(56, 'BBG001', 'semen', 'pcs', '60000', 'Bahan Bangunan', '-', 'HOLCIM', '-'),
(57, 'BBG003', 'Semen', 'pcs', '55000', 'Bahan Bangunan', '-', 'Semen Indonesia', '-');

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
-- Table structure for table `biaya_diklat`
--

CREATE TABLE IF NOT EXISTS `biaya_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `biaya_diklat`
--

INSERT INTO `biaya_diklat` (`id`, `nama_provinsi`, `biaya`) VALUES
(1, 'ACEH', 140000),
(2, 'SUMATERA UTARA', 150000),
(3, 'RIAU', 150000),
(4, 'KEPULAUAN RIAU', 150000),
(5, 'JAMBI', 150000),
(6, 'SUMATERA BARAT', 150000),
(7, 'SUMATERA SELATAN', 150000),
(8, 'LAMPUNG', 150000),
(9, 'BENGKULU', 150000),
(10, 'BANGKA BELITUNG', 160000),
(11, 'BANTEN', 150000),
(12, 'JAWA BARAT', 170000),
(13, 'D.K.I   JAKARTA', 210000),
(14, 'JAWA TENGAH', 150000),
(15, 'D.I.  YOGYAKARTA', 170000),
(16, 'JAWA TIMUR', 160000),
(17, 'B A L I', 190000),
(18, 'NUSA TENGGARA BARAT', 180000),
(19, 'NUSA TENGGARA TIMUR', 170000),
(20, 'KALIMANTAN BARAT', 150000),
(21, 'KALIMANTAN TENGAH', 140000),
(22, 'KALIMANTAN SELATAN', 150000),
(23, 'KALIMANTAN TIMUR', 170000),
(24, 'KALIMANTAN UTARA ', 170000),
(25, 'SULAWESI UTARA', 150000),
(26, 'GORONTALO', 150000),
(27, 'SULAWESI BARAT', 160000),
(28, 'SULAWESI SELATAN', 170000),
(29, 'SULAWESI TENGAH', 150000),
(30, 'SULAWESI TENGGARA', 150000),
(31, 'MALUKU', 150000),
(32, 'MALUKU UTARA', 170000),
(33, 'PAPUA', 230000),
(34, 'PAPUA BARAT', 190000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_narasumber`
--

CREATE TABLE IF NOT EXISTS `biaya_narasumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `biaya_narasumber`
--

INSERT INTO `biaya_narasumber` (`id`, `jabatan`, `biaya`) VALUES
(1, 'Menteri / Pejabat Setingkat / Pejabat Lainya', 1700000),
(2, 'Nara Sumber / Pejabat Eselon 1', 1400000),
(3, 'Nara Sumber ( Profesor )', 1500000),
(4, 'Nara Sumber ( Doktor / S3 )', 1400000),
(5, 'Nara Sumber ( Master / S2 )', 1250000),
(6, 'Nara Sumber ( Sarjana / S1 / Sp 1 )', 1000000),
(7, 'Nara Sumber / Pejabat Eselon II', 1000000),
(8, 'Nara Sumber / Pejabat Eselon III', 900000),
(9, 'Nara Sumber / Pejabat Eselon IV kebawah', 750000),
(12, 'Moderator', 700000),
(13, 'Lainnya', 500000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273 ;

--
-- Dumping data for table `biaya_penginapan`
--

INSERT INTO `biaya_penginapan` (`id`, `nama_kota`, `golongan`, `biaya`) VALUES
(1, 'ACEH', 'Esselon I', 4420000),
(2, 'SUMATERA UTARA', 'Esselon I', 4960000),
(3, 'RIAU', 'Esselon I', 3817000),
(4, 'KEPULAUAN RIAU', 'Esselon I', 4275000),
(5, 'JAMBI', 'Esselon I', 4000000),
(6, 'SUMATERA BARAT', 'Esselon I', 4240000),
(7, 'SUMATERA SELATAN', 'Esselon I', 4680000),
(8, 'LAMPUNG', 'Esselon I', 3960000),
(9, 'BENGKULU', 'Esselon I', 1300000),
(10, 'BANGKA BELITUNG', 'Esselon I', 3335000),
(11, 'BANTEN', 'Esselon I', 3808000),
(12, 'JAWA BARAT', 'Esselon I', 3664000),
(13, 'D.K.I   JAKARTA', 'Esselon I', 8720000),
(14, 'JAWA TENGAH', 'Esselon I', 4146000),
(15, 'D.I.  YOGYAKARTA', 'Esselon I', 4620000),
(16, 'JAWA TIMUR', 'Esselon I', 4400000),
(17, 'B A L I', 'Esselon I', 4881000),
(18, 'NUSA TENGGARA BARAT', 'Esselon I', 2429000),
(19, 'NUSA TENGGARA TIMUR', 'Esselon I', 3000000),
(20, 'KALIMANTAN BARAT', 'Esselon I', 2400000),
(21, 'KALIMANTAN TENGAH', 'Esselon I', 3000000),
(22, 'KALIMANTAN SELATAN', 'Esselon I', 4250000),
(23, 'KALIMANTAN TIMUR', 'Esselon I', 4000000),
(24, 'KALIMANTAN UTARA ', 'Esselon I', 4000000),
(25, 'SULAWESI UTARA', 'Esselon I', 3200000),
(26, 'GORONTALO', 'Esselon I', 1320000),
(27, 'SULAWESI BARAT', 'Esselon I', 1260000),
(28, 'SULAWESI SELATAN', 'Esselon I', 4820000),
(29, 'SULAWESI TENGAH', 'Esselon I', 2030000),
(30, 'SULAWESI TENGGARA', 'Esselon I', 1850000),
(31, 'MALUKU', 'Esselon I', 3000000),
(32, 'MALUKU UTARA', 'Esselon I', 3110000),
(33, 'PAPUA', 'Esselon I', 2850000),
(34, 'PAPUA BARAT', 'Esselon I', 2750000),
(35, 'ACEH', 'Esselon II', 1308000),
(36, 'SUMATERA UTARA', 'Esselon II', 1214000),
(37, 'RIAU', 'Esselon II', 1168000),
(38, 'KEPULAUAN RIAU', 'Esselon II', 1285000),
(39, 'JAMBI', 'Esselon II', 1176000),
(40, 'SUMATERA BARAT', 'Esselon II', 1155000),
(41, 'SUMATERA SELATAN', 'Esselon II', 1228000),
(42, 'LAMPUNG', 'Esselon II', 1299000),
(43, 'BENGKULU', 'Esselon II', 790000),
(44, 'BANGKA BELITUNG', 'Esselon II', 1310000),
(45, 'BANTEN', 'Esselon II', 1430000),
(46, 'JAWA BARAT', 'Esselon II', 1753000),
(47, 'D.K.I   JAKARTA', 'Esselon II', 1086000),
(48, 'JAWA TENGAH', 'Esselon II', 1478000),
(49, 'D.I.  YOGYAKARTA', 'Esselon II', 1334000),
(50, 'JAWA TIMUR', 'Esselon II', 1359000),
(51, 'B A L I', 'Esselon II', 1810000),
(52, 'NUSA TENGGARA BARAT', 'Esselon II', 2738000),
(53, 'NUSA TENGGARA TIMUR', 'Esselon II', 1000000),
(54, 'KALIMANTAN BARAT', 'Esselon II', 1130000),
(55, 'KALIMANTAN TENGAH', 'Esselon II', 1596000),
(56, 'KALIMANTAN SELATAN', 'Esselon II', 1679000),
(57, 'KALIMANTAN TIMUR', 'Esselon II', 3021000),
(58, 'KALIMANTAN UTARA ', 'Esselon II', 3021000),
(59, 'SULAWESI UTARA', 'Esselon II', 1553000),
(60, 'GORONTALO', 'Esselon II', 1134000),
(61, 'SULAWESI BARAT', 'Esselon II', 1030000),
(62, 'SULAWESI SELATAN', 'Esselon II', 1912000),
(63, 'SULAWESI TENGAH', 'Esselon II', 1298000),
(64, 'SULAWESI TENGGARA', 'Esselon II', 1070000),
(65, 'MALUKU', 'Esselon II', 1030000),
(66, 'MALUKU UTARA', 'Esselon II', 1512000),
(67, 'PAPUA', 'Esselon II', 1668000),
(68, 'PAPUA BARAT', 'Esselon II', 1482000),
(69, 'ACEH', 'Esselon III', 1080000),
(70, 'SUMATERA UTARA', 'Esselon III', 703000),
(71, 'RIAU', 'Esselon III', 868000),
(72, 'KEPULAUAN RIAU', 'Esselon III', 650000),
(73, 'JAMBI', 'Esselon III', 697000),
(74, 'SUMATERA BARAT', 'Esselon III', 884000),
(75, 'SUMATERA SELATAN', 'Esselon III', 605000),
(76, 'LAMPUNG', 'Esselon III', 790000),
(77, 'BENGKULU', 'Esselon III', 712000),
(78, 'BANGKA BELITUNG', 'Esselon III', 850000),
(79, 'BANTEN', 'Esselon III', 1024000),
(80, 'JAWA BARAT', 'Esselon III', 949000),
(81, 'D.K.I   JAKARTA', 'Esselon III', 800000),
(82, 'JAWA TENGAH', 'Esselon III', 1024000),
(83, 'D.I.  YOGYAKARTA', 'Esselon III', 747000),
(84, 'JAWA TIMUR', 'Esselon III', 841000),
(85, 'B A L I', 'Esselon III', 1304000),
(86, 'NUSA TENGGARA BARAT', 'Esselon III', 737000),
(87, 'NUSA TENGGARA TIMUR', 'Esselon III', 700000),
(88, 'KALIMANTAN BARAT', 'Esselon III', 866000),
(89, 'KALIMANTAN TENGAH', 'Esselon III', 923000),
(90, 'KALIMANTAN SELATAN', 'Esselon III', 816000),
(91, 'KALIMANTAN TIMUR', 'Esselon III', 1596000),
(92, 'KALIMANTAN UTARA ', 'Esselon III', 1596000),
(93, 'SULAWESI UTARA', 'Esselon III', 640000),
(94, 'GORONTALO', 'Esselon III', 910000),
(95, 'SULAWESI BARAT', 'Esselon III', 910000),
(96, 'SULAWESI SELATAN', 'Esselon III', 968000),
(97, 'SULAWESI TENGAH', 'Esselon III', 894000),
(98, 'SULAWESI TENGGARA', 'Esselon III', 802000),
(99, 'MALUKU', 'Esselon III', 680000),
(100, 'MALUKU UTARA', 'Esselon III', 600000),
(101, 'PAPUA', 'Esselon III', 754000),
(102, 'PAPUA BARAT', 'Esselon III', 976000),
(103, 'ACEH', 'IV', 1080000),
(104, 'SUMATERA UTARA', 'IV', 703000),
(105, 'RIAU', 'IV', 868000),
(106, 'KEPULAUAN RIAU', 'IV', 650000),
(107, 'JAMBI', 'IV', 697000),
(108, 'SUMATERA BARAT', 'IV', 884000),
(109, 'SUMATERA SELATAN', 'IV', 605000),
(110, 'LAMPUNG', 'IV', 790000),
(111, 'BENGKULU', 'IV', 712000),
(112, 'BANGKA BELITUNG', 'IV', 850000),
(113, 'BANTEN', 'IV', 1024000),
(114, 'JAWA BARAT', 'IV', 949000),
(115, 'D.K.I   JAKARTA', 'IV', 800000),
(116, 'JAWA TENGAH', 'IV', 1024000),
(117, 'D.I.  YOGYAKARTA', 'IV', 747000),
(118, 'JAWA TIMUR', 'IV', 841000),
(119, 'B A L I', 'IV', 1304000),
(120, 'NUSA TENGGARA BARAT', 'IV', 737000),
(121, 'NUSA TENGGARA TIMUR', 'IV', 700000),
(122, 'KALIMANTAN BARAT', 'IV', 866000),
(123, 'KALIMANTAN TENGAH', 'IV', 923000),
(124, 'KALIMANTAN SELATAN', 'IV', 816000),
(125, 'KALIMANTAN TIMUR', 'IV', 1596000),
(126, 'KALIMANTAN UTARA ', 'IV', 1596000),
(127, 'SULAWESI UTARA', 'IV', 640000),
(128, 'GORONTALO', 'IV', 910000),
(129, 'SULAWESI BARAT', 'IV', 910000),
(130, 'SULAWESI SELATAN', 'IV', 968000),
(131, 'SULAWESI TENGAH', 'IV', 894000),
(132, 'SULAWESI TENGGARA', 'IV', 802000),
(133, 'MALUKU', 'IV', 680000),
(134, 'MALUKU UTARA', 'IV', 600000),
(135, 'PAPUA', 'IV', 754000),
(136, 'PAPUA BARAT', 'IV', 976000),
(137, 'ACEH', 'Esselon IV', 410000),
(138, 'SUMATERA UTARA', 'Esselon IV', 505000),
(139, 'RIAU', 'Esselon IV', 450000),
(140, 'KEPULAUAN RIAU', 'Esselon IV', 502000),
(141, 'JAMBI', 'Esselon IV', 382000),
(142, 'SUMATERA BARAT', 'Esselon IV', 477000),
(143, 'SUMATERA SELATAN', 'Esselon IV', 514000),
(144, 'LAMPUNG', 'Esselon IV', 374000),
(145, 'BENGKULU', 'Esselon IV', 599000),
(146, 'BANGKA BELITUNG', 'Esselon IV', 533000),
(147, 'BANTEN', 'Esselon IV', 797000),
(148, 'JAWA BARAT', 'Esselon IV', 515000),
(149, 'D.K.I   JAKARTA', 'Esselon IV', 610000),
(150, 'JAWA TENGAH', 'Esselon IV', 497000),
(151, 'D.I.  YOGYAKARTA', 'Esselon IV', 629000),
(152, 'JAWA TIMUR', 'Esselon IV', 499000),
(153, 'B A L I', 'Esselon IV', 904000),
(154, 'NUSA TENGGARA BARAT', 'Esselon IV', 540000),
(155, 'NUSA TENGGARA TIMUR', 'Esselon IV', 662000),
(156, 'KALIMANTAN BARAT', 'Esselon IV', 430000),
(157, 'KALIMANTAN TENGAH', 'Esselon IV', 558000),
(158, 'KALIMANTAN SELATAN', 'Esselon IV', 500000),
(159, 'KALIMANTAN TIMUR', 'Esselon IV', 550000),
(160, 'KALIMANTAN UTARA ', 'Esselon IV', 550000),
(161, 'SULAWESI UTARA', 'Esselon IV', 549000),
(162, 'GORONTALO', 'Esselon IV', 423000),
(163, 'SULAWESI BARAT', 'Esselon IV', 425000),
(164, 'SULAWESI SELATAN', 'Esselon IV', 539000),
(165, 'SULAWESI TENGAH', 'Esselon IV', 493000),
(166, 'SULAWESI TENGGARA', 'Esselon IV', 488000),
(167, 'MALUKU', 'Esselon IV', 545000),
(168, 'MALUKU UTARA', 'Esselon IV', 478000),
(169, 'PAPUA', 'Esselon IV', 460000),
(170, 'PAPUA BARAT', 'Esselon IV', 798000),
(171, 'ACEH', 'III', 410000),
(172, 'SUMATERA UTARA', 'III', 505000),
(173, 'RIAU', 'III', 450000),
(174, 'KEPULAUAN RIAU', 'III', 502000),
(175, 'JAMBI', 'III', 382000),
(176, 'SUMATERA BARAT', 'III', 477000),
(177, 'SUMATERA SELATAN', 'III', 514000),
(178, 'LAMPUNG', 'III', 374000),
(179, 'BENGKULU', 'III', 599000),
(180, 'BANGKA BELITUNG', 'III', 533000),
(181, 'BANTEN', 'III', 797000),
(182, 'JAWA BARAT', 'III', 515000),
(183, 'D.K.I   JAKARTA', 'III', 610000),
(184, 'JAWA TENGAH', 'III', 497000),
(185, 'D.I.  YOGYAKARTA', 'III', 629000),
(186, 'JAWA TIMUR', 'III', 499000),
(187, 'B A L I', 'III', 904000),
(188, 'NUSA TENGGARA BARAT', 'III', 540000),
(189, 'NUSA TENGGARA TIMUR', 'III', 662000),
(190, 'KALIMANTAN BARAT', 'III', 430000),
(191, 'KALIMANTAN TENGAH', 'III', 558000),
(192, 'KALIMANTAN SELATAN', 'III', 500000),
(193, 'KALIMANTAN TIMUR', 'III', 550000),
(194, 'KALIMANTAN UTARA ', 'III', 550000),
(195, 'SULAWESI UTARA', 'III', 549000),
(196, 'GORONTALO', 'III', 423000),
(197, 'SULAWESI BARAT', 'III', 425000),
(198, 'SULAWESI SELATAN', 'III', 539000),
(199, 'SULAWESI TENGAH', 'III', 493000),
(200, 'SULAWESI TENGGARA', 'III', 488000),
(201, 'MALUKU', 'III', 545000),
(202, 'MALUKU UTARA', 'III', 478000),
(203, 'PAPUA', 'III', 460000),
(204, 'PAPUA BARAT', 'III', 798000),
(205, 'ACEH', 'I', 370000),
(206, 'SUMATERA UTARA', 'I', 310000),
(207, 'RIAU', 'I', 380000),
(208, 'KEPULAUAN RIAU', 'I', 280000),
(209, 'JAMBI', 'I', 290000),
(210, 'SUMATERA BARAT', 'I', 370000),
(211, 'SUMATERA SELATAN', 'I', 310000),
(212, 'LAMPUNG', 'I', 356000),
(213, 'BENGKULU', 'I', 510000),
(214, 'BANGKA BELITUNG', 'I', 304000),
(215, 'BANTEN', 'I', 400000),
(216, 'JAWA BARAT', 'I', 463000),
(217, 'D.K.I   JAKARTA', 'I', 400000),
(218, 'JAWA TENGAH', 'I', 350000),
(219, 'D.I.  YOGYAKARTA', 'I', 461000),
(220, 'JAWA TIMUR', 'I', 329000),
(221, 'B A L I', 'I', 658000),
(222, 'NUSA TENGGARA BARAT', 'I', 360000),
(223, 'NUSA TENGGARA TIMUR', 'I', 400000),
(224, 'KALIMANTAN BARAT', 'I', 361000),
(225, 'KALIMANTAN TENGAH', 'I', 436000),
(226, 'KALIMANTAN SELATAN', 'I', 379000),
(227, 'KALIMANTAN TIMUR', 'I', 450000),
(228, 'KALIMANTAN UTARA ', 'I', 450000),
(229, 'SULAWESI UTARA', 'I', 342000),
(230, 'GORONTALO', 'I', 240000),
(231, 'SULAWESI BARAT', 'I', 360000),
(232, 'SULAWESI SELATAN', 'I', 378000),
(233, 'SULAWESI TENGAH', 'I', 389000),
(234, 'SULAWESI TENGGARA', 'I', 420000),
(235, 'MALUKU', 'I', 414000),
(236, 'MALUKU UTARA', 'I', 380000),
(237, 'PAPUA', 'I', 414000),
(238, 'PAPUA BARAT', 'I', 370000),
(239, 'ACEH', 'II', 370000),
(240, 'SUMATERA UTARA', 'II', 310000),
(241, 'RIAU', 'II', 380000),
(242, 'KEPULAUAN RIAU', 'II', 280000),
(243, 'JAMBI', 'II', 290000),
(244, 'SUMATERA BARAT', 'II', 370000),
(245, 'SUMATERA SELATAN', 'II', 310000),
(246, 'LAMPUNG', 'II', 356000),
(247, 'BENGKULU', 'II', 510000),
(248, 'BANGKA BELITUNG', 'II', 304000),
(249, 'BANTEN', 'II', 400000),
(250, 'JAWA BARAT', 'II', 463000),
(251, 'D.K.I   JAKARTA', 'II', 400000),
(252, 'JAWA TENGAH', 'II', 350000),
(253, 'D.I.  YOGYAKARTA', 'II', 461000),
(254, 'JAWA TIMUR', 'II', 329000),
(255, 'B A L I', 'II', 658000),
(256, 'NUSA TENGGARA BARAT', 'II', 360000),
(257, 'NUSA TENGGARA TIMUR', 'II', 400000),
(258, 'KALIMANTAN BARAT', 'II', 361000),
(259, 'KALIMANTAN TENGAH', 'II', 436000),
(260, 'KALIMANTAN SELATAN', 'II', 379000),
(261, 'KALIMANTAN TIMUR', 'II', 450000),
(262, 'KALIMANTAN UTARA ', 'II', 450000),
(263, 'SULAWESI UTARA', 'II', 342000),
(264, 'GORONTALO', 'II', 240000),
(265, 'SULAWESI BARAT', 'II', 360000),
(266, 'SULAWESI SELATAN', 'II', 378000),
(267, 'SULAWESI TENGAH', 'II', 389000),
(268, 'SULAWESI TENGGARA', 'II', 420000),
(269, 'MALUKU', 'II', 414000),
(270, 'MALUKU UTARA', 'II', 380000),
(271, 'PAPUA', 'II', 414000),
(272, 'PAPUA BARAT', 'II', 370000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_representatif`
--

CREATE TABLE IF NOT EXISTS `biaya_representatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(25) DEFAULT NULL,
  `tingkat` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `biaya_representatif`
--

INSERT INTO `biaya_representatif` (`id`, `nama_kota`, `tingkat`, `biaya`) VALUES
(1, 'ACEH', 'Eselon I', 200000),
(2, 'ACEH', 'Eselon II', 100000),
(3, 'B A L I', 'Esselon I', 300000),
(4, 'D.K.I   JAKARTA', 'Esselon I', 200000),
(5, 'BANGKA BELITUNG', 'Esselon I', 300000);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `biaya_sewa`
--

INSERT INTO `biaya_sewa` (`id`, `jenis_kendaraan`, `nama_kota`, `biaya`) VALUES
(1, 'Roda 4', 'ACEH', 200000),
(2, 'Roda 4', 'SUMATERA UTARA', 200000),
(3, 'Roda 4', 'RIAU', 200000),
(4, 'Roda 4', 'KEPULAUAN RIAU', 200000),
(5, 'Roda 4', 'JAMBI', 200000),
(6, 'Roda 4', 'SUMATERA BARAT', 200000),
(7, 'Roda 4', 'SUMATERA SELATAN', 200000),
(8, 'Roda 4', 'LAMPUNG', 200000),
(9, 'Roda 4', 'BENGKULU', 200000),
(10, 'Roda 4', 'BANGKA BELITUNG', 200000),
(11, 'Roda 4', 'BANTEN', 200000),
(12, 'Roda 4', 'JAWA BARAT', 200000),
(13, 'Roda 4', 'D.K.I   JAKARTA', 200000),
(14, 'Roda 4', 'JAWA TENGAH', 200000),
(15, 'Roda 4', 'D.I.  YOGYAKARTA', 200000),
(16, 'Roda 4', 'JAWA TIMUR', 200000),
(17, 'Roda 4', 'B A L I', 200000),
(18, 'Roda 4', 'NUSA TENGGARA BARAT', 200000),
(19, 'Roda 4', 'NUSA TENGGARA TIMUR', 200000),
(20, 'Roda 4', 'KALIMANTAN BARAT', 200000),
(21, 'Roda 4', 'KALIMANTAN TENGAH', 200000),
(22, 'Roda 4', 'KALIMANTAN SELATAN', 200000),
(23, 'Roda 4', 'KALIMANTAN TIMUR', 200000),
(24, 'Roda 4', 'KALIMANTAN UTARA ', 200000),
(25, 'Roda 4', 'SULAWESI UTARA', 200000),
(26, 'Roda 4', 'GORONTALO', 200000),
(27, 'Roda 4', 'SULAWESI BARAT', 200000),
(28, 'Roda 4', 'SULAWESI SELATAN', 200000),
(29, 'Roda 4', 'SULAWESI TENGAH', 200000),
(30, 'Roda 4', 'SULAWESI TENGGARA', 200000),
(31, 'Roda 4', 'MALUKU', 200000),
(32, 'Roda 4', 'MALUKU UTARA', 200000),
(33, 'Roda 4', 'PAPUA', 200000),
(34, 'Roda 4', 'PAPUA BARAT', 200000),
(35, 'Roda 6 / Bus Sedang', 'ACEH', 400000),
(36, 'Roda 6 / Bus Sedang', 'SUMATERA UTARA', 400000),
(37, 'Roda 6 / Bus Sedang', 'RIAU', 400000),
(38, 'Roda 6 / Bus Sedang', 'KEPULAUAN RIAU', 400000),
(39, 'Roda 6 / Bus Sedang', 'JAMBI', 400000),
(40, 'Roda 6 / Bus Sedang', 'SUMATERA BARAT', 400000),
(41, 'Roda 6 / Bus Sedang', 'SUMATERA SELATAN', 400000),
(42, 'Roda 6 / Bus Sedang', 'LAMPUNG', 400000),
(43, 'Roda 6 / Bus Sedang', 'BENGKULU', 400000),
(44, 'Roda 6 / Bus Sedang', 'BANGKA BELITUNG', 400000),
(45, 'Roda 6 / Bus Sedang', 'BANTEN', 400000),
(46, 'Roda 6 / Bus Sedang', 'JAWA BARAT', 400000),
(47, 'Roda 6 / Bus Sedang', 'D.K.I   JAKARTA', 400000),
(48, 'Roda 6 / Bus Sedang', 'JAWA TENGAH', 400000),
(49, 'Roda 6 / Bus Sedang', 'D.I.  YOGYAKARTA', 400000),
(50, 'Roda 6 / Bus Sedang', 'JAWA TIMUR', 400000),
(51, 'Roda 6 / Bus Sedang', 'B A L I', 400000),
(52, 'Roda 6 / Bus Sedang', 'NUSA TENGGARA BARAT', 400000),
(53, 'Roda 6 / Bus Sedang', 'NUSA TENGGARA TIMUR', 400000),
(54, 'Roda 6 / Bus Sedang', 'KALIMANTAN BARAT', 400000),
(55, 'Roda 6 / Bus Sedang', 'KALIMANTAN TENGAH', 400000),
(56, 'Roda 6 / Bus Sedang', 'KALIMANTAN SELATAN', 400000),
(57, 'Roda 6 / Bus Sedang', 'KALIMANTAN TIMUR', 400000),
(58, 'Roda 6 / Bus Sedang', 'KALIMANTAN UTARA ', 400000),
(59, 'Roda 6 / Bus Sedang', 'SULAWESI UTARA', 400000),
(60, 'Roda 6 / Bus Sedang', 'GORONTALO', 400000),
(61, 'Roda 6 / Bus Sedang', 'SULAWESI BARAT', 400000),
(62, 'Roda 6 / Bus Sedang', 'SULAWESI SELATAN', 400000),
(63, 'Roda 6 / Bus Sedang', 'SULAWESI TENGAH', 400000),
(64, 'Roda 6 / Bus Sedang', 'SULAWESI TENGGARA', 400000),
(65, 'Roda 6 / Bus Sedang', 'MALUKU', 400000),
(66, 'Roda 6 / Bus Sedang', 'MALUKU UTARA', 400000),
(67, 'Roda 6 / Bus Sedang', 'PAPUA', 400000),
(68, 'Roda 6 / Bus Sedang', 'PAPUA BARAT', 400000),
(69, 'Roda 6 / Bus Besar', 'ACEH', 500000),
(70, 'Roda 6 / Bus Besar', 'SUMATERA UTARA', 500000),
(71, 'Roda 6 / Bus Besar', 'RIAU', 500000),
(72, 'Roda 6 / Bus Besar', 'KEPULAUAN RIAU', 500000),
(73, 'Roda 6 / Bus Besar', 'JAMBI', 500000),
(74, 'Roda 6 / Bus Besar', 'SUMATERA BARAT', 500000),
(75, 'Roda 6 / Bus Besar', 'SUMATERA SELATAN', 500000),
(76, 'Roda 6 / Bus Besar', 'LAMPUNG', 500000),
(77, 'Roda 6 / Bus Besar', 'BENGKULU', 500000),
(78, 'Roda 6 / Bus Besar', 'BANGKA BELITUNG', 500000),
(79, 'Roda 6 / Bus Besar', 'BANTEN', 500000),
(80, 'Roda 6 / Bus Besar', 'JAWA BARAT', 500000),
(81, 'Roda 6 / Bus Besar', 'D.K.I   JAKARTA', 500000),
(82, 'Roda 6 / Bus Besar', 'JAWA TENGAH', 500000),
(83, 'Roda 6 / Bus Besar', 'D.I.  YOGYAKARTA', 500000),
(84, 'Roda 6 / Bus Besar', 'JAWA TIMUR', 500000),
(85, 'Roda 6 / Bus Besar', 'B A L I', 500000),
(86, 'Roda 6 / Bus Besar', 'NUSA TENGGARA BARAT', 500000),
(87, 'Roda 6 / Bus Besar', 'NUSA TENGGARA TIMUR', 500000),
(88, 'Roda 6 / Bus Besar', 'KALIMANTAN BARAT', 500000),
(89, 'Roda 6 / Bus Besar', 'KALIMANTAN TENGAH', 500000),
(90, 'Roda 6 / Bus Besar', 'KALIMANTAN SELATAN', 500000),
(91, 'Roda 6 / Bus Besar', 'KALIMANTAN TIMUR', 500000),
(92, 'Roda 6 / Bus Besar', 'KALIMANTAN UTARA ', 500000),
(93, 'Roda 6 / Bus Besar', 'SULAWESI UTARA', 500000),
(94, 'Roda 6 / Bus Besar', 'GORONTALO', 500000),
(95, 'Roda 6 / Bus Besar', 'SULAWESI BARAT', 500000),
(96, 'Roda 6 / Bus Besar', 'SULAWESI SELATAN', 500000),
(97, 'Roda 6 / Bus Besar', 'SULAWESI TENGAH', 500000),
(98, 'Roda 6 / Bus Besar', 'SULAWESI TENGGARA', 500000),
(99, 'Roda 6 / Bus Besar', 'MALUKU', 500000),
(100, 'Roda 6 / Bus Besar', 'MALUKU UTARA', 500000),
(101, 'Roda 6 / Bus Besar', 'PAPUA', 500000),
(102, 'Roda 6 / Bus Besar', 'PAPUA BARAT', 500000);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
(11, 'Bandung', 'Manokwari', 'Pesawat', 700000),
(12, 'Bandung', 'Pangkal Pinang', 'Pesawat', 175000),
(13, 'Pangkal Pinang', 'Jambi', 'Pesawat', 185000),
(14, 'Jambi', 'Bandung', 'Pesawat', 195000),
(15, 'Banda Aceh', 'Bandung', 'Pesawat', 175000),
(16, 'Banda Aceh', 'Denpasar', 'Pesawat', 300000),
(17, 'Denpasar', 'Banda Aceh', 'Pesawat', 300000),
(19, 'Bandung', 'Denpasar', 'Pesawat', 300000),
(20, 'Denpasar', 'Bandung', 'Pesawat', 300000),
(21, 'Denpasar', 'Pangkal Pinang', 'Pesawat', 1500000),
(22, 'Pangkal Pinang', 'Bandung', 'Pesawat', 300000),
(23, 'Pangkal Pinang', 'Banda Aceh', 'Pesawat', 300000),
(24, 'Pangkal Pinang', 'Jakarta', 'Pesawat', 200000),
(25, 'Denpasar', 'Surabaya', 'Pesawat', 400000),
(26, 'Surabaya', 'Bandung', 'Pesawat', 400000);

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

INSERT INTO `biaya_transport_dlm_kota` (`id`, `nama_kota`, `biaya`) VALUES
(0, 'ACEH', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_perjalanan_dinas`
--

CREATE TABLE IF NOT EXISTS `bukti_perjalanan_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `tgl_entri_bukti` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis_biaya` varchar(25) NOT NULL,
  `biaya` int(11) DEFAULT NULL,
  `nomor_bukti` text,
  `jumlah_bukti` int(20) DEFAULT NULL,
  `kota_tujuan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=537 ;

--
-- Dumping data for table `bukti_perjalanan_dinas`
--

INSERT INTO `bukti_perjalanan_dinas` (`id`, `id_pegawai`, `id_header`, `tgl_entri_bukti`, `jenis_biaya`, `biaya`, `nomor_bukti`, `jumlah_bukti`, `kota_tujuan`) VALUES
(224, 10, 12, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Banda Aceh'),
(223, 10, 12, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Banda Aceh'),
(222, 10, 12, '2015-05-25 02:17:58', 'riil_2', 0, 'sdfds', 200000, 'Banda Aceh'),
(221, 10, 12, '2015-05-25 02:17:58', 'riil', 400000, 'riil', 200000, 'Banda Aceh'),
(220, 10, 12, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Banda Aceh'),
(219, 10, 12, '2015-05-25 02:17:58', 'transport_pendukung', 300000, 'dfs', 300000, 'Banda Aceh'),
(218, 10, 12, '2015-05-25 02:17:58', 'transport_utama', 1500000, 'dsf', 1500000, 'Banda Aceh'),
(217, 10, 12, '2015-05-25 02:17:58', 'penginapan', 1230000, 'sfds', 1230000, 'Banda Aceh'),
(215, 10, 12, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung'),
(216, 10, 12, '2015-05-25 02:17:58', 'harian', 1440000, 'dsf', 1440000, 'Banda Aceh'),
(214, 10, 12, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(213, 10, 12, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(212, 10, 12, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(211, 10, 12, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(210, 10, 12, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(209, 10, 12, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(208, 10, 12, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(207, 10, 12, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(206, 10, 12, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(205, 10, 12, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Bandung'),
(204, 10, 12, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(203, 10, 12, '2015-05-25 02:17:58', 'transport_utama_2', 0, '0', 0, 'Bandung'),
(202, 10, 12, '2015-05-25 02:17:58', 'transport_utama', 175000, 'trans', 175000, 'Bandung'),
(201, 10, 12, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(200, 10, 12, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(225, 10, 12, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Banda Aceh'),
(226, 10, 12, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Banda Aceh'),
(227, 10, 12, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Banda Aceh'),
(228, 10, 12, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Banda Aceh'),
(229, 10, 12, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Banda Aceh'),
(230, 10, 12, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Banda Aceh'),
(231, 40, 18, '2015-05-25 02:17:58', 'harian', 960000, '1', 960000, 'Denpasar'),
(232, 40, 18, '2015-05-25 02:17:58', 'penginapan', 904000, '121212', 904000, 'Denpasar'),
(233, 40, 18, '2015-05-25 02:17:58', 'transport_utama', 300000, '1212', 300000, 'Denpasar'),
(234, 40, 18, '2015-05-25 02:17:58', 'transport_pendukung', 120000, '12121', 120000, 'Denpasar'),
(235, 40, 18, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Denpasar'),
(236, 40, 18, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Denpasar'),
(237, 40, 18, '2015-05-25 02:17:58', 'diklat', 380000, '12121212', 300000, 'Denpasar'),
(238, 40, 18, '2015-05-25 02:17:58', 'riil', 220000, 'asdasdsadasdad', 120000, 'Denpasar'),
(239, 40, 18, '2015-05-25 02:17:58', 'riil_2', 0, 'sdsdsdsd', 50000, 'Denpasar'),
(240, 40, 18, '2015-05-25 02:17:58', 'riil_3', 0, 'dddddddd', 50000, 'Denpasar'),
(241, 40, 18, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Denpasar'),
(242, 40, 18, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Denpasar'),
(243, 40, 18, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Denpasar'),
(244, 40, 18, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Denpasar'),
(245, 40, 18, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Denpasar'),
(246, 40, 18, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Denpasar'),
(247, 40, 18, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Denpasar'),
(248, 40, 18, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(249, 40, 18, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(250, 40, 18, '2015-05-25 02:17:58', 'transport_utama', 300000, '1213231', 300000, 'Bandung'),
(251, 40, 18, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(252, 40, 18, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Bandung'),
(253, 40, 18, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Bandung'),
(254, 40, 18, '2015-05-25 02:17:58', 'diklat', 0, '', 0, 'Bandung'),
(255, 40, 18, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(256, 40, 18, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(257, 40, 18, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(258, 40, 18, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(259, 40, 18, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(260, 40, 18, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(261, 40, 18, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(262, 40, 18, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(263, 40, 18, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(264, 40, 18, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung'),
(265, 170, 19, '2015-05-25 02:17:58', 'harian', 820000, '1', 820000, 'Pangkal Pinang'),
(266, 170, 19, '2015-05-25 02:17:58', 'penginapan', 304000, '2', 304000, 'Pangkal Pinang'),
(267, 170, 19, '2015-05-25 02:17:58', 'transport_utama', 175000, '3', 175000, 'Pangkal Pinang'),
(268, 170, 19, '2015-05-25 02:17:58', 'transport_pendukung', 200000, '4', 200000, 'Pangkal Pinang'),
(269, 170, 19, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Pangkal Pinang'),
(270, 170, 19, '2015-05-25 02:17:58', 'sewa', 200000, '6', 200000, 'Pangkal Pinang'),
(271, 170, 19, '2015-05-25 02:17:58', 'diklat', 320000, '5', 320000, 'Pangkal Pinang'),
(272, 170, 19, '2015-05-25 02:17:58', 'riil', 200000, '7', 100000, 'Pangkal Pinang'),
(273, 170, 19, '2015-05-25 02:17:58', 'riil_2', 0, '8', 100000, 'Pangkal Pinang'),
(274, 170, 19, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Pangkal Pinang'),
(275, 170, 19, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Pangkal Pinang'),
(276, 170, 19, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Pangkal Pinang'),
(277, 170, 19, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Pangkal Pinang'),
(278, 170, 19, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Pangkal Pinang'),
(279, 170, 19, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Pangkal Pinang'),
(280, 170, 19, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Pangkal Pinang'),
(281, 170, 19, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Pangkal Pinang'),
(282, 170, 19, '2015-05-25 02:17:58', 'harian', 720000, '2', 720000, 'Banda Aceh'),
(283, 170, 19, '2015-05-25 02:17:58', 'penginapan', 370000, '3', 370000, 'Banda Aceh'),
(284, 170, 19, '2015-05-25 02:17:58', 'transport_utama', 300000, '4', 300000, 'Banda Aceh'),
(285, 170, 19, '2015-05-25 02:17:58', 'transport_pendukung', 100000, '4', 100000, 'Banda Aceh'),
(286, 170, 19, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Banda Aceh'),
(287, 170, 19, '2015-05-25 02:17:58', 'sewa', 200000, '6', 200000, 'Banda Aceh'),
(288, 170, 19, '2015-05-25 02:17:58', 'diklat', 280000, '5', 280000, 'Banda Aceh'),
(289, 170, 19, '2015-05-25 02:17:58', 'riil', 100000, '9', 100000, 'Banda Aceh'),
(290, 170, 19, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Banda Aceh'),
(291, 170, 19, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Banda Aceh'),
(292, 170, 19, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Banda Aceh'),
(293, 170, 19, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Banda Aceh'),
(294, 170, 19, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Banda Aceh'),
(295, 170, 19, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Banda Aceh'),
(296, 170, 19, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Banda Aceh'),
(297, 170, 19, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Banda Aceh'),
(298, 170, 19, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Banda Aceh'),
(299, 170, 19, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(300, 170, 19, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(301, 170, 19, '2015-05-25 02:17:58', 'transport_utama', 175000, '1', 175000, 'Bandung'),
(302, 170, 19, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(303, 170, 19, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Bandung'),
(304, 170, 19, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Bandung'),
(305, 170, 19, '2015-05-25 02:17:58', 'diklat', 0, '', 0, 'Bandung'),
(306, 170, 19, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(307, 170, 19, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(308, 170, 19, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(309, 170, 19, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(310, 170, 19, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(311, 170, 19, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(312, 170, 19, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(313, 170, 19, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(314, 170, 19, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(315, 170, 19, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung'),
(433, 163, 20, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Denpasar'),
(432, 163, 20, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Denpasar'),
(431, 163, 20, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Denpasar'),
(430, 163, 20, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Denpasar'),
(429, 163, 20, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Denpasar'),
(426, 163, 20, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Denpasar'),
(427, 163, 20, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Denpasar'),
(428, 163, 20, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Denpasar'),
(425, 163, 20, '2015-05-25 02:17:58', 'riil', 100000, '', 0, 'Denpasar'),
(424, 163, 20, '2015-05-25 02:17:58', 'diklat', 380000, '', 380000, 'Denpasar'),
(423, 163, 20, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Denpasar'),
(422, 163, 20, '2015-05-25 02:17:58', 'representatif', 300000, '', 300000, 'Denpasar'),
(333, 163, 20, '2015-05-25 02:17:58', 'harian', 820000, '1', 820000, 'Pangkal Pinang'),
(334, 163, 20, '2015-05-25 02:17:58', 'penginapan', 850000, '2', 850000, 'Pangkal Pinang'),
(335, 163, 20, '2015-05-25 02:17:58', 'transport_utama', 1500000, '3', 1500000, 'Pangkal Pinang'),
(336, 163, 20, '2015-05-25 02:17:58', 'transport_pendukung', 100000, '4', 100000, 'Pangkal Pinang'),
(337, 163, 20, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Pangkal Pinang'),
(338, 163, 20, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Pangkal Pinang'),
(339, 163, 20, '2015-05-25 02:17:58', 'diklat', 320000, '32', 320000, 'Pangkal Pinang'),
(340, 163, 20, '2015-05-25 02:17:58', 'riil', 100000, 'test', 100000, 'Pangkal Pinang'),
(341, 163, 20, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Pangkal Pinang'),
(342, 163, 20, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Pangkal Pinang'),
(343, 163, 20, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Pangkal Pinang'),
(344, 163, 20, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Pangkal Pinang'),
(345, 163, 20, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Pangkal Pinang'),
(346, 163, 20, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Pangkal Pinang'),
(347, 163, 20, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Pangkal Pinang'),
(348, 163, 20, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Pangkal Pinang'),
(349, 163, 20, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Pangkal Pinang'),
(350, 163, 20, '2015-05-25 02:17:58', 'harian', 1060000, '12', 1060000, 'Jakarta'),
(351, 163, 20, '2015-05-25 02:17:58', 'penginapan', 800000, '12', 800000, 'Jakarta'),
(352, 163, 20, '2015-05-25 02:17:58', 'transport_utama', 200000, '12', 200000, 'Jakarta'),
(353, 163, 20, '2015-05-25 02:17:58', 'transport_pendukung', 100000, '12', 100000, 'Jakarta'),
(354, 163, 20, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Jakarta'),
(355, 163, 20, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Jakarta'),
(356, 163, 20, '2015-05-25 02:17:58', 'diklat', 420000, '12', 420000, 'Jakarta'),
(357, 163, 20, '2015-05-25 02:17:58', 'riil', 100000, '12', 100000, 'Jakarta'),
(358, 163, 20, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Jakarta'),
(359, 163, 20, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Jakarta'),
(360, 163, 20, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Jakarta'),
(361, 163, 20, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Jakarta'),
(362, 163, 20, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Jakarta'),
(363, 163, 20, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Jakarta'),
(364, 163, 20, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Jakarta'),
(365, 163, 20, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Jakarta'),
(366, 163, 20, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Jakarta'),
(367, 163, 20, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(368, 163, 20, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(369, 163, 20, '2015-05-25 02:17:58', 'transport_utama', 700000, '12313', 700000, 'Bandung'),
(370, 163, 20, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(371, 163, 20, '2015-05-25 02:17:58', 'representatif', 0, '0', 0, 'Bandung'),
(372, 163, 20, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Bandung'),
(373, 163, 20, '2015-05-25 02:17:58', 'diklat', 0, '', 0, 'Bandung'),
(374, 163, 20, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(375, 163, 20, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(376, 163, 20, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(377, 163, 20, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(378, 163, 20, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(379, 163, 20, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(380, 163, 20, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(381, 163, 20, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(382, 163, 20, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(383, 163, 20, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung'),
(421, 163, 20, '2015-05-25 02:17:58', 'transport_pendukung', 100000, '', 100000, 'Denpasar'),
(420, 163, 20, '2015-05-25 02:17:58', 'transport_utama', 300000, '', 300000, 'Denpasar'),
(419, 163, 20, '2015-05-25 02:17:58', 'penginapan', 1304000, '', 1304000, 'Denpasar'),
(418, 163, 20, '2015-05-25 02:17:58', 'harian', 960000, '', 960000, 'Denpasar'),
(434, 163, 20, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Denpasar'),
(435, 48, 21, '2015-05-25 02:17:58', 'harian', 1440000, '1', 1440000, 'Denpasar'),
(436, 48, 21, '2015-05-25 02:17:58', 'penginapan', 542400, '222', 542400, 'Denpasar'),
(437, 48, 21, '2015-05-25 02:17:58', 'transport_utama', 300000, '1211', 322250, 'Denpasar'),
(438, 48, 21, '2015-05-25 02:17:58', 'transport_pendukung', 200000, '-', 0, 'Denpasar'),
(439, 48, 21, '2015-05-25 02:17:58', 'representatif', 0, '-', 0, 'Denpasar'),
(440, 48, 21, '2015-05-25 02:17:58', 'sewa', 200000, '1231231', 150000, 'Denpasar'),
(441, 48, 21, '2015-05-25 02:17:58', 'diklat', 0, '-', 0, 'Denpasar'),
(442, 48, 21, '2015-05-25 02:17:58', 'riil', 300000, 'ojek ', 40000, 'Denpasar'),
(443, 48, 21, '2015-05-25 02:17:58', 'riil_2', 0, 'airport tax', 75000, 'Denpasar'),
(444, 48, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Denpasar'),
(445, 48, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Denpasar'),
(446, 48, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Denpasar'),
(447, 48, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Denpasar'),
(448, 48, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Denpasar'),
(449, 48, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Denpasar'),
(450, 48, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Denpasar'),
(451, 48, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Denpasar'),
(452, 48, 21, '2015-05-25 02:17:58', 'harian', 1230000, '123', 1230000, 'Surabaya'),
(453, 48, 21, '2015-05-25 02:17:58', 'penginapan', 998000, '123', 998000, 'Surabaya'),
(454, 48, 21, '2015-05-25 02:17:58', 'transport_utama', 400000, '12', 400000, 'Surabaya'),
(455, 48, 21, '2015-05-25 02:17:58', 'transport_pendukung', 200000, '12', 200000, 'Surabaya'),
(456, 48, 21, '2015-05-25 02:17:58', 'representatif', 0, '-', 0, 'Surabaya'),
(457, 48, 21, '2015-05-25 02:17:58', 'sewa', 200000, '12', 200000, 'Surabaya'),
(458, 48, 21, '2015-05-25 02:17:58', 'diklat', 0, '-', 0, 'Surabaya'),
(459, 48, 21, '2015-05-25 02:17:58', 'riil', 300000, 'ojek ', 10000, 'Surabaya'),
(460, 48, 21, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Surabaya'),
(461, 48, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Surabaya'),
(462, 48, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Surabaya'),
(463, 48, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Surabaya'),
(464, 48, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Surabaya'),
(465, 48, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Surabaya'),
(466, 48, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Surabaya'),
(467, 48, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Surabaya'),
(468, 48, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Surabaya'),
(469, 48, 21, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(470, 48, 21, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(471, 48, 21, '2015-05-25 02:17:58', 'transport_utama', 500000, '123131', 500000, 'Bandung'),
(472, 48, 21, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(473, 48, 21, '2015-05-25 02:17:58', 'representatif', 0, '', 0, 'Bandung'),
(474, 48, 21, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Bandung'),
(475, 48, 21, '2015-05-25 02:17:58', 'diklat', 0, '', 0, 'Bandung'),
(476, 48, 21, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(477, 48, 21, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(478, 48, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(479, 48, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(480, 48, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(481, 48, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(482, 48, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(483, 48, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(484, 48, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(485, 48, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung'),
(486, 13, 21, '2015-05-25 02:17:58', 'harian', 1440000, '1', 1440000, 'Denpasar'),
(487, 13, 21, '2015-05-25 02:17:58', 'penginapan', 1316000, '2', 1316000, 'Denpasar'),
(488, 13, 21, '2015-05-25 02:17:58', 'transport_utama', 300000, '2', 300000, 'Denpasar'),
(489, 13, 21, '2015-05-25 02:17:58', 'transport_pendukung', 200000, '2', 200000, 'Denpasar'),
(490, 13, 21, '2015-05-25 02:17:58', 'representatif', 0, '-', 0, 'Denpasar'),
(491, 13, 21, '2015-05-25 02:17:58', 'sewa', 200000, '1', 200000, 'Denpasar'),
(492, 13, 21, '2015-05-25 02:17:58', 'diklat', 0, '-', 0, 'Denpasar'),
(493, 13, 21, '2015-05-25 02:17:58', 'riil', 150000, 'ojek', 20000, 'Denpasar'),
(494, 13, 21, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Denpasar'),
(495, 13, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Denpasar'),
(496, 13, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Denpasar'),
(497, 13, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Denpasar'),
(498, 13, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Denpasar'),
(499, 13, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Denpasar'),
(500, 13, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Denpasar'),
(501, 13, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Denpasar'),
(502, 13, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Denpasar'),
(503, 13, 21, '2015-05-25 02:17:58', 'harian', 1230000, '1', 1230000, 'Surabaya'),
(504, 13, 21, '2015-05-25 02:17:58', 'penginapan', 658000, '2', 658000, 'Surabaya'),
(505, 13, 21, '2015-05-25 02:17:58', 'transport_utama', 400000, '3', 400000, 'Surabaya'),
(506, 13, 21, '2015-05-25 02:17:58', 'transport_pendukung', 200000, '4', 200000, 'Surabaya'),
(507, 13, 21, '2015-05-25 02:17:58', 'representatif', 0, '-', 0, 'Surabaya'),
(508, 13, 21, '2015-05-25 02:17:58', 'sewa', 200000, '1', 200000, 'Surabaya'),
(509, 13, 21, '2015-05-25 02:17:58', 'diklat', 0, '-', 0, 'Surabaya'),
(510, 13, 21, '2015-05-25 02:17:58', 'riil', 150000, 'ojek', 10000, 'Surabaya'),
(511, 13, 21, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Surabaya'),
(512, 13, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Surabaya'),
(513, 13, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Surabaya'),
(514, 13, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Surabaya'),
(515, 13, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Surabaya'),
(516, 13, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Surabaya'),
(517, 13, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Surabaya'),
(518, 13, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Surabaya'),
(519, 13, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Surabaya'),
(520, 13, 21, '2015-05-25 02:17:58', 'harian', 0, '', 0, 'Bandung'),
(521, 13, 21, '2015-05-25 02:17:58', 'penginapan', 0, '', 0, 'Bandung'),
(522, 13, 21, '2015-05-25 02:17:58', 'transport_utama', 400000, '121212', 400000, 'Bandung'),
(523, 13, 21, '2015-05-25 02:17:58', 'transport_pendukung', 0, '', 0, 'Bandung'),
(524, 13, 21, '2015-05-25 02:17:58', 'representatif', 0, '', 0, 'Bandung'),
(525, 13, 21, '2015-05-25 02:17:58', 'sewa', 0, '', 0, 'Bandung'),
(526, 13, 21, '2015-05-25 02:17:58', 'diklat', 0, '', 0, 'Bandung'),
(527, 13, 21, '2015-05-25 02:17:58', 'riil', 0, '', 0, 'Bandung'),
(528, 13, 21, '2015-05-25 02:17:58', 'riil_2', 0, '', 0, 'Bandung'),
(529, 13, 21, '2015-05-25 02:17:58', 'riil_3', 0, '', 0, 'Bandung'),
(530, 13, 21, '2015-05-25 02:17:58', 'riil_4', 0, '', 0, 'Bandung'),
(531, 13, 21, '2015-05-25 02:17:58', 'riil_5', 0, '', 0, 'Bandung'),
(532, 13, 21, '2015-05-25 02:17:58', 'riil_6', 0, '', 0, 'Bandung'),
(533, 13, 21, '2015-05-25 02:17:58', 'riil_7', 0, '', 0, 'Bandung'),
(534, 13, 21, '2015-05-25 02:17:58', 'riil_8', 0, '', 0, 'Bandung'),
(535, 13, 21, '2015-05-25 02:17:58', 'riil_9', 0, '', 0, 'Bandung'),
(536, 13, 21, '2015-05-25 02:17:58', 'riil_10', 0, '', 0, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern` varchar(20) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `pattern`, `counter`) VALUES
(1, 'IV-2015', 5),
(2, 'asdf12', 4),
(3, 'V-2015', 14),
(4, 'V-2015-BARANG', 4),
(5, 'BBG', 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_panjar`
--

CREATE TABLE IF NOT EXISTS `detail_panjar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_panjar` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `detail_panjar`
--

INSERT INTO `detail_panjar` (`id`, `id_panjar`, `id_pegawai`, `jumlah`) VALUES
(1, 2, 13, 6000000),
(3, 2, 48, 3000000),
(5, 4, 31, 240000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengadaan_barang`
--

CREATE TABLE IF NOT EXISTS `detail_pengadaan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan_barang` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detail_pengadaan_barang`
--

INSERT INTO `detail_pengadaan_barang` (`id`, `id_pengadaan_barang`, `id_barang`, `jumlah`) VALUES
(4, 2, 2, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajuan_barang`
--

CREATE TABLE IF NOT EXISTS `detail_pengajuan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajuan_barang` int(11) NOT NULL,
  `id_jenis_barang` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `detail_pengajuan_barang`
--

INSERT INTO `detail_pengajuan_barang` (`id`, `id_pengajuan_barang`, `id_jenis_barang`, `id_barang`, `jumlah`, `subtotal`) VALUES
(1, 2, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 1, 20000, 0),
(2, 2, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 1, 30000, 0),
(3, 2, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 1, 34, 0),
(4, 3, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 1, 2, 0),
(5, 4, 'Bahan Bangunan', 5, 23, 0),
(7, 4, 'Bahan Bangunan', 1, 2, 0),
(8, 5, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 2, 10, NULL),
(14, 1, '', 17, 2, NULL),
(15, 1, '', 42, 1, NULL),
(16, 1, '', 14, 2, NULL),
(17, 8, '', 14, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajuan_honorarium`
--

CREATE TABLE IF NOT EXISTS `detail_pengajuan_honorarium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajuan_honorarium` int(11) NOT NULL,
  `id_narasumber` int(11) NOT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `detail_pengajuan_honorarium`
--

INSERT INTO `detail_pengajuan_honorarium` (`id`, `id_pengajuan_honorarium`, `id_narasumber`, `jumlah`, `subtotal`) VALUES
(39, 4, 195, 2, NULL),
(41, 4, 196, 4, NULL),
(42, 5, 195, 4, NULL),
(43, 5, 196, 7, NULL),
(44, 6, 194, 23, NULL),
(45, 6, 196, 5, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=409 ;

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
(18, 10, 6, '2015-04-30', '2015-05-02', 'riil', NULL, 'Jakarta', NULL, NULL, 200000),
(19, 10, 5, '2015-05-05', '2015-05-08', 'harian', NULL, 'Jakarta', NULL, NULL, 2120000),
(20, 10, 5, '2015-05-05', '2015-05-08', 'penginapan', NULL, 'Jakarta', 'Hotel', NULL, 1830000),
(21, 10, 5, '2015-05-05', '2015-05-08', 'transport_utama', 'Bandung', 'Jakarta', NULL, 'Kereta Api', 1500000),
(22, 10, 5, '2015-05-05', '2015-05-08', 'transport_pendukung', NULL, 'Jakarta', NULL, NULL, 130000),
(23, 10, 5, '2015-05-05', '2015-05-08', 'representatif', NULL, 'Jakarta', NULL, NULL, 0),
(24, 10, 5, '2015-05-05', '2015-05-08', 'riil', NULL, 'Jakarta', NULL, NULL, 140000),
(61, 10, 7, '2015-05-05', '2015-05-06', 'transport_utama', 'Pangkal Pinang', 'Jambi', NULL, 'Pesawat', 185000),
(60, 10, 7, '2015-05-05', '2015-05-06', 'penginapan', NULL, 'Jambi', 'Hotel', NULL, 382000),
(59, 10, 7, '2015-05-05', '2015-05-06', 'harian', NULL, 'Jambi', NULL, NULL, 740000),
(58, 10, 7, '2015-05-04', '2015-05-05', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(56, 10, 7, '2015-05-04', '2015-05-05', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 10000),
(57, 10, 7, '2015-05-04', '2015-05-05', 'representatif', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(54, 10, 7, '2015-05-04', '2015-05-05', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 533000),
(55, 10, 7, '2015-05-04', '2015-05-05', 'transport_utama', 'Bandung', 'Pangkal Pinang', NULL, 'Pesawat', 175000),
(53, 10, 7, '2015-05-04', '2015-05-05', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(62, 10, 7, '2015-05-05', '2015-05-06', 'transport_utama', 'Jambi', 'Bandung', NULL, 'Pesawat', 195000),
(63, 180, 8, '2015-05-04', '2015-05-06', 'harian', NULL, 'Banda Aceh', NULL, NULL, 1080000),
(64, 180, 8, '2015-05-04', '2015-05-06', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 820000),
(65, 180, 8, '2015-05-04', '2015-05-06', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(66, 180, 8, '2015-05-04', '2015-05-06', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 20000),
(67, 180, 8, '2015-05-04', '2015-05-06', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(68, 180, 8, '2015-05-04', '2015-05-06', 'riil', NULL, 'Banda Aceh', NULL, NULL, 30000),
(69, 10, 8, '2015-05-04', '2015-05-06', 'harian', NULL, 'Banda Aceh', NULL, NULL, 1080000),
(70, 10, 8, '2015-05-04', '2015-05-06', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 820000),
(71, 10, 8, '2015-05-04', '2015-05-06', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(72, 10, 8, '2015-05-04', '2015-05-06', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 250000),
(73, 10, 8, '2015-05-04', '2015-05-06', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(74, 10, 8, '2015-05-04', '2015-05-06', 'riil', NULL, 'Banda Aceh', NULL, NULL, 230000),
(121, 10, 10, '2015-05-04', '2015-05-06', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 1808000),
(120, 10, 10, '2015-05-04', '2015-05-06', 'harian', NULL, 'Denpasar', NULL, NULL, 1440000),
(122, 10, 10, '2015-05-04', '2015-05-06', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(123, 10, 10, '2015-05-04', '2015-05-06', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(124, 10, 10, '2015-05-04', '2015-05-06', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 10000),
(125, 10, 10, '2015-05-04', '2015-05-06', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(126, 10, 10, '2015-05-04', '2015-05-06', 'riil', NULL, 'Denpasar', NULL, NULL, 15000),
(186, 122, 12, '2015-05-04', '2015-05-07', 'riil', NULL, 'Banda Aceh', NULL, NULL, 400000),
(185, 122, 12, '2015-05-04', '2015-05-07', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(184, 122, 12, '2015-05-04', '2015-05-07', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 300000),
(183, 122, 12, '2015-05-07', '2015-05-07', 'transport_utama', 'Banda Aceh', 'Bandung', NULL, 'Pesawat', 175000),
(182, 122, 12, '2015-05-04', '2015-05-07', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(181, 122, 12, '2015-05-04', '2015-05-07', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 1230000),
(180, 122, 12, '2015-05-04', '2015-05-07', 'harian', NULL, 'Banda Aceh', NULL, NULL, 1440000),
(178, 10, 12, '2015-05-04', '2015-05-07', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(179, 10, 12, '2015-05-04', '2015-05-07', 'riil', NULL, 'Banda Aceh', NULL, NULL, 400000),
(177, 10, 12, '2015-05-04', '2015-05-07', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 300000),
(176, 10, 12, '2015-05-07', '2015-05-07', 'transport_utama', 'Banda Aceh', 'Bandung', NULL, 'Pesawat', 175000),
(175, 10, 12, '2015-05-04', '2015-05-07', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(174, 10, 12, '2015-05-04', '2015-05-07', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 1230000),
(173, 10, 12, '2015-05-04', '2015-05-07', 'harian', NULL, 'Banda Aceh', NULL, NULL, 1440000),
(153, 161, 11, '2015-05-04', '2015-05-05', 'harian', NULL, 'Banda Aceh', NULL, NULL, 720000),
(154, 161, 11, '2015-05-04', '2015-05-05', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 410000),
(155, 161, 11, '2015-05-04', '2015-05-05', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(156, 161, 11, '2015-05-04', '2015-05-05', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 130000),
(157, 161, 11, '2015-05-04', '2015-05-05', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(158, 161, 11, '2015-05-04', '2015-05-05', 'riil', NULL, 'Banda Aceh', NULL, NULL, 145000),
(159, 161, 11, '2015-05-05', '2015-05-06', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(160, 161, 11, '2015-05-05', '2015-05-06', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 904000),
(161, 161, 11, '2015-05-05', '2015-05-06', 'transport_utama', 'Banda Aceh', 'Denpasar', NULL, 'Pesawat', 300000),
(162, 161, 11, '2015-05-06', '2015-05-08', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(163, 161, 11, '2015-05-06', '2015-05-08', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 533000),
(164, 161, 11, '2015-05-06', '2015-05-08', 'transport_utama', 'Denpasar', 'Pangkal Pinang', NULL, 'Pesawat', 1500000),
(165, 161, 11, '2015-05-08', '2015-05-08', 'transport_utama', 'Pangkal Pinang', 'Bandung', NULL, 'Pesawat', 300000),
(187, 66, 13, '2015-05-14', '2015-05-15', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(188, 66, 13, '2015-05-14', '2015-05-15', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 904000),
(189, 66, 13, '2015-05-14', '2015-05-15', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(190, 66, 13, '2015-05-15', '2015-05-15', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(191, 66, 13, '2015-05-14', '2015-05-15', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 100000),
(192, 66, 13, '2015-05-14', '2015-05-15', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(193, 66, 13, '2015-05-14', '2015-05-15', 'diklat', NULL, 'Denpasar', NULL, NULL, 380000),
(194, 66, 13, '2015-05-14', '2015-05-15', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(195, 66, 13, '2015-05-14', '2015-05-15', 'riil', NULL, 'Denpasar', NULL, NULL, 200000),
(196, 113, 13, '2015-05-14', '2015-05-15', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(197, 113, 13, '2015-05-14', '2015-05-15', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 4881000),
(198, 113, 13, '2015-05-14', '2015-05-15', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(199, 113, 13, '2015-05-15', '2015-05-15', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(200, 113, 13, '2015-05-14', '2015-05-15', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 100000),
(201, 113, 13, '2015-05-14', '2015-05-15', 'representatif', NULL, 'Denpasar', NULL, NULL, 600000),
(202, 113, 13, '2015-05-14', '2015-05-15', 'diklat', NULL, 'Denpasar', NULL, NULL, 380000),
(203, 113, 13, '2015-05-14', '2015-05-15', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(204, 113, 13, '2015-05-14', '2015-05-15', 'riil', NULL, 'Denpasar', NULL, NULL, 200000),
(205, 143, 14, '2015-05-08', '2015-05-09', 'harian', NULL, 'Banda Aceh', NULL, NULL, 720000),
(206, 143, 14, '2015-05-08', '2015-05-09', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 410000),
(207, 143, 14, '2015-05-08', '2015-05-09', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(208, 143, 14, '2015-05-08', '2015-05-09', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 100000),
(209, 143, 14, '2015-05-08', '2015-05-09', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(210, 143, 14, '2015-05-08', '2015-05-09', 'diklat', NULL, 'Banda Aceh', NULL, NULL, 0),
(211, 143, 14, '2015-05-08', '2015-05-09', 'sewa', NULL, 'Banda Aceh', NULL, NULL, 200000),
(212, 143, 14, '2015-05-08', '2015-05-09', 'riil', NULL, 'Banda Aceh', NULL, NULL, 100000),
(213, 143, 14, '2015-05-09', '2015-05-10', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(214, 143, 14, '2015-05-09', '2015-05-10', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 904000),
(215, 143, 14, '2015-05-09', '2015-05-10', 'transport_utama', 'Banda Aceh', 'Denpasar', NULL, 'Pesawat', 300000),
(216, 143, 14, '2015-05-10', '2015-05-10', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(217, 143, 14, '2015-05-10', '2015-05-10', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(218, 143, 14, '2015-05-10', '2015-05-10', 'diklat', NULL, 'Denpasar', NULL, NULL, 0),
(219, 143, 14, '2015-05-10', '2015-05-10', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(220, 31, 15, '2015-05-08', '2015-05-09', 'harian', NULL, 'Banda Aceh', NULL, NULL, 720000),
(221, 31, 15, '2015-05-08', '2015-05-09', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 370000),
(222, 31, 15, '2015-05-08', '2015-05-09', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(223, 31, 15, '2015-05-08', '2015-05-09', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 100000),
(224, 31, 15, '2015-05-08', '2015-05-09', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(225, 31, 15, '2015-05-08', '2015-05-09', 'diklat', NULL, 'Banda Aceh', NULL, NULL, 0),
(226, 31, 15, '2015-05-08', '2015-05-09', 'sewa', NULL, 'Banda Aceh', NULL, NULL, 200000),
(227, 31, 15, '2015-05-08', '2015-05-09', 'riil', NULL, 'Banda Aceh', NULL, NULL, 100000),
(228, 31, 15, '2015-05-09', '2015-05-10', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(229, 31, 15, '2015-05-09', '2015-05-10', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 658000),
(230, 31, 15, '2015-05-09', '2015-05-10', 'transport_utama', 'Banda Aceh', 'Denpasar', NULL, 'Pesawat', 300000),
(231, 31, 15, '2015-05-09', '2015-05-10', 'diklat', NULL, 'Denpasar', NULL, NULL, 0),
(232, 31, 15, '2015-05-09', '2015-05-10', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(233, 31, 15, '2015-05-10', '2015-05-11', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(234, 31, 15, '2015-05-10', '2015-05-11', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 304000),
(235, 31, 15, '2015-05-10', '2015-05-11', 'transport_utama', 'Denpasar', 'Pangkal Pinang', NULL, 'Pesawat', 1500000),
(236, 31, 15, '2015-05-11', '2015-05-11', 'transport_utama', 'Pangkal Pinang', 'Bandung', NULL, 'Pesawat', 300000),
(237, 31, 15, '2015-05-11', '2015-05-11', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(238, 31, 15, '2015-05-11', '2015-05-11', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(239, 180, 7, '2015-05-04', '2015-05-05', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(240, 180, 7, '2015-05-04', '2015-05-05', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 533000),
(241, 180, 7, '2015-05-04', '2015-05-05', 'transport_utama', 'Bandung', 'Pangkal Pinang', NULL, 'Pesawat', 175000),
(242, 180, 7, '2015-05-04', '2015-05-05', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 10000),
(243, 180, 7, '2015-05-04', '2015-05-05', 'representatif', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(244, 180, 7, '2015-05-04', '2015-05-05', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 320000),
(245, 180, 7, '2015-05-04', '2015-05-05', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(246, 180, 7, '2015-05-04', '2015-05-05', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 30000),
(247, 180, 7, '2015-05-05', '2015-05-06', 'harian', NULL, 'Jambi', NULL, NULL, 740000),
(248, 180, 7, '2015-05-05', '2015-05-06', 'penginapan', NULL, 'Jambi', 'Hotel', NULL, 382000),
(249, 180, 7, '2015-05-05', '2015-05-06', 'transport_utama', 'Pangkal Pinang', 'Jambi', NULL, 'Pesawat', 185000),
(250, 180, 7, '2015-05-06', '2015-05-06', 'transport_utama', 'Jambi', 'Bandung', NULL, 'Pesawat', 195000),
(251, 180, 7, '2015-05-06', '2015-05-06', 'representatif', NULL, 'Jambi', NULL, NULL, 0),
(252, 180, 7, '2015-05-06', '2015-05-06', 'diklat', NULL, 'Jambi', NULL, NULL, 300000),
(253, 180, 7, '2015-05-06', '2015-05-06', 'sewa', NULL, 'Jambi', NULL, NULL, 200000),
(254, 180, 7, '2015-05-06', '2015-05-06', 'riil', NULL, 'Jambi', NULL, NULL, 40000),
(255, 180, 7, '2015-05-06', '2015-05-06', 'transport_pendukung', NULL, 'Jambi', NULL, NULL, 20000),
(256, 112, 7, '2015-05-04', '2015-05-05', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(257, 112, 7, '2015-05-04', '2015-05-05', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 533000),
(258, 112, 7, '2015-05-04', '2015-05-05', 'transport_utama', 'Bandung', 'Pangkal Pinang', NULL, 'Pesawat', 175000),
(259, 112, 7, '2015-05-04', '2015-05-05', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 10000),
(260, 112, 7, '2015-05-04', '2015-05-05', 'representatif', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(261, 112, 7, '2015-05-04', '2015-05-05', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 320000),
(262, 112, 7, '2015-05-04', '2015-05-05', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(263, 112, 7, '2015-05-04', '2015-05-05', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 20000),
(264, 112, 7, '2015-05-05', '2015-05-06', 'harian', NULL, 'Jambi', NULL, NULL, 740000),
(265, 112, 7, '2015-05-05', '2015-05-06', 'penginapan', NULL, 'Jambi', 'Hotel', NULL, 382000),
(266, 112, 7, '2015-05-05', '2015-05-06', 'transport_utama', 'Pangkal Pinang', 'Jambi', NULL, 'Pesawat', 185000),
(267, 112, 7, '2015-05-06', '2015-05-06', 'transport_utama', 'Jambi', 'Bandung', NULL, 'Pesawat', 195000),
(268, 112, 7, '2015-05-06', '2015-05-06', 'representatif', NULL, 'Jambi', NULL, NULL, 0),
(269, 112, 7, '2015-05-06', '2015-05-06', 'diklat', NULL, 'Jambi', NULL, NULL, 300000),
(270, 112, 7, '2015-05-06', '2015-05-06', 'sewa', NULL, 'Jambi', NULL, NULL, 200000),
(271, 112, 7, '2015-05-06', '2015-05-06', 'riil', NULL, 'Jambi', NULL, NULL, 40000),
(272, 112, 7, '2015-05-06', '2015-05-06', 'transport_pendukung', NULL, 'Jambi', NULL, NULL, 20000),
(273, 15, 7, '2015-05-04', '2015-05-05', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(274, 15, 7, '2015-05-04', '2015-05-05', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 304000),
(275, 15, 7, '2015-05-04', '2015-05-05', 'transport_utama', 'Bandung', 'Pangkal Pinang', NULL, 'Pesawat', 175000),
(276, 15, 7, '2015-05-04', '2015-05-05', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 10000),
(277, 15, 7, '2015-05-04', '2015-05-05', 'representatif', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(278, 15, 7, '2015-05-04', '2015-05-05', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 320000),
(279, 15, 7, '2015-05-04', '2015-05-05', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(280, 15, 7, '2015-05-04', '2015-05-05', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 30000),
(281, 15, 7, '2015-05-05', '2015-05-06', 'harian', NULL, 'Jambi', NULL, NULL, 740000),
(282, 15, 7, '2015-05-05', '2015-05-06', 'penginapan', NULL, 'Jambi', 'Hotel', NULL, 290000),
(283, 15, 7, '2015-05-05', '2015-05-06', 'transport_utama', 'Pangkal Pinang', 'Jambi', NULL, 'Pesawat', 185000),
(284, 15, 7, '2015-05-06', '2015-05-06', 'transport_utama', 'Jambi', 'Bandung', NULL, 'Pesawat', 195000),
(285, 15, 7, '2015-05-06', '2015-05-06', 'representatif', NULL, 'Jambi', NULL, NULL, 0),
(286, 15, 7, '2015-05-06', '2015-05-06', 'diklat', NULL, 'Jambi', NULL, NULL, 300000),
(287, 15, 7, '2015-05-06', '2015-05-06', 'sewa', NULL, 'Jambi', NULL, NULL, 400000),
(288, 15, 7, '2015-05-06', '2015-05-06', 'riil', NULL, 'Jambi', NULL, NULL, 40000),
(289, 15, 7, '2015-05-06', '2015-05-06', 'transport_pendukung', NULL, 'Jambi', NULL, NULL, 20000),
(290, 70, 17, '2015-05-10', '2015-05-11', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(291, 70, 17, '2015-05-10', '2015-05-11', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 904000),
(292, 70, 17, '2015-05-10', '2015-05-11', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(293, 70, 17, '2015-05-11', '2015-05-11', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(294, 70, 17, '2015-05-10', '2015-05-11', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 12000),
(295, 70, 17, '2015-05-10', '2015-05-11', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(296, 70, 17, '2015-05-10', '2015-05-11', 'diklat', NULL, 'Denpasar', NULL, NULL, 0),
(297, 70, 17, '2015-05-10', '2015-05-11', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(298, 70, 17, '2015-05-10', '2015-05-11', 'riil', NULL, 'Denpasar', NULL, NULL, 13000),
(312, 40, 18, '2015-05-19', '2015-05-20', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 120000),
(311, 40, 18, '2015-05-20', '2015-05-20', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(310, 40, 18, '2015-05-19', '2015-05-20', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(309, 40, 18, '2015-05-19', '2015-05-20', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 904000),
(308, 40, 18, '2015-05-19', '2015-05-20', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(313, 40, 18, '2015-05-19', '2015-05-20', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(314, 40, 18, '2015-05-19', '2015-05-20', 'diklat', NULL, 'Denpasar', NULL, NULL, 380000),
(315, 40, 18, '2015-05-19', '2015-05-20', 'sewa', NULL, 'Denpasar', NULL, NULL, 0),
(316, 40, 18, '2015-05-19', '2015-05-20', 'riil', NULL, 'Denpasar', NULL, NULL, 220000),
(317, 191, 18, '2015-05-19', '2015-05-20', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(318, 191, 18, '2015-05-19', '2015-05-20', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 658000),
(319, 191, 18, '2015-05-19', '2015-05-20', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(320, 191, 18, '2015-05-20', '2015-05-20', 'transport_utama', 'Denpasar', 'Bandung', NULL, 'Pesawat', 300000),
(321, 191, 18, '2015-05-19', '2015-05-20', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 300000),
(322, 191, 18, '2015-05-19', '2015-05-20', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(323, 191, 18, '2015-05-19', '2015-05-20', 'diklat', NULL, 'Denpasar', NULL, NULL, 380000),
(324, 191, 18, '2015-05-19', '2015-05-20', 'sewa', NULL, 'Denpasar', NULL, NULL, 0),
(325, 191, 18, '2015-05-19', '2015-05-20', 'riil', NULL, 'Denpasar', NULL, NULL, 200000),
(326, 170, 19, '2015-05-20', '2015-05-21', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(327, 170, 19, '2015-05-20', '2015-05-21', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 304000),
(328, 170, 19, '2015-05-20', '2015-05-21', 'transport_utama', 'Bandung', 'Pangkal Pinang', NULL, 'Pesawat', 175000),
(329, 170, 19, '2015-05-20', '2015-05-21', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(330, 170, 19, '2015-05-20', '2015-05-21', 'representatif', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(331, 170, 19, '2015-05-20', '2015-05-21', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 320000),
(332, 170, 19, '2015-05-20', '2015-05-21', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(333, 170, 19, '2015-05-20', '2015-05-21', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 200000),
(334, 170, 19, '2015-05-21', '2015-05-22', 'harian', NULL, 'Banda Aceh', NULL, NULL, 720000),
(335, 170, 19, '2015-05-21', '2015-05-22', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 370000),
(336, 170, 19, '2015-05-21', '2015-05-22', 'transport_utama', 'Pangkal Pinang', 'Banda Aceh', NULL, 'Pesawat', 300000),
(337, 170, 19, '2015-05-22', '2015-05-22', 'transport_utama', 'Banda Aceh', 'Bandung', NULL, 'Pesawat', 175000),
(338, 170, 19, '2015-05-22', '2015-05-22', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(339, 170, 19, '2015-05-22', '2015-05-22', 'diklat', NULL, 'Banda Aceh', NULL, NULL, 280000),
(340, 170, 19, '2015-05-22', '2015-05-22', 'sewa', NULL, 'Banda Aceh', NULL, NULL, 200000),
(341, 170, 19, '2015-05-22', '2015-05-22', 'riil', NULL, 'Banda Aceh', NULL, NULL, 100000),
(342, 170, 19, '2015-05-22', '2015-05-22', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 100000),
(343, 163, 20, '2015-05-19', '2015-05-20', 'harian', NULL, 'Denpasar', NULL, NULL, 960000),
(344, 163, 20, '2015-05-19', '2015-05-20', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 1304000),
(345, 163, 20, '2015-05-19', '2015-05-20', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(346, 163, 20, '2015-05-19', '2015-05-20', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 100000),
(347, 163, 20, '2015-05-19', '2015-05-20', 'representatif', NULL, 'Denpasar', NULL, NULL, 300000),
(348, 163, 20, '2015-05-19', '2015-05-20', 'diklat', NULL, 'Denpasar', NULL, NULL, 380000),
(349, 163, 20, '2015-05-19', '2015-05-20', 'sewa', NULL, 'Denpasar', NULL, NULL, 0),
(350, 163, 20, '2015-05-19', '2015-05-20', 'riil', NULL, 'Denpasar', NULL, NULL, 100000),
(351, 163, 20, '2015-05-20', '2015-05-21', 'harian', NULL, 'Pangkal Pinang', NULL, NULL, 820000),
(352, 163, 20, '2015-05-20', '2015-05-21', 'penginapan', NULL, 'Pangkal Pinang', 'Hotel', NULL, 850000),
(353, 163, 20, '2015-05-20', '2015-05-21', 'transport_utama', 'Denpasar', 'Pangkal Pinang', NULL, 'Pesawat', 1500000),
(354, 163, 20, '2015-05-20', '2015-05-21', 'diklat', NULL, 'Pangkal Pinang', NULL, NULL, 320000),
(355, 163, 20, '2015-05-20', '2015-05-21', 'sewa', NULL, 'Pangkal Pinang', NULL, NULL, 0),
(356, 163, 20, '2015-05-20', '2015-05-21', 'riil', NULL, 'Pangkal Pinang', NULL, NULL, 100000),
(357, 163, 20, '2015-05-20', '2015-05-21', 'transport_pendukung', NULL, 'Pangkal Pinang', NULL, NULL, 100000),
(358, 163, 20, '2015-05-21', '2015-05-22', 'harian', NULL, 'Jakarta', NULL, NULL, 1060000),
(359, 163, 20, '2015-05-21', '2015-05-22', 'penginapan', NULL, 'Jakarta', 'Hotel', NULL, 800000),
(360, 163, 20, '2015-05-21', '2015-05-22', 'transport_utama', 'Pangkal Pinang', 'Jakarta', NULL, 'Pesawat', 200000),
(361, 163, 20, '2015-05-22', '2015-05-22', 'transport_utama', 'Jakarta', 'Bandung', NULL, 'Pesawat', 700000),
(362, 163, 20, '2015-05-22', '2015-05-22', 'diklat', NULL, 'Jakarta', NULL, NULL, 420000),
(363, 163, 20, '2015-05-22', '2015-05-22', 'sewa', NULL, 'Jakarta', NULL, NULL, 0),
(364, 163, 20, '2015-05-22', '2015-05-22', 'riil', NULL, 'Jakarta', NULL, NULL, 100000),
(365, 163, 20, '2015-05-22', '2015-05-22', 'transport_pendukung', NULL, 'Jakarta', NULL, NULL, 100000),
(366, 48, 21, '2015-05-18', '2015-05-20', 'harian', NULL, 'Denpasar', NULL, NULL, 1440000),
(367, 48, 21, '2015-05-18', '2015-05-20', 'penginapan', NULL, 'Denpasar', 'Non Hotel', NULL, 542400),
(368, 48, 21, '2015-05-18', '2015-05-20', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(369, 48, 21, '2015-05-18', '2015-05-20', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 200000),
(370, 48, 21, '2015-05-18', '2015-05-20', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(371, 48, 21, '2015-05-18', '2015-05-20', 'diklat', NULL, 'Denpasar', NULL, NULL, 0),
(372, 48, 21, '2015-05-18', '2015-05-20', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(373, 48, 21, '2015-05-18', '2015-05-20', 'riil', NULL, 'Denpasar', NULL, NULL, 300000),
(374, 48, 21, '2015-05-20', '2015-05-23', 'harian', NULL, 'Surabaya', NULL, NULL, 1230000),
(375, 48, 21, '2015-05-20', '2015-05-23', 'penginapan', NULL, 'Surabaya', 'Hotel', NULL, 998000),
(376, 48, 21, '2015-05-20', '2015-05-23', 'transport_utama', 'Denpasar', 'Surabaya', NULL, 'Pesawat', 400000),
(377, 48, 21, '2015-05-23', '2015-05-23', 'transport_utama', 'Surabaya', 'Bandung', NULL, 'Pesawat', 500000),
(378, 48, 21, '2015-05-23', '2015-05-23', 'representatif', NULL, 'Surabaya', NULL, NULL, 0),
(379, 48, 21, '2015-05-23', '2015-05-23', 'diklat', NULL, 'Surabaya', NULL, NULL, 0),
(380, 48, 21, '2015-05-23', '2015-05-23', 'sewa', NULL, 'Surabaya', NULL, NULL, 200000),
(381, 48, 21, '2015-05-23', '2015-05-23', 'riil', NULL, 'Surabaya', NULL, NULL, 300000),
(382, 48, 21, '2015-05-23', '2015-05-23', 'transport_pendukung', NULL, 'Surabaya', NULL, NULL, 200000),
(383, 13, 21, '2015-05-18', '2015-05-20', 'harian', NULL, 'Denpasar', NULL, NULL, 1440000),
(384, 13, 21, '2015-05-18', '2015-05-20', 'penginapan', NULL, 'Denpasar', 'Hotel', NULL, 1316000),
(385, 13, 21, '2015-05-18', '2015-05-20', 'transport_utama', 'Bandung', 'Denpasar', NULL, 'Pesawat', 300000),
(386, 13, 21, '2015-05-18', '2015-05-20', 'transport_pendukung', NULL, 'Denpasar', NULL, NULL, 200000),
(387, 13, 21, '2015-05-18', '2015-05-20', 'representatif', NULL, 'Denpasar', NULL, NULL, 0),
(388, 13, 21, '2015-05-18', '2015-05-20', 'diklat', NULL, 'Denpasar', NULL, NULL, 0),
(389, 13, 21, '2015-05-18', '2015-05-20', 'sewa', NULL, 'Denpasar', NULL, NULL, 200000),
(390, 13, 21, '2015-05-18', '2015-05-20', 'riil', NULL, 'Denpasar', NULL, NULL, 150000),
(391, 13, 21, '2015-05-20', '2015-05-23', 'harian', NULL, 'Surabaya', NULL, NULL, 1230000),
(392, 13, 21, '2015-05-20', '2015-05-23', 'penginapan', NULL, 'Surabaya', 'Hotel', NULL, 658000),
(393, 13, 21, '2015-05-20', '2015-05-23', 'transport_utama', 'Denpasar', 'Surabaya', NULL, 'Pesawat', 400000),
(394, 13, 21, '2015-05-23', '2015-05-23', 'transport_utama', 'Surabaya', 'Bandung', NULL, 'Pesawat', 400000),
(395, 13, 21, '2015-05-23', '2015-05-23', 'representatif', NULL, 'Surabaya', NULL, NULL, 0),
(396, 13, 21, '2015-05-23', '2015-05-23', 'diklat', NULL, 'Surabaya', NULL, NULL, 0),
(397, 13, 21, '2015-05-23', '2015-05-23', 'sewa', NULL, 'Surabaya', NULL, NULL, 200000),
(398, 13, 21, '2015-05-23', '2015-05-23', 'riil', NULL, 'Surabaya', NULL, NULL, 150000),
(399, 13, 21, '2015-05-23', '2015-05-23', 'transport_pendukung', NULL, 'Surabaya', NULL, NULL, 200000),
(400, 180, 22, '2015-05-28', '2015-05-30', 'harian', NULL, 'Banda Aceh', NULL, NULL, 1080000),
(401, 180, 22, '2015-05-28', '2015-05-30', 'penginapan', NULL, 'Banda Aceh', 'Hotel', NULL, 820000),
(402, 180, 22, '2015-05-28', '2015-05-30', 'transport_utama', 'Bandung', 'Banda Aceh', NULL, 'Pesawat', 1500000),
(403, 180, 22, '2015-05-30', '2015-05-30', 'transport_utama', 'Banda Aceh', 'Bandung', NULL, 'Pesawat', 175000),
(404, 180, 22, '2015-05-28', '2015-05-30', 'transport_pendukung', NULL, 'Banda Aceh', NULL, NULL, 1300000),
(405, 180, 22, '2015-05-28', '2015-05-30', 'representatif', NULL, 'Banda Aceh', NULL, NULL, 0),
(406, 180, 22, '2015-05-28', '2015-05-30', 'diklat', NULL, 'Banda Aceh', NULL, NULL, 420000),
(407, 180, 22, '2015-05-28', '2015-05-30', 'sewa', NULL, 'Banda Aceh', NULL, NULL, 400000),
(408, 180, 22, '2015-05-28', '2015-05-30', 'riil', NULL, 'Banda Aceh', NULL, NULL, 1400000);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `kode_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `koordinator` varchar(25) DEFAULT NULL,
  `penanggung_jawab` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_unit`, `kode_kegiatan`, `nama_kegiatan`, `koordinator`, `penanggung_jawab`) VALUES
(1, 2, '2433.001.001.107', 'Inovasi Teknologi dan Manajemen Permukiman', '1', '2'),
(2, 3, '2433.001.003.107.A', 'Penelitian dan Pengembangan Teknologi Pengolahan Air Minum ', '1', '2'),
(3, 1, '2433.001.003.107.B', 'Pengkajian dan Pengembang ITF', '1', '2'),
(4, 1, '2433.001.004.107.A', 'Kelembagaan dalam Implementasi Kebijakan Sertifikat Laik Fungsi Bangunan Gedung', '1', '2'),
(5, 1, '2433.001.004.107.B', 'Penyusunan Pedoman Matra Ruang ', '1', '2'),
(6, 1, '2433.001.005.107', 'Potensi Bahan Bangunan Lokal untuk Mendukung Pembangunan Perumahan Sederhana Menggunakan Sistem Info', '1', '2'),
(7, 1, '2433.003.002.107.A', 'Pengembangan Model Penataan Kawasan Padat dan Kumuh di Perkotaan', '1', '2'),
(8, 1, '2433.003.002.107.B', 'Pengkajian dan Pengembangan Model Permukiman di Kawasan Pesisir', '1', '2'),
(9, 1, '2433.003.002.107.C', 'Pengembangan Model Penataan Kawasan Pulau-Pulau Kecil', '1', '2'),
(10, 1, '2433.003.002.107.D', 'Pengembangan Model Penataan Kawasan Perbatasan', '1', '2'),
(11, 1, '2433.003.004.107.A', 'Pengembangan Teknologi Perbaikan Gedung dan Perkuatan (Retrofingfitting) Struktur Beton Bertulang Un', '1', '2'),
(12, 1, '2433.003.004.107.B', 'Pengkajian dan Pengembangan Analisis Resiko Gempa ', '1', '2'),
(13, 1, '2433.003.004.107.C', 'Pengembangan Model Laboratorium Arsitektur, Struktur dan Utilitas', '1', '2'),
(14, 1, '2433.004.002.107', 'Penelitian Sistem Rating untuk Perumahan dan Permukiman Hijau', '1', '2'),
(15, 1, '2433.004.004.107', 'Pengembangan Green Label dalam Penyediaan Bahan Bangunan', '1', '2'),
(16, 1, '2433.004.006.107.A', 'Penyusunan Pedoman Sistem Rating Bangunan Hijau pada Bangunan Gedung', '1', '2'),
(17, 1, '2433.004.006.107.A', 'Pengembangan Metodelogi  Pengukuran Perhitungan Emisi Gas Rumah Kaca pada Sektor Air Limbah', '1', '2'),
(18, 1, '2433.005.004.107', 'Penyusunan Konsep Pedoman Teknologi Bahan Bangunan Alternatif', '1', '2'),
(19, 1, '2433.006.003.107.A', 'Pengembangan Teknologi Air Limbah dengan Sistem Vermibiofilter', '1', '2'),
(20, 1, '2433.006.003.107.B', 'Pengembangan dan Penerapan Teknologi Air Minum dan Sanitasi di Kawasan Permukiman DAS', '1', '2'),
(21, 1, '2433.006.003.107.C', 'Pengembangan dan Penerapan Teknologi Air Minum di Pulau Kecil', '1', '2'),
(22, 1, '2433.006.005.107', 'Pengkajian dan Penerapan Teknologi Rumah Murah, Sehat dan Layak Huni', '1', '2'),
(23, 1, '2433.008.001.014', 'Penyusunan Naskah Kebijakan Bidang Permukiman (Kajian Kebijakan)', '1', '2'),
(24, 1, '2433.009.001.040.A', 'Diseminasi dan Sosialisasi SPM Bidang Permukiman', '1', '2'),
(25, 1, '2433.009.001.040.B', 'Diseminasi dan Sosialisasi Teknologi Bidang Permukiman', '1', '2'),
(26, 1, '2433.009.001.040.C', 'Publikasi dan Dokumentasi Hasil Litbang', '1', '2'),
(27, 1, '2433.009.001.040.D', 'Penyelenggaraan dan Keikutsertaan Pameran', '1', '2'),
(28, 1, '2433.010.001.044', 'Bantuan Teknis / Administratif / Manajemen', '1', '2'),
(29, 1, '2433.012.001.048.A', 'Perencanaan/Implementasi/Pengelolaan Sistem Akuntansi Pemerintah', '1', '2'),
(30, 1, '2433.012.001.048.B', 'Pembinaan Administrasi dan Pengelolaan Keuangan', '1', '2'),
(31, 1, '2433.012.002.047.A', 'Pengelolaan Barang Milik/Kekayaan Negara', '1', '2'),
(32, 1, '2433.012.002.051.D', 'Penyelenggaraan Humas dan Protokol', '1', '2'),
(33, 1, '2433.012.002.051.E', 'Operasional Jaringan', '1', '2'),
(34, 1, '2433.012.002.051.F', 'Penyelenggaraan Sistem Informasi', '1', '2'),
(35, 1, '2433.012.002.053.D', 'Penelitian Klarifikasi, Registrasi, Penerapan Sistem Kearsipan', '1', '2'),
(36, 1, '2433.012.003.051.C', 'Penerbitan Jurnal', '1', '2'),
(37, 1, '2433.012.003.053.A', 'Penataan Manajemen Kelembagaan', '1', '2'),
(38, 1, '2433.012.003.053.B', 'Pengembangan Mutu Kelembagaan', '1', '2'),
(39, 1, '2433.012.003.053.C', 'Administrasi Umum dan Peningkatan Sarana Kelitbangan', '1', '2'),
(40, 1, '2433.012.003.058.A', 'Penyelenggaraan Kepustakaan', '1', '2'),
(41, 1, '2433.012.004.012.A', 'Pembinaan Administrasi Pengelolaan Kepegawaian', '1', '2'),
(42, 1, '2433.012.004.012.A', 'Pengembangan Jabatan Fungsional SDM Iptek', '1', '2'),
(43, 1, '2433.012.004.012.B', 'Pengembangan Kompetensi SDM', '1', '2'),
(44, 1, '2433.012.004.012.D', 'Pengurusan Visa/Paspor', '1', '2'),
(45, 1, '2433.012.004.012.E', 'Pengurusan HAKI', '1', '2'),
(46, 1, '2433.012.004.040.A', 'Penyelenggaraan dan Keikutsertaan dalam Seminar Nasional dan Internasional', '1', '2'),
(47, 1, '2433.012.005.018.A', 'Penyusunan Rencana Kerja dan Anggaran', '1', '2'),
(48, 1, '2433.012.005.200.A', 'Monitoring Pelaksanaan Kegiatan', '1', '2'),
(49, 1, '2433.012.005.200.B', 'Evaluasi Kemanfaatan Hasil Litbang', '1', '2'),
(50, 1, '2433.012.006.045.A', 'Kerjasama Dalam Negeri', '1', '2'),
(51, 1, '2433.012.006.045.B', 'Pengembangan Unit Inkubasi Hasil Litbang Permukiman', '1', '2'),
(52, 1, '2433.012.006.045.C', 'Kesekretariatan Kerjasama Luar Negeri', '1', '2'),
(53, 1, '2433.012.006.045.D', 'Kesekretariatan RCCEHUD', '1', '2'),
(54, 1, '2433.012.007.015', 'Perumusan SPM', '1', '2'),
(55, 1, '2433.012.008.011.A', 'Administrasi Kegiatan', '1', '2'),
(56, 1, '2433.012.009.055.A', 'Laboratorium Struktur dan Konstruksi Bangunan', '1', '2'),
(57, 1, '2433.012.009.055.B', 'Laboratorium Bahan Bangunan', '1', '2'),
(58, 1, '2433.012.009.055.C', 'Laboratorium Tata Bangunan', '1', '2'),
(59, 1, '2433.012.009.055.D', 'Laboratorium Lingkungan Permukiman', '1', '2'),
(60, 1, '2433.012.009.055.E', 'Studio Perumahan', '1', '2'),
(61, 1, '2433.012.009.060.A', 'Penyusunan Data Center', '1', '2'),
(62, 1, '2433.013.001.011', 'Pengelola PNBP (Administrasi Kegiatan)', '1', '2'),
(63, 1, '2433.013.002.152', 'Penerimaan Negara Bukan Pajak', '1', '2'),
(64, 1, '2433.014.001.114', 'Pengadaan Peralatan Laboratorium', '1', '2'),
(65, 1, '2433.994.001', 'Pembayaran Gaji dan Tunjangan', '1', '2'),
(66, 1, '2433.994.002.A', 'Pengadaan Toga/Pakaian Kerja Supir/Pesuruh/ Perawan/Dokter/Satpam/Tenaga Teknis Lainnya', '1', '2'),
(67, 1, '2433.994.002.C', 'Operasional Perkantoran dan Pimpinan (Rapat Koordinasi)', '1', '2'),
(68, 1, '2433.994.002.', 'Perawatan Gedung Kantor', '1', '2'),
(69, 1, '2433.994.002.E', 'Perawatan Rumah Negara', '1', '2'),
(70, 1, '2433.994.002.G', 'Perawatan Sarana Gedung', '1', '2'),
(71, 1, '2433.994.002.H', 'Perawatan Kendaraan Bermotor Roda 4/Roda 6/ Roda 10', '1', '2'),
(72, 1, '2433.994.002.I', 'Perawatan Kendaraan Bermotor Roda 2', '1', '2'),
(73, 1, '2433.994.002.K', 'Langganan Daya dan Jasa', '1', '2'),
(74, 1, '2433.994.002.L', 'Jasa Keamanan dan Kebersihan', '1', '2'),
(75, 1, '2433.994.002.M', 'Jasa Pos / Giro / Sertifikat', '1', '2'),
(76, 1, '2433.994.002.N', 'Pertemuan dan Penerimaan Delegasi/Misi/Tamu', '1', '2'),
(77, 1, '2433.994.002.P', 'Keperluan Perkantoran', '1', '2'),
(78, 1, '2433.996.001.114', 'Pengadaan Alat Studio dan Komunikasi', '1', '2'),
(79, 1, '2433.996.002.114', 'Pengadaan Alat Pengolah Data', '1', '2'),
(80, 1, '2433.997.001.114', 'Pengadaan Mebelair', '1', '2'),
(81, 1, '2433.998.001.056', 'Peningkatan / Pembangunan Prasarana dan Sarana Internal Kementerian PU', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tipe_transaksi` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_header`, `username`, `komentar`, `id_pegawai`, `tipe_transaksi`) VALUES
(1, '1', 'admin', 'balik yu', NULL, ''),
(2, '1', 'admin', 'duh jelek', NULL, ''),
(3, '1', 'admin', 'butut', NULL, ''),
(4, '2', 'esselon 4', '0', NULL, ''),
(5, '2', 'esselon 4', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', NULL, ''),
(6, '5', 'esselon 4', '', NULL, ''),
(7, '14', 'esselon 3', 'ditolak karena dokumen belum lengkap', NULL, ''),
(8, '14', 'esselon 4', 'lengkapi dokumen kata esselon 3', NULL, ''),
(9, '5', 'esselon 4', 'ditolak angin', NULL, ''),
(10, '16', 'esselon 4', '', NULL, ''),
(11, '16', 'esselon 4', '', NULL, ''),
(12, '16', 'esselon 4', '', NULL, ''),
(13, '16', 'esselon 4', '', NULL, ''),
(14, '16', 'esselon 4', '', NULL, ''),
(15, '16', 'esselon 4', '', NULL, ''),
(16, '16', 'esselon 4', '', NULL, ''),
(17, '16', 'esselon 4', '', NULL, ''),
(18, '16', 'esselon 4', '', NULL, ''),
(19, '16', 'esselon 4', '', NULL, ''),
(20, '16', 'esselon 4', '', NULL, ''),
(21, '16', 'esselon 4', 'tolak', NULL, ''),
(22, '18', 'esselon 4', 'tambahkan pegawai yang ikut sert', NULL, ''),
(23, '22', 'esselon 4', 'isi', NULL, ''),
(24, '8', 'esselon 4', 'dsfa', NULL, ''),
(25, '6', 'esselon 4', 'ihi', NULL, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
(43, 'Status Pegawai', 'Non PNS (SMU)'),
(44, 'Jenis Kendaraan Sewa', 'Roda 4'),
(45, '', 'Jenis Kendaraan Sewa'),
(46, 'Jenis Kendaraan Sewa', 'Roda 6 / Bus Sedang'),
(47, 'Jenis Kendaraan Sewa', 'Roda 6 / Bus Besar'),
(48, '', 'Golongan (Biaya Penginapan)'),
(49, 'Golongan (Biaya Penginapan)', 'I'),
(50, 'Golongan (Biaya Penginapan)', 'II'),
(51, 'Golongan (Biaya Penginapan)', 'III'),
(52, 'Golongan (Biaya Penginapan)', 'IV'),
(53, '', 'Tingkat'),
(54, 'Tingkat', 'Esselon I'),
(55, 'Tingkat', 'Esselon II'),
(56, 'Golongan', 'IV/A'),
(57, 'Golongan', 'IV/B'),
(58, 'Golongan', 'IV/C'),
(59, 'Golongan', 'IV/D'),
(70, 'Satuan Barang', 'rim'),
(63, 'Golongan (Biaya Penginapan)', 'Esselon I'),
(64, 'Golongan (Biaya Penginapan)', 'Esselon II'),
(65, 'Golongan (Biaya Penginapan)', 'Esselon III'),
(67, 'Golongan (Biaya Penginapan)', 'Esselon IV'),
(68, 'Tingkat', 'Esselon III'),
(69, 'Tingkat', 'Esselon IV'),
(71, 'Jenis Barang', 'Penyelenggaraan');

-- --------------------------------------------------------

--
-- Table structure for table `panjar`
--

CREATE TABLE IF NOT EXISTS `panjar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` int(11) NOT NULL DEFAULT '0',
  `penerima` int(11) DEFAULT NULL,
  `deskripsi_panjar` text,
  PRIMARY KEY (`id`,`id_header`),
  UNIQUE KEY `id_header` (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `panjar`
--

INSERT INTO `panjar` (`id`, `id_header`, `penerima`, `deskripsi_panjar`) VALUES
(2, 5, 180, 'tahu tempe'),
(4, 15, 180, 'Deskripsi'),
(6, 1, 180, 'Deskripsi'),
(7, 10, 180, 'Deskripsi');

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
  `tingkat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `golongan`, `jabatan`, `tgl_lahir`, `kelas_jabatan`, `status`, `kode_unit`, `kriteria_pegawai`, `status_pendidikan`, `institusi`, `kepakaran`, `narasumber`, `tingkat`) VALUES
(1, '196006151987032001', 'Prof (R) Dr. Ir. Anita Firmanti, MT', 'IV/d', 'Kepala Puslitbang Permukiman', '0000-00-00', '15', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(2, '196101131990031001', ' Ir. R. Johny F.S. Subrata, MA.', 'IV/B', 'Kepala Bagian Tata Usaha', '0000-00-00', '12', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(3, '196308311997031001', ' Nana Pudja Sukmana, ST.', 'III/D', 'Kasubbag Umum', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(4, '196008281993031005', ' Drs. Agus Heriyanto, MAP.', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(5, '196001121982111001', ' Ramlan, S.Sos.', 'III/D', 'Pengolah BMN (Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(6, '195910011983031004', ' S  o  b  a  r, BE.', 'III/C', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(7, '196409091991031004', ' Widjianto, SST.', 'III/B', 'Penelaah Laporan BMN (Jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(8, '198509292010121004', ' Sony Suryono, A.Md.', 'II/C', 'Penelaah Laporan BMN ', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(9, '196710272007101001', ' Yana Suryana, SE.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(10, '196803102007011004', ' Achmad Hidayat, S.AP.', 'III/a', 'Pelaksana Administrasi ( Jenjang 1)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(11, '199005112014021004', 'Anindwiyan Dian Panduwijaya, A.Md', 'II/c', 'Teknisi', '0000-00-00', '', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(12, '197110042007012001', ' Siti Sadiah', 'II/B', 'Pelaksana Administrasi ( Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(13, '197010032007011004', ' S u h e n d i', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(14, '196412202007011002', ' Uteng Miftah', 'II/B', 'Pengolah BMN (Jenjang 2)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(15, '196809142008121001', ' Zaenal Abidin', 'II/B', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(16, '196007121994031003', ' N  a  r  k  a  m', 'II/A', 'Petugas Operasional dan Pemeliharaan', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(17, '196002272006041001', ' Ade Sahri', 'I/B', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(18, '', 'Totong Kurnia', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(19, '196810041991031002', ' Sujarwanto, S.AP., MM.', 'III/B', 'Kepala Subbag Keuangan', '0000-00-00', '10', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(20, '195809281980121002', ' Budy Siswanto, S.Sos.', 'III/D', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(21, '196709301993111001', ' Toraja Hutasoit, B.Sc.', 'III/C', 'Penelaah Anggaran dan PNBP (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(22, '196502011987021001', ' Iskandar, S.IP.', 'III/C', 'Urusan Pelaopran (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(23, '196202161984022002', ' Beben Sugiarti', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(24, '195801061982112002', ' K o k o y', 'III/B', 'Penata Keuangan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(25, '195911291986031007', ' Adjat Sudradjat', 'III/B', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang I)', '0000-00-00', '6', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(26, '197207142007012003', ' Tintin Djuartini', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(27, '196206262007012001', ' Sutajiah', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(28, '196905272007011002', ' Ahmad Gojali', 'II/B', 'Penelaah Data Keuangan (Jenjang II)', '0000-00-00', '7', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(29, '196806122007011004', ' Drajat Subuhri', 'II/B', 'Bendahara', '0000-00-00', '8', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(30, '196312222008122001', ' Kaswati', 'II/B', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(31, '197212212009111001', ' Apep Apepudin', 'II/A', 'Urusan Penerbitan SPM dan Pelaporan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(32, '195810171989031003', ' J a e n u l', 'II/A', 'Penata Keuangan (Jenjang II)', '0000-00-00', '5', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(33, ' ', 'Susanto', ' ', 'Pelaksana Administrasi ( Jenjang 3)', '0000-00-00', '4', 'PNS', '1', '', '', NULL, NULL, 0, NULL),
(34, '195907151986031004', ' Tibin R. Prayudi, BE., SE., MM.', 'IV/A', 'Kepala Bidang Sumber Daya Kelitbangan', '0000-00-00', '12', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(35, '195905221990031001', ' Drs. Duddy Dwiyanto K, MBA.', 'IV/A', 'Kasubbid SDM', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(36, '196206251999031001', ' Drs. Binanga Sinaga', 'III/D', 'Arsiparis Muda', '0000-00-00', '9', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(37, '196008051986021002', ' B u d i y o n o', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(38, '198107092008012002', ' Siska Purnianti, SH.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(39, '195912161989031004', ' W a s i d i', 'III/B', 'Analis Kepegawaian (Jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(40, '198307012009121001', ' Andro Ramadhanu, SH.', 'III/A', 'Analis Kepegawaian (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(41, '196706282007012001', ' Siti Rachmawati', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(42, '197101032007012003', ' N g a t i n i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(43, '196901102007011006', ' Jajang Mulyana', 'II/B', 'Pelaksana Administrasi (Jenjang II)', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(44, '197303122007101002', ' W  o  w  o', 'II/A', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(45, '196801081998031002', ' Drs. Rudy R. Effendi, MT.', 'III/D', 'Kasubbid Sarana Kelitbangan', '0000-00-00', '10', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(46, '196606281993032001', ' Dra. Roosdharmawati', 'IV/A', 'Pranata Humas Madya ', '0000-00-00', '11', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(47, '760000228', ' Drs. Arif Sugiarto, MM.', 'IV/A', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(48, '196401291993111001', ' Maman Tarmansyah, ST., M.Si.', 'III/D', 'Pengolah Penye Penga Barang Jasa (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(49, '198404292010122005', ' Sari Nur Aini, S.IP.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(50, '196005031986021002', 'Aoh  Sukirman', 'III/C', 'Arsiparis Penyelia', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(51, '195804051987021001', ' Slamet Suhaedit', 'III/B', 'Pelaksana Administrasi (Jenjang I)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(52, '196706031993011004', ' Dadan Ramdani, A. Md.', 'III/B', 'Pelaksana Administrasi (Jenjang 1)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(53, '196410221989032003', ' Ai Rukmini', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(54, '198509252009121001', ' Haryo Budi Guruminda, ST.', 'III/A', 'Pengolah Kinerja Kelembagaan (Jenjang 2)', '0000-00-00', '7', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(55, '198808222010122002', ' Rydha Riyana Agustien, S.Si.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '2', '', '', NULL, NULL, 0, NULL),
(56, '196211251989031003', ' Ir. Lutfi Faizal', 'IV/B', 'Kepala Bidang Standar dan Diseminasi', '0000-00-00', '12', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(57, '198202082006041006', ' Sunarjito, ST, MT', 'III/B', 'Kasubbid Standar', '0000-00-00', '10', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(58, '196805201993031008', ' Ir. Dudi Dofarudin Hakim', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(59, '198602112009121001', ' Resha Febrian, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(60, '198506152009122001', ' Hanna Yuni Hernanti, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(61, '198310302010121002', ' Arif Setiawan, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(62, '198504252010122002', ' Ayu Kristianty Ferina, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(63, '197506292002122002', 'Ratna Iswari Utoro, ST., MT.', 'III/C', 'Penyusun Bimbingan Teknis ', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(64, '196902032007011006', ' T  o  n  i', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(65, '196207221991022001', ' Dra. Yulinda Rosa, M.Si.', 'IV/A', 'Kasubbid Diseminasi/Peneliti Madya', '0000-00-00', '11', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(66, '198107142009121001', ' Ajun Hariono, ST., MSc.Eng.', 'III/B', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(67, '195908051984021002', ' G u s w a n d i, S.Sos.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(68, '197002071991032002', ' Neneng Kaniawati S, S.Sos., MM.', 'III/D', 'Penyusun Bimbingan Teknis (Jenjang 1)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(69, '196605201991021002', ' S o f i y a n, A.Md.', 'III/B', 'Pengolah Data dan Informasi (jenjang 2)', '0000-00-00', '7', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(70, '196111291993031001', ' Adang Triana', 'III/B', 'Pengolah Data dan Informasi (jenjang 3)', '0000-00-00', '6', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(71, '197007272007101001', ' Asep Jiwa Praja', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '3', '', '', NULL, NULL, 0, NULL),
(72, '197109301998031001', ' Iwan Suprijanto, ST., MT.', 'IV/B', 'Kepala Bidang Program dan Kerjasama/ P. Utama', '0000-00-00', '13', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(73, '197104021998031003', ' Sugeng Paryanto, ST., MT.', 'III/C', 'Kasubbid Program dan Evaluasi', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(74, '196611021994032002', ' Dra. Sri Sulasmi, MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(75, '198510192008012002', ' Rani Widyahantari, ST.', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(76, '198108152006042003', ' Neripha Ayu C, S.Si, MT', 'III/C', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(77, '198504272010122002', ' Anggi Wulandini, ST.', 'III/A', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(78, '198409222010011008', 'Agung Permana, ST', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(79, '198212032006042001', ' Fani Deviana, ST.', 'III/B', 'Kasubbid Pengembangan Kerjasama', '0000-00-00', '10', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(80, '196307101991032002', ' Lia Yulia Iriani, SH., M.Si.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(81, '195801281980011001', ' Moch.  Pandji Dermawan, A.Md.', 'III/D', 'Pranata Humas Penyelia', '0000-00-00', '8', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(82, '198412312009122001', ' Lucky Adhyati P, ST., MT.', 'III/B', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(83, '197504032009021001', 'Mifta Priyanto, ST. MM', 'III/B', 'Penyu Prog  dan Rencana Anggaran (Jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(84, '196911091004021001', ' W  a  r  i  d  j  o', 'III/A', 'Pranata Humas Pelaksana', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(85, '198307032009121001', ' Adhi Yudha Mulia, ST.', 'III/B', 'Penelaah Kerjama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(86, '198510122010122022', ' Sri Maria Senjaya, ST.', 'III/A', 'Penelaah Kerjasama (jenjang 2)', '0000-00-00', '7', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(87, '196710101994031006', ' Hendi Suhendi', 'II/A', 'Pengadmnistrasi Umum', '0000-00-00', '5', 'PNS', '4', '', '', NULL, NULL, 0, NULL),
(88, '196409121991031002', ' Ir. Arvi Argyantoro, MA.', 'IV/B', 'Kepala Balai Tata Bangunan', '0000-00-00', '12', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(89, '196207061997031002', ' Ir. Maryoko Hadi, Dipl.E.Eng., MT.', 'III/D', 'Kasie Penel & Pengembangan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(90, '195207031982012001', ' Ir. Nurhasanah Azhar, MM.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(91, '195102211982031002', ' Ir. Rahim Siahaan, CES.', 'IV/D', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(92, '196407061990032002', ' Ir. Wahyu Wuryanti, MSc.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(93, '195411041979011002', ' W.  S. Witarso, ST.', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(94, '197904062006041004', ' Mahatma Sindu Suryo, ST., MT.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(95, '196812032008121001', ' Wahyu Sujatmiko, ST., MT.', 'III/C', 'Penelti Madya', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(96, '198005182008012017', ' Frieda Hariyani, ST.', 'III/B', 'Penyusun Monev & Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(97, '198201142006041002', ' Muhammad Nur Fajri A, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(98, '199010102014021002', 'Muhammad Ardimas Riyono, ST', 'III/A', 'Penyusun NSPK (Jenjang 1)', '0000-00-00', '', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(99, '196206071992091001', ' Jonsirwan, SST.', 'III/C', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(100, '196809071996032001', ' Ir. A v e n t i, MT.', 'III/D', 'Peneliti Muda ', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(101, '196009191993121001', ' Ir. Nugraha Budi R,  MSc.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(102, '195806041982111002', ' M a r y o n o, BE.', 'III/D', 'Teknisi Litkayasa Penyelia', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(103, '198702212008122001', ' Fanny Kusumawati, ST.', 'III/B', 'Penelaah Penerapan & Peltek (jen 2)', '0000-00-00', '7', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(104, '195808141983031008', ' Kamtua Sinaga', 'III/B', 'Teknisi (jenjang 3)', '0000-00-00', '6', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(105, '197808162008121001', ' Fefen Suhedi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(106, '196712132007011004', ' Dede Suhendar', 'II/B', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(107, '195808011986021001', ' Mamang Hidayat', 'II/C', 'Penata O & P Laboratorium ', '0000-00-00', '5', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(108, '196106092007011002', ' U  n  d  a  n  g', 'I/B', 'Pengadministrasi Teknis (Jenjang 3)', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(109, '', 'Maryana', '', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(110, ' ', 'Enang Rohiman', ' ', 'Caraka', '0000-00-00', '3', 'PNS', '5', '', '', NULL, NULL, 0, NULL),
(111, '196511301990031001', ' Ir. Arief Sabaruddin, CES.', 'IV/C', 'Kepala Balai Perum dan Lingkungan/ P. Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(112, '197107121998032001', ' Ade Erma Setyowati, ST., M.Ec.Dev.', 'III/D', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(113, '197108121999031002', 'Prof (R) Dr. Andreas Wibowo, ST., MT.', 'IV/A', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '6', '', '', NULL, NULL, 0, 'Esselon I'),
(114, '195808131986031002', ' Ir. Puthut Samyahardja, CES., MSc.', 'IV/C', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(115, '195305181982012001', ' Ir. Lya Meilany Setyawaty, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(116, '195104231980112001', ' Ir. Ida Yudiarti Yunus, M.Si.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(117, '195412091986031001', ' Ir. Siti Zubaidah Kurdi, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(118, '195707271988032001', ' Dra. Titi Utami Endang R.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(119, '195708181991032002', ' Dra. Heni Suhaeni, MSc.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(120, '195909301998031001', ' Drs. Rusydi Alimaman', 'III/D', 'Pedal Madya', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(121, '198112052005022001', ' Rian Wulan Desriani, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(122, '198202252008122001', ' Fenita Indrasari, ST', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(123, '198202212008011011', ' Arip Pauzi Rachman, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(124, '196410281996031001', ' Rusli, ST., MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(125, '195611261986031003', ' Moch. Edi Nur, ST.', 'IV/A', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(126, '195603171983031006', ' Wahyu S. Yodhakersa, ST.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(127, '195701191986031001', ' Ir. B u d i o n o', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(128, '196705191994031005', ' Dyan Kardiyanto, SH.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(129, '195802081988031001', ' Drs. Ichwan Subiantoro, CES.', 'IV/A', 'Perekayasa Madya ', '0000-00-00', '11', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(130, '196111171993031002', ' Drs. Dadi Karyadi', 'III/D', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(131, '196708062001121002', ' Drs. Harri A. Setiadi, MT.', 'III/C', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(132, '196309281996031001', ' Erwin Sudirman, ST.', 'III/B', 'Pengolah data & informasi (Jenjang 2)', '0000-00-00', '7', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(133, '197911182005021002', ' S. Hidayatullah Santius, ST.', 'III/B', 'Peneliti Pertama ', '0000-00-00', '8', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(134, '197108112007011002', ' Iwan Hermawan', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '6', '', '', NULL, NULL, 0, NULL),
(135, '196201201990031001', ' Ir. Sutadji Yuwasdiki, Dipl.E.Eng.', 'IV/B', 'Kepala Balai', '0000-00-00', '12', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(136, '196702081998031002', ' Ir. Johnny Rakhman,  Dipl. E.Eng.', 'III/D', 'Kasie Penelitian & Pengembangan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(137, '195205271981032001', ' Ir. Silvia Fransisca H, MT.', 'IV/C', 'Peneliti Madya ', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(138, '196511111994021001', ' Ir. Moch. Ridwan, Dipl.E.Eng.', 'IV/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(139, '195704071983031005', 'Cecep Bakheri Bachroni, M. Eng', 'IV/a', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(140, '197412112009111001', ' Tedi Achmad Bahtiar, ST.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(141, '197802192006041005', ' Muhammad Rusli, ST.', 'III/A', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(142, '198206192006041003', ' Christanto Yudha S S, ST.', 'III/B', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(143, '198612232009121001', ' Chiko Bhakti Mulia W, ST.', 'III/A', 'Penyusun Monev & Pelaporan (jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(144, '198112282005021001', ' Ferri Eka Putra, ST., MDM.', 'III/C', 'Kasie Penerapan & Pelayanan', '0000-00-00', '9', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(145, '198401212009121002', ' Azhar Pangarso , ST., M.Eng.Sc.', 'III/B', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(146, '195802101988011001', ' Edoy Kurniadi', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(147, '195805211983031004', ' Sudarmanto', 'III/B', 'Teknisi ', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(148, '198109202010121002', ' Yoga Megantara, ST.', 'III/A', 'Penelaah Penerapan & Peltek (Jenjang 2)', '0000-00-00', '7', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(149, '198603282010122003', ' Faiza Firlany, A.Md.', 'II/C', 'Penata O&P Laboratprium (Jenjang 1)', '0000-00-00', '6', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(150, '196603262007101001', ' S u r a s m i n', 'II/B', 'Pengadministrasi Umum ', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(151, '196404082007101001', ' J  o  n o', 'II/B', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(152, '196205071994031002', ' Atep Hadri', 'II/A', 'Penata O&P Laboratprium (Jenjang 2)', '0000-00-00', '5', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(153, '197107172002121001', ' M u l y a n a', 'I/C', 'Penata O&P Laboratorium (Jenjang 3)', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(154, ' ', 'Hend Mustofa', ' ', 'Pelaksana Administrasi', '0000-00-00', '4', 'PNS', '7', '', '', NULL, NULL, 0, NULL),
(155, '196003081989021001', ' Ir. Sudradjat, Dipl.SE. M.Eng.', 'IV/B', 'KEPALA BALAI AIR MINUM DAN PLP', '0000-00-00', '12', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(156, '196808021998032004', ' Ir. Fitrijani Anggraini, MT.', 'IV/A', 'Kasie Litbang/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(157, '195806261986031001', ' S a r b i d i, ST., MT.', 'IV/B', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(158, '196312121990012001', ' Ir. Ida Medawati, MT.', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(159, '196603031993032002', ' Dra. Tuti Kustiasih', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(160, '195912281990011001', ' T  o  h  i  r, ST., MT.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(161, '195804081978121001', ' Dadang Sobana, ST.', 'III/D', 'Perekayasa Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(162, '197301101998032004', ' Elis Hastuti, ST., MSc. ', 'III/D', 'Peneliti Muda', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(163, '195906131990032001', ' Dra. Aryenti', 'IV/A', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0, 'Esselon I'),
(164, '199001142014022006', 'Amallia Ashuri, S.T.', 'III/A', 'Teknisi', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(165, '196907151996032001', ' Ir. Sri Darwati, MSc.', 'IV/A', 'Kasie Penerapan dan Pelayanan/Peneliti Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(166, '195710151982111001', ' Atang Sarbini, ST.', 'III/D', 'Perekayasa Madya', '0000-00-00', '9', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(167, '196104281990031004', ' Drs. R. Mukti Budiman', 'IV/A', 'Perekayasa Madya', '0000-00-00', '11', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(168, '197304241999012001', 'Reni Nuraeni, ST, MT', 'III/D', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(169, '195906081983031005', ' M u l y a n a, BE.', 'III/C', 'Penelaah Penerapan & Pelayanan Teknis ', '0000-00-00', '7', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(170, '198712302010122004', ' Siti Dahniar Indrayanti, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(171, '199003012014022002', 'Erma Mustika Sari, A.Md', 'II/C', 'Penata O&P Laboratorium (Jenjang 1)', '0000-00-00', '6', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(172, '197003152007011005', ' Agus Sugiarto', 'II/B', 'Pengadministrasi Umum', '0000-00-00', '5', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(173, '197204122007011003', ' Asep Hidayat', 'I/D', 'Pelaksana Administrasi (Jenjang1)', '0000-00-00', '4', 'PNS', '8', '', '', NULL, NULL, 0, NULL),
(174, '196010091992031002', ' Ir. Agus Sarwono', 'IV/B', 'Kepala Balai Bahan Bangunan', '0000-00-00', '12', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(175, '195605061979031003', ' L a s i n o, ST., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(176, '196501071991032002', ' Ir. Nurul Aini Sulistyowati, MT.', 'IV/B', 'Kasie Penelitian dan Pengembangan', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(177, '195107161977112001', ' Andriati Amir Husin, M.Si., APU.', 'IV/E', 'Peneliti Utama', '0000-00-00', '13', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(178, '195003031973011001', ' P u r w i t o, Dipl.E.Eng.', 'IV/C', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(179, '195911301993031001', ' Ir. Bambang Sugiharto, MT.', 'IV/A', 'Penyusun NSPK (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(180, '195603261983021001', ' Aan Sugiarto, BAE.', 'III/D', 'Peneliti Madya', '0000-00-00', '11', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(181, '198104012006041002', ' Dany Cahyadi, ST.', 'III/A', 'Peneliti Pertama', '0000-00-00', '8', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(182, '198403292009121002', ' Arif Noviayanto, ST.', 'III/B', 'Penyusun Monev dan Pelaporan (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(183, '196211011993031002', ' Ir. Dadri Arbriyakto, MT.', 'III/D', 'Kasie Penerapan dan Pelayanan', '0000-00-00', '9', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(184, '198710152009121001', ' Arkadia Rhamo, ST.', 'III/A', 'Penyusun NSPK (Jenjang2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(185, '197103011994021001', ' R u s y a n a, A. Md.', 'III/B', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(186, '196808151994021001', ' I s m o n o', 'III/B', 'Penyelenggaran Layanan Teknis (Jenj 1)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(187, '195803231982121001', ' S u d i o n o', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(188, '196209031989031006', ' S u r a d i', 'III/B', 'Pelaksana Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(189, '196508211993011004', ' Asep Kosasih', 'III/B', 'Teknisi (Jenjang 3)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(190, '198512262011012011', 'Indriansi Nirwana, ST.', 'III/A', 'Pelaksana Teknis (Jenjang 2)', '0000-00-00', '7', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(191, '198411132010121003', ' Moh. Anwar Mussaddad, A.Md.', 'II/C', 'Penata O&P Laboratorium (Jenjang 2)', '0000-00-00', '6', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(192, '197010192007011002', ' Gultom Obet Haposan ', 'II/B', 'Pengadministrasi Teknis (Jenjang 2)', '0000-00-00', '5', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(193, ' ', 'Usup Ruswandi', ' ', ' ', '0000-00-00', '', 'PNS', '9', '', '', NULL, NULL, 0, NULL),
(194, '008', 'Taufik Ismail Abdilah, S.Kom', 'III/A', '6', '1989-07-24', '2a', 'Status', '1', '', 'S1', 'UPI', 'Ahli Komputer', 1, 'Tingkat'),
(195, '196101131990031001', 'Budi Rahardjo', 'III/D', '2', '2015-05-04', '-', 'Status', '9', 'PNS', 'S1', 'Nowhere', 'Menghitung', 1, 'Tingkat'),
(196, '1234', 'Yiyi Supendi, M.T', 'II/D', '5', '2015-05-06', '-', 'Non PNS (S1)', '1', '-', 'S2', 'UNLA', 'Arsiterktur ', 1, 'Tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_barang`
--

CREATE TABLE IF NOT EXISTS `pengadaan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` int(11) NOT NULL DEFAULT '0',
  `penerima` int(11) DEFAULT NULL,
  `deskripsi_pengadaan_barang` text,
  PRIMARY KEY (`id`,`id_header`),
  UNIQUE KEY `id_header` (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengadaan_barang`
--

INSERT INTO `pengadaan_barang` (`id`, `id_header`, `penerima`, `deskripsi_pengadaan_barang`) VALUES
(2, 5, 10, 'tahu tempe');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang`
--

CREATE TABLE IF NOT EXISTS `pengajuan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_pengajuan` varchar(50) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `kode_jenis_barang` varchar(100) NOT NULL,
  `maksud_kegiatan` text,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status_approval` int(2) NOT NULL,
  `status_penolakan` int(2) DEFAULT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_approval` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pengajuan_barang`
--

INSERT INTO `pengajuan_barang` (`id`, `nomor_pengajuan`, `id_anggaran`, `kode_jenis_barang`, `maksud_kegiatan`, `tanggal_pengajuan`, `status_approval`, `status_penolakan`, `tanggal_pembuatan`, `tanggal_approval`) VALUES
(1, '-', 2, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'transaksi pengajuan barang', '0000-00-00', 0, 0, '0000-00-00 00:00:00', '0000-00-00'),
(2, '-', 2, 'Bahan Bangunan', 'transaksi', '2015-05-05', 2, 0, '0000-00-00 00:00:00', '0000-00-00'),
(3, '-', 2, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'asdasdalsdaslkdnaslndlasd', '2015-05-09', 0, 0, '0000-00-00 00:00:00', '0000-00-00'),
(4, '002/BARANG/SATKER/LP/V/2015', 378, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'pengadaan barang untuk pers', '2015-05-20', 5, 0, '0000-00-00 00:00:00', '2015-05-17'),
(5, '003/BARANG/SATKER/LP/V/2015', 4, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'Pengadaan ATK dan Bahan Komputer', '2015-05-19', 5, 0, '2015-05-18 23:51:06', '2015-05-18'),
(6, '-', 1, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'ke enam', '2015-06-02', 0, 0, '2015-06-02 15:25:29', '0000-00-00'),
(7, '-', 1, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', '12', '2015-06-29', 0, 0, '2015-06-02 15:28:09', '0000-00-00'),
(8, '-', 1, 'ATK, Bahan Komputer, dan Bahan Dokumentasi', 'test status', '2015-06-02', 0, 1, '2015-06-02 15:30:51', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_honorarium`
--

CREATE TABLE IF NOT EXISTS `pengajuan_honorarium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_pengajuan` varchar(50) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `acara` varchar(100) NOT NULL,
  `periode_pembayaran` date DEFAULT NULL,
  `status_approval` int(2) NOT NULL,
  `status_penolakan` int(2) DEFAULT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_approval` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengajuan_honorarium`
--

INSERT INTO `pengajuan_honorarium` (`id`, `nomor_pengajuan`, `id_anggaran`, `kegiatan`, `acara`, `periode_pembayaran`, `status_approval`, `status_penolakan`, `tanggal_pembuatan`, `tanggal_approval`) VALUES
(4, '004/KPTS/SATKER/Lp/V/2015', 2, 'Diseminasi dan Sosial Artifial Intelligence', 'Rencana Pelaksanaan Kegiatan Pengkajian Ruang', '1931-04-22', 5, 0, '2015-05-25 00:34:12', '2015-05-25'),
(5, '', 18, 'makan makan lagi', 'bermalam', '2015-05-25', 1, 0, '2015-05-25 08:39:45', '0000-00-00'),
(6, '', 6, 'Diseminasi Buatan', 'Rencana Penganggaran Diseminasi', '2015-05-27', 0, 1, '2015-05-25 10:30:46', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_pengguna` int(15) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `status_aktivasi` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pengguna`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_jenis_pengguna`, `id_pegawai`, `alamat`, `email`, `username`, `password`, `telp`, `status_aktivasi`) VALUES
(9, 1, 10, 'baleendah', 'ti.abdilah@gmail.com', 'opik123', '0cc175b9c0f1b6a831c399e269772661', '098234', 1),
(10, 1, 49, '-', '-', 'operator', '0cc175b9c0f1b6a831c399e269772661', '1234', 1),
(12, 3, 63, '-', '-', 'esselon 3', '0cc175b9c0f1b6a831c399e269772661', '1234', 1),
(13, 2, 40, '-', '-', 'esselon 4', '0cc175b9c0f1b6a831c399e269772661', '1234', 1),
(14, 4, 17, '-', '-', 'asisten satker', '0cc175b9c0f1b6a831c399e269772661', '1234', 1),
(15, 5, 72, '-', '-', 'ppk', '0cc175b9c0f1b6a831c399e269772661', '12345', 1),
(16, 5, 53, 'garut', '1', 'ai123', '0cc175b9c0f1b6a831c399e269772661', '', 0),
(17, 1, 77, '', '', 'anggi', '0cc175b9c0f1b6a831c399e269772661', '', 1),
(18, 1, 53, '', '', 'ai', '0cc175b9c0f1b6a831c399e269772661', '', 0),
(19, 1, 66, '', '', 'ajun', '0cc175b9c0f1b6a831c399e269772661', '', 0),
(20, 1, 123, '', '', 'arip', '0cc175b9c0f1b6a831c399e269772661', '', 0),
(21, 7, 184, '', '', 'super admin', '0cc175b9c0f1b6a831c399e269772661', '', 1),
(22, 2, 17, 'bandung', 'ti.abdilah@gmail.com', 'adesahri', '0cc175b9c0f1b6a831c399e269772661', '', 1),
(23, 8, 0, '-', '-', 'publik', '0fa68ee5f86c0c345aa1b4aec7a26f39', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan_dinas`
--

CREATE TABLE IF NOT EXISTS `perjalanan_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(50) NOT NULL,
  `tanggal_approval` date NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL,
  `status_penolakan` int(1) NOT NULL,
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
  `status_diklat` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id`, `no_spt`, `tanggal_approval`, `tanggal_pembuatan`, `status`, `status_penolakan`, `id_anggaran`, `jumlah_tujuan`, `maksud_perjalanan`, `jadwal_berangkat_1`, `jadwal_berangkat_2`, `jadwal_berangkat_3`, `jadwal_pulang_1`, `jadwal_pulang_2`, `jadwal_pulang_3`, `kota_tujuan_1`, `kota_tujuan_2`, `kota_tujuan_3`, `status_diklat`) VALUES
(1, '002/SPPD/SATKER/LP/IV/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 3, 'maksud satu', '2015-04-20', '2015-04-21', '2015-04-22', '2015-04-21', '2015-04-22', '2015-04-23', '1', '2', '1', 1),
(2, '003/SPPD/SATKER/LP/IV/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, '1', NULL, NULL, 1),
(3, '004/SPPD/SATKER/LP/IV/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'sssssssssssssssssssss', '2015-04-27', NULL, NULL, '2015-04-27', NULL, NULL, '19', NULL, NULL, 1),
(5, '009/SPPD/SATKER/LP/V/2015', '2015-05-10', '0000-00-00 00:00:00', '5', 0, '2', 1, 'studi banding ke kota jakarta', '2015-05-05', '0000-00-00', '0000-00-00', '2015-05-08', '0000-00-00', '0000-00-00', '7', NULL, NULL, 1),
(6, '005/SPPD/SATKER/LP/IV/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'studi banding jakarta 2 unit', '2015-04-30', '0000-00-00', '0000-00-00', '2015-05-02', '0000-00-00', '0000-00-00', '7', NULL, NULL, 1),
(7, '-', '0000-00-00', '0000-00-00 00:00:00', '0', 0, '2', 2, 'dua tujuan', '2015-05-04', '2015-05-05', '0000-00-00', '2015-05-05', '2015-05-06', '0000-00-00', '3', '1', NULL, 0),
(8, '001/SPPD/SATKER/LP/V/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'satu tujuan', '2015-05-04', '0000-00-00', '0000-00-00', '2015-05-06', '0000-00-00', '0000-00-00', '1', NULL, NULL, 1),
(10, '002/SPPD/SATKER/LP/V/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'satu tujuan', '2015-05-04', '0000-00-00', '0000-00-00', '2015-05-06', '0000-00-00', '0000-00-00', '2', NULL, NULL, 1),
(11, '-', '0000-00-00', '0000-00-00 00:00:00', '0', 0, '2', 3, 'tiga tujuan beda kota', '2015-05-04', '2015-05-05', '2015-05-06', '2015-05-05', '2015-05-06', '2015-05-08', '1', '2', '3', 1),
(12, '003/SPPD/SATKER/LP/V/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 1, 'satu tujuan', '2015-05-04', '0000-00-00', '0000-00-00', '2015-05-07', '0000-00-00', '0000-00-00', '1', NULL, NULL, 1),
(13, '004/SPPD/SATKER/LP/V/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '3', 1, 'studi banding ke denpasar (diklat)', '2015-05-14', '0000-00-00', '0000-00-00', '2015-05-15', '0000-00-00', '0000-00-00', '2', NULL, NULL, 1),
(14, '005/SPPD/SATKER/LP/V/2015', '2015-05-08', '0000-00-00 00:00:00', '5', 0, '2', 2, 'jalan-jalan 2 kota tujuan', '2015-05-08', '2015-05-09', '0000-00-00', '2015-05-09', '2015-05-10', '0000-00-00', '1', '2', NULL, 0),
(15, '006/SPPD/SATKER/LP/V/2015', '0000-00-00', '0000-00-00 00:00:00', '5', 0, '2', 3, 'asdf asdf asdasasas asf', '2015-05-08', '2015-05-09', '2015-05-10', '2015-05-09', '2015-05-10', '2015-05-11', '1', '2', '3', 0),
(16, '-', '0000-00-00', '2015-05-10 19:56:54', '1', 0, '377', 1, 'maksud', '2015-05-10', '0000-00-00', '0000-00-00', '2015-05-11', '0000-00-00', '0000-00-00', '2', NULL, NULL, 1),
(17, '010/SPPD/SATKER/LP/V/2015', '2015-05-11', '2015-05-10 20:00:28', '5', 0, '378', 1, 'maksud lagi', '2015-05-10', '0000-00-00', '0000-00-00', '2015-05-11', '0000-00-00', '0000-00-00', '2', NULL, NULL, 0),
(18, '011/SPPD/SATKER/LP/V/2015', '2015-05-11', '2015-05-12 00:02:09', '5', 0, '380', 1, 'maksud perjalanan 1 untuk studi banding ke denpasar', '2015-05-19', '0000-00-00', '0000-00-00', '2015-05-20', '0000-00-00', '0000-00-00', '2', NULL, NULL, 1),
(19, '012/SPPD/SATKER/LP/V/2015', '2015-05-11', '2015-05-12 00:37:59', '5', 0, '216', 2, 'testing perjalanan dinas 2 tujuan', '2015-05-20', '2015-05-21', '0000-00-00', '2015-05-21', '2015-05-22', '0000-00-00', '3', '1', NULL, 1),
(20, '013/SPPD/SATKER/LP/V/2015', '2015-05-11', '2015-05-12 01:25:53', '5', 0, '277', 3, 'testing dua untuk tiga tujuan perjalanan dinas', '2015-05-19', '2015-05-20', '2015-05-21', '2015-05-20', '2015-05-21', '2015-05-22', '2', '3', '7', 1),
(21, '014/SPPD/SATKER/LP/V/2015', '2015-05-18', '2015-05-19 00:17:35', '5', 0, '15', 2, 'Survei Lapangan Lokasi Penerapan Teknologi Pengalahan Air Minum', '2015-05-18', '2015-05-20', '0000-00-00', '2015-05-20', '2015-05-23', '0000-00-00', '2', '12', NULL, 0),
(22, '-', '0000-00-00', '2015-05-28 09:40:09', '1', 0, '7', 1, 'makan', '2015-05-28', '0000-00-00', '0000-00-00', '2015-05-30', '0000-00-00', '0000-00-00', '1', NULL, NULL, 1),
(24, '-', '0000-00-00', '2015-06-17 09:45:35', '0', 0, '7', 1, 'testing di jalan', '2015-06-25', '0000-00-00', '0000-00-00', '2015-06-27', '0000-00-00', '0000-00-00', '11', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'operator'),
(2, 'esselon 4'),
(3, 'esselon 3'),
(4, 'asisten satker'),
(5, 'ppk'),
(7, 'super admin'),
(8, 'publik');

-- --------------------------------------------------------

--
-- Table structure for table `temp_akun`
--

CREATE TABLE IF NOT EXISTS `temp_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `temp_akun`
--

INSERT INTO `temp_akun` (`id`, `kode_akun`, `jenis_belanja`) VALUES
(1, 45467, 'Pembelanjaan 1'),
(2, 45468, 'Pembelanjaan 2');

-- --------------------------------------------------------

--
-- Table structure for table `temp_anggaran`
--

CREATE TABLE IF NOT EXISTS `temp_anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kegiatan` varchar(25) NOT NULL,
  `kode_akun` varchar(50) NOT NULL,
  `pagu` int(15) NOT NULL,
  `tahun_anggaran` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `temp_anggaran`
--

INSERT INTO `temp_anggaran` (`id`, `kode_kegiatan`, `kode_akun`, `pagu`, `tahun_anggaran`) VALUES
(1, '1234.A.1', '45467', 1100000, 2015),
(2, '1234.A.2', '45467', 1200000, 2015),
(3, '1234.A.3', '45467', 1300000, 2015),
(4, '1234.A.1', '45468', 1100000, 2015),
(5, '1234.A.2', '45468', 1200000, 2015),
(6, '1234.A.3', '45468', 1300000, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `temp_kegiatan`
--

CREATE TABLE IF NOT EXISTS `temp_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(25) NOT NULL,
  `kode_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `koordinator` varchar(25) DEFAULT NULL,
  `penanggung_jawab` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temp_kegiatan`
--

INSERT INTO `temp_kegiatan` (`id`, `kode_unit`, `kode_kegiatan`, `nama_kegiatan`, `koordinator`, `penanggung_jawab`) VALUES
(1, 'BTU', '1234.A.1', 'Kegiatan 1', ' Arkadia Rhamo, ST.', ' Arip Pauzi Rachman, ST.'),
(2, 'BTU', '1234.A.2', 'Kegiatan 2', ' Anggi Wulandini, ST.', ' Ahmad Gojali'),
(3, 'BTU', '1234.A.3', 'Kegiatan 3', 'Bapak 3', 'Opik');

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
(10, 'SATKER', 'Satker', 72);

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


-- --------------------------------------------------------

--
-- Stand-in structure for view `view_realisasi_anggaran`
--
CREATE TABLE IF NOT EXISTS `view_realisasi_anggaran` (
`id_anggaran` varbinary(25)
,`nomor` varchar(50)
,`biaya` double
);
-- --------------------------------------------------------

--
-- Structure for view `view_realisasi_anggaran`
--
DROP TABLE IF EXISTS `view_realisasi_anggaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_realisasi_anggaran` AS select (select `pb`.`id_anggaran` AS `id_anggaran` from `pengajuan_barang` `pb` where (`pb`.`id` = `db`.`id_pengajuan_barang`)) AS `id_anggaran`,(select `pb`.`nomor_pengajuan` AS `nomor_pengajuan` from `pengajuan_barang` `pb` where (`pb`.`id` = `db`.`id_pengajuan_barang`)) AS `nomor`,sum(((select `b`.`pagu_harga` AS `pagu_harga` from `barang` `b` where (`b`.`id` = `db`.`id_barang`)) * `db`.`jumlah`)) AS `biaya` from `detail_pengajuan_barang` `db` group by (select `pb`.`id_anggaran` AS `id_anggaran` from `pengajuan_barang` `pb` where (`pb`.`id` = `db`.`id_pengajuan_barang`)) union select (select `pd`.`id_anggaran` AS `id_anggaran` from `perjalanan_dinas` `pd` where (`pd`.`id` = `dpd`.`id_header`)) AS `id_anggaran`,(select `pd`.`no_spt` AS `no_spt` from `perjalanan_dinas` `pd` where (`pd`.`id` = `dpd`.`id_header`)) AS `nomor`,sum(`dpd`.`biaya`) AS `biaya` from `detail_perjalanan_dinas` `dpd` group by (select `pd`.`id_anggaran` AS `id_anggaran` from `perjalanan_dinas` `pd` where (`pd`.`id` = `dpd`.`id_header`));
