-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2025 pada 16.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Salsa', '12345'),
(3, 'laila', 'laila123'),
(5, 'rian', 'rian123'),
(7, 'anggun', 'anggun123'),
(9, 'ririn', 'ririn123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_les` int(11) NOT NULL,
  `kode_alternatif` varchar(50) NOT NULL,
  `nm_les` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_les`, `kode_alternatif`, `nm_les`) VALUES
(20, 'L1', 'Kos Queen (L)'),
(21, 'L2', 'Kos Puncak (L)'),
(22, 'L3', 'Kos Kinin (L)'),
(23, 'L4', 'Kos Andalusia (L)'),
(24, 'P1', 'Kos Cimel (P)'),
(25, 'P2', 'Pondokan Reno dan Feby (P)'),
(26, 'P3', 'Kos Bu Erna (P)'),
(27, 'P4', 'Kos Bu Irigasi (P)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria_kode` varchar(50) NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria_kode`, `nm_kriteria`, `bobot`, `status`) VALUES
(18, 'C1', 'Keamanan Sekitar Kos', 0.35, 'BENEFIT'),
(19, 'C2', 'Harga', 0.3, 'BENEFIT'),
(20, 'C3', 'Ukuran Kamar', 0.2, 'BENEFIT'),
(21, 'C4', 'Lokasi Strategis', 0.1, 'BENEFIT'),
(22, 'C5', 'Fasilitas', 0.05, 'BENEFIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id_nilai` int(11) NOT NULL,
  `id_les` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembobotan`
--

INSERT INTO `pembobotan` (`id_nilai`, `id_les`, `id_kriteria`, `nilai`) VALUES
(25, 20, 18, 40),
(26, 20, 19, 50),
(27, 20, 20, 50),
(28, 20, 21, 50),
(29, 20, 22, 40),
(30, 21, 18, 50),
(31, 21, 19, 40),
(32, 21, 20, 20),
(33, 21, 21, 30),
(34, 21, 22, 40),
(35, 22, 18, 40),
(36, 22, 19, 50),
(37, 22, 20, 40),
(38, 22, 21, 50),
(39, 22, 22, 50),
(40, 23, 18, 50),
(41, 23, 19, 40),
(42, 23, 20, 50),
(43, 23, 21, 30),
(44, 23, 22, 50),
(45, 24, 18, 50),
(46, 24, 19, 40),
(47, 24, 20, 40),
(48, 24, 21, 50),
(49, 24, 22, 40),
(50, 25, 18, 40),
(51, 25, 19, 40),
(52, 25, 20, 40),
(53, 25, 21, 50),
(54, 25, 22, 30),
(55, 26, 18, 50),
(56, 26, 19, 40),
(57, 26, 20, 50),
(58, 26, 21, 40),
(59, 26, 22, 40),
(60, 27, 18, 50),
(61, 27, 19, 30),
(62, 27, 20, 40),
(63, 27, 21, 30),
(64, 27, 22, 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_les`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_les` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
