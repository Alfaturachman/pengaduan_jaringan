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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci3_diskominfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ci3_diskominfo`;

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(12) NOT NULL,
  `id_user` int DEFAULT NULL,
  `instansi_id` int NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `judul_pengaduan` varchar(255) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `no_telp_pengaduan` varchar(20) DEFAULT NULL,
  `alamat_pengaduan` text,
  `daerah_pengaduan` varchar(25) DEFAULT NULL,
  `status_pengaduan` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id`,`id_pelanggan`,`id_user`,`instansi_id`,`tgl_pengaduan`,`judul_pengaduan`,`isi_pengaduan`,`no_telp_pengaduan`,`alamat_pengaduan`,`daerah_pengaduan`,`status_pengaduan`) values 
(4,'7521680435',NULL,2,'2021-01-12 00:00:00','ubah pengaduan','tes ubah',NULL,NULL,NULL,2),
(9,'7521680439',NULL,2,'2021-01-23 00:00:00','Coba tambah data pengaduan','berikut adalah isi dari pengaduan instansi saya, tolong di proses secepatnya. Terima kasih\r\n',NULL,NULL,NULL,2),
(10,'7521680439',NULL,2,'2021-01-23 00:00:00','tes notif','notif baru uhuy',NULL,NULL,NULL,0),
(12,'7521680439',NULL,6,'2024-12-28 00:00:00','keluhan koneksi Wifi tidak stabil','tttttttttttttttttttt',NULL,NULL,NULL,0),
(30,'7521680439',2,6,'2024-12-30 15:15:12','kecepatan wifi yang lambat','REWTRWE','5463767','EWRTWRT','Semarang Tengah',0),
(31,'7521680439',NULL,6,'2024-12-30 15:15:32','Masalah WiFi Lemah di Area Tertentu','TWERT','54667','REWTWR',NULL,1),
(35,'7521680439',2,6,'2025-01-14 21:08:05','keluhan koneksi Wifi tidak stabil','fdsadfsa','08132772662','Jl Majapahit No.56','Semarang Barat',0);

/*Table structure for table `teknisi_upload` */

DROP TABLE IF EXISTS `teknisi_upload`;

CREATE TABLE `teknisi_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file_pengaduan` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

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
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama_instansi`,`email`,`alamat`,`no_hp`,`username`,`password`,`role_id`) values 
(1,'Hesty A.','','','08132772662','admin123','$2y$10$i4HD610v2o5HOxZXEC4G5eO.E.D0oVy/eKAohNku2EXZOOW4Y75pC',1),
(2,'Arif Budiman','instansi.pertama@gmail.com','Lhokseumawe','08132772662','hesty123','$2y$10$QO4ipamQMvPbBrFZcVD35ODxdUPYOoVYyqmwRbw5EgJhmSxW/3fEm',3),
(6,'Tito','tito@gmail.com','Jl Majapahit No.56','08132772662','tito123','$2y$10$AogxtiAHwOW7CjEzaCK7nOG1NOTHbTZ5v.vZrRymQfsODdgY3nRDO',2),
(7,'Alfaturachman','putra@gmail.com','jl sadffds','','ftudinus','$2y$10$gMHFA5/bM2e2FcBzuIvW/e3FnYe.P9ylHLM0nWK9GZhBECMoGyKZ6',3);

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
