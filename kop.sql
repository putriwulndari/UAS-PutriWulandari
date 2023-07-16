-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 06:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kop`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) CHARACTER SET latin1 NOT NULL,
  `pekerjaan` varchar(16) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `no_hp` char(20) CHARACTER SET latin1 NOT NULL,
  `entry` varchar(50) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `nama`, `nik`, `tgl_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `email`, `no_hp`, `entry`, `waktu`) VALUES
(1, 'rea', 'Evander Siregar', 2005112034, '2001-12-12', 'Laki-Laki', 'Mid Lane', 'Medan', 'test@gmail.com', '018203810238', '', '2022-05-23'),
(2, '0iq', 'Grand Zooey', 1238912391, '2001-12-12', 'Perempuan', 'Pro Player', 'Bandung Utara', 'actias@gmail.com', '018321820381', 'rea', '2022-05-23'),
(3, 'faisal', 'Faisal mubarok', 1023910293, '2001-12-12', 'Laki-Laki', 'Tidur', 'Belawan Sosa', 'test@gmail.com', '018203810238', '', '2022-05-23'),
(4, 'raja', 'Raja betmen', 12039120391, '2001-12-12', 'Laki-Laki', 'Baron', 'Medan', 'test@gmail.com', '018203810238', 'rea', '2020-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `jenissimpanan`
--

CREATE TABLE `jenissimpanan` (
  `kode_simpan` char(5) NOT NULL,
  `jenis_simpan` varchar(50) NOT NULL,
  `jlh_simpan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissimpanan`
--

INSERT INTO `jenissimpanan` (`kode_simpan`, `jenis_simpan`, `jlh_simpan`) VALUES
('xd01', 'pokok', 10000),
('xd02', 'wajib', 50000),
('xd03', 'sukarela', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jlh_ambil` double NOT NULL,
  `tgl_trx` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`no`, `username`, `jlh_ambil`, `tgl_trx`) VALUES
(1, '0iq', 20000, '2022-05-23'),
(2, 'faisal', 25000, '2022-05-23'),
(3, 'raja', 20000, '2020-05-23'),
(4, 'rea', 20000, '2022-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `kode_pinjam` char(5) NOT NULL,
  `jlh_pinjam` double NOT NULL,
  `entry` varchar(50) NOT NULL,
  `tgl_trx` date NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no`, `username`, `kode_pinjam`, `jlh_pinjam`, `entry`, `tgl_trx`, `ket`) VALUES
(5, 'rea', 'XP03', 500000, 'rea', '2022-05-23', 'Uang kuliah'),
(6, '0iq', 'XP03', 1000000, 'rea', '2022-05-23', 'Modal Usaha'),
(7, 'faisal', 'XP02', 500000, 'rea', '2022-05-23', 'UKT'),
(8, 'raja', 'XP02', 250000, 'rea', '2020-05-23', 'Modal Usaha'),
(9, 'rea', 'XP01', 25000, 'rea', '2022-05-27', 'Modal Usaha'),
(10, 'rea', 'XP01', 500000, 'rea', '2022-05-27', 'Modal Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `no` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `jenis_simpan` varchar(10) NOT NULL,
  `jlh_simpan` double NOT NULL,
  `entry` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_trx` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`no`, `username`, `jenis_simpan`, `jlh_simpan`, `entry`, `tgl_masuk`, `tgl_trx`) VALUES
(1, 'rea', 'pokok', 10000, '', '2022-05-23', '2022-05-23 13:56:59'),
(2, 'rea', 'wajib', 50000, 'rea', '2022-06-22', '2022-05-23 13:57:48'),
(3, 'rea', 'sukarela', 40000, 'rea', '2022-05-23', '2022-05-23 13:58:03'),
(4, '0iq', 'pokok', 10000, 'rea', '2022-05-23', '2022-05-23 13:59:46'),
(5, '0iq', 'wajib', 50000, 'rea', '2022-03-22', '2022-05-23 14:00:34'),
(6, '0iq', 'sukarela', 40000, 'rea', '2022-05-23', '2022-05-23 14:02:42'),
(7, 'faisal', 'pokok', 10000, '', '2022-05-23', '2022-05-23 15:58:36'),
(8, 'faisal', 'sukarela', 50000, 'rea', '2022-05-23', '2022-05-23 16:03:54'),
(9, 'faisal', 'wajib', 50000, 'rea', '2022-06-22', '2022-05-23 16:04:27'),
(10, 'raja', 'pokok', 10000, 'rea', '2022-05-23', '2020-05-23 16:43:05'),
(11, 'raja', 'wajib', 50000, 'rea', '2022-06-22', '2020-05-23 16:43:58'),
(12, 'raja', 'sukarela', 40000, 'rea', '2022-05-23', '2020-05-23 16:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `no` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jlh_tabungan` double NOT NULL,
  `jlh_sukarela` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`no`, `username`, `nama`, `tgl_mulai`, `jlh_tabungan`, `jlh_sukarela`) VALUES
(1, 'rea', 'Evander Siregar', '2022-05-23', 60000, 20000),
(2, '0iq', 'Grand Zooey', '2022-05-23', 60000, 20000),
(3, 'faisal', 'Faisal mubarok', '2022-05-23', 60000, 25000),
(4, 'raja', 'Raja betmen', '2020-05-23', 60000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `entry` varchar(50) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `entry`, `akses`, `status`) VALUES
(1, 'rea', '202cb962ac59075b964b07152d234b70', '', 'admin', 'aktif'),
(2, '0iq', '202cb962ac59075b964b07152d234b70', 'rea', 'cs', 'aktif'),
(3, 'faisal', '202cb962ac59075b964b07152d234b70', '', 'member', 'aktif'),
(4, 'raja', '202cb962ac59075b964b07152d234b70', 'rea', 'member', 'nonaktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  ADD UNIQUE KEY `kode_jenis_simpan` (`kode_simpan`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
