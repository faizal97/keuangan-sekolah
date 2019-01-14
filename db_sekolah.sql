/*
SQLyog Community v13.0.0 (32 bit)
MySQL - 10.1.31-MariaDB : Database - db_sekolah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sekolah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sekolah`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `pass_admin` varchar(128) NOT NULL,
  `status_admin` varchar(20) NOT NULL,
  `salt_admin` varchar(128) NOT NULL,
  `nama_depan` varchar(32) NOT NULL,
  `nama_belakang` varchar(32) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`user_admin`,`pass_admin`,`status_admin`,`salt_admin`,`nama_depan`,`nama_belakang`) values 
(11000001,'faizal97','f9368c9d6b1123d0a4552d72e00e4915b2c794b1ae24d80365967db74905700a8c4a49507d0b0c9b58315dca7d827f0995b91b4e6469b95ef8743897f9619d73','Kepala Sekolah','42c12307ced024cb6c079638b48eb2bdcb49fded2f063e71b075c6f395de8b488e5951d4fb5ce26ea4289cdf02729673c619bd75cb2a9798d845bc095e9a51e5','Faizal','Ardian Putra');

/*Table structure for table `tb_biaya` */

DROP TABLE IF EXISTS `tb_biaya`;

CREATE TABLE `tb_biaya` (
  `id_biaya` int(11) NOT NULL,
  `nama_biaya` varchar(30) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_biaya` */

/*Table structure for table `tb_pendaftaran` */

DROP TABLE IF EXISTS `tb_pendaftaran`;

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
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendaftaran` */

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

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
  `tahun_lulus` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `nis` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

/*Table structure for table `tb_pembayaran` */

DROP TABLE IF EXISTS `tb_pembayaran`;

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_biaya` (`id_biaya`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_biaya`) REFERENCES `tb_biaya` (`id_biaya`),
  CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pembayaran` */


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
