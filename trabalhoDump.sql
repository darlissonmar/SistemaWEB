-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/04/2012 às 04h43min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_area` (
  `tb_area_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_area_nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tb_area_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_area`
--

INSERT INTO `tb_area` (`tb_area_id`, `tb_user_id`, `tb_area_nome`) VALUES
(1, 1, 'Informática'),
(2, 1, 'Direito'),
(3, 2, 'Biologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto`
--

CREATE TABLE IF NOT EXISTS `tb_assunto` (
  `tb_asssunto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_assunto_nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tb_asssunto_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_assunto`
--

INSERT INTO `tb_assunto` (`tb_asssunto_id`, `tb_user_id`, `tb_assunto_nome`) VALUES
(1, 1, 'Serviço Público'),
(2, 1, 'SQL'),
(3, 1, 'Threads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_disciplina` (
  `tb_asssunto_id` int(10) unsigned NOT NULL,
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_asssunto_id`,`tb_disciplina_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_assunto_and_tb_disciplina`
--

INSERT INTO `tb_assunto_and_tb_disciplina` (`tb_asssunto_id`, `tb_disciplina_id`) VALUES
(3, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_questao` (
  `tb_asssunto_id` int(10) unsigned NOT NULL,
  `tb_questao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_asssunto_id`,`tb_questao_id`),
  KEY `tb_questao_id` (`tb_questao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_assunto_and_tb_questao`
--

INSERT INTO `tb_assunto_and_tb_questao` (`tb_asssunto_id`, `tb_questao_id`) VALUES
(1, 1),
(3, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `tb_disciplina_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_disciplina_nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tb_disciplina_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`tb_disciplina_id`, `tb_user_id`, `tb_disciplina_nome`) VALUES
(1, 1, 'Sistemas Operacionais'),
(2, 2, 'Banco de Dados'),
(3, 1, 'Direito Administrativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina_and_tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina_and_tb_area` (
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  `tb_area_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tb_disciplina_id`,`tb_area_id`),
  KEY `tb_area_id` (`tb_area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_disciplina_and_tb_area`
--

INSERT INTO `tb_disciplina_and_tb_area` (`tb_disciplina_id`, `tb_area_id`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `tb_questao_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id` int(10) unsigned DEFAULT NULL,
  `tb_area_id` int(10) unsigned NOT NULL,
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  `tb_questao_enunciado` text CHARACTER SET latin1 NOT NULL,
  `tb_questao_dificuldade` char(1) CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_correta` char(1) CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_1` text CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_2` text CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_3` text CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_4` text CHARACTER SET latin1 NOT NULL,
  `tb_questao_op_5` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tb_questao_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`),
  KEY `tb_area_id` (`tb_area_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`tb_questao_id`, `tb_user_id`, `tb_area_id`, `tb_disciplina_id`, `tb_questao_enunciado`, `tb_questao_dificuldade`, `tb_questao_op_correta`, `tb_questao_op_1`, `tb_questao_op_2`, `tb_questao_op_3`, `tb_questao_op_4`, `tb_questao_op_5`) VALUES
(1, 1, 2, 2, '[FCC-2012/TCE-SP] – De acordo com a Constituição Federal, a prestação de serviço público por particular é:', '4', '5', 'vedada, em qualquer hipótese.', 'permitida, apenas quando se tratar de serviço não essencial, passível de cobrança de tarifa.', 'possível, apenas para aqueles serviços de titularidade não exclusiva de Estado.', 'vedada, exceto quando contar com autorização legislativa específica.', 'permitida, na forma da lei, mediante concessão ou permissão, precedida de licitação.'),
(2, 2, 1, 1, 'Nos sistemas operacionais, múltiplas execuções que ocorrem no mesmo ambiente do processo com um grande grau de independência uma da outra é uma característica do modelo de processo que contempla o conceito de:', '1', '3', 'bus', 'switch', 'thread', 'disk array', 'split-cylinder'),
(3, 2, 1, 2, 'Na linguagem SQL a clausula SELECT é usada para a seleção de atributos em uma tabela. A palavra chave que podemos inserir após a clausula SELECT e que elimina as linhas duplicadas no resultado de uma consulta é:', '2', '2', 'GROUP', 'DISTINCT', 'BETWEEN', 'ASC', 'HAVING'),
(4, 2, 1, 2, 'A Linguagem de Definição de Dados permite alteração de dados no catálogo do sistema. Os comandos que integram esta classe são:', '3', '1', 'CREATE, ALTER e DROP', 'CREATE, DELETE e UPDATE', 'ALTER, DROP e UPDATE', 'DROP, DELETE e ALTER', 'ALTER, DELETE e CREATE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `tb_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_id_2` int(10) unsigned DEFAULT NULL,
  `tb_user_pnome` varchar(70) CHARACTER SET latin1 NOT NULL,
  `tb_user_unome` varchar(70) CHARACTER SET latin1 NOT NULL,
  `tb_user_email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tb_user_login` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tb_user_senha` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tb_user_tipo` char(1) CHARACTER SET latin1 NOT NULL,
  `tb_user_sexo` char(1) CHARACTER SET latin1 NOT NULL,
  `tb_user_data_nasc` date NOT NULL,
  `tb_user_end_rua` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tb_user_end_numero` int(11) NOT NULL,
  `tb_user_end_cidade` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tb_user_end_uf` char(2) CHARACTER SET latin1 NOT NULL,
  `tb_user_end_cep` varchar(9) CHARACTER SET latin1 NOT NULL,
  `tb_user_end_comp` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tb_user_end_bairro` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tb_user_telefone` varchar(16) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tb_user_id`),
  UNIQUE KEY `tb_user_login` (`tb_user_login`,`tb_user_email`),
  KEY `tb_user_id_2` (`tb_user_id_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`tb_user_id`, `tb_user_id_2`, `tb_user_pnome`, `tb_user_unome`, `tb_user_email`, `tb_user_login`, `tb_user_senha`, `tb_user_tipo`, `tb_user_sexo`, `tb_user_data_nasc`, `tb_user_end_rua`, `tb_user_end_numero`, `tb_user_end_cidade`, `tb_user_end_uf`, `tb_user_end_cep`, `tb_user_end_comp`, `tb_user_end_bairro`, `tb_user_telefone`) VALUES
(1, NULL, 'João', 'da Silva', 'joao@gmail.com', 'jsilva', 'joao123', '1', 'M', '1982-04-10', 'Visconde de Porto Alegre', 2121, 'Manaus', 'AM', '69010-140', NULL, 'Alvorada', '3367-2124'),
(2, 1, 'Maria', 'Pereira', 'maria@gmail.com', 'mpereira', 'maria123', '2', 'F', '1983-04-10', 'São Gabriel da Cachoeira', 2001, 'Manaus', 'AM', '69050-120', 'casa 2', 'Aleixo', '3367-1418'),
(3, 1, 'Jorginho', 'Gomes', 'jojo@hotmail.com', 'jgomes', 'jorginho123', '3', 'M', '1992-04-10', 'Ramos Ferreira', 1115, 'Manaus', 'AM', '69021-121', NULL, 'Centro', '2101-1417');

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
  ADD CONSTRAINT `tb_assunto_and_tb_disciplina_ibfk_1` FOREIGN KEY (`tb_asssunto_id`) REFERENCES `tb_assunto` (`tb_asssunto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_assunto_and_tb_disciplina_ibfk_2` FOREIGN KEY (`tb_disciplina_id`) REFERENCES `tb_disciplina` (`tb_disciplina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_assunto_and_tb_questao`
--
ALTER TABLE `tb_assunto_and_tb_questao`
  ADD CONSTRAINT `tb_assunto_and_tb_questao_ibfk_1` FOREIGN KEY (`tb_asssunto_id`) REFERENCES `tb_assunto` (`tb_asssunto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
