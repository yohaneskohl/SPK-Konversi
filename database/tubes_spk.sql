-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 06.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `vektor_s` float DEFAULT NULL,
  `vektor_v` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama`, `vektor_s`, `vektor_v`) VALUES
(24, NULL, 'Pembangunan Jalan Desa', NULL, NULL),
(25, NULL, 'Penyediaan Fasilitas Listrik Desa', NULL, NULL),
(26, NULL, 'Program Pelatihan Teknologi untuk Masyarakat', NULL, NULL),
(27, NULL, 'Inovasi Pertanian Berkelanjutan', NULL, NULL),
(28, NULL, 'Pengelolaan Air Bersih dan Sanitasi', NULL, NULL),
(29, NULL, 'Peningkatan Akses Internet Desa', NULL, NULL),
(30, NULL, 'Program Pendidikan Inklusif', NULL, NULL),
(31, NULL, 'Penyediaan Fasilitas Kesehatan Dasar', NULL, NULL),
(32, NULL, 'Pengembangan Sentra Industri Kecil dan Menengah', NULL, NULL),
(33, NULL, 'Program Konservasi Lingkungan', NULL, NULL),
(34, NULL, 'Pembangunan Taman Bermain Anak', NULL, NULL),
(35, NULL, 'Penyediaan Transportasi Publik', NULL, NULL),
(36, NULL, 'Revitalisasi Pasar Tradisional', NULL, NULL),
(37, NULL, 'Pembangunan Tempat Pertemuan Komunitas', NULL, NULL),
(38, NULL, 'Inovasi Energi Terbarukan', NULL, NULL),
(39, NULL, 'Pengelolaan Sampah dan Recycling', NULL, NULL),
(40, NULL, 'Pemberdayaan Perempuan dalam Bisnis Lokal', NULL, NULL),
(41, NULL, 'Program Pengembangan Desa Wisata', NULL, NULL),
(42, NULL, 'Peningkatan Keamanan Wilayah', NULL, NULL),
(43, NULL, 'Pembangunan Pusat Kreativitas dan Seni', NULL, NULL),
(44, NULL, 'Penyediaan Tempat Olahraga Komunitas', NULL, NULL),
(45, NULL, 'Program Pengentasan Kemiskinan', NULL, NULL),
(46, NULL, 'Peningkatan Sistem Irigasi Pertanian', NULL, NULL),
(47, NULL, 'Inovasi dalam Sistem Pendidikan Lokal', NULL, NULL),
(55, NULL, 'Desa Ekowisata untuk Meningkatkan Pendapatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(38, 'Biaya'),
(39, 'Sumber Daya Manusia'),
(40, 'Kebutuhan Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembobotan`
--

INSERT INTO `pembobotan` (`id_nilai`, `id_alternatif`, `id`, `nilai`) VALUES
(1, 24, 38, '25'),
(2, 24, 39, '25'),
(3, 24, 40, '60'),
(4, 25, 38, '40'),
(5, 25, 39, '30'),
(6, 25, 40, '45'),
(7, 26, 38, '20'),
(8, 26, 39, '15'),
(9, 26, 40, '35'),
(10, 27, 38, '20'),
(11, 27, 39, '30'),
(12, 27, 40, '70'),
(13, 28, 38, '50'),
(14, 28, 39, '40'),
(15, 28, 40, '60'),
(16, 29, 38, '40'),
(17, 29, 39, '10'),
(18, 29, 40, '35'),
(19, 30, 38, '35'),
(20, 30, 39, '25'),
(21, 30, 40, '15'),
(22, 31, 38, '65'),
(23, 31, 39, '45'),
(24, 31, 40, '80'),
(25, 32, 38, '60'),
(26, 32, 39, '45'),
(27, 32, 40, '75'),
(28, 33, 38, '15'),
(29, 33, 39, '30'),
(30, 33, 40, '25'),
(31, 34, 38, '40'),
(32, 34, 39, '35'),
(33, 34, 40, '50'),
(34, 35, 38, '70'),
(35, 35, 39, '15'),
(36, 35, 40, '80'),
(37, 36, 38, '40'),
(38, 36, 39, '20'),
(39, 36, 40, '30'),
(40, 37, 38, '20'),
(41, 37, 39, '25'),
(42, 37, 40, '20'),
(43, 38, 38, '50'),
(44, 38, 39, '35'),
(45, 38, 40, '70'),
(46, 39, 38, '60'),
(47, 39, 39, '40'),
(48, 39, 40, '80'),
(49, 40, 38, '45'),
(50, 40, 39, '30'),
(51, 40, 40, '50'),
(52, 41, 38, '70'),
(53, 41, 39, '80'),
(54, 41, 40, '50'),
(55, 42, 38, '65'),
(56, 42, 39, '45'),
(57, 42, 40, '90'),
(58, 43, 38, '50'),
(59, 43, 39, '50'),
(60, 43, 40, '40'),
(61, 44, 38, '50'),
(62, 44, 39, '60'),
(63, 44, 40, '20'),
(64, 45, 38, '75'),
(65, 45, 39, '40'),
(66, 45, 40, '90'),
(67, 46, 38, '70'),
(68, 46, 39, '40'),
(69, 46, 40, '90'),
(70, 47, 38, '65'),
(71, 47, 39, '60'),
(72, 47, 40, '70'),
(73, 55, 38, '70'),
(74, 55, 39, '65'),
(75, 55, 40, '75');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(21, 39, 40, 1),
(20, 38, 40, 3),
(19, 38, 39, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`, `status`) VALUES
(38, 0.655487, 'COST'),
(39, 0.157764, 'BENEFIT'),
(40, 0.186749, 'BENEFIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
