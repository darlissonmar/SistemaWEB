-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 23/05/2012 às 03h16min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `itestev2.0`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_area` (
  `tb_area_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_area_data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tb_area_nome` varchar(30) NOT NULL,
  PRIMARY KEY (`tb_area_id`),
  UNIQUE KEY `tb_area_nome` (`tb_area_nome`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto`
--

CREATE TABLE IF NOT EXISTS `tb_assunto` (
  `tb_assunto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_assunto_nome` varchar(30) NOT NULL,
  `tb_assunto_data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tb_assunto_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_disciplina` (
  `tb_assunto_id` int(10) unsigned NOT NULL,
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_assunto_id`,`tb_disciplina_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_questao` (
  `tb_assunto_id` int(10) unsigned NOT NULL,
  `tb_questao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_assunto_id`,`tb_questao_id`),
  KEY `tb_questao_id` (`tb_questao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `tb_disciplina_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_disciplina_nome` varchar(30) NOT NULL,
  `tb_disciplina_data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tb_disciplina_id`),
  UNIQUE KEY `tb_disciplina_nome` (`tb_disciplina_nome`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina_and_tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina_and_tb_area` (
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  `tb_area_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_disciplina_id`,`tb_area_id`),
  KEY `tb_area_id` (`tb_area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `tb_questao_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_area_id` int(10) unsigned NOT NULL,
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  `tb_questao_enunciado` text NOT NULL,
  `tb_questao_dificuldade` char(1) NOT NULL,
  `tb_questao_op_correta` char(1) NOT NULL,
  `tb_questao_op_1` text NOT NULL,
  `tb_questao_op_2` text NOT NULL,
  `tb_questao_op_3` text NOT NULL,
  `tb_questao_op_4` text NOT NULL,
  `tb_questao_op_5` text NOT NULL,
  `tb_questao_data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tb_questao_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`),
  KEY `tb_area_id` (`tb_area_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `tb_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id_2` int(10) unsigned DEFAULT NULL,
  `tb_user_pnome` varchar(70) NOT NULL,
  `tb_user_unome` varchar(70) NOT NULL,
  `tb_user_email` varchar(50) NOT NULL,
  `tb_user_login` varchar(30) NOT NULL,
  `tb_user_senha` varchar(32) NOT NULL,
  `tb_user_tipo` char(1) NOT NULL,
  `tb_user_sexo` char(1) NOT NULL,
  `tb_user_data_nasc` date NOT NULL,
  `tb_user_end_rua` varchar(30) NOT NULL,
  `tb_user_end_numero` int(11) NOT NULL,
  `tb_user_end_cidade` varchar(30) NOT NULL,
  `tb_user_end_uf` char(2) NOT NULL,
  `tb_user_end_cep` varchar(9) NOT NULL,
  `tb_user_end_comp` varchar(30) DEFAULT NULL,
  `tb_user_end_bairro` varchar(30) NOT NULL,
  `tb_user_telefone` varchar(16) NOT NULL,
  PRIMARY KEY (`tb_user_id`),
  UNIQUE KEY `tb_user_login` (`tb_user_login`,`tb_user_email`),
  KEY `tb_user_id_2` (`tb_user_id_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`tb_user_id`, `tb_user_id_2`, `tb_user_pnome`, `tb_user_unome`, `tb_user_email`, `tb_user_login`, `tb_user_senha`, `tb_user_tipo`, `tb_user_sexo`, `tb_user_data_nasc`, `tb_user_end_rua`, `tb_user_end_numero`, `tb_user_end_cidade`, `tb_user_end_uf`, `tb_user_end_cep`, `tb_user_end_comp`, `tb_user_end_bairro`, `tb_user_telefone`) VALUES
(1, NULL, 'João', 'da Silva', 'joao@gmail.com', 'jsilva', '3dfcab79ed21fd89c9eb25e9864a6155', '1', 'M', '1985-05-22', 'Visconde de Porto Alegre', 2121, 'Manaus', 'AM', '69010-140', 'casa 2', 'Alvorada', '3367-2124');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tb_area`
--
ALTER TABLE `tb_area`
  ADD CONSTRAINT `tb_area_ibfk_1` FOREIGN KEY (`tb_user_id`) REFERENCES `tb_usuarios` (`tb_user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_assunto`
--
ALTER TABLE `tb_assunto`
  ADD CONSTRAINT `tb_assunto_ibfk_1` FOREIGN KEY (`tb_user_id`) REFERENCES `tb_usuarios` (`tb_user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_assunto_and_tb_disciplina`
--
ALTER TABLE `tb_assunto_and_tb_disciplina`
  ADD CONSTRAINT `tb_assunto_and_tb_disciplina_ibfk_1` FOREIGN KEY (`tb_assunto_id`) REFERENCES `tb_assunto` (`tb_assunto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_assunto_and_tb_disciplina_ibfk_2` FOREIGN KEY (`tb_disciplina_id`) REFERENCES `tb_disciplina` (`tb_disciplina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_assunto_and_tb_questao`
--
ALTER TABLE `tb_assunto_and_tb_questao`
  ADD CONSTRAINT `tb_assunto_and_tb_questao_ibfk_1` FOREIGN KEY (`tb_assunto_id`) REFERENCES `tb_assunto` (`tb_assunto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_assunto_and_tb_questao_ibfk_2` FOREIGN KEY (`tb_questao_id`) REFERENCES `tb_questao` (`tb_questao_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD CONSTRAINT `tb_disciplina_ibfk_1` FOREIGN KEY (`tb_user_id`) REFERENCES `tb_usuarios` (`tb_user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_disciplina_and_tb_area`
--
ALTER TABLE `tb_disciplina_and_tb_area`
  ADD CONSTRAINT `tb_disciplina_and_tb_area_ibfk_1` FOREIGN KEY (`tb_disciplina_id`) REFERENCES `tb_disciplina` (`tb_disciplina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_disciplina_and_tb_area_ibfk_2` FOREIGN KEY (`tb_area_id`) REFERENCES `tb_area` (`tb_area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD CONSTRAINT `tb_questao_ibfk_1` FOREIGN KEY (`tb_disciplina_id`) REFERENCES `tb_disciplina` (`tb_disciplina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_questao_ibfk_2` FOREIGN KEY (`tb_area_id`) REFERENCES `tb_area` (`tb_area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_questao_ibfk_3` FOREIGN KEY (`tb_user_id`) REFERENCES `tb_usuarios` (`tb_user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`tb_user_id_2`) REFERENCES `tb_usuarios` (`tb_user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
