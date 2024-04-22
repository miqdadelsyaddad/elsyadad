-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 20, 2024 at 08:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `nohp` text NOT NULL,
  `admin_sandi` text NOT NULL,
  `admin_foto` varchar(80) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_nama`, `admin_email`, `nohp`, `admin_sandi`, `admin_foto`, `level`) VALUES
(60, 'admin', 'Admin', 'admin@gmail.com', '08942189412', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', '473d9c892dbf4c0460fdecbbc8bd321f.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `namapeminjam` varchar(90) NOT NULL,
  `warkah_id` int(11) NOT NULL,
  `nohak` varchar(100) NOT NULL,
  `tanggalpeminjaman` date NOT NULL,
  `namapetugas` varchar(90) NOT NULL,
  `statuspeminjaman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`idpeminjaman`, `namapeminjam`, `warkah_id`, `nohak`, `tanggalpeminjaman`, `namapetugas`, `statuspeminjaman`) VALUES
(1, 'Sugeng', 20, 'No. Reg. 018429/2024/Palembang', '2024-03-18', 'Sugeng', 'Belum Di Kembalikan'),
(2, 'Nina Jr', 21, 'No. Reg. 018429/2024/Lubuk Linggau', '2024-03-19', 'Alberto', 'Sudah Di Kembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `idpengembalian` int(11) NOT NULL,
  `idpeminjaman` int(11) NOT NULL,
  `tanggalpengembalian` date NOT NULL,
  `namapetugaspengembalian` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`idpengembalian`, `idpeminjaman`, `tanggalpengembalian`, `namapetugaspengembalian`) VALUES
(7, 2, '2024-03-19', 'Udin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `idkode` varchar(255) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `jeniskelamin` text NOT NULL,
  `alamat` text NOT NULL,
  `nohp` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_sandi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `idkode`, `user_nama`, `jeniskelamin`, `alamat`, `nohp`, `user_email`, `user_sandi`) VALUES
(894329481, '050412000011', 'Sugeng', 'Laki - Laki', 'Jl. Palembang', '0895182951', 'sugeng@gmail.com', '$2y$10$ZRLhAIxN1AjIJn1TBejtZOvqskQVqZeoKklwjUCFX4WOZMZQRcwiC'),
(894329497, '050412000012', 'Nina Jr', 'Perempuan', 'Jl. Palembang', '08512859122', 'nina@gmail.com', '$2y$10$KOrhNCiC1haY8LH.1R75C.TEVgvDnXDMQZTw1Jn2wuA5TFSTJM60q'),
(894329498, '050412000013', 'Risa', 'Perempuan', 'Jl. Palembang', '0859289521', 'risa@gmail.com', '$2y$10$JYUNbrnJEiYzpFf3BjfvZeOL3CjRHNGPpYbd8HRL9ypcz6VSWFmu.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warkah`
--

CREATE TABLE `tb_warkah` (
  `warkah_id` int(11) NOT NULL,
  `nowarkah` varchar(50) NOT NULL,
  `nohak` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jenis` varchar(70) NOT NULL,
  `namapemeganghak` varchar(90) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warkah`
--

INSERT INTO `tb_warkah` (`warkah_id`, `nowarkah`, `nohak`, `tahun`, `jenis`, `namapemeganghak`, `kecamatan`, `kota`) VALUES
(20, 'No. 095182/2024', 'No. Reg. 018429/2024/Palembang', 2024, 'Legal', 'Sugeng', 'Kalidoni', 'Palembang'),
(21, 'No. 095182/2023', 'No. Reg. 018429/2024/Lubuk Linggau', 2024, 'Legal', 'Yanto Spd', 'Meranti', 'Lubuk Linggau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`idpeminjaman`),
  ADD KEY `warkah_id` (`warkah_id`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`idpengembalian`),
  ADD KEY `idpeminjaman` (`idpeminjaman`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_warkah`
--
ALTER TABLE `tb_warkah`
  ADD PRIMARY KEY (`warkah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `idpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `idpengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894329499;

--
-- AUTO_INCREMENT for table `tb_warkah`
--
ALTER TABLE `tb_warkah`
  MODIFY `warkah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`warkah_id`) REFERENCES `tb_warkah` (`warkah_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`idpeminjaman`) REFERENCES `tb_peminjaman` (`idpeminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
