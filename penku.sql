-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 10:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penku`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelaku_ukm`
--

CREATE TABLE `pelaku_ukm` (
  `id` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaku_ukm`
--

INSERT INTO `pelaku_ukm` (`id`, `email`, `username`, `password`) VALUES
(36, 'rafli@gmail.com', 'Rafli', '123'),
(37, 'pp', 'Pepe', '321'),
(39, 'fachri', 'Fachri', '12'),
(40, 'r', 'Farizqi', '1'),
(42, 'rafli50@gmail.com', 'Rafli Ahmad', '321'),
(43, 'kevinpratama@gmail.com', 'Kevin Pratama', '123'),
(44, 'rafliahmad@gmail.com', 'Rafli Ahmad F', '123'),
(46, 'ahmad23@gmail.com', 'Ahmad Farizqi', '321'),
(47, 'ahmad20@gmail.com', 'Rafli Ahmad', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `kategori`, `deskripsi`, `jumlah`, `tanggal`, `user_id`) VALUES
(50, 'JJ', 'A', '2000000', '2021-12-20', 40),
(54, 'Penjualan', 'Jual barang', '3000000', '2021-12-21', 36),
(55, 'Investasi', 'Investasi emas', '2000000', '2021-12-22', 36),
(56, 'Kerjasama', 'Kerjasama dengan saudara', '500000', '2021-12-23', 36),
(58, 'Saham', 'Saham dari perusahaan ', '100000', '2021-12-24', 36),
(59, 'Sampingan', 'Sampingan bisnis', '100000', '2021-12-25', 36),
(66, 'Penjualan', 'Jual barang', '3000000', '2021-12-22', 43),
(67, 'Investasi', 'Investasi emas', '1000000', '2021-12-24', 43),
(68, 'Penjualan', 'Hasil Jual', '1000000', '2021-12-26', 43),
(69, 'Penjualan', 'Jual barang', '3000000', '2021-12-20', 44),
(70, 'Penjualan', 'Jual barang', '3000000', '2021-12-20', 46),
(71, 'Investasi', 'Investasi emas', '1000000', '2021-12-22', 46),
(72, 'Penjualan', 'Jual barang', '3000000', '2021-12-19', 47),
(73, 'Investasi', 'Investasi emas', '1000000', '2021-12-21', 47);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `kategori`, `deskripsi`, `jumlah`, `tanggal`, `user_id`) VALUES
(20, 'FF', 'FF', '1000000', '2021-12-21', 40),
(23, 'Beli bahan', 'Beli bahan barang', '2000000', '2021-12-26', 36),
(24, 'Makanan', 'Makanan per 1 bulan', '1000000', '2021-12-27', 36),
(25, 'Bensin', 'Bensin kendaraan per 1 bulan', '500000', '2021-12-28', 36),
(26, 'Pajak', 'Pajak kendaraan', '100000', '2021-12-29', 36),
(27, 'Hobi', 'Hobi per bulan', '100000', '2021-12-30', 36),
(34, 'Beli bahan', 'Beli bahan untuk barang', '2000000', '2021-12-23', 43),
(35, 'Makanan', 'Makanan per 1 bulan', '500000', '2021-12-25', 43),
(36, 'Beli bahan', 'Beli bahan untuk barang', '2000000', '2021-12-21', 44),
(37, 'Beli bahan', 'Beli bahan untuk barang', '2000000', '2021-12-21', 46),
(38, 'Makanan', 'Makanan per 1 bulan', '500000', '2021-12-23', 46),
(39, 'Beli bahan', 'Beli bahan untuk barang', '2000000', '2021-12-20', 47),
(40, 'Makanan', 'Makanan per 1 bulan', '500000', '2021-12-23', 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelaku_ukm`
--
ALTER TABLE `pelaku_ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelaku_ukm`
--
ALTER TABLE `pelaku_ukm`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pelaku_ukm` (`id`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pelaku_ukm` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
