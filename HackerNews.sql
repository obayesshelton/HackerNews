-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: HackerNews
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `hacker_news_provider_categories`
--

DROP TABLE IF EXISTS `hacker_news_provider_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hacker_news_provider_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `provider_count` int(11) NOT NULL DEFAULT '0',
  `user_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_name` (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hacker_news_provider_categories`
--

LOCK TABLES `hacker_news_provider_categories` WRITE;
/*!40000 ALTER TABLE `hacker_news_provider_categories` DISABLE KEYS */;
INSERT INTO `hacker_news_provider_categories` VALUES (1,'Cool',1,0),(2,'Viral',1,0),(3,'Culture',1,0),(4,'Tech',1,0),(5,'Men',1,0),(6,'Design',1,0);
/*!40000 ALTER TABLE `hacker_news_provider_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hacker_news_providers`
--

DROP TABLE IF EXISTS `hacker_news_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hacker_news_providers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT '',
  `bio` text,
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `rss_uri` varchar(250) DEFAULT NULL,
  `provider_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_name` (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hacker_news_providers`
--

LOCK TABLES `hacker_news_providers` WRITE;
/*!40000 ALTER TABLE `hacker_news_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `hacker_news_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hacker_news_providers_items`
--

DROP TABLE IF EXISTS `hacker_news_providers_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hacker_news_providers_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `link` text,
  `pub_date` datetime DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `provider_catgory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_title` (`id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hacker_news_providers_items`
--

LOCK TABLES `hacker_news_providers_items` WRITE;
/*!40000 ALTER TABLE `hacker_news_providers_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `hacker_news_providers_items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-31 10:12:11
