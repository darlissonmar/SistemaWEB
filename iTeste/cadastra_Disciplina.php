<?

session_start();

if ($_SESSION['validacao'] == "1" && ($_SESSION['user_tipo'] == "1" || $_SESSION['user_tipo'] == "2" ))
{
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrar Nova Disciplina</title>
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
				<div class="texto_p" id="texto">Cadastrar Nova Disciplina</div>
			</div>
		<div id="info">
				<form id="form1" name="form1" method="post" action="action-disciplina.php">
						<fieldset style="height: 170px">
								<legend>Dados da Disciplina</legend>
								
								<div id="nomeArea">Selecione a Área*:
									<select name="list-area" size="1" id="list-area">
									 <?	include("conectaBD.php");
									 $area = mysql_query("SELECT * FROM tb_area",$conexao);
									 echo "<option>Escolha a Área da Disciplina</option>";
									 while($area_row=mysql_fetch_array($area)){
									 $tb_area_nome=nl2br($area_row['tb_area_nome']);
									 $tb_area_id=$area_row['tb_area_id'];
									 echo "<option value='".$tb_area_id."'>$tb_area_nome</option>";
									 }
								?>	
									</select>
								</div>
								
								<div id="cad-disciplina">Nome da Disciplina*:<input name="cad-disciplina-nome" type="text" 
									id="cad-disciplina-nome" size="28" />
								</div>
								<div id="btn-cancelar-cad-disc"><input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="cancelar-cad-disc" id="cancelar-cad-disc" 
									value="Cancelar" style=" width:80px; height:28px "/>
								</div>
								
								<div id="btn-confirm-cad-disc"><input type="submit" name="confirm-cad-disc" id="confirm-cad-disc" value="Cadastrar" 
									style=" width:80px; height:28px "/>
								</div>
								
						</fieldset>
					</form>
				</div>
			</div>
		<div id="rodape"><p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p></div>
	</div>
</body>
</html>

<?php } else {

?>

<script type="text/javascript">
alert("Você não possui permisão para essa operação!");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>