-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Nov-2019 às 17:16
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estagiarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apontamentos`
--

DROP TABLE IF EXISTS `apontamentos`;
CREATE TABLE IF NOT EXISTS `apontamentos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `CHEGADA` time DEFAULT NULL,
  `ALMOCO` time DEFAULT NULL,
  `SAIDA` time DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `TOKEN` varchar(500) NOT NULL,
  `USER` int(11) NOT NULL,
  PRIMARY KEY (`USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(500) NOT NULL,
  `USER` varchar(500) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
