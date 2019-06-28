CREATE DATABASE  IF NOT EXISTS `sports` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sports`;
-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: localhost    Database: sports
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cellPhone` varchar(20) DEFAULT NULL,
  `homePhone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `highschool` varchar(50) DEFAULT NULL,
  `weight` char(10) DEFAULT NULL,
  `heightFeet` int(1) DEFAULT NULL,
  `heightInches` int(2) DEFAULT NULL,
  `gradYear` char(4) DEFAULT NULL,
  `sport` varchar(100) DEFAULT NULL,
  `primaryPosition` varchar(20) DEFAULT NULL,
  `secondaryPosition` varchar(20) DEFAULT NULL,
  `travelTeam` varchar(20) DEFAULT NULL,
  `gpa` varchar(5) DEFAULT NULL,
  `sat` varchar(5) DEFAULT NULL,
  `act` varchar(5) DEFAULT NULL,
  `ref1Name` varchar(300) DEFAULT NULL,
  `ref1JobTitle` varchar(50) DEFAULT NULL,
  `ref1Email` varchar(50) DEFAULT NULL,
  `ref1Phone` varchar(50) DEFAULT NULL,
  `ref2Name` varchar(300) DEFAULT NULL,
  `ref2JobTitle` varchar(50) DEFAULT NULL,
  `ref2Email` varchar(50) DEFAULT NULL,
  `ref2Phone` varchar(50) DEFAULT NULL,
  `ref3Name` varchar(300) DEFAULT NULL,
  `ref3JobTitle` varchar(50) DEFAULT NULL,
  `ref3Email` varchar(50) DEFAULT NULL,
  `ref3Phone` varchar(50) DEFAULT NULL,
  `persStatement` varchar(300) DEFAULT NULL,
  `commitment` varchar(300) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `profileImage` varchar(150) DEFAULT NULL,
  `showcase1` varchar(150) DEFAULT NULL,
  `showcase2` varchar(150) DEFAULT NULL,
  `showcase3` varchar(150) DEFAULT NULL,
  `persontype` varchar(10) DEFAULT NULL,
  `college` varchar(150) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `characteristics` varchar(150) DEFAULT NULL,
  `velocity` varchar(20) DEFAULT NULL,
  `gpareq` varchar(20) DEFAULT NULL,
  `satactreq` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'dmoore','$2y$10$rbAYTxpDL6emSvJwL419sOvuPbNQL4W9HSGgQssy/1XeVbkVdMgUO','Dale Moore','male','dmoore092@gmail.com','5551212','5551111','123 Sesame Street','Rochester','Alabama','14586','Rochester High School','Rochester',5,10,'1998','basketball','shortstop','1st Base','Grace Academy','4.2','235','25','Bill Davis','Coach Advisor','coach@coach.com','555-1212','Ted Jones','Coach','coach@coach2.com',NULL,'James Avery','Coach','ghj@gfht.com','(555) 456-1234','ttrytyrtyr',NULL,NULL,'20181122_104703.jpg',NULL,'7m_I9i0eTnM','cpIEWsQpRMk','coach','University of Tennessee','@dmoore092','dmoore','dmoore','www.google.com','driven, committed','1.45','1.45','123'),(4,'jav123','$2y$10$4vECftdWXHj7fBgNS/AiOuhPGEHduhzZMxbPoWxfmqb/wLVSDgQfC','James Dillinger','male','jav123@gmail.com','5551234567','','150 hillside road','Rochester','','14456','','210',NULL,NULL,'','','','','','','','',' ','','','',' ','','','',' ','','','','',NULL,'',NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'jmac','$2y$10$5azuCJTpjvpdSMZuc7xAA.10EI3C86jnEG.xGHq9aDFK33o/sS5Li','Jennifer Mackenzie','female','jmac@gmail.com',NULL,NULL,'111 East Jones Ave','Rochester','New York','14445','Oswego High School','Rochester',NULL,11,NULL,'Softball','pitcher','3rd base','Grace Academy',NULL,'235','23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'1111.jpg',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'sjd','$2y$10$ZqpJWraf4KgtIM96Uog3Kej4eEiQ9pNAlY5GTk//deYoTbV7TLkRG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-07 16:17:41
