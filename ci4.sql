-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2021 pada 07.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slugh` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nim` char(8) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `th_awal` int(11) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `slugh`, `jurusan`, `nim`, `gender`, `status`, `th_awal`, `gambar`) VALUES
(31, 'Fahrudin Nasikh Az Zuhdu', 'fahrudin-nasikh-az-zuhdu', 'Teknik Informatika', '19523005', 'Laki-laki', 'Aktif', 2019, '1607842382_864f209967e545c6034b.jpg'),
(32, 'Naufal Yusran', 'naufal-yusran', 'Informatika', '19523170', 'Laki-laki', 'Aktif', 2019, '1607856128_6106c05c764524c37e23.jpg'),
(33, 'Ananda Shafa Risha Waluyo', 'ananda-shafa-risha-waluyo', 'Informatika', '19523231', 'Laki-laki', 'Aktif', 2019, 'default.jpg'),
(35, 'Nusastuti Wijareni', 'nusastuti-wijareni', 'Informatika', '19523064', 'Perempuan', 'Aktif', 2019, 'default.jpg'),
(36, 'Muhammad Dzaki Arkaan Nasir', 'muhammad-dzaki-arkaan-nasir', 'Informatika', '19523212', 'Laki-laki', 'Aktif', 2019, 'default.jpg'),
(37, 'Azka Nabilah Auliyaurrohman', 'azka-nabilah-auliyaurrohman', 'Informatika', '19523226', 'Perempuan', 'Aktif', 2019, 'default.jpg'),
(38, 'Iqbal Kusuma', 'iqbal-kusuma', 'Informatika', '19523174', 'Laki-laki', 'Aktif', 2019, 'default.jpg'),
(39, 'Rizki Fajarullah', 'rizki-fajarullah', 'Informatika', '19523010', 'Laki-laki', 'Aktif', 2019, 'default.jpg'),
(40, 'Muhammad Ilham', 'muhammad-ilham', 'Informatika', '19523021', 'Laki-laki', 'Cuti', 2019, '1607863209_6ed77a1ab5d877a2db75.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`, `user_updated_at`) VALUES
(11, 'fahru', 'nafachru@gmail.com', '$2y$10$MnaYm9DcvTrdo/o8r/DxVedJBsAlutpNfNT4s8RnfrEd3mx32A0M2', '2020-12-12 23:36:35', '2020-12-13 06:36:35'),
(12, 'admin', 'tesadmin@gmail.com', '$2y$10$fGKyI.dT.yLyBQZHrBr17uDnaHp74aOshKuO66tjz6u6SFF1D6VQG', '2021-01-03 17:33:46', '2021-01-04 00:33:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
