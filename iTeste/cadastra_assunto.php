<?

session_start();

if ($_SESSION['validacao'] == "1" && ($_SESSION['user_tipo'] == "1" || $_SESSION['user_tipo'] == "2" ))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrar Novo Assunto</title>
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
				<div class="texto_p" id="texto">Cadastrar Novo Assunto</div>
			</div>
			
			<div id="info">
					<form id="form1" name="form1" method="post" action="action-assunto.php">		
						<fieldset style="height: 170px">
							<legend>Dados do Assunto</legend>
							<div id="nomeDisc">Selecione a Disciplina*:
							  <select name="list-disc" size="1" id="list-disc">
							  <?php include("conectaBD.php");
									$disc = mysql_query("SELECT * FROM tb_disciplina",$conexao);
									echo "<option>Escolha a Disciplina do Assunto</option>";	
											while($disc_row=mysql_fetch_array($disc)){
											$tb_disciplina_nome=nl2br($disc_row['tb_disciplina_nome']);
											$tb_disciplina_id=$disc_row['tb_disciplina_id'];
											echo "<option value='".$tb_disciplina_id."'>$tb_disciplina_nome</option>";
								}
								?>
							  </select>
							</div>

							<div id="cad-assunto">Nome do Assunto*:<input name="nome-assunto" type="text" id="nome-assunto" size="29" />
							</div>
							<div id="btn-cancelar-cad-assu"><input type="button"  onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="cancelar-cad-assu" id="cancelar-cad-assu" value="Cancelar" 
							style=" width:80px; height:28px "/>
							</div>
							<div id="btn-confirmar-cad-assu"><input type="submit" name="confirm-cad-assu" id="confirm-cad-assu" value="Cadastrar" 
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