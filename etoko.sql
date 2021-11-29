-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 04:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `alamat_berita` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `pengiriman` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'bibit', 'Bibit', 1, '2021-06-04 06:58:51'),
(2, 'makanan', 'Makanan', 2, '2021-06-04 06:58:59'),
(3, 'lele', 'Lele', 3, '2021-06-04 06:59:08'),
(4, 'pakan-lele', 'Pakan Lele', 4, '2021-06-09 18:53:03'),
(5, 'budidaya-lele-organik', 'Budidaya Lele Organik', 5, '2021-06-16 17:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal_pos` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'Kamale Store', 'Jual Hasil Bahan Olahan Lele', 'kamale@gmail.com', 'htts://www.kamale.id', 'Kamale        ', 'OK', '081157281857', 'Karawang Makan Lele (Kamale) Babakan Cianjur, Kel. Nagasari, Kec. Karawang Barat, Kab. Karawang, Prov. Jawa Barat.', 'http://www.facebook.com', 'http://www.instagram.com/kamale.id', 'Website kamle            ', 'logo18.jpeg', 'logo17.jpeg', '2021-10-17 14:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `id_status`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 1, '1', 'Al Kin', 'alkin@gmail.com', '9603e63ce9538d5ab8f1d39d5c9c1f0f75943393', '08251612421', 'Klari-Karawang', '2021-06-04 09:12:21', '2021-06-17 13:50:06'),
(2, 0, 2, '', 'Tester', 'test@gmail.com', '9603e63ce9538d5ab8f1d39d5c9c1f0f75943393', '082415228910385', 'Klari-Karawang', '2021-06-04 13:28:21', '2021-06-09 21:09:36'),
(3, 0, 1, '', 'poi', 'poi123@gmail.com', 'd383a7f09217fde5b67c4c12e0e8340a8a581c32', '0845127572192', 'Karawang', '2021-06-06 16:00:04', '2021-06-09 21:09:29'),
(4, 0, 0, 'Perusahaan', 'Sean', 'esot@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '08752345678', 'Indonesia- Bumi', '2021-06-15 09:59:37', '2021-06-15 07:59:37'),
(5, 0, 0, '4', 'Al Kindi', 'lol@gmail.com', '9603e63ce9538d5ab8f1d39d5c9c1f0f75943393', '082121212121', 'Klari karawang', '2021-06-16 09:40:55', '2021-06-17 13:49:49'),
(6, 0, 0, '4', 'Budi', 'budi@gmail.com', 'e32b64ed2614047dca6ab601ae9600ab459874fb', '0829194819319', 'Karawang', '2021-06-16 19:43:52', '2021-06-16 17:43:52'),
(7, 0, 0, '4', 'budi', 'budidaya@gmail.com', '90ee8776323c7ea4cad23bb253bad71addf12fd7', '082712571271', 'Karawang', '2021-06-16 23:10:24', '2021-06-16 21:10:24'),
(8, 0, 0, '2', 'poi', 'poi@gmail.com', 'd383a7f09217fde5b67c4c12e0e8340a8a581c32', '0812736162816', 'Karawang', '2021-06-22 16:13:39', '2021-06-22 14:13:39'),
(9, 0, 0, '2', 'pelanggan', 'pelanggan@gmail.com', 'd383a7f09217fde5b67c4c12e0e8340a8a581c32', '081156748281628', 'Klari - Karawang', '2021-06-23 06:30:47', '2021-06-23 04:30:47'),
(10, 0, 0, '2', 'saya ', 'saya@gmail.com', '2eccc29e176f970330b60df1b3fdc102517eea1a', '0827177271', 'Klari karawang', '2021-06-24 22:46:44', '2021-06-24 20:46:44'),
(11, 0, 0, '3', 'pelanggan', 'kai@gmail.com', '9603e63ce9538d5ab8f1d39d5c9c1f0f75943393', '0812741829123', 'Karawang', '2021-06-24 23:15:12', '2021-06-24 21:15:12'),
(12, 0, 0, '2', 'Helmalia', 'helmalia011@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '08972423712', 'Kp. Ceger 001/003 - Bekasi', '2021-06-25 11:28:24', '2021-06-25 09:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar_bank`, `tanggal_post`) VALUES
(1, 'BRI', '2147483647', 'Al Kindi', NULL, '2021-06-04 14:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `status_pelanggan`
--

CREATE TABLE `status_pelanggan` (
  `id_status` int(11) NOT NULL,
  `status_pelanggan` varchar(30) NOT NULL,
  `urutan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pelanggan`
--

INSERT INTO `status_pelanggan` (`id_status`, `status_pelanggan`, `urutan`) VALUES
(2, 'Personal', '2'),
(3, 'Anggota', '3'),
(4, 'Pembudidaya', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `pengiriman` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(4, 'admin', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2021-10-17 14:40:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `status_pelanggan`
--
ALTER TABLE `status_pelanggan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pelanggan`
--
ALTER TABLE `status_pelanggan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
