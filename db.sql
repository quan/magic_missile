CREATE DATABASE  IF NOT EXISTS `magic_missile` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `magic_missile`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: magic_missile
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `alignment`
--

DROP TABLE IF EXISTS `alignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alignment` (
  `idalignment` int(11) NOT NULL,
  `alignment_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idalignment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `idclass` int(11) NOT NULL,
  `class_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclass`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `race`
--

DROP TABLE IF EXISTS `race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race` (
  `idrace` int(11) NOT NULL,
  `race_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idrace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-30 20:52:42

/*
-- Query: SELECT * FROM magic_missile.race
LIMIT 0, 1000

-- Date: 2015-11-30 21:06
*/
INSERT INTO `race` (`idrace`,`race_name`) VALUES (1,NULL);
INSERT INTO `race` (`idrace`,`race_name`) VALUES (2,'Human');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (3,'Elf');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (4,'Gnome');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (5,'Half-Orc');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (6,'Half-Elf');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (7,'Halfling');
INSERT INTO `race` (`idrace`,`race_name`) VALUES (8,'Dwarf');

/*
-- Query: SELECT * FROM magic_missile.class
LIMIT 0, 1000

-- Date: 2015-11-30 21:06
*/
INSERT INTO `class` (`idclass`,`class_name`) VALUES (1,NULL);
INSERT INTO `class` (`idclass`,`class_name`) VALUES (2,'Barbarian');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (3,'Bard');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (4,'Cleric');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (5,'Druid');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (6,'Fighter');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (7,'Monk');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (8,'Paladin');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (9,'Ranger');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (10,'Rogue');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (11,'Sorcerer');
INSERT INTO `class` (`idclass`,`class_name`) VALUES (12,'Wizard');

/*
-- Query: SELECT * FROM magic_missile.alignment
LIMIT 0, 1000

-- Date: 2015-11-30 21:05
*/
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (0,NULL);
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (1,'Lawful Good');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (2,'Lawful Neutral');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (3,'Lawful Evil');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (4,'Neutral Good');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (5,'True Neutral');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (6,'Neutral Evil');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (7,'Chaotic Good');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (8,'Chaotic Neutral');
INSERT INTO `alignment` (`idalignment`,`alignment_name`) VALUES (9,'Chaotic Evil');
