CREATE DATABASE  IF NOT EXISTS `pharmacyERP` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `pharmacyERP`;
-- MySQL dump 10.13  Distrib 8.0.12, for macos10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: pharmacyERP
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `clienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `judet` varchar(45) DEFAULT NULL,
  `oras` varchar(45) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `tip_client` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'Pop Ioan','popioan@popioan.com','0786459871','Maramures','Baia Mare','Bulevardul Bucuresti Nr. 8','Fizica'),(2,'Danciu Razvan','razvan@razvanc.com','0749281452','Satu Mare','Satu Mare','Strada Viilor Nr. 3','Juridica'),(3,'Mihai Cosmin','cosmin@cosmin.com','0748873012','Maramures','Baia Sprie','Strada Pomilor Nr. 30','Fizica'),(4,'Iisus Hristos','jesus@makemesmile.com','0763478904','Maramures','Surdesti','Strada Cerurilor Nr. 1','Juridica'),(5,'Ciurea Paul','paul@paul.com','07612381238','Maramures','Baia Mare','Strada Da','Juridica');
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `furnizori`
--

DROP TABLE IF EXISTS `furnizori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `furnizori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nume` varchar(255) DEFAULT NULL,
  `Despre` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `furnizori`
--

LOCK TABLES `furnizori` WRITE;
/*!40000 ALTER TABLE `furnizori` DISABLE KEYS */;
INSERT INTO `furnizori` VALUES (1,'Pfizer','The most important provider.','../images/providers/saupload_pfizer-inc-logo.jpg'),(3,'Bayer','Pills provider.','../images/providers/adas.jpeg'),(4,'Baxter','Powder provider.','../images/providers/neLaa43i.jpeg');
/*!40000 ALTER TABLE `furnizori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produse`
--

DROP TABLE IF EXISTS `produse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `produse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Denumire` varchar(255) DEFAULT NULL,
  `Producator` varchar(255) DEFAULT NULL,
  `Categorie` varchar(255) DEFAULT NULL,
  `Pret` int(11) DEFAULT NULL,
  `Stoc` int(11) DEFAULT NULL,
  `Data_expirare` datetime DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produse`
--

LOCK TABLES `produse` WRITE;
/*!40000 ALTER TABLE `produse` DISABLE KEYS */;
INSERT INTO `produse` VALUES (1,'Modafinil','Bayer','Pastile',50,5000,'2021-12-31 00:00:00','../images/product-images/IMG_3124-1.jpg'),(2,'Paracetamol','Pfizer','Pastile',10,1000,'2019-09-21 00:00:00','../images/product-images/images.jpeg'),(3,'Fervex','Bayer','Praf',30,2300,'2020-01-01 00:00:00','../images/product-images/0625e-551---fervex-adulti-8-plicuri.jpg'),(4,'Xanax','Pfizer','Pastile',100,3500,'2019-09-21 00:00:00','../images/product-images/e3d995a152e18bb86fa197fdc98b26b8_XL.jpg'),(5,'Faringo Hot Drink','Pfizer','Praf',50,2300,'2021-12-31 00:00:00','../images/product-images/W58371002.jpg');
/*!40000 ALTER TABLE `produse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'edward','eduard@eduard.com','8287458823facb8ff918dbfabcd22ccb','Farmacist');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vanzari`
--

DROP TABLE IF EXISTS `vanzari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `vanzari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Denumire` varchar(255) DEFAULT NULL,
  `Cantitate` varchar(255) DEFAULT NULL,
  `Pret_bucata` int(11) DEFAULT NULL,
  `Pret_total` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vanzari`
--

LOCK TABLES `vanzari` WRITE;
/*!40000 ALTER TABLE `vanzari` DISABLE KEYS */;
/*!40000 ALTER TABLE `vanzari` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-15 17:22:40
