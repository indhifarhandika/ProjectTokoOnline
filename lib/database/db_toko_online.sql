-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
-- Author: indhifarhandika
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 06:50 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `harga` int(255) DEFAULT NULL,
  `total_barang` int(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `barang_baru` AFTER INSERT ON `barang` FOR EACH ROW INSERT INTO stok SET
id_barang = NEW.id_barang, jenis_barang = NEW.jenis_barang, total_barang = NEW.total_barang, harga = NEW.harga,gambar = NEW.gambar, tgl_update = NEW.tgl_update
ON duplicate KEY UPDATE total_barang = total_barang + NEW.total_barang, harga = (harga*0)+NEW.harga, tgl_update = NEW.tgl_update, jenis_barang = NEW.jenis_barang, gambar = NEW.gambar
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_user`, `username`, `nama`, `email`, `alamat`, `password`, `status`) VALUES
(1, 'indhifarhandika', 'Indhi Farhandika', 'indhifarhandika@gmail.com', 'Desa Deket Wetan', '$2y$10$iPAWYxZCsL0V5DxiRGC.B.fS8izi9jvHHOpLYeqPn.BNXROJFZIXq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `total_barang` int(255) DEFAULT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_user` int(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `total_barang` int(255) NOT NULL,
  `tgl` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `payment` AFTER UPDATE ON `transaksi` FOR EACH ROW UPDATE stok SET
total_barang = total_barang - NEW.total_barang
WHERE
id_barang = NEW.id_barang
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `member` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `stok` (`id_barang`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Menghapus_data_yang_sudah_90_hari` ON SCHEDULE EVERY 1 MONTH STARTS '2018-11-10 19:53:36' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Menghapus data.' DO DELETE FROM barang
    WHERE tgl_update < DATE_SUB(NOW(), INTERVAL 90 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
