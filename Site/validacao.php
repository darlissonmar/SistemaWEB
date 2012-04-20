<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	echo "<script>alert('N\u00E3o foi poss\u00EDvel Logar: Login e/ou Senha inválido');</script>";
	echo "<script>location.href = 'index.php';</script>";exit;
}
// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('trabalho') or trigger_error(mysql_error());

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT `tb_user_pnome`, `tb_user_tipo` FROM tb_usuarios WHERE (`tb_user_login` = '". $usuario ."') AND (`tb_user_senha` = '". $senha."') LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	echo  "<script>alert('Não foi possível Logar: Login e/ou Senha inválido');</script>";
	echo "<script>location.href = 'index.php';</script>";exit;
	} 

else {
	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_assoc($query);
	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sessão
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


