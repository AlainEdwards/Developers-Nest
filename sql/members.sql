-- MySQL dump 10.13  Distrib 5.6.10, for Win64 (x86_64)
--
-- Host: localhost    Database: rndata
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` text,
  `pass` text,
  `Email` text,
  `Website` text,
  `FirstName` text,
  `LastName` text,
  `Status` text,
  `Date_Registered` date DEFAULT NULL,
  `LastLoggedIn` date DEFAULT NULL,
  `IP` text,
  `Intro` text,
  `img` longtext,
  PRIMARY KEY (`ID`),
  KEY `user` (`user`(6))
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (0,'admin','d41d8cd98f00b204e9800998ecf8427e','hmack1141@gmail.com','www.techiedev.blogspot.com','Alain','Edwards','Offline','2013-11-30','2013-12-01','127.0.0.1','Hi my name is Alain.','../images/avatars/admin/admin.jpg'),(6,'Nicolas Cage','monkey','ncage@gmail.com','www.ncage.com','Nicolas','Cage','Online','2013-11-30','2013-11-30','127.0.0.1','Hi my name is fucking nicolas cage','../images/avatars/ncage/ncage.jpg'),(23,'chrisx','d0763edaa9d9bd2a9516280e9044d885','chrixx@gmail.com','','Chris','X','Offline','2013-12-01','2013-12-01','127.0.0.1','','../images/avatars/chrisx/chrisx.png'),(27,'Mr. T','d0763edaa9d9bd2a9516280e9044d885','MrT@T.com','','Mr. T','T','Online','2013-12-01','2013-12-01','127.0.0.1','','../images/avatars/Mr. T/images.jpg'),(33,'BobGreen','d0763edaa9d9bd2a9516280e9044d885','bobgreen@gmail.com','','Bob','Green','Online','2013-12-01','2013-12-01','127.0.0.1','','../images/avatars/BobGreen/anonymous-avatar2.jpg'),(34,'Alex','d0763edaa9d9bd2a9516280e9044d885','alexg@gmail.com','','Alex','G','Offline','2013-12-01','2013-12-01','127.0.0.1','','../images/avatars/user.png'),(35,'FrankC','d0763edaa9d9bd2a9516280e9044d885','frankc@gmail.com','www.kuh-nect.com','Frank','C','Offline','2013-12-01','2013-12-01','127.0.0.1','','../images/avatars/user.png');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-30 23:52:23
