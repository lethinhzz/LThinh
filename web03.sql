-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shop_210202
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `shop_210202`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `shop_210202` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `shop_210202`;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `pid` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pCount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_user_Cart` (`user_id`),
  CONSTRAINT `fk_user_Cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (4,'thinh','18',7,'2023-08-07'),(5,'thinh','19',3,'2023-08-09'),(6,'thinh','20',1,'2023-08-07'),(7,'thinh','22',1,'2023-08-09');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Balo'),(2,'crossbody bag');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `pquan` int(11) NOT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `pimage` varchar(100) DEFAULT NULL,
  `pdate` date NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `cat_fk` (`catid`),
  CONSTRAINT `cat_fk` FOREIGN KEY (`catid`) REFERENCES `category` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (18,'Balo daily y 1',400000,1,'nice','1.jpg','2023-04-14',2),(19,'Balo daily y 2',500000,1,'nice','2.jpg','2023-04-14',1),(20,'Balo daily y 3',450000,1,'Nice','3.jpg','2023-04-14',2),(21,'Balo daily y 4',400000,1,'Nice','4.jpg','2023-04-14',1),(22,'Balo daily y 5',500000,1,'Nice','5.jpg','2023-04-14',2),(23,'Balo daily y 6',500000,1,'Nice','6.jpg','2023-04-14',1),(24,'Balo daily y 7',550000,1,'nice','7.jpg','2023-04-14',1),(25,'Balo daily y 8',400000,1,'Good','8.jpg','2023-04-14',2),(26,'Balo daily y 9',500000,1,'Good','9.jpg','2023-04-14',1),(27,'Balo daily y 10',400000,1,'Good','10.jpg','2023-04-14',1),(28,'Balo daily y 11',500000,1,'Good','11.jpg','2023-04-14',2),(29,'Balo daily y 12',500000,1,'Good','12.jpg','2023-04-14',1),(30,'Balo daily y 13',500000,1,'Good','13.jpg','2023-04-14',1),(31,'Balo daily y 14',500000,1,'Good','14.jpg','2023-04-14',1),(32,'Balo daily y 15',400000,1,'Good','15.jpg','2023-04-14',1),(33,'Balo daily y 16',350000,1,'Good','16.jpg','2023-04-14',2),(34,'Balo daily y 17',350000,1,'Good','17.jpg','2023-04-14',2),(35,'Balo daily y 18',400000,1,'Good','18.jpg','2023-04-14',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `hometown` varchar(20) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('lephucthinh','0123','0123','ct',0,'lephucthinhqw@gmail.com'),('lethinh','123','0123','st',0,'phucthinhqw@gmail.com'),('thinh','122333','0126333','st',0,'thinh@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-09 20:39:36
