-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema receitas_culinarias
--

CREATE DATABASE IF NOT EXISTS receitas_culinarias;
USE receitas_culinarias;

--
-- Definition of table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `slug_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id_categoria`,`categoria`,`slug_categoria`) VALUES 
 (1,'Sobremesas','sobremesas'),
 (2,'Tortas e bolos','tortas-e-bolos'),
 (3,'Massas','massas'),
 (4,'Carnes','carnes'),
 (5,'Peixes','peixes'),
 (6,'Receitas Rápidas','receitas-rapidas'),
 (7,'Receitas Light','receitas-light'),
 (8,'Sopas','sopas'),
 (9,'Vegetarianas','vegetarianas');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES 
 ('d08a72a5378f3038b54799feb80196a4','0.0.0.0','Mozilla/5.0 (Windows NT 6.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1',1328003493,'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:10:\"mestrecuca\";s:6:\"logado\";b:1;}'),
 ('612c6c13dcf0c12581bcfc9c2cfac9c7','0.0.0.0','Mozilla/5.0 (Windows NT 6.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1',1327967617,'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:10:\"mestrecuca\";s:6:\"logado\";b:1;}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


--
-- Definition of table `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id_receita` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `slug_receita` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `adicionada_quando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_receita`),
  KEY `FK_receitas_categoria` (`categoria`),
  CONSTRAINT `FK_receitas_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receitas`
--

/*!40000 ALTER TABLE `receitas` DISABLE KEYS */;
INSERT INTO `receitas` (`id_receita`,`nome`,`slug_receita`,`texto`,`categoria`,`foto`,`adicionada_quando`) VALUES 
 (1,'Ovo Pochê','ovo-poche','Ingredientes\r\n4 unidade(s) de ovo\r\n1/2 litro(s) de água\r\n2 colher(es) (chá) de sal\r\n1 colher(es) (sobremesa) de vinagre branco\r\n\r\nModo de preparo\r\n1- Coloque a água numa panela e leve ao fogo para ferver, temperando-a com sal e vinagre, assim que isto aconteça. Quebre um ovo numa vasilha à parte e despeje sobre a água fervente. Observe que a água cobre quase todo o ovo, deixando apenas a parte superior da gema descoberta. Isso porque eu queria preparar as gemas moles. Caso as queira duras, coloque mais água.\r\n\r\n2- Deixe-os cozinhar por cerca de um minuto, até que a clara esteja bem branca, sem partes cruas e retire com o auxílio de uma escumadeira. Se gostar, moa pimenta do reino, na hora, sobre os ovos. ',6,'ovo-poche.jpg','2012-01-15 16:50:57'),
 (2,'Gelatina de laranja com chantilly','gelatina-de-laranja-com-chantilly','Ingredientes\r\n\r\n    500ml de suco de laranja coado\r\n    200g de açúcar\r\n    4 folhas de gelatina\r\n    4 colheres (sopa) de licor de laranja\r\n    100ml de creme de leite fresco\r\n    Ramos de hortelã\r\n    Óleo de amendoim\r\n\r\nModo de preparo\r\n\r\nColoque a gelatina em água fria por alguns minutos, escorra e esprema bem.\r\nLeve ao fogo 100ml de suco de laranja.\r\nQuando aquecer, acrescente a gelatina e deixe dissolver, mexendo sempre.\r\nAdicione o açúcar e mais 100ml de suco e cozinhe em fogo baixo, misturando de vez em quando.Retire do fogo antes de ferver e junto o suco restante e o licor de laranja.\r\nCoe o líquido em um coador forrado com um pano limpo e deixe amornar.\r\nDivida a gelatina em 4 forminhas ligeiramente untadas com o óleo, deixe esfriar e leve à geladeira por 2 horas.\r\nPouco antes de servir, bata o creme de leite em ponto de chantili e lave as folhas de hortelã.\r\nDesenforme as gelatinas nos pratos e decore com o creme e a hortelã.',1,'gelatina-laranja-chantilly.jpg','2012-01-15 17:00:40'),
 (3,'Almôndegas de microondas','almondegas-de-microondas','Ingredientes\r\n\r\nCarne:\r\n1/2 kg de carne moída\r\n1 ovo\r\n1 cebola pequena bem picada\r\n3 colheres (sopa) de salsa picada\r\n1 colher (sopa) de queijo parmesão ralado\r\n2 dentes de alho\r\nSal e pimenta do reino a gosto\r\n\r\nMolho:\r\n1 cebola média picada\r\n1 lata de molho de tomate\r\n1/2 xícara (chá) de água\r\n1 pitada de açúcar\r\nSal e pimenta do reino a gosto\r\n\r\nModo de Preparo\r\n\r\nMisture com as mãos a carne moída com o restante dos ingredientes\r\nTempere com sal e pimenta-do-reino a gosto\r\nFaça bolinhos e achate levemente\r\nColoque-os em um refratário e regue com óleo\r\nLeve ao microondas em potência alta por 8 minutos, pare na metade do tempo para mexer\r\nPrepare o molho e cubra as almôndegas\r\nVolte ao forno por 2 minutos\r\nSirva a seguir',6,'almondegas-de-microondas.jpg','2012-01-15 17:09:10'),
 (4,'Onion Rings (Anéis Temperados de Cebola)','onion-rings','Ingredientes\r\n\r\n2 cebolas grandes\r\n2 xícaras de farinha de trigo\r\n2 colheres chá de sal\r\n1 colher chá de pimenta do reino\r\n1/2 xícara maisena\r\n1 xícara de água fria\r\n2 gemas\r\nÓleo suficiente para fritar\r\n1 limão cortado em quatro\r\n\r\nModo de Preparo\r\n\r\nFatie as cebolas em anéis\r\nEm uma tigela média, junte 1/2 xícara de farinha com o sal e a pimenta\r\nPolvilhe os anéis de cebola com a farinha temperada\r\nEm outra tigela, junte o resto da farinha, a maizena, a água e as gemas dos ovos, fazendo uma massa homogênia\r\nEsquente o óleo em uma temperatura de mais ou menos 180º graus\r\nMergulhe na massa os anéis polvilhados\r\nRetire o excesso de massa\r\nMergulhe os anéis no óleo para fritar por 2 a 3 minutos, até ficarem dourados\r\nFica igual aos servidos em churrascarias',6,'onion-rings.jpg','2012-01-15 17:15:56'),
 (5,'Sopa de Legumes','sopa-de-legumes','Ingredientes\r\n1 tomate\r\n1 cebola\r\n2 batatas\r\n2 cenouras\r\n1 caldo de legumes\r\n1 colher de chá de margarina\r\nSal a gosto\r\n\r\nModo de Preparo\r\n\r\nCozinhe todas os legumes em 1,5 litros de água.\r\nBata tudo no liquidificador e leve ao fogo novamente para ferver com o caldo e a margarina.',8,'sopa-de-legumes.jpg','2012-01-15 17:20:52');
/*!40000 ALTER TABLE `receitas` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastrado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`,`usuario`,`senha`,`ativo`,`cadastrado_em`) VALUES 
 (1,'mestrecuca','cozinhar123',1,'2012-01-23 21:55:26');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
