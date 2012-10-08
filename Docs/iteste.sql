-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 23, 2012 as 10:49 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `bancodedados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_area` (
  `tb_area_id` int(10) unsigned NOT NULL auto_increment,
  `tb_user_id` int(10) unsigned default NULL,
  `tb_area_data_cad` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `tb_area_nome` varchar(30) NOT NULL,
  PRIMARY KEY  (`tb_area_id`),
  UNIQUE KEY `tb_area_nome` (`tb_area_nome`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_area`
--

INSERT INTO `tb_area` (`tb_area_id`, `tb_user_id`, `tb_area_data_cad`, `tb_area_nome`) VALUES
(1, 2, '2012-05-23 00:41:25', 'Biologia'),
(2, 1, '2012-05-23 10:58:01', 'História'),
(3, 2, '2012-05-23 18:16:41', 'Lingua Estrangeira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto`
--

CREATE TABLE IF NOT EXISTS `tb_assunto` (
  `tb_assunto_id` int(10) unsigned NOT NULL auto_increment,
  `tb_user_id` int(10) unsigned default NULL,
  `tb_assunto_nome` varchar(30) NOT NULL,
  `tb_assunto_data_cad` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tb_assunto_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_assunto`
--

INSERT INTO `tb_assunto` (`tb_assunto_id`, `tb_user_id`, `tb_assunto_nome`, `tb_assunto_data_cad`) VALUES
(1, 1, 'células procariontes', '2012-05-23 00:37:42'),
(2, 1, 'Brasil Colônia', '2012-05-23 10:59:28'),
(3, 2, 'Gerúndio', '2012-05-23 18:19:25'),
(4, 3, 'Imperialismo e Primeira Guerra', '2012-05-23 18:38:59'),
(5, 2, 'Digestão', '2012-05-23 20:58:06'),
(6, 1, 'Artigos', '2012-05-23 21:35:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_disciplina` (
  `tb_assunto_id` int(10) unsigned NOT NULL,
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`tb_assunto_id`,`tb_disciplina_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_assunto_and_tb_disciplina`
--

INSERT INTO `tb_assunto_and_tb_disciplina` (`tb_assunto_id`, `tb_disciplina_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto_and_tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_assunto_and_tb_questao` (
  `tb_assunto_id` int(10) unsigned NOT NULL,
  `tb_questao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`tb_assunto_id`,`tb_questao_id`),
  KEY `tb_questao_id` (`tb_questao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_assunto_and_tb_questao`
--

INSERT INTO `tb_assunto_and_tb_questao` (`tb_assunto_id`, `tb_questao_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(6, 38),
(6, 39),
(6, 40),
(6, 41),
(6, 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `tb_disciplina_id` int(10) unsigned NOT NULL auto_increment,
  `tb_user_id` int(10) unsigned default NULL,
  `tb_disciplina_nome` varchar(30) NOT NULL,
  `tb_disciplina_data_cad` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tb_disciplina_id`),
  UNIQUE KEY `tb_disciplina_nome` (`tb_disciplina_nome`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`tb_disciplina_id`, `tb_user_id`, `tb_disciplina_nome`, `tb_disciplina_data_cad`) VALUES
(1, 2, 'Biologia Celular', '2012-05-23 00:42:17'),
(2, 1, 'História do Brasil', '2012-05-23 10:58:45'),
(3, 2, 'Inglês', '2012-05-23 18:17:32'),
(4, 3, 'História Geral', '2012-05-23 18:38:34'),
(5, 1, 'Fisiologia-Anatonia Humana', '2012-05-23 20:57:42'),
(6, 2, 'Espanhol', '2012-05-23 21:35:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina_and_tb_area`
--

CREATE TABLE IF NOT EXISTS `tb_disciplina_and_tb_area` (
  `tb_disciplina_id` int(10) unsigned NOT NULL,
  `tb_area_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`tb_disciplina_id`,`tb_area_id`),
  KEY `tb_area_id` (`tb_area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_disciplina_and_tb_area`
--

INSERT INTO `tb_disciplina_and_tb_area` (`tb_disciplina_id`, `tb_area_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 1),
(6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `tb_questao_id` int(10) unsigned NOT NULL auto_increment,
  `tb_user_id` int(10) unsigned default NULL,
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
  `tb_questao_data_cad` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tb_questao_id`),
  KEY `tb_disciplina_id` (`tb_disciplina_id`),
  KEY `tb_area_id` (`tb_area_id`),
  KEY `tb_user_id` (`tb_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`tb_questao_id`, `tb_user_id`, `tb_area_id`, `tb_disciplina_id`, `tb_questao_enunciado`, `tb_questao_dificuldade`, `tb_questao_op_correta`, `tb_questao_op_1`, `tb_questao_op_2`, `tb_questao_op_3`, `tb_questao_op_4`, `tb_questao_op_5`, `tb_questao_data_cad`) VALUES
(1, 2, 1, 1, 'Qual a estrutura de uma célula procarionte?', '1', '1', 'Parede celular,Membrana plasmática,Citoplasma apenas com ribossomos,Nucleóide – núcleo primitivo, sem carioteca e sem nucléolos.', 'Apenas parede celular', 'Citoplasma sem ribossomos,Nucleóide – núcleo primitivo, sem carioteca e sem nucléolos.', 'Nucleóide – núcleo primitivo, com carioteca e sem nucléolos.', 'Parede celular,sem membrana plasmática,Citoplasma completo,Nucleóide – núcleo primitivo, sem carioteca e sem nucléolos.', '2012-05-23 00:09:50'),
(2, 2, 1, 1, '(PUCC) A única organela citoplasmática da célula procarionte é:', '1', '2', 'mitocôndria', 'ribossomo', 'lisossomo', 'dictiossomo', 'mesossomo', '2012-05-23 00:12:02'),
(3, 3, 1, 1, '(UFGO) As bactérias são seres procariontes porque:', '1', '3', 'podem apresentar “formas de resistência” que são os esporos;', 'possuem uma parede celular espessa, constituída de polissacarídeos, proteínas e lipídeos;', 'não possuem núcleo organizado envolto pela carioteca;', 'possuem estrutura locomotoras denominadas flagelos;', 'podem-se reproduzir sexuadamente por conjugação.', '2012-05-23 00:18:05'),
(4, 2, 1, 1, '(UNIRIO – RJ) – Assinale a opção que contém apenas seres\r\nprocariontes:', '1', '2', 'vegetais e bactérias', 'cianofíceas e bactérias', 'algas e fungos', 'protozoários e fungos', 'algas e cianofíceas', '2012-05-23 00:24:45'),
(5, 2, 1, 1, '(FUVEST – SP) – O organismo A é um parasita intracelular\r\nconstituído por uma cápsula protéica que envolve a molécula de\r\nácido nucléico. O organismo B tem um membrana lipoprotéica\r\nrevestida por uma parede rica em polissacarídeos que envolvem um\r\ncitoplasma , onde se encontra seu material genético, constituído por\r\numa molécula circular de DNA. Esses organismos são,\r\nrespectivamente :', '1', '4', 'uma bactéria e um vírus.', 'um vírus e um fungo.', 'uma bactéria e um fungo.', 'um vírus e uma bactéria.', 'um vírus e um protozoário.\r\n', '2012-05-23 00:30:16'),
(6, 3, 1, 1, '(UEL-PR) Qual das organelas celulares mencionadas abaixo possui menor valor adaptativo para microorganismos que habitam os fundos dos oceanos?', '1', '4', 'Vacúolo', 'Mitocôndria', 'Ribossomo', 'Cloroplasto', 'Centríolo', '2012-05-23 10:26:47'),
(7, 1, 1, 1, '(PUC-RS) Responder à questão relacionando as estruturas presentes na coluna I com as informações presentes na coluna II.\r\n\r\nColuna I\r\n(     ) mitocôndrios\r\n(     ) centríolos\r\n(     ) DNA\r\n(     ) ribossomos\r\n(     ) proteínas\r\n(     ) peroxissomos\r\n(     ) RNA\r\n\r\nColuna II\r\n1. presente apenas nas células eucariotas\r\n2. presente apenas nas células procariotas.\r\n3. presente tanto em células eucariotas como em procariotas\r\nA ordem correta dos parênteses da coluna I, de cima para baixo, é:', '1', '1', '1 – 1 – 3 – 3 – 3 – 1 – 3', '1 – 2 – 3 – 1 – 1 – 2 – 1', '2 – 1 – 1 – 2 – 3 – 1 – 2', '2 – 2 – 3 – 3 – 3 – 2 – 3', '3 – 1 – 2 – 3 – 1 – 2 – 1', '2012-05-23 10:28:51'),
(8, 1, 1, 1, '(Mackenzie-SP) Assinale a alternativa que apresenta estruturas encontradas em todos os tipos de células.', '1', '4', 'Núcleo, mitocôndrias e ribossomos.', 'Parede celular, ribossomos e nucléolo.', 'Centríolo, complexo de Golgi e núcleo', 'Ribossomos, membrana plasmática e hialoplasma.', 'Hialoplasma, carioteca e retículo endoplasmático.', '2012-05-23 10:31:41'),
(9, 1, 1, 1, '(Fuvest-SP) As principais diferenças entre célula vegetal típica e uma célula animal típica são:', '1', '4', 'presença de membrana plasmática e núcleo nas células animais e ausência destas estruturas nas células vegetais.', 'presença de mitocôndrias e plastos nas células vegetais e ausência destas estruturas nas células animais.', 'presença de complexo de Golgi e mitocôndrias nas células animais e ausência destas estruturas nas células vegetais.', 'presença de plastos e parede celulósica nas células vegetais e ausência destas estruturas nas células animais.', 'presença de mitocôndrias e parede celulósica nas células vegetais e ausência destas estruturas nas células animais.', '2012-05-23 10:33:11'),
(10, 1, 1, 1, '(UFMT) Quais são as respectivas organelas da célula vegetal responsáveis pela respiração, regulação osmótica e síntese de proteína?', '1', '5', 'Mitocôndria, complexo de Golgi e retículo endoplasmático.', 'Mitocôndria, vacúolo e lisossoma.', 'Ribossoma, vacúolo e complexo de Golgi.', 'Ribossoma, plasmalema e cromoplasto.', 'Mitocôndria, vacúolo e ribossoma.', '2012-05-23 10:35:23'),
(11, 1, 1, 1, '(UFCE) Qual das alternativas abaixo contém duas organelas citoplasmáticas que são encontradas em células tanto de animais quanto de vegetais superiores?', '1', '3', 'Plasto e vacúolo.', 'Centríolo e vacúolo.', 'Mitocôndria e ribossomo.', 'Mitocôndria e centríolo.', 'Lisossomo e plasto.', '2012-05-23 10:36:52'),
(12, 1, 1, 1, '(UFU-MG) Considerando uma célula vegetal típica, dê o nome de cada estrutura ou composto cuja função é respectivamente citada abaixo pelas letras de A a E.\r\na) Organela fotossintetizante:\r\nb) Organela responsável pela respiração celular:\r\nc) Organela na qual várias substâncias são armazenadas, porém nenhuma substância é ali produzida. Essa organela ocupa um grande espaço intracelular:\r\nd) Principal carboidrato de reserva, é armazenado na forma de grãos insolúveis:\r\ne) Principal constituinte da membrana celulósica:', '1', '1', 'a) cloroplasto\r\nb) mitocôndria\r\nc) vacúolo\r\nd) amido\r\ne) celulose', 'a) leocócitos\r\nb) mitocôndria\r\nc) cloroplasto\r\nd) amido\r\ne) celulose', ' as estruturas não correspondem a uma célula vegetal', 'a) enzima\r\nb) mitocôndria\r\nc) cloroplasto\r\nd) amido\r\ne) leocócitos', 'a) amônia\r\nb) mitocôndria\r\nc) cloroplasto\r\nd) álcool\r\ne) leocócitos', '2012-05-23 10:41:36'),
(13, 1, 1, 1, '10. (UFPE) As células eucarióticas, animal e vegetal, embora guardem semelhanças estruturais e funcionais, apresentam importantes diferenças. Analise as proposições a seguir e assinale a alternativa correta.\r\n1) Os vacúolos das células vegetais atuam na digestão intracelular, visto que nestas células não há lisossomos como nas células animais.\r\n2) O retículo endoplasmático rugoso e o aparelho de Golgi estão presentes tanto em células animais quanto em células vegetais.\r\n3) Os centríolos, estruturas relacionadas aos movimentos cromossômicos, são ausentes na maioria dos animais e amplamente difundidos entre os vegetais superiores.\r\n4) Os cloroplastos bem como a parede celular estão presentes em células vegetais.\r\n5) Nas células vegetais, não há membrana plasmática, uma vez que a parede celular existente já é suficientemente forte.\r\nEstão corretas apenas:', '1', '4', '1, 3 e 5', '1, 2 e 3', '2, 3 e 4', '2 e 4', '1, 2, 3 e 4', '2012-05-23 10:43:07'),
(14, 1, 1, 1, '(UFU-MG) As células animais diferem das células vegetais no que diz respeito a algumas estruturas e organelas.\r\nEnumere três características específicas de vegetais, apontando suas funções celulares.', '1', '1', '1) Presença de grandes vacúolos: controle osmótico e armazenamento de substâncias.\r\n2) presença de cloroplastos: fotossíntese.\r\n3) Plasmodesmos: aberturas presentes na parede celular que permitem trocas de substâncias entre células vizinhas', '1)Sem Presença de grandes vacúolos: controle osmótico e armazenamento de substâncias.\r\n2) presença de cloroplastos: sem fotossíntese.\r\n3) Plasmodesmos e ribossomos: aberturas presentes na parede celular que permitem trocas de substâncias entre células vizinhas', '1) Presença de pequenos vacúolos: controle osmótico e sem armazenamento de substâncias.\r\n2) presença de amido.\r\n3) Plasmodesmos: aberturas presentes na parede celular que permitem trocas de substâncias entre células vizinhas', '1) Presença de enzimas: controle osmótico e armazenamento de substâncias.\r\n2) presença de cloroplastos: fotossíntese.\r\n3) Plasmodesmos: aberturas presentes na parede celular que permitem trocas de substâncias entre células vizinhas', '1)presença de clorofila\r\n2) presença de cloroplastos: fotossíntese.\r\n3) Plasmodesmos: aberturas presentes na parede celular que permitem trocas de substâncias entre células vizinhas', '2012-05-23 10:46:56'),
(15, 1, 1, 1, 'Durante a evolução celular surgiram subdivisões membranosas, originando organelas, tais como lisossomos e peroxissomos, nas quais um conjunto de enzimas opera sem a interferência das demais reações que ocorrem em outros compartimentos internos. A célula assim formada constitui o corpo de: ', '1', '5', 'arqueobactérias. ', 'eubactérias. ', 'cianobactérias.', 'micoplasmas. ', 'eucariontes.', '2012-05-23 10:49:05'),
(16, 1, 1, 1, 'Assinale o elemento que NÃO é um componente de uma célula eucariota heterótrofa: ', '2', '3', 'Carioteca.', 'Mitocôndria.', 'Cloroplasto. ', 'DNA. ', 'RNA.', '2012-05-23 10:50:25'),
(17, 2, 2, 2, '(Fuvest-SP) Os primitivos habitantes do Brasil foram vítimas do processo colonizador. O europeu, com visão de mundo calcada em preconceitos, menosprezou o indígena e sua cultura. A acreditar nos viajantes e missionários, a partir de meados do século XVI, há um decréscimo da população indígena, que se agrava nos séculos seguintes. Os fatores que mais contribuíram para o citado decréscimo foram:', '3', '5', 'a captura e a venda do índio para o trabalho nas minas de prata do Potosí.', 'as guerras permanentes entre as tribos indígenas e entre índios e brancos', 'o canibalismo, o sentido mítico das práticas rituais, o espírito sanguinário, cruel e vingativo dos naturais', 'as missões jesuíticas do vale amazônico e a exploração do trabalho indígena na extração da borracha.', 'as epidemias introduzidas pelo invasor europeu e a escravidão dos índios.', '2012-05-23 11:01:54'),
(18, 2, 2, 2, '(UFMG) Leia o texto.\r\n“A língua de que [os índios] usam, toda pela costa, é uma: ainda que em certos vocábulos difere em algumas partes; mas não de maneira que se deixem de entender. (...) Carece de três letras, convém a saber, não se acha nela F, nem L, nem R, coisa digna de espanto, porque assim não tem Fé, nem Lei, nem Rei, e desta maneira vivem desordenadamente (...)."\r\n(GANDAVO, Pero de Magalhães, História da Província de Santa Cruz, 1578.)\r\n\r\nA partir do texto, pode-se afirmar que todas as alternativas expressam a relação dos portugueses com a cultura indígena, exceto:', '3', '1', 'A busca de compreensão da cultura indígena era uma preocupação do colonizador.', 'A desorganização social dos indígenas se refletia no idioma.', 'A diferença cultural entre nativos e colonos era atribuída à inferioridade do indígena.', 'A língua dos nativos era caracterizada pela limitação vocabular.', 'Os signos e símbolos dos nativos da costa marítima eram homogêneos.', '2012-05-23 11:03:24'),
(19, 2, 2, 2, '(Fuvest-SP) A sociedade colonial brasileira "herdou concepções clássicas e medievais de organização e hierarquia, mas acrescentou-lhe sistemas de graduação que se originaram da diferenciação das ocupações, raça, cor e condição social. (...) as distinções essenciais entre fidalgos e plebeus tenderam a nivelar-se, pois o mar de indígenas que cercava os colonizadores portugueses tornava todo europeu, de fato, um gentil-homem em potencial. A disponibilidade de índios como escravos ou trabalhadores possibilitava aos imigrantes concretizar seus sonhos de nobreza. (...) Com índios, podia desfrutar de uma vida verdadeiramente nobre. O gentio transformou-se\r\n\r\nem um substituto do campesinato, um novo estado, que permitiu uma reorganização de categorias tradicionais. Contudo, o fato de serem aborígines e, mais tarde, os africanos, diferentes étnica, religiosa e fenotipicamente dos europeus, criou oportunidades para novas distinções e hierarquias baseadas na cultura e na cor."\r\n(Stuart B. Schwartz, Segredos internos.)\r\n\r\nA partir do texto pode-se concluir que', '3', '4', 'a diferenciação clássica e medieval entre clero, nobreza e campesinato, existente na Europa, foi transferida para o Brasil por intermédio de Portugal e se constituiu no elemento fundamental da sociedade brasileira colonial.', 'a presença de índios e negros na sociedade brasileira levou ao surgimento de instituições como a escravidão, completamente desconhecida da sociedade européia nos séculos XV e XVI.', 'os índios do Brasil, por serem em pequena quantidade e terem sido facilmente dominados, não tiveram nenhum tipo de influência sobre a constituição da sociedade colonial.', 'a diferenciação de raças, culturas e condição social entre brancos e índios, brancos e negros tendeu a diluir a distinção clássica e medieval entre fidalgos e plebeus europeus na sociedade.', 'a existência de uma realidade diferente no Brasil, como a escravidão em larga escala de negros, não alterou em nenhum aspecto as concepções medievais dos portugueses durante os séculos XVI e XVII.', '2012-05-23 11:05:16'),
(20, 2, 2, 2, '(UFMG) Todas as alternativas apresentam fatores que explicam a primazia dos portugueses no cenário dos grandes descobrimentos, exceto', '3', '2', 'a atuação empreendedora da burguesia lusa no desenvolvimento da indústria náutica.', 'a localização geográfica de Portugal, distante do Mediterrâneo oriental e sem ligações comerciais com o restante do continente.', 'a presença da fé e o espírito da cavalaria e das cruzadas que atribuíam aos portugueses a missão de cristianizar os povos chamados "infiéis".', 'o aparecimento pioneiro da monarquia absolutista em Portugal responsável pela formação do Estado moderno.', 'a presença da fé e o espírito da cavalaria e das cruzadas que atribuíam aos franceses a missão de cristianizar os povos chamados "fiéis".', '2012-05-23 11:08:13'),
(21, 2, 2, 2, '(FESO-RJ) "O governo-geral foi instituído por D. João III, em 1548, para coordenar as práticas colonizadoras do Brasil. Consistiriam estas últimas em dar às capitanias hereditárias uma assistência mais eficiente e promover a valorização econômica e o povoamento das áreas não ocupadas pelos donatários."\r\n(Manoel Maurício de Albuquerque. Pequena história da formação social brasileira. Rio de Janeiro: Graal, 1984. p. 180.)\r\n\r\nAs afirmativas abaixo identificam corretamente algumas das atribuições do governador-geral, à exceção de:', '3', '5', 'Estimular e realizar expedições desbravadoras de regiões interiores, visando, entre outros aspectos, à descoberta de metais preciosos.', 'Visitar e fiscalizar as capitanias hereditárias e reais, especialmente aquelas que vivenciavam problemas quanto ao povoamento e à exploração das terras.', 'Distribuir sesmarias, particularmente para os beneficiários que comprovassem rendas e meios de valorizar economicamente as terras recebidas.', 'Regular as alianças com tribos indígenas, controlando e limitando a ação das ordens religiosas, em especial da Companhia de Jesus.', 'Organizar a defesa da costa e promover o desenvolvimento da construção naval e do comércio de cabotagem.', '2012-05-23 11:09:51'),
(22, 2, 3, 3, '(UGF \r\n\r\n– RJ) Listen to John ! He ___________ the guitar for you', '1', '1', 'is playing', 'plays', 'play', 'playing', 'to be', '2012-05-23 18:21:25'),
(23, 1, 3, 3, '(U.F. São Carlos – SP) He ______ The Times now, but on Fridays he ______ The Observer', '1', '1', 'is reading/reads', 'reads/is reading', 'is reading/read', 'read/reads', 'did read/reads', '2012-05-23 18:24:05'),
(24, 2, 3, 3, '(UbnB) At the moment the boss _______ an interview', '1', '4', 'give', 'gives', 'are giving', 'is giving', 'we give', '2012-05-23 18:26:25'),
(25, 1, 3, 3, '(UC – MG) Don’t talk so loud. The young man _________', '1', '1', 'is sleeping', 'sleep', 'sleeps', 'are sleeping', 'are sleep', '2012-05-23 18:27:50'),
(26, 3, 3, 3, '(FUVEST – SP) Listen ! Someone __________ the piano now', '1', '1', 'is playing', 'are playing', 'plays', 'playing', 'play is', '2012-05-23 18:30:02'),
(27, 2, 2, 4, 'Quais países ou continentes fizeram parte da Segunda Revolução Industrial?', '4', '3', 'Inglaterra, Estados Unidos, Itália e URSS.', 'Inglaterra, Estados Unidos, URSS e Ásia.', 'Estados Unidos, Japão e Europa.', 'Itália, Estados Unidos, Japão e Ásia.', 'Brasil,China,México e Uruguai', '2012-05-23 18:42:19'),
(28, 2, 2, 4, 'O que é capitalismo monopolista?', '4', '2', 'Imenso número de empresas disputam o mercado.', 'Grupo restrito de grandes empresas dominam praticamente sozinhas o mercado.', 'O mercado é dominado pelas multinacionais\r\n', 'Grupo restrito de transnacionais dominam o mercado', 'nda', '2012-05-23 18:44:30'),
(29, 2, 2, 4, 'A Segunda Revolução Industrial foi simbolizada pelo:', '4', '4', 'Ferro, carvão e energia a vapor.', 'Ferro, carvão e eletricidade.', 'Aço e novas fontes de energia (carvão e energia a vapor).', 'Aço e novas fontes de energia (eletricidade e petróleo).', 'papel e madeira', '2012-05-23 18:47:34'),
(30, 1, 2, 4, 'O que é Imperialismo?', '4', '1', 'Política de ocupação territorial e econômica praticada pelas potências capitalistas do Ocidente.', 'Política de dominação econômica desenvolvida a partir da exploração da mão de obra dos países periféricos.', 'Política de dominação econômica a partir da exploração da mão de obra e da matéria-prima.', 'Política de ocupação territorial e econômica praticada pela Alemanha durante a Segunda Guerra Mundial.', 'Política de desocupação territorial e econômica praticada pela França durante a Terceira Guerra Mundial.', '2012-05-23 18:49:10'),
(31, 2, 2, 4, 'São medidas protecionistas:', '4', '2', 'Criação de novos mercados coloniais.', 'Elevação das taxas alfandegárias e restrições às importações.', 'Criação de novos mercados coloniais e livre importação de matéria-prima.', 'Elevação das taxas alfandegárias e liberação das importações', 'Criação de novos mercados territoriais.', '2012-05-23 18:50:45'),
(32, 2, 2, 4, 'Como começou a Iª Guerra Mundial?', '4', '3', 'O não cumprimento do Tratado de Versalhes pela Alemanha.', 'Assassinato do primeiro-ministro francês General De Gaulle.', 'Assassinato do príncipe herdeiro do trono austríaco Francisco Ferdinando.', 'A Revolução Socialista em 1917 na URSS.\r\n', 'nda', '2012-05-23 20:36:27'),
(33, 2, 1, 5, 'FUVEST-SP) Qual dos órgãos humanos abaixo citados não produz enzimas digestivas?', '3', '3', 'glândulas salivares', 'estômago', 'vesícula biliar', 'jejuno-íleo', 'pâncreas', '2012-05-23 20:56:21'),
(34, 1, 1, 5, '(CESESP-PE) A pepsina é uma importante enzima digestiva cujos substratos são:', '3', '1', 'proteínas', 'glicídios', 'lipídios', 'ácidos graxos', 'monossacarídeos', '2012-05-23 20:59:54'),
(35, 1, 1, 5, '(EPFESP-PE) Em indivíduos humanos normais, o canal colédoco estabelece uma comunicação anatômica entre:\r\n', '3', '4', 'o fígado e a vesícula biliar\r\n', 'a vesícula biliar e o jejuno\r\n', 'a vesícula biliar e o íleo\r\n', 'a vesícula biliar e o duodeno\r\n', 'a vesícula biliar e o ceco', '2012-05-23 21:02:31'),
(36, 2, 1, 5, '(UFRGS-RS). Heterótrofa é a nutrição de organismos incapazes de sintetizar compostos orgânicos a partir de inorgânicos. São heterótrofos:', '3', '1', 'os animais, os fungos e a maioria das bactérias', 'os vegetais, os líquens e a minoria das bactérias', 'os vegetais, os fungos e a minoria das bactérias', 'os animais, os líquens e a minoria das bactérias', 'os animais, as algas e a maioria das bactérias', '2012-05-23 21:05:08'),
(37, 1, 1, 5, '(FUVEST-SP). As enzimas digestivas que agem sobre os carboidratos atuam:', '3', '4', 'somente na boca', 'somente no intestino', 'somente no estômago', 'na boca e no intestino', 'no intestino e no estômago', '2012-05-23 21:10:44'),
(38, 2, 3, 6, 'Das palavras abaixo a única que pertence à mesma classe gramatical de "lo" em "Lo malo de la vida es no tener amigos" é:', '3', '4', 'le volví', 'lo venderemos', 'lo que', 'el trabajo', 'lo tenía', '2012-05-23 21:37:47'),
(39, 2, 3, 6, '(UFRGS) De las palabras abajo, la única que ejerce función diferente de las demás es:', '3', '4', 'las posibles', 'los perros', 'la basura', 'lo detecten', 'el suelo', '2012-05-23 21:39:10'),
(40, 1, 3, 6, '(UFSM) O vocábulo "protestas" apresenta o mesmo gênero gramatical de:', '3', '5', 'árboles', 'viajes', 'colores', 'puentes', 'cárceles', '2012-05-23 21:40:42'),
(41, 1, 3, 6, ' La Asociación Médica Estadounidense dijo: "___ alarma ahora a la población, sobre la obesidad sería gran error por parte ___ Gobierno Estadounidense".', '3', '1', 'una - del\r\n', 'un - del\r\n', 'una - de lo\r\n', 'un - de lo', 'un- yo del', '2012-05-23 21:42:39'),
(42, 1, 3, 6, '(UNILASALLE) Las palabras que tienen el mismo género de sal son:', '3', '4', 'mensaje y desorden\r\n', 'puente y sangre\r\n', 'origen y centinela\r\n', 'costumbre y leche\r\n', 'color y cutis', '2012-05-23 21:44:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `tb_user_id` int(10) unsigned NOT NULL auto_increment,
  `tb_user_id_2` int(10) unsigned default NULL,
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
  `tb_user_end_comp` varchar(30) default NULL,
  `tb_user_end_bairro` varchar(30) NOT NULL,
  `tb_user_telefone` varchar(16) NOT NULL,
  PRIMARY KEY  (`tb_user_id`),
  UNIQUE KEY `tb_user_login` (`tb_user_login`,`tb_user_email`),
  KEY `tb_user_id_2` (`tb_user_id_2`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`tb_user_id`, `tb_user_id_2`, `tb_user_pnome`, `tb_user_unome`, `tb_user_email`, `tb_user_login`, `tb_user_senha`, `tb_user_tipo`, `tb_user_sexo`, `tb_user_data_nasc`, `tb_user_end_rua`, `tb_user_end_numero`, `tb_user_end_cidade`, `tb_user_end_uf`, `tb_user_end_cep`, `tb_user_end_comp`, `tb_user_end_bairro`, `tb_user_telefone`) VALUES
(1, NULL, 'João', 'da Silva', 'joao@gmail.com', 'jsilva', '3dfcab79ed21fd89c9eb25e9864a6155', '1', 'M', '1985-05-22', 'Visconde de Porto Alegre', 2121, 'Manaus', 'AM', '69010-140', 'casa 2', 'Alvorada', '3367-2124'),
(2, 1, 'Marcos', 'Azevedo', 'marcos_az@hotmail.com', 'mazevedo', 'c4c62424df7c11291eab30691047315d', '1', 'M', '1983-03-17', 'Brasil', 90, 'Manaus', 'AM', '69040-600', '', 'São Jorge', '3639-0090'),
(3, 2, 'Fernanda', 'Vieira', 'fernanda_vieira@gmail.com', 'vifernanda', '318848e2b854296d3949250882e950f6', '2', 'F', '1990-05-10', 'Rua nove', 42, 'Acaraú', 'CE', '69040-701', '', 'Alvorada', '3367-1419'),
(4, 1, 'Geraldo', 'Borges', 'borges.g@hotmail.com', 'gborges', '98937db15b6453700d4d18f8cfd17be7', '2', 'M', '1981-01-03', '10 de julho ', 130, 'Castelo', 'ES', '69040-699', '', 'Centro', '3232-0184'),
(5, 2, 'gisele', 'Ayrão', 'gi_ayrao@hotmail.com', 'agisele', 'afaa0cdcbcd36f7980107b932a01f850', '3', 'F', '1991-07-02', 'Teófilo Dias', 90, 'Manaus', 'AM', '69036-100', '', 'Compensa', '3639-7877'),
(6, 2, 'Fábio', 'melo', 'melo_fabio@gmail.com', 'famelo', 'a3daf5f51bb41a678f410b525f02996b', '3', 'M', '1980-12-14', '23 de junho', 0, 'Manaus', 'AM', '69027-720', '', 'Glória', '361-2000');
