-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2020 pada 14.32
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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

--
-- Dumping data untuk tabel `tb_anggota_tugas_akhir`
--

INSERT INTO `tb_anggota_tugas_akhir` (`id_tugas_akhir`, `id_mhs`, `uraian_tugas`) VALUES
(12, 44, '-'),
(12, 46, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kompetensi`
--

CREATE TABLE `tb_kompetensi` (
  `id_kompetensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kompetensi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kompetensi`
--

INSERT INTO `tb_kompetensi` (`id_kompetensi`, `id_user`, `kompetensi`) VALUES
(3, 1, 'Rekayasa/Pengembangan perangkat lunak'),
(4, 1, 'Network service'),
(6, 1, 'Network security');

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

--
-- Dumping data untuk tabel `tb_logbook_ta`
--

INSERT INTO `tb_logbook_ta` (`id_logbook`, `id_mhs`, `kemajuan_ta`, `kegiatan`, `tanggal`) VALUES
(1, 12, 25, 'A logbook (a ship\'s logs or simply log) is a record of important events in the management, operation, and navigation of a ship. It is essential to traditional navigation, and must be filled in at least daily.', '2020-07-24'),
(2, 12, 15, 'Logbook definition is - log. Recent Examples on the Web Its logbook filled with praise for its ride and handling, no matter the surface or speed, and then the Pathfinder went and aced the skidpad test with a class-leading 0.74 g of grip', '2020-07-26');

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

--
-- Dumping data untuk tabel `tb_pengajuan_pembimbing`
--

INSERT INTO `tb_pengajuan_pembimbing` (`id_pengajuan`, `id_dosen`, `id_mhs`, `judul`, `deskripsi`, `tanggal`, `status`) VALUES
(1, 1, 12, 'Aplikasi Pemesanan Rental Mobil Hafa Yogyakarta Dengan Layanan Web dan WAP', 'Partus prematur adalah penyebab utama dari mortalitas dan morbiditas perinatal di berbagai belahan dunia. Janin dalam kandungan yang dilahirkan secara prematur memiliki risiko terjadinya komplikasi yang cukup tinggi. Adapun penyebab dari partus prematur sendiri masih sangat sulit untuk ditentukan. Akan tetapi, hal tersebut dapat diidentifikasi melalui paritas. Di tahun 2005, Indonesia tercatat terjadi partus prematur dengan jumlah 19%. Yang mana 20% kelahiran yang dimaksud lebih banyak dialami oleh ibu yang memiliki paritas cukup tinggi. Agustina pada tahun 2005 yang dilakukan di RSUD Dr. Sutomo Surabaya menyebutkan bahwa perempuan yang sudah pernah melahirkan lebih dari tiga kali, ternyata memiliki risiko mengalami partus prematur yang lebih tinggi dibandingkan dengan yang proses paritasnya masih kurang dari tiga. Maka dari itu, peneliti di sini hendak melakukan penelitian mengenai Hubungan Kejadian Partus Prematur dengan Paritas di RSUD Saiful Anwar Malang', '2020-07-21', 'Disetujui');

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

--
-- Dumping data untuk tabel `tb_periode_ta`
--

INSERT INTO `tb_periode_ta` (`id_periode`, `periode_sidang`, `buka_sidang`, `tutup_sidang`) VALUES
(1, 'Agustus 2020', '2020-07-27', '2020-07-31');

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
(12, 5, 'Penerapan UCD (User Centered Design) Pada Perancangan Sistem Informasi Manajemen Aset Ti Berbasis Web', 'Sulitnya melakukan penelurusan dan pengontrolan aset TI mengakibatkan kurang baiknya manajemen aset TI yang ada di Bid TIK sehingga kesulitan ketika diminta laporan-laporan mengenai aset TI yang dimiliki. Dalam penelitian ini, masalah-masalah ini dapat diselesaikan dengan membangun sistem informasi yang mampu mengelola aset TI di Bid TIK. Penelitian ini bertujuan untuk merancang dan membuat sistem informasi manajemen aset TI berbasis web dengan menerapkan UCD (user centered design) dengan pengujian usability serta pengembangan sistem infomasi dengan kuisioner dan usability testing. Pengujian black box dilakukan untuk memvalidasi fungsionalitas yang ditetapkan pada kebutuhan user saat wawancara. Hasil akhir dalam membangun sistem informasi ini adalah Berdasarkan Usability Testing dengan System Usability Scale, Sistem informasi manajemen aset TI ada pada range acceptable, untuk grade scale dengan hasil C sedangkan pada adjective ratings dengan hasil good yaitu sebesar 76. Maka dari itu, Sistem informasi manajemen aset TI berhasil membangun sistem yang user-friendly dengan tingkat usability yang baik. Berdasarkan hasil pengujian black box, didapatkan hasil bahwa seluruh kebutuhan fungsional dari sistem yang dibangun telah terpenuhi dan berjalan dengan baik. Sistem informasi manajemen aset TI yang dibuat sudah memenuhi komponen usability yg sudah diujikan sehingga sistem tersebut layak untuk di operasikan/digunakan oleh anggota Bid TIK Polda Kepulauan Riau.', 'Proposal'),
(44, 1, '-', '-', 'Proposal'),
(45, 1, '-', '-', 'Proposal'),
(46, 1, '-', '-', 'Proposal'),
(73, 1, '-', '-', 'Proposal');

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
(1, '113105', 'Supardianto, S.ST., M.Eng. ', 'supardianto@polibatam.ac.id', 'Dosen'),
(5, '113104', 'Selly Artaty Zega, S.ST.', 'selly@polibatam.ac.id', 'Dosen'),
(6, '100017', 'Metta Santi Putri, S.T., M.SC.', 'metta@polibatam.ac.id', 'Dosen'),
(7, '117175', 'Hamdani Arif, S.Pd., M.Sc', 'hamdaniarif@polibatam.ac.id', 'Dosen');

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
(12, '3411911053', 'IRFANSYAH', 'IRFANSYAH.3411911053@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '082225455138', 'irfansyah@gmail.com'),
(44, '4311701002', 'Jogi Oktavianus Situmeang', 'jogi.4311701002@students.polibatam.ac.id', '', 'Aktif', '', ''),
(45, '4311701003', 'Widya Putri Ramadhani', 'widya.4311701003@students.polibatam.ac.id', '', 'Aktif', '', ''),
(46, '4311701004', 'Disca Eki Wulansari', 'disca.4311701004@students.polibatam.ac.id', '', 'Aktif', '', ''),
(47, '4311701005', 'Arvian Susila Putra', 'arvian.4311701005@students.polibatam.ac.id', '', 'Aktif', '', ''),
(48, '4311701006', 'Mahmud Prakoso.', 'mahmud.4311701006@students.polibatam.ac.id', '', 'Aktif', '', ''),
(49, '4311701007', 'Ilham Aidhil Iyandha Saputra', 'ilham.4311701007@students.polibatam.ac.id', '', 'Aktif', '', ''),
(50, '4311701008', 'Dewi Nurpermata Sari', 'dewi.4311701008@students.polibatam.ac.id', '', 'Aktif', '', ''),
(51, '4311701009', 'Rahmat Jamal Akhbar', 'rahmat.4311701009@students.polibatam.ac.id', '', 'Aktif', '', ''),
(52, '4311701010', 'Tatang Romadhona', 'tatang.4311701010@students.polibatam.ac.id', '', 'Aktif', '', ''),
(53, '4311701011', 'Daniel Ardiyanto Panggabean', 'daniel.4311701011@students.polibatam.ac.id', '', 'Aktif', '', ''),
(54, '4311701012', 'Agung Okta Priyadi', 'agung.4311701012@students.polibatam.ac.id', '', 'Aktif', '', ''),
(55, '4311701013', 'Intan Ulmi Lestari', 'intan.4311701013@students.polibatam.ac.id', '', 'Aktif', '', ''),
(56, '4311701014', 'Rizky Agung Kala Maghribi', 'rizky.4311701014@students.polibatam.ac.id', '', 'Aktif', '', ''),
(57, '4311701015', 'M Bagus Maulana', 'm.4311701015@students.polibatam.ac.id', '', 'Aktif', '', ''),
(58, '4311701016', 'Binhot Jonathan Hutagalung', 'binhot.4311701016@students.polibatam.ac.id', '', 'Aktif', '', ''),
(59, '4311701018', 'Adimas Bagus Nuripto', 'adimas.4311701018@students.polibatam.ac.id', '', 'Aktif', '', ''),
(60, '4311701019', 'Fadhli Yahya', 'fadhli.4311701019@students.polibatam.ac.id', '', 'Aktif', '', ''),
(61, '4311701020', 'Teddy Setyawan', 'teddy.4311701020@students.polibatam.ac.id', '', 'Aktif', '', ''),
(62, '4311701021', 'Faradina Pedana Jodanayang', 'faradina.4311701021@students.polibatam.ac.id', '', 'Aktif', '', ''),
(63, '4311701022', 'Sri Andeani', 'sri.4311701022@students.polibatam.ac.id', '', 'Aktif', '', ''),
(64, '4311701023', 'Elsi Adella', 'elsi.4311701023@students.polibatam.ac.id', '', 'Aktif', '', ''),
(65, '4311701025', 'Nisriani Uswatunnisa', 'nisriani.4311701025@students.polibatam.ac.id', '', 'Aktif', '', ''),
(66, '4311701026', 'Muhammad Harviando', 'muhammad.4311701026@students.polibatam.ac.id', '', 'Aktif', '', ''),
(67, '4311701027', 'Ica Yolanda G.', 'ica.4311701027@students.polibatam.ac.id', '', 'Aktif', '', ''),
(68, '4311701028', 'Dimas Surya Fitriansyah', 'dimas.4311701028@students.polibatam.ac.id', '', 'Aktif', '', ''),
(69, '4311701029', 'Wiliam Mahatir', 'wiliam.4311701029@students.polibatam.ac.id', '', 'Aktif', '', ''),
(70, '4311701030', 'Maulana Muhammad', 'maulana.4311701030@students.polibatam.ac.id', '', 'Aktif', '', ''),
(71, '4311701031', 'Hadinata Salim', 'hadinata.4311701031@students.polibatam.ac.id', '', 'Aktif', '', ''),
(72, '4311701032', 'Muhammad Raihan Mahardhika', 'muhammad.4311701032@students.polibatam.ac.id', '', 'Aktif', '', ''),
(73, '4311701001', 'Ulfa Sari Melisa', 'ulfa.4311701001@students.polibatam.ac.id', 'Mahasiswa', 'Aktif', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota_tugas_akhir`
--
ALTER TABLE `tb_anggota_tugas_akhir`
  ADD PRIMARY KEY (`id_tugas_akhir`,`id_mhs`);

--
-- Indeks untuk tabel `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`);

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
-- AUTO_INCREMENT untuk tabel `tb_kompetensi`
--
ALTER TABLE `tb_kompetensi`
  MODIFY `id_kompetensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan_pembimbing`
--
ALTER TABLE `tb_pengajuan_pembimbing`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_periode_ta`
--
ALTER TABLE `tb_periode_ta`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  MODIFY `id_user_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_logbook_ta`
--
ALTER TABLE `tb_logbook_ta`
  ADD CONSTRAINT `tb_logbook_ta_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tugas_akhir`
--
ALTER TABLE `tb_tugas_akhir`
  ADD CONSTRAINT `tb_tugas_akhir_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tb_user_mhs` (`id_user_mhs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
