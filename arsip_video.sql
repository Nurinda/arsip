-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 01:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(24) DEFAULT NULL,
  `display_picture` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `fullname`, `display_picture`, `role`, `asal`) VALUES
(1, 'nurin', '2e667d81df0b4dc4b89312e740feced8', 'Nurinda Ramadhanty Maula', 'Nurinda Ramadhanty Maula', 'no.jpg', 'admin', NULL),
(8, 'windi', '4a7d1ed414474e4033ac29ccb8653d9b', 'Windi Putri', 'Windi Putri Nur Aini', 'no.jpg', 'contributo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_main`
--

CREATE TABLE `klasifikasi_main` (
  `No` int(11) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_main`
--

INSERT INTO `klasifikasi_main` (`No`, `klasifikasi`) VALUES
(0, 'UMUM'),
(100, 'PEMERINTAHAN'),
(300, 'KEAMANAN DAN KETERTIBAN UMUM'),
(400, 'KESEJAHTERAAN RAKYAT'),
(500, 'PEREKONOMIAN'),
(600, 'PEKERJAAN UMUM DAN KETENAGAAN'),
(700, 'PENGAWASAN'),
(800, 'KEPEGAWAIAN'),
(900, 'KEUANGAN'),
(200, 'POLITIK');

-- --------------------------------------------------------

--
-- Table structure for table `pencipta_arsip`
--

CREATE TABLE `pencipta_arsip` (
  `No` int(11) NOT NULL,
  `Nama Pencipta` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencipta_arsip`
--

INSERT INTO `pencipta_arsip` (`No`, `Nama Pencipta`, `id`) VALUES
(1, 'Arpusda', 1),
(2, 'DISKOMINFO', 2),
(3, 'BAPPEDA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_000`
--

CREATE TABLE `sub_000` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_000`
--

INSERT INTO `sub_000` (`No`, `Sub Main`) VALUES
(10, 'URUSAN DALAM'),
(20, 'BARANG DAN JASA'),
(30, 'KEKAYAAN DAERAH'),
(40, 'PERPUSTAKAAN/DOKUMEN/KEARSIPAN/SANDI'),
(50, 'PERENCANAAN DAN EVALUASI'),
(60, 'ORGANISASI/KETATALAKSANAAN'),
(70, 'PENELITIAN DAN PENGEMBANGAN'),
(80, 'KONPERENSI/RAPAT KOORDINASI'),
(90, 'PERJALANAN DINAS');

-- --------------------------------------------------------

--
-- Table structure for table `sub_100`
--

CREATE TABLE `sub_100` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_100`
--

INSERT INTO `sub_100` (`No`, `Sub Main`) VALUES
(110, 'PEMERINTAHAN PUSAT'),
(120, 'PEMERINTAHAN PROVINSI'),
(130, 'PEMERINTAHAN KABUPATEN/KOTA'),
(140, 'PEMERINTAHAN DESA/KELURAHAN'),
(150, 'LEGISLATIF MPR/DPR/DPD'),
(160, 'DPRD PROVINSI'),
(170, 'DPRD KABUPATEN/KOTA'),
(180, 'HUKUM'),
(190, 'HUBUNGAN LUAR NEGERI');

-- --------------------------------------------------------

--
-- Table structure for table `sub_200`
--

CREATE TABLE `sub_200` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_200`
--

INSERT INTO `sub_200` (`No`, `Sub Main`) VALUES
(210, 'KEPARTAIAN'),
(220, 'ORGANISASI KEMASYARAKATAN'),
(230, 'ORGANISASI PROFESI DAN FUNGSONAL'),
(240, 'ORGANISASI PEMUDA'),
(250, 'ORGANISASI BURUH, TANI, DAN NELAYAN'),
(260, 'ORGANISASI WANITA'),
(270, 'PEMILU, PILKADA'),
(280, 'PENGAWASAN PEMILU/PILKADA');

-- --------------------------------------------------------

--
-- Table structure for table `sub_300`
--

CREATE TABLE `sub_300` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_300`
--

INSERT INTO `sub_300` (`No`, `Sub Main`) VALUES
(310, 'PERTAHANAN'),
(320, 'KEMILITERAN/TNI'),
(330, 'KEAMANAN'),
(340, 'PERLINDUNGAN MASYARAKAT'),
(350, 'KEJAHATAN'),
(360, 'BENCANA'),
(370, 'KECELAKAAN'),
(380, 'PENDAMPINGAN. REHABILITASI DAN REKONSTRUKSI'),
(390, 'KERJASAMA BPBD DENGAN INSTANSI LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `sub_400`
--

CREATE TABLE `sub_400` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_400`
--

INSERT INTO `sub_400` (`No`, `Sub Main`) VALUES
(410, 'PEMBANGUNAN DESA/KELURAHAN'),
(420, 'PENDIDIKAN'),
(430, 'KEBUDAYAAN'),
(440, 'KESEHATAN'),
(450, 'AGAMA'),
(460, 'SOSIAL'),
(470, 'KEPENDUDUKAN DAN CATATAN SIPIL'),
(480, 'MEDIA MASSA');

-- --------------------------------------------------------

--
-- Table structure for table `sub_500`
--

CREATE TABLE `sub_500` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_500`
--

INSERT INTO `sub_500` (`No`, `Sub Main`) VALUES
(510, 'PERDAGANGAN'),
(520, 'PERTANIAN'),
(530, 'PERINDUSTRIAN'),
(540, 'ENERGI DAN SUMBER DAYA MINERAL'),
(550, 'PERHUBUNGAN'),
(560, 'TENAGA KERJA'),
(570, 'PENANAMAN MODAL'),
(580, 'PERBANKAN MONETER'),
(590, 'ARGRARIA');

-- --------------------------------------------------------

--
-- Table structure for table `sub_600`
--

CREATE TABLE `sub_600` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_600`
--

INSERT INTO `sub_600` (`No`, `Sub Main`) VALUES
(610, 'PENGAIRAN'),
(620, 'JALAN'),
(630, 'JEMBATAN'),
(640, 'BANGUNAN'),
(650, 'TATA RUANG KOTA'),
(660, ''),
(670, 'KETENAGAAN'),
(680, 'PERALATAN PEKERJAAN UMUM'),
(690, 'AIR MINUM');

-- --------------------------------------------------------

--
-- Table structure for table `sub_700`
--

CREATE TABLE `sub_700` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_700`
--

INSERT INTO `sub_700` (`No`, `Sub Main`) VALUES
(710, 'BIDANG PEMERINTAHAN'),
(720, 'BIDANG POLITIK'),
(730, 'BIDANG KEAMANAN/KETERTIBAN'),
(740, 'BIDANG KESEJAHTERAAN RAKYAT'),
(750, 'BIDANG PEREKONOMIAN'),
(760, 'BIDANG PEKERJAAN UMUM'),
(770, 'PENGAWASAN PEJABAT PUBLIK'),
(780, 'BIDANG KEPEGAWAIAN'),
(790, 'BIDANG KEUANGAN');

-- --------------------------------------------------------

--
-- Table structure for table `sub_800`
--

CREATE TABLE `sub_800` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_800`
--

INSERT INTO `sub_800` (`No`, `Sub Main`) VALUES
(810, 'PENGADAAN'),
(820, 'MUTASI'),
(830, 'KEDUDUKAN'),
(840, 'KESEJAHTERAAN PEGAWAI'),
(850, 'CUTI'),
(860, 'PENILAIAN'),
(870, 'TATA USAHA KEPEGAWAIAN'),
(880, 'PEMBERHENTIAN'),
(890, 'PENDIDIKAN PEGAWAI');

-- --------------------------------------------------------

--
-- Table structure for table `sub_900`
--

CREATE TABLE `sub_900` (
  `No` int(11) NOT NULL,
  `Sub Main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_900`
--

INSERT INTO `sub_900` (`No`, `Sub Main`) VALUES
(910, 'ANGGARAN'),
(920, 'AKUNTANSI'),
(930, 'PERBENDAHARAAN'),
(940, 'PEMBINAAN KEBENDAHARAAN'),
(950, 'PENGELOLAAN KAS DAERAH'),
(960, 'EVALUASI DAN PENGENDALIAN'),
(970, 'PENDAPATAN');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(1024) DEFAULT NULL,
  `produser` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `durasi_jam` int(11) DEFAULT NULL,
  `durasi_menit` int(11) DEFAULT NULL,
  `durasi_detik` int(11) DEFAULT NULL,
  `tipe_file` varchar(16) DEFAULT NULL,
  `lokasi_simpan` varchar(32) DEFAULT NULL,
  `tanggal_pembuatan` date DEFAULT NULL,
  `tanggal_masuk` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_account` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `id_pencipta_arsip` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `nomor_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `deskripsi`, `produser`, `copyright`, `tempat`, `durasi_jam`, `durasi_menit`, `durasi_detik`, `tipe_file`, `lokasi_simpan`, `tanggal_pembuatan`, `tanggal_masuk`, `id_account`, `status`, `id_pencipta_arsip`, `link`, `nomor_video`) VALUES
(1, 'Acara Datangnya Presiden ke Banyumanik', 'Kunjungan Kerja Gubernur Jateng DI Pembantu Gub wil Pati, Pekalongan, Kedu, Surakarta, Semarang', 'Bakohumas Setwida Jateng', 'Setwida Jateng', 'Banyumanik', 1, 30, 28, 'SHV', 'lemari', '2019-05-15', '2019-05-28 08:19:18', 1, 0, 1, 'www.yutub.com/nurin', 'SBR 23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pencipta_arsip`
-- (See below for the actual view)
--
CREATE TABLE `view_pencipta_arsip` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_video`
-- (See below for the actual view)
--
CREATE TABLE `view_video` (
);

-- --------------------------------------------------------

--
-- Table structure for table `webconf`
--

CREATE TABLE `webconf` (
  `id` int(1) NOT NULL,
  `login_image` varchar(255) DEFAULT NULL,
  `web_name` varchar(32) DEFAULT NULL,
  `client_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `webconf`
--

INSERT INTO `webconf` (`id`, `login_image`, `web_name`, `client_name`) VALUES
(1, 'default.jpg', 'SIKDJateng', 'Aplikasi Arsip Video');

-- --------------------------------------------------------

--
-- Structure for view `view_pencipta_arsip`
--
DROP TABLE IF EXISTS `view_pencipta_arsip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pencipta_arsip`  AS  select `a`.`id` AS `id`,`a`.`nama` AS `nama`,`a`.`keterangan` AS `keterangan`,`a`.`id_account` AS `id_account`,`b`.`fullname` AS `fullname` from (`pencipta_arsip` `a` join `account` `b`) where (`a`.`id_account` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_video`
--
DROP TABLE IF EXISTS `view_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_video`  AS  select `a`.`id` AS `id`,`a`.`judul` AS `judul`,`a`.`deskripsi` AS `deskripsi`,`a`.`produser` AS `produser`,`a`.`copyright` AS `copyright`,`a`.`tempat` AS `tempat`,`a`.`durasi_jam` AS `durasi_jam`,`a`.`durasi_menit` AS `durasi_menit`,`a`.`durasi_detik` AS `durasi_detik`,`a`.`tipe_file` AS `tipe_file`,`a`.`lokasi_simpan` AS `lokasi_simpan`,`a`.`tanggal_pembuatan` AS `tanggal_pembuatan`,`a`.`tanggal_masuk` AS `tanggal_masuk`,`a`.`id_account` AS `id_account`,`a`.`status` AS `status`,`a`.`id_pencipta_arsip` AS `id_pencipta_arsip`,`a`.`link` AS `link`,`b`.`nama` AS `nama`,`b`.`keterangan` AS `keterangan`,`c`.`fullname` AS `fullname` from ((`video` `a` join `pencipta_arsip` `b`) join `account` `c`) where ((`a`.`id_account` = `c`.`id`) and (`a`.`id_pencipta_arsip` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencipta_arsip`
--
ALTER TABLE `pencipta_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webconf`
--
ALTER TABLE `webconf`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
