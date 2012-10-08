<?php	
require('../class/class.controller.php');
require "../banco.con.php";

	session_start();
	
	$id_area				= 	$_SESSION['id_area_1'];
	$id_user2				= 	$_SESSION['id_usuario'];
	$nome_area 				=	$_POST['nome'];
	
	ini_set('default_charset','UTF-8');				
	
	try {
		$banco->iniciarTransacao();
	
		$area = new Area();
		
		$area->setId($id_area);
		$area->setNome($nome_area);
		$area->setUsuario($id_user2);
	
		$controller->gravarArea($area);
		$banco->efetivarTransacao();
		$banco->desconecta();
	 
	echo "<script>alert('A área foi atualizada com sucesso!');</script>";
	echo "<script>location.href = '../".$_SESSION['user_url']."';</script>";
		exit;
	} catch(Exception $e) { 
		$banco->desfazerTransacao();
		echo "<script>alert('Erro ao atualizar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_area.php';</script>";
	}				
					
					
?>