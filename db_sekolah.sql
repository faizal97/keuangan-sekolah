-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 06:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `pass_admin` varchar(128) NOT NULL,
  `status_admin` varchar(20) NOT NULL,
  `salt_admin` varchar(128) NOT NULL,
  `nama_depan` varchar(32) NOT NULL,
  `nama_belakang` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `user_admin`, `pass_admin`, `status_admin`, `salt_admin`, `nama_depan`, `nama_belakang`) VALUES
(11000001, 'faizal97', '5e35ef5200e19f1b8789ea37eafcc51243d7bcd6fbb03784152ff6c6f118707e794bac8107ba6c38ce4a05af92f9cc7d66c36cce86bf42d58cb06d018df48f39', 'Kepala Sekolah', 'ec3df1df55d8aad7a7804e7670cbeca6b858ab06fa1b2c1d9012d036bc1379916bc76215d3dac1b4aa90913bac9455e51d911dfbf4ec2cdf76aa3e761ac2ccfe', 'Faizal', 'Ardian Putra'),
(11000002, 'anisa96', '7152f86293de5895e2e5ab9f12fcc87fad221717dd389e606111bd1bbb626a0cb58a7dc4e6047849b56243094f519ec8af643188a44cc05075d7297a9316ce14', 'Tata Usaha', '5acd1ad0930d2fb6e396c2c0d1901a067e80cfd6f4b453f096bf4a3c4c5198995993ccc89a34ba14e97a20a83838c15c0e6095947778000c8d1f4b5885faab99', 'Anisa', 'Cahyani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya`
--

CREATE TABLE `tb_biaya` (
  `id_biaya` int(11) NOT NULL,
  `nama_biaya` varchar(30) NOT NULL,
  `jml_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `no_pendaftaran` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `sekolah_asal` varchar(30) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`no_pendaftaran`, `tahun_ajaran`, `nama_lengkap`, `agama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `telp`, `nama_wali`, `pekerjaan_wali`, `sekolah_asal`, `tahun_lulus`, `keterangan`) VALUES
(1800000002, 2018, 'Anisa Cahyani', 'Islam', 'Jakarta', '1996-06-06', 'Perempuan', 'Perumahan Wahana Pondok Gede Blok G1', '082111720294', 'Andi', 'PNS', 'SD 25 Pagi Jakarta', 2018, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `sekolah_asal` varchar(30) NOT NULL,
  `tahun_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_biaya` (`id_biaya`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nis` (`nis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_biaya`) REFERENCES `tb_biaya` (`id_biaya`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_pendaftaran` (`no_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
