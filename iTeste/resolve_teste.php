<?

session_start();

if ($_SESSION['validacao'] == "1")
{
?>
<?php

include("conectaBD.php");	
				$questao = mysql_query("	SELECT DISTINCT *
											FROM tb_questao 
											ORDER BY rand();",$conexao);
	?>
		
	<?php
		$lista=mysql_fetch_array($questao);
		$enunciado=nl2br($lista['tb_questao_enunciado']);
		$tb_questao_op_1=nl2br($lista['tb_questao_op_1']);
		$tb_questao_op_2=nl2br($lista['tb_questao_op_2']);
		$tb_questao_op_3=nl2br($lista['tb_questao_op_3']);
		$tb_questao_op_4=nl2br($lista['tb_questao_op_4']);
		$tb_questao_op_5=nl2br($lista['tb_questao_op_5']);
		$tb_questao_op_correta =($lista['tb_questao_op_correta']);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resolve Teste</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
</head>

	<body background="images/fundo.jpg" >
		<div id="tudo">
		<div id="topo">
			<div id="logo"></div>
			<div id="titulo">
			<p>Sistema para Testes Online v 1.0</p>
			</div>
		<div id="dados-user">Olá, <?php echo "<b><font color='#17EC29'>". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo(<a href="logout.php">sair</a>)</div>
		</div>
		
	<div id="body">
			<div id="link-home"><a href="<?php echo $_SESSION['user_url'];?>">Menu Principal</a></div>
				<div id="menu" >
					<div class="texto_p" id="texto">Resolver Teste</div>
				</div>
			<div id="info">
				<form id="form1" name="form1" method="post" action="corrige.php" >
					<div id="teste-enun"><?php echo $enunciado; ?></div>
					<div id="teste-op1"><input type='radio' name='botao' id='botao' value='1' /><?php echo $tb_questao_op_1;?></div>
					<div id="teste-op2"><input type='radio' name='botao' id='botao' value='2'/><?php echo $tb_questao_op_2;?></div>
					<div id="teste-op3"><input type='radio' name='botao' id='botao' value='3'/><?php echo $tb_questao_op_3;?></div>
		      <div id="teste-op4"><input type='radio' name='botao' id='botao'  value='4'/><?php echo $tb_questao_op_4;?></div>
					<div id="teste-op5"><input type='radio' name='botao'  id='botao' value='5'/><?php echo$tb_questao_op_5;?></div>							
                    <input type='hidden' name='resp' id='resp' value='<?php echo $tb_questao_op_correta;?>'/>
					<div id="teste-nova-questao"><input type="submit" name="tes-btn-confirmar" id="tes-btn-confirmar"value="Confirmar" style="height: 28px; width:120px"/>
				  </div>
				
					<div id="teste-cancela">
						<input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="teses-btn-cancelar" id="teses-btn-cancelar" value="Sair" style="height: 28px; width: 120px" />
					</div>
								</form>
			</div>
		</div>
	
			<div id="rodape">
				<p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p>
			</div>
		</div>
	</body>
</html>

<?php } else {

?>

<script type="text/javascript">
alert("Você precisa estar logado para realizar o teste");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
