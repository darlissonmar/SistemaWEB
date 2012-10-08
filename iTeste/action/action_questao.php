<?php
require('../class/class.controller.php');
require "../banco.con.php";

		session_start();
		
		$id_usuario		= $_SESSION['id_usuario'];
		$id_assunto 	= $_POST['id_assunto'];
		$id_area		= $_POST['id_area'];
		$id_disciplina	= $_POST['id_disciplina'];
		$enunciado		= $_POST['enunciado'];
		$opcao1			= $_POST['opcao1'];
		$opcao2			= $_POST['opcao2'];
		$opcao3			= $_POST['opcao3'];
		$opcao4			= $_POST['opcao4'];
		$opcao5			= $_POST['opcao5'];
		$opcaocerta		= $_POST['alternativa-correta'];
		$dificuldade	= $_POST['dificuldade'];
		
		
		
	try {
	
	
	$banco->iniciarTransacao();
	
	$questao = new Questao();
	
	$questao->setIdUsuario($id_usuario);
	$questao->setIdArea($id_area);
	$questao->setIdDisciplina($id_disciplina);	
	$questao->setIdAssunto($id_assunto);	
	$questao->setEnunciado($enunciado);
	$questao->setOp1($opcao1);
	$questao->setOp2($opcao2);
	$questao->setOp3($opcao3);
	$questao->setOp4($opcao4);
	$questao->setOp5($opcao5);
	$questao->setDificuldade($dificuldade);
	$questao->setOpCorreta($opcaocerta);
	
	$controller->gravarQuestao($questao);
	$banco->efetivarTransacao();
	$banco->desconecta();
	 
	echo "<script>alert('A nova questão foi cadastrada com sucesso!');</script>";
	echo "<script>location.href = '../".$_SESSION['user_url']."';</script>";
		exit;
	} catch(Exception $e) { 
		
		$banco->desfazerTransacao();
		
		echo "<script>alert('Erro ao cadastrar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_questao.php';</script>";
	}				
					
					
?>
					