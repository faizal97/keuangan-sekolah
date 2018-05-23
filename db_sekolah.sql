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
(11000001,'faizal97','5e35ef5200e19f1b8789ea37eafcc51243d7bcd6fbb03784152ff6c6f118707e794bac8107ba6c38ce4a05af92f9cc7d66c36cce86bf42d58cb06d018df48f39','Kepala Sekolah','ec3df1df55d8aad7a7804e7670cbeca6b858ab06fa1b2c1d9012d036bc1379916bc76215d3dac1b4aa90913bac9455e51d911dfbf4ec2cdf76aa3e761ac2ccfe','Faizal','Ardian Putra'),
(11000002,'anisa96','7152f86293de5895e2e5ab9f12fcc87fad221717dd389e606111bd1bbb626a0cb58a7dc4e6047849b56243094f519ec8af643188a44cc05075d7297a9316ce14','Tata Usaha','5acd1ad0930d2fb6e396c2c0d1901a067e80cfd6f4b453f096bf4a3c4c5198995993ccc89a34ba14e97a20a83838c15c0e6095947778000c8d1f4b5885faab99','Anisa','Cahyani'),
(11000003,'ae123','b6b69076bbfa627255911c5e945d485baa63a051f4e551eaad3a7d1d744c3e66ace003038c508b71663609c1b2a18a7c6a3f93c831dcbef71805ef7f59d8d1ea','Tata Usaha','95c11d85b9a7ff8fe488656af674c96c453e6194f14d01b8e3a0b8891e6dfe73a6f2bb5d7acbee3aad7140fb4c7e60a9f27b30e5f5f0ac4af601d459a565c471','Aldhan','Ernest');

/*Table structure for table `tb_biaya` */

DROP TABLE IF EXISTS `tb_biaya`;

CREATE TABLE `tb_biaya` (
  `id_biaya` int(11) NOT NULL,
  `nama_biaya` varchar(30) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_biaya` */

insert  into `tb_biaya`(`id_biaya`,`nama_biaya`,`jml_bayar`) values 
(11000001,'SPP',250000),
(11000002,'Uang Gedung',2500000),
(11000003,'Kegiatan',100000);

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

insert  into `tb_pembayaran`(`id_pembayaran`,`id_biaya`,`id_siswa`,`tgl_bayar`,`jml_bayar`) values 
(11000001,11000001,1800000001,'2018-04-15',250000),
(11000002,11000001,1800000001,'2018-04-15',250000),
(11000003,11000001,1800000001,'2018-04-15',250000),
(11000004,11000001,1800000001,'2018-04-15',250000),
(11000005,11000001,1800000001,'2018-04-15',250000),
(11000006,11000001,1800000001,'2018-04-01',250000);

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

insert  into `tb_pendaftaran`(`no_pendaftaran`,`tahun_ajaran`,`nama_lengkap`,`agama`,`tempat_lahir`,`tgl_lahir`,`jk`,`alamat`,`telp`,`nama_wali`,`pekerjaan_wali`,`sekolah_asal`,`tahun_lulus`,`keterangan`) values 
(1800000001,2018,'skdjfnsdkfn','Islam','kdjnf','1008-08-29','Laki-Laki','dnfkjsnkdfjnk','9879879879','josndkfjn','ksjdnfkjsdn','kjdfnksjdfn',2001,'LUNAS'),
(1800000002,2018,'nakdjfnkajfn','Islam','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001,'LUNAS'),
(1800000003,2018,'nakdjfnkajfn','Islam','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001,'LUNAS'),
(1800000004,2018,'nakdjfnkajfn','Islam','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001,'LUNAS'),
(1800000005,2018,'nakdjfnkajfn','Islam','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001,'LUNAS'),
(1800000006,2018,'nakdjfnkajfn','Islam','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001,'LUNAS');

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

insert  into `tb_siswa`(`id_siswa`,`nis`,`tahun_ajaran`,`nama_lengkap`,`tempat_lahir`,`tgl_lahir`,`jk`,`alamat`,`agama`,`telp`,`nama_wali`,`pekerjaan_wali`,`sekolah_asal`,`tahun_lulus`) values 
(1800000001,1800000001,2018,'Budi','kdjnf','1008-08-29','Laki-Laki','dnfkjsnkdfjnk','Islam','9879879879','josndkfjn','ksjdnfkjsdn','kjdfnksjdfn',2001),
(1800000002,1800000002,2018,'nakdjfnkajfn','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','Islam','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001),
(1800000003,1800000003,2018,'nakdjfnkajfn','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','Islam','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001),
(1800000004,1800000004,2018,'nakdjfnkajfn','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','Islam','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001),
(1800000006,1800000006,2018,'nakdjfnkajfn','jkdfnkjsdnfkjn','0000-00-00','Laki-Laki','osodfoskdfosn','Islam','09032823','asjfnijafni','aofniaenfijn','adfniwneifn',2001);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
