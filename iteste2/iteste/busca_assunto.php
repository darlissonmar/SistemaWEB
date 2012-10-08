<?php 
require_once('class/class.controller.php');
require_once "banco.con.php";

try{
	
	ini_set('default_charset','UTF-8');
	$conexao = $banco->conecta();
	$disciplina_id = $_GET['id_disciplina'];
	
	
	if (isset($_GET['id_disciplina']) && ($_GET['id_disciplina'])>0 ){
			
		$assunto = "SELECT tb_assunto.tb_assunto_id,tb_assunto.tb_assunto_nome ,
							tb_assunto_and_tb_disciplina.tb_assunto_id,tb_assunto_and_tb_disciplina.tb_disciplina_id
	                        FROM tb_assunto,tb_assunto_and_tb_disciplina
							WHERE Tb_assunto.tb_assunto_id = tb_assunto_and_tb_disciplina.tb_assunto_id
							AND tb_assunto_and_tb_disciplina.tb_disciplina_id = '".$disciplina_id."'";
		
		$retorno = $banco->executaSQL($assunto); 
		if ($banco->numRows($retorno) == 0){
			echo "<option value='0'>Nenhum assunto cadastrado</option>";
		}else{
			while($linha = $banco->fetchArray($retorno)) {
			echo "<option value='".$linha['tb_assunto_id']."'>".$linha['tb_assunto_nome']."</option>";
			}
		}		
	}else{
		echo "<option value='0'>Nenhum assunto cadastrado </option>";
	}
	$conexao = $banco->desconecta();	
		}
		
	catch (Exception $e){
		echo $e->getMessage();
		
	}
	
	
?>