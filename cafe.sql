-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cafe
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Mocha','O Mocha Ã© uma versÃ£o ainda mais achocolatada do Cappuccino. Na prÃ¡tica, Ã© uma mistura entre um Cappuccino e chocolate quente. Ã‰ feito a partir da mistura do chocolate em pÃ³ com uma dose de espresso, adicionando leite vaporizado e espuma de leite â€“ todos homogeneamente misturados dentro da bebida.'),(2,'Affogato','O affogato Ã© mais uma sobremesa do que um drink, o que o torna especialmente delicioso, Consiste na mistura de uma boa colherada de sorvete de baunilha com uma ou duas doses de cafÃ© espresso. Muitas pessoas discutem sua presenÃ§a entre os tipos de cafÃ©, dizendo que deveria ser considerado um doce.'),(3,'Cappuccino','O Cappuccino Ã© bastante parecido com um Latte, e Ã© um dos tipos de cafÃ© mais populares em cafeterias e bares ao redor do mundo. A diferenÃ§a entre os dois estÃ¡ no fato de o cappuccino possuir mais leite vaporizado em sua fÃ³rmula, alÃ©m de chocolate adicionado Ã  receita.'),(4,'Cafe Espresso','O cafÃ© espresso (ou expresso, dependendo da preferÃªncia de escrita) Ã© um dos principais tipos de cafÃ© â€“ e Ã© a base de diversos outros. O nome â€œespressoâ€ vem do italiano â€œespremido, pressionadoâ€. Ele Ã© feito em poucos segundos sob alta pressÃ£o de Ã¡gua na temperatura de consumo. Isso faz com que acumule muito sabor e intensidade');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27 17:23:31
