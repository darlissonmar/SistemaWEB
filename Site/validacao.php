<?php

// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	echo "<script>alert('N\u00E3o foi poss\u00EDvel Logar: Login e/ou Senha inv�lido');</script>";
	echo "<script>location.href = 'index.php';</script>";exit;
}
// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('trabalho') or trigger_error(mysql_error());

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

// Valida��o do usu�rio/senha digitados
$sql = "SELECT `tb_user_pnome`, `tb_user_tipo` FROM tb_usuarios WHERE (`tb_user_login` = '". $usuario ."') AND (`tb_user_senha` = '". $senha."') LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado
	echo  "<script>alert('N�o foi poss�vel Logar: Login e/ou Senha inv�lido');</script>";
	echo "<script>location.href = 'index.php';</script>";exit;
	} 

else {
	// Salva os dados encontados na vari�vel $resultado
	$resultado = mysql_fetch_assoc($query);
	// Se a sess�o n�o existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sess�o
	$_SESSION['UsuarioNome'] = $resultado['tb_user_pnome'];
	$_SESSION['UsuarioNivel'] = $resultado['tb_user_tipo'];

	// Redireciona o visitante
	switch($_SESSION['UsuarioNivel']){
	case 1: $tipo = "ADMINISTRADOR";
	}
	
	
	echo "<script>alert('Bem Vindo:  : <$tipo> ');</script>";
    echo "<script>location.href = 'principal.html';</script>";
	
	header("Location: principal.html"); exit;
}




?>


