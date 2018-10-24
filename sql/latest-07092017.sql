-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: gspel1
-- ------------------------------------------------------
-- Server version	5.7.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_groups`
--

DROP TABLE IF EXISTS `admin_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_groups`
--

LOCK TABLES `admin_groups` WRITE;
/*!40000 ALTER TABLE `admin_groups` DISABLE KEYS */;
INSERT INTO `admin_groups` VALUES (1,'webmaster','Webmaster'),(2,'admin','Administrator'),(3,'manager','Manager'),(4,'staff','Staff'),(5,'applicant','Pendaftar/Pelatih'),(7,'branch manager','Branch Manager'),(8,'branch executive','Branch Executive'),(9,'state officer','State Officer'),(10,'ppkl_officer','PPKL Officer'),(11,'trainer','pengajar'),(13,'pelatih officer','Pelatih Officer'),(14,'finance officer','Finance Officer'),(15,'HR Officer','HR Officer');
/*!40000 ALTER TABLE `admin_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_login_attempts`
--

DROP TABLE IF EXISTS `admin_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login_attempts`
--

LOCK TABLES `admin_login_attempts` WRITE;
/*!40000 ALTER TABLE `admin_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `giatmara_id` varchar(50) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_staff` (`id_staff`),
  CONSTRAINT `admin_users_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'127.0.0.1','webmaster','$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES',NULL,NULL,NULL,NULL,NULL,'knMgxpcG0rNd/DmcQAx6o.',1451900190,1504748214,1,'Webmaster','',NULL,NULL),(2,'127.0.0.1','admin','$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW',NULL,NULL,NULL,NULL,NULL,NULL,1451900228,1504625872,1,'Admin','',NULL,NULL),(3,'127.0.0.1','manager','$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa',NULL,NULL,NULL,NULL,NULL,NULL,1451900430,1502805823,1,'Manager','',NULL,NULL),(4,'127.0.0.1','staff','$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6',NULL,NULL,NULL,NULL,NULL,NULL,1451900439,1504580540,1,'Staff','',NULL,NULL),(5,'::1','trainner','$2y$08$2M1A2Jr7RS/VzpyF0POjVOi4RYqa.3IHIrG8YMhaOOvRpQOXB/OGi',NULL,NULL,NULL,NULL,NULL,NULL,1501475673,1501534220,1,'test','giatmara',NULL,NULL),(6,'127.0.0.1','trainer1','',NULL,NULL,NULL,NULL,NULL,NULL,1501559568,1501625725,1,'trainer1','trainer1',NULL,NULL),(7,'127.0.0.1','branchm1','$2y$08$4x3ziZcJSaWIryLD8Y/o0eeNsXVmZHQ8AZCNMwFn2ApO2cTrwb1lS',NULL,NULL,NULL,NULL,NULL,'qavKK6ilEkkTitGEET1Mxe',1501559687,1504755296,1,'branchm1','branchm1','3',5),(8,'127.0.0.1','branche1','$2y$08$y21Wl7iUZ5uIw81NbXWHf.boj7OCnF2tOg5.k9KO2mZl.14.6y97G',NULL,NULL,NULL,NULL,NULL,NULL,1501559759,1504594987,1,'branche1','branche1',NULL,NULL),(9,'127.0.0.1','stateo1','$2y$08$oLDy6ToqWD5vyYG5ZMCqdO46IH5Ne95hPpBz5.XE1c9X7MICnonE.',NULL,NULL,NULL,NULL,NULL,'NcTm9TV6zmXYFLNMen3SMe',1501559783,1504751715,1,'stateo1','stateo1','10',9),(10,'127.0.0.1','ppklo1','$2y$08$4EKzdiOQ4GJz5WnCYuSyhuaVJhxvXuzFMqojs/V0RZPAGcJvBP9ja',NULL,NULL,NULL,NULL,NULL,'eLxXb72y5cXGSZZLj/ibq.',1501559804,1504703144,1,'ppklo1','ppklo1','10',11),(11,'127.0.0.1','trainer2','$2y$08$Yzti52LnMWTHRsRbTNEYWuTF3AmjZGi8H/EXD9VRGZir0ZQir19Oq',NULL,NULL,NULL,NULL,NULL,NULL,1501560553,NULL,1,'trainer2','trainer2',NULL,NULL),(12,'127.0.0.1','trainer3','$2y$08$57nEYyXG7Kny90Xyw3mQxOaDGZ3bmP0ufRQeZdirqCZJn.tBul7Y6',NULL,NULL,NULL,NULL,NULL,NULL,1501560567,1502805851,1,'trainer3','trainer3',NULL,NULL),(13,'127.0.0.1','trainer4','$2y$08$8rOgb3VAyJMuAot1QSahKe0AjVcM5Um/5EuuUmtFWXC9XGnxvnAl.',NULL,NULL,NULL,NULL,NULL,NULL,1501560580,NULL,1,'trainer4','trainer4',NULL,NULL),(14,'127.0.0.1','trainer5','$2y$08$qR0ng.iQyNh8Sc3ig3AgluCJkb2wmc/7tWcb687IKwMBrmkmZxwkW',NULL,NULL,NULL,NULL,NULL,NULL,1501560593,NULL,1,'trainer5','trainer5',NULL,NULL),(15,'127.0.0.1','branchm2','$2y$08$.qMeHf6FAHJGoR.p84..9ubA464FP9MyoNIrGCOB6mghuSP00Nti2',NULL,NULL,NULL,NULL,NULL,'LtyBZ2Zh5oWU3qdy5LXW3.',1501560694,1504748058,1,'branchm2','branchm2','10',10),(16,'127.0.0.1','branchm3','$2y$08$cF4E0OJ4oVbHcn8MuPQTEeicOgsfrSjwvupnEVyfYCtrWLiC3ZOwC',NULL,NULL,NULL,NULL,NULL,NULL,1501560708,1504742102,1,'branchm3','branchm3','135',NULL),(17,'127.0.0.1','branchm4','$2y$08$X8j0qRmKy7utPy4QBGM8buhpPww8AJeuN1syQ/DwuyKmVPUfMtASy',NULL,NULL,NULL,NULL,NULL,NULL,1501560774,1504668111,1,'branchm4','branchm4','18',12),(18,'127.0.0.1','branchm5','$2y$08$9YiIw65n/pIBJx67EAK.Xe7WMw6QrmsSyoLLNAkfRUFdI7K.i7q9e',NULL,NULL,NULL,NULL,NULL,NULL,1501560793,NULL,1,'branchm5','branchm5',NULL,NULL),(19,'127.0.0.1','branche2','$2y$08$YyxwWUw.Ffh.xWjAcjh79.903Ns.QuO7uQL2oFgcX0kGGjHArbM8u',NULL,NULL,NULL,NULL,NULL,NULL,1501560853,NULL,1,'branche2','branche2',NULL,NULL),(20,'127.0.0.1','branche3','$2y$08$6pHOnFTqCQzYNWu/Xuw71O0nrx23yoop6KTh.KeuajnGYyOGIJyEW',NULL,NULL,NULL,NULL,NULL,NULL,1501561626,NULL,1,'branche3','branche3',NULL,NULL),(21,'127.0.0.1','branche4','$2y$08$vp0NX8TFKyAxwjIHmbFPGOLFfw33w0CjWwS0CppoKZMjNj5y.JSIS',NULL,NULL,NULL,NULL,NULL,NULL,1501561640,NULL,1,'branche4','branche4',NULL,NULL),(22,'127.0.0.1','branche5','$2y$08$x0ijZvzPZ99Rh8G.nZYdTeUNdxhKaXXy0uvJzgK56EoggQrlSkoI2',NULL,NULL,NULL,NULL,NULL,NULL,1501561662,NULL,1,'branche5','branche5',NULL,NULL),(23,'127.0.0.1','stateo2','$2y$08$r2rHTQ7CXmGZb0HfOqjf1ugR76Zv794U3PqIKy2acfYn.kxD2o.WO',NULL,NULL,NULL,NULL,NULL,NULL,1501561742,NULL,1,'stateo2','stateo2','135',NULL),(24,'127.0.0.1','stateo3','$2y$08$hbGKZonjggo9mOCtT3W41uzkwqGKhef0KZ4lSIsvCg1NMGJU04Aaa',NULL,NULL,NULL,NULL,NULL,NULL,1501561761,NULL,1,'stateo3','stateo3',NULL,NULL),(25,'127.0.0.1','stateo4','$2y$08$KUruscMfprT.304tm.BotuSniHo7r/CITkFw0grxVrcSKeenc2F4G',NULL,NULL,NULL,NULL,NULL,NULL,1501561774,NULL,1,'stateo4','stateo4',NULL,NULL),(26,'127.0.0.1','stateo5','$2y$08$E9tJwSRZHhqzwaggENci2eCvOXQZNHvpymPMcoch2q5ZmYh97TclK',NULL,NULL,NULL,NULL,NULL,NULL,1501561807,NULL,1,'stateo5','stateo5',NULL,NULL),(27,'127.0.0.1','ppklo2','$2y$08$bb5x8oKhxM/3xb8MXTBlYOoJCetR48g85vlf35DwGTx3pXvl8DYH6',NULL,NULL,NULL,NULL,NULL,NULL,1501561824,NULL,1,'ppklo2','ppklo2',NULL,NULL),(28,'127.0.0.1','ppklo3','$2y$08$TT3aSWtOtQ.NZqSlZ/Qr2eIk9Wm4cTz6VBe.ik4F2VubGroy2/tA.',NULL,NULL,NULL,NULL,NULL,NULL,1501561836,NULL,1,'ppklo3','ppklo3',NULL,NULL),(29,'127.0.0.1','ppklo4','$2y$08$Tocf7IrXdKQRgDVshH9KcOYN7rIKrnrY0HXrtwdkHju0RaCQn0Nom',NULL,NULL,NULL,NULL,NULL,NULL,1501561848,NULL,1,'ppklo4','ppklo4',NULL,NULL),(30,'127.0.0.1','ppklo5','$2y$08$6PhX.TOt.dGaTfYfXS2ZJ.rXQtxLX0ciCbzh52EOIV7gzr2gnEez6',NULL,NULL,NULL,NULL,NULL,NULL,1501561861,NULL,1,'ppklo5','ppklo5',NULL,NULL),(31,'::1','trainergspel','$2y$08$ZghGg5Ep1kznVooO364HBOQ3zoBP.VUkfZ.CKPplmeAfDCIcuPxqm',NULL,NULL,NULL,NULL,NULL,'IptuDKrWRyv9qxGU0RubAu',1501630747,1504760182,1,'trainergspel','trainergspel','135',7),(32,'::1','coba','$2y$08$EjxxmR4r5u99ZFi7dE7omuY9UKIRT6i0f5hfNCdQko20n1khfnkWS',NULL,NULL,NULL,NULL,NULL,NULL,1502000103,NULL,1,'coba','coba','5',NULL),(33,'175.139.164.129','azmihadi','$2y$08$gFYhv/al/UJR5Fa7j2fvJuDx3JeT2e9x8nZbHJCufQuFqs9dMHN9y',NULL,NULL,NULL,NULL,NULL,NULL,1504428264,1504431097,1,'Azmi Hadi X',NULL,'263',NULL),(34,'175.136.77.252','branchhm4','$2y$08$BgBZr/5FfaVpSYEU0Vor4.KtwSY70kwh.Mo2UUp.MhPwAstuvWvL.',NULL,NULL,NULL,NULL,NULL,NULL,1504596609,NULL,1,'Branch Manager','Kangan','17',NULL),(35,'175.136.65.106','gspelkw','$2y$08$qyQCv0l0/81bKDXr/B0eluhd.ZNO6sRIGjXo7iYxWzLMmpoO6gpZi',NULL,NULL,NULL,NULL,NULL,NULL,1504657660,1504760034,1,'gspelkw','kw','3',NULL),(36,'0','tp1','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504756854,1,'TP 1',NULL,NULL,13),(37,'0','tp2','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504747693,1,'TP2',NULL,NULL,14),(38,'0','tp3','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 3',NULL,NULL,15),(39,'0','tp4','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 4',NULL,NULL,16),(40,'0','tp5','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 5',NULL,NULL,17),(41,'0','tp6','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 6',NULL,NULL,18),(42,'0','tp7','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 7',NULL,NULL,19),(43,'0','tp8','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 8',NULL,NULL,20),(44,'0','tp9','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 9',NULL,NULL,21),(45,'0','tp10','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 10',NULL,NULL,22),(46,'0','tp11','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 11',NULL,NULL,23),(47,'0','tp12','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 12',NULL,NULL,24),(48,'0','tp13','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 13',NULL,NULL,25),(49,'0','tp14','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'TP 14',NULL,NULL,26),(50,'0','tp15','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504759300,1,'TP 15',NULL,NULL,27),(51,'0','pengurus1','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504752753,1,'PGM 1',NULL,NULL,28),(52,'0','pengurus2','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504754585,1,'PGM 2',NULL,NULL,29),(53,'0','pengurus3','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504720799,1,'PGM 3',NULL,NULL,30),(54,'0','pengurus4','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 4',NULL,NULL,31),(55,'0','pengurus5','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 5',NULL,NULL,32),(56,'0','pengurus6','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 6',NULL,NULL,33),(57,'0','pengurus7','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 7',NULL,NULL,34),(58,'0','pengurus8','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 8',NULL,NULL,35),(59,'0','pengurus9','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 9',NULL,NULL,36),(60,'0','pengurus10','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 10',NULL,NULL,37),(61,'0','pengurus11','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 11',NULL,NULL,38),(62,'0','pengurus12','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 12',NULL,NULL,39),(63,'0','pengurus13','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGM 13',NULL,NULL,40),(64,'0','pengurus14','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504760301,1,'PGM 14',NULL,NULL,41),(65,'0','pengurus15','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,1504747717,1,'PGM 15',NULL,NULL,42),(66,'0','pgn_johor','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGN Johor',NULL,NULL,43),(67,'0','pgn_kedah','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGN Kedah',NULL,NULL,44),(68,'0','pgn_kelantan','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGN Kelantan',NULL,NULL,45),(69,'0','pgn_melaka','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGN Melaka',NULL,NULL,46),(70,'0','pgn_n9','$2y$08$aCmjh.5NgULRsejfoRr2XeD5tjl.GBuLyAzqGOEWYO4dAQ6vmSzQS',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'PGN Negeri Sembilan',NULL,NULL,47);
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users_groups`
--

DROP TABLE IF EXISTS `admin_users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `admin_users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`),
  CONSTRAINT `admin_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `admin_groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users_groups`
--

LOCK TABLES `admin_users_groups` WRITE;
/*!40000 ALTER TABLE `admin_users_groups` DISABLE KEYS */;
INSERT INTO `admin_users_groups` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,3),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(15,15,7),(16,16,7),(17,17,7),(18,18,7),(19,19,8),(20,20,8),(21,21,8),(22,22,8),(23,23,9),(24,24,9),(25,25,9),(26,26,9),(27,27,10),(28,28,10),(29,29,10),(30,30,10),(31,31,11),(32,32,11),(34,11,11),(35,33,11),(36,34,7),(37,35,14),(38,36,11),(39,37,11),(40,38,11),(41,39,11),(42,40,11),(43,41,11),(44,42,11),(45,43,11),(46,44,11),(47,45,11),(48,46,11),(49,47,11),(50,48,11),(51,49,11),(52,50,11),(53,51,7),(54,52,7),(55,53,7),(56,54,7),(57,55,7),(58,56,7),(59,57,7),(60,58,7),(61,59,7),(62,60,7),(63,61,7),(64,62,7),(65,63,7),(66,64,7),(67,65,7),(68,66,9),(69,67,9),(70,68,9),(71,69,9),(72,70,9);
/*!40000 ALTER TABLE `admin_users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni`
--

DROP TABLE IF EXISTS `alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `gambar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_r` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_p` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_b` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emel` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_bekerja` int(2) NOT NULL,
  `pengakuan` int(2) NOT NULL,
  `tarikh_kemaskini` datetime NOT NULL,
  `no_alumni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disahkan_oleh` int(10) NOT NULL,
  `disahkan_pada` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelatih` (`id_pelatih`),
  CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id_pelatih`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni`
--

LOCK TABLES `alumni` WRITE;
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_belajar`
--

DROP TABLE IF EXISTS `alumni_belajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_belajar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `nama_institusi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bidang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mula` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_tamat` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_belajar`
--

LOCK TABLES `alumni_belajar` WRITE;
/*!40000 ALTER TABLE `alumni_belajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumni_belajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_kerja`
--

DROP TABLE IF EXISTS `alumni_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_kerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `jawatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_muka` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  `id_pendapatan` int(10) NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_kerja`
--

LOCK TABLES `alumni_kerja` WRITE;
/*!40000 ALTER TABLE `alumni_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumni_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_usahawan`
--

DROP TABLE IF EXISTS `alumni_usahawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_usahawan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `nama_perniagaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perniagaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  `id_pendapatan` int(10) NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_usahawan`
--

LOCK TABLES `alumni_usahawan` WRITE;
/*!40000 ALTER TABLE `alumni_usahawan` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumni_usahawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_access`
--

DROP TABLE IF EXISTS `api_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_access`
--

LOCK TABLES `api_access` WRITE;
/*!40000 ALTER TABLE `api_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_keys`
--

LOCK TABLES `api_keys` WRITE;
/*!40000 ALTER TABLE `api_keys` DISABLE KEYS */;
INSERT INTO `api_keys` VALUES (1,0,'anonymous',1,1,0,NULL,1463388382);
/*!40000 ALTER TABLE `api_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_limits`
--

DROP TABLE IF EXISTS `api_limits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_limits`
--

LOCK TABLES `api_limits` WRITE;
/*!40000 ALTER TABLE `api_limits` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_limits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_logs`
--

DROP TABLE IF EXISTS `api_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_logs`
--

LOCK TABLES `api_logs` WRITE;
/*!40000 ALTER TABLE `api_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,1,'Category 1'),(2,2,'Category 2'),(3,3,'Category 3');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `author_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content_brief` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,1,2,'Blog Post 1','','<p>\r\n	Blog Post 1 Content Brief</p>\r\n','<p>\r\n	Blog Post 1 Content</p>\r\n','2015-09-25 17:00:00','active');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts_tags`
--

DROP TABLE IF EXISTS `blog_posts_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts_tags`
--

LOCK TABLES `blog_posts_tags` WRITE;
/*!40000 ALTER TABLE `blog_posts_tags` DISABLE KEYS */;
INSERT INTO `blog_posts_tags` VALUES (1,1,2),(2,1,1),(3,1,3);
/*!40000 ALTER TABLE `blog_posts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_tags`
--

LOCK TABLES `blog_tags` WRITE;
/*!40000 ALTER TABLE `blog_tags` DISABLE KEYS */;
INSERT INTO `blog_tags` VALUES (1,'Tag 1'),(2,'Tag 2'),(3,'Tag 3');
/*!40000 ALTER TABLE `blog_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('01tih9d9hn84bs3p619smo6soaat6goi','111.94.164.173',1501998510,'__ci_last_regenerate|i:1501998510;'),('0dcgqh6cor0708kogrr1senemgebaigl','162.158.255.160',1504422001,'__ci_last_regenerate|i:1504422001;'),('0l311l8261so91q2ip3g2an4mf31cmei','162.158.79.155',1504422007,'__ci_last_regenerate|i:1504422007;'),('0nt6lsgkg0utcek6g5u5dgepq4o4q3em','110.138.46.222',1499936454,'__ci_last_regenerate|i:1499936454;'),('10oht75d5svjhl5orq897t1q3q1cnsvf','172.68.65.84',1501998170,'__ci_last_regenerate|i:1501998170;'),('1beblho91euq0iviv96gck14hk5b42jd','162.158.79.107',1504422015,'__ci_last_regenerate|i:1504422015;'),('1ggqlq9uc7kmqdj53silolr9fq5o2q60','112.215.154.205',1499956556,'__ci_last_regenerate|i:1499956515;'),('1njibvfbqn0mh062h6qkkfkarjp8sgur','::1',1500097691,'__ci_last_regenerate|i:1500097690;'),('1r5mp4kokpt2hs4hdlibi76k6vknj3m0','162.158.79.203',1502602960,'__ci_last_regenerate|i:1502602960;'),('249o8nf2q74h70643rj9kovo59gfavb8','172.68.65.156',1501998159,'__ci_last_regenerate|i:1501998159;'),('251dvk5mnt1pa238bmc0p9sf42imodmk','120.188.78.175',1501223263,'__ci_last_regenerate|i:1501223263;'),('253883cla6jdkktv6lm79gfk4pku47dg','162.158.79.65',1502602975,'__ci_last_regenerate|i:1502602975;'),('25cuqvoukm7gs9m0n7jr5gkmj3pa1vph','162.158.79.107',1503207776,'__ci_last_regenerate|i:1503207776;'),('2cdtdq2mdd78j9g33ljogl1q9qg1mhfe','127.0.0.1',1499921551,'__ci_last_regenerate|i:1499921550;'),('2f7adnthkbtmct7a0tefg3c0msir3feg','162.158.79.29',1502602979,'__ci_last_regenerate|i:1502602979;'),('2fttubmf61r4642tbiu9vr7n85tp4k8g','162.158.78.106',1502602964,'__ci_last_regenerate|i:1502602964;'),('2ikjolv8on23j19g130ebch1ggqlacp6','162.158.79.59',1502602972,'__ci_last_regenerate|i:1502602972;'),('2l2h8bvqr4mmp89iu4lkpcm86sk57ies','162.158.78.106',1504422005,'__ci_last_regenerate|i:1504422005;'),('2o4cc8hp48436q5oaimn6s9oc2b3sugt','162.158.79.161',1501998169,'__ci_last_regenerate|i:1501998169;'),('2ob94583r6hqqodfjnprnhc97fbm8e3i','108.162.245.250',1503207761,'__ci_last_regenerate|i:1503207761;'),('2pr5r75c033euvr21un5lk7hen40vumh','162.158.79.107',1502602974,'__ci_last_regenerate|i:1502602974;'),('2tcqnau8c9i9fbp1ntocmb8ibvba9h8b','162.158.78.76',1501998175,'__ci_last_regenerate|i:1501998175;'),('3e2osa1uth7vje2dm749mhilvlqkrm6e','162.158.79.209',1503207764,'__ci_last_regenerate|i:1503207764;'),('3j382ls4lod6a6danb4kvgdq9dgetip9','::1',1499769810,'__ci_last_regenerate|i:1499769518;'),('3r57v72faubohpb240h5np8i6vahtmnd','162.158.79.107',1503207768,'__ci_last_regenerate|i:1503207768;'),('3v50gu7p7iqtksq2pq9qbcs3020gj75a','162.158.79.23',1503812577,'__ci_last_regenerate|i:1503812577;'),('43cn3nl969vln3h25jpoaasdci71tmkq','127.0.0.1',1499774314,'__ci_last_regenerate|i:1499774298;'),('455leb3cet38sbvo2be1jj89fjn2r28i','162.158.79.161',1503812580,'__ci_last_regenerate|i:1503812580;'),('4adqorek2om2g9g28snbuiv1ga5ov8tn','36.84.13.168',1500026692,'__ci_last_regenerate|i:1500026689;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1500025842\";system_messages|a:2:{s:7:\"success\";a:1:{i:0;s:29:\"<p>Logged In Successfully</p>\";}s:5:\"error\";a:0:{}}__ci_vars|a:1:{s:15:\"system_messages\";s:3:\"old\";}'),('4cbmdkb5o86f9e6qld1f16dmjko5lp5p','172.68.65.84',1501998160,'__ci_last_regenerate|i:1501998160;'),('4e8jr2sn051osqemvsij2hsjcdeq2j83','180.252.103.168',1499826816,'__ci_last_regenerate|i:1499826816;'),('4hja37hpaherbc8ehf23b1scv620lcev','162.158.79.107',1503812582,'__ci_last_regenerate|i:1503812582;'),('4kjjjfqttngnnn8sk9ohb6ufjeqbcv5r','180.252.103.168',1499825272,'__ci_last_regenerate|i:1499825272;'),('4mql6fe0oa3nrej32sp5pf25hobcmvl0','162.158.78.76',1503812585,'__ci_last_regenerate|i:1503812585;'),('4ns52i5lj6c1avai9bvsfqq00es883q5','::1',1499770310,'__ci_last_regenerate|i:1499770310;'),('4pef1i7bo35gi41904bvhjtppu2fiuit','162.158.79.209',1502602963,'__ci_last_regenerate|i:1502602963;'),('5001148g83vf8h432226ti0pvkvv3s6f','162.158.78.16',1503207766,'__ci_last_regenerate|i:1503207766;'),('53hauj3n61dgad5uf7hars1mapocbn2e','180.252.103.168',1499828318,'__ci_last_regenerate|i:1499828318;'),('57etafgeivspbs0a6ginn5pprrp2bgr5','162.158.79.155',1501998165,'__ci_last_regenerate|i:1501998165;'),('5am4cl30cb603g08efvjadeka04timt1','180.252.103.168',1499828326,'__ci_last_regenerate|i:1499828326;'),('5d0rpvqut060u92386798gih5skmogaq','162.158.79.107',1501998176,'__ci_last_regenerate|i:1501998176;'),('5dpqda320hobjqah7k9fpl1t6qcic717','162.158.106.30',1503207761,'__ci_last_regenerate|i:1503207761;'),('5elm37r8io55hgk7gjvrsuqhsjrsjk67','162.158.79.203',1503812572,'__ci_last_regenerate|i:1503812572;'),('5lvmved1jh4qd95snpi2tbh45k1qmg47','180.252.144.147',1499770220,'__ci_last_regenerate|i:1499770141;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499748390\";system_messages|a:2:{s:7:\"success\";a:1:{i:0;s:29:\"<p>Logged In Successfully</p>\";}s:5:\"error\";a:0:{}}__ci_vars|a:1:{s:15:\"system_messages\";s:3:\"old\";}'),('5p824fj6qtlmvuikc6vb21uhr67g61fc','64.233.173.32',1499956671,'__ci_last_regenerate|i:1499956671;'),('5tdmu66nlql8da8hqm1lpbad8aj0d69q','172.68.65.84',1503812580,'__ci_last_regenerate|i:1503812580;'),('5tuvbk3ucr5qdfvoerd39oj8pnspoa15','::1',1499824876,'__ci_last_regenerate|i:1499824721;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499823075\";'),('5vb00ccrtou94a4kofsc67t6sb9brb9c','112.215.154.205',1499956516,'__ci_last_regenerate|i:1499956516;'),('60r6sk73gs5a7qfoh61nmvjj932kpehl','162.158.78.148',1504422014,'__ci_last_regenerate|i:1504422014;'),('677qeeto8qnn72phjemobsu6i1irkh7l','162.158.79.65',1503207777,'__ci_last_regenerate|i:1503207777;'),('67lvbjnf7c5efga76a5vjr9fepo929vm','36.88.156.46',1499846371,'__ci_last_regenerate|i:1499846371;'),('68be644850s3rdam1337l8m82ornh9b1','202.62.17.204',1500088374,'__ci_last_regenerate|i:1500088371;'),('6geedugkg8mmd03l1ae5neg5a4ojqgfo','::1',1502876600,'__ci_last_regenerate|i:1502876553;'),('6jjsl5nrufa3831ht3moi2v2g66k4ag8','162.158.78.16',1502602964,'__ci_last_regenerate|i:1502602964;'),('6o0d05bal1188ggp53td82j2236er4dt','162.158.78.76',1502602975,'__ci_last_regenerate|i:1502602975;'),('6rqmeq1aieg6gf1mm95bdhojt67urkcp','162.158.78.16',1503812576,'__ci_last_regenerate|i:1503812576;'),('6sl8eeuvv220irkr2c0ikffujo6pef1d','172.68.65.114',1503812583,'__ci_last_regenerate|i:1503812583;'),('76qd7lebrf6qn90me1n08uvctqh1pg18','180.252.103.168',1499822575,'__ci_last_regenerate|i:1499822572;'),('7af8gkagtcampp7uorj1ch6sdt5726k7','180.252.103.168',1499825869,'__ci_last_regenerate|i:1499825869;'),('7sisvkhvqd9lpslsivsns4j6k33suksn','112.215.154.205',1499956518,'__ci_last_regenerate|i:1499956518;'),('7tbjb91995rontcrs432adn1rlerfp8a','162.158.78.88',1504422013,'__ci_last_regenerate|i:1504422013;'),('81q2pkkkce3a1t8285u57bl69d6gifqq','162.158.79.47',1503812587,'__ci_last_regenerate|i:1503812587;'),('899gjc0b1j4f4n9m3egnl85839o486ni','172.68.65.84',1503207762,'__ci_last_regenerate|i:1503207762;'),('89rfpmk2cgqje6u2555m2vr4d4ek3d4o','162.158.79.65',1501998175,'__ci_last_regenerate|i:1501998175;'),('8aqrak4q3ob8nsegjjogis1paad68oqq','180.252.103.168',1499826138,'__ci_last_regenerate|i:1499826138;'),('8fhroij73keet3a96sjbi9qedrite8k0','162.158.78.148',1501998173,'__ci_last_regenerate|i:1501998173;'),('8fm8h3q5l1ckk5sr8k3ouvf3ba9dph4q','162.158.79.47',1502602978,'__ci_last_regenerate|i:1502602978;'),('8o9149opp4cubhch8m07k3ncvmhp5v35','::1',1499825279,'__ci_last_regenerate|i:1499825279;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499823075\";'),('8qej2otpfko4jnppcnecrom6ophbi27u','64.233.173.56',1499956654,'__ci_last_regenerate|i:1499956654;'),('90bl9081kj5prcv96a00f3m1vjaqv9ns','162.158.79.107',1503812578,'__ci_last_regenerate|i:1503812578;'),('94lipgua6qo5qsssni5g1vn7rj2f0pqg','172.68.65.114',1504422014,'__ci_last_regenerate|i:1504422014;'),('9lard45f4rn5ggpt2snhhetds2foiuoc','162.158.79.23',1504422007,'__ci_last_regenerate|i:1504422007;'),('9mjvejik8vde08dmb6vk9rfh7vu63ia1','162.158.79.23',1503207767,'__ci_last_regenerate|i:1503207767;'),('9ree7skpuaoairga2h6ud23fvep6g426','127.0.0.1',1504345536,'__ci_last_regenerate|i:1504345536;'),('a2n0bbqem9v7ra859fcqr1nu7nr6ldo6','::1',1501431921,'__ci_last_regenerate|i:1501431920;'),('a3t4agkqtmu5hsbpvt7ebrprf52tscfo','180.252.103.168',1499826821,'__ci_last_regenerate|i:1499826816;'),('af627s9j55mj23u4ecv5u558089vsl4k','162.158.78.88',1503812582,'__ci_last_regenerate|i:1503812582;'),('ajrslea24c40avvmoslhmlv0q94dou2h','162.158.79.203',1504422002,'__ci_last_regenerate|i:1504422002;'),('al11av7t95f979ckjt4kc61u33rte934','162.158.79.107',1504422008,'__ci_last_regenerate|i:1504422008;'),('ar2mi1gojn5akgg9h8o0mk0r2c61knf2','172.68.65.156',1504422026,'__ci_last_regenerate|i:1504422026;'),('arisoibiak11bumlc80accnu6hb7lsj3','162.158.79.47',1504422018,'__ci_last_regenerate|i:1504422018;'),('artop2f0pe0rk8sj9n31g938e32tiobu','172.68.65.84',1503812572,'__ci_last_regenerate|i:1503812572;'),('ashgibim8l8k4ua63ef28v41m6u0ljq4','162.158.79.107',1504422012,'__ci_last_regenerate|i:1504422012;'),('atk77qfa2rmrlv16nqjtnu3qmsmnu9d4','172.68.141.106',1503812571,'__ci_last_regenerate|i:1503812571;'),('b1781g7l9334ch0tn13947fufp95dd0l','110.138.46.222',1499936556,'__ci_last_regenerate|i:1499936472;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499933153\";'),('b53faftvm0tq9gej1crl5v32fnoufblt','172.68.142.35',1501998158,'__ci_last_regenerate|i:1501998158;'),('bd50bpt6ft27havpgfd5bnfllfvpgolk','162.158.79.23',1502602966,'__ci_last_regenerate|i:1502602966;'),('bi3umb6goh4th2r1lst7gph3anp9gckm','162.158.65.78',1501998158,'__ci_last_regenerate|i:1501998158;'),('bmbj945954u41kvp92h2p228taui9pef','162.158.79.107',1504422017,'__ci_last_regenerate|i:1504422017;'),('bn3agauh8fpl0j42euqbruuto6bfj0mc','162.158.79.107',1502602978,'__ci_last_regenerate|i:1502602978;'),('c00shjjqaqhfoold7ovfveor3cpc0p96','180.252.103.168',1499826955,'__ci_last_regenerate|i:1499826955;'),('c17jcugnfg9i3ovo791beq5d64hk13hb','162.158.79.161',1504422010,'__ci_last_regenerate|i:1504422010;'),('c5k18skjsrups72h6nqkq3bqph7lf6el','162.158.78.76',1503207776,'__ci_last_regenerate|i:1503207776;'),('c7ekg3hnv9nelefrlmk2udhrs73fgihf','162.158.79.47',1503207779,'__ci_last_regenerate|i:1503207779;'),('cnl5f7ifbb74mvm12ve46vjli8iin1pl','172.68.65.84',1502602961,'__ci_last_regenerate|i:1502602961;'),('cpqsdoj8nmlglcegalgmqid05o4152nl','::1',1499770453,'__ci_last_regenerate|i:1499770330;'),('cssu9kvblqa085c7t798kf0ng9t166aq','162.158.78.16',1504422006,'__ci_last_regenerate|i:1504422006;'),('ctagqc8cs44vn45lvep4fhndsnqls2ke','162.158.79.107',1503207773,'__ci_last_regenerate|i:1503207773;'),('cusk2khdtg2jgrthohvr43u0k3jsvqi8','180.252.103.168',1499828321,'__ci_last_regenerate|i:1499828318;'),('dam4v3o5c3i35kr4ma2uhpqvo2ro87jm','120.188.81.189',1500542268,'__ci_last_regenerate|i:1500542268;'),('dddocnrb2n15c5fk2g7ea69fd10plupl','180.252.103.168',1499822478,'__ci_last_regenerate|i:1499822478;'),('diop2tvg4obcodhhfvgb0ker0o6nkgk4','127.0.0.1',1499774298,'__ci_last_regenerate|i:1499774298;'),('dsvjuembq1lojg2dp7g0spp0hkrthme7','162.158.79.209',1503812574,'__ci_last_regenerate|i:1503812574;'),('e18k31ef7v3c9cpn4uhii914snbo6aqi','162.158.79.65',1504422016,'__ci_last_regenerate|i:1504422016;'),('e9afa8n1hudo4rcr96le3b5fqp6s5sah','172.68.65.156',1503812585,'__ci_last_regenerate|i:1503812585;'),('ef8dgss6o77n0ukcp5kivbtj5tmdg23g','172.68.65.84',1504422003,'__ci_last_regenerate|i:1504422003;'),('ehdutks29t4qqqktuqj1k6pitlnsal41','108.162.245.244',1503207761,'__ci_last_regenerate|i:1503207761;'),('eiui9nduurbik9jv56b8rgr1f5lu83ip','::1',1500035942,'__ci_last_regenerate|i:1500035942;'),('ensfridkns0ef8roe9dcrvlobpgace40','162.158.79.23',1501998166,'__ci_last_regenerate|i:1501998166;'),('f2avm0f1l2ciadopvlaob3pgr6rn4ddv','162.158.79.29',1501998178,'__ci_last_regenerate|i:1501998178;'),('f3ej2ck9nh57khm45t2lvike5q7a05gi','110.138.46.222',1499930088,'__ci_last_regenerate|i:1499930088;'),('f3ja3mgsvhq1plebao0oq0oou6p3cftp','162.158.79.95',1501998170,'__ci_last_regenerate|i:1501998170;'),('f4jh8hvocdrl9bebeh7r2omh8gnhuk14','180.252.103.168',1499826955,'__ci_last_regenerate|i:1499826955;'),('f7ukcs0ciucd4p1n1667lhc2fiin15bb','172.68.133.18',1501998158,'__ci_last_regenerate|i:1501998158;'),('fhj492ms8jq0kto759388g33lbfnaroe','172.68.65.126',1501998176,'__ci_last_regenerate|i:1501998176;'),('fkke2oos4ld0tuia6bhhm6u9phqg9s7j','162.158.79.203',1501998159,'__ci_last_regenerate|i:1501998159;'),('fofbd9e5fup3qauhtnfj93kqnpirhflq','112.215.238.145',1499869422,'__ci_last_regenerate|i:1499869417;'),('fqtsur85m0jfj4jcae3kmmhu4sfhvb8v','36.69.157.81',1499846371,'__ci_last_regenerate|i:1499846371;'),('g7dk1q4citkpmob86aaerlcv510e343d','180.252.103.168',1499824015,'__ci_last_regenerate|i:1499824015;'),('g87tb9n4h903lh303q8fdi885s3jdb6d','172.68.142.83',1503812571,'__ci_last_regenerate|i:1503812571;'),('gl66mktt4i7hq2ekhce8buro92c6kpe0','127.0.0.1',1499921550,'__ci_last_regenerate|i:1499921550;'),('gn00mqi70rca05prvkqqmu8s551477c4','112.215.154.205',1499956537,'__ci_last_regenerate|i:1499956516;'),('gr49cpd61sbdl2gam5f0blh572a883l0','162.158.79.29',1504422019,'__ci_last_regenerate|i:1504422019;'),('gsk8flkq0i4lrfqm8e6igscfmjp814au','172.68.65.126',1503207778,'__ci_last_regenerate|i:1503207778;'),('gtjuvrk1qfofs65nujoou96bt1v3b109','180.252.144.147',1499770216,'__ci_last_regenerate|i:1499770211;'),('ha3e5kar3hqh9ttvsu4heth18s9jft30','108.162.246.179',1502602959,'__ci_last_regenerate|i:1502602959;'),('i1038ppanru881gg5c3da0j8nk1rgnm6','110.138.46.222',1499936468,'__ci_last_regenerate|i:1499936467;'),('i59779jea8kg9u9visd1henehp7ogo6c','162.158.79.161',1502602969,'__ci_last_regenerate|i:1502602969;'),('i69l063krhhggq08t6ktch3n4qalg2d5','162.158.79.161',1503207771,'__ci_last_regenerate|i:1503207771;'),('i7spnm33m15nkgm58pb9lfjhb3jtf7t5','172.68.189.25',1502602959,'__ci_last_regenerate|i:1502602959;'),('iiu5bje2nfq1qcehjgbu8cflnejpq2c0','162.158.79.95',1504422012,'__ci_last_regenerate|i:1504422012;'),('j3gvd6ulll23vh522jkp0657qabaims9','162.158.79.107',1502602967,'__ci_last_regenerate|i:1502602967;'),('j3s7o7g3qr2jihb4t6j1791dgdn54d1c','::1',1499958463,'__ci_last_regenerate|i:1499958438;'),('j661phdpohgu17hek0f19geusmsljhkq','162.158.78.76',1504422015,'__ci_last_regenerate|i:1504422015;'),('jf2n5gg8hq5q2ifuhm07vm406ff4f11t','112.215.238.145',1499869424,'__ci_last_regenerate|i:1499869424;'),('jlhdujplm2rfij7t2oncp07uimj1dlfc','162.158.79.29',1503812588,'__ci_last_regenerate|i:1503812588;'),('kh2p0toneaf71r39t6jr5m0lg9nhtfbs','162.158.79.155',1503207767,'__ci_last_regenerate|i:1503207767;'),('kjmepquifm388punuhqjqomm2js0rb54','202.62.18.100',1500092339,'__ci_last_regenerate|i:1500092339;'),('krrp280u2j7vo3s8la2nhplictsumpc1','162.158.79.65',1503812586,'__ci_last_regenerate|i:1503812586;'),('kvrbp6vf53njajes6r3hvv3lqlt15l4t','162.158.78.244',1502602960,'__ci_last_regenerate|i:1502602960;'),('l1ug1su3c5ths47be3731v753vijehlb','108.162.245.250',1503812584,'__ci_last_regenerate|i:1503812584;'),('l4nt69r4celtn8u3f2hdgsvf3o56rajr','162.158.165.70',1504628901,'__ci_last_regenerate|i:1504628900;'),('l6vk4qjp3a4lkievgo8k3jn91ud5gsa4','202.62.18.105',1500088726,'__ci_last_regenerate|i:1500088726;'),('lgp4lea80opchsh62r9m68aegb4g2fsp','162.158.78.106',1503812575,'__ci_last_regenerate|i:1503812575;'),('lintvbln8mdd99r84tb0db8rp8vlful2','162.158.79.59',1501998172,'__ci_last_regenerate|i:1501998172;'),('lngigpa9fmbdg4rgrivrb0638jrfqog5','162.158.78.244',1504421991,'__ci_last_regenerate|i:1504421991;'),('lo8q6i2ghmm95nm4mpumn9h0bt4bpi8v','172.68.65.126',1504422017,'__ci_last_regenerate|i:1504422017;'),('lsors7ciudi53olk0gvlde5md19kv1ej','172.68.65.114',1502602973,'__ci_last_regenerate|i:1502602973;'),('lvcpqij7nm5s6t5cneo39e8clgppv1dj','172.68.65.156',1502602960,'__ci_last_regenerate|i:1502602960;'),('m1qc09dbu4554j9coegp7sk85lmfgut6','162.158.78.148',1503812584,'__ci_last_regenerate|i:1503812584;'),('m65u5qncqdldabif3c8vujsq4fe33fh4','162.158.79.107',1501998166,'__ci_last_regenerate|i:1501998166;'),('mep1e9pq3ht65dq50kcdttbjeqkjf8vd','110.138.46.222',1499930030,'__ci_last_regenerate|i:1499930030;'),('mjkuvt0n4bbmb95l4llruqom1u4smti6','172.68.65.126',1502602977,'__ci_last_regenerate|i:1502602977;'),('mkhkqoetc2slk4mqhrmlirqo9o1couea','180.252.103.168',1499835252,'__ci_last_regenerate|i:1499835252;'),('msgtu54aphknjlqp1tv3ff4oad9lo0lk','::1',1499824746,'__ci_last_regenerate|i:1499824741;'),('mvipggolfcprs1amkveddc4m1c5ujbht','180.252.103.168',1499825898,'__ci_last_regenerate|i:1499825898;'),('nfm4090jmeiafs8d2cpqc25b7i03dr7g','64.233.173.51',1499956649,'__ci_last_regenerate|i:1499956645;'),('npocu7v74n238a1nsvdvl95m9lvo3d1d','162.158.78.106',1503207765,'__ci_last_regenerate|i:1503207765;'),('nqgkghbr4r5jneh61f7t5bdsiaugqo7o','36.84.13.168',1500026683,'__ci_last_regenerate|i:1500026683;'),('o0m5nomv1jt7htlou6p5gkmt16lk01qu','172.68.65.156',1503207762,'__ci_last_regenerate|i:1503207762;'),('o9gcdpb1rmjon84qdqlt1bgmms10g8nl','36.88.156.46',1499845176,'__ci_last_regenerate|i:1499844397;'),('oj4vob1hdulkvn18q4g3af65k68e8nao','36.69.157.81',1499844397,'__ci_last_regenerate|i:1499844397;'),('oprggbs21crtlde7gjiqdsgs5g6sckoq','162.158.79.107',1501998171,'__ci_last_regenerate|i:1501998171;'),('oualil227gkdpvijjvg7d02hla58rfo7','172.68.65.84',1502602970,'__ci_last_regenerate|i:1502602970;'),('ovhdi2g3f8v8evqc25nmu4d2estqspn4','172.68.133.78',1504422025,'__ci_last_regenerate|i:1504422025;'),('ovpug1r1u8ld459ptre63dso9i7ce7f7','127.0.0.1',1504345838,'__ci_last_regenerate|i:1504345838;'),('p1g590u0fvalal1tru97esl7pvjvt149','162.158.79.209',1504422005,'__ci_last_regenerate|i:1504422005;'),('plot38c2ormfcupll2gmli08jidpuiik','172.68.65.84',1503207771,'__ci_last_regenerate|i:1503207771;'),('puur20q5aoqp1kbgqqedbs0ad3eosblk','162.158.79.47',1501998177,'__ci_last_regenerate|i:1501998177;'),('qc45kkl2c5alsgq3588mu6o0190f06qo','162.158.78.16',1501998164,'__ci_last_regenerate|i:1501998164;'),('qc9rbh306u45ggnbjgqen4kdilhss3o9','162.158.79.95',1502602970,'__ci_last_regenerate|i:1502602970;'),('qghnlnh1p5hsdhe1l5m083fhehdu4lm7','172.68.132.215',1502602959,'__ci_last_regenerate|i:1502602959;'),('qi1183i045e4o0fpkhtdbhp6mbi1s1nc','::1',1499958455,'__ci_last_regenerate|i:1499958453;'),('qvk5n5g5dtlaarku4edbtne0ss7sdt1f','162.158.78.148',1502602973,'__ci_last_regenerate|i:1502602973;'),('r3ja6c6j990iuu69rufg0orkqo4gmh1a','180.252.103.168',1499827269,'__ci_last_regenerate|i:1499827269;'),('r4lou4q0rg7inprhgk4hrlknuopdqihb','162.158.79.203',1503207761,'__ci_last_regenerate|i:1503207761;'),('rc1f1tgtvo8nk7v7u4p6u9gec7sj0k6t','172.68.65.114',1501998172,'__ci_last_regenerate|i:1501998172;'),('rhm38hgoapvftjdmdpkj8qvb0e07rrvb','180.252.103.168',1499828326,'__ci_last_regenerate|i:1499828326;'),('rl7i2rtemtpgsu0tp2ur0fa54j6ukman','64.233.173.58',1501219942,'__ci_last_regenerate|i:1501219926;'),('ruasbijkcq6mffmg7t49ha2egve6l56c','162.158.78.244',1503207761,'__ci_last_regenerate|i:1503207761;'),('s2ib5dh3ip91jmvt511qq1f2qss25s4o','162.158.78.106',1501998164,'__ci_last_regenerate|i:1501998164;'),('s46lp546kjo5nuuvt3fbi1qnc2vms0j9','120.188.81.189',1500542268,'__ci_last_regenerate|i:1500542268;'),('s8tpk303j6vkakhcbgr0alfhnm3csv5s','180.252.103.168',1499823579,'__ci_last_regenerate|i:1499823579;'),('sdfj9s5g2lmfsbbpljfoai91j0kisa69','172.68.65.84',1504422011,'__ci_last_regenerate|i:1504422011;'),('sektke8c9v1f3f4h03kftjmc9b3j5qls','162.158.79.95',1503812581,'__ci_last_regenerate|i:1503812581;'),('sl4opi5pdu96v5maaotcpf3q9lou8u9t','162.158.79.155',1502602965,'__ci_last_regenerate|i:1502602965;'),('t0q18rud95lmb49oon7hreocivm0giv1','162.158.78.148',1503207775,'__ci_last_regenerate|i:1503207775;'),('tildgff56t7767al06q838rrfsb770ri','162.158.79.95',1503207772,'__ci_last_regenerate|i:1503207772;'),('tmlrn8ai4222j37gd9smqm20v1gkr5gh','162.158.79.113',1503207774,'__ci_last_regenerate|i:1503207774;'),('tnci9t6v63f7cgc5tau670evct5h5s1a','162.158.79.107',1503812587,'__ci_last_regenerate|i:1503812587;'),('to6i41pjr8qdn7j93hrsumger9imsotj','172.68.133.126',1504421991,'__ci_last_regenerate|i:1504421991;'),('tohedef3sitmice790co6asr41469gj8','162.158.79.29',1503207780,'__ci_last_regenerate|i:1503207780;'),('uhl9d7glop0spqn3l16lqk4il5cle3qv','162.158.79.107',1503812584,'__ci_last_regenerate|i:1503812584;'),('ujocn4c9lrfvrccf9bn9ltibq56ed3et','120.188.78.175',1501223267,'__ci_last_regenerate|i:1501223263;'),('uk56lkntu8pkhad9nha3mn6519osf8nj','162.158.79.209',1501998163,'__ci_last_regenerate|i:1501998163;'),('uqnhjpfnan1va6vitmismlvcrskqnfm1','172.68.65.126',1503812586,'__ci_last_regenerate|i:1503812586;'),('v0957vg698v59btbkmbnj249hlbf3k64','162.158.79.107',1502602971,'__ci_last_regenerate|i:1502602971;'),('vb8p40qn2i0ms628heafnumns9trumsm','172.68.65.114',1503207774,'__ci_last_regenerate|i:1503207774;'),('vf5apc7hk6i086ldqp1i7jaradbl0m30','162.158.79.155',1503812576,'__ci_last_regenerate|i:1503812576;'),('vpdc00qbf8e017rbvhrh55j26c60s2fa','162.158.167.78',1504605093,'__ci_last_regenerate|i:1504605093;'),('vpo8h623ikhclj1didpt9hslsvepcvip','162.158.79.107',1501998174,'__ci_last_regenerate|i:1501998174;'),('vq945fe35kilmu99ck51088c5uhp21ic','162.158.79.107',1503207779,'__ci_last_regenerate|i:1503207779;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `copy_v_kurikulum_p2_screen6`
--

DROP TABLE IF EXISTS `copy_v_kurikulum_p2_screen6`;
/*!50001 DROP VIEW IF EXISTS `copy_v_kurikulum_p2_screen6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `copy_v_kurikulum_p2_screen6` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `gcpa`,
 1 AS `kehadiran`,
 1 AS `jumlah_modul_dihantar`,
 1 AS `bahagian_a`,
 1 AS `bahagian_b`,
 1 AS `status_isi_markah`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`,
 1 AS `id_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_markah_modul2`,
 1 AS `id_ref_kursus`,
 1 AS `id_pengurus_sah`,
 1 AS `pengurus_sah`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cover_photos`
--

DROP TABLE IF EXISTS `cover_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cover_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` int(11) NOT NULL DEFAULT '0',
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cover_photos`
--

LOCK TABLES `cover_photos` WRITE;
/*!40000 ALTER TABLE `cover_photos` DISABLE KEYS */;
INSERT INTO `cover_photos` VALUES (1,2,'45296-2.jpg','active'),(2,1,'2934f-1.jpg','active'),(3,3,'3717d-3.jpg','active');
/*!40000 ALTER TABLE `cover_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelulusan_lpp09`
--

DROP TABLE IF EXISTS `kelulusan_lpp09`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelulusan_lpp09` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `status_pengesahan` int(2) DEFAULT NULL,
  `layak_elaun` int(2) NOT NULL,
  `tarikh_mula_elauan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_tamat_elaun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula_kursus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_tamat_kursus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disahkan_oleh` int(10) NOT NULL,
  `disahkan_pada` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelulusan_lpp09`
--

LOCK TABLES `kelulusan_lpp09` WRITE;
/*!40000 ALTER TABLE `kelulusan_lpp09` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelulusan_lpp09` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_bank`
--

DROP TABLE IF EXISTS `kew_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod_swift` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  `description` varchar(254) NOT NULL,
  `log_update` datetime DEFAULT NULL,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_bank`
--

LOCK TABLES `kew_bank` WRITE;
/*!40000 ALTER TABLE `kew_bank` DISABLE KEYS */;
INSERT INTO `kew_bank` VALUES (1,'BIMBMYKL','BANK ISLAM MALAYSIA BERHAD',1,1,'-','2017-08-23 00:00:00',0),(2,'MBBEMYKL','MALAYAN BANKING BERHAD',1,1,'-','2017-08-23 00:00:00',0),(3,'HLBBMYKL','HONG LEONG BANK',1,1,'-','2017-08-23 00:00:00',0),(4,'RHBBMYKL','RHB BANK BERHAD',1,1,'-','2017-08-23 00:00:00',0),(5,'CIBBMYKL','CIMB BANK BERHAD',1,1,'-','2017-08-23 00:00:00',0),(6,'PBBEMYKL','PUBLIC BANK BERHAD',1,1,'-','2017-08-23 00:00:00',0),(7,'BKRMMYKL','BANK KERJASAMA RAKYAT MALAYSIA BHD (BANK RAKYAT)',1,1,'-','2017-08-23 00:00:00',0),(8,'ARBKMYKL','AM BANK BERHAD',1,1,'-','2017-08-23 00:00:00',0),(9,'CITIMYKL','CITIBANK BERHAD',1,1,'-','2017-08-23 00:00:00',0),(10,'SCBLMYKX','STANDARD CHARTERED BANK MALAYSIA BHD',1,1,'-','2017-08-23 00:00:00',0),(11,'HBMBMYKL','HONGKONG BANK MALAYSIA BHD',1,1,'-','2017-08-23 00:00:00',0),(12,'EOBBMYKL','EON BANK BERHAD',1,1,'-','2012-09-20 02:02:28',0),(14,'EIBBMYKL','EONCAP ISLAMIC BANK BHD',1,1,'-','2012-09-20 02:07:43',0),(15,'BSNAMYK1','BANK SIMPANAN NASIONAL',1,1,'-','2015-01-21 07:44:39',0),(16,'BMMBMYKL','BANK MUAMALAT MALAYSIA BERHAD',1,1,'-','2015-01-26 06:16:47',0),(17,'PHBMMYKL','AFFIN BANK BERHAD',1,1,'-','2015-01-26 06:19:13',0),(18,'UOVBMYKL','UNITED OVERSEAS BANK (MALAYSIA) BERHAD',1,1,'-','2015-01-26 06:20:08',0),(19,'MFBBMYKL','ALLIANCE BANK MALAYSIA BERHAD',1,1,'-','2015-01-28 00:56:48',0),(20,'BKKBMYKL','BANGKOK BANK',1,1,'-','2015-01-28 01:00:44',0),(22,'OCBCMYKL','OCBC BANK MALAYSIA BHD',1,1,'-','2015-01-28 01:02:07',0),(23,'RHBAMYKL','RHB ISLAMIC BANK BHD',1,1,'-','2015-01-28 01:02:53',0),(25,'CTBBMYKL','CIMB ISLAMIC BANK BHD',1,1,'-','2015-01-28 01:04:31',0),(26,'HLIBMYKL','HONG LEONG ISLAMIC BANK BERHAD',1,1,'','2015-01-28 01:04:58',0),(27,'NOSCMYKL','THE BANK OF NOVA SCOTIA BERHAD',1,1,'','2015-01-28 01:05:17',0),(28,'AGOBMYK1','BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)',1,1,'-','2015-01-28 01:48:06',0),(29,'MBISMYKL','MALAYAN BANKING BERHAD SPI (MAYBANK ISLAMIC)',1,1,'-','2017-08-23 00:00:00',0),(30,' ALSRMYKL','ALLIANCE ISLAMIC BANK BERHAD',1,1,'-','2017-02-16 00:27:30',0);
/*!40000 ALTER TABLE `kew_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_dana`
--

DROP TABLE IF EXISTS `kew_dana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_dana` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `code` varchar(11) NOT NULL,
  `description` varchar(254) NOT NULL,
  `date_register` datetime NOT NULL,
  `registrar_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` int(1) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Used for dana definition';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_dana`
--

LOCK TABLES `kew_dana` WRITE;
/*!40000 ALTER TABLE `kew_dana` DISABLE KEYS */;
INSERT INTO `kew_dana` VALUES (1,'MENGURUS','DM','-','2017-08-23 00:00:00',0,200,400000,1,1,'2012-10-09 01:53:00'),(2,'PEMBANGUNAN','DP','-','2017-08-23 00:00:00',0,300,20000,1,1,'2012-10-09 01:54:44'),(3,'KEMENTERIAN KEWANGAN','MOF','-','2017-08-23 00:00:00',0,320.55,55023.4,1,1,'2012-10-09 01:55:20'),(4,'KEMENTERIAN KEMAJUAN LUAR BANDAR DAN WILAYAH','KKLW','-','2017-08-23 00:00:00',0,450.32,670211,1,1,'2012-10-09 01:56:10'),(5,'UNIT PERANCANG EKONOMI, JABATAN PERDANA MENTERI','EPU','-','2017-08-23 00:00:00',0,302,554092,1,1,'2012-10-09 01:56:55'),(6,'PERTUBUHAN KEBANGSAAN MELAYU BERSATU','UMNO','-','2017-08-23 00:00:00',0,239.5,490338,1,1,'2012-10-09 01:57:27'),(7,'MAJLIS AGAMA ISLAM DAN ADAT RESAM MELAYU PAHANG','MUIP','-','2017-08-23 00:00:00',0,320,453023,1,1,'2012-10-09 01:58:01'),(8,'PERBADANAN PETROLIAM NASIONAL','PETR','-','2017-08-23 00:00:00',0,320.4,4440340,1,1,'2012-10-09 01:58:25'),(9,'YAYASAN PELAJARAN MARA','YPM','-','2017-08-23 00:00:00',0,312,4532210,1,1,'2012-10-09 01:58:56'),(10,'KEMENTERIAN PEMBANGUNAN WANITA KELUARGA DAN MASYARAKAT','KPWKM','-','2017-08-23 00:00:00',0,350,432908,1,1,'2012-10-09 01:59:30'),(11,'UNIT PENYELARASAN DAN PELAKSANAAN, JABATAN PERDANA MENTERI','ICU','-','2017-08-23 00:00:00',0,340,329049,1,1,'2012-10-09 01:59:58'),(12,'KEMENTERIAN LUAR NEGERI','KLN','-','2017-08-23 00:00:00',0,180.43,890442,1,1,'2012-10-09 02:00:22'),(13,'KEMENTERIAN WILAYAH PERSEKUTUAN & KESEJAHTERAAN BANDAR','KWPKB','-','2017-08-23 00:00:00',0,500,6033920,1,1,'2012-10-09 02:00:51'),(14,'KERAJAAN NEGERI TERENGGANU','TGANU','-','2017-08-23 00:00:00',0,320.33,6783220,1,1,'2012-10-09 02:01:19'),(15,'HASIL PROJEK LUAR GIATMARA (YURAN PENGURUSAN)','HASIL','-','2017-08-23 00:00:00',0,255.5,6038890,1,1,'2012-10-09 02:01:49'),(16,'TABUNG/DANA PEMBIAYAAN KAKITANGAN','TBNG','-','2017-08-23 00:00:00',0,295.3,9048830,1,1,'2012-10-09 02:02:19'),(17,'LEMBAGA KEMAJUAN TANAH PERSEKUTUAN','FELDA','-','2017-08-23 00:00:00',0,300.32,8499340,1,1,'2012-10-09 02:02:42'),(18,'test_validate1','FELDA','dsdf','2017-08-23 00:00:00',0,123,12314,1,0,'2013-03-26 18:13:41'),(19,'test_validate2','FELDA','sdfa','2017-08-23 00:00:00',0,4352,34523,1,0,'2013-03-26 18:15:02'),(20,'test_validate3','FELDA','fasdf','2017-08-23 00:00:00',0,234123,23412,1,0,'2013-03-26 18:18:21'),(21,'safdfs','','safd','2017-08-23 00:00:00',0,324,23423,1,0,'2013-03-26 18:51:21'),(22,'test_validate4','FELDA','safs','2017-08-23 00:00:00',0,123,423,1,0,'2013-03-26 20:28:04'),(23,'dsaf','sdafs','sdfa','2017-08-23 00:00:00',0,435,45,1,0,'2013-04-08 23:32:02'),(24,'test2','test2','sdfa','2017-08-23 00:00:00',0,435,54,1,0,'2013-04-08 23:35:20'),(25,'asdf','asdf','sdafsd','2017-08-23 00:00:00',0,43,435,1,0,'2013-04-08 23:44:40'),(26,'Dana Ujian 1','DUKK1','Ini adalah dana ujian sahaja','2017-08-23 00:00:00',0,43,332,1,0,'2013-04-08 23:48:36'),(27,'Testing Dana 56','PETRD','Testing sahaja','2017-08-23 00:00:00',0,43,55,1,0,'2013-04-09 00:50:38'),(28,'MENGURUS','DM','SMASH','2017-08-23 00:00:00',0,100,0,1,1,'2013-11-18 00:12:53');
/*!40000 ALTER TABLE `kew_dana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_elaun`
--

DROP TABLE IF EXISTS `kew_elaun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_elaun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `code` varchar(254) NOT NULL,
  `dana_source_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `peringkat_id` int(11) NOT NULL,
  `deduction_frequency` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `peserta_id` int(11) NOT NULL,
  `kew_batch_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_verified` int(11) NOT NULL,
  `verified_by` int(11) NOT NULL,
  `verified_date` datetime NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Untuk Elaun Pelatih';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_elaun`
--

LOCK TABLES `kew_elaun` WRITE;
/*!40000 ALTER TABLE `kew_elaun` DISABLE KEYS */;
INSERT INTO `kew_elaun` VALUES (1,'Elaun Sarahidup 5','ES05',1,1,1,2,'-',2300,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2012-10-05 00:10:15'),(2,'Elaun Tambang Gantian','EG03',11,2,1,2,'-',350,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2012-10-05 00:10:54'),(3,'Elaun Entiti','ET01',12,1,1,3,'-',566,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2012-10-05 00:11:38'),(4,'Elaun Sarahidup 200','ES01',1,2,1,1,'-',200,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2012-10-09 02:04:49'),(5,'Elaun Sarahidup (SMASH)','ES07',1,2,10,1,'-',100,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2012-10-09 02:06:08'),(6,'Testing elaun 2','ESTT2',5,1,1,2,'tiada',43,0,0,0,0,0,0,'2017-08-23 00:00:00',1,'2013-04-09 01:02:16'),(7,'LANJUTAN SEPENUH MASA','LJNFT',1,2,1,1,'ELAUN LANJUTAN SEPENUH MASA',200,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2014-04-06 20:12:11'),(8,'LANJUTAN SEPENUH MASA','ES08',1,2,1,1,'ELAUN LANJUTAN SEPENUH MASA',200,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2014-04-06 20:14:18'),(9,'ELAUN LANJUTAN SMASH','ES09',1,2,11,1,'ELAUN LANJUTAN SEPENUH MASA SEPARUH HARI',100,0,0,0,1,0,0,'2017-08-23 00:00:00',1,'2014-06-17 23:09:05');
/*!40000 ALTER TABLE `kew_elaun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_kod_kombinasi`
--

DROP TABLE IF EXISTS `kew_kod_kombinasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_kod_kombinasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `code_combination_name` varchar(254) NOT NULL,
  `dana_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `peringkat_id` int(11) NOT NULL,
  `negara_code` varchar(2) NOT NULL DEFAULT '',
  `elaun_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `flag` int(1) NOT NULL DEFAULT '1',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `elaun_id` (`elaun_id`),
  CONSTRAINT `kew_kod_kombinasi_ibfk_1` FOREIGN KEY (`elaun_id`) REFERENCES `kew_elaun` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_kod_kombinasi`
--

LOCK TABLES `kew_kod_kombinasi` WRITE;
/*!40000 ALTER TABLE `kew_kod_kombinasi` DISABLE KEYS */;
INSERT INTO `kew_kod_kombinasi` VALUES (1,'','[KKLW][123][PKHSS][MY][ET01]',4,2,3,'MY',3,1,0,'2013-03-18 21:22:29'),(2,'LATIHAN 1 MALAYSIA','[KKLW][LOM][SJLFT][MY][ET01]',4,8,1,'MY',3,1,0,'2013-03-18 21:23:20'),(3,'ELAUN SARA HIDUP RM200','[DM][123][SJLFT][MY][ES01]',1,2,1,'MY',4,1,1,'2013-03-18 21:28:59'),(4,'','[DM][123][SJLFT][MY][ES01]',1,2,1,'MY',5,1,0,'2013-03-25 00:31:26'),(5,'','[EPU][PBR][PKHWL][MP][ES05]',5,9,4,'MP',1,1,0,'2013-04-09 18:05:20'),(6,'','[DM][122][SJLFT][MY][ET01]',1,1,1,'MY',3,1,0,'2013-05-21 00:46:33'),(7,'SMASH','[DM][123][SMASH][MY][ES07]',1,2,10,'MY',5,1,1,'2013-11-18 00:24:36'),(8,'LANJUTAN SEPENUH MASA / INKUBATOR / INPLACE','[DM][123][LJNFT][MY][ET01]',1,2,6,'MY',3,1,1,'2014-04-06 20:21:44'),(10,'LANJUTAN SMASH','[DM][123][LSMASH][MY][ES09]',1,2,11,'MY',9,1,1,'2014-06-17 23:12:18');
/*!40000 ALTER TABLE `kew_kod_kombinasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_negara`
--

DROP TABLE IF EXISTS `kew_negara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_negara` (
  `IC_UID` varchar(2) NOT NULL DEFAULT '',
  `IC_NAME` varchar(255) DEFAULT NULL,
  `IC_SORT_ORDER` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IC_UID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_negara`
--

LOCK TABLES `kew_negara` WRITE;
/*!40000 ALTER TABLE `kew_negara` DISABLE KEYS */;
INSERT INTO `kew_negara` VALUES ('AD','Andorra','\r'),('AE','United Arab Emirates','\r'),('AF','Afghanistan','\r'),('AG','Antigua and Barbuda','\r'),('AI','Anguilla','\r'),('AL','Albania','Albanian sorting order: a-c, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§, d, dh, e, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â«, f-g, gj, h-l, ll, m-n, nj, o-r, rr, s, sh, t, th, u-x, xh, y-z, zh\r'),('AM','Armenia','\r'),('AN','Netherlands Antilles','\r'),('AO','Angola','\r'),('AQ','Antarctica','\r'),('AR','Argentina','Spanish sorting order: a-c, ch, d-l, ll, m-n, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â±, o-z\r'),('AS','American Samoa','\r'),('AT','Austria','\r'),('AU','Australia','\r'),('AW','Aruba','\r'),('AZ','Azerbaijan','\r'),('BA','Bosnia and Herzegovina','\r'),('BB','Barbados','\r'),('BD','Bangladesh','\r'),('BE','Belgium','\r'),('BF','Burkina Faso','\r'),('BG','Bulgaria','\r'),('BH','Bahrain','\r'),('BI','Burundi','\r'),('BJ','Benin','\r'),('BM','Bermuda','\r'),('BN','Brunei Darussalam','\r'),('BO','Bolivia','Spanish sorting order: a-c, ch, d-l, ll, m-n, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â±, o-z\r'),('BR','Brazil','\r'),('BS','Bahamas',NULL),('BT','Bhutan',NULL),('BW','Botswana',NULL),('BY','Belarus',NULL),('BZ','Belize',NULL),('CA','Canada',NULL),('CC','Cocos (Keeling) Islands',NULL),('CD','Congo, The Democratic Republic of the',NULL),('CF','Central African Republic',NULL),('CG','Congo',NULL),('CH','Switzerland',NULL),('CK','Cook Islands',NULL),('CL','Chile',NULL),('CM','Cameroon',NULL),('CN','China',NULL),('CO','Colombia','Spanish sorting order: a-c, ch, d-l, ll, m-n, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â±, o-z\r'),('CR','Costa Rica','\r'),('CS','Serbia and Montenegro',NULL),('CU','Cuba','\r'),('CV','Cape Verde','\r'),('CX','Christmas Island','\r'),('CY','Cyprus','\r'),('CZ','Czech Republic','\r'),('DE','Germany','\r'),('DJ','Djibouti','\r'),('DK','Denmark','a-z, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¦,ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¸,ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¥\r'),('DM','Dominica','\r'),('DO','Dominican Republic','\r'),('DZ','Algeria','\r'),('EC','Ecuador','\r'),('EE','Estonia','Estonian sorting order: a-s, s, z, z,t-v,ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âµ, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¤, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¶, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¼\r'),('EG','Egypt','\r'),('EH','Western Sahara','\r'),('ER','Eritrea','\r'),('ES','Spain','\r'),('ET','Ethiopia','\r'),('FI','Finland','Finnish and Swedish sorting order: a-z, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¥ , ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¤, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¶\r'),('FJ','Fiji','\r'),('FK','Falkland Islands (Malvinas)','\r'),('FM','Micronesia, Federated States of','\r'),('FO','Faroe Islands','\r'),('FR','France','\r'),('GA','Gabon','\r'),('GB','United Kingdom','\r'),('GD','Grenada','\r'),('GE','Georgia','\r'),('GF','French Guiana','\r'),('GG','Guernsey',NULL),('GH','Ghana','\r'),('GI','Gibraltar',NULL),('GL','Greenland',NULL),('GM','Gambia',NULL),('GN','Guinea',NULL),('GP','Guadeloupe',NULL),('GQ','Equatorial Guinea',NULL),('GR','Greece',NULL),('GS','South Georgia and the South Sandwich Islands',NULL),('GT','Guatemala',NULL),('GU','Guam',NULL),('GW','Guinea-Bissau',NULL),('GY','Guyana',NULL),('HK','Hong Kong',NULL),('HM','Heard Island and McDonald Islands',NULL),('HN','Honduras',NULL),('HR','Croatia',NULL),('HT','Haiti',NULL),('HU','Hungary',NULL),('ID','Indonesia',NULL),('IE','Ireland',NULL),('IL','Israel',NULL),('IM','Isle of Man',NULL),('IN','India',NULL),('IO','British Indian Ocean Territory',NULL),('IQ','Iraq',NULL),('IR','Iran, Islamic Republic of',NULL),('IS','Iceland',NULL),('IT','Italy',NULL),('JE','Jersey',NULL),('JM','Jamaica',NULL),('JO','Jordan',NULL),('JP','Japan',NULL),('KE','Kenya',NULL),('KG','Kyrgyzstan',NULL),('KH','Cambodia',NULL),('KI','Kiribati',NULL),('KM','Comoros',NULL),('KN','Saint Kitts and Nevis',NULL),('KP','Korea, Democratic People\'s Republic of',NULL),('KR','Korea, Republic of',NULL),('KW','Kuwait',NULL),('KY','Cayman Islands',NULL),('KZ','Kazakhstan',NULL),('LA','Lao People\'s Democratic Republic',NULL),('LB','Lebanon',NULL),('LC','Saint Lucia',NULL),('LI','Liechtenstein',NULL),('LK','Sri Lanka',NULL),('LR','Liberia',NULL),('LS','Lesotho',NULL),('LT','Lithuania',NULL),('LU','Luxembourg',NULL),('LV','Latvia','Latvian sorting order: a, ?, b-c, ?, ch, d, dz, e, ?, f-g, g?, h-I, ?, ie, j-k, ?, l, ?, m-n, ?, o, ?, p-r, ?, s, ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡, t, u, ?, v, z, ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¾\r'),('LY','Libyan Arab Jamahiriya','\r'),('MA','Morocco','\r'),('MC','Monaco','\r'),('MD','Moldova, Republic of','\r'),('ME','Montenegro',NULL),('MG','Madagascar','\r'),('MH','Marshall Islands','\r'),('MK','Macedonia, The former Yugoslav Republic of','Macedonian sorting order: a-c, ?, d-s, ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡, t-z, ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¾\r'),('ML','Mali','\r'),('MM','Myanmar','\r'),('MN','Mongolia','\r'),('MO','Macao','\r'),('MP','Northern Mariana Islands','\r'),('MQ','Martinique','\r'),('MR','Mauritania','\r'),('MS','Montserrat','\r'),('MT','Malta','\r'),('MU','Mauritius','\r'),('MV','Maldives','\r'),('MW','Malawi','\r'),('MX','Mexico','Spanish sorting order: a-c, ch, d-l, ll, m-n, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â±, o-z\r'),('MY','Malaysia','\r'),('MZ','Mozambique','\r'),('NA','Namibia','\r'),('NC','New Caledonia','\r'),('NE','Niger','\r'),('NF','Norfolk Island','\r'),('NG','Nigeria','\r'),('NI','Nicaragua','\r'),('NL','Netherlands','\r'),('NO','Norway','Norwegian sorting order: a-z, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¦, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¸, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¥\r'),('NP','Nepal',NULL),('NR','Nauru',NULL),('NU','Niue',NULL),('NZ','New Zealand',NULL),('OM','Oman',NULL),('PA','Panama',NULL),('PE','Peru',NULL),('PF','French Polynesia',NULL),('PG','Papua New Guinea',NULL),('PH','Philippines',NULL),('PK','Pakistan',NULL),('PL','Poland',NULL),('PM','Saint Pierre and Miquelon',NULL),('PN','Pitcairn',NULL),('PR','Puerto Rico',NULL),('PT','Portugal',NULL),('PW','Palau','\r'),('PY','Paraguay','\r'),('QA','Qatar','\r'),('RE','Reunion',''),('RO','Romania','\r'),('RS','Serbia',NULL),('RU','Russian Federation','\r'),('RW','Rwanda','\r'),('SA','Saudi Arabia','\r'),('SB','Solomon Islands','\r'),('SC','Seychelles','\r'),('SD','Sudan','\r'),('SE','Sweden','a-z, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¥, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¤, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¶\r'),('SG','Singapore','\r'),('SH','Saint Helena','\r'),('SI','Slovenia','\r'),('SJ','Svalbard and Jan Mayen','\r'),('SK','Slovakia','\r'),('SL','Sierra Leone','\r'),('SM','San Marino','\r'),('SN','Senegal',NULL),('SO','Somalia',NULL),('SR','Suriname',NULL),('ST','Sao Tome and Principe',NULL),('SV','El Salvador',NULL),('SY','Syrian Arab Republic',NULL),('SZ','Swaziland',NULL),('TC','Turks and Caicos Islands',NULL),('TD','Chad',NULL),('TF','French Southern Territories',NULL),('TG','Togo',NULL),('TH','Thailand',NULL),('TJ','Tajikistan',NULL),('TK','Tokelau',NULL),('TL','Timor-Leste','\r'),('TM','Turkmenistan','\r'),('TN','Tunisia','\r'),('TO','Tonga','\r'),('TR','Turkey','Tuskish sorting order: a-c, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§, d-g, g, h,I, I-o, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¶, p-s, s, t-u, ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¼, v-z\r'),('TT','Trinidad and Tobago','\r'),('TV','Tuvalu','\r'),('TW','Taiwan, Province of China','\r'),('TZ','Tanzania, United Republic of','\r'),('UA','Ukraine','\r'),('UG','Uganda','\r'),('UM','United States Minor Outlying Islands','\r'),('US','United States','\r'),('UY','Uruguay','\r'),('UZ','Uzbekistan','\r'),('VA','Holy See (Vatican City State)','\r'),('VC','Saint Vincent and the Grenadines',NULL),('VE','Venezuela',NULL),('VG','Virgin Islands, British',NULL),('VI','Virgin Islands, U.S.',NULL),('VN','Viet Nam',NULL),('VU','Vanuatu',NULL),('WF','Wallis and Futuna',NULL),('WS','Samoa',NULL),('XZ','Installations in International Waters',NULL),('YE','Yemen',NULL),('YT','Mayotte',NULL),('ZA','South Africa',NULL),('ZM','Zambia',NULL),('ZW','Zimbabwe',NULL);
/*!40000 ALTER TABLE `kew_negara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_peringkat`
--

DROP TABLE IF EXISTS `kew_peringkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_peringkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `peringkat_code` varchar(11) NOT NULL,
  `description` varchar(254) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `flag` int(1) NOT NULL DEFAULT '1' COMMENT 'Defined whether a peringkat is deleted or not',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_peringkat`
--

LOCK TABLES `kew_peringkat` WRITE;
/*!40000 ALTER TABLE `kew_peringkat` DISABLE KEYS */;
INSERT INTO `kew_peringkat` VALUES (1,'Sijil Sepenuh Masa','SJLFT','Untuk sijil sepenuh masa',1,1,'2012-09-26 19:17:41'),(2,'Program Khas - Welding Sahaja','PKHWD','-',1,1,'2012-09-26 19:40:21'),(3,'Program Khas - Sabah & Sarawak','PKHSS','-',1,1,'2012-09-26 20:26:47'),(4,'Program Khas - W.P. Labuan','PKHWL','-',1,1,'2012-09-26 23:49:59'),(5,'Program Khas - Semenanjung','PKHSM','-',1,1,'2012-09-26 23:50:19'),(6,'Lanjutan Sepenuh Masa','LJNFT','-',1,1,'2012-09-26 23:50:40'),(7,'Program Khas - Sepenuh Masa','PKHFT','-',1,1,'2012-09-26 23:51:02'),(8,'Program Khas - PUTEK','PUTEK','-',1,1,'2012-09-26 23:51:20'),(9,'Testing 1','ffff','dsf',1,0,'2013-04-17 21:09:32'),(10,'SIJIL SEPENUH MASA SEPARUH HARI','SMASH','SMASH',1,1,'2013-11-18 00:15:55'),(11,'LANJUTAN SMASH','LSMASH','LANJUTAN SEPENUH MASA SEPARUH HARI',1,1,'2014-06-17 22:55:43');
/*!40000 ALTER TABLE `kew_peringkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_potongan`
--

DROP TABLE IF EXISTS `kew_potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_potongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `code` varchar(254) NOT NULL,
  `dana_source_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `peringkat_id` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `value_per_unit` float(5,2) NOT NULL DEFAULT '0.00',
  `enable_formula` int(1) DEFAULT '0' COMMENT 'Whether enable basic formula or not',
  `type` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_verified` int(11) NOT NULL,
  `verified_by` int(11) NOT NULL,
  `verified_date` datetime NOT NULL,
  `deduction_frequency` int(1) NOT NULL,
  `default_selected` int(1) NOT NULL DEFAULT '0',
  `flag` int(1) NOT NULL DEFAULT '1',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Untuk Potongan Pelatih (Borang 7A)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_potongan`
--

LOCK TABLES `kew_potongan` WRITE;
/*!40000 ALTER TABLE `kew_potongan` DISABLE KEYS */;
INSERT INTO `kew_potongan` VALUES (1,'Uniform (1 Helai)','UFM1',1,2,1,'Uniform wajib',19.00,0,0,1,0,0,'2017-08-23 00:00:00',3,0,1,'2012-10-05 00:12:19'),(2,'Uniform (2 Helai)','UFM2',1,2,1,'Untuk tambahan uniform sahaja',38.00,0,0,1,0,0,'2017-08-23 00:00:00',3,0,0,'2012-10-05 00:13:15'),(3,'Insuran','INS3',1,2,1,'POTONGAN INSURAN YPM',9.00,0,0,1,0,0,'2017-08-23 00:00:00',3,1,0,'2015-05-21 17:06:54'),(4,'Denda Tidak Hadir','DTH1',1,2,1,'Kiraan secara manual oleh Pengurus Pusat.',6.60,1,0,0,0,0,'2017-08-23 00:00:00',4,0,1,'2013-02-26 20:43:39'),(12,'DENDA TAK HADIR 2','DTH2',28,15,10,'Kiraan secara manual oleh Pengurus Pusat. ',3.30,0,0,0,0,0,'2017-08-23 00:00:00',4,0,1,'2013-11-18 00:21:15'),(13,'Uniform (3 Helai)','UFM3',1,2,1,'Kemeja-T Seragam Pelatih (3 Helai) Bermula Januari 2015',50.00,0,0,1,0,0,'2017-08-23 00:00:00',3,1,1,'2014-11-27 19:02:56'),(14,'Insuran','INS31',1,2,1,'POTONGAN INSURAN YPM 1 (MENGURUS )',9.00,0,0,1,0,0,'2017-08-23 00:00:00',3,0,1,'2015-05-21 08:39:57'),(15,'Sijil Kemahiran Malaysia','SKM1',1,2,1,'Yuran Peperiksaan SKM',100.00,0,0,1,0,0,'2017-08-23 00:00:00',3,0,1,'2015-10-11 17:59:44');
/*!40000 ALTER TABLE `kew_potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kew_program_giatmara`
--

DROP TABLE IF EXISTS `kew_program_giatmara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kew_program_giatmara` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `code` varchar(3) NOT NULL,
  `jabatan_incharge` varchar(254) NOT NULL,
  `description` varchar(254) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `flag` int(1) NOT NULL DEFAULT '1',
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kew_program_giatmara`
--

LOCK TABLES `kew_program_giatmara` WRITE;
/*!40000 ALTER TABLE `kew_program_giatmara` DISABLE KEYS */;
INSERT INTO `kew_program_giatmara` VALUES (1,'Pembangunan','122','Pelatih','Tiada buat masa ini',1,1,'2012-09-21 01:47:55'),(2,'Mengurus','123','Pelatih','XXX',1,1,'2012-09-23 18:56:14'),(3,'LAIN-LAIN PENTADBIRAN DAN OPERASI','DLL','Tiada','Tiada',1,1,'2012-09-23 19:06:19'),(4,'1 Azam Sarawak','1AS','Pelatih','Tiada',1,1,'2012-09-23 19:18:37'),(5,'Felda Sabah','FLD','Pelatih','-',1,1,'2012-09-26 18:11:21'),(6,'JELAJAH 1 MALAYSIA','JOM','Tiada','Tiada',1,1,'2012-10-12 02:09:44'),(7,'LATIHAN MENJANA PENDAPATAN - PRE','LMP','Pelatih','Tiada',1,1,'2012-10-12 02:10:08'),(8,'LATIHAN 1 MALAYSIA','LOM','Tiada','Tiada',1,1,'2012-10-12 02:10:26'),(9,'PROGRAM BANTUAN RUMAH','PBR','Tiada','Tiada',1,1,'2012-10-12 02:10:44'),(10,'PELATIH LUAR NEGARA','PLN','Tiada','Tiada',1,1,'2012-10-12 02:11:00'),(11,'PINJAMAN/PEMBIAYAAN ANGGOTA KERJA','PNJ','Tiada','Tiada',1,1,'2012-10-12 02:11:22'),(12,'PERANTISAN','PRN','Tiada','Tiada',1,1,'2012-10-12 02:11:43'),(13,'PPRS SABAH - EPU','PRS','Tiada','Tiada',1,1,'2012-10-12 02:11:58'),(14,'PROGRAM PEMBENTUKAN USAHAWAN TEKNIKAL (PUTEK)','PUT','Tiada','Tiada',1,1,'2012-10-12 02:12:15'),(15,'MENGURUS','123','PELATIH','SMASH',1,1,'2013-11-18 00:14:33');
/*!40000 ALTER TABLE `kew_program_giatmara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kurikulum_sijil`
--

DROP TABLE IF EXISTS `kurikulum_sijil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kurikulum_sijil` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `professional` int(2) NOT NULL,
  `professional_no_sijil` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professional_tarikh_jana` date NOT NULL,
  `kemahiran` int(2) NOT NULL,
  `kemahiran_no_sijil` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kemahiran_tarikh_jana` date NOT NULL,
  `eksekutif` int(2) NOT NULL,
  `eksekutif_no_sijil` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eksekutif_tarikh_jana` date NOT NULL,
  `kemahiranlanjutan` int(2) NOT NULL,
  `kemahiranlanjutan_no_sijil` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kemahiranlanjutan_tarikh_jana` date NOT NULL,
  `dicetak_oleh` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kurikulum_sijil`
--

LOCK TABLES `kurikulum_sijil` WRITE;
/*!40000 ALTER TABLE `kurikulum_sijil` DISABLE KEYS */;
/*!40000 ALTER TABLE `kurikulum_sijil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_06`
--

DROP TABLE IF EXISTS `lpp_06`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_06` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `cara_bayaran_asal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_bayaran_baru` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank_asal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank_baru` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_akaun_asal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_akaun_baru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_06`
--

LOCK TABLES `lpp_06` WRITE;
/*!40000 ALTER TABLE `lpp_06` DISABLE KEYS */;
INSERT INTO `lpp_06` VALUES (1,65,'','Cek','','BANGKOK BANK','','123456789',31,'2017-09-05 12:47:32',1,35,'2017-09-07 03:53:06'),(2,69,'','Autopay','','BANK ISLAM MALAYSIA BERHAD','','22334455',31,'2017-09-06 02:33:17',1,35,'2017-09-07 03:53:06'),(3,68,'','Autopay','','AFFIN BANK BERHAD','','223344556',31,'2017-09-06 02:34:10',1,35,'2017-09-07 03:53:06'),(4,65,'','Autopay','','EON BANK BERHAD','','',1,'2017-09-06 02:17:04',NULL,NULL,NULL),(5,94,'autopay','Autopay','1','BANK SIMPANAN NASIONAL','1','999999999999999999',1,'2017-09-06 02:29:11',1,35,'2017-09-07 03:53:06'),(6,94,'autopay','Autopay','1','THE BANK OF NOVA SCOTIA BERHAD','1','0107668154',1,'2017-09-06 02:39:33',1,35,'2017-09-07 03:53:06'),(7,65,'','Autopay','','BANGKOK BANK','','8600000',1,'2017-09-06 02:40:13',NULL,NULL,NULL),(8,65,'','Autopay','','BANK ISLAM MALAYSIA BERHAD','','7679423245790997',1,'2017-09-06 02:40:19',NULL,NULL,NULL),(9,65,'','Autopay','','CIMB BANK BERHAD','','2021214333',1,'2017-09-06 02:40:55',NULL,NULL,NULL),(10,68,'','Autopay','','AFFIN BANK BERHAD','','353684652525',1,'2017-09-06 02:44:12',1,35,'2017-09-07 03:53:06'),(11,65,'','Autopay','','MALAYAN BANKING BERHAD','','153010238614',1,'2017-09-06 02:44:26',1,35,'2017-09-07 03:53:06'),(12,68,'','Autopay','','AFFIN BANK BERHAD','','670090808876',1,'2017-09-06 02:50:22',1,35,'2017-09-07 03:53:06'),(13,94,'autopay','Autopay','1','CIMB BANK BERHAD','1','7689123456',1,'2017-09-06 02:52:53',1,35,'2017-09-07 03:53:06'),(14,68,'','Autopay','','OCBC BANK MALAYSIA BHD','','876543778i9',1,'2017-09-06 02:54:35',1,35,'2017-09-07 03:53:06'),(15,65,'','Autopay','','AFFIN BANK BERHAD','','',1,'2017-09-06 02:55:33',1,35,'2017-09-07 03:53:06'),(16,69,'','Autopay','','CIMB BANK BERHAD','','1234567',31,'2017-09-07 03:44:38',1,35,'2017-09-07 03:53:06');
/*!40000 ALTER TABLE `lpp_06` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_08`
--

DROP TABLE IF EXISTS `lpp_08`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_08` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `status_baru` int(10) NOT NULL,
  `tarikh_kuatkuasa` date NOT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_08`
--

LOCK TABLES `lpp_08` WRITE;
/*!40000 ALTER TABLE `lpp_08` DISABLE KEYS */;
INSERT INTO `lpp_08` VALUES (2,68,1,'2017-09-06',16,'2017-09-06 13:49:35',1,35,'2017-09-07 03:35:49'),(3,94,5,'2017-09-07',7,'2017-09-07 03:34:31',1,35,'2017-09-07 03:35:49'),(4,94,6,'2017-09-07',7,'2017-09-07 03:34:45',NULL,NULL,NULL);
/*!40000 ALTER TABLE `lpp_08` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_10`
--

DROP TABLE IF EXISTS `lpp_10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_10` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `giatmara_baru` int(10) DEFAULT NULL,
  `giatmara_asal` int(10) DEFAULT NULL,
  `kursus_baru` int(10) DEFAULT NULL,
  `kursus_asal` int(10) DEFAULT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci,
  `jenis_pertukaran` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pelatih` (`id_pelatih`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_10`
--

LOCK TABLES `lpp_10` WRITE;
/*!40000 ALTER TABLE `lpp_10` DISABLE KEYS */;
INSERT INTO `lpp_10` VALUES (3,68,64,135,4,1,NULL,NULL,16,'2017-09-06 15:55:22',1,35,'2017-09-07 03:59:47');
/*!40000 ALTER TABLE `lpp_10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_5a`
--

DROP TABLE IF EXISTS `lpp_5a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_5a` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `nama_asal` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_baru` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dihantar_oleh` int(10) DEFAULT NULL,
  `dihantar_pada` datetime DEFAULT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_5a`
--

LOCK TABLES `lpp_5a` WRITE;
/*!40000 ALTER TABLE `lpp_5a` DISABLE KEYS */;
INSERT INTO `lpp_5a` VALUES (1,65,'Nama Penuh','Nama Full',31,'2017-09-04 15:33:48',1,35,'2017-09-07 04:03:07'),(5,68,'Azizul Azman','Abdul Aziz',31,'2017-09-04 15:33:52',1,35,'2017-09-07 04:03:07'),(6,69,'Laily','Lela',31,'2017-09-04 10:33:14',NULL,NULL,NULL),(7,69,'Laily','Lela',31,'2017-09-04 11:59:49',NULL,NULL,NULL),(8,69,'Laily','Lela',31,'2017-09-04 12:05:42',1,35,'2017-09-07 04:03:07'),(9,69,'Laily','Lela',31,'2017-09-04 12:07:19',NULL,NULL,NULL),(10,65,'Nama Penuh','Siti Fatimah Abdul Rahman',31,'2017-09-05 10:08:22',1,35,'2017-09-07 04:03:07'),(11,65,'Nama Penuh','Siti Fatimah Abdul Rahman',31,'2017-09-05 10:09:18',1,35,'2017-09-07 04:03:07'),(12,68,'Azizul Azman','Azizul bin Azman',31,'2017-09-05 12:28:59',1,35,'2017-09-07 04:03:07'),(13,65,'Nama Penuh','Siti Fatimah Abdul Rahman',31,'2017-09-05 12:40:04',NULL,NULL,NULL),(14,65,'Nama Penuh','Siti Fatimah Abdul Rahman',31,'2017-09-05 12:45:09',NULL,NULL,NULL),(15,65,'Nama Penuh','Siti Fatimah Abdul Rahman',31,'2017-09-06 00:40:51',NULL,NULL,NULL),(16,65,'Nama Penuh','Faizal',1,'2017-09-06 02:02:15',NULL,NULL,NULL),(17,65,'Nama Penuh','siti sarah',1,'2017-09-06 02:03:55',NULL,NULL,NULL),(18,68,'Azizul Azman','ABDUL WAHUB BIN ABDUL WAHIB',1,'2017-09-06 02:05:22',1,35,'2017-09-07 04:03:07'),(19,65,'Nama Penuh','siti sarah',1,'2017-09-06 02:06:01',NULL,NULL,NULL),(20,65,'Nama Penuh','saya',1,'2017-09-06 02:06:10',NULL,NULL,NULL),(21,65,'Nama Penuh','rosman',1,'2017-09-06 02:10:05',1,35,'2017-09-07 04:03:07'),(22,65,'Nama Penuh','SITI RABIATUL HUMAIRAH ',1,'2017-09-06 02:10:23',NULL,NULL,NULL),(23,68,'Azizul Azman','ABDULWAHUB BIN ABDUL WAHIB',1,'2017-09-06 02:10:35',NULL,NULL,NULL),(24,71,'qwerty','werty',1,'2017-09-06 02:13:21',NULL,NULL,NULL),(25,94,'qwerty','werty',1,'2017-09-06 02:14:26',NULL,NULL,NULL),(26,69,'Laily','pacrica',1,'2017-09-06 02:16:20',NULL,NULL,NULL),(27,68,'Azizul Azman','Azizul bin Azman',31,'2017-09-06 16:09:32',NULL,NULL,NULL),(28,68,'Azizul Azman','Azizul Azman Abdullah',31,'2017-09-07 00:39:40',NULL,NULL,NULL),(29,69,'Laily','Laily bin Ahmad',31,'2017-09-07 02:59:08',1,35,'2017-09-07 04:03:07'),(30,69,'Laily','Laily binti Abdul',31,'2017-09-07 03:42:31',NULL,NULL,NULL);
/*!40000 ALTER TABLE `lpp_5a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_5b`
--

DROP TABLE IF EXISTS `lpp_5b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_5b` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `mykad_asal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mykad_baru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir_asal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir_baru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_asal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_baru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jantina_asal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jantina_baru` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_5b`
--

LOCK TABLES `lpp_5b` WRITE;
/*!40000 ALTER TABLE `lpp_5b` DISABLE KEYS */;
INSERT INTO `lpp_5b` VALUES (1,65,'123','456','2008-07-01','1997-01-04','9','20','','2',31,'2017-09-04 18:27:34',1,1,'2017-09-06 02:31:16'),(2,65,'123','8800664222','2008-07-01','2017-09-06','9','','','1',1,'2017-09-06 02:05:40',NULL,NULL,NULL),(3,65,'123','6677885443999','2008-07-01','2017-09-06','9','','','1',1,'2017-09-06 02:11:43',NULL,NULL,NULL),(4,65,'123','990123013455','2008-07-01','1999-01-23','9','18','','2',1,'2017-09-06 02:15:25',NULL,NULL,NULL),(5,94,'192837465012','192222222222','1988-06-01','2017-09-06','29','','','1',1,'2017-09-06 02:17:54',NULL,NULL,NULL),(6,65,'123','820515115071','2008-07-01','1982-05-15','9','35','','1',1,'2017-09-06 02:22:38',NULL,NULL,NULL),(7,65,'123','950908086767','2008-07-01','1995-09-08','9','21','','1',1,'2017-09-06 02:22:40',1,1,'2017-09-06 02:31:16'),(8,71,'192837465012','810415055199','1988-06-01','1981-04-15','29','36','','1',1,'2017-09-06 02:22:51',NULL,NULL,NULL),(9,65,'123','991027125002','2008-07-01','1999-10-27','9','17','','2',1,'2017-09-06 02:22:52',NULL,NULL,NULL),(10,65,'123','670217126756','2008-07-01','1967-02-17','9','50','','1',1,'2017-09-06 02:22:55',NULL,NULL,NULL),(11,65,'123','830401025835','2008-07-01','1983-04-01','9','34','','1',1,'2017-09-06 02:23:38',1,1,'2017-09-06 02:31:16'),(12,94,'192837465012','881026025293','1988-06-01','1988-10-26','29','28','','1',1,'2017-09-06 02:23:57',1,1,'2017-09-06 02:31:16'),(13,69,'9900000000000','820515115071','2008-07-01','1982-05-15','9','35','','1',1,'2017-09-06 02:24:01',1,35,'2017-09-06 09:46:49'),(14,69,'9900000000000','851031035323','2008-07-01','1985-10-31','9','31','','2',31,'2017-09-07 02:59:39',NULL,NULL,NULL),(15,69,'9900000000000','891031035224','2008-07-01','1989-10-31','9','27','','2',31,'2017-09-07 03:43:00',1,35,'2017-09-07 03:52:45');
/*!40000 ALTER TABLE `lpp_5b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_5d`
--

DROP TABLE IF EXISTS `lpp_5d`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_5d` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `alamat_asal` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_baru` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poskod_asal` int(10) NOT NULL,
  `poskod_baru` int(10) NOT NULL,
  `kewarganegaraan_asal` int(10) NOT NULL,
  `kewarganegaraan_baru` int(10) NOT NULL,
  `taraf_perkahwinan_asal` int(10) NOT NULL,
  `taraf_perkahwinan_baru` int(10) NOT NULL,
  `no_hp_asal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_baru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_5d`
--

LOCK TABLES `lpp_5d` WRITE;
/*!40000 ALTER TABLE `lpp_5d` DISABLE KEYS */;
INSERT INTO `lpp_5d` VALUES (4,65,'Alamat Surat','Baru',1,6,1,2,1,2,'8899','0987654321',31,'2017-09-05 06:47:18',1,35,'2017-09-06 17:04:40'),(5,65,'Alamat Surat','No 2, Jln3',1,315,1,1,1,1,'8899','0192104054',31,'2017-09-05 12:48:38',NULL,NULL,NULL),(6,65,'Alamat Surat','AAA',1,521,1,1,1,1,'8899','12342111',31,'2017-09-06 03:47:59',1,35,'2017-09-06 17:04:40'),(7,65,'Alamat Surat','',1,13,1,1,1,2,'8899','0194247952',1,'2017-09-06 02:16:37',NULL,NULL,NULL),(8,94,'qwerty','No 1 jalan raja arau, kangar',1,521,1,1,1,2,'12345678','01122211221',1,'2017-09-06 02:24:04',NULL,NULL,NULL),(9,65,'Alamat Surat','old school',1,13,1,1,1,1,'8899','0121234567',1,'2017-09-06 02:29:19',NULL,NULL,NULL),(10,65,'Alamat Surat','alamat lama sana',1,1,1,1,1,2,'8899','019877728282',1,'2017-09-06 02:29:27',1,35,'2017-09-06 17:04:40'),(11,94,'qwerty','lalaalalaa',1,520,1,2,1,4,'12345678','9999',1,'2017-09-06 02:29:43',1,35,'2017-09-06 17:04:40'),(12,65,'Alamat Surat','KAMPUNG KANGAR',1,521,1,1,1,1,'8899','01110831676',1,'2017-09-06 02:29:57',NULL,NULL,NULL),(13,65,'Alamat Surat','240, JALAN KE SYURGA,',1,521,1,1,1,1,'8899','0199999999',1,'2017-09-06 02:30:23',NULL,NULL,NULL),(14,71,'qwerty','Wisma Giatmara',1,278,1,1,1,4,'12345678','01234567890',1,'2017-09-06 02:31:44',NULL,NULL,NULL),(15,65,'Alamat Surat','123 kg kg',1,56,1,1,1,1,'8899','4558689',1,'2017-09-06 02:32:06',1,35,'2017-09-06 17:04:40'),(16,68,'No 18, Jln Lapangan Terbang','SSSSSSSSSSSSSSSSSSSS',7,122,1,1,1,4,'0192104055','01234567890',1,'2017-09-06 02:34:21',1,35,'2017-09-06 17:04:40'),(17,65,'Alamat Surat','no 2, jln 3',1,195,1,1,1,1,'8899','01909008989',1,'2017-09-06 02:48:39',1,35,'2017-09-06 17:04:40'),(18,69,'Alamat Surat','Kampung Pokok Sena',1,521,1,1,2,2,'8899','0112345667',31,'2017-09-07 03:43:41',1,35,'2017-09-07 03:51:58');
/*!40000 ALTER TABLE `lpp_5d` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lpp_7a`
--

DROP TABLE IF EXISTS `lpp_7a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lpp_7a` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `id_kew_potongan` int(10) NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  `dihantar_oleh` int(10) NOT NULL,
  `dihantar_pada` datetime NOT NULL,
  `status_jana` int(2) DEFAULT NULL,
  `dijana_oleh` int(10) DEFAULT NULL,
  `dijana_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lpp_7a`
--

LOCK TABLES `lpp_7a` WRITE;
/*!40000 ALTER TABLE `lpp_7a` DISABLE KEYS */;
INSERT INTO `lpp_7a` VALUES (1,68,1,'2017-09-07','2017-09-30',35,'2017-09-07 03:58:53',NULL,NULL,NULL),(5,68,2,'2017-09-01','2017-09-30',35,'2017-09-07 04:28:17',1,35,'2017-09-07 06:15:42'),(6,68,3,'2017-10-01','2017-10-31',35,'2017-09-07 04:30:04',NULL,NULL,NULL),(7,68,4,'2017-09-08','2017-09-22',35,'2017-09-07 04:31:01',NULL,NULL,NULL),(8,68,12,'2017-09-15','2017-09-29',35,'2017-09-07 04:31:41',NULL,NULL,NULL),(9,69,1,'2016-09-01','2017-09-30',35,'2017-09-07 03:54:23',1,35,'2017-09-07 03:59:19');
/*!40000 ALTER TABLE `lpp_7a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markah_modul`
--

DROP TABLE IF EXISTS `markah_modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markah_modul` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `pb_teori` float(5,2) DEFAULT '0.00',
  `pb_amali` float(5,2) DEFAULT '0.00',
  `pam_teori` float(5,2) DEFAULT '0.00',
  `pam_amali` float(5,2) DEFAULT '0.00',
  `markah` float(5,2) DEFAULT '0.00',
  `status_isi_markah` int(2) DEFAULT '0',
  `tarikh_hantar_pengajar` datetime DEFAULT NULL,
  `tarikh_hantar_pengurus` datetime DEFAULT NULL,
  `tarikh_hantar_pgn` datetime DEFAULT NULL,
  `catatan_pengurus` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_pgn` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_terampil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelatih` (`id_pelatih`),
  CONSTRAINT `markah_modul_ibfk_1` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id_pelatih`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markah_modul`
--

LOCK TABLES `markah_modul` WRITE;
/*!40000 ALTER TABLE `markah_modul` DISABLE KEYS */;
INSERT INTO `markah_modul` VALUES (26,65,275,1468,20.00,0.00,0.00,0.00,14.00,1,NULL,NULL,NULL,'','',0),(27,65,275,1467,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(28,65,275,1466,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(29,71,634,2080,20.00,50.00,12.00,17.00,57.70,1,NULL,NULL,NULL,'','',0),(34,68,32,1986,9.00,50.00,9.00,55.00,60.50,2,'2017-09-07 01:06:44',NULL,NULL,'','',0),(35,69,32,1986,18.00,79.00,16.00,79.00,96.40,0,'0000-00-00 00:00:00',NULL,NULL,'','',0),(38,71,634,2081,0.00,0.00,0.00,0.00,0.00,1,NULL,NULL,NULL,'','',0),(39,71,634,2082,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(40,71,634,2083,20.00,80.00,20.00,80.00,100.00,1,NULL,NULL,NULL,'','',0),(41,71,634,2084,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(42,71,634,2085,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(43,71,634,2086,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(44,71,634,2087,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(45,71,634,2088,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(46,71,634,2089,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(47,71,634,2090,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(48,71,634,2091,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(49,71,634,2092,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(50,71,634,2093,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(51,71,634,2095,20.00,50.00,2.00,50.00,64.60,1,NULL,NULL,NULL,'','',0),(52,69,32,1987,19.00,70.00,15.00,60.00,84.80,0,'2017-09-05 04:36:15',NULL,NULL,'','',0),(53,69,32,1988,17.50,76.40,18.00,70.00,92.13,0,'2017-09-05 04:46:34',NULL,NULL,'','',0),(54,69,32,1990,17.50,70.00,18.00,75.00,89.15,0,'2017-09-05 04:37:16',NULL,NULL,'','',0),(55,69,32,1992,20.00,65.00,16.00,75.00,86.80,0,'2017-09-05 04:37:52',NULL,NULL,'','',0),(56,69,32,1993,5.00,80.00,7.00,45.00,75.10,0,'2017-09-05 04:38:24',NULL,NULL,'','',0),(57,69,32,1994,18.10,76.30,12.40,66.50,89.75,0,'2017-09-05 04:38:50',NULL,NULL,'','',0),(58,69,32,1995,9.88,80.00,19.90,79.00,92.59,0,'2017-09-05 04:39:13',NULL,NULL,'','',0),(59,69,1,1986,0.00,0.00,0.00,0.00,0.00,0,NULL,NULL,NULL,'','',0),(60,68,32,1987,19.00,79.00,20.00,78.00,98.00,0,'2017-09-05 04:33:32',NULL,NULL,'','',0),(61,68,32,1988,19.00,80.00,18.00,75.00,97.20,0,'2017-09-05 04:30:20',NULL,NULL,'','',0),(62,68,32,1990,20.00,80.00,18.00,78.00,98.80,0,'2017-09-05 04:33:02',NULL,NULL,'','',0),(63,68,32,1992,16.01,70.01,17.01,77.01,88.42,0,'2017-09-05 04:31:34',NULL,NULL,'','',0),(64,68,32,1993,9.00,30.00,5.00,40.00,40.80,0,'2017-09-05 04:32:44',NULL,NULL,'','',0),(65,68,32,1994,12.30,54.30,12.80,68.40,70.98,0,'2017-09-05 04:32:05',NULL,NULL,'','',0),(66,68,32,1995,16.00,65.77,19.00,68.00,83.34,0,'2017-09-05 04:30:05',NULL,NULL,'','',0),(67,68,32,1996,15.00,55.00,12.00,45.00,66.10,0,'2017-09-05 04:30:58',NULL,NULL,'','',0),(68,65,275,1467,13.00,14.00,15.00,16.00,28.20,6,NULL,NULL,NULL,'','',0),(69,65,275,1468,13.00,14.00,15.00,16.00,28.20,6,NULL,NULL,NULL,'','',0),(70,65,275,1469,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(71,65,275,1470,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(72,65,275,1471,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(74,65,275,1472,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(75,65,275,1473,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(76,65,275,1474,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(77,65,275,1475,13.00,14.00,15.00,16.00,28.20,1,NULL,NULL,NULL,'','',0),(78,69,32,1996,15.40,65.60,15.80,68.90,82.11,0,'2017-09-05 04:44:16',NULL,NULL,'','',0),(125,94,142,1986,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,'sasa',NULL,NULL),(126,94,142,1987,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,'',NULL,NULL),(127,94,142,1988,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,'sasa',NULL,NULL),(128,94,142,1990,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(129,94,1,1992,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(130,94,1,1993,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(131,94,1,1994,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(132,94,1,1995,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(133,94,1,1996,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `markah_modul` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `markah_modul_before_insert` BEFORE INSERT ON `markah_modul`
FOR EACH ROW BEGIN

-- SET new.markah = (
--	(
--		new.pb_teori * 20 / 100 + new.pb_amali * 80 / 100
--	) * 70 / 100 + (
--		new.pam_teori * 20 / 100 + new.pam_amali * 80 / 100
--	) * 30 / 100
-- ) ;

if (select pb_teori from ref_markah) < new.pb_teori then
     set @message_text = concat('pb_teori tidak boleh lebih dari ',  (select pb_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pb_amali from ref_markah) < new.pb_amali then
     set @message_text = concat('pb_amali tidak boleh lebih dari ',  (select pb_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_teori from ref_markah) < new.pam_teori then
     set @message_text = concat('pam_teori tidak boleh lebih dari ',  (select pam_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_amali from ref_markah) < new.pam_amali then
     set @message_text = concat('pam_amali tidak boleh lebih dari ',  (select pam_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
else
     SET new.markah = (
	(
		new.pb_teori + new.pb_amali
	) * 70 / 100 + (
		new.pam_teori + new.pam_amali
	) * 30 / 100
) ;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `markah_modul_after_insert` AFTER INSERT ON `markah_modul`
FOR EACH ROW BEGIN

SELECT SUM((poin_keterampilan))/SUM(jam_kredit) into @vargcpa FROM v_kurikulum_p1_screen2_detail WHERE id_kursus = new.id_kursus AND id_pelatih = new.id_pelatih;

UPDATE markah_modul_2 SET gcpa = @vargcpa WHERE id_kursus = new.id_kursus AND id_pelatih = new.id_pelatih;

 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `markah_modul_before_update` BEFORE UPDATE ON `markah_modul`
FOR EACH ROW BEGIN

-- SET new.markah = (
--	(
--		new.pb_teori * 20 / 100 + new.pb_amali * 80 / 100
--	) * 70 / 100 + (
--		new.pam_teori * 20 / 100 + new.pam_amali * 80 / 100
--	) * 30 / 100
-- ) ;
if (select pb_teori from ref_markah) < new.pb_teori then
     set @message_text = concat('pb_teori tidak boleh lebih dari ',  (select pb_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pb_amali from ref_markah) < new.pb_amali then
     set @message_text = concat('pb_amali tidak boleh lebih dari ',  (select pb_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_teori from ref_markah) < new.pam_teori then
     set @message_text = concat('pam_teori tidak boleh lebih dari ',  (select pam_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_amali from ref_markah) < new.pam_amali then
     set @message_text = concat('pam_amali tidak boleh lebih dari ',  (select pam_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
else
     SET new.markah = (
	(
		new.pb_teori + new.pb_amali
	) * 70 / 100 + (
		new.pam_teori + new.pam_amali
	) * 30 / 100
) ;
end if;

 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `markah_modul_after_update` AFTER UPDATE ON `markah_modul`
FOR EACH ROW BEGIN

SELECT SUM((poin_keterampilan))/SUM(jam_kredit) into @vargcpa FROM v_kurikulum_p1_screen2_detail WHERE id_kursus = new.id_kursus AND id_pelatih = new.id_pelatih;

UPDATE markah_modul_2 SET gcpa = @vargcpa WHERE id_kursus = new.id_kursus AND id_pelatih = new.id_pelatih;

 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `markah_modul_2`
--

DROP TABLE IF EXISTS `markah_modul_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markah_modul_2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `gcpa` float(3,2) DEFAULT NULL,
  `kokurikulum` int(2) DEFAULT NULL,
  `literasi_komputer` int(2) DEFAULT NULL,
  `keusahawanan` int(2) DEFAULT NULL,
  `puji` int(2) DEFAULT NULL,
  `kehadiran` int(3) DEFAULT NULL,
  `latihan_industri` int(2) DEFAULT NULL,
  `status_isi_markah` int(2) DEFAULT NULL,
  `tarikh_hantar_pengajar` datetime DEFAULT NULL,
  `tarikh_hantar_pengurus` datetime DEFAULT NULL,
  `tarikh_hantar_pgn` datetime DEFAULT NULL,
  `catatan_pengurus` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_pgn` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markah_modul_2`
--

LOCK TABLES `markah_modul_2` WRITE;
/*!40000 ALTER TABLE `markah_modul_2` DISABLE KEYS */;
INSERT INTO `markah_modul_2` VALUES (1,71,634,1.81,0,1,1,1,23,1,1,NULL,NULL,NULL,'',''),(2,69,32,3.75,0,0,0,2,80,0,7,'2017-09-05 04:47:28',NULL,NULL,'',''),(3,68,32,3.16,0,0,0,1,89,0,6,'2017-09-05 04:34:04',NULL,NULL,'',''),(4,65,275,NULL,0,1,1,1,23,1,1,NULL,NULL,NULL,'',''),(5,94,142,NULL,NULL,NULL,NULL,2,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `markah_modul_2` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `markah_modul2_before_insert` BEFORE INSERT ON `markah_modul_2`
FOR EACH ROW BEGIN

SELECT SUM((poin_keterampilan))/SUM(jam_kredit) into @vargcpa FROM v_kurikulum_p1_screen2_detail WHERE id_kursus = new.id_kursus AND id_pelatih = new.id_pelatih;

SET new.gcpa = @vargcpa;

 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `markah_modul_status`
--

DROP TABLE IF EXISTS `markah_modul_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markah_modul_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `pengurus` int(2) NOT NULL,
  `pengurus_sah` datetime NOT NULL,
  `pgn` int(2) NOT NULL,
  `pgn_sah` datetime NOT NULL,
  `ppkl` int(2) NOT NULL,
  `ppkl_sah` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markah_modul_status`
--

LOCK TABLES `markah_modul_status` WRITE;
/*!40000 ALTER TABLE `markah_modul_status` DISABLE KEYS */;
INSERT INTO `markah_modul_status` VALUES (1,68,6,'2017-09-05 08:51:09',0,'2017-09-06 00:00:00',0,'0000-00-00 00:00:00'),(2,69,6,'2017-09-05 21:39:26',0,'2017-09-06 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `markah_modul_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelatih`
--

DROP TABLE IF EXISTS `pelatih`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelatih` (
  `id_pelatih` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `no_pelatih` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jangan dipakai',
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `jenis_pelatih` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LPP04' COMMENT 'LPP04 / LPP09',
  `status_pelatih` int(2) NOT NULL,
  `id_settings_tawaran_kursus` int(10) DEFAULT NULL,
  `kelayakan_elaun` int(2) DEFAULT NULL,
  `nama_bank` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_akaun` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_bayaran` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kew_kod_kombinasi` int(10) DEFAULT NULL,
  `tarikh_mula_kursus` date DEFAULT NULL,
  `tarikh_tamat_kursus` date DEFAULT NULL,
  PRIMARY KEY (`id_pelatih`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_permohonan` (`id_permohonan`),
  KEY `id_kew_kod_kombinasi` (`id_kew_kod_kombinasi`),
  CONSTRAINT `pelatih_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `pelatih_ibfk_2` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `pelatih_ibfk_5` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_kursus` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `pelatih_ibfk_6` FOREIGN KEY (`id_kew_kod_kombinasi`) REFERENCES `kew_kod_kombinasi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatih`
--

LOCK TABLES `pelatih` WRITE;
/*!40000 ALTER TABLE `pelatih` DISABLE KEYS */;
INSERT INTO `pelatih` VALUES (65,51,'406118700025','123',18,30,'LPP04',1,NULL,0,'','','',1,NULL,NULL),(68,87,'406118700026','821110145677',135,32,'LPP04',1,32,0,'','','',1,NULL,NULL),(69,86,'1234567890','0987654321',135,32,'LPP04',1,32,0,'','','',3,NULL,NULL),(71,95,'6543217890','6789012345',135,634,'LPP04',1,634,0,'','','',1,NULL,NULL),(94,95,'2017087892','192837465012',3,142,'LPP04',1,NULL,NULL,'1','1','autopay',1,'2017-08-25',NULL);
/*!40000 ALTER TABLE `pelatih` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `pelatih_after_insert` AFTER INSERT ON `pelatih`
FOR EACH ROW BEGIN

  DECLARE bDone INT;

  DECLARE var1 INT;
  
  DECLARE curs CURSOR FOR SELECT ref_modul.id_modul FROM ref_modul WHERE ref_modul.id_kursus = (SELECT settings_tawaran_kursus.id_kursus FROM settings_tawaran_kursus WHERE settings_tawaran_kursus.id = new.id_kursus);
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET bDone = 1;

SET @idtemuduga = (SELECT temuduga_tetapan.id FROM temuduga_tetapan WHERE temuduga_tetapan.id_permohonan = new.id_permohonan);
SET @idkewpotongan = (SELECT temuduga_tetapan_potongan.id_kew_potongan FROM temuduga_tetapan_potongan WHERE temuduga_tetapan_potongan.id_temudga_tetapan = @idtemuduga);

-- INSERT INTO pelatih_potongan (id_pelatih, id_kew_potongan) VALUES (new.id_pelatih, @idkewpotongan);

  OPEN curs;

  REPEAT
    FETCH curs INTO var1;

    -- INSERT INTO markah_modul (id_pelatih, id_kursus, id_modul) VALUES (new.id_pelatih, new.id_kursus, var1);

  UNTIL bDone END REPEAT;

  CLOSE curs;

  -- INSERT INTO markah_modul_2 (id_pelatih, id_kursus) VALUES (new.id_pelatih, new.id_kursus);

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pelatih_potongan`
--

DROP TABLE IF EXISTS `pelatih_potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelatih_potongan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `id_kew_potongan` int(10) NOT NULL,
  `tarikh_ditambah` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatih_potongan`
--

LOCK TABLES `pelatih_potongan` WRITE;
/*!40000 ALTER TABLE `pelatih_potongan` DISABLE KEYS */;
INSERT INTO `pelatih_potongan` VALUES (14,94,3,NULL),(15,94,15,NULL);
/*!40000 ALTER TABLE `pelatih_potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_butir_peribadi`
--

DROP TABLE IF EXISTS `permohonan_butir_peribadi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_butir_peribadi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir` date NOT NULL,
  `kewarganegaraan` int(10) NOT NULL,
  `umur` int(3) NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poskod` int(10) NOT NULL,
  `emel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jantina` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangsa` int(10) NOT NULL,
  `etnik` int(10) NOT NULL,
  `agama` int(10) NOT NULL,
  `taraf_perkahwinan` int(10) NOT NULL,
  `kategori_kelulusan` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelulusan` int(10) DEFAULT NULL,
  `matlamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pemohon` int(10) NOT NULL,
  `no_rujukan_permohonan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengesahan` int(2) NOT NULL,
  `pengakuan` int(2) NOT NULL,
  `tarikh_hantar` datetime DEFAULT NULL,
  `id_admin_user` int(11) DEFAULT NULL,
  `jenis_lpp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_pelatih_record` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kewarganegaraan` (`kewarganegaraan`),
  KEY `bangsa` (`bangsa`),
  KEY `etnik` (`etnik`),
  KEY `agama` (`agama`),
  KEY `taraf_perkahwinan` (`taraf_perkahwinan`),
  KEY `kategori_pemohon` (`kategori_pemohon`),
  KEY `poskod` (`poskod`),
  KEY `kelulusan` (`kelulusan`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_10` FOREIGN KEY (`kelulusan`) REFERENCES `ref_kelulusan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_11` FOREIGN KEY (`kategori_pemohon`) REFERENCES `ref_kategori_pemohon` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_12` FOREIGN KEY (`poskod`) REFERENCES `ref_poskod_bandar_negeri` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_13` FOREIGN KEY (`kelulusan`) REFERENCES `ref_kelulusan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_4` FOREIGN KEY (`kewarganegaraan`) REFERENCES `ref_kewarganegaraan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_6` FOREIGN KEY (`bangsa`) REFERENCES `ref_bangsa` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_7` FOREIGN KEY (`etnik`) REFERENCES `ref_etnik` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_8` FOREIGN KEY (`agama`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_9` FOREIGN KEY (`taraf_perkahwinan`) REFERENCES `ref_taraf_perkahwinan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_butir_peribadi`
--

LOCK TABLES `permohonan_butir_peribadi` WRITE;
/*!40000 ALTER TABLE `permohonan_butir_peribadi` DISABLE KEYS */;
INSERT INTO `permohonan_butir_peribadi` VALUES (15,'sasa','4242','1998-07-02',2,23,'323232','32323','adasdasdadas',2,'iran@gmail.com',NULL,2,2,3,4,'Akademi',1,'Bekerja',2,'sasas',1,0,NULL,NULL,NULL,NULL),(17,'asasada','12133','2009-07-11',2,12,'088787','867886','dsadasfs',3,'asisten91@gmail.com',NULL,2,7,2,4,'0',4,'asas',4,'123131',0,0,'2017-07-21 00:00:00',NULL,NULL,NULL),(53,'test','11111','2017-07-27',1,1,'23','321','alamat',1,'test@gmail.com',NULL,1,2,1,3,'1',2,'test2',3,'rujukan',0,0,'2017-07-27 00:29:51',NULL,NULL,NULL),(65,'Nama Penuh','123','2008-07-01',1,9,'123','8899','Alamat Surat',1,'ninolooh@gmail.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',2,'2017070001',1,1,'2017-07-26 00:00:00',NULL,'LPP04',NULL),(71,'Nama Penuh 2','456','2007-07-01',2,10,'1234','5678','Alamat Surat Menyurat',1,'ninolooh@gmail.com',NULL,2,3,1,1,'Akademi',1,'Bekerja',2,'2017070002',1,2,'2017-07-30 00:00:00',NULL,NULL,NULL),(72,'Fika','9999','2007-07-01',1,10,'123','8899','Alamat Surat',1,'ninolooh@gmail.com',NULL,1,1,1,2,'Akademi',2,'Berniaga Sendiri',2,'2017070003',1,2,'2017-07-31 00:00:00',NULL,NULL,NULL),(73,'test3','test3','1997-07-24',1,20,'1234','1234','test3',2,'test3@test3.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',2,'2017070004',1,2,'2017-07-31 00:00:00',NULL,NULL,NULL),(74,'Test Nino','888','2007-01-01',2,10,'123','8899','Alamat',1,'ninolooh@gmail.com',NULL,1,2,1,2,'Akademi',1,'Bekerja',2,'2017070005',1,2,'2017-07-31 00:00:00',NULL,NULL,NULL),(75,'Nama Penuh','123456789012','2007-07-01',1,10,'123','8899','Alamat Surat',3,'bambytop@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080022',1,2,'2017-08-18 00:00:00',NULL,NULL,NULL),(76,'Laily','9900000000000','2008-07-01',1,9,'123','8899','Alamat Surat',1,'ninolooh@gmail.com',NULL,2,2,1,2,'Akademi',1,'Bekerja',2,'2017080007',1,2,'2017-08-07 00:00:00',NULL,NULL,NULL),(96,'Nama Penuh','123456789013','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080008',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(97,'Nama Penuh','123456789014','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080009',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(98,'Nama Penuh','123456789015','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080010',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(99,'Nama Penuh','123456789016','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080011',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(100,'Nama Penuh','123456789017','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080012',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(101,'Nama Penuh','123456789018','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080013',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(102,'Nama Penuh','123456789019','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080014',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(103,'Nama Penuh','123456789010','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080015',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(104,'Nama Penuh','123456789011','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080016',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(105,'Nama Penuh','123456789020','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080017',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(106,'Nama Penuh','123456789021','2007-07-01',1,10,'123','8899','Alamat Surat',3,'ninolooh@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',2,'2017080018',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(107,'sasa','4242','1998-07-02',2,23,'323232','32323','adasdasdadas',2,'iran@gmail.com',NULL,2,2,3,4,'Akademi',1,'Bekerja',2,'2017080019',1,2,'2017-08-08 00:00:00',NULL,NULL,NULL),(111,'Azizul Azman','821110145677','1982-11-10',1,35,'0389008900','0192104055','No 18, Jln Lapangan Terbang',7,'maizun@mmsc.com.my',NULL,1,1,1,1,'Akademik',1,'Bekerja',2,'2017080021',1,2,'2017-08-16 00:00:01',NULL,NULL,NULL),(116,'qwerty','192837465012','1988-06-01',1,29,'12345678','12345678','qwerty',1,'bambytop@gmail.com',NULL,1,1,1,1,'Kemahiran',1,'Bekerja',2,'2017080022',1,2,'2017-08-20 00:00:00',NULL,NULL,NULL),(122,'sfsdf','670101112323','2017-08-24',1,20,'0192103434','0192103434','No. 2, Jln 3',315,'maizun@mmsc.com.my',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017080023',0,2,'2017-08-24 00:00:00',NULL,NULL,NULL),(123,'erwrwr&#039;aa','800101112233','2017-08-25',1,30,'0192104054','019210008909','sdfsdfs',195,'maizun.mn@gmaill.com',NULL,1,2,2,1,'Akademi',1,'Melanjutkan Pelajaran',1,'2017080024',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(124,'Adhitya Ramadian','327511040880','1980-08-04',1,37,'0878887','089987755','malang',5,'adhitya.ramadian@gmail.com',NULL,1,1,1,2,'Kemahiran',1,'Bekerja',1,'2017080025',0,2,'2017-08-26 00:00:00',NULL,NULL,NULL),(125,'Siti Fatihah binti Abdul Rahman','790713145824','1979-07-13',1,38,'0173331012','0173331012','SUNGAI MERAB LUAR',195,'fatihah79@gmail.com',NULL,1,1,1,2,'Akademi',3,'Bekerja',3,'2017080026',1,2,'2017-09-02 00:00:00',NULL,NULL,NULL),(126,'Prihantoosa','918273645463','1997-08-18',1,20,'01123465647','01182764736','KL',1,'saya@toosa.id',NULL,1,1,1,2,'Akademi',1,'Bekerja',3,'2017080027',0,2,'2017-09-03 00:00:00',NULL,NULL,NULL),(127,'Maizun Bin Mohd Noor','800101112211','1980-08-06',1,37,'0192018900','0192018900','No 2, Jln 3.',315,'maizun@mmsc.com.my',NULL,1,1,1,1,'Akademi',4,'Melanjutkan Pelajaran',3,'2017080028',0,2,'2017-08-29 00:00:00',NULL,NULL,NULL),(128,'Test Zulyantara','345678901234','1983-08-25',1,34,'0987654321','0987654321','Test Zulyantara',4,'ajahtara@gmail.com',NULL,1,1,1,1,'Kemahiran',1,'Melanjutkan Pelajaran',3,'2017080029',0,2,'2017-08-29 00:00:00',NULL,NULL,NULL),(129,'Test Zulyantara','234567890123','1998-08-29',1,19,'12345678','0987654321','Alamat Test',4,'ajahtara@gmail.com',NULL,1,1,1,1,'Kemahiran',1,'Bekerja',3,'2017080030',0,2,'2017-08-29 00:00:00',NULL,NULL,NULL),(130,'Test Zulyantara 2','456789012345','1998-08-29',1,19,'12345678','0987654321','Test Alamat',4,'ajahtara@gmail.com',NULL,1,1,1,1,'Kemahiran',1,'Melanjutkan Pelajaran',3,'2017080031',0,2,'2017-08-29 00:00:00',NULL,NULL,NULL),(131,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090032',0,2,'2017-09-02 00:00:00',NULL,NULL,NULL),(132,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090033',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(133,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090034',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(134,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090035',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(135,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090036',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(136,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090037',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(137,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090038',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(138,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090039',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(139,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090040',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(140,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090041',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(141,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090042',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(142,'&#039;Amira Buhari','901112145756','1990-11-12',1,27,'0389009089','01921089099','No. 2, Jln 3',315,'maizun.mn@gmaill.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090043',0,2,'2017-09-01 00:00:00',NULL,NULL,NULL),(143,'test','456789012345','1998-09-21',1,19,'1234567','0987654321','test',361,'test@test.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090044',0,2,'2017-09-02 00:00:00',NULL,NULL,NULL),(144,'test 5','567890123456','1998-09-02',1,19,'123456','0987654321','test',361,'test@test.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090045',0,2,'2017-09-02 00:00:00',NULL,NULL,NULL),(145,'test 6','678901234567','1998-09-01',1,19,'1234567','0987654321','test',4,'ajahtara@gmail.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090046',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(146,'Siti Fatimah Abdul Rahman','790713145816','1979-07-13',1,38,'0390553999','0129757479','Lot 7154, Jalan Melati 4',195,'fatimah@mmsc.com.my',NULL,1,1,1,2,'Akademi',3,'Bekerja',3,'2017090047',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(147,'Test 7','789012345678','1998-09-01',1,19,'12345678','0987654321','Test 7',4,'ajahtara@gmail.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090048',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(148,'Pelatih11','112233445566','2000-09-03',1,17,'0112233','01122331','KL',1,'pelatih11@gmail.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',3,'2017090049',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(149,'Ahmad Azizi','911112145546','1991-11-12',1,26,'0389008989','0192104044','No 2, Jln Sutera 2',315,'ahmad@noemail.com',NULL,1,1,1,1,'Akademi',2,'Melanjutkan Pelajaran',3,'2017090050',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(150,'Situah Ariff bin Zakaria','790904105999','1979-09-04',1,38,'0390553999','0173337855','Lot 45332, Jalan Imam Othman',195,'fatihah79@gmail.com',NULL,1,1,1,2,'Akademi',3,'Bekerja',3,'2017090051',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(151,'Amirul Ahmad','900101112324','1990-01-01',1,27,'0890909998','0198908797','No 3, Jln 3',315,'amirul@noemail.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090052',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(152,'Fatin Shira','900101112233','1990-01-01',1,27,'0389008989','01989098989','No 3, Jln2',315,'fatin@noemail.com',NULL,1,1,1,1,'Kemahiran',1,'Melanjutkan Pelajaran',3,'2017090053',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(153,'Zahirah ANuar','821112145755','1982-11-12',1,35,'0389009090','0192109090','No 2, Jln 3',315,'zahirah@noemail.com',NULL,1,1,1,1,'Akademi',4,'Melanjutkan Pelajaran',3,'2017090054',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(154,'MOHD HARMIZI BIN HAZMI','820515115071','1986-09-18',1,31,'092222222','01992292222','SDD',55,'harmizi@yahoo.com',NULL,1,1,1,1,'Kemahiran',1,'Berniaga Sendiri',3,'2017090055',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(155,'mohd fuad bin omar','790409055453','1979-04-09',1,38,'064581950','0192482566','bahau',345,'fuadomar79@gmail.com',NULL,1,1,1,2,'Akademi',3,'Berniaga Sendiri',4,'2017090056',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(156,'Mohd Faiz Bin Baz','881026035291','1988-10-26',1,29,'0326912690','01126034056','Wisma Giatmara',278,'kew@giatmara.edu.my',NULL,1,1,1,1,'Akademi',4,'Melanjutkan Pelajaran',4,'2017090057',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(157,'Atan Bin Abu','881026012345','1988-10-26',1,29,'0326912690','0173317093','no.102,blok 9, jalan dinar,',278,'shahila@giatmara.edu.my',NULL,1,1,1,2,'Akademi',3,'Bekerja',3,'2017090058',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(158,'siti minah bt ahmad','860708595346','1998-09-02',1,19,'01110625432','01110625432','kg kubang kangar',301,'nor@gmail.com',NULL,5,8,7,4,'Akademi',3,'Bekerja',3,'2017090059',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(159,'MOHD SOLLEHUDDIN BIN ISMAIL','830401025835','1983-04-01',1,34,'049178101','0174506880','NO 322, TAMAN MAHSURI',9,'sollehuddin@giatmara.edu.my',NULL,1,1,1,2,'Akademi',3,'Bekerja',3,'2017090060',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(160,'rostina hussain','780202125566','1978-02-02',1,39,'0198200278','0198200278','sjiadasd',1,'rostina@giatmra.edu.my',NULL,1,1,1,2,'Akademi',4,'Bekerja',3,'2017090061',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(161,'Zara Qisha bt Mohd Yazid','790615105001','0000-00-00',1,2002,'0112345678','0112345678','No 1 Jalan Melati, Taman Melawati Jaya',211,'aliazhatul@gmail.com',NULL,1,1,1,2,'Akademi',3,'Berniaga Sendiri',3,'2017090062',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(163,'MOHD ZISHAMUDIN BIN RAHMAT','830708065495','0000-00-00',1,34,'03 80613470','0139799009','GIATMARA PUCHONG, BATU 13 JALAN KELANG, ',240,'zishamudin@giatmara.edu.my',NULL,1,1,1,2,'Akademi',2,'Berniaga Sendiri',4,'2017090063',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(164,'Dhia','980301145673','1998-03-03',1,19,'0','0112525675','no.23, blok 6',278,'dhia@gmail.com',NULL,1,1,1,1,'Akademi',3,'Melanjutkan Pelajaran',3,'2017090064',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(165,'Azira Arif','911112145542','1991-11-12',1,26,'092104055','019210890021','No 2, Jln 3.',315,'azira@noemail.com',NULL,1,1,1,1,'Akademi',4,'Melanjutkan Pelajaran',3,'2017090065',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(166,'aminah binti jamil','720325075672','1972-03-25',1,45,'047217181','0116789102','140 jalan kempas, taman mahsuri, simpang empat',142,'aminah@yahoo.com',NULL,1,1,1,1,'Akademi',3,'Melanjutkan Pelajaran',3,'2017090066',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(167,'MOHD NORDIN SALLEH ','770419115095','1977-04-19',1,40,'-','0105567982','TIADA',167,'nordin@giatmara.edu.my',NULL,1,1,1,2,'Akademi',4,'Berniaga Sendiri',3,'2017090067',1,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(168,'SITI BT ABDUL MALIT','691027125002','1969-10-27',1,48,'0194095906','0192158142','240, JITRA',9,'octoberfebruari@gmail.com',NULL,1,1,1,2,'Akademi',4,'Melanjutkan Pelajaran',4,'2017090068',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(169,'Abdul Ghafur','010904086767','2001-09-04',1,16,'055234543','0199989986','Lot 2332, Jalan Chenderawsih',111,'kakimubaucagu@ketikbom.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',3,'2017090069',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(187,'Abdul Ghafur Al Buaya','rf55654','1990-09-04',1,27,'88721331','01222346756','Lot 1163 Jalan Chenderawasih',111,'kakimucagu@gmail.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',3,'2017090070',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(188,'MOHAMED RAYYAN MERICAN','800808085624','1996-09-03',1,21,'0345635536','0199998989','NO 5 MERBAU SEMPAK',239,'rayyan@gmail.com',NULL,1,1,1,2,'Akademi',1,'Melanjutkan Pelajaran',2,'2017090071',0,2,'2017-09-04 00:00:00',NULL,NULL,NULL),(208,'ABU BIN BAZ','881026025555','1988-10-26',1,29,'0326912690','0139944278','WISMA GIATMARA',308,'abu@gmail.com',NULL,1,1,1,1,'Akademi',3,'Bekerja',3,'2017090072',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(209,'ALI BIN ABU','791029025599','2017-09-29',1,38,'-','0194705511','LOT 40 JALAN BESAR, HUTAN MELINTANG',158,'kroll@yahoo.com',NULL,1,1,1,2,'Akademi',3,'Bekerja',4,'2017090073',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(210,'siti rohaya','610620026446','2017-09-20',1,40,'0','0194709469','2121 taman berjaya',142,'siti@gmail.com',NULL,1,1,1,2,'Akademi',3,'Berniaga Sendiri',4,'2017090074',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(211,'MOHD RIFAE MARICAN','770707077007','1977-07-07',1,40,'0345666666','0193959953','no 66 jalan bs 1/1',239,'rifae@giatmara.edu.my',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',1,'2017090075',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(212,'Pelatih22','111122334455','2000-09-07',1,17,'0','0','Perlis',1,'22@gmail.com',NULL,1,1,1,1,'Akademi',1,'Bekerja',3,'2017090076',1,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(213,'Pelatih23','222233445566','2000-09-13',1,17,'0','0','Perlis',521,'a@g.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090077',0,2,'2017-09-05 00:00:00',NULL,NULL,NULL),(214,'Siti Fadzillah Razak','790713145814','1979-07-13',1,38,'0173331010','0173331010','Lot 3082, Kampung Sungai Merab Luar',195,'fadzillah@gmail.com',NULL,1,1,1,1,'Akademi',4,'Bekerja',3,'2017090078',1,2,'2017-09-06 00:00:00',NULL,NULL,NULL),(215,'Siti Mariam Abdul Rahman','800124101800','1980-01-24',1,37,'0193331010','0193331010','Lot 3082, Kampung Sungai Merab Luar',195,'mariam@gmail.com',NULL,1,1,1,1,'Akademi',3,'Melanjutkan Pelajaran',2,'2017090079',1,2,'2017-09-06 00:00:00',NULL,NULL,NULL),(216,'Maizun','780101112312','1978-01-01',1,39,'08789090900','0190808988','No 2, Jln 3',315,'maizun@noemail.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090080',1,2,'2017-09-06 00:00:00',NULL,NULL,NULL),(217,'Mazni Ali','891010112233','1989-01-01',1,28,'038900909088','019210090890','No. 2, Jln 3',315,'mazni@noemail.com',NULL,1,1,1,1,'Akademi',1,'Melanjutkan Pelajaran',3,'2017090081',1,2,'2017-09-07 00:00:00',NULL,NULL,NULL),(218,'Pelatih33','112233443322','2000-09-12',1,17,'0','0','ARAU',1,'a@aracu.com',NULL,1,1,1,1,'Kemahiran',1,'Bekerja',3,'2017090082',1,2,'2017-09-07 00:00:00',NULL,NULL,NULL),(219,'Danial Ariff bin Situah Ariff','790907105999','1979-09-07',1,38,'0173331012','0173331012','Lot 45333, Jalan Imam Othman, Kampung Sungai Merab Luar',195,'danial@noemail.com',NULL,1,1,1,1,'Akademi',3,'Melanjutkan Pelajaran',3,'2017090083',1,2,'2017-09-07 00:00:00',NULL,NULL,NULL);
/*!40000 ALTER TABLE `permohonan_butir_peribadi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_dokumen`
--

DROP TABLE IF EXISTS `permohonan_dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_dokumen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `nama_dokumen` varchar(250) NOT NULL,
  `path_dokumen` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_dokumen`
--

LOCK TABLES `permohonan_dokumen` WRITE;
/*!40000 ALTER TABLE `permohonan_dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `permohonan_dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_kursus`
--

DROP TABLE IF EXISTS `permohonan_kursus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL COMMENT 'harusnya id_pemohon, dari id butir_pribadi',
  `kursus1` int(10) NOT NULL,
  `kursus2` int(10) NOT NULL,
  `kursus3` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kursus1` (`kursus1`),
  KEY `kursus2` (`kursus2`),
  KEY `kursus3` (`kursus3`),
  KEY `id_permohonan` (`id_permohonan`),
  CONSTRAINT `permohonan_kursus_ibfk_13` FOREIGN KEY (`kursus1`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `permohonan_kursus_ibfk_14` FOREIGN KEY (`kursus2`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `permohonan_kursus_ibfk_15` FOREIGN KEY (`kursus3`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `permohonan_kursus_ibfk_16` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_butir_peribadi` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_kursus`
--

LOCK TABLES `permohonan_kursus` WRITE;
/*!40000 ALTER TABLE `permohonan_kursus` DISABLE KEYS */;
INSERT INTO `permohonan_kursus` VALUES (51,65,30,31,32),(56,71,30,31,32),(59,72,30,31,32),(69,73,30,31,32),(74,74,30,31,32),(86,76,527,522,32),(87,111,523,522,524),(95,116,389,144,636),(98,126,636,635,143),(99,131,31,30,882),(100,125,30,389,636),(101,147,30,635,30),(102,148,634,882,144),(103,149,31,30,635),(104,150,527,35,280),(105,151,144,30,389),(106,152,636,883,389),(107,153,30,388,882),(108,168,277,634,770),(109,167,774,882,145),(110,161,387,776,636),(111,159,634,523,527),(112,163,525,31,30),(113,164,35,30,635),(114,155,31,769,769),(115,188,774,774,774),(116,154,769,31,31),(117,157,527,31,528),(121,166,527,634,635),(122,158,527,522,634),(123,165,634,32,635),(124,187,882,522,522),(125,160,522,635,526),(126,208,527,634,279),(127,209,636,637,635),(128,210,635,389,388),(129,211,524,277,771),(130,212,390,145,637),(131,146,30,389,636),(132,214,30,389,636),(133,215,30,389,883),(134,216,886,917,916),(135,217,901,887,903),(136,218,387,524,389),(137,219,888,903,887);
/*!40000 ALTER TABLE `permohonan_kursus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_kursus_lpp09`
--

DROP TABLE IF EXISTS `permohonan_kursus_lpp09`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_kursus_lpp09` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `kategori_program` varchar(10) NOT NULL,
  `id_settings_tawaran_kursus` int(10) DEFAULT NULL,
  `id_kluster` int(10) DEFAULT NULL,
  `no_ssm` varchar(100) DEFAULT NULL,
  `alamat_perniagaan` text,
  `id_program_pertandingan` int(10) DEFAULT NULL,
  `id_program_khas` int(10) DEFAULT NULL,
  `tawaran_terus` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_kursus_lpp09`
--

LOCK TABLES `permohonan_kursus_lpp09` WRITE;
/*!40000 ALTER TABLE `permohonan_kursus_lpp09` DISABLE KEYS */;
INSERT INTO `permohonan_kursus_lpp09` VALUES (7,87,'LL',30,0,'','',0,0,1);
/*!40000 ALTER TABLE `permohonan_kursus_lpp09` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_maklumat_am`
--

DROP TABLE IF EXISTS `permohonan_maklumat_am`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_maklumat_am` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `media_cetak` int(1) NOT NULL DEFAULT '0',
  `media_elektronik` int(1) NOT NULL DEFAULT '0',
  `internet` int(1) NOT NULL DEFAULT '0',
  `media_sosial` int(1) NOT NULL DEFAULT '0',
  `rakan` int(1) NOT NULL DEFAULT '0',
  `keluarga` int(1) NOT NULL DEFAULT '0',
  `pameran` int(1) NOT NULL DEFAULT '0',
  `lain` int(1) NOT NULL DEFAULT '0',
  `text_lain` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_permohonan` (`id_permohonan`),
  CONSTRAINT `permohonan_maklumat_am_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_butir_peribadi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_maklumat_am`
--

LOCK TABLES `permohonan_maklumat_am` WRITE;
/*!40000 ALTER TABLE `permohonan_maklumat_am` DISABLE KEYS */;
INSERT INTO `permohonan_maklumat_am` VALUES (20,15,0,0,0,0,0,0,0,0,''),(23,65,1,1,0,0,0,0,0,0,''),(26,71,1,1,0,0,0,0,0,0,''),(29,72,1,0,1,0,0,0,0,0,''),(30,73,1,1,0,0,0,0,0,0,''),(31,73,1,1,0,0,0,0,0,0,''),(32,73,0,0,0,0,1,0,0,0,''),(33,73,0,0,0,0,1,0,0,0,''),(34,73,0,0,0,0,1,0,0,0,''),(35,73,0,0,0,0,1,0,0,0,''),(36,73,0,0,0,0,1,0,0,0,''),(37,73,0,0,0,0,0,1,0,0,''),(38,73,0,0,0,1,0,0,0,0,''),(39,73,1,0,0,0,0,0,0,0,''),(40,74,1,0,0,0,0,0,0,0,''),(41,74,0,0,0,0,0,1,0,0,''),(42,74,1,0,0,0,0,0,0,0,''),(43,74,1,0,0,0,0,0,0,0,''),(44,74,1,1,0,0,0,0,0,0,''),(45,65,1,0,1,0,0,0,0,0,''),(46,65,1,0,1,0,0,0,0,0,''),(47,65,1,0,1,0,0,0,0,0,''),(57,116,0,0,0,0,1,0,0,0,''),(58,124,1,1,0,0,0,0,0,0,''),(59,125,0,0,1,0,0,0,0,0,''),(60,126,1,0,1,1,0,0,0,0,'      '),(61,127,1,1,0,0,0,0,0,0,''),(62,129,1,0,0,0,0,0,0,0,''),(63,131,1,1,0,0,0,0,0,0,''),(64,130,1,0,0,0,0,0,0,0,''),(65,144,1,0,0,0,0,0,0,0,''),(66,146,0,0,1,0,0,0,0,0,' '),(67,147,0,0,1,0,0,0,0,0,' '),(68,148,1,0,0,0,0,0,0,0,'  '),(69,149,1,1,0,0,0,0,0,0,' '),(70,150,0,1,0,0,0,0,0,0,' '),(71,151,0,1,0,0,0,0,1,0,' '),(72,152,0,1,0,0,0,0,0,0,' '),(73,153,0,1,1,0,0,0,0,0,' '),(74,158,1,0,1,0,1,0,0,0,' '),(75,165,0,0,0,0,0,1,1,0,' '),(76,161,0,0,0,0,0,0,1,0,' '),(77,164,0,0,1,0,0,0,0,0,' '),(78,167,1,1,1,1,1,1,1,1,'botol air mineral '),(79,166,0,0,0,0,0,1,0,0,'  '),(80,160,0,1,0,0,0,0,0,0,'  '),(81,155,0,0,0,0,1,0,0,0,' '),(82,163,1,0,1,1,1,0,1,0,' '),(83,154,0,0,0,1,0,0,0,0,' '),(84,159,1,0,0,0,0,0,0,0,' '),(85,157,1,0,0,0,0,0,0,0,' '),(86,168,0,0,1,0,1,1,1,0,' '),(87,187,0,0,0,0,0,1,0,0,' '),(88,188,1,0,0,0,0,0,0,0,' '),(89,208,1,0,0,0,0,0,0,0,' '),(90,209,0,0,0,0,0,1,0,0,' '),(91,210,1,0,0,0,0,0,0,0,' '),(92,211,0,1,1,0,0,0,0,0,' '),(93,212,1,0,0,0,0,0,0,0,' '),(94,214,1,0,0,0,0,0,0,0,' '),(95,215,0,1,0,0,0,0,0,0,' '),(96,216,0,0,1,1,0,0,0,0,' '),(97,217,0,1,1,0,0,0,0,0,' '),(98,218,1,0,0,0,0,0,0,0,' '),(99,219,1,0,0,0,0,0,0,0,' ');
/*!40000 ALTER TABLE `permohonan_maklumat_am` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_penjaga`
--

DROP TABLE IF EXISTS `permohonan_penjaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_penjaga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `maklumat` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_hubungan` int(10) DEFAULT NULL,
  `a_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_kewarganegaraan` int(10) DEFAULT NULL,
  `a_kategori_penjaga` int(10) DEFAULT NULL,
  `a_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_agama` int(10) DEFAULT NULL,
  `a_etnik` int(10) DEFAULT NULL,
  `a_bangsa` int(10) DEFAULT NULL,
  `a_alamat` text COLLATE utf8mb4_unicode_ci,
  `a_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_pendapatan` int(10) DEFAULT NULL,
  `a_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  `b_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_kewarganegaraan` int(10) DEFAULT NULL,
  `b_kategori_penjaga` int(10) DEFAULT NULL,
  `b_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_agama` int(10) DEFAULT NULL,
  `b_etnik` int(10) DEFAULT NULL,
  `b_bangsa` int(10) DEFAULT NULL,
  `b_alamat` text COLLATE utf8mb4_unicode_ci,
  `b_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_pendapatan` int(10) DEFAULT NULL,
  `b_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  `c_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_kewarganegaraan` int(10) DEFAULT NULL,
  `c_kategori_penjaga` int(10) DEFAULT NULL,
  `c_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_agama` int(10) DEFAULT NULL,
  `c_etnik` int(10) DEFAULT NULL,
  `c_bangsa` int(10) DEFAULT NULL,
  `c_alamat` text COLLATE utf8mb4_unicode_ci,
  `c_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_pendapatan` int(10) DEFAULT NULL,
  `c_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `id_permohonan` (`id_permohonan`),
  CONSTRAINT `permohonan_penjaga_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_butir_peribadi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_penjaga`
--

LOCK TABLES `permohonan_penjaga` WRITE;
/*!40000 ALTER TABLE `permohonan_penjaga` DISABLE KEYS */;
INSERT INTO `permohonan_penjaga` VALUES (16,65,'2','Nama Penuh 2',2,'Awam','1234',1,2,'4455','6677',1,2,2,'ALamat Tetap 2','1','Pekerjaan',1,'Majikan 2','123','456','ALamat Pejabat 2','Nama Penuh Bapa','Awam','12345',1,1,'1234','5678',1,2,1,'Alamat Tetap','6789','Pekerjaan',1,'Majikan','123','456','Alamat Pejabat','Nama Penuh Ibu','Awam','667788',1,2,'456','88997',1,2,2,'Alamat Tetap','6789','Pekerjaan',2,'Madjikan','789','999','Alamat Pejabat'),(19,71,'2','Nama Penuh 2',3,'Awam','88888',2,1,'6789','9876',2,4,2,'Alamat Tetap','1','Pekerjaan',2,'Majikan 2','123','456','Alamat Pejabat 2','Nama Penuh Bapa','Awam','44444',1,1,'123','456',2,1,2,'Alamat tetap','1','Pekerjaan',1,'Majikan','123','456','Alamat Pejabat','Nama Penuh Ibu','Awam','77777',2,1,'5566','8899',2,1,1,'Alamat tetap','1','Pekerjaan',1,'Madjikan','789','999','Alamat pejabat ada disini'),(24,75,'2','test',1,'Awam','1234',1,1,'1234','1234',1,1,1,'test','02400','test',1,'test','1234','1234','test','test','Awam','1234',1,1,'123','1234',1,1,1,'test','02600','test',1,'test','1324','1234','test','test','Awam','1234',1,1,'1234','134',1,1,1,'test','02600','test',1,'test','1234','1234','1234'),(26,116,'2','abc',4,'Tentera','102938475610',1,1,'87654321','87654321',1,1,1,'asd','02600','qwerty',5,'zzz','87654321','321','cde','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(27,127,'2','Mohd Noor',2,'Awam','780101111122',1,3,'0289009089','0192109090',1,1,1,'No 2, Jln 3','57100','IT Officer',1,'MMSC','0389008978','-','No. 5, Jln A','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(28,129,'2','Test Waris',1,'Awam','234567890123',1,1,'12345678','0987654321',1,1,1,'Test Alamat','02400','Test Pekerjaan',1,'Test Majikan','12345678','1234','Test Alamat Pejabat','Test Bapak 1','Awam','345678901234',1,1,'12345678','0987654321',0,0,0,'Test Alamat','02400','Test Pekerjaan 1',0,'Test Majikan 1','12345678','12345','Test Alamat Pejabat','Test Ibu 1','Awam','234567890123',0,0,'12345678','0987654321',0,0,0,'Test Alamat','02400','Test Pekerjaan',1,'Test Majikan','12345678','1234','Test Alamat Pejabat'),(29,131,'2','nama penjaga',3,'Awam','811112145544',1,1,'0389009090','0192104054',1,1,1,'No 2','43000','Kerja',1,'-','0389008987','123','alamat pejabat','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(30,131,'2','nama penjaga',3,'Awam','800111134545',1,4,'0389008900','0192108080',1,1,1,'no 2','43000','kerja',2,'aaa','0890908989','-','almt pjbt','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(31,131,'2','nama penjaga',3,'Awam','800111134545',1,4,'0389008900','0192108080',1,1,1,'no 2','43000','kerja',2,'aaa','0890908989','111','almt pjbt','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(32,125,'2','Situah Ariff',2,'Awam','790904105999',1,4,'0390553999','0173337855',1,1,1,'Sungai Merab','43000','Pengurus',5,'ABC','90553999','307','Sungai Besi','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(33,125,'2','Situah Ariff',2,'Awam','790904105999',1,4,'0390553999','0173337855',1,1,1,'Sungai Merab','43000','Pengurus',5,'ABC','90553999','307','Sungai Besi','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(34,125,'2','Situah Ariff',2,'Awam','790904105999',1,4,'0390553999','0173337855',1,1,1,'Sungai Merab','43000','Pengurus',5,'ABC','90553999','307','Sungai Besi','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(35,146,'2','Abdul Rahman Abdullah',3,'Awam','521031035323',1,3,'0387411030','0123861030',1,1,1,'Lot 7154, Jalan Melati 4','43000','Pensyarah',5,'Universiti Kebangsaan Malaysia','038880000','304','UKM, Bangi','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(36,147,'2','test 7',1,'Awam','789012345678',1,1,'1234567','0987654321',1,1,1,'test','02400','test',1,'test','123456','1','test','test 7','Awam','789012345678',1,1,'12345678','0987654321',0,0,0,'test','02400','test',0,'test','1234','1','test','test 7','Awam','789012345678',0,0,'123456','0987654321',0,0,0,'test','02400','test',1,'test','123456','1','test'),(37,148,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','Bapak11','Awam','112233445561',1,4,'098776554','098765',0,0,0,'Perlis','2600','Dagang',0,'Sendiri','0','0','Perlis','Ibu 11','Awam','112233445562',0,0,'0','0',0,0,0,'Perlis','2600','Ibu',1,'Tak ada','0','0','Perlis'),(38,149,'2','Azizi Ali',3,'Awam','780101111212',1,3,'0389009090','01989787666',1,1,1,'No 2, Jln 3','57100','Tiada',1,'Tiada','0389009090','11','No 3, Jl;n 3','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(39,150,'2','Zakaria Mohamad',3,'Awam','601031035323',1,3,'0331229788','0123861031',1,1,1,'Telok Panglima Garang','47500','Pesara',4,'Tiada','0331229788','111','Tiada','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(40,151,'2','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(41,152,'2','Anuar Ali',3,'Awam','780101234445',1,4,'0890989978','01989009089',1,1,1,'No 3, Jln 3','57100','Tiada',1,'Tiada','0345667676','123','No 3, Jln 2','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(42,153,'2','Anuar Buhari',3,'Awam','780101121456',1,4,'08909898911','0192103456',1,1,1,'No 3, Jln 4','43000','Tiada',1,'Tiada','0890908988','111','No 3, Jln 4','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(46,126,'2','qwerty',1,'Awam','876543211111',1,1,'87654321','87654321',1,1,1,'qq','02600','Qqq',1,'qqq','87654321','321','qq','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(47,158,'2','mamat bin dollah',3,'Awam','123456781212',1,3,'123456789','123456789',7,8,5,'was kg kji','16100','tiada',2,'-','-','-','-','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(48,168,'2','HASHIM AHMAD',2,'Awam','410225075009',1,4,'0192158142','0192158142',1,1,1,'240','06000','BERNIAGA',5,'SENDIRI','0192158142','','240','RABIAH MARAJAN','Awam','401004125044',1,4,'0192158142','0192158142',0,0,0,'240',' 89600','BERNIAGA',0,'SENDIRI','0192158142','','','RABIAH MARAJAN','Awam','401004125044',0,0,'0192158142','0194095906',0,0,0,'240','06000','BERNIAGA',5,'SENDIRI','0192158142','','240'),(49,167,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','Salleh','Awam','540605050100',1,3,'0326912690','0123456543',0,0,0,'462','50300','peneroka',0,'felda','0326912690','','pejabat felda','RAMLAH','Awam','650402115436',0,0,'0326912690','0123456789',0,0,0,'felda','50300','surirumah',1,'tiada','0326912690','','tiada'),(50,159,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','ISMAIL BIN PUTEH','Awam','650102025445',1,3,'0194735445','0194735445',0,0,0,'NO 322 TAMAN MAHSURI ','06000','PERSENDIRIAN',0,'TIADA','0','0','TIADA','FADZILAH BINTI KASSIM','Awam','700512021080',0,0,'0121234567','0121234567',0,0,0,'NO 322 TAMAN MAHSURI ','06000','SURI RUMAH',1,'TIADA','TIADA','TIADA','TIADA'),(51,155,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','omar bin ludin ','Awam','451116055031',1,3,'064630190','0192463449',0,0,0,'gemas','72120','peneroka',0,'felda','064630100','331','saassss22112','-','Awam','123456769801',0,0,'-','-',0,0,0,'gemas','72120','-',1,'-','-','','-'),(52,161,'2','SHAHRIL BIN AMIR',2,'Awam','790517145111',1,3,'0312345678','0123456789',1,1,1,'NO 1 JALAN MELATI TAMAN MELAWATI JAYA','45000','KAKITANGAN KERAJAAN',5,'JABATAN PERDANA MENTERI','0388889999','1234','ARAS 4, BAHAGIAN SEKSYEN MAKLUMAT, JABATAN PERDANA MENTERI','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(53,164,'2','osman bin ali',3,'Awam','701123045656',1,3,'0','0102342345',1,1,1,'61 blok 4','81700','-',2,'-','-','','-','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(54,163,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','RAHMAT BIN ALIAS','Awam','820303065164',1,3,'0380613470','0123456789',0,0,0,'TRIANG PAHANG','47100','PENYELIA',0,'FELDA','-','-','TRIANG PAHANG','SHAMSIAH BINTI MAD SALLEH','Awam','123455678910',0,0,'038989898','0123456789',0,0,0,'TRIANG PAHANG','47100','SURI RUMAH',1,'-','-','','TIADA'),(55,157,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','abu bin abas','Awam','420424105411',1,3,'00','0192425100',0,0,0,'no.103,blok 9,jalan dinar','40150','pembantu tadbir',0,'seroja','0378414287','214','seroja, ','hani binti halim','Awam','421011105034',0,0,'0','01289009090',0,0,0,'no.103,blok 9,jalan dinar','40150','surirumah',1,'tiada','0','0','tiada'),(56,154,'2','MZMZMZ',3,'Awam','780345035145',1,3,'999','999',1,1,1,'SSS','16200','SSS',4,'SSS','-','-','-','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(57,165,'2','anuar ali',3,'Awam','800111123434',1,3,'01921045444','01920343311',1,1,1,'no 2, jln 3','57100','tiada',1,'abf','034567678879','111','no 3, jln. 4','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(58,166,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','jamil bin ahmad','Awam','670514081561',1,2,'056716171','01161718181',0,0,0,'140 jalan kempas, taman mahsuri, simpang empat','34400','-',0,'-','-','','-','aminah bt ali','Awam','780909089098',0,0,'05678767','0167898789',0,0,0,'140 jalan kempas, taman mahsuri, simpang empat','34400','surirumah',1,'-','-','-','-'),(59,166,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','jamil bin ahmad','Awam','670514081561',1,2,'056716171','01161718181',0,0,0,'140 jalan kempas, taman mahsuri, simpang empat','34400','-',0,'-','-','','-','aminah bt ali','Awam','780909089098',0,0,'05678767','0167898789',0,0,0,'140 jalan kempas, taman mahsuri, simpang empat','34400','surirumah',1,'-','-','-','-'),(60,160,'2','jasmani bahari',3,'Awam','670212125568',1,2,'0889128827','01187267221',1,1,1,'jahskhskddhkahsladsd','89600','berniaga',2,'sendiri','019221002992','tiada','tiada','','Awam','',0,0,'','',0,0,0,'','   ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(61,208,'2','BAZ BIN BUS',3,'Awam','701026015293',1,4,'0326912690','0139944279',1,1,1,'WISMA GIATMARA','50300','PEROMPAK',5,'MAYBANK','0326912690','234','WISMA MAYBANK','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(62,187,'2','Al Buyau Ibn Ghafran',4,'Awam','710808080777',1,4,'078898875','076565435643',1,1,1,'Lot 1163 , Jalan Chenderawasih','30000','Pesara',1,'Makan Pencen ','0888888888','888888','Nak alamat pejabat apa nya? aku dah tak kojer...','','Awam','',0,0,'','',0,0,0,'','  ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(63,210,'2','amir b abu',3,'Awam','123456789101',1,3,'034567565','0194709469',1,1,1,'2121 tmn BERJAYA','34400','KERANI',2,'JKM','045678','111','124 TM ALI','','Awam','',0,0,'','',0,0,0,'','   ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(64,211,'1','',0,'Awam','',0,0,'','',0,0,0,'','','',0,'','','','','MOHD ALI MARICAN','Awam','460720075431',1,4,'034567890','0197767676',0,0,0,'NO 77 JALAN BS 1/2','47000','KERANI',0,'LHDN','034543454','1111','LHDN KUALA LUMPUR','ZALIKHA','Awam','470706076566',0,0,'067878776','01232323232',0,0,0,'NO 77 JALAN BS 1/2','47000','TIDAK',1,'TIADA','087676565','232','ADA'),(65,212,'2','Waris',3,'Awam','111122334451',1,4,'0','0',1,1,1,'Perlis','01000','dagang',1,'-','0','0','-','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(66,214,'2','Razak bin Ali',3,'Awam','521031105323',1,3,'0123861010','0123861010',1,1,1,'Lot 3082, Kampung Sungai Merab Luar','43000','Tidak Bekerja',1,'Tidak Berkenaan','0123861010','-','Tiada','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(67,215,'2','Abdul Rahman Abdullah',3,'Awam','621031035333',1,3,'0113861010','0113861010',1,1,1,'Lot 3082, Kampung Sungai Merab Luar','43000','Tidak Bekerja',1,'Tidak Berkenaan','-','-','Tiada','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(68,216,'2','Mohd Ali',3,'Awam','700111121323',1,4,'0389009098','0198909876',1,1,1,'No 2, Jln 3','57100','Tiada',1,'Tiada','0389009098','102','No 3, Jln 4','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(69,217,'2','Azizi Ahmad',3,'Awam','701112145555',1,4,'0389009089','01789098766',1,1,1,'No 3, Jln 4','57100','Tiada',1,'Tiada','0389786677','111','Tiada','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(70,218,'2','Wakil Pelatih33',3,'Awam','112233443321',1,4,'0','0',1,1,1,'ARAU','2600','Dagang',1,'-','0','0','-','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','',''),(71,219,'2','Situah Ariff Zakaria',3,'Awam','520904105999',1,3,'0173337855','0173337855',1,1,1,'Lot 45333, Jalan Imam Othman, Kampung Sungai Merab Luar','43000','Kerani',4,'ABC Sdn Bhd','0390553999','305','Jalan Damai 5/3, Medan Niaga Tasik Damai','','Awam','',0,0,'','',0,0,0,'',' ','',0,'','','','','','Awam','',0,0,'','',0,0,0,'','','',0,'','','','');
/*!40000 ALTER TABLE `permohonan_penjaga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_tempat_tinggal`
--

DROP TABLE IF EXISTS `permohonan_tempat_tinggal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_tempat_tinggal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `tempat_tinggal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengangkutan` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_permohonan` (`id_permohonan`),
  CONSTRAINT `permohonan_tempat_tinggal_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_butir_peribadi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_tempat_tinggal`
--

LOCK TABLES `permohonan_tempat_tinggal` WRITE;
/*!40000 ALTER TABLE `permohonan_tempat_tinggal` DISABLE KEYS */;
INSERT INTO `permohonan_tempat_tinggal` VALUES (4,15,'1','0'),(6,15,'1','0'),(9,65,'0','1'),(10,71,'1','0'),(13,72,'1','0'),(14,73,'1','0'),(15,73,'1','0'),(16,73,'1','1'),(17,73,'1','1'),(18,73,'1','1'),(19,73,'1','1'),(20,73,'1','1'),(21,73,'1','1'),(22,73,'1','1'),(23,73,'0','0'),(24,74,'0','0'),(25,74,'1','1'),(26,74,'0','0'),(27,74,'0','0'),(28,74,'1','0'),(29,75,'1','1'),(30,75,'0','1'),(33,76,'1','0'),(34,116,'1','1'),(35,116,'0','0'),(36,116,'1','0'),(37,125,'1','1'),(38,127,'1','0'),(39,131,'1','0'),(40,146,'1','1'),(41,146,'1','1'),(42,149,'1','0'),(43,149,'1','0'),(44,148,'1','0'),(45,150,'1','1'),(46,152,'1','1'),(47,153,'1','1'),(48,126,'1','1'),(49,148,'1','1'),(50,148,'1','1'),(51,150,'1','1'),(52,158,'0','0'),(53,168,'1','1'),(54,168,'1','1'),(55,159,'1','1'),(56,161,'1','1'),(57,167,'0','1'),(58,160,'1','1'),(59,159,'1','1'),(60,165,'1','0'),(61,155,'0','0'),(62,161,'1','1'),(63,159,'1','1'),(64,163,'0','0'),(65,168,'1','1'),(66,168,'1','1'),(67,157,'1','1'),(68,154,'1','1'),(69,154,'1','1'),(70,166,'0','0'),(71,165,'1','0'),(72,164,'1','1'),(73,154,'1','1'),(74,166,'0','0'),(75,160,'1','1'),(76,160,'1','1'),(77,208,'1','1'),(78,168,'1','1'),(79,187,'1','0'),(80,187,'1','0'),(81,210,'1','1'),(82,210,'0','1'),(83,211,'0','0'),(84,212,'1','1'),(85,214,'1','0'),(86,215,'1','1'),(87,216,'1','0'),(88,217,'0','0'),(89,218,'0','0'),(90,219,'1','1');
/*!40000 ALTER TABLE `permohonan_tempat_tinggal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_agama`
--

DROP TABLE IF EXISTS `ref_agama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_agama` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_agama`
--

LOCK TABLES `ref_agama` WRITE;
/*!40000 ALTER TABLE `ref_agama` DISABLE KEYS */;
INSERT INTO `ref_agama` VALUES (1,'Islam'),(2,'Hindu'),(3,'Buddha'),(4,'Sikh'),(5,'Kristian'),(6,'Bebas'),(7,'Lain-lain');
/*!40000 ALTER TABLE `ref_agama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_bangsa`
--

DROP TABLE IF EXISTS `ref_bangsa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_bangsa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bangsa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_bangsa`
--

LOCK TABLES `ref_bangsa` WRITE;
/*!40000 ALTER TABLE `ref_bangsa` DISABLE KEYS */;
INSERT INTO `ref_bangsa` VALUES (1,'Melayu'),(2,'Cina'),(3,'India'),(4,'Bumiputera'),(5,'Lain-lain');
/*!40000 ALTER TABLE `ref_bangsa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_etnik`
--

DROP TABLE IF EXISTS `ref_etnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_etnik` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `etnik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_etnik`
--

LOCK TABLES `ref_etnik` WRITE;
/*!40000 ALTER TABLE `ref_etnik` DISABLE KEYS */;
INSERT INTO `ref_etnik` VALUES (1,'Melayu'),(2,'Cina'),(3,'India'),(4,'Iban'),(5,'Bidayuh'),(6,'Melanau'),(7,'Dusun'),(8,'Lain-lain');
/*!40000 ALTER TABLE `ref_etnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_giatmara`
--

DROP TABLE IF EXISTS `ref_giatmara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_giatmara` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kod_giatmara` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_type_giatmara` int(2) DEFAULT NULL,
  `nama_giatmara` varchar(60) DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tel_no` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `fax_no` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `registered` datetime DEFAULT NULL,
  `co_status` int(2) DEFAULT NULL,
  `id_bandar` int(5) DEFAULT NULL,
  `company_type` int(2) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `updatedby` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_negeri` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_code` (`kod_giatmara`),
  KEY `district_id` (`id_bandar`),
  KEY `id_negeri` (`id_negeri`),
  CONSTRAINT `ref_giatmara_ibfk_1` FOREIGN KEY (`id_negeri`) REFERENCES `ref_negeri` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_giatmara`
--

LOCK TABLES `ref_giatmara` WRITE;
/*!40000 ALTER TABLE `ref_giatmara` DISABLE KEYS */;
INSERT INTO `ref_giatmara` VALUES (1,'HQD',0,'Ibu Pejabat GIATMARA','Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur','03-26912690','03-26912690','','2006-01-15 00:00:00',1,9757,3,'2012-05-29 00:00:00','admin',20),(2,'HQ1',0,'Ibu Pejabat GIATMARA','Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur','03-26912690','03-26912690','','2006-01-15 00:00:00',1,9757,4,'2012-05-29 00:00:00','admin',20),(3,'539',0,'GIATMARA PERLIS','Lot No. C5, Kompleks Mara Kangar, Persiaran Jubli Emas, 01000 Kangar Perlis Indera Kayangan','04-9782984','04-9760914','gmperlis@giatmara.edu.my','2006-01-15 00:00:00',1,24440,2,'2015-05-12 00:00:00','670416095027',15),(4,'535',0,'GIATMARA PERAK','No. 10 & 10A, Medan Istana 6, Bandar Ipoh Raya 30000 Ipoh Perak Darul Ridzuan','05-2536784','05-2536782','gmperak@giatmara.edu.my','2006-01-15 00:00:00',1,27805,2,'2015-02-25 00:00:00','690102086468',11),(5,'532',0,'GIATMARA MELAKA','Tingkat 4  Kompleks Mara, \nJalan Hang Tuah \n75300 Kota Melaka','06-2843101','06-2843103','','2006-01-15 00:00:00',1,30770,2,'2013-06-12 00:00:00','',8),(6,'537',0,'GIATMARA PAHANG','Tingkat 4, Bangunan Tabung Haji, Jalan Bukit Ubi, 25150 Kuantan, Pahang Darul Makmur','09-5135178','09-5132175','gmpahang@giatmara.edu.my','2006-01-15 00:00:00',1,33403,2,'2014-04-07 00:00:00','570601055889',13),(7,'543',0,'GIATMARA SARAWAK','No. 15C, Tingkat 2, Kompleks MARA Satok Parade, Jalan Satok, 93400 Kuching, Sarawak','082-237958','082-237953','gmsarawak@giatmara.edu.my','2006-01-15 00:00:00',1,26073,2,'2014-06-24 00:00:00','821216135165',19),(8,'536',0,'GIATMARA KEDAH','GIATMARA Kedah\nLot 9 &10, Tingkat 2, Komplek Perniagaan Utama,\n05150 Alor Setar, Kuala Kedah','04-7204480','04-7204481','gmkedah@giatmara.edu.my','2006-01-15 00:00:00',0,36835,2,'2013-09-05 00:00:00','691027125002',12),(9,'544',0,'GIATMARA WILAYAH PERSEKUTUAN','No.29-1, Jalan 46B/26,Pusat Bandar Sri Rampai,\r\nSetapak,53300 Kuala Lumpur','03-41420522','03-41421252','','2006-01-15 00:00:00',1,12050,2,'2009-11-25 14:01:29','810605065216',20),(10,'533',0,'GIATMARA NEGERI SEMBILAN','PEJABAT GIATMARA NEGERI SEMBILAN\n\nLOT 10240, TINGKAT 1,\n\nJALAN DATO\' MUDA LINGGI,\n\n70100 SEREMBAN,\n\nNEGERI SEMBILAN.','06-7687280','06-7687281','gmnegerisembilan@giatmara.edu.my','2006-01-15 00:00:00',1,31608,2,'2016-08-25 00:00:00','700922025261',9),(11,'541',0,'GIATMARA TERENGGANU','Lot PT 29766, Tingkat 1,\nTaman Bestari, Gong Badak\n21300 Kuala Nerus.\nTerengganu.','096531863','096531750','','2006-01-15 00:00:00',1,39869,2,'2016-03-07 00:00:00','810415055199',17),(12,'542',0,'GIATMARA SABAH','PEJABAT GIATMARA NEGERI SABAH\r\nLot 13, Tkt 2,Likas Plaza,Jln Tuaran\r\n88400 Kota Kinabalu \r\nSABAH','088-437072','088-437086','','2006-01-15 00:00:00',1,18982,2,'2009-11-11 09:35:50','610602125475',18),(13,'538',0,'GIATMARA PULAU PINANG','Lot 12A -2 Jalan Usahawan 4 Pusat Perniagaan Kepala Batas 13200 Kepala Batas Pulau Pinang','04-5741151','04-5741153','gmnpulaupinang@giatmara.edu.my','2006-01-15 00:00:00',1,22284,2,'2014-07-20 00:00:00','700922025261',14),(14,'534',0,'GIATMARA SELANGOR','Lot 24A , Tingkat 1, Blok 4, Pusat Perniagaan Worldwide, Jalan Karate 13/47, Seksyen 13, 40675 Shah Alam, Selangor D. E.','03-55102775','03-55102906','','2006-01-15 00:00:00',1,1,2,'2014-01-03 00:00:00','780709135544',10),(15,'531',0,'GIATMARA JOHOR','Pejabat GIATMARA Negeri Johor, Tingkat 4, Bangunan MARA, Jalan Segget, 80000 Johor Bahru, Johor','07-224 4032','07-224 4031','gmjohor@giatmara.edu.my','2006-01-15 00:00:00',1,16947,2,'2013-10-01 00:00:00','790317125389',7),(16,'540',0,'GIATMARA KELANTAN','WISMA AMANI,\r\n\nLOT PT 200 & 201,\r\n\nTMN MAJU, JLN SULTAN YAHYA PETRA,\r\n\n15200 KOTA BHARU,\r\n\nKELANTAN','09-7422990','09-7422992','gmkelantan@giatmara.edu.my','2006-01-15 00:00:00',1,32522,2,'2015-10-26 00:00:00','810415055199',16),(17,'407',1,'KANGAR','no.20, tingkat 1, jalan jejawi sematang, kawasan perindustrian jejawi, 02600, Arau, Perlis','04-9764773','04-9761716','gmkangar@giatmara.edu.my','2006-01-15 00:00:00',1,25678,1,'2014-10-29 00:00:00','670416095027',15),(18,'479',1,'ARAU','Lot PT 1260, Mukim Jejawi, 02600 Arau,\nPerlis.','04-9764268','04-9760225','gmarau@giatmara.edu.my','2006-01-15 00:00:00',1,25747,1,'2013-09-26 00:00:00','810415055199',15),(19,'634',1,'PADANG BESAR','Kompleks Logistik IPK Mata Ayer, \nMata Ayer, 02500 Chuping,\nPerlis.','04-9383622','04-9383862','gmpadangbesar@giatmara.edu.my','2006-01-15 00:00:00',1,25697,1,'2013-09-26 00:00:00','810415055199',15),(20,'401',1,'KUBANG PASU','BT. 13 1/2, Jalan Changloon, 06000 Jitra, Kedah','04-9171125','04-9174094','gmkubangpasu@giatmara.edu.my','2006-01-15 00:00:00',1,35549,1,'2013-09-27 00:00:00','810415055199',12),(21,'413',1,'BALING','Jalan Charok Nau, 09100 Baling','04-4701007','04-4701710','gmbaling@giatmara.edu.my','2006-01-15 00:00:00',1,31156,1,'2014-01-30 00:00:00','810415055199',12),(22,'454',1,'ALOR SETAR','Bangunan Kedai MARA, Jalan Seberang Perak, 05400 Alor Setar','04-7721303','04-7728867','gmalorsetar@giatmara.edu.my','2006-01-15 00:00:00',1,34949,1,'2013-09-05 00:00:00','691027125002',12),(23,'414',1,'LANGKAWI','Jalan Kisap, Kuah Langkawi, 07000 Langkawi','04-9669198','04-9660092','gmlangkawi@giatmara.edu.my','2006-01-15 00:00:00',1,28525,1,'2013-09-08 00:00:00','750321075867',12),(24,'475',1,'SIK','Jalan Hospital Daerah Sik, 08200 Sik','04-4695641','04-4695795','gmsik@giatmara.edu.my','2006-01-15 00:00:00',1,30424,1,'2013-09-05 00:00:00','600816025075',12),(25,'476',1,'JERAI','Jalan Pegawai, 06900 Yan','04-4655446','04-4655676','gmjerai@giatmara.edu.my','2006-01-15 00:00:00',1,27394,1,'2013-09-05 00:00:00','691027125002',12),(26,'485',1,'PADANG SERAI','Lot 890, Mukim Naga Lilit, 09400 Padang Serai','04-4850528','04-4850530','gmpadangserai@giatmara.edu.my','2006-01-15 00:00:00',1,31892,1,'2013-09-27 00:00:00','810415055199',12),(27,'633',1,'PENDANG','JALAN JENUN,MUKIM AIR PUTEH,06700 PENDANG,KEDAH.','04-7591815','04-7591812','gmpendang@giatmara.edu.my','2006-01-15 00:00:00',1,27338,1,'2013-09-05 00:00:00','720727025475',12),(28,'462',1,'PADANG TERAP','Lot 3202, Batu 20, Jalan Kuala Nerang, 06300 Kuala Nerang, Kedah Darul Aman.','04-7902020','04-7902021','gmpadangterap@giatmara.edu.my','2006-01-15 00:00:00',1,27246,1,'2013-09-05 00:00:00','691027125002',12),(29,'483',1,'KULIM BANDAR BAHARU','Pekan Mahang, 09500 Karangan','04-4042386','04-4042386','gmkulim@giatmara.edu.my','2006-01-15 00:00:00',1,32480,1,'2013-09-05 00:00:00','691027125002',12),(30,'667',1,'SUNGAI PETANI','LOT 101A, SMART AUTOCITY,\nJALAN BUKIT PUTERI 9/10,\nBANDAR PUTERI JAYA,\n08000','04-425 6652','04-422 6651','gmsungaipetani@giatmara.edu.my','2006-01-15 00:00:00',1,29797,1,'2016-12-22 00:00:00','810415055199',12),(31,'659',1,'MERBOK','Pekan Bedong, 08100 Bedong','04-4584600','04-4584606','gmmerbok@giatmara.edu.my','2006-01-15 00:00:00',1,29917,1,'2013-09-05 00:00:00','691027125002',12),(32,'687',1,'JERLUN','Lot 80, Pusat Pertumbuhan Desa, Sungai Korok, 06150 Ayer Hitam','04-7947507','04-7943658','gmjerlun@giatmara.edu.my','2006-01-15 00:00:00',1,36323,1,'2013-09-05 00:00:00','691027125002',12),(33,'654',1,'KUALA KEDAH','Lot. 1311, Kampung Masjid Seberang,\nMukim Kubang Rotan,\n06250 Alor Setar, Kedah Darul Aman','04-7325490','04-7346415','gmkualakedah@giatmara.edu.my','2006-01-15 00:00:00',1,36835,1,'2013-09-05 00:00:00','691027125002',12),(34,'653',1,'POKOK SENA','Lot 2649,Kg Belukar,Mukim Jabi,06400 Pokok Sena,Kedah','04-7878064','04-7878108','gmpokoksena@giatmara.edu.my','2006-01-15 00:00:00',1,27288,1,'2013-09-05 00:00:00','691027125002',12),(35,'412',1,'PERDA / NIBONG TEBAL','Lot. 2621, Mukim 11, Jln Ooi Kar Seng, Nibong Tebal, 14300 Seberang Perai Selatan','04-5936282','04-5936284','gmnibongtebal@giatmara.edu.my','2006-01-15 00:00:00',1,25392,1,'2013-09-26 00:00:00','810415055199',14),(36,'409',1,'BUKIT MERTAJAM','Lot 2228, Mukim 16, Seberang Perai Tengah, 14000 Bkt. Mertajam','04-4904321','04-4903518','gmbukitmertajam@giatmara.edu.my','2006-01-15 00:00:00',1,25245,1,'2013-09-26 00:00:00','810415055199',14),(37,'484',1,'BAGAN','No 3908, Mukim 15, Jalan Pantai, 12100','04-3328528','04-3741711','gmbagan@giatmara.edu.my','2006-01-15 00:00:00',1,20534,1,'2013-09-05 00:00:00','820112075714',14),(38,'431',1,'BAYAN LEPAS','Lot 102H, Lengkok Kg, Jawa 2, Kawasan Miel, 11900 Bayan Lepas','04-6449979','04-6443753','gmbayanlepas@giatmara.edu.my','2006-01-15 00:00:00',1,19351,1,'2013-09-26 00:00:00','810415055199',14),(39,'610',1,'KEPALA BATAS','Persiaran Pendidikan Bertam Perdana,\n13200 Kepala Batas,\nPulau Pinang','04-5750170','04-5756220','gmkepalabatas@giatmara.edu.my','2006-01-15 00:00:00',1,22269,1,'2016-10-14 00:00:00','810415055199',14),(40,'447',1,'TASEK GELUGOR','Lot. 3130, Mukim 8, Pongsu Seribu, Kepala Batas, 13200 Seberang Perai Utara','04-5756163','04-5783162','gmtasekgelugor@giatmara.edu.my','2006-01-15 00:00:00',1,24612,1,'2013-09-26 00:00:00','810415055199',14),(41,'469',1,'PERMATANG PAUH','Lot 433, Mukim 3, Permatang Ara, 13500 Permatang Pauh, Seberang Perai Tengah, Pulau Pinang','04-3995795','04-3995792','gmpermatangpauh@giatmara.edu.my','2006-01-15 00:00:00',1,25199,1,'2013-09-26 00:00:00','810415055199',14),(42,'686',1,'SUNGAI BAKAP','Sungai Bakap (Polis), Sungai Bakap, 14200 Seberang Perai Selatan','04-5820157','04-5820158','gmsungaibakap@giatmara.edu.my','2006-01-15 00:00:00',1,24806,1,'2013-09-26 00:00:00','810415055199',14),(43,'647',1,'BALIK PULAU','Lot 584,585 & 588  Jalan Besar, \nBalik Pulau, 11000 Balik Pulau','04-8661369','04-8664634','gmbalikpulau@giatmara.edu.my','2006-01-15 00:00:00',1,18031,1,'2013-09-06 00:00:00','821027075298',14),(44,'655',1,'TANJONG','Unit 1.03 & 1.04, 10050 Kompleks Jalan Kedah','04-2283070','04-2285504','gmtanjong@giatmara.edu.my','2006-01-15 00:00:00',1,26894,1,'2013-09-26 00:00:00','810415055199',14),(45,'433',1,'PARIT BUNTAR','BANGUNAN KOMUNITI, JALAN PEJABAT, 34200 PARIT BUNTAR, PERAK','05-7160082','05-7160086','gmparitbuntar@giatmara.edu.my','2006-01-15 00:00:00',1,22143,1,'2013-09-26 00:00:00','810415055199',11),(46,'408',1,'GRIK','Lebuhraya Timur Barat, Base Camp, 33300 Grik','05-7911494','05-7920020','gmgrik@giatmara.edu.my','2006-01-15 00:00:00',1,20885,1,'2013-09-26 00:00:00','810415055199',11),(47,'439',1,'KAMPAR','Pusat GIAT Changkat Tin, 31800 Tanjung Tualang','05-3609490','05-3609480','gmkampar@giatmara.edu.my','2006-01-15 00:00:00',1,28385,1,'2013-08-23 00:00:00','810415055199',11),(48,'452',1,'PARIT','GIATMARA PARIT, \n  42 PERSIARAN DATARAN 3, \n  32610 BANDAR SERI ISKANDAR, \n  PERAK','05-3721801','05-3721802','gmparit@giatmara.edu.my','2006-01-15 00:00:00',1,20847,1,'2013-09-26 00:00:00','810415055199',11),(49,'446',1,'TANJONG MALIM','Jalan Rumah Rehat, 35800 Slim River, Perak','05-4529896','05-4529897','gmtanjongmalim@giatmara.edu.my','2006-01-15 00:00:00',1,22793,1,'2013-09-26 00:00:00','810415055199',11),(50,'458',1,'PASIR SALAK','Pulau Tiga, 36800 Kampung Gajah, Perak','05-6318000','05-6318001','gmpasirsalak@giatmara.edu.my','2006-01-15 00:00:00',1,24423,1,'2013-08-23 00:00:00','640425115619',11),(51,'466',1,'IPOH TIMUR','No 5, Jalan Zarib 8, Zarib Industrial Park, 31500 Perak','053226385','053215346','gmipohtimur@giatmara.edu.my','2006-01-15 00:00:00',1,40565,1,'2013-09-26 00:00:00','810415055199',11),(52,'477',1,'LUMUT','Lebuhraya KI/Lumut, Bt 8 Lekir 32020 Sitiawan','05-6798152','05-6798152','gmlumut@giatmara.edu.my','2006-01-15 00:00:00',1,28501,1,'2013-09-26 00:00:00','810415055199',11),(53,'480',1,'BAGAN DATUH','Lot 40, Jalan Besar, 36400 Hutan Melintang','05-6421800','05-6421801','gmbagandatoh@giatmara.edu.my','2006-01-15 00:00:00',1,42908,1,'2013-11-28 00:00:00','810721105393',11),(54,'464',1,'BAGAN SERAI','Simpang 4, 34400 Semanggol,\nPerak','05-8921250','05-8921251','gmbaganserai@giatmara.edu.my','2006-01-15 00:00:00',1,40276,1,'2013-08-23 00:00:00','600102085391',11),(55,'606',1,'BERUAS','No 40, Taman Desa Pantai 11, \n34900 Pantai Remis, \nPerak.','05-6779010','05-6779011','gmberuas@giatmara.edu.my','2006-01-15 00:00:00',1,20254,1,'2013-08-23 00:00:00','580205086295',11),(56,'435',1,'TAIPING','Lot 20834 Jalan Logam 6,\nKawasan Perindustrian Kamunting Raya,\n34600 Kamunting,\nPerak Darul Ridzuan','05-8912045','05-8064075','gmtaiping@giatmara.edu.my','2006-01-15 00:00:00',1,21579,1,'2016-09-27 00:00:00','810415055199',11),(57,'670',1,'LENGGONG','PL 23/1,\nKAMPUNG KUBANG JAMBU,\nJALAN BESAR,\nKAMPUNG MASJID LAMA,\n33400 LENGGONG\nPERAK.','05-7679712,057','05-7679712','gmlenggong@giatmara.edu.my','2006-01-15 00:00:00',1,21481,1,'2013-08-23 00:00:00','630131085865',11),(58,'613',1,'KUALA KANGSAR','Dewan Orang Ramai, Rancangan Perumahan  Awam 2 & 3, 33800 Kuala Kangsar','05-7438610','05-7438611','gmkualakangsar@giatmara.edu.my','2006-01-15 00:00:00',1,43995,1,'2013-09-26 00:00:00','810415055199',11),(59,'465',1,'SUNGAI SIPUT','Simpang Kampung Sentosa,\n31100 Sungai Siput (U),\nPerak Darul Ridzuan.','05-5951611','05-5951610','gmsungaisiput@giatmara.edu.my','2006-01-15 00:00:00',1,27172,1,'2013-08-23 00:00:00','730327086155',11),(60,'604',1,'BATU GAJAH','No. 59, Jalan  Perpaduan, 31000 Batu Gajah','05-3633967','05-3633967','gmbatugajah@giatmara.edu.my','2006-01-15 00:00:00',1,36739,1,'2013-09-26 00:00:00','810415055199',11),(61,'424',1,'TELUK INTAN','Jalan Si Putum, 36000 Teluk Intan.','05-6254242','05-6254240','gmtelukintan@giatmara.edu.my','2006-01-15 00:00:00',1,22805,1,'2014-06-10 00:00:00','810721105393',11),(62,'669',1,'TAMBUN','Lot 157835, Batu 7 1/2, Jalan Tambun, 31150 Ulu Kinta','05-5499582','05-5495030','gmtambun@giatmara.edu.my','2006-01-15 00:00:00',1,27803,1,'2013-09-26 00:00:00','810415055199',11),(63,'638',1,'LARUT','Lot 3207, Jalan Sir Chulan, 34100 Selama','05-8392812','05-8396377','gmlarut@giatmara.edu.my','2006-01-15 00:00:00',1,22114,1,'2013-09-26 00:00:00','810415055199',11),(64,'649',1,'GOPENG','No. 19,Jalan Kampar, 31600 Gopeng','05-3592301','05-3592301','gmgopeng@giatmara.edu.my','2006-01-15 00:00:00',1,27861,1,'2013-08-23 00:00:00','580610085069',11),(65,'607',1,'BUKIT GANTANG','Dewan Bacaan Lama, Kampung Cheh Hulu, 34850 Changkat Jering','05-8554251','05-8551253','gmbukitgantang@giatmara.edu.my','2006-01-15 00:00:00',1,22733,1,'2013-09-26 00:00:00','810415055199',11),(66,'680',1,'IPOH BARAT','No 155, Jalan Dato\' Onn Jaafar, 30300 Ipoh Perak','052497718','052497717','gmipohbarat@giatmara.edu.my','2006-01-15 00:00:00',1,27824,1,'2013-09-26 00:00:00','810415055199',11),(67,'471',1,'PADANG RENGAS','No 47, Jalan Perindustrian MIEL, \nKawasan Perindustrian MIEL, \n33010 Kuala Kangsar, Perak','05-7733611','05-7733612','gmpadangrengas@giatmara.edu.my','2006-01-15 00:00:00',1,43995,1,'2013-08-23 00:00:00','650919115183',11),(68,'404',1,'MUADZAM SHAH','Kawasan perindustrian,26700 Muadzam Shah','09-4522366','09-4523607','gmmuadzamshah@giatmara.edu.my','2006-01-15 00:00:00',1,34689,1,'2015-08-03 00:00:00','570601055889',13),(69,'405',1,'JENGKA','26400 Bandar Jengka, Pahang Darul Makmur','09-4662375','09-4662354','gmjengka@giatmara.edu.my','2006-01-15 00:00:00',1,34037,1,'2013-09-26 00:00:00','810415055199',13),(70,'418',1,'PAYA BESAR','Km. 8, Jalan Gambang, 25150 Kuantan ','09-5366558','09-5366557','gmpayabesar@giatmara.edu.my','2006-01-15 00:00:00',1,33401,1,'2013-09-26 00:00:00','810415055199',13),(71,'451',1,'KUALA LIPIS','Lot 3347, Kampung Kuala Lanar, 27200 Kuala Lipis','09-3122062','09-3121892','gmkualalipis@giatmara.edu.my','2006-01-15 00:00:00',1,35363,1,'2013-09-26 00:00:00','810415055199',13),(72,'457',1,'TEMERLOH','Jalan Padang, 28400 Mentakab','09-2773700','09-2775181','gmtemerloh@giatmara.edu.my','2006-01-15 00:00:00',1,36136,1,'2013-09-26 00:00:00','810415055199',13),(73,'434',1,'ROMPIN','Kilometer 5.5, Jalan Sabak, , 26800 Kuala Rompin,Pahang','09-4146190','09-4141908','gmrompin@giatmara.edu.my','2006-01-15 00:00:00',1,44256,1,'2013-12-20 00:00:00','810415055199',13),(74,'614',1,'INDERA MAHKOTA','Lot 758,\nKg. Balok Pantai,\n26100 Kuantan,  \nPahang.','095807353','095807351','gminderamahkota@giatmara.edu.my','2006-01-15 00:00:00',1,44163,1,'2016-08-19 00:00:00','810415055199',13),(75,'487',1,'RAUB','Lot No 31388 , \nJalan Taman Mewah \n27600 Raub','09-3557670','09-3557734','gmraub@giatmara.edu.my','2006-01-15 00:00:00',1,35992,1,'2014-12-05 00:00:00','810415055199',13),(76,'608',1,'JERANTUT','Km 9, Kampung Sri Muda, 27000 Jerantut','09-2663541','09-2671687','gmjerantut@giatmara.edu.my','2006-01-15 00:00:00',1,34761,1,'2013-09-26 00:00:00','810415055199',13),(77,'689',1,'PEKAN','Lot PT 1732, Mukim Langgar, Bandar Baru Peramu, 26600 Pekan','09-4260273','09-4260275','gmpekan@giatmara.edu.my','2006-01-15 00:00:00',1,34078,1,'2013-09-26 00:00:00','810415055199',13),(78,'671',1,'BERA','Bandar 32 Bera, 28300 Triang','09-2463235','09-2496236','gmbera@giatmara.edu.my','2006-01-15 00:00:00',1,36026,1,'2013-09-26 00:00:00','810415055199',13),(79,'678',1,'BENTONG','Lot 2738, Jalan Karak Mentakab, Batu 4, Karak Setia, Karak 28600 Bentong','09-2312790','09-2311907','gmbentong@giatmara.edu.my','2006-01-15 00:00:00',1,36673,1,'2013-09-26 00:00:00','810415055199',13),(80,'650',1,'CAMERON HIGHLANDS','FELDA Sg Koyan 3, 27650 Raub','09-3402952','09-3402952','gmcameronhighlands@giatmara.edu.my','2006-01-15 00:00:00',1,35996,1,'2013-09-26 00:00:00','810415055199',13),(81,'402',1,'KOTA BHARU','Jalan Talipot, 15150 Kota Bharu','09-7447058','09-7447058','gmkotabharu@giatmara.edu.my','2006-01-15 00:00:00',1,32552,1,'2013-09-26 00:00:00','810415055199',16),(82,'432',1,'MACHANG','GIATMARA MACHANG, BANGUNAN BALAI POLIS LAMA, 18500 MACHANG KELANTAN','09-9750016','09-9755017','gmmachang@giatmara.edu.my','2006-01-15 00:00:00',1,29433,1,'2013-09-26 00:00:00','810415055199',16),(83,'416',1,'TUMPAT','Kampung 7, 16200 Tumpat','09-7211994','09-7211577','gmtumpat@giatmara.edu.my','2006-01-15 00:00:00',1,34408,1,'2015-12-21 00:00:00','810415055199',16),(84,'467',1,'PASIR MAS','LOT 2772 KAMPUNG SAKAR\n17030 PASIR MAS','09-7901710','09-7902795','gmpasirmas@giatmara.edu.my','2006-01-15 00:00:00',1,36374,1,'2013-11-19 00:00:00','810415055199',16),(85,'490',1,'PASIR PUTEH','Lot 1466, Mukim Selising, 16810 Selising','09-7891319','09-7891213','gmpasirputeh@giatmara.edu.my','2006-01-15 00:00:00',1,35128,1,'2014-06-17 00:00:00','810415055199',16),(86,'601',1,'BACHOK','LOT 665, SERDANG BARU\n16310 BACHOK, KELANTAN\n','09-7787310',' 09-7787312','gmbachok@giatmara.edu.my','2006-01-15 00:00:00',1,35025,1,'2014-05-07 00:00:00','710426115355',16),(87,'675',1,'JELI','GIATMARA JELI\nLOT 6099,KAMPUNG WAKAF ZING,\nAYER LANAS,\n17700 JELI,KELANTAN.','09-9468550','09-9468553','gmjeli@giatmara.edu.my','2006-01-15 00:00:00',1,28171,1,'2014-11-25 00:00:00','810415055199',16),(88,'639',1,'NILAM PURI','Kampung Badak Mati Banggu, \n16150 Kota Bharu, \nKelantan','09-7964194','09-7964195','gmnilampuri@giatmara.edu.my','2006-01-15 00:00:00',1,33673,1,'2013-09-26 00:00:00','810415055199',16),(89,'443',1,'GUA MUSANG','FELDA Chiku 5, 18300 Gua Musang','09-9140161',' 09-9287637','gmguamusang@giatmara.edu.my','2006-01-15 00:00:00',1,29332,1,'2014-05-07 00:00:00','710426115355',16),(90,'645',1,'TANAH MERAH','Batu 4, Jalan Machang Jeli, 17500 Tanah Merah','09-9775209','09-9775209','gmtanahmerah@giatmara.edu.my','2006-01-15 00:00:00',1,37119,1,'2013-09-26 00:00:00','810415055199',16),(91,'497',1,'RANTAU PANJANG','FELCRA Bukit Tandak, 17200 Rantau Panjang','013-9603434 ','-','gmrantaupanjang@giatmara.edu.my','2006-01-15 00:00:00',1,36404,1,'2013-09-26 00:00:00','810415055199',16),(92,'611',1,'KUALA KRAI','Kg Jelawang, 18200 Dabong, Kuala Krai','09-9362689','09-9361689','gmkualakrai@giatmara.edu.my','2006-01-15 00:00:00',1,29313,1,'2013-09-26 00:00:00','810415055199',16),(93,'618',1,'PENGKALAN CHEPA','Kg. Rambutan Rendang,  Mukim Panji, 16100 Pengkalan Chepa','09-7714141','09-7714140','gmpengkalanchepa@giatmara.edu.my','2006-01-15 00:00:00',1,33126,1,'2013-09-26 00:00:00','810415055199',16),(94,'403',1,'DUNGUN','Batu 16, Kampung Nyior, 23100 Paka','09-8286122','09-8286123','gmdungun@giatmara.edu.my','2006-01-15 00:00:00',1,39131,1,'2013-09-27 00:00:00','810415055199',17),(95,'417',1,'MARANG','Jalan Rawai, Bukit Payong, 21400 Marang, Terengganu.','09-6102030','09-6102031','gmmarang@giatmara.edu.my','2006-01-15 00:00:00',1,38867,1,'2013-09-27 00:00:00','810415055199',17),(96,'468',1,'HULU TERENGGANU','GIATMARA HULU TERENGGANU,\nKampung Kuala Telemong, \n21210 Kuala Terengganu.\nTerengganu.','09-6142130','09-6142131','gmhuluterengganu@giatmara.edu.my','2006-01-15 00:00:00',1,38862,1,'2013-09-27 00:00:00','810415055199',17),(97,'411',1,'SETIU','Kampung Pak Kancil, Bandar Permaisuri, 22100 Setiu','09-6097541','09-6097542','gmsetiu@giatmara.edu.my','2006-01-15 00:00:00',1,39063,1,'2013-09-27 00:00:00','810415055199',17),(98,'449',1,'KETENGAH','Bandar Al-Muktafi Billah Shah\n23400 Dungun\nTerengganu Darul Iman','09-8211380','09-8221361','gmketengah@giatmara.edu.my','2006-01-15 00:00:00',1,39141,1,'2013-09-27 00:00:00','810415055199',17),(99,'461',1,'BESUT','Jalan Batu Tumbuh, Alor Lintang, 22200 Besut','09-6950649','09-6950850','gmbesut@giatmara.edu.my','2006-01-15 00:00:00',1,39072,1,'2013-09-27 00:00:00','810415055199',17),(100,'448',1,'KEMAMAN','Lot Pt. 2640,\nKampung Titian Berayun,\n24100 Kijal, Terengganu.','09-8623140','09-8623142','gmkemaman@giatmara.edu.my','2006-01-15 00:00:00',1,39344,1,'2013-09-27 00:00:00','810415055199',17),(101,'456',1,'KUALA TERENGGANU','Lot 1088 Jalan Hj, Busu, Batu Buruk, 20400 K. Terengganu','09-6203651/53','09-6203652','gmkualaterengganu@giatmara.edu.my','2006-01-15 00:00:00',1,38632,1,'2013-09-27 00:00:00','810415055199',17),(102,'441',1,'BATU RAKIT','Lot 9278, Kampung Wakaf Cagak, Batu Rakit, 21020 K. Terengganu','09-6693117','09-6692136','gmbaturakit@giatmara.edu.my','2006-01-15 00:00:00',1,38716,1,'2013-09-27 00:00:00','810415055199',17),(103,'685',1,'KUALA NERUS','Kampung Bukit Petiti, Belara, 21200 K. Terengganu','09-6301062','09-6301061','gmkualanerus@giatmara.edu.my','2006-01-15 00:00:00',1,38795,1,'2013-09-27 00:00:00','810415055199',17),(104,'415',1,'KUALA LANGAT','Jalan Sultan Abdul Samad, 42700 Banting','03-31879490','03-31877790','gmkualalangat@giatmara.edu.my','2006-01-15 00:00:00',1,3558,1,'2013-09-27 00:00:00','810415055199',10),(106,'438',1,'SABAK BERNAM','No.1 & 3, Jalan PPSL 2,\nPusat Perniagaan Sungai Lias,\n45300, Sungai Besar,\nSelangor','03-32245107','03-32245108','gmsabakbernam@giatmara.edu.my','2006-01-15 00:00:00',1,5090,1,'2013-08-23 00:00:00','790907085399',10),(107,'460',1,'KAPAR','Lot 1613, Jalan Rantau Panjang, Mukim Kapar, 42100 Klang','03-32914815','03-32914940','gmkapar@giatmara.edu.my','2006-01-15 00:00:00',1,3369,1,'2013-09-27 00:00:00','810415055199',10),(108,'425',1,'HULU SELANGOR','Lot 3, Bekas Sek.Keb. Kalumpang, 44100 Kalumpang','03-60491899','0360492494','gmhuluselangor@giatmara.edu.my','2006-01-15 00:00:00',1,4678,1,'2013-09-27 00:00:00','810415055199',10),(109,'474',1,'SELAYANG','Jalan 5, Tmn. Selayang Baru, 68100 Batu Caves','03-61364524','03-61364525','gmselayang@giatmara.edu.my','2006-01-15 00:00:00',1,38582,1,'2013-09-27 00:00:00','810415055199',10),(110,'442',1,'BANGI','Jalan P/9a Seksyen 13, 43650 Bandar Baru Bangi','03-89251978','03-89251977','gmbangi@giatmara.edu.my','2006-01-15 00:00:00',1,3292,1,'2013-09-27 00:00:00','810415055199',10),(111,'620',1,'PUCHONG','Batu 13, Jalan Kelang,\n47100 Puchong\nSelangor','03-80613470','03-80608854','gmpuchong@giatmara.edu.my','2006-01-15 00:00:00',1,8937,1,'2013-09-27 00:00:00','810415055199',10),(112,'623',1,'SEPANG','Pekan Salak, 43900 Sepang','03-87061357','03-87061357','gmsepang@giatmara.edu.my','2006-01-15 00:00:00',1,4566,1,'2013-08-23 00:00:00','600423025541',10),(113,'426',1,'TANJUNG KARANG','Kampung Sungai Terap, Batu 3, Jalan Bernam, 45000 Kuala Selangor','03-32895684','03-32895684','gmtanjungkarang@giatmara.edu.my','2006-01-15 00:00:00',1,4840,1,'2013-09-27 00:00:00','810415055199',10),(114,'427',1,'HULU LANGAT','NO 65, 66, 67 JALAN PRIMA SAUJANA 1/1A, \nTAMAN PRIMA SAUJANA SEKSYEN 1,\n43000 KAJANG, SELANGOR','03-87395602','03-87395601','gmhululangat@giatmara.edu.my','2006-01-15 00:00:00',1,4475,1,'2013-09-27 00:00:00','810415055199',10),(115,'628',1,'SUNGAI BESAR','Jalan Balai Polis, 45400 Sekinchan, Selangor Darul Ehsan','03-32418470','03-32418471','gmsungaibesar@giatmara.edu.my','2006-01-15 00:00:00',1,5120,1,'2013-09-27 00:00:00','810415055199',10),(116,'455',1,'PETALING JAYA (SELATAN)','Lot 8247, Jalan 225, 46100 Petaling Jaya','03-79579721','03-79574623','gmpetalingjaya@giatmara.edu.my','2006-01-15 00:00:00',1,7314,1,'2013-09-27 00:00:00','810415055199',10),(117,'624',1,'SHAH ALAM','2nd Floor C-12-2 Blok C,\nAlam Avenue, Jalan Serai Wangi,\nH16/H Off Persiaran Selangor,\n40200 Shah Alam,\nSelangor.','03-55196829','03-55123929','gmshahalam@giatmara.edu.my','2006-01-15 00:00:00',1,120,1,'2014-05-27 00:00:00','810415055199',10),(118,'679',1,'GOMBAK','NO. 3-G & 3A-G, PUSAT KOMERSIAL AMANIAH,\nJALAN AMANIAH MULIA 1,\nTAMAN AMANIAH MULIA,\n68100 BATU CAVES,\nSELANGOR DARUL EHSAN.\n','03-61857972','03-61857260','gmgombak@giatmara.edu.my','2006-01-15 00:00:00',1,38499,1,'2013-08-23 00:00:00','811229085380',10),(119,'681',1,'PETALING JAYA UTARA','NO 7 JALAN SS7/26,\nTAMAN SRI KELANA,\n47300 KELANA JAYA\nSELANGOR.','0378042454','0378035090','gmpetalingjayautara@giatmara.edu.my','2006-01-15 00:00:00',1,4388,1,'2014-02-07 00:00:00','810415055199',10),(120,'482',1,'KUALA LUMPUR','No 3A-3A Tingkat 4,\nWisma Q Titiwangsa,\nJalan Pahang,\n50300 Kuala Lumpur','03-40323241','-','gmkualalumpur@giatmara.edu.my','2006-01-15 00:00:00',1,12019,1,'2016-09-23 00:00:00','810415055199',20),(121,'629',1,'TITIWANGSA','No.13D Jalan Medan Tuanku\n50300 Kuala Lumpur','03-26949136','03-26943227','gmtitiwangsa@giatmara.edu.my','2006-01-15 00:00:00',1,11041,1,'2014-05-16 00:00:00','810415055199',20),(122,'682',1,'SEPUTEH','GIATMARA SEPUTEH,\nNO.8, JALAN 14/108C,\nTAMAN SUNGAI BESI,\n57100 KUALA LUMPUR','03-79806243','03-79806109','gmseputeh@giatmara.edu.my','2006-01-15 00:00:00',1,9757,1,'2013-07-09 00:00:00','810415055199',20),(123,'690',1,'SEGAMBUT','No. 50, Jalan 6/38d, Taman Sri Sinar, 51200 Kuala Lumpur','03-62726375','03-62726452','gmsegambut@giatmara.edu.my','2006-01-15 00:00:00',1,11079,1,'2013-07-09 00:00:00','810415055199',20),(124,'652',1,'KEPONG','GIATMARA Kepong, Tingkat Bawah, Blok F, PPR Intan Baiduri, 52100 Kepong Utara, Kuala Lumpur.\n','03-61370361','03-6137 0279','gmkepong@giatmara.edu.my','2006-01-15 00:00:00',1,11426,1,'2013-07-09 00:00:00','810415055199',20),(125,'600',1,'AMPANG JAYA','Bangunan UMNO Ampang, \nLot No. 4545-3,4,5 dan 6,\nNo. 100 Jalan Lembah Jaya,\n68000 Ampang,  \nSelangor.','03-42874477','-','gmampangjaya@giatmara.edu.my','2006-01-15 00:00:00',1,38336,1,'2016-08-19 00:00:00','810415055199',10),(126,'420',1,'CHERAS','Blok 62, Perumahan Awam, Sri Sabah 3b, Batu 3 1/2, Jln Cheras 56100 Kuala Lumpur','03-92849318','03-9284697','gmcheras@giatmara.edu.my','2006-01-15 00:00:00',1,39538,1,'2013-07-09 00:00:00','810415055199',20),(127,'406',1,'TELOK KEMANG','Jalan Linggi/ Rantau, 71150 Linggi, Negeri Sembilan','06-6970098','06-6970151','gmtelokkemang','2006-01-15 00:00:00',1,30808,1,'2013-07-09 00:00:00','810415055199',9),(128,'419',1,'JEMPOL','BANDAR SERI JEMPOL\n72100 JEMPOL\nNEGERI SEMBILAN','06-4581950','06-4581046','gmjempol@giatmara.edu.my','2006-01-15 00:00:00',1,31608,1,'2013-07-09 00:00:00','810415055199',9),(129,'463',1,'KUALA PILAH','Batu 1, Jalan Seremban 7200 Kuala Pilah','06-4815939','06-4813950','gmkualapilah@giatmara.edu.my','2006-01-15 00:00:00',1,30891,1,'2013-07-09 00:00:00','810415055199',9),(130,'492',1,'SEREMBAN','KM9, JALAN JELEBU,\n71770 SEREMBAN,\nNEGERI SEMBILAN','06-7611971','06-7628075','gmseremban@giatmara.edu.my','2006-01-15 00:00:00',1,27698,1,'2013-07-09 00:00:00','810415055199',9),(131,'491',1,'TAMPIN','GIATMARA TAMPIN,\nFELDA PASIR BESAR,73420 GEMAS, NEGERI SEMBILAN','06-4576579','06-4576768','gmtampin@giatmara.edu.my','2006-01-15 00:00:00',1,27682,1,'2013-07-09 00:00:00','810415055199',9),(132,'450',1,'JELEBU','Kampung Desa Semarak, Jalan Titi, 71650 Titi Jelebu','06-6113801','06-6113784','gmjelebu@giatmara.edu.my','2006-01-15 00:00:00',1,30823,1,'2013-11-19 00:00:00','820619115148',9),(133,'662',1,'RASAH','Lot 200, Galla Industrial Park, \nJalan Labu, \n70200 Seremba\nNegeri Sembilan','06-7633654','06-7633654','gmrasah@giatmara.edu.my','2006-01-15 00:00:00',1,30123,1,'2013-11-19 00:00:00','820619115148',9),(134,'410',1,'MASJID TANAH','Batu 21 1/2, Pengkalan Balak, 78300 Masjid Tanah','06-3841732','06-3845744','gmmasjidtanah@giatmara.edu.my','2006-01-15 00:00:00',1,27605,1,'2013-07-03 00:00:00','810415055199',8),(135,'486',1,'JASIN','Jalan Parit Putat, 77400 Sg. Rambai','06-2659578','06-2659254','gmjasin@giatmara.edu.my','2006-01-15 00:00:00',1,35919,1,'2013-07-03 00:00:00','810415055199',8),(136,'641',1,'ALOR GAJAH','Pekan Durian Tunggal, 76100 Melaka','06-5534939','16-5534937','gmalorgajah@giatmara.edu.my','2006-01-15 00:00:00',1,33287,1,'2013-07-03 00:00:00','810415055199',8),(137,'612',1,'KOTA MELAKA','Tingkat 3, Kompleks MARA, Jalan Hang Tuah, 75300 Kota Melaka','06-2826939','06-2816939','gmkotamelaka@giatmara.edu.my','2006-01-15 00:00:00',1,32113,1,'2013-07-03 00:00:00','810415055199',8),(138,'488',1,'BUKIT KATIL','Lot 2344, Jalan Bayan 2, Taman Bukit Katil, 75450 Bukit Katil','06-2686632','06-2680586','gmbukitkatil@giatmara.edu.my','2006-01-15 00:00:00',1,33215,1,'2013-07-03 00:00:00','810415055199',8),(139,'428',1,'SIMPANG AMPAT','Jalan Kampung Kemus, Simpang Ampat, 78000 Alor Gajah, Melaka.','06-5529614','06-5529588','gmsimpangampat@giatmara.edu.my','2006-01-15 00:00:00',1,36530,1,'2013-07-03 00:00:00','810415055199',8),(140,'499',1,'TANGGA BATU','PGM Tangga Batu, No 5, Tingkat 1 & 2, Jln PSU 2, Plaza Sungai Udang, 76300','06-3531944','06-3531943','gmtanggabatu@giatmara.edu.my','2006-01-15 00:00:00',1,33914,1,'2013-07-03 00:00:00','810415055199',8),(141,'472',1,'KULAI','Felda Bukit Besar, 81450 Kulaijaya','07-8977989','07-8977989','gmkulai@giatmara.edu.my','2006-01-15 00:00:00',1,15662,1,'2013-10-02 00:00:00','830417016255',7),(142,'444',1,'KLUANG','LOT 1, TINGKAT 3, BANGUNAN ARKED MARA KLUANG, JALAN DATO\' KAPTEN AHMAD 86000 KLUANG, JOHOR','07-7739506','07-7739507','gmkluang@giatmara.edu.my','2006-01-15 00:00:00',1,31641,1,'2013-10-30 00:00:00','750824115269',7),(143,'481',1,'BATU PAHAT','266, JALAN DAGANG,\n83000 BT PAHAT,\nJOHOR','07-4328155','07-4346279','gmbatupahat@giatmara.edu.my','2006-01-15 00:00:00',1,15315,1,'2013-09-25 00:00:00','810415055199',7),(144,'430',1,'KOTA TINGGI','Felda Air Tawar 2, 81920 Kota Tinggi','07-8932602','07-8932602','gmkotatinggi@giatmara.edu.my','2006-01-15 00:00:00',1,16105,1,'2013-09-25 00:00:00','810415055199',7),(145,'421',1,'TANJONG PIAI','Lot 2276, Mukim Jeram Batu, Pekan Nenas,81500 Pontian','07-6994507','07-6994509','gmtanjongpiai@giatmara.edu.my','2006-01-15 00:00:00',1,15728,1,'2013-09-25 00:00:00','810415055199',7),(146,'622',1,'SEGAMAT','GIATMARA Segamat,\nKompleks Penghulu Mukim Gemas,\n81500 Batu Anam,\nSegamat,Johor.','07-9498079','07-9498078','gmsegamat@giatmara.edu.my','2006-01-15 00:00:00',1,15728,1,'2013-09-25 00:00:00','810415055199',7),(147,'617',1,'PARIT SULONG','PTD 8507, JALAN SERINDIT, 83500 PARIT SULONG, BATU PAHAT, JOHOR','07-4186679','07-4186679','gmparitsulong@giatmara.edu.my','2006-01-15 00:00:00',1,16947,1,'2013-09-25 00:00:00','810415055199',7),(148,'445',1,'MERSING','Kompleks Penghulu, Mukim Mersing, Kampung pangkalan Batu, 86800 Mersing','07-7995450','07-7991704','gmmersing@giatmara.edu.my','2006-01-15 00:00:00',1,34857,1,'2013-09-25 00:00:00','810415055199',7),(149,'453',1,'LEDANG','Lot PTD 4570, Kaw. Perindustrian Tg. Agas, 84000 Muar','06-9535004','06-9535004 ','gmledang@giatmara.edu.my','2006-01-15 00:00:00',1,17500,1,'2013-09-27 00:00:00','590806016363',7),(150,'429',1,'PAGOH','Kompleks Penghulu Mukim, Jorak/ Pagoh,84600 Pagoh','06-9747264/266','06-9747264/266','gmpagoh@giatmara.edu.my','2006-01-15 00:00:00',1,16373,1,'2013-09-26 00:00:00','780202106357',7),(151,'626',1,'SRI GADING','No. 25A, Jalan Kencana 1A/1,\nTaman Pura Kencana,\n83300 Sri Gading,\nBatu Pahat,\nJohor','07-4559742','07-4559742','gmsrigading@giatmara.edu.my','2006-01-15 00:00:00',1,15315,1,'2014-06-17 00:00:00','810415055199',7),(152,'621',1,'GELANG PATAH','Kampung Tiram Duku, 81560 Gelang Patah','07-5072515','07-5071900','gmgelangpatah@giatmara.edu.my','2006-01-15 00:00:00',1,15782,1,'2013-09-25 00:00:00','810415055199',7),(153,'656',1,'LABIS','PTD 1907, Desa Temu Jodoh, 85400 Chaah, Johor','07-9263164','07-9263164','gmlabis@giatmara.edu.my','2006-01-15 00:00:00',1,31066,1,'2013-10-10 00:00:00','691119015169',7),(154,'627',1,'PONTIAN','Lot 8886, Mukim Ayer Baloi Sanglang, 82100 Pontian','07-6901016','07-6901016','gmpontian@giatmara.edu.my','2006-01-15 00:00:00',1,15310,1,'2013-09-25 00:00:00','810415055199',7),(155,'646',1,'TEBRAU','NO. 63-A, JALAN TEMBIKAI 7,\nTAMAN KOTA MASAI,\n81700 PASIR GUDANG,\nJOHOR.','07-2514585','07-2542585','gmtebrau@giatmara.edu.my','2006-01-15 00:00:00',1,44541,1,'2013-11-15 00:00:00','810415055199',7),(156,'688',1,'TENGGARA','Lot 5024, Jalan Dato\' Sri Amar, 81440 Bandar Tenggara, Johor','07-8963121','07-8963121','gmtenggara@giatmara.edu.my','2006-01-15 00:00:00',1,15662,1,'2013-09-25 00:00:00','810415055199',7),(157,'609',1,'JOHOR BAHRU','No 2, Jalan Mawar 46, Taman Mawar, 81700, Pasir Gudang, Johor ','07-2518287','07-2518287','gmjohorbahru@giatmara.edu.my','2006-01-15 00:00:00',1,44541,1,'2013-09-25 00:00:00','810415055199',7),(158,'615',1,'MUAR','No 2, Jalan Impian, Taman Sarang Buaya\n83600, Semerah, Muar\nJohor','07-4163646','07-4162946','gmmuar@giatmara.edu.my','2006-01-15 00:00:00',1,17053,1,'2013-09-25 00:00:00','810415055199',7),(159,'436',1,'MIRI','LOT 3610 - 3613, \nLORONG 8A, BLOK 6 KBLD,\nPERMY TECHNOLOGY PARK,\nJALAN TUDAN, \n98100 MIRI, \nSARAWAK.','085-604227','085-434227','gmmiri@giatmara.edu.my','2006-01-15 00:00:00',1,37910,1,'2016-03-21 00:00:00','810415055199',19),(160,'605',1,'BATANG SADONG','lot 202, Kampung Semera, 94600 Asajaya, Sarawak','082-826564','082-826194','gmbatangsadong@giatmara.edu.my','2006-01-15 00:00:00',1,18007,1,'2016-04-14 00:00:00','821216135165',19),(161,'603',1,'STAMPIN','GIATMARA STAMPIN\n1st Floor Lot 3230\nRock Commercial Centre\nJalan Rock 93200 Kuching\nSarawak.','082-232127','082-232117','gmstampin@giatmara.edu.my','2006-01-15 00:00:00',1,24398,1,'2013-09-27 00:00:00','810415055199',19),(162,'494',1,'LAWAS','No.1, Quarters Kerajaan, Daerah Kecil Sundar, 98800 Sundar Lawas','085-264061','085-264636','gmlawas@giatmara.edu.my','2006-01-15 00:00:00',1,38202,1,'2013-09-27 00:00:00','810415055199',19),(163,'493',1,'MUKAH','Jln. Pam Stesen Lama, Kg. Penakub Hilir, P.0. Box 196, 96400 Mukah','084-872019','084-871564','gmmukah@giatmara.edu.my','2006-01-15 00:00:00',1,19122,1,'2013-09-27 00:00:00','810415055199',19),(164,'642',1,'SERIAN','No.1, Jalan Tebakang Batu 2, Rumah Kakitangan JKR, Kampung Kakai, 94700 Serian','082-895409','082-895415','gmserian@giatmara.edu.my','2006-01-15 00:00:00',1,17935,1,'2014-03-05 00:00:00','810415055199',19),(165,'665',1,'SARATOK','Bangunan JKR Lama, Peti Surat 104, 95400 Saratok, Sarawak','083-437085','083-437084','gmsaratok@giatmara.edu.my','2006-01-15 00:00:00',1,18504,1,'2013-11-08 00:00:00','731028135759',19),(166,'674',1,'BETONG','BANGUNAN MAJLIS DAERAH LAMA, \n95700 BETONG. ','083-472029','083-472785','gmbetong@giatmara.edu.my','2006-01-15 00:00:00',1,18523,1,'2013-09-19 00:00:00','840106125605',19),(167,'495',1,'BINTULU','Medan Niaga Jepak, Bangunan SEDC, Peti Surat 2364, 97000 Bintulu, Sarawak','086-201688','086-201689','gmbintulu@giatmara.edu.my','2006-01-15 00:00:00',1,37909,1,'2013-09-27 00:00:00','810415055199',19),(168,'489',1,'KOTA SAMARAHAN','Lot 5423, 5424, 5425 & 5426,\nMuara Tuang Land District,\n94300 Kota Samarahan, \nSarawak','082-750075','082-662387','gmsamarahan@giatmara.edu.my','2006-01-15 00:00:00',1,26190,1,'2016-10-14 00:00:00','810415055199',19),(169,'664',1,'SANTUBONG','Kaw. Industri MARA (KIM), Lot 1191 & 1192, Blok 7, Demak Laut Industrial estate, Jalan Bako, 93050 Kuching','082-433048','082-433497','gmsantubong@giatmara.edu.my','2006-01-15 00:00:00',1,23087,1,'2013-09-19 00:00:00','840106125605',19),(170,'643',1,'SIBU','Lot 343, Batu 6 /1/2, Jalan Ulu Oya, Peti Surat 384, 96000 Sibu','084-319454','084-316454','gmsibu@giatmara.edu.my','2006-01-15 00:00:00',1,18585,1,'2013-09-27 00:00:00','810415055199',19),(171,'666',1,'SARIKEI','Sublot No. 1 & 2 (G Flr and 2nd Flr), Off Jalan Rentap, Tiang Soon Height, P.O.Box 80, 96100 Sarikei, Sarawak.','084654268','084654272','gmsarikei@giatmara.edu.my','2006-01-15 00:00:00',1,18621,1,'2014-06-10 00:00:00','810415055199',19),(172,'496',1,'TANJUNG MANIS','Bangunan Kedai MARA Kg. Belawai, 96150 Belawai','084-815484','084-815472','gmtanjungmanis@giatmara.edu.my','2006-01-15 00:00:00',1,18624,1,'2013-09-19 00:00:00','840106125605',19),(173,'658',1,'MAS GADING','Lot 646, Jalan Bahagia Jaya, 94500 Lundu','082-734568','082-734566','gmmasgading@giatmara.edu.my','2006-01-15 00:00:00',1,17890,1,'2013-09-19 00:00:00','840106125605',19),(174,'676',1,'BARAM','No. 365A & 366B,\nJalan Wawasan Marudi,\n98050 Baram, \nSarawak.','085-756457','085-755230','gmbaram@giatmara.edu.my','2006-01-15 00:00:00',1,38043,1,'2016-08-29 00:00:00','810415055199',19),(175,'619',1,'PETRA JAYA','Lot 2874 & 2875, Lorong B1, Tingkat 1, Rpr Fasa 2, Jalan Astana, Petra Jaya, \n93050 Kuching, Sarawak.','082-312413','082-441926','gmpetrajaya@giatmara.edu.my','2006-01-15 00:00:00',1,23090,1,'2013-09-19 00:00:00','840106125605',19),(176,'657',1,'LUBOK ANTU','GIATMARA LUBOK ANTU\nLOT 146, BLOK 9\nBUKIT BESAI LAND DISTRICT\n95900 LUBOK ANTU\nSARAWAK','083-584033','083-584055','gmlubokantu@giatmara.edu.my','2006-01-15 00:00:00',1,18540,1,'2014-12-10 00:00:00','821216135165',19),(177,'648',1,'BATANG LUPAR','Kampung Baru, Jalan Sungai Rama, 94850 Sebuyau','083-468863','083-467958','gmbatanglupar@giatmara.edu.my','2006-01-15 00:00:00',1,18008,1,'2013-09-19 00:00:00','840106125605',19),(178,'498',1,'SRI AMAN','SUBLOT NO 13\nBLOK 2\nSIMANGGANG TOWN DISTRICT\n95000 SRI AMAN','083-321179','083-325889','gmsriaman@giatmara.edu.my','2006-01-15 00:00:00',1,18439,1,'2013-12-16 00:00:00','840106125605',19),(179,'683',1,'JULAU','Rumah Kedai, No. 18, Pekan Julau, 96600 Julau, Sarawak.','084-734789','084-734787','gmjulau@giatmara.edu.my','2006-01-15 00:00:00',0,19164,1,'2013-09-27 00:00:00','810415055199',19),(180,'651',1,'KAPIT','No. 11, Jalan Beleteh, 96807 Kapit','084-797501','084-798529','gmkapit@giatmara.edu.my','2006-01-15 00:00:00',1,19177,1,'2013-09-27 00:00:00','810415055199',19),(181,'478',1,'KUDAT','Peti Surat 396,\n89058 Kudat, Sabah.','088-612489','088-612489','gmkudat@giatmara.edu.my','2006-01-15 00:00:00',1,22043,1,'2013-08-31 00:00:00','810415055199',18),(182,'470',1,'KOTA BELUD','W.D.T. 151\nJalan Pusat GIATMARA\n89159 Kota Belud','088-975006','088-977610','gmkotabelud@giatmara.edu.my','2006-01-15 00:00:00',1,22056,1,'2013-08-29 00:00:00','780917125973',18),(183,'437',1,'KOTA KINABALU','LOT 3 & 4, L.I.B KOLOMBONG,\nOFF JALAN LINTAS, JALAN LIMAU MANIS,\nPETI SURAT 16261,\n88869 KOTA KINABALU, SABAH.','088-381153','088-381154','gmkotakinabalu@giatmara.edu.my','2006-01-15 00:00:00',1,21926,1,'2013-11-14 00:00:00','810415055199',18),(184,'602',1,'KOTA MARUDU','Peti Surat 252, 89108 Kota Marudu','088-661120','088-661120','gmkotamarudu@giatmara.edu.my','2006-01-15 00:00:00',1,22049,1,'2013-08-31 00:00:00','810415055199',18),(185,'473',1,'KENINGAU','Peti Surat 692, 89008 Keningau, Sabah','087-331901','087-332094','gmkeningau@giatmara.edu.my','2006-01-15 00:00:00',1,22031,1,'2013-08-31 00:00:00','810415055199',18),(186,'625',1,'SILAM','Lot 10 & Lot 11 Bangunan Adika Commercial\nKm5,Jalan Tengah Nipah,\nPeti Surat 62289,\n91128  Lahad  Datu\nSabah','089-884675','089-884673','gmsilam@giatmara.edu.my','2006-01-15 00:00:00',1,22629,1,'2013-08-31 00:00:00','810415055199',18),(187,'632',1,'TAWAU','GIATMARA TAWAU\nTAMAN MEGAH JAYA\nBATU 4, JALAN APAS\nPETI SURAT 61260, 91022\nTAWAU SABAH.','089-750507','089-757013','gmtawau@giatmara.edu.my','2006-01-15 00:00:00',1,22600,1,'2013-08-29 00:00:00','681127125131',18),(188,'663',1,'SANDAKAN','No. 032, KM 2.2, Jalan Utara,\n90000 Sandakan\nSabah','089-222416','089-224160','gmsandakan@giatmara.edu.my','2006-01-15 00:00:00',1,22580,1,'2013-08-31 00:00:00','810415055199',18),(189,'637',1,'W. PERSEKUTUAN LABUAN','BKM 0843, Simpang Pinang\nKg. Sg. Bedaun, Peti Surat 81580\n87019 W. P. Labuan','087-468575','087-466575','gmlabuan@giatmara.edu.my','2006-01-15 00:00:00',1,38285,1,'2016-09-30 00:00:00','810415055199',18),(190,'631',1,'LIMBAWANG','Peti Surat 484, 89800 Beaufort','087-211676','087-225008','gmlimbawang@giatmara.edu.my','2006-01-15 00:00:00',1,22543,1,'2013-08-31 00:00:00','810415055199',18),(191,'673',1,'SEMPORNA','GIATMARA Semporna, Peti Surat 474, 91308 Semporna, Sabah.','089-784090','089-782654','gmsemporna@giatmara.edu.my','2006-01-15 00:00:00',1,22615,1,'2013-08-29 00:00:00','810415055199',18),(192,'694',1,'KINABATANGAN','GIATMARA Kinabatangan, W.D.T. 239\n90200 Kota Kinabatangan, Sabah','089-561986','089-562730','gmkinabatangan@giatmara.edu.my','2006-01-15 00:00:00',1,22589,1,'2013-08-31 00:00:00','810415055199',18),(193,'693',1,'RANAU','Kilometer 02, Jalan Sandakan, Beg Berkunci No. 5, 89309 Ranau Sabah ','088-875072','088-877423','gmranau@giatmara.edu.my','2006-01-15 00:00:00',1,22511,1,'2013-08-31 00:00:00','810415055199',18),(194,'672',1,'TUARAN','GIATMARA TUARAN,\nJALAN SERUSUP, KG. TAJAU, \nPETI SURAT 487, \n89208 TUARAN, SABAH.','088-794870','088-794871','gmtuaran@giatmara.edu.my','2006-01-15 00:00:00',1,22491,1,'2013-08-31 00:00:00','810415055199',18),(195,'660',1,'TENOM','Pusat Kebudayaan Murut, Wdt. 36, 89909 Tenom','087-303790','087-302425','gmtenom@giatmara.edu.my','2006-01-15 00:00:00',1,22563,1,'2013-08-29 00:00:00','790402125383',18),(196,'677',1,'GAYA','Peti Surat No. A 424, 89357 Inanam','088-438601','088-438601','gmgaya@giatmara.edu.my','2006-01-15 00:00:00',1,21442,1,'2013-08-31 00:00:00','810415055199',18),(197,'459',1,'LIBARAN','GIATMARA Libaran\nLot 1, Ka Shing Industrial Centre\n(Detached Unit ), Batu 7 Jalan Labuk\n90000 Sandakan\nSabah','089-671607/671','089-671607','gmlibaran@giatmara.edu.my','2006-01-15 00:00:00',1,22593,1,'2013-08-31 00:00:00','810415055199',18),(198,'640',1,'PENAMPANG','PETI SURAT 38, 88858 TANJUNG ARU, KOTA KINABALU, SABAH.','088-716994','088-716995','gmpenampang@giatmara.edu.my','2006-01-15 00:00:00',1,22512,1,'2014-07-10 00:00:00','810415055199',18),(199,'661',1,'BEAUFORT','W.D.T, No 23, 89740 Kuala Penyu','087-208472','087-914532','gmbeaufort@giatmara.edu.my','2006-01-15 00:00:00',1,22543,1,'2016-12-15 00:00:00','810415055199',18),(200,'668',1,'BELURAN','Peti Surat 429, 90107 Beluran, Sabah.','089-513141','089-513151','gmbeluran@giatmara.edu.my','2006-01-15 00:00:00',1,22599,1,'2013-08-29 00:00:00','790811125819',18),(201,'635',1,'PAPAR','Peti Surat 495, 89607 Papar','088-914707','088-914532','gmpapar@giatmara.edu.my','2006-01-15 00:00:00',1,22529,1,'2013-08-31 00:00:00','810415055199',18),(202,'630',1,'KIMANIS','peti surat 210\n89727 Membakut,\nSabah','087-889327','087-886340','gmkimanis@giatmara.edu.my','2006-01-15 00:00:00',1,17820,1,'2013-08-31 00:00:00','810415055199',18),(221,'644',1,'BUKIT BENDERA','No. 2-G & 2-1 Jalan Lembah Permai,\n11200 Tanjung Bungah,\nPulau Pinang','04-8991700','04-8992700','gmbukitbendera@giatmara.edu.my','2006-02-03 00:00:00',1,44717,1,'2013-09-05 00:00:00','760608075767',14),(222,'696',1,'JELUTONG','NO.84-G LINTANG SUNGAI PINANG,\r\n\nSKYLINE CITY,\r\n\n10150 GEORGETOWN,\r\n\nPULAU PINANG','042822700','042821244','gmjelutong@giatmara.edu.my','2006-02-03 00:00:00',1,45025,1,'2015-09-11 00:00:00','810415055199',14),(223,'572',1,'BUKIT GELUGOR','No 363R Jalan Sultan Azlan Shah\n11700 Gelugor\nPulau Pinang','04-6585815','04-6579700','gmbukitgelugor@giatmara.edu.my','2006-02-03 00:00:00',1,44920,1,'2016-06-29 00:00:00','810415055199',14),(224,'586',1,'KUALA KRAU','Kampung Desa Murni Kerdau, \n28010 Temerloh,\nPahang Darul Makmur.','09-2846442','09-2846442','gmkualakrau@giatmara.edu.my','2006-02-03 00:00:00',1,45272,1,'2013-09-26 00:00:00','810415055199',13),(225,'570',1,'KETEREH','Lot 236, Kuarters KADA Ketereh, 16450, Ketereh,\nKota Bharu,\nKelantan.','09-7880211','09-7880212','gmketereh@giatmara.edu.my','2006-02-03 00:00:00',1,45397,1,'2013-09-26 00:00:00','810415055199',16),(227,'584',1,'SELANGAU','Sublot 597-599, \r\n\nPasar Baru Selangau, \r\n\nPeti Surat 584, \r\n\n96000 Sibu','084-891148','084-891168','gmselangau@giatmara.edu.my','2006-02-03 00:00:00',1,18546,1,'2015-07-13 00:00:00','810415055199',19),(228,'579',1,'MAMBONG','SUBLOT 2 & 3 EASTERN COMMERCIAL CENTRE, BATU 17\nJALAN KUCHING-SERIAN 94200 KUCHING, SARAWAK','082-862077','082-863055','gmmambong@giatmara.edu.my','2006-02-03 00:00:00',1,26768,1,'2013-09-19 00:00:00','840106125605',19),(230,'577',1,'SEPANGGAR','Lot 12 & 13, Taman Fulliwa, Fasa 1, Mile 11, Jalan Tuaran, Pos Mini Indah Permai, Peti Surat 272, 88450 Kota Kinabalu','088-473551','088-473550','gmsepanggar@giatmara.edu.my','2006-02-03 00:00:00',1,21913,1,'2013-08-31 00:00:00','810415055199',18),(231,'576',1,'BATU SAPI','Lot 1 & 2, Blok Y, KM 1.5\nJalan Leila, Bandar Ramai - Ramai\n90000 Sandakan, Sabah','089 - 227 508','089 - 227 520','gmbatusapi@giatmara.edu.my','2006-02-03 00:00:00',1,22571,1,'2014-03-11 00:00:00','780927125459',18),(232,'574',1,'KELANA JAYA','No.12, Jalan Pekaka 8/4, Seksyen 8, Kota Damansara, 47810 Petaling Jaya, Selangor','03-61416016','03-78054258','gmkelanajaya@giatmara.edu.my','2006-02-03 00:00:00',1,9257,1,'2013-09-27 00:00:00','810415055199',10),(233,'697',1,'LEMBAH PANTAI','No. 15-1, Tingkat 1, Jalan Pantai Murni, Pantai Dalam, 52900 K.Lumpur','0322420034','0322420034','gmlembahpantai@giatmara.edu.my','2006-02-03 00:00:00',1,37981,1,'2014-04-08 00:00:00','810415055199',20),(234,'571',1,'REMBAU','No.2 Tingkat 1, Taman Gadong, 71350 Kota, Negeri Sembilan.','06-4382024','06-4382033','gmrembau@giatmara.edu.my','2006-02-03 00:00:00',1,45491,1,'2013-07-09 00:00:00','810415055199',9),(235,'636',1,'PENGERANG','Dewan Majlis Belia Felda, Wilayah Johor Selatan, Felda Sening,       81900 Kota Tinggi','07-8276227','07-8276227','gmpengerang@giatmara.edu.my','2006-02-03 00:00:00',1,15906,1,'2013-09-25 00:00:00','810415055199',7),(236,'699',1,'SEKIJANG','No. 45, Jalan Putra 1/2, Bandar Putra, 85000 Segamat','07-9435232','07-9436232','gmsekijang@giatmara.edu.my','2006-02-03 00:00:00',1,29725,1,'2013-09-25 00:00:00','810415055199',7),(237,'698',1,'AYER HITAM','No. 32 Jalan 1/3 Bandar Baru Ayer Hitam 1, 86100 Ayer Hitam','07-7582610','07-7582598','gmayerhitam@giatmara.edu.my','2006-02-03 00:00:00',1,32908,1,'2013-09-25 00:00:00','810415055199',7),(238,'695',1,'SIMPANG RENGGAM','No. 8, Jalan Cemara, 86200 Simpang Renggam','07-7558343','07-7558242','gmsimpangrenggam@giatmara.edu.my','2006-02-03 00:00:00',1,33017,1,'2013-09-25 00:00:00','810415055199',7),(239,'581',1,'SETIAWANGSA','NO. 18, JALAN WANGSA DELIMA 11, D\'WANGSA, WANGSA MAJU, 53300 KUALA LUMPUR, WILAYAH PERSEKUTUAN KUALA LUMPUR','03-41442134','03-41442068','gmsetiawangsa@giatmara.edu.my','2006-02-03 00:00:00',1,12464,1,'2013-11-07 00:00:00','810831025116',20),(241,'580',1,'BANDAR TUN RAZAK','Jalan Budiman,\nKomersial Komuniti Bandar Tun Razak\n56000 Kuala Lumpur','03-91718273','03-00','gmbandartunrazak@giatmara.edu.my','2008-12-15 13:30:00',1,9757,1,'2013-07-09 00:00:00','810415055199',20),(242,'582',1,'PUTRAJAYA','No 34, 34A, 34B, Jalan Diplomatik, Precint 15, 62606 Putrajaya','03-88903545','03-88903455','gmputrajaya@giatmara.edu.my','2008-12-15 13:34:25',1,38264,1,'2013-07-09 00:00:00','810415055199',20),(261,'691',1,'SERDANG','No. 36, Jalan PSK 4,\nPusat Perdagangan Seri Kembangan,\n43300 Seri Kembangan,\nSelangor','03-89419384','03-89419858','gmserdang@giatmara.edu.my','2008-12-26 16:08:36',1,3885,1,'2013-09-27 00:00:00','810415055199',10),(262,'575',1,'KOTA RAJA','NO. 41, JALAN KOTA RAJA L27/L\nHICOM TOWN CENTRE\nSEKSYEN 27,\n40400 SHAH ALAM\nSELANGOR','03-51034223','03-51034225','gmkotaraja@giatmara.edu.my','2008-12-26 16:28:04',1,2643,1,'2013-08-22 00:00:00','810831025116',10),(263,'573',1,'PANDAN','Lot 3G, Jalan Perubatan 4\nPandan Indah\n55100 Kuala Lumpur','03-42950061','03-42950048 ','gmpandan@giatmara.edu.my','2008-12-26 16:28:04',1,11750,1,'2013-09-27 00:00:00','810415055199',10),(270,'597',1,'PULAI','NO.23 & 23-01\nJALAN BAIDURI 1/1\nTAMAN BAIDURI\n81200','07-2411426','-','gmpulai@giatmara.edu.my','2009-11-19 11:39:07',1,44512,1,'2016-07-12 00:00:00','810415055199',7),(271,'684',1,'PASIR GUDANG','JALAN PERMAS SELATAN,\nBANDAR BARU PERMAS JAYA,\n81750 MASAI, JOHOR','07-3889848','07-3889849','gmpasirgudang@giatmara.edu.my','2011-01-07 21:34:20',1,44512,1,'2013-09-25 00:00:00','810415055199',7),(272,'591',1,'BATU','GIATMARA BATU\nBANGUNAN YAYASAN PENDIDIKAN BATU\nJALAN 46/10, TAMAN BATU MUDA,\n68100 BATU CAVES\nKUALA LUMPUR','03-61851807','03-61852596','gmbatu@giatmara.edu.my','2013-05-29 15:03:00',1,9757,1,'2013-07-09 00:00:00','810415055199',20),(273,'592',1,'WANGSA MAJU','GIATMARA WANGSA MAJU\nNO.20, 20-1, 20-2, PLAZA USAHAWAN GENTING KLANG,\nJALAN DANAU NIAGA 1, TAMAN DANAU KOTA,\n53300 KUALA LUMPUR','03- 4131 9339','','gmwangsamaju@giatmara.edu.my','2013-05-29 15:08:00',1,9757,1,'2013-07-09 00:00:00','810415055199',20),(274,'587',1,'BATU KAWAN','GIATMARA BATU KAWAN\nNO. 2 & 4,\nJALAN BESAR SIMPANG AMPAT,\nTAMAN MERAK,14100,\nSIMPANG AMPAT,\nPULAU PINANG.','04-5882451','04-5883751','gmbatukawan@giatmara.edu.my','2013-06-12 10:22:54',1,18898,1,'2013-09-26 00:00:00','810415055199',14),(275,'423',1,'MARAN','GIATMARA Maran\nBandar Baru Chenor\n28100 Chenor\nPahang darul Makmur','092995012','092995013','gmmaran@giatmara.edu.my','2013-06-12 10:35:04',1,35993,1,'2013-12-20 00:00:00','810415055199',13),(276,'594',1,'KUANTAN','LOT A-5, KILANG IKS, \nKAWASAN PERUSAHAAN PPD, \nKG SOI,JALAN PANTAI SEPAT, \n25150 KUANTAN, \nPAHANG\n ','09-5342102','09-5341450','gmkuantan@giatmara.edu.my','2013-06-12 15:55:31',1,33399,1,'2013-09-26 00:00:00','810415055199',13),(277,'422',1,'BAKRI','BANGUNAN DATO\' SAIPOLBAHARI\nPOS 160,PARIT TENGAH C,\nBATU 18, AIR HITAM,\n84060 MUAR,\nJOHOR','07-4213600','07-4213700','gmbakri@giatmara.edu.my','2013-06-12 22:19:54',1,17079,1,'2013-09-25 00:00:00','810415055199',7),(278,'593',1,'SEMBRONG','JALAN TIONG FELDA KAHANG TIMUR \n86000 KLUANG \nJOHOR','07-7866555','07-7866554','gmsembrong@giatmara.edu.my','2013-06-12 22:22:50',1,31091,1,'2013-09-25 00:00:00','810415055199',7),(279,'598',1,'KUBANG KERIAN','LOT 2399 KG PADANG BONGOR, \nKUBANG KERIAN, \n16150 KOTA BHARU, \nKELANTAN','09-7666871','09-7666872','gmkubangkerian@giatmara.edu.my','2013-06-13 09:34:04',1,32493,1,'2016-03-29 00:00:00','710426115355',16),(281,'588',1,'TAPAH','Lot 360 Bandar Temoh, \nDaerah Batang Padang, \n35350 Temoh\nPerak','05-4190049','05-4190049','gmtapah@giatmara.edu.my','2013-06-13 11:59:33',1,22758,1,'2013-08-23 00:00:00','680923085471',11),(282,'547',1,'PENSIANGAN','GIATMARA PENSIANGAN, \nD/A GIATMARA KENINGAU, \nPETI SURAT 692, \n89008 KENINGAU, \nSABAH','087-366718','087-366716','gmpensiangan@giatmara.edu.my','2013-06-13 14:11:53',1,22023,1,'2013-08-29 00:00:00','810415055199',18),(283,'548',1,'PUTATAN','GIATMARA PUTATAN, \nBALAIRAYA KG. LINSUK, \nTAMAN BERSATU, \nP.O.BOX 726, \n88858 TANJUNG ARU,\nKOTA KINABALU \nSABAH','088-761805','088-760029','gmputatan@giatmara.edu.my','2013-06-13 14:14:24',1,17820,1,'2013-08-31 00:00:00','810415055199',18),(284,'549',1,'SIPITANG','Bangunan Arked MARA, \nDB1/3, (SE03-04), \n89859 Sipitang, \nSabah ','087-821 445','','gmsipitang@giatmara.edu.my','2013-06-13 14:16:37',1,22555,1,'2013-08-31 00:00:00','810415055199',18),(285,'595',1,'BANDAR KUCHING','GIATMARA BANDAR KUCHING, \nBANGUNAN WISMA HARAPAN,\nJALAN BUDAYA, \n93000 KUCHING, \nSARAWAK','082-370060','','gmbandarkuching@giatmara.edu.my','2013-06-13 14:42:45',1,17860,1,'2013-09-19 00:00:00','840106125605',19),(286,'616',1,'HULU REJANG','KUARTERS KERAJAAN KELAS G, \nJALAN DIAN DING, \n96900 BELAGA, \nSARAWAK','086461023','086461022','gmhulurejang@giatmara.edu.my','2013-06-13 14:49:00',1,19187,1,'2013-09-27 00:00:00','810415055199',19),(287,'596',1,'IGAN','LOT 127 DARO NEW TOWNSHIP \n96200 DARO \nSARAWAK','084823146','084823146','gmigan@giatmara.edu.my','2013-06-13 14:51:14',1,18633,1,'2014-01-06 00:00:00','810415055199',19),(288,'578',1,'KANOWIT','GIATMARA Kanowit Log 599, \nTaman Muhibah Indah \n96700 Kanowit \nSarawak','084-752100','084-752107','gmkanowit@giatmara.edu.my','2013-06-13 14:54:42',1,19168,1,'2013-09-27 00:00:00','810415055199',19),(289,'692',1,'LANANG','GIATMARA LANANG, \nKEDAI SIBU JAYA, LOT 1196, \nSUBLOT 35, 37, 38, 41 & 42, \nSIBU JAYA, COMMERCIAL CENTER, \n96000 SIBU, \nSARAWAK','084-228451','','gmlanang@giatmara.edu.my','2013-06-13 15:02:12',1,18546,1,'2013-09-27 00:00:00','810415055199',19),(290,'545',1,'LIMBANG','GIATMARA Limbang \nPejabat Residen Lama Jalan Buangsiol, \n98700 Limbang, \nSarawak','085211300','085211308','gmlimbang@giatmara.edu.my','2013-06-13 15:03:45',1,38073,1,'2013-09-27 00:00:00','810415055199',19),(291,'546',1,'SIBUTI','GIATMARA SIBUTI NO.205, \nJALAN BEKENU ASLI, \nBEKENU BAZAAR, BEKENU TOWN DISTRICT, 98150 BEKENU, SIBUTI, \nSARAWAK','085-719032','085-719029','gmsibuti@giatmara.edu.my','2013-06-13 15:10:05',1,37910,1,'2013-09-27 00:00:00','810415055199',19),(295,'589',1,'KLANG','No. 50 & 52, Jalan Damar/KS9, Glenmarie Cove, 42000 Port Klang, Selangor Darul Ehsan.','03-31651740','03-31650376','gmklang@giatmara.edu.my','2013-07-29 14:49:38',1,1893,1,NULL,NULL,10),(297,'440',1,'SUBANG','Lot 3107, Jalan Tempayan Emas 1, Kg. Paya Jaras Dalam, 47000 Sungai Buluh','03-61518499','03-61518499','gmsubang@giatmara.edu.my','2013-07-29 14:51:55',1,8907,1,'2014-01-08 00:00:00','740622025979',10),(298,'590',1,'KUALA SELANGOR','No. 9 & 9A, Taman Muara Esbee\n45800 Jeram\nSelangor Darul Ehsan.','0332640520','0332640328','gmkualaselangor@giatmara.edu.my','2013-09-11 09:25:36',1,4792,1,'2014-01-08 00:00:00','700121106192',10);
/*!40000 ALTER TABLE `ref_giatmara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_hubungan`
--

DROP TABLE IF EXISTS `ref_hubungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_hubungan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hubungan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_hubungan`
--

LOCK TABLES `ref_hubungan` WRITE;
/*!40000 ALTER TABLE `ref_hubungan` DISABLE KEYS */;
INSERT INTO `ref_hubungan` VALUES (1,'Isteri'),(2,'Suami'),(3,'Penjaga'),(4,'Saudara');
/*!40000 ALTER TABLE `ref_hubungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_intake`
--

DROP TABLE IF EXISTS `ref_intake`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_intake` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_intake` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_intake` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_intake`
--

LOCK TABLES `ref_intake` WRITE;
/*!40000 ALTER TABLE `ref_intake` DISABLE KEYS */;
INSERT INTO `ref_intake` VALUES (1,'Jan18','Januari 2018','2018-01-01','2018-06-30'),(2,'Julai17','Julai 2017','2017-07-01','2017-12-31');
/*!40000 ALTER TABLE `ref_intake` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_jabatan`
--

DROP TABLE IF EXISTS `ref_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_jabatan` (
  `id` int(10) NOT NULL,
  `nama_jabatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_jabatan`
--

LOCK TABLES `ref_jabatan` WRITE;
/*!40000 ALTER TABLE `ref_jabatan` DISABLE KEYS */;
INSERT INTO `ref_jabatan` VALUES (1,'Bahagian Audit Dalam [AUD]'),(2,'Bahagian Kewangan [KEW]'),(3,'Bahagian Pembangunan Kurikulum [PKL]'),(4,'Bahagian Pengurusan Projek &amp; Senggaraan'),(5,'Bahagian Pembangunan Sistem Maklumat [PSM]'),(6,'Bahagian Pembangunan Sumber Manusia'),(7,'Bahagian Pembangunan Usahawan [BPU]'),(8,'Bahagian Pembangunan Pelatih &amp; Kerjaya'),(9,'Bahagian Dasar &amp; Perancangan Strategik'),(10,'Bahagian Perhubungan Korporat'),(12,'Pejabat GIATMARA Negeri'),(13,'Pejabat Ketua Pegawai Eksekutif'),(14,'Pusat GIATMARA'),(15,'Pusat Komuniti/Prima GIATMARA'),(16,'Sektor Pengurusan Sumber Manusia &amp; Hal Ehwal Pelat'),(17,'Sektor Pembangunan Latihan &amp; Keusahawanan [SPK]'),(25,'Bahagian Pembangunan Perniagaan [PPN]'),(53,'Sektor Kewangan &amp; Perolehan [SKP]'),(54,'Bahagian Aset &amp; Perolehan');
/*!40000 ALTER TABLE `ref_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_jawatan`
--

DROP TABLE IF EXISTS `ref_jawatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_jawatan` (
  `id` int(2) NOT NULL DEFAULT '0',
  `nama_jawatan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_jawatan`
--

LOCK TABLES `ref_jawatan` WRITE;
/*!40000 ALTER TABLE `ref_jawatan` DISABLE KEYS */;
INSERT INTO `ref_jawatan` VALUES (1,'Administrator'),(2,'Application Administrator GIS'),(3,'Application Programmer'),(4,'Database Administrator'),(5,'Pengarah'),(6,'Ketua Pegawai Eksekutif'),(7,'Pegawai Alatan Dan Senggaraan'),(8,'Pegawai Khas'),(9,'Pegawai Kurikulum'),(10,'Pegawai Pembangunan Usahawan'),(11,'Pegawai Perhubungan Industri'),(12,'Pegawai Tadbir'),(13,'Pekerja Am'),(14,'Pemandu'),(15,'Pembantu Makmal'),(16,'Pembantu Eksekutif Urustadbir'),(17,'Pembantu Eksekutif Urustadbir Kanan'),(18,'Pembantu Teknik'),(19,'Pengurus'),(20,'Pengurus (GM)'),(21,'Pengurus Kanan'),(22,'Pengarah GIATMARA Negeri'),(23,'Penolong Eksekutif'),(24,'Pembantu Eksekutif Logistik'),(25,'Pembantu Eksekutif Logistik Kanan'),(26,'Eksekutif'),(27,'Super Administrator'),(28,'System Administrator'),(30,'Tenaga Pengajar'),(31,'Tenaga Pengajar Kanan'),(32,'Timbalan Ketua Pegawai Eksekutif'),(35,'Timbalan Pengarah GIATMARA Negeri'),(36,'Pengurus Kanan (GM)'),(37,'Ketua Unit'),(38,'Ketua Unit Kanan'),(39,'Praktikal Student'),(40,'Pegawai Pembangunan Usahawan');
/*!40000 ALTER TABLE `ref_jawatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_jenis_jawatan`
--

DROP TABLE IF EXISTS `ref_jenis_jawatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_jenis_jawatan` (
  `id` int(11) NOT NULL,
  `nama_jenis_jawatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_jenis_jawatan`
--

LOCK TABLES `ref_jenis_jawatan` WRITE;
/*!40000 ALTER TABLE `ref_jenis_jawatan` DISABLE KEYS */;
INSERT INTO `ref_jenis_jawatan` VALUES (1,'Tetap'),(2,'Kontrak'),(3,'PSS/Sementara');
/*!40000 ALTER TABLE `ref_jenis_jawatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kategori_pemohon`
--

DROP TABLE IF EXISTS `ref_kategori_pemohon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kategori_pemohon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_pemohon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kategori_pemohon`
--

LOCK TABLES `ref_kategori_pemohon` WRITE;
/*!40000 ALTER TABLE `ref_kategori_pemohon` DISABLE KEYS */;
INSERT INTO `ref_kategori_pemohon` VALUES (1,'Anggota Polis'),(2,'Bekas Polis'),(3,'Lepasan Sekolah'),(4,'Kakitangan Kerajaan');
/*!40000 ALTER TABLE `ref_kategori_pemohon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kategori_penjaga`
--

DROP TABLE IF EXISTS `ref_kategori_penjaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kategori_penjaga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_penjaga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kategori_penjaga`
--

LOCK TABLES `ref_kategori_penjaga` WRITE;
/*!40000 ALTER TABLE `ref_kategori_penjaga` DISABLE KEYS */;
INSERT INTO `ref_kategori_penjaga` VALUES (1,'Anggota Polis'),(2,'Bekas Polis'),(3,'Kakitangan Kerajaan'),(4,'Lepasan Sekolah');
/*!40000 ALTER TABLE `ref_kategori_penjaga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kelulusan`
--

DROP TABLE IF EXISTS `ref_kelulusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kelulusan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kelulusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kelulusan`
--

LOCK TABLES `ref_kelulusan` WRITE;
/*!40000 ALTER TABLE `ref_kelulusan` DISABLE KEYS */;
INSERT INTO `ref_kelulusan` VALUES (1,'Sekolah Rendah'),(2,'SRP/PMR atau setaraf'),(3,'SPM atau setaraf'),(4,'SPMV atau setaraf');
/*!40000 ALTER TABLE `ref_kelulusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_keputusan_temuduga`
--

DROP TABLE IF EXISTS `ref_keputusan_temuduga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_keputusan_temuduga` (
  `id` int(10) NOT NULL,
  `keputusan_temuduga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_keputusan_temuduga`
--

LOCK TABLES `ref_keputusan_temuduga` WRITE;
/*!40000 ALTER TABLE `ref_keputusan_temuduga` DISABLE KEYS */;
INSERT INTO `ref_keputusan_temuduga` VALUES (1,'Proses Semakan'),(2,'Berjaya'),(3,'Berjaya dan Tukar Kursus'),(4,'Tidak Berjaya'),(5,'Tidak Hadir'),(0,'Belum proses');
/*!40000 ALTER TABLE `ref_keputusan_temuduga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_keterampilan`
--

DROP TABLE IF EXISTS `ref_keterampilan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_keterampilan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gred_keterampilan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gredpoin_keterampilan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_keterampilan` float(5,2) NOT NULL,
  `tahap_keterampilan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `markah_min` float(5,2) NOT NULL,
  `markah_max` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_keterampilan`
--

LOCK TABLES `ref_keterampilan` WRITE;
/*!40000 ALTER TABLE `ref_keterampilan` DISABLE KEYS */;
INSERT INTO `ref_keterampilan` VALUES (1,'A','',4.00,'Terampil Cemerlang',90.00,100.00),(2,'A-','',3.67,'Terampil Cemerlang',80.00,89.99),(3,'B+','',3.33,'Terampil Baik',75.00,79.99),(4,'B','',3.00,'Terampil Baik',70.00,74.99),(5,'C+','',2.67,'Terampil',65.00,69.99),(6,'C','',2.00,'Terampil',60.00,64.99),(7,'F1','',0.00,'Belum Terampil',55.00,59.99),(8,'F2','',0.00,'Belum Terampil',50.00,54.99),(9,'F3','',0.00,'Belum Terampil',0.00,49.99);
/*!40000 ALTER TABLE `ref_keterampilan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kewarganegaraan`
--

DROP TABLE IF EXISTS `ref_kewarganegaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kewarganegaraan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kewarganegaraan`
--

LOCK TABLES `ref_kewarganegaraan` WRITE;
/*!40000 ALTER TABLE `ref_kewarganegaraan` DISABLE KEYS */;
INSERT INTO `ref_kewarganegaraan` VALUES (1,'Warganegara Bumiputera'),(2,'Warganegara Bukan Bumiputera'),(3,'Bukan Warganegara');
/*!40000 ALTER TABLE `ref_kewarganegaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kluster`
--

DROP TABLE IF EXISTS `ref_kluster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kluster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_kluster` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kluster` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kluster`
--

LOCK TABLES `ref_kluster` WRITE;
/*!40000 ALTER TABLE `ref_kluster` DISABLE KEYS */;
INSERT INTO `ref_kluster` VALUES (1,'CNT','Computer & Network Technology'),(2,'KEL','Elektrikal'),(3,'KMK','Mekanikal'),(4,'KEM','Elektronik / Mekatronik'),(5,'KSB','Senibina'),(6,'KPT','Pengangkutan'),(7,'KPB','Pembuatan'),(8,'KFB','Fabrik'),(9,'CMP','Creative Media & Printing'),(10,'KUL','Kulinari'),(11,'KHC','Hairdressing & Cosmetology'),(12,'KHS','Hospitaliti');
/*!40000 ALTER TABLE `ref_kluster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kursus`
--

DROP TABLE IF EXISTS `ref_kursus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_kursus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kursus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kluster` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kluster` (`id_kluster`),
  CONSTRAINT `ref_kursus_ibfk_1` FOREIGN KEY (`id_kluster`) REFERENCES `ref_kluster` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kursus`
--

LOCK TABLES `ref_kursus` WRITE;
/*!40000 ALTER TABLE `ref_kursus` DISABLE KEYS */;
INSERT INTO `ref_kursus` VALUES (1,'TSK150','Teknologi Sistem Komputer',1),(2,'CSN400','Computer System and Networking',1),(3,'PEL041','Pendawai Elektrik (PW2)',2),(4,'PJE290','Penjaga Jentera Elektrik (A0 - 24 Bulan)',2),(5,'HWS370','Holistic Theraphy and Wellness',12),(6,'PKP300','pemanduan Kenderaan Perdagangan',7),(7,'IMT010','industrial Maintenance',4),(8,'SLT200','seni Landskap dan Taman',4),(9,'PJE292','Penjaga Jentera Elektrik (A1)',2),(10,'PEL041 (B)','Pendawai Elektrik (PW2) - (B)',2),(11,'PEL045','Teknologi dan Pemasangan Elektrik (PW4)',2),(12,'TAF060','Teknologi Automotif',7),(13,'BMK070','Teknologi Baikpulih dan Mengecat Kenderaan',7),(14,'TML080','Teknologi Motosikal',7),(15,'PEM190','Penyelenggaraan Enjin Marin',7),(16,'EID160','Elektronik Industri',7),(17,'EAV090','Teknologi Elektronik Audio Visual',7),(18,'TML084','Pengkhususan Sistem Elektrik Motosikal',7),(19,'MDP250','Multimedia Design and Production',9),(20,'TAF063','Pengkhususan Sistem Pengurusan Enjin',7),(21,'TAM260','Teknologi Animasi',9),(22,'TPC130','Teknologi Percetakan',9),(23,'DPA140','Desktop Publishing Artist',9),(24,'JST361','Pengkhususan Senggaraan Tayar dan Roda',7),(25,'PSF481','Pemasang Solar Fotovolta Grid',2),(26,'STK220','Solekan dan Terapi Kecantikan',11),(27,'CNB240','Confectionery and Bakery',10),(28,'MNP210','Masakan dan Pramusaji',10),(29,'FNC180','Fibreglass and Composite Technology',6),(30,'TRD030','Teknologi Perabot dan Rekaan Dalaman',6),(31,'BMT330','Building Maintenance',4),(32,'JST360','Juruteknik Servis Tayar',7),(33,'BBR340','Boat Building and Repair',6),(34,'TAF061','Pemasangan Gas Asli Kenderaan',7),(35,'TML081','Motorsikal Berkuasa Tinggi',7),(36,'PCG380','Pattern Cutting and Garment Production',8),(37,'MKT430','Mekatronik',7),(38,'VVE440','Videography and Visual Effect',9),(39,'SSK410','Seni Sulaman Kreatif',8),(40,'PEL044','Pendawai Elektrik (EIU 2ND GRADE)',2),(41,'PEL040','Pendawai Elektrik (PW1)',2),(42,'PEL042','Pendawai Elektrik (PW4 - 12 Bulan)',2),(43,'PEL043','Pendawai Elektrik (PW4 - 36 Bulan)',2),(44,'PJE291','Penjaga Jentera Elektrik (A0 - 36 Bulan)',2),(45,'TML082','Pengkhususan Motosikal Kreatif',7),(46,'SSK411','Seni Sulaman Kreatif (Sulaman Mesin)',8),(47,'SSK412','Seni Sulaman Kreatif (Sulaman Tangan)',8),(48,'KFL021','Teknologi Kimpalan Lanjutan FCAW',4),(49,'PEL046','Teknologi Dan Pemasangan Elektrik 1ST Grade (EIU)',2),(50,'TDT100','Tool and Die Technology (TAHAP 1)',4),(51,'TDT101','Tool and Die Technology (TAHAP 2)',4),(52,'TDT102','Tool and Die Technology (TAHAP 3)',4),(53,'PEL042 (B)','Pendawai Elektrik (PW4 - 12 Bulan) - (B)',2),(54,'KFL022','Teknologi Kimpalan Lanjutan GTAW',4),(55,'CNB241','Beverages',10),(56,'PCG381','Mascot Costume',8),(57,'TAM261','3D Animation Production',9),(58,'SSK413','Sulaman Berkomputer',8),(59,'FND111','Fashion Drawing and Design',8),(60,'TAF062','Teknologi Automotif Tahap 3',7),(61,'EAV091','Teknologi Elektronik Audio Visual Lanjutan',7),(62,'FND112','Rekaan Fesyen Kontemporari',8),(63,'FND113','Curtains and Soft Furnishings',8),(64,'TAM262','3D Animation Visual Artist',9),(65,'GDA270','Graphic Design And Advertising',9),(66,'TPS050','Teknologi Penyejukbekuan dan Penyaman Udara (Fasa Satu)',4),(67,'TPT050','Teknologi Penyejukbekuan dan Penyaman Udara (Fasa Tiga)',4),(68,'TFG280 ','Teknologi Fotografi',9),(69,'FND110','Fashion and Dressmaking',8),(70,'ECT320 ','Early Childhood Education and Training',12),(71,'SGR230','Seni Reka Gaya Rambut',11),(72,'KFL020','Teknologi Kimpalan dan Fabrikasi Logam',4),(73,'BMK071','Teknologi Baikpulih dan Mengecat Kenderaan Tahap 2',7),(74,'GTK450','Gaya Rambut dan Terapi Kecantikan',11),(75,'TEL460','Teknologi Elektronik',7),(76,'MNP212','Pengkhususan Pembuatan Pastri Perancis',10),(77,'PPL470','Pembuat Pakaian Lelaki',8),(78,'TAF064','Pengkhususan Senggaraan Sistem Diesel',7),(79,'TBN010','Teknologi Bangunan',4),(80,'HDN120','Hiasan Dalaman',8),(81,'PEM190','Penyelenggaraan Enjin Marin-(B)',7),(82,'TFG281 ','Advanced Digital Imaging',9),(83,'CNB242','Artisan Kek',10),(84,'SL-TAM001','3D Animation Visual Artist - SLDN',9),(85,'TAF065','Pengkhususan Senggaraan Sistem Transmisi',7),(86,'MNP211','Pengkhususan Seni Ukiran Makanan dan Ais',10),(87,'BMK072','Auto Panel & Body Repair',7),(88,'TML083','Pengkhususan Senggaraan Electronic Fuel Injection',7),(89,'PJE293','Penjaga Jentera Elektrik (A4)',2),(90,'SL-CNB001','Confectionary and Bakery - SLDN',10),(91,'JST 360','Juruteknik Servis Tayar (Single Tier)',7),(92,'snb480 (B)','Stage and Broadcasting',9),(93,'acm(SLDN)','Aerospace Composites Manufacturing',6);
/*!40000 ALTER TABLE `ref_kursus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_lpp09_program_khas`
--

DROP TABLE IF EXISTS `ref_lpp09_program_khas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_lpp09_program_khas` (
  `id` int(10) NOT NULL,
  `nama_program` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_lpp09_program_khas`
--

LOCK TABLES `ref_lpp09_program_khas` WRITE;
/*!40000 ALTER TABLE `ref_lpp09_program_khas` DISABLE KEYS */;
INSERT INTO `ref_lpp09_program_khas` VALUES (1,'Program Khas 1',1),(2,'Program Khas 2',1);
/*!40000 ALTER TABLE `ref_lpp09_program_khas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_lpp09_program_pertandingan`
--

DROP TABLE IF EXISTS `ref_lpp09_program_pertandingan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_lpp09_program_pertandingan` (
  `id` int(10) NOT NULL,
  `nama_program` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_lpp09_program_pertandingan`
--

LOCK TABLES `ref_lpp09_program_pertandingan` WRITE;
/*!40000 ALTER TABLE `ref_lpp09_program_pertandingan` DISABLE KEYS */;
INSERT INTO `ref_lpp09_program_pertandingan` VALUES (1,'Skills Malaysia',1);
/*!40000 ALTER TABLE `ref_lpp09_program_pertandingan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_markah`
--

DROP TABLE IF EXISTS `ref_markah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_markah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pb_teori` float(5,2) NOT NULL,
  `pb_amali` float(5,2) NOT NULL,
  `pam_teori` float(5,2) NOT NULL,
  `pam_amali` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_markah`
--

LOCK TABLES `ref_markah` WRITE;
/*!40000 ALTER TABLE `ref_markah` DISABLE KEYS */;
INSERT INTO `ref_markah` VALUES (1,20.00,80.00,20.00,80.00);
/*!40000 ALTER TABLE `ref_markah` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER ref_markah_before_insert
     BEFORE INSERT ON ref_markah FOR EACH ROW
     BEGIN
          IF NOT ((NEW.pb_teori + NEW.pb_amali = 100) AND (NEW.pam_teori + NEW.pam_amali = 100))
          THEN
               SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'pb_teori + pb_amali harus 100 dan pam_teori + pam_amali juga harus 100';
          END IF;
     END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER ref_markah_before_update
     BEFORE UPDATE ON ref_markah FOR EACH ROW
     BEGIN
          IF NOT ((NEW.pb_teori + NEW.pb_amali = 100) AND (NEW.pam_teori + NEW.pam_amali = 100))
          THEN
               SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'pb_teori + pb_amali harus 100 dan pam_teori + pam_amali juga harus 100';
          END IF;
     END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ref_modul`
--

DROP TABLE IF EXISTS `ref_modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_modul` (
  `id_kursus` int(3) DEFAULT NULL,
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `kod_modul` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sequence_modul` int(3) DEFAULT NULL,
  `nama_modul` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status_modul` int(2) DEFAULT NULL,
  `teori` decimal(5,2) DEFAULT NULL,
  `praktikal` decimal(5,2) DEFAULT NULL,
  `self` decimal(5,2) DEFAULT NULL,
  `jam_kredit` int(1) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL,
  `pam_teori` int(3) NOT NULL,
  `pam_praktikal` int(3) NOT NULL,
  `pb_teori` int(3) NOT NULL,
  `pb_praktikal` int(3) NOT NULL,
  `pb_peratus` int(3) NOT NULL,
  `pam_peratus` int(3) NOT NULL,
  PRIMARY KEY (`id_modul`),
  KEY `id_kursus` (`id_kursus`)
) ENGINE=MyISAM AUTO_INCREMENT=2213 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_modul`
--

LOCK TABLES `ref_modul` WRITE;
/*!40000 ALTER TABLE `ref_modul` DISABLE KEYS */;
INSERT INTO `ref_modul` VALUES (1,1986,'M01',NULL,'PENGURUSAN KESELAMATAN & KECEMASAN',NULL,12.50,19.50,0.00,1,NULL,NULL,20,80,20,80,70,30),(1,1987,'M02',NULL,'MEMASANG PERKAKASAN KOMPUTER',NULL,30.00,66.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(1,1988,'M03',NULL,'MEMASANG PERISIAN SISTEM OPERASI DAN APLIKASI',NULL,27.00,117.00,0.00,4,NULL,NULL,20,80,20,80,70,30),(1,1990,'M04',NULL,'MENYELENGGARA SISTEM KOMPUTER',NULL,16.00,49.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(1,1992,'M05',NULL,'MEMBAIKPULIH SISTEM KOMPUTER',NULL,21.00,74.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(1,1993,'M06',NULL,'MEMASANG RANGKAIAN KOMPUTER',NULL,20.50,44.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(1,1994,'M07',NULL,'MEMASANG PELAYAN (SERVER)',NULL,28.00,155.00,0.00,5,NULL,NULL,20,80,20,80,70,30),(1,1995,'M08',NULL,'MENYELENGGARA PELAYAN (SERVER)',NULL,32.00,63.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(1,1996,'M09',NULL,'MEMBUAT KONFIGURASI PERANTI MUDAH ALIH',NULL,15.00,23.00,0.00,1,NULL,NULL,20,80,20,80,70,30),(2,1466,'CSN400 M01',NULL,'PENGURUSAN KESELAMATAN & KECEMASAN',NULL,12.50,19.50,0.00,1,NULL,NULL,20,80,20,80,70,30),(2,1467,'CSN400 M02',NULL,'PERKAKASAN KOMPUTER',NULL,8.00,22.00,0.00,1,NULL,NULL,20,80,20,80,70,30),(2,1468,'CSN400 M03',NULL,'PEMASANGAN PERISIAN SISTEM KOMPUTER',NULL,19.00,61.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(2,1469,'CSN400 M04',NULL,'KESELAMATAN DATA',NULL,15.00,25.00,0.00,1,NULL,NULL,20,80,20,80,70,30),(2,1470,'CSN400 M05',NULL,'SISTEM RANGKAIAN KOMPUTER',NULL,16.50,57.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(2,1471,'CSN400 M06',NULL,'SISTEM RANGKAIAN TANPA WAYAR ( WLAN )',NULL,39.00,81.00,0.00,3,NULL,NULL,20,80,20,80,70,30),(2,1472,'CSN400 M07',NULL,'PENDAWAIAN RANGKAIAN KOMPUTER',NULL,17.30,63.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(2,1473,'CSN400 M08',NULL,'REKABENTUK ETHERNET NETWORK',NULL,35.00,45.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(2,1474,'CSN400 M09',NULL,'SENGGARAAN SISTEM KOMPUTER & RANGKAIAN',NULL,39.00,81.00,0.00,3,NULL,NULL,20,80,20,80,70,30),(2,1475,'CSN400 M10',NULL,'SIMULASI SISTEM RANGKAIAN',NULL,11.00,63.00,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2080,'PEL041 M01',NULL,'PENGURUSAN KESELAMATAN DAN KECEMASAN',NULL,12.50,19.50,0.00,1,NULL,NULL,20,80,20,80,70,30),(3,2081,'PEL041 M02',NULL,'MENGGUNAKAN PERALATAN TANGAN DAN MESIN ELEKTRIK (POWER TOOLS)',NULL,7.75,24.25,0.00,1,NULL,NULL,20,80,20,80,70,30),(3,2082,'PEL041 M03',NULL,'MEREKA BENTUK LUKISAN ELEKTRIK SATU FASA',NULL,44.00,84.00,0.00,3,NULL,NULL,20,80,20,80,70,30),(3,2083,'PEL041 M04',NULL,'MENGUJI PEPASANGAN ELEKTRIK SATU FASA',NULL,14.25,49.75,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2084,'PEL041 M05',NULL,'MEMBUAT PENDAWAIAN SUIS SATU HALA',NULL,11.75,52.25,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2085,'PEL041 M06',NULL,'MEMBUAT PENDAWAIAN SUIS DUA HALA DAN PERTENGAHAN',NULL,10.50,85.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2086,'PEL041 M07',NULL,'MEMBUAT PENDAWAIAN LITAR AKHIR KUASA',NULL,12.50,51.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2087,'PEL041 M08',NULL,'MEMBUAT PENDAWAIAN PELBAGAI SUIS AUTOMATIK DAN ELEKTRONIK',NULL,19.50,44.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2088,'PEL041 M09',NULL,'MEMASANG PAPAN AGIHAN DAN SISTEM PEMBUMIAN',NULL,17.75,46.25,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2089,'PEL041 M10',NULL,'MEMBUAT PENDAWAIAN KONDUIT DAN TRUNKING PVC',NULL,10.50,117.50,0.00,3,NULL,NULL,20,80,20,80,70,30),(3,2090,'PEL041 M11',NULL,'MEREKA BENTUK LUKISAN ELEKTRIK TIGA FASA',NULL,7.50,56.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2091,'PEL041 M01',NULL,'MEREKABENTUK LUKISAN ELEKTRIK TIGA FASA',NULL,30.50,65.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2092,'PEL041 M12',NULL,'MENGUJI PEPASANGAN ELEKTRIK TIGA FASA',NULL,10.75,53.25,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2093,'PEL041 M13',NULL,'MEMBUAT PENDAWAIAN TERSEMBUNYI',NULL,7.50,56.50,0.00,2,NULL,NULL,20,80,20,80,70,30),(3,2094,'PEL041 M14',NULL,'MEMBUAT PENDAWAIAN KONDUIT DAN TRUNKING LOGAM',NULL,9.00,119.00,0.00,3,NULL,NULL,20,80,20,80,70,30);
/*!40000 ALTER TABLE `ref_modul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_negeri`
--

DROP TABLE IF EXISTS `ref_negeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_negeri` (
  `id` int(2) NOT NULL,
  `nama_negeri` varchar(30) DEFAULT NULL,
  `kod_negeri` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_negeri`
--

LOCK TABLES `ref_negeri` WRITE;
/*!40000 ALTER TABLE `ref_negeri` DISABLE KEYS */;
INSERT INTO `ref_negeri` VALUES (7,'JOHOR','J'),(8,'MELAKA','M'),(9,'NEGERI SEMBILAN','N'),(10,'SELANGOR','B'),(11,'PERAK','A'),(12,'KEDAH','K'),(13,'PAHANG','C'),(14,'PULAU PINANG','P'),(15,'PERLIS','R'),(16,'KELANTAN','D'),(17,'TERENGGANU','T'),(18,'SABAH','S'),(19,'SARAWAK','Q'),(20,'WILAYAH PERSEKUTUAN','W');
/*!40000 ALTER TABLE `ref_negeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_pendapatan`
--

DROP TABLE IF EXISTS `ref_pendapatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_pendapatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pendapatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_pendapatan`
--

LOCK TABLES `ref_pendapatan` WRITE;
/*!40000 ALTER TABLE `ref_pendapatan` DISABLE KEYS */;
INSERT INTO `ref_pendapatan` VALUES (1,'0 - 500'),(2,'501 - 1000'),(3,'1001 - 1500'),(4,'1501 - 2000'),(5,'> 2000');
/*!40000 ALTER TABLE `ref_pendapatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_poskod_bandar_negeri`
--

DROP TABLE IF EXISTS `ref_poskod_bandar_negeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_poskod_bandar_negeri` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negeri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `negeri` (`negeri`),
  CONSTRAINT `ref_poskod_bandar_negeri_ibfk_1` FOREIGN KEY (`negeri`) REFERENCES `ref_negeri` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_poskod_bandar_negeri`
--

LOCK TABLES `ref_poskod_bandar_negeri` WRITE;
/*!40000 ALTER TABLE `ref_poskod_bandar_negeri` DISABLE KEYS */;
INSERT INTO `ref_poskod_bandar_negeri` VALUES (1,'02600','Arau',15),(2,'02300','Baseri',15),(3,'02500','Guar Sanji',15),(4,'02400','Kampung Abi',15),(5,'70536','Seremban',9),(6,'02000','KUALA PERLIS',15),(7,'05000','ALOR SETAR',12),(8,'05400','ALOR SETAR',12),(9,'06000','JITRA',12),(10,'06010','CHANGLOON',12),(11,'06150','AYER HITAM',12),(12,'06250','ALOR SETAR',12),(13,'06300','KUALA NERANG',12),(14,'06350','POKOK SENA',12),(15,'06400','POKOK SENA',12),(16,'06750','PENDANG',12),(17,'06900','YAN',12),(18,'07000','LANGKAWI',12),(19,'08000','SUNGAI PETANI',12),(20,'08100','BEDONG',12),(21,'08200','SIK',12),(22,'08210','SIK',12),(23,'08320','JENIANG',12),(24,'08340','SIK',12),(25,'09000','KULIM',12),(26,'09100','BALING',12),(27,'09110','KUALA PEGANG',12),(28,'09200','KUPANG',12),(29,'09300','KUALA KETIL',12),(30,'09400','PADANG SERAI',12),(31,'09600','LUNAS',12),(32,'09700','KARANGAN',12),(33,'09800','SERDANG',12),(34,'10050','PULAU PINANG',14),(35,'11000','BALIK PULAU',14),(36,'11200','TANJUNG BUNGAH',14),(37,'11600','JELUTONG',14),(38,'11700','GELUGOR',14),(39,'11900','BAYAN LEPAS',14),(40,'12000','BUTTERWORTH',14),(41,'12100','BUTTERWORTH',14),(42,'13000','BUTTERWORTH',14),(43,'13200','KEPALA BATAS',14),(44,'13500','PERMATANG PAUH',14),(45,'13600','PERAI',14),(46,'13700','PERAI',14),(47,'14000','BUKIT MERTAJAM',14),(48,'14100','SIMPANG AMPAT',14),(49,'14200','SUNGAI JAWI',14),(50,'14300','NIBONG TEBAL',14),(51,'14400','KUBANG SEMANG',14),(52,'15150','KOTA BHARU',16),(53,'16100','KOTA BHARU',16),(54,'16150','KOTA BHARU',16),(55,'16200','TUMPAT',16),(56,'16310','BACHOK',16),(57,'16450','KETEREH',16),(58,'16810','SELISING',16),(59,'17000','PASIR MAS',16),(60,'17200','RANTAU PANJANG',16),(61,'17500','TANAH MERAH',16),(62,'17700','AYER LANAS',16),(63,'18000','KUALA KRAI',16),(64,'18200','DABONG',16),(65,'18300','GUA MUSANG',16),(66,'18500','MACHANG',16),(67,'20000','KUALA TERENGGANU',17),(68,'20400','KUALA TERENGGANU',17),(69,'21000','KUALA TERENGGANU',17),(70,'21020','KUALA TERENGGANU',17),(71,'21080','KUALA TERENGGANU',17),(72,'21200','KUALA TERENGGANU',17),(73,'21210','KUALA TERENGGANU',17),(74,'21300','KUALA TERENGGANU',17),(75,'21400','BUKIT PAYONG',17),(76,'21600','MARANG',17),(77,'22000','JERTEH',17),(78,'22100','PERMAISURI',17),(79,'22200','KAMPONG RAJA',17),(80,'23100','PAKA',17),(81,'23400','AL MUKTAFI BILLAH SHAH',17),(82,'24000','CUKAI',17),(83,'24100','KIJAL',17),(84,'25150','KUANTAN',13),(85,'25250','KUANTAN',13),(86,'25300','KUANTAN',13),(87,'25350','KUANTAN',13),(88,'26080','KUALA ROMPIN',13),(89,'26100','KUANTAN',13),(90,'26150','BALOK',13),(91,'26200','SUNGAI LEMBING',13),(92,'26250','JAYA GADING',13),(93,'26300','GAMBANG',13),(94,'26350','GAMBANG',13),(95,'26400','BANDAR PUSAT JENGKA',13),(96,'26410','BANDAR PUSAT JENGKA',13),(97,'26420','BANDAR PUSAT JENGKA',13),(98,'26430','BANDAR PUSAT JENGKA',13),(99,'26440','BANDAR PUSAT JENGKA',13),(100,'26450','BANDAR PUSAT JENGKA',13),(101,'26600','PEKAN',13),(102,'26700','MUADZAM SHAH',13),(103,'27000','JERANTUT',13),(104,'27200','KUALA LIPIS',13),(105,'27600','RAUB',13),(106,'27650','MARAN',13),(107,'28010','TEMERLOH',13),(108,'28300','TRIANG',13),(109,'28400','MENTAKAB',13),(110,'28600','KARAK',13),(111,'30000','IPOH',11),(112,'30010','IPOH',11),(113,'30350','IPOH',11),(114,'31000','BATU GAJAH',11),(115,'31100','SUNGAI SIPUT',11),(116,'31150','ULU KINTA',11),(117,'31350','IPOH',11),(118,'31400','IPOH',11),(119,'31500','IPOH',11),(120,'31600','GOPENG',11),(121,'31800','TANJONG TUALANG',11),(122,'32000','SITIAWAN',11),(123,'32400','AYER TAWAR',11),(124,'32500','CHANGKAT KERUING',11),(125,'32800','PARIT',11),(126,'33000','KUALA KANGSAR',11),(127,'33007','KUALA KANGSAR',11),(128,'33009','KUALA KANGSAR',11),(129,'33010','KUALA KANGSAR',11),(130,'33040','KUALA KANGSAR',11),(131,'33300','GERIK',11),(132,'33320','GERIK',11),(133,'33400','LENGGONG',11),(134,'33410','LENGGONG',11),(135,'33800','MANONG',11),(136,'34000','TAIPING',11),(137,'34100','SELAMA',11),(138,'34200','PARIT BUNTAR',11),(139,'34250','TANJONG PIANDANG',11),(140,'34300','BAGAN SERAI',11),(141,'34350','KUALA KURAU',11),(142,'34400','SIMPANG AMPAT SEMANGGOL',11),(143,'34500','BATU KURAU',11),(144,'34510','BATU KURAU',11),(145,'34600','KAMUNTING',11),(146,'34650','KUALA SEPETANG',11),(147,'34700','SIMPANG',11),(148,'34750','MATANG',11),(149,'34800','TRONG',11),(150,'34850','CHANGKAT JERING',11),(151,'34900','PANTAI REMIS',11),(152,'34950','BANDAR BAHARU',12),(153,'35800','SLIM RIVER',11),(154,'36000','TELUK INTAN',11),(155,'36100','BAGAN DATOH',11),(156,'36200','SELEKOH',11),(157,'36300','SUNGAI SUMUN',11),(158,'36400','HUTAN MELINTANG',11),(159,'36800','KAMPONG GAJAH',11),(160,'40000','SHAH ALAM',10),(161,'40100','SHAH ALAM',10),(162,'40150','SHAH ALAM',10),(163,'40160','SHAH ALAM',10),(164,'40170','SHAH ALAM',10),(165,'40200','SHAH ALAM',10),(166,'40300','SHAH ALAM',10),(167,'40400','SHAH ALAM',10),(168,'40450','SHAH ALAM',10),(169,'40460','SHAH ALAM',10),(170,'40470','SHAH ALAM',10),(171,'40500','SHAH ALAM',10),(172,'40550','SHAH ALAM',10),(173,'40560','SHAH ALAM',10),(174,'40570','SHAH ALAM',10),(175,'40700','SHAH ALAM',10),(176,'41000','KLANG',10),(177,'41050','KLANG',10),(178,'41100','KLANG',10),(179,'41150','KLANG',10),(180,'41200','KLANG',10),(181,'41250','KLANG',10),(182,'41300','KLANG',10),(183,'41400','KLANG',10),(184,'41500','KLANG',10),(185,'41700','KLANG',10),(186,'41900','KLANG',10),(187,'42000','PELABUHAN KLANG',10),(188,'42100','KLANG',10),(189,'42200','KAPAR',10),(190,'42300','BANDAR PUNCAK ALAM',10),(191,'42500','TELOK PANGLIMA GARANG',10),(192,'42600','JENJAROM',10),(193,'42700','BANTING',10),(194,'42800','TANJONG SEPAT',10),(195,'43000','KAJANG',10),(196,'43100','HULU LANGAT',10),(197,'43200','CHERAS',10),(198,'43300','SERI KEMBANGAN',10),(199,'43400','UPM SERDANG',10),(200,'43500','SEMENYIH',10),(201,'43600','UKM BANGI',10),(202,'43650','BANDAR BARU BANGI',10),(203,'43700','BERANANG',10),(204,'43800','DENGKIL',10),(205,'43900','SEPANG',10),(206,'43950','SUNGAI PELEK',10),(207,'44000','KUALA KUBU BARU',10),(208,'44100','KERLING',10),(209,'44200','RASA',10),(210,'44300','BATANG KALI',10),(211,'45000','KUALA SELANGOR',10),(212,'45100','SUNGAI AYER TAWAR',10),(213,'45200','SABAK BERNAM',10),(214,'45300','SUNGAI BESAR',10),(215,'45400','SEKINCHAN',10),(216,'45500','TANJONG KARANG',10),(217,'45600','BATANG BERJUNTAI',10),(218,'45700','BUKIT ROTAN',10),(219,'45800','JERAM',10),(220,'46000','PETALING JAYA',10),(221,'46050','PETALING JAYA',10),(222,'46100','PETALING JAYA',10),(223,'46150','PETALING JAYA',10),(224,'46200','PETALING JAYA',10),(225,'46300','PETALING JAYA',10),(226,'46350','PETALING JAYA',10),(227,'46400','PETALING JAYA',10),(228,'46700','PETALING JAYA',10),(229,'46710','PETALING JAYA',10),(230,'46720','PETALING JAYA',10),(231,'46730','PETALING JAYA',10),(232,'46740','PETALING JAYA',10),(233,'46750','PETALING JAYA',10),(234,'46760','PETALING JAYA',10),(235,'46770','PETALING JAYA',10),(236,'46780','PETALING JAYA',10),(237,'46790','PETALING JAYA',10),(238,'46800','PETALING JAYA',10),(239,'47000','SUNGAI BULOH',10),(240,'47100','PUCHONG',10),(241,'47110','PUCHONG',10),(242,'47120','PUCHONG',10),(243,'47130','PUCHONG',10),(244,'47140','PUCHONG',10),(245,'47150','PUCHONG',10),(246,'47160','PUCHONG',10),(247,'47170','PUCHONG',10),(248,'47180','PUCHONG',10),(249,'47190','PUCHONG',10),(250,'47200','SUBANG AIRPORT',10),(251,'47300','PETALING JAYA',10),(252,'47301','PETALING JAYA',10),(253,'47400','PETALING JAYA',10),(254,'47410','PETALING JAYA',10),(255,'47500','SUBANG JAYA',10),(256,'47600','SUBANG JAYA',10),(257,'47610','SUBANG JAYA',10),(258,'47620','SUBANG JAYA',10),(259,'47630','SUBANG JAYA',10),(260,'47640','SUBANG JAYA',10),(261,'47650','SUBANG JAYA',10),(262,'47800','PETALING JAYA',10),(263,'47810','PETALING JAYA',10),(264,'47820','PETALING JAYA',10),(265,'47830','PETALING JAYA',10),(266,'48000','RAWANG',10),(267,'48050','RAWANG',10),(268,'48100','BATU ARANG',10),(269,'48200','SERENDAH',10),(270,'48300','RAWANG',10),(271,'49000','BUKIT FRASER',13),(272,'50000','KUALA LUMPUR',20),(273,'50050','KUALA LUMPUR',20),(274,'50100','KUALA LUMPUR',20),(275,'50150','KUALA LUMPUR',20),(276,'50200','KUALA LUMPUR',20),(277,'50250','KUALA LUMPUR',20),(278,'50300','KUALA LUMPUR',20),(279,'50350','KUALA LUMPUR',20),(280,'50400','KUALA LUMPUR',20),(281,'50450','KUALA LUMPUR',20),(282,'50500','KUALA LUMPUR',20),(283,'50550','KUALA LUMPUR',20),(284,'50600','KUALA LUMPUR',20),(285,'50609','KUALA LUMPUR',20),(286,'50650','KUALA LUMPUR',20),(287,'50700','KUALA LUMPUR',20),(288,'50750','KUALA LUMPUR',20),(289,'50800','KUALA LUMPUR',20),(290,'50950','KUALA LUMPUR',20),(291,'51000','KUALA LUMPUR',20),(292,'51100','KUALA LUMPUR',20),(293,'51200','KUALA LUMPUR',10),(294,'51700','KUALA LUMPUR',20),(295,'52000','KUALA LUMPUR',20),(296,'52100','KUALA LUMPUR',13),(297,'52200','KUALA LUMPUR',20),(298,'53000','KUALA LUMPUR',20),(299,'53100','GOMBAK',10),(300,'53200','KUALA LUMPUR',20),(301,'53300','KUALA LUMPUR',20),(302,'53700','KUALA LUMPUR',20),(303,'53800','KUALA LUMPUR',20),(304,'54000','KUALA LUMPUR',20),(305,'54100','KUALA LUMPUR',20),(306,'54200','KUALA LUMPUR',10),(307,'55000','KUALA LUMPUR',20),(308,'55100','PANDAN',10),(309,'55200','KUALA LUMPUR',20),(310,'55300','KUALA LUMPUR',20),(311,'55700','KUALA LUMPUR',20),(312,'56000','KUALA LUMPUR',20),(313,'56100','CHERAS',10),(314,'57000','KUALA LUMPUR',20),(315,'57100','KUALA LUMPUR',20),(316,'58000','KUALA LUMPUR',20),(317,'58100','KUALA LUMPUR',20),(318,'58200','KUALA LUMPUR',20),(319,'59000','KUALA LUMPUR',20),(320,'59100','KUALA LUMPUR',20),(321,'59200','KUALA LUMPUR',20),(322,'60000','KUALA LUMPUR',20),(323,'62000','PUTRAJAYA',20),(324,'62050','PUTRAJAYA',20),(325,'62100','PUTRAJAYA',20),(326,'62150','PUTRAJAYA',20),(327,'62300','PUTRAJAYA',20),(328,'63000','CYBERJAYA',10),(329,'63100','CYBERJAYA',10),(330,'63300','CYBERJAYA',10),(331,'64000','KLIA',10),(332,'68000','AMPANG',10),(333,'68100','BATU CAVES',10),(334,'70000','SEREMBAN',9),(335,'70100','SEREMBAN',9),(336,'70200','SEREMBAN',9),(337,'70300','SEREMBAN',9),(338,'70400','SEREMBAN',9),(339,'71000','PORT DICKSON',9),(340,'71150','LINGGI',9),(341,'71350','KOTA',9),(342,'71650','KUALA KLAWANG',9),(343,'72000','KUALA PILAH',9),(344,'72100','BAHAU',9),(345,'72120','BANDAR SERI JEMPOL',9),(346,'73000','TAMPIN',9),(347,'73100','JOHOL',9),(348,'73200','GEMENCHEH',9),(349,'73300','GEMENCHEH',9),(350,'73400','GEMAS',9),(351,'73420','GEMAS',9),(352,'75000','MELAKA',8),(353,'75100','MELAKA',8),(354,'75200','MELAKA',8),(355,'75300','MELAKA',8),(356,'75400','MELAKA',8),(357,'75450','AIR KEROH',8),(358,'76100','DURIAN TUNGGAL',8),(359,'76200','MASJID TANAH',8),(360,'76300','MASJID TANAH',8),(361,'77000','JASIN',8),(362,'77100','ASAHAN',8),(363,'77200','BEMBAN',8),(364,'77300','MERLIMAU',8),(365,'77400','SUNGAI RAMBAI',8),(366,'78000','ALOR GAJAH',8),(367,'78100','MASJID TANAH',8),(368,'78200','MASJID TANAH',8),(369,'78300','MASJID TANAH',8),(370,'81000','KULAI',7),(371,'81100','JOHOR BAHRU',7),(372,'81200','JOHOR BAHRU',7),(373,'81300','JOHOR BAHRU',7),(374,'81400','SENAI',7),(375,'81450','GUGUSAN TAIB ANDAK',7),(376,'81500','PEKAN NENAS',7),(377,'81550','GELANG PATAH',7),(378,'81600','PENGERANG',7),(379,'81700','PASIR GUDANG',7),(380,'81750','MASAI',7),(381,'81800','ULU TIRAM',7),(382,'81900','KOTA TINGGI',7),(383,'81920','AYER TAWAR 2',7),(384,'82000','PONTIAN',7),(385,'82100','AYER BALOI',7),(386,'83000','BATU PAHAT',7),(387,'83100','RENGIT',7),(388,'83200','SENGGARANG',7),(389,'83300','SERI GADING',7),(390,'83400','SERI MEDAN',7),(391,'83500','PARIT SULONG',7),(392,'83600','SEMERAH',7),(393,'84000','MUAR',7),(394,'84200','MUAR',7),(395,'84300','BUKIT PASIR',7),(396,'84400','SUNGAI MATI',7),(397,'84500','PANCHOR',7),(398,'84600','PAGOH',7),(399,'85000','SEGAMAT',7),(400,'85100','BATU ANAM',7),(401,'85200','JEMENTAH',7),(402,'85300','LABIS',7),(403,'85400','CHAAH',7),(404,'86000','KLUANG',7),(405,'86100','AYER HITAM',7),(406,'86200','SIMPANG RENGAM',7),(407,'86300','RENGAM',7),(408,'86400','PARIT RAJA',7),(409,'86500','BEKOK',7),(410,'86600','PALOH',7),(411,'86700','KAHANG',7),(412,'86800','MERSING',7),(413,'87000','LABUAN',18),(414,'87017','LABUAN',18),(415,'88000','KOTA KINABALU',18),(416,'88100','KOTA KINABALU',18),(417,'88200','KOTA KINABALU',18),(418,'88300','KOTA KINABALU',18),(419,'88400','KOTA KINABALU',18),(420,'88450','KOTA KINABALU',18),(421,'88500','KOTA KINABALU',18),(422,'88600','KOTA KINABALU',18),(423,'88700','BEVERLY',18),(424,'88800','KOTA KINABALU',18),(425,'88858','TANJUNG ARU',18),(426,'89000','KENINGAU',18),(427,'89008','KENINGAU',18),(428,'89050','KUDAT',18),(429,'89058','KUDAT',18),(430,'89100','KOTA MARUDU',18),(431,'89108','KOTA MARUDU',18),(432,'89150','KOTA BELUD',18),(433,'89159','KOTA BELUD',18),(434,'89200','TUARAN',18),(435,'89208','TUARAN',18),(436,'89250','TAMPARULI',18),(437,'89257','TAMPARULI',18),(438,'89300','RANAU',18),(439,'89309','RANAU',18),(440,'89500','PENAMPANG',18),(441,'89600','PAPAR',18),(442,'89607','PAPAR',18),(443,'89650','TAMBUNAN',18),(444,'89740','KUALA PENYU',18),(445,'89800','BEAUFORT',18),(446,'89850','SIPITANG',18),(447,'89900','TENOM',18),(448,'89909','TENOM',18),(449,'90000','SANDAKAN',18),(450,'90009','SANDAKAN',18),(451,'90100','BELURAN',18),(452,'90200','KOTA KINABATANGAN',18),(453,'90300','SANDAKAN',18),(454,'90400','PAMOL',18),(455,'90700','SANDAKAN',18),(456,'90702','SANDAKAN',18),(457,'90712','SANDAKAN',18),(458,'90713','SANDAKAN',18),(459,'90716','SANDAKAN',18),(460,'91000','TAWAU',18),(461,'91008','TAWAU',18),(462,'91022','TAWAU',18),(463,'91100','LAHAD DATU',18),(464,'91150','LAHAD DATU',18),(465,'93000','KUCHING',19),(466,'93050','KUCHING',19),(467,'9310','KUALA KETIL',12),(468,'93100','KUCHING',19),(469,'93200','KUCHING',19),(470,'93250','KUCHING',19),(471,'93300','KUCHING',19),(472,'93400','KUCHING',19),(473,'93450','KUCHING',19),(474,'93728','KUCHING',19),(475,'94000','BAU',19),(476,'94200','SIBURAN',19),(477,'94300','KOTA SAMARAHAN',19),(478,'94500','LUNDU',19),(479,'94600','ASAJAYA',19),(480,'94650','KABONG',19),(481,'94700','SERIAN',19),(482,'94750','SERIAN',19),(483,'94800','SIMUNJAN',19),(484,'94850','SEBUYAU',19),(485,'94900','LINGGA',19),(486,'95000','SRI AMAN',19),(487,'95300','ROBAN',19),(488,'95400','SARATOK',19),(489,'95500','DEBAK',19),(490,'95600','SPAOH',19),(491,'95700','BETONG',19),(492,'95800','ENGKILILI',19),(493,'95900','LUBOK ANTU',19),(494,'96000','SIBU',19),(495,'96100','SARIKEI',19),(496,'96150','BELAWAI',19),(497,'96200','DARO',19),(498,'96300','DALAT',19),(499,'96400','MUKAH',19),(500,'96500','BINTANGOR',19),(501,'96600','JULAU',19),(502,'96700','KANOWIT',19),(503,'96800','KAPIT',19),(504,'96900','BELAGA',19),(505,'97000','BINTULU',19),(506,'97007','BINTULU',19),(507,'97100','SEBAUH',19),(508,'97200','TATAU',19),(509,'97300','BINTULU',19),(510,'98000','MIRI',19),(511,'98050','BARAM',19),(512,'98100','LUTONG',19),(513,'98200','MIRI',19),(514,'98300','LONG LAMA',19),(515,'98700','LIMBANG',19),(516,'98750','NANGA MEDAMIT',19),(517,'98800','SUNDAR',19),(518,'98850','LAWAS',19),(519,'02100','PADANG BESAR',15),(520,'02200','KAKI BUKIT',15),(521,'01000','KANGAR',15);
/*!40000 ALTER TABLE `ref_poskod_bandar_negeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_status_markah`
--

DROP TABLE IF EXISTS `ref_status_markah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_status_markah` (
  `kod_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_status_markah`
--

LOCK TABLES `ref_status_markah` WRITE;
/*!40000 ALTER TABLE `ref_status_markah` DISABLE KEYS */;
INSERT INTO `ref_status_markah` VALUES ('0','TP - Belum  Diisi'),('1','TP - Disimpan'),('2','TP - Dihantar ke Pengurus'),('3','Pengurus - Dikembalikan ke TP'),('4','Pengurus - Dihantar ke PGN'),('5','PGN - Dikembalikan ke TP'),('6','PGN - Dihantar ke PPKL'),('7','PPKL - Disahkan oleh PPKL');
/*!40000 ALTER TABLE `ref_status_markah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_status_pelatih`
--

DROP TABLE IF EXISTS `ref_status_pelatih`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_status_pelatih` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status_kod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_desc` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_status_pelatih`
--

LOCK TABLES `ref_status_pelatih` WRITE;
/*!40000 ALTER TABLE `ref_status_pelatih` DISABLE KEYS */;
INSERT INTO `ref_status_pelatih` VALUES (1,'(01)','Aktif'),(2,'(61) ','Berhenti kerana tidak hadir tanpa sebab'),(3,'(63)','Berhenti kerana salah laku '),(4,'(71)','Tamat belajar / program'),(5,'(77)','Berhenti kerana bekerja'),(6,'(78)','Berhenti kerana sambung belajar'),(7,'(88)','Berhenti kerana masalah kesihatan'),(8,'(99)','Meninggal dunia');
/*!40000 ALTER TABLE `ref_status_pelatih` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_taraf_perkahwinan`
--

DROP TABLE IF EXISTS `ref_taraf_perkahwinan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_taraf_perkahwinan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `taraf_perkahwinan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_taraf_perkahwinan`
--

LOCK TABLES `ref_taraf_perkahwinan` WRITE;
/*!40000 ALTER TABLE `ref_taraf_perkahwinan` DISABLE KEYS */;
INSERT INTO `ref_taraf_perkahwinan` VALUES (1,'Bujang'),(2,'Kahwin'),(3,'Duda'),(4,'Janda');
/*!40000 ALTER TABLE `ref_taraf_perkahwinan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_tarikh_permohonan`
--

DROP TABLE IF EXISTS `setting_tarikh_permohonan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting_tarikh_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tahun_pengambilan` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_tarikh_permohonan`
--

LOCK TABLES `setting_tarikh_permohonan` WRITE;
/*!40000 ALTER TABLE `setting_tarikh_permohonan` DISABLE KEYS */;
INSERT INTO `setting_tarikh_permohonan` VALUES (1,'2017-06-01','2017-12-31','2017');
/*!40000 ALTER TABLE `setting_tarikh_permohonan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'MAIL','smtp','mail.mmsi.co.id'),(2,'MAIL','username','gspel@mmsi.co.id'),(3,'MAIL','password','Gspel123!!!');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_tawaran_kursus`
--

DROP TABLE IF EXISTS `settings_tawaran_kursus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings_tawaran_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kursus` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_intake` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_intake` (`id_intake`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `ref_kursus` (`id`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_2` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_3` FOREIGN KEY (`id_intake`) REFERENCES `ref_intake` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=918 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_tawaran_kursus`
--

LOCK TABLES `settings_tawaran_kursus` WRITE;
/*!40000 ALTER TABLE `settings_tawaran_kursus` DISABLE KEYS */;
INSERT INTO `settings_tawaran_kursus` VALUES (30,1,18,1,1),(31,1,134,1,1),(32,1,135,1,1),(33,1,136,1,1),(34,1,137,1,1),(35,1,138,1,1),(36,1,139,1,1),(37,1,140,1,1),(142,1,3,1,1),(143,1,17,1,1),(144,1,18,1,0),(145,1,19,1,1),(275,2,5,1,1),(276,2,134,1,1),(277,2,135,1,1),(278,2,136,1,1),(279,2,137,1,1),(280,2,138,1,1),(281,2,139,1,1),(282,2,140,1,1),(387,2,135,1,1),(388,2,17,1,1),(389,2,18,1,1),(390,2,19,1,1),(522,3,5,1,1),(523,3,134,1,1),(524,3,135,1,1),(525,3,136,1,1),(526,3,137,1,1),(527,3,138,1,1),(528,3,139,1,1),(529,3,140,1,1),(634,3,135,1,1),(635,3,17,1,1),(636,3,18,1,1),(637,3,19,1,1),(769,4,5,1,1),(770,4,134,1,1),(771,4,135,1,1),(772,4,136,1,1),(773,4,137,1,1),(774,4,138,1,1),(775,4,139,1,1),(776,4,140,1,1),(881,4,135,1,1),(882,4,17,1,1),(883,4,18,1,1),(884,4,19,1,1),(886,76,158,2,1),(887,75,152,2,1),(888,3,153,2,1),(889,69,22,2,1),(890,13,20,2,1),(891,66,34,2,1),(892,3,81,2,1),(893,77,225,2,1),(894,3,93,2,1),(895,12,136,2,1),(896,16,138,2,1),(897,1,137,2,1),(898,27,129,2,1),(899,3,130,2,1),(900,12,131,2,1),(901,28,158,2,1),(902,3,152,2,1),(903,17,153,2,1),(904,77,22,2,1),(905,60,20,2,1),(906,79,34,2,1),(907,17,81,2,1),(908,39,225,2,1),(909,72,93,2,1),(910,85,136,2,1),(911,3,138,2,1),(912,17,137,2,1),(913,83,129,2,1),(914,72,130,2,1),(915,73,131,2,1),(916,75,158,2,1),(917,3,158,2,1);
/*!40000 ALTER TABLE `settings_tawaran_kursus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL COMMENT 'DEPRICATED',
  `status_jawatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_agama` int(10) DEFAULT NULL,
  `id_bangsa` int(10) DEFAULT NULL,
  `jantina` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkahwinan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarikh_lahir` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_gaji` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emel` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jabatan` int(10) DEFAULT NULL,
  `id_jenis_jawatan` int(10) DEFAULT NULL,
  `id_giatamra` int(10) DEFAULT NULL COMMENT 'JANGAN DIPAKAI',
  `id_kursus` int(10) DEFAULT NULL COMMENT 'JANGAN DIPAKAI',
  PRIMARY KEY (`id`),
  KEY `idx_staff` (`id_jawatan`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Saiful Baharin Samdusin','',5,262,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Amira Buhari','',5,262,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Azmi Hadi H','',5,263,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Fatin Shahira Anuar','',5,263,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Staff Giatmara Perlis 1','',5,3,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Staff Giatmara Perlis 2','',7,3,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Staff Giatmara Jasin 1','',5,135,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Staff Giatmara Jasin 2','',7,135,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Staff Giatmara Jasin 3','',7,135,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Staff Giatmara Jasin 4','',7,135,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Staff Giatmara Jasin 5','',7,135,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'BM KANGAR','123123123123',1,17,'1',17,'KANGAR','0','0',1,1,'1','1',NULL,'1','KANGAR','1','branchm4@gspel.com',1,1,17,1),(13,'TP 1','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'TP 2','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'TP 3','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'TP 4','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'TP 5','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'TP 6','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'TP 7','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'TP 8','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'TP 9','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'TP 10','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'TP 11','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'TP 12','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'TP 13','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'TP 14','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'TP 15','0',30,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'PGM 1','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'PGM 2','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'PGM 3','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'PGM 4','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'PGM 5','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'PGM 6','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'PGM 7','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'PGM 8','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'PGM 9','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'PGM 10','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'PGM 11','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'PGM 12','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'PGM 13','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'PGM 14','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'PGM 15','0',19,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'PGN Johor','0',22,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'PGN Kedah','0',22,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'PGN Kelantan','0',22,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,'PGN Melaka','0',22,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'PGN Negeri Sembilan','0',22,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_info`
--

DROP TABLE IF EXISTS `staff_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_staff` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_agama` int(10) NOT NULL,
  `id_bangsa` int(10) NOT NULL,
  `jantina` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkahwinan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir` date NOT NULL,
  `umur` int(4) NOT NULL,
  `tempat_lahir` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_gaji` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emel` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_jenis_jawatan` int(10) NOT NULL,
  `id_negeri` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_info`
--

LOCK TABLES `staff_info` WRITE;
/*!40000 ALTER TABLE `staff_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_info_pangku_tugas`
--

DROP TABLE IF EXISTS `staff_info_pangku_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_info_pangku_tugas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_staff` int(10) NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_jenis_jawatan` int(10) NOT NULL,
  `id_negeri` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `tarikh_mula_tugas` date NOT NULL,
  `tarikh_tamat_tugas` date NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_staff` (`id_staff`),
  CONSTRAINT `staff_info_pangku_tugas_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_info_pangku_tugas`
--

LOCK TABLES `staff_info_pangku_tugas` WRITE;
/*!40000 ALTER TABLE `staff_info_pangku_tugas` DISABLE KEYS */;
INSERT INTO `staff_info_pangku_tugas` VALUES (1,7,12,30,1,15,18,1,'2000-01-01','2019-01-01',1),(2,8,12,31,1,8,135,1,'2000-01-01','2019-01-01',1),(6,9,12,5,1,8,135,1,'2000-01-01','2019-01-01',1),(7,10,12,20,1,8,135,1,'2000-01-01','2019-01-01',1),(8,3,12,5,1,7,263,1,'2000-01-01','2019-01-01',1),(9,11,12,5,1,8,135,1,'2000-01-01','2019-01-01',1),(10,12,12,19,1,15,17,1,'2017-09-05','2017-09-05',1),(11,5,12,21,1,15,18,1,'2000-01-01','2019-01-01',1),(12,13,14,30,1,7,158,76,'2000-01-01','2020-10-01',1),(13,14,14,30,1,7,152,75,'2000-01-01','2020-10-01',1),(14,15,14,30,1,7,153,3,'2000-01-01','2020-10-01',1),(15,16,14,30,1,12,22,69,'2000-01-01','2020-10-01',1),(16,17,14,30,1,12,20,13,'2000-01-01','2020-10-01',1),(17,18,14,30,1,12,34,66,'2000-01-01','2020-10-01',1),(18,19,14,30,1,16,81,3,'2000-01-01','2020-10-01',1),(19,20,14,30,1,16,225,77,'2000-01-01','2020-10-01',1),(20,21,14,30,1,16,93,3,'2000-01-01','2020-10-01',1),(21,22,14,30,1,8,136,12,'2000-01-01','2020-10-01',1),(22,23,14,30,1,8,138,16,'2000-01-01','2020-10-01',1),(23,24,14,30,1,8,137,1,'2000-01-01','2020-10-01',1),(24,25,14,30,1,9,129,27,'2000-01-01','2020-10-01',1),(25,26,14,30,1,9,130,3,'2000-01-01','2020-10-01',1),(26,27,14,30,1,9,135,1,'2000-01-01','2020-10-01',1),(27,28,14,19,1,7,152,75,'2000-01-01','2020-10-01',1),(28,29,14,19,1,7,153,3,'2000-01-01','2020-10-01',1),(29,30,14,19,1,12,22,69,'2000-01-01','2020-10-01',1),(30,31,14,19,1,12,20,13,'2000-01-01','2020-10-01',1),(31,32,14,19,1,12,34,66,'2000-01-01','2020-10-01',1),(32,33,14,19,1,16,81,3,'2000-01-01','2020-10-01',1),(33,34,14,19,1,16,225,77,'2000-01-01','2020-10-01',1),(34,35,14,19,1,16,93,3,'2000-01-01','2020-10-01',1),(35,36,14,19,1,8,136,12,'2000-01-01','2020-10-01',1),(36,37,14,19,1,8,138,16,'2000-01-01','2020-10-01',1),(37,38,14,19,1,8,137,1,'2000-01-01','2020-10-01',1),(38,39,14,19,1,9,129,27,'2000-01-01','2020-10-01',1),(39,40,14,19,1,9,130,3,'2000-01-01','2020-10-01',1),(40,41,14,19,1,9,135,1,'2000-01-01','2020-10-01',1),(41,42,14,19,1,7,158,0,'2000-01-01','2020-10-01',1);
/*!40000 ALTER TABLE `staff_info_pangku_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_permohonan_maklumat_am`
--

DROP TABLE IF EXISTS `temp_permohonan_maklumat_am`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_permohonan_maklumat_am` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_mykad` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_cetak` int(1) NOT NULL DEFAULT '0',
  `media_elektronik` int(1) NOT NULL DEFAULT '0',
  `internet` int(1) NOT NULL DEFAULT '0',
  `media_sosial` int(1) NOT NULL DEFAULT '0',
  `rakan` int(1) NOT NULL DEFAULT '0',
  `keluarga` int(1) NOT NULL DEFAULT '0',
  `pameran` int(1) NOT NULL DEFAULT '0',
  `lain` int(1) NOT NULL DEFAULT '0',
  `text_lain` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_permohonan_maklumat_am`
--

LOCK TABLES `temp_permohonan_maklumat_am` WRITE;
/*!40000 ALTER TABLE `temp_permohonan_maklumat_am` DISABLE KEYS */;
INSERT INTO `temp_permohonan_maklumat_am` VALUES (1,'',0,0,1,1,0,0,0,1,'test'),(2,'821110145677',0,1,1,1,0,1,0,0,''),(3,'821110145677',0,0,0,0,0,0,0,0,''),(4,'821110145677',0,0,0,0,0,0,0,0,''),(5,'821110145677',0,0,0,0,0,0,0,0,''),(6,'821110145677',0,0,0,0,0,0,0,0,''),(7,'821110145677',0,1,0,0,0,0,0,0,'');
/*!40000 ALTER TABLE `temp_permohonan_maklumat_am` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temuduga_tetapan`
--

DROP TABLE IF EXISTS `temuduga_tetapan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temuduga_tetapan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL COMMENT 'id dari table permohonan_kursus',
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3, yang disimpan id settings_tawaran_kursus bukan id_kursus',
  `tarikh_waktu` datetime NOT NULL,
  `tempat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai` int(11) NOT NULL COMMENT 'refer to staff.id',
  `jawatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_cetak` datetime DEFAULT NULL COMMENT 'current date',
  `cetak` int(11) DEFAULT NULL COMMENT '1=printed; 0=not printed;',
  `keputusan_temuduga` int(10) NOT NULL COMMENT 'refer to ref_keputusan_temuduga',
  `tukar_kursus` int(10) DEFAULT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3',
  `catatan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_sesi` int(10) DEFAULT NULL,
  `tawaran_kursus` int(10) DEFAULT NULL,
  `tawaran_elaun` int(2) DEFAULT NULL,
  `tawaran_nama_bank` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_no_akaun` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_cara_bayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_status` int(2) DEFAULT NULL,
  `tawaran_tarikh_lapordiri` date DEFAULT NULL,
  `tawaran_masa_lapordiri` time DEFAULT NULL,
  `tawaran_cetak` int(2) DEFAULT NULL,
  `tawaran_tarikh_cetak` datetime DEFAULT NULL,
  `pendaftaran_status` int(11) DEFAULT '0' COMMENT '1=offered; 0=not offered',
  `tawaran_mula_elaun` date DEFAULT NULL,
  `tawaran_tamat_elaun` date DEFAULT NULL,
  `id_kew_kod_kombinasi` int(10) DEFAULT NULL,
  `id_kursus_sah` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pegawai` (`pegawai`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_permohonan` (`id_permohonan`),
  KEY `temuduga_tetapan_keputusan` (`keputusan_temuduga`),
  KEY `tukar_kursus` (`tukar_kursus`),
  CONSTRAINT `temuduga_tetapan_ibfk_3` FOREIGN KEY (`pegawai`) REFERENCES `staff` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_4` FOREIGN KEY (`id_kursus`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_5` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_6` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_kursus` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_8` FOREIGN KEY (`tukar_kursus`) REFERENCES `settings_tawaran_kursus` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temuduga_tetapan`
--

LOCK TABLES `temuduga_tetapan` WRITE;
/*!40000 ALTER TABLE `temuduga_tetapan` DISABLE KEYS */;
INSERT INTO `temuduga_tetapan` VALUES (1,59,18,30,'2017-09-07 05:00:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-06 12:59:15',1,2,30,'qq',1,30,1,NULL,NULL,NULL,1,'2017-09-06','20:30:00',1,'2017-09-07 03:15:11',0,NULL,NULL,NULL,NULL),(2,103,18,30,'2017-09-15 08:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 10:35:18',1,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(3,105,18,30,'2017-09-15 08:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(5,100,18,30,'2017-09-11 09:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(6,107,18,30,'2017-09-11 09:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(7,101,18,30,'2017-09-07 10:10:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-06 16:08:14',1,2,30,'',1,30,1,NULL,NULL,NULL,1,'2018-01-02','00:00:00',1,'2017-09-07 03:15:11',0,NULL,NULL,NULL,NULL),(8,69,18,30,'2017-09-11 10:00:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-06 16:05:42',1,2,30,'ok',1,30,1,NULL,NULL,NULL,1,'2018-01-02','00:00:00',1,'2017-09-07 03:15:11',0,NULL,NULL,NULL,NULL),(9,132,18,30,'2017-09-11 10:00:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 10:40:55',1,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(10,132,18,389,'2017-09-15 12:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,389,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(11,98,18,636,'2017-09-13 12:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-06 16:51:08',1,1,636,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(12,110,18,636,'2017-09-15 12:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,636,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(13,95,18,389,'2017-09-15 12:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-06 16:53:38',1,1,389,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(14,133,18,883,'2017-09-12 08:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268',NULL,0,0,883,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(15,134,158,886,'2017-09-11 02:00:00','MUAR',13,'Tenaga Pengajar','gmmuar@giatmara.edu.my','07-4163646',NULL,0,0,886,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(16,133,18,30,'2017-09-07 11:15:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 03:10:20',1,4,30,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(17,59,135,32,'2017-09-09 08:45:00','JASIN',7,'Pengarah','gmjasin@giatmara.edu.my','06-2659578','2017-09-07 01:04:11',1,1,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2017-09-07 03:15:11',0,NULL,NULL,NULL,NULL),(18,135,158,901,'2017-09-11 09:30:00','Bilik Mesyuarat, GM Muar',13,'Tenaga Pengajar','gmmuar@giatmara.edu.my','07-4163646',NULL,0,0,901,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(19,135,152,887,'2017-09-18 09:30:00','GM GELANG PATAH',14,'Tenaga Pengajar','gmgelangpatah@giatmara.edu.my','07-5072515','2017-09-07 01:44:51',1,2,887,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(20,51,18,30,'2017-09-09 10:45:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 10:51:29',1,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(21,135,153,903,'2017-09-11 11:00:00','Bilik Mesyuarat 1',15,'Tenaga Pengajar','gmlabis@giatmara.edu.my','07-9263164','2017-09-07 02:55:34',1,2,903,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(22,131,18,30,'2017-09-09 10:30:00','ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 03:10:20',1,2,30,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(23,136,18,389,'2017-09-12 11:15:00','Bilik Mesyuarat 1, GIATMARA ARAU',5,'Pengarah','gmarau@giatmara.edu.my','04-9764268','2017-09-07 03:17:24',1,2,389,'',1,NULL,1,NULL,NULL,NULL,1,'2018-01-03','00:00:00',1,'2017-09-07 03:21:57',0,NULL,NULL,NULL,NULL),(24,137,153,903,'2017-09-15 11:30:00','Bilik Mesyuarat 1, GIATMARA LABIS',15,'Tenaga Pengajar','gmlabis@giatmara.edu.my','07-9263164','2017-09-07 03:31:21',1,3,888,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `temuduga_tetapan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`gspeluser`@`%`*/ /*!50003 TRIGGER `temuduga_tetapan_after_insert` AFTER UPDATE ON `temuduga_tetapan`
FOR EACH ROW BEGIN

IF new.pendaftaran_status = 5000000 THEN
SET @newidpermohonan = new.id_permohonan;
SET @idpermohonan = (SELECT permohonan_kursus.id_permohonan FROM permohonan_kursus WHERE permohonan_kursus.id = @newidpermohonan);
SET @varnomykad = (SELECT permohonan_butir_peribadi.no_mykad FROM permohonan_butir_peribadi WHERE permohonan_butir_peribadi.id = @idpermohonan);

	INSERT INTO pelatih (
		id_permohonan,
		no_pelatih,
		no_mykad,
		id_giatmara,
		id_kursus,
		status_pelatih,
		kelayakan_elaun,
		nama_bank,
		no_akaun,
		cara_bayaran,
		id_kew_kod_kombinasi,
		tarikh_mula_kursus,
		tarikh_tamat_kursus
	)
VALUES
	(
		new.id_permohonan,
		(
			SELECT
				get_no_pelatih_baru ()
		),
		@varnomykad,
		new.id_giatmara,
		(
			CASE
			WHEN new.id_kursus_sah > 0 THEN
				new.id_kursus_sah
			ELSE
				new.id_kursus
			END
		),
		1,
		new.tawaran_elaun,
		new.tawaran_nama_bank,
		new.tawaran_no_akaun,
		new.tawaran_cara_bayaran,
		new.id_kew_kod_kombinasi,
		new.tawaran_mula_elaun, 
new.tawaran_tamat_elaun
);

END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `temuduga_tetapan_potongan`
--

DROP TABLE IF EXISTS `temuduga_tetapan_potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temuduga_tetapan_potongan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_temudga_tetapan` int(10) DEFAULT NULL,
  `id_kew_potongan` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temuduga_tetapan_potongan`
--

LOCK TABLES `temuduga_tetapan_potongan` WRITE;
/*!40000 ALTER TABLE `temuduga_tetapan_potongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `temuduga_tetapan_potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainee_info`
--

DROP TABLE IF EXISTS `trainee_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trainee_info` (
  `trainee_id` int(10) NOT NULL AUTO_INCREMENT,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tawaran_kursus` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`trainee_id`),
  KEY `id_tawaran_kursus` (`id_tawaran_kursus`),
  CONSTRAINT `trainee_info_ibfk_1` FOREIGN KEY (`id_tawaran_kursus`) REFERENCES `settings_tawaran_kursus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainee_info`
--

LOCK TABLES `trainee_info` WRITE;
/*!40000 ALTER TABLE `trainee_info` DISABLE KEYS */;
INSERT INTO `trainee_info` VALUES (1,'123',31,'AKTIF'),(2,'11111',32,'AKTIF');
/*!40000 ALTER TABLE `trainee_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `about` text,
  `giatmara_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','member','$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G',NULL,'member@member.com',NULL,NULL,NULL,NULL,1451903855,1451905011,1,'Member','One',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_admin_users`
--

DROP TABLE IF EXISTS `v_admin_users`;
/*!50001 DROP VIEW IF EXISTS `v_admin_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_admin_users` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `active`,
 1 AS `id_staff`,
 1 AS `id_staff_info_pangku_tugas`,
 1 AS `nama_staff`,
 1 AS `id_jabatan`,
 1 AS `nama_jabatan`,
 1 AS `id_jawatan`,
 1 AS `nama_jawatan`,
 1 AS `id_jenis_jawatan`,
 1 AS `nama_jenis_jawatan`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `email`,
 1 AS `tel_no`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_cetakan_surat_temuduga`
--

DROP TABLE IF EXISTS `v_cetakan_surat_temuduga`;
/*!50001 DROP VIEW IF EXISTS `v_cetakan_surat_temuduga`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_cetakan_surat_temuduga` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_hp`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `tempat_temuduga`,
 1 AS `pegawai_dihubungi`,
 1 AS `tarikh_cetakan`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `cetak`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_cetakan_surat_temuduga_ori`
--

DROP TABLE IF EXISTS `v_cetakan_surat_temuduga_ori`;
/*!50001 DROP VIEW IF EXISTS `v_cetakan_surat_temuduga_ori`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_cetakan_surat_temuduga_ori` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_hp`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `tempat_temuduga`,
 1 AS `pegawai_dihubungi`,
 1 AS `tarikh_cetakan`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `cetak`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_elaun_pelatih`
--

DROP TABLE IF EXISTS `v_elaun_pelatih`;
/*!50001 DROP VIEW IF EXISTS `v_elaun_pelatih`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_elaun_pelatih` AS SELECT 
 1 AS `name`,
 1 AS `amount`,
 1 AS `elaun_id`,
 1 AS `id_kew_kod_kombinasi`,
 1 AS `id_pelatih`,
 1 AS `tarikh_mula_kursus`,
 1 AS `tarikh_tamat_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_gagal_temuduga`
--

DROP TABLE IF EXISTS `v_gagal_temuduga`;
/*!50001 DROP VIEW IF EXISTS `v_gagal_temuduga`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_gagal_temuduga` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `keputusan_temuduga`,
 1 AS `tukar_kursus`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_temuduga_tetapan`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_giatmara_kursus`
--

DROP TABLE IF EXISTS `v_giatmara_kursus`;
/*!50001 DROP VIEW IF EXISTS `v_giatmara_kursus`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_giatmara_kursus` AS SELECT 
 1 AS `nama_kluster`,
 1 AS `nama_negeri`,
 1 AS `kod_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `kod_kursus`,
 1 AS `nama_kursus`,
 1 AS `kod_intake`,
 1 AS `nama_intake`,
 1 AS `id_negeri`,
 1 AS `id_kluster`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `id_setting_penawaran_kursus`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_keputusan_temuduga`
--

DROP TABLE IF EXISTS `v_keputusan_temuduga`;
/*!50001 DROP VIEW IF EXISTS `v_keputusan_temuduga`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_keputusan_temuduga` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `keputusan_temuduga`,
 1 AS `nama_tukar_kursus`,
 1 AS `tukar_kursus`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_tetapan_temuduga`,
 1 AS `id_keputusan_temuduga`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_keputusan_temuduga_ori`
--

DROP TABLE IF EXISTS `v_keputusan_temuduga_ori`;
/*!50001 DROP VIEW IF EXISTS `v_keputusan_temuduga_ori`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_keputusan_temuduga_ori` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `keputusan_temuduga`,
 1 AS `nama_tukar_kursus`,
 1 AS `tukar_kursus`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_tetapan_temuduga`,
 1 AS `id_keputusan_temuduga`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kew_potongan`
--

DROP TABLE IF EXISTS `v_kew_potongan`;
/*!50001 DROP VIEW IF EXISTS `v_kew_potongan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kew_potongan` AS SELECT 
 1 AS `name`,
 1 AS `value_per_unit`,
 1 AS `dana`,
 1 AS `program`,
 1 AS `peringkat`,
 1 AS `code`,
 1 AS `deduction_frequency`,
 1 AS `description`,
 1 AS `id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp06_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp06_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp06_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp06_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`,
 1 AS `id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp08_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp08_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp08_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp08_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `id`,
 1 AS `tarikh_kuatkuasa`,
 1 AS `dihantar_oleh`,
 1 AS `dihantar_pada`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp10_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp10_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp10_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp10_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `id`,
 1 AS `giatmara_baru`,
 1 AS `giatmara_asal`,
 1 AS `kursus_baru`,
 1 AS `kursus_asal`,
 1 AS `nota`,
 1 AS `jenis_pertukaran`,
 1 AS `dihantar_oleh`,
 1 AS `dihantar_pada`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp5a_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp5a_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5a_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp5a_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `nama_asal`,
 1 AS `nama_baru`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`,
 1 AS `id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp5b_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp5b_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5b_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp5b_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `mykad_asal`,
 1 AS `mykad_baru`,
 1 AS `tarikh_lahir_asal`,
 1 AS `tarikh_lahir_baru`,
 1 AS `umur_asal`,
 1 AS `umur_baru`,
 1 AS `jantina_asal`,
 1 AS `jantina_baru`,
 1 AS `id`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp5d_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp5d_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5d_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp5d_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `id`,
 1 AS `status_jana`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kewangan_lpp7a_screen3`
--

DROP TABLE IF EXISTS `v_kewangan_lpp7a_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp7a_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kewangan_lpp7a_screen3` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `data_lpp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_intake`,
 1 AS `nama_negeri`,
 1 AS `id_pelatih`,
 1 AS `id`,
 1 AS `status_jana`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p1_screen2_detail`
--

DROP TABLE IF EXISTS `v_kurikulum_p1_screen2_detail`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_detail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p1_screen2_detail` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `kod_modul`,
 1 AS `nama_modul`,
 1 AS `jam_kredit`,
 1 AS `tarikh_hantar_pengajar`,
 1 AS `pb_teori`,
 1 AS `pb_amali`,
 1 AS `pb`,
 1 AS `pam_teori`,
 1 AS `pam_amali`,
 1 AS `pam`,
 1 AS `markah`,
 1 AS `status_isi_markah`,
 1 AS `gred_keterampilan`,
 1 AS `gredpoin_keterampilan`,
 1 AS `poin_keterampilan`,
 1 AS `tahap_keterampilan`,
 1 AS `status_penghantaran`,
 1 AS `id_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `id_giatmara`,
 1 AS `id_intake`,
 1 AS `id_modul`,
 1 AS `id_pelatih`,
 1 AS `jenis_pelatih`,
 1 AS `id_markah_modul`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p1_screen2_header`
--

DROP TABLE IF EXISTS `v_kurikulum_p1_screen2_header`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_header`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p1_screen2_header` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `kod_kursus`,
 1 AS `kod_modul`,
 1 AS `nama_modul`,
 1 AS `jam_kredit`,
 1 AS `jumlah_pelatih`,
 1 AS `belum_isi`,
 1 AS `telah_disimpan`,
 1 AS `hantar_ke_pengurus`,
 1 AS `dikembalikan`,
 1 AS `hantar_ke_pgn`,
 1 AS `pgn_dikembalikan`,
 1 AS `hantar_ke_ppkl`,
 1 AS `id_kursus`,
 1 AS `id_set`,
 1 AS `id_modul`,
 1 AS `id_giatmara`,
 1 AS `sesi`,
 1 AS `id_intake`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p1_screen4_detail`
--

DROP TABLE IF EXISTS `v_kurikulum_p1_screen4_detail`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_detail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p1_screen4_detail` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `nama_intake`,
 1 AS `tarikh_hantar_pengajar`,
 1 AS `gcpa`,
 1 AS `tahap_keterampilan`,
 1 AS `status_isi_markah`,
 1 AS `kokurikulum`,
 1 AS `literasi_komputer`,
 1 AS `keusahawanan`,
 1 AS `puji`,
 1 AS `kehadiran`,
 1 AS `latihan_industri`,
 1 AS `status_penghantaran`,
 1 AS `id_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `id_giatmara`,
 1 AS `id_intake`,
 1 AS `id_pelatih`,
 1 AS `jenis_pelatih`,
 1 AS `id_markah_modul_2`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p1_screen4_header`
--

DROP TABLE IF EXISTS `v_kurikulum_p1_screen4_header`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_header`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p1_screen4_header` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `kod_kursus`,
 1 AS `kod_modul`,
 1 AS `nama_modul`,
 1 AS `jam_kredit`,
 1 AS `jumlah_pelatih`,
 1 AS `belum_isi`,
 1 AS `telah_disimpan`,
 1 AS `hantar_ke_pengurus`,
 1 AS `dikembalikan`,
 1 AS `hantar_ke_pgn`,
 1 AS `dikembalikan_oleh_pgn`,
 1 AS `hantar_ke_ppkl`,
 1 AS `id_kursus`,
 1 AS `id_modul`,
 1 AS `id_giatmara`,
 1 AS `id_ref_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p2_screen6`
--

DROP TABLE IF EXISTS `v_kurikulum_p2_screen6`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p2_screen6` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `jenis_pelatih`,
 1 AS `tp_belum_diisi`,
 1 AS `tp_disimpan`,
 1 AS `skrin_pengurus`,
 1 AS `skrin_png`,
 1 AS `skrin_ppkl`,
 1 AS `jumlah_modul_hantar`,
 1 AS `dicetak_oleh`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kod_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `id_negeri`,
 1 AS `id_kursus`,
 1 AS `id_set`,
 1 AS `id_giatmara`,
 1 AS `sesi`,
 1 AS `id_intake`,
 1 AS `pengurus`,
 1 AS `pengurus_sah`,
 1 AS `pengurus_pgn`,
 1 AS `pengurus_ppkl`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p2_screen7_a`
--

DROP TABLE IF EXISTS `v_kurikulum_p2_screen7_a`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen7_a`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p2_screen7_a` AS SELECT 
 1 AS `nama_modul`,
 1 AS `kod_modul`,
 1 AS `id_modul`,
 1 AS `pb_teori`,
 1 AS `pb_amali`,
 1 AS `pam_teori`,
 1 AS `pam_amali`,
 1 AS `markah`,
 1 AS `status_isi_markah`,
 1 AS `catatan_pengurus`,
 1 AS `catatan_pgn`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`,
 1 AS `id_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `desc_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p2_screen7_b`
--

DROP TABLE IF EXISTS `v_kurikulum_p2_screen7_b`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen7_b`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p2_screen7_b` AS SELECT 
 1 AS `sesi`,
 1 AS `id_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `status_isi_markah`,
 1 AS `gcpa`,
 1 AS `tahap_keterampilan`,
 1 AS `kehadiran`,
 1 AS `kokurikulum`,
 1 AS `literasi_komputer`,
 1 AS `keusahawanan`,
 1 AS `puji`,
 1 AS `latihan_industri`,
 1 AS `anugerah_sijil`,
 1 AS `catatan_pengurus`,
 1 AS `catatan_pgn`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`,
 1 AS `id_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `desc_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p3_screen4_detail`
--

DROP TABLE IF EXISTS `v_kurikulum_p3_screen4_detail`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_detail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p3_screen4_detail` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `tarikh_hantar_pengajar`,
 1 AS `pb_teori`,
 1 AS `pb_amali`,
 1 AS `pam_teori`,
 1 AS `pam_amali`,
 1 AS `markah`,
 1 AS `gred_keterampilan`,
 1 AS `gredpoin_keterampilan`,
 1 AS `poin_keterampilan`,
 1 AS `tahap_keterampilan`,
 1 AS `status_penghantaran`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p3_screen4_header`
--

DROP TABLE IF EXISTS `v_kurikulum_p3_screen4_header`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_header`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p3_screen4_header` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `kod_kursus`,
 1 AS `kod_modul`,
 1 AS `nama_modul`,
 1 AS `jam_kredit`,
 1 AS `jenis_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_modul`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p3_screen6`
--

DROP TABLE IF EXISTS `v_kurikulum_p3_screen6`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p3_screen6` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `gcpa`,
 1 AS `kehadiran`,
 1 AS `jumlah_modul_dihantar`,
 1 AS `bahagian_a`,
 1 AS `bahagian_b`,
 1 AS `status_isi_markah`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`,
 1 AS `id_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_markah_modul2`,
 1 AS `id_ref_kursus`,
 1 AS `id_pengurus_sah`,
 1 AS `pengurus_sah`,
 1 AS `id_giatmara`,
 1 AS `id_intake`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p4_screen6`
--

DROP TABLE IF EXISTS `v_kurikulum_p4_screen6`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p4_screen6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p4_screen6` AS SELECT 
 1 AS `nama_kursus`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `gcpa`,
 1 AS `kehadiran`,
 1 AS `jumlah_modul_dihantar`,
 1 AS `bahagian_a`,
 1 AS `bahagian_b`,
 1 AS `status_isi_markah`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan`,
 1 AS `id_pelatih`,
 1 AS `id_kursus`,
 1 AS `id_markah_modul2`,
 1 AS `id_ref_kursus`,
 1 AS `id_pengurus_sah`,
 1 AS `pengurus_sah`,
 1 AS `id_giatmara`,
 1 AS `id_intake`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p5_screen1`
--

DROP TABLE IF EXISTS `v_kurikulum_p5_screen1`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p5_screen1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p5_screen1` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `nama_intake`,
 1 AS `nama_kursus`,
 1 AS `nama_modul`,
 1 AS `markah`,
 1 AS `gcpa`,
 1 AS `no_sijil`,
 1 AS `dicetak_oleh`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `id_ref_kursus`,
 1 AS `jenis_pelatih`,
 1 AS `id_intake`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kurikulum_p6_screen1`
--

DROP TABLE IF EXISTS `v_kurikulum_p6_screen1`;
/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p6_screen1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kurikulum_p6_screen1` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `jenis_pelatih`,
 1 AS `tp_belum_diisi`,
 1 AS `tp_disimpan`,
 1 AS `skrin_pengurus`,
 1 AS `skrin_png`,
 1 AS `skrin_ppkl`,
 1 AS `jumlah_dihantar`,
 1 AS `jumlah_modul`,
 1 AS `jumlah_dihantar2`,
 1 AS `dicetak_oleh`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kod_kursus`,
 1 AS `id_ref_kursus`,
 1 AS `id_negeri`,
 1 AS `id_kursus`,
 1 AS `id_set`,
 1 AS `id_giatmara`,
 1 AS `sesi`,
 1 AS `id_intake`,
 1 AS `pengurus`,
 1 AS `pengurus_sah`,
 1 AS `pengurus_pgn`,
 1 AS `pengurus_ppkl`,
 1 AS `id_pelatih`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kursus_pilihan`
--

DROP TABLE IF EXISTS `v_kursus_pilihan`;
/*!50001 DROP VIEW IF EXISTS `v_kursus_pilihan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kursus_pilihan` AS SELECT 
 1 AS `kluster1`,
 1 AS `kursus1`,
 1 AS `negeri1`,
 1 AS `giatmara1`,
 1 AS `kluster2`,
 1 AS `kursus2`,
 1 AS `negeri2`,
 1 AS `giatmara2`,
 1 AS `kluster3`,
 1 AS `kursus3`,
 1 AS `negeri3`,
 1 AS `giatmara3`,
 1 AS `id_permohonan_peribadi`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_kursus1`,
 1 AS `id_kursus2`,
 1 AS `id_kursus3`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_kursus_terdahulu`
--

DROP TABLE IF EXISTS `v_kursus_terdahulu`;
/*!50001 DROP VIEW IF EXISTS `v_kursus_terdahulu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_kursus_terdahulu` AS SELECT 
 1 AS `id_pelatih`,
 1 AS `id_permohonan`,
 1 AS `no_pelatih`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_settings_tawaran_kursus`,
 1 AS `id_kew_kod_kombinasi`,
 1 AS `id_kluster`,
 1 AS `nama_kluster`,
 1 AS `nama_kursus`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `id_intake`,
 1 AS `nama_intake`,
 1 AS `tarikh_mula_kursus`,
 1 AS `tarikh_tamat_kursus`,
 1 AS `status_desc`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `id_ref_kursus`,
 1 AS `jenis_pelatih`,
 1 AS `tarikh_lahir`,
 1 AS `jantina`,
 1 AS `umur`,
 1 AS `alamat`,
 1 AS `poskod`,
 1 AS `kewarganegaraan`,
 1 AS `taraf_perkahwinan`,
 1 AS `no_hp`,
 1 AS `cara_bayaran`,
 1 AS `no_akaun`,
 1 AS `nama_bank`,
 1 AS `id_lpp10`,
 1 AS `giatmara_baru_lpp10`,
 1 AS `giatmara_asal_lpp10`,
 1 AS `kursus_baru_lpp10`,
 1 AS `kursus_asal_lpp10`,
 1 AS `jenis_pertukaran_lpp10`,
 1 AS `dihantar_oleh_lpp10`,
 1 AS `dihantar_pada_lpp10`,
 1 AS `status_jana_lpp10`,
 1 AS `dijana_oleh_lpp10`,
 1 AS `dijana_pada_lpp10`,
 1 AS `id_negeri_lpp10`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_lpp7a`
--

DROP TABLE IF EXISTS `v_lpp7a`;
/*!50001 DROP VIEW IF EXISTS `v_lpp7a`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_lpp7a` AS SELECT 
 1 AS `id_pelatih`,
 1 AS `id_kew_potongan`,
 1 AS `name`,
 1 AS `value_per_unit`,
 1 AS `tarikh_mula`,
 1 AS `tarikh_tamat`,
 1 AS `dihantar_oleh`,
 1 AS `dihantar_pada`,
 1 AS `status_jana`,
 1 AS `id`,
 1 AS `dijana_oleh`,
 1 AS `dijana_pada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_maklumat_penjaga`
--

DROP TABLE IF EXISTS `v_maklumat_penjaga`;
/*!50001 DROP VIEW IF EXISTS `v_maklumat_penjaga`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_maklumat_penjaga` AS SELECT 
 1 AS `maklumat`,
 1 AS `nama_penuh_bapak`,
 1 AS `jenis_pengenalan_bapak`,
 1 AS `mykad_bapak`,
 1 AS `id_kewarganegaraan_bapak`,
 1 AS `kewarganegaraan_bapak`,
 1 AS `id_kategori_penjaga_bapak`,
 1 AS `kategori_penjaga_bapak`,
 1 AS `no_tel_bapak`,
 1 AS `no_hp_bapak`,
 1 AS `agama_bapak`,
 1 AS `etnik_bapak`,
 1 AS `bangsa_bapak`,
 1 AS `alamat_bapak`,
 1 AS `poskod_bapak`,
 1 AS `bandar_bapak`,
 1 AS `id_negeri_bapak`,
 1 AS `nama_negeri_bapak`,
 1 AS `pekerjaan_bapak`,
 1 AS `id_pendapatan_bapak`,
 1 AS `pendapatan_bapak`,
 1 AS `majikan_bapak`,
 1 AS `no_tel_pejabat_bapak`,
 1 AS `samb_bapak`,
 1 AS `amalat_pejabat_bapak`,
 1 AS `nama_penuh_ibu`,
 1 AS `jenis_pengenalan_ibu`,
 1 AS `mykad_ibu`,
 1 AS `id_kewarganegaraan_ibu`,
 1 AS `kewarganegaraan_ibu`,
 1 AS `id_kategori_penjaga_ibu`,
 1 AS `kategori_penjaga_ibu`,
 1 AS `no_tel_ibu`,
 1 AS `no_hp_ibu`,
 1 AS `agama_ibu`,
 1 AS `etnik_ibu`,
 1 AS `bangsa_ibu`,
 1 AS `alamat_ibu`,
 1 AS `poskod_ibu`,
 1 AS `bandar_ibu`,
 1 AS `id_negeri_ibu`,
 1 AS `nama_negeri_ibu`,
 1 AS `pekerjaan_ibu`,
 1 AS `id_pendapatan_ibu`,
 1 AS `pendapatan_ibu`,
 1 AS `majikan_ibu`,
 1 AS `no_tel_pejabat_ibu`,
 1 AS `samb_ibu`,
 1 AS `alamat_pejabat_ibu`,
 1 AS `nama_penuh_waris`,
 1 AS `id_hubungan_waris`,
 1 AS `hubungan_waris`,
 1 AS `jenis_pengenalan_waris`,
 1 AS `mykad_waris`,
 1 AS `id_kewarganegaraan_waris`,
 1 AS `kewarganegaraan_waris`,
 1 AS `id_kategori_penjaga_waris`,
 1 AS `kategori_penjaga_waris`,
 1 AS `no_tel_waris`,
 1 AS `no_hp_waris`,
 1 AS `id_agama_waris`,
 1 AS `agama_waris`,
 1 AS `id_etnik_waris`,
 1 AS `etnik_waris`,
 1 AS `id_bangsa_waris`,
 1 AS `bangsa_waris`,
 1 AS `alamat_waris`,
 1 AS `poskod_waris`,
 1 AS `bandar_waris`,
 1 AS `id_negeri_waris`,
 1 AS `nama_negeri_waris`,
 1 AS `pekerjaan_waris`,
 1 AS `id_pendapatan_waris`,
 1 AS `pendapatan_waris`,
 1 AS `majikan_waris`,
 1 AS `no_tel_pejabat_waris`,
 1 AS `samb_waris`,
 1 AS `alamat_pejabat_waris`,
 1 AS `jenis_maklumat`,
 1 AS `id_permohonan_peribadi`,
 1 AS `id_penjaga`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatih_potongan`
--

DROP TABLE IF EXISTS `v_pelatih_potongan`;
/*!50001 DROP VIEW IF EXISTS `v_pelatih_potongan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatih_potongan` AS SELECT 
 1 AS `id_pelatih`,
 1 AS `id_kew_potongan`,
 1 AS `name`,
 1 AS `value_per_unit`,
 1 AS `tarikh_ditambah`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p4`
--

DROP TABLE IF EXISTS `v_pelatihan_p4`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p4`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p4` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `ket_keputusan_temuduga`,
 1 AS `keputusan_temuduga`,
 1 AS `nama_tawaran_sesi`,
 1 AS `tawaran_sesi`,
 1 AS `nama_tawaran_kursus`,
 1 AS `tawaran_kursus`,
 1 AS `kelayakan_elaun`,
 1 AS `tawaran_status`,
 1 AS `tawaran_tarikh_lapordiri`,
 1 AS `tarikh_cetak`,
 1 AS `tawaran_tarikh_cetak`,
 1 AS `tawaran_masa_lapordiri`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `kod_intake`,
 1 AS `id_temuduga_tetapan`,
 1 AS `id_kluster`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p5_screen1`
--

DROP TABLE IF EXISTS `v_pelatihan_p5_screen1`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p5_screen1` AS SELECT 
 1 AS `nama`,
 1 AS `no_mykad`,
 1 AS `tarikh_tawaran`,
 1 AS `sesi`,
 1 AS `kelayakan_elaun`,
 1 AS `nama_bank`,
 1 AS `no_akaun`,
 1 AS `cara_bayar`,
 1 AS `tindakan`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `id_intake`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_setting_tawaran_kursus`,
 1 AS `tawaran_mula_elaun`,
 1 AS `tawaran_tamat_elaun`,
 1 AS `id_kew_kod_kombinasi`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p5_screen3`
--

DROP TABLE IF EXISTS `v_pelatihan_p5_screen3`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p5_screen3` AS SELECT 
 1 AS `nama`,
 1 AS `no_mykad`,
 1 AS `tarikh_tawaran`,
 1 AS `sesi`,
 1 AS `kelayakan_elaun`,
 1 AS `nama_bank`,
 1 AS `no_akaun`,
 1 AS `cara_bayar`,
 1 AS `tindakan`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `id_intake`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_setting_tawaran_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p5_screen5`
--

DROP TABLE IF EXISTS `v_pelatihan_p5_screen5`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen5`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p5_screen5` AS SELECT 
 1 AS `nama`,
 1 AS `no_mykad`,
 1 AS `tarikh_tawaran`,
 1 AS `sesi`,
 1 AS `kelayakan_elaun`,
 1 AS `nama_bank`,
 1 AS `no_akaun`,
 1 AS `cara_bayar`,
 1 AS `tindakan`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `id_intake`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_setting_tawaran_kursus`,
 1 AS `tawaran_mula_elaun`,
 1 AS `tawaran_tamat_elaun`,
 1 AS `id_kew_kod_kombinasi`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p5_screen6`
--

DROP TABLE IF EXISTS `v_pelatihan_p5_screen6`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p5_screen6` AS SELECT 
 1 AS `nama`,
 1 AS `no_mykad`,
 1 AS `tawaran_tarikh_lapordiri`,
 1 AS `sesi`,
 1 AS `kelayakan_elaun`,
 1 AS `nama_bank`,
 1 AS `no_akaun`,
 1 AS `cara_bayar`,
 1 AS `tindakan`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_giatmara`,
 1 AS `nama_giatmara`,
 1 AS `id_intake`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`,
 1 AS `id_temuduga_tetapan`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_setting_tawaran_kursus`,
 1 AS `tawaran_mula_elaun`,
 1 AS `tawaran_tamat_elaun`,
 1 AS `id_kew_kod_kombinasi`,
 1 AS `no_pelatih`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pelatihan_p6`
--

DROP TABLE IF EXISTS `v_pelatihan_p6`;
/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p6`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_pelatihan_p6` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `jenis_pengambilan`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_pelatih`,
 1 AS `tarikh_waktu`,
 1 AS `tarikh_temuduga`,
 1 AS `daftar`,
 1 AS `mula`,
 1 AS `tamat`,
 1 AS `status_temuduga`,
 1 AS `keputusan_temuduga`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_permohonan_kursus`
--

DROP TABLE IF EXISTS `v_permohonan_kursus`;
/*!50001 DROP VIEW IF EXISTS `v_permohonan_kursus`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_permohonan_kursus` AS SELECT 
 1 AS `id`,
 1 AS `id_permohonan`,
 1 AS `kursus`,
 1 AS `pilihan`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_permohonan_peribadi`
--

DROP TABLE IF EXISTS `v_permohonan_peribadi`;
/*!50001 DROP VIEW IF EXISTS `v_permohonan_peribadi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_permohonan_peribadi` AS SELECT 
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_lahir`,
 1 AS `kewarganegaraan`,
 1 AS `umur`,
 1 AS `no_telefon`,
 1 AS `no_hp`,
 1 AS `alamat`,
 1 AS `poskod`,
 1 AS `bandar`,
 1 AS `nama_negeri`,
 1 AS `emel`,
 1 AS `bangsa`,
 1 AS `etnik`,
 1 AS `agama`,
 1 AS `taraf_perkahwinan`,
 1 AS `kategori_kelulusan`,
 1 AS `kelulusan`,
 1 AS `matlamat`,
 1 AS `kategori_pemohon`,
 1 AS `id`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_poskod`,
 1 AS `jantina`,
 1 AS `id_bangsa`,
 1 AS `id_etnik`,
 1 AS `id_agama`,
 1 AS `id_taraf_perkawinan`,
 1 AS `id_kelulusan`,
 1 AS `id_kategori_pemohon`,
 1 AS `no_rujukan_permohonan`,
 1 AS `pengesahan`,
 1 AS `pengakuan`,
 1 AS `tarikh_hantar`,
 1 AS `id_admin_user`,
 1 AS `jenis_lpp`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_poskod`
--

DROP TABLE IF EXISTS `v_poskod`;
/*!50001 DROP VIEW IF EXISTS `v_poskod`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_poskod` AS SELECT 
 1 AS `id`,
 1 AS `poskod`,
 1 AS `bandar`,
 1 AS `negeri`,
 1 AS `nama_negeri`,
 1 AS `kod_negeri`,
 1 AS `poskodfull`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_tetapan_temuduga`
--

DROP TABLE IF EXISTS `v_tetapan_temuduga`;
/*!50001 DROP VIEW IF EXISTS `v_tetapan_temuduga`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_tetapan_temuduga` AS SELECT 
 1 AS `id_permohonan_kursus`,
 1 AS `pilihan`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `no_hp`,
 1 AS `id_kewarganegaraan`,
 1 AS `kewarganegaraan`,
 1 AS `tarikh_hantar`,
 1 AS `tarikh_mohon`,
 1 AS `pengakuan`,
 1 AS `id_settings_tawaran_kursus`,
 1 AS `id_kursus_temudugatetapan`,
 1 AS `id_giatmara`,
 1 AS `id_giatmara_temudugatetapan`,
 1 AS `nama_giatmara`,
 1 AS `id_negeri`,
 1 AS `nama_negeri`,
 1 AS `id_kursus`,
 1 AS `nama_kursus`,
 1 AS `id_intake`,
 1 AS `nama_intake`,
 1 AS `id_temuduga_tetapan`,
 1 AS `status_settings_tawaran_kursus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_tetapan_temuduga_ori`
--

DROP TABLE IF EXISTS `v_tetapan_temuduga_ori`;
/*!50001 DROP VIEW IF EXISTS `v_tetapan_temuduga_ori`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_tetapan_temuduga_ori` AS SELECT 
 1 AS `id_settings_tawaran_kursus`,
 1 AS `nama_negeri`,
 1 AS `nama_giatmara`,
 1 AS `nama_kursus`,
 1 AS `kewarganegaraan`,
 1 AS `nama_intake`,
 1 AS `nama_penuh`,
 1 AS `no_mykad`,
 1 AS `tarikh_hantar`,
 1 AS `no_hp`,
 1 AS `id_negeri`,
 1 AS `id_giatmara`,
 1 AS `id_kursus`,
 1 AS `id_kewarganegaraan`,
 1 AS `id_intake`,
 1 AS `id_permohonan_kursus`,
 1 AS `id_permohonan_butir_peribadi`,
 1 AS `tarikh_mohon`,
 1 AS `id_temuduga_tetapan`,
 1 AS `pengakuan`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `copy_v_kurikulum_p2_screen6`
--

/*!50001 DROP VIEW IF EXISTS `copy_v_kurikulum_p2_screen6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `copy_v_kurikulum_p2_screen6` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`markah_modul_2`.`gcpa` AS `gcpa`,`markah_modul_2`.`kehadiran` AS `kehadiran`,concat(sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)),'/',count(`markah_modul`.`id`)) AS `jumlah_modul_dihantar`,(sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)) = count(`markah_modul`.`id`)) AS `bahagian_a`,(`markah_modul_2`.`status_isi_markah` = 2) AS `bahagian_b`,`markah_modul_2`.`status_isi_markah` AS `status_isi_markah`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_kursus` AS `id_kursus`,`markah_modul_2`.`id` AS `id_markah_modul2`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`markah_modul_status`.`id` AS `id_pengurus_sah`,`markah_modul_status`.`pengurus_sah` AS `pengurus_sah` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) left join `markah_modul_status` on((`pelatih`.`id_pelatih` = `markah_modul_status`.`id_pelatih`))) join `settings_tawaran_kursus` on(((`settings_tawaran_kursus`.`id` = `pelatih`.`id_kursus`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`ref_kursus`.`id` = `settings_tawaran_kursus`.`id_kursus`))) left join `markah_modul_2` on(((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul_2`.`id_kursus`)))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`)))) group by `ref_kursus`.`nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh`,`permohonan_butir_peribadi`.`no_mykad`,`pelatih`.`no_pelatih`,`markah_modul_2`.`gcpa`,`markah_modul_2`.`kehadiran`,`pelatih`.`id_kursus`,`markah_modul_2`.`status_isi_markah`,`permohonan_butir_peribadi`.`id`,`pelatih`.`id_permohonan`,`pelatih`.`id_pelatih`,`pelatih`.`id_kursus`,`markah_modul_2`.`id`,`settings_tawaran_kursus`.`id_kursus`,`markah_modul_status`.`pengurus_sah`,`markah_modul_status`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_admin_users`
--

/*!50001 DROP VIEW IF EXISTS `v_admin_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_admin_users` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`first_name` AS `first_name`,`a`.`last_name` AS `last_name`,`a`.`active` AS `active`,`a`.`id_staff` AS `id_staff`,`b`.`id` AS `id_staff_info_pangku_tugas`,`c`.`nama` AS `nama_staff`,`b`.`id_jabatan` AS `id_jabatan`,`d`.`nama_jabatan` AS `nama_jabatan`,`b`.`id_jawatan` AS `id_jawatan`,`e`.`nama_jawatan` AS `nama_jawatan`,`b`.`id_jenis_jawatan` AS `id_jenis_jawatan`,`f`.`nama_jenis_jawatan` AS `nama_jenis_jawatan`,`b`.`id_negeri` AS `id_negeri`,`g`.`nama_negeri` AS `nama_negeri`,`b`.`id_giatmara` AS `id_giatmara`,`h`.`nama_giatmara` AS `nama_giatmara`,`h`.`email` AS `email`,`h`.`tel_no` AS `tel_no`,`b`.`id_kursus` AS `id_kursus`,`i`.`nama_kursus` AS `nama_kursus` from ((((((((`admin_users` `a` join `staff_info_pangku_tugas` `b` on((`a`.`id_staff` = `b`.`id_staff`))) join `staff` `c` on((`b`.`id_staff` = `c`.`id`))) join `ref_jabatan` `d` on((`b`.`id_jabatan` = `d`.`id`))) join `ref_jawatan` `e` on((`b`.`id_jawatan` = `e`.`id`))) join `ref_jenis_jawatan` `f` on((`b`.`id_jenis_jawatan` = `f`.`id`))) join `ref_negeri` `g` on((`b`.`id_negeri` = `g`.`id`))) join `ref_giatmara` `h` on((`b`.`id_giatmara` = `h`.`id`))) left join `ref_kursus` `i` on((`b`.`id_kursus` = `i`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_cetakan_surat_temuduga`
--

/*!50001 DROP VIEW IF EXISTS `v_cetakan_surat_temuduga`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_cetakan_surat_temuduga` AS select `gspel1`.`settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`gspel1`.`ref_negeri`.`nama_negeri` AS `nama_negeri`,`gspel1`.`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`gspel1`.`ref_kursus`.`nama_kursus` AS `nama_kursus`,`gspel1`.`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`gspel1`.`ref_intake`.`nama_intake` AS `nama_intake`,`gspel1`.`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`gspel1`.`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`gspel1`.`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`gspel1`.`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`gspel1`.`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`gspel1`.`temuduga_tetapan`.`tempat` AS `tempat_temuduga`,`gspel1`.`staff`.`nama` AS `pegawai_dihubungi`,`gspel1`.`temuduga_tetapan`.`tarikh_cetak` AS `tarikh_cetakan`,`gspel1`.`ref_negeri`.`id` AS `id_negeri`,`gspel1`.`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`gspel1`.`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`gspel1`.`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`v_permohonan_kursus`.`id` AS `id_permohonan_kursus`,`gspel1`.`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`gspel1`.`temuduga_tetapan`.`cetak` AS `cetak` from (((((((((`gspel1`.`v_permohonan_kursus` join `gspel1`.`permohonan_butir_peribadi` on((`gspel1`.`permohonan_butir_peribadi`.`id` = `v_permohonan_kursus`.`id_permohonan`))) join `gspel1`.`ref_kewarganegaraan` on((`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` = `gspel1`.`ref_kewarganegaraan`.`id`))) join `gspel1`.`settings_tawaran_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id` = `v_permohonan_kursus`.`kursus`))) join `gspel1`.`ref_giatmara` on((`gspel1`.`settings_tawaran_kursus`.`id_giatmara` = `gspel1`.`ref_giatmara`.`id`))) join `gspel1`.`ref_negeri` on((`gspel1`.`ref_giatmara`.`id_negeri` = `gspel1`.`ref_negeri`.`id`))) join `gspel1`.`ref_intake` on((`gspel1`.`settings_tawaran_kursus`.`id_intake` = `gspel1`.`ref_intake`.`id`))) join `gspel1`.`ref_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id_kursus` = `gspel1`.`ref_kursus`.`id`))) left join `gspel1`.`temuduga_tetapan` on(((`gspel1`.`temuduga_tetapan`.`id_permohonan` = `v_permohonan_kursus`.`id`) and (`gspel1`.`temuduga_tetapan`.`id_giatmara` = `gspel1`.`settings_tawaran_kursus`.`id_giatmara`) and (`gspel1`.`temuduga_tetapan`.`id_kursus` = `gspel1`.`settings_tawaran_kursus`.`id`)))) left join `gspel1`.`staff` on((`gspel1`.`staff`.`id` = `gspel1`.`temuduga_tetapan`.`pegawai`))) where (((`gspel1`.`temuduga_tetapan`.`tawaran_status` = 0) or isnull(`gspel1`.`temuduga_tetapan`.`tawaran_status`)) and ((`gspel1`.`temuduga_tetapan`.`pendaftaran_status` = 0) or isnull(`gspel1`.`temuduga_tetapan`.`pendaftaran_status`)) and (`gspel1`.`temuduga_tetapan`.`keputusan_temuduga` <> 2)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_cetakan_surat_temuduga_ori`
--

/*!50001 DROP VIEW IF EXISTS `v_cetakan_surat_temuduga_ori`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_cetakan_surat_temuduga_ori` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`temuduga_tetapan`.`tempat` AS `tempat_temuduga`,`staff`.`nama` AS `pegawai_dihubungi`,`temuduga_tetapan`.`tarikh_cetak` AS `tarikh_cetakan`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`temuduga_tetapan`.`cetak` AS `cetak` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) left join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) left join `staff` on((`staff`.`id` = `temuduga_tetapan`.`pegawai`))) where (((`temuduga_tetapan`.`tawaran_status` = 0) or isnull(`temuduga_tetapan`.`tawaran_status`)) and ((`temuduga_tetapan`.`pendaftaran_status` = 0) or isnull(`temuduga_tetapan`.`pendaftaran_status`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_elaun_pelatih`
--

/*!50001 DROP VIEW IF EXISTS `v_elaun_pelatih`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_elaun_pelatih` AS select `kew_elaun`.`name` AS `name`,`kew_elaun`.`amount` AS `amount`,`kew_kod_kombinasi`.`elaun_id` AS `elaun_id`,`pelatih`.`id_kew_kod_kombinasi` AS `id_kew_kod_kombinasi`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`tarikh_mula_kursus` AS `tarikh_mula_kursus`,`pelatih`.`tarikh_tamat_kursus` AS `tarikh_tamat_kursus` from ((`pelatih` join `kew_kod_kombinasi` on((`pelatih`.`id_kew_kod_kombinasi` = `kew_kod_kombinasi`.`id`))) join `kew_elaun` on((`kew_kod_kombinasi`.`elaun_id` = `kew_elaun`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_gagal_temuduga`
--

/*!50001 DROP VIEW IF EXISTS `v_gagal_temuduga`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_gagal_temuduga` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `keputusan_temuduga`,`settings_tawaran_kursus`.`id_kursus` AS `tukar_kursus`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) where (`temuduga_tetapan`.`keputusan_temuduga` in (4,5)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_giatmara_kursus`
--

/*!50001 DROP VIEW IF EXISTS `v_giatmara_kursus`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_giatmara_kursus` AS select `ref_kluster`.`nama_kluster` AS `nama_kluster`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`kod_giatmara` AS `kod_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`kod_intake` AS `kod_intake`,`ref_intake`.`nama_intake` AS `nama_intake`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_kursus`.`id_kluster` AS `id_kluster`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id` AS `id_setting_penawaran_kursus`,`settings_tawaran_kursus`.`status` AS `status` from (((((`ref_giatmara` join `settings_tawaran_kursus` on((`ref_giatmara`.`id` = `settings_tawaran_kursus`.`id_giatmara`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_negeri`.`id` = `ref_giatmara`.`id_negeri`))) join `ref_kluster` on((`ref_kluster`.`id` = `ref_kursus`.`id_kluster`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_keputusan_temuduga`
--

/*!50001 DROP VIEW IF EXISTS `v_keputusan_temuduga`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_keputusan_temuduga` AS select `gspel1`.`settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`gspel1`.`ref_negeri`.`nama_negeri` AS `nama_negeri`,`gspel1`.`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`gspel1`.`ref_kursus`.`nama_kursus` AS `nama_kursus`,`gspel1`.`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`gspel1`.`ref_intake`.`nama_intake` AS `nama_intake`,`gspel1`.`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`gspel1`.`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`gspel1`.`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`gspel1`.`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`gspel1`.`ref_keputusan_temuduga`.`keputusan_temuduga` AS `keputusan_temuduga`,`t1`.`nama_kursus` AS `nama_tukar_kursus`,`gspel1`.`temuduga_tetapan`.`tukar_kursus` AS `tukar_kursus`,`gspel1`.`ref_negeri`.`id` AS `id_negeri`,`gspel1`.`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`gspel1`.`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`gspel1`.`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`v_permohonan_kursus`.`id` AS `id_permohonan_kursus`,`gspel1`.`temuduga_tetapan`.`id` AS `id_tetapan_temuduga`,`gspel1`.`temuduga_tetapan`.`keputusan_temuduga` AS `id_keputusan_temuduga` from (((((((((((`gspel1`.`v_permohonan_kursus` join `gspel1`.`permohonan_butir_peribadi` on((`gspel1`.`permohonan_butir_peribadi`.`id` = `v_permohonan_kursus`.`id_permohonan`))) join `gspel1`.`ref_kewarganegaraan` on((`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` = `gspel1`.`ref_kewarganegaraan`.`id`))) join `gspel1`.`settings_tawaran_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id` = `v_permohonan_kursus`.`kursus`))) join `gspel1`.`ref_giatmara` on((`gspel1`.`settings_tawaran_kursus`.`id_giatmara` = `gspel1`.`ref_giatmara`.`id`))) join `gspel1`.`ref_negeri` on((`gspel1`.`ref_giatmara`.`id_negeri` = `gspel1`.`ref_negeri`.`id`))) join `gspel1`.`ref_intake` on((`gspel1`.`settings_tawaran_kursus`.`id_intake` = `gspel1`.`ref_intake`.`id`))) join `gspel1`.`ref_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id_kursus` = `gspel1`.`ref_kursus`.`id`))) join `gspel1`.`temuduga_tetapan` on(((`gspel1`.`temuduga_tetapan`.`id_permohonan` = `v_permohonan_kursus`.`id`) and (`gspel1`.`temuduga_tetapan`.`id_giatmara` = `gspel1`.`settings_tawaran_kursus`.`id_giatmara`) and (`gspel1`.`temuduga_tetapan`.`id_kursus` = `gspel1`.`settings_tawaran_kursus`.`id`)))) join `gspel1`.`ref_keputusan_temuduga` on((`gspel1`.`ref_keputusan_temuduga`.`id` = `gspel1`.`temuduga_tetapan`.`keputusan_temuduga`))) join `gspel1`.`settings_tawaran_kursus` `t0` on((`t0`.`id` = `gspel1`.`temuduga_tetapan`.`tukar_kursus`))) join `gspel1`.`ref_kursus` `t1` on((`t1`.`id` = `t0`.`id_kursus`))) where ((`gspel1`.`temuduga_tetapan`.`keputusan_temuduga` = 1) and ((`gspel1`.`temuduga_tetapan`.`tawaran_status` = 0) or isnull(`gspel1`.`temuduga_tetapan`.`tawaran_status`)) and ((`gspel1`.`temuduga_tetapan`.`pendaftaran_status` = 0) or isnull(`gspel1`.`temuduga_tetapan`.`pendaftaran_status`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_keputusan_temuduga_ori`
--

/*!50001 DROP VIEW IF EXISTS `v_keputusan_temuduga_ori`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_keputusan_temuduga_ori` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `keputusan_temuduga`,`t1`.`nama_kursus` AS `nama_tukar_kursus`,`temuduga_tetapan`.`tukar_kursus` AS `tukar_kursus`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`temuduga_tetapan`.`id` AS `id_tetapan_temuduga`,`temuduga_tetapan`.`keputusan_temuduga` AS `id_keputusan_temuduga` from ((((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) join `settings_tawaran_kursus` `t0` on((`t0`.`id` = `temuduga_tetapan`.`tukar_kursus`))) join `ref_kursus` `t1` on((`t1`.`id` = `t0`.`id_kursus`))) where ((`temuduga_tetapan`.`keputusan_temuduga` = 1) and ((`temuduga_tetapan`.`tawaran_status` = 0) or isnull(`temuduga_tetapan`.`tawaran_status`)) and ((`temuduga_tetapan`.`pendaftaran_status` = 0) or isnull(`temuduga_tetapan`.`pendaftaran_status`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kew_potongan`
--

/*!50001 DROP VIEW IF EXISTS `v_kew_potongan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kew_potongan` AS select `kew_potongan`.`name` AS `name`,`kew_potongan`.`value_per_unit` AS `value_per_unit`,`kew_dana`.`name` AS `dana`,`kew_program_giatmara`.`name` AS `program`,`kew_peringkat`.`name` AS `peringkat`,`kew_potongan`.`code` AS `code`,`kew_potongan`.`deduction_frequency` AS `deduction_frequency`,`kew_potongan`.`description` AS `description`,`kew_potongan`.`id` AS `id` from (((`kew_potongan` join `kew_dana` on((`kew_potongan`.`dana_source_id` = `kew_dana`.`id`))) join `kew_program_giatmara` on((`kew_potongan`.`program_id` = `kew_program_giatmara`.`id`))) join `kew_peringkat` on((`kew_potongan`.`peringkat_id` = `kew_peringkat`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp06_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp06_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp06_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat(`lpp_06`.`cara_bayaran_asal`,' >> ',`lpp_06`.`cara_bayaran_baru`,'<br>',`lpp_06`.`nama_bank_asal`,' >> ',`lpp_06`.`nama_bank_baru`,'<br>',`lpp_06`.`no_akaun_asal`,' >> ',`lpp_06`.`no_akaun_baru`) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_06`.`status_jana` AS `status_jana`,`lpp_06`.`dijana_oleh` AS `dijana_oleh`,`lpp_06`.`dijana_pada` AS `dijana_pada`,`lpp_06`.`id` AS `id` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `lpp_06` on((`pelatih`.`id_pelatih` = `lpp_06`.`id_pelatih`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp08_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp08_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp08_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,`lpp_08`.`status_baru` AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_08`.`id` AS `id`,`lpp_08`.`tarikh_kuatkuasa` AS `tarikh_kuatkuasa`,`lpp_08`.`dihantar_oleh` AS `dihantar_oleh`,`lpp_08`.`dihantar_pada` AS `dihantar_pada`,`lpp_08`.`status_jana` AS `status_jana`,`lpp_08`.`dijana_oleh` AS `dijana_oleh`,`lpp_08`.`dijana_pada` AS `dijana_pada` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `lpp_08` on((`lpp_08`.`id_pelatih` = `pelatih`.`id_pelatih`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp10_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp10_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp10_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat(`ref_kursus`.`nama_kursus`,' >> ',`t0`.`nama_kursus`,'<br>',convert(`ref_giatmara`.`nama_giatmara` using utf8mb4),' >> ',convert(`t1`.`nama_giatmara` using utf8mb4)) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_10`.`id` AS `id`,`lpp_10`.`giatmara_baru` AS `giatmara_baru`,`lpp_10`.`giatmara_asal` AS `giatmara_asal`,`lpp_10`.`kursus_baru` AS `kursus_baru`,`lpp_10`.`kursus_asal` AS `kursus_asal`,`lpp_10`.`nota` AS `nota`,`lpp_10`.`jenis_pertukaran` AS `jenis_pertukaran`,`lpp_10`.`dihantar_oleh` AS `dihantar_oleh`,`lpp_10`.`dihantar_pada` AS `dihantar_pada`,`lpp_10`.`status_jana` AS `status_jana`,`lpp_10`.`dijana_oleh` AS `dijana_oleh`,`lpp_10`.`dijana_pada` AS `dijana_pada` from ((((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `lpp_10` on((`lpp_10`.`id_pelatih` = `pelatih`.`id_pelatih`))) left join `ref_kursus` `t0` on((`lpp_10`.`kursus_baru` = `t0`.`id`))) left join `ref_giatmara` `t1` on((`lpp_10`.`giatmara_baru` = `t1`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp5a_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5a_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp5a_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat(`lpp_5a`.`nama_asal`,' >> ',`lpp_5a`.`nama_baru`) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_5a`.`nama_asal` AS `nama_asal`,`lpp_5a`.`nama_baru` AS `nama_baru`,`lpp_5a`.`status_jana` AS `status_jana`,`lpp_5a`.`dijana_oleh` AS `dijana_oleh`,`lpp_5a`.`dijana_pada` AS `dijana_pada`,`lpp_5a`.`id` AS `id` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `lpp_5a` on((`pelatih`.`id_pelatih` = `lpp_5a`.`id_pelatih`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp5b_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5b_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp5b_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat(`lpp_5b`.`mykad_asal`,' >> ',`lpp_5b`.`mykad_baru`,'<br>',`lpp_5b`.`tarikh_lahir_asal`,' >> ',`lpp_5b`.`tarikh_lahir_baru`,'<br>',`lpp_5b`.`umur_asal`,' >> ',`lpp_5b`.`umur_baru`,'<br>',`lpp_5b`.`jantina_asal`,' >> ',`lpp_5b`.`jantina_baru`) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_5b`.`mykad_asal` AS `mykad_asal`,`lpp_5b`.`mykad_baru` AS `mykad_baru`,`lpp_5b`.`tarikh_lahir_asal` AS `tarikh_lahir_asal`,`lpp_5b`.`tarikh_lahir_baru` AS `tarikh_lahir_baru`,`lpp_5b`.`umur_asal` AS `umur_asal`,`lpp_5b`.`umur_baru` AS `umur_baru`,`lpp_5b`.`jantina_asal` AS `jantina_asal`,`lpp_5b`.`jantina_baru` AS `jantina_baru`,`lpp_5b`.`id` AS `id`,`lpp_5b`.`status_jana` AS `status_jana`,`lpp_5b`.`dijana_oleh` AS `dijana_oleh`,`lpp_5b`.`dijana_pada` AS `dijana_pada` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `lpp_5b` on((`lpp_5b`.`id_pelatih` = `pelatih`.`id_pelatih`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp5d_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp5d_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp5d_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat(`lpp_5d`.`alamat_asal`,' >> ',`lpp_5d`.`alamat_baru`,'<br>',`lpp_5d`.`poskod_asal`,' >> ',`lpp_5d`.`poskod_baru`,'<br>',`lpp_5d`.`kewarganegaraan_asal`,' >> ',`lpp_5d`.`kewarganegaraan_baru`,'<br>',`lpp_5d`.`taraf_perkahwinan_asal`,' >> ',`lpp_5d`.`taraf_perkahwinan_baru`,'<br>',`lpp_5d`.`no_hp_asal`,' >> ',`lpp_5d`.`no_hp_baru`) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`lpp_5d`.`id` AS `id`,`lpp_5d`.`status_jana` AS `status_jana`,`lpp_5d`.`dijana_oleh` AS `dijana_oleh`,`lpp_5d`.`dijana_pada` AS `dijana_pada` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `lpp_5d` on((`lpp_5d`.`id_pelatih` = `pelatih`.`id_pelatih`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kewangan_lpp7a_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_kewangan_lpp7a_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kewangan_lpp7a_screen3` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`pelatih`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,concat('Jenis: ',`v_lpp7a`.`name`,'<br>','Jumlah (RM): ',`v_lpp7a`.`value_per_unit`,'Tarikh Ditambah: ',convert(date_format(`v_lpp7a`.`tarikh_mula`,'%d/%m/%Y') using utf8)) AS `data_lpp`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_pelatih` AS `id_pelatih`,`v_lpp7a`.`id` AS `id`,`v_lpp7a`.`status_jana` AS `status_jana` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `v_lpp7a` on((`v_lpp7a`.`id_pelatih` = `pelatih`.`id_pelatih`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p1_screen2_detail`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p1_screen2_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,`markah_modul`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul`.`pb_teori` AS `pb_teori`,`markah_modul`.`pb_amali` AS `pb_amali`,(`markah_modul`.`pb_teori` + `markah_modul`.`pb_amali`) AS `pb`,`markah_modul`.`pam_teori` AS `pam_teori`,`markah_modul`.`pam_amali` AS `pam_amali`,(`markah_modul`.`pam_teori` + `markah_modul`.`pam_amali`) AS `pam`,`markah_modul`.`markah` AS `markah`,`markah_modul`.`status_isi_markah` AS `status_isi_markah`,`ref_keterampilan`.`gred_keterampilan` AS `gred_keterampilan`,`ref_keterampilan`.`poin_keterampilan` AS `gredpoin_keterampilan`,(`ref_modul`.`jam_kredit` * `ref_keterampilan`.`poin_keterampilan`) AS `poin_keterampilan`,`ref_keterampilan`.`tahap_keterampilan` AS `tahap_keterampilan`,(case when (`markah_modul`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul`.`status_isi_markah` = 2) then 'Hantar Ke Pengurus' when (`markah_modul`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran`,`pelatih`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_modul`.`id_modul` AS `id_modul`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`markah_modul`.`id` AS `id_markah_modul`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan` from (((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`) and (`ref_modul`.`id_modul` = `markah_modul`.`id_modul`)))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) left join `ref_keterampilan` on(((`markah_modul`.`markah` >= `ref_keterampilan`.`markah_min`) and (`markah_modul`.`markah` <= `ref_keterampilan`.`markah_max`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p1_screen2_header`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_header`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p1_screen2_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,count(`pelatih`.`id_pelatih`) AS `jumlah_pelatih`,sum((case when (`markah_modul`.`status_isi_markah` = 0) then 1 else 0 end)) AS `belum_isi`,sum((case when (`markah_modul`.`status_isi_markah` = 1) then 1 else 0 end)) AS `telah_disimpan`,sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)) AS `hantar_ke_pengurus`,sum((case when (`markah_modul`.`status_isi_markah` = 3) then 1 else 0 end)) AS `dikembalikan`,sum((case when (`markah_modul`.`status_isi_markah` = 4) then 1 else 0 end)) AS `hantar_ke_pgn`,sum((case when (`markah_modul`.`status_isi_markah` = 5) then 1 else 0 end)) AS `pgn_dikembalikan`,sum((case when (`markah_modul`.`status_isi_markah` = 6) then 1 else 0 end)) AS `hantar_ke_ppkl`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id` AS `id_set`,`ref_modul`.`id_modul` AS `id_modul`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_intake`.`nama_intake` AS `sesi`,`settings_tawaran_kursus`.`id_intake` AS `id_intake` from (((((`settings_tawaran_kursus` left join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) join `ref_intake` on((`ref_intake`.`id` = `settings_tawaran_kursus`.`id_intake`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul`.`id_kursus`) and (`ref_modul`.`id_modul` = `markah_modul`.`id_modul`)))) group by `settings_tawaran_kursus`.`id_kursus`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`ref_modul`.`kod_modul`,`ref_modul`.`nama_modul`,`ref_modul`.`jam_kredit`,`ref_modul`.`id_modul`,`settings_tawaran_kursus`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p1_screen4_detail`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p1_screen4_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_mykad` AS `no_pelatih`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`nama_intake` AS `nama_intake`,`markah_modul_2`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul_2`.`gcpa` AS `gcpa`,(select `t1`.`tahap_keterampilan` from `ref_keterampilan` `t1` where (`t1`.`poin_keterampilan` = (select max(`t0`.`poin_keterampilan`) from `ref_keterampilan` `t0` where (`t0`.`poin_keterampilan` <= `markah_modul_2`.`gcpa`))) limit 1) AS `tahap_keterampilan`,`markah_modul_2`.`status_isi_markah` AS `status_isi_markah`,`markah_modul_2`.`kokurikulum` AS `kokurikulum`,`markah_modul_2`.`literasi_komputer` AS `literasi_komputer`,`markah_modul_2`.`keusahawanan` AS `keusahawanan`,`markah_modul_2`.`puji` AS `puji`,`markah_modul_2`.`kehadiran` AS `kehadiran`,`markah_modul_2`.`latihan_industri` AS `latihan_industri`,(case when (`markah_modul_2`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul_2`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul_2`.`status_isi_markah` = 2) then 'Hantar Ke Pengurus' when (`markah_modul_2`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran`,`settings_tawaran_kursus`.`id` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`markah_modul_2`.`id` AS `id_markah_modul_2`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan` from (((((((`permohonan_butir_peribadi` left join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) left join `pelatih` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) left join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) left join `ref_giatmara` on((`ref_giatmara`.`id` = `settings_tawaran_kursus`.`id_giatmara`))) left join `ref_kursus` on((`ref_kursus`.`id` = `settings_tawaran_kursus`.`id_kursus`))) left join `ref_intake` on((`ref_intake`.`id` = `settings_tawaran_kursus`.`id_intake`))) left join `markah_modul_2` on(((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul_2`.`id_kursus`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p1_screen4_header`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_header`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p1_screen4_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,count(`pelatih`.`id_pelatih`) AS `jumlah_pelatih`,sum((case when (`markah_modul_2`.`status_isi_markah` = 0) then 1 else 0 end)) AS `belum_isi`,sum((case when (`markah_modul_2`.`status_isi_markah` = 1) then 1 else 0 end)) AS `telah_disimpan`,sum((case when (`markah_modul_2`.`status_isi_markah` = 2) then 1 else 0 end)) AS `hantar_ke_pengurus`,sum((case when (`markah_modul_2`.`status_isi_markah` = 3) then 1 else 0 end)) AS `dikembalikan`,sum((case when (`markah_modul_2`.`status_isi_markah` = 4) then 1 else 0 end)) AS `hantar_ke_pgn`,sum((case when (`markah_modul_2`.`status_isi_markah` = 5) then 1 else 0 end)) AS `dikembalikan_oleh_pgn`,sum((case when (`markah_modul_2`.`status_isi_markah` = 6) then 1 else 0 end)) AS `hantar_ke_ppkl`,`settings_tawaran_kursus`.`id` AS `id_kursus`,`ref_modul`.`id_modul` AS `id_modul`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_kursus`.`id` AS `id_ref_kursus` from ((((`settings_tawaran_kursus` join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) left join `markah_modul_2` on(((`markah_modul_2`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul_2`.`id_kursus`)))) group by `settings_tawaran_kursus`.`id`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`ref_modul`.`kod_modul`,`ref_modul`.`nama_modul`,`ref_modul`.`jam_kredit`,`ref_modul`.`id_modul`,`ref_kursus`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p2_screen6`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p2_screen6` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,sum((case when (`markah_modul`.`status_isi_markah` = 0) then 1 else 0 end)) AS `tp_belum_diisi`,sum((case when (`markah_modul`.`status_isi_markah` = 1) then 1 else 0 end)) AS `tp_disimpan`,sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)) AS `skrin_pengurus`,sum((case when (`markah_modul`.`status_isi_markah` = 4) then 1 else 0 end)) AS `skrin_png`,sum((case when (`markah_modul`.`status_isi_markah` = 6) then 1 else 0 end)) AS `skrin_ppkl`,sum((case when (`markah_modul`.`status_isi_markah` >= 2) then 1 else 0 end)) AS `jumlah_modul_hantar`,`kurikulum_sijil`.`dicetak_oleh` AS `dicetak_oleh`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_kursus`.`id` AS `id_ref_kursus`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id` AS `id_set`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_intake`.`nama_intake` AS `sesi`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`markah_modul_status`.`pengurus` AS `pengurus`,`markah_modul_status`.`pengurus_sah` AS `pengurus_sah`,`markah_modul_status`.`pgn_sah` AS `pengurus_pgn`,`markah_modul_status`.`ppkl_sah` AS `pengurus_ppkl` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`ref_giatmara`.`id` = `settings_tawaran_kursus`.`id_giatmara`))) join `ref_negeri` on((`ref_negeri`.`id` = `ref_giatmara`.`id_negeri`))) left join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) left join `kurikulum_sijil` on((`kurikulum_sijil`.`id_pelatih` = `pelatih`.`id_pelatih`))) left join `permohonan_kursus` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) left join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`id` = `permohonan_kursus`.`id_permohonan`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`ref_intake`.`id` = `settings_tawaran_kursus`.`id_intake`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul`.`id_kursus`)))) left join `markah_modul_status` on((`markah_modul_status`.`id_pelatih` = `pelatih`.`id_pelatih`))) group by `permohonan_butir_peribadi`.`nama_penuh`,`permohonan_butir_peribadi`.`no_mykad`,`pelatih`.`no_pelatih`,`settings_tawaran_kursus`.`id_kursus`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`settings_tawaran_kursus`.`id`,`ref_negeri`.`nama_negeri`,`ref_giatmara`.`nama_giatmara`,`ref_giatmara`.`id_negeri`,`kurikulum_sijil`.`dicetak_oleh`,`pelatih`.`jenis_pelatih`,`markah_modul_status`.`pengurus`,`markah_modul_status`.`pengurus_sah`,`ref_kursus`.`id`,`markah_modul_status`.`ppkl_sah`,`markah_modul_status`.`pgn_sah` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p2_screen7_a`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen7_a`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p2_screen7_a` AS select concat(`ref_modul`.`kod_modul`,' ',`ref_modul`.`nama_modul`) AS `nama_modul`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`id_modul` AS `id_modul`,`markah_modul`.`pb_teori` AS `pb_teori`,`markah_modul`.`pb_amali` AS `pb_amali`,`markah_modul`.`pam_teori` AS `pam_teori`,`markah_modul`.`pam_amali` AS `pam_amali`,`markah_modul`.`markah` AS `markah`,`markah_modul`.`status_isi_markah` AS `status_isi_markah`,`markah_modul`.`catatan_pengurus` AS `catatan_pengurus`,`markah_modul`.`catatan_pgn` AS `catatan_pgn`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`ref_status_markah`.`desc_status` AS `desc_status` from ((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`markah_modul`.`id_kursus` = `pelatih`.`id_kursus`) and (`ref_modul`.`id_modul` = `markah_modul`.`id_modul`)))) left join `ref_status_markah` on((`ref_status_markah`.`kod_status` = `markah_modul`.`status_isi_markah`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p2_screen7_b`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p2_screen7_b`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p2_screen7_b` AS select `ref_intake`.`nama_intake` AS `sesi`,`ref_intake`.`id` AS `id_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`markah_modul_2`.`status_isi_markah` AS `status_isi_markah`,`markah_modul_2`.`gcpa` AS `gcpa`,(select `t1`.`tahap_keterampilan` from `ref_keterampilan` `t1` where (`t1`.`poin_keterampilan` = (select max(`t0`.`poin_keterampilan`) from `ref_keterampilan` `t0` where (`t0`.`poin_keterampilan` <= `markah_modul_2`.`gcpa`))) limit 1) AS `tahap_keterampilan`,`markah_modul_2`.`kehadiran` AS `kehadiran`,`markah_modul_2`.`kokurikulum` AS `kokurikulum`,`markah_modul_2`.`literasi_komputer` AS `literasi_komputer`,`markah_modul_2`.`keusahawanan` AS `keusahawanan`,`markah_modul_2`.`puji` AS `puji`,`markah_modul_2`.`latihan_industri` AS `latihan_industri`,'' AS `anugerah_sijil`,`markah_modul_2`.`catatan_pengurus` AS `catatan_pengurus`,`markah_modul_2`.`catatan_pgn` AS `catatan_pgn`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`ref_status_markah`.`desc_status` AS `desc_status` from ((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `markah_modul_2` on(((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul_2`.`id_kursus`)))) left join `ref_status_markah` on((`ref_status_markah`.`kod_status` = `markah_modul_2`.`status_isi_markah`))) join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`ref_intake`.`id` = `settings_tawaran_kursus`.`id_intake`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p3_screen4_detail`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p3_screen4_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_mykad` AS `no_pelatih`,`markah_modul`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul`.`pb_teori` AS `pb_teori`,`markah_modul`.`pb_amali` AS `pb_amali`,`markah_modul`.`pam_teori` AS `pam_teori`,`markah_modul`.`pam_amali` AS `pam_amali`,`markah_modul`.`markah` AS `markah`,`ref_keterampilan`.`gred_keterampilan` AS `gred_keterampilan`,`ref_keterampilan`.`gredpoin_keterampilan` AS `gredpoin_keterampilan`,`ref_keterampilan`.`poin_keterampilan` AS `poin_keterampilan`,`ref_keterampilan`.`tahap_keterampilan` AS `tahap_keterampilan`,(case when (`markah_modul`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul`.`status_isi_markah` = 2) then 'Hantar ke Pengurus' when (`markah_modul`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran` from (((`permohonan_butir_peribadi` left join `pelatih` on((`permohonan_butir_peribadi`.`id` = `pelatih`.`id_permohonan`))) left join `markah_modul` on((`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`))) left join `ref_keterampilan` on((`markah_modul`.`markah` between `ref_keterampilan`.`markah_min` and `ref_keterampilan`.`markah_max`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p3_screen4_header`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_header`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p3_screen4_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`ref_modul`.`id_kursus` AS `id_kursus`,`ref_modul`.`id_modul` AS `id_modul` from (((`ref_modul` join `ref_kursus` on((`ref_modul`.`id_kursus` = `ref_kursus`.`id`))) left join `pelatih` on((`ref_modul`.`id_kursus` = `pelatih`.`id_kursus`))) left join `markah_modul` on((`ref_modul`.`id_modul` = `markah_modul`.`id_modul`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p3_screen6`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p3_screen6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p3_screen6` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`markah_modul_2`.`gcpa` AS `gcpa`,`markah_modul_2`.`kehadiran` AS `kehadiran`,concat(sum((case when (`markah_modul`.`status_isi_markah` = 4) then 1 else 0 end)),'/',count(`markah_modul`.`id`)) AS `jumlah_modul_dihantar`,(sum((case when (`markah_modul`.`status_isi_markah` = 4) then 1 else 0 end)) = count(`markah_modul`.`id`)) AS `bahagian_a`,(`markah_modul_2`.`status_isi_markah` = 4) AS `bahagian_b`,`markah_modul_2`.`status_isi_markah` AS `status_isi_markah`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_kursus` AS `id_kursus`,`markah_modul_2`.`id` AS `id_markah_modul2`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`markah_modul_status`.`id` AS `id_pengurus_sah`,`markah_modul_status`.`pengurus_sah` AS `pengurus_sah`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) left join `markah_modul_status` on((`pelatih`.`id_pelatih` = `markah_modul_status`.`id_pelatih`))) join `settings_tawaran_kursus` on(((`settings_tawaran_kursus`.`id` = `pelatih`.`id_kursus`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`ref_kursus`.`id` = `settings_tawaran_kursus`.`id_kursus`))) left join `markah_modul_2` on(((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul_2`.`id_kursus`)))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`)))) group by `ref_kursus`.`nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh`,`permohonan_butir_peribadi`.`no_mykad`,`pelatih`.`no_pelatih`,`markah_modul_2`.`gcpa`,`markah_modul_2`.`kehadiran`,`pelatih`.`id_kursus`,`markah_modul_2`.`status_isi_markah`,`permohonan_butir_peribadi`.`id`,`pelatih`.`id_permohonan`,`pelatih`.`id_pelatih`,`pelatih`.`id_kursus`,`markah_modul_2`.`id`,`settings_tawaran_kursus`.`id_kursus`,`markah_modul_status`.`pengurus_sah`,`markah_modul_status`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p4_screen6`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p4_screen6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p4_screen6` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`markah_modul_2`.`gcpa` AS `gcpa`,`markah_modul_2`.`kehadiran` AS `kehadiran`,concat(sum((case when (`markah_modul`.`status_isi_markah` = 6) then 1 else 0 end)),'/',count(`markah_modul`.`id`)) AS `jumlah_modul_dihantar`,(sum((case when (`markah_modul`.`status_isi_markah` = 6) then 1 else 0 end)) = count(`markah_modul`.`id`)) AS `bahagian_a`,(`markah_modul_2`.`status_isi_markah` = 6) AS `bahagian_b`,`markah_modul_2`.`status_isi_markah` AS `status_isi_markah`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_kursus` AS `id_kursus`,`markah_modul_2`.`id` AS `id_markah_modul2`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`markah_modul_status`.`id` AS `id_pengurus_sah`,`markah_modul_status`.`pengurus_sah` AS `pengurus_sah`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) left join `markah_modul_status` on((`pelatih`.`id_pelatih` = `markah_modul_status`.`id_pelatih`))) join `settings_tawaran_kursus` on(((`settings_tawaran_kursus`.`id` = `pelatih`.`id_kursus`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`ref_kursus`.`id` = `settings_tawaran_kursus`.`id_kursus`))) left join `markah_modul_2` on(((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul_2`.`id_kursus`)))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`)))) group by `ref_kursus`.`nama_kursus`,`permohonan_butir_peribadi`.`nama_penuh`,`permohonan_butir_peribadi`.`no_mykad`,`pelatih`.`no_pelatih`,`markah_modul_2`.`gcpa`,`markah_modul_2`.`kehadiran`,`pelatih`.`id_kursus`,`markah_modul_2`.`status_isi_markah`,`permohonan_butir_peribadi`.`id`,`pelatih`.`id_permohonan`,`pelatih`.`id_pelatih`,`pelatih`.`id_kursus`,`markah_modul_2`.`id`,`settings_tawaran_kursus`.`id_kursus`,`markah_modul_status`.`pengurus_sah`,`markah_modul_status`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p5_screen1`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p5_screen1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p5_screen1` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`ref_intake`.`nama_intake` AS `nama_intake`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_modul`.`nama_modul` AS `nama_modul`,`markah_modul`.`markah` AS `markah`,`markah_modul_2`.`gcpa` AS `gcpa`,(case when (`permohonan_kursus_lpp09`.`kategori_program` = 'LL') then `kurikulum_sijil`.`kemahiran_no_sijil` when (`permohonan_kursus_lpp09`.`kategori_program` = 'RN') then `kurikulum_sijil`.`professional_no_sijil` when (`permohonan_kursus_lpp09`.`kategori_program` = 'PT') then `kurikulum_sijil`.`eksekutif_no_sijil` when (`permohonan_kursus_lpp09`.`kategori_program` = 'PK') then `kurikulum_sijil`.`kemahiranlanjutan_no_sijil` else NULL end) AS `no_sijil`,`kurikulum_sijil`.`dicetak_oleh` AS `dicetak_oleh`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`pelatih`.`id_giatmara` AS `id_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`settings_tawaran_kursus`.`id_intake` AS `id_intake` from ((((((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`markah_modul`.`id_kursus` = `pelatih`.`id_kursus`) and (`markah_modul`.`id_modul` = `ref_modul`.`id_modul`)))) left join `markah_modul_2` on(((`markah_modul_2`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`markah_modul_2`.`id_kursus` = `pelatih`.`id_kursus`)))) left join `permohonan_kursus_lpp09` on(((`permohonan_kursus_lpp09`.`id_permohonan` = `pelatih`.`id_permohonan`) and (`permohonan_kursus_lpp09`.`id_settings_tawaran_kursus` = `pelatih`.`id_kursus`) and (`permohonan_kursus_lpp09`.`id_kluster` = `ref_kursus`.`id_kluster`)))) left join `kurikulum_sijil` on((`kurikulum_sijil`.`id_pelatih` = `pelatih`.`id_pelatih`))) join `ref_giatmara` on(((`pelatih`.`id_giatmara` = `ref_giatmara`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`)))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kurikulum_p6_screen1`
--

/*!50001 DROP VIEW IF EXISTS `v_kurikulum_p6_screen1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kurikulum_p6_screen1` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,sum((case when (`markah_modul`.`status_isi_markah` = 0) then 1 else 0 end)) AS `tp_belum_diisi`,sum((case when (`markah_modul`.`status_isi_markah` = 1) then 1 else 0 end)) AS `tp_disimpan`,sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)) AS `skrin_pengurus`,sum((case when (`markah_modul`.`status_isi_markah` = 4) then 1 else 0 end)) AS `skrin_png`,sum((case when (`markah_modul`.`status_isi_markah` = 6) then 1 else 0 end)) AS `skrin_ppkl`,sum((case when (`markah_modul`.`status_isi_markah` >= 2) then 1 else 0 end)) AS `jumlah_dihantar`,count(`markah_modul`.`id`) AS `jumlah_modul`,(select count(`a`.`id`) from `markah_modul_2` `a` where ((`a`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`a`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`a`.`status_isi_markah` >= 2))) AS `jumlah_dihantar2`,`kurikulum_sijil`.`dicetak_oleh` AS `dicetak_oleh`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_kursus`.`id` AS `id_ref_kursus`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id` AS `id_set`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_intake`.`nama_intake` AS `sesi`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`markah_modul_status`.`pengurus` AS `pengurus`,`markah_modul_status`.`pengurus_sah` AS `pengurus_sah`,`markah_modul_status`.`pgn_sah` AS `pengurus_pgn`,`markah_modul_status`.`ppkl_sah` AS `pengurus_ppkl`,`pelatih`.`id_pelatih` AS `id_pelatih` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`ref_giatmara`.`id` = `settings_tawaran_kursus`.`id_giatmara`))) join `ref_negeri` on((`ref_negeri`.`id` = `ref_giatmara`.`id_negeri`))) left join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) left join `kurikulum_sijil` on((`kurikulum_sijil`.`id_pelatih` = `pelatih`.`id_pelatih`))) left join `permohonan_kursus` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) left join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`id` = `permohonan_kursus`.`id_permohonan`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`ref_intake`.`id` = `settings_tawaran_kursus`.`id_intake`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul`.`id_kursus`)))) left join `markah_modul_status` on((`markah_modul_status`.`id_pelatih` = `pelatih`.`id_pelatih`))) group by `permohonan_butir_peribadi`.`nama_penuh`,`permohonan_butir_peribadi`.`no_mykad`,`pelatih`.`no_pelatih`,`settings_tawaran_kursus`.`id_kursus`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`settings_tawaran_kursus`.`id`,`ref_negeri`.`nama_negeri`,`ref_giatmara`.`nama_giatmara`,`ref_giatmara`.`id_negeri`,`kurikulum_sijil`.`dicetak_oleh`,`pelatih`.`jenis_pelatih`,`markah_modul_status`.`pengurus`,`markah_modul_status`.`pengurus_sah`,`ref_kursus`.`id`,`markah_modul_status`.`ppkl_sah`,`markah_modul_status`.`pgn_sah`,`pelatih`.`id_pelatih` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kursus_pilihan`
--

/*!50001 DROP VIEW IF EXISTS `v_kursus_pilihan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kursus_pilihan` AS select `ref_kluster`.`nama_kluster` AS `kluster1`,`ref_kursus`.`nama_kursus` AS `kursus1`,`ref_negeri`.`nama_negeri` AS `negeri1`,`ref_giatmara`.`nama_giatmara` AS `giatmara1`,`t9`.`nama_kluster` AS `kluster2`,`t1`.`nama_kursus` AS `kursus2`,`t3`.`nama_negeri` AS `negeri2`,`t2`.`nama_giatmara` AS `giatmara2`,`t6`.`nama_kluster` AS `kluster3`,`t5`.`nama_kursus` AS `kursus3`,`t8`.`nama_negeri` AS `negeri3`,`t7`.`nama_giatmara` AS `giatmara3`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_peribadi`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`permohonan_kursus`.`kursus1` AS `id_kursus1`,`permohonan_kursus`.`kursus2` AS `id_kursus2`,`permohonan_kursus`.`kursus3` AS `id_kursus3` from ((((((((((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `settings_tawaran_kursus` on((`permohonan_kursus`.`kursus1` = `settings_tawaran_kursus`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_kluster` on((`ref_kursus`.`id_kluster` = `ref_kluster`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `settings_tawaran_kursus` `t0` on((`permohonan_kursus`.`kursus2` = `t0`.`id`))) join `ref_kursus` `t1` on((`t0`.`id_kursus` = `t1`.`id`))) join `ref_kluster` `t9` on((`t1`.`id_kluster` = `t9`.`id`))) join `ref_giatmara` `t2` on((`t0`.`id_giatmara` = `t2`.`id`))) join `ref_negeri` `t3` on((`t2`.`id_negeri` = `t3`.`id`))) join `settings_tawaran_kursus` `t4` on((`permohonan_kursus`.`kursus3` = `t4`.`id`))) join `ref_kursus` `t5` on((`t4`.`id_kursus` = `t5`.`id`))) join `ref_kluster` `t6` on((`t5`.`id_kluster` = `t6`.`id`))) join `ref_giatmara` `t7` on((`t4`.`id_giatmara` = `t7`.`id`))) join `ref_negeri` `t8` on((`t7`.`id_negeri` = `t8`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_kursus_terdahulu`
--

/*!50001 DROP VIEW IF EXISTS `v_kursus_terdahulu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kursus_terdahulu` AS select `pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`id_permohonan` AS `id_permohonan`,`pelatih`.`no_pelatih` AS `no_pelatih`,`pelatih`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`pelatih`.`id_kew_kod_kombinasi` AS `id_kew_kod_kombinasi`,`ref_kluster`.`id` AS `id_kluster`,`ref_kluster`.`nama_kluster` AS `nama_kluster`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_negeri`.`id` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_intake`.`id` AS `id_intake`,`ref_intake`.`nama_intake` AS `nama_intake`,`pelatih`.`tarikh_mula_kursus` AS `tarikh_mula_kursus`,`pelatih`.`tarikh_tamat_kursus` AS `tarikh_tamat_kursus`,`ref_status_pelatih`.`status_desc` AS `status_desc`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`ref_kursus`.`id` AS `id_ref_kursus`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`permohonan_butir_peribadi`.`tarikh_lahir` AS `tarikh_lahir`,`permohonan_butir_peribadi`.`jantina` AS `jantina`,`permohonan_butir_peribadi`.`umur` AS `umur`,`permohonan_butir_peribadi`.`alamat` AS `alamat`,`permohonan_butir_peribadi`.`poskod` AS `poskod`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `kewarganegaraan`,`permohonan_butir_peribadi`.`taraf_perkahwinan` AS `taraf_perkahwinan`,`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`pelatih`.`cara_bayaran` AS `cara_bayaran`,`pelatih`.`no_akaun` AS `no_akaun`,`pelatih`.`nama_bank` AS `nama_bank`,`lpp_10`.`id` AS `id_lpp10`,`lpp_10`.`giatmara_baru` AS `giatmara_baru_lpp10`,`lpp_10`.`giatmara_asal` AS `giatmara_asal_lpp10`,`lpp_10`.`kursus_baru` AS `kursus_baru_lpp10`,`lpp_10`.`kursus_asal` AS `kursus_asal_lpp10`,`lpp_10`.`jenis_pertukaran` AS `jenis_pertukaran_lpp10`,`lpp_10`.`dihantar_oleh` AS `dihantar_oleh_lpp10`,`lpp_10`.`dihantar_pada` AS `dihantar_pada_lpp10`,`lpp_10`.`status_jana` AS `status_jana_lpp10`,`lpp_10`.`dijana_oleh` AS `dijana_oleh_lpp10`,`lpp_10`.`dijana_pada` AS `dijana_pada_lpp10`,`t0`.`id_negeri` AS `id_negeri_lpp10` from (((((((((((`pelatih` join `settings_tawaran_kursus` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_kluster` on((`ref_kursus`.`id_kluster` = `ref_kluster`.`id`))) join `ref_giatmara` on((`pelatih`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_status_pelatih` on((`pelatih`.`status_pelatih` = `ref_status_pelatih`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`id` = `permohonan_kursus`.`id_permohonan`))) left join `lpp_10` on((`lpp_10`.`id_pelatih` = `pelatih`.`id_pelatih`))) left join `ref_giatmara` `t0` on((`lpp_10`.`giatmara_baru` = `t0`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_lpp7a`
--

/*!50001 DROP VIEW IF EXISTS `v_lpp7a`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_lpp7a` AS select `lpp_7a`.`id_pelatih` AS `id_pelatih`,`lpp_7a`.`id_kew_potongan` AS `id_kew_potongan`,`kew_potongan`.`name` AS `name`,`kew_potongan`.`value_per_unit` AS `value_per_unit`,`lpp_7a`.`tarikh_mula` AS `tarikh_mula`,`lpp_7a`.`tarikh_tamat` AS `tarikh_tamat`,`lpp_7a`.`dihantar_oleh` AS `dihantar_oleh`,`lpp_7a`.`dihantar_pada` AS `dihantar_pada`,`lpp_7a`.`status_jana` AS `status_jana`,`lpp_7a`.`id` AS `id`,`lpp_7a`.`dijana_oleh` AS `dijana_oleh`,`lpp_7a`.`dijana_pada` AS `dijana_pada` from (`lpp_7a` join `kew_potongan` on((`lpp_7a`.`id_kew_potongan` = `kew_potongan`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_maklumat_penjaga`
--

/*!50001 DROP VIEW IF EXISTS `v_maklumat_penjaga`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_maklumat_penjaga` AS select (case when (`permohonan_penjaga`.`maklumat` = 1) then 'Ibu bapa' when (`permohonan_penjaga`.`maklumat` = 2) then 'Penjaga/Waris' end) AS `maklumat`,`permohonan_penjaga`.`b_nama_penuh` AS `nama_penuh_bapak`,`permohonan_penjaga`.`b_jenis_pengenalan` AS `jenis_pengenalan_bapak`,`permohonan_penjaga`.`b_mykad` AS `mykad_bapak`,`ref_kewarganegaraan`.`id` AS `id_kewarganegaraan_bapak`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan_bapak`,`ref_kategori_penjaga`.`id` AS `id_kategori_penjaga_bapak`,`ref_kategori_penjaga`.`kategori_penjaga` AS `kategori_penjaga_bapak`,`permohonan_penjaga`.`b_no_tel` AS `no_tel_bapak`,`permohonan_penjaga`.`b_no_hp` AS `no_hp_bapak`,`ref_agama`.`agama` AS `agama_bapak`,`ref_etnik`.`etnik` AS `etnik_bapak`,`ref_bangsa`.`bangsa` AS `bangsa_bapak`,`permohonan_penjaga`.`b_alamat` AS `alamat_bapak`,`permohonan_penjaga`.`b_poskod` AS `poskod_bapak`,`t14`.`bandar` AS `bandar_bapak`,`t15`.`id` AS `id_negeri_bapak`,`t15`.`nama_negeri` AS `nama_negeri_bapak`,`permohonan_penjaga`.`b_pekerjaan` AS `pekerjaan_bapak`,`ref_pendapatan`.`id` AS `id_pendapatan_bapak`,`ref_pendapatan`.`pendapatan` AS `pendapatan_bapak`,`permohonan_penjaga`.`b_majikan` AS `majikan_bapak`,`permohonan_penjaga`.`b_no_tel_pejabat` AS `no_tel_pejabat_bapak`,`permohonan_penjaga`.`b_samb` AS `samb_bapak`,`permohonan_penjaga`.`b_alamat_pejabat` AS `amalat_pejabat_bapak`,`permohonan_penjaga`.`c_nama_penuh` AS `nama_penuh_ibu`,`permohonan_penjaga`.`c_jenis_pengenalan` AS `jenis_pengenalan_ibu`,`permohonan_penjaga`.`c_mykad` AS `mykad_ibu`,`t0`.`id` AS `id_kewarganegaraan_ibu`,`t0`.`kewarganegaraan` AS `kewarganegaraan_ibu`,`t1`.`id` AS `id_kategori_penjaga_ibu`,`t1`.`kategori_penjaga` AS `kategori_penjaga_ibu`,`permohonan_penjaga`.`c_no_tel` AS `no_tel_ibu`,`permohonan_penjaga`.`c_no_hp` AS `no_hp_ibu`,`t2`.`agama` AS `agama_ibu`,`t3`.`etnik` AS `etnik_ibu`,`t4`.`bangsa` AS `bangsa_ibu`,`permohonan_penjaga`.`c_alamat` AS `alamat_ibu`,`permohonan_penjaga`.`c_poskod` AS `poskod_ibu`,`t12`.`bandar` AS `bandar_ibu`,`t13`.`id` AS `id_negeri_ibu`,`t13`.`nama_negeri` AS `nama_negeri_ibu`,`permohonan_penjaga`.`c_pekerjaan` AS `pekerjaan_ibu`,`t5`.`id` AS `id_pendapatan_ibu`,`t5`.`pendapatan` AS `pendapatan_ibu`,`permohonan_penjaga`.`c_majikan` AS `majikan_ibu`,`permohonan_penjaga`.`c_no_tel_pejabat` AS `no_tel_pejabat_ibu`,`permohonan_penjaga`.`c_samb` AS `samb_ibu`,`permohonan_penjaga`.`c_alamat_pejabat` AS `alamat_pejabat_ibu`,`permohonan_penjaga`.`a_nama_penuh` AS `nama_penuh_waris`,`ref_hubungan`.`id` AS `id_hubungan_waris`,`ref_hubungan`.`hubungan` AS `hubungan_waris`,`permohonan_penjaga`.`a_jenis_pengenalan` AS `jenis_pengenalan_waris`,`permohonan_penjaga`.`a_mykad` AS `mykad_waris`,`t6`.`id` AS `id_kewarganegaraan_waris`,`t6`.`kewarganegaraan` AS `kewarganegaraan_waris`,`t7`.`id` AS `id_kategori_penjaga_waris`,`t7`.`kategori_penjaga` AS `kategori_penjaga_waris`,`permohonan_penjaga`.`a_no_tel` AS `no_tel_waris`,`permohonan_penjaga`.`a_no_hp` AS `no_hp_waris`,`t8`.`id` AS `id_agama_waris`,`t8`.`agama` AS `agama_waris`,`t9`.`id` AS `id_etnik_waris`,`t9`.`etnik` AS `etnik_waris`,`t10`.`id` AS `id_bangsa_waris`,`t10`.`bangsa` AS `bangsa_waris`,`permohonan_penjaga`.`a_alamat` AS `alamat_waris`,`permohonan_penjaga`.`a_poskod` AS `poskod_waris`,`t16`.`bandar` AS `bandar_waris`,`t17`.`id` AS `id_negeri_waris`,`t17`.`nama_negeri` AS `nama_negeri_waris`,`permohonan_penjaga`.`a_pekerjaan` AS `pekerjaan_waris`,`t11`.`id` AS `id_pendapatan_waris`,`t11`.`pendapatan` AS `pendapatan_waris`,`permohonan_penjaga`.`a_majikan` AS `majikan_waris`,`permohonan_penjaga`.`a_no_tel_pejabat` AS `no_tel_pejabat_waris`,`permohonan_penjaga`.`a_samb` AS `samb_waris`,`permohonan_penjaga`.`a_alamat_pejabat` AS `alamat_pejabat_waris`,`permohonan_penjaga`.`maklumat` AS `jenis_maklumat`,`permohonan_penjaga`.`id_permohonan` AS `id_permohonan_peribadi`,`permohonan_penjaga`.`id` AS `id_penjaga` from (((((((((((((((((((((((((`permohonan_penjaga` left join `ref_kewarganegaraan` on((`permohonan_penjaga`.`b_kewarganegaraan` = `ref_kewarganegaraan`.`id`))) left join `ref_kategori_penjaga` on((`permohonan_penjaga`.`b_kategori_penjaga` = `ref_kategori_penjaga`.`id`))) left join `ref_agama` on((`permohonan_penjaga`.`b_agama` = `ref_agama`.`id`))) left join `ref_etnik` on((`permohonan_penjaga`.`b_etnik` = `ref_etnik`.`id`))) left join `ref_bangsa` on((`permohonan_penjaga`.`a_bangsa` = `ref_bangsa`.`id`))) left join `ref_pendapatan` on((`permohonan_penjaga`.`b_pendapatan` = `ref_pendapatan`.`id`))) left join `ref_kewarganegaraan` `t0` on((`permohonan_penjaga`.`c_kewarganegaraan` = `t0`.`id`))) left join `ref_kategori_penjaga` `t1` on((`permohonan_penjaga`.`c_kategori_penjaga` = `t1`.`id`))) left join `ref_agama` `t2` on((`permohonan_penjaga`.`c_agama` = `t2`.`id`))) left join `ref_etnik` `t3` on((`permohonan_penjaga`.`c_etnik` = `t3`.`id`))) left join `ref_bangsa` `t4` on((`permohonan_penjaga`.`c_bangsa` = `t4`.`id`))) left join `ref_pendapatan` `t5` on((`permohonan_penjaga`.`c_pendapatan` = `t5`.`id`))) left join `ref_hubungan` on((`permohonan_penjaga`.`a_hubungan` = `ref_hubungan`.`id`))) left join `ref_kewarganegaraan` `t6` on((`permohonan_penjaga`.`a_kewarganegaraan` = `t6`.`id`))) left join `ref_kategori_penjaga` `t7` on((`t7`.`id` = `permohonan_penjaga`.`a_kategori_penjaga`))) left join `ref_agama` `t8` on((`t8`.`id` = `permohonan_penjaga`.`a_agama`))) left join `ref_etnik` `t9` on((`t9`.`id` = `permohonan_penjaga`.`a_etnik`))) left join `ref_bangsa` `t10` on((`t10`.`id` = `permohonan_penjaga`.`a_bangsa`))) left join `ref_pendapatan` `t11` on((`t11`.`id` = `permohonan_penjaga`.`a_pendapatan`))) left join `ref_poskod_bandar_negeri` `t12` on((`permohonan_penjaga`.`c_poskod` = `t12`.`poskod`))) left join `ref_negeri` `t13` on((`t13`.`id` = `t12`.`negeri`))) left join `ref_poskod_bandar_negeri` `t14` on((`permohonan_penjaga`.`b_poskod` = `t14`.`poskod`))) left join `ref_negeri` `t15` on((`t15`.`id` = `t14`.`negeri`))) left join `ref_poskod_bandar_negeri` `t16` on((`permohonan_penjaga`.`a_poskod` = `t16`.`poskod`))) left join `ref_negeri` `t17` on((`t17`.`id` = `t16`.`negeri`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatih_potongan`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatih_potongan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatih_potongan` AS select `pelatih_potongan`.`id_pelatih` AS `id_pelatih`,`pelatih_potongan`.`id_kew_potongan` AS `id_kew_potongan`,`kew_potongan`.`name` AS `name`,`kew_potongan`.`value_per_unit` AS `value_per_unit`,`pelatih_potongan`.`tarikh_ditambah` AS `tarikh_ditambah` from (`pelatih_potongan` join `kew_potongan` on((`pelatih_potongan`.`id_kew_potongan` = `kew_potongan`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p4`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p4`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p4` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `ket_keputusan_temuduga`,`temuduga_tetapan`.`keputusan_temuduga` AS `keputusan_temuduga`,`t2`.`nama_intake` AS `nama_tawaran_sesi`,`temuduga_tetapan`.`tawaran_sesi` AS `tawaran_sesi`,`t1`.`nama_kursus` AS `nama_tawaran_kursus`,`temuduga_tetapan`.`tawaran_kursus` AS `tawaran_kursus`,`temuduga_tetapan`.`tawaran_elaun` AS `kelayakan_elaun`,`temuduga_tetapan`.`tawaran_status` AS `tawaran_status`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `tawaran_tarikh_lapordiri`,`temuduga_tetapan`.`tarikh_cetak` AS `tarikh_cetak`,`temuduga_tetapan`.`tawaran_tarikh_cetak` AS `tawaran_tarikh_cetak`,`temuduga_tetapan`.`tawaran_masa_lapordiri` AS `tawaran_masa_lapordiri`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`ref_intake`.`kod_intake` AS `kod_intake`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`ref_kursus`.`id_kluster` AS `id_kluster` from (((((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) left join `settings_tawaran_kursus` `t0` on((`t0`.`id` = `temuduga_tetapan`.`tawaran_kursus`))) left join `ref_kursus` `t1` on((`t1`.`id` = `t0`.`id_kursus`))) left join `ref_intake` `t2` on((`t2`.`id` = `temuduga_tetapan`.`tawaran_sesi`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p5_screen1`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p5_screen1` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `tarikh_tawaran`,`ref_intake`.`nama_intake` AS `sesi`,`temuduga_tetapan`.`tawaran_elaun` AS `kelayakan_elaun`,`temuduga_tetapan`.`tawaran_nama_bank` AS `nama_bank`,`temuduga_tetapan`.`tawaran_no_akaun` AS `no_akaun`,`temuduga_tetapan`.`tawaran_cara_bayaran` AS `cara_bayar`,`temuduga_tetapan`.`pendaftaran_status` AS `tindakan`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`settings_tawaran_kursus`.`id` AS `id_setting_tawaran_kursus`,`temuduga_tetapan`.`tawaran_mula_elaun` AS `tawaran_mula_elaun`,`temuduga_tetapan`.`tawaran_tamat_elaun` AS `tawaran_tamat_elaun`,`temuduga_tetapan`.`id_kew_kod_kombinasi` AS `id_kew_kod_kombinasi` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) where (isnull(`temuduga_tetapan`.`tawaran_status`) or (`temuduga_tetapan`.`tawaran_status` = 0) or (`temuduga_tetapan`.`tawaran_status` = 2)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p5_screen3`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p5_screen3` AS select `v_pelatihan_p5_screen1`.`nama` AS `nama`,`v_pelatihan_p5_screen1`.`no_mykad` AS `no_mykad`,`v_pelatihan_p5_screen1`.`tarikh_tawaran` AS `tarikh_tawaran`,`v_pelatihan_p5_screen1`.`sesi` AS `sesi`,`v_pelatihan_p5_screen1`.`kelayakan_elaun` AS `kelayakan_elaun`,`v_pelatihan_p5_screen1`.`nama_bank` AS `nama_bank`,`v_pelatihan_p5_screen1`.`no_akaun` AS `no_akaun`,`v_pelatihan_p5_screen1`.`cara_bayar` AS `cara_bayar`,`v_pelatihan_p5_screen1`.`tindakan` AS `tindakan`,`v_pelatihan_p5_screen1`.`id_negeri` AS `id_negeri`,`v_pelatihan_p5_screen1`.`nama_negeri` AS `nama_negeri`,`v_pelatihan_p5_screen1`.`id_giatmara` AS `id_giatmara`,`v_pelatihan_p5_screen1`.`nama_giatmara` AS `nama_giatmara`,`v_pelatihan_p5_screen1`.`id_intake` AS `id_intake`,`v_pelatihan_p5_screen1`.`id_kursus` AS `id_kursus`,`v_pelatihan_p5_screen1`.`nama_kursus` AS `nama_kursus`,`v_pelatihan_p5_screen1`.`id_temuduga_tetapan` AS `id_temuduga_tetapan`,`v_pelatihan_p5_screen1`.`id_permohonan_butir_peribadi` AS `id_permohonan_butir_peribadi`,`v_pelatihan_p5_screen1`.`id_permohonan_kursus` AS `id_permohonan_kursus`,`v_pelatihan_p5_screen1`.`id_setting_tawaran_kursus` AS `id_setting_tawaran_kursus` from `v_pelatihan_p5_screen1` where ((`v_pelatihan_p5_screen1`.`tindakan` = 1) or (`v_pelatihan_p5_screen1`.`tindakan` = 3)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p5_screen5`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen5`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p5_screen5` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `tarikh_tawaran`,`ref_intake`.`nama_intake` AS `sesi`,`temuduga_tetapan`.`tawaran_elaun` AS `kelayakan_elaun`,`temuduga_tetapan`.`tawaran_nama_bank` AS `nama_bank`,`temuduga_tetapan`.`tawaran_no_akaun` AS `no_akaun`,`temuduga_tetapan`.`tawaran_cara_bayaran` AS `cara_bayar`,`temuduga_tetapan`.`pendaftaran_status` AS `tindakan`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`settings_tawaran_kursus`.`id` AS `id_setting_tawaran_kursus`,`temuduga_tetapan`.`tawaran_mula_elaun` AS `tawaran_mula_elaun`,`temuduga_tetapan`.`tawaran_tamat_elaun` AS `tawaran_tamat_elaun`,`temuduga_tetapan`.`id_kew_kod_kombinasi` AS `id_kew_kod_kombinasi` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) where ((`temuduga_tetapan`.`pendaftaran_status` = 4) and (`temuduga_tetapan`.`tawaran_status` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p5_screen6`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p5_screen6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p5_screen6` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `tawaran_tarikh_lapordiri`,`ref_intake`.`nama_intake` AS `sesi`,`temuduga_tetapan`.`tawaran_elaun` AS `kelayakan_elaun`,`temuduga_tetapan`.`tawaran_nama_bank` AS `nama_bank`,`temuduga_tetapan`.`tawaran_no_akaun` AS `no_akaun`,`temuduga_tetapan`.`tawaran_cara_bayaran` AS `cara_bayar`,`temuduga_tetapan`.`pendaftaran_status` AS `tindakan`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`settings_tawaran_kursus`.`id` AS `id_setting_tawaran_kursus`,`temuduga_tetapan`.`tawaran_mula_elaun` AS `tawaran_mula_elaun`,`temuduga_tetapan`.`tawaran_tamat_elaun` AS `tawaran_tamat_elaun`,`temuduga_tetapan`.`id_kew_kod_kombinasi` AS `id_kew_kod_kombinasi`,`pelatih`.`no_pelatih` AS `no_pelatih` from ((((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) left join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`pelatih`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`pelatih`.`id_permohonan` = `permohonan_kursus`.`id`)))) where ((`temuduga_tetapan`.`pendaftaran_status` = 4) and (`temuduga_tetapan`.`tawaran_status` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pelatihan_p6`
--

/*!50001 DROP VIEW IF EXISTS `v_pelatihan_p6`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pelatihan_p6` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`jenis_lpp` AS `jenis_pengambilan`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_pelatih` AS `no_pelatih`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `daftar`,`temuduga_tetapan`.`tawaran_mula_elaun` AS `mula`,`temuduga_tetapan`.`tawaran_tamat_elaun` AS `tamat`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `status_temuduga`,`temuduga_tetapan`.`keputusan_temuduga` AS `keputusan_temuduga`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus` from (((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `pelatih` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_permohonan_kursus`
--

/*!50001 DROP VIEW IF EXISTS `v_permohonan_kursus`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_permohonan_kursus` AS select `permohonan_kursus_row`.`id` AS `id`,`permohonan_kursus_row`.`id_permohonan` AS `id_permohonan`,`permohonan_kursus_row`.`kursus` AS `kursus`,`permohonan_kursus_row`.`pilihan` AS `pilihan` from (select `pk`.`id` AS `id`,`pk`.`id_permohonan` AS `id_permohonan`,`pk`.`kursus1` AS `kursus`,'1' AS `pilihan` from `gspel1`.`permohonan_kursus` `pk` union all select `pk`.`id` AS `id`,`pk`.`id_permohonan` AS `id_permohonan`,`pk`.`kursus2` AS `kursus`,'2' AS `pilihan` from `gspel1`.`permohonan_kursus` `pk` union all select `pk`.`id` AS `id`,`pk`.`id_permohonan` AS `id_permohonan`,`pk`.`kursus3` AS `kursus`,'3' AS `pilihan` from `gspel1`.`permohonan_kursus` `pk`) `permohonan_kursus_row` order by `permohonan_kursus_row`.`id_permohonan` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_permohonan_peribadi`
--

/*!50001 DROP VIEW IF EXISTS `v_permohonan_peribadi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_permohonan_peribadi` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`permohonan_butir_peribadi`.`tarikh_lahir` AS `tarikh_lahir`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`permohonan_butir_peribadi`.`umur` AS `umur`,`permohonan_butir_peribadi`.`no_telefon` AS `no_telefon`,`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`permohonan_butir_peribadi`.`alamat` AS `alamat`,`ref_poskod_bandar_negeri`.`poskod` AS `poskod`,`ref_poskod_bandar_negeri`.`bandar` AS `bandar`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`permohonan_butir_peribadi`.`emel` AS `emel`,`ref_bangsa`.`bangsa` AS `bangsa`,`ref_etnik`.`etnik` AS `etnik`,`ref_agama`.`agama` AS `agama`,`ref_taraf_perkahwinan`.`taraf_perkahwinan` AS `taraf_perkahwinan`,`permohonan_butir_peribadi`.`kategori_kelulusan` AS `kategori_kelulusan`,`ref_kelulusan`.`kelulusan` AS `kelulusan`,`permohonan_butir_peribadi`.`matlamat` AS `matlamat`,`ref_kategori_pemohon`.`kategori_pemohon` AS `kategori_pemohon`,`permohonan_butir_peribadi`.`id` AS `id`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`permohonan_butir_peribadi`.`poskod` AS `id_poskod`,`permohonan_butir_peribadi`.`jantina` AS `jantina`,`permohonan_butir_peribadi`.`bangsa` AS `id_bangsa`,`permohonan_butir_peribadi`.`etnik` AS `id_etnik`,`permohonan_butir_peribadi`.`agama` AS `id_agama`,`permohonan_butir_peribadi`.`taraf_perkahwinan` AS `id_taraf_perkawinan`,`permohonan_butir_peribadi`.`kelulusan` AS `id_kelulusan`,`permohonan_butir_peribadi`.`kategori_pemohon` AS `id_kategori_pemohon`,`permohonan_butir_peribadi`.`no_rujukan_permohonan` AS `no_rujukan_permohonan`,`permohonan_butir_peribadi`.`pengesahan` AS `pengesahan`,`permohonan_butir_peribadi`.`pengakuan` AS `pengakuan`,`permohonan_butir_peribadi`.`tarikh_hantar` AS `tarikh_hantar`,`permohonan_butir_peribadi`.`id_admin_user` AS `id_admin_user`,`permohonan_butir_peribadi`.`jenis_lpp` AS `jenis_lpp` from (((((((((`permohonan_butir_peribadi` join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_poskod_bandar_negeri` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `ref_bangsa` on((`permohonan_butir_peribadi`.`bangsa` = `ref_bangsa`.`id`))) join `ref_etnik` on((`permohonan_butir_peribadi`.`etnik` = `ref_etnik`.`id`))) join `ref_agama` on((`permohonan_butir_peribadi`.`agama` = `ref_agama`.`id`))) join `ref_taraf_perkahwinan` on((`permohonan_butir_peribadi`.`taraf_perkahwinan` = `ref_taraf_perkahwinan`.`id`))) join `ref_kelulusan` on(((`permohonan_butir_peribadi`.`kelulusan` = `ref_kelulusan`.`id`) and (`permohonan_butir_peribadi`.`kelulusan` = `ref_kelulusan`.`id`)))) join `ref_kategori_pemohon` on((`permohonan_butir_peribadi`.`kategori_pemohon` = `ref_kategori_pemohon`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_poskod`
--

/*!50001 DROP VIEW IF EXISTS `v_poskod`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_poskod` AS select `ref_poskod_bandar_negeri`.`id` AS `id`,`ref_poskod_bandar_negeri`.`poskod` AS `poskod`,`ref_poskod_bandar_negeri`.`bandar` AS `bandar`,`ref_poskod_bandar_negeri`.`negeri` AS `negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_negeri`.`kod_negeri` AS `kod_negeri`,concat(`ref_poskod_bandar_negeri`.`poskod`,' | ',convert(`ref_negeri`.`nama_negeri` using utf8mb4),' - ',`ref_poskod_bandar_negeri`.`bandar`) AS `poskodfull` from (`ref_poskod_bandar_negeri` join `ref_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_tetapan_temuduga`
--

/*!50001 DROP VIEW IF EXISTS `v_tetapan_temuduga`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tetapan_temuduga` AS select `v_permohonan_kursus`.`id` AS `id_permohonan_kursus`,`v_permohonan_kursus`.`pilihan` AS `pilihan`,`gspel1`.`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`gspel1`.`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`gspel1`.`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`gspel1`.`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`gspel1`.`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`gspel1`.`permohonan_butir_peribadi`.`tarikh_hantar` AS `tarikh_hantar`,date_format(`gspel1`.`permohonan_butir_peribadi`.`tarikh_hantar`,'%d %M %Y') AS `tarikh_mohon`,`gspel1`.`permohonan_butir_peribadi`.`pengakuan` AS `pengakuan`,`gspel1`.`settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`gspel1`.`temuduga_tetapan`.`id_kursus` AS `id_kursus_temudugatetapan`,`gspel1`.`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`gspel1`.`temuduga_tetapan`.`id_giatmara` AS `id_giatmara_temudugatetapan`,`gspel1`.`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`gspel1`.`ref_negeri`.`id` AS `id_negeri`,`gspel1`.`ref_negeri`.`nama_negeri` AS `nama_negeri`,`gspel1`.`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`gspel1`.`ref_kursus`.`nama_kursus` AS `nama_kursus`,`gspel1`.`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`gspel1`.`ref_intake`.`nama_intake` AS `nama_intake`,`gspel1`.`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`gspel1`.`settings_tawaran_kursus`.`status` AS `status_settings_tawaran_kursus` from ((((((((`gspel1`.`v_permohonan_kursus` join `gspel1`.`permohonan_butir_peribadi` on((`gspel1`.`permohonan_butir_peribadi`.`id` = `v_permohonan_kursus`.`id_permohonan`))) join `gspel1`.`ref_kewarganegaraan` on((`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` = `gspel1`.`ref_kewarganegaraan`.`id`))) join `gspel1`.`settings_tawaran_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id` = `v_permohonan_kursus`.`kursus`))) join `gspel1`.`ref_giatmara` on((`gspel1`.`settings_tawaran_kursus`.`id_giatmara` = `gspel1`.`ref_giatmara`.`id`))) join `gspel1`.`ref_negeri` on((`gspel1`.`ref_giatmara`.`id_negeri` = `gspel1`.`ref_negeri`.`id`))) join `gspel1`.`ref_intake` on((`gspel1`.`settings_tawaran_kursus`.`id_intake` = `gspel1`.`ref_intake`.`id`))) join `gspel1`.`ref_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id_kursus` = `gspel1`.`ref_kursus`.`id`))) left join `gspel1`.`temuduga_tetapan` on(((`gspel1`.`temuduga_tetapan`.`id_permohonan` = `v_permohonan_kursus`.`id`) and (`gspel1`.`temuduga_tetapan`.`id_giatmara` = `gspel1`.`settings_tawaran_kursus`.`id_giatmara`) and (`gspel1`.`temuduga_tetapan`.`id_kursus` = `gspel1`.`settings_tawaran_kursus`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_tetapan_temuduga_ori`
--

/*!50001 DROP VIEW IF EXISTS `v_tetapan_temuduga_ori`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`gspeluser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tetapan_temuduga_ori` AS select `gspel1`.`settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`gspel1`.`ref_negeri`.`nama_negeri` AS `nama_negeri`,`gspel1`.`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`gspel1`.`ref_kursus`.`nama_kursus` AS `nama_kursus`,`gspel1`.`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`gspel1`.`ref_intake`.`nama_intake` AS `nama_intake`,`gspel1`.`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`gspel1`.`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`gspel1`.`permohonan_butir_peribadi`.`tarikh_hantar` AS `tarikh_hantar`,`gspel1`.`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`gspel1`.`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`gspel1`.`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`gspel1`.`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`gspel1`.`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`v_permohonan_kursus`.`id` AS `id_permohonan_kursus`,`gspel1`.`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,date_format(`gspel1`.`permohonan_butir_peribadi`.`tarikh_hantar`,'%d %M %Y') AS `tarikh_mohon`,`gspel1`.`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`gspel1`.`permohonan_butir_peribadi`.`pengakuan` AS `pengakuan` from (((((((((`gspel1`.`settings_tawaran_kursus` join `gspel1`.`ref_giatmara` on((`gspel1`.`settings_tawaran_kursus`.`id_giatmara` = `gspel1`.`ref_giatmara`.`id`))) join `gspel1`.`ref_negeri` on((`gspel1`.`ref_giatmara`.`id_negeri` = `gspel1`.`ref_negeri`.`id`))) join `gspel1`.`ref_kursus` on((`gspel1`.`settings_tawaran_kursus`.`id_kursus` = `gspel1`.`ref_kursus`.`id`))) join `gspel1`.`ref_poskod_bandar_negeri` on((`gspel1`.`ref_poskod_bandar_negeri`.`negeri` = `gspel1`.`ref_negeri`.`id`))) join `gspel1`.`permohonan_butir_peribadi` on((`gspel1`.`permohonan_butir_peribadi`.`poskod` = `gspel1`.`ref_poskod_bandar_negeri`.`id`))) join `gspel1`.`ref_kewarganegaraan` on((`gspel1`.`permohonan_butir_peribadi`.`kewarganegaraan` = `gspel1`.`ref_kewarganegaraan`.`id`))) join `gspel1`.`ref_intake` on((`gspel1`.`settings_tawaran_kursus`.`id_intake` = `gspel1`.`ref_intake`.`id`))) join `gspel1`.`v_permohonan_kursus` on((`v_permohonan_kursus`.`id_permohonan` = `gspel1`.`permohonan_butir_peribadi`.`id`))) left join `gspel1`.`temuduga_tetapan` on(((`gspel1`.`temuduga_tetapan`.`id_permohonan` = `v_permohonan_kursus`.`id`) and (`gspel1`.`temuduga_tetapan`.`id_giatmara` = `gspel1`.`settings_tawaran_kursus`.`id_giatmara`) and (`gspel1`.`temuduga_tetapan`.`id_kursus` = `gspel1`.`settings_tawaran_kursus`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-07 12:01:40
