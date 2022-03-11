-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: academus
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `boletin`
--

DROP TABLE IF EXISTS `boletin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletin` (
  `id_boletin` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_boletin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletin`
--

LOCK TABLES `boletin` WRITE;
/*!40000 ALTER TABLE `boletin` DISABLE KEYS */;
/*!40000 ALTER TABLE `boletin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Director');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `id_dir` int(11) NOT NULL AUTO_INCREMENT,
  `n_casa` varchar(20) NOT NULL,
  `pto_ref` varchar(255) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `sector` varchar(20) NOT NULL,
  `id_md` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dir`),
  KEY `id_md` (`id_md`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_md`) REFERENCES `municipio` (`id_muni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nom_estado` varchar(20) DEFAULT NULL,
  `id_ep` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_ep` (`id_ep`),
  CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_ep`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `id_est` int(11) NOT NULL AUTO_INCREMENT,
  `ci_est` varchar(20) DEFAULT NULL,
  `ci_escolar` varchar(20) DEFAULT NULL,
  `fecha_n` date NOT NULL,
  `lugar_n` text NOT NULL,
  `sexo` char(1) NOT NULL,
  `pnom` varchar(20) NOT NULL,
  `segnom` varchar(20) DEFAULT NULL,
  `otrosnom` varchar(20) DEFAULT NULL,
  `pape` varchar(20) NOT NULL,
  `segape` varchar(20) DEFAULT NULL,
  `otrosape` varchar(20) DEFAULT NULL,
  `nacionalidad_e` varchar(20) DEFAULT NULL,
  `id_de` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_est`),
  UNIQUE KEY `ci_est` (`ci_est`),
  UNIQUE KEY `ci_escolar` (`ci_escolar`),
  KEY `id_de` (`id_de`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_de`) REFERENCES `direccion` (`id_dir`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante_inscribe_matricula`
--

DROP TABLE IF EXISTS `estudiante_inscribe_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante_inscribe_matricula` (
  `id_eei` int(11) DEFAULT NULL,
  `id_mei` int(11) DEFAULT NULL,
  UNIQUE KEY `id_eei` (`id_eei`),
  UNIQUE KEY `id_mei` (`id_mei`),
  CONSTRAINT `estudiante_inscribe_matricula_ibfk_1` FOREIGN KEY (`id_eei`) REFERENCES `estudiante` (`id_est`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estudiante_inscribe_matricula_ibfk_2` FOREIGN KEY (`id_mei`) REFERENCES `matricula` (`id_m`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_inscribe_matricula`
--

LOCK TABLES `estudiante_inscribe_matricula` WRITE;
/*!40000 ALTER TABLE `estudiante_inscribe_matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_inscribe_matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante_padece_salud`
--

DROP TABLE IF EXISTS `estudiante_padece_salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante_padece_salud` (
  `id_eps` int(11) DEFAULT NULL,
  `id_sep` int(11) DEFAULT NULL,
  UNIQUE KEY `id_eps` (`id_eps`),
  UNIQUE KEY `id_sep` (`id_sep`),
  CONSTRAINT `estudiante_padece_salud_ibfk_1` FOREIGN KEY (`id_eps`) REFERENCES `estudiante` (`id_est`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estudiante_padece_salud_ibfk_2` FOREIGN KEY (`id_sep`) REFERENCES `salud` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_padece_salud`
--

LOCK TABLES `estudiante_padece_salud` WRITE;
/*!40000 ALTER TABLE `estudiante_padece_salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_padece_salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `id_g` int(11) NOT NULL AUTO_INCREMENT,
  `num_g` varchar(20) DEFAULT NULL,
  `id_gs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_g`),
  KEY `id_gs` (`id_gs`),
  CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`id_gs`) REFERENCES `seccion` (`id_seccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula` (
  `id_m` int(11) NOT NULL AUTO_INCREMENT,
  `estado_m` varchar(20) DEFAULT NULL,
  `id_mp` int(11) DEFAULT NULL,
  `id_mg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_m`),
  UNIQUE KEY `id_mp` (`id_mp`),
  UNIQUE KEY `id_mg` (`id_mg`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_mp`) REFERENCES `periodoescolar` (`id_pe`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_mg`) REFERENCES `grado` (`id_g`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id_muni` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_muni` varchar(20) DEFAULT NULL,
  `id_em` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_muni`),
  KEY `id_em` (`id_em`),
  CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pais` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodoescolar`
--

DROP TABLE IF EXISTS `periodoescolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodoescolar` (
  `id_pe` int(11) NOT NULL AUTO_INCREMENT,
  `fechaI` date DEFAULT NULL,
  `fechaF` date DEFAULT NULL,
  `nom_pe` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodoescolar`
--

LOCK TABLES `periodoescolar` WRITE;
/*!40000 ALTER TABLE `periodoescolar` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodoescolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(20) NOT NULL,
  `pnombre` varchar(20) NOT NULL,
  `segnombre` varchar(20) DEFAULT NULL,
  `papellido` varchar(20) NOT NULL,
  `segapellido` varchar(20) DEFAULT NULL,
  `nacionalidad` char(1) NOT NULL,
  `sexo_p` char(1) NOT NULL,
  PRIMARY KEY (`id_per`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'5467061','Inirida','Josefina','Quijada','Serrano','V','V'),(22,'26896166','Cristina','Josefina','Estrabao','Quijada','V','F'),(23,'26896160','Elias','Ramon','Estraboa','Quijada','V','M');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesion_u_oficio`
--

DROP TABLE IF EXISTS `profesion_u_oficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesion_u_oficio` (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `posee_po` char(2) DEFAULT NULL,
  `nom_po` varchar(30) DEFAULT NULL,
  `lugar_po` varchar(30) DEFAULT NULL,
  `tlf_po` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesion_u_oficio`
--

LOCK TABLES `profesion_u_oficio` WRITE;
/*!40000 ALTER TABLE `profesion_u_oficio` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesion_u_oficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `cod_prof` varchar(20) NOT NULL,
  `tipo_prof` varchar(20) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  UNIQUE KEY `cod_prof` (`cod_prof`),
  KEY `id_prof` (`id_prof`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `persona` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES ('26896160-01-ramon','Ayudante',23),('26896166-01-josefa','Ayudante',22);
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representante`
--

DROP TABLE IF EXISTS `representante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representante` (
  `ci_padre` varchar(20) DEFAULT NULL,
  `ci_madre` varchar(20) DEFAULT NULL,
  `nombre_padre` varchar(20) NOT NULL,
  `nombre_madre` varchar(20) NOT NULL,
  `id_rep` int(11) NOT NULL,
  `id_pr` int(11) DEFAULT NULL,
  `id_dr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rep`),
  UNIQUE KEY `ci_padre` (`ci_padre`),
  UNIQUE KEY `ci_madre` (`ci_madre`),
  KEY `id_pr` (`id_pr`),
  KEY `id_dr` (`id_dr`),
  CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`id_rep`) REFERENCES `persona` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `representante_ibfk_2` FOREIGN KEY (`id_pr`) REFERENCES `profesion_u_oficio` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `representante_ibfk_3` FOREIGN KEY (`id_dr`) REFERENCES `direccion` (`id_dir`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante`
--

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representante_representa_estudiante`
--

DROP TABLE IF EXISTS `representante_representa_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representante_representa_estudiante` (
  `id_rer` int(11) DEFAULT NULL,
  `id_err` int(11) DEFAULT NULL,
  UNIQUE KEY `id_rer` (`id_rer`),
  UNIQUE KEY `id_err` (`id_err`),
  CONSTRAINT `representante_representa_estudiante_ibfk_1` FOREIGN KEY (`id_rer`) REFERENCES `representante` (`id_rep`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `representante_representa_estudiante_ibfk_2` FOREIGN KEY (`id_err`) REFERENCES `estudiante` (`id_est`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante_representa_estudiante`
--

LOCK TABLES `representante_representa_estudiante` WRITE;
/*!40000 ALTER TABLE `representante_representa_estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `representante_representa_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salud`
--

DROP TABLE IF EXISTS `salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salud` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `condicion_s` varchar(20) DEFAULT NULL,
  `obervacion_s` text DEFAULT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salud`
--

LOCK TABLES `salud` WRITE;
/*!40000 ALTER TABLE `salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `cod_sec` varchar(20) DEFAULT NULL,
  `nom_sec` varchar(20) DEFAULT NULL,
  `cant_estudiantes` int(11) NOT NULL,
  PRIMARY KEY (`id_seccion`),
  UNIQUE KEY `cod_sec` (`cod_sec`),
  UNIQUE KEY `nom_sec` (`nom_sec`),
  UNIQUE KEY `cod_sec_2` (`cod_sec`),
  UNIQUE KEY `nom_sec_2` (`nom_sec`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (4,'PREE_C_D','Pre escolar 5',3),(15,'PREE_B','Pre escolar B',0),(16,'PRI_GRA_C','Primer Grado C',0),(18,'PRI_GRA_A','Primer Grado A',0),(19,'Pree B','Preescolar B',0);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `id_tlf` int(11) NOT NULL AUTO_INCREMENT,
  `numero_padre` varchar(10) NOT NULL,
  `numero_madre` varchar(10) NOT NULL,
  `numero_repre` varchar(10) NOT NULL,
  `id_te` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tlf`),
  KEY `id_te` (`id_te`),
  CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`id_te`) REFERENCES `representante` (`id_rep`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom_u` varchar(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `privilegio` char(20) NOT NULL,
  `pregunta_S` varchar(255) NOT NULL,
  `respuesta_S` varchar(255) NOT NULL,
  `ultima_s` varchar(255) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `id_pu` int(11) DEFAULT NULL,
  `id_cu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_u`),
  KEY `id_pu` (`id_pu`),
  KEY `id_cu` (`id_cu`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_pu`) REFERENCES `persona` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_cu`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'iniriquijada','4802-5000-5202-5408-5618-5832-','Director','12168-24642-23762-19208-25992-20402-2048-20000-20402-2048-23762-22050-2048-25088-25992-22050-23762-20402-25992-2048-23762-18818-26450-19602-24642-26912-18818-','9248-27378-23328-19602-20402-','03/09/2022 9:28am','1',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_inscribe_estudiante`
--

DROP TABLE IF EXISTS `usuario_inscribe_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_inscribe_estudiante` (
  `id_uu` int(11) DEFAULT NULL,
  `id_uie` int(11) DEFAULT NULL,
  `fecha_ins` varchar(255) NOT NULL,
  KEY `id_uu` (`id_uu`),
  KEY `id_uie` (`id_uie`),
  CONSTRAINT `usuario_inscribe_estudiante_ibfk_1` FOREIGN KEY (`id_uu`) REFERENCES `usuario` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_inscribe_estudiante_ibfk_2` FOREIGN KEY (`id_uie`) REFERENCES `estudiante` (`id_est`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_inscribe_estudiante`
--

LOCK TABLES `usuario_inscribe_estudiante` WRITE;
/*!40000 ALTER TABLE `usuario_inscribe_estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_inscribe_estudiante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-09 13:16:00
