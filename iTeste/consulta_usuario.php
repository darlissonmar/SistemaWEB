<?

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultar usuário</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
</head>
	<body background="images/fundo.jpg" >
		<div id="tudo">
				<div id="topo">
					<div id="logo"></div>
					<div id="titulo"><p>Sistema para Testes Online v 1.0</p></div>
		<div id="dados-user">Olá, <?php echo "<b><font color='#17EC29'>". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo(<a href="logout.php">sair</a>)</div>
					</div>
				
			<div id="body">
				<div id="link-home"><a href="<?php echo $_SESSION['user_url'];?>">Menu Principal</a></div>
				<div id="menu" >
					<div class="texto_p" id="texto">Consultar Usuário</div>
				</div>
				<div id="info">
					<form id="formBusca" name="form1" method="post" action="resultado_consulta.php">
						<fieldset style="height:130px">	
							<legend>Consulta</legend>
							<div id="nomeArea">
								<p>
									Buscar:<input name="busca_usuario" type="text" id="busca_usuario"  size="30" />
								</p>
								<p>
								<div id="busca-user">
									<input type="radio" name="radio" id="op_nome" value="op_nome" />
										Por Login
								</div>
								<div id="btn-cons-user-area">
									<input type="submit" name="cons-user-area" id="cons-user-area" value="Pesquisar" size="10" style="width: 80px; height: 28px"  />
								</div> 
								</p>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			
				<div id="rodape">
				<p align="center">
					Desenvolvido por Darlisson Marinho e Iasmim Cunha
				</p>
			</div>
		</div>
	</body>
</html>
<?php } else {

?>

<script type="text/javascript">
alert("Você não está logado como Administrador");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
