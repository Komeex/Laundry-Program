-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 02:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_per_kilo` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `waktu_selesai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `kode_paket`, `nama_paket`, `harga_per_kilo`, `deskripsi`, `waktu_selesai`) VALUES
(9, 'PKT002', 'Express ', 9000.00, ' Layanan yang lebih cepat', 1),
(10, 'PKT001', 'Reguler', 6000.00, 'Paket Reguler selesai 3hari', 3),
(11, 'PKT003', 'Semi Expres', 7000.00, 'paket expres tapi lebih lambat ', 2),
(12, 'PKT004', 'Kilat', 15000.00, 'Selesai dalam 1 hari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `berat` varchar(12) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  `tanggal_selesai` datetime DEFAULT NULL,
  `status_pesanan` enum('Diproses','Selesai','Diambil') DEFAULT 'Diproses',
  `status_pembayaran` enum('Belum Bayar','Lunas') DEFAULT 'Belum Bayar',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_paket`, `nama_pelanggan`, `berat`, `no_hp`, `alamat`, `total_harga`, `tanggal_transaksi`, `tanggal_selesai`, `status_pesanan`, `status_pembayaran`, `id_user`) VALUES
(21, 10, 'akkaaa', '1.76', '986678', 'dalung', 10560.00, '2025-05-07 11:44:00', '2025-05-10 11:44:00', 'Diambil', 'Lunas', NULL),
(23, 10, 'justine', '2.50', '089239721', 'dalung', 15000.00, '2025-05-14 01:14:00', '2025-05-17 01:14:00', 'Selesai', 'Lunas', NULL),
(25, 11, 'raymond', '6.24', '0857293211', 'nusa dua', 43680.00, '2025-05-20 23:53:00', '2025-05-22 23:53:00', 'Selesai', 'Lunas', NULL),
(26, 12, 'I Made Agus Putra Mahardika', '9.42', '02832123123', 'grgr', 141300.00, '2025-05-20 23:54:00', '2025-05-21 23:54:00', 'Diproses', 'Belum Bayar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','karyawan') NOT NULL DEFAULT 'karyawan',
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `alamat`, `telepon`) VALUES
(1, 'Aura Laura', 'admin@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin', 'Kaba_kaba', '085792307417'),
(20, 'Dhika', 'dika@gmail.com', 'dfa2ff914d8a9586450aa638ba5999b14a0aa95d625207ac1c31678b5e5ac623', 'karyawan', 'Dalung', '08736628233'),
(21, 'Bayu', 'bayu@gmail.com', '414058c6f7fad3cad2dccd0ae8eb91f318617d36e5d9326e042db79703d13d10', 'karyawan', 'dalung', '085792307417'),
(22, 'Wira', 'wira@gmail.com', '035f57cb03d4b781f36ba6981d4246e517ad9194d151d39292d7a78a99b0b3ae', 'karyawan', 'mengwi', '09739821873');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD UNIQUE KEY `kode_paket` (`kode_paket`),
  ADD UNIQUE KEY `kode_paket_2` (`kode_paket`),
  ADD UNIQUE KEY `kode_paket_3` (`kode_paket`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `fk_transaksi_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `fk_id_paket` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
