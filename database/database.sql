-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dnd
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.8-MariaDB

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `concept` varchar(45) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `statblock` text DEFAULT NULL COMMENT 'markdown',
  `imageurl` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `concepts`
--

DROP TABLE IF EXISTS `concepts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concepts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concepts`
--

LOCK TABLES `concepts` WRITE;
/*!40000 ALTER TABLE `concepts` DISABLE KEYS */;
INSERT INTO `concepts` VALUES (1,'Character','fa-user'),(2,'Place','fa-map-marked-alt'),(3,'Item','fa-box-oepn'),(4,'Group','fa-users'),(5,'Event','fa-stopwatch'),(6,'Note','fa-sticky-note'),(7,'Folder','fa-folder'),(8,'Player Character','fa-user-circle'),(9,'Adventure','fa-compass'),(10,'Session Log','fa-book');
/*!40000 ALTER TABLE `concepts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connection_types`
--

DROP TABLE IF EXISTS `connection_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connection_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label_UNIQUE` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connection_types`
--

LOCK TABLES `connection_types` WRITE;
/*!40000 ALTER TABLE `connection_types` DISABLE KEYS */;
INSERT INTO `connection_types` VALUES (127,'ACT_OF'),(26,'AGENT_OF'),(28,'ALIAS_OF'),(29,'ALLY_OF'),(32,'ANTAGONIST_OF'),(33,'BENEFACTOR_OF'),(108,'BIRTHPLACE_OF'),(109,'BRANCH_OF'),(35,'BUSINESS_PARTNER_OF'),(110,'CAPITAL_OF'),(36,'CAPTAIN_OF'),(37,'CHAMPION_OF'),(38,'COMPANION_OF'),(4,'COMPONENT'),(7,'COMPONENT_OF'),(39,'CONTACT_OF'),(5,'CONTAINER'),(8,'CONTAINER_OF'),(41,'CREW_MEMBER_OF'),(42,'DESTROYER_OF'),(43,'EARNER_OF'),(44,'EMPLOYEE_OF'),(18,'ENCOUNTER_OF'),(47,'ENEMY_OF'),(93,'FACTION_OF'),(49,'FATHER_OF'),(126,'FOLDER_OF'),(50,'FOUNDER_OF'),(51,'FRIEND_OF'),(138,'GM_NOTE_OF'),(53,'GOD_OF'),(54,'GUARDIAN_OF'),(55,'HALF_SIBLING_OF'),(111,'HEADQUARTERS_OF'),(113,'HOMEWORLD_OF'),(112,'HOME_OF'),(56,'ICON_OF'),(114,'IN_ORBIT_OF'),(57,'KILLER_OF'),(58,'LEADER_OF'),(115,'LOCATION_OF'),(10,'LOOT_OF'),(60,'MAKER_OF'),(62,'MEMBER_OF'),(63,'MENTOR_OF'),(64,'MOTHER_OF'),(120,'NEIGHBOR_OF'),(19,'NEXT_EVENT_OF'),(139,'NEXT_NOTE_OF'),(140,'NOTE_OF'),(20,'OPPOSING_EVENT_OF'),(65,'ORGANIZER_OF'),(66,'OWNER_OF'),(100,'PANTHEON_OF'),(69,'PARAMOUR_OF'),(70,'PARTICIPANT_OF'),(72,'PATRON_OF'),(145,'PLAYER_HANDOUT_OF'),(21,'PLOT_HOOK_OF'),(74,'PRISONER_OF'),(11,'PROP_OF'),(77,'PROTAGONIST_OF'),(22,'RELATED_EVENT_OF'),(14,'RELATED_ITEM_OF'),(146,'RELATED_NOTE_OF'),(78,'RESCUER_OF'),(79,'RIVAL_OF'),(81,'SEEKER_OF'),(82,'SERVANT_OF'),(23,'SESSION_LOG_OF'),(122,'SETTING_OF'),(84,'SIBLING_OF'),(85,'SPOUSE_OF'),(86,'STEWARD_OF'),(137,'SUBFOLDER_OF'),(107,'SUBGROUP_OF'),(147,'SUBNOTE_OF'),(88,'SUBORDINATE_OF'),(124,'SUBREGION_OF'),(24,'SUB_EVENT_OF'),(125,'TRAINING_GROUND_OF'),(17,'UPGRADE_OF'),(89,'USER_OF');
/*!40000 ALTER TABLE `connection_types` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `connections`
--

DROP TABLE IF EXISTS `connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `relationship` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pins`
--

DROP TABLE IF EXISTS `pins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pinnable_id` int(11) DEFAULT NULL,
  `pinnable_type` varchar(96) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'dnd'
--

--
-- Dumping routines for database 'dnd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-02  7:03:33
