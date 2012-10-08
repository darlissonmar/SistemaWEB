<?php	
require('../class/class.controller.php');
require "../banco.con.php";

	session_start();
	
	$id_user2				= 	$_SESSION['id_usuario'];
	$nome_disciplina 		=	$_POST['nome'];
	$id_area				=   $_POST['id_area'];
	
	ini_set('default_charset','UTF-8');				
	
	try {
		$banco->iniciarTransacao();
	
		$disciplina = new Disciplina();
		$disciplina->setNome($nome_disciplina);
		$disciplina->setUsuario($id_user2);
	
		$controller->gravarDisciplina($disciplina, $id_area);
		$banco->efetivarTransacao();
		$banco->desconecta();
	 
	echo "<script>alert('A nova disciplina foi cadastrada com sucesso!');</script>";
	echo "<script>location.href = '../".$_SESSION['user_url']."';</script>";
		exit;
	} catch(Exception $e) { 
		$banco->desfazerTransacao();
		echo "<script>alert('Erro ao cadastrar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_disciplina.php';</script>";
	}				
					
					
?>
