-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 01:12 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sita_mb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota_tugas_akhir`
--

CREATE TABLE `tb_anggota_tugas_akhir` (
  `id_tugas_akhir` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `uraian_tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas_final`
--

CREATE TABLE `tb_berkas_final` (
  `id_mhs` int(11) NOT NULL,
  `file_judul` text NOT NULL,
  `file_pengesahan` text NOT NULL,
  `file_plagiarisme` text NOT NULL,
  `file_poster` text NOT NULL,
  `file_laporan_akhir` text NOT NULL,
  `file_dokumen_perancangan` text NOT NULL,
  `file_tkt` text NOT NULL,
  `file_katsinov` text NOT NULL,
  `link_produk` text NOT NULL,
  `data_sertifikasi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskusi_penguji`
--

CREATE TABLE `tb_diskusi_penguji` (
  `id_diskusi` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diskusi_penguji`
--

INSERT INTO `tb_diskusi_penguji` (`id_diskusi`, `id_jadwal`, `id_dosen`, `id_mhs`, `tanggal`) VALUES
(1, 4, 42, 144, '2023-12-10 22:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_isi_diskusi`
--

CREATE TABLE `tb_isi_diskusi` (
  `id_isi_diskusi` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_isi_diskusi`
--

INSERT INTO `tb_isi_diskusi` (`id_isi_diskusi`, `id_diskusi`, `id_dosen`, `id_mhs`, `isi`, `tanggal`) VALUES
(1, 1, 42, 0, 'masih ada salah', '2023-12-10 22:43:32'),
(2, 1, 0, 144, 'baik pak', '2023-12-10 22:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_sidang`
--

CREATE TABLE `tb_jadwal_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `periode_sidang` varchar(150) NOT NULL,
  `jenis_sidang` varchar(150) NOT NULL,
  `id_tugas_akhir` int(11) NOT NULL,
  `file_laporan` int(11) NOT NULL,
  `id_pra_sidang` int(11) NOT NULL,
  `file_prasidang` varchar(250) NOT NULL,
  `penguji_1` int(11) NOT NULL,
  `penguji_2` int(11) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `jam_sidang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_sidang`
--

INSERT INTO `tb_jadwal_sidang` (`id_jadwal`, `periode_sidang`, `jenis_sidang`, `id_tugas_akhir`, `file_laporan`, `id_pra_sidang`, `file_prasidang`, `penguji_1`, `penguji_2`, `tanggal_sidang`, `jam_sidang`) VALUES
(1, 'Maret 2022', 'Seminar Proposal', 480, 1, 0, '', 1, 7, '2022-04-11', '08.30 - Selesai'),
(3, 'April 2022', 'Sidang Akhir', 480, 2, 0, 'uploads/tugas_akhir/3411911053/480_file_pendukung_April2022_3411911053.pdf', 7, 1, '2022-04-12', '08.30 - Selesai'),
(4, 'Desember 2023 ', 'Seminar Proposal', 144, 9, 0, '', 27, 42, '2023-12-20', '09.00 - Selesai'),
(5, 'Desember 2023 Phase 2 ', 'Sidang Akhir', 144, 10, 0, 'uploads/tugas_akhir/3311811083/144_file_pendukung_Desember2023Phase2_3311811083.pdf', 0, 0, '1970-01-01', '08.30 - Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kompetensi`
--

CREATE TABLE `tb_kompetensi` (
  `id_kompetensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kompetensi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kompetensi`
--

INSERT INTO `tb_kompetensi` (`id_kompetensi`, `id_user`, `kompetensi`) VALUES
(1, 7, 'Network service'),
(2, 7, 'Internet of Things (IoT)'),
(3, 7, 'Embedded technology'),
(4, 7, 'Rekayasa/Pengembangan perangkat lunak'),
(5, 7, 'Image processing'),
(6, 30, 'Film Pendek'),
(7, 30, 'Multimedia content'),
(8, 30, 'Animasi 2D'),
(9, 30, 'Animasi 3D'),
(10, 6, 'Rekayasa/Pengembangan perangkat lunak'),
(11, 17, 'Film Pendek'),
(12, 17, 'Animasi 2D'),
(13, 11, 'Sistem Informasi Geografis (SIG)'),
(14, 17, 'Animasi 3D'),
(15, 17, 'Multimedia processing'),
(16, 17, 'Broadcasting'),
(17, 11, 'Penginderaan jauh'),
(18, 17, 'Multimedia content'),
(19, 11, 'Kartografi'),
(20, 17, 'Penelitian kuantitatif'),
(22, 17, 'Komunikasi visual'),
(23, 17, 'UI dan UX'),
(24, 17, 'Fotografi'),
(25, 17, 'Human Computer Interaction'),
(26, 17, 'Rekayasa/Pengembangan perangkat lunak'),
(27, 17, 'Image processing'),
(28, 17, 'Augmented Reality (AR)'),
(29, 17, 'Virtual Reality (VR)'),
(30, 17, 'Internet of Things (IoT)'),
(31, 17, 'Fotografi'),
(32, 38, 'Rekayasa/Pengembangan perangkat lunak'),
(33, 38, 'Data mining'),
(34, 38, 'Multimedia processing'),
(35, 38, 'Image processing'),
(36, 38, 'Multimedia content'),
(37, 38, 'Penelitian kuantitatif'),
(38, 38, 'Artificial intelligence'),
(39, 40, 'Network service'),
(40, 40, 'Network security'),
(46, 40, 'Multimedia content'),
(47, 40, 'Rekayasa/Pengembangan perangkat lunak'),
(48, 40, 'Internet of Things (IoT)'),
(49, 1, 'Network security'),
(50, 1, 'Rekayasa/Pengembangan perangkat lunak'),
(51, 24, 'Rekayasa/Pengembangan perangkat lunak'),
(52, 16, 'Fotografi'),
(53, 16, 'UI dan UX'),
(54, 16, 'Image processing'),
(55, 16, 'Multimedia content'),
(59, 21, 'Data mining'),
(60, 21, 'Network service'),
(61, 21, 'Network security'),
(62, 21, 'Internet of Things (IoT)'),
(63, 21, 'Fotogrametri'),
(64, 29, 'Game'),
(65, 29, 'Artificial intelligence'),
(66, 29, 'Animasi 3D'),
(67, 29, 'Image processing'),
(68, 29, 'Voice recognition'),
(69, 29, 'Augmented Reality (AR)'),
(70, 29, 'Virtual Reality (VR)'),
(71, 29, 'Fotogrametri'),
(72, 29, 'Penelitian kuantitatif'),
(73, 9, 'Game'),
(74, 9, 'Data mining'),
(75, 9, 'Image processing'),
(76, 9, 'Information retrieval'),
(77, 9, 'Artificial intelligence'),
(78, 9, 'Augmented Reality (AR)'),
(79, 9, 'Virtual Reality (VR)'),
(80, 9, 'Fotogrametri'),
(81, 9, 'Internet of Things (IoT)'),
(82, 34, 'Rekayasa/Pengembangan perangkat lunak'),
(83, 34, 'Survey terestris'),
(84, 34, 'Survey hidrografi'),
(85, 34, 'Penginderaan jauh'),
(86, 34, 'Kartografi'),
(87, 34, 'Sistem Informasi Geografis (SIG)'),
(88, 34, 'WebGIS'),
(89, 34, 'Oseanografi'),
(90, 34, 'Penelitian kuantitatif'),
(91, 27, 'Rekayasa/Pengembangan perangkat lunak'),
(92, 27, 'Data mining'),
(93, 41, 'Survey terestris'),
(94, 41, 'Penginderaan jauh'),
(95, 41, 'Kartografi'),
(96, 41, 'Sistem Informasi Geografis (SIG)'),
(97, 41, 'WebGIS'),
(98, 20, 'Sistem Informasi Geografis (SIG)'),
(99, 20, 'Penginderaan jauh'),
(100, 20, 'Kartografi'),
(101, 20, 'WebGIS'),
(102, 28, 'Rekayasa/Pengembangan perangkat lunak'),
(103, 28, 'Penelitian kuantitatif'),
(104, 28, 'Human Computer Interaction'),
(105, 28, 'UI dan UX'),
(106, 28, 'Information retrieval'),
(108, 28, 'Multimedia content'),
(109, 28, 'Multimedia processing'),
(110, 28, 'Komunikasi visual'),
(112, 23, 'Multimedia processing'),
(113, 23, 'Broadcasting'),
(114, 23, 'Image processing'),
(115, 23, 'Multimedia content'),
(116, 23, 'Artificial intelligence'),
(117, 23, 'Fotogrametri'),
(118, 23, 'Internet of Things (IoT)'),
(119, 23, 'Rekayasa/Pengembangan perangkat lunak'),
(120, 40, 'Fotogrametri'),
(121, 42, 'Survey terestris'),
(122, 42, 'Penginderaan jauh'),
(123, 42, 'Sistem Informasi Geografis (SIG)'),
(124, 25, 'Survey hidrografi'),
(125, 25, 'Oseanografi'),
(126, 25, 'Sistem Informasi Geografis (SIG)'),
(127, 25, 'Penginderaan jauh'),
(128, 19, 'Animasi 2D'),
(129, 19, 'Film Pendek'),
(130, 19, 'Animasi 3D'),
(131, 19, 'Multimedia content'),
(132, 19, 'Komunikasi visual'),
(133, 13, 'Linguistik'),
(134, 13, 'Komunikasi visual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan_ta`
--

CREATE TABLE `tb_laporan_ta` (
  `id_laporan` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `jenis_sidang` varchar(150) NOT NULL,
  `file_laporan` text NOT NULL,
  `file_magang` text NOT NULL,
  `status` enum('Diajukan','Diterima','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan_ta`
--

INSERT INTO `tb_laporan_ta` (`id_laporan`, `id_mhs`, `id_periode`, `jenis_sidang`, `file_laporan`, `file_magang`, `status`) VALUES
(1, 480, 9, 'Seminar Proposal', 'uploads/tugas_akhir/3411911053/480_laporan_9_20220411.pdf', '', 'Diterima'),
(2, 480, 10, 'Sidang Akhir', 'uploads/tugas_akhir/3411911053/480_laporan_10_20220411.pdf', '', 'Diterima'),
(9, 144, 11, 'Seminar Proposal', 'uploads/tugas_akhir/3311811083/144_laporan_11_20231205.pdf', '', 'Diterima'),
(10, 144, 13, 'Sidang Akhir', 'uploads/tugas_akhir/3311811083/144_laporan_13_20231220.pdf', '', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logbook_ta`
--

CREATE TABLE `tb_logbook_ta` (
  `id_logbook` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `kemajuan_ta` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_logbook_ta`
--

INSERT INTO `tb_logbook_ta` (`id_logbook`, `id_mhs`, `kemajuan_ta`, `kegiatan`, `tanggal`) VALUES
(1, 480, 10, 'Bimbingan bersama dosen pembimbing untuk membahas proposal yang akan diajukan sebagai tugas akhir nanti.', '2022-04-12'),
(2, 144, 1, 'Melakukan pencarian dan analisis terhadap artikel-artikel ilmiah terkait strategi pemasaran inovatif, Membuat kerangka kerja awal untuk struktur Tugas Akhir, Konsultasi dengan pembimbing mengenai penemuan literatur dan perencanaan penelitian.', '2023-12-03'),
(3, 144, 2, 'Merumuskan rumusan masalah dan tujuan penelitian berdasarkan tinjauan literatur.\r\nMeninjau metodologi penelitian yang relevan dan memilih pendekatan yang paling sesuai untuk penelitian ini.\r\nMemulai pengumpulan data sekunder yang dibutuhkan untuk mendukung ', '2023-12-10'),
(4, 144, 3, 'Melakukan analisis lebih lanjut terhadap literatur yang mendukung rumusan masalah.\r\nMerinci kerangka kerja penelitian dengan mempertimbangkan saran-saran pembimbing.\r\nMembahas perbaikan yang telah dilakukan pada rumusan masalah dan tujuan penelitian.\r\nMenerima saran lebih lanjut untuk meningkatkan ketepatan dan kedalaman rumusan masalah.', '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_pembimbing`
--

CREATE TABLE `tb_pengajuan_pembimbing` (
  `id_pengajuan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Disetujui','Ditolak','Diajukan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_sidang`
--

CREATE TABLE `tb_penilaian_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `sidang_ulang` enum('ya','tidak') NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `file_perbaikan` text NOT NULL,
  `status` enum('Disetujui Pembimbing','Ditolak Pembimbing','Belum Perbaikan','Diajukan','Disetujui Penguji','Ditolak Penguji') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_sidang_anggota`
--

CREATE TABLE `tb_penilaian_sidang_anggota` (
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `catatan_perbaikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_sidang_baru`
--

CREATE TABLE `tb_penilaian_sidang_baru` (
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `nilai_8` int(11) NOT NULL,
  `nilai_9` int(11) NOT NULL,
  `nilai_10` int(11) NOT NULL,
  `nilai_11` int(11) NOT NULL,
  `nilai_12` int(11) NOT NULL,
  `nilai_13` int(11) NOT NULL,
  `nilai_14` int(11) NOT NULL,
  `nilai_15` int(11) NOT NULL,
  `sidang_ulang` enum('ya','tidak') NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `file_perbaikan` text NOT NULL,
  `status` enum('Disetujui Pembimbing','Ditolak Pembimbing','Belum Perbaikan','Diajukan','Disetujui Penguji','Ditolak Penguji') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian_sidang_baru`
--

INSERT INTO `tb_penilaian_sidang_baru` (`id_jadwal`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_9`, `nilai_10`, `nilai_11`, `nilai_12`, `nilai_13`, `nilai_14`, `nilai_15`, `sidang_ulang`, `catatan_perbaikan`, `file_perbaikan`, `status`) VALUES
(1, 2, 70, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 0, 'tidak', 'ujicoba update', 'uploads/tugas_akhir/3411911053/480_laporan_perbaikan_1.pdf', 'Disetujui Pembimbing'),
(1, 7, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 0, 'tidak', 'ujicoba update penguji 2', 'uploads/tugas_akhir/3411911053/480_laporan_perbaikan_1.pdf', 'Disetujui Pembimbing'),
(3, 1, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 'tidak', '<p>Tes nilai sidang akhir update</p>', '-', 'Disetujui Pembimbing'),
(3, 7, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 'tidak', '<p>Tes nilai sidang akhir penguji 2</p>', '-', 'Disetujui Pembimbing'),
(4, 27, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 0, 'tidak', '', 'uploads/tugas_akhir/3311811083/144_laporan_perbaikan_4.pdf', 'Disetujui Penguji'),
(4, 42, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 0, 0, 0, 'tidak', '', 'uploads/tugas_akhir/3311811083/144_laporan_perbaikan_4.pdf', 'Disetujui Penguji');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_ta1`
--

CREATE TABLE `tb_penilaian_ta1` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `nilai_8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_ta1_baru`
--

CREATE TABLE `tb_penilaian_ta1_baru` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `nilai_8` int(11) NOT NULL,
  `nilai_9` int(11) NOT NULL,
  `nilai_10` int(11) NOT NULL,
  `nilai_11` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_ta2`
--

CREATE TABLE `tb_penilaian_ta2` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `nilai_8` int(11) NOT NULL,
  `nilai_9` int(11) NOT NULL,
  `nilai_10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_ta2_baru`
--

CREATE TABLE `tb_penilaian_ta2_baru` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `nilai_5` int(11) NOT NULL,
  `nilai_6` int(11) NOT NULL,
  `nilai_7` int(11) NOT NULL,
  `nilai_8` int(11) NOT NULL,
  `nilai_9` int(11) NOT NULL,
  `nilai_10` int(11) NOT NULL,
  `nilai_11` int(11) NOT NULL,
  `nilai_12` int(11) NOT NULL,
  `nilai_13` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian_ta2_baru`
--

INSERT INTO `tb_penilaian_ta2_baru` (`id_mhs`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_9`, `nilai_10`, `nilai_11`, `nilai_12`, `nilai_13`) VALUES
(480, 1, 100, 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode_ta`
--

CREATE TABLE `tb_periode_ta` (
  `id_periode` int(11) NOT NULL,
  `periode_sidang` varchar(50) NOT NULL,
  `buka_sidang` date NOT NULL,
  `tutup_sidang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_periode_ta`
--

INSERT INTO `tb_periode_ta` (`id_periode`, `periode_sidang`, `buka_sidang`, `tutup_sidang`) VALUES
(9, 'Maret 2022', '2022-03-01', '2022-03-16'),
(10, 'April 2022', '2022-04-01', '2022-04-16'),
(13, 'Desember 2023 Phase 1', '2023-12-01', '2023-12-15'),
(16, 'Desember 2023 Phase 2 ', '2023-12-15', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pra_sidang`
--

CREATE TABLE `tb_pra_sidang` (
  `id_pra_sidang` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `draft_dokumen` varchar(250) NOT NULL,
  `catatan_dokumen` text NOT NULL,
  `demo_aplikasi` varchar(250) NOT NULL,
  `catatan_aplikasi` text NOT NULL,
  `tgl_pra_sidang` date NOT NULL,
  `status` enum('Diajukan','Disetujui','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pra_sidang`
--

INSERT INTO `tb_pra_sidang` (`id_pra_sidang`, `id_mhs`, `id_periode`, `draft_dokumen`, `catatan_dokumen`, `demo_aplikasi`, `catatan_aplikasi`, `tgl_pra_sidang`, `status`) VALUES
(6, 480, 7, 'uploads/tugas_akhir/3411911053/480_draft_laporan_7_.pdf ', 'OK', 'https://www.youtube.com/watch?v=AGrLxdeTJKY', 'OK', '2021-07-15', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_prodi` varchar(150) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_qr_sign`
--

CREATE TABLE `tb_qr_sign` (
  `id_sign` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_mhs` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qr_sign`
--

INSERT INTO `tb_qr_sign` (`id_sign`, `id_user`, `id_user_mhs`, `perihal`, `tanggal`) VALUES
(1, 1, 480, 'Laporan TA Disetujui', '2021-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_set_input_nilai`
--

CREATE TABLE `tb_set_input_nilai` (
  `id_mhs` int(11) NOT NULL,
  `status` enum('Sudah','Belum') NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_set_input_nilai`
--

INSERT INTO `tb_set_input_nilai` (`id_mhs`, `status`, `tanggal`) VALUES
(480, 'Sudah', '2022-01-11 12:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas_akhir`
--

CREATE TABLE `tb_tugas_akhir` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `judul_inggris` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tugas_akhir`
--

INSERT INTO `tb_tugas_akhir` (`id_mhs`, `id_dosen`, `judul`, `judul_inggris`, `deskripsi`, `status`) VALUES
(1, 12, 'IMPLEMENTASI GERAKAN KARAKTER ANIMASI 2D MENGGUNAKAN METODE POSE TO POSE SEBAGAI MEDIA BERITA OWNTALK.CO.ID TENTANG TRANSISI PT ADHYA TIRTA BATAM  KE PT MOYA INDONESIA', '-', 'Penelitian ini bertujuan untuk membuat suatu media berita pada owntalk.co.id mengenai transisi peralihan air dari PT Adhya Tirta Batam ke PT Moya Indonesia dalam bentuk video animasi 2D menggunakan metode pose to pose sebagai cara baru dalam menyampaikan informasi berita kepada masyarakat.\r\nowntalk.co.id yang memposisikan diri sebagai media berita ingin menyajikan informasi secara akurat dan mudah dipahami oleh semua kalangan pembaca dan mencoba menjadi Kanal Berita online yang kreatif serta inovatif.\r\nDengan banyaknya pemberitaan BP Batam tentang transisi pengolahan air bersih di kota Batam dari PT Adhya Tirta Batam ke PT Moya Indonesia dari berbagai website berita lain yang membuat masyarakat kebingungan, oleh karena itu Owntalk.co.id berinisiatif  untuk membuat media berita terkait berita tersebut lewat animasi 2D, sehingga membuat masyarakat memahami permasalahan pada pemberitaan tersebut dengan mudah.', 'Proposal'),
(2, 9, '-', '-', '-', 'Proposal'),
(3, 30, 'Analisa User Experience Pada TFME Interactive Learning Media Menggunakan User Experience Questionnaire', '-', 'TFME Interactive Learning Media adalah salah satu produk multimedia interaktif yang berbasis website yang dibuat agar memudahkan para mahasiswa dalam memahami proses-proses pada setiap mesin yang ada di IC packaging, PCB manufacturing, dan PCB assembly. Suatu produk dikatakan berhasil jika dapat memenuhi kebutuhan pengguna yang akan menimbulkan kepuasan saat menggunakan produk tersebut. Agar produk yang dihasilkan sesuai dengan standard, maka diperlukan evaluasi untuk menilai kualitas suatu produk. Salah satu evaluasi yang diperlukan adalah evaluasi terkait user experience. Metode user experience questionnaire merupakan metode yang dapat membantu penilaian kualitas pengalaman pengguna secara subjektif yang mudah untuk dipraktikan, terpercaya, dan valid.', 'TA 1'),
(4, 12, 'MOTION GRAPHIC SEBAGAI MEDIA SOSIALISASI TENTANG  PUBLIC RELATION UNTUK KARYAWAN OWNTALK.CO.ID', '-', 'Owntalk.co.id merupakan sebuah situs media berita online yang berdiri pada tanggal 19 Agustus 2019. Sebagai perusahaan baru yang menginjak usia 1 tahun, owntalk awalnya hanya memiliki divisi marketing yang bertujuan untuk mendapatkan value berupa hasil yang berhubungan dengan keuangan (finansial). Namun saat ini owntalk membutuhkan divisi public relation yang berfungsi untuk meningkatkan citra perusahaan. Penelitian ini bertujuan untuk mensosialisasikan Public Relation melalui pembuatan motion graphic yang unik dan mudah dipahami oleh karyawan perusahaan owntalk.co.id. Manfaat dari sosialisasi public relation menggunakan motion graphic ini adalah terciptanya pemahaman tentang public relation sehingga, selanjutnya karyawan dapat menerapkan kegiatan public relation dengan sesuai peran dan fungsinya. ', 'Proposal'),
(5, 17, 'Implementasi dan Analisis Motion Graphic Pada Media Pembelajaran Desain Grafis Terhadap Minat Belajar Mahasiswa', '-', 'Media Pembelajaran mempunyai peran yang tidak bisa dipisahkan dari dunia pendidikan dalam membantu proses pembelajaran. Media pembelajaran saat ini banyak di kembangkan yaitu audio visual, salah satunya yaitu motion graphic. Motion graphic dapat dijadikan media pembelajaran sebagai salah satu alternatif pembelajaran yang dilakukan selama masa pandemic covid-19. Motion graphic mempunyai kesan yang menarik perhatian dan tidak membosankan sehingga dapat meningkatkan minat belajar', 'Proposal'),
(6, 30, '-', '-', '-', 'Proposal'),
(7, 5, '-', '-', '-', 'Proposal'),
(8, 17, 'Implementasi Dan Analisis Motion Graphic Pada Media Promosi Virtual Conference ICAE & ICAESS 2020 Terhadap Minat Keikutsertaan Partisipan', '-', 'Perkembangan teknologi informasi pada era modern membuat industri atau instansi membutuhkan media promosi sebagai salah satu cara untuk menarik konsumen, mempromosikan produk, dan jasa.  Salah satu media promosi yang cocok digunakan sebagai media promosi adalah motion graphic. Untuk itu, pada Tugas Akhir ini akan mengimplementasikan motion graphic pada media promosi virtual conference ICAE & ICAESS 2020 dan mengetahui minat keikutsertaan partisipan terhadap motion graphic pada media promosi virtual conference ICAE & ICAESS 2020. Dalam tugas akhir ini metode yang digunakan dalam proses analisis motion graphic ini adalah dengan metode kuantitatif dengan menggunakan EPIC Model. Model pengembangan multimedia yang digunakan pada penilitian ini adalah model pengembangan Villamilâ€“Molina. Responden dalam penelitian ini yaitu partisipan konferensi ICAE & ICAESS 2020. Hasil Tugas Akhir ini nantinya adalah motion graphic sebagai media promosi virtual conference ICAE & ICAESS 2020 dan analisis minat keikutsertaan partisipan virtual conference ICAE & ICAESS 2020 berdasarkan motion graphic yang telah dibuat.', 'Proposal'),
(9, 29, 'Pengukuran User Experience Pada Game Indonesian Heritage Samaratungga Adventure Menggunakan Metode Cognitive Walkthrough ', '-', 'Game Indonesian heritage samaratungga adventure merupakan game 3D yang berbasis petualangan, yang berlatarbelakang 2 kerajaan, yaitu kerajaan kalingga, dan kerajaan salakanegara. Game Petualangan  ini bertujuan selain untuk hiburan tetapi juga mengetahui sejarah yang ada di Indonesia , Penelitian ini bertujuan untuk mengetahui seberapa bagus user experience pada produk game Indonesian heritage dengan menggunakan metode Cognitive Walkthrough. Dengan metode Cognitive Walkthrough Pengguna akan mencoba melakukan tugas dengan teknik Trial and Error yang menggambarkan simulasi proses kognitif pengguna saat melaksanakan tugas tertentu dengan menilai apakah pengetahuan pengguna sesuai dengan petunjuk terkait penggunaan sistem yang mengarah pada tindakan dan tujuan yang benar. sehingga produk game Indonesian heritage samaratungga adventure bisa mendapatkan rekomendasi perbaikan dan ditingkatkan user experiencenya sampai ke level dimana layak menjadi produk yang disenangi oleh pengguna.', 'Proposal'),
(10, 7, '-', '-', '-', 'Proposal'),
(11, 26, '-', '-', '-', 'Proposal'),
(12, 5, '-', '-', '-', 'Proposal'),
(13, 29, 'ANALISIS USER EXPERIENCE PADA GAME EDUKASI 2D â€œDEVâ€™S ADVENTUREâ€ MENGGUNAKAN METODE GAME EXPERIENCE QUESTIONNAIRE (GEQ)', '-', 'Menganalisis User Experience pada game edukasi 2D \"Dev\'s Adventure\"  untuk mengetahui tingkat keberhasilan dari game edukasi 2D Devâ€™s Adventure yang nantinya akan dijadikan acuan untuk mengembangkan game edukasi 2D Devâ€™s Adventure agar dapat meningkatkan kualitas yang lebih baik dari sebelumnya dengan menggunakkan metode Game Experience Questionnaire (GEQ).', 'Proposal'),
(14, 29, 'ANALISIS USER SATISFATION PADA GAME DEVâ€™S ADVENTURE MENGGUNAKAN METODE GAME USER EXPERIENCE SATISFACTION SCALE (GUESS)', '-', 'Menganalisis User Satisfaction pada game 2D \"Dev\'s Adventure\"  untuk mengetahui seberapa puas user saat memainkan game Devâ€™s Adventure ini, hasil penelitian akan dijadikan acuan untuk  mengembangkan dan meningkatkan user satisfaction dari game Dev\'s Adventure dengan menggunakkan metode Game User Experience Satisfaction Scale (GUESS).', 'Proposal'),
(15, 15, '-', '-', '-', 'Proposal'),
(16, 29, '-', '-', '-', 'Proposal'),
(17, 16, '-', '-', '-', 'Proposal'),
(18, 30, '-', '-', '-', 'Proposal'),
(19, 17, 'PENERAPAN TEKNIK MIXING REAL VIDEO DENGAN MOTION GRAPHIC PADA TAHAP PASCA PRODUKSI VIDEO PEMBELAJARAN MATA KULIAH DESAIN GRAFIS TEKNIK ANIMASI', '-', 'PENELITIAN INI BERTUJUAN UNTUK MENGETAHUI BAGAIMANA  CARA  MENERAPKAN TEKNIK MIXING REAL VIDEO DENGAN MOTION GRAPHIC PADA TAHAP PASCA PRODUKSI TERHADAP VIDEO PEMBELAJARAN MATA KULIAH DESAIN GRAFIS DI TEKNIK ANIMASI SERTA ANALISIS TERHADAP PENERAPAN TEKNIK YANG DIGUNAKAN PADA VIDEO PEMBELAJARAN TERSEBUT', 'Proposal'),
(20, 29, 'ANALISIS USABILITY APLIKASI AUGMENTED REALITY PROCEDURE MESIN WAFER MOUNTING DI TEACHING FACTORY MANUFACTURE OF ELECTRONICS (TFME) POLITEKNIK NEGERI BATAM', '-', 'Menurut penulis metode usability aplikasi AR yang akan penulis kembangkan menggunakan metode usability dan observasi melalui kuisioner seperti yang digunakan paper travis. Untuk metode observasi menggunakan Use Questionere berbasis ISO yang disebut USE questionnaire. Menurut standar internasional ISO, usability memiliki tiga aspek yaitu efisiensi, efektivitas, dan kepuasan. Ketiga aspek tersebut memiliki korelasi yang saling mempengaruhi antara parameter Usefulness dan Ease of Use pada metode USE questionnaire. (Aelani & , 2012). Oleh karena itu, penulis membuat suatu penelitian yaitu â€œAnalisis Usability Aplikasi AR Procedure Mesin Wafer Mounting Di Teaching Factory Manufacture Of Electronics (TFME) Politeknik Negeri Batamâ€.\r\n', 'Proposal'),
(21, 29, 'ANALISIS USER INTERFACE GAME 2D DEVâ€™S ADVENTURE MENGGUNAKAN METODE QUALITY IN USE INTEGRATED MEASUREMENT (QUIM)', '-', 'Pengukuran user interface pada game Devâ€™s Adventure bertujuan untuk mengetahui tingkat fungsionalitas dan interaksi pengguna dengan game yang mana hasil dari pengukuran tersebut bisa dijadikan acuan dalam perbaikan dan pengembangan game Devâ€™s Adventure kedepannya terkhusus pada bagian user interface. Dari hal tersebutlah penulis mengangkat penelitian tentang â€œAnalisis User interface Game Devâ€™s Adventure Menggunakan Metode Quality in Use Intergrated Measurement (QUIM)â€.', 'Proposal'),
(22, 17, 'Implementasi Dan Analisis Media Promosi Digital Virtual Conference ICAE & ICAESS 2020 Terhadap Minat Keikutsertaan Partisipan (Studi Kasus: E-Poster dan Website)', '-', 'Era industri 4.0 perkembangan media berbasis teknologi semakin nyata, tidak heran hampir semua bentuk aktivitas dilakukan secara digital termasuk dalam hal mempromosikan sebuah event atau bisnis untuk menarik minat partisipan atau konsumen. Media promosi digital yang biasa digunakan untuk mempromosikan sebuah event atau bisnis adalah e-poster dan website. Untuk itu, pada Tugas Akhir ini akan dilakukan penelitian yang bertujuan untuk mengimplementasi e-poster dan website pada media promosi digital virtual conference ICAE & ICAESS 2020 dan mengetahui minat keikutsertaan partisipan terhadap e-poster dan website. Metode penelitian ini menggunakan metode kuantitatif berdasarkan AIDA Model dengan instrumen pengumpulan data berupa kuesioner online. Model pengembangan eposter yang digunakan pada penelitian ini adalah model pengembangan Borg and Gall, sedangkan website tidak dilakukan pengembangan karena sudah dilakukan terlebih dahulu oleh pakarnya. Responden dalam penelitian ini yaitu partisipan konferensi ICAE & ICAESS 2020. Hasil Tugas Akhir ini nantinya adalah e-poster sebagai media promosi digital virtual conference ICAE & ICAESS 2020 dan analisis minat keikutsertaan partisipan virtual conference ICAE & ICAESS 2020 berdasarkan e-poster dan website.', 'Proposal'),
(23, 12, 'IMPLEMENTASI 3D VIRTUAL TOUR SEBAGAI DIGITAL CUSTOMER EXPERIENCE DI PLANT ELECTROMECHANIC PT. SCHNEIDER  ELECTRIC MANUFACTURING BATAM', '-', 'Hadirnya industri 4.0 saat ini menjadi sesuatu yang tidak dapat dihindari dan membuat kehidupan semakin terhubung dengan dunia digital. PT. Schneider Electric Manufacturing Batam yang merupakan salah satu industri yang bergerak pada bidang manajemen energi dan otomasi ditunjuk sebagai Lighthouse dalam implementasi pemerintah dalam Making Indonesia 4.0 dan Advanced 4IR oleh World Economic Forum. Berperan sebagai pionir memiliki daya tarik tersendiri bagi banyak orang dan membuat banyaknya customer yang ingin melihat PT. Schneider Electric Manufacturing Batam. Oleh karena itu, PT. Schneider Electric Manufacturing Batam menyelenggarakan tour untuk customer yang berkunjung secara langsung. Namun pada tahun 2020,  COVID-19 telah menjangkit banyak orang di berbagai belahan dunia. Fenomena ini mengakibatkan banyak tempat yang biasanya ramai dengan terpaksa harus ditutup. Oleh karena itu, semua kegiatan harus dilaksanakan dari rumah dan dialihkan pelaksanaannya secara daring. PT. Schneider Electric Manufacturing Batam mengubah cara customer untuk berkunjung dengan cara digital dengan menggunakan virtual tour dengan berbagai pendekatan, salah satunya yaitu 3D Virtual Tour. 3D Virtual Tour dikembangkan dengan menggunakan metode ADDIE dalam pembuatan produknya dan dianalisis dengan pengujian melalui digital customer experience dalam virtual tour di Plant Electromechanic (PEM).', 'TA 1'),
(24, 29, 'Analisis Usability Pada Interface Game VR Archery Menggunakan Metode Usability Testing', '-', 'Penelitian ini ditujukan untuk mengembangkan game VR Archery yang masih terbilang terlalu muda untuk terjun ke dunia pasar. Maka dari itu pengembangan pada game ini sangatlah penting. Khususnya pengembangan pada aspek interface yang dimana user akan melakukan banyak interaksi dengan sistem game melalui aspek tersebut. Ada banyak cara dan metode untuk melakukan pengembangan pada interface, salah satu dan yang peneliti pilih ialah metode Usability Testing.', 'Proposal'),
(25, 12, 'MOTION GRAPHIC WRITING SUMMARY UNTUK PROGRAM STUDI ANIMASI POLITEKNIK NEGERI BATAM', '-', 'Meningkatnya peran Bahasa Inggris di era globalisasi ini memaksa\r\nkita untuk mengakui bahwa Bahasa Inggris mempunyai pengaruh besar di\r\nsegala aspek kehidupan sehingga mempelajari Bahasa Inggris merupakan hal\r\nyang penting. Mengingat bahwa penguasaan bahasa asing terutama Bahasa\r\nInggris sangatlah penting di semua aspek kehidupan terlebih lagi dalam dunia\r\npendidikan, maka dalam pelaksanaannya pendidikan di isi dengan kegiatan\r\nyang disebut pembelajaran yaitu kompetensi-kompetensi yang akan diberikan\r\ndan dibagi dalam beberapa subyek pelajaran dan salah satunya ialah Bahasa\r\nInggris. Dalam mempelajari sebuah bahasa seperti bahasa Inggris, menulis\r\n(writing) merupakan skill yang dianggap paling sulit untuk dipelajari. Dalam\r\nrangka membantu mahasiswa dalam mempelajari Bahasa Inggris khususnya\r\ntopik writing summary, maka penulis ingin membuat sebuah media\r\npembelajaran sesuai dari data yang sebelumnya telah diriset dengan pembuatan\r\nmedia pembelajaran berupa video motion graphic untuk mengatasi kesulitan\r\nmenguasai tentang topik writing summary dengan menggunakan metode\r\nVillamil-Molina yang terdiri dari tahapan development, preproduction,\r\nproduction, postproduction, dan delivery, yang kemudian akan dilakukan\r\npengujian alpha dan beta serta dilakukan analisis untuk kelayakan produk\r\nmenggunakan parameter skala likert apakah video motion graphic ini layak\r\nuntuk dijadikan media pembelajaran bagi mahasiswa Politeknik Negeri Batam.', 'Proposal'),
(26, 29, '-', '-', '-', 'Proposal'),
(27, 29, 'ANALISIS USER EXPERIENCE PADA GAME MOBILE LEAGUE OF LEGENDS WILD RIFT MENGGUNAKAN METODE COGNITIVE WALKTHROUGH', '-', '-', 'Proposal'),
(28, 16, '-', '-', '-', 'Proposal'),
(29, 5, '-', '-', '-', 'Proposal'),
(30, 40, '-', '-', '-', 'Proposal'),
(31, 22, 'WEBSITE OPEN DATA DINAS KOMUNIKASI DAN INFORMATIKA PEMERINTAH KOTA BATAM', '-', 'Website portal data yang dibangun untuk menampung seluruh data pemerintahan di Kota Batam menggunakan database NoSQL', 'TA 1'),
(32, 38, 'Rancang Bangun Aplikasi Edukasi E-Registration dan Pelaporan SPT Tahunan PPh Badan', '-', 'Membangun aplikasi perpajakan dimana aplikasi ini terdapat e-registration dan pelaporan SPT Badan tahunan sebagai sarana edukasi bagi masyarakat  tentang bagaimana melakukan pendaftaran dan pelaporan SPT Badan tahunan yang biasanya ada pada aplikasi Direktorat Jenderal Pajak (DJP) Online resmi. Diharapkan aplikasi ini dapat digunakan masyarakat sebagai tahap awal sebelum menggunakan aplikasi perpajakan resmi dan dapat meminimalisir kesalahan saat melakukan pendaftaran dan pelaporan SPT di aplikasi resmi melalui aplikasi e-registration dan pelaporan SPT Badan tahunan', 'TA 1'),
(33, 7, 'Pembangunan UI platform ekosistem industri 4.0', '-', 'Website untuk menggabungkan seluruh industri 4.0 yg ada di Indonesia', 'Proposal'),
(34, 24, 'RANCANG BANGUN APLIKASI EDUKASI PELAPORAN SPT TAHUNAN PPH ORANG PRIBADI ', '-', 'Aplikasi Edukasi untuk Pelaporan SPT Tahunan PPH Tahunan Orang Pribadi dengan menerapkan alur yang sama dengan Aplikasi Resmi Pelaporan Pajak. Pembangunan aplikasi ini menggunakan metode waterfall. Aplikasi ini akan digunakan sebagai media edukasi ke masyarakat mengenai pelaporan pajak penghasilan orang pribadi melalui mahasiswa relawan pajak dibawah naungan Tax Center Polibatam. Diharapkan pengguna dapat mengetahui alur dari pelaporan SPT pajak tahunan untuk meminimalisir kesalahan dalam penginputan data-data penting saat pelaporan pajak', 'TA 1'),
(35, 6, 'Rancang Bangun Perangkat Lunak Lembaga Sertifikasi Profesi (LSP) Politeknik Negeri Batam Berbasis Web Untuk Asesi Studi Kasus : LSP Polibatam', '-', 'Untuk membantu mengatasi permasalahan di LSP Polibatam, dibutuhkan sebuah aplikasi untuk mengelola data di LSP Polibatam. Selain dapat mengurangi penggunaan kertas, tinta, dana, dan SDM di LSP Polibatam, aplikasi ini dapat membantu LSP Polibatam dalam pengelolaan data karena menggunakan basis data. Maka pada Tugas Akhir ini diangkatlah judul â€œRancang Bangun Perangkat Lunak Lembaga Sertifikasi Profesi (LSP) Politeknik Negeri Batam Berbasis Web Untuk Asesiâ€.', 'TA 1'),
(36, 24, 'Sistem Survei Kepuasan Masyarakat Untuk  Seluruh Website OPD dan Layanan  Kota Batam', '-', 'Kualitas pelayanan publik merupakan hal mendasar bagi Organisasi Perangkat Daerah (OPD) dan Layanan Kota Batam. Salah satu variable yang dapat dipakai sebagai acuan kualitas layanan yaitu dengan mengukur kemampuan OPD untuk memenuhi harapan masyarakat. Tujuan dari sistem ini dapat mengetahui tingkat kepuasan suatu pelayanan dan identitas dari seluruh responden yang pernah mendapatkan pelayanan dan mengisi survei terkait. Sedangkan pembuatan sistem ini menggunakan metode Waterfall yang terdiri dari requirement (analisis kebutuhan), system and software design (perancangan desain sistem dan software), implementation (implementasi), verification (pengujian), dan maintenance (pemeliharaan). Sistem ini dibangun dengan menggunakan framework CodeIgniter versi 4. Selain itu, dalam pengerjaannya menggunakan aplikasi Visual Studio Code dan beberapa tool pendukung lainnya. Semua tool yang digunakan bersifat open source yang dapat diakses oleh semua orang. Hasil dari penelitian ini adalah dapat menjadi tolak ukur kualitas pelayanan di seluruh OPD dan Layanan Kota Batam. Diharapkan apliaksi ini dapat menjawab keresahan masyarakat terhadap pelayanan yang disediakan oleh pelayanan publik. ', 'TA 1'),
(37, 7, 'Rancang Bangun Perangkat Lunak  Sistem Managemen Iuran Perumahan Berbasis Web', '-', '-', 'Proposal'),
(38, 27, 'APLIKASI DASHBOARD DATA REDUCE DROP OUT COMPONENT MESIN FUJI NXT DI PT. FLEXTRONICS TECHNOLOGY INDONESIA', '-', 'Dalam studi kasus pada line produksi SMT ( Surface Mount Technology ) ditemukan komponen papan pcb yang tidak terpasang atau keluar untuk mengontrol jumlah komponen terpasang di setiap project. Pada penilitian ini masalah dapat diselesaikan dengan cara membangun dan meracangan aplikasi dashboard yang bertujuan untuk memantau proses produksi yang dapat menghasilkan grafik untuk mengetahui persentase naik dan turun nya jumlah komponen yang terpasang dan keluar dari proses pick & place yang dihasilkan dalam jangka waktu per hari. Aplikasi dashboard  ini berisi tabel, grafik batang dan grafik diagram. Data yang dikumpulkan secara real-time dan memiliki deadline di setiap project. Dengan aplikasi ini diharapkan pengguna mendapatkan informasi yang disajikan secara spesifik dan tingkat keakuratan yang dalam khususnya di PT. Flextronics Technology Indonesia.', 'Proposal'),
(39, 39, 'RANCANG BANGUN SISTEM MONITORING STAF DAN MANAJEMEN PROYEK BERBASIS WEB MENGGUNAKAN CODEIGNITER PADA PERUSAHAAN XYZ', '-', 'dengan adanya wabah covid-19 yang penyebarannya sangat cepat melalui interaksi orang atau benda, mengakibatkan perusahaan harus menerapkan sistem WFH untuk para stafnya. Untuk memastikan para staf perusahaan bekerja produktif, perusahaan XYZ melakukan monitoring kepada setiap stafnya. Selain itu dengan diterapkan nya sistem WFH dapat menghambat pengerjaan proyek karna staf tidak dapat tatap muka dengan staf lain untuk menyelesaikan proyek tersebut. maka dari itu dirancanglah aplikasi untuk memonitoring staf dengan dilengkapi fitur timer. Aplikasi ini juga memantau perkembangan proyek dengan fitur mulai dari menambahkan siapa saja pihak yang terlibat, merancang rencana kerja, menetapkan target, hingga grafik presentase untuk memantau perkembangan proyek. ', 'Proposal'),
(40, 22, 'APLIKASI E-OFFICE BERBASIS WEB MENGGUNAKAN CODEIGNITER (STUDI KASUS : KEJAKSAAN NEGERI KARIMUN)', '-', 'masalah yang dimiliki oleh Kejaksaan Negeri Karimun terdapat pada sub bagian pembinaan, Yang dimana sub bagian pembinaan merupakan urusan tata usaha dan kepegawaian yang mempunyai tugas melakukan urusan ketatausahaan kepegawaian, peningkatan integritas dan kepribadian serta kesejahteraan pegawai. Dimana dalam data informasi pengawai dan proses mengelola persuratan pada urusan tata usaha dan kepegawaian di Kejaksaan Negeri Karimun masih menggunakan cara manual  dengan  menggunakan  kertas dan buku untuk sistem  pencatatannya , hal tersebut dirasa sangat menyulitkan  jika ingin melihat  atau  mencari  data informasi pengawai dan surat masuk atau surat keluar karena harus dicari secara manual  dan itu lumayan memakan  waktu yang banyak.(Nomor Per-006/A/JA/07/2017) .', 'Proposal'),
(41, 6, '-', '-', '-', 'Proposal'),
(42, 38, 'Rancang Bangun aplikasi inventaris dan status barang di PT PNBC Indonesia bagian Production Transfer', '-', 'Pada zaman yang semangkin berkembang pada saat ini,sebuah perusahaan ingin melakukan pekerjaan secara instan dan cepat agar pekerjaan pun cepat selesai. PT.PNBC Indonesia salah satu PT Manufaktur yang ada di batam yang bergerak sebagai spray panting tentunya memiliki cara kerja sendiri, PT.PNBC membutuhkan sebuah aplikasi inventaris dan status barang yang di mana pada aplikasinya nanti karyawan dapat mengakses melalui online tanpa harus meminta-minta secara langsung. disini saya membuat sebuah aplikasi inventaris dan status barang bagian production transfer dimana sistem nantinya mampu melihat status pengerjaan barang sudah sampai dimana dan accounting mampu mencetak invoice secara otomatis.', 'Proposal'),
(43, 26, 'SISTEM INFORMASI PENERBITAN BUKU BERBASIS WEB DI POLIBATAM PRESS', '-', 'Sistem informasi penerbitan yang dimiliki oleh Polibatam Press masih bersifat konvensional, yaitu penulis  harus memesan melalui surel, kemudian tim desain Polibatam Press melakukan desain sampul buku dan layout naskah lalu mengajukan permohonan ISBN kepada Perpunas RI, tidak ada batas waktu revisi dan jumlah  minimal revisi,setelah proses tersebut dilalui maka buku akan di cetak sesuai dengan jumlah yang di setujui penulis, Dengan sistem demikian dapat menyebabkan beberapa masalah seperti terhambatnya pekerjaan karna memakan waktu untuk memproses revisian yang tidak jelas batasnya. \r\nUntuk meminimalisir kesalahan yang ditimbulkan maka dari itu perlu adanya penetapan prosedur pengajuan ISBN di Polibatam Press, yaitu dengan memanfaatkan teknologi web, sistem ini akan dibangun dengan Bahasa pemrograman PHP native dan pembatasan pengiriman naskah dengan maksimal 1 kali revisi. agar adanya perlakuan yang seragam atas seluruh transaksi penjualan yang terjadi.\r\n', 'Proposal'),
(44, 28, 'IMPLEMENTASI PROGRESSIVE WEB APPLICATION (PWA) PADA SISTEM MANAJEMEN ASET DI PT XYZ', '-', '-', 'Proposal'),
(45, 28, 'RANCANG BANGUN APLIKASI INVENTARIS DAN  STATUS BARANG DI PT. PNBC INDONESIA ', '-', '-', 'Proposal'),
(46, 27, 'APLIKASI PENJUALAN BERBASIS WEB DI PT. BERKATBERSAUDARA', '-', 'Aplikasi ini memungkinkan pengguna lebih praktis dalam melakukan proses jual-beli', 'Proposal'),
(47, 26, 'Rancang Bangun Sistem Informasi Unit Kesehatan Polibatam Berbasis Web', '-', 'Unit Kesehatan Polibatam banyak melakukan pendataan seperti data rekam medis, data inventaris obat, dan data surat yang keluar. Sistem pendataan yang Terjadi di Unit Kesehatan polibatam masih bersifat konvensional menggunakan buku catatan. Dengan sistem demikian dapat menyulitkan petugas dalam melakukan pencarian data dan membuat laporan bulanan. Untuk mengatasi permasalahan tersebut maka dari itu perlu Sistem berbasis web untuk membantu petugas dalam mengelola data. Sistem ini akan dibangun menggunakan bahasa pemrograman PHP dan  Mysql.  ', 'Proposal'),
(48, 24, '-', '-', '-', 'Proposal'),
(49, 28, 'PENGEMBANGAN APLIKASI CLARA-Q BERBASIS WEB DI PT. CITRA TUBINDO ', '-', 'CLARA-Q (Citra Learning And Recruiting Assistance Qualification) adalah sebuah aplikasi web yang digunakan training specialist di PT. Citra Tubindo Tbk untuk mengelola segala kebutuhan training karyawan. CLARA-Q hadir menggantikan sistem konvensional yang masih menggunakan kertas. Dengan adanya CLARA-Q proses pengelolaan data, seperti mencari, menambahkan dan mengubah data menjadi lebih efisien dan dapat mengurangi kemungkinan adanya human error. ', 'Proposal'),
(50, 28, '-', '-', '-', 'Proposal'),
(51, 28, 'REDESAIN APLIKASI BATAMNEWS MENGGUNAKAN METODE UCD (USER CENTERED DESIGN)', '-', 'Perkembangan teknologi informasi yang begitu cepat akhirnya membawa\r\nkehidupan manusia ke era yang lebih maju dan modern. Semua informasi yang\r\ndiinginkan kini dapat diperoleh dengan mudah menggunakan media smarthphone\r\ndan internet. Seiring hal tersebut, kebutuhan berita semakin tinggi di masyarakat.\r\nDengan adanya aplikasi android, memberikan kemudahan bagi pengguna untuk\r\nmencari berita yang diinginkan dengan cepat dan mudah. Salah satu bentuk\r\naplikasi android yang berkembang saat ini adalah aplikasi Batamnews. Aplikasi\r\nBatamnews bertujuan untuk dijadikan media dalam mencari dan menemukan\r\nberita yang berkembang di lingkungan masyarakat. Aplikasi yang sudah ada saat\r\nini perlu dilakukan perancangan ulang (redesain) agar aplikasi dapat lebih banyak\r\ndijangkau oleh pengguna. Proses redesain aplikasi Batamnews ini didasari dengan\r\nmetode UCD (User Centered Design) dan dirancang menggunakan Flutter sebagai\r\nframework perancangan ulang aplikasi. Kemudian untuk pembangunan dataserver\r\npenyimpanan akan dirancang dengan API dan pemrograman PHP. Hasil dari\r\naplikasi Batamnews pada akhirnya akan menyuguhkan UI (User Interface) yang\r\nbaru dan lebih modern sesuai keinginan pengguna. Manfaat yang akan dirasakan\r\npada hasil dari aplikasi Batamnews akan dapat membantu pihak Batamnews\r\ndalam menyajikan berita kepada masyarakat melalui media online.', 'TA 1'),
(52, 24, 'Rancang Bangun Sistem Pengarsipan Surat Masuk dan Surat Keluar Studi Kasus: Dinas Perhubungan Kota Batam', '-', 'Dalam proses pengarsipan surat masuk dan surat keluar di Dinas Perhubungan Kota Batam masih dilakukan secara manual, yaitu dengan mencatatnya dibuku. Semua suratnya diletakkan didalam map arsip, kemudian diletakkan di lemari arsip. Dengan pengelolaan arsip surat masuk dan surat keluar seperti ini dapat mengakibatkan menumpuknya arsip surat. Tidak hanya itu, jika ingin mencari datadata surat yang sudah lama pun akan sulit untuk mencarinya. Pengantaran surat masuk ke bidang tertentu juga dilakukan secara manual, yaitu mengantarkan surat tersebut ke ruangan bidang tersebut. Dari permasalahan tersebut, maka dibutuhkan sistem mengenai pengarsipan surat. Dengan adanya sistem pengarsipan surat masuk dan surat keluar ini diharapkan dapat membantu bidang sekretariat dalam mengurangi kesulitan dan waktu yang dihabiskan untuk pengantaran dan pencarian data surat. Sistem ini diharapkan dapat mengirimkan surat masuk ke bidang tertentu dan melakukan arsip surat masuk dan surat keluar. Selain itu, sistem ini juga dapat mencetak laporan arsip perbulannya. Sistem ini menggunakan metode waterfall. Sistem ini juga menggunakan bahasa pemrograman PHP dan databasenya menggunakan MySQL.', 'TA 1'),
(53, 39, 'APLIKASI INVENTORY ASET PT. INFINEON TECHNOLOGIES BATAM BERBASIS WEB', '-', 'Aplikasi berbasis web ini digunakan untuk kegiatan stock opname yang diadakan 1 tahun sekali di PT. Infineon Technologies Batam untuk menandakan aset-aset apa saja yang masih ada. Aplikasi ini menyediakan fitur baru dan memperbaiki kesalahan pada aplikasi sebelumnya yang sudah ada.', 'Proposal'),
(54, 7, 'RANCANG BANGUN PERANGKAT LUNAK LEMBAGA SERTIFIKASI PROFESI ( LSP ) POLITEKNIK NEGERI BATAM BERBASIS WEB (BAGIAN: ASESOR)', '-', 'Aplikasi Sertifikasi untuk  mengelola data sertifikasi LSP Polibatam, studi kasus role Asesor ', 'TA 1'),
(55, 28, 'PERANCANGAN STBI PANDUAN PENGGUNAAN LAYANAN HOSTING DENGAN PEMBOBOTAN TF-IDF (STUDI KASUS: PT HOSTINGAN AWAN INDONESIA)', '-', 'Sistem temu balik informasi adalah sistem yang digunakan untuk menemukan informasi yang relevan dengan kebutuhan dari penggunanya secara otomatis, berdasarkan kesesuaian dengan query (masukan berupa ekspresi kebutuhan informasi oleh pengguna) dari suatu koleksi informasi. Salah satu contoh kasus, terkait dengan STBI yang terjadi di PT Hostingan Awan Indonesia. Dalam kasus ini, pada layanan panduan hostingan, belum menyediakan tempat pencarian informasi pada halaman panduan, yang menyebabkan pelanggan bingung dan kesulitan dalam mencari informasi panduan hostingan. Berdasarkan hal tersebut, penulis akan melakukan tugas akhir ini untuk  merancang sistem temu balik informasi untuk layanan panduan hostingan dengan metode pembobotan TF-IDF. Selain dari itu, penelitian ini bertujuan untuk memudahkan pelanggan dalam mencari dan memperoleh informasi secara efektif dan efisien. Hasil dari penelitian ini diharapkan menjadi salah satu solusi untuk PT Hostingan Awan Indonesia.', 'TA 1'),
(56, 24, 'PENGEMBANGAN SISTEM PERHITUNGAN PRODUKTIVITAS STAF DENGAN ALGORITMA C4.5 BERBASIS WEBSITE (STUDI KASUS: E LIFE SOLUTIONS)', '-', 'Produktivitas adalah hal yang berpengaruh pada kinerja staf. Semakin tinggi tingkat produktivitas, maka dapat dikatakan semakin tinggi pula kinerja staf tersebut. Penting bagi perusahaan untuk mengetahui produktivitas staf agar dapat diketahui apakah staf tersebut berhasil mencapai hasil yang diinginkan perusahaan, juga apakah kinerja staf tersebut berpengaruh atau tidak dalam mengembangkan juga memajukan perusahaan. Disini saya melakukan analisis terhadap kinerja staf yang ada di perusahaan E Life Solutions dengan menggunakan dataset yang ada dari perusahaan tersebut. Analisis dilakukan dengan menggunakan algoritma C4.5 karena dari algoritma ini dapat dilakukan klasifikasi yang kemudian akan menghasilkan rules yang sesuai. Kemudian, akan diimplementasikan pada sebuah website yang akan digunakan untuk mengembangkan sistem pada perusahaan E Life Solutions, dimana sistem ini diharapkan dapat menghasilkan suatu output dari hasil analisis data produktivitas staf yang ada.', 'TA 1'),
(57, 8, 'Aplikasi Pengolahan Data Yield Mesin AOI (Automatic Optical Inspection) Di PT. Flextronics Technology Indonesia', '-', 'Aplikasi ini dirancang dan dibangun untuk memudahkan dalam mengolah data agar mendapatkan informasi data grafik Yield karena sebelumnya proses pengolahan data dilakukan secara manual menggunakan Microsoft Excel yang membutuhkan waktu yang lama. Grafik Yield merupakan grafik hasil produksi yang diperoleh dari data yang terdapat pada mesin AOI (Automatic Optical Inspection). Grafik Yield diperoleh dari persenan antara jumlah Pass Board dibagi dengan Total Board yang dihasilkan.', 'TA 1'),
(58, 23, 'Sistem Monitoring Jumlah Orang dalam Ruang Kelas Berbasis Arduino', '-', 'Sistem monitoring jumlah orang dalam ruang kelas berbasis Arduino ini merupakan sistem yang digunakan untuk mengetahui jumlah orang yang keluar dan masuk ke dalam suatu ruangan. Sistem ini akan membunyikan alarm apabila jumlah orang di dalam ruangan melebihi kapasitas. Tujuannya agar orang yang berada di dalam ruangan dapat melakukan social distancing. ', 'TA 1'),
(59, 28, '-', '-', '-', 'Proposal'),
(60, 38, 'APLIKASI PENGAJUAN IZIN DAN CUTI BERBASIS WEBSITE PADA PT. STAR SHARE', '-', 'Aplikasi ini merupakan aplikasi untuk melakukan pengajuan cuti dan izin kerja di PT. STAR SHARE. Aplikasi pengajuan cuti ini dibuat berbasis web dengan menggunakan bahasa pemrograman php dan menggunakan mysql sebagai databasenya. Aplikasi ini bertujuan untuk mempermudah proses pengajuan atau permohonan cuti kerja kepada atasan. Aplikasi ini dirancang sesuai dengan SOP perusahaan, sehingga dapat memudahkan pengguna dalam memahami flow approval pada aplikasi ini. Selain itu, aplikasi ini dilengkapi dengan notifikasi via email agar tidak terjadi keterlambatan saat memproses konfirmasi ajuan cuti tersebut.', 'Proposal'),
(61, 8, '-', '-', '-', 'Proposal'),
(62, 24, 'Perancangan Sistem Inventory Barang Berbasis Web Studi Kasus Pada TFME Polibatam', '-', 'Pencatatan data barang dan pemesanan barang pada Teaching Factory Manufacturing of Electronics masih menggunakan sistem manual. Dalam proses pencatatan barang, setiap kali ada barang masuk dicatat manual di buku, yang kemudian direkap ke Ms. Excel sebagai alat untuk menyimpan semua data yang sudah di tulis di buku. Tetapi adanya kendala yang terjadi dalam menggunakan Â¬-Ms. Excel sebagai alat penyimpanan data barang yaitu, sulitnya dalam pencarian data barang serta mengolah data.\r\nProses dalam permintaan barang baru oleh teknisi kepada admin inventory saat ini di Teaching Factory Manufacturing of  Electronics Politeknik Negeri Batam yang dilakukan oleh teknisi masih bersifat manual, yaitu teknisi harus mengisi sebuah formulir kertas yang berisi tentang keperluan spesifik barang dan material komponen bahan baku yang akan dipesan kepada admin inventory dan dilanjutkan ke kepala unit untuk meminta persetujuan pemesanan barang.\r\nPermintaan pesanan barang baru oleh teknisi dengan menggunakan formulir kertas, membuat peluang untuk pendataan hilang karena tercecer di dalam ruangan menjadi lebih besar, yang mengakibatkan hilangnya data Purchase Request dari teknisi kepada admin dan permintaan tersebut tidak dapat di proses, dan memaksa teknisi untuk mengisi ulang formulir, sehingga memakan kertas lebih banyak.\r\nDalam permasalahan yang terjadi di atas, maka pada proyek akhir ini dirancang suatu sistem inventory pada Teaching Factory Manufacturing of Electronics Politeknik Negeri Batam berbasis web, yang dapat melakukan pendataan barang secara paperless dan diharapkan lebih tertata dan lebih terorganisir dalam pendataan sehingga dapat mempermudah bagi pengguna dalam mencari atau mengolah data-data yang tersimpan di dalam database.\r\n', 'TA 1'),
(63, 8, 'Aplikasi Monitoring Work Instruction di PT Flextronics Technology   Indonesia', '-', 'Aplikasi ini dibangun dan dirancang untuk memudahkan proses pembuatan Work Instruction dan menampilkannya langsung ke Operator melalui Website. Umpan balik yang dibutuhkan Admin pun dapat langsung terupdate di Aplikasi secara real time. Aplikasi penampil Work Instruction ini menggunakan framework ASP.NET dengan menggunakan bahasa pemrograman C#. Dengan adanya Aplikasi Penampil Work Instruction, Operator melihat Work Instruction dan Bill of Material tidak lagi membuka file secara manual, tetapi langsung mengakses lewat Website.', 'TA 1'),
(64, 27, 'APLIKASI DASHBOARD FALSE CALL MESIN AOI DI PT. FLEXTRONICS TECHNOLOGY INDONESIA', '-', ' Aplikasi Dashboard False Call adalah aplikasi yang diharapkan dapat membantu karyawan dan meningkatkan kualitas dan mutu dari produksi. Aplikasi ini berguna untuk menampilkan data false call dalam bentuk grafik dalam durasi perhari, dan juga admin dapat menginput data false call dalam durasi perhari. Admin yang dimaksud adalah orang yang bertugas merekap semua data false call, jadi tidak semua karyawan memiliki akses untuk menginput data ke dalam aplikasi ini, tetapi semua karyawan dapat melihat aplikasi ini. Selain itu apliksi ini juga mempunyai fitur trigger kepada atasan jika hasil produksi melewati standar yang berlaku.', 'Proposal'),
(65, 30, '-', '-', '-', 'Proposal'),
(66, 6, 'APLIKASI TEACHING FACTORY BERBASIS WEB UNTUK PEMESANAN DAN PENJUALAN JASA STUDI KASUS: PT. XYZ', '-', 'Saat ini PT XYZ memiliki kegiatan dengan nama Teaching Factory yang mana salah satu kegiatannya ialah menerima pemesanan pembuatan material. Proses pemesanan pembuatan material pada kegiatan Teaching Factory ini masih dilakukan secara manual.  Maka dari itu diperlukannya pembuatan aplikasi ini dengan tujuan agar dapat membuat pemesanan secara otomatis. aplikasi ini juga dapat mengirimkan email dan menarik data laporan pemesanan dalam bentuk excel. Pada aplikasi ini juga tedapat dua metode pemesanan yakni custome dan berdasarkan material/produk yang ditawarkan terdapat pada halaman portfolio. aplikasi ini juga memiliki fitur comment pada pemesanan yang bertujuan agar dapat bertanya mengenai pesanan yang telah dibuat. aplikasi ini juga memiliki fitur activity yangberguna untuk menampilkan kegiatan yang telah dilakukan, fitur about untuk menampilkan penjelasan mengenai teaching factory itu sendiri dan beberapa fitu lainnya.', 'TA 1'),
(67, 6, 'APLIKASI PENGAJUAN JADWAL LATIH TANDING TIM OLAHRAGA BERBASIS APLIKASI MOBILE', '-', 'Aplikasi ini adalah aplikasi ini ditujukan untuk tim olahraga yang ingin mencari tim olahraga lain untuk  mengajukan pertandingan uji coba yang bertujuan untuk menguji hasil latihan rutin yang telah dilakukan. Pada aplikasi ini terdapat fitur untuk mengajukan pertandingan, melihat informasi tim, memberikan pesan kepada tim lain dan melihat informasi lapangan olahraga.', 'Proposal'),
(68, 23, '-', '-', '-', 'Proposal'),
(69, 26, '-', '-', '-', 'Proposal'),
(70, 23, 'APLIKASI PENGAJUAN IZIN DAN CUTI BERBASIS WEB PADA PT. STAR SHARE', '-', 'aplikasi ini merupakan aplikasi pengajuan izin dan cuti kerja pada PT. Star Share, aplikasi ini memudahkan proses perizinan approval dan mempermudah serta mempercepat proses perizinan ataupun cuti kerja.  Tentu saja aplikasi pengajuan izin dan cuti ini menggunakan sistem approval sesuai SOP perusahaan, sehingga pengguna aplikasi ini dapat mudah memahami flow approval yang ada pada aplikasi ini. dan tidak akan terjadi keterlambatan proses karena sistem di lengkapi dengan notifikasi via email.', 'Proposal'),
(71, 38, 'PENGEMBANGAN PERFORMANCE DASBOARD â€œELECTRONIC MANUFACTURING SERVICESâ€  SEBAGAI MEDIA PENYAJIAN INFORMASI DI  PT. SCHNEIDER ELECTRIC MANUFACTURING BATAM', '-', 'Performance dashboard yang dibangun berbasis web yang berfokus pada penyajian data-data perusahaan. ', 'Proposal'),
(72, 14, 'APLIKASI SUBCONTRACTOR PT.  Schneider Electric Manufacturing', '-', 'Aplikasi Subcontractor merupakan aplikasi manajemen material yang dikembangkan menggunakan ASP .NET Core dan SQL Server.\r\nAplikasi ini akan digunakan oleh pihak STL ( Scheneider Thailand Ltd).', 'TA 1'),
(73, 6, 'SISTEM PENJADWALAN PREVENTIVE MESIN STACKING BERBASIS WEB di PT. PANASONIC INDUSTRIAL DEVICES BATAM', '-', 'Berfokus pada otomasi pengaturan penjadawalan sesuai dengan interval waktu yang ditentukan, serta dapat meng-export data dalam format excel sehingga memudahkan user dalam membuat laporan penjadwalan.', 'TA 1'),
(74, 23, 'APLIKASI KUALIFIKASI PROYEK â€œE-QUALIFICATION WORKFLOWâ€ MENGGUNAKAN PLATFORM OUTSYSTEMS DI PT SCHNEIDER ELECTRIC MANUFACTURING BATAM', '-', 'Aplikasi Kualifikasi Proyek (E-Qualification Workflow) digunakan untuk mengukur tingkat kepantasan sebuah proyek sebelum di produksi. Staff/Karyawan aktif PT. Schneider Electric Manufacturing Batam yang berperan sebagai Project Manager akan membuat sebuah page kualifikasi untuk proyek yang ia tangani, dengan cara mengisi form project info, membentuk team yang berisikan stackholder , dan mendaftarkan masing-masing stackholder untuk bertanggung jawab atas beberapa item kualifikasi, setelah itu Project Manager akan menyimpan page kualifikasi, selanjutnya para stackholder wajib melakukan approvement terhadap item kualifikasi yang mereka tangani, dan sistem akan mengecek kesiapan dari  masing masing tahap proses kualifikasi.', 'TA 1'),
(75, 27, '-', '-', '-', 'Proposal'),
(76, 8, 'Sistem Pengarsipan Data Import dan Export Berbasis Web Studi Kasus: PT. Batam Selalu Bersatu', '-', 'Aplikasi yang mampu membantu  pengarsipan data impor dan ekspor', 'Proposal'),
(77, 14, 'PENGEMBANGAN APLIKASI â€œPAPERLESSâ€ di PT.  Schneider Electric Manufacturing Batam MENGGUNAKAN OUTSYSTEMS', '-', 'Paperless merupakan aplikasi manajemen approval di PT Schneider Electric Manufacturing Batam, aplikasi ini memudahkan proses manajemen approval dan mengurangi penggunaan kertas di PT. Schneider Electric Manufacturing Batam dalam proses majamen approval di semua departemen.  Tentu saja Paperless menggunakan sistem approval sesuai SOP yang sesuai sebelum aplikasi ini dibuat, sehingga pengguna aplikasi ini dapat mudah memahami flow approval yang ada pada aplikasi ini. Sehingga PT Schneider Electric Manufacturing Batam dapat mengurangi penggunaan kertas.', 'TA 1'),
(78, 27, 'Aplikasi E-learning Pelatihan Karyawan Berbasis Web di PT. Panasonic Industrial Devices Batam', '-', 'Aplikasi E-Learning pelatihan karyawan untuk PT. Panasonic Industrial Devices Batam adalah metode baru untuk pelatihan karyawan. Aplikasi ini dibuat dengan tujuan untuk mengurangi penggunaan waktu, tenaga dan ruangan. dengan demikian produktivitas perusahaan menjadi meningkat dikarenakan karyawan tidak membutuhkan waktu yang lama untuk mengikuti pelatihan.', 'TA 1'),
(79, 38, 'Sistem Analisis Data Kondisi Mesin ICT', '-', 'Sistem analisis data kondisi mesin ICT yang digunakan dalam penelitian ini adalah  jenis kerusakan mesin dan tindakan yang dilakukan oleh teknisi. Melihat adanya kerusakan mesin setiap hari mengakibatkan data kondisi mesin akan semakin bertambah banyak. Data kondisi mesin dicatat dalam sebuah file excel dan data tersebut hanya digunakan untuk mendokumentasikan kondisi mesin dan tindakan yang dilakukan oleh teknisi.', 'TA 1'),
(80, 40, '-', '-', '-', 'Proposal'),
(81, 27, '-', '-', '-', 'Proposal'),
(82, 21, 'SISTEM INFORMASI MANAJEMEN KENAIKAN GAJI BERKALA BERBASIS WEBSITE DI BMKG KOTA BATAM', '-', 'Sistem Informasi Manajemen Kenaikan BMKG Kota Batam merupakan sebuah website yang berfungsi untuk melakukan pengelolaan Surat Kenaikan Gaji Berkala. Website ini melakukan pengelolaan kenaikan gaji berkala untuk pegawai di BMKG Kota Batam.', 'Proposal'),
(83, 23, 'SISTEM KONTROL EXHAUST FAN BERDASARKAN JUMLAH ORANG YANG TERDETEKSI DALAM RUANGAN', '-', 'sistem yang mengontrol exhaust fan dengan arduino ,dimana exhaust fan akan berputar semakin cepat jika jumlah orang dalam ruangan bertambah.', 'Proposal'),
(84, 35, 'Sistem Informasi Peminjaman Fasilitas Kantor Berbasis Website Pada Politeknik Negeri Batam ', '-', 'Isi deskripsi melalui form yang akan ada di website tersebut dan datanya akan tersimpan di website tersebut agar bisa mengecek ulang \r\nPeminjaman Ruangan/Gedung Untuk Tempat Acara \r\nPeminjaman Mobil Operasional BMN ', 'TA 1'),
(85, 35, 'IMPLEMENTASI KNOWLEDGE SHARING DALAM PEMELIHARAAN DAN PERBAIKAN PERALATAN  BERBASIS WEB', '-', 'Aplikasi ini berisi tentang penerapan sharing knowledge yang dikhususkan untuk  teknisi yang ada dilingkungan BMKG agar mudah dalam memperoleh ilmu tentang pemeliharaan dan perbaikan peralatan operasional.', 'Proposal'),
(87, 22, '-', '-', '-', 'Proposal'),
(88, 23, '-', '-', '-', 'Proposal'),
(89, 15, '-', '-', '-', 'Proposal'),
(90, 7, 'Sistem Manajemen Bisnis Usaha Mikro Kecil Menengah(UMKM) Berbasis Web PHP', '-', 'Membuat suatu Web PHP Sistem Manajemen Bisnis untuk Bisnis UMKM, yang bertujuan untuk mempermudah membuat Data - data report seperti, Item Sales Report, Service Report, dan Stock Inventory', 'Proposal'),
(91, 32, '-', '-', '-', 'Proposal'),
(92, 10, 'Sistem Membership Proteksi Layar Pada Perangkat Mobile (ZFix)', '-', 'Sistem Membership Proteksi Layar Pada Perangkat Mobile (ZFix) dibuat dalam bentuk 2 platform yaitu mobile berbasis android sebagai media aplikasi untuk customer, dan website sebagai manajemen membership, partner, dan voucher.', 'Proposal'),
(93, 10, 'APLIKASI PELAKSANAAN UJI KOMPETENSI LEMBAGA SERTIFIKASI PROFESI POLIBATAM BERBASIS MOBILE', '-', ' LSPPolibatam merupakan sebuah aplikasi pelaksanaan uji kompetensi LSP Polibatam yang membantu untuk memudahkan peserta untuk mendaftar dan melakukan kegiatan uji kompetensi. Sehingga peserta tidak harus datang kelokasi untuk kegiatan tersebut.', 'Proposal'),
(94, 35, 'Perancangan Aplikasi Pemesanan Paket Perjalanan Wisata Pada Biro Travel Mytrip Indonesia Menggunakan Payment Gateway Berbasis Web', '-', '1. aplikasi yang dapat membantu customer agar dapat memesan paket perjalanan secara mudah dan dapat dilakukan dimana saja melalu koneksi internet.\r\n2.  Aplikasi ini dibangun berbasis web menggunakan bahasa pemogramamn PHP dan seluruh datanya ditampung di database MySQL.\r\n3. Aplikasi ini juga didukung dengan payment gateway untuk proses pembayaran sehingga proses pembayaran menjadi lebih cepat dan mudah.', 'TA 1'),
(95, 39, 'PENERAPAN DATA MINING TERHADAP PERENCANAAN TATA RUANG DI KOTA BATAM MENGGUNAKAN ALGORITMA K-MEANS CLUSTERING ', '-', 'Tugas Akhir Berkonsep Data Mining dengan Algoritma Clustering K-Means dengan Penerapannya Terhadap Tata Ruang Kota Batam \r\nSaat ini saya sudah memasukin tahap TA 2, karena pada saat Proposal dan TA 1 tidak dilakukan melalui sistem SITA ini', 'Proposal'),
(96, 22, '-', '-', '-', 'Proposal'),
(97, 39, 'Sistem Rental Mobil Berbasis Odoo di CV. Sahabat Sukses Sejati', '-', 'Sistem Rental Mobil Berbasis Odoo adalah software yang dapat membantu kegiatan usaha Perentalan Kendaraan meliputi Workflow Penyewaan Kendaraan, Pembayaran ataupun Pembayaran Secara Berkala, Pendataan Kendaraan, Penjadwalan Servis Kendaraan Secara Berkala', 'Proposal'),
(98, 7, 'Aplikasi manajemen gudang berbasis web di PT Prioritas Solusi ', '-', 'Sistem manajemen gudang  berbasis web ini ditujukan untuk membantu pendataan dan pengecekan barang di gudang, dikarenakan sistem yang ada saat ini menggunakan metode manual dan sulit untuk mengelola dan mengecek ketersediaan barang pada gudang.', 'TA 1'),
(99, 15, '-', '-', '-', 'Proposal'),
(100, 23, '-', '-', '-', 'Proposal'),
(101, 23, 'SISTEM PENDAFTARAN SISWA DIDIK BARU BERBASIS WEBSITE DI SEKOLAH DASAR SWASTA ANANDA BATAM', '-', 'sistem pendaftaran siswa didik baru berbasis website adalah suatu sistem yang dapat membantu proses penerimaan siswa baru di Sekolah Dasar Swasta Ananda dimana para calon siswa dapat mendaftarkan dirinya jika terkoneksi dengan internet. Waktu yang diberikan untuk pengisian formulir juga tidak terbatas sampai tanggal yang telah ditentukan oleh panitia. ', 'Proposal'),
(102, 8, '-', '-', '-', 'Proposal'),
(103, 8, 'PERANCANGAN APLIKASI PELAYANAN JASA  NOTARIS DAN PPAT (E-SIPPNOPAT)   BERBASIS WEB  ', '-', '-', 'Proposal'),
(104, 24, 'Perancangan Sistem Informasi Akademik Bimbel â€œStep Forwardâ€ Berbasis Web', '-', 'Bimbingan Belajar Step Forward adalah salah satu lembaga pendidikan non-formal dengan bertujuan mendidik siswa yang disiplin dan meningkatkan kecerdasan serta pengetahuan pada siswa.Bimbingan Belajar Step Forward, masih menggunakan sistem informasi akademik secara manual, yang dirasa kurang efektif. Dalam hal penyimpanan data siswa/siswi kurang efisien karena masih dalam bentuk arsip sehingga butuh tempat penyimpanan yang cukup besar dan pencarian data siswa membutuhkan waktu yang lebih lama. Informasi akademik seperti nilai atau rangking dan perkembangan siswa masih dilakukan secara manual. Sehingga penulis ingin membuat suatu sistem informasi akademik untuk memperbaiki sistem informasi akademik pada bimbel sehingga penyampaian informasi lebih efektif dan efisien. Sistem informasi akademik ini dibuat berbasis web dengan menggunakan bahasa pemograman PHP dan MySQL sebagai database. Metode yang digunakan dalam pengembangan ini adalah Waterfall Model dengan tujuan pekerjaan dapat terstruktur dengan baik.', 'TA 1'),
(105, 36, '-', '-', '-', 'Proposal'),
(106, 36, '-', '-', '-', 'Proposal'),
(107, 10, 'Aplikasi Pemesanan Jas Lab dan Almamater di Koperasi Politeknik Negeri Batam', '-', 'Aplikasi ini dibuat untuk mempermudah mahasiswa dalam melakukan pemesanan jas lab dan almamater setelah melakukan pendaftaran di koperasi Politeknik Negeri Batam. ', 'Proposal'),
(108, 36, '-', '-', '-', 'Proposal'),
(109, 10, '-', '-', '-', 'Proposal'),
(110, 23, '-', '-', '-', 'Proposal'),
(111, 10, 'Pengujian dan Analisis pada Website Pemesanan Almamater Jurusan Politeknik Negeri Batam', '-', 'Penelitian ini terfokus kepada sistem keamanan dari website pemesanan almamater jurusan.', 'Proposal'),
(112, 10, '-', '-', '-', 'Proposal'),
(113, 35, 'PERANCANGAN WEBSITE CONTENT MANAGEMENT SYSTEM (CMS) UNTUK KAWASAN EKONOMI KHUSUS BADAN PENGUSAHAAN (KEK BP) BATAM', '-', 'Kawasan Ekonomi Khusus Batam ialah kawasan yang dibangun dalam rangka mempercepat pencapaian pembangunan ekonomi nasional terkhusus di Pulau Batam. Sehingga diperlukan peningkatan penanaman modal melalui penyiapan kawasan yang memiliki keunggulan ekonomi dan geostrategis', 'TA 1'),
(114, 36, '-', '-', '-', 'Proposal'),
(115, 7, 'Aplikasi Pemilihan Jadwal Rapat Koordinasi Berbasis Web PUSRENPROS BP BATAM', '-', '-', 'Proposal'),
(116, 39, '-', '-', '-', 'Proposal'),
(117, 10, 'Aplikasi pemesanan jas lab dan almamater untuk pendaftaran ulang mahasiswa berbasis mobile ', '-', 'Aplikasi mobile untuk memesan jas dan lab almamater untuk mahasiswa baru', 'Proposal'),
(118, 13, '-', '-', '-', 'Proposal'),
(119, 10, '-', '-', '-', 'Proposal'),
(120, 13, '-', '-', '-', 'Proposal'),
(121, 14, '-', '-', '-', 'Proposal'),
(122, 8, '-', '-', '-', 'Proposal'),
(123, 21, '-', '-', '-', 'Proposal'),
(124, 24, '-', '-', '-', 'Proposal');
INSERT INTO `tb_tugas_akhir` (`id_mhs`, `id_dosen`, `judul`, `judul_inggris`, `deskripsi`, `status`) VALUES
(125, 10, 'APLIKASI MONITORING BERKAS NOTARIS & PPAT BERBASIS WEB (Kuy-Monitor)', '-', 'Pada tugas akhir ini, penulis akan membuat suatu aplikasi menggunakan metodologi Waterfall dengan menggunakan bahasa pemrograman PHP, framework Code Igniter, dan database MySQL Analisis kebutuhan sistem dilakukan dengan wawancara dan Observasi bersama Notaris agar desain aplikasi sesuai dan tepat sasaran.. Penelitian ini menghasilkan suatu Aplikasi yang mampu merekam data jenis pekerjaan, data clien , data keuangan, data ketenagakerjaan, serta data rekapitulasi pendapatan berupa data teks dan grafik. Desain sistem informasi ini juga memiliki fungsi tambahan yang memberi tahu klien tentang pekerjaan yang telah diselesaikan melalui email dan SMS. Aplikasi ini diberi nama KUY-MONITOR.', 'Proposal'),
(126, 21, 'SISTEM TRAINING KARYAWAN PIPAMAS BERBASIS WEB', '-', 'Sistem ini dibuat untuk mempermudah proses training karyawan di perusahaan Pipamas', 'TA 1'),
(127, 22, 'Mobile Portal Kelompok Penelitian Teknik Biomedik Berbasis Android dan Web', '-', 'Kemudahan dan kecepatan dalam mengakses informasi dewasa ini telah berkembang pesat seiring berkembangnya perangkat keras, lunak dan jaringan. Kemudahan mendapatkan informasi tidak lepas dari peran teknologi informasi saat ini. Kebutuhan untuk mendapatkan informasi dengan mudah dan cepat menjadi kepentingan utama saat ini, Diantaranya adalah bagi mahasiswa, dosen dan masyarakat lainnya. Salah satu dari sekian banyak produk teknologi informasi adalah berupa website. \r\n		Website merupakan fasilitas internet yang menghubungkan dokumen dalam lingkup lokal maupun jarak jauh. Dokumen pada website disebut dengan web page dan link dalam website memungkinkan pengguna bisa berpindah dari satu page ke page lain (hyper text), baik diantara page yang disimpan dalam server yang sama maupun server diseluruh dunia. Pages diakses dan dibaca melalui browser seperti Netscape Navigator, Internet Explorer, Mozila Firefox, Google Chrome dan aplikasi browser lainnya (Hakim Lukmanul, 2004). Salah satu perguruan tinggi yang menggunakan teknologi tersebut adalah Politeknik Negeri Batam. Diantara sistem informasi yang menggunakan teknologi website adalah publikasi riset.\r\n		Menurut Kerlinger (1986), menyatakan Riset adalah sistematik, terkontrol secara empiris dan investigasi kritis terhadap dalil tentang dugaan hubungan antar berbagai macam fenomena. Tujuan riset antara lain untuk memecahkan sebuah masalah, meningkatkan ilmu, melakukan penafsiran yang lebih baik dan menemukan fakta yang baru. Politeknik Negeri Batam merupakan salah satu perguruan tinggi di Kepulauan Riau yang menghasilkan riset.  Belum adanya wadah untuk menampung riset di Politeknik Negeri Batam adalah menjadi suatu masalah. Selain itu, masalah lain yang ditemukan di web publikasi lainnya adalah hanya berbasis web,  upload yang masih dilakukan  secara manual oleh admin dan  riset yang ditampilkan tidak terstruktur . \r\n		Berdasarkan permasalahan diatas, maka tujuan penelitian ini adalah merancang Mobile Portal Kelompok Penelitian Teknik Biomedik Berbasis Android dan Web. Sistem ini diharapkan dapat menyelesaikan permasalahan diatas. Selain itu, sistem ini diharapkan dapat membantu periset maupun publik yang mengakses  mendapatkan sajian data yang mutakhir dengan tampilan yang lebih baik.\r\n', 'Proposal'),
(128, 7, 'Sistem Pendukung Keputusan Penilaian Kantin Dengan Metode Serqual', '-', 'ABSTRAK \r\n\r\nKantin adalah sebuah ruangan dalam sebuah gedung yang digunakan untuk makan, baik makanan yang dibawa sendiri maupun makanan yang dibeli dikantin. Kantin sendiri harus mengikuti prosedur tentang cara mengolah dan menjaga kebersihan kantin, makanan yang disediakan kantin haruslah bersih dan halal. Untuk menjaga kualitas kantin yang baik, harus ada sistem penilaian yang bisa menentukan bawah kantin tersebut layak atau tidak, dengan begitu kita bisa tau apa kekurangan kantin tersebut. Sistem ini dibuat menggunakan sistem pendukung keputusan dengan metode Servqual (Service Quality) berbasis website. Servqual (Service Quality) adalah suatu sistem yang digunakan untuk mengukur kualitas jasa, dengan sistem ini kita bisa mengetahui seberapa besar celah (gap) yang ada diantara persepsi pelanggan dan ekspetasi pelanggan terhadap penyedia kantin/jasa. \r\nKata Kunci : kantin, sistem pendukung keputusan, Servqual ', 'Proposal'),
(129, 24, '-', '-', '-', 'Proposal'),
(130, 8, '-', '-', '-', 'Proposal'),
(131, 35, 'Sistem Informasi Pendataan Jemaat GBKP Batam Centre Berbasis WEB', '-', 'GBKP Batam Centre memiliki beberapa kegiatan misalnya pendataan jemaat, pendaftaran baptis, naik sidi, pernikahan dan membuat laporan persembahan ibadah online. Sistem informasi gereja GBKP Batam Centre saat ini masih menggunakan sistem manual dan belum terintergerasi . Peneletian ini ditujukan untuk membangun sistem informasi berbasis web yang diharapkan  bisa memudahkan gereja dalam pendataan jemaat, pendaftaran pelayanan, dan menginformasikan setiap kegiatan di gereja GBKP Batam Centre.', 'TA 1'),
(132, 22, '-', '-', '-', 'Proposal'),
(133, 10, '-', '-', '-', 'Proposal'),
(134, 39, '-', '-', '-', 'Proposal'),
(135, 40, '-', '-', '-', 'Proposal'),
(136, 7, 'APLIKASI RESERVASI  LAPANGAN FUTSAL FORZA TANJUNG BATU BERBASIS WEB', '-', 'Sistem pemesanan lapangan futsal forza tanjung batu  berbasis web untuk mempermudah  pemesanan lapangan sehingga pelanggan tidak perlu datang langsung kelapangan juga mempermudah pengelola dalam penyimpanan data dan laporan. Selama ini menjadi keluhan pelanggan dalam proses pemesanan, dengan adanya sistem ini semoga bisa mempermudah dalam pemesanan lapangan futsal sehingga lebih efektif dan efesien', 'Proposal'),
(137, 22, 'SISTEM MANAJEMEN KEBUN RAYA BATAM BERBASIS WEB DAN MOBILE', '-', 'Sektor pariwisata merupakan salah satu sektor yang menjadi sumber devisa Negara. Maka dari itu dengan adanya sistem ini diharapkan dapat membantu meningkatkan jumlah wisatawan yang ingin berkunjung baik dari kota Batam maupun luar Batam sehingga mampu meningkatkan pendapatan asli daerah (PAD).', 'Proposal'),
(138, 31, '-', '-', '-', 'Proposal'),
(139, 35, '-', '-', '-', 'Proposal'),
(140, 31, '-', '-', '-', 'Proposal'),
(141, 35, 'Sistem Informasi Akademik Lembaga Pendidikan Batam Profesional Berbasis Web', '-', 'Proses pengolahan data dan penginputan data di Lembaga Pendidikan Batam Profesional masih secara manual yaitu dengan dicatat dalam buku dan berupa arsip-arsip, sehingga sering terjadi ketidak akuratan dalam proses pengoperasian. Berdasarkan permasalahan tersebut, untuk dapat memudahkan pengolahan data dibutuhkan sistem informasi akademik berbasis web yang dapat membantu dalam pengelolaan data-data akademik siswa seperti pendaftaran, data siswa dan guru, absensi, penjadwalan, dan konfirmasi pembayaran SPP.', 'TA 1'),
(142, 31, 'RANCANGAN BANGUN SISTEM MONITORING STATUS SERTIFIKAT BERBASIS WEBSITE', '-', 'PT. Transafe Indonesia adalah Perusahaan Jasa Kesehatan Keselamatan Kerja (PJK3) untuk melaksanakan program sertifikasi profesi dan lisensi. Program sertifikasi ini ditujukan untuk tenaga kerja diberbagai perusahaan di Indonesia. Salah satuhal yang penting dan dibutuhkan pada Transafe Indonesia adalah sistem monitoring status Sertifikat berbasis website. Selama ini monitoring mulai dari status pengerjaan, pengiriman dan penerimaan pada perusahaan Transafe masih menggunakan Microsoft Excel yang dikelola oleh bagian admin. Padahal selama ini proses nya client menanyakan status sertifikat langsung kepada bidang pemasaran,  sedangkan bidang pemasaran selalu bertanya perihal status sertifikat yang sedang di proses kepada bagian admin. Proses bertanya tentang status sertifikat ini selalu terjadi berulang dalam kegiatan pekerjaan.', 'Proposal'),
(143, 35, 'SISTEM INFORMASI AKADEMIK SMP AL AZHAR I BATAM BERBASIS WEB', '-', 'merancang dan membangun pengolahan data akademik, admin dapat mengakses seluruh data, data siswa, data guru, data nilai, siswa dapat mellihat nilai siswa dan jadwal pelajaran.', 'TA 1'),
(144, 22, 'Strategi Pemasaran Inovatif dalam Industri Teknologi: Studi Kasus pada PT Teknologi Mandiri Sejahtera', 'Innovative Marketing Strategies in the Technology Industry: A Case Study of Independent Technology Solutions Ltd.', 'Penelitian ini menganalisis strategi pemasaran inovatif di industri teknologi, difokuskan pada PT Teknologi Mandiri Sejahtera. Melalui studi kasus, kami mengevaluasi keberhasilan dan tantangan perusahaan ini dalam menerapkan strategi inovatif. Identifikasi faktor kunci yang mempengaruhi implementasi, memberikan rekomendasi untuk perbaikan. Penelitian ini berpotensi memberikan wawasan berharga bagi perusahaan teknologi lain dalam meningkatkan strategi pemasaran mereka di era yang terus berubah.', 'Proposal'),
(145, 23, '-', '-', '-', 'Proposal'),
(146, 22, '-', '-', '-', 'Proposal'),
(147, 30, 'Analisis User Interface Pada Website TFME Interactive Learning Media Dengan Heuristic Evaluation', '-', 'Keterbatasan mesin untuk pembelajaran mahasiswa di Teaching Factory Manufacturing of Electronics Polibatam (TFME) menyebabkan efektifitas pembelajaran menjadi kurang maksimal. Solusi untuk mengatasi permasalahan tersebut adalah menggunakan website TFME Interactive Learning Media yang berfungsi sebagai media pembelajaran mesin dan uji pemahaman mahasiswa terhadap proses-proses yang terdapat pada mesin. Dalam perancangan website interaktif, halaman antarmuka pengguna yang menarik dan user friendly merupakan bagian yang sangat penting. Dalam penelitian ini, dilakukan evaluasi user interface sebagai pendekatan pada website  dari sisi usability. Penelitian ini bertujuan untuk melakukan analisa user interface pada website TFME Interactive Learning Media dengan metode heuristic evaluation untuk mengidentifikasi masalah yang terdapat pada inteface sistem secara spesifik dan menilai tingkat fungsional dari sistem agar pengguna dalam proses pembelajaran dapat paham dan mengerti penggunaan dari website interaktif ini. ', 'TA 1'),
(148, 1, 'IMPLEMENTASI DIGITAL SIGNATURE PADA APPROVAL DOKUMEN PDF DENGAN METODE RSA', '-', 'Pada penelitian kali ini membahas tentang pengamanan dokumen berbasis digital signature. Dengan menggunakan metode-metode yang ada pada kriptografi. Penelitian kali ini menggunakan metode RSA', 'Proposal'),
(149, 26, '-', '-', '-', 'Proposal'),
(150, 30, ' Implementasi dan Analisis Continuity Editing Terhadap Tingkat  Emosi Penonton Pada Video Wedding', '-', 'Pada era modern, dibutuhkan adanya dokumentasi dan publikasi yang digunakan untuk merekam suatu kegiatan dalam bentuk foto maupun video. Momen pernikahan adalah momen dalam sekali seumur hidup yang sangat dinantikan oleh semua orang.Pada video dokumentasi dalam pernikahan memiliki berbagai istilah salah satunya ialah video cinematic. Didalam sebuah video akan berkaitan erat dengan editing. Continuity editing merupakan menjadi hal serius yang harus diperhatikan dalam pembuatan video karena jika tidak diperhatikan akan membuat perbedaan antara cerita yang disampaikan telah dengan baik atau membingungkan audience. Hal ini bisa terjadi karena adanya perpindahan sudut kamera ke lokasi yang kurang tepat yang membuat kondisi dua cut tidak berhubungan. Pada saat editing diharuskan untuk dapat memperhatikan dan mempertahankan continuity cerita dari awal hingga akhir cerita. Pada continuity editing dapat diatur urutan shot sehingga dapat menunjukkan hasil perkembangan yang berbeda dari setiap adegan dan menciptakan emosi yang baru pada cerita tersebut.', 'Proposal'),
(151, 40, '-', '-', '-', 'Proposal'),
(152, 19, '-', '-', '-', 'Proposal'),
(153, 19, '-', '-', '-', 'Proposal'),
(154, 30, '-', '-', '-', 'Proposal'),
(155, 30, '-', '-', '-', 'Proposal'),
(156, 40, '-', '-', '-', 'Proposal'),
(157, 17, 'PERANCANGAN DAN PEMBUATAN MULTIMEDIA E-LEARNING (MELER) BERBASIS ANDROID PADA MATA KULIAH PERANCANGAN GRAFIKA', '-', 'Dalam situasi pandemi covid-19 saat ini, seluruh segmen kehidupan manusia menjadi terganggu, termasuk di bidang pendidikan. Banyak negara mengambil keputusan menutup semua institusi pendidikan mulai dari sekolah hingga perguruan tinggi, termasuk Indonesia. Hal ini dilakukan agar mengurangi kontak orang-orang secara masif dan mengalihkan model pembelajaran sebelumnya menjadi pelaksanaan belajar secara daring. \r\nPemilihan model pembelajaran yang tepat dapat mengoptimalkan pengalaman belajar bagi mahasiswa terutama dimasa pandemi saat ini, dimana mahasiswa menghabiskan lebih banyak waktu bekerja dan belajar di rumah (work from home). Salah satunya dengan menggunakan model blended learning dengan penerapan berbasis multimedia interaktif. Blended learning menggabungkan pembelajaran tatap muka di kelas dengan pembelajaran online dimana materi tersaji dalam bentuk multimedia seperti teks, gambar, suara dan video sehingga memudahkan penyampaian materi dengan cara yang lebih menarik. Penelitian ini bertujuan untuk merancang sebuah model blended learning dengan menerapkan teknologi smartphone berbasis android pada mata kuliah Perancangan Grafika. \r\nPenelitian ini dibuat dengan metode Research and Development (R&D) dengan model pengembangan ADDIE (Analysis, Design, Development and Implementation, Evaluation). Subjek dalam penelitian ini adalah Mahasiswa Politeknik Negeri Batam yang sedang atau sudah menempuh mata kuliah Perancangan Grafika. Data dikumpulkan dengan observasi, wawancara, dan angket. Selanjutnya akan dianalisis hasil implementasi dari produk yang dihasilkan berdasarkan aspek functional suitability, compatibility, usability dan performance efficiency.', 'Proposal'),
(158, 19, 'IMPLEMENTASI DAN ANALISIS MEDIA KAMPANYE IKLAN KOMIK INSTAGRAM POLIBATAM DIET PLASTIK TERHADAP KEPEDULIAN LINGKUNGAN KAMPUS ', '-', 'Era Industri 4.0 kehadiran internet sebagai hasil dari perkembangan teknologi informasi yang memudahkan masyarakat dapat mengakses informasi tanpa kendala jarak dan waktu. Mulai dari mempromosikan produk sampai dengan mengkampanyekan sebuah event. Perkembangan teknologi membuat proses kampanye dilakukan melalui media digital atau online. Para komikus memanfaatkan media digital sebagai sarana untuk berkampanye. Salah satu media digital yang saat ini sering digunakan untuk mengkampanye suatu event yaitu Instagram. Hal inilah yang dilakukan pada kegiatan Polibatam Diet Plastik 2020. Polibatam Diet Plastik merupakah bagian dari gerakan Green Campus yang sudah direncanakan pada tahun 2019. Sebagai kelanjutan dari gerakan Green Campus, kampanye diet plastik ini menyasar pada penggunaan plastik sekali pakai yang masih sering digunakan di kalangan mahasiswa, dosen dan pegawai di Politeknik Negeri Batam. Model pengembangan komik digital yang digunakan pada penelitian ini adalah model pengembangan Borg and Gall, sedangkan instagram tidak dilakukan pengembangan karena sudah dibuat oleh Politeknik Negeri Batam. Responden dalam penelitian ini yaitu partisipan kampanye Polibatam Diet Plastik. Hasil Tugas Akhir ini nantinya adalah komik digital sebagai media kampanye digital Polibatam Diet Plastik. ', 'Proposal'),
(159, 19, '-', '-', '-', 'Proposal'),
(160, 12, 'Media Pembelajaran Berbasis Motion Graphic Sebagai Alternatif Materi Mesin ESEC 3088 Untuk Teknik Manufaktur Elektronika Politeknik Negeri Batam', '-', 'Di era perkembangan teknologi yang semakin maju, teknologi informasi dan komunikasi mempunyai  peran penting dalam membuat sebuah media pembelajaran sebagai  penunjang pembelajaran dan materi dalam dunia pendidikan baik dari sekolah dasar hingga perguruan tinggi. Dalam menerapkan pembelajaran, pengajar dapat menggunakan berbagai media pembelajaran sebagai pendukung dalam melakukan proses pembelajaran, salah satunya adalah motion graphic. Media pembelajaran dalam bentuk motion graphic ini ditujukan kepada mahasiswa D-3  Teknik Manufaktur Elektronika dan dosen pengajar di TFME Polibatam. Motion graphic yang dibuat adalah tentang mesin ESEC 3088 yang digunakan sebagai mesin pengemasan rangkaian atau yang biasa disebut IC Packaging. Selama ini mahasiswa dan dosen Teknik Manufaktur Elektronika hanya menggunakan materi dari mesin ESEC 3088 dalam bentuk pdf dan word yang didapat dari e-learning. Materi pembelajaran dalam bentuk pdf atau word ini memiliki kelebihan dan juga kekurangan. Kelebihan materi pembelajaran dalam bentuk pdf atau word yaitu, dapat menyajikan materi dalam jumlah yang banyak, dapat dipelajari oleh para mahasiswa sesuai dengan kebutuhan, dapat dipelajari kapan dan dimana saja karena mudah untuk diakses melalui e-learning. Sedangkan kekurangan menggunakan materi pembelajaran dalam bentuk pdf atau word yaitu, proses pembuatannya membutuhkan waktu yang lama, dari wawancara formal yang penulis lakukakn kepada dosen pengajar dan juga mahasiswa Teknik Menufaktur Elektronika, didapatkan informasi tentang materi pembelajaran yang berformat pdf atau word dapat membuat mahasiswa yang membaca menjadi bosan karena materi berisi teks yang mendominasi dan dapat menghilangkan minat untuk membacanya. ', 'TA 1'),
(161, 1, '-', '-', '-', 'Proposal'),
(162, 13, '-', '-', '-', 'Proposal'),
(163, 38, '-', '-', '-', 'Proposal'),
(164, 12, 'MOTION GRAPHIC SEBAGAI MEDIA PROMOSI TIM MARKETING BATAM TV', '-', '-', 'Proposal'),
(165, 5, '-', '-', '-', 'Proposal'),
(166, 5, '-', '-', '-', 'Proposal'),
(167, 5, '-', '-', '-', 'Proposal'),
(168, 30, '-', '-', '-', 'Proposal'),
(169, 16, '-', '-', '-', 'Proposal'),
(170, 7, 'PERANCANGAN APLIKASI B-ETA (BATAM â€“ ESTIMATED TIME ARRIVAL) BUS TRANSIT', '-', 'PERANCANGAN APLIKASI B-ETA (BATAM â€“ ESTIMATED TIME ARRIVAL) BUS TRANSIT', 'Proposal'),
(171, 21, 'IMPLEMENTASI ROBOTIC PROCESS AUTOMATION  PADA PROSES REKAPITULASI INVOICE STUDI KASUS : PT. SCHNEIDER ELECTRIC MANUFACTURING BATAM', '-', 'PT. Schneider Electric Manufacturing Batam merupakan salah satu industri yang telah melakukan transformasi digital dengan berbagai solusi digital, salah satunya adalah digitalisasi rekapitulasi invoice untuk merekap invoice dengan menerapkan teknologi Robotic Process Automation. Robotic Process Automation yaitu perangkat lunak mampu menirukan aktivitas yang dilakukan oleh manusia dalam memproses atau memasukkan data secara otomatis dalam sistem komputer, sehingga dapat mengurangi tingkat kesalahan pada proses rekapitulasi dan waktu proses dibutuhkan menjadi lebih sedikit.\r\nPenelitian ini akan meriset dan mengembangkan aplikasi menggunakan teknologi robotic process automation untuk proses rekapitulasi invoice dengan menggunakan metode software development life cycle waterfall serta menguji tingkat efektivitas penggunaan robotic process automation dalam proses rekapitulasi invoice menggunakan metode pengujian grey-box.\r\nHasil penelitian ini menunjukan bahwa pengembangan aplikasi robotic process automation dapat menggunakan metode software development life cycle waterfall. Kemudian robotic process automation dapat digunakan pada proses untuk menyerap informasi, memvalidasi, dan merekapitulasi dokumen dengan tingkat efektivitas yang tinggi berdasarkan hasil rekapitulasi dokumen invoice. Sehingga berdasarkan hasil tersebut dapat disimpulkan bahwa pengembangan aplikasi dengan teknologi robotic process automation dapat menggunakan metode software development life cycle waterfall dan penggunaan robotic process automation dalam proses rekapitulasi invoice memiliki tingkat efektivitas yang tinggi.', 'Proposal'),
(172, 5, '-', '-', '-', 'Proposal'),
(173, 16, 'Food Photography dan Gaya Hidup Pengguna Instagram', '-', 'Tugas Akhir ini dilakukan untuk mengetahui pengaruh fenomena konten food photography di media sosial Instagram terhadap gaya hidup penggunanya dengan melakukan analisis. Nantinya peneliti akan melakukan pengumpulan data menggunakan kuisioner atau angket kepada beberapa responden. Hasil akhir Tugas Akhir ini akan menampilkan hasil seberapa besar pengaruh food photography terhadap gaya hidup pengguna Instagram.', 'TA 1'),
(174, 9, '-', '-', '-', 'Proposal'),
(175, 19, '-', '-', '-', 'Proposal'),
(176, 16, 'Penggunaan Teknik Motion Graphic Pada Video Perbandingan Kuliah Online Dan Kuliah Tatap Muka', '-', 'Perkembangan teknologi untuk media komunikasi sangat berpengaruh pada cepatnya orang menerima informasi. Motion graphic menjadi salah satu media untuk menyampaikan informasi yang efektif karena 95% orang lebih memahami sebuah informasi dalam bentuk visual. Dalam situasi pandemi covid-19 seperti ini pembelajaran diharuskan secara online sehingga banyak perubahan yang terjadi pada sistem perkuliahan. Banyak sisi positif dan negatif antara perkuliahan online dan tatap muka. Untuk itu  pada tugas akhir ini diberi judul â€œPenggunaan Teknik Motion Graphic pada Video Perbandingan Kuliah Online dan Kuliah Tatap Mukaâ€. Metode Penelitiannya menggunakan kuantitatif sedangkan metode pengembangan menggunakan metode luther sutopo yang memiliki 6 tahapan yaitu concept, design, material collecting, assembly, testing dan distribution. Pembuatan motion graphic menggunakan Adobe Premiere, Adobe After Effect, Adobe Photoshop, Corel Draw, dan Adobe Audition. Tujuan penelitian ini yaitu menggunakan teknik motion graphic pada video perbandingan kuliah online dan kuliah tatap muka . Untuk itu diharapkan  motion graphic ini dapat digunakan sebagai media informasi dan hiburan.', 'Proposal'),
(177, 19, '-', '-', '-', 'Proposal'),
(178, 40, 'ANALISIS DAN IMPLEMENTASI METODE PER CONNECTION QUEUE UNTUK MANAJEMEN BANDWIDTH ', '-', 'PCQ adalah metode yang berfungsi untuk membagi rata bandwidth untuk setiap sub-stream, sehingga metode ini cocok untuk jaringan yang memiliki jumlah komputer banyak dengan pembatasan bandwidth yang seragam.', 'TA 1'),
(179, 21, '-', '-', '-', 'Proposal'),
(180, 17, 'IMPLEMENTASI TEKNIK MIXING REAL VIDEO PADA MOTION GRAPHIC DALAM TAHAP  PRODUKSI UNTUK VIDEO PEMBELAJARAN MATA KULIAH DESAIN GRAFIS PRODI ANIMASI', '-', 'Penelitian ini bertujuan untuk mengetahui bagaimana cara  mengimplementasikan teknik mixing real video pada motion graphic dalam tahap produksi untuk video pembelajaran mata kuliah desain grafis Prodi Animasi serta analisis terhadap penerapan teknik yang digunakan pada video pembelajaran tersebut.', 'Proposal'),
(181, 15, 'E-BOOK PELAJARAN IPA BERBASIS MOBILE (STUDI KASUS: PELAJARAN IPA KELAS 5 SD)', '-', 'Buku Sekolah Elektronik (e-book) merupakan sebuah buku digital atau elektronik yang diharapkan dapat memudahkan proses pembelajaran peserta didik dimanapun dan kapanpun. Pembuatan e-book ini didasarkan karena pandemi covid-19 yang menyebabkan sekolah diliburkan dan pembelajaran tetap dilakukan dari rumah. Proses pembuatan ebook pada smartphone menggunakan Ionic Framework dengan dasar HTML, PHP, Javascript Frameword, AngularJS dan Node.js. Tujuan peneliti adalah untuk menyediakan sumber belajar alternatif berbasis mobile, serta untuk memahami dan mendalami minat belajar siswa terutama dalam menggunakan e-book IPA kelas 5 SD', 'Proposal'),
(182, 21, '-', '-', '-', 'Proposal'),
(183, 19, 'PEMANFAATAN KARTU MAHASISWA SEBAGAI MEDIA INFORMASI CERDAS BERBASIS ANDROID MENGGUNAKAN AUGMENTED REALITY', '-', '-', 'Proposal'),
(184, 19, '-', '-', '-', 'Proposal'),
(185, 17, 'PENERAPAN VIDEO SOSIALISASI MASYARAKAT ANTAR PULAU DALAM MENINGKATKAN PERSATUAN DAN KETERTIBAN SAAT BERKENDARA', '-', 'menentukan judul dan menentukan tujuan penelitian.', 'Proposal'),
(186, 30, '-', '-', '-', 'Proposal'),
(187, 5, 'Penerapan Dynamic Wheels Rigging Menggunakan Expression Autodesk MAYA 3D', '-', 'Rigging merupakan proses pembuatan struktur tulang pada model 3D, struktur tulang tersebut digunakan untuk memanipulasi objek untuk bergerak seperti menggerakkan boneka untuk animasi 3D, tidak hanya karakter 3D yang diberikan rig, rig juga diberikan pada properti, pada pembuatan rigging terdapat fungsi dynamic rig dimana dapat menggerakkan joint secara dinamis tanpa perlu di animasikan dengan manual oleh animator menggunakan controller dari sebuah rig. Dalam pembuatan animasi gerakan rotasi roda animator menghitung dan membuat keyframe tiap roda secara manual, dengan rig dinamik ini dapat mempermudah animator dalam membuat animasi gerakan roda tanpa menghitung dan membuat keyframe tiap roda tersebut dengan manual, untuk membuat gerakan dinamik dapat menggunakan fitur yang disediakan oleh Autodesk maya, menggunakan node Expression yang memiliki fungsi mengkalkulasikan variable untuk perputaran roda secara dinamis.', 'Proposal'),
(188, 21, 'PERANCANGAN SISTEM HOTSPOT MANAJEMEN BERBASIS VOUCHER MENGGUNAKAN MIKROTIK PADA JARINGAN RT/RW-NET DI ERA PANDEMI COVID-19', '-', 'melakukan perancangan sistem manajemen hotspot untuk kebutuhan internet murah berbasis voucher untuk membantu pengguna dikala pandemi untuk membantu kelas online seperti bekerja dan sekolah online', 'TA 1'),
(189, 19, '-', '-', '-', 'Proposal'),
(190, 16, '-', '-', '-', 'Proposal'),
(191, 36, 'MOTION GRAPHIC VIDEO SOSIALISASI COVID-19 DI ERA NEW NORMAL', '-', 'Ketika Covid-19 mulai muncul pada akhir tahun 2019 dan mulai mewabah dan meledak secara lokal di China pada akhir Januari 2020, dengan merebaknya virus corona hampir kurang lebih 200 negara di dunia \r\nterjangkit virus corona termasuk Indonesia. \r\nBerbagai negara melakukan kebijakan lockdown (karantina wilayah) untuk membatasi penyebaran virus ini. Namun, mengubah perilaku sosial masyarakat bukanlah pekerjaan mudah. Berbagai negara dengan segala keterbatasan \r\nmengalami kendala yang tidak sederhana, bahkan di negara-negara maju banyak mengalami kewalahan.\r\nPasca penerapan Pembatasan Sosial Berskala Besar (PSBB) guna mencegah penyebaran wabah Covid-19, maka muncul istilah lain yang dikenal publik, normal baru (new normal). Istilah new normal ini memang agak membingungkan publik karena sebelumnya istilah ini tidak dikenal di Indonesia. Apalagi istilah ini dikenalkan oleh negera-negara yang memang sudah melewati masa puncak pandemi Covid-19.\r\nMotion graphic dapat di jadikan alat untuk menyampaikan informasi kepada masyarakat, agar masyarakat paham tentang apa itu new normal dan \r\nbagaimana cara menghadapi pandemi di era new normal, karena dengan media komunikasi yang efektif dan menarik masyarakat juga bisa meminimalisir penyebaran covid-19, tidak adanya perkumpulan, berjabat tangan ataupun \r\nkontak secara langsung. Adanya sosialisasi melalui media motion graphic ini diharapkan nanti agar \r\nmasyarakat mengetahui tentang apa itu new normal dan bagaimana cara pencegahan covid-19 di era new normal . Oleh sebab itu diangkatlah tema Laporan dengan judul â€œMotion Graphic Video Sosialisasi di Era New Normalâ€.', 'Proposal'),
(192, 16, '-', '-', '-', 'Proposal'),
(193, 16, 'ANALISIS DAN PERANCANGAN ANIMASI PENDEK 2D TENTANG PENCEGAHAN VIRUS CORONA DI LINGKUNGAN POLIBATAM DENGAN TEKNIK FRAME BY FRAME', '-', 'Awal tahun 2020  seluruh umat manusia digoncang dengan pandemi dari virus corona (Covid-19) yang mempengaruhi kehidupan masyarakat dan menimbulkan kepanikan terhadap dunia. Ratusan pekerja dan pelajar yang ada di Batam terkena dampak dari virus corona yang dimana banyak tenaga kerja yang diberhentikan dan ditiadakan pembelajaran secara tatap muka untuk menghindari penyebaran virus corona. Untuk itu, pada Tugas Akhir ini  akan dirancang video animasi 2D untuk menginformasikan pencegahan virus corona di lingkungan Politeknik Negeri Batam. Dalam proses pembuatan video aniamasi 2D terdapat 3 tahapan yaitu Pra Produksi, Produksi, dan Pasca Produksi. Dalam pengembangannya menggunakan aplikasi TV Paint, Adobe Animate, Adobe Illustrator, dan Adobe Premiere untuk menyelesaikan pembuatan video animasi 2D. video animasi  2D berdurasi  2 sampai 3 menit menggunakan teknik animasi frame by frame. Animasi 2D ini diharapkan nanti dapat menginformasikan mengenai bahaya dan cara pencegahan virus corona di lingkungan kampus Politeknik Negeri Batam.', 'Proposal'),
(194, 21, 'PERANCANGAN DAN IMPLEMENTASI APLIKASI LAYANAN PELANGGAN ONLINE DI PLN BATAM AREA NAGOYA', '-', 'Pada aplikasi pelayanan pelanggan di PLN Batam area Nagoya ini, kita akan membuat aplikasi berbasis web untuk memudahkan proses bisnis di PLN Batam area Nagoya. Dimana nantinya pelanggan bisa mengajukan permohonan layanan selayaknya melalui Customer Service tetapi dengan online.', 'TA 1'),
(195, 15, '-', '-', '-', 'Proposal'),
(196, 17, 'Pengembangan video pembuatan sim terhadap masa adaptasi kebiasaan baru di kota batam.', '-', 'Menentukan judul yang akan di lanjutkan dengan pembuatan proposal yang akan di teliti.', 'Proposal'),
(197, 15, 'APLIKASI EMS BERBASIS WEB', '-', '-', 'Proposal'),
(198, 16, '-', '-', '-', 'Proposal'),
(199, 16, 'PENGGUNAAN MEDIA ANIMASI BERBASIS 2D UNTUK PENGURANGAN SAMPAH PLASTIK DI POLITEKNIK NEGERI BATAM MENGGUNAKAN APLIKASI TV PAINT', '-', 'Penulis memproduksi video animasi berdasarkan 3 tahap yaitu pra-produksi, produksi, dan pasca produski. Setelah naskah dan storyboard, tahap selanjtunya adalah proses produksi animasi menggunakan software TV Paint dan Adobe Flash CS6, setelah proses rendering selanjutnya proses editing berdasarkan scene menggunakan software Adobe Premiere CS6. Hasil editing akan disimpan dalam bentuk file MP4', 'Proposal'),
(200, 17, '-', '-', '-', 'Proposal'),
(201, 15, '-', '-', '-', 'Proposal'),
(202, 9, 'Implementasi Metode Scrum dalam Pengembangan Game 3D Keris Empu Gandring', '-', ' Seiring dengan berkembangnya teknologi dan peluang saat ini, Indonesia turut andil dalam mendorong perkembangan indsutri game baik dari sisi konsumen maupun produksen. Namun, sedikitnya developer game di Indonesia menjadikan negara ini kurang unggul dalam bidang produksen. Hal itu dikarenakan tingginya biyaya dan resiko kegagalan dalam pengembangan suatu proyek game. Maka dari itu, untuk meminimalisir kegagalan diperlukan metode pengembangan yang tanggap terhadap perubahan. Pada tahun ajaran 2020 di Politeknik Negeri Batam untuk pertama kalinya mata kuliah Proyek Internal khususnya dibidang pengembangan game menerapkan Metode Scrum dalam proses pengembangannya. Scrum merupakan metode pengembangan perangkat lunak yang tanggap dalam menangani setiap perubahan dan menekankan pada proses iterasi yang menghasilkan produk berupa incremental product karena scrum merupakan pengembangan perangkat lunak yang menggunakan prinsipprinsip pendekatan Agile. Berdasarkan hal tersebut penulis tertarik menjadikan topik ini ke dalam penyusunan skripsi dengan judul â€œImplementasi Metode Scrum dalam Pengembangan Game 3D Keris Empu Gandringâ€. Dengan mengimplementasikan Metode Scrum penulis ingin mengetahui apakah metode tersebut mempunyai pengaruh yang signifikan dalam pengembangan game khususnya di lab game Politeknik Negeri Batam.', 'Proposal'),
(203, 36, '-', '-', '-', 'Proposal'),
(204, 16, 'Penerapan Nilai Estetika Teknik Fotografi Still Life Pada Produk  Makanan Homemade Atau Food Photography', '-', 'Di era modernisasi ini, agar dapat berjualan di sosial media memerlukan sebuah foto untuk menampilkan produk yang akan dipasarkan atau dijual. Dikarenakan sistem penjualannya adalah online, calon pembeli tidak dapat menyentuh barang secara langsung, maka dari itu foto produk merupakan salah satu acuan bagi calon pembeli untuk dapat melihat produk secara rinci sebelum berbelanja secara online. Banyak pemilik usaha homemade yang mengalami kesulitan dalam hal pemasaran, kebanyakan masalah yang dihadapi dikarenakan foto produk yang diunggah tidak menarik, foto tidak jelas atau blur, gelap, serta tidak seusai dengan estetika fotografi. Hal ini menyebabkan daya tarik sebuah produk terhadap konsumen menjadi berkurang. Penelitian ini bertujuan untuk mendeskripsikan penerapan nilai estetika teknik fotografi still life pada produk makanan homemade atau food photography yang merujuk pada unsur-unsur estetika menurut teori A.A.M. Djelantik, yang terdiri dari wujud, isi, dan penyajian. Penelitian ini menggunakan metode deskriptif kualitatif dan data pada penelitian ini yaitu beruba unsur-unsur nilai estetika yang didapat melalui proses pengumpulan dokumen dan wawancara dengan pemilik Dapur Umi.', 'Proposal'),
(205, 36, '-', '-', '-', 'Proposal'),
(206, 9, '-', '-', '-', 'Proposal'),
(207, 14, 'ANALISIS SEMIOTIKA PADA FILM SWING KIDS', '-', '-', 'Proposal'),
(208, 36, '-', '-', '-', 'Proposal'),
(209, 1, '-', '-', '-', 'Proposal'),
(210, 5, '-', '-', '-', 'Proposal'),
(211, 9, 'PERANCANGAN HUMAN RESOURCE INFORMATION SYSTEM (HRIS) BERBASIS WEB PADA YAYASAN DARUSSALAM BATAM', '-', '-', 'Proposal'),
(212, 36, '-', '-', '-', 'Proposal'),
(213, 8, 'PERANCANGAN SISTEM INFORMASI PERPANAHAN KEPULAUAN RIAU SEBAGAI MEDIA PROMOSI BERBASIS WEBSITE', '-', 'Panahan dahulu merupakan alat berburu untuk mencari makan dan bertahan hidup, juga dijadikan sebagai senjata perang yang kemudian sekarang digemari sebagai salah satu cabang olahraga. Panahan dapat digunakan berbagai usia dari anak-anak hingga orang dewasa. Dibentuklah sebuah Organisasi Perpanahan Kepulauan Riau untuk perkumpulan penggemar olahraga ini.Seperti biasa, tentunya organisasi pasti memiliki jadwal tersendiri untuk kegiatan agenda didalamnya seperti Pelatihan, Mini Liga, dan Kejuaraan yang pastinya harus diketahui oleh para anggota organisasi tersebut. Karena itu, untuk mempermudah dan mempercepat pendistribusian informasi, dirancanglah sebuah sistem informasi berbasis web menggunakan PHP dan MYSQL dengan data integrasi yang menyertakan jadwal kegiatan organisasi perpanahan ini. Sistem ini juga berguna sebagai media promosi kepada para pengunjung nantinya yang ingin bergabung organisasi perpanahan ini.', 'Proposal'),
(214, 13, '-', '-', '-', 'Proposal'),
(215, 9, '-', '-', '-', 'Proposal'),
(216, 13, '-', '-', '-', 'Proposal'),
(217, 8, 'Pengembangan Sistem Informasi Sekolah Sepak Bola Tunas Jaya Duriangkang Berbasis Website', '-', 'Sepak bola merupakan salah satu cabang olahraga yang paling terkenal di dunia. Di Indonesia, olahraga ini sudah menjadi sebuah permainan yang disukai\r\nmasyarakat dari berbagai lapisan umur. Hingga Sekolah Sepak Bola menjadi suatu cara untuk menyalurkan bakat dengan ikut bergabung dengan klub tersebut dan\r\nikut bertanding di turnamen. Namun masih terdapat ketertinggalan teknologi dari penyampaian informasi, proses pendaftaran sampai mengetahui update terkini\r\ntentang suatu turnamen. Oleh karena itu, perlu adanya sistem untuk mempermudah proses penyampaian segala informasi mengenai hal apa saja yang\r\nterkait dengan Sekolah Sepak Bola Tunas Jaya Duriangkang. Implementasi dari pembuatan sebuah sistem informasi sekolah sepak bola berbasis website\r\nmenggunakan PHP dan MySQL yang mampu memberikan informasi mengenai data statistik pertandingan dari turnamen secara lengkap dan dapat diakses dengan\r\ncepat oleh para aktor sepak bola, juga memberikan kemudahan dalam proses pendaftaran secara online. ', 'TA 1'),
(218, 9, 'PERANCANGAN SISTEM INFORMASI TEMPAT PEMBUANGAN SEMENTARA DI KOTA BATAM BERBASIS WEB', '-', 'Semakin bertambahnya jumlah penduduk setiap tahunnya, dikarenakan urbanisasi ataupun tingkat kelahiran yang tinggi, mengakibatkan permasalahan sampah pada lingkungan Kota Batam secara kompleks. Penyebab terjadinya hal tersebut dikarenakan minimnya informasi dan ketidaktahuan masyarakat akan lokasi pembuangan sampah terdekat di daerah tempat tinggal mereka dan akhirnya membuang sampah sembarangan. Oleh karena itu, dirancanglah sebuah sistem informasi tempat pembuangan sementara berbasis web. Di dalam web ini terdapat lokasi dan jadwal pengangkutan sampah yang dapat diakses masyarakat sehingga bisa secara tepat mengemas sampah yang akan dibuang. Tujuan dari penelitian ini adalah untuk kelestarian lingkungan, budaya hidup, dan lingkungan sehat, juga mengurangi polusi udara di Kota Batam.', 'TA 1'),
(219, 13, '-', '-', '-', 'Proposal'),
(220, 13, '-', '-', '-', 'Proposal'),
(221, 9, '-', '-', '-', 'Proposal'),
(222, 32, 'Efektivitas Tayangan YouTube Batam TV Sebagai Media Informasi', '-', 'Penemuan berbagai macam teknologi informasi memudahkan seseorang dalam mencari informasi dengan waktu yang cepat. Kecanggihan teknologi ini semakin memudahkan kita untuk mengakses segala sesuatu yang bisa dilihat melalui internet. Di dalam internet terdapat media sosial, yang antara lain adalah YouTube. Fenomena penggunaan internet yang berkembang, khususnya YouTube, jelas dimanfaatkan oleh perusahaan media dengan membuat akun YouTube untuk menyebarkan berita tentang videonya, salah satunya Batam TV. Penelitian ini bertujuan untuk mengetahui seberapa efektif Batam TV menyebarkan informasi melalui YouTube, pendapat penonton terkait gambaran ideal YouTube Batam TV sebagai media penyebaran informasi saat ini, dan kendala Batam TV dalam menyebarkan informasi melalui YouTube.', 'Proposal'),
(223, 32, '-', '-', '-', 'Proposal'),
(224, 32, '-', '-', '-', 'Proposal'),
(225, 32, '-', '-', '-', 'Proposal'),
(226, 39, 'APLIKASI PERPUSTAKAAN TERINTEGRASI ANTAR PLATFORM MENGGUNAKAN WEB SERVICE', '-', 'APLIKASI PERPUSTAKAAN TERINTEGRASI ANTAR PLATFORM MENGGUNAKAN WEB SERVICE merupakan suatu aplikasi yang dapat meminjam atau mengembalikan buku di perpustakaan dengan akses antar platform, sehingga dapat diakses dimana saja dan kapan saja. Aplikasi ini juga hanya menggunakan satu database yang terpusat (master) sehingga tidak terjadinya perbedaan data disetiap perangkat yang berbeda.', 'Proposal'),
(227, 17, '-', '-', '-', 'Proposal'),
(228, 19, '-', '-', '-', 'Proposal'),
(229, 9, '-', '-', '-', 'Proposal'),
(230, 15, 'E-PROMOSI SEKOLAH DALAM BENTUK MOTION GRAPHIC  (Studi Kasus: Sekolah Mondial Batam)', '-', 'Motion Graphic Sekolah Mondial Batam sebagai Media Promosi, Pembuatannya menggunakan Metode Villamil-Molina.\r\nProduk tersebut dianalisis dengan aspek-aspek motion graphic dan Kelayakan produk sebagai media promosi menggunakan EPIC Model\r\n', 'Proposal'),
(231, 36, '-', '-', '-', 'Proposal'),
(232, 21, 'ANALISIS DAN PERANCANGAN APLIKASI PEMESANAN CATERING BERBASIS MOBILE ANDROID DENGAN TEKNOLOGI FIREBASE REALTIME DATABASE', '-', 'Pemesanan catering merupakan suatu aktivitas yang dilakukan pelanggan untuk membeli produk berupa paket makanan. Proses pemesanan catering dilakukan oleh pelanggan melalui komunikasi secara tidak langsung lewat media atau perantara tertentu sebagai sarana untuk melakukan proses transaksi seperti telepon, ataupun sosial media.', 'TA 1'),
(233, 28, '-', '-', '-', 'Proposal'),
(234, 35, 'SISTEM INFORMASI INVENTORY DRY LENS UNTUK LENSA KONTAK BERBASIS WEB', '-', 'Masalah yang terjadi adalah personel planning sering menggunakan nomor batch dan nomor cavity yang sama saat melakukan orderan ke produksi. Data yang tersimpan di file Microsoft excel sangat tidak efektif karena jika terjadi kesalahan pada saat data di sort ataupun diolah maka akan menyebabkan data menjadi tidak sesuai lagi dengan actual dry lens yang tersedia sehingga terjadi kesalahan pada saat membuat orderan ke produksi. Solusi untuk mengatasi hal ini yaitu membutuhkan sebuah sistem informasi manajemen inventory yang dapat menjalankan proses orderan menjadi benar sehingga tidak ada kesalahan pada pengambilan oleh pihak warehouse saat pengiriman dry lens ke produksi. Berdasarkan permasalahan yang diuraikan di atas maka dibutuhkan suatu aplikasi inventory dry lens per cavity. Perancangan aplikasi ini menggunakan Bahasa pemrograman Php dan MySql sebagai databasenya. Aplikasi inventory dry lens ini dimaksudkan agar personel planning dapat melakukan proses pengolahan data dry lens dengan tepat. Selain itu diharapkan bisa memberikan informasi cavity yang sesuai saat membuat orderan ke produksi dan pengambilan dan pengiriman dry lens oleh pihak warehouse.', 'TA 1'),
(235, 1, 'RANCANG BANGUN SISTEM INFORMASI IZIN KELUAR DORMITORY BERBASIS WEB (STUDY KASUS PADA DORMITORY BLOK P)', '-', 'Sulitnya mencari data riwayat izin keluar penghuni dormitory dan juga data riwayat izin sering rusak karna masih dalam bentuk kertas. Dalam sistem informasi ini di harapkan dapat memberikan informasi berupa data penghuni dormitory dan riawayat izin keluar di dormitory blok P.  Metode yang akan digunakan dalam pengembangan perangkat dalam penelitian ini adalah metode User Centered Design (UCD). Penelitian akan mengumpulkan data dengan melakukan wawancara dengan penghuni dormitory dan pengawas dormitory.', 'TA 1'),
(236, 14, 'PERANCANGAN SISTEM INFORMASI INVENTORY STOK PADA PT.DINAMIKA ANUGERAH BERBASIS WEB', '-', 'Manajamen Inventory telah menjadi hal yang sangat penting didalam sebuah perusahaan dimanapun, dan dengan perkembangan terkini, teknologi informasi telah membantu para Manajer untuk mendapatkan informasi yang akurat, aktual dan bisa dibuktikan kebenaran data tersebut kapan saja. \r\nNamun yang menjadi kendala bagi PT. DINAMIKA adalah pencataan barang masuk dan berang keluar yang masih dilakukan secara manual. Bagian admin gudang yang bertugas untuk melakukan pencatatan akan data barang yang masuk dan barang keluar. Hal tersebut telah mengakibatkan kinerja yang kurang efisien dan sering data yang dilaporkan tidak akurat. Pada dasarnya, manajemen persediaan barang selalu berurusan dengan masalah seberapa banyak barang yang tersedia dan seberapa sering menyusun ulang informasi inventory untuk memberikan dampak yang besar pada daya tanggap pelanggan. Oleh sebab itu setiap proses manual dari perusahaan akn digantikan oleh sistem yang komputerisasi untuk mempermudah atau mendukung dalam proses pengambilan keputusan yang akan dilakukan manajemen. Sistem yang akan dibuat akan memudahkan kita untuk melakukan pengolahan data yang dapat menghemat waktu, datanya akurat dan menghindari Human Error. Dan hasil suatu informasi yang di peroleh akan sangat memuaskan dan bermaanfaat dan efisien bagi perusahaan.  \r\nPenulis berharap sistem ini dapat membantu dan  mempermudah dproses pencatatan penerimaan barang dan pencatatan data pengeluaran barang di bagian store. \r\n', 'TA 1'),
(237, 1, '-', '-', '-', 'Proposal'),
(238, 14, 'PERANCANGAN TEMPAT SAMPAH OTOMATIS PEMILAH SAMPAH ORGANIK DAN ANORGANIK MENGGUNAKAN ARDUINO', '-', 'Pada pembuangan sampah biasanya manusia menggabungkan sampah organik dan anorganik dalam satu wadah , Hal ini dapat mengakibatkan pencemaran lingkungan dan juga mempersulit pemerintah untuk mengolah sampah-sampah tersebut.Untuk itu  penelitian ini dilakukan untuk mengatasi persoalan yang ada, dengan menciptakan tempat sampah otomatis yang dapat memilah sampah organik dan anorganik.', 'Proposal'),
(239, 39, 'APLIKASI PEMBELAJARAN BAHASA INGGRIS BERBASIS SISTEM OPERASI ANDROID', '-', 'Bahasa Inggris merupakan bahasa internasional yang dapat digunakan di banyak negara. Hal tersebut merupakan salah satu dari alasan mengapa mempelajari bahasa inggris menjadi suatu tuntutan dan keharusan. Banyak perusahaan multinasional yang menjadikan keterampilan berbahasa Inggris menjadi poin penting dan persyaratan saat perekrutan karyawan.', 'TA 1'),
(240, 28, '-', '-', '-', 'Proposal'),
(241, 39, 'Rancang Bangun SIRUSUN (Sistem informasi rumah susun) Berbasis Web (Studi Kasus : Rusun Muka Kuning, Batam)', '-', 'Rumah susun dapat menjadi tempat tinggal untuk ribuan orang sekaligus karena konsepnya yang dibuat bertingkat-tingkat. Rusun Muka Kuning adalah salah satu rumah susun yang berlokasi di Batam dengan kapasitas penghuni mencapai 2.304 orang. Dengan adanya ribuan penghuni di rumah susun, permasalahan utama yang terjadi adalah segala urusan administrasi tagihan sewa, listrik, dan air dilakukan dengan mendatangi bagian administrasi rumah susun setiap bulan. Pelaporan kerusakan juga dilakukan dengan mendatangi bagian maintenance untuk melaporkan kerusakan. Dalam penelitian ini, masalah-masalah ini dapat diselesaikan dengan membangun sebuah Sistem Informasi Rumah Susun (SIRUSUN) berbasis website sehingga SIRUSUN bisa menjadi jembatan untuk berbagi informasi antara bagian administrasi rumah susun dengan penghuni untuk melakukan pembayaran tagihan sewa, listrik, dan air. Sistem Informasi Rumah Susun (SIRUSUN) ini dapat menjadi penghubung bagi penghuni rumah susun dengan bagian maintenance untuk melakukan pelaporan kerusakan sehingga nantinya seluruh elemen di Rusun Muka Kuning Batam merasa terbantu, nyaman, dan efektif saat melakukan pembayaran tagihan atau saat melaporkan kerusakan. ', 'Proposal'),
(242, 1, 'Sistem Monitoring Penjualan dan Persediaan Barang pada Marketplace dengan REST API', '-', 'Toko Grosir Batam adalah salah satu toko yang menjual produknya di banyak marketplace mengalami kendala khususnya dalam mengatur persediaan barang. Mengelola dan mendata barang akan sulit untuk di kontrol dikarenakan stok barang yang terbagi-bagi di banyak marketplace. Tidak sedikit juga customer yang datang langsung ke toko untuk membeli secara offline sehingga mempengaruhi jumlah stok yang dijual pada marketplace. Dalam penelitian ini, masalah-masalah ini dapat diselesaikan dengan membangun sistem yang mampu mengelola penjualan dan persediaan barang yang akan dijual di banyak marketplace. Penelitian ini bertujuan untuk membuat sistem monitoring penjualan dan persediaan barang berbasis web dengan REST API. Hasil akhir dalam membangun sistem monitoring penjualan dan persediaan barang ini diharapkan mampu mempermudah dalam mengelola dan mendata persediaan stok barang yang dimiliki, menghasilkan tampilan dan fungsionalitas yang maksimal. Metode-metode Waterfall yang digunakan dalam pengembangan sistem infomasi ini adalah wawancara dan black box testing.', 'TA 1'),
(243, 39, 'APLIKASI BERBAGI TUMPANGAN KENDARAAN BERBASIS  ANDROID UNTUK CIVITAS POLIBATAM', '-', 'Aplikasi mobile ride sharing dengan studi kasus civitas akademika polibatam untuk saling berbagi tumpangan', 'Proposal'),
(244, 24, '-', '-', '-', 'Proposal'),
(245, 40, 'APLIKASI MARKETPLACE BERBASIS CUSTOMER TO CUSTOMER (C2C) UNTUK LAPAK USAHA LOKAL BATAM', '-', 'Pandemi Covid-19 sedang mewabah di seluruh dunia termasuk Indonesia.Pandemi ini menyebabkan penurunan ekonomi di Indonesia, hal tersebut menyebabkan banyak perusahaan yang tutup dan terjadi pemutus hubungan kerja (PHK) secara besar-besaran pada masyarakat yang berstatus buruh atau karyawan. salah satunya yang terkena dampak tersebut adalah kota Batam. Sebagian dari mereka ingin beralih membuka lapak untuk berjualan, tetapi diantaranya tidak memiliki tempat berdagang seperti ruko dan toko. Dari permasalahan tersebut penulis ingin membuat sebuah aplikasi marketplace secara online di kota Batam dimana aplikasi ini menerapkan model bisnis customer to customer (C2C) yaitu dimana konsumen juga bisa menjadi pelapak atau penjual secara mudah dengan sekali registrasi dan bersifat gratis. Dalam aplikasi ini memiliki memanfaatkan fitur pembayaran Cash On Delivery (COD) dalam hal transaksi. Selain itu dengan aplikasi ini dapat membantu pelapak dalam mempromosikan produk dagangannya secara luas dan mudah di daerah kota Batam. Berdasarkan hal tersebut maka penulis membuat tugas akhir dengan judul yang diambil dalam rangka penyusunan tugas akhir ini Aplikasi Marketplace Berbasis Customer to Customer Untuk Lapak Usaha Lokal .', 'Proposal'),
(246, 1, '-', '-', '-', 'Proposal'),
(247, 1, 'APLIKASI AUDIT CHECK LIST QUALITY ASSURANCE', '-', 'Aplikasi yang digunakan oleh QA untuk melakukan audit check list untuk monitoring proses dan hasil kerja operator produksi.', 'Proposal'),
(248, 14, 'SISTEM PELACAKAN MOBIL PADA WEBSITE RENTAL MOBIL', '-', 'Diharapkan dengan adanya sistem informasi persewaan mobil berbasis web di IG Rental maka promosi, persewaan mobil dapat dilakukan secara akurat dan cepat sehingga menghasilkan informasi yang dapat membantu perusahaan dan konsumen', 'TA 1'),
(249, 14, 'Perancangan Sistem Informasi Pengambilan Cuti Karyawan Berbasis Web', '-', 'Seiring perkembangan jaman, telah banyak dilakukan penerapan teknologi informasi diberbagai perusahaan maupun instansi. Pemanfaatan teknologi informasi akan mempermudah dalam pengolaan data, menghemat waktu dan biaya. Selain itu sistem informasi juga menjadi sarana promosi yang efisien dan dapat diakses dimana saja oleh pengguna internet.\r\nSalah satu permasalahan yang dihadapi perusahaan adalah pemrosesan data, khususnya pada bagian kepegawaian yang masih dilakukan secara manual, dimana dalam proses permintaan maupun membuat laporan cuti bulanan masih menggunakan ms.word atau ms.excel sehingga sering kali menghadapi permasalahan dalam penulisan pada form lembar cuti yang menyebabkan salah dalam proses input data selanjutnya. Berdasarkan pemikiran diatas penulis tertarik untuk membangun system yang diharapkan dapat membantu pihak perusahaan dalam kelancaran proses cuti karyawan .', 'Proposal'),
(250, 29, 'Aplikasi Monitoring Kalibrasi Alat Ukur di PT Pertamina Patra Niaga Kabil', '-', 'Aplikasi yang dapat mempermudah dalam pengajuan kalibrasi alat ukur terhadap 2 lembaga pemerintah yakni PT Pertamina Patra Niaga dan UPTD Metrologi Batam', 'TA 1'),
(251, 1, 'Sistem Informasi Manajemen Kos di Kos Balqis', '-', 'Sistem ini di khususkan untuk pemilik kos agar dapat memanajemen dan mengelola kos mereka sendiri melalui web dan juga penyewa kos dalam hal konfirmasi pembayaran serta calon penyewa kos untuk memesan kamar kost.', 'Proposal'),
(252, 14, 'RANCANGAN ALAT PENGUKUR SUHU TUBUH UNTUK MEMASUKI TEMPAT KERJA BERBASIS IOT', '-', 'Seiring dengan adanya pandemik Covid-19 yang sedang mewabah di Indonesia bahkan di seluruh dunia. Sudah menjadi suatu kewajiban untuk menjaga Kesehatan diri sendiri dengan mamatuhi protokol Kesehatan yang sudah diterapkan. Internet of thing (IoT) menjadi suatu pilihan yang sangat dibutuhkan sebagai teknologi yang dapat menunjang berlakunya protokol Kesehatan. Dengan teknologi tersebut, setiap piranti yang kita miliki nantinya bisa terhubung dengan internet, sehingga bisa dimonitoring dari jarak jauh melalui database dengan menggunakan web. Perancangan dan pembuatan alat pengukur suhu tubuh menjadi hal yang sangat dibutuhkan oleh perusahaan untuk mempermudah monitoring suhu setiap karyawan yang akan memasuki area perusahaan. Alat pengukur suhu ini menggunakan mikrokontroler NodeMCu dan sensor MLX90614 Contactless IR Thermometer dengan output hasil pengukuran suhu badan.', 'TA 1'),
(253, 40, 'SISTEM PEMBAYARAN MENGGUNAKAN QR CODE PADA APLIKASI BERBASIS MOBILE', '-', '-', 'Proposal');
INSERT INTO `tb_tugas_akhir` (`id_mhs`, `id_dosen`, `judul`, `judul_inggris`, `deskripsi`, `status`) VALUES
(254, 40, 'Perancangan Sistem Pengaman Sepeda Motor Menggunakan Arduino dan SmartPhone Android', '-', '-', 'TA 1'),
(255, 22, '-', '-', '-', 'Proposal'),
(256, 40, 'Perancangan Sistem Informasi Aplikasi Barbershop  Berbasis Mobile', '-', '-', 'Proposal'),
(257, 32, '-', '-', '-', 'Proposal'),
(258, 1, '-', '-', '-', 'Proposal'),
(259, 41, '-', '-', '-', 'Proposal'),
(260, 41, 'KAJIAN PERBANDINGAN LUAS DAN NJOP HASIL PENGUKURAN BIDANG TANAH MENGGUNAKAN GPS RTK-RADIO DAN RTK-NTRIP', '-', '-', 'Proposal'),
(261, 34, '-', '-', '-', 'Proposal'),
(262, 11, '-', '-', '-', 'Proposal'),
(263, 34, '-', '-', '-', 'Proposal'),
(264, 11, '-', '-', '-', 'Proposal'),
(265, 33, '-', '-', '-', 'Proposal'),
(266, 41, '-', '-', '-', 'Proposal'),
(267, 20, '-', '-', '-', 'Proposal'),
(268, 20, '-', '-', '-', 'Proposal'),
(269, 34, '-', '-', '-', 'Proposal'),
(270, 11, '-', '-', '-', 'Proposal'),
(271, 11, '-', '-', '-', 'Proposal'),
(272, 33, 'Pemetaan Daerah Rawan Kriminalitas di Kota Batam Tahun 2019 Menggunakan Metode K-Means Clustering dan Kernel Density Clustering', '-', '-', 'Proposal'),
(273, 11, '-', '-', '-', 'Proposal'),
(274, 34, '-', '-', '-', 'Proposal'),
(275, 20, '-', '-', '-', 'Proposal'),
(276, 34, '-', '-', '-', 'Proposal'),
(277, 11, '-', '-', '-', 'Proposal'),
(278, 20, '-', '-', '-', 'Proposal'),
(279, 25, '-', '-', '-', 'Proposal'),
(280, 41, '-', '-', '-', 'Proposal'),
(281, 33, 'Pendefinisian Perairan Pedalaman di Dalam Garis Penutup di Pulau Sulawesi Menurut UNCLOS 1982', '-', '-', 'Proposal'),
(282, 33, 'KAJIAN PEMODELAN PERGERAKAN ARUS LAUT PERMUKAAN DI PERAIRAN INDONESIA TAHUN 2016-2020 MENGGUNAKAN DATA SATELIT ALTIMETRI JASON-3', '-', '-', 'Proposal'),
(283, 33, 'Kajian Laju Erosi Dengan Metode Universal Soil Loss Equation (USLE) Pada Daerah Tangkapan Air (DTA)  Waduk Duriangkang', '-', 'Penelitian ini menggunakan parameter curah hujan, kemiringan lereng dan panjang lereng, tutupan lahan, dan jenis tanah.  Metode yang digunakan ialah metode Universal Soil Loss Equation. Penelitian ini bertujuan untuk menghitung besar laju erosi serta tingkat erosi pada daerah tangkapan air Waduk Duriangkang. Hasil akhir yang akan diperoleh dari penelitian ini adalah peta sebaran laju erosi serta peta tingkat erosi pada daerah tangkapan air Waduk Duriangkang.', 'Proposal'),
(284, 20, 'Aplikasi Sistem Informasi Geografis Untuk Menyusun Model Bahaya Erosi di Pulau Batam', '-', '-Data yang dipakai berupa peta kemiringan lereng, peta penggunaan lahan, peta jenis tanah dan peta curah hujan di Pulau Batam dengan memakai Metode pengolahan data yang digunakan adalah pembobotan terhadap data, untuk mendapatkan kategori bahaya erosi dan skor sehingga menghasilkan peta model bahaya erosi dua dimensi. Untuk mendapatkan Pemodelan tiga dimensi berupa peta model secara digital (DEM) dengan tampilan tiga dimensi yang dihasilkan dari hasil skoring yang diolah melalui Digital Elevation Model (DEM) menggunakan metode Triangulated Irregular Network (TIN) dan menggunakan data kontur yang dihasilkan. ', 'Proposal'),
(285, 33, '-', '-', '-', 'Proposal'),
(286, 33, '-', '-', '-', 'Proposal'),
(287, 42, '-', '-', '-', 'Proposal'),
(288, 42, '-', '-', '-', 'Proposal'),
(289, 34, '-', '-', '-', 'Proposal'),
(290, 41, '-', '-', '-', 'Proposal'),
(291, 20, 'Pemanfaatan Citra Landsat 8  Untuk Pemetaan Perubahan Garis Pantai Dengan Metode Digital Shoreline Analysis System (DSAS) (Studi kasus Pulau Batam)', '-', '-', 'TA 1'),
(292, 42, '-', '-', '-', 'Proposal'),
(293, 41, 'PEMBUATAN PETA ZONA NILAI TANAH (ZNT) BERDASARKAN NILAI INDIKASI RATA-RATA (NIR) (Studi kasus : Kec. Lubuk Baja)', '-', '-', 'Proposal'),
(294, 20, 'PEMETAAN PERUBAHAN PENGGUNAAN LAHAN TERHADAP LUAS DAERAH RESAPAN AIR DI DAM DURIANGKANG TAHUN 2015 - 2020', '-', '-', 'TA 1'),
(295, 41, 'EVALUASI RUTE BUS TRANS BATAM DENGAN MENGGUNAKAN SISTEM INFORMASI GEOGRAFIS', '-', '-', 'Proposal'),
(296, 34, 'PEMETAAN KESESUAIAN LAHAN TAMBAK, KONSERVASI, DAN PERMUKIMAN KAWASAN WILAYAH PESISIR  (STUDI KASUS : PULAU ABANG, KECAMATAN GALANG, KOTA BATAM)', '-', '-', 'Proposal'),
(297, 20, 'PEMETAAN PERUBAHAN ZONA NILAI TANAH DI WILAYAH KABUPATEN KARIMUN', '-', '-', 'TA 1'),
(298, 33, '-', '-', '-', 'Proposal'),
(299, 42, '-', '-', '-', 'Proposal'),
(300, 41, '-', '-', '-', 'Proposal'),
(301, 20, 'Aplikasi Pgrouting Untuk Penentuan Jalur Optimum Dalam Mobilisasi Korban Kecelakaan Lalu Lintas Menuju Rumah Sakit', '-', '-', 'Proposal'),
(302, 25, '-', '-', '-', 'Proposal'),
(303, 42, 'Pemanfaatan Sistem Informasi Geografis Dalam  Pemetaan Persebaran Tower Telekomunikasi  Didaerah Permukiman Warga Yang Terkana  Dampak Radiasi Di Kota Batam', '-', '-', 'Proposal'),
(304, 33, '-', '-', '-', 'Proposal'),
(305, 41, '-', '-', '-', 'Proposal'),
(306, 25, '-', '-', '-', 'Proposal'),
(307, 42, '-', '-', '-', 'Proposal'),
(308, 42, 'PEMANFAATAN SISTEM INFORMASI GEOGRAFIS UNTUK DESAIN KAMPUS POLITEKNIK NEGERI BATAM BERBASIS WEBGIS', '-', 'Memvisualisasikan Kampus Politeknik Negeri Batam dalam bentuk website berbasis SIG', 'Proposal'),
(309, 34, '-', '-', '-', 'Proposal'),
(310, 34, '-', '-', '-', 'Proposal'),
(311, 11, '-', '-', '-', 'Proposal'),
(312, 42, '-', '-', '-', 'Proposal'),
(313, 42, '-', '-', '-', 'Proposal'),
(314, 37, '-', '-', '-', 'Proposal'),
(315, 25, '-', '-', '-', 'Proposal'),
(316, 37, '-', '-', '-', 'Proposal'),
(317, 37, '-', '-', '-', 'Proposal'),
(318, 37, '-', '-', '-', 'Proposal'),
(319, 25, '-', '-', '-', 'Proposal'),
(320, 37, '-', '-', '-', 'Proposal'),
(321, 25, '-', '-', '-', 'Proposal'),
(322, 37, '-', '-', '-', 'Proposal'),
(323, 25, '-', '-', '-', 'Proposal'),
(324, 37, '-', '-', '-', 'Proposal'),
(325, 25, '-', '-', '-', 'Proposal'),
(326, 25, '-', '-', '-', 'Proposal'),
(327, 37, '-', '-', '-', 'Proposal'),
(331, 40, 'Aplikasi Trasher', '-', 'merupakan aplikasi pembelajaran mengenai pemilahan sampah-sampah. aplikasi ini dibuat sebagai penunjang pembelaran tentang mengenal jenis-jenis sampah dan pembagiannya', 'TA 1'),
(333, 29, 'Aplikasi Pemesanan Unit dan Web Catalog CAPELLA ISUZU BATAM', '-', 'Sebuah aplikasi yang di rancang untuk sistem marketing di kantor Isuzu Capella Batam  yang dapat di akses melalui dekstop dan smartphone yang berfungsi untuk menampilkan catalog penjualan dan melakukan orderan /pesanan unit. yang bertujuan untuk memudahkan sales dalam  berjualan.', 'TA 1'),
(334, 7, 'Aplikasi Pengelolaan Dokumen Invoice Dengan Metode Rapid Application Development', '-', 'Sebuah aplikasi berbasis website yang digunakan untuk menunjang pekerjaan pegawai akuntan PT. Makmurindo Pratama dalam pengelolaan dokumen invoicement yang meliputi pembuatan dokumen dan penyimpanan dokumen.', 'TA 1'),
(335, 7, 'APLIKASI SISTEM PAKAR DETEKSI DINI RAWAN STUNTING PADA ANAK MENGGUNAKAN METODE FORWARD CHAINING BERBASIS WEB', '-', 'Indonesia memiliki masalah gizi yang cukup serius yang salah satu nya ditandai dengan banyaknya kasus gizi kurang atau malnutrisi. Stunting adalah gangguan pertumbuhan karena malnutrisi kronis yang terjadi pada anak balita (bayi dibawah lima tahun) sehingga otak dan tubuh balita tumbuh tidak sempurna. Anak yang mengalami kondisi stunting memiliki tubuh yang terlalu pendek untuk usianya dan ketika dewasa sangat berpeluang terjangkit penyakit kronis serta berisiko mengalami kesulitan mencapai perkembangan fisik dan kognitif yang optimal. Pengaruh dari hal tersebut akan memberikan dampak pada kualitas Sumber Daya Manusia (SDM) Indonesia.\r\n	Di Indonesia prevalensi balita stunting pada tahun 2005-2017 sebesar 36,4% (Kemenkes RI, 2018). Salah satu faktor penyebab tingginya angka persentase balita stunting di Indonesia adalah karena minimnya pengetahuan masyarakat tentang masalah stunting dan dampaknya pada anak. Oleh karena itu, penulis membuat aplikasi sistem pakar untuk mendiagnosa penyakit stunting pada anak dengan metode forward chaining berbasis web. Aplikasi ini dibuat dengan tujuan untuk mempermudah pengguna dalam mendiagnosa atau mendeteksi stunting sejak dini, serta memberikan pengetahuan tentang faktor penyebab beserta pencegahannya. \r\n', 'Proposal'),
(336, 40, 'Perancangan Aplikasi Bantuan Sosial \"Helppy\" Berbasis Mobile', '-', '-', 'TA 1'),
(338, 40, 'Perancangan Aplikasi Sistem Inventory Barang Menggunakan Barcode Scanner Berbasis Android', '-', '-', 'TA 1'),
(341, 22, 'Sistem Notifikasi Gangguan Perangkat Keras Dan Jaringan Menggunakan Sms Gateway Dan Telegram (Studi Kasus: Indomaret Cabang Batam)', '-', '-', 'TA 1'),
(344, 8, 'Sistem Manajemen Operation Part Warehouse Berbasis Web', '-', 'OP ITEM Warehouse Management System merupakan system dibuat menggunakan salah satu Framework PHP yaitu Codeigniter, nantinya memudahakan para pengelola Gudang yang memiliki rutinitas yang lumayan rumit karna harus menge-list barang yang akan diterima dan dikeluarkan untuk keperluan dari masing-masing produksi, mulai dari segi dokumentasi, ke akuratan data', 'Proposal'),
(345, 6, 'Rancang Bangun Pangkalan Data Akreditasi Penjaminan Mutu Politeknik Negeri Batam', '-', '-', 'TA 1'),
(346, 27, '-', '-', '-', 'Proposal'),
(347, 22, 'Sistem Informasi Portal Berita Menggunakan Laravel Berbasis Web Studi Kasus: Payung Kecil Desa', '-', '-', 'Proposal'),
(348, 22, '-', '-', '-', 'Proposal'),
(349, 22, '-', '-', '-', 'Proposal'),
(350, 39, '-', '-', '-', 'Proposal'),
(351, 8, 'Perancangan Aplikasi Monitoring Mesin Produksi Berbasis Web PT Epson Batam', '-', 'Perancangan aplikasi monitoring mesin produksi berbasis web ini dibuat dengan tujuan agar tidak terjadi gagal target pada proses produksi. terkadang bisa saja target tidak tercapai karena NG/ERROR Mesin pada prosesnya.', 'TA 1'),
(352, 22, 'Aplikasi Tugas Elektronik Berbasis Web', '-', '-', 'TA 2'),
(353, 29, '-', '-', '-', 'Proposal'),
(355, 8, 'Order Material dan Inventory Sistem di Sub Store PT. Excelitas Batam', '-', '-', 'TA 1'),
(356, 8, 'Rancang Bangun Memberi Makan Ikan Secara Otomatis Berbasis Internet Of Things', '-', '-', 'TA 2'),
(357, 24, 'Aplikasi The Laundry Berbasis Android', '-', '-', 'TA 2'),
(360, 40, 'Monitoring Penerangan Jalan Umum Berbasis Internet of Things', '-', '-', 'Proposal'),
(362, 40, 'Sistem Parkir Mendeteksi Slot Parkir Menggunakan Sensor Ultrasonik Berbasis Internet of Things (IoT)', '-', '-', 'Proposal'),
(363, 8, 'Sistem Informasi Perizinan Tenaga Kerja Asing Pada PT. Haricca Mandiri Jaya', '-', '-', 'TA 1'),
(366, 10, 'Sistem Aplikasi Absensi PT. Rinaldi Acbasindo Berbasis RFID', '-', '-', 'TA 1'),
(367, 23, 'Sistem Informasi Absensi Siswa Berbasis Web Terkoneksi SMS Gateway', '-', '-', 'TA 1'),
(368, 10, 'Sistem Informasi Aktivitas Masjid', '-', '-', 'TA 1'),
(370, 40, 'ApIikasi Manajemen Pengelolaan Hutang Menggunakan IONIC ', '-', '-', 'TA 2'),
(371, 40, 'Aplikasi Jual Beli Ikan Berbasis Web', '-', '-', 'TA 1'),
(372, 10, 'Sistem Management Produktivitas dan Monitoring Output Berbasis Web', '-', '-', 'TA 1'),
(374, 21, 'Sistem Informasi Online Recruitment di PT Epson Batam', '-', '-', 'TA 1'),
(375, 28, '-', '-', '-', 'Proposal'),
(376, 21, 'Sistem Ujian Online Siswa Berbasis Web (Studi Kasus PKBM Al-Marhamah)', '-', '-', 'TA 1'),
(377, 23, 'Sistem Informasi Rekrutmen Karyawan Berbasis Web di PT Cosmic Batam', '-', '-', 'TA 1'),
(378, 7, 'Estimasi Waktu Kedatangan Bus Trans Batam Berbasis Android', '-', '-', 'TA 1'),
(379, 28, 'Aplikasi Inventaris Gudang Perusahaan Konveksi  X Berbasis Web', '-', '-', 'TA 1'),
(380, 28, 'Aplikasi Pencarian dan Pemesanan Hunian Sementara Berbasis Android', '-', '-', 'TA 2'),
(381, 8, 'Tabungan Elektronik Berbasis Mikrokontroler Arduino Uno', '-', '-', 'TA 2'),
(383, 7, 'Pemanfaatan Teknologi LoRa Sebagai Protokol Komunikasi Pelacak Kapal', '-', '-', 'TA 1'),
(384, 24, 'Sistem Monitoring Jaringan Telkomsel dengan Bot Telegram', '-', '-', 'TA 2'),
(385, 23, 'Aplikasi Surat Pemesanan Kendaraan Berbasis Mobile Android (Studi Kasus Rajawali Angkasa Motor)', '-', '-', 'TA 1'),
(386, 28, 'Cost Structure Calculating System di PT ABC Batam', '-', '-', 'TA 2'),
(388, 23, 'Pemantau Penggunaan Air ATB Berbasis Smartphone Android', '-', '-', 'TA 2'),
(389, 40, '-', '-', '-', 'Proposal'),
(390, 7, 'Membangun Cermin Pintar dengan Memanfaatkan Raspberry Pi 3 Sebagai Mini Prosessing Power', '-', '-', 'TA 2'),
(391, 29, '-', '-', '-', 'Proposal'),
(392, 29, '-', '-', '-', 'Proposal'),
(393, 24, '-', '-', '-', 'Proposal'),
(394, 29, '-', '-', '-', 'Proposal'),
(395, 29, '-', '-', '-', 'Proposal'),
(396, 39, 'Aplikasi Pendaftaran Mahasiswa Baru Politeknik Negeri Batam', '-', '-', 'TA 2'),
(397, 24, 'Aplikasi Pencarian Tempat dan Berbagi Pengalaman Rekreasi Berbasis Web dan Mobile Apps (Re-Visit)', '-', '-', 'TA 2'),
(398, 8, 'Implementasi Blended Learning Dalam Pembelajaran ICT Pendidikan Menengah di Sekolah Kallista Batam', '-', '-', 'TA 2'),
(399, 40, 'Rancang Bangun Aplikasi Sistem Akreditasi Politeknik Negeri Batam', '-', '-', 'TA 2'),
(400, 23, 'Aplikasi Untuk Melakukan Tracer Study Berbasis Website', '-', '-', 'TA 2'),
(401, 24, 'Aplikasi Pencarian Tempat dan Berbagi Pengalaman Rekreasi Berbasis Web dan Mobile Apps (Re-Visit)', '-', '-', 'TA 2'),
(402, 7, 'Penghitung Pesanan Es Balok', '-', '-', 'TA 2'),
(403, 7, 'Pemanfaatan Termoelektrik Peltier pada Mini Kulkas tanpa Menggunakan Gas Freon Berbasis Mikrokontroler Arduino', '-', '-Pada era digital ini, teknologi mengalami perkembangan yang sangat pesat seiring berjalannya waktu. Dalam penggunaan teknologi, manusia banyak menyadari dengan adanya bahaya yang akan ditimbulkan dari penggunaan bahan kimia. Misalnya, penggunaan gas freon. Gas freon adalah suatu zat yang dipakai pada mesin pendingin seperti AC dan kulkas agar dapat mendinginkan. Dalam mesin pendingin zat freon digunakan untuk memberi efek dingin. Oleh karena itu digunakanlah termoelektrik peltier sebagai bahan pengganti gas freon yang dimanfaatkan untuk menghasilkan suhu dingin.Fungsi utama kulkas adalah untuk mendinginkan, menyimpan, dan mengawetkan. Kulkas digunakan untuk menyimpan bahan-bahan makanan dan minuman. Ukuran kulkas pada saat ini sangat bervariasi, ada yang besar, sedang atau kecil yang di sesuaikan juga pada fungsi penggunaannya. Selain aneka ragam kulkas yang dapat kita lihat dari segi ukurannya, kulkas juga bervariasi dari segi energi atau dayanya yang jarang kita perhatikan. Semakin menipisnya lapisan ozon bumi menyebabkan semakin meningkatnya suhu di bumi sehingga berakibat semakin meningkatnya kebutuhan akan suatu sistem pendingin. Sistem pendingin yang umum digunakan sekarang meggunakan zat refrigerant yang kurang ramah lingkungan maka dari itu diperlukan suatu terobosan baru dari sistem pendingin yang lebih ramah lingkungan.', 'TA 2'),
(404, 11, 'Pemetaan Ketersediaan Ruang Terbuka Hijau di Pulau Batam', '-', '-', 'Proposal'),
(405, 25, 'ANALISIS PENGARUH DATA SOUND VELOCITY PROFILER TERHADAP HASIL PENGOLAHAN DATA BATIMETRI (MBES SISTEM) DI PERAIRAN KRUENG PANGA , KABUPATEN  ACEH JAYA', '-', 'Pengolahan data multibeam echosounder beserta beberapa koreksinya sangat berpengaruh besar pada tingkat keakuratan dan ketelitian data hasil pemrosesan. Data  yang harus dikoreksikan adalah data pengamatan pasang surut, data pengukuran profil kecepatan suara dan data pergerakan kapal. Selain berpengaruh terhadap ketelitiannya, pengolahan data tersebut juga berpengaruh terhadap visualisasi dan kualitas data yang dihasilkan. Oleh karena itu, penelitian ini mengkaji pengaruh data Sound Velocity Profiler (SVP) pada hasil pengolahan data multibeam. Data yang digunakan adalah data multibeam yang diperoleh dari PT. Fifan Jaya Makmur di Perairan Krueng Panga, Kabupaten Aceh Jaya. Pada penelitian ini data yang dihasilkan akan diolah menggunakan software HYPACK. Pengolahan data tersebut dilakukan dengan menampilkan perbandingan antara visualisasi pengolahan data multibeam menggunakan koreksi SVP dan visualisasi pengolahan data tanpa menggunakan koreksi SVP. Hasil yang diperoleh dari kedua data akan dilakukan pembersihan noise sehingga data tidak ada yang bertampalan satu sama lain. Hal ini perlunya data untuk dilakukan uji ketelitian berdasarkan Standar IHO.', 'Proposal'),
(406, 33, 'Kajian Kelayakan Kolam Pelabuhan Berdasarkan Nilai Gross Tonage (GT) (Studi Kasus: Pelabuhan Sri Bayintan Kijang)', '-', '-', 'TA 2'),
(407, 38, '-', '-', '-', 'Proposal'),
(408, 5, 'Penerapan Lighting dan Rendering Dalam Set Lighting 3D Berdasarkan Concept Design', '-', '-', 'TA 2'),
(409, 30, 'Analisa Kontini Pada Video The Danger of Gadget while Walking and Driving PT. Infineon Technologies Batam', '-', '-', 'TA 2'),
(410, 8, '-', '-', '-', 'Proposal'),
(411, 18, '-', '-', '-', 'Proposal'),
(412, 5, '-', '-', '-', 'Proposal'),
(413, 5, 'Penerapan Teknik \"Collider Shape Fix\" pada Proses Cloth Simulation', '-', '-', 'TA 2'),
(414, 17, 'Perancangan Antarmuka In-App Purchase pada Game Leturn : Defense of Magic', '-', '-', 'TA 2'),
(415, 12, '-', '-', '-', 'Proposal'),
(418, 15, 'RANCANG BANGUN OPENING BUMPER PROGRAM TV BINCANG SANTAI DI INEWS TV BATAM DALAM BENTUK MOTION GRAPHIC', '-', 'Opening Bumper adalah pembuka berupa animasi pendek yang terdapat didalam sebuah program video yang menggambarkan identitas sebuah acara atau instansi. Dengan adanya opening bumper, acara atau instansi tersebut akan dapat dengan mudah dipahami oleh pemirsa atau penonton tanpa perlu penjelasan yang panjang. Opening bumper juga sebagai tanda transisi antara progarm televisi yang satu dengan yang lain. Salah satu program televisi yang memiliki opening bumper adalah program TV Bincang Santai yang tayang di stasin televisi lokal iNews Batam. Namun, karena opening bumper yang dimiliki program Bincang Santai telah ditayangkan lebih dari 4 tahun, maka opening bumper tersebut tidak merepresentasikan identitas program Bincang Santai yang sekarang.\r\nDengan demikian, dibuat opening bumper dalam bentuk motion graphic yang juga menampilkan cuplikan video program Bincang Santai. Dalam pembuatan opening bumper, digunakan metode Sherwood-Rout yang mempunyai tahapan yang lengkap, rinci dan mudah dipahami. Metode ini juga membutuhkan review dari client, yaitu iNews Batam dalam setiap tahapnya. Dengan demikian, hasil akhir opening bumper dapat sesuai dengan permintaan iNews Batam. Analisa kelayakan menggunakan pendekatan kuantitatif.\r\nDengan pembuatan opening bumper dalam bentuk motion graphic, diharapkan dapat digunakan oleh iNews Batam sebagai opening bumper yang baru sehingga dapat merepresentasikan identitas program Bincang Santai.', 'TA 1'),
(419, 19, 'Analisis Efektifitas dan Perancangan  Kampanye Iklan Layanan Masyarakat Polibatam Diet Plastik dalam Bentuk Video', '-', 'Iklan merupakan pesan yang menawarkan suatu produk yang ditunjukkan kepada masyarakat melalui suatu media. Hal ini terkait dengan kebutuhan masyarakat saat ini sebagai alat untuk membantu memberikan informasi suatu produk dan jasa dari produsen. Perubahan iklim yang terjadi di dunia menunjukkan bahwa pengaruh dari sampah yang dihasilkan oleh manusia berdampak sangat buruk bagi lingkungan. Sampah yang dihasilkan sangat banyak jenisnya terutama berbahan dasar plastik yang sangat mendominasi. Bagaimana mahasiswa bisa memulai untuk diet plastik sedari dini agar mengurangi sampah plastik di lingkungan kampus politeknik negeri batam. Dengan menyuguhkan sebuah karya video iklan layanan masyarakat guna mengedukasi mahasiswa betapa pentingnya menjaga lingkungan dan mengurangi penggunaan plastik sekali pakai dengan cara membawa botol air minum sendiri. Perancangan dan pembuatan video ini melalui beberapa tahap diantaranya pra produksi (brainstorming, storyline, script writing, storyboard, casting dan pemilihan lokasi), produksi (pengambilan gambar) dan pasca produksi (capturing, editing, rendering dan mastering). Video iklan layanan masyarakat Polibatam Diet Plastik ini dibuat menggunakan metodologi AIDA. Dalam penelitian ini, setelah produk selesai kemudian dilakukan analisis EPIC model untuk  mengetahui  pengaruh dan efektifitas video  iklan layanan masyarakat Polibatam Diet Plastik. Pada tahap analisis menggunakan analisis EPIC model (Empathy, Persuasion, Impact and Communication) yang ditemukan oleh lembaga riset AC. Nielsen. Berdasarkan latar belakang masalah tersebut, peneliti mencoba mengidentifikasi permasalahan yaitu apakah efektivitas iklan layanan masyarakat Polibatam Diet Plastik berpengaruh secara simultan terhadap mahasiswa Polibatam untuk mengurangi plastik sekali pakai. Dengan begitu video  iklan Polibatam Diet Plastik dinyatakan efektif sebagai media iklan layanan masyarakat. ', 'Proposal'),
(421, 5, 'Implementasi dan Analisis Teknik Color Grading Pada Pembuatan Iklan Komersial \"Clothing Line\" Terhadap Emosi Minat Beli Penonton', '-', '-', 'TA 2'),
(424, 30, 'Analisis Dan Pembuatan Film Dokumenter \"Gerakan Pengurangan Sampah Plastik Di Kota Batam\" Menggunakan Expository Mode', '-', '-', 'TA 1'),
(425, 16, 'Analisis dan Penerapan Teknik Color Grading Terhadap Daya Tarik Penonton Pada Video Company Profile Rumah Susun BP Batam Unit Sekupang', '-', '-', 'TA 1'),
(426, 30, 'Implementasi Video Company Profile Rumah Susun BP Batam Unit Sekupang', '-', '-', 'TA 1'),
(427, 22, 'Motion Graphic Kesiapan Siswa Mengikuti Pelajaran Di Masa Pandemi', '-', '-', 'TA 1'),
(429, 17, 'Pembuatan Motion Graphic Sebagai Media Pengenalan SDGs Kepada Mahasiswa Politeknik Negeri Batam dengan Metode ADDIE', '-', '-', 'TA 1'),
(431, 13, '-', '-', '-', 'Proposal'),
(432, 36, '-', '-', '-', 'Proposal'),
(433, 23, 'Perancangan Permainan Edukasi \"Pungut\" Menggunakan Metode Fisher Yates Shuffle Berbasis Desktop', '-', '-', 'TA 1'),
(434, 23, 'Implementasi Gerakan Tarian pada Animasi 3D dengan Menggunakan Metode Pose to Pose', '-', '-', 'TA 1'),
(436, 36, '-', '-', '-', 'Proposal'),
(437, 13, '-', '-', '-', 'Proposal'),
(438, 8, '-', '-', '-', 'Proposal'),
(439, 40, 'IMPLEMENTASI MOTION GRAPHIC DALAM VIDEO PEMBELAJARAN ADMINISTRASI SISTEM KOMPUTER (ADMINSYS)', '-', '-', 'Proposal'),
(440, 17, 'Pembuatan Multimedia Interaktif Berbasis Video Tutorial Matakuliah Desain Grafis D4 Animasi', '-', '-', 'TA 1'),
(442, 29, 'Analisa Sistem Game Berdasarkan Rating Game Menurut Standar Entertainment Software Rating Board', '-', '-', 'TA 1'),
(443, 12, 'Media Pembelajaran TOEIC untuk Pendidikan Vokasi', '-', 'Pendidikan Vokasi merupakan pendidikan yang mempersiapkan peserta didik untuk masuk ke dunia kerja secara nyata. Adapun salah satu kemampuan yang dibutuhkan yaitu kemampuan berbahasa. Saat ini Kurikulum KKNI mengharuskan para mahasiswa/i vokasi memiliki pegangan seperti ijazah dan Surat Keterangan Pendamping ijazah (SKPI), adapun sertifikat TOEIC merupakan salah satu pilihan Sebagai Pendamping ijazah dalam bidang bahasa. TOEIC merupakan salah satu tes kemampuan berbahasa inggris di lingkungan industri. TOEIC biasanya digunakan sebagai salah satu persyaratan untuk melamar pekerjaan ke perusahaan. Media pembelajaran ini dibuat untuk memberi mahasiswa/i vokasi pengetahuan dan gambaran bagaimana materi dan bentuk soal- soal TOEIC terutama pada bagian reading yang terdiri dari 4 kategori, yaitu Incomplete Text,Incomplete Sentence,Text Completion dan Reading Comprehension. Media pembelajaran ini dirancang Menggunakan Software Adobe Flash CS6 yang digunakan untuk menggabungkan teks,audio dan animasi. Media pembelajaran ini menggunakan metode penelitian MDLC yang terdiri dari enam tahapan yaitu Konsep,Rancangan,Pengumpulan Materi,Pembuatan,Uji Coba dan Pendistribusian. Media pembelajaran ini diharapkan dapat memberi sesuatu yang berbeda dalam pembelajaran agar dapat memahami dengan baik.', 'TA 2'),
(444, 8, 'Video Profil Motion Graphic Sabiilun Najaah TV Batam', '-', '-', 'TA 2'),
(445, 12, 'Media Pembelajaran Bahasa Inggris Topik Animals', '-', '-', 'TA 2'),
(446, 40, 'Aplikasi Kehadiran Para Pihak Persidangan Pengadilan Tata Usaha Negara Tanjungpinang Berbasis Web dan SMS Gateway', '-', '-', 'TA 2'),
(447, 1, '-', '-', '-', 'Proposal'),
(448, 1, '-', '-', '-', 'Proposal'),
(449, 40, 'Aplikasi Pembayaran Biaya Parkir Kendaraan Bermotor Menggunakan Near Field Communication (NFC)', '-', '-', 'TA 2'),
(450, 40, 'IMPLEMENTASI HIGH AVAILABILITY PADA SERVER LAYANAN WEB DENGAN CLUSTER COMPUTING', '-', 'melakukan implementasi high availability pada layanan web dengan cluter computing menggunakan aplikasi haproxy sebagai pembagi beban, glusterfs untuk sinkronisasi data, dan menggunakan database mysql', 'TA 2'),
(451, 8, 'MOTION GRAPHIC TATA CARA DAN ATURAN MEMBESUK TAHANAN DI RUTAN TANJUNG BALAI KARIMUN MENGGUNAKAN METODE VAUGHAN', '-', 'Rumah Tahanan Negara (Rutan) merupakan bagian dari Lembaga Tahanan/Lembaga Penahanan dimana istilah tersebut ada dalam Sistem Hukum Pidanan Indonesia. Rutan Adalah tempat tersangka atau terdakwa ditahan selama proses penyidikan, penuntutan, dan pemeriksaan di sidang pengadilan di Indonesia.\r\nKunjungan Tahanan merupakan suatu bentuk kegiatan pertemuan antara keluarga dan tahanan dalam suatu ruangan publik dalam pemenuhan hak tahanan atau yang lebih populer di masyarakat sebagai Besukan. Besukan memiliki Tata Cara dan Aturan, baik itu syarat untuk besuk maupun apa saja yang boleh dibawa oleh pembesuk kedalam Rutan. Tapi sayangnya masih ada beberapa pembesuk yang melanggar Tata Cara dan Aturan membesuk terutama di Rutan Tanjung Balai Karimun. Hal ini menjadi permasalahan yang sering terjadi di Rutan Tanjung Balai Karimun karena belum maksimalnya penyampaian informasi yang didapat oleh pembesuk tentang Tata Cara dan Aturan membesuk. Maka dari itu, dalam Tugas Akhir ini dirancang sebuah video motion graphic Tata Cara dan Aturan membesuk Tahanan di Rutan Tanjung Balai Karimun. Kemudian dari implementasi motion graphic 2 dalam sebuah video proses Besuk di Rutan Karimun juga nantinya akan dianalisis pergerakan dalam prinsip dasar animasi. Penerapan motion graphic ini akan menerapkan metode pengembangan multimedia yaitu metodologi Vaughan.', 'Proposal'),
(452, 8, 'Aplikasi Reservasi Lapangan Futsal Berbasis Android dan SMS Gateway', '-', '-', 'TA 2'),
(453, 17, 'Pembuatan Video Company Profile PT. Berkat Bersaudara Batam Sebagai Media Promosi', '-', 'Teknologi saat ini sudah berkembang sangat pesat, media promosi yang awalnya hanya dari mulut ke mulut kini berkembang mengikuti teknologi yang ada. Dengan adanya media promosi, dapat mempermudah produsen dalam memperkenalkan atau menawarkan produk dan jasa kepada konsumen. PT. Berkat Bersaudara Batam adalah perusahaan swasta yang bergerak di bidang Pengelolaan dan Pemanfaatan Limbah Bahan Berbahaya dan Beracun (B3) khususnya Fly Ash dan Bottom Ash. Limbah tersebut dimanfaatkan dan diolah menjadi produk building materials yaitu Bata Beton Pres. Dibutuhkan pembuatan video company profile untuk memperkenalkan dan menjelaskan tentang ruang lingkup perusahaan. Video company profile ini dibuat menggunakan Teknik Motion Graphic. Perancangan ini menggunakan metode penelitian kualitatif, penelitian kualitatif adalah suatu penyelidikan untuk memahami sesuatu hal, menggunakan tradisi metodologi penyelidikan yang mengeksplorasi suatu masalah (Creswell, 1998). Terdapat dua data yang didapatkan yaitu data primer berupa hasil wawancara dan dokumentasi, dan data sekunder berupa hasil penelitian pustaka dan internet. Hasil dari proyek ini ialah video company profile  yang digunakan sebagai media informasi dan promosi. Pengujian dan analisis dari proyek ini menggunakan parameter EPIC Model : (1) Empathy, (2)Persuation, (3) Impact, (4) Communication ,untuk mengukur efektivitas dari video tersebut kemudian melakukan penyebaran kuisioner yang untuk mendapatkan penilaian dari masyarakat.', 'TA 2'),
(454, 17, 'DIGITALISASI UNDANGAN PERNIKAHAN BERBASIS WEB RESPONSIF', '-', '-', 'TA 2'),
(455, 40, 'Visualisasi Penggunaan Aplikasi GoCar Driver dengan Teknik Motion Graphic 2D', '-', '-', 'TA 2'),
(456, 28, 'Pembuatan dan Analisa Motion Graphic tentang Informasi dan Dampak Cyber Bullying', '-', '-', 'TA 2'),
(457, 10, 'Motion Graphic 2D Sebagai Media Sosialisasi Aplikasi Helpdesk BP Batam', '-', '-', 'TA 1'),
(458, 28, 'Implementasi Motion Graphic Sebagai Media Promosi Produk Paket Cruise (Studi Kasus: PT. Lim Lee Solid Indo Nusantara)', '-', '-', 'TA 1'),
(460, 10, 'Perancangan Video Profil Perpustakaan BP Batam dengan Teknik Live Shoot', '-', '-', 'TA 1'),
(462, 23, 'Motion Graphic Iklan Layanan Masyarakat Edukasi Tata Tertib Rambu Lalu Lintas', '-', '-', 'TA 2'),
(463, 40, 'Video Profil Masjid Muhammad Cheng Ho Kota Batam', '-', 'Masjid Muhammad Cheng Ho merupakan masjid peninggalan sejarah dari laksamana Muhammad Cheng Ho yang berasal dari Tiongkok Masjid ini didirikan oleh pengusaha Batam tanpa adanya bantuan pemerintah, masjid ini dibuat untuk mengenang laksamana Muhammad Cheng Ho yang pernah singgah di Batam. Laksamana Cheng Ho sendiri adalah seorang muslim dan menyebarkan agama Islam di Indonesia dari berbagai daerah yang ada di Indonesia termasuk Batam jadi masjid Cheng Ho sendiri juga ada di kota-kota besar yang pernah ia singgahi seperti Surabaya, Palembang, Kutai Kartanegara, dan beberapa lainnya. Luas masjid ini seluas 20 x 30 M yang atapnya berbentuk seperti pagoda, dengan warna merah yang mendominasi masjid ini dipadukan dengan warna emas. Sehingga yang terlintas dalam pikiran orang ini sebuah klenteng bukan masjid. Namun jika kita masuk lebih depan lagi ada papan berwarna hitam betuliskan Masjid Muhammad Cheng Ho dan juga di tuliskan dalam bahasa mandarin.', 'TA 1'),
(465, 5, 'Implementasi dan Analisis Teknik Pergantian Angle Kamera pada Pembuatan Iklan Komersial Clothing Line terhadap Emosi Minat Beli Penonton', '-', '-', 'TA 2'),
(466, 17, '-', '-', '-', 'Proposal'),
(467, 13, 'Rumah Virtual Interaktif Sebagai Media Promosi Proyek PT Buana Cipta Propertindo menggunakan Virtual Tour 360', '-', '-', 'TA 2'),
(468, 7, 'Aplikasi Kunjungan Medical Representative (Studi Kasus : PT. Sintesa Health)', '-', '-', 'TA 2'),
(469, 10, 'Transboat (Aplikasi Travel Kelautan Berbasis Android)', '-', '-', 'TA 1'),
(470, 24, 'Pengembangan dan Pembaruan Pada Management Aplikasi Melalui Server', '-', 'Dinas Komunikasi dan Informatika (KomInfo) merupakan salah satu dinas yang dimiliki pemerintahan kota batam yang salah satu tugasnya bertanggung jawab pada bidang informatika seperti pembuatan, pengembangan dan pemeliharaan aplikasi. Di Dinas KomInfo memiliki tim programmer untuk mengurus aplikasi. Pada tim ini membuat beberapa aplikasi yang dibutuhkan oleh Pemerintahan Batam untuk masyarakat. Saat membuat aplikasi biasanya tim programmer menggunakan penyimpanan lokal masing-masing anggota untuk membuat atau memperbaiki aplikasi. Tim programmer berbagi hasil pembaruan mereka menggunakan GitLab untuk disimpan di penyimpanan lokal masing-masing. Hal ini menjadikan mereka kesulitan untuk mengetahui pembaruan yang dibuat oleh anggota lain karena di setiap penyimpanan lokal anggota tim memiliki versi aplikasi yang berbeda-beda sesuai dengan yang mereka perbarui saja. Selain itu jika mereka menarik dari GitLab lagi untuk penyimpanan lokal, hal ini bisa membuat file aplikasi tersebut menjadi ganda Maka dari itu, diperlukan sebuah sistem yang dapat membantu tim programmer untuk berbagi hasil pekerjaan masing-masing ke anggota yang lain.\r\nSistem yang dapat membantu tim programmer untuk berbagi aplikasi dan manajemen database adalah dengan memanfaatkan aplikasi web GitLab yang terhubung langsung dengan server. Selain itu dengan menggunakan teknologi yang ada di Gitlab dapat mendeteksi kesalahan yang terjadi pada aplikasi yang di push. Aplikasi pun dapat dijalankan langsung melalui server. Bahasa pemrograman yang digunakan pada pengembangan ini adalah Hypertext PreProcessor (PHP) dan juga menggunakan Ubuntu Server untuk menggunakan Server.', 'TA 2'),
(471, 24, 'Pengembangan dan Pembaruan Pada Management Aplikasi Melalui Server', '-', 'Dinas Komunikasi dan Informatika (KomInfo) merupakan salah satu dinas yang dimiliki pemerintahan kota batam yang salah satu tugasnya bertanggung jawab pada bidang informatika seperti pembuatan, pengembangan dan pemeliharaan aplikasi. Di Dinas KomInfo memiliki tim programmer untuk mengurus aplikasi. Pada tim ini membuat beberapa aplikasi yang dibutuhkan oleh Pemerintahan Batam untuk masyarakat. Saat membuat aplikasi biasanya tim programmer menggunakan penyimpanan lokal masing-masing anggota untuk membuat atau memperbaiki aplikasi. Tim programmer berbagi hasil pembaruan mereka menggunakan GitLab untuk disimpan di penyimpanan lokal masing-masing. Hal ini menjadikan mereka kesulitan untuk mengetahui pembaruan yang dibuat oleh anggota lain karena di setiap penyimpanan lokal anggota tim memiliki versi aplikasi yang berbeda-beda sesuai dengan yang mereka perbarui saja. Selain itu jika mereka menarik dari GitLab lagi untuk penyimpanan lokal, hal ini bisa membuat file aplikasi tersebut menjadi ganda Maka dari itu, diperlukan sebuah sistem yang dapat membantu tim programmer untuk berbagi hasil pekerjaan masing-masing ke anggota yang lain. Sistem yang dapat membantu tim programmer untuk berbagi aplikasi dan manajemen database adalah dengan memanfaatkan aplikasi web GitLab yang terhubung langsung dengan server. Selain itu dengan menggunakan teknologi yang ada di Gitlab dapat mendeteksi kesalahan yang terjadi pada aplikasi yang di push. Aplikasi pun dapat dijalankan langsung melalui server. Bahasa pemrograman yang digunakan pada pengembangan ini adalah Hypertext PreProcessor (PHP) dan juga menggunakan Ubuntu Server untuk menggunakan Server.', 'TA 1'),
(472, 10, 'Sistem Informasi Manajemen Inventori Lampu PJU', '-', '-', 'TA 2'),
(473, 23, 'BRANDING KAMPUNG DENGAN IMPLEMENTASI SIGN SYSTEM MENERAPKAN SEMIOTIKA PIERCE', '-', 'Bagaimana merancang sign system yang informatif dan efisien untuk atau bagi masyarakat Kampung Baloi Harapan 2 RT 05 RW III dengan menerapkan semiotika pierce sehingga mampu meningkatkan safety awareness masyarakat?', 'TA 2'),
(474, 13, 'Implementasi Motion Graphic Pada Video Iklan W Studio Batam Dan  Pengukuran Efektifitas Menggunakan Epic Model.', '-', '-', 'TA 2'),
(475, 29, 'Perbandingan Efektivitas Jumlah Vertex Terhadap Perancangan Karakter 3D Leak Bali Sebagai Intellectual Property pada Sebuah Film Animasi', '-', '-', 'TA 2'),
(476, 22, 'Klasifikasi penyakit hipertensi dan diabetes Berbasis Web Pada Klinik Pratama Rumkitban 01.08.03 Batam', '-', 'aplikasi yang di buat untuk mengklasifikasi penyakit hipertensi dan diabetes agar nanti dapat mempermudah petugas dalam mendata , memonitoring dan mengevaluasi pasien dengan penyakit tersebut ', 'TA 2'),
(477, 36, 'Aplikasi Android untuk Mengetahui Harga Sayuran di Pasar Tradisional', '-', '-', 'TA 2'),
(478, 25, 'Identifikasi sebaran Klorofil-a dan Suhu Permukaan Laut di Perairan Piayu Laut Pulau Batam menggunakan Citra Satelit Terra Modis', '-', 'TA 2 ', 'TA 2'),
(479, 41, 'Pengukuran dan Pemetaan Bidang Tanah di Desa Ridan Permai Kecamatan Bangkinang Kabupaten Kampar Provinsi Riau Menggunakan Metode  Ekstraterestris', '-', '-', 'TA 2'),
(480, 1, 'Aplikasi SITA', 'SITA Apps', 'Aplikasi untuk tugas akhir', 'Proposal'),
(481, 26, 'Aplikasi Permit to Work Menggunakan Android Studio', '-', '-', 'TA 2'),
(482, 26, 'Rancang Bangun Aplikasi Pemantauan Detak Jantung Berbasis Website', '-', '-', 'TA 2'),
(483, 7, 'Perancangan Sistem Informasi Penyewaan Gedung GBI Tabgha Berbasis Web di Kota Batam', '-', '-', 'TA 2'),
(484, 5, 'Dokumentasi Aset Workstation Menggunakan Fitur \"Ws Map\" Pada Situs WIS PT Kinema Systrans Multimedia', '-', '-', 'TA 2'),
(485, 22, 'Aplikasi E-Document pada PT. Gapura Indoparamula', '-', '-', 'TA 1'),
(486, 11, 'Pemetaan Zona Nilai Tanah (ZNT) dan Harga Lahan di Pusat Pertumbuhan Ekonomi Berdasarkan Nilai Jual Objek Pajak (NJOP) di Kota Tanjungpinang Tahun 2019', '-', '-', 'TA 2'),
(487, 42, 'Pemetaan  Atas Status Kepemilikan Hak Pakai dan Hak Milik Bangunan di Kampung Tua Tanjung Riau', '-', '-', 'TA 2'),
(488, 20, 'Sistem Informasi Geografis Wisata Edukasi Kawasan Agromarina di Tanjung Riau Berbasis Webgis', '-', '-', 'TA 2'),
(489, 29, 'Analisis dan Perancangan Website Pendataan Siswa RA Tazkia Berbasis Framework OpenERP', '-', '-', 'TA 1'),
(490, 17, 'Pengaruh Trailer Serial Animasi 2D \"The World of Tofu\" Terhadap Minat Menonton', '-', '-', 'TA 2'),
(491, 17, 'Rancang Bangun Website Dreams Studio Batam Sebagai Media Promosi', '-', '-', 'TA 2'),
(492, 28, 'Analisa Video Company Profile Klinik Medilab Batam Menggunakan USP Model', '-', '-', 'TA 2'),
(493, 28, 'Analisis Usability Terhadap Website Berbasis E-Learning Dengan Metode Heuristic Evaluation', '-', '-', 'TA 2'),
(494, 21, 'Motion graphic : Pembagian Wilayah Pekerjaan Dinas Bina Marga dan Sumber Daya Air Kota Batam', '-', 'Dinas Bina Marga dan Sumber Daya Air Kota Batam merupakan instansi pemerintah yang bergerak dibilang infrastruktur jalan, drainase dan tebing pantai, alat berat dan penerangan jalan umum di Kota Batam. Di bidang Penerangan Jalan Umum, Bina Marga memperkerjakan para teknisi yang ahli dibidangnya untuk penanganan terhadap penerangan jalan umum dan lampu hias yang ada di Kota Batam, para teknisi melakukan pembagian wilayah pekerjaan untuk memudahkan pekerjaan. Akan tetapi untuk teknisi baru yang belum memahami mengenai bidang penerangan jalan umum. Oleh karena itu, para teknisi baru mengetahui informasi mengenai penerangan jalan umum melalui arahan dari atas ataupun hanya mengetahui informasi yang minim melalu teknisi lama. Motion Graphic pada video informasi Pembagian Wilayah Pekerjaan di Dinas Bina Marga dan Sumber Daya Air Kota Batam menggunakan metode perancangan multimedia Villamil-Molina yang terdiri dari 5 tahapan yang kemudian video ini akan dilakukan pengujian alpha dan beta serta dilakukan analisis terhadap video untuk mengetahui pengaruh video terhadap para pekerja penerangan jalan umum. Hasil dari analisis yang dilakukan menunjukan bahwa video informasi ini telah memenuhi indikator kelayakan yaitu dengan aspek unsur tampilan sebanyak 99%, unsur pengetahuan 100%, dan pemahaman 100% dan responden menyetujui bahwa produk layak untuk dipublikasikan. ', 'TA 2'),
(502, 26, '-', '-', '-', 'Proposal'),
(503, 20, 'Perubahan Penggunaan Lahan Wilayah Permukiman Dan Industri Menggunakan Sistem Informasi Geografis Di Pulau Batam', '-', '-', 'TA 2'),
(504, 27, 'Aplikasi Pengelolaan Data Pemeriksaan Kesehatan pada Unit Kesehatan Politeknik Negeri Batam Berbasis Web dan Android', '-', '-', 'TA 2'),
(505, 8, 'Implementasi Aplikasi Signage Sebagai Media Penyampaian Informasi di Polibatam', '-', 'Polibatam atau Politeknik Negeri Batam merupakan salah satu Kampus terbaik di Kota Batam dan dalam penyampaian informasi kepada masyarakat umum atau calon mahasiswa dilakukan dengan cara menggunakan media komunikasi visual manual dan belum digital maka dari itu penulis berupaya untuk merubah cara penyampaian Informasi secara manual menjadi digital. Adapun caranya menggunakan sebuah aplikasi digital signage sebagai media penyampaian Informasi dan akan ditampilkan di layar monitor yang sudah dipasang disetiap lantai gedung utama Polibatam dan layar monitor disambungkan dengan sebuah perangkat hardware sebagai media player yang sudah terhubung dengan kabel jaringan agar saling terintegrasi dengan perangkat lainnya. Dengan adanya penyampian Informasi melalui media digital signage banyak sekali keuntungan yang akan diperoleh antara lain berkurangan media komunikasi visual berbentuk kertas dan banner juga dapat memberikan kemudahan bagi masyarakat atau calon mahasiwa untuk memperoleh Informasi saat berkunjung ke Polibatam, media penyampaian dalam bentuk digital yang saling terintergrasi. Di penelitian ini penulis menggunakan aplikasi digital signage dan sebuah perangkat android box yang berfungsi sebagai media player yang disambungkan ke monitor maka monitor akan menjadi sebuah monitor smart yang bisa terintregrasi dengan jaringan internet.', 'TA 1'),
(506, 19, 'Implementasi Aplikasi Augmented Reality untuk Efektivitas Kunjungan Industri di PT. Schneider Electric Manufacturing Batam', '-', '-', 'TA 2'),
(507, 28, 'Analisa Kelayakan Safety Box Training Berbasis Virtual Reality di PT XYZ', '-', '-', 'TA 2'),
(508, 39, '-', '-', '-', 'Proposal'),
(509, 40, '-Sistem Perizinan Biro Perencanaan', '-', '-Sistem Perizinan Biro Perencanaan\r\nLaporan Tugas Akhir', 'TA 2'),
(510, 24, 'Aplikasi Pengelolaan Sistem Plaza dan Supermarket Berbasis Android di Khazanah Plaza', '-', '-', 'TA 2'),
(511, 37, 'Pemetaan Jalur Ekspor dan Impor (Sektor Migas dan Non Migas) Berdasarkan Pelabuhan Bongkar Muat di Kota Batam', '-', '-', 'TA 2'),
(512, 37, 'Pemetaan Jalur Ekspor dan Impor (Sektor Migas dan Non Migas) Berdasarkan Pelabuhan Bongkar Muat di Kota Batam', '-', '-', 'TA 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jabatan` enum('Dosen','Mahasiswa','Admin','TU') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama`, `email`, `jabatan`) VALUES
(1, '113105', 'Supardianto, S.ST., M.Eng. ', 'supardianto@polibatam.ac.id', 'Admin'),
(5, '113104', 'Selly Artaty Zega, S.ST.', 'selly@polibatam.ac.id', 'Dosen'),
(6, '100017', 'Metta Santiputri', 'metta@polibatam.ac.id', 'Admin'),
(7, '117175', 'Hamdani Arif, S.Pd., M.Sc', 'hamdaniarif@polibatam.ac.id', 'Dosen'),
(8, '107048', 'Afdhol Dzikri, S.ST, M.T', 'afdhol@polibatam.ac.id', 'Dosen'),
(9, '119221', 'Agung Riyadi, S.Si. M.Kom', 'agung@polibatam.ac.id', 'Dosen'),
(10, '107051', 'Agus Fatulloh, S.T, M.T', 'agus@polibatam.ac.id', 'Dosen'),
(11, '115145', 'Arif Roziqin, S.Pd., M.Sc.', 'arifroziqin@polibatam.ac.id', 'Dosen'),
(12, '114131', 'Arta Uly Siahaan, S.Pd, M.Pd', 'artauly@polibatam.ac.id', 'Dosen'),
(13, '107054', 'Condra Antoni, S.S, M.A', 'condra@polibatam.ac.id', 'Dosen'),
(14, '119222', 'Dodi Prima Resda, S.Pd., M.Kom', 'dodi.prima@polibatam.ac.id', 'Dosen'),
(15, '106042', 'Evaliata Br.Sembiring,  S.Kom., M.Cs.', 'eva@polibatam.ac.id', 'Dosen'),
(16, '119223', 'Fadli Suandi, S.T., M.Kom.', 'fadli.suandi@polibatam.ac.id', 'Dosen'),
(17, '117193', 'Fandy Neta, S.Pd., M.Pd.T.', 'fandyneta@polibatam.ac.id', 'Dosen'),
(18, '112086', 'Gendhy Dwi Harlyan, S.SN.', 'gendhy@polibatam.ac.id', 'Dosen'),
(19, '112092', 'Happy Yugo Prasetiya, S.Sn., M.Sn.', 'yugo@polibatam.ac.id', 'Dosen'),
(20, '117196', 'Luthfiya Ratna Sari', 'luthfiya.ratna.s@polibatam.ac.id', 'Dosen'),
(21, '117192', 'Maidel Fani, S.Pd., M.Kom.', 'maidelfani@polibatam.ac.id', 'Dosen'),
(22, '109064', 'Mira Chandra Kirana, S.T., M.T.', 'mira@polibatam.ac.id', 'Dosen'),
(23, '117173', 'Muchamad Fajri Amirul Nasrullah, S.ST., M.Sc', 'fajri@polibatam.ac.id', 'Dosen'),
(24, '117174', 'Muhammad Nashrullah, SST., M.Sc', 'nashrullah@polibatam.ac.id', 'Dosen'),
(25, '116162', 'Muhammad Zainuddin Lubis, S.I.k, M.Si', 'muhammad.zainuddin.lubis@polibatam.ac.id', 'Dosen'),
(26, '115148', 'Nelmiawati, B.CS., M.Comp.Sc', 'mia@polibatam.ac.id', 'Dosen'),
(27, '112087', 'Nur Zahrati Janah, S.KOM, M.SC.', 'nur.zahrati@polibatam.ac.id', 'Dosen'),
(28, '118199', 'Rina Yulius, S.Pd., M.Eng', 'rinayulius@polibatam.ac.id', 'Dosen'),
(29, '103025', 'Riwinoto, S.T., M.KOM.', 'riwi@polibatam.ac.id', 'Dosen'),
(30, '113106', 'Sandi Prasetyaningsih, S.ST., M.Media', 'sandi@polibatam.ac.id', 'Admin'),
(31, '113115', 'Sartikha, S. ST.,M.Eng', 'sartikha@polibatam.ac.id', 'Dosen'),
(32, '118201', 'Satriya Bayu Aji, S.S., M.Hum.', 'satriya@polibatam.ac.id', 'Dosen'),
(33, '118207', 'Siti Noor Chayati, S.T.,M.Sc', 'sitinoorchayati@polibatam.ac.id', 'Dosen'),
(34, '113110', 'Sudra Irawan, S.Pd.Si., M.Sc.', 'sudra@polibatam.ac.id', 'Dosen'),
(35, '119224', 'Swono Sibagariang, S.Kom., M.Kom', 'swono@polibatam.ac.id', 'Dosen'),
(36, '100015', 'Uuf Brajawidagda, S.T., M.T., Ph.D', 'uuf@polibatam.ac.id', 'Dosen'),
(37, '116163', 'Wenang Anurogo, S.Si., M.Sc.', 'wenang.anurogo@polibatam.ac.id', 'Dosen'),
(38, '112093', 'Yeni Rokhayati, S.Si., M.Sc.', 'yeni@polibatam.ac.id', 'Dosen'),
(39, '115143', 'Ahmad Hamim Thohari', 'hamim@polibatam.ac.id', 'Dosen'),
(40, '112094', 'Dwi Ely Kurniawan', 'dwialikhs@polibatam.ac.id', 'Dosen'),
(41, '118208', 'Farouki Dinda Rasarandi', 'farouki@polibatam.ac.id', 'Dosen'),
(42, '115238', 'Oktavianto Gustin', 'oktavianto@polibatam.ac.id', 'Dosen'),
(43, '220315', 'Hajrul Khaira, S.Tr.Kom', 'hajrul@polibatam.ac.id', 'TU'),
(44, '119215', 'Alfonsa Dian Sumarna, S.E., M.Si', 'alfonsadian@polibatam.ac.id', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_mhs`
--

CREATE TABLE `tb_user_mhs` (
  `id_user_mhs` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` enum('Aktif','Lulus','Tidak Aktif','') NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `email_lain` varchar(150) NOT NULL,
  `group` enum('A','B','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_mhs`
--

INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`, `status`, `no_wa`, `email_lain`, `group`) VALUES
(1, '4311701001', 'Ulfa Sari Melisa', 'ulfa.4311701001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081266598589', 'ulfasarimelisa04@gmail.com', 'A'),
(2, '4311701002', 'Jogi Oktavianus Situmeang', 'jogi.4311701002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(3, '4311701003', 'Widya Putri Ramadhani', 'widya.4311701003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087799194841', 'widyaputriramadhani4@gmail.com', 'A'),
(4, '4311701004', 'Disca Eki Wulansari', 'disca.4311701004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895414460148', 'discaeki090@gmail.com', 'A'),
(5, '4311701005', 'Arvian Susila Putra', 'arvian.4311701005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082174547179', 'arviansusilaputra@gmail.com', 'A'),
(6, '4311701006', 'Mahmud Prakoso.', 'mahmud.4311701006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(7, '4311701007', 'Ilham Aidhil Iyandha Saputra', 'ilham.4311701007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(8, '4311701008', 'Dewi Nurpermata Sari', 'dewi.4311701008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081990809574', 'dewinurpermata20@gmail.com', 'A'),
(9, '4311701009', 'Rahmat Jamal Akhbar', 'rahmat.4311701009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082384150610', 'rahmatjamalakhbar@gmail.com', 'A'),
(10, '4311701010', 'Tatang Romadhona', 'tatang.4311701010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(11, '4311701011', 'Daniel Ardiyanto Panggabean', 'daniel.4311701011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(12, '4311701012', 'Agung Okta Priyadi', 'agung.4311701012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(13, '4311701013', 'Intan Ulmi Lestari', 'intan.4311701013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089682339674', 'intanlestarii2199@gmail.com', 'A'),
(14, '4311701014', 'Rizky Agung Kala Maghribi', 'rizky.4311701014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08117771807', 'shikirie@gmail.com', 'A'),
(15, '4311701015', 'M Bagus Maulana', 'm.4311701015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(16, '4311701016', 'Binhot Jonathan Hutagalung', 'binhot.4311701016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089508683897', 'binhotjon@gmail.com', 'A'),
(17, '4311701018', 'Adimas Bagus Nuripto', 'adimas.4311701018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(18, '4311701019', 'Fadhli Yahya', 'fadhli.4311701019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(19, '4311701020', 'Teddy Setyawan', 'teddy.4311701020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082287387985', 'teddysetyawan4@gmail.com', 'A'),
(20, '4311701021', 'Faradina Pedana Jodanayang', 'faradina.4311701021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895364441601', 'faradinapj19@gmail.com', 'A'),
(21, '4311701022', 'Sri Andeani', 'sri.4311701022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081268944277', 'sriandeani26@gmail.com', 'A'),
(22, '4311701023', 'Elsi Adella', 'elsi.4311701023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081534343353', 'elsiiadella1998@gmail.com', 'A'),
(23, '4311701025', 'Nisriani Uswatunnisa', 'nisriani.4311701025@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081268999127', 'nisrianiuswatunnisa@gmail.com', 'A'),
(24, '4311701026', 'Muhammad Harviando', 'muhammad.4311701026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283218143', 'harviandomuhammad@gmail.com', 'A'),
(25, '4311701027', 'Ica Yolanda G.', 'ica.4311701027@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895603682511', 'ichaayolandaa@gmail.com', 'A'),
(26, '4311701028', 'Dimas Surya Fitriansyah', 'dimas.4311701028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(27, '4311701029', 'Wiliam Mahatir', 'wiliam.4311701029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085272529433', 'williammahatir@gmail.com', 'A'),
(28, '4311701030', 'Maulana Muhammad', 'maulana.4311701030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(29, '4311701031', 'Hadinata Salim', 'hadinata.4311701031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(30, '4311701032', 'Muhammad Raihan Mahardhika', 'muhammad.4311701032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(31, '3311801001', 'DIFA ANANDA PUTRI', 'difa.3311801001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895340169824', 'difaanandaputri1@gmail.com', 'A'),
(32, '3311801002', 'NUR FHITRIANI MEGADYANTY', 'fhitriani.3311801002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087728020950', 'fhitriani.002@gmail.com', 'A'),
(33, '3311801003', 'SUWARDI PUTRA', 'suwardi.3311801003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082266448031', 'suarditest@gmail.com', 'A'),
(34, '3311801005', 'RIZKY INDRIATI', 'rizky.3311801005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089623755486', 'rizkyindri69@gmail.com', 'A'),
(35, '3311801006', 'ANNISA', 'annisa.3311801006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082328922202', 'annisasweetbanana19@gmail.com', 'A'),
(36, '3311801007', 'NADILA', 'nadila.3311801007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082171485152', 'ndila2504@gmail.com', 'A'),
(37, '3311801009', 'DEVA RAHMAT LADIO', 'deva.3311801009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08127088521', 'devaladio@gmail.com', 'A'),
(38, '3311801010', 'ENWANDI ANDREAS HASIBUAN', 'enwandi.3311801010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085263420480', 'andreasenwandi@gmail.com', 'A'),
(39, '3311801011', 'MELINA WITRI', 'melina.3311801011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085322430637', 'melinawitri30012023@gmail.com', 'A'),
(40, '3311801012', 'NOVITASARI', 'novitasari.3311801012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '+62 822-8533-5091', 'novita.vavitasari@gmail.com', 'A'),
(41, '3311801013', 'HERYANTO HASUDUNGAN', 'heryanto.3311801013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(42, '3311801014', 'TRESYA MELLIYANI', 'tresya.3311801014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089513663831', 'treesyamelliyani31@gmail.com', 'A'),
(43, '3311801015', 'ULFA', 'ulfa.3311801015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085264541067', 'Ulfaridhwan25@gmail.com', 'A'),
(44, '3311801016', 'SULTAN ARIZAL MAHING', 'sultan.3311801016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087818736254', 'arizalsultan25@gmail.com', 'A'),
(45, '3311801017', 'ANITA TRI RAHMAWATI', 'anita.3311801017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081362614517', 'anitatriramawati1006@gmail.com', 'A'),
(46, '3311801018', 'AL HILAL AKHYAR', 'hilal.3311801018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082116516042', 'hilalspeed99@gmail.com', 'A'),
(47, '3311801019', 'IQBAL AFIF', 'iqbal.3311801019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082387002680', 'kingiqbal1899@gmail.com', 'A'),
(48, '3311801020', 'HENNI HENDRANI NASUTION', 'henni.3311801020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085262852524', 'hhendranyn@gmail.com', 'A'),
(49, '3311801021', 'ARDY ARMANDO', 'ardy.3311801021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089623397653', 'ardybelian@gmail.com', 'A'),
(50, '3311801022', 'DANIEL TULUS MARISI SIANIPAR', 'daniel.3311801022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(51, '3311801023', 'FILANDA AL ROZAQ', 'filanda.3311801023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085835832438', 'filanda91@gmail.com', 'A'),
(52, '3311801024', 'REGITA DWI AYU LESTARI', 'regita.3311801024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087719122134', 'lestariregitadwiayu@gmail.com', 'A'),
(53, '3311801025', 'MAULITA RIZCHITA PUTRI', 'maulita.3311801025@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285542425', 'rizchita.p@gmail.com', 'A'),
(54, '3311801026', 'GILANG BAGUS RAMADHAN', 'gilang.3311801026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085156861862', 'gilangbagus.rama@outlook.com', 'A'),
(55, '3311801027', 'YOKI RENALDO SINAGA', 'yoki.3311801027@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08975142723', 'yokirenaldo42@gmail.com', 'A'),
(56, '3311801029', 'ARDITA HARDI', 'ardita.3311801029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895365964406', 'arditahardi15@gmail.com', 'A'),
(57, '3311801031', 'YUDHI ARMA MUSTIKA', 'yudhi.3311801031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283310355', 'yudhiarma02@gmail.com', 'A'),
(58, '3311801032', 'RAFIKA PATRICIA', 'rafika.3311801032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283354826', 'patriciarafika@gmail.com', 'A'),
(59, '3311801033', 'AXEL AGATHA IBRAHIM', 'axel.3311801033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085760800840', 'titanarmada48@gmail.com', 'A'),
(60, '3311801034', 'MOH. AWALUDIN DJAENI SAPUTRA', 'awaludin.3311801034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895360973777', 'zaeniawaludin96@gmail.com', 'A'),
(61, '3311801035', 'PANDU PUTRA PERDANA', 'pandu.3311801035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895603787618', 'putrapandu779@gmail.com', 'A'),
(62, '3311801036', 'RACHMAT FAUZAN', 'rachmat.3311801036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082284028241', 'rachmatfauzan07@gmail.com', 'A'),
(63, '3311801037', 'WINA SAFITRI LAMADIKE', 'wina.3311801037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895380447763', 'winaanca@gmail.com', 'A'),
(64, '3311801038', 'BIMA ADITYA KUSNANDA', 'bima.3311801038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081266330453', 'bima.kusnanda@gmail.com', 'A'),
(65, '3311801039', 'ABDURRAFI NAUFAL.S', 'abdurrafi.3311801039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(66, '3311801040', 'VIRA VIRARA', 'vira.3311801040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081371609355', 'viravirara11@gmail.com', 'A'),
(67, '3311801041', 'HAFIED KHALIFATUL ASH.SHIDDIQI', 'hafied.3311801041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895603679963', 'hafiedmadrid6@gmail.com', 'A'),
(68, '3311801042', 'ANDRE TAMINI PUTRA', 'andre.3311801042@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(69, '3311801043', 'RONAL PARDAMEAN SIAHAAN', 'ronal.3311801043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(70, '3311801044', 'IQBAL NUR RAMADHANI', 'iqbal.3311801044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082169001550', 'iqbalramadan089@gmail.com', 'A'),
(71, '3311801045', 'SOFI HANDAYANI', 'sofi.3311801045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085834817767', 'sofihandayani15@gmail.com', 'A'),
(72, '3311801046', 'ELPIN PENG SUNG', 'elpin.3311801046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081276568171', 'elpinpensung2121@gmail.com', 'A'),
(73, '3311801047', 'MELINIA RAMADANI MULYANI', 'melinia.3311801047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085765357831', 'rmulyani7880@gmail.com', 'A'),
(74, '3311801048', 'MUHAMAD ILHAM', 'muhamad.3311801048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085763141988', 'ahmadilham48oo@gmail.com', 'A'),
(75, '3311801050', 'RAMADHAN WIJAYA', 'ramadhan.3311801050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(76, '3311801051', 'ALDILLA NURFHARA DARASATI TANJUNG', 'aldilla.3311801051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895629491980', 'aldillafhara674@gmail.com', 'A'),
(77, '3311801052', 'OWEN MORA SITUMORANG', 'owen.3311801052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089650097678', 'situmorangowen03@gmail.com', 'A'),
(78, '3311801053', 'M. ALIEF CHANDRA ASRI', 'alief.3311801053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08990418858', 'aliefchandra1234@gmail.com', 'A'),
(79, '3311801054', 'FEBRIANA MANALU', 'febriana.3311801054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082169529164', 'febrimanalu39@gmail.com', 'A'),
(80, '3311801055', 'REZKI JANTURI PRATAMA', 'rezki.3311801055@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285711455', 'arxrezky@gmail.com', 'A'),
(81, '3311801057', 'GUZI ANTERA', 'guzi.3311801057@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(82, '3311801058', 'BAYU KRISNA', 'bayu.3311801058@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283978903', 'bayukrisna9637@gmail.com', 'A'),
(83, '3311801059', 'SINDI MEGA AULIA', 'sindi.3311801059@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082268186281', 'sindimegaaulia@gmail.com', 'A'),
(84, '3311811056', 'DINI ANNISA', 'dini.3311811056@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082181908514', 'dini.annisa1409@gmail.com', 'A'),
(85, '3311811057', 'MUHAMMAD SYAHRUR RAMADHAN', 'muhammad.3311811057@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082262382930', 'muhammadsyahrur18@gmail.com', 'A'),
(87, '3311811001', 'KIFLI', 'kifli.3311811001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(88, '3311811002', 'MARINA AKMAL', 'marina.3311811002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(89, '3311811003', 'MUHAMMAD RIDHO', 'muhammad.3311811003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(90, '3311811004', 'MARCELLO DWI DOBITO', 'marcello.3311811004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081378008552', 'marcellodobito34@gmail.com', 'A'),
(91, '3311811007', 'M. FANDY AZHAR', 'fandy.3311811007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(92, '3311811008', 'Isnandar Fatwa', 'isnandar.3311811008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082164184458', 'isnandarfatwa@gmail.com', 'A'),
(93, '3311811009', 'HENDRO', 'hendro.3311811009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085830554558', 'hendro.deluze@gmail.com', 'A'),
(94, '3311811011', 'ERPAN JOHAN', 'erpan.3311811011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081534208917', 'Erpanjohan011@gmail.com', 'A'),
(95, '3311811015', 'LAKUNTARA PALLAHIDU', 'lakuntara.3311811015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081276582531', 'lakuntara11@gmail.com', 'A'),
(96, '3311811016', 'FIRDA WIDIA SARI', 'firda.3311811016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(97, '3311811021', 'ALFREDO LUBIS', 'alfredo.3311811021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081374439301', 'alfredolubis5@gmail.com', 'A'),
(98, '3311811022', 'RIKI KRISNALDI', 'riki.3311811022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082391100590', 'riekienald@gmail.com', 'A'),
(99, '3311811023', 'M. HENDRA FEBRIAN', 'hendra.3311811023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(100, '3311811024', 'DIAN ANGGRAINI LUMBANTORUAN', 'dian.3311811024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(101, '3311811025', 'YULIA FEBRIANTI. M', 'yulia.3311811025@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085282730927', 'yuliafebrianty09@gmail.com', 'A'),
(102, '3311811026', 'YODI MARZA', 'yodi.3311811026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895365943025', 'yodifransisco123@gmail.com', 'A'),
(103, '3311811027', 'DEA ROULY OKTARIA DAMANIK', 'rouly.3311811027@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085356282089', 'oktariadamanik2910@gmail.com', 'A'),
(104, '3311811029', 'RANI WAHYU APRILIA', 'rani.3311811029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895614714942', 'raniwahyua@gmail.com', 'A'),
(105, '3311811030', 'AGUSTINUS ARUAN', 'agustinus.3311811030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(106, '3311811032', 'ASLAM MUBAROCH', 'aslam.3311811032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082392517676', 'aslammubaroch@gmail.com', 'A'),
(107, '3311811034', 'HUSEIN MUHAMMAD', 'husein.3311811034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '088271264676', 'huseinmuhammad12345@gmail.com', 'A'),
(108, '3311811035', 'AJI PRATAMA AGUS SETIAWAN ', 'aji.3311811035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(109, '3311811036', 'FERY AFRIYANTO', 'fery.3311811036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082372458734', 'ferryxmith@gmail.com', 'A'),
(110, '3311811037', 'REYNALDI SIHOMBING', 'reynaldi.3311811037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(111, '3311811038', 'RIDHO ALFIAN', 'ridho.3311811038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081261350038', 'ridhoalfian808@gmail.com', 'A'),
(112, '3311811039', 'NADYA ALISA SESIQ MILLENIA KASIM', 'nadya.3311811039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082134186141', 'nadyaalisasesiq16@gmail.com', 'A'),
(113, '3311811040', 'RYAN ANDREANSYAH', 'ryan.3311811040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081266016170', 'ryanandreansyah70@gmail.com', 'A'),
(114, '3311811041', 'REZA ARDIANSA', 'reza.3311811041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(115, '3311811042', 'DWI CAHYA PURNAMA AJI', 'dwi.3311811042@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081267923470', 'ajdiwicahya7@gmail.com', 'A'),
(116, '3311811043', 'EDWARD AKBAR P', 'edward.3311811043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(117, '3311811044', 'ARYA FACHREZI ALFY', 'arya.3311811044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087781140908', 'arya.alfy00@gmail.com', 'A'),
(118, '3311811090', 'MUHAMMAD CHALIQ EDGAR DAVIEST HASIBUAN', 'muhammad.3311801060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(119, '3311811045', 'JEFRY GUNAWAN', 'jefry.3311811045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087797796047', 'jefrygunawan120@gmail.com', 'A'),
(120, '3311811046', 'RENDI RAMAHDI', 'rendi.3311811046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(121, '3311811047', 'FADHIL RAMADHAN', 'fadhil.3311811047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(122, '3311811048', 'ERVYL ARWIANDA', 'ervyl.3311811048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081372886411', 'ervyl.arwianda.20@gmail.com', 'A'),
(123, '3311811050', 'FIKRI ALAMSAH', 'fikri.3311811050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(124, '3311811051', 'NUR AZIZAH', 'azizah.3311811051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(125, '3311811052', 'ARIF WIDARYANTO', 'arif.3311811052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087880696509', 'arifwidaryanto2@gmail.com', 'A'),
(126, '3311811053', 'JAYA NAPITUPULU', 'jaya.3311811053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081386587070', 'napitupulujaya77@gmail.com', 'A'),
(127, '3311811054', 'AULIA RAHMAN HARAHAP', 'aulia.3311811054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085765518373', 'auliarahmanharahap99@gmail.com', 'A'),
(128, '3311811055', 'CANDRA WIJAYA.MJ', 'candra.3311811055@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08984036792', 'candramj11@gmail.com', 'A'),
(129, '3311811058', 'WERI MERTIWI AFFIFAH', 'weri.3311811058@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089523863076', 'werimertiwi12@gmail.com', 'A'),
(130, '3311811059', 'WINDA SARI', 'winda.3311811059@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(131, '3311811060', 'ANNA THRESIA BR KARO', 'anna.3311811060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082168531092 ', 'annathresia0702@gmail.com', 'A'),
(132, '3311811061', 'RETNO ANGGI SYAHPUTRI', 'retno.3311811061@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(133, '3311811062', 'RADEN MUHAMAD AMIR HAMJAH', 'raden.3311811062@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(134, '3311811063', 'ANDHIKA PRATAMA', 'andhika.3311811063@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(135, '3311811064', 'SYAFA SALSABILA ISMAIL', 'syafa.3311811064@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(136, '3311811067', 'TOTO SUGIARTO', 'toto.3311811067@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285592105', 'totosugiarto595@gmail.com', 'A'),
(137, '3311811071', 'PUTRI PRIZA HALIA', 'putri.3311811071@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082268384286', 'prizahaliaputri@gmail.com', 'A'),
(138, '3311811074', 'DIMAS PANJI PERDANA', 'dimas.3311811074@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(139, '3311811075', 'RIVAL MARCELLENO', 'rival.3311811075@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(140, '3311811076', 'FEREN ANINDITA SALSABILA BORU PURBA', 'feren.3311811076@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(141, '3311811077', 'CHERIA ANJELI', 'cheria.3311811077@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081533807798', 'cheria198@gmail.com', 'A'),
(142, '3311811079', 'ANDIKA PASKA KRISDIANTO', 'andika.3311811079@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081268289838', 'andikapaskaa@gmail.com', 'A'),
(143, '3311811080', 'INDAH KHOTIMAH', 'indah.3311811080@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285911141', 'indahkhotim@gmail.com', 'A'),
(144, '3311811083', 'FAN YANSEN', 'yansen.3311811083@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089673931941', 'yansen@gmail.com', 'A'),
(145, '3311811084', 'MUHAMMAD FAUZAN ANSHAR ISMAN', 'muhammad.3311811084@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(146, '3311811085', 'ALDO WIJAYA', 'aldo.3311811085@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(147, '4311701033', 'Resa Putri Jelita', 'resa.4311701033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081261603344', 'resapj01@gmail.com', 'A'),
(148, '4311701037', 'Ahmad Daud Laia', 'ahmad.4311701037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895629063812', 'ahmaddaud40818@gmail.com', 'A'),
(149, '4311701038', 'Indra Pramana', 'indra.4311701038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(150, '4311701039', 'Elga Syakina Putri', 'elga.4311701039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085830077225', 'elgasyakina532@gmail.com', 'A'),
(151, '4311701040', 'Ary Pratama Putra', 'ary.4311701040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(152, '4311701041', 'Ady Kurniawan', 'ady.4311701041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(153, '4311701042', 'Nava Mary Trista Mendrofa', 'nava.4311701042@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(154, '4311701043', 'Jonathan Steven Siahaan', 'jonathan.4311701043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(155, '4311701044', 'Jihat Nur Robbi', 'jihat.4311701044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(156, '4311701045', 'Imam Muslim', 'imam.4311701045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(157, '4311701046', 'Prince Alvin Yusuf', 'prince.4311701046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082392042422', 'princealvinyusuf@gmail.com', 'A'),
(158, '4311701047', 'Fahril Layly Chusaini', 'fahril.4311701047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089614089205', 'fahrillayly47@gmail.com', 'A'),
(159, '4311701048', 'Nurhalimah Tussyaddiah', 'nurhalimah.4311701048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(160, '4311701049', 'Pragus Ilham Nayomi', 'pragus.4311701049@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082170791627', 'pragus238@gmail.com', 'A'),
(161, '4311701050', 'Hendra Lexmana Harahap', 'hendra.4311701050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(162, '4311701051', 'Novi Anggraeni', 'novi.4311701051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(163, '4311701052', 'Puspa Oktaviyani Santosa', 'puspa.4311701052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(164, '4311701053', 'Eric Febrianto', 'eric.4311701053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895609605210', 'ericfebrianto23@gmai.com', 'A'),
(165, '4311701054', 'Nila Rifka Sukma', 'nila.4311701054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08994084017', 'nilarifka35@gmail.com', 'A'),
(166, '4311701055', 'David Hasmito Tanbri', 'david.4311701055@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(167, '4311701056', 'Monisa Rizkia', 'monisa.4311701056@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089508391024', 'rizkiamonisa03@gmail.com', 'A'),
(168, '4311701057', 'Fahmi Aulia Rahmatullah', 'fahmi.4311701057@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(169, '4311701017', 'Reza Nirvana Pratama', 'reza.4311701017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(170, '4311701024', 'Reynanda Putra Pratama', 'reynanda.4311701024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(171, '4311711001', 'Adrian Priabdi Fauzi', 'adrian.4311711001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '+6281371789656', 'adrianpriabdifauzi@gmail.com', 'A'),
(172, '4311711002', 'Angestu Naufal Kurnia Aji', 'angestu.4311711002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(173, '4311711003', 'Jestika Elisabeth Simatupang', 'jestika.4311711003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0822 6845 7916', 'jestikaeliss@gmail.com', 'A'),
(174, '4311711004', 'Muhammad Hendri Kurnia', 'muhammad.4311711004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(175, '4311711005', 'Fajar Widiarto', 'fajar.4311711005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(176, '4311711006', 'Indra Rianto Saputra', 'indra.4311711006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087758766561', 'indra221197@gmail.com', 'A'),
(177, '4311711007', 'Arnold Pamungkas Hengkeng', 'arnold.4311711007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(178, '4311711008', 'Jundi Caesar Riando', 'jundi.4311711008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08992223097', 'jundicaesar@gmail.com', 'A'),
(179, '4311711009', 'Allif Maulana', 'allif.4311711009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081990801251', 'startwithlogic@gmail.com', 'A'),
(180, '4311711010', 'Sri Neli Utami', 'sri.4311711010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085805929199', 'utamisrineli@gmail.com', 'A'),
(181, '4311711011', 'Wachid Zaini', 'wachid.4311711011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082174011212', 'zainiwa1@gmail.com', 'A'),
(182, '4311711012', 'Yani', 'yani.4311711012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(183, '4311711013', 'Kumbara Sadewa', 'kumbara.4311711013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087827868343', 'ahong.vocal@gmail.com', 'A'),
(184, '4311711014', 'Muhammad Riza Gilang Darmawan', 'muhammad.4311711014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082238667724', 'rizagilang51@gmail.com', 'A'),
(185, '4311711015', 'Nanda Saputra', 'nanda.4311711015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082268516182', 'nandaamakayah@gmail.com', 'A'),
(186, '4311711016', 'Rebby Michael Lumangkun', 'rebby.4311711016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(187, '4311711017', 'Madrin Khalil Gibran', 'madrin.4311711017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895612911269', 'ixd.smpn2.khalil@gmail.com', 'A'),
(188, '4311711018', 'Yovan Sakti', 'yovan.4311711018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081218982570', 'yovansaktixr1@gmail.com', 'A'),
(189, '4311711019', 'Muhammad Risqi Gede Semidang', 'muhammad.4311711019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(190, '4311711020', 'Agung Saputra', 'agung.4311711020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(191, '4311711021', 'Ahmad Sabri', 'ahmad.4311711021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081268329245', 'abyapagenk18@gmail.com', 'A'),
(192, '4311711022', 'Shandy Rahmat Hidayat', 'shandy.4311711022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087884943567', 'sandyrahmat58@gmail.com', 'A'),
(193, '4311711023', 'Ade Anggara Okta Muria', 'ade.4311711023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285723274', 'anggaraoktamuria@gmail.com', 'A'),
(194, '4311711024', 'Muhammad Aqhil Fhaizky', 'muhammad.4311711024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08117788212', 'qhiltech21@gmail.com', 'A'),
(195, '4311711026', 'Tri Dedi Syaputra', 'tri.4311711026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(196, '4311711027', 'Fajar Bima Nugraha', 'fajar.4311711027@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081365048770', 'fajarbimaxr3@gmail.com', 'A'),
(197, '4311711028', 'Novi Martha Ria', 'novi.4311711028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081270370155', 'novymartharia95@gmail.com', 'A'),
(198, '4311711029', 'Indah Audina', 'indah.4311711029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(199, '4311711030', 'Handoko Sugitri Prasetyo', 'handoko.4311711030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '083183282170', 'handoko4124@gmail.com', 'A'),
(200, '4311711031', 'Hendry Wijaya', 'hendry.4311711031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(201, '4311711032', 'Muhammad Irvansyah Putra', 'muhammad.4311711032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(202, '4311711033', 'Dana Fiki Imrona', 'dana.4311711033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082172441069 ', 'danafiki1997@gmail.com', 'A'),
(203, '4311711034', 'Ridzky Febriyanto', 'ridzky.4311711034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(204, '4311711036', 'Charolina Darvita Putri', 'charolina.4311711036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895324749200', 'charolinadarvitaptri@gmail.com', 'A'),
(205, '4311711037', 'Rexa Febby Maulana', 'rexa.4311711037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(206, '4311711038', 'Elpera Eka Putri', 'elpera.4311711038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(207, '4311711039', 'Reynaldo Marlim', 'reynaldo.4311711039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082268776244', 'reynaldosteam22@gmail.com', 'A'),
(208, '4311711040', 'Wisnu Wardhana', 'wisnu.4311711040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(209, '4311711041', 'Purbaya', 'purbaya.4311711041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(210, '4311711042', 'Mohamad Rohman Hanafi', 'mohamad.4311711042@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(211, '4311711043', 'Anggi Syah Putri Nasution', 'anggi.4311711043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081275003436', 'anggisyahputrinst@gmail.com', 'A'),
(212, '4311711044', 'Raynaldo Efraim Sondakh', 'raynaldo.4311711044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(213, '4311711045', 'Herman Fitriadi P.', 'herman.4311711045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081275283785', 'hermanxr3@gmail.com', 'A'),
(214, '4311711046', 'James Aricson', 'james.4311711046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(215, '4311711047', 'Dwiky Fernando', 'dwiky.4311711047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087822552751', 'dwikyfernando57@gmail.com', 'A'),
(216, '4311711048', 'Harish Manarul Fauzi', 'harish.4311711048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(217, '4311711049', 'Erlinda Ainun Hasanah', 'erlinda.4311711049@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081276512351', 'ainunerlinda91@gmail.com', 'A'),
(218, '4311711050', 'Helena Virginia', 'helena.4311711050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285602423', 'helenavirginia1309@gmail.com', 'A'),
(219, '4311711052', 'Bayu Pranata', 'bayu.4311711052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(220, '4311711053', 'Felix Forgael', 'felix.4311711053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(221, '4311711054', 'Novia Afrylia Sari', 'novia.4311711054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(222, '4311711055', 'Esra Novalia Br Siahaan', 'esra.4311711055@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081267814033', 'esranovalia20@gmail.com', 'A'),
(223, '4311711056', 'Henri Manahan Siagian', 'henri.4311711056@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(224, '4311711057', 'Niswatul Audah', 'niswatul.4311711057@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(225, '4311711058', 'Muhammad Azizul Hakim', 'muhammad.4311711058@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(226, '4311711059', 'Alvonso Fourdinand Hasibuan', 'alvonso.4311711059@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '6287714697580', 'vonsogt18081999@gmail.com', 'A'),
(227, '4311711060', 'Renold Afriyan', 'renold.4311711060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(228, '4311711061', 'Dian Salisti Rahmadini', 'dian.4311711061@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(229, '4311931001', 'MILDA FATHURRIZKIYAH GISMA', 'MILDA.4311931001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(230, '4311931004', 'GENTA VICTORY YUSERA', 'GENTA.4311931004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895342206450', 'gyuserav@gmail.com', 'A'),
(231, '4311711035', 'Alfian Khoirun Ni\'Am', 'alfian.4311711035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(232, '4311711051', 'Kania Alifia \'Aqiilah', 'kania.4311711051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '088270893422', 'kaniaalifiaa@gmail.com', 'A'),
(233, '3311811005', 'WIL HIDAYANTI', 'hidayanti.3311811005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(234, '3311811010', 'LINDA NURAMA', 'linda.3311811010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081364742704', 'linda.nurama1@gmail.com', 'A'),
(235, '3311811012', 'ANDRI DHONI THASFARI', 'andri.3311811012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082284297662', 'andrithasfari@gmail.com', 'A'),
(236, '3311811013', 'ENI TAMSIKA MALAU', 'tamsika.3311811013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082169500830', 'enny.tamsika@gmail.com', 'A'),
(237, '3311811014', 'IRFAN SAHAT MARULI MANURUNG', 'irfan.3311811014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(238, '3311811017', 'SULIA RINTA BAKARA', 'sulia.3311811017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082178196003', 'rinta12041998@gmail.com', 'A'),
(239, '3311811018', 'ADE KUSNAENDAR', 'ade.3311811018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085274467478', 'ade.dekus@gmail.com', 'A'),
(240, '3311811019', 'ARTIKA PERMATA SARI', 'artika.3311811019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(241, '3311811020', 'ANES YULIZA', 'anes.3311811020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081267748391', 'anesyuliza99@gmail.com', 'A'),
(242, '3311811028', 'ABDUL HAFIZ NASUTION', 'abdul.3311811028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087894066509', 'abdulhafiznasution123@gmail.com', 'A'),
(243, '3311811031', 'RENGKO PANUSUNAN MALAU', 'rengko.3311811031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087786784652', 'Renkomalau@gmail.com', 'A'),
(244, '3311811033', 'ELVIDE SOLAGRATIA SIMAMORA', 'elvide.3311811033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(245, '3311811065', 'SAPANDRI', 'sapandri.3311811065@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087781910881', 'sapandri23@gmail.com', 'A'),
(246, '3311811066', 'VERALUNA MAGDALENA', 'veraluna.3311811066@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(247, '3311811068', 'BERLIANA APRILIANTY', 'berliana.3311811068@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082172432960', 'berlianaap28@gmail.com', 'A'),
(248, '3311811069', 'INRI GEBRIEL SITUMORANG', 'inri.3311811069@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087771202370', 'inrisitumorang1999@gmail.com', 'A'),
(249, '3311811070', 'AGUSLINE SIMANJUNTAK', 'agusline.3311811070@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085939290307', 'aguslinesimanjuntak@gmail.com', 'A'),
(250, '3311811072', 'HAMDAN NUR HIDAYAT', 'hamdan.3311811072@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081218662457', 'hamdannurhidayat601@gmail.com', 'A'),
(251, '3311811073', 'BALQEIS CHALIZURIA PUTRI', 'balqeis.3311811073@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081276835923', 'balqischptr@gmail.com', 'A'),
(252, '3311811078', 'YOHANES ARDIWIDYANTORO', 'yohanes.3311811078@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082176167488', 'yohanesardiwidyantoro@gmail.com', 'A'),
(253, '3311811081', 'YANDRE APDELAS SEMBIRING', 'yandre.3311811081@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081275003464', 'yandre1804@gmail.com', 'A'),
(254, '3311811082', 'MICHAELL VALEN SAENDRO', 'michaell.3311811082@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081275879470', 'vsaendro91@gmail.com', 'A'),
(255, '3311811086', 'HENDRY PUTRA PRATAMA', 'hendry.3311811086@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(256, '3311811087', 'FARIZ RIZKIA RAHMADSYAH', 'FARIZ.3311811087@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081275012124', 'farizrizky10@gmail.com', 'A'),
(257, '3311811088', 'NOVIANTI RURUK', 'NOVIANTI.3311811088@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(258, '3311811089', 'Eko Nanang Guntoro', 'eko.3311811089@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(259, '3321801001', 'DICKI PRAYOGI', 'dicki.3321801001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(260, '3321801002', 'RIZKI IRIANTO', 'rizki.3321801002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089521425034', 'rizkiirianto.ri@gmail.com', 'A'),
(261, '3321801003', 'NURUL HIKMAH', 'nurul.3321801003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(262, '3321801004', 'PUTRI', 'putri.3321801004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(263, '3321801005', 'NUR ATIFAH ULDA', 'atifah.3321801005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(264, '3321801006', 'ILFAH MAGDALINA', 'ilfah.3321801006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(265, '3321801007', 'RINI APRILIA SIAHAAN', 'rini.3321801007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(266, '3321801008', 'RIANA OKTAVIA AFANDI', 'riana.3321801008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085760766781', 'rianaoktaviaafandi@gmail.com', 'A'),
(267, '3321801009', 'NINDAWIDYA VIRAPUTRI', 'nindawidya.3321801009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(268, '3321801010', 'SUCI DAMAYANTI', 'suci.3321801010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(269, '3321801011', 'DEWI PUTRI ANDIKA', 'dewi.3321801011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(270, '3321801012', 'PAZIRA', 'pazira.3321801012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(271, '3321801013', 'MUHAMMAD APIK', 'muhammad.3321801013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(272, '3321801014', 'ZARA AZHARI', 'zara.3321801014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089508860631', 'zaraazhari99@gmail.com', 'A'),
(273, '3321801015', 'FATHUR RAHMAN', 'fathur.3321801015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(274, '3321801016', 'IKA FARHANA', 'farhana.3321801016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(275, '3321801017', 'BARKAH', 'barkah.3321801017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(276, '3321801018', 'TITA FITRIANI', 'tita.3321801018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(277, '3321801019', 'MUSLIMIN', 'muslimin.3321801019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(278, '3321801020', 'VINA SELVIA DWIYANTI', 'vina.3321801020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(279, '3321801021', 'DESI NATALIA TRIANESA', 'desi.3321801021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089623102285', 'desinataliatrianesa@gmail.com', 'A'),
(280, '3321801022', 'FAJAR MULIANA', 'fajar.3321801022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(281, '3321801023', 'AYU MAULIANI', 'mauliani.3321801023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081239810201', 'ayumaulianii@gmail.com', 'A'),
(282, '3321801024', 'ADELIA EKY WARDANI', 'adelia.3321801024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895344846751', 'adeliawardani3@gmail.com', 'A'),
(283, '3321801025', 'LARAS DWI RAMDANNI', 'laras.3321801025@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081364648169', 'larasdwiramdanni@gmail.com', 'A'),
(284, '3321801026', 'FARA NABILA ROSSA', 'fara.3321801026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(285, '3321801027', 'YOLANDA APRIANI PANJAITAN', 'yolanda.3321801027@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(286, '3321801028', 'DESTRIANI KABAN', 'destriani.3321801028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(287, '3321801029', 'PRIECILLA PARAWANTI HIDAYAT', 'priecilla.3321801029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(288, '3321801030', 'WAHYU NOOR MUNTOHA', 'wahyu.3321801030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(289, '3321801031', 'EMA NURMALA DENY', 'ema.3321801031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(290, '3321801032', 'RIZWAN BIN KHAMIS', 'rizwan.3321801032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(291, '3321801033', 'ELSA RAMADONNA', 'elsa.3321801033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085668295147', 'elsaramadonna22@gmail.com', 'A'),
(292, '3321801034', 'BREMA HANDIKA BANGUN', 'brema.3321801034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(293, '3321801035', 'MOH. BAGUS RAHMADI', 'bagus.3321801035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085831000236', 'moh.bagusrahmadi@gmail.com', 'A'),
(294, '3321801036', 'ARISTA SYAFITRI', 'arista.3321801036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085743126966', 'aristasyafitri123@gmail.com', 'A'),
(295, '3321801037', 'MIRANDA SIMANJUNTAK', 'miranda.3321801037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895376641051', 'miranda.simanjuntak2911@gmail.com', 'A'),
(296, '3321801038', 'FARAH MEILINA HALIM', 'farah.3321801038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895629140866', 'farahmeilina0105@gmail.com', 'A'),
(297, '3321801039', 'YOSSI PRAYOGA', 'yossi.3321801039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283500323', 'yossiprayoga160520@gmail.com', 'A'),
(298, '3321801040', 'ARDILA K', 'ardila.3321801040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(299, '3321801041', 'MUHAMMAD SULTAN FATHIN', 'muhammad.3321801041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(300, '3321801042', 'RIFA ADLIANI', 'rifa.3321801042@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085264075455', 'rifadliani@gmail.com', 'A'),
(301, '3321801043', 'RINA KARMILA', 'rina.3321801043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085216326159', 'karmilarina11@gmail.com', 'A'),
(302, '3321801044', 'MELKISEDEK MATUA HORAS MANURUNG', 'melkisedek.3321801044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089644927446', 'melkimanurung1999@gmail.com', 'A'),
(303, '3321801045', 'HALIMATUN SADDIAH', 'halimatun.3321801045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '+62 853-6340-4672', 'saddiahhalimah@gmail.com', 'A'),
(304, '3321801046', 'NUR HAFIZAH', 'hafizah.3321801046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(305, '3321801047', 'DINA FADILA PUTRI', 'dina.3321801047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(306, '3321801048', 'PRAMA RIDHO RAMADHANA', 'prama.3321801048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(307, '3321801049', 'YULIA', 'yulia.3321801049@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(308, '3321801050', 'BAYU KRESNAPUTRA HIDAYATULAH', 'bayu.3321801050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085760647197', 'bayukresnaph@gmail.com', 'A'),
(309, '3321801051', 'FIKA MARIONAS SAPUTRA', 'fika.3321801051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(310, '3321801052', 'RAKHA PERMANA ADI', 'rakha.3321801052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(311, '3321801053', 'ZAIDAN HIDAYATULLAH', 'zaidan.3321801053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(312, '3321801054', 'FIRMAN SYAHRULLAH', 'firman.3321801054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(313, '3321811003', 'BINTANG BUDHIMAN', 'bintang.3321811003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(314, '3321811001', 'DOLI WAHYU PRASETIYO', 'doli.3321811001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(315, '3321811002', 'DAVID SETIAWAN', 'david.3321811002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(316, '3321811005', 'NINDY HIDAYAH PUTRI', 'nindy.3321811005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(317, '3321811006', 'MONICA LUMBAN SIANTAR', 'monica.3321811006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(318, '3321811007', 'SYAIFULLAH SANUSI', 'syaifullah.3321811007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(319, '3321811008', 'JENDRI HARAPAN SIRAIT', 'jendri.3321811008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(320, '3321811009', 'LIZA MEUTIA HANIM', 'liza.3321811009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(321, '3321811010', 'SAFWAN', 'safwan.3321811010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(322, '3321811011', 'ASRIAH', 'asriah.3321811011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(323, '3321811012', 'YUNI ELISABETH', 'yuni.3321811012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(324, '3321811013', 'WAHYU WIDYANINGRUM', 'wahyu.3321811013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(325, '3321811014', 'MAKMUR AL FARIQ', 'makmur.3321811014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(326, '3321811015', 'MUHAMMAD DEPRIYANDI', 'muhammad.3321811015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(327, '3321811016', 'MUHAMMAD FAUZI', 'muhammad.3321811016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '', 'A'),
(331, '3311611015', 'RISKA NOVIANTI', 'riska.novianti.3311611015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087882294533', 'liskanovianti13@gmail.com', 'A'),
(333, '3311711036', 'Diezan Adhe Pratama', 'diezan.3311711036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087758960048 ', 'diezan.adhee@gmail.com', 'A'),
(334, '3311601070', 'NADA RAHMA KHAIRUNNISA', 'nada.rahma.khairunnisa.3311601070@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895383470153', 'khairunnisanada04@gmail.com', 'A'),
(335, '3311601087', 'VADYA MAYRIVA VIRADYCA', 'vadya.mayriva.viradyca.3311601087@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087784832945', 'vadyamayrivav@gmail.com', 'A'),
(336, '3311611010', 'IWAN NATAL SETIAWAN SIHOMBING', 'iwan.natal.setiawan.sihombing.3311611010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(337, '3311611011', 'SETYOWAN BUDDI', 'setyowan.buddi.3311611011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(338, '3311611019', 'LISA APRIANI', 'lisa.apriani.3311611019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(339, '3311611029', 'ALIF FITRA RAMADHANA', 'alif.fitra.ramadhana.3311611029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(340, '3311611030', 'DESANA ANGGALA PUTRA', 'desana.anggala.putra.3311611030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(341, '3311611034', 'NANDA A.', 'nanda.a..3311611034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(342, '3311611036', 'INDIN DIKKE ZEGA', 'indin.dikke.zega.3311611036@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(343, '3311611041', 'ANDRE ORLANDO', 'andre.orlando.3311611041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(344, '3311701009', 'Arif Febriana', 'arif.3311701009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085363524177', 'beemons123@gmail.com', 'A'),
(345, '3311701020', 'Jefrianto Manao', 'jefrianto.3311701020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(346, '3311701031', 'Jojor Ulina Reformasi Pandiangan', 'jojor.3311701031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(347, '3311701032', 'F.Donella Bangun', 'donella.3311701032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(348, '3311701038', 'Ika Waby Fadalyka', 'ika.3311701038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(349, '3311701049', 'Encek Ayu Tia Suhada', 'encek.3311701049@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(350, '3311701054', 'Erick Johan Munte', 'erick.3311701054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(351, '3311701056', 'Melati Tanti Oktavia', 'melati.3311701056@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '+62 823-8512-1072', 'melatitantioktavia@gmail.com', 'A'),
(352, '3311701060', 'Rohani Situmorang', 'rohani.3311701060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(353, '3311711003', 'Feriadi', 'feriadi.3311711003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(354, '3311711004', 'Satriawi Siregar', 'satriawi.3311711004@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(355, '3311711005', 'Sri Astuti Mulyaningsih', 'sri.3311711005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(356, '3311711008', 'Rangga Dwi Cahyo', 'rangga.3311711008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(357, '3311711012', 'Rangga Rentya', 'rangga.3311711012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(358, '3311711016', 'Ogi Prasetyo', 'ogi.3311711016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082360757234', 'ogi.prasetyo9@gmail.com', 'A'),
(359, '3311711018', 'M Yusuf', 'm.3311711018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(360, '3311711026', 'M. Fikri Nur Ihsan', 'fikri.3311711026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(361, '3311711028', 'Mella Puti Bustami', 'mella.3311711028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(362, '3311711030', 'Glagah Elman Heryanto', 'glagah.3311711030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A');
INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`, `status`, `no_wa`, `email_lain`, `group`) VALUES
(363, '3311711035', 'Eqwin Nurhayati Manurung', 'eqwin.3311711035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(364, '3311711038', 'Rahmad Gilang Pratama', 'rahmad.3311711038@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(365, '3311711041', 'Fragassa Agretifano Karbera', 'fragassa.3311711041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(366, '3311711043', 'Yosua Eko Saputra', 'yosua.3311711043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(367, '3311711044', 'Jumawan', 'jumawan.3311711044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(368, '3311711049', 'Tareq Bagja Maulana', 'tareq.3311711049@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(369, '3311711050', 'Robby Ilhansyah Pohan', 'robby.3311711050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(370, '3311711051', 'Mokhamat Khairul Khanafi', 'mokhamat.3311711051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(371, '3311711052', 'Ari Novriansyah', 'ari.3311711052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(372, '3311711053', 'Maz Rhafi', 'maz.3311711053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(373, '3311711054', 'Muhamad Rizqi', 'muhamad.3311711054@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(374, '3311711057', 'Ika Anggun Lestari', 'ika.3311711057@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(375, '3311711060', 'Yolanda Herawati', 'yolanda.3311711060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(376, '3311711062', 'Novebriana Nadirajpidera Simamora', 'novebriana.3311711062@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082284680379', 'novebrianan@gmail.com', 'A'),
(377, '3311711066', 'Josephin Situmorang', 'josephin.3311711066@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(378, '3311711067', 'Muhammad Alfi Syahrin', 'muhammad.3311711067@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(379, '3311711068', 'Elsa Chinthya Devi', 'elsa.3311711068@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '+6281213697031', 'elsasimanungkalit58@gmail.com', 'A'),
(380, '3311711071', 'Aprelia Vita Saputri', 'aprelia.3311711071@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(381, '3311711072', 'Miyanti Eliyani Simatupang', 'miyanti.3311711072@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(382, '3311711073', 'Rifan Aryo', 'rifan.3311711073@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(383, '3311711077', 'Agung Suaini Hidayat', 'agung.3311711077@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(384, '3311711080', 'Daniel Marjuki Sihaloho', 'daniel.3311711080@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082288830029', 'danielsihaloho1@gmail.com', 'A'),
(385, '3311711082', 'Algi Pratama Putra', 'algi.3311711082@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(386, '3311711083', 'Julita Theresia Sianipar', 'julita.3311711083@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(387, '3311711084', 'Alif Putra Fiandi', 'alif.3311711084@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(388, '3311711090', 'Yossi Kristayanti Nababan', 'yossi.3311711090@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895 358600977', 'yossi.kristayanti2016@gmail.com', 'A'),
(389, '3311601082', 'RIFKY ALDIYANSYAH', 'rifky.aldiyansyah.3311601082@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(390, '3311612002', 'RIZKI KHALIL', 'RIZKI.KHALIL.3311612002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(391, '3311612005', 'PIRO MANALU', 'PIRO.MANALU.3311612005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(392, '3311612006', 'RETNO HANDAYANI', 'RETNO.HANDAYANI.3311612006@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(393, '3311612008', 'SUPARYONO', 'SUPARYONO.3311612008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(394, '3311612011', 'DEWI LUDITA', 'DEWI.LUDITA.3311612011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(395, '3311612017', 'MUTIARA', 'MUTIARA.3311612017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(396, '3311701008', 'Noferindo Ariskha', 'noferindo.3311701008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(397, '3311701028', 'Bangkit Simmabur', 'bangkit.3311701028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(398, '3311701034', 'Ardya Anggun Pramesty', 'ardya.3311701034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895615101558', 'ardyasembilana@gmail.com', 'A'),
(399, '3311701043', 'Kevin Riady', 'kevin.3311701043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(400, '3311701048', 'Rolin Manurung', 'rolin.3311701048@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(401, '3311701051', 'Rifqi Taufiqul Hakim', 'rifqi.3311701051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(402, '3311711063', 'Randiyansyah', 'randiyansyah.3311711063@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(403, '3311711078', 'Putri Sheila Pane', 'putri.3311711078@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081223577503', 'Putripane.1998@gmail.com', 'A'),
(404, '3321611017', 'AYU ZULINARRIFAH ABSAR', 'ayu.zulinarrifah.absar.3321611017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(405, '3321701022', 'Zamratul Hayana', 'zamratul.3321701022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08984048763', 'zamratulhayana@gmail.com', 'A'),
(406, '3321701029', 'Fitriyani Harahap', 'fitriyani.3321701029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085274114989', 'fitryyh0225@gmail.com', 'A'),
(407, '4311601003', 'SAMUEL MANGARA HAMONANGAN HUTA', 'samuel.mangara.hamonangan.huta.4311601003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(408, '4311601010', 'KALANG PANGENTAS', 'kalang.pangentas.4311601010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(409, '4311601012', 'ANDI KURNIAWAN WAHYU ISLAMI', 'andi.kurniawan.wahyu.islami.4311601012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(410, '4311601016', 'NAZRI DWI LIANSYAH', 'nazri.dwi.liansyah.4311601016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(411, '4311601017', 'SYARIFAH SHAKILA ALATAS', 'syarifah.shakila.alatas.4311601017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(412, '4311601020', 'FERI YANSYAH', 'feri.yansyah.4311601020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(413, '4311601023', 'M RIFKY RAFSANJANI RELVA', 'm.rifky.rafsanjani.relva.4311601023@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(414, '4311601024', 'JAMES', 'james.4311601024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(415, '4311601028', 'MOCH. CALVIN ALI', 'moch..calvin.ali.4311601028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(416, '4311601068', 'FREDIANTA SAPUTRA KABAN', 'fredianta.saputra.kaban.4311601068@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(417, '4311601073', 'GIO FITRA TIRTA MANDALA', 'gio.fitra.tirta.mandala.4311601073@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(418, '4311601086', 'JONATHAN ELSSON SUHENDRA', 'jonathan.elsson.suhendra.4311601086@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '088211540157', 'jonathan.elsson@gmail.com', 'A'),
(419, '4311611015', 'NOVIANA EKA RHAHMAWATI', 'noviana.eka.rhahmawati.4311611015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '089604492123', 'novianaekar@gmail.com', 'A'),
(420, '4311611020', 'KRISDA YANTO ANWAR ZENDRATO', 'krisda.yanto.anwar.zendrato.4311611020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(421, '4311611032', 'NUR MUTIARA', 'nur.mutiara.4311611032@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(422, '4311611034', 'MUHAMAD YOGGY PUTRA', 'muhamad.yoggy.putra.4311611034@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(423, '4311611037', 'DIAJENG AGNESTHITHI', 'diajeng.agnesthithi.4311611037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(424, '4311611041', 'ARGO ARYA', 'argo.arya.4311611041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(425, '4311611044', 'EKO PUTRA', 'eko.putra.4311611044@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(426, '4311611050', 'ALDILAN DIMEITRY', 'aldilan.dimeitry.4311611050@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(427, '4311611052', 'DWIATMA ALBAR JUARVA', 'dwiatma.albar.juarva.4311611052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(428, '4311611055', 'SUSAN', 'susan.4311611055@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(429, '4311301030', 'Ahmad Fauzan', 'ahmad.fauzan@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(430, '4311401036', 'NINA SURYA PRESILIA', 'nina.surya.presilia@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(431, '4311401038', 'Tri Sandi Septian', 'tri.sandi.septian@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(432, '4311401040', 'Salahuddin', 'salahuddin@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(433, '4311401048', 'RAJA FITRA MUSTAWA', 'raja.fitra.mustawa@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081276203080', 'rajafitra3396@gmail.com', 'A'),
(434, '4311401060', 'David Endra Yoga Pratama', 'david.endra.yoga@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(435, '4311401071', 'HASHEMI RAFSANJANI', 'hashemi.rafsanjani@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(436, '4311501071', 'Fadly Ilhami', 'fadly.ilhami.4311501071@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(437, '4311501081', 'Rd Danny Maulana', 'rd.danny.maulana@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(438, '4311511008', 'RAHMAD RISKI ABDULLAH', 'rahmad.riski.abdullah@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(439, '4311511022', 'WINONA SARASWATY', 'winona.saraswaty.4311511022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '08117700822', 'winosaras@gmail.com', 'A'),
(440, '4311511024', 'Muhammad Reza Aditya', 'muhammad.reza.aditya@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(441, '4311511031', 'Embun Kausar', 'embun.kausar.4311511031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(442, '4311511035', 'Andrie Yudhistira', 'andrie.yudhistira.4311511035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(443, '4311501067', 'IKE ATMAJAWATI', 'ike.atmajawati.4311501067@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085765320848', 'Ike.atmaja@gmail.com', 'A'),
(444, '4311501068', 'Muhamad Panji Restu', 'muhamad.panji.restu@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(445, '4311501095', 'Fuinalai Juliana Makanpa', 'fuinalai.juliana.makanpa@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(446, '4311511002', 'RAFLI SEPTYADI', 'rafli.septyadi.4311511002@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(447, '4311511005', 'CELINE DION S', 'celine.dion.4311511005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(448, '4311511007', 'SIVA ZULFIKAR', 'siva.zulfikar.4311511007@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(449, '4311511012', 'DANIEL RYAN PRIMADI PAKPAHAN', 'daniel.ryan.primadi@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(450, '4311511019', 'ALIANSYAH PUTRA', 'aliansyah.putra.4311511019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081293224610', 'aliansyahptra@gmail.com', 'A'),
(451, '4311401013', 'Christopher Manatap Purba', 'christopher.manatap.purba@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081536219807', 'christopherpurba027@gmail.com', 'A'),
(452, '4311511018', 'MADHITYA PRANATA', 'madhitya.pranata.4311511018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(453, '4311611018', 'DINDA ALVIONA PUTRI', 'dinda.alviona.putri.4311611018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082170203605', 'dindaalvionaa@gmail.com', 'A'),
(454, '4311611011', 'IMAM SABARULLAH', 'imam.sabarullah.4311611011@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081396166010', 'imamalbatamy@gmail.com', 'A'),
(455, '4311611003', 'ANGGI ASPRIANTI', 'anggi.asprianti.4311611003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087791151038', 'anggiasprianti28@gmail.com', 'A'),
(456, '4311611012', 'IRA MARIANA', 'ira.mariana.4311611012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(457, '4311611017', 'HELMY DZULFIQAR', 'helmy.dzulfiqar.4311611017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(458, '4311611022', 'DIAN ISLAMIYATI', 'dian.islamiyati.4311611022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(459, '4311611024', 'SYUKRIAL FAUZAN HAMDI', 'syukrial.fauzan.hamdi.4311611024@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(460, '4311611026', 'CINDY CLARESTA', 'cindy.claresta.4311611026@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(461, '4311611029', 'DEKYY PERMAILEN', 'dekyy.permailen.4311611029@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(462, '4311611030', 'MUHAMMAD ILHAM', 'muhammad.ilham.4311611030@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(463, '4311611063', 'RAVICO ALVIS', 'ravico.alvis.4311611063@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(464, '4311611064', 'PATASSYA LARAS HIDAYAT', 'patassya.laras.hidayat.4311611064@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(465, '4311611033', 'DEWI HERMAWANINGSIH', 'dewi.hermawaningsih.4311611033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(466, '4311931005', 'IBRAHIM TAUFIK CIMPAGO', 'ibrahim.4311931005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082285178356', 'ibrahim.taufik04@yahoo.com', 'A'),
(467, '3311511056', 'Reza Margianti Sari', 'reza.margianti.sari@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082179969146', 'rezamargiantisari@gmail.com', 'A'),
(468, '3311511041', 'Azelia Lestari', 'azelia.lestari.3311511041@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082288000146', 'lazelya@gmail.com', 'A'),
(469, '3311501076', 'Ilham', 'ilham.3311501076@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082286041062', 'slmuhammadilham@gmail.com', 'A'),
(470, '3311601092', 'NORANIZAH', 'noranizah.3311601092@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '083191182441', 'noranizah11@gmail.com', 'A'),
(471, '3311601085', 'EKA WAHYUNI', 'eka.3311601085@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283791308', '1997ekawahyuni@gmail.com', 'A'),
(472, '3311601022', 'NABILLA NURUL AINI', 'nabilla.nurul.aini.3311601022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(473, '4311501052', 'ADHI RAHMADIKA', 'adhi.rahmadika.4311501052@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '085156870917', 'adiraaadi@gmail.com', 'A'),
(474, '4311601067', 'IVON DEWI RETNO ANGGRANI', 'ivon.dewi.retno.anggrani.4311601067@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(475, '4311311037', 'Tito Sinra', 'tito.sinra@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(476, '4311511020', 'MICHEL K', 'michel.4311511020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081990931261', 'michaeloke917@gmail.com', 'A'),
(477, '4311401047', 'Wuri Ayuningtyas Hapsari', 'wuri.ayuningtyas.hapsari@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(478, '3321711008', 'Gregorius Harry Saktian Sinaga', 'gregorius.3321711008@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081261090619', '-', 'A'),
(479, '3321711020', 'Firmanda', 'firmanda.3321711020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082122554271', 'firmansyafiie7@gmail.com', 'A'),
(480, '3411911053', 'IRFANSYAH', 'IRFANSYAH.3411911053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0857123', 'IRFANSYAH.3411911053@students.polibatam.ac.id', 'B'),
(481, '3311701047', 'Muhamad Fani', 'muhamad.3311701047@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(482, '3311701061', 'Ahmad Ardianto Saputra', 'ahmad.3311701061@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(483, '3311711015', 'Ningsi Normawati Sitompul', 'ningsi.3311711015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283288140', 'ningsinormawat65@gmail.com', 'A'),
(484, '3311711021', 'Aji Prabowo', 'aji.3311711021@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(485, '3311711058', 'Endang Kristiani Laoli', 'endang.3311711058@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(486, '3321701015', 'Andriansyah', 'andriansyah.3321701015@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(487, '3321701040', 'Bergeria Sultra', 'bergeria.3321701040@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(488, '3321701043', 'Farid Dzakwan Ramadhan', 'farid.3321701043@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(489, '4311411006', 'Hans Jagardo Nicolas Simanjunt', 'hans.jagardo.nicolas@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081371945021', 'hjns006@gmail.com', 'A'),
(490, '4311601014', 'JIHAN NURFATIMAH H.', 'jihan.nurfatimah.h..4311601014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(491, '4311601019', 'SALYMA MUNA SARAWATUSSAFA', 'salyma.muna.sarawatussafa.4311601019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(492, '4311601022', 'ALEXANDER CHARLES', 'alexander.charles.4311601022@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(493, '4311601089', 'SELVIA SIHOMBING', 'selvia.sihombing.4311601089@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(494, '4311601090', 'ADE TIA PUTRI ABDULLAH', 'ade.tia.putri.abdullah.4311601090@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '0895629499617', 'adetiapa1224@gmail.com', 'A'),
(495, '3311611001', 'MUNGI SARIFKI', 'mungi.sarifki.3311611001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(496, '3311611003', 'MOCHAMMAD BAGUS JATI PERMANA', 'mochammad.bagus.jati.permana.3311611003@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(497, '3311611005', 'IHSAN', 'ihsan.3311611005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(498, '3311611009', 'NANDA ARIF FEBRIAN', 'nanda.arif.febrian.3311611009@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(499, '3311611016', 'ANGGA ANDREAN', 'angga.andrean.3311611016@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(500, '3311611025', 'SETIA GUNAWAN RAJAGUKGUK', 'setia.gunawan.rajagukguk.3311611025@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(501, '3311611028', 'CHRISLEE NIBERTO SIMANUNGKALIT', 'chrislee.niberto.simanungkalit.3311611028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(502, '3311701037', 'Sri Mahayu', 'sri.3311701037@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(503, '3321701039', 'Nahila Husna', 'nahila.3321701039@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081363084943', 'nahilanay@gmail.com', 'A'),
(504, '3311501019', 'AGUSTIAN PRATAMA', 'agustian.pratama.3311501019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(505, '4311311012', 'Fery Kristianto Wibowo', 'fery.kristianto.wibowo@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '087791234884', 'ferykristianto@gmail.com', 'A'),
(506, '4311601058', 'BUDI SETIA DHARMA DWIPUTRA', 'budi.setia.dharma.dwiputra.4311601058@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082283308001', 'budi.lanfers@gmail.com', 'A'),
(507, '4311601060', 'FAIZAL ABDILLAH', 'faizal.abdillah.4311601060@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '081990996292', 'faizalabdillah098@gmail.com', 'A'),
(508, '3311511025', 'Gilli Aprilya Syahfrudin', 'gilli.aprilya.syahfrudin@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(509, '3311501073', 'Dicky Octaputra', 'dicky.octaputra.3311501073@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(510, '3311511035', 'Dwi Agung Saptono', 'dwi.agung.saptono@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(511, '3321701046', 'Rizky Ramadhan', 'rizky.3321701046@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A'),
(512, '3321701045', 'Siti Lasmini', 'siti.3321701045@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '-', '-', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota_tugas_akhir`
--
ALTER TABLE `tb_anggota_tugas_akhir`
  ADD PRIMARY KEY (`id_tugas_akhir`,`id_mhs`);

--
-- Indexes for table `tb_berkas_final`
--
ALTER TABLE `tb_berkas_final`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tb_diskusi_penguji`
--
ALTER TABLE `tb_diskusi_penguji`
  ADD PRIMARY KEY (`id_diskusi`,`id_jadwal`,`id_dosen`,`id_mhs`);

--
-- Indexes for table `tb_isi_diskusi`
--
ALTER TABLE `tb_isi_diskusi`
  ADD PRIMARY KEY (`id_isi_diskusi`);

--
-- Indexes for table `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `tb_jadwal_sidang_ibfk_1` (`id_tugas_akhir`);

--
-- Indexes for table `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indexes for table `tb_laporan_ta`
--
ALTER TABLE `tb_laporan_ta`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `tb_pengajuan_pembimbing`
--
ALTER TABLE `tb_pengajuan_pembimbing`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_penilaian_sidang`
--
ALTER TABLE `tb_penilaian_sidang`
  ADD PRIMARY KEY (`id_jadwal`,`id_dosen`);

--
-- Indexes for table `tb_penilaian_sidang_anggota`
--
ALTER TABLE `tb_penilaian_sidang_anggota`
  ADD PRIMARY KEY (`id_jadwal`,`id_dosen`,`id_ta`,`id_mhs`);

--
-- Indexes for table `tb_penilaian_sidang_baru`
--
ALTER TABLE `tb_penilaian_sidang_baru`
  ADD PRIMARY KEY (`id_jadwal`,`id_dosen`);

--
-- Indexes for table `tb_penilaian_ta1`
--
ALTER TABLE `tb_penilaian_ta1`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indexes for table `tb_penilaian_ta1_baru`
--
ALTER TABLE `tb_penilaian_ta1_baru`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indexes for table `tb_penilaian_ta2`
--
ALTER TABLE `tb_penilaian_ta2`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indexes for table `tb_penilaian_ta2_baru`
--
ALTER TABLE `tb_penilaian_ta2_baru`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indexes for table `tb_periode_ta`
--
ALTER TABLE `tb_periode_ta`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tb_pra_sidang`
--
ALTER TABLE `tb_pra_sidang`
  ADD PRIMARY KEY (`id_pra_sidang`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_qr_sign`
--
ALTER TABLE `tb_qr_sign`
  ADD PRIMARY KEY (`id_sign`);

--
-- Indexes for table `tb_set_input_nilai`
--
ALTER TABLE `tb_set_input_nilai`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tb_tugas_akhir`
--
ALTER TABLE `tb_tugas_akhir`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  ADD PRIMARY KEY (`id_user_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_diskusi_penguji`
--
ALTER TABLE `tb_diskusi_penguji`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_isi_diskusi`
--
ALTER TABLE `tb_isi_diskusi`
  MODIFY `id_isi_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  MODIFY `id_kompetensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_laporan_ta`
--
ALTER TABLE `tb_laporan_ta`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengajuan_pembimbing`
--
ALTER TABLE `tb_pengajuan_pembimbing`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_periode_ta`
--
ALTER TABLE `tb_periode_ta`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pra_sidang`
--
ALTER TABLE `tb_pra_sidang`
  MODIFY `id_pra_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_qr_sign`
--
ALTER TABLE `tb_qr_sign`
  MODIFY `id_sign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  MODIFY `id_user_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  ADD CONSTRAINT `tb_jadwal_sidang_ibfk_1` FOREIGN KEY (`id_tugas_akhir`) REFERENCES `tb_tugas_akhir` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  ADD CONSTRAINT `tb_logbook_ta_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian_sidang`
--
ALTER TABLE `tb_penilaian_sidang`
  ADD CONSTRAINT `tb_penilaian_sidang_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal_sidang` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tugas_akhir`
--
ALTER TABLE `tb_tugas_akhir`
  ADD CONSTRAINT `tb_tugas_akhir_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
