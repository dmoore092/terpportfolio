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
  `height` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'dmoore','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Dale Moore','male','dmoore092@gmail.com','(585) 204-0883','585-204-0883','123 Sesame Street','West Henrietta','NY','14586','Rochester High School','Rochester','5','1998','basketball','shortstop','1st Base','Grace Academy','4.2','235','25','Bill Davis','Coach Advisor','coach@coach.com','555-1212','Ted Jones','Coach','coach@coach2.com',NULL,'James Avery','Coach','ghj@gfht.com','(555) 456-1234','ttrytyrtyr',NULL,NULL,'20181122_104703.jpg',NULL,'7m_I9i0eTnM','cpIEWsQpRMk','admin','University of Tennessee','@dmoore092','dmoore','dmoore','www.dwwebdev.net','driven, committed','1.45','1.7','123'),(4,'jav123','$2y$10$4vECftdWXHj7fBgNS/AiOuhPGEHduhzZMxbPoWxfmqb/wLVSDgQfC','James Dillinger','male','jav123@gmail.com','5551234567','555-111-1212','150 hillside road','Rochester','NY','14456','Rochester #12','Rochester','5 foot 10 inches','2019','hockey','forward','','Grace Academy','','','','','','','','','','','','','','','','',NULL,'','20181122_104703.jpg','LE4u5qnJJj8','LE4u5qnJJj8','LE4u5qnJJj8','player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'jmac','$2y$10$5azuCJTpjvpdSMZuc7xAA.10EI3C86jnEG.xGHq9aDFK33o/sS5Li','Jennifer Mackenzie','Female','jmac@gmail.com','5852040883','555-233-1212','111 East Jones Ave','West Henrietta','NY','14586','Oswego High School','Rochester','4 foot 3 inches','2014','Softball','pitcher','3rd base','Grace Academy','4.2','235','23',NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,'Keuka College',NULL,'1111.jpg','https://www.youtube.com/embed/g7f6HiQ2LuU','https://www.youtube.com/embed/aHl0tlUYDBI','https://www.youtube.com/embed/g7f6HiQ2LuU','player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'saclamb','$2y$10$rj2igYav1tA1nYLA8rUva.R8/2tra/RB4f7VUE0zjXIYZFTSkYX2.','Doug James','Male','Ariakkas10@hotmail.com','111-111-1111','111-111-1111','dsaddasdsad','Rochester','New York','14620','Oswego High School','Rochester','4 foot 6 inches','2004','basketball','shortstop','1st Base','ghghf','4.2','345','12','dsafcdsfa','dasfdsaf','adsa@dfsdfs.com','111-111-1111','adsfdsafa','dsaffaf','adsa@dfsdfs.com','111-111-1111','fdsfdsfa','dsfadsaf','adsa@dfsdfs.com','','dsfadsfadsfadsfa',NULL,NULL,NULL,'47WkAyjxESo','47WkAyjxESo','47WkAyjxESo','player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'saclamb3','$2y$10$y4Z/wzXkfdsCMLgCVGlWh.NF4K9s8n96z5p.AO2O6ivWCN9o8bCuy','Kaylee Smith',NULL,'kayl@keuka.com','111-111-1111','111-111-1111','111 East Ave, Apt 404','Rochester','alabama','14605',NULL,NULL,NULL,NULL,'Hockey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test.jpg',NULL,NULL,NULL,'coach','Keuka University','@kkeuk','ksmith','ksmith','www.google.com','driven, committed','5','1.45','123');
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

-- Dump completed on 2019-01-24 20:02:06
