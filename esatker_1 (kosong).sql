-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2015 at 12:11 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `esatker_1_kosong`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `akun`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `anggaran`
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
  `kode_jenis_barang` varchar(100) NOT NULL,
  `tipe_barang` varchar(25) DEFAULT NULL,
  `merek_barang` varchar(25) DEFAULT NULL,
  `spesifikasi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_akomodasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `biaya_diklat`
--

CREATE TABLE IF NOT EXISTS `biaya_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(25) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_diklat`
--


-- --------------------------------------------------------

--
-- Table structure for table `biaya_narasumber`
--

CREATE TABLE IF NOT EXISTS `biaya_narasumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_narasumber`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_penginapan`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_representatif`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biaya_tiket`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bukti_perjalanan_dinas`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `counter`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_panjar`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_pengadaan_barang`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_pengajuan_barang`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_pengajuan_honorarium`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_perjalanan_dinas`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kegiatan`
--


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `komentar`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kota_tujuan`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `narasumber`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `panjar`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pengadaan_barang`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pengajuan_barang`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pengajuan_honorarium`
--


-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_jasa`
--

CREATE TABLE IF NOT EXISTS `pengajuan_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengajuan_jasa` varchar(50) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_penolakan` int(11) DEFAULT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pengajuan_jasa`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(21, 7, 184, '', '', 'super admin', '0cc175b9c0f1b6a831c399e269772661', '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `perjalanan_dinas`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'operator'),
(2, 'esselon 4'),
(3, 'esselon 3'),
(4, 'asisten satker'),
(5, 'ppk'),
(7, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `temp_akun`
--

CREATE TABLE IF NOT EXISTS `temp_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` int(11) DEFAULT NULL,
  `jenis_belanja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_akun`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_anggaran`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_kegiatan`
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
