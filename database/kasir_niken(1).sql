-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2024 pada 14.53
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_niken`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `detail_id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`detail_id`, `penjualan_id`, `produk_id`, `jumlah_produk`, `subtotal`) VALUES
(12, 2, 1, 2, '8000.00'),
(13, 1, 1, 2, '8000.00'),
(14, 2, 1, 9, '36000.00'),
(15, 2, 3, 0, '0.00'),
(16, 3, 3, 2, '404040.00'),
(17, 4, 3, 2, '404040.00'),
(18, 5, 3, 2, '404040.00'),
(19, 6, 3, 2, '404040.00'),
(20, 7, 3, 1, '202020.00'),
(21, 8, 3, 1, '202020.00'),
(22, 9, 1, 10, '40000.00'),
(23, 9, 3, 1, '202020.00'),
(24, 10, 3, 1, '202020.00'),
(25, 11, 1, 10, '40000.00'),
(26, 12, 1, 1, '4000.00'),
(27, 13, 1, 6, '24000.00'),
(28, 14, 3, 2, '404040.00'),
(29, 15, 1, 2, '8000.00'),
(30, 16, 1, 3, '12000.00'),
(31, 17, 1, 3, '12000.00'),
(32, 18, 1, 3, '12000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama_pelanggan`, `alamat`, `nomor_telepon`) VALUES
(3, 'Niken aurell', 'cangggu', '1'),
(6, 'eiei', 'eey', '37373'),
(7, 'zild', 'oke', '1'),
(8, 'ok', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `pelanggan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tanggal_penjualan`, `total_harga`, `pelanggan_id`) VALUES
(1, '2024-02-15', '3333.00', 1),
(2, '2024-02-12', '404.00', 6),
(3, '2024-02-12', '404.00', 6),
(4, '2024-02-12', '404.00', 6),
(5, '2024-02-12', '404.00', 7),
(6, '2024-02-12', '404.00', 7),
(7, '2024-02-12', '202.00', 3),
(8, '2024-02-12', '202.00', 3),
(9, '2024-02-12', '242.00', 3),
(10, '2024-02-12', '202.00', 3),
(11, '2024-02-12', '40.00', 3),
(12, '2024-02-19', '4.00', 3),
(13, '2024-02-19', '24.00', 3),
(14, '2024-02-19', '404.00', 3),
(15, '2024-02-19', '8.00', 3),
(16, '2024-02-19', '12.00', 3),
(17, '2024-02-19', '12.00', 3),
(18, '2024-02-19', '12.00', 8),
(19, '2024-02-19', '16.00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `nama_produk`, `harga`, `stok`) VALUES
(1, 'Ess', '4000.00', 3845),
(3, 'kiko', '202020.00', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `password`, `level`) VALUES
(2, 'petugas', '202cb962ac59075b964b07152d234b70', 'petugas'),
(4, 'petugas5', '7f1de29e6da19d22b51c68001e7e0e54', 'petugas'),
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(6, 'IVALIVUL', '202cb962ac59075b964b07152d234b70', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
