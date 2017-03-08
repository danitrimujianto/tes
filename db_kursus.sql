/*
SQLyog Ultimate v9.20 
MySQL - 5.5.5-10.1.19-MariaDB : Database - db_kursus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kursus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kursus`;

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id_course` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_course`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `course` */

insert  into `course`(`id_course`,`name`,`description`) values (1,'Kursus Mengemudi','Kursus mengemudi kami di bimbing oleh pemmbimbing yang bersertifikat dan terlatih. Murid bisa memilih kendaraan yang yang transmisi manual atau automatic.');

/*Table structure for table `instructors` */

DROP TABLE IF EXISTS `instructors`;

CREATE TABLE `instructors` (
  `id_instructor` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_instructor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `instructors` */

insert  into `instructors`(`id_instructor`,`name`,`gender`) values (1,'Sholeh','L'),(3,'Rani','P');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id_payment` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_trdocourse` int(11) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_payment`),
  UNIQUE KEY `NewIndex1` (`code`),
  KEY `FK_payments` (`id_trdocourse`),
  CONSTRAINT `FK_payments` FOREIGN KEY (`id_trdocourse`) REFERENCES `tr_docourse` (`id_trdocourse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`id_payment`,`id_trdocourse`,`code`,`amount`,`date`,`status`) values (1,1,'TRXJIMO01',500000,'2017-03-08 15:20:20','1');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id_students` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_students`),
  UNIQUE KEY `NewIndex1` (`name`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`id_students`,`name`,`email`,`password`,`gender`,`active`) values (3,'Dani','danitri33@gmail.com','d41d8cd98f00b204e9800998ecf8427e','L','1'),(4,'jos2','jos@gmail.com','d41d8cd98f00b204e9800998ecf8427e','L','1');

/*Table structure for table `tr_docourse` */

DROP TABLE IF EXISTS `tr_docourse`;

CREATE TABLE `tr_docourse` (
  `id_trdocourse` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` smallint(6) DEFAULT NULL,
  `id_students` smallint(6) DEFAULT NULL,
  `id_instructor` smallint(6) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_trdocourse`),
  KEY `FK_tr_docourse_course` (`id_course`),
  KEY `FK_tr_docourse_students` (`id_students`),
  KEY `FK_tr_docourse_instructor` (`id_instructor`),
  CONSTRAINT `FK_tr_docourse_course` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`),
  CONSTRAINT `FK_tr_docourse_instructor` FOREIGN KEY (`id_instructor`) REFERENCES `instructors` (`id_instructor`),
  CONSTRAINT `FK_tr_docourse_students` FOREIGN KEY (`id_students`) REFERENCES `students` (`id_students`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tr_docourse` */

insert  into `tr_docourse`(`id_trdocourse`,`id_course`,`id_students`,`id_instructor`,`date`) values (1,1,3,1,'2017-03-08 15:19:06');

/*Table structure for table `usermanager` */

DROP TABLE IF EXISTS `usermanager`;

CREATE TABLE `usermanager` (
  `id_usermanager` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_usermanager`),
  UNIQUE KEY `NewIndex1` (`username`,`pwd`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `usermanager` */

insert  into `usermanager`(`id_usermanager`,`nama`,`username`,`pwd`,`last_login`,`status`) values (1,'Administrator','admin','202cb962ac59075b964b07152d234b70','2017-03-08 17:40:53','1'),(2,'Dina','fauzi','202cb962ac59075b964b07152d234b70',NULL,'1'),(15,'bos','bos','024d7f84fff11dd7e8d9c510137a2381',NULL,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
