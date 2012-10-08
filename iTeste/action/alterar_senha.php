<?php	
require('../class/class.controller.php');
require "../banco.con.php";

	session_start();
	
	$usuario_login 			= $_SESSION['usuario_login'];
	$senha_nova				=   md5($_POST['senha-nova']);
	$senha_atual			= 	md5($_POST['senha-atual']);
	$senha_confir			= 	md5($_POST['senha-confir']);
	
	
	ini_set('default_charset','UTF-8');				
	
	try {
	if(strcmp($senha_nova, $senha_confir)!= 0 ){
		throw new Exception('As senhas não conferem!');
	}
	
	$banco->iniciarTransacao();
	
	$usuario = new Usuario();
	$usuario = $controller->recuperarUsuario($usuario_login);
	
	$controller->gravarNovaSenhaUsuario($usuario, $senha_atual, $senha_nova);
	$banco->efetivarTransacao();
	$banco->desconecta();
	 
	echo "<script>alert('A senha do usuário foi atualizada com sucesso!');</script>";
	echo "<script>location.href = '../logout.php';</script>";
		exit;
	} catch(Exception $e) { 
		$banco->desfazerTransacao();
		echo "<script>alert('Erro ao atualizar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_usuario.php';</script>";
	}				
					
					
?>
