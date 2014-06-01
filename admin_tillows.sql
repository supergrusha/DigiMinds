/*
SQLyog Ultimate v8.55 
MySQL - 5.6.16 : Database - digitial_tillowcakes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`digitial_tillowcakes` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `digitial_tillowcakes`;

/*Table structure for table `bannerimages` */

DROP TABLE IF EXISTS `bannerimages`;

CREATE TABLE `bannerimages` (
  `bannerImage_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL,
  `bannerImage_imgSrc` varchar(100) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`bannerImage_id`),
  KEY `FK_bannerImage` (`banner_id`),
  KEY `FK_bannerImages_page` (`page_id`),
  CONSTRAINT `FK_bannerImage` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`banner_id`),
  CONSTRAINT `FK_bannerImages` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`banner_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_bannerImages_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bannerimages` */

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `banners` */

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_name` tinytext,
  `booking_mob` int(8) DEFAULT NULL,
  `booking_email` varchar(30) DEFAULT NULL,
  `booking_paid` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `booking` */

/*Table structure for table `cakes` */

DROP TABLE IF EXISTS `cakes`;

CREATE TABLE `cakes` (
  `cakes_id` int(11) NOT NULL AUTO_INCREMENT,
  `cakes_name` tinytext NOT NULL,
  `cakes_price` float DEFAULT NULL,
  `cakes_img_src` varchar(150) DEFAULT NULL,
  `cake_type_id` int(11) NOT NULL DEFAULT '4',
  `cakes_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cakes_id`),
  KEY `FK_cakes_type` (`cake_type_id`),
  CONSTRAINT `FK_cakes` FOREIGN KEY (`cake_type_id`) REFERENCES `caketype` (`cake_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `cakes` */

insert  into `cakes`(`cakes_id`,`cakes_name`,`cakes_price`,`cakes_img_src`,`cake_type_id`,`cakes_desc`) values (1,'Choclate Mouse',1,'http://dev.digitalminds.com.mt/CakeSite/img/cake1.jpg',1,'bla bla'),(2,'Lemon Tart',1,'http://dev.digitalminds.com.mt/CakeSite/img/cake2.jpg',2,'bla bla'),(3,'Strawberry CheeseCake',1,'http://dev.digitalminds.com.mt/CakeSite/img/cake3.jpg',3,'bla bla'),(4,'Test',2,'http://dev.digitalminds.com.mt/CakeSite/img/cake2.jpg',1,'test test'),(5,'Test',2,'http://dev.digitalminds.com.mt/CakeSite/img/cake2.jpg',2,NULL),(6,'adasd',3,'http://dev.digitalminds.com.mt/CakeSite/img/cake2.jpg',4,'sda'),(7,'sasa',0,'sdas',5,'sdadas'),(8,'da\r\n',0,'dsa',5,'2sas');

/*Table structure for table `cakes_popular` */

DROP TABLE IF EXISTS `cakes_popular`;

CREATE TABLE `cakes_popular` (
  `cake_popular_id` int(11) NOT NULL AUTO_INCREMENT,
  `cakes_id` int(11) NOT NULL,
  PRIMARY KEY (`cake_popular_id`),
  KEY `FK_cakes_popular` (`cakes_id`),
  CONSTRAINT `FK_cakes_popular` FOREIGN KEY (`cakes_id`) REFERENCES `cakes` (`cakes_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `cakes_popular` */

insert  into `cakes_popular`(`cake_popular_id`,`cakes_id`) values (1,1),(2,2),(3,3),(4,4),(5,4),(6,6);

/*Table structure for table `caketype` */

DROP TABLE IF EXISTS `caketype`;

CREATE TABLE `caketype` (
  `cake_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_type_name` tinytext NOT NULL,
  PRIMARY KEY (`cake_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `caketype` */

insert  into `caketype`(`cake_type_id`,`cake_type_name`) values (1,'Boy'),(2,'Girls'),(3,'Weedings'),(4,'Other'),(5,'Test');

/*Table structure for table `companyinfo` */

DROP TABLE IF EXISTS `companyinfo`;

CREATE TABLE `companyinfo` (
  `companyInfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `companyInfo_tel` varchar(12) NOT NULL,
  `companyInfo_mob` varchar(12) NOT NULL,
  `companyInfo_email` varchar(50) NOT NULL,
  `companyInfo_addName` varchar(60) NOT NULL,
  `companyInfo_addStreet` varchar(50) NOT NULL,
  `companyInfo_addLocation` varchar(50) NOT NULL,
  `companyInfo_addCountry` varchar(30) NOT NULL,
  PRIMARY KEY (`companyInfo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `companyinfo` */

insert  into `companyinfo`(`companyInfo_id`,`companyInfo_tel`,`companyInfo_mob`,`companyInfo_email`,`companyInfo_addName`,`companyInfo_addStreet`,`companyInfo_addLocation`,`companyInfo_addCountry`) values (1,'21371342','799728558','coqmos@gmail.com','26, Storja','S.Cannataci Str','Swieqi','Malta');

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `content_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `content_text` mediumtext CHARACTER SET utf8,
  `user_id` int(11) DEFAULT NULL,
  `content_edit_date` date DEFAULT NULL,
  PRIMARY KEY (`content_id`),
  KEY `FK_content` (`page_id`),
  KEY `FK_content_users` (`user_id`),
  CONSTRAINT `FK_content` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `content` */

insert  into `content`(`content_id`,`page_id`,`content_name`,`content_text`,`user_id`,`content_edit_date`) values (2,2,'My Freshly Update','Test not bla bla',2,'0000-00-21');

/*Table structure for table `maillist` */

DROP TABLE IF EXISTS `maillist`;

CREATE TABLE `maillist` (
  `maillist_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailist_email` varchar(50) NOT NULL,
  PRIMARY KEY (`maillist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `maillist` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` tinytext,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`menu_id`,`menu_name`) values (1,'Navigation');

/*Table structure for table `menupage` */

DROP TABLE IF EXISTS `menupage`;

CREATE TABLE `menupage` (
  `menuPage_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`menuPage_id`),
  KEY `FK_menuPage_menu` (`menu_id`),
  KEY `FK_menuPage_page` (`page_id`),
  CONSTRAINT `FK_menuPage` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_menuPage_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `menupage` */

insert  into `menupage`(`menuPage_id`,`menu_id`,`page_id`) values (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7);

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `news_id` double NOT NULL AUTO_INCREMENT,
  `news_title` varchar(180) DEFAULT NULL,
  `news_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_content` varchar(5000) DEFAULT NULL,
  `news_img` varchar(150) DEFAULT NULL,
  `user_id` double DEFAULT NULL,
  `news_vid` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `news` */

/*Table structure for table `pagedetails` */

DROP TABLE IF EXISTS `pagedetails`;

CREATE TABLE `pagedetails` (
  `pageDet_id` int(11) NOT NULL AUTO_INCREMENT,
  `pageDet_name` tinytext NOT NULL,
  `pageDet_title` varchar(40) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`pageDet_id`),
  KEY `FK_pageDetails_page` (`page_id`),
  CONSTRAINT `FK_pageDetails_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pagedetails` */

insert  into `pagedetails`(`pageDet_id`,`pageDet_name`,`pageDet_title`,`page_id`) values (1,'Home','Tillows Cakes - Home ',1),(2,'About','Tillows Cakes - About ',2),(3,'Gallery','Tillows Cakes - Gallery ',3),(4,'Cakes','Tillows Cakes - Cakes ',4),(5,'Cup Cakes','Tillows Cakes - Cup Cakes ',5),(6,'Booking','Tillows Cakes - Booking ',6),(7,'Contact Us','Tillows Cakes - Contact Us ',7);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pages` */

insert  into `pages`(`page_id`,`page_link`) values (1,'http://localhost/TillowsCakes/'),(2,'http://localhost/TillowsCakes/index.php/about'),(3,'http://localhost/TillowsCakes/gallery'),(4,'http://localhost/TillowsCakes/cakes'),(5,'http://localhost/TillowsCakes/cupcakes'),(6,'http://localhost/TillowsCakes/booking'),(7,'http://localhost/TillowsCakes/contact_us');

/*Table structure for table `pageshits` */

DROP TABLE IF EXISTS `pageshits`;

CREATE TABLE `pageshits` (
  `pageHit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `pages_id` int(11) NOT NULL,
  `pageHit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pageHit_useragent` varchar(50) DEFAULT NULL,
  `pageHit_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pageHit_ID`),
  KEY `FK_pagesHits` (`pages_id`),
  CONSTRAINT `FK_pagesHits` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pageshits` */

insert  into `pageshits`(`pageHit_ID`,`pages_id`,`pageHit_date`,`pageHit_useragent`,`pageHit_ip`) values (1,1,'2014-04-23 16:48:16','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','92.251.24.13');

/*Table structure for table `pagespics` */

DROP TABLE IF EXISTS `pagespics`;

CREATE TABLE `pagespics` (
  `pagePics_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `pagePics_imgSrc` varchar(250) NOT NULL,
  PRIMARY KEY (`pagePics_id`),
  KEY `FK_pagesPics` (`page_id`),
  CONSTRAINT `FK_pagesPics` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pagespics` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_username` varchar(50) NOT NULL,
  `users_pass` varchar(32) NOT NULL,
  `users_name` text NOT NULL,
  `users_email` varchar(30) NOT NULL,
  `userType_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `users_email` (`users_email`),
  KEY `FK_users` (`userType_id`),
  CONSTRAINT `FK_users` FOREIGN KEY (`userType_id`) REFERENCES `usertype` (`userType_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`users_id`,`users_username`,`users_pass`,`users_name`,`users_email`,`userType_id`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','eRIC','coqmos@gmail.com',1);

/*Table structure for table `usertype` */

DROP TABLE IF EXISTS `usertype`;

CREATE TABLE `usertype` (
  `userType_id` int(11) NOT NULL AUTO_INCREMENT,
  `userType_name` tinytext NOT NULL,
  PRIMARY KEY (`userType_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usertype` */

insert  into `usertype`(`userType_id`,`userType_name`) values (1,'Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
