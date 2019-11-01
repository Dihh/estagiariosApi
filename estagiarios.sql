-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Nov-2019 às 21:25
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apontamentos`
--

INSERT INTO `apontamentos` (`ID`, `USER`, `DATA`, `CHEGADA`, `ALMOCO`, `SAIDA`) VALUES
(8, 10, '2019-11-02', '07:00:00', '15:00:00', '20:00:00'),
(10, 16, '2019-11-02', '00:00:00', '00:00:00', '00:00:00'),
(7, 10, '2019-11-01', '07:00:00', '12:00:00', '15:00:00'),
(9, 16, '2019-11-01', '00:00:00', '00:00:00', '00:00:00');

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

--
-- Extraindo dados da tabela `session`
--

INSERT INTO `session` (`TOKEN`, `USER`) VALUES
('902309b0de6321ec0bfb37c9607f7053', 10),
('232874b6f6276f42b27d53e13380f895', 16);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `NOME`, `USER`, `PASSWORD`) VALUES
(10, 'Diegton Rodrigues Barbosa', 'diegton', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'teste', 'teste', 'd41d8cd98f00b204e9800998ecf8427e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
