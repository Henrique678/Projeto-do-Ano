-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20/09/2024 às 13:47
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pit`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  idPlace int DEFAULT NULL,
  nota int DEFAULT NULL,
  KEY `idPlace` (`idPlace`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComent` int NOT NULL AUTO_INCREMENT,
  `coment` varchar(200) NOT NULL,
  `datahora` timestamp NOT NULL,
  `fk_idUser` int NOT NULL,
  PRIMARY KEY (`idComent`),
  KEY `fk_idUser` (`fk_idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`idComent`, `coment`, `datahora`, `fk_idUser`) VALUES
(127, ' ', '2024-09-20 04:54:59', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `idFav` int NOT NULL AUTO_INCREMENT,
  `fk_idUser` int NOT NULL,
  `fk_idPlace` int NOT NULL,
  PRIMARY KEY (`idFav`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `idPlace` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `categoria` varchar(40) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `endereco` varchar(60) NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `telefone` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emailPlace` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hr_segunda` char(11) DEFAULT NULL,
  `hr_terca` char(11) DEFAULT NULL,
  `hr_quarta` char(11) DEFAULT NULL,
  `hr_quinta` char(11) DEFAULT NULL,
  `hr_sexta` char(11) DEFAULT NULL,
  `hr_sabada` char(11) DEFAULT NULL,
  `hr_domingo` char(11) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `insta` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPlace`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `places`
--

INSERT INTO `places` (`idPlace`, `nome`, `categoria`, `descricao`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `telefone`, `emailPlace`, `hr_segunda`, `hr_terca`, `hr_quarta`, `hr_quinta`, `hr_sexta`, `hr_sabada`, `hr_domingo`, `site`, `insta`, `img`) VALUES
(1, 'Mercado Central', 'Comércio', 'Animado mercado indoor com alimentos, artesanato e souvenirs, além de bares e restaurantes informais.', 'Av. Augusto de Lima', 744, 'Centro', 'Belo Horizonte', '30190-922', '(31) 3274-9434', 'faleconosco@mercadocentral.com.br', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-13:00', 'https://mercadocentral.com.br', '@mercadocentralbh', 'https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `name` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `senha` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `name`, `email`, `senha`) VALUES
(18, 'jair', 'jair@gmail.com', '1234'),
(17, 'Matheus', 'matbraga14@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
