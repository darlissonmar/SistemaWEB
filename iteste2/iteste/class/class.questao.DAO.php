<?php 

require_once("class.DAO.php");

class QuestaoDAO extends DAO {

	public function gravaDadosQuestao(Questao $questao){

		$banco = $this->getBancoDados(); 
		
		$sincroniza = "";
							
		if (strlen($questao->getIdQuestao()) > 0){
			$query = "	UPDATE tb_questao 
                     	SET
                     	tb_questao_enunciado = $questao->tmpEnunciado,
                     	tb_questao_dificuldade = $questao->tmpDificuldade,
                     	tb_questao_op_correta= $questao->tmpOpcaocorreta,
                     	tb_questao_op_1 = $questao->tmpOpcao1,
                      	tb_questao_op_2 = $questao->tmpOpcao2,
                      	tb_questao_op_3 = $questao->tmpOpcao3,
                      	tb_questao_op_4 = $questao->tmpOpcao4,
                      	tb_questao_op_5 = $questao->tmpOpcao5,
                      	tb_user_id 		= $questao->tmpIdUsuario,
						tb_area_id 		= $questao->tmpIdArea,
						tb_disciplina_id= $questao->tmpIdDisciplina
								
                      	WHERE tb_questao_id = ".$questao->getIdQuestao()."";
			
			
		$sincroniza .= "UPDATE tb_assunto_and_tb_questao
						SET tb_assunto_id 			= $questao->tmpIdAssunto
						WHERE tb_questao_id 		= ".$questao->getIdQuestao()."";
		
		
		}else{
				$query = "INSERT INTO tb_questao (
							tb_user_id ,
							tb_area_id ,
							tb_disciplina_id ,
							tb_questao_enunciado ,
							tb_questao_dificuldade ,
							tb_questao_op_correta ,
							tb_questao_op_1 ,
							tb_questao_op_2 ,
							tb_questao_op_3 ,
							tb_questao_op_4 ,
							tb_questao_op_5
					) VALUE (
							$questao->tmpIdUsuario,
							$questao->tmpIdArea,
							$questao->tmpIdDisciplina,
							$questao->tmpEnunciado,
							$questao->tmpDificuldade,
							$questao->tmpOpcaocorreta,
							$questao->tmpOpcao1,
							$questao->tmpOpcao2,
							$questao->tmpOpcao3,
							$questao->tmpOpcao4,
							$questao->tmpOpcao5
						)";
		
			$sincroniza .= " INSERT INTO
							tb_assunto_and_tb_questao(
							tb_assunto_id,
							tb_questao_id
							)
							VALUE (
							$questao->tmpIdAssunto,
							LAST_INSERT_ID())";
							
			
		}
		
		if(!$banco->atualizaSQL($query)) {
			throw new Exception("Erro ao atualizar / inserir Questao. ($query) ".$banco->mysql_error()); 
		}
		
		if(!$banco->executaSQL($sincroniza)) {
			throw new Exception("Erro ao sincronizar questao e assunto. ($sincroniza)"); 
		}
	}
//================================================================================
	public function recuperarQuestao($id_questao){

		$query ="SELECT tb_questao.tb_questao_id            AS questao_id,
						tb_questao.tb_questao_enunciado 	AS enunciado,
						tb_questao.tb_user_id        		AS usuario,
						tb_questao.tb_area_id				AS area,
						tb_questao.tb_disciplina_id     	AS disciplina,
						tb_questao.tb_questao_dificuldade	AS dificuldade,
						tb_questao_op_correta			 	AS correta,
                     	tb_questao_op_1 				 	AS opcao1,
                      	tb_questao_op_2 					AS opcao2,
                      	tb_questao_op_3 					AS opcao3,
                      	tb_questao_op_4 					AS opcao4,
                      	tb_questao_op_5  					AS opcao5,
						tb_questao.tb_questao_data_cad      AS data
						
				FROM tb_questao
				WHERE tb_questao.tb_questao_id = '$id_questao' ";
		
		$query2 = "SELECT tb_assunto_id AS assunto_id
				   FROM tb_assunto_and_tb_questao
				   WHERE tb_questao_id = '$id_questao'";

		$banco = $this->getBancoDados(); 
		$questao = NULL; 
		$retorno2 = $banco->executaSQL($query2);
		$retorno = $banco->executaSQL($query); 
		
		if($retorno != NULL) {

			if ($banco->numRows($retorno) == 0){
				throw new Exception("Nenhuma questao encontrada.",0);
			}

			while($linha = $banco->fetchArray($retorno)) { 

				$questao = new Questao(); 
				$questao->setIdQuestao($linha['questao_id']);
				$questao->setEnunciado($linha['enunciado']);
				$questao->setIdUsuario($linha['usuario']);
				$questao->setIdArea($linha['area']);
				$questao->setIdDisciplina($linha['disciplina']);
				$questao->setDificuldade($linha['dificuldade']);
				$questao->setOpCorreta($linha['correta']);
				$questao->setOp1($linha['opcao1']);
				$questao->setOp2($linha['opcao2']);
				$questao->setOp3($linha['opcao3']);
				$questao->setOp4($linha['opcao4']);
				$questao->setOp5($linha['opcao5']);
				$questao->setData($linha['data']);
			}
			
			$linha2 = $banco->fetchArray($retorno2);
			$questao->setIdAssunto($linha2['assunto_id']);
			
			return $questao; 
		} else {
			throw new Exception("Erro ao recuperar o Questao ($query)"); 
		}
	}
//================================================================================
	public function recuperarTodos() {

		$banco = $this->getBancoDados(); 

		$sql = "SELECT tb_questao_id
				FROM tb_questao 
				ORDER BY tb_disciplina_id ASC"; 


		$retorno = $banco->executaSQL($sql);
		if($retorno != NULL) {
			$questao = NULL;
			$i = "0";
			if ($banco->numRows($retorno) == 0 ){
				throw new Exception("Nenhum Questao cadastrada. Para realizar esta opera��o, acesse o Menu cadastro / Questao.",0);
			}
			while($linha = mysql_fetch_array($retorno)) {
				$questaos[$i++] = $this->recuperarQuestao($linha["tb_questao_id"]);
			}
			return $questaos;
		} else {
			throw new Exception("Erro em query da recupera��o de todas as questaos. ($sql)".$banco->mysql_error()); 
		}
	}

//================================================================================
	public function recuperarQtde() {

		$banco = $this->getBancoDados(); 

		$sql = "SELECT count(*) AS qtde
				FROM tb_questao";
		
		$retorno = $banco->executaSQL($sql);
		if($retorno != NULL) {
			$linha = mysql_fetch_array($retorno);
			return $linha['qtde'];
		} else {
			throw new Exception("Erro em query da recupera��o da qtde do questao"); 
		}
	}

	
//================================================================================
	public function excluirQuestaoDAO($questao_id){

		$banco = $this->getBancoDados(); 

		$query = " DELETE FROM tb_questao
					WHERE tb_questao_id = ".$questao_id;
		
		if(!$banco->executaSQL($query)) {
			throw new Exception("Erro ao excluir o questao. (".$banco->mysql_error().")"); 
			}
	}
		

}
?>

