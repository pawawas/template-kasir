-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2024 pada 15.09
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
-- Database: `kasir`
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
(26, 12, 3, 3, '606060.00'),
(27, 13, 1, 1, '4000.00'),
(28, 13, 3, 3, '606060.00'),
(29, 14, 1, 1, '4000.00'),
(30, 15, 1, 1, '4000.00'),
(31, 16, 1, 1, '4000.00'),
(32, 17, 1, 1, '4000.00'),
(33, 18, 1, 2, '1992.00'),
(34, 19, 1, 2, '9992.00'),
(35, 20, 1, 2, '9992.00'),
(36, 21, 1, 2, '9992.00'),
(43, 28, 3, 10, '2020200.00'),
(44, 30, 1, 1, '4000.00'),
(45, 31, 3, 1, '202020.00'),
(46, 32, 1, 1, '4000.00'),
(47, 33, 3, 10, '2020200.00'),
(48, 34, 6, 2, '40000.00'),
(49, 34, 5, 1, '25000.00'),
(50, 35, 6, 5, '100000.00'),
(51, 36, 5, 2, '50000.00'),
(52, 42, 5, 1, '12000.00');

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
(11, 'niken', '78', '088222234560'),
(12, 'raya', '56', '986756r318879');

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
(28, '2024-02-16', '2.00', 3),
(29, '2024-02-16', '0.00', 3),
(30, '2024-02-16', '4.00', 3),
(31, '2024-02-17', '202020.00', 3),
(32, '2024-02-17', '4000.00', 3),
(33, '2024-02-18', '2020200.00', 11),
(34, '2024-02-19', '65.00', 11),
(35, '2024-02-19', '100.00', 11),
(36, '2024-02-19', '50.00', 11),
(37, '2024-02-20', '0.00', 0),
(38, '2024-02-20', '12.00', 11),
(39, '2024-02-20', '12.00', 11),
(40, '2024-02-20', '0.00', 0),
(41, '2024-02-20', '12.00', 11),
(42, '2024-02-20', '12.00', 11);

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
(5, 'espreso', '25000.00', 6),
(6, 'cappucino', '20000.00', -2),
(7, 'latte', '18000.00', 15),
(8, 'ice latte', '20000.00', 25),
(9, 'macchiato', '22000.00', 7),
(10, 'lemon splash', '12000.00', 7),
(11, 'lychee splash', '12000.00', 10),
(12, 'peach tea ', '10000.00', 8);

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
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(10, 'petugas', '202cb962ac59075b964b07152d234b70', 'petugas');

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
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
