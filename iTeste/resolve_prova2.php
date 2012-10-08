<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

	$conexao = $banco->conecta();
	
	$_SESSION['area']		  =	$_POST['id_area'];
	$_SESSION['disciplina']   =	$_POST['id_disciplina'];
	$_SESSION['assunto'] 	  =	$_POST['id_assunto'];
	$_SESSION['dificuldade']  = $_POST['dificuldade'];
	$_SESSION['nro_questoes'] = $_POST['numero_questoes'];
	
	if( strlen(($_POST['id_area'])== 0 ) || strlen(($_POST['id_disciplina'])) ==0 || strlen(($_POST['id_assunto']))==0
		|| strlen($_POST['dificuldade'])==0 || strlen($_POST['numero_questoes'])==0 ){
		echo "<script>alert('Você deve informar todos os parâmetros para elaborar a prova');</script>";
		echo "<script>location.href = 'elabora_prova.php';</script>";
	}
	else{
		$questao = mysql_query("SELECT *
							FROM tb_questao 
							WHERE tb_area_id =".$area."
							AND tb_disciplina_id = ".$disciplina."
							AND tb_questao_dificuldade = ".$dificuldade."
							AND tb_disciplina_id IN ( SELECT tb_disciplina_id 
													FROM tb_assunto_and_tb_disciplina
													WHERE tb_assunto_id = ".$assunto.");",$conexao);
		
		
	
			if(mysql_num_rows($questao) < $nro_questoes ){
					echo "<script>if(confirm('Não existe essa quantidade de questões. Deseja continuar?')){
							
							}
							else {alert('Você será redirecionado!');
							window.location.href = 'elabora_prova.php';}</script>";
			
					$_SESSION['nro_questoes'] = $lista=mysql_fetch_array($questao);
							
			}
					echo "<script>location.href = 'resolve_prova.php';</script>";	
	}
	
?>