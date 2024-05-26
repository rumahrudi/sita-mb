-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2020 pada 08.01
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota_tugas_akhir`
--

CREATE TABLE `tb_anggota_tugas_akhir` (
  `id_tugas_akhir` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `uraian_tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_sidang`
--

CREATE TABLE `tb_jadwal_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `periode_sidang` varchar(150) NOT NULL,
  `jenis_sidang` varchar(150) NOT NULL,
  `id_tugas_akhir` int(11) NOT NULL,
  `file_laporan` int(11) NOT NULL,
  `file_prasidang` varchar(250) NOT NULL,
  `penguji_1` int(11) NOT NULL,
  `penguji_2` int(11) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `jam_sidang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kompetensi`
--

CREATE TABLE `tb_kompetensi` (
  `id_kompetensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kompetensi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_ta`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logbook_ta`
--

CREATE TABLE `tb_logbook_ta` (
  `id_logbook` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `kemajuan_ta` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan_pembimbing`
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
-- Struktur dari tabel `tb_penilaian_sidang`
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
  `sidang_ulang` enum('ya','tidak','','') NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `file_perbaikan` text NOT NULL,
  `status` enum('Disetujui','Ditolak','Belum Perbaikan','Diajukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode_ta`
--

CREATE TABLE `tb_periode_ta` (
  `id_periode` int(11) NOT NULL,
  `periode_sidang` varchar(50) NOT NULL,
  `buka_sidang` date NOT NULL,
  `tutup_sidang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugas_akhir`
--

CREATE TABLE `tb_tugas_akhir` (
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tugas_akhir`
--

INSERT INTO `tb_tugas_akhir` (`id_mhs`, `id_dosen`, `judul`, `deskripsi`, `status`) VALUES
(1, 12, '-', '-', 'Proposal'),
(2, 9, '-', '-', 'Proposal'),
(3, 30, '-', '-', 'Proposal'),
(4, 12, '-', '-', 'Proposal'),
(5, 17, '-', '-', 'Proposal'),
(6, 30, '-', '-', 'Proposal'),
(7, 5, '-', '-', 'Proposal'),
(8, 17, '-', '-', 'Proposal'),
(9, 29, '-', '-', 'Proposal'),
(10, 7, '-', '-', 'Proposal'),
(11, 26, '-', '-', 'Proposal'),
(12, 5, '-', '-', 'Proposal'),
(13, 29, '-', '-', 'Proposal'),
(14, 29, '-', '-', 'Proposal'),
(15, 15, '-', '-', 'Proposal'),
(16, 29, '-', '-', 'Proposal'),
(17, 16, '-', '-', 'Proposal'),
(18, 30, '-', '-', 'Proposal'),
(19, 17, '-', '-', 'Proposal'),
(20, 29, '-', '-', 'Proposal'),
(21, 29, '-', '-', 'Proposal'),
(22, 17, '-', '-', 'Proposal'),
(23, 12, '-', '-', 'Proposal'),
(24, 29, '-', '-', 'Proposal'),
(25, 12, '-', '-', 'Proposal'),
(26, 29, '-', '-', 'Proposal'),
(27, 29, '-', '-', 'Proposal'),
(28, 16, '-', '-', 'Proposal'),
(29, 5, '-', '-', 'Proposal'),
(30, 40, '-', '-', 'Proposal'),
(31, 22, '-', '-', 'Proposal'),
(32, 38, '-', '-', 'Proposal'),
(33, 7, '-', '-', 'Proposal'),
(34, 24, '-', '-', 'Proposal'),
(35, 6, '-', '-', 'Proposal'),
(36, 24, '-', '-', 'Proposal'),
(37, 7, '-', '-', 'Proposal'),
(38, 27, '-', '-', 'Proposal'),
(39, 39, '-', '-', 'Proposal'),
(40, 22, '-', '-', 'Proposal'),
(41, 6, '-', '-', 'Proposal'),
(42, 38, '-', '-', 'Proposal'),
(43, 26, '-', '-', 'Proposal'),
(44, 28, '-', '-', 'Proposal'),
(45, 28, '-', '-', 'Proposal'),
(46, 27, '-', '-', 'Proposal'),
(47, 26, '-', '-', 'Proposal'),
(48, 24, '-', '-', 'Proposal'),
(49, 28, '-', '-', 'Proposal'),
(50, 28, '-', '-', 'Proposal'),
(51, 28, '-', '-', 'Proposal'),
(52, 24, '-', '-', 'Proposal'),
(53, 39, '-', '-', 'Proposal'),
(54, 7, '-', '-', 'Proposal'),
(55, 28, '-', '-', 'Proposal'),
(56, 24, '-', '-', 'Proposal'),
(57, 8, '-', '-', 'Proposal'),
(58, 23, '-', '-', 'Proposal'),
(59, 28, '-', '-', 'Proposal'),
(60, 38, '-', '-', 'Proposal'),
(61, 8, '-', '-', 'Proposal'),
(62, 24, '-', '-', 'Proposal'),
(63, 8, '-', '-', 'Proposal'),
(64, 27, '-', '-', 'Proposal'),
(65, 30, '-', '-', 'Proposal'),
(66, 6, '-', '-', 'Proposal'),
(67, 6, '-', '-', 'Proposal'),
(68, 23, '-', '-', 'Proposal'),
(69, 26, '-', '-', 'Proposal'),
(70, 23, '-', '-', 'Proposal'),
(71, 38, '-', '-', 'Proposal'),
(72, 14, '-', '-', 'Proposal'),
(73, 6, '-', '-', 'Proposal'),
(74, 23, '-', '-', 'Proposal'),
(75, 27, '-', '-', 'Proposal'),
(76, 8, '-', '-', 'Proposal'),
(77, 14, '-', '-', 'Proposal'),
(78, 27, '-', '-', 'Proposal'),
(79, 38, '-', '-', 'Proposal'),
(80, 40, '-', '-', 'Proposal'),
(81, 27, '-', '-', 'Proposal'),
(82, 21, '-', '-', 'Proposal'),
(83, 23, '-', '-', 'Proposal'),
(84, 35, '-', '-', 'Proposal'),
(85, 35, '-', '-', 'Proposal'),
(87, 22, '-', '-', 'Proposal'),
(88, 23, '-', '-', 'Proposal'),
(89, 15, '-', '-', 'Proposal'),
(90, 7, '-', '-', 'Proposal'),
(91, 32, '-', '-', 'Proposal'),
(92, 10, '-', '-', 'Proposal'),
(93, 10, '-', '-', 'Proposal'),
(94, 35, '-', '-', 'Proposal'),
(95, 39, '-', '-', 'Proposal'),
(96, 22, '-', '-', 'Proposal'),
(97, 39, '-', '-', 'Proposal'),
(98, 7, '-', '-', 'Proposal'),
(99, 15, '-', '-', 'Proposal'),
(100, 23, '-', '-', 'Proposal'),
(101, 23, '-', '-', 'Proposal'),
(102, 8, '-', '-', 'Proposal'),
(103, 8, '-', '-', 'Proposal'),
(104, 24, '-', '-', 'Proposal'),
(105, 36, '-', '-', 'Proposal'),
(106, 36, '-', '-', 'Proposal'),
(107, 10, '-', '-', 'Proposal'),
(108, 36, '-', '-', 'Proposal'),
(109, 10, '-', '-', 'Proposal'),
(110, 23, '-', '-', 'Proposal'),
(111, 10, '-', '-', 'Proposal'),
(112, 10, '-', '-', 'Proposal'),
(113, 35, '-', '-', 'Proposal'),
(114, 36, '-', '-', 'Proposal'),
(115, 7, '-', '-', 'Proposal'),
(116, 39, '-', '-', 'Proposal'),
(117, 10, '-', '-', 'Proposal'),
(118, 13, '-', '-', 'Proposal'),
(119, 10, '-', '-', 'Proposal'),
(120, 13, '-', '-', 'Proposal'),
(121, 14, '-', '-', 'Proposal'),
(122, 8, '-', '-', 'Proposal'),
(123, 21, '-', '-', 'Proposal'),
(124, 24, '-', '-', 'Proposal'),
(125, 10, '-', '-', 'Proposal'),
(126, 21, '-', '-', 'Proposal'),
(127, 22, '-', '-', 'Proposal'),
(128, 7, '-', '-', 'Proposal'),
(129, 24, '-', '-', 'Proposal'),
(130, 8, '-', '-', 'Proposal'),
(131, 35, '-', '-', 'Proposal'),
(132, 22, '-', '-', 'Proposal'),
(133, 10, '-', '-', 'Proposal'),
(134, 39, '-', '-', 'Proposal'),
(135, 40, '-', '-', 'Proposal'),
(136, 7, '-', '-', 'Proposal'),
(137, 22, '-', '-', 'Proposal'),
(138, 31, '-', '-', 'Proposal'),
(139, 35, '-', '-', 'Proposal'),
(140, 31, '-', '-', 'Proposal'),
(141, 35, '-', '-', 'Proposal'),
(142, 31, '-', '-', 'Proposal'),
(143, 35, '-', '-', 'Proposal'),
(144, 22, '-', '-', 'Proposal'),
(145, 23, '-', '-', 'Proposal'),
(146, 22, '-', '-', 'Proposal'),
(147, 30, '-', '-', 'Proposal'),
(148, 1, '-', '-', 'Proposal'),
(149, 26, '-', '-', 'Proposal'),
(150, 30, '-', '-', 'Proposal'),
(151, 40, '-', '-', 'Proposal'),
(152, 19, '-', '-', 'Proposal'),
(153, 19, '-', '-', 'Proposal'),
(154, 30, '-', '-', 'Proposal'),
(155, 30, '-', '-', 'Proposal'),
(156, 40, '-', '-', 'Proposal'),
(157, 17, '-', '-', 'Proposal'),
(158, 19, '-', '-', 'Proposal'),
(159, 19, '-', '-', 'Proposal'),
(160, 12, '-', '-', 'Proposal'),
(161, 1, '-', '-', 'Proposal'),
(162, 13, '-', '-', 'Proposal'),
(163, 38, '-', '-', 'Proposal'),
(164, 12, '-', '-', 'Proposal'),
(165, 5, '-', '-', 'Proposal'),
(166, 5, '-', '-', 'Proposal'),
(167, 5, '-', '-', 'Proposal'),
(168, 30, '-', '-', 'Proposal'),
(169, 16, '-', '-', 'Proposal'),
(170, 7, '-', '-', 'Proposal'),
(171, 21, '-', '-', 'Proposal'),
(172, 5, '-', '-', 'Proposal'),
(173, 16, '-', '-', 'Proposal'),
(174, 9, '-', '-', 'Proposal'),
(175, 19, '-', '-', 'Proposal'),
(176, 16, '-', '-', 'Proposal'),
(177, 19, '-', '-', 'Proposal'),
(178, 40, '-', '-', 'Proposal'),
(179, 21, '-', '-', 'Proposal'),
(180, 17, '-', '-', 'Proposal'),
(181, 15, '-', '-', 'Proposal'),
(182, 21, '-', '-', 'Proposal'),
(183, 19, '-', '-', 'Proposal'),
(184, 19, '-', '-', 'Proposal'),
(185, 17, '-', '-', 'Proposal'),
(186, 30, '-', '-', 'Proposal'),
(187, 5, '-', '-', 'Proposal'),
(188, 21, '-', '-', 'Proposal'),
(189, 19, '-', '-', 'Proposal'),
(190, 16, '-', '-', 'Proposal'),
(191, 15, '-', '-', 'Proposal'),
(192, 16, '-', '-', 'Proposal'),
(193, 16, '-', '-', 'Proposal'),
(194, 21, '-', '-', 'Proposal'),
(195, 15, '-', '-', 'Proposal'),
(196, 17, '-', '-', 'Proposal'),
(197, 15, '-', '-', 'Proposal'),
(198, 16, '-', '-', 'Proposal'),
(199, 16, '-', '-', 'Proposal'),
(200, 17, '-', '-', 'Proposal'),
(201, 15, '-', '-', 'Proposal'),
(202, 9, '-', '-', 'Proposal'),
(203, 36, '-', '-', 'Proposal'),
(204, 16, '-', '-', 'Proposal'),
(205, 36, '-', '-', 'Proposal'),
(206, 9, '-', '-', 'Proposal'),
(207, 14, '-', '-', 'Proposal'),
(208, 36, '-', '-', 'Proposal'),
(209, 1, '-', '-', 'Proposal'),
(210, 5, '-', '-', 'Proposal'),
(211, 9, '-', '-', 'Proposal'),
(212, 36, '-', '-', 'Proposal'),
(213, 8, '-', '-', 'Proposal'),
(214, 13, '-', '-', 'Proposal'),
(215, 9, '-', '-', 'Proposal'),
(216, 13, '-', '-', 'Proposal'),
(217, 8, '-', '-', 'Proposal'),
(218, 9, '-', '-', 'Proposal'),
(219, 13, '-', '-', 'Proposal'),
(220, 13, '-', '-', 'Proposal'),
(221, 9, '-', '-', 'Proposal'),
(222, 32, '-', '-', 'Proposal'),
(223, 32, '-', '-', 'Proposal'),
(224, 32, '-', '-', 'Proposal'),
(225, 32, '-', '-', 'Proposal'),
(226, 39, '-', '-', 'Proposal'),
(227, 17, '-', '-', 'Proposal'),
(228, 19, '-', '-', 'Proposal'),
(229, 9, '-', '-', 'Proposal'),
(230, 15, '-', '-', 'Proposal'),
(231, 36, '-', '-', 'Proposal'),
(232, 21, '-', '-', 'Proposal'),
(233, 28, '-', '-', 'Proposal'),
(234, 35, '-', '-', 'Proposal'),
(235, 1, '-', '-', 'Proposal'),
(236, 14, '-', '-', 'Proposal'),
(237, 1, '-', '-', 'Proposal'),
(238, 14, '-', '-', 'Proposal'),
(239, 39, '-', '-', 'Proposal'),
(240, 28, '-', '-', 'Proposal'),
(241, 39, '-', '-', 'Proposal'),
(242, 1, '-', '-', 'Proposal'),
(243, 39, '-', '-', 'Proposal'),
(244, 24, '-', '-', 'Proposal'),
(245, 40, '-', '-', 'Proposal'),
(246, 1, '-', '-', 'Proposal'),
(247, 1, '-', '-', 'Proposal'),
(248, 14, '-', '-', 'Proposal'),
(249, 14, '-', '-', 'Proposal'),
(250, 29, '-', '-', 'Proposal'),
(251, 1, '-', '-', 'Proposal'),
(252, 14, '-', '-', 'Proposal'),
(253, 40, '-', '-', 'Proposal'),
(254, 40, '-', '-', 'Proposal'),
(255, 22, '-', '-', 'Proposal'),
(256, 40, '-', '-', 'Proposal'),
(257, 32, '-', '-', 'Proposal'),
(258, 1, '-', '-', 'Proposal'),
(259, 41, '-', '-', 'Proposal'),
(260, 41, '-', '-', 'Proposal'),
(261, 34, '-', '-', 'Proposal'),
(262, 11, '-', '-', 'Proposal'),
(263, 34, '-', '-', 'Proposal'),
(264, 11, '-', '-', 'Proposal'),
(265, 33, '-', '-', 'Proposal'),
(266, 41, '-', '-', 'Proposal'),
(267, 20, '-', '-', 'Proposal'),
(268, 20, '-', '-', 'Proposal'),
(269, 34, '-', '-', 'Proposal'),
(270, 11, '-', '-', 'Proposal'),
(271, 11, '-', '-', 'Proposal'),
(272, 33, '-', '-', 'Proposal'),
(273, 11, '-', '-', 'Proposal'),
(274, 34, '-', '-', 'Proposal'),
(275, 20, '-', '-', 'Proposal'),
(276, 34, '-', '-', 'Proposal'),
(277, 11, '-', '-', 'Proposal'),
(278, 20, '-', '-', 'Proposal'),
(279, 25, '-', '-', 'Proposal'),
(280, 41, '-', '-', 'Proposal'),
(281, 33, '-', '-', 'Proposal'),
(282, 33, '-', '-', 'Proposal'),
(283, 33, '-', '-', 'Proposal'),
(284, 20, '-', '-', 'Proposal'),
(285, 33, '-', '-', 'Proposal'),
(286, 33, '-', '-', 'Proposal'),
(287, 42, '-', '-', 'Proposal'),
(288, 42, '-', '-', 'Proposal'),
(289, 34, '-', '-', 'Proposal'),
(290, 41, '-', '-', 'Proposal'),
(291, 20, '-', '-', 'Proposal'),
(292, 42, '-', '-', 'Proposal'),
(293, 41, '-', '-', 'Proposal'),
(294, 20, '-', '-', 'Proposal'),
(295, 41, '-', '-', 'Proposal'),
(296, 34, '-', '-', 'Proposal'),
(297, 20, '-', '-', 'Proposal'),
(298, 33, '-', '-', 'Proposal'),
(299, 42, '-', '-', 'Proposal'),
(300, 41, '-', '-', 'Proposal'),
(301, 20, '-', '-', 'Proposal'),
(302, 25, '-', '-', 'Proposal'),
(303, 42, '-', '-', 'Proposal'),
(304, 33, '-', '-', 'Proposal'),
(305, 41, '-', '-', 'Proposal'),
(306, 25, '-', '-', 'Proposal'),
(307, 42, '-', '-', 'Proposal'),
(308, 42, '-', '-', 'Proposal'),
(309, 34, '-', '-', 'Proposal'),
(310, 34, '-', '-', 'Proposal'),
(311, 11, '-', '-', 'Proposal'),
(312, 42, '-', '-', 'Proposal'),
(313, 42, '-', '-', 'Proposal'),
(314, 37, '-', '-', 'Proposal'),
(315, 25, '-', '-', 'Proposal'),
(316, 37, '-', '-', 'Proposal'),
(317, 37, '-', '-', 'Proposal'),
(318, 37, '-', '-', 'Proposal'),
(319, 25, '-', '-', 'Proposal'),
(320, 37, '-', '-', 'Proposal'),
(321, 25, '-', '-', 'Proposal'),
(322, 37, '-', '-', 'Proposal'),
(323, 25, '-', '-', 'Proposal'),
(324, 37, '-', '-', 'Proposal'),
(325, 25, '-', '-', 'Proposal'),
(326, 25, '-', '-', 'Proposal'),
(327, 37, '-', '-', 'Proposal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jabatan` enum('Dosen','Mahasiswa','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama`, `email`, `jabatan`) VALUES
(1, '113105', 'Supardianto, S.ST., M.Eng. ', 'supardianto@polibatam.ac.id', 'Admin'),
(5, '113104', 'Selly Artaty Zega, S.ST.', 'selly@polibatam.ac.id', 'Dosen'),
(6, '100017', 'Metta Santi Putri, S.T., M.SC.', 'metta@polibatam.ac.id', 'Admin'),
(7, '117175', 'Hamdani Arif, S.Pd., M.Sc', 'hamdaniarif@polibatam.ac.id', 'Dosen'),
(8, '107048', 'Afdhol Dzikri, S.ST, M.T', 'afdhol@polibatam.ac.id', 'Dosen'),
(9, '119221', 'Agung Riyadi, S.Si. M.Kom', 'agung@polibatam.ac.id', 'Dosen'),
(10, '107051', 'Agus Fatulloh, S.T, M.T', 'agus@polibatam.ac.id', 'Dosen'),
(11, '115145', 'Arif Roziqin, S.Pd, M.Sc', 'arifroziqin@polibatam.ac.id', 'Dosen'),
(12, '114131', 'Arta Uly Siahaan, S.Pd, M.Pd', 'artauly@polibatam.ac.id', 'Dosen'),
(13, '107054', 'Condra Antoni, S.S, M.A', 'condra@polibatam.ac.id', 'Dosen'),
(14, '119222', 'Dodi Prima Resda, S.Pd., M.Kom', 'dodi.prima@polibatam.ac.id', 'Dosen'),
(15, '106042', 'Evaliata Br.Sembiring,  S.Kom., M.Cs.', 'eva@polibatam.ac.id', 'Dosen'),
(16, '119223', 'Fadli Suandi, S.T., M.Kom.', 'fadli.suandi@polibatam.ac.id', 'Dosen'),
(17, '117193', 'Fandy Neta, S.Pd., M.Pd.T.', 'fandyneta@polibatam.ac.id', 'Dosen'),
(18, '112086', 'Gendhy Dwi Harlyan, S.SN.', 'gendhy@polibatam.ac.id', 'Dosen'),
(19, '112092', 'Happy Yugo, S.SN.', 'yugo@polibatam.ac.id', 'Dosen'),
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
(30, '113106', 'Sandi Prasetyaningsih, S.ST.', 'sandi@polibatam.ac.id', 'Dosen'),
(31, '113115', 'Sartikha, S.ST.', 'sartikha@polibatam.ac.id', 'Dosen'),
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
(42, '115138', 'Oktavianto Gustin', 'oktavianto@polibatam.ac.id', 'Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_mhs`
--

CREATE TABLE `tb_user_mhs` (
  `id_user_mhs` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` enum('Aktif','Lulus','','') NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `email_lain` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_mhs`
--

INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`, `status`, `no_wa`, `email_lain`) VALUES
(1, '4311701001', 'Ulfa Sari Melisa', 'ulfa.4311701001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(2, '4311701002', 'Jogi Oktavianus Situmeang', 'jogi.4311701002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(3, '4311701003', 'Widya Putri Ramadhani', 'widya.4311701003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(4, '4311701004', 'Disca Eki Wulansari', 'disca.4311701004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(5, '4311701005', 'Arvian Susila Putra', 'arvian.4311701005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(6, '4311701006', 'Mahmud Prakoso.', 'mahmud.4311701006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(7, '4311701007', 'Ilham Aidhil Iyandha Saputra', 'ilham.4311701007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(8, '4311701008', 'Dewi Nurpermata Sari', 'dewi.4311701008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(9, '4311701009', 'Rahmat Jamal Akhbar', 'rahmat.4311701009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(10, '4311701010', 'Tatang Romadhona', 'tatang.4311701010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(11, '4311701011', 'Daniel Ardiyanto Panggabean', 'daniel.4311701011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(12, '4311701012', 'Agung Okta Priyadi', 'agung.4311701012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(13, '4311701013', 'Intan Ulmi Lestari', 'intan.4311701013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(14, '4311701014', 'Rizky Agung Kala Maghribi', 'rizky.4311701014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(15, '4311701015', 'M Bagus Maulana', 'm.4311701015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(16, '4311701016', 'Binhot Jonathan Hutagalung', 'binhot.4311701016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(17, '4311701018', 'Adimas Bagus Nuripto', 'adimas.4311701018@students.polibatam.ac.id', '', 'Aktif', '', ''),
(18, '4311701019', 'Fadhli Yahya', 'fadhli.4311701019@students.polibatam.ac.id', '', 'Aktif', '', ''),
(19, '4311701020', 'Teddy Setyawan', 'teddy.4311701020@students.polibatam.ac.id', '', 'Aktif', '', ''),
(20, '4311701021', 'Faradina Pedana Jodanayang', 'faradina.4311701021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(21, '4311701022', 'Sri Andeani', 'sri.4311701022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(22, '4311701023', 'Elsi Adella', 'elsi.4311701023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(23, '4311701025', 'Nisriani Uswatunnisa', 'nisriani.4311701025@students.polibatam.ac.id', '', 'Aktif', '', ''),
(24, '4311701026', 'Muhammad Harviando', 'muhammad.4311701026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(25, '4311701027', 'Ica Yolanda G.', 'ica.4311701027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(26, '4311701028', 'Dimas Surya Fitriansyah', 'dimas.4311701028@students.polibatam.ac.id', '', 'Aktif', '', ''),
(27, '4311701029', 'Wiliam Mahatir', 'wiliam.4311701029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(28, '4311701030', 'Maulana Muhammad', 'maulana.4311701030@students.polibatam.ac.id', '', 'Aktif', '', ''),
(29, '4311701031', 'Hadinata Salim', 'hadinata.4311701031@students.polibatam.ac.id', '', 'Aktif', '', ''),
(30, '4311701032', 'Muhammad Raihan Mahardhika', 'muhammad.4311701032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(31, '3311801001', 'DIFA ANANDA PUTRI', 'difa.3311801001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(32, '3311801002', 'NUR FHITRIANI MEGADYANTY', 'fhitriani.3311801002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(33, '3311801003', 'SUWARDI PUTRA', 'suwardi.3311801003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(34, '3311801005', 'RIZKY INDRIATI', 'rizky.3311801005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(35, '3311801006', 'ANNISA', 'annisa.3311801006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(36, '3311801007', 'NADILA', 'nadila.3311801007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(37, '3311801009', 'DEVA RAHMAT LADIO', 'deva.3311801009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(38, '3311801010', 'ENWANDI ANDREAS HASIBUAN', 'enwandi.3311801010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(39, '3311801011', 'MELINA WITRI', 'melina.3311801011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(40, '3311801012', 'NOVITASARI', 'novitasari.3311801012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(41, '3311801013', 'HERYANTO HASUDUNGAN', 'heryanto.3311801013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(42, '3311801014', 'TRESYA MELLIYANI', 'tresya.3311801014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(43, '3311801015', 'ULFA', 'ulfa.3311801015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(44, '3311801016', 'SULTAN ARIZAL MAHING', 'sultan.3311801016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(45, '3311801017', 'ANITA TRI RAHMAWATI', 'anita.3311801017@students.polibatam.ac.id', '', 'Aktif', '', ''),
(46, '3311801018', 'AL HILAL AKHYAR', 'hilal.3311801018@students.polibatam.ac.id', '', 'Aktif', '', ''),
(47, '3311801019', 'IQBAL AFIF', 'iqbal.3311801019@students.polibatam.ac.id', '', 'Aktif', '', ''),
(48, '3311801020', 'HENNI HENDRANI NASUTION', 'henni.3311801020@students.polibatam.ac.id', '', 'Aktif', '', ''),
(49, '3311801021', 'ARDY ARMANDO', 'ardy.3311801021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(50, '3311801022', 'DANIEL TULUS MARISI SIANIPAR', 'daniel.3311801022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(51, '3311801023', 'FILANDA AL ROZAQ', 'filanda.3311801023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(52, '3311801024', 'REGITA DWI AYU LESTARI', 'regita.3311801024@students.polibatam.ac.id', '', 'Aktif', '', ''),
(53, '3311801025', 'MAULITA RIZCHITA PUTRI', 'maulita.3311801025@students.polibatam.ac.id', '', 'Aktif', '', ''),
(54, '3311801026', 'GILANG BAGUS RAMADHAN', 'gilang.3311801026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(55, '3311801027', 'YOKI RENALDO SINAGA', 'yoki.3311801027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(56, '3311801029', 'ARDITA HARDI', 'ardita.3311801029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(57, '3311801031', 'YUDHI ARMA MUSTIKA', 'yudhi.3311801031@students.polibatam.ac.id', '', 'Aktif', '', ''),
(58, '3311801032', 'RAFIKA PATRICIA', 'rafika.3311801032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(59, '3311801033', 'AXEL AGATHA IBRAHIM', 'axel.3311801033@students.polibatam.ac.id', '', 'Aktif', '', ''),
(60, '3311801034', 'MOH. AWALUDIN DJAENI SAPUTRA', 'awaludin.3311801034@students.polibatam.ac.id', '', 'Aktif', '', ''),
(61, '3311801035', 'PANDU PUTRA PERDANA', 'pandu.3311801035@students.polibatam.ac.id', '', 'Aktif', '', ''),
(62, '3311801036', 'RACHMAT FAUZAN', 'rachmat.3311801036@students.polibatam.ac.id', '', 'Aktif', '', ''),
(63, '3311801037', 'WINA SAFITRI LAMADIKE', 'wina.3311801037@students.polibatam.ac.id', '', 'Aktif', '', ''),
(64, '3311801038', 'BIMA ADITYA KUSNANDA', 'bima.3311801038@students.polibatam.ac.id', '', 'Aktif', '', ''),
(65, '3311801039', 'ABDURRAFI NAUFAL.S', 'abdurrafi.3311801039@students.polibatam.ac.id', '', 'Aktif', '', ''),
(66, '3311801040', 'VIRA VIRARA', 'vira.3311801040@students.polibatam.ac.id', '', 'Aktif', '', ''),
(67, '3311801041', 'HAFIED KHALIFATUL ASH.SHIDDIQI', 'hafied.3311801041@students.polibatam.ac.id', '', 'Aktif', '', ''),
(68, '3311801042', 'ANDRE TAMINI PUTRA', 'andre.3311801042@students.polibatam.ac.id', '', 'Aktif', '', ''),
(69, '3311801043', 'RONAL PARDAMEAN SIAHAAN', 'ronal.3311801043@students.polibatam.ac.id', '', 'Aktif', '', ''),
(70, '3311801044', 'IQBAL NUR RAMADHANI', 'iqbal.3311801044@students.polibatam.ac.id', '', 'Aktif', '', ''),
(71, '3311801045', 'SOFI HANDAYANI', 'sofi.3311801045@students.polibatam.ac.id', '', 'Aktif', '', ''),
(72, '3311801046', 'ELPIN PENG SUNG', 'elpin.3311801046@students.polibatam.ac.id', '', 'Aktif', '', ''),
(73, '3311801047', 'MELINIA RAMADANI MULYANI', 'melinia.3311801047@students.polibatam.ac.id', '', 'Aktif', '', ''),
(74, '3311801048', 'MUHAMAD ILHAM', 'muhamad.3311801048@students.polibatam.ac.id', '', 'Aktif', '', ''),
(75, '3311801050', 'RAMADHAN WIJAYA', 'ramadhan.3311801050@students.polibatam.ac.id', '', 'Aktif', '', ''),
(76, '3311801051', 'ALDILLA NURFHARA DARASATI TANJUNG', 'aldilla.3311801051@students.polibatam.ac.id', '', 'Aktif', '', ''),
(77, '3311801052', 'OWEN MORA SITUMORANG', 'owen.3311801052@students.polibatam.ac.id', '', 'Aktif', '', ''),
(78, '3311801053', 'M. ALIEF CHANDRA ASRI', 'alief.3311801053@students.polibatam.ac.id', '', 'Aktif', '', ''),
(79, '3311801054', 'FEBRIANA MANALU', 'febriana.3311801054@students.polibatam.ac.id', '', 'Aktif', '', ''),
(80, '3311801055', 'REZKI JANTURI PRATAMA', 'rezki.3311801055@students.polibatam.ac.id', '', 'Aktif', '', ''),
(81, '3311801057', 'GUZI ANTERA', 'guzi.3311801057@students.polibatam.ac.id', '', 'Aktif', '', ''),
(82, '3311801058', 'BAYU KRISNA', 'bayu.3311801058@students.polibatam.ac.id', '', 'Aktif', '', ''),
(83, '3311801059', 'SINDI MEGA AULIA', 'sindi.3311801059@students.polibatam.ac.id', '', 'Aktif', '', ''),
(84, '3311811056', 'DINI ANNISA', 'dini.3311811056@students.polibatam.ac.id', '', 'Aktif', '', ''),
(85, '3311811057', 'MUHAMMAD SYAHRUR RAMADHAN', 'muhammad.3311811057@students.polibatam.ac.id', '', 'Aktif', '', ''),
(87, '3311811001', 'KIFLI', 'kifli.3311811001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(88, '3311811002', 'MARINA AKMAL', 'marina.3311811002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(89, '3311811003', 'MUHAMMAD RIDHO', 'muhammad.3311811003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(90, '3311811004', 'MARCELLO DWI DOBITO', 'marcello.3311811004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(91, '3311811007', 'M. FANDY AZHAR', 'fandy.3311811007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(92, '3311811008', 'ISNANDAR FATWA', 'isnandar.3311811008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(93, '3311811009', 'HENDRO', 'hendro.3311811009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(94, '3311811011', 'ERPAN JOHAN', 'erpan.3311811011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(95, '3311811015', 'LAKUNTARA PALLAHIDU', 'lakuntara.3311811015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(96, '3311811016', 'FIRDA WIDIA SARI', 'firda.3311811016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(97, '3311811021', 'ALFREDO LUBIS', 'alfredo.3311811021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(98, '3311811022', 'RIKI KRISNALDI', 'riki.3311811022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(99, '3311811023', 'M. HENDRA FEBRIAN', 'hendra.3311811023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(100, '3311811024', 'DIAN ANGGRAINI LUMBANTORUAN', 'dian.3311811024@students.polibatam.ac.id', '', 'Aktif', '', ''),
(101, '3311811025', 'YULIA FEBRIANTI. M', 'yulia.3311811025@students.polibatam.ac.id', '', 'Aktif', '', ''),
(102, '3311811026', 'YODI MARZA', 'yodi.3311811026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(103, '3311811027', 'DEA ROULY OKTARIA DAMANIK', 'rouly.3311811027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(104, '3311811029', 'RANI WAHYU APRILIA', 'rani.3311811029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(105, '3311811030', 'AGUSTINUS ARUAN', 'agustinus.3311811030@students.polibatam.ac.id', '', 'Aktif', '', ''),
(106, '3311811032', 'ASLAM MUBAROCH', 'aslam.3311811032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(107, '3311811034', 'HUSEIN MUHAMMAD', 'husein.3311811034@students.polibatam.ac.id', '', 'Aktif', '', ''),
(108, '3311811035', 'AJI PRATAMA AGUS SETIAWAN ', 'aji.3311811035@students.polibatam.ac.id', '', 'Aktif', '', ''),
(109, '3311811036', 'FERY AFRIYANTO', 'fery.3311811036@students.polibatam.ac.id', '', 'Aktif', '', ''),
(110, '3311811037', 'REYNALDI SIHOMBING', 'reynaldi.3311811037@students.polibatam.ac.id', '', 'Aktif', '', ''),
(111, '3311811038', 'RIDHO ALFIAN', 'ridho.3311811038@students.polibatam.ac.id', '', 'Aktif', '', ''),
(112, '3311811039', 'NADYA ALISA SESIQ MILLENIA KASIM', 'nadya.3311811039@students.polibatam.ac.id', '', 'Aktif', '', ''),
(113, '3311811040', 'RYAN ANDREANSYAH', 'ryan.3311811040@students.polibatam.ac.id', '', 'Aktif', '', ''),
(114, '3311811041', 'REZA ARDIANSA', 'reza.3311811041@students.polibatam.ac.id', '', 'Aktif', '', ''),
(115, '3311811042', 'DWI CAHYA PURNAMA AJI', 'dwi.3311811042@students.polibatam.ac.id', '', 'Aktif', '', ''),
(116, '3311811043', 'EDWARD AKBAR P', 'edward.3311811043@students.polibatam.ac.id', '', 'Aktif', '', ''),
(117, '3311811044', 'ARYA FACHREZI ALFY', 'arya.3311811044@students.polibatam.ac.id', '', 'Aktif', '', ''),
(118, '3311811090', 'MUHAMMAD CHALIQ EDGAR DAVIEST HASIBUAN', 'muhammad.3311801060@students.polibatam.ac.id', '', 'Aktif', '', ''),
(119, '3311811045', 'JEFRY GUNAWAN', 'jefry.3311811045@students.polibatam.ac.id', '', 'Aktif', '', ''),
(120, '3311811046', 'RENDI RAMAHDI', 'rendi.3311811046@students.polibatam.ac.id', '', 'Aktif', '', ''),
(121, '3311811047', 'FADHIL RAMADHAN', 'fadhil.3311811047@students.polibatam.ac.id', '', 'Aktif', '', ''),
(122, '3311811048', 'ERVYL ARWIANDA', 'ervyl.3311811048@students.polibatam.ac.id', '', 'Aktif', '', ''),
(123, '3311811050', 'FIKRI ALAMSAH', 'fikri.3311811050@students.polibatam.ac.id', '', 'Aktif', '', ''),
(124, '3311811051', 'NUR AZIZAH', 'azizah.3311811051@students.polibatam.ac.id', '', 'Aktif', '', ''),
(125, '3311811052', 'ARIF WIDARYANTO', 'arif.3311811052@students.polibatam.ac.id', '', 'Aktif', '', ''),
(126, '3311811053', 'JAYA NAPITUPULU', 'jaya.3311811053@students.polibatam.ac.id', '', 'Aktif', '', ''),
(127, '3311811054', 'AULIA RAHMAN HARAHAP', 'aulia.3311811054@students.polibatam.ac.id', '', 'Aktif', '', ''),
(128, '3311811055', 'CANDRA WIJAYA.MJ', 'candra.3311811055@students.polibatam.ac.id', '', 'Aktif', '', ''),
(129, '3311811058', 'WERI MERTIWI AFFIFAH', 'weri.3311811058@students.polibatam.ac.id', '', 'Aktif', '', ''),
(130, '3311811059', 'WINDA SARI', 'winda.3311811059@students.polibatam.ac.id', '', 'Aktif', '', ''),
(131, '3311811060', 'ANNA THRESIA BR KARO', 'anna.3311811060@students.polibatam.ac.id', '', 'Aktif', '', ''),
(132, '3311811061', 'RETNO ANGGI SYAHPUTRI', 'retno.3311811061@students.polibatam.ac.id', '', 'Aktif', '', ''),
(133, '3311811062', 'RADEN MUHAMAD AMIR HAMJAH', 'raden.3311811062@students.polibatam.ac.id', '', 'Aktif', '', ''),
(134, '3311811063', 'ANDHIKA PRATAMA', 'andhika.3311811063@students.polibatam.ac.id', '', 'Aktif', '', ''),
(135, '3311811064', 'SYAFA SALSABILA ISMAIL', 'syafa.3311811064@students.polibatam.ac.id', '', 'Aktif', '', ''),
(136, '3311811067', 'TOTO SUGIARTO', 'toto.3311811067@students.polibatam.ac.id', '', 'Aktif', '', ''),
(137, '3311811071', 'PUTRI PRIZA HALIA', 'putri.3311811071@students.polibatam.ac.id', '', 'Aktif', '', ''),
(138, '3311811074', 'DIMAS PANJI PERDANA', 'dimas.3311811074@students.polibatam.ac.id', '', 'Aktif', '', ''),
(139, '3311811075', 'RIVAL MARCELLENO', 'rival.3311811075@students.polibatam.ac.id', '', 'Aktif', '', ''),
(140, '3311811076', 'FEREN ANINDITA SALSABILA BORU PURBA', 'feren.3311811076@students.polibatam.ac.id', '', 'Aktif', '', ''),
(141, '3311811077', 'CHERIA ANJELI', 'cheria.3311811077@students.polibatam.ac.id', '', 'Aktif', '', ''),
(142, '3311811079', 'ANDIKA PASKA KRISDIANTO', 'andika.3311811079@students.polibatam.ac.id', '', 'Aktif', '', ''),
(143, '3311811080', 'INDAH KHOTIMAH', 'indah.3311811080@students.polibatam.ac.id', '', 'Aktif', '', ''),
(144, '3311811083', 'FAN YANSEN', 'yansen.3311811083@students.polibatam.ac.id', '', 'Aktif', '', ''),
(145, '3311811084', 'MUHAMMAD FAUZAN ANSHAR ISMAN', 'muhammad.3311811084@students.polibatam.ac.id', '', 'Aktif', '', ''),
(146, '3311811085', 'ALDO WIJAYA', 'aldo.3311811085@students.polibatam.ac.id', '', 'Aktif', '', ''),
(147, '4311701033', 'Resa Putri Jelita', 'resa.4311701033@students.polibatam.ac.id', '', 'Aktif', '', ''),
(148, '4311701037', 'Ahmad Daud Laia', 'ahmad.4311701037@students.polibatam.ac.id', '', 'Aktif', '', ''),
(149, '4311701038', 'Indra Pramana', 'indra.4311701038@students.polibatam.ac.id', '', 'Aktif', '', ''),
(150, '4311701039', 'Elga Syakina Putri', 'elga.4311701039@students.polibatam.ac.id', '', 'Aktif', '', ''),
(151, '4311701040', 'Ary Pratama Putra', 'ary.4311701040@students.polibatam.ac.id', '', 'Aktif', '', ''),
(152, '4311701041', 'Ady Kurniawan', 'ady.4311701041@students.polibatam.ac.id', '', 'Aktif', '', ''),
(153, '4311701042', 'Nava Mary Trista Mendrofa', 'nava.4311701042@students.polibatam.ac.id', '', 'Aktif', '', ''),
(154, '4311701043', 'Jonathan Steven Siahaan', 'jonathan.4311701043@students.polibatam.ac.id', '', 'Aktif', '', ''),
(155, '4311701044', 'Jihat Nur Robbi', 'jihat.4311701044@students.polibatam.ac.id', '', 'Aktif', '', ''),
(156, '4311701045', 'Imam Muslim', 'imam.4311701045@students.polibatam.ac.id', '', 'Aktif', '', ''),
(157, '4311701046', 'Prince Alvin Yusuf', 'prince.4311701046@students.polibatam.ac.id', '', 'Aktif', '', ''),
(158, '4311701047', 'Fahril Layly Chusaini', 'fahril.4311701047@students.polibatam.ac.id', '', 'Aktif', '', ''),
(159, '4311701048', 'Nurhalimah Tussyaddiah', 'nurhalimah.4311701048@students.polibatam.ac.id', '', 'Aktif', '', ''),
(160, '4311701049', 'Pragus Ilham Nayomi', 'pragus.4311701049@students.polibatam.ac.id', '', 'Aktif', '', ''),
(161, '4311701050', 'Hendra Lexmana Harahap', 'hendra.4311701050@students.polibatam.ac.id', '', 'Aktif', '', ''),
(162, '4311701051', 'Novi Anggraeni', 'novi.4311701051@students.polibatam.ac.id', '', 'Aktif', '', ''),
(163, '4311701052', 'Puspa Oktaviyani Santosa', 'puspa.4311701052@students.polibatam.ac.id', '', 'Aktif', '', ''),
(164, '4311701053', 'Eric Febrianto', 'eric.4311701053@students.polibatam.ac.id', '', 'Aktif', '', ''),
(165, '4311701054', 'Nila Rifka Sukma', 'nila.4311701054@students.polibatam.ac.id', '', 'Aktif', '', ''),
(166, '4311701055', 'David Hasmito Tanbri', 'david.4311701055@students.polibatam.ac.id', '', 'Aktif', '', ''),
(167, '4311701056', 'Monisa Rizkia', 'monisa.4311701056@students.polibatam.ac.id', '', 'Aktif', '', ''),
(168, '4311701057', 'Fahmi Aulia Rahmatullah', 'fahmi.4311701057@students.polibatam.ac.id', '', 'Aktif', '', ''),
(169, '4311701017', 'Reza Nirvana Pratama', 'reza.4311701017@students.polibatam.ac.id', '', 'Aktif', '', ''),
(170, '4311701024', 'Reynanda Putra Pratama', 'reynanda.4311701024@students.polibatam.ac.id', '', 'Aktif', '', ''),
(171, '4311711001', 'Adrian Priabdi Fauzi', 'adrian.4311711001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(172, '4311711002', 'Angestu Naufal Kurnia Aji', 'angestu.4311711002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(173, '4311711003', 'Jestika Elisabeth Simatupang', 'jestika.4311711003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(174, '4311711004', 'Muhammad Hendri Kurnia', 'muhammad.4311711004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(175, '4311711005', 'Fajar Widiarto', 'fajar.4311711005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(176, '4311711006', 'Indra Rianto Saputra', 'indra.4311711006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(177, '4311711007', 'Arnold Pamungkas Hengkeng', 'arnold.4311711007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(178, '4311711008', 'Jundi Caesar Riando', 'jundi.4311711008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(179, '4311711009', 'Allif Maulana', 'allif.4311711009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(180, '4311711010', 'Sri Neli Utami', 'sri.4311711010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(181, '4311711011', 'Wachid Zaini', 'wachid.4311711011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(182, '4311711012', 'Yani', 'yani.4311711012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(183, '4311711013', 'Kumbara Sadewa', 'kumbara.4311711013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(184, '4311711014', 'Muhammad Riza Gilang Darmawan', 'muhammad.4311711014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(185, '4311711015', 'Nanda Saputra', 'nanda.4311711015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(186, '4311711016', 'Rebby Michael Lumangkun', 'rebby.4311711016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(187, '4311711017', 'Madrin Khalil Gibran', 'madrin.4311711017@students.polibatam.ac.id', '', 'Aktif', '', ''),
(188, '4311711018', 'Yovan Sakti', 'yovan.4311711018@students.polibatam.ac.id', '', 'Aktif', '', ''),
(189, '4311711019', 'Muhammad Risqi Gede Semidang', 'muhammad.4311711019@students.polibatam.ac.id', '', 'Aktif', '', ''),
(190, '4311711020', 'Agung Saputra', 'agung.4311711020@students.polibatam.ac.id', '', 'Aktif', '', ''),
(191, '4311711021', 'Ahmad Sabri', 'ahmad.4311711021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(192, '4311711022', 'Shandy Rahmat Hidayat', 'shandy.4311711022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(193, '4311711023', 'Ade Anggara Okta Muria', 'ade.4311711023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(194, '4311711024', 'Muhammad Aqhil Fhaizky', 'muhammad.4311711024@students.polibatam.ac.id', '', 'Aktif', '', ''),
(195, '4311711026', 'Tri Dedi Syaputra', 'tri.4311711026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(196, '4311711027', 'Fajar Bima Nugraha', 'fajar.4311711027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(197, '4311711028', 'Novi Martha Ria', 'novi.4311711028@students.polibatam.ac.id', '', 'Aktif', '', ''),
(198, '4311711029', 'Indah Audina', 'indah.4311711029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(199, '4311711030', 'Handoko Sugitri Prasetyo', 'handoko.4311711030@students.polibatam.ac.id', '', 'Aktif', '', ''),
(200, '4311711031', 'Hendry Wijaya', 'hendry.4311711031@students.polibatam.ac.id', '', 'Aktif', '', ''),
(201, '4311711032', 'Muhammad Irvansyah Putra', 'muhammad.4311711032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(202, '4311711033', 'Dana Fiki Imrona', 'dana.4311711033@students.polibatam.ac.id', '', 'Aktif', '', ''),
(203, '4311711034', 'Ridzky Febriyanto', 'ridzky.4311711034@students.polibatam.ac.id', '', 'Aktif', '', ''),
(204, '4311711036', 'Charolina Darvita Putri', 'charolina.4311711036@students.polibatam.ac.id', '', 'Aktif', '', ''),
(205, '4311711037', 'Rexa Febby Maulana', 'rexa.4311711037@students.polibatam.ac.id', '', 'Aktif', '', ''),
(206, '4311711038', 'Elpera Eka Putri', 'elpera.4311711038@students.polibatam.ac.id', '', 'Aktif', '', ''),
(207, '4311711039', 'Reynaldo Marlim', 'reynaldo.4311711039@students.polibatam.ac.id', '', 'Aktif', '', ''),
(208, '4311711040', 'Wisnu Wardhana', 'wisnu.4311711040@students.polibatam.ac.id', '', 'Aktif', '', ''),
(209, '4311711041', 'Purbaya', 'purbaya.4311711041@students.polibatam.ac.id', '', 'Aktif', '', ''),
(210, '4311711042', 'Mohamad Rohman Hanafi', 'mohamad.4311711042@students.polibatam.ac.id', '', 'Aktif', '', ''),
(211, '4311711043', 'Anggi Syah Putri Nasution', 'anggi.4311711043@students.polibatam.ac.id', '', 'Aktif', '', ''),
(212, '4311711044', 'Raynaldo Efraim Sondakh', 'raynaldo.4311711044@students.polibatam.ac.id', '', 'Aktif', '', ''),
(213, '4311711045', 'Herman Fitriadi P.', 'herman.4311711045@students.polibatam.ac.id', '', 'Aktif', '', ''),
(214, '4311711046', 'James Aricson', 'james.4311711046@students.polibatam.ac.id', '', 'Aktif', '', ''),
(215, '4311711047', 'Dwiky F', 'dwiky.4311711047@students.polibatam.ac.id', '', 'Aktif', '', ''),
(216, '4311711048', 'Harish Manarul Fauzi', 'harish.4311711048@students.polibatam.ac.id', '', 'Aktif', '', ''),
(217, '4311711049', 'Erlinda Ainun Hasanah', 'erlinda.4311711049@students.polibatam.ac.id', '', 'Aktif', '', ''),
(218, '4311711050', 'Helena Virginia', 'helena.4311711050@students.polibatam.ac.id', '', 'Aktif', '', ''),
(219, '4311711052', 'Bayu Pranata', 'bayu.4311711052@students.polibatam.ac.id', '', 'Aktif', '', ''),
(220, '4311711053', 'Felix Forgael', 'felix.4311711053@students.polibatam.ac.id', '', 'Aktif', '', ''),
(221, '4311711054', 'Novia Afrylia Sari', 'novia.4311711054@students.polibatam.ac.id', '', 'Aktif', '', ''),
(222, '4311711055', 'Esra Novala Br Siahaan', 'esra.4311711055@students.polibatam.ac.id', '', 'Aktif', '', ''),
(223, '4311711056', 'Henri Manahan Siagian', 'henri.4311711056@students.polibatam.ac.id', '', 'Aktif', '', ''),
(224, '4311711057', 'Niswatul Audah', 'niswatul.4311711057@students.polibatam.ac.id', '', 'Aktif', '', ''),
(225, '4311711058', 'Muhammad Azizul Hakim', 'muhammad.4311711058@students.polibatam.ac.id', '', 'Aktif', '', ''),
(226, '4311711059', 'Alvonso Fourdinand Hasibuan', 'alvonso.4311711059@students.polibatam.ac.id', '', 'Aktif', '', ''),
(227, '4311711060', 'Renold Afriyan', 'renold.4311711060@students.polibatam.ac.id', '', 'Aktif', '', ''),
(228, '4311711061', 'Dian Salisti Rahmadini', 'dian.4311711061@students.polibatam.ac.id', '', 'Aktif', '', ''),
(229, '4311931001', 'MILDA FATHURRIZKIYAH GISMA', 'MILDA.4311931001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(230, '4311931004', 'GENTA VICTORY YUSERA', 'GENTA.4311931004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(231, '4311711035', 'Alfian Khoirun Ni\'Am', 'alfian.4311711035@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(232, '4311711051', 'Kania Alifia \'Aqiilah', 'kania.4311711051@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(233, '3311811005', 'WIL HIDAYANTI', 'hidayanti.3311811005@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(234, '3311811010', 'LINDA NURAMA', 'linda.3311811010@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(235, '3311811012', 'ANDRI DHONI THASFARI', 'andri.3311811012@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(236, '3311811013', 'ENI TAMSIKA MALAU', 'tamsika.3311811013@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(237, '3311811014', 'IRFAN SAHAT MARULI MANURUNG', 'irfan.3311811014@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(238, '3311811017', 'SULIA RINTA BAKARA', 'sulia.3311811017@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(239, '3311811018', 'ADE KUSNAENDAR', 'ade.3311811018@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(240, '3311811019', 'ARTIKA PERMATA SARI', 'artika.3311811019@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(241, '3311811020', 'ANES YULIZA', 'anes.3311811020@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(242, '3311811028', 'ABDUL HAFIZ NASUTION', 'abdul.3311811028@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(243, '3311811031', 'RENGKO PANUSUNAN MALAU', 'rengko.3311811031@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(244, '3311811033', 'ELVIDE SOLAGRATIA SIMAMORA', 'elvide.3311811033@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(245, '3311811065', 'SAPANDRI', 'sapandri.3311811065@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(246, '3311811066', 'VERALUNA MAGDALENA', 'veraluna.3311811066@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(247, '3311811068', 'BERLIANA APRILIANTY', 'berliana.3311811068@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(248, '3311811069', 'INRI GEBRIEL SITUMORANG', 'inri.3311811069@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(249, '3311811070', 'AGUSLINE SIMANJUNTAK', 'agusline.3311811070@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(250, '3311811072', 'HAMDAN NUR HIDAYAT', 'hamdan.3311811072@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(251, '3311811073', 'BALQEIS CHALIZURIA PUTRI', 'balqeis.3311811073@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(252, '3311811078', 'YOHANES ARDIWIDYANTORO', 'yohanes.3311811078@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(253, '3311811081', 'YANDRE APDELAS SEMBIRING', 'yandre.3311811081@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(254, '3311811082', 'MICHAELL VALEN SAENDRO', 'michaell.3311811082@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(255, '3311811086', 'HENDRY PUTRA PRATAMA', 'hendry.3311811086@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(256, '3311811087', 'FARIZ RIZKIA RAHMADSYAH', 'FARIZ.3311811087@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(257, '3311811088', 'NOVIANTI RURUK', 'NOVIANTI.3311811088@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(258, '3311811089', 'Eko Nanang Guntoro', 'eko.3311811089@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', ''),
(259, '3321801001', 'DICKI PRAYOGI', 'dicki.3321801001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(260, '3321801002', 'RIZKI IRIANTO', 'rizki.3321801002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(261, '3321801003', 'NURUL HIKMAH', 'nurul.3321801003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(262, '3321801004', 'PUTRI', 'putri.3321801004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(263, '3321801005', 'NUR ATIFAH ULDA', 'atifah.3321801005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(264, '3321801006', 'ILFAH MAGDALINA', 'ilfah.3321801006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(265, '3321801007', 'RINI APRILIA SIAHAAN', 'rini.3321801007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(266, '3321801008', 'RIANA OKTAVIA AFANDI', 'riana.3321801008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(267, '3321801009', 'NINDAWIDYA VIRAPUTRI', 'nindawidya.3321801009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(268, '3321801010', 'SUCI DAMAYANTI', 'suci.3321801010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(269, '3321801011', 'DEWI PUTRI ANDIKA', 'dewi.3321801011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(270, '3321801012', 'PAZIRA', 'pazira.3321801012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(271, '3321801013', 'MUHAMMAD APIK', 'muhammad.3321801013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(272, '3321801014', 'ZARA AZHARI', 'zara.3321801014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(273, '3321801015', 'FATHUR RAHMAN', 'fathur.3321801015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(274, '3321801016', 'IKA FARHANA', 'farhana.3321801016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(275, '3321801017', 'BARKAH', 'barkah.3321801017@students.polibatam.ac.id', '', 'Aktif', '', ''),
(276, '3321801018', 'TITA FITRIANI', 'tita.3321801018@students.polibatam.ac.id', '', 'Aktif', '', ''),
(277, '3321801019', 'MUSLIMIN', 'muslimin.3321801019@students.polibatam.ac.id', '', 'Aktif', '', ''),
(278, '3321801020', 'VINA SELVIA DWIYANTI', 'vina.3321801020@students.polibatam.ac.id', '', 'Aktif', '', ''),
(279, '3321801021', 'DESI NATALIA TRIANESA', 'desi.3321801021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(280, '3321801022', 'FAJAR MULIANA', 'fajar.3321801022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(281, '3321801023', 'AYU MAULIANI', 'mauliani.3321801023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(282, '3321801024', 'ADELIA EKY WARDANI', 'adelia.3321801024@students.polibatam.ac.id', '', 'Aktif', '', ''),
(283, '3321801025', 'LARAS DWI RAMDANNI', 'laras.3321801025@students.polibatam.ac.id', '', 'Aktif', '', ''),
(284, '3321801026', 'FARA NABILA ROSSA', 'fara.3321801026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(285, '3321801027', 'YOLANDA APRIANI PANJAITAN', 'yolanda.3321801027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(286, '3321801028', 'DESTRIANI KABAN', 'destriani.3321801028@students.polibatam.ac.id', '', 'Aktif', '', ''),
(287, '3321801029', 'PRIECILLA PARAWANTI HIDAYAT', 'priecilla.3321801029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(288, '3321801030', 'WAHYU NOOR MUNTOHA', 'wahyu.3321801030@students.polibatam.ac.id', '', 'Aktif', '', ''),
(289, '3321801031', 'EMA NURMALA DENY', 'ema.3321801031@students.polibatam.ac.id', '', 'Aktif', '', ''),
(290, '3321801032', 'RIZWAN BIN KHAMIS', 'rizwan.3321801032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(291, '3321801033', 'ELSA RAMADONNA', 'elsa.3321801033@students.polibatam.ac.id', '', 'Aktif', '', ''),
(292, '3321801034', 'BREMA HANDIKA BANGUN', 'brema.3321801034@students.polibatam.ac.id', '', 'Aktif', '', ''),
(293, '3321801035', 'MOH. BAGUS RAHMADI', 'bagus.3321801035@students.polibatam.ac.id', '', 'Aktif', '', ''),
(294, '3321801036', 'ARISTA SYAFITRI', 'arista.3321801036@students.polibatam.ac.id', '', 'Aktif', '', ''),
(295, '3321801037', 'MIRANDA SIMANJUNTAK', 'miranda.3321801037@students.polibatam.ac.id', '', 'Aktif', '', ''),
(296, '3321801038', 'FARAH MEILINA HALIM', 'farah.3321801038@students.polibatam.ac.id', '', 'Aktif', '', ''),
(297, '3321801039', 'YOSSI PRAYOGA', 'yossi.3321801039@students.polibatam.ac.id', '', 'Aktif', '', ''),
(298, '3321801040', 'ARDILA K', 'ardila.3321801040@students.polibatam.ac.id', '', 'Aktif', '', ''),
(299, '3321801041', 'MUHAMMAD SULTAN FATHIN', 'muhammad.3321801041@students.polibatam.ac.id', '', 'Aktif', '', ''),
(300, '3321801042', 'RIFA ADLIANI', 'rifa.3321801042@students.polibatam.ac.id', '', 'Aktif', '', ''),
(301, '3321801043', 'RINA KARMILA', 'rina.3321801043@students.polibatam.ac.id', '', 'Aktif', '', ''),
(302, '3321801044', 'MELKISEDEK MATUA HORAS MANURUNG', 'melkisedek.3321801044@students.polibatam.ac.id', '', 'Aktif', '', ''),
(303, '3321801045', 'HALIMATUN SADDIAH', 'halimatun.3321801045@students.polibatam.ac.id', '', 'Aktif', '', ''),
(304, '3321801046', 'NUR HAFIZAH', 'hafizah.3321801046@students.polibatam.ac.id', '', 'Aktif', '', ''),
(305, '3321801047', 'DINA FADILA PUTRI', 'dina.3321801047@students.polibatam.ac.id', '', 'Aktif', '', ''),
(306, '3321801048', 'PRAMA RIDHO RAMADHANA', 'prama.3321801048@students.polibatam.ac.id', '', 'Aktif', '', ''),
(307, '3321801049', 'YULIA', 'yulia.3321801049@students.polibatam.ac.id', '', 'Aktif', '', ''),
(308, '3321801050', 'BAYU KRESNAPUTRA HIDAYATULAH', 'bayu.3321801050@students.polibatam.ac.id', '', 'Aktif', '', ''),
(309, '3321801051', 'FIKA MARIONAS SAPUTRA', 'fika.3321801051@students.polibatam.ac.id', '', 'Aktif', '', ''),
(310, '3321801052', 'RAKHA PERMANA ADI', 'rakha.3321801052@students.polibatam.ac.id', '', 'Aktif', '', ''),
(311, '3321801053', 'ZAIDAN HIDAYATULLAH', 'zaidan.3321801053@students.polibatam.ac.id', '', 'Aktif', '', ''),
(312, '3321801054', 'FIRMAN SYAHRULLAH', 'firman.3321801054@students.polibatam.ac.id', '', 'Aktif', '', ''),
(313, '3321811003', 'BINTANG BUDHIMAN', 'bintang.3321811003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(314, '3321811001', 'DOLI WAHYU PRASETIYO', 'doli.3321811001@students.polibatam.ac.id', '', 'Aktif', '', ''),
(315, '3321811002', 'DAVID SETIAWAN', 'david.3321811002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(316, '3321811005', 'NINDY HIDAYAH PUTRI', 'nindy.3321811005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(317, '3321811006', 'MONICA LUMBAN SIANTAR', 'monica.3321811006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(318, '3321811007', 'SYAIFULLAH SANUSI', 'syaifullah.3321811007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(319, '3321811008', 'JENDRI HARAPAN SIRAIT', 'jendri.3321811008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(320, '3321811009', 'LIZA MEUTIA HANIM', 'liza.3321811009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(321, '3321811010', 'SAFWAN', 'safwan.3321811010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(322, '3321811011', 'ASRIAH', 'asriah.3321811011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(323, '3321811012', 'YUNI ELISABETH', 'yuni.3321811012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(324, '3321811013', 'WAHYU WIDYANINGRUM', 'wahyu.3321811013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(325, '3321811014', 'MAKMUR AL FARIQ', 'makmur.3321811014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(326, '3321811015', 'MUHAMMAD DEPRIYANDI', 'muhammad.3321811015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(327, '3321811016', 'MUHAMMAD FAUZI', 'muhammad.3321811016@students.polibatam.ac.id', '', 'Aktif', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota_tugas_akhir`
--
ALTER TABLE `tb_anggota_tugas_akhir`
  ADD PRIMARY KEY (`id_tugas_akhir`,`id_mhs`);

--
-- Indeks untuk tabel `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `tb_jadwal_sidang_ibfk_1` (`id_tugas_akhir`);

--
-- Indeks untuk tabel `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indeks untuk tabel `tb_laporan_ta`
--
ALTER TABLE `tb_laporan_ta`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indeks untuk tabel `tb_pengajuan_pembimbing`
--
ALTER TABLE `tb_pengajuan_pembimbing`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `tb_penilaian_sidang`
--
ALTER TABLE `tb_penilaian_sidang`
  ADD PRIMARY KEY (`id_jadwal`,`id_dosen`);

--
-- Indeks untuk tabel `tb_periode_ta`
--
ALTER TABLE `tb_periode_ta`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tb_tugas_akhir`
--
ALTER TABLE `tb_tugas_akhir`
  ADD PRIMARY KEY (`id_mhs`,`id_dosen`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  ADD PRIMARY KEY (`id_user_mhs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  MODIFY `id_kompetensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan_ta`
--
ALTER TABLE `tb_laporan_ta`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan_pembimbing`
--
ALTER TABLE `tb_pengajuan_pembimbing`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_periode_ta`
--
ALTER TABLE `tb_periode_ta`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  MODIFY `id_user_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jadwal_sidang`
--
ALTER TABLE `tb_jadwal_sidang`
  ADD CONSTRAINT `tb_jadwal_sidang_ibfk_1` FOREIGN KEY (`id_tugas_akhir`) REFERENCES `tb_tugas_akhir` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  ADD CONSTRAINT `tb_logbook_ta_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penilaian_sidang`
--
ALTER TABLE `tb_penilaian_sidang`
  ADD CONSTRAINT `tb_penilaian_sidang_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal_sidang` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tugas_akhir`
--
ALTER TABLE `tb_tugas_akhir`
  ADD CONSTRAINT `tb_tugas_akhir_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
