<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1"){	
	$url = $_SESSION['user_url'];
	
		echo "<script>if(confirm('Você deseja realmente realizar essa remoção?')){
						}else {alert('Você será redirecionado!');
									window.location.href = '$url';}</script>";
						
		

	$id  =   base64_decode($_GET['id']);
	$tipo =  base64_decode($_GET['tipo']);
	
	try{
		switch($tipo){
			
			case 1: $controller->excluirUsuario($id);break;
			case 2: $controller->excluirQuestao($id);break;
			case 3: $controller->excluirArea($id);break;
			case 4: $controller->excluirDisciplina($id);break;
			case 5: $controller->excluirAssunto($id);break;					
		}

	echo "<script>alert('Remoção realizada com sucesso!');window.location.href = '$url';</script>";	
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
	else{
		echo "<script>alert('Você não tem permissão para essa operação!');window.location.href = '$url';</script>";
		}
?>
