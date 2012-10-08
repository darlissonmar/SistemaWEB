<?php

require_once("class.DAO.php");

class UsuarioDAO extends DAO {

	public function gravaDadosUsuario(Usuario $usuario){

		$banco = $this->getBancoDados(); 

		$query = "	SELECT count(*) AS total
					FROM tb_usuarios
					WHERE tb_user_login LIKE ".$usuario->tmpLogin."";
		
		if (strlen($usuario->getId())>0){
			$query .= " AND   tb_user_id   <> ".$usuario->getId();
		}
		$retorno = $banco->executaSQL($query); 

		if ($banco->numRows($retorno) == 0){
			throw new Exception(" Ocorreu um erro ao salvar as informações do usuário. Tente novamente.",0);
		}

		$linha = $banco->fetchArray($retorno); 
		if ($linha['total']>0){
			throw new Exception("Já existe um usuário com esse login. O login deve ser único. Opera��o sem sucesso",0);
		}

		if (strlen($usuario->getId())>0){
			$query = " UPDATE tb_usuarios SET
					 tb_user_tipo 		= $usuario->tmpTipo,
		             tb_user_pnome 		= $usuario->tmpNome,
		             tb_user_unome		= $usuario->tmpSobrenome,
		             tb_user_email 		= $usuario->tmpEmail,
	                 tb_user_login 		= $usuario->tmpLogin,
	                 tb_user_senha 		= $usuario->tmpSenha,
	                 tb_user_sexo 		= $usuario->tmpSexo,
	                 tb_user_data_nasc	= STR_TO_DATE($usuario->tmpDataGeral,'%y/%m/%d'),
	                 tb_user_end_rua	= $usuario->tmpRua,
	                 tb_user_end_numero	= $usuario->tmpNumero,
	                 tb_user_end_cidade	= $usuario->tmpCidade, 
	                 tb_user_end_uf		= $usuario->tmpEstado,
	                 tb_user_end_cep	= $usuario->tmpCep,
	                 tb_user_end_comp 	= $usuario->tmpComplemento,
	                 tb_user_end_bairro	= $usuario->tmpBairro,
	                 tb_user_telefone	= $usuario->tmpTelefone 
	                 WHERE tb_user_id 	= ".$usuario->getId()."";
	    
		}else{
			$query = "INSERT INTO tb_usuarios (
							tb_user_id_2,
							tb_user_pnome,
							tb_user_unome,
							tb_user_login,
							tb_user_senha,	
							tb_user_tipo,	
							tb_user_data_nasc,
							tb_user_end_rua,
							tb_user_end_numero,
							tb_user_end_cidade,
							tb_user_end_uf,
							tb_user_end_cep,
							tb_user_end_comp,
							tb_user_end_bairro,
							tb_user_telefone,
							tb_user_sexo,
							tb_user_email
					) VALUE (
							$usuario->tmpId2,
							$usuario->tmpNome,
							$usuario->tmpSobrenome,
							$usuario->tmpLogin,
							$usuario->tmpSenha,
							$usuario->tmpTipo,
							$usuario->tmpDataGeral,
							$usuario->tmpRua,
							$usuario->tmpNumero,
							$usuario->tmpCidade,
							$usuario->tmpEstado,
							$usuario->tmpCep,
							$usuario->tmpComplemento,
							$usuario->tmpBairro,
							$usuario->tmpTelefone,
							$usuario->tmpSexo,
							$usuario->tmpEmail
						)";
				}
		
		if(!$banco->atualizaSQL($query)) {
			throw new Exception("Erro ao atualizar / inserir Usuario. ($query) "); 
		}
		
		
	}
	
	public function gravarNovaSenhaUsuario(Usuario $usuario){

		$banco = $this->getBancoDados(); 
		
		$query = "UPDATE
				tb_usuarios
				SET
				tb_user_senha = $usuario->tmpSenha
				WHERE tb_user_id = ".$usuario->getId()."";
		
		$retorno = $banco->executaSQL($query) or die ("Erro ao atualizar senha do Usuario: $query. " .mysql_error());
		
}

	
	public function recuperarUsuario($usuario_login){
		$query ="SELECT tb_usuarios.tb_user_id          AS user_id,
						tb_usuarios.tb_user_id_2        AS user_id2,
						tb_usuarios.tb_user_pnome		AS nome,	
						tb_usuarios.tb_user_unome		AS sobrenome,
						tb_usuarios.tb_user_login		AS login,	
						tb_usuarios.tb_user_senha		AS senha,
						tb_usuarios.tb_user_tipo		AS tipo,	
						tb_usuarios.tb_user_data_nasc	AS dataNasc,
						tb_usuarios.tb_user_end_rua		AS rua,
						tb_usuarios.tb_user_end_numero	AS numero,
						tb_usuarios.tb_user_end_cidade	AS cidade,
						tb_usuarios.tb_user_end_uf		AS uf,
						tb_usuarios.tb_user_end_cep		AS cep,
						tb_usuarios.tb_user_end_comp	AS complemento,
						tb_usuarios.tb_user_end_bairro	AS bairro,
						tb_usuarios.tb_user_telefone	AS telefone,
						tb_usuarios.tb_user_sexo		AS sexo,
						tb_usuarios.tb_user_email 		AS email
				FROM 	tb_usuarios
				WHERE   tb_usuarios.tb_user_login = '$usuario_login' ";

		$banco = $this->getBancoDados(); 
		$usuario = NULL; 
		$retorno = $banco->executaSQL($query); 
		
		if($retorno != NULL) {
			if ($banco->numRows($retorno) == 0){
				throw new Exception("Nenhuma usuario encontrado: ".$usuario_login,0);
			}
			/*
			 */
			while($linha = $banco->fetchArray($retorno)) { 
				$usuario = new Usuario();
				$usuario->setId($linha['user_id']);
				$usuario->setId2($linha['user_id2']);
				$usuario->setNome($linha['nome']);
				$usuario->setSobreNome($linha["sobrenome"]);
				$usuario->setLogin($linha["login"]);
				$usuario->setSenha($linha["senha"]);
				$usuario->setTipo($linha["tipo"]);
				$usuario->setEmail($linha["email"]);
				$usuario->setDataGeral($linha["dataNasc"]);
				$usuario->setRua($linha["rua"]);
				$usuario->setNumero($linha["numero"]);
				$usuario->setCidade($linha["cidade"]);
				$usuario->setEstado($linha["uf"]);
				$usuario->setCep($linha["cep"]);
				$usuario->setComplemento($linha["complemento"]);
				$usuario->setBairro($linha["bairro"]);
				$usuario->setTelefone($linha["telefone"]);
				$usuario->setSexo($linha["sexo"]);
		}
			return $usuario; 
		} else {
			throw new Exception("Erro ao recuperar Usuario ($query)"); 
		}
	}
	
	
	
public function recuperarUsuarioNome($usuario_nome){
		$query ="SELECT tb_usuarios.tb_user_id          AS user_id,
						tb_usuarios.tb_user_id_2        AS user_id2,
						tb_usuarios.tb_user_pnome		AS nome,	
						tb_usuarios.tb_user_unome		AS sobrenome,
						tb_usuarios.tb_user_login		AS login,	
						tb_usuarios.tb_user_senha		AS senha,
						tb_usuarios.tb_user_tipo		AS tipo,	
						tb_usuarios.tb_user_data_nasc	AS dataNasc,
						tb_usuarios.tb_user_end_rua		AS rua,
						tb_usuarios.tb_user_end_numero	AS numero,
						tb_usuarios.tb_user_end_cidade	AS cidade,
						tb_usuarios.tb_user_end_uf		AS uf,
						tb_usuarios.tb_user_end_cep		AS cep,
						tb_usuarios.tb_user_end_comp	AS complemento,
						tb_usuarios.tb_user_end_bairro	AS bairro,
						tb_usuarios.tb_user_telefone	AS telefone,
						tb_usuarios.tb_user_sexo		AS sexo,
						tb_usuarios.tb_user_email 		AS email
				FROM 	tb_usuarios
				WHERE   (tb_usuarios.tb_user_pnome = '$usuario_nome' OR
						tb_usuarios.tb_user_unome = '$usuario_nome' 
						OR tb_usuarios.tb_user_login = '$usuario_nome')";

		$banco = $this->getBancoDados(); 
		$usuario = NULL; 
		$retorno = $banco->executaSQL($query); 
		
		if($retorno != NULL) {
			if ($banco->numRows($retorno) == 0){
				throw new Exception("Nenhuma usuario encontrado: ".$usuario_login,0);
			}
			/*
			 */
			while($linha = $banco->fetchArray($retorno)) { 
				$usuario = new Usuario();
				$usuario->setId($linha['user_id']);
				$usuario->setId2($linha['user_id2']);
				$usuario->setNome($linha['nome']);
				$usuario->setSobreNome($linha["sobrenome"]);
				$usuario->setLogin($linha["login"]);
				$usuario->setSenha($linha["senha"]);
				$usuario->setTipo($linha["tipo"]);
				$usuario->setEmail($linha["email"]);
				$usuario->setDataGeral($linha["dataNasc"]);
				$usuario->setRua($linha["rua"]);
				$usuario->setNumero($linha["numero"]);
				$usuario->setCidade($linha["cidade"]);
				$usuario->setEstado($linha["uf"]);
				$usuario->setCep($linha["cep"]);
				$usuario->setComplemento($linha["complemento"]);
				$usuario->setBairro($linha["bairro"]);
				$usuario->setTelefone($linha["telefone"]);
				$usuario->setSexo($linha["sexo"]);
		}
			return $usuario; 
		} else {
			throw new Exception("Erro ao recuperar Usuario ($query)"); 
		}
	}

/*	public function recuperarTodosPARAMETRO($PARAMETRO) {

		$sql = "SELECT *
				FROM tb_usuarios 
				WHERE tb_user_login LIKE ".$login."
				LIMIT 1"; 
		$banco = $this->getBancoDados(); 

		$retorno = $banco->executaSQL($sql);
		if($retorno != NULL) {
			$usuario = NULL;
			$i = "0";

			if ($banco->numRows($retorno) == 0 ){
				throw new Exception("Nenhuma usuario encontrado com esse login.",0);
			}

			while($linha = mysql_fetch_array($retorno)) {
				$usuarios[$i++] = $this->recuperarUsuario($linha["tb_user_login"]);
			}
			return $usuarios;
		} else {
			throw new Exception("Erro em query da recupera��o de todas"); 
		}
	}*/
	
	public function recuperarTodos() {

		$sql = "SELECT *
				FROM tb_usuarios 
				ORDER BY tb_user_pnome ASC"; 
		$banco = $this->getBancoDados(); 

		$retorno = $banco->executaSQL($sql);
		if($retorno != NULL) {
			$usuario = NULL;
			$i = "0";

			if ($banco->numRows($retorno) == 0 ){
				throw new Exception("Nenhuma usuario encontrado.",0);
			}

			while($linha = mysql_fetch_array($retorno)) {
				$usuarios[$i++] = $this->recuperarUsuario($linha["tb_user_login"]);
			}
			return $usuarios;
		} else {
			throw new Exception("Erro em query da recupe��o de todas"); 
		}
	}
	
	
	public function recuperarQtde() {

		$sql = "SELECT count(*) AS qtde
				FROM tb_usuarios";
		 
		$banco = $this->getBancoDados(); 

		$retorno = $banco->executaSQL($sql);
		
		if($retorno != NULL) {
			$linha = mysql_fetch_array($retorno);
			return $linha['qtde'];
		} else {
			throw new Exception("Erro em query da recupe��o da qtde de usuarios.");
		}
	}
	
		public function recuperarQtdeTipo($tipo) {

		$sql = "SELECT count(*) AS qtde
				FROM tb_usuarios
				WHERE tb_user_tipo = $tipo";
		 
		$banco = $this->getBancoDados(); 

		$retorno = $banco->executaSQL($sql);
		
		if($retorno != NULL) {
			$linha = mysql_fetch_array($retorno);
			return $linha['qtde'];
		} else {
			throw new Exception("Erro em query da recuperação da qtde de usuarios por tipo.");
		}
	}


	public function excluirUsuarioDAO($id_usuario){

		$banco = $this->getBancoDados(); 

		$query = " DELETE FROM tb_usuarios
					WHERE tb_user_id = ".$id_usuario;
		if(!$banco->executaSQL($query)) {
			throw new Exception("Erro ao excluir Usuario. (".$banco->mysql_error().")"); 
			}
		}
	
}
?>