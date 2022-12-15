-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 03:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_buku` varchar(30) NOT NULL,
  `id_kasir` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `foto`, `diskon`) VALUES
(1, 'harima harimau', 'satrio maulana', 'graha', 2019, 100, 50000, 70000, 'harimau.jpeg', 10),
(2, 'resensi', 'Hari tanu', 'Putri Bangga', 2022, 199, 50000, 75000, 'Resensi.jpg', 20),
(3, 'hujan bulan juni', 'Ali Syahrul', 'Putri Bangga', 2020, 199, 140000, 240000, 'hujan bulan juni.jpeg', 20),
(4, 'filosofi teras', 'satrio maulana', 'satran', 2019, 150, 60000, 110000, 'filosofi teras.jpg', 10),
(5, 'kita semua sama', 'patriot ', 'pmd', 2020, 4000, 140000, 200000, 'kita semua sama.jpeg', 15),
(6, 'the end power', 'Hari tanu', 'mnc', 2022, 300, 200000, 350000, 'The End Power.jpg', 20),
(7, 'muda cerdas tua mapan', 'bambang ali', 'Bnd corporat', 2022, 200, 150000, 250000, 'muda cerdas tua mapan.jpg', 10),
(8, 'malaikat tak bersayap', 'deden sukumo', 'maulana', 2022, 130, 200000, 350000, 'Malaikat tak bersayap.jpg', 25),
(9, 'laskar pelangi', 'citra abidin', 'citra production', 2015, 300, 70000, 150000, 'laskar pelangi.jpeg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_distributor`
--

INSERT INTO `tb_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'gramedia', 'Jakarta', '0899219221'),
(2, 'buka buku', 'banten', '09212093012');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kasir`
--

INSERT INTO `tb_kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `email`, `username`, `foto`, `password`, `akses`) VALUES
(1, 'Ijun Septi Ardi AJa', 'Kab. Solok, Sumatera Barat', '081192200210', 'admin1@gmail.com', 'Admin1', 'ijun.jpg\r\n', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(2, 'Mai Munah Mai Saroh', 'Produk Talang NIh Bro ', '081192200222', 'kasir1@gmail.com', 'Kasir1', 'maimunah.jpeg\n', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir'),
(3, 'Ali', 'Padang Sukoraharjo', '088892812313', 'aliadmin@gmail.com', 'Amin Ali', '', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir'),
(4, 'Kasir Ajo', 'Ada Padang Ada Solok', '0889213812039', 'kasirajo@gmail.com', 'Ajo', '', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
(88, 2, 2, 1, 75000, '2022-11-25'),
(89, 1, 2, 1, 70000, '2022-11-26'),
(90, 3, 2, 1, 240000, '2022-11-26'),
(91, 1, 2, 1, 70000, '2022-11-26'),
(92, 3, 2, 1, 240000, '2022-11-26'),
(94, 0, 2, 2, 213120, '2022-11-26'),
(95, 3, 2, 2, 213120, '2022-11-26'),
(102, 2, 2, 1, 75000, '2022-11-28'),
(103, 4, 2, 1, 110000, '2022-11-28'),
(104, 4, 2, 1, 110000, '2022-11-28'),
(105, 2, 2, 1, 75000, '2022-11-28'),
(106, 1, 2, 1, 70000, '2022-11-28'),
(107, 4, 2, 1, 122100, '2022-11-28'),
(108, 2, 2, 1, 83250, '2022-11-28'),
(109, 1, 2, 1, 77700, '2022-11-28'),
(110, 1, 2, 1, 77700, '2022-11-28'),
(111, 3, 2, 1, 266400, '2022-11-28'),
(112, 3, 2, 1, 266400, '2022-11-28'),
(113, 3, 2, 1, 266400, '2022-11-28'),
(114, 2, 2, 1, 83250, '2022-11-29'),
(115, 2, 2, 1, 83250, '2022-11-29'),
(116, 3, 2, 1, 266400, '2022-11-29'),
(117, 2, 2, 1, 83250, '2022-11-29'),
(118, 3, 2, 1, 266400, '2022-11-29'),
(119, 2, 2, 1, 83250, '2022-11-29'),
(120, 3, 2, 1, 266400, '2022-11-29'),
(121, 2, 2, 1, 66600, '2022-11-29'),
(122, 3, 2, 1, 213120, '2022-11-29'),
(123, 2, 2, 1, 66600, '2022-11-29'),
(124, 2, 2, 1, 66600, '2022-11-29'),
(125, 3, 2, 1, 213120, '2022-11-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
