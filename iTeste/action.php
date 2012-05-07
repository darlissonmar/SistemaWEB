<?php

include("conectaBD.php");
		$usuario= $_POST["login"];
	   $senha= trim($_POST["senha"]);
	   $senha = md5($senha);
	   $busca= "SELECT * FROM tb_usuarios
				WHERE tb_user_login = '".$usuario."'
				AND tb_user_senha ='".$senha."' 
				LIMIT 1";
				
		$sql=mysql_query($busca,$conexao) or die (mysql_erro());
		$f = mysql_fetch_object($sql);
		
		if (mysql_num_rows($sql)==0){
		echo "<script>alert('Não foi possível Logar: Login e/ou Senha inválido');</script>";
		echo "<script>location.href = 'login.php';</script>";
	}else{
		$validacao = "1";
		session_start();
		$_SESSION['usuario'] = $f->tb_user_login;
		$_SESSION['user_tipo'] = $f->tb_user_tipo;
		$_SESSION['id_usuario'] = $f->tb_user_id;
		$_SESSION['validacao'] = $validacao;
		
		
		$pnome = $f->tb_user_pnome;
		$nivel = $f->tb_user_tipo;
				
			if ($nivel == 1){
			$url = "menu_admin.php";
			$tipo = "ADMINISTRADOR(a)";
					echo "<script>alert('Bem Vindo: <$pnome> : <$tipo> ');</script>";
					echo "<script>location.href = 'menu_admin.php';</script>";
				}
        	if ($nivel == 2){
			$url = "menu_professor.php";
			$tipo = "PROFESSOR(a)";
			echo "<script>alert('Bem Vindo: <$pnome> : <$tipo> ');</script>";
			echo "<script>location.href = 'menu_professor.php';</script>";}
		
			if ($nivel == 3){
			$url = "menu_aluno.php";
			$tipo = "ALUNO(a)";
			echo "<script>alert('Bem Vindo: <$pnome> : <$tipo> ');</script>";
			echo "<script>location.href = 'menu_aluno.php';</script>";
			}
		$_SESSION['user_url'] = $url;	
		$_SESSION['user_tipo_nome'] = $tipo;	
		}

?>
