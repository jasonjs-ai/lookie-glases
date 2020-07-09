/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - effendi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`effendi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `effendi`;

/*Table structure for table `tb_config` */

DROP TABLE IF EXISTS `tb_config`;

CREATE TABLE `tb_config` (
  `config_id` int(9) NOT NULL AUTO_INCREMENT,
  `config_code` varchar(50) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(50) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  KEY `USER_CREATED` (`created_by`),
  KEY `USER_MODIFIED` (`modified_by`),
  KEY `CONFIG_CODE` (`config_code`),
  CONSTRAINT `chozy_config_user_created` FOREIGN KEY (`created_by`) REFERENCES `tb_user` (`username`),
  CONSTRAINT `chozy_config_user_modified` FOREIGN KEY (`modified_by`) REFERENCES `tb_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_config` */

insert  into `tb_config`(`config_id`,`config_code`,`config_name`,`config_value`,`is_show`,`created_by`,`created_date`,`modified_by`,`modified_date`,`is_active`,`is_delete`,`keterangan`) values 
(1,'SOFTWARE_DEVELOPER','Software Developer Names','Effendi',1,'system','2019-01-24 01:01:47','system','2019-01-24 01:01:47',1,0,NULL),
(2,'APP_NAME','Application Name','Glasses Virtual Try On',1,'system','2019-01-24 01:03:02','system','2019-01-24 01:03:02',1,0,NULL),
(3,'COMPANY_NAME','Company Name','Optic',1,'system','2019-01-24 01:03:58','admin','2020-06-20 20:23:55',1,0,NULL),
(4,'VERSION','Version Of Software','1.0',1,'system','2019-01-24 01:04:22','system','2019-01-24 01:04:22',1,0,NULL),
(5,'LOGO','Logo','logo.png',1,'system','2020-04-29 07:19:47','admin','2020-06-20 20:23:55',1,0,NULL),
(6,'ADDRESS','Alamat','Jl. Tidar No.34, Sawahan, Kec. Sawahan, Kota SBY, Jawa Timur 60251',1,'system','2020-04-29 08:25:30','admin','2020-06-20 20:23:55',1,0,NULL),
(7,'PHONE','Phone','(031) 5315415',1,'system','2020-04-29 08:25:53','admin','2020-06-20 20:23:55',1,0,NULL),
(8,'EMAIL','Email','cs@whitlingoptic.com',1,'system','2020-04-29 08:26:15','admin','2020-06-20 20:23:55',1,0,NULL);

/*Table structure for table `tb_glasses` */

DROP TABLE IF EXISTS `tb_glasses`;

CREATE TABLE `tb_glasses` (
  `glasses_id` int(9) NOT NULL AUTO_INCREMENT,
  `glasses_code` varchar(50) NOT NULL,
  `glasses_name` varchar(300) NOT NULL,
  `front_image` varchar(255) NOT NULL,
  `left_image` varchar(255) NOT NULL,
  `right_image` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`glasses_id`),
  KEY `GLASSES_CODE` (`glasses_code`),
  KEY `GLASSES_NAME` (`glasses_name`),
  KEY `tb_glasses_user_created` (`created_by`),
  KEY `tb_glasses_user_modified` (`modified_by`),
  CONSTRAINT `tb_glasses_user_created` FOREIGN KEY (`created_by`) REFERENCES `tb_user` (`username`),
  CONSTRAINT `tb_glasses_user_modified` FOREIGN KEY (`modified_by`) REFERENCES `tb_user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_glasses` */

/*Table structure for table `tb_level` */

DROP TABLE IF EXISTS `tb_level`;

CREATE TABLE `tb_level` (
  `level_id` int(9) NOT NULL AUTO_INCREMENT,
  `level_code` varchar(50) NOT NULL,
  `level_name` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`level_id`),
  KEY `USER_CREATED` (`created_by`),
  KEY `USER_MODIFIED` (`modified_by`),
  KEY `LEVEL_CODE` (`level_code`),
  KEY `LEVEL_NAME` (`level_name`),
  CONSTRAINT `chozy_level_user_created` FOREIGN KEY (`created_by`) REFERENCES `tb_user` (`username`),
  CONSTRAINT `chozy_level_user_modified` FOREIGN KEY (`modified_by`) REFERENCES `tb_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_level` */

insert  into `tb_level`(`level_id`,`level_code`,`level_name`,`created_by`,`created_date`,`modified_by`,`modified_date`,`is_active`,`is_delete`,`keterangan`) values 
(-1,'system','Chozy Technologies System','system','2019-01-23 23:40:22','system','2019-01-23 23:40:22',1,0,NULL),
(1,'admin','Administrator','system','2019-01-23 23:40:36','system','2019-01-23 23:40:36',1,0,NULL);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `level_id` int(9) NOT NULL,
  `pob` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `USER_CREATED` (`created_by`),
  KEY `USER_MODIFIED` (`modified_by`),
  KEY `LEVEL_ID` (`level_id`),
  KEY `EMAIL` (`email`),
  KEY `USERNAME` (`username`),
  CONSTRAINT `chozy_user_user_created` FOREIGN KEY (`created_by`) REFERENCES `tb_user` (`username`),
  CONSTRAINT `chozy_user_user_level` FOREIGN KEY (`level_id`) REFERENCES `tb_level` (`level_id`),
  CONSTRAINT `chozy_user_user_modified` FOREIGN KEY (`modified_by`) REFERENCES `tb_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`username`,`password`,`first_name`,`last_name`,`level_id`,`pob`,`dob`,`phone`,`whatsapp`,`email`,`created_by`,`created_date`,`modified_by`,`modified_date`,`is_active`,`is_delete`,`keterangan`) values 
(-1,'system','3c1a7f18ff7a1567748b4cd19a201c9a','System','System',-1,'Surabaya','1996-01-10','083849969643',NULL,'admin@chozytech.com','system','2019-01-23 23:12:20','system','2019-01-23 23:12:20',1,0,NULL),
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','Administrator',1,'Surabaya','1996-01-10','0000-0000-0000',NULL,'admin@chozytech.com','system','2019-01-23 23:17:59','admin','2020-06-20 15:21:34',1,0,'');

/* Procedure structure for procedure `sp_generate_code` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_generate_code` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_generate_code`(
  IN jenis_trans VARCHAR(255)
)
BEGIN
DECLARE maxCode INT;
IF LOWER(jenis_trans) = 'kacamata' THEN
	SET maxCode = (SELECT COALESCE(MAX(glasses_id),0)+1 FROM tb_glasses WHERE is_delete = 0); 
	SELECT CONCAT('KCMT_',LPAD(maxCode, 5, '0')) AS `code`;
END IF;
END */$$
DELIMITER ;

/*Table structure for table `view_list_glasses` */

DROP TABLE IF EXISTS `view_list_glasses`;

/*!50001 DROP VIEW IF EXISTS `view_list_glasses` */;
/*!50001 DROP TABLE IF EXISTS `view_list_glasses` */;

/*!50001 CREATE TABLE  `view_list_glasses`(
 `ID` int(9) ,
 `code` varchar(50) ,
 `name` varchar(300) ,
 `front` varchar(255) ,
 `left` varchar(255) ,
 `right` varchar(255) ,
 `is_active` varchar(11) ,
 `keterangan` text 
)*/;

/*Table structure for table `view_list_level` */

DROP TABLE IF EXISTS `view_list_level`;

/*!50001 DROP VIEW IF EXISTS `view_list_level` */;
/*!50001 DROP TABLE IF EXISTS `view_list_level` */;

/*!50001 CREATE TABLE  `view_list_level`(
 `ID` int(9) ,
 `code` varchar(50) ,
 `name` varchar(100) ,
 `is_active` varchar(11) ,
 `keterangan` text 
)*/;

/*Table structure for table `view_list_user` */

DROP TABLE IF EXISTS `view_list_user`;

/*!50001 DROP VIEW IF EXISTS `view_list_user` */;
/*!50001 DROP TABLE IF EXISTS `view_list_user` */;

/*!50001 CREATE TABLE  `view_list_user`(
 `user_id` int(9) ,
 `username` varchar(50) ,
 `password` varchar(100) ,
 `first_name` varchar(50) ,
 `last_name` varchar(50) ,
 `level_id` int(9) ,
 `level_code` varchar(50) ,
 `level_name` varchar(100) ,
 `pob` varchar(50) ,
 `dob` varchar(11) ,
 `phone` varchar(20) ,
 `whatsapp` varchar(20) ,
 `email` varchar(100) ,
 `is_active` varchar(11) ,
 `keterangan` text 
)*/;

/*View structure for view view_list_glasses */

/*!50001 DROP TABLE IF EXISTS `view_list_glasses` */;
/*!50001 DROP VIEW IF EXISTS `view_list_glasses` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_list_glasses` AS select `tb_glasses`.`glasses_id` AS `ID`,`tb_glasses`.`glasses_code` AS `code`,`tb_glasses`.`glasses_name` AS `name`,`tb_glasses`.`front_image` AS `front`,`tb_glasses`.`left_image` AS `left`,`tb_glasses`.`right_image` AS `right`,if(`tb_glasses`.`is_active` = 1,'Aktif','Tidak Aktif') AS `is_active`,`tb_glasses`.`keterangan` AS `keterangan` from `tb_glasses` where `tb_glasses`.`is_delete` = 0 and `tb_glasses`.`glasses_id` > -1 order by `tb_glasses`.`glasses_name` */;

/*View structure for view view_list_level */

/*!50001 DROP TABLE IF EXISTS `view_list_level` */;
/*!50001 DROP VIEW IF EXISTS `view_list_level` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_list_level` AS select `tb_level`.`level_id` AS `ID`,`tb_level`.`level_code` AS `code`,`tb_level`.`level_name` AS `name`,if(`tb_level`.`is_active` = 1,'Aktif','Tidak Aktif') AS `is_active`,`tb_level`.`keterangan` AS `keterangan` from `tb_level` where `tb_level`.`is_delete` = 0 and `tb_level`.`level_id` > -1 order by `tb_level`.`level_name` */;

/*View structure for view view_list_user */

/*!50001 DROP TABLE IF EXISTS `view_list_user` */;
/*!50001 DROP VIEW IF EXISTS `view_list_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_list_user` AS select `u`.`user_id` AS `user_id`,`u`.`username` AS `username`,`u`.`password` AS `password`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`l`.`level_id` AS `level_id`,`l`.`level_code` AS `level_code`,`l`.`level_name` AS `level_name`,`u`.`pob` AS `pob`,date_format(`u`.`dob`,'%d/%m/%Y ') AS `dob`,`u`.`phone` AS `phone`,`u`.`whatsapp` AS `whatsapp`,`u`.`email` AS `email`,if(`u`.`is_active` = 1,'Aktif','Tidak Aktif') AS `is_active`,`u`.`keterangan` AS `keterangan` from (`tb_user` `u` left join `tb_level` `l` on(`u`.`level_id` = `l`.`level_id`)) where `u`.`is_delete` = 0 and `u`.`user_id` > -1 */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
