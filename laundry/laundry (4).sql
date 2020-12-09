-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 09:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_akun` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama`, `no_telp`, `email`, `password`, `status`) VALUES
('1', 'Yogi kontol', '08125487949', 'muhammadalikqrham@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cucian_masuk`
--

CREATE TABLE `cucian_masuk` (
  `kode_cm` int(11) NOT NULL,
  `kode_konsumen` varchar(20) NOT NULL,
  `tanggal_cm` date NOT NULL,
  `status_order` varchar(3) NOT NULL,
  `tipe_pembayaran` varchar(3) NOT NULL,
  `status_pembayaran` varchar(3) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cucian_masuk`
--

INSERT INTO `cucian_masuk` (`kode_cm`, `kode_konsumen`, `tanggal_cm`, `status_order`, `tipe_pembayaran`, `status_pembayaran`, `time`) VALUES
(55, '1', '2020-12-08', '0', '0', '0', '08:08:29'),
(56, '1', '2020-12-08', '2', '0', '1', '08:12:02'),
(57, '1', '2020-12-08', '0', '0', '0', '09:03:15'),
(58, '2', '2020-12-08', '0', '0', '0', '09:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `kode_konsumen` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`kode_konsumen`, `nama`, `alamat`, `no_telepon`, `email`, `password`) VALUES
('1', 'Muhammad Al-ikqrham', 'akhdajsgd', '08125487949', 'muhammadalikqrham@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
('2', 'Yogi Firmansyah', 'Jl.Antasari', '08125487949', 'admin@admin.com', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `kode_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_jenis` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kode_jenis`, `nama_jenis`, `satuan`, `harga_jenis`) VALUES
(2, 'Cuci Setrika', 'kg', 6000),
(3, 'Cuci lipat', 'kg', 5000),
(4, 'Cuci Express (1hari)', 'kg', 8000),
(5, 'Bed Cover', 'pcs', 20000),
(6, 'Bed Cover Sedang', 'pcs', 15000),
(7, 'Sprai ukuran besar', 'pcs', 15000),
(8, 'Sprai ukuran sedang', 'pcs', 10000),
(9, 'Selimut Ukuran Besar', 'pcs', 20000),
(17, 'Cucian', 'kg', 10000),
(25, 'Kiloan Express 12jam', 'kg', 15000),
(26, 'Jas', 'kg', 200000),
(27, 'Baju Pengantin', 'pcs', 20000),
(28, 'KILO', 'kg', 10000),
(29, 'Jas Hujan', 'pcs', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_cm` int(11) NOT NULL,
  `kode_jenis` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_cm`, `kode_jenis`, `qty`, `total`, `tanggal_transaksi`, `tanggal_ambil`) VALUES
(8, 55, 5, 3, 60000, '0000-00-00', '0000-00-00'),
(9, 56, 5, 2, 40000, '0000-00-00', '2020-12-08'),
(10, 56, 8, 3, 30000, '0000-00-00', '2020-12-08'),
(11, 56, 29, 4, 80000, '0000-00-00', '2020-12-08'),
(12, 57, 29, 4, 80000, '0000-00-00', '0000-00-00'),
(13, 58, 6, 3, 45000, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `cucian_masuk`
--
ALTER TABLE `cucian_masuk`
  ADD PRIMARY KEY (`kode_cm`),
  ADD KEY `kode_konsumen` (`kode_konsumen`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kode_konsumen`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_jenis` (`kode_jenis`),
  ADD KEY `kode_cm` (`kode_cm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cucian_masuk`
--
ALTER TABLE `cucian_masuk`
  MODIFY `kode_cm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `kode_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cucian_masuk`
--
ALTER TABLE `cucian_masuk`
  ADD CONSTRAINT `cucian_masuk_ibfk_1` FOREIGN KEY (`kode_konsumen`) REFERENCES `konsumen` (`kode_konsumen`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_jenis`) REFERENCES `paket` (`kode_jenis`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_cm`) REFERENCES `cucian_masuk` (`kode_cm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
