-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 13.59
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
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `region` varchar(80) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pasword` varchar(100) NOT NULL,
  `profil` blob DEFAULT NULL,
  `tgl_bergabung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_depan`, `nama_belakang`, `region`, `telepon`, `email`, `pasword`, `profil`, `tgl_bergabung`) VALUES
(30, 'Aldi', 'Daffa', 'Indonesia', '081294702230', 'aldi@gmail.com', '$2y$10$hZRNVnNLuUDmCz3tOZ21E.dukC/zVjV9XqL5yY0wsubkj7iRbiapi', 0x323032342d31302d31372031382e35322e34312e706e67, '2024-10-17 18:17:06'),
(31, 'Aldi', 'Daffa', 'Indonesia', '081294702230', 'aldidaffaarisyi@gmail.com', '$2y$10$nmaRbrxhioZL7oKsVvgKQ.ki5LhvIxDpFLqZ0XPlS9mdPXhbs1ivu', 0x323032342d31302d32312031382e31342e32322e6a7067, '2024-10-21 18:14:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nama_game` varchar(50) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `id_akun` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `norek_telepon` varchar(50) NOT NULL,
  `tgl_pembelian` varchar(100) NOT NULL,
  `email_pembeli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama_game`, `nama_pembeli`, `id_akun`, `kategori`, `jumlah`, `metode`, `norek_telepon`, `tgl_pembelian`, `email_pembeli`) VALUES
(71, 'Mobile Legends: Bang Bang', 'Aldi Daffa', '892347238 (455093)', 'Twilight Pass', 'Twilight Pass Rp149.000,00', 'Shopee Pay', '294032438029480', '2024-10-22 18:19:22', 'aldi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok` varchar(12) NOT NULL,
  `omset` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `nama_produk`, `stok`, `omset`) VALUES
(1, 'Diamond MLBB', '96600', '1008000'),
(2, 'Weekly Diamond Pass MLBB', '997', '90000'),
(3, 'Twilight Pass MLBB', '998', '298000'),
(4, 'Diamond Free Fire', '24680', '9286000'),
(5, 'Diamond MLA', '100000', '0'),
(6, 'UC PUBG MOBILE', '99950', '15000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
