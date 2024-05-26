-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2020 pada 10.35
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
(6, '100017', 'Metta Santi Putri, S.T., M.SC.', 'metta@polibatam.ac.id', 'Admin'),
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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user_mhs`
--
ALTER TABLE `tb_user_mhs`
  MODIFY `id_user_mhs` int(11) NOT NULL AUTO_INCREMENT;

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
