-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 12:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ptba`
--

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` int(5) NOT NULL,
  `jumlah_gerbong` varchar(50) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `jumlah_gerbong`, `tujuan`) VALUES
(1, '102', 'PRABUMULIH'),
(2, '20', 'PALEMBANG'),
(4, '1', 'TARAHAN');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `no_pegawai` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('AKTIF','TIDAK AKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `no_pegawai`, `nama`, `jabatan`, `alamat`, `status`) VALUES
(1, '1144096', 'Nava Gia Ginasta', 'Direktur', 'Bandung', 'AKTIF'),
(2, '12345', 'agus1', 'direktur1', 'bandung1', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `rcd`
--

CREATE TABLE `rcd` (
  `id_rcd` int(5) NOT NULL,
  `no_dok` varchar(50) NOT NULL,
  `pembongkaran_ke` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `singgah`
--

CREATE TABLE `singgah` (
  `id_singgah` int(5) NOT NULL,
  `nama_singgah` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` enum('SAMPAI','BELUM') NOT NULL DEFAULT 'SAMPAI',
  `id_surat_angkut` int(5) NOT NULL,
  `nama_stasiun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singgah`
--

INSERT INTO `singgah` (`id_singgah`, `nama_singgah`, `waktu`, `status`, `id_surat_angkut`, `nama_stasiun`) VALUES
(4, '1212', '2017-07-08 00:00:00', 'SAMPAI', 2, '0'),
(5, 'Stasiun 1', '0000-00-00 00:00:00', 'BELUM', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE `stasiun` (
  `id_stasiun` int(5) NOT NULL,
  `nama_stasiun` varchar(100) NOT NULL,
  `id_kereta` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `jarak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun`
--

INSERT INTO `stasiun` (`id_stasiun`, `nama_stasiun`, `id_kereta`, `id_pegawai`, `jarak`) VALUES
(1, '', 2, 1, '20km');

-- --------------------------------------------------------

--
-- Table structure for table `surat_angkut`
--

CREATE TABLE `surat_angkut` (
  `id_surat_angkut` int(5) NOT NULL,
  `no_surat_angkut` varchar(50) NOT NULL,
  `pengisian_ke` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_angkut`
--

INSERT INTO `surat_angkut` (`id_surat_angkut`, `no_surat_angkut`, `pengisian_ke`, `id_pegawai`, `tujuan`) VALUES
(3, '1234', 1, 1, 'PRABUMULIH'),
(4, 'sr123', 0, 1, 'PRABUMULIH');

-- --------------------------------------------------------

--
-- Table structure for table `tls`
--

CREATE TABLE `tls` (
  `id_tls` int(5) NOT NULL,
  `no_dok` varchar(50) NOT NULL,
  `no_surat_angkut` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_tonase` int(10) NOT NULL,
  `no_gerbong` int(10) NOT NULL,
  `pengisian_ke` int(5) NOT NULL,
  `jenis_batubara` varchar(100) NOT NULL,
  `id_kereta` int(5) NOT NULL,
  `posisi` enum('TANJUNG ENIM','MUARA ENIM','PALEMBANG','TARAHAN') NOT NULL DEFAULT 'TANJUNG ENIM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tls`
--

INSERT INTO `tls` (`id_tls`, `no_dok`, `no_surat_angkut`, `tanggal`, `jumlah_tonase`, `no_gerbong`, `pengisian_ke`, `jenis_batubara`, `id_kereta`, `posisi`) VALUES
(1, 'DOK/1/1', '', '2017-07-08', 50, 12345, 1, 'abc', 1, 'TARAHAN'),
(5, '1213', '', '2017-07-21', 50, 56789, 3, '21', 1, 'TARAHAN'),
(6, 'Dok/12/12', '', '2017-07-12', 50, 14, 2, 'ABCD', 1, 'TANJUNG ENIM'),
(8, 'D99', 'sr123', '2017-08-06', 3000, 99, 2, 'antrasit', 2, 'TARAHAN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hak_akses` enum('ADMIN','PEGAWAI PT.BA','PEGAWAI KAI','MANAJER') NOT NULL DEFAULT 'ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `jabatan`, `alamat`, `hak_akses`) VALUES
(1, 'azmi2', 'azmi', '2251df3b7a7c55657526155222d2743a', 'lord mah bebas', 'Bandung', 'ADMIN'),
(6, 'nava', 'nava', '533078acd91fffef2a525239de4a3dc9', 'Direktur', 'Bandung', 'PEGAWAI KAI'),
(7, 'PT.BA', 'ptba', '2169c4ba7c5779e0075ee80a998d8ec8', 'PT.BA', 'Palembang', 'PEGAWAI PT.BA'),
(8, 'Manajer', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'Manajer', 'Bandung', 'MANAJER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `rcd`
--
ALTER TABLE `rcd`
  ADD PRIMARY KEY (`id_rcd`);

--
-- Indexes for table `singgah`
--
ALTER TABLE `singgah`
  ADD PRIMARY KEY (`id_singgah`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- Indexes for table `surat_angkut`
--
ALTER TABLE `surat_angkut`
  ADD PRIMARY KEY (`id_surat_angkut`);

--
-- Indexes for table `tls`
--
ALTER TABLE `tls`
  ADD PRIMARY KEY (`id_tls`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_kereta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rcd`
--
ALTER TABLE `rcd`
  MODIFY `id_rcd` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `singgah`
--
ALTER TABLE `singgah`
  MODIFY `id_singgah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id_stasiun` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_angkut`
--
ALTER TABLE `surat_angkut`
  MODIFY `id_surat_angkut` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tls`
--
ALTER TABLE `tls`
  MODIFY `id_tls` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
