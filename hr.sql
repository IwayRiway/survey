-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2021 pada 22.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `menu_id`, `department_id`) VALUES
(2, 2, 9),
(3, 3, 9),
(4, 4, 9),
(5, 5, 9),
(6, 6, 9),
(7, 7, 9),
(8, 8, 9),
(9, 9, 9),
(10, 10, 9),
(11, 11, 9),
(12, 12, 9),
(13, 13, 9),
(14, 14, 9),
(15, 15, 9),
(16, 16, 9),
(17, 17, 9),
(18, 18, 9),
(19, 19, 9),
(20, 20, 9),
(21, 21, 9),
(22, 22, 9),
(23, 23, 9),
(24, 24, 9),
(25, 25, 9),
(26, 26, 9),
(27, 27, 9),
(28, 28, 9),
(29, 29, 9),
(30, 30, 9),
(31, 31, 9),
(32, 32, 9),
(33, 33, 9),
(34, 34, 9),
(35, 35, 9),
(36, 36, 9),
(37, 1, 9),
(38, 1, 10),
(39, 2, 10),
(40, 3, 10),
(41, 4, 10),
(42, 5, 10),
(43, 6, 10),
(44, 7, 10),
(45, 8, 10),
(46, 9, 10),
(47, 10, 10),
(48, 11, 10),
(49, 12, 10),
(50, 13, 10),
(51, 14, 10),
(52, 15, 10),
(53, 16, 10),
(54, 17, 10),
(55, 18, 10),
(56, 19, 10),
(57, 20, 10),
(58, 21, 10),
(59, 22, 10),
(60, 23, 10),
(61, 24, 10),
(62, 25, 10),
(63, 26, 10),
(64, 27, 10),
(65, 28, 10),
(66, 29, 10),
(67, 30, 10),
(68, 31, 10),
(69, 32, 10),
(70, 1, 1),
(71, 13, 1),
(72, 17, 1),
(73, 18, 1),
(74, 19, 1),
(75, 20, 1),
(76, 21, 1),
(77, 22, 1),
(78, 23, 1),
(79, 24, 1),
(80, 25, 1),
(81, 26, 1),
(82, 27, 1),
(83, 28, 1),
(84, 29, 1),
(85, 30, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `jumlah` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  `karyawan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id`, `tgl_pengajuan`, `dari`, `sampai`, `jumlah`, `keterangan`, `status`, `karyawan_id`, `atasan_id`) VALUES
(1, '2021-01-16', '2021-01-16', '2021-01-16', 1, 'Test Cuti', NULL, 6, 0),
(2, '2021-01-16', '2021-01-16', '2021-01-16', 1, 'test cuti dummy', 0, 4, 5),
(4, '2021-01-17', '2021-01-17', '2021-01-17', 1, 'test email', NULL, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`id`, `nama`) VALUES
(10, 'HRD'),
(1, 'IT'),
(9, 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(3, 'Manager'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tgl_lahir`, `department_id`, `jabatan_id`, `email`, `username`, `password`) VALUES
(4, 'Staff IT', '2021-01-16', 1, 4, 'staff@staff.com', 'staff', '$2y$10$lTIPhScjPNgHySkB6SLchuTOPteiMBqF.La8osOf6i7q7VohIhKaC'),
(5, 'Manager IT', '2021-01-16', 1, 3, 'manager@manager.com', 'manager', '$2y$10$Q6495AmpNheE/3xqTG98vOJMeX8cD0xcvc0WiKoGBOqDQB4oGOT8W'),
(6, 'Root', '2021-01-16', 9, 3, 'root@root.com', 'root', '$2y$10$XnKihIGyZmsHsqxAp8icjOOaddYG5RYeXDlCfMXmT3UazlM/0K.Oy'),
(7, 'HRD', '2021-01-16', 10, NULL, 'hrd@hrd.com', 'hrd', '$2y$10$UUEkIkInLsqi9BQ6tYj5luAHkKOgIz6E31q.UvRq.J7Q5/h/7I3x6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_detail`
--

CREATE TABLE `karyawan_detail` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan_detail`
--

INSERT INTO `karyawan_detail` (`id`, `karyawan_id`, `nik`, `alamat`) VALUES
(3, 4, '123', 'Staff Bekasi'),
(4, 5, '456', 'Manager Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `karyawan_id`, `atasan_id`, `tgl_lembur`, `tgl_pengajuan`, `keterangan`, `status`) VALUES
(1, 4, 5, '2021-01-16', '2021-01-16', 'test lembur', 1),
(2, 4, 5, '2021-01-17', '2021-01-17', 'test lembur email', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `url`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Lihat Department', 'department'),
(3, 'Tambah Department', 'department/create'),
(4, 'Edit Department', 'department/edit'),
(5, 'Hapus Department', 'department/delete'),
(6, 'Lihat Jabatan', 'jabatan'),
(7, 'Edit Jabatan', 'jabatan/edit'),
(8, 'Hapus Jabatan', 'jabatan/delete'),
(9, 'Tambah Jabatan', 'jabatan/create'),
(10, 'Lihat Karyawan', 'karyawan'),
(11, 'Edit Karyawan', 'karyawan/edit'),
(12, 'Hapus Karyawan', 'karyawan/delete'),
(13, 'Lihat SOP', 'sop'),
(14, 'Tambah SOP', 'sop/create'),
(15, 'Edit SOP', 'sop/edit'),
(16, 'Hapus SOP', 'sop/delete'),
(17, 'Show SOP', 'sop/show'),
(18, 'Lihat Cuti', 'cuti'),
(19, 'Tambah Cuti', 'cuti/create'),
(20, 'History Cuti (Manager)', 'cuti/history'),
(21, 'Pending Cuti (Manager)', 'cuti/pengajuan'),
(22, 'Konfirmasi Cuti (Manager)', 'cuti/acc'),
(23, 'Lihat Lembur', 'lembur'),
(24, 'Tambah Lembur', 'lembur/create'),
(25, 'History Lembur (Manager)', 'lembur/history'),
(26, 'Pending Lembur (Manager)', 'lembur/pengajuan'),
(27, 'Konfirmasi Lembur (Manager)', 'lembur/acc'),
(28, 'Lihat Pengajuan Karyawan', 'pengajuan'),
(29, 'Tambah Pengajuan Karyawan', 'pengajuan/create'),
(30, 'History Lembur (Manager)', 'pengajuan/history'),
(31, 'Pending Pengajuan Karyawan (HRD)', 'pengajuan/pengajuan'),
(32, 'Konfirmasi Pengajuan Karyawan (HRD)', 'pengajuan/acc'),
(33, 'Lihat Manajemen Menu', 'menu'),
(34, 'Tambah Manajemen Menu', 'menu/create'),
(35, 'Edit Manajemen Menu', 'menu/edit'),
(36, 'Hapus Manajemen Menu', 'menu/delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `posisi`, `tgl_pengajuan`, `keterangan`, `department_id`, `karyawan_id`, `status`) VALUES
(1, 'Programmer', '2021-01-16', '<ul><li>Menguasi CI</li><li>Menguasi Laravel</li><li>Menguasai dummy</li></ul>', 1, 5, 0),
(2, 'test', '2021-01-17', '<p>test email</p>', 1, 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sop`
--

CREATE TABLE `sop` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `file` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sop`
--

INSERT INTO `sop` (`id`, `judul`, `file`, `keterangan`) VALUES
(2, 'upload', 'assets/file/Group_3rri.pdf', 'upload');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `karyawan_detail`
--
ALTER TABLE `karyawan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan_detail`
--
ALTER TABLE `karyawan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sop`
--
ALTER TABLE `sop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
