-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2024 pada 16.35
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
  `profil` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_depan`, `nama_belakang`, `region`, `telepon`, `email`, `pasword`, `profil`) VALUES
(2, 'Aldi', 'daffa', 'Indonesia', '081294702230', 'aldidaffaarisyi@gmail.com', '123', 0x6469616d6f6e645f756e67752e706e67),
(3, 'Sueudh', 'Dyeue', 'Chile', '133164649490', '26@hssk.com', '16625252', ''),
(4, 'Arisyi', 'DE', 'Thailand', '213842342217', '123344@gmail.com', '1234567890', ''),
(5, 'Aldi', 'Daffa', 'Colombia', '316492850475', '3738r@gmail', '1234', '');

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
  `norek_telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama_game`, `nama_pembeli`, `id_akun`, `kategori`, `jumlah`, `metode`, `norek_telepon`) VALUES
(37, 'Mobile Legends: Bang Bang', '%COMING SOON%', '111113424 (35343)', 'Weekly Diamond Pass', 'WDP Rp30.000,00', 'Gopay', '4534897534323'),
(38, 'Free Fire', '%COMING SOON%', '1111156456', 'Diamond', '2180 FF-Diamond Rp270.000,00', 'Bank BNI', '324576890877868'),
(39, 'Free Fire', '%COMING SOON%', '4273492468', 'Diamond', '2180 FF-Diamond Rp270.000,00', 'Bank BRI', '094853845765462'),
(40, 'Free Fire', '%COMING SOON%', '4273492468', 'Diamond', '73100 FF-Diamond Rp9.000.000,00', 'Bank BCA', '329484976382372'),
(41, 'Mobile Legends: Adventure', '%COMING SOON%', '12345678 (1234)', 'Diamond', '5000 MLA-Diamond Rp1.499.000,00', 'Bank BNI', '432132645327633'),
(42, 'PUBG Mobile', '%COMING SOON%', '1234567845', 'UC', '5000 UC-PUBG Rp1.499.000,00', 'Shopee Pay', '329843845734785'),
(44, 'Mobile Legends: Bang Bang', '%COMING SOON%', '459345893 (453575)', 'Twilight Pass', 'Twilight Pass Rp149.000,00', 'Bank BNI', '324565769880867'),
(45, 'Mobile Legends: Bang Bang', '%COMING SOON%', '564654677 (907856)', 'Diamond', '50 MLBB-Diamond Rp15.000,00', 'Bank BRI', '890765432143567'),
(46, 'Mobile Legends: Bang Bang', '%COMING SOON%', '666609807 (2222)', 'Weekly Diamond Pass', 'WDP Rp30.000,00', 'Bank BRI', '000997666666867');

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
(1, 'Diamond MLBB', '100000', '0'),
(2, 'Weekly Diamond Pass MLBB', '999', '30000'),
(3, 'Twilight Pass MLBB', '1000', '0'),
(4, 'Diamond Free Fire', '100000', '0'),
(5, 'Diamond MLA', '100000', '0'),
(6, 'UC PUBG MOBILE', '100000', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
