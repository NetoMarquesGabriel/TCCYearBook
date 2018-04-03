-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: tcc13c2
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `midia`
--

DROP TABLE IF EXISTS `midia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midia` (
  `cod_midia` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `tipo_midia` char(1) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `cod_status_midia` char(1) NOT NULL,
  PRIMARY KEY (`cod_midia`),
  KEY `fk_midia_usuario_idx` (`cod_usuario`),
  CONSTRAINT `fk_midia_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midia`
--

LOCK TABLES `midia` WRITE;
/*!40000 ALTER TABLE `midia` DISABLE KEYS */;
INSERT INTO `midia` VALUES (1,1,'A','images/Marques.png','A'),(2,1,'P','images/Marques.png','A'),(3,1,'G','images/Marques.png','A'),(4,2,'A','images/Marques.png','A'),(5,2,'P','images/Gordao.png','A'),(6,2,'G','images/Marques.png','A'),(7,3,'A','images/Marques.png','A'),(8,3,'P','images/Emily.png','A'),(9,3,'G','images/Marques.png','A'),(10,4,'A','images/Marques.png','A'),(11,4,'P','images/Augusto.png','A'),(12,4,'G','images/Marques.png','A'),(13,5,'A','images/Marques.png','A'),(14,5,'P','images/Arthur.png','A'),(15,5,'G','images/Marques.png','A'),(16,6,'A','images/Marques.png','A'),(17,6,'P','images/Leo.png','A'),(18,6,'G','images/Marques.png','A'),(19,7,'A','images/Marques.png','A'),(20,7,'P','images/Marques.png','A'),(22,7,'A','images/Marques.png','A'),(23,7,'P','images/Marques.png','A'),(24,7,'G','images/Marques.png','A'),(27,1,'G','images/emily.png','A'),(28,7,'G','images/gordao.png','A');
/*!40000 ALTER TABLE `midia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-19  0:36:03
