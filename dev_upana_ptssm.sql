-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2019 at 03:17 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.3.6-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_upana_ptssm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ac`
--

CREATE TABLE `data_ac` (
  `id` varchar(25) NOT NULL,
  `customer_id` varchar(25) NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `tipe` enum('','1','2') DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `iat` datetime DEFAULT CURRENT_TIMESTAMP,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ac`
--

INSERT INTO `data_ac` (`id`, `customer_id`, `nama`, `tipe`, `merk`, `iat`, `uat`) VALUES
('001070619-001', '001070619', 'AC Split Daikin 1/2 PK', '2', 'Daikin', '2019-06-11 03:09:19', '2019-06-10 19:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tipe` enum('','1','2') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `iat` datetime DEFAULT CURRENT_TIMESTAMP,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id`, `nama`, `telepon`, `alamat`, `tipe`, `email`, `iat`, `uat`) VALUES
('001070619', 'Bpk. Hendi', '08514532289', 'Jl. Poros Malino, Komplek Griya Riski Abadi C7', '1', NULL, '2019-06-07 21:42:20', '2019-06-12 12:01:47'),
('002070619', 'tessa', '543', 'sac', '2', NULL, '2019-06-07 21:54:16', '2019-06-12 12:02:01'),
('003120619', 'tes', '082108210821', 'teasdc', '2', NULL, '2019-06-12 19:50:14', '2019-06-12 11:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `data_invoice_masuk`
--

CREATE TABLE `data_invoice_masuk` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `alamat` varchar(75) DEFAULT NULL,
  `npwp_supplier` varchar(25) DEFAULT NULL,
  `status` enum('','0','1') DEFAULT NULL,
  `gudang` enum('','1','2') DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_invoice_masuk`
--

INSERT INTO `data_invoice_masuk` (`id`, `no_invoice`, `tanggal`, `nama_supplier`, `telepon`, `email`, `alamat`, `npwp_supplier`, `status`, `gudang`, `subtotal`, `ppn`, `total`) VALUES
(14, '12345', '2019-06-11', 'tes', '123', 'email@gmail.com', 'alamat', 'npwp', '1', '2', 2750000, 10, 3025000),
(15, '1253', '2019-06-22', 'sadf', '12', 'asd@asd.com', 'asdf', 'sadf', '0', '2', 20, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `data_invoice_masuk_list_barang`
--

CREATE TABLE `data_invoice_masuk_list_barang` (
  `id` int(11) NOT NULL,
  `no_invoice_data_invoice_masuk` varchar(25) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `jumlah` smallint(3) DEFAULT NULL,
  `satuan` tinyint(1) DEFAULT NULL,
  `harga_jual` int(8) DEFAULT NULL,
  `potongan_harga` varchar(255) DEFAULT NULL,
  `total_harga` int(8) DEFAULT NULL,
  `proses` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_invoice_masuk_list_barang`
--

INSERT INTO `data_invoice_masuk_list_barang` (`id`, `no_invoice_data_invoice_masuk`, `nama`, `kode`, `jumlah`, `satuan`, `harga_jual`, `potongan_harga`, `total_harga`, `proses`) VALUES
(6, '12345', '1234', '1234', 3, 1, 2750000, '0', 2750000, 1),
(7, '1253', 'asdf', 'asdc', 10, 0, 2, '0', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_invoice_masuk_list_barang_serial`
--

CREATE TABLE `data_invoice_masuk_list_barang_serial` (
  `id` int(255) NOT NULL,
  `kode_list_barang` varchar(10) DEFAULT NULL,
  `serial` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_invoice_masuk_list_barang_serial`
--

INSERT INTO `data_invoice_masuk_list_barang_serial` (`id`, `kode_list_barang`, `serial`) VALUES
(1, '1234', '123'),
(2, '1234', ''),
(3, '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_riwayat_pekerjaan`
--

CREATE TABLE `data_riwayat_pekerjaan` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(25) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `nomor_spk` varchar(25) DEFAULT NULL,
  `jenis_spk` varchar(25) DEFAULT NULL,
  `kepuasan` enum('','0','1') DEFAULT NULL,
  `status` enum('','0','1') DEFAULT NULL,
  `iat` datetime DEFAULT CURRENT_TIMESTAMP,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_riwayat_pekerjaan`
--

INSERT INTO `data_riwayat_pekerjaan` (`id`, `customer_id`, `mulai`, `selesai`, `nomor_spk`, `jenis_spk`, `kepuasan`, `status`, `iat`, `uat`) VALUES
(1, '001070619', '2019-06-08', '2019-06-12', '123', 'wew', '0', '0', '2019-06-11 03:14:23', '2019-06-10 19:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `data_spk_pemasangan`
--

CREATE TABLE `data_spk_pemasangan` (
  `id` int(11) NOT NULL,
  `tipe_pajak` enum('','1','2') DEFAULT NULL,
  `no_spk` varchar(35) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `waktu_pengerjaan` timestamp NULL DEFAULT NULL,
  `catatan` text,
  `status` enum('','0','1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_spk_pemasangan`
--

INSERT INTO `data_spk_pemasangan` (`id`, `tipe_pajak`, `no_spk`, `tanggal`, `nama_pelanggan`, `telepon`, `email`, `alamat`, `waktu_pengerjaan`, `catatan`, `status`) VALUES
(6, '1', '1234', '2018-06-16', '003120619', '082108210821', '', 'teasdc', '0000-00-00 00:00:00', 'wew', '3');

-- --------------------------------------------------------

--
-- Table structure for table `data_spk_pemasangan_item`
--

CREATE TABLE `data_spk_pemasangan_item` (
  `id` int(11) NOT NULL,
  `no_spk` varchar(35) DEFAULT NULL,
  `kode` varchar(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(9) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_spk_pemasangan_item`
--

INSERT INTO `data_spk_pemasangan_item` (`id`, `no_spk`, `kode`, `nama`, `jumlah`, `keterangan`) VALUES
(10, '1234', '32', 'qwerty', 2, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `master_stock`
--

CREATE TABLE `master_stock` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stock` int(5) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `btu` int(5) DEFAULT NULL,
  `kategori` enum('','unit','material','sparepart','jasa') NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `tipe_gudang` enum('','1','2') NOT NULL,
  `daya_listrik` int(5) DEFAULT NULL,
  `keterangan` text,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_stock`
--

INSERT INTO `master_stock` (`id`, `kode`, `nama`, `stock`, `merk`, `btu`, `kategori`, `satuan`, `tipe`, `tipe_gudang`, `daya_listrik`, `keterangan`, `gambar`) VALUES
(68, '32', 'qwerty', 2, '2312', 2343, 'sparepart', 'mil', '23', '2', 23, 'asdccd', 'male_teacher.png'),
(70, '33', 'afd', 2, '2312', 2343, 'sparepart', 'mil', '23', '1', 23, 'asdccd', 'male_teacher.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accesstype` enum('','master','finance','gudang','hrd','kantor','teknisi') CHARACTER SET utf8 NOT NULL,
  `telepon` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iat` datetime DEFAULT CURRENT_TIMESTAMP,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `accesstype`, `telepon`, `iat`, `uat`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'master', NULL, '2019-06-06 00:00:00', '2019-06-17 04:51:23'),
(3, 'finance', 'finance@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'finance', NULL, '2019-06-06 00:00:00', '2019-06-06 11:12:14'),
(2, 'kantor', 'kantor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'kantor', NULL, '2019-06-06 00:00:00', '2019-06-06 11:12:14'),
(4, 'hrd', 'hrd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'hrd', NULL, '2019-06-06 00:00:00', '2019-06-06 11:12:14'),
(5, 'gudang', 'gudang@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'gudang', NULL, '2019-06-06 00:00:00', '2019-06-06 11:12:14'),
(21, 'teknisi', 'teknisi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'teknisi', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ac`
--
ALTER TABLE `data_ac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_invoice_masuk`
--
ALTER TABLE `data_invoice_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_invoice_masuk_list_barang`
--
ALTER TABLE `data_invoice_masuk_list_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_invoice_masuk_list_barang_serial`
--
ALTER TABLE `data_invoice_masuk_list_barang_serial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_riwayat_pekerjaan`
--
ALTER TABLE `data_riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_spk_pemasangan`
--
ALTER TABLE `data_spk_pemasangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_spk_pemasangan_item`
--
ALTER TABLE `data_spk_pemasangan_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_stock`
--
ALTER TABLE `master_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_name_nps_unique` (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_invoice_masuk`
--
ALTER TABLE `data_invoice_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data_invoice_masuk_list_barang`
--
ALTER TABLE `data_invoice_masuk_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_invoice_masuk_list_barang_serial`
--
ALTER TABLE `data_invoice_masuk_list_barang_serial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_riwayat_pekerjaan`
--
ALTER TABLE `data_riwayat_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_spk_pemasangan`
--
ALTER TABLE `data_spk_pemasangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_spk_pemasangan_item`
--
ALTER TABLE `data_spk_pemasangan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `master_stock`
--
ALTER TABLE `master_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
