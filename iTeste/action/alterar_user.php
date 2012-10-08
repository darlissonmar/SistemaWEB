<?php	
require('../class/class.controller.php');
require "../banco.con.php";

	session_start();
	
	$id_usuario				= 	$_SESSION['id_usuario_1'];
	$id_user2				= 	$_SESSION['id_usuario'];
	$tipousuario			=	$_POST['tipo_user'];
	$nome 					=	$_POST['pnome'];
	$sobrenome 				= 	$_POST['unome'];
	$email					=	$_POST['email'];
	$login 					=	$_POST['login'];
	$sexo					= 	$_POST['sexo'];
	$data1_dia				= 	$_POST['data1_dia'];
	$data1_mes				= 	$_POST['data1_mes'];
	$data1_ano				= 	$_POST['data1_ano'];
	$rua					= 	$_POST['rua'];
	$numero 				= 	$_POST['numero'];
	$estado 				= 	$_POST['estado'];
	$cidade 				= 	$_POST['cidade'];
	$cep 					=	$_POST['cep'];
	$bairro 				= 	$_POST['bairro'];
	$complemento 			= 	$_POST['complemento'];
	$telefone 				= 	$_POST['telefone'];
	
	ini_set('default_charset','UTF-8');				
	
	try {
	if(strcmp($senha, $senha_confir)!= 0 ){
		throw new Exception('As senhas não conferem!');
	}
	
	$banco->iniciarTransacao();
	
	$usuario = new Usuario();
	
	$usuario->setId($id_usuario);
	$usuario->setId2($id_user2);
	$usuario->setTipo($tipousuario);
	$usuario->setNome($nome);
	$usuario->setSobreNome($sobrenome);
	$usuario->setEmail($email);
	$usuario->setLogin($login);
	$usuario->setSexo($sexo);
	$usuario->setDataGeral($data1_ano."-".$data1_mes."-".$data1_dia);
	$usuario->setRua($rua);
	$usuario->setNumero($numero);
	$usuario->setComplemento($complemento);
	$usuario->setBairro($bairro);
	$usuario->setCidade($cidade);
	$usuario->setEstado($estado);
	$usuario->setCep($cep);
	$usuario->setTelefone($telefone);

	$controller->gravarUsuario($usuario);
	$banco->efetivarTransacao();
	$banco->desconecta();
	 
	echo "<script>alert('O usuário foi atualizado com sucesso!');</script>";
	echo "<script>location.href = '../menu_admin.php';</script>";
		exit;
	} catch(Exception $e) { 
		$banco->desfazerTransacao();
		echo "<script>alert('Erro ao atualizar: ". $e->getMessage()." ')</script>";
		echo "<script>location.href = '../cadastra_usuario.php';</script>";
	}				
					
					
?>
