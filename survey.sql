-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2021 pada 09.54
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
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `store_survey_id` int(11) NOT NULL,
  `pilihan_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `store_survey_id`, `pilihan_id`, `skor`) VALUES
(91, 3, 22, 10),
(92, 3, 25, 20),
(93, 3, 28, 30),
(94, 3, 29, 20),
(95, 3, 32, 15),
(96, 4, 22, 10),
(97, 4, 24, 10),
(98, 4, 26, 10),
(99, 4, 29, 20),
(100, 4, 31, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'Keamanan'),
(1, 'Kebersihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `pertanyaan`, `kategori_id`) VALUES
(7, 'Apa?', 2),
(8, 'Bagaimana..?', 2),
(9, 'Kapan?', 1),
(10, 'Kenapa?', 1),
(11, 'Siapa?', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan`
--

CREATE TABLE `pilihan` (
  `id` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `skor` int(11) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pilihan`
--

INSERT INTO `pilihan` (`id`, `jawaban`, `skor`, `pertanyaan_id`) VALUES
(22, 'Iya', 10, 7),
(23, 'Tidak', 20, 7),
(24, 'Mungkin', 10, 8),
(25, 'Saja', 20, 8),
(26, 'Kemarin', 10, 9),
(27, 'Sekarang', 20, 9),
(28, 'Besok', 30, 9),
(29, 'Iya', 20, 10),
(30, 'Entah', 30, 10),
(31, 'Kami', 10, 11),
(32, 'Kita', 15, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `region`
--

INSERT INTO `region` (`id`, `nama`, `supervisor_id`) VALUES
(3, 'Region 2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `store_survey_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `persentase` varchar(5) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id`, `store_survey_id`, `skor`, `total`, `persentase`, `file`) VALUES
(21, 3, 95, 115, '82,61', '20210207060315_Laporan_Survey_Lapangan'),
(22, 4, 60, 115, '52,17', '20210207072928_Laporan_Survey_Lapangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_detail`
--

CREATE TABLE `report_detail` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `persentase` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report_detail`
--

INSERT INTO `report_detail` (`id`, `report_id`, `kategori_id`, `skor`, `total`, `persentase`) VALUES
(28, 21, 1, 65, 75, '86,67'),
(29, 21, 2, 30, 40, '75,00'),
(30, 22, 1, 40, 75, '53,33'),
(31, 22, 2, 20, 40, '50,00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `maks_perhari` int(11) NOT NULL,
  `maks_perbulan` int(11) NOT NULL,
  `maks_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `maks_perhari`, `maks_perbulan`, `maks_survey`) VALUES
(1, 5, 20, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `lokasi` text NOT NULL,
  `poto` text NOT NULL,
  `poto_sekitar` text DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `manager` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `nama`, `alamat`, `lokasi`, `poto`, `poto_sekitar`, `region_id`, `manager`) VALUES
(4, 'test', 'test', 'test,test', 'image/store/aqua_aqua_botol_click_n_go_750ml_full022.jpg', NULL, 3, 'test'),
(5, 'Store 1', 'Store 1', '-6.240416799999999,107.0808316', 'image/store/1.jpg', NULL, 3, 'Store 1'),
(6, 'Store 2', 'Store 2', '-6.2593403,107.0823497', 'image/store/2.jpg', NULL, 3, 'Store 2'),
(7, 'Store 3', 'Store 3', '-6.261893627849544,107.08361875425827', 'image/store/3.jpg', NULL, 3, 'Store 3'),
(8, 'Store 4', 'Store 4', '-6.261360386347792,107.09004532702215', 'image/store/fodors.jpg', NULL, 3, 'Store 4'),
(9, 'Store 5', 'Store 5', '-6.263838613962893,107.09247506021744', 'image/store/dscf5546-8c417efd89272b6d226313d6bb3509fe_600x400.jpg', NULL, 3, 'Store 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store_survey`
--

CREATE TABLE `store_survey` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `surveyor_id` int(11) NOT NULL,
  `batas_waktu` date NOT NULL,
  `lokasi` text NOT NULL,
  `poto` text NOT NULL,
  `surveyed` int(1) NOT NULL,
  `kuesioner` int(1) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `survey` int(11) NOT NULL,
  `is_spv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `store_survey`
--

INSERT INTO `store_survey` (`id`, `store_id`, `surveyor_id`, `batas_waktu`, `lokasi`, `poto`, `surveyed`, `kuesioner`, `tanggal_survey`, `survey`, `is_spv`) VALUES
(1, 4, 2, '2021-02-07', '', '', 0, 0, '0000-00-00', 1, 1),
(3, 5, 2, '2021-02-07', '-6.240416799999999,107.0808316', '709908_720.jpg', 1, 1, '2021-02-07', 1, 1),
(4, 6, 2, '2021-02-07', '-6.2593403,107.0823497', 'large-543defb8b5718-86712ff11c99c09cb60453869a030596.jpg', 1, 1, '2021-02-07', 1, 1),
(5, 7, 2, '2021-02-07', '', '', 0, 0, '0000-00-00', 1, 1),
(10, 8, 2, '2021-02-07', '', '', 0, 0, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supervisor`
--

INSERT INTO `supervisor` (`id`, `nama`, `alamat`, `hp`, `email`, `password`) VALUES
(2, 'Roby Handoyo', 'Tambun, Bekasi', '123456', 'roby@roby.com', '$2y$10$1riuyIGbqH8qhUuc1m7Hje6mUS9PRq4PcCyq6vLh.DUxuh8m/jh9G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Root', 'root@root.com', '$2y$12$UrByOREsavrnpqLvR9ZDH.3ezok.uNwqdTrSvBZFPc6CIVjM6gake');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_detail`
--
ALTER TABLE `report_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `store_survey`
--
ALTER TABLE `store_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `report_detail`
--
ALTER TABLE `report_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `store_survey`
--
ALTER TABLE `store_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
