-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jul 2024 pada 03.32
-- Versi server: 8.0.30
-- Versi PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga_jwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int NOT NULL,
  `id_anggota` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `id_anggota`, `nama`, `jenis_kelamin`, `alamat`) VALUES
(2, 123123, 'Fatwa Aulia', 'Laki-Laki', 'Genteng'),
(3, 923, 'Sefia Maharani', 'Perempuan', 'Gambiran'),
(4, 12839, 'Aang Muammar Zein', 'Laki-Laki', 'Srono'),
(5, 823784, 'Nur Aini Azizah', 'Perempuan', 'Mojokerto'),
(6, 82973, 'Sekar Wulandari', 'Perempuan', 'Banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int NOT NULL,
  `kode` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penulis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_terbit` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode`, `nama`, `penerbit`, `nama_penulis`, `tahun_terbit`) VALUES
(1, 123234, 'Cerita Nabi', 'Gramedia', '', '2010'),
(5, 4242423, 'Kisah Tenggelamnya Firaun', 'Gramedia', 'Andre', '1999'),
(6, 5675675, 'Si Kancil Anak Nakal', 'Majalah Bobo', '', '2004'),
(8, 2324, 'dregdg', 'sdfse yaya', '', '2004'),
(10, 2342342, 'segsdfs', 'sgsdsfs', 'Dinda Saskia', '1997'),
(12, 91728, 'Titanic', 'SEM', 'Mark Fatwa', '2011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_peminjaman`
--

CREATE TABLE `transaksi_peminjaman` (
  `id` int NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `nama_buku` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_peminjam` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_peminjaman`
--

INSERT INTO `transaksi_peminjaman` (`id`, `tgl_peminjaman`, `tgl_pengembalian`, `nama_buku`, `nama_peminjam`) VALUES
(2, '2024-06-30', '2024-07-17', 'Kisah Tenggelamnya Firaun', 'Sefia Maharani'),
(3, '2024-06-04', '2024-07-11', 'Si Kancil Anak Nakal', 'Nur Aini Azizah'),
(4, '2024-07-09', '2024-07-12', 'Si Kancil Anak Nakal', 'Fatwa Aulia'),
(6, '2024-07-18', '2024-07-20', 'Si Kancil Anak Nakal', 'Sekar Wulandari');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
