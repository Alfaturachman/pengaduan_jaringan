/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 8.0.30 : Database - ci3_diskominfo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci3_diskominfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ci3_diskominfo`;

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instansi_id` int NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `judul_pengaduan` varchar(255) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `no_telp_pengaduan` varchar(20) DEFAULT NULL,
  `alamat_pengaduan` text,
  `status_pengaduan` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id`,`instansi_id`,`tgl_pengaduan`,`judul_pengaduan`,`isi_pengaduan`,`no_telp_pengaduan`,`alamat_pengaduan`,`status_pengaduan`) values 
(4,2,'2021-01-12 00:00:00','ubah pengaduan','tes ubah',NULL,NULL,2),
(9,2,'2021-01-23 00:00:00','Coba tambah data pengaduan','berikut adalah isi dari pengaduan instansi saya, tolong di proses secepatnya. Terima kasih\r\n',NULL,NULL,2),
(10,2,'2021-01-23 00:00:00','tes notif','notif baru uhuy',NULL,NULL,0),
(12,6,'2024-12-28 00:00:00','keluhan koneksi Wifi tidak stabil','tttttttttttttttttttt',NULL,NULL,0),
(30,6,'2024-12-30 15:15:12','kecepatan wifi yang lambat','REWTRWE','5463767','EWRTWRT',0),
(31,6,'2024-12-30 15:15:32','Masalah WiFi Lemah di Area Tertentu','TWERT','54667','REWTWR',1);

/*Table structure for table `teknisi_upload` */

DROP TABLE IF EXISTS `teknisi_upload`;

CREATE TABLE `teknisi_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file_pengaduan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teknisi_upload` */

insert  into `teknisi_upload`(`id`,`id_pengaduan`,`keterangan`,`file_pengaduan`) values 
(1,31,'etytrey','1735547773_icon_red_-_Copy.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama_instansi`,`email`,`alamat`,`username`,`password`,`role_id`) values 
(1,'Hesty A.','','','admin123','$2y$10$i4HD610v2o5HOxZXEC4G5eO.E.D0oVy/eKAohNku2EXZOOW4Y75pC',1),
(2,'Instansi A','instansi.pertama@gmail.com','Lhokseumawe','hesty123','$2y$10$QO4ipamQMvPbBrFZcVD35ODxdUPYOoVYyqmwRbw5EgJhmSxW/3fEm',3),
(6,'Tito','tito@gmail.com','Jl Majapahit No.56','tito123','$2y$10$AogxtiAHwOW7CjEzaCK7nOG1NOTHbTZ5v.vZrRymQfsODdgY3nRDO',2);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Admin'),
(2,'User'),
(3,'Teknisi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
