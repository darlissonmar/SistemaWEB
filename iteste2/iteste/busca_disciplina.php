<?
require_once('class/class.controller.php');
require_once "banco.con.php";

try{
	
	ini_set('default_charset','UTF-8');
	$conexao = $banco->conecta();
	$area_id = $_GET['id_area'];
	
	echo $area_id = $_GET['id_area'];
	
	if (isset($_GET['id_area']) && ($_GET['id_area'])>0 ){
			
		$disciplina ="SELECT tb_disciplina.tb_disciplina_id ,tb_disciplina.tb_disciplina_nome,
									tb_disciplina_and_tb_area.tb_disciplina_id,tb_disciplina_and_tb_area.tb_area_id
									FROM tb_disciplina,tb_disciplina_and_tb_area
									WHERE tb_disciplina.tb_disciplina_id=tb_disciplina_and_tb_area.tb_disciplina_id 
									AND tb_disciplina_and_tb_area.tb_area_id = '".$area_id."'";
		echo $disciplina;
		
		$retorno = $banco->executaSQL($disciplina); 
		if ($banco->numRows($retorno) == 0){
			echo "<option value='0'>Nenhuma disciplina cadastrada</option>";
		}else{
			echo "<option value='0'> Selecione uma área</option>";
			while($linha = $banco->fetchArray($retorno)) {
			echo "<option value='".$linha['tb_disciplina_id']."'>".$linha['tb_disciplina_nome']."</option>";
			}
		}		
	}else{
		echo "<option value='0'>Nenhuma disciplina cadastrada</option>";
	}
	$conexao = $banco->desconecta();	
}
		
	catch (Exception $e){
		echo $e->getMessage();
		
	}
	
			
?>