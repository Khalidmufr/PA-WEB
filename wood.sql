-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 10:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wood`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id_login` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `role` enum('admin','user','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id_login`, `username`, `password`, `nama`, `role`) VALUES
(24, 'admin', '$2y$10$zQUo24GULqb0pA6gkP3CX.EeZLaVDg0PvMHh3gZVUo26qD1FdwnyK', 'admin', 'admin'),
(25, 'romi', '$2y$10$vcFKjAvN1aStxwTcQLbg1.LZHxNxS1eWOKVrDmyl5iZPjmTPeFhWq', 'romi', 'staff'),
(26, 'rizq', '$2y$10$NqlXYlwyl7Osm0CaahFFZuAZ22hRgluv0CysFQoCYz.u3cmYAN4Qi', 'rizq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `merk` varchar(60) NOT NULL,
  `plat` char(15) NOT NULL,
  `id_supir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk`, `plat`, `id_supir`) VALUES
(1, 'Traga', 'KT 1440 PU', NULL),
(2, 'L3000', 'KT 144A PK', NULL),
(6, 'Isuzu', 'KT 26 RHW', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nomor` char(20) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` char(50) NOT NULL,
  `kode` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_supir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `gambar`) VALUES
(6, 'Meranti', 35000, 1, 'Meranti.jpg'),
(16, 'Ulin', 40000, 1, 'Ulin.jpg'),
(27, 'Bengkirai', 10000, 0, 'Kayu-Bengkirai.jpg'),
(30, 'Kapur', 35000, 10, 'Kapur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) NOT NULL,
  `nama_supir` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id_supir`, `nama_supir`) VALUES
(6, 'rizq'),
(7, 'fatur'),
(15, 'romi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_login`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `mobil_supir` (`id_supir`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `pembelian_produk` (`id_produk`),
  ADD KEY `pembelian_login` (`id_login`),
  ADD KEY `pembelian_supir` (`id_supir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_supir` FOREIGN KEY (`id_supir`) REFERENCES `supir` (`id_supir`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`Id_login`),
  ADD CONSTRAINT `pembelian_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `pembelian_supir` FOREIGN KEY (`id_supir`) REFERENCES `supir` (`id_supir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
