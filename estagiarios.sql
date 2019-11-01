-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Nov-2019 às 13:19
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apontamentos`
--

INSERT INTO `apontamentos` (`ID`, `USER`, `DATA`, `CHEGADA`, `ALMOCO`, `SAIDA`) VALUES
(1, 1, '2019-11-01', '09:00:00', '19:12:00', '21:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `TOKEN` varchar(500) NOT NULL,
  `USER` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `session`
--

INSERT INTO `session` (`TOKEN`, `USER`) VALUES
('af285fd57cfc95dce3404821b3abd825', 'diegton'),
('b94d8d5d594698d59d4b1ed02eb3bf17', 'teste'),
('ce1ff14c710475c9751aac6d9ab87a3b', 'teste'),
('002eb4b21aacba6da3db58d0330edc79', 'teste'),
('d60c3cd13494137ea65e27787859304d', 'teste1'),
('200d88e64e93452b7f63f1d64f9e4572', 'teste2'),
('0e19813545c6a910ec9bf2147921d1a4', 'teste4');

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

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `NOME`, `USER`, `PASSWORD`) VALUES
(1, 'Diegton Rodrigues', 'diegton', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'TESTE', 'teste', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'a', 'teste3', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'a', 'teste2', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'a', 'teste1', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'a', 'teste4', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
