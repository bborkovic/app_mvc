-- MySQL dump 10.13  Distrib 5.6.33, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.6.33-0ubuntu0.14.04.1

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Tom2','Kyte',NULL),(2,'Darl','Kuhn',NULL),(3,'Steve','Prettyman','Steve Prettyman is a college instructor on PHP programming, web development and related.  He is and has been a practicing web developer and is a book author.'),(4,'Michael','Hartl',NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_info` varchar(200) DEFAULT NULL,
  `about_book` text,
  `about_authors` text,
  `book_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,3,'Learn PHP 7','Object Oriented Modular Programming using HTML5, CSS3, JavaScript, XML, JSON, and MySQL',NULL,NULL,'3_9781484217290.jpg'),(3,3,'PHP Arrays',NULL,NULL,NULL,'3_9781484225554.jpg'),(4,1,'Expert Oracle Database Architecture',NULL,NULL,NULL,'1_9781430229469.jpg'),(5,1,'Expert Oracle Database Architecture',NULL,NULL,NULL,'1_9781430262985.jpg'),(6,2,'Expert Oracle Indexing and Access Paths',NULL,NULL,NULL,'2_9781484219836.jpg'),(7,2,'Oracle RMAN Database Duplication',NULL,NULL,NULL,'2_9781484211137.jpg'),(8,2,'RMAN Recipes for Oracle Database',NULL,NULL,NULL,'2_9781430248361.jpg'),(9,2,'Linux and Solaris Recipes for Oracle DBAs','Linux and Solaris Recipes for Oracle DBAs, 2nd Edition is an example–based book on managing Oracle Database under Linux and Solaris.','Linux and Solaris Recipes for Oracle DBAs, 2nd Edition is an example–based book on managing Oracle Database under Linux and Solaris.','','2_linux_and_solaris_recipes_3.jpg'),(10,2,'Linux and Solaris Recipes for Oracle DBAs','Linux and Solaris Recipes for Oracle DBAs, 2nd Edition is an example–based book on managing Oracle Database under Linux and Solaris.','Linux and Solaris Recipes for Oracle DBAs, 2nd Edition is an example–based book on managing Oracle Database under Linux and Solaris.','','2_linux_and_solaris_recipes_2.jpg'),(11,4,'Ruby on Rails Tutorial: Learn Web Development with Rails','Ruby on Rails Tutorial: Learn Web Development with Rails (4th Edition) (Addison-Wesley Professional Ruby Series) 4th Edition','Ruby on Rails Tutorial: Learn Web Development with Rails (4th Edition) (Addison-Wesley Professional Ruby Series) 4th Edition','','MH-ruby-on-rails_1.jpg'),(12,4,'Ruby on Rails Tutorial','Ruby on Rails Tutorial','Ruby on Rails Tutorial','','MH-ruby-on-rails_2.jpg'),(13,1,'Expert One-on-One Oracle','Expert One-on-One Oracle','A proven best-seller by the most recognized Oracle expert in the world','','TK-expert_one-to-one_1.jpg'),(14,1,'Expert One-on-One Oracle4','Expert One-on-One Oracle4','','','TK-expert_one-to-one_3.jpg'),(15,2,'Pro Oracle Database 12c Administration ','Pro Oracle Database 12c Administration 2nd (second) Edition by Kuhn, Darl published by Apress (2013)','Pro Oracle Database 12c Administration 2nd (second) Edition by Kuhn, Darl published by Apress (2013)','','pro_oracle_12c_administration.jpg'),(16,2,'Oracle Database Transactions and Locking Revealed','Oracle Database Transactions and Locking Revealed 1st ed. Edition','Oracle Database Transactions and Locking Revealed 1st ed. Edition','','oracle_database_transactions_2.jpg'),(17,2,'Oracle Database Transactions and Locking Revealed 2','Oracle Database Transactions and Locking Revealed 2','Oracle Database Transactions and Locking Revealed 2','','oracle_database_transactions_4.jpg'),(18,3,'PHP Arrays','PHP Arrays','PHP Arrays','','3_9781484225554_1.jpg'),(19,3,'PHP Arrays','PHP Arrays','','','3_9781484225554_5.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Ruby on Rails3'),(2,'PHP'),(3,'Oracle'),(4,'Perl'),(5,'Linux2'),(6,'Open Source');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publishers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishers`
--

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
INSERT INTO `publishers` VALUES (1,'Apress','Apress is a press company ...'),(2,'O\'Reilly','O\'Reilly press company ...'),(3,'Oracle Press','Oracle Press is company');
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `post_number` int(10) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bborkovic','pass',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-11 12:36:58
