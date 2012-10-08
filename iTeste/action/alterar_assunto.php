<?php	
require('../class/class.controller.php');
require "../banco.con.php";

	session_start();
	
	$id_assunto			= 	$_SESSION['id_assunto_1'];
	$id_user2			= 	$_SESSION['id_usuario'];
	$nome_assunto 		=	$_POST['nome'];
	$id_disciplina 		=   $_POST['id_disciplina'];
	
	ini_set('default_charset','UTF-8');				
	ini_set("display_errors",0);
	try {
		
		$banco->iniciarTransacao();
	
		$assunto = new Assunto();
		
		$assunto->setId($id_assunto);
		$assunto->setNome($nome_assunto);
		$assunto->setUsuario($id_user2);
	
		$controller->gravarAssunto($assunto, $id_disciplina);
		$banco->efetivarTransacao();
		$banco->desconecta();
	 
	echo "<script>alert('O assunto foi atualizado com sucesso!');</script>";
	echo "<script>location.href = '../".$_SESSION['user_url']."';</script>";
		exit;
	} catch(Exception $e) { 
		$banco->desfazerTransacao();
		echo "<script>alert('Erro ao atualizar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_assunto.php';</script>";
	}				
					
					
?>