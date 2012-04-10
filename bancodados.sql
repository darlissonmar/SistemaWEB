CREATE TABLE TB_USUARIOS (
  tb_user_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_user_id_2 INTEGER UNSIGNED,
  tb_user_pnome VARCHAR(70) NOT NULL,
  tb_user_unome VARCHAR(70) NOT NULL,
  tb_user_email VARCHAR(50) NOT NULL,
  tb_user_login VARCHAR(30) NOT NULL,
  tb_user_senha VARCHAR(30) NOT NULL,
  tb_user_tipo CHAR(1) NOT NULL CHECK (tb_user_tipo IN( 1,2,3)),
  tb_user_sexo CHAR(1) NOT NULL,
  tb_user_data_nasc DATE NOT NULL,
  tb_user_end_rua VARCHAR(30) NOT NULL,
  tb_user_end_numero INTEGER NOT NULL,
  tb_user_end_cidade VARCHAR(30) NOT NULL,
  tb_user_end_uf CHAR(2) NOT NULL,
  tb_user_end_cep VARCHAR(9) NOT NULL,
  tb_user_end_comp VARCHAR(30) NULL,
  tb_user_end_bairro VARCHAR(30) NOT NULL,
  tb_user_telefone VARCHAR(16) NOT NULL,
 UNIQUE (tb_user_login,tb_user_email),
  PRIMARY KEY(tb_user_id),
  FOREIGN KEY(tb_user_id_2)
    REFERENCES TB_USUARIOS(tb_user_id)
      ON DELETE SET NULL
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE TB_AREA (
  tb_area_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_user_id INTEGER UNSIGNED NOT NULL,
  tb_area_nome VARCHAR(30) NOT NULL,
  PRIMARY KEY(tb_area_id),
  FOREIGN KEY(tb_user_id)
    REFERENCES TB_USUARIOS(tb_user_id)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE TB_DISCIPLINA (
  tb_disciplina_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_user_id INTEGER UNSIGNED NOT NULL,
  tb_area_id INTEGER UNSIGNED NOT NULL,
  tb_disciplina_nome VARCHAR(30) NOT NULL,
  PRIMARY KEY(tb_disciplina_id),
  FOREIGN KEY(tb_area_id)
    REFERENCES TB_AREA(tb_area_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tb_user_id)
    REFERENCES TB_USUARIOS(tb_user_id)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE TB_ASSUNTO (
  tb_asssunto_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_user_id INTEGER UNSIGNED NOT NULL,
  tb_disciplina_id INTEGER UNSIGNED NOT NULL,
  tb_assunto_nome VARCHAR(30) NOT NULL,
  PRIMARY KEY(tb_asssunto_id),
  FOREIGN KEY(tb_disciplina_id)
    REFERENCES TB_DISCIPLINA(tb_disciplina_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tb_user_id)
    REFERENCES TB_USUARIOS(tb_user_id)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
);



CREATE TABLE TB_QUESTAO (
  tb_questao_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_user_id INTEGER UNSIGNED NOT NULL,
  tb_area_id INTEGER UNSIGNED NOT NULL,
  tb_disciplina_id INTEGER UNSIGNED NOT NULL,
  tb_questao_enunciado TEXT NOT NULL,
  tb_questao_dificuldade CHAR(1) NOT NULL CHECK (tb_questao_dificuldade IN( 1,2,3,4,5)),
  tb_questao_op_correta CHAR(1) NOT NULL,
  tb_questao_op_1 TEXT NOT NULL,
  tb_questao_op_2 TEXT NOT NULL,
  tb_questao_op_3 TEXT NOT NULL,
  tb_questao_op_4 TEXT NOT NULL,
  tb_questao_op_5 TEXT NOT NULL,
  PRIMARY KEY(tb_questao_id),
  FOREIGN KEY(tb_disciplina_id)
    REFERENCES TB_DISCIPLINA(tb_disciplina_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tb_area_id)
    REFERENCES TB_AREA(tb_area_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tb_user_id)
    REFERENCES TB_USUARIOS(tb_user_id)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
);

CREATE TABLE TB_ASSUNTO_has_TB_QUESTAO (
  tb_asssunto_id INTEGER UNSIGNED NOT NULL,
  tb_questao_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(tb_asssunto_id, tb_questao_id),
  FOREIGN KEY(tb_asssunto_id)
    REFERENCES TB_ASSUNTO(tb_asssunto_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tb_questao_id)
    REFERENCES TB_QUESTAO(tb_questao_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

