<?

session_start();

if ($_SESSION['validacao'] == "1")
{
?>

<?php
include("conectaBD.php");
		$resp_correta=$_POST['resp'];
		$reposta=$_POST['botao'];
		?>
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Corrige Questão</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
<style type="text/css">
#apDiv2 {
	position:absolute;
	left:218px;
	top:56px;
	width:109px;
	height:41px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:380px;
	top:56px;
	width:93px;
	height:40px;
	z-index:2;
}
</style>
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
  <div class="texto_p" id="texto">Correção da questão</div></div>
			<div id="info">
				<?php if ($reposta==$resp_correta){
					echo "<script>alert('Reposta correta!');</script>";
					}
						
				else{
					echo "<script>alert('Reposta incorreta, a resposta certa seria a $resp_correta!');</script>";
					}
					?>
<div id="apDiv2">
  <input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="sair" id="sair" value="Sair" style="height: 32px ; width: 80px"/>
</div>
<div id="apDiv3">
  <input type="button" onclick="location.href='resolve_teste.php'" name="proxima" id="proxima" value="Próxima" style="height:32px ; width: 80px"/>
</div>
			</div>
		</div>
		<div id="rodape"><p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p></div>
	</div>

</body>
</html>
<?php } else {

?>

<script type="text/javascript">
alert("Você não está logado");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
