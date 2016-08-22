

--
-- Table structure for table `pro_objetivos`
--

DROP TABLE IF EXISTS `pro_objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pro_objetivos` (
  `id_objetivo` int(11) NOT NULL AUTO_INCREMENT,
  `obj_nome` varchar(255) DEFAULT NULL,
  `obj_inicio` date DEFAULT NULL,
  `obj_fim` date DEFAULT NULL,
  `obj_feito` varchar(1) DEFAULT 'N',
  `id_projeto` int(11) NOT NULL,
  `obj_pri` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_objetivo`),
  KEY `id_projeto` (`id_projeto`),
  CONSTRAINT `pro_objetivos_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `pro_projeto` (`id_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pro_projeto`
--

DROP TABLE IF EXISTS `pro_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pro_projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(255) DEFAULT NULL,
  `pro_inicio` date DEFAULT NULL,
  `pro_fim` date DEFAULT NULL,
  `pro_feito` varchar(1) DEFAULT 'N',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pro_projeto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pro_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pro_user`
--

DROP TABLE IF EXISTS `pro_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pro_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(255) DEFAULT NULL,
  `pro_user` varchar(255) DEFAULT NULL,
  `pro_senha` varchar(255) DEFAULT NULL,
  `pro_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
