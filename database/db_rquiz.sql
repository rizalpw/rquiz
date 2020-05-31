-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2020 pada 19.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13908879_db_rquiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'SUPER ADMIN', 'a1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuis`
--

INSERT INTO `kuis` (`id`, `nama`, `tanggal`) VALUES
(1, 'web dinamis', '2020-05-29'),
(2, 'web statis', '2020-05-31'),
(3, 'pbo', '2020-06-01'),
(4, 'keamanan web', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) NOT NULL,
  `hasil` varchar(3) NOT NULL,
  `jawaban` mediumtext NOT NULL,
  `kuis_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `hasil`, `jawaban`, `kuis_id`, `user_id`) VALUES
(1, '1', '', 1, 1),
(2, '2', '2', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(10) NOT NULL,
  `isi` text NOT NULL,
  `pilihan_benar` tinytext NOT NULL,
  `pilihan_salah_1` tinytext NOT NULL,
  `pilihan_salah_2` tinytext NOT NULL,
  `pilihan_salah_3` tinytext NOT NULL,
  `pilihan_salah_4` tinytext NOT NULL,
  `kuis_id` int(10) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `isi`, `pilihan_benar`, `pilihan_salah_1`, `pilihan_salah_2`, `pilihan_salah_3`, `pilihan_salah_4`, `kuis_id`, `foto`) VALUES
(1, '1+1=?', '2', '1', '3', '4', '5', 2, NULL),
(6, '1q', '2', '3', '4', '5', '6', 1, NULL),
(10, 'dfs', 'erew', '324', '435', 'df', 'asdf', 4, NULL),
(12, 'menambahkan nama pada tab browser saat membuka halaman .html bisa menggunakan kode...', 'Hyper Text Markup Language', 'Hydro Termal  Markup Language', 'Hydro Text Markup Language', 'Hyper Termal Markup Language', 'Haji Tengku Makan Langsat', 2, NULL),
(13, 'HTML adalah singkatan dari?', 'Hyper Text Markup Language', 'Hydro Termal  Markup Language', 'Hydro Text Markup Language', 'Hyper Termal Markup Language', 'Haji Tengku Makan Langsat', 2, NULL),
(14, 'wer', 'dfrws', 'divwer', 'ewr', '23423', 'dfs', 4, NULL),
(15, '2+2=?', '4', '1', '2', '3', '4', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'rizal', '150fb021c56c33f82eef99253eb36ee1', 'Rizal Pratama Wijaya', ''),
(2, 'diaz', '99ccabed315e3609cae2dd150db1210b', 'diaz', ''),
(3, 'akusiapa', '90b0cba590eb4ab70cf4bcaa3eee8033', 'aku siapa ya', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_ibfk_1` (`kuis_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
