/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - db_studio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_studio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_studio`;

/*Table structure for table `galery` */

DROP TABLE IF EXISTS `galery`;

CREATE TABLE `galery` (
  `id_galery` int NOT NULL AUTO_INCREMENT,
  `foto_galery` text NOT NULL,
  PRIMARY KEY (`id_galery`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `galery` */

insert  into `galery`(`id_galery`,`foto_galery`) values 
(16,'uploud/_8.jpg'),
(17,'uploud/_10.jpg'),
(18,'uploud/_5.jpg'),
(19,'uploud/_6.jpg'),
(20,'uploud/_7.jpg'),
(21,'uploud/_9.jpg');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `kd_karyawan` char(7) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(32) DEFAULT NULL,
  `bidang_kerja` varchar(50) DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`kd_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `karyawan` */

insert  into `karyawan`(`kd_karyawan`,`nama_karyawan`,`alamat`,`no_hp`,`bidang_kerja`,`level`) values 
('KR001','Armen','Padang Panjang','08213465343','Fotografer',NULL),
('KR002','Fito','Padang Panjang','08123445677','VidioGrafer',NULL),
('KR003','Nisa','Balai-balai','089754423','Design',NULL);

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` char(10) NOT NULL,
  `nama_paket` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `ket_paket` text NOT NULL,
  `foto_paket` varchar(200) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `paket` */

insert  into `paket`(`id_paket`,`nama_paket`,`harga`,`ket_paket`,`foto_paket`) values 
('PK001','SILVER PACKAGES',2000000,'Foto NIkah & Resepsi,Foto 4R 100 Pcs,Foto 30x30 1 Pcs, Foto 20R + Frame ,Unlimited Foto ,Album 10 Sheet','uploud/PK001.jpg'),
('PK002','GOLD PACKAGES',3000000,'Foto NIkah & Resepsi,Foto 4R 200 Pcs,Foto 30x30 1 Pcs, Foto 20R + Frame 2 Pcs ,Foto 16 R Unlimited Foto ,Album 15 Sheet','uploud/PK002.jpg'),
('PK003','PLATINUM PACKAGES',4500000,'Foto NIkah & Resepsi,Foto 4R 250 Pcs,Foto 30x30 1 Pcs, Foto 20R + Frame ,Unlimited Foto ,Album 10 Sheet video cinema 1 menit ,','uploud/PK003.jpeg'),
('PK004','FOTO PRODUK',1500000,'20 Produk Masing Masing 4-5 Foto sudah diedit,20 Stori Sosial Media ','uploud/PK004.jpg');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `idmember` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `curent_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`idmember`,`user_name`,`email`,`alamat`,`telp`,`user_password`,`curent_time`) values 
(10,'Wahyu','wahyu@gmail.com','Padang Panjang','0876543212','$2y$10$RpzV2n/LsFJtjXWLLNiVdeLRCtCnBIOCJOPugV/XXFGFwTNGeH11G','2024-08-01 11:36:19'),
(12,'Jaka','Jaka@gmail.com','Padang Panjang','08986765453','$2y$10$fObdQTWkJVap8rG5BKm7huZTZn06O8L2M9j0WIwMd/bnOPeKVhHF6','2024-08-01 19:25:25'),
(14,'Joko','joko@gmail.com','padang panjang','0886576354','$2y$10$UPosGarXxVqm6r/3vQCze.xewk2niCQj5xvnEq50QwoejP4Vzi.Wm','2024-08-02 23:44:38'),
(15,'Azhuar','azhuar@gmail.com','Koto Baru','0834235245','$2y$10$DvemXxtc6IivDE9RYpBvFeVzL.1i2PrmgnBjF3gdMho/ImUwLCC6y','2024-08-02 23:58:06'),
(16,'Ilham','ilham@gmail.com','Balai-balai','08312312423','$2y$10$bXbSQanDSzRxjnK5rii5UO1nigNzABSQDUhHU42gRuw6Fs/K0QTOK','2024-08-03 00:01:03'),
(17,'Agil','agil@gmail.com','Paninjauan','0871231531','$2y$10$OpYtYUMH8c0o03k5YI9x5ejK07JJqQ1Au2qIR5/fXIcsom.8Mw6PW','2024-08-03 08:23:09'),
(18,'Putra','putra@gmail.com','Koto Panjang','087564534212','$2y$10$h6/lIvazj10qESsSbxxVhOUUI9bcXu0wAzV5zpx9JGz967pE0ElIq','2024-08-03 08:31:20'),
(19,'Sarah','sarah@gmail.com','Koto Baru','08986765453','$2y$10$/bgA3uDXV1ObYsna7TrN/uaUxVxJ4TclEjdTGqI9zs6oGHfkGl8.O','2024-08-03 12:20:16');

/*Table structure for table `pembatalan` */

DROP TABLE IF EXISTS `pembatalan`;

CREATE TABLE `pembatalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice` (`invoice`),
  CONSTRAINT `pembatalan_ibfk_1` FOREIGN KEY (`invoice`) REFERENCES `pemesanan` (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembatalan` */

insert  into `pembatalan`(`id`,`invoice`,`alasan`) values 
(1,'INV-0208240002','tes');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_member` int DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `rek_pelanggan` varchar(100) DEFAULT NULL,
  `bukti_tf` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelanggan` (`id_member`),
  KEY `invoice` (`invoice`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `pelanggan` (`idmember`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`invoice`) REFERENCES `pemesanan` (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`invoice`,`id_member`,`nama_pengirim`,`rek_pelanggan`,`bukti_tf`) values 
(6,'INV-0208240001',10,'Budiman','4334366','bukti/INV-0208240001_2.png'),
(7,'INV-0208240002',10,'Budiman','63412441','bukti/INV-0208240002_1.png'),
(8,'INV-0208240003',10,'Budiman','63412441','bukti/INV-0208240003.png'),
(9,'INV-0208240004',14,'Joko','0856765675','bukti/INV-0208240004_1.png'),
(10,'INV-0208240005',15,'Azhuar','12423546657','bukti/INV-0208240005.jpg'),
(11,'INV-0208240006',16,'Ilham','6563452342','bukti/INV-0208240006.jpeg'),
(12,'INV-0308240001',17,'Agil','0987654432123','bukti/INV-0308240001.png'),
(13,'INV-0308240002',18,'Putra','07968574352','bukti/INV-0308240002.jpg'),
(14,'INV-0308240003',NULL,'Agil','0987654432123','bukti/INV-0308240003.png'),
(15,'INV-0308240004',NULL,'Agil','089765454756','bukti/INV-0308240004.png'),
(16,'INV-0308240006',NULL,'Agil','089765454756','bukti/INV-0308240006.png'),
(17,'INV-0308240007',NULL,'Agil','089765454756','bukti/INV-0308240007.png'),
(18,'INV-0308240008',NULL,'Agil','0987654432123','bukti/INV-0308240008.png'),
(19,'INV-0308240009',NULL,'Agil','089765454756','bukti/INV-0308240009.png'),
(20,'INV-0308240010',NULL,'Agil','0987654432123','bukti/INV-0308240010.png'),
(21,'INV-0308240011',NULL,'Agil','0987654432123','bukti/INV-0308240011.png'),
(22,'INV-0308240012',NULL,'Sarah','0987654432123','bukti/INV-0308240012.png'),
(23,'INV-0308240013',NULL,'Sarah','0987654432123','bukti/INV-0308240013.png'),
(24,'INV-0308240014',NULL,'Sarah','0987654432123','bukti/INV-0308240014.png'),
(25,'INV-0308240015',NULL,'Sarah','54543659989879','bukti/INV-0308240015.png'),
(26,'INV-0308240005',NULL,'Agil','0987654432123','bukti/INV-0308240005.jpg');

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pemesanan` char(20) NOT NULL,
  `id_member` int NOT NULL,
  `nama_member` varchar(100) DEFAULT NULL,
  `id_paket` char(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ttl_bayar` double DEFAULT NULL,
  `sisa_bayar` double DEFAULT NULL,
  `tgl_trx` date DEFAULT NULL,
  `stts_trx` varchar(50) DEFAULT NULL,
  `tgl_take` date DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_member` (`id_member`),
  KEY `id_paket` (`id_paket`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `pelanggan` (`idmember`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id_pemesanan`,`id_member`,`nama_member`,`id_paket`,`nama_paket`,`ttl_bayar`,`sisa_bayar`,`tgl_trx`,`stts_trx`,`tgl_take`,`jam`,`catatan`) values 
('INV-0208240001',10,'Wahyu','PK004','FOTO PRODUK',1500000,0,'2024-08-02','PEMBAYARAN DIKONFIRMASI','2024-08-03','09:00','tes'),
('INV-0208240002',10,'Wahyu','PK003','PLATINUM PACKAGES',4500000,0,'2024-08-02','PEMBAYARAN DIBATALKAN','2024-08-04','11:00','tes'),
('INV-0208240003',10,'Wahyu','PK001','SILVER PACKAGES',2000000,0,'2024-08-02','PEMBAYARAN DIKONFIRMASI','2024-08-02','18:00','GJHfgdshgf'),
('INV-0208240004',14,'Joko','PK002','GOLD PACKAGES',3000000,0,'2024-08-02','PEMBAYARAN DIKONFIRMASI','2024-08-05','07:00','Padang Panjang'),
('INV-0208240005',15,'Azhuar','PK002','GOLD PACKAGES',3000000,0,'2024-08-02','PEMBAYARAN DIKONFIRMASI','2024-08-06','08:00','Koto Baru'),
('INV-0208240006',16,'Ilham','PK001','SILVER PACKAGES',2000000,0,'2024-08-02','PEMBAYARAN DIKONFIRMASI','2024-08-07','08:00','Balai-balai'),
('INV-0308240001',17,'Agil','PK004','FOTO PRODUK',1500000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-08','08:00','Paninjauan'),
('INV-0308240002',18,'Putra','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-09','08:00','Koto Panjang'),
('INV-0308240003',17,'Agil','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-10','08:00','Dgsafsdgs'),
('INV-0308240004',17,'Agil','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-11','11:00','xgeyf'),
('INV-0308240005',17,'Agil','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-12','07:00','HYDGsf'),
('INV-0308240006',17,'Agil','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-13','08:00','gfdf'),
('INV-0308240007',17,'Agil','PK001','SILVER PACKAGES',600000,1400000,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-14','07:00','Padang'),
('INV-0308240008',17,'Agil','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-15','09:00','hygf'),
('INV-0308240009',17,'Agil','PK003','PLATINUM PACKAGES',4500000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-16','14:00','jgfgs'),
('INV-0308240010',17,'Agil','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-17','09:00','AABCC'),
('INV-0308240011',17,'Agil','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-18','14:00','abcd'),
('INV-0308240012',19,'Sarah','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-19','07:00','gyftyd'),
('INV-0308240013',19,'Sarah','PK001','SILVER PACKAGES',2000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-20','07:00','ywryerr'),
('INV-0308240014',19,'Sarah','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-21','07:00','freyr'),
('INV-0308240015',19,'Sarah','PK002','GOLD PACKAGES',3000000,0,'2024-08-03','PEMBAYARAN DIKONFIRMASI','2024-08-22','07:00','reurt');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` char(50) NOT NULL,
  `usernama` varchar(100) DEFAULT NULL,
  `userpassword` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `userLevelId` int DEFAULT NULL,
  `userLevelName` char(10) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `users` */

insert  into `users`(`userid`,`usernama`,`userpassword`,`fullname`,`userLevelId`,`userLevelName`) values 
('K001','Karyawan','$2y$10$JnbLc9bCOtaJeEECikgn4OCiTcGv.2vC16bIHCGDE2gayCjInKNI.','RANDIKA',3,'KARYAWAN'),
('K002','Admin','$2y$10$JnbLc9bCOtaJeEECikgn4OCiTcGv.2vC16bIHCGDE2gayCjInKNI.','ILHAM MUIN',1,'ADMIN'),
('K003','Pemilik','$2y$10$JnbLc9bCOtaJeEECikgn4OCiTcGv.2vC16bIHCGDE2gayCjInKNI.','novrii',2,'PEMILIK ST');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
